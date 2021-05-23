<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{
    use HasFactory;
    protected $table = 'objects';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'PARENT_ID',
        'OBJECT_CODE',
        'OBJECT_URL',
        'OBJECT_NAME',
        'DESCRIPTION',
        'OBJECT_LEVEL',
        'status',
        'SHOW_MENU',
        'created_by',
        'updated_by',
    ];
}
