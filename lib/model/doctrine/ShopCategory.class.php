<?php

/**
 * ShopCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    shops
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ShopCategory extends BaseShopCategory
{
	public function getItemFromCategory()
	{
		$q=Doctrine_Query::create()->from('ShopItem i')->where('i.category_id=?',$this->getId());
		return Doctrine_Core::getTable('ShopItem')->getActiveItem($q);
	}
}
