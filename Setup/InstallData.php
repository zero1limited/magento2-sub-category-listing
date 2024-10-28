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

	/**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
	protected $scopeConfig;
	
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
	{
		$this->eavSetupFactory = $eavSetupFactory;
		$this->scopeConfig = $scopeConfig;
	}

	public function install(
		ModuleDataSetupInterface $setup,
		ModuleContextInterface $context
	)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

		$default = (int)$this->scopeConfig->getValue('zero1/subcategorylisting/default_enabled');

		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Category::ENTITY,
			'zero1_sub_category_listing',
			[
				'type'         => 'int',
				'label'        => 'Display Sub Category Listing',
				'input'        => 'select',
				'default'      => ''.$default,
				'sort_order'   => 999,
				'source'       => Boolean::class,
				'global'       => ScopedAttributeInterface::SCOPE_STORE,
				'group'        => 'General Information'
			]
		);
		
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Category::ENTITY,
			'zero1_sub_category_listing_images',
			[
				'type'         => 'int',
				'label'        => 'Display Sub Category Listing as Images',
				'input'        => 'select',
				'default'      => ''.$default,
				'sort_order'   => 1000,
				'source'       => Boolean::class,
				'global'       => ScopedAttributeInterface::SCOPE_STORE,
				'group'        => 'General Information'
			]
		);
                        
	}
}
