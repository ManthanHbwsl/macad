<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Post;

use Magento\Backend\Block\Widget\Grid\Extended;
use Mageplaza\HelloWorld\Model\Post\PostFactory;
use Magento\Backend\Block\Template\Context; 
use Magento\Backend\Helper\Data;
use Magento\Framework\Registry;
use Magento\Backend\Model\Session;

/**
 * Class Grid
 * @package Mageplaza\HelloWorld\Block\Adminhtml\Post
 */
class Grid extends Extended
{
    protected $_postFactory;

    /**
     * Grid constructor.
     *
     * @param Context $context
     * @param Data $backendHelper
     * @param PostFactory $postFactory
     * @param Registry $registry
     * @param Session $backendSession
     * @param array $data
     */
    public function __construct(
        Context $context, // Corrected context class
        Data $backendHelper,
        PostFactory $postFactory,
        Registry $registry,
        Session $backendSession,
        array $data = []
    ) {
        $this->_postFactory = $postFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * Prepare collection for grid
     *
     * @return \Magento\Framework\Data\Collection
     */
    protected function _prepareCollection()
    {
        // Create a collection for your posts
        $collection = $this->_postFactory->create()->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Prepare columns for grid
     *
     * @return $this
     */
    protected function _prepareColumns()
    {
        // Add the "Post ID" column
        $this->addColumn(
            'post_id',
            [
                'header' => __('Post ID'),
                'index'  => 'post_id',
                'type'   => 'number',
            ]
        );

        // Add the "Title" column
        $this->addColumn(
            'title',
            [
                'header' => __('Title'),
                'index'  => 'title',
            ]
        );

        // Add the "Actions" column (if needed for actions like edit, delete)
        $this->addColumn(
            'actions',
            [
                'header'    => __('Actions'),
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => [
                    [
                        'caption' => __('Edit'),
                        'url'     => [
                            'base' => '*/*/edit',
                            'params' => ['_current' => true]
                        ],
                        'field'    => 'post_id'
                    ],
                    [
                        'caption' => __('Delete'),
                        'url'     => [
                            'base' => '*/*/delete',
                            'params' => ['_current' => true]
                        ],
                        'field'    => 'post_id'
                    ]
                ],
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'actions',
                'is_system' => true,
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * Get the grid URL for actions
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }
}