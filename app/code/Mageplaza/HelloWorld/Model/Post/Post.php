<?php
namespace Mageplaza\HelloWorld\Model\Post;

use Magento\Framework\Model\AbstractModel;
use Mageplaza\HelloWorld\Model\ResourceModel\Post\Post as PostResource;
use Mageplaza\HelloWorld\Model\ResourceModel\Post\Collection as PostCollection;

class Post extends AbstractModel
{
    protected $_idFieldName = 'post_id';
    protected $_primaryKey = 'post_id';
    protected $_resourceModel = 'Mageplaza\HelloWorld\Model\ResourceModel\Post\Post';

    /**
     * Get the collection of posts
     * 
     * @return PostCollection
     */
    public function getCollection()
    {
        return PostCollection::factory();
    }
}
