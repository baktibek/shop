<?php

/**
 * ShopItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    shops
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ShopItem extends BaseShopItem
{
	public function save(Doctrine_Connection $conn=null)
	{
		if ($this->isNew() && !$this->getExpiresAt())
		{
			$now=$this->getCreatedAt() ? $this->getDateTimeObject('created_at')->format('U') : time();
			$this->setExpiresAt(date('Y-m-d h:i:s', $now + 86400 * sfConfig::get('app_active_days')));
		}
		return parent::save($conn);
	}
}