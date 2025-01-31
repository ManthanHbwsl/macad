<?php
namespace Mageplaza\HelloWorld\Controller\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\HelloWorld\Model\PostFactory; 

class Index extends Action
{
    protected $_pageFactory;
    protected $_postFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        PostFactory $postFactory 
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory; 
        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();

        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }

        return $this->_pageFactory->create();
    }

    /** 
     * Check if the user has permission to access this controller
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mageplaza_HelloWorld::helloworld');
    }

    const ADMIN_RESOURCE = 'Mageplaza_HelloWorld::post';
}
