<?php

/**
 * @category   Leek
 * @package    Leek_PriceRange
 * @author     Chris Jones <leeked@gmail.com>
 */
class Leek_PriceRange_CustomerController extends Mage_Core_Controller_Front_Action
{
    /**
     * Action predispatch
     *
     * Check customer authentication for some actions
     */
    public function preDispatch()
    {
        parent::preDispatch();

        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_initLayoutMessages('catalogsearch/session');

        if ($navigationBlock = $this->getLayout()->getBlock('customer_account_navigation')) {
            $navigationBlock->setActive('pricerange');
        }

        $this->getLayout()->getBlock('head')->setTitle($this->__('Price Range Search'));

        if ($query = $this->getRequest()->getQuery()) {
            try {
                Mage::getSingleton('leek_pricerange/search')->addFilters($query);
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('catalogsearch/session')->addError($e->getMessage());
                $this->_redirectError(
                    Mage::getModel('core/url')
                        ->setQueryParams($this->getRequest()->getQuery())
                        ->getUrl('*/*/')
                );
            }
        }

        $this->renderLayout();
    }
}
