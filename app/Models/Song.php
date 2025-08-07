<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;



class Song extends Model
{
    use HasFactory;

    protected $table = 'song';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'lyrics',
        'composer',
        'arranger',
    ];
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}