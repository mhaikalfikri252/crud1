<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public $table = "mahasiswa";
    public $incrementing = false;

    protected $guarded = [];
    protected $primaryKey = "nim";
    protected $keyType = "string";
}
