<?php

/**
 * @Author: Ngo Quang Cuong <bestearnmoney87@gmail.com>
 * @Creation time: 2017-06-12 13:18:57
 * @Last modified time: 2017-06-12 13:23:35
 * @link: http://www.giaphugroup.com
 *
 */

namespace PHPCuong\Checkout\Helper;

class Image extends \Magento\Catalog\Helper\Image
{
    /**
     * Retrieve image URL
     *
     * @return string
     */
    public function getUrl()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $requestInterface = $objectManager->get('Magento\Framework\App\RequestInterface');
        $moduleName     = $requestInterface->getModuleName();
        $controllerName = $requestInterface->getControllerName();
        $actionName     = $requestInterface->getActionName();
        $current_page = $moduleName.'_'.$controllerName.'_'.$actionName;
        // checking the current page is the checkout page.
        if ($current_page == 'checkout_index_index') {
            return "https://scontent.fdad3-2.fna.fbcdn.net/v/t1.0-9/18527827_1866366413585908_7846050574752554272_n.png?oh=d3c52073c9ee65bb1441b52b27ec216d&oe=59A67757";
        } else {
            try {
                $this->applyScheduledActions();
                return $this->_getModel()->getUrl();
            } catch (\Exception $e) {
                return $this->getDefaultPlaceholderUrl();
            }
        }
    }
}
