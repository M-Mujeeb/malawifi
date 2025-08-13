<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileLink extends Model
{
    protected $fillable = ['user_id','type','label','data'];

    protected $casts = [
        'data' => 'encrypted:array',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
