<?php

namespace UserHierarchy\Tests\Integration\Command;

use UserHierarchy\Command\UserHierarchyCommand;
use UserHierarchy\DTO\UserHierarchyCollection;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

class UserHierarchyCommandTest extends TestCase
{
    public function testExecutePrintsSuccessOutput(): void
    {
        $mockUserHierarchyCollection = $this->getMockBuilder(UserHierarchyCollection::class)
            ->disableOriginalConstructor()
            ->getMock();
        $command = new UserHierarchyCommand($mockUserHierarchyCollection);

        $tester = new CommandTester($command);
        $tester->execute([]);

        $this->assertStringContainsString('getSubordinates(3)', $tester->getDisplay());
        $this->assertStringContainsString('getSubordinates(1)', $tester->getDisplay());
    }
}