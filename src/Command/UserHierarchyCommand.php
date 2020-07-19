<?php

namespace UserHierarchy\Command;

use UserHierarchy\DTO\UserHierarchyCollection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserHierarchyCommand extends Command
{
    private $userHierarchyCollection;

    public function __construct(UserHierarchyCollection $userHierarchyCollection)
    {
        parent::__construct();

        $this->userHierarchyCollection = $userHierarchyCollection;
    }

    protected function configure(): void
    {
        $this
            ->setName('app:run')
            ->setDescription('Runs User Hierarchy App');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->writeln('Setting up roles...');
        $this->userHierarchyCollection->setRoles($this->getRoles());


        $output->writeln('Setting up users...');
        $this->userHierarchyCollection->setUsers($this->getUsers());

        $subordinates = $this->userHierarchyCollection->getSubordinates(3);
        $output->writeln(
            sprintf('%s getSubordinates(3) = %s %s', PHP_EOL, PHP_EOL, $subordinates)
        );

        $subordinates = $this->userHierarchyCollection->getSubordinates(1);
        $output->writeln(
            sprintf('%s getSubordinates(1) = %s %s %s', PHP_EOL, PHP_EOL, $subordinates, PHP_EOL)
        );
    }

    private function getRoles(): array
    {
        return [
            [
                'Id' => 1,
                'Name' => 'System Administrator',
                 'Parent' => 0,
            ],
            [
                'Id' => 2,
                'Name' => 'Location Manager',
                'Parent' => 1,
            ],
            [
                'Id' => 3,
                'Name' => 'Supervisor',
                'Parent' => 2,
            ],
            [
                'Id' => 4,
                'Name' => 'Employee',
                'Parent' => 3,
            ],
            [
                'Id' => 5,
                'Name' => 'Trainer',
                'Parent' => 3,
            ],
        ];
    }

    private function getUsers(): array
    {
        return [
            [
                'Id' => 1,
                'Name' => 'Adam Admin',
                'Role' => 1,
            ],
            [
                'Id' => 2,
                'Name' => 'Emily Employee',
                'Role' => 4,
            ],
            [
                'Id' => 3,
                'Name' => 'Sam Supervisor',
                'Role' => 3,
            ],
            [
                'Id' => 4,
                'Name' => 'Mary Manager',
                'Role' => 2,
            ],
            [
                'Id' => 5,
                'Name' => 'Steve Trainer',
                'Role' => 5,
            ],
        ];
    }
}
