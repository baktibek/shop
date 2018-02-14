<?php

/**
 * ShopItem form.
 *
 * @package    shops
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class ShopItemForm extends BaseShopItemForm
{
  public function configure()
  {
  	$this->useFields(array('category_id', 'title','description','price','images','email'));
  	$this->validatorSchema['email']= new sfValidatorAnd(array($this->validatorSchema['email'],new sfValidatorEmail()));
  	$this->widgetSchema['images']= new sfWidgetFormInputFile(array('label'=>'Images',));
  	$this->validatorSchema['images'] = new sfValidatorFile(array(
  		'required'   => false,
  		'path'       => sfConfig::get('sf_upload_dir').'/items',
  		'mime_types' => 'web_images',
  	));
  }
}
