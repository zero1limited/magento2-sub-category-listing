<?php
namespace Zero1\SubCategoryListing\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;

class InstallData implements InstallDataInterface
{

	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
	}

	public function install(
		ModuleDataSetupInterface $setup,
		ModuleContextInterface $context
	)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Category::ENTITY,
			'zero1_sub_category_listing',
			[
				'type'         => 'int',
				'label'        => 'Display Sub Category Listing',
				'input'        => 'select',
				'default'.     => '1',
				'sort_order'   => 999,
				'source'       => Boolean::class,
				'global'       => ScopedAttributeInterface::SCOPE_STORE,
				'group'        => 'General Information'
			]
		);
                        
	}
}
