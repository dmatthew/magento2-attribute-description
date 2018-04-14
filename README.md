# Dmatthew_AttributeDescription Module for Magento 2

This is a Magento 2 module that adds the ability to add desciptions to product attributes. Add descriptions to configurable attributes and display them on your product view pages. Use attribute descriptions to help explain complex attributes to your customers. If you have unique attributes that need additional explanations beyond the attribute's name then this module will work for you. Attribute descriptions are stored in a new `eav_attribute_description` table.

## Managing Attribute Descriptions Though the Admin
![Screenshot](https://raw.githubusercontent.com/dmatthew/magento2-attribute-description/master/docs/screenshots/admin_attribute_edit_descriptions.png)

## Developer Usage
### General Usage
```php
/** @var $attribute Dmatthew\AttributeDescription\Model\Entity\Attribute **/
$description = $attribute->getStoreDescription($storeId);
```

### Frontend Usage
The attribute description has been added to the JSON configuration for the Configurable product type. This means developers can use the product attribute description in any JS code which utilizes the `\Magento\ConfigurableProduct\Block\Product\View\Type::getJsonConfig()` function.

### License
[MIT](/LICENSE.txt)
