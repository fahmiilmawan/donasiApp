<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable =
    [
        'judul',
        'deskripsi',
        'target_donasi',
        'donasi_terkumpul',
        'tanggal_dimulai',
        'tanggal_berakhir',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
