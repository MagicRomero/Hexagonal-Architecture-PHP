<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'name';

    protected $fillable = ['name', 'description', 'abilities'];

    protected $appends = ['name_translated'];

    protected $casts = [
        'abilities' => 'array'
    ];

    const SUPERADMIN = 'superadmin';
    const ADMIN = 'admin';
    const NORMAL = 'normal';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function getNameTranslatedAttribute()
    {
        return trans("roles.names.{$this->name}", app()->getLocale() ?? 'es');
    }

    public function can(string $ability): bool
    {
        return in_array($ability, $this->abilities);
    }

    public static function availableRoles(): array
    {
        return [self::SUPERADMIN, self::ADMIN, self::NORMAL];
    }
}
