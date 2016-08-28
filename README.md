# Magento_AttributeDescription Module

Easily add the ability to add desciptions to your product attributes.

## Managing Attribute Descriptions Though the Admin
![Screenshot](/docs/screenshots/admin_attribute_edit_descriptions.png)

## Developer Usage
### General Usage
```php
/** @var $attribute Dmatthew\AttributeDescription\Model\Entity\Attribute **/
$description = $attribute->getStoreDescription($storeId);
```

### Frontend Usage
The attribute description has been added to the JSON configuration for the Configurable product type. This means developers can use the product attribute description in any JS code which utilizes the `\Magento\ConfigurableProduct\Block\Product\View\Type::getJsonConfig()` function.
