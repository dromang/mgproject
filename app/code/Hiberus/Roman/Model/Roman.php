<?php

namespace Hiberus\Roman\Model;
use Hiberus\Roman\Api\Data\RomanInterface;
use Magento\Framework\Model\AbstractModel;
class Roman extends AbstractModel implements RomanInterface
{
    protected function _construct() {
        $this->_init(\Hiberus\Roman\Model\ResourceModel\Roman::class);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId() {
        return $this->getData('entity_id');
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entityId) {
        return $this->setData('entity_id', $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getFirstname()
    {
        return $this->getData('firstname');

    }

    /**
     * @inheritDoc
     */
    public function setFirstname($firstname)
    {
        return $this->setData('firstname', $firstname);
    }

    /**
     * @inheritDoc
     */
    public function getLastname()
    {
        return $this->getData('lastname');
    }

    /**
     * @inheritDoc
     */
    public function setLastname($lastname)
    {
        return $this->setData('lastname', $lastname);
    }

    /**
     * @inheritDoc
     */
    public function getMark()
    {
        return $this->getData('mark');
    }

    /**
     * @inheritDoc
     */
    public function setMark($mark)
    {
        return $this->setData('mark', $mark);
    }
}
