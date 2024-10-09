<?php

namespace App\Enums\Role;

enum Permission: string
{
    // Permissions für die Teams
    case LIST_TEAM = 'list-team';
    case CREATE_TEAM = 'create-team';
    case EDIT_TEAM = 'edit-team';
    case DELETE_TEAM = 'delete-team';
    case SWITCH_TEAM = 'switch-team';

    // Permissions für die User
    case LIST_USER = 'list-user';
    case CREATE_USER = 'create-user';
    case EDIT_USER = 'edit-user';
    case DELETE_USER = 'delete-user';

    // Permissions für die Departments
    case LIST_DEPARTMENT = 'list-department';
    case CREATE_DEPARTMENT = 'create-department';
    case EDIT_DEPARTMENT = 'edit-department';
    case DELETE_DEPARTMENT = 'delete-department';


    public function group(): string
    {
        return match($this) {
            Permission::LIST_TEAM,
            Permission::CREATE_TEAM,
            Permission::EDIT_TEAM,
            Permission::DELETE_TEAM,
            Permission::SWITCH_TEAM => 'team',

            Permission::LIST_USER,
            Permission::CREATE_USER,
            Permission::EDIT_USER,
            Permission::DELETE_USER => 'user',

            Permission::LIST_DEPARTMENT,
            Permission::CREATE_DEPARTMENT,
            Permission::EDIT_DEPARTMENT,
            Permission::DELETE_DEPARTMENT => 'department',
        };
    }
}
