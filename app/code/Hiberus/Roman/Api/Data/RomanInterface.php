<?php

namespace Hiberus\Roman\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface RomanInterface extends ExtensibleDataInterface
{
    const TABLE_NAME = 'hiberus_exam';

    const COLUMN_ID = 'entity_id';

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * @return string
     */
    public function getFirstname();

    /**
     * @param $firstname
     * @return $this
     */
    public function setFirstname($firstname);

    /**
     * @return string
     */
    public function getLastname();

    /**
     * @param $lastname
     * @return $this
     */
    public function setLastname($lastname);

    /**
     * @return float
     */
    public function getMark();

    /**
     * @param $mark
     * @return $this
     */
    public function setMark($mark);

}
