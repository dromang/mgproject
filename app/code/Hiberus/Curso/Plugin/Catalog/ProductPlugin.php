<?php

namespace Hiberus\Curso\Plugin\Catalog;

use Hiberus\Curso\Model\Author;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ProductPlugin
{

    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;
    protected Author $author;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param Author $author
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Author $author
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->author = $author;
    }

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(
        \Magento\Catalog\Model\Product $subject,
        $result
    ): string
    {

//        $nombreGeneral = $this->scopeConfig->getValue(
//            'hiberus_nombre/general/nombre_general',
//            ScopeInterface::SCOPE_STORE
//        );
        $result = $result . ' ' . $this->author->getAuthorName();

        return $result;

    }

}
