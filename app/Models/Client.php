<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $primaryKey = 'alias';

    protected $fillable = ['name', 'alias', 'description', 'email', 'token', 'active'];

    public $incrementing = false;

    public static $rules = [
        'name' => 'required|string|max:200',
        'alias' => 'required|regex:/^[\S]+$/', //Permite cualquier caracter excepto espacios en blanco
        'description' => 'nullable|string|max:255',
        'email' => 'required|email',
        'token' => 'nullable|string',
        'active' => 'boolean'
    ];
}
