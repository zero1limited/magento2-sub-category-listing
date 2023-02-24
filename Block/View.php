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
        array $data = [],
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context, $data);
        $this->subCategories = $subCategories;
        $this->scopeConfig = $context->getScopeConfig();
        $this->storeManager = $storeManager;
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

    /**
     * @return string
     */
    public function getSubcategoryListingImageUrl($category)
    {
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $imageUrl = $category->getImageUrl();
        $imageUrlTrim = str_replace('/media/', '', $imageUrl);

        $result = str_starts_with($imageUrl, $mediaUrl) ? $imageUrl : $mediaUrl.$imageUrlTrim;

        return $result;
    }
}
