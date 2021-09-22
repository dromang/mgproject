<?php

namespace Hiberus\Roman\Model;

use Hiberus\Roman\Api\Data\RomanInterfaceFactory;
use Hiberus\Roman\Api\RomanRepositoryInterface;
use Hiberus\Roman\Api\Data\RomanInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class RomanRepository implements RomanRepositoryInterface
{

    protected ResourceModel\Roman $resourceRoman;
    protected RomanRepositoryInterface $romanRepository;
    protected RomanInterfaceFactory $romanInterfaceFactory;

    /**
     * @param ResourceModel\Roman $resourceRoman
     * @param RomanInterfaceFactory $romanInterfaceFactory
     */
    public function __construct(
        \Hiberus\Roman\Model\ResourceModel\Roman $resourceRoman,
        RomanInterfaceFactory $romanInterfaceFactory
    ) {
        $this->resourceRoman = $resourceRoman;
        $this->romanInterfaceFactory = $romanInterfaceFactory;
    }

    /**
     * @param RomanInterface $roman
     * @return RomanInterface
     * @throws CouldNotSaveException
     */
    public function save(RomanInterface $roman) {

        try {
            $this->resourceRoman->save($roman);
        } catch(\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $roman;

    }

    /**
     * @param $entityId
     * @return mixed
     */
    public function getById($entityId)
    {
        try {
            $roman = $this->romanInterfaceFactory->create();
            $roman->setEntityId($entityId);
            $this->resourceRoman->load($roman, $entityId);
        } catch (\Exception $e) {
            $roman = $this->romanInterfaceFactory->create();
        }

        return $roman;
    }

    /**
     * @param RomanInterface $roman
     * @return bool
     */
    public function delete(RomanInterface $roman)
    {
        try {
            $this->resourceRoman->delete($roman);
        } catch (\Exception $e) {

            return false;
        }

        return true;
    }

    /**
     * @param int $entityId
     * @return bool
     */
    public function deleteById($entityId)
    {
        return $this->delete($this->getById($entityId));
    }

}
