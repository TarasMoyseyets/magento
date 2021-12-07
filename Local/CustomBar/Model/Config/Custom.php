<?php
namespace Local\CustomBar\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
 
class CustomBarModel extends \Magento\Captcha\Model\Config\Form\AbstractForm
{
    private ScopeConfigInterface $scopeConfig;
    public function __construct(
        ScopeConfigInterface             $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }
    /**
     * @var string
     */
    protected $_configPath = 'section_bar/group_custom_bar/custom_bar_id';
 
    /**
     *
     * @return bool
     */
    public function getModuleConfig()
    {
        return (bool)$this->_config->getValue($this->_configPath, 'default');
    }
}