<?php
namespace Mageplaza\HelloWorld\Model;

use Mageplaza\HelloWorld\Api\Data\CustomDataInterface;

class CustomDataRepository
{
    /**
     * Save custom data
     *
     * @param CustomDataInterface $customData
     * @return void
     */
    public function save(CustomDataInterface $customData)
    {
        // Implement save logic for custom data
    }

    /**
     * Get custom data by product ID
     *
     * @param int $productId
     * @return CustomDataInterface
     */
    public function get($productId)
    {
        // Fetch custom data for the given product ID
    }
}
