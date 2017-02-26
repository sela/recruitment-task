<?php
namespace AppBundle\Command;

use AppBundle\Data\CalculateValue;
use AppBundle\Output\factoryOutput;
use AppBundle\Service\fileType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\UsersCollection;
use Symfony\Component\Console\Input\InputOption;

class ParseCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('sela:file')
            ->addOption('input', null, InputOption::VALUE_REQUIRED, 'The input filename')
            ->addOption('output', null, InputOption::VALUE_OPTIONAL,
                'Optional output filename, by detault write to stdout')
            ->setDescription('Command line tool to perform operation on data.')
            ->setHelp('Perform operation on xml, csv or yml file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fileType = new fileType($input->getOption('input'));
        $fileType->setCollectionType(new UsersCollection());

        $fileImporter = $fileType->getFileType()->getServiceName();
        $fileImporter->load($input->getOption('input'));
        $fileImporter->deserialize();
        $users = $fileImporter->getUsers();

        $calculateObject = new CalculateValue($users);
        $value = $calculateObject->getValue();

        $stdoutFactory = new factoryOutput($input->getOption('output'));
        $stdout = $stdoutFactory->createObject();
        $stdout->write($value);
    }
}