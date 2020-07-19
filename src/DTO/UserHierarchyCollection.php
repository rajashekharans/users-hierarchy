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
         // Loop through roles to get the parent of the $child
        $childParent = $this->getParentOfChild($child);

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

        $currentRole = $this->getUserRole($userId);

        foreach($this->users as $user) {
            // checking if $user role is related to $current_role, if true, $user is subordinate
            if ($this->areWeRelated($currentRole, $user->getRole())) {
                $subordinates[] = $user->jsonSerialize();
            }
        }

        return json_encode($subordinates);
    }


    private function getUserRole(int $userId): int
    {
        $currentRole = -1;

        foreach ($this->users as $user) {
            if ($user->getId() == $userId) {
                $currentRole = $user->getRole();
                break;
            }
        }
        return $currentRole;
    }

    private function getParentOfChild(int $child): int
    {
        $childParent = -1;

        foreach ($this->roles as $role) {
            if ($role->getId() == $child) {
                $childParent = $role->getParent();
                break;
            }
        }
        return $childParent;
    }
}
