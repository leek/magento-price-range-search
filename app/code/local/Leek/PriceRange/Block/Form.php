<?php

/**
 * @category   Leek
 * @package    Leek_PriceRange
 * @author     Chris Jones <leeked@gmail.com>
 */
class Leek_PriceRange_Block_Form extends Mage_CatalogSearch_Block_Advanced_Form
{
    public function _prepareLayout()
    {
        return Mage_Core_Block_Template::_prepareLayout();
    }

    /**
     * Retrieve advanced search model object
     *
     * @return Leek_PriceRange_Model_Search
     */
    public function getModel()
    {
        return Mage::getSingleton('leek_pricerange/search');
    }

    /**
     * Retrieve search form action url
     *
     * @return string
     */
    public function getSearchPostUrl()
    {
        return $this->getUrl('*/*/index');
    }
}
