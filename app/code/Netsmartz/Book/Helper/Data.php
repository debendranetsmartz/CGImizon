<?php
/**
 * Debendra Prusty
 * Netsmartz
 */
namespace Netsmartz\Book\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Adding Data for header.
     *
     * @return string
     */
    protected $customer;
    public function __construct(\Magento\Customer\Model\Session $customer)
    {
        $this->customer = $customer;
    }
    public function getCustomer()
    {
        $customer = $this->customer->getCustomer();
        return $customer->getName();
    }
}
