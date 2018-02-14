<?php

/**
 * category actions.
 *
 * @package    shops
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id$
 */
class categoryActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->getResponse()->setSlot('categories', $this->categories=Doctrine_Core::getTable('ShopCategory')->getCategories());
  	$this->category=$this->getRoute()->getObject();
  }
}
