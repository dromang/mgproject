<?php
declare(strict_types=1);
namespace Hiberus\Roman\Plugin;
use Hiberus\Roman\Model\Roman;
use Magento\Framework\App\Config\ScopeConfigInterface;
class SuspensosPlugin
{
    protected ScopeConfigInterface $scopeConfig;
    protected Roman $mark;

    public function afterGetMark(Roman $subject, $result){
        if($subject->getData('mark') < 5){
            $subject->setMark(4.9);
            $result = $subject->getData('mark');
        }
        return $result;
    }
}
