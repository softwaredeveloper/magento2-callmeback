<?php

namespace Ivey\Callmeback\Controller\Request;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Ivey\Callmeback\Block\Popup;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;

class Form extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Json $resultJsonPageFactory
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonPageFactory
    ) {
        $this->resultPageFactory = $resultJsonPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var Popup $form */
        $form = $this->_view->getLayout()->createBlock(Popup::class);

        return $this->resultPageFactory->create()
            ->setData([
                'content' => $form->toHtml()
            ]);
    }
}