<?php

namespace Hiberus\Curso\Controller\Index;

use Hiberus\Curso\Api\CursoRepositoryInterface;
use Hiberus\Curso\Api\Data\CursoInterfaceFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Hiberus\Curso\Model\ResourceModel\Curso;

class Index implements HttpGetActionInterface
{

    protected \Magento\Framework\View\Result\PageFactory $pageFactory;
    protected CursoRepositoryInterface $cursoRepository;
    protected CursoInterfaceFactory $cursoInterfaceFactory;
    protected Curso $cursoResource;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        CursoRepositoryInterface $cursoRepository,
        CursoInterfaceFactory $cursoInterfaceFactory,
        Curso $cursoResource

    ) {
        $this->pageFactory = $pageFactory;
        $this->cursoRepository = $cursoRepository;
        $this->cursoInterfaceFactory = $cursoInterfaceFactory;
        $this->cursoResource = $cursoResource;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }

    /**
     * @throws \Exception
     */
    public function insertAlumno($nombre, $apellido) {

        $alumno = $this->cursoInterfaceFactory->create();
        $alumno->setNombre($nombre);
        $alumno->setApellido($apellido);

        $this->cursoResource->save($alumno);
        return $alumno->getEntityId();

    }
}
