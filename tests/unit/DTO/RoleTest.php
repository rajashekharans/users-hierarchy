<?php

namespace UserHierarchy\Tests\Unit\DTO;

use UserHierarchy\DTO\Role;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    public function testsRoleIsCreatedCorrectly(): void
    {
        $role = new Role(2, 'Test Role', 1);

        $this->assertEquals(2, $role->getId());
        $this->assertEquals('Test Role', $role->getName());
        $this->assertEquals(1, $role->getParent());
    }
}