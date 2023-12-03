<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HasRolesTrait
{

    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
}
