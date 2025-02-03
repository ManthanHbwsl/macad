<?php

namespace Mageplaza\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Mageplaza\HelloWorld\Model\PostFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $data = [
                'name'         => "New Post in Upgrade",
                'post_content' => "This post is added during upgrade.",
                'url_key'      => 'new-post-upgrade',
                'tags'         => 'magento2,upgrade',
                'status'       => 1
            ];
            
            $post = $this->_postFactory->create();
            $post->addData($data)->save();
        }
    }
}
