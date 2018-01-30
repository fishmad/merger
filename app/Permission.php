<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label', 'item_order', 'groupings', 'groupings_order', ];

    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Grant the given role to a permission.
     *
     * @param  Role $role
     *
     * @return mixed
     */
    public function giveRoleTo(Role $role)
    {
        return $this->roles()->save($role);
    }
}
