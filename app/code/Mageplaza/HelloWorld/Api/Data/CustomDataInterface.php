<?php
namespace Mageplaza\HelloWorld\Api\Data;

interface CustomDataInterface
{
    /**
     * Get the custom attribute.
     *
     * @return string
     */
    public function getCustomAttribute();

    /**
     * Set the custom attribute.
     *
     * @param string $customAttribute
     * @return void
     */
    public function setCustomAttribute($customAttribute);
}
