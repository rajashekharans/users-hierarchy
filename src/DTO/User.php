<?php

namespace UserHierarchy\DTO;

class User
{
    private $id;
    private $name;
    private $role;

    public function __construct($id, $name, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function jsonSerialize(): array
    {
        return [
            'Id' => $this->getId(),
            'Name' => $this->getName(),
            'Role' => $this->getRole(),
        ];
    }
}
