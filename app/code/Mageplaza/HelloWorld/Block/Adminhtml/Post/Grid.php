<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Post;

use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Block\Widget\Grid\MassActionInterface;
use Magento\Backend\Block\Widget\Grid\Row\ActionsInterface;
use Mageplaza\HelloWorld\Model\Post\PostFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Backend\Helper\Data;

class Grid extends Extended
{
    protected $_postFactory;

    public function __construct(
        Context $context,
        Data $backendHelper,
        PostFactory $postFactory,
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
        $this->addColumn(
            'post_id',
            [
                'header' => __('Post ID'),
                'index'  => 'post_id',
                'type'   => 'number',
            ]
        );

        $this->addColumn(
            'title',
            [
                'header' => __('Title'),
                'index'  => 'title',
            ]
        );

        return parent::_prepareColumns();
    }
}
