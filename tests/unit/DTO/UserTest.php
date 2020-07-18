<?php

namespace UserHierarchy\Tests\Unit\DTO;

use UserHierarchy\DTO\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testsUserIsCreatedCorrectly(): void
    {
        $user = new User(2, 'Test User', 1);

        $this->assertEquals(2, $user->getId());
        $this->assertEquals('Test User', $user->getName());
        $this->assertEquals(1, $user->getRole());
    }
}