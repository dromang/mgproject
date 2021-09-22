<?php

namespace Hiberus\Roman\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;


interface RomanInterface extends ExtensibleDataInterface
{
    const TABLE_NAME = 'hiberus_exam';

    const COLUMN_ID = 'entity_id';

    const FIRST_NAME = 'firstname';

    const LAST_NAME = 'lastname';

    const MARK = 'mark';
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
    public function getFirstName();

    /**
     * @param $firstname
     * @return $this
     */
    public function setFirstName($firstname);

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
