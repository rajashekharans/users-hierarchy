<?php

namespace UserHierarchy\Tests\Unit\DTO;


use UserHierarchy\DTO\UserHierarchyCollection;
use UserHierarchy\DTO\Role;
use UserHierarchy\DTO\User;
use PHPUnit\Framework\TestCase;

class UserHierarchyCollectionTest extends TestCase
{
    public function testSetRoles()
    {
        $collection = new UserHierarchyCollection();
        $result = $collection->setRoles($this->getSampleRolesArray());

        $this->assertEquals($result, $this->getSampleRolesObjectArray());
    }

    public function testSetUsers()
    {
        $collection = new UserHierarchyCollection();
        $result = $collection->setUsers($this->getSampleUsersArray());

        $this->assertEquals($result, $this->getSampleUsersObjectArray());
    }

    private function getSampleRolesArray(): array
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

    private function getSampleRolesObjectArray(): array
    {
        return [
            new Role(1, 'System Administrator', 0),
            new Role(2, 'Location Manager', 1),
            new Role(3, 'Supervisor', 2),
            new Role(4, 'Employee', 3),
            new Role(5, 'Trainer', 3),
        ];
    }

    private function getSampleUsersArray(): array
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

    private function getSampleUsersObjectArray(): array
    {
        return [
            new User(1, 'Adam Admin', 1),
            new User(2, 'Emily Employee', 4),
            new User(3, 'Sam Supervisor', 3),
            new User(4, 'Mary Manager', 2),
            new User(5, 'Steve Trainer', 5),
        ];
    }
}