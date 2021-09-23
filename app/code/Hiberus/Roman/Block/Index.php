<?php

namespace Hiberus\Roman\Block;
use Hiberus\Roman\Api\Data\RomanInterface;
use Hiberus\Roman\Api\RomanRepositoryInterface;
use Hiberus\Roman\Model\Roman;
use Hiberus\Roman\Model\ResourceModel\Roman as ResourceRoman;
use Hiberus\Roman\Api\Data\RomanInterfaceFactory;
use Hiberus\Roman\Model\RomanRepository;
use \Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{

    protected Registry $registry;
    protected Roman $roman;
    protected RomanRepositoryInterface $romanRepository;
    protected RomanInterfaceFactory $romanInterfaceFactory;
    protected ResourceRoman $romanResource;

    public function __construct(
                                Context $context,
                                Registry $registry,
                                Roman $roman,
                                RomanRepositoryInterface $romanRepository,
                                RomanInterfaceFactory $romanInterfaceFactory,
                                ResourceRoman $romanResource,
                                array $data = []
    ) {
        $this->registry = $registry;
        $this->roman = $roman;
        $this->romanRepository = $romanRepository;
        $this->romanInterfaceFactory = $romanInterfaceFactory;
        $this->romanResource = $romanResource;
        parent::__construct($context, $data);
    }

    public function getAlumn() {

        $newAlumn = $this->romanInterfaceFactory->create();
        return $newAlumn->getCollection();

    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function addAlumn($firstname, $lastname, $mark) {

        $alumn = $this->romanInterfaceFactory->create();
        $alumn->setFirstname($firstname);
        $alumn->setLastname($lastname);
        $alumn->setMark($mark);

        $this->romanResource->save($alumn);
        return $alumn->getEntityId();

    }

    public function averageMarks(){
        $mark = $this->romanInterfaceFactory->create();
        $total = $mark->getCollection();
        $marks = [];
        foreach ($total as $value){
            $marks[] = $value->getMark();
        }
        $avgMark = array_sum($marks)/count($marks);
        return $avgMark;
    }

}
