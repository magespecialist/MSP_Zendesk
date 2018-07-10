<?php

namespace MSP\Zendesk\Block;

use Magento\Framework\View\Element\Template;

class Zendesk extends Template
{
    const XML_ENABLED = 'msp_zendesk/general/enable';
    const XML_PATH_KEY = 'msp_zendesk/general/api_key';

    public function __construct(
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }


    /**
     * Get session storage key
     *
     * @return bool|string
     */
    public function getApiKey()
    {
        return $this->_scopeConfig->getValue(static::XML_PATH_KEY);
    }

    /**
     * Get enable key
     *
     * @return bool|string
     */
    protected function isEnabled()
    {
        return $this->_scopeConfig->isSetFlag(static::XML_ENABLED);
    }

    /**
     * @return bool
     */
    public function isRenderable()
    {
        return $this->isEnabled() && $this->getApiKey();
    }
}
