<?php

namespace App\Policies\BaseApp;

use App\Models\BaseApp\Department;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Department $department): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Department $department): bool
    {
    }

    public function delete(User $user, Department $department): bool
    {
    }

    public function restore(User $user, Department $department): bool
    {
    }

    public function forceDelete(User $user, Department $department): bool
    {
    }
}
