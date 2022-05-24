<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\MethodPay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function methodPay()
    {
        return $this->belongsTo(MethodPay::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
