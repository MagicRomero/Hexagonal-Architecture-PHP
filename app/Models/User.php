<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $fillable = [
        'client_reference', 'role_name', 'firstname', 'lastname', 'email', 'phone', 'password', 'status', 'lang'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['fullname', 'created_at_human'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'client_reference' => 'exists:clients,alias',
        'role_name' => 'required|exists:roles,name',
        'firstname' => 'required|string|min:3|max:155',
        'lastname' => 'string|min:3|max:155',
        'email' => 'required|email',
        'phone' => 'string|regex: /^[0-9]{3,15}+$/',
        'password' => 'required|string',
        'lang' => "string|in:es,en",
        'status' => 'string|in,ACTIVE,PENDING,BLOCKED'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getCreatedAtHumanAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeByRoleAndClient($query, string $role_name, string $client_reference)
    {
        return $query->has('role')
            ->where([
                ['role_name', '=', $role_name],
                ['client_reference', '=', $client_reference]
            ])->get();
    }
}
