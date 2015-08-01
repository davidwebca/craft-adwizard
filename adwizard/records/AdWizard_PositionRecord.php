<?php
namespace Craft;

class AdWizard_PositionRecord extends BaseRecord
{
	
	public function getTableName()
	{
		return 'adwizard_positions';
	}

	protected function defineAttributes()
	{
		return array(
			'name'   => array(AttributeType::Name, 'required' => true),
			'handle' => array(AttributeType::Handle, 'required' => true),
		);
	}

	public function defineRelations()
	{
		return array(
			'ads' => array(static::HAS_MANY, 'AdWizard_AdRecord', 'adId'),
		);
	}

	public function defineIndexes()
	{
		return array(
			array('columns' => array('name'), 'unique' => true),
			array('columns' => array('handle'), 'unique' => true),
		);
	}

	public function scopes()
	{
		return array(
			'ordered' => array('order' => 'name'),
		);
	}

}