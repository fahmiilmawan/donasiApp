<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'campaign_id',
        'nama_donatur',
        'email_donatur',
        'no_hp_donatur',
        'jumlah_donasi',
        'pesan',
        'status',
        'snap_token',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
