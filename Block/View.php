<?php

namespace Zero1\SubCategoryListing\Block;

use Zero1\SubCategoryListing\Model\SubCategories;
use Magento\Framework\View\Element\Template;

class View extends Template
{
    /**
     * @var SubCategories
     */
    private $subCategories;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        Template\Context $context,
        SubCategories $subCategories,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->subCategories = $subCategories;
        $this->scopeConfig = $context->getScopeConfig();
    }
    
    /**
     * @return boolean
     */
    public function showSubCategoryListing() {
    	if (($this->getCurrentCategoryShowSubCategoryListingAdminSetting() != '0') && (count($this->getCurrentCategoryChildren()) > 0)) {
		return true;
    	}
    	return false;
    }
    
    /**
     * @return boolean
     */
    public function getCurrentCategoryShowSubCategoryListingAdminSetting()
    {
    	return $this->subCategories->getCurrentCategory()->getData('zero1_sub_category_listing');
    }

    /**
     * @return \Magento\Catalog\Model\Category[]|\Magento\Catalog\Model\ResourceModel\Category\Collection
     */
    public function getCurrentCategoryChildren()
    {
        return $this->subCategories->getCurrentCategoryChildren();
    }
}
