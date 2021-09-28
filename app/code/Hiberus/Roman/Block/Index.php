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
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
class Index extends \Magento\Framework\View\Element\Template
{

    protected Registry $registry;
    protected Roman $roman;
    protected RomanRepositoryInterface $romanRepository;
    protected RomanInterfaceFactory $romanInterfaceFactory;
    protected ResourceRoman $romanResource;
    protected $scopeConfig;

    public function __construct(
                                Context $context,
                                Registry $registry,
                                Roman $roman,
                                RomanRepositoryInterface $romanRepository,
                                RomanInterfaceFactory $romanInterfaceFactory,
                                ResourceRoman $romanResource,
                                scopeConfigInterface $scopeConfig,
                                array $data = []
    ) {
        $this->registry = $registry;
        $this->roman = $roman;
        $this->romanRepository = $romanRepository;
        $this->romanInterfaceFactory = $romanInterfaceFactory;
        $this->romanResource = $romanResource;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getAlumn() {

        $newAlumn = $this->romanInterfaceFactory->create();
        return $newAlumn->getCollection();

    }

    public function getElements() {
        $elements = $this->scopeConfig->getValue( 'hiberus_exam/general/element_general', ScopeInterface::SCOPE_STORE);
        return $elements;
    }


    public function getMark() {
        $mark = $this->scopeConfig->getValue( 'hiberus_exam/general/num_general', ScopeInterface::SCOPE_STORE);
        if(is_null($mark)){
            $mark = 5;
        }
        return $mark;
    }
    public function getHighestMarks(){
        $res=$this->getAlumn();
        $marks=[];
        $hMarks=[];
        foreach ($res as $item){
            $marks[]=$item->getMark();
        }
        rsort($marks);
        foreach ($marks as $mark){
            if(count($hMarks)<3){
                $hMarks[]=$mark;
            }
        }
        return $hMarks;
    }

    public function getHighestMark() {
        $alumns = $this->romanInterfaceFactory->create()->getCollection()->getData();
        $maxMark = 0;
        foreach ($alumns as $alumn) {
            if ($alumn['mark'] > $maxMark) {
                $maxMark = $alumn['mark'];
            }
        }
        return $maxMark;
    }
//    /**
//     * @throws \Magento\Framework\Exception\AlreadyExistsException
//     */
//    public function addAlumn() {
//
//
//        $alummns = array('Daniel'=> 'Roman', 'Francisco' => 'Ruiz', 'Angel' => 'Sanchez', 'Javier' => 'Garcia', 'Pablo' => 'Cuesta', 'David' => 'Fernandez');
//
//
//
//            foreach ($alummns as $key => $value){
//                $alumn = $this->romanInterfaceFactory->create();
//                $alumn->setFirstname($key);
//                $alumn->setLastname($value);
//                $alumn->setMark(rand(1, 10));
//                $this->romanResource->save($alumn);
//            }
//    }

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
