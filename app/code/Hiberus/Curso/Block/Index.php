<?php

namespace Hiberus\Curso\Block;

use Hiberus\Curso\Api\CursoRepositoryInterface;
use Hiberus\Curso\Model\Curso;
use Hiberus\Curso\Api\Data\CursoInterfaceFactory;

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
        Curso $curso,
        CursoRepositoryInterface $cursoRepository,
        CursoInterfaceFactory $cursoInterfaceFactory,
        \Hiberus\Curso\Model\ResourceModel\Curso $cursoResource,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->curso = $curso;
        $this->cursoRepository = $cursoRepository;
        $this->cursoInterfaceFactory = $cursoInterfaceFactory;
        $this->cursoResource = $cursoResource;
        parent::__construct($context, $data);
    }

    public function getAlumno() {

        $crearAlumno = $this->insertAlumno('carlos', 'jimenez');

        return $this->cursoRepository->getById($crearAlumno);

    }

    public function insertAlumno($nombre, $apellido) {

        $alumno = $this->cursoInterfaceFactory->create();
        $alumno->setNombre($nombre);
        $alumno->setApellido($apellido);

        $this->cursoResource->save($alumno);
        return $alumno->getEntityId();

    }

}
