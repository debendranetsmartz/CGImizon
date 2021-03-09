<?php
namespace Netsmartz\Book\Block;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Framework\View\Element\Template as ViewTemplate;
use Magento\Framework\View\Element\Template\Context;
class Customer extends ViewTemplate
{
    /**
     * Render block HTML.
     *
     * @return string
     */

    protected $currentCustomer;

    public function __construct(
        CurrentCustomer $currentCustomer
    ) {
        $this->currentCustomer = $currentCustomer;
    }

    public function getCustomer()
    {
        $customer = $this->currentCustomer->getCustomer();
        $label = $customer->getFirstname()." ".$customer->getLastname();
        return $label;
    }
}
