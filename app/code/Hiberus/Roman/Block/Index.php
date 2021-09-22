<?php

namespace Hiberus\Roman\Block;

use Hiberus\Roman\Api\RomanRepositoryInterface;
use Hiberus\Roman\Model\Roman;
use Hiberus\Roman\Api\Data\RomanInterfaceFactory;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $registry;
    protected $curso;
    protected $cursoRepository;
    protected $cursoInterfaceFactory;
    protected $cursoResource;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        Roman $roman,
        RomanRepositoryInterface $romanRepository,
        RomanInterfaceFactory $romanInterfaceFactory,
        \Hiberus\Roman\Model\ResourceModel\Roman $romanResource,
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

        $newAlumn = $this->addAlumn('Daniel', 'Roman', '2.0');

        return $this->romanRepository->getById($newAlumn);

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

}
