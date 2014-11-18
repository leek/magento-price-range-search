<?php

/**
 * @category   Leek
 * @package    Leek_PriceRange
 * @author     Chris Jones <leeked@gmail.com>
 */
class Leek_PriceRange_Model_Search extends Mage_CatalogSearch_Model_Advanced
{
    /**
     * Retrieve array of attributes used in advanced search
     *
     * @return array
     */
    public function getAttributes()
    {
        /* @var $attributes Mage_Catalog_Model_Resource_Eav_Resource_Product_Attribute_Collection */
        $attributes = $this->getData('attributes');
        if (is_null($attributes)) {
            $product = Mage::getModel('catalog/product');
            $attributes = Mage::getResourceModel('catalog/product_attribute_collection')
                ->addHasOptionsFilter()
                // ->addDisplayInAdvancedSearchFilter()
                ->addFieldToFilter('main_table.attribute_code', array('eq' => 'price'))
                ->addStoreLabel(Mage::app()->getStore()->getId())
                ->setOrder('main_table.attribute_id', 'asc')
                ->load();
            foreach ($attributes as $attribute) {
                $attribute->setEntity($product->getResource());
            }
            $this->setData('attributes', $attributes);
        }
        return $attributes;
    }
}
