<?php

namespace Hiberus\Roman\Console;

use Hiberus\Roman\Block\Index;
use Hiberus\Roman\Model\Roman;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ExamCommand extends Command
{
    protected Index $block;
    protected Roman $mark;


    public function __construct(Index $block,
                                Roman $mark
    )
    {
        $this->block = $block;
        $this->mark = $mark;
        parent::__construct();
    }

    protected function configure()
    {

        $this->setName('hiberus:roman')
            ->setDescription('Mostrar examenes');
        parent::configure();

    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function execute(
        InputInterface  $input,
        OutputInterface $output
    )
    {
        $alumns = $this->block->getAlumn();
        foreach ($alumns as $alumn){
            $output->writeln('<info> ID: ' . $alumn->getEntityId() . ' | Name: ' . $alumn->getFirstname() . ' | Lastname: ' . $alumn->getLastname() . ' | Mark: ' . $alumn->getMark() . '</info>');
        }

    }

}
