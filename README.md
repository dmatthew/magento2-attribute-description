# magento2-attribute-description

Easily add the ability to add desciptions to your product attributes.

## Managing Attribute Descriptions Though the Admin
![Screenshot](/docs/screenshots/admin_attribute_edit_descriptions.png)

## Developer Usage:
```php
/** @var $attribute Dmatthew\AttributeDescription\Model\Entity\Attribute **/
$description = $attribute->getStoreDescription($storeId);
```
