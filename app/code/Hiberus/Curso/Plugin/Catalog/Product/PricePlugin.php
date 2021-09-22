<?php

namespace Hiberus\Curso\Plugin\Catalog\Product;

class PricePlugin
{

    public function afterFormatCurrency(
        \Magento\Framework\Pricing\Render\Amount $subject,
        $result
    ) {

        return $result . ' / por unidad';
    }

}
