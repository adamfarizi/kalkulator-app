<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;

    protected $table = 'perhitungans';
    protected $primaryKey = 'id_perhitungan';
    public $timestamps = true;
    protected $fillable = [
        'a',
        'operasi',
        'b',
        'hasil',
    ];

}
