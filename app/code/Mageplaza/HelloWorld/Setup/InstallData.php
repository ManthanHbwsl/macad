<?php

namespace Mageplaza\HelloWorld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Mageplaza\HelloWorld\Model\PostFactory;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'name'         => "Sample Post",
            'post_content' => "This is a sample post created during installation.",
            'url_key'      => 'sample-post',
            'tags'         => 'magento2,helloworld',
            'status'       => 1
        ];
        
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
    }
}
