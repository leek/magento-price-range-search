<?php

/**
 * @category   Leek
 * @package    Leek_PriceRange
 * @author     Chris Jones <leeked@gmail.com>
 */
class Leek_PriceRange_Block_Result extends Mage_CatalogSearch_Block_Advanced_Result
{
    public function _prepareLayout()
    {
        return Mage_Core_Block_Template::_prepareLayout();
    }

    public function setListOrders()
    {
        $this->getChild('search_result_list')
            ->setAvailableOrders(array('price' => 'Price'))
            ->setSortBy('price')
            ->setDefaultDirection('asc')
        ;
    }

    /**
     * Retrieve advanced search model object
     *
     * @return Leek_PriceRange_Model_Search
     */
    public function getSearchModel()
    {
        return Mage::getSingleton('leek_pricerange/search');
    }
}
