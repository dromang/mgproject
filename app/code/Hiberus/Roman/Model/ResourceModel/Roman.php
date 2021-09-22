<?php

namespace Hiberus\Roman\Model\ResourceModel;
use Hiberus\Roman\Api\Data\RomanInterface;
use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Roman extends AbstractDb
{
    /**
     * @var \Magento\Framework\EntityManager\MetadataPool
     */
    private \Magento\Framework\EntityManager\MetadataPool $metadataPool;
    /**
     * @var \Magento\Framework\EntityManager\EntityManager
     */
    private \Magento\Framework\EntityManager\EntityManager $entityManager;
    /**
     *
     */
    protected function __construct(Context $context,
                                    MetadataPool $metadataPool,
                                    EntityManager $entityManager,
                                    $connectionName = null)
    {
        $this->metadataPool = $metadataPool;
        $this->entityManager = $entityManager;

        parent::__construct($context, $connectionName);
    }

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(RomanInterface::TABLE_NAME, RomanInterface::COLUMN_ID,
            RomanInterface::FIRST_NAME, RomanInterface::LAST_NAME, RomanInterface::MARK);
    }
}
