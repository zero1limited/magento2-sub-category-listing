# Magento 2 - Sub Category Listing

The Sub Category Listing module allows you to present a list of sub categories on any category page on the frontend of your website

This improves navigation on the frontend and can help users find what they're looking for quickly and easily, while still keeping control in the user's hands.

## Usage

Magento Admin > Catalog > Categories

When clicking into a category in admin, you will see a "Show Sub Category Listing" attribute. Setting this to yes will automatically show all of the available sub categories for that category as links above the product list

You will also see a "Display Sub Category Listing As Images" option. Setting this to yes will mean that the sub categories displayed will use the category images, should you want to show images

## Installation

```
composer require zero1/module-sub-category-listing
```

Support
---
If you encounter any problems or bugs, please open an issue on [GitHub](https://github.com/zero1limited/magento2-improved-checkout-success-page/issues).

© Zero-1 Ltd | [www.zero1.co.uk](https://www.zero1.co.uk/)


## Configuration

The default is for the values to be enabled.
This can be changed by specifying the following in a project module

`app/code/Zero1/Release/etc/module.xml`
```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="MyVendor_MyModule" setup_version="1.0.0">
        <sequence>
            <module name="Zero1_SubCategoryListing"/>
        </sequence>
    </module>
</config>
```


`app/code/Zero1/Release/etc/config.xml`
```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Store:etc/config.xsd">
    <default>
        <zero1>
            <subcategorylisting>
                <default_enabled>0</default_enabled>
            </subcategorylisting>
        </zero1>
    </default>
</config>
```

This will change the default to disabled.