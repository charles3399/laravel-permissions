<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRoles extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email_address',
        'role_id',
        'nominated_password',
        'confirmed_password'
    ];

    public function roles() {
        return $this->hasOne(Role::class, "id");
    }
}
