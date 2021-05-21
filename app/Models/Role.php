<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'ROLE_CODE',
        'ROLE_NAME',
        'DESCRIPTION',
        'status',
        'created_by',
        'updated_by'
    ];
}
