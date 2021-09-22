<?php

namespace Hiberus\Roman\Api;

interface RomanRepositoryInterface
{
    /**
     * @param \Hiberus\Roman\Api\Data\RomanInterface $romanInterface
     * @return \Hiberus\Roman\Api\Data\RomanInterface
     */
    public function save(\Hiberus\Roman\Api\Data\RomanInterface $romanInterface);

    /**
     * @param $entityId
     * @return \Hiberus\Roman\Api\Data\RomanInterface
     */
    public function getById($entityId);

    /**
     * @param \Hiberus\Roman\Api\Data\RomanInterface $romanInterface
     * @return bool
     */
    public function delete(\Hiberus\Roman\Api\Data\RomanInterface $romanInterface);

    /**
     * @param $entityId
     * @return bool
     */
    public function deleteById($entityId);

}

