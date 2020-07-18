<?php

namespace UserHierarchy\DTO;


class Role
{
    private $id;
    private $name;
    private $parent;

    public function __construct($id, $name, $parent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent = $parent;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParent(): int
    {
        return $this->parent;
    }
}
