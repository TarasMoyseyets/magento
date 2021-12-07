<?php
namespace Local\CustomBar\Controller\Index;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;

class DisplayCustomBar extends Template
{
    private $config;
    private $session;
    private $storeManager;
    public function __construct(ScopeConfigInterface $config, StoreManagerInterface $storeManager, Session $session, Template\Context $context, array $array = [] ){
        $this->config = $config;
        $this->session = $session;
        $this->storeManager = $storeManager;
        parent::__construct($context, $array);
    }

    /**
     * Get Custom Bar Content
     *
     * @return string
     */
    public function displayBlock()
    {
        if($this->config->getValue('section_bar/group_custom_bar/custom_bar_id', ScopeInterface::SCOPE_STORES, $this->storeManager->getStore()->getStoreId())){
            if ($this->session->isLoggedIn()) {
                return 'LoggedIn';
            } else {
                return 'NOT LOGGED IN';
            }
        }        
    }
}