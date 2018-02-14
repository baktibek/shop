<?php

/**
 * item actions.
 *
 * @package    shops
 * @subpackage item
 * @author     Your name here
 * @version    SVN: $Id$
 */
class itemActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {   
    $this->shop_items=Doctrine_Core::getTable('ShopItem')->getActiveItem();
    $this->getResponse()->setSlot('categories', $this->categories=Doctrine_Core::getTable('ShopCategory')->getCategories());
  }

  public function executeShow(sfWebRequest $request)
  {
    /*$this->item = Doctrine_Core::getTable('ShopItem')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->item);*/
    $this->item=$this->getRoute()->getObject();
    $this->getResponse()->setSlot('categories', $this->categories=Doctrine_Core::getTable('ShopCategory')->getCategories());
    $this->forward404Unless($this->item);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ShopItemForm();
    $this->getResponse()->setSlot('categories', $this->categories=Doctrine_Core::getTable('ShopCategory')->getCategories());
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ShopItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($shop_item = Doctrine_Core::getTable('ShopItem')->find(array($request->getParameter('id'))), sprintf('Object shop_item does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShopItemForm($shop_item);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($shop_item = Doctrine_Core::getTable('ShopItem')->find(array($request->getParameter('id'))), sprintf('Object shop_item does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShopItemForm($shop_item);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($shop_item = Doctrine_Core::getTable('ShopItem')->find(array($request->getParameter('id'))), sprintf('Object shop_item does not exist (%s).', $request->getParameter('id')));
    $shop_item->delete();

    $this->redirect('item/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $shop_item = $form->save();

      $this->redirect('show_item');
    }
  }
}
