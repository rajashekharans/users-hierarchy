<?php

namespace UserHierarchy\DTO;

class UserHierarchyCollection
{
    private $roles;
    private $users;

    public function setRoles(array $roles): array
    {
        foreach ($roles as $role) {
            $this->roles[] =
                new Role(
                    $role['Id'],
                    $role['Name'],
                    $role['Parent']
                );
        }

        return $this->roles;
    }

    public function setUsers(array $users): array
    {
        foreach ($users as $user) {
            $this->users[] =
                new User(
                    $user['Id'],
                    $user['Name'],
                    $user['Role']
                );
        }

        return $this->users;
    }

    public function areWeRelated(int $parent, int $child): bool
    {
        $childParent = -1;

         // Loop through roles to get the parent of the $child
        foreach($this->roles as $role) {
            if ($role->getId() == $child) {
                $childParent = $role->getParent();
                break;
            }
        }

        // Return false, since $child is root
        if ($childParent == 0) {
            return false;
        }

        // Returns true, if $child parent is equal to $parent
        if ($childParent == $parent) {
            return true;
        }

        // Since $parent is not the parent of $child
        // lets check if child's parent $childParent is parent of $parent
        return $this->areWeRelated($parent, $childParent);
    }

    public function getSubordinates(int $userId): string
    {
        $subordinates = [];

        $current_role = -1;

        foreach($this->users as $user) {
            if ($user->getId() == $userId) {
                $current_role = $user->getRole();
                break;
            }
        }

        foreach($this->users as $user) {
            // checking if $user role is related to $current_role, if true, $user is subordinate
            if ($this->areWeRelated($current_role, $user->getRole())) {
                $subordinates[] = $user->jsonSerialize();
            }
        }

        return json_encode($subordinates);
    }
}
