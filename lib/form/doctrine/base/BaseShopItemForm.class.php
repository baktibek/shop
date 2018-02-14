<?php

/**
 * ShopItem form base class.
 *
 * @method ShopItem getObject() Returns the current form's model object
 *
 * @package    shops
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseShopItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShopCategory'), 'add_empty' => false)),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'images'      => new sfWidgetFormInputText(),
      'price'       => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'expires_at'  => new sfWidgetFormDateTime(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShopCategory'), 'column' => 'id')),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 4000)),
      'images'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'price'       => new sfValidatorNumber(array('required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_active'   => new sfValidatorBoolean(array('required' => false)),
      'expires_at'  => new sfValidatorDateTime(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopItem';
  }

}
