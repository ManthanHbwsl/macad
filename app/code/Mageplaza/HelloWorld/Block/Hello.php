<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    protected $_isScopePrivate = true; 
    
    protected function _construct()
    {
        parent::_construct();
        $this->setCacheLifetime(3600);  // Cache for 1 hour
    }
}
