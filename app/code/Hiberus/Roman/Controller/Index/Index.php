<?php
namespace Hiberus\Roman\Controller\Index;

use Hiberus\Roman\Api\RomanRepositoryInterface;
use Hiberus\Roman\Api\Data\RomanInterfaceFactory;
use Hiberus\Roman\Model\ResourceModel\Roman;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    protected PageFactory $pageFactory;
    protected RomanInterfaceFactory $romanInterfaceFactory;
    protected RomanRepositoryInterface $romanRepository;
    protected Roman $romanResource;

    public function __construct(Context $context,
                                PageFactory $pageFactory,
                                RomanRepositoryInterface $romanRepository,
                                RomanInterfaceFactory $romanInterfaceFactory,
                                Roman $romanResource)
    {
        $this->pageFactory = $pageFactory;
        $this->romanRepository = $romanRepository;
        $this->romanInterfaceFactory = $romanInterfaceFactory;
        $this->romanResource = $romanResource;

    }

    public function execute()
    {
        return $this->pageFactory->create();
    }

}
