<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpendingPlan extends Model
{
    protected $fillable = [
        'name', 'amount_spent', 'range_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->user;
    }
}
