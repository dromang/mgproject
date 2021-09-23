<?php

namespace Hiberus\Roman\Model\ResourceModel\Roman;
use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Hiberus\Roman\Model\Roman', 'Hiberus\Roman\Model\ResourceModel\Roman');
    }

}
