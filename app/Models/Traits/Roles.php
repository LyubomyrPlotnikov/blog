<?php

namespace App\Models\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait HasRole
 *
 */
trait Roles
{
    /**
     * Check if the user has a role
     *
     * @param string $role
     *
     * @return boolean
     */
    public function hasRole($role): bool
    {
        return $this->roles->where('name', $role)->isNotEmpty();
    }

    /**
     * Check if the user has role admin
     *
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(Role::ROLE_ADMIN);
    }

    /**
     * Return the user's roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
