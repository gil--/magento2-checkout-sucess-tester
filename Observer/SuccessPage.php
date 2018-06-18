<?php

namespace GilG\CheckoutSuccessTester\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
//use GilG\CheckoutSuccessTester\Block\successTester as SuccessTester;

class SuccessPage implements ObserverInterface
{
    /**
     * @var successTester
     */
    // private $successTester;

    // protected $order;

    // /**
    //  * SuccessObserver constructor.
    //  * @param SuccessTester $successTester
    //  */
    // public function __construct(
    //     SuccessTester $successTester
    // ) {
    //     $this->successTester = $successTester;
    // }

    // /**
    //  * @param Observer $observer
    //  * @return void
    //  */
    // public function execute(\Magento\Framework\Event\Observer $observer)
    // {
    //     /** @var \Magento\Framework\View\Layout $layout */
    //     $layout = $observer->getEvent()->getData('layout');

    //     if ($this->shortcuts->getConfig('design/keyboardshortcuts/enable_frontend')) {
    //         $layout->getUpdate()->addHandle('keybard_shortcuts');
    //     }
    // }

    /**
     * Order Model
     *
     * @var \Magento\Sales\Model\Order $order
     */
    protected $order;

     public function __construct(
        \Magento\Sales\Model\Order $order
    )
    {
        $this->order = $order;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $orderId = $observer->getEvent()->getOrderIds();
        $order = $this->order->load($orderId);

        //get Order All Item
        $itemCollection = $order->getItemsCollection();
        $customer = $order->getCustomerId(); // using this id you can get customer name
    }
}