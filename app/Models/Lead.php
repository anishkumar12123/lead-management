<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
      protected $fillable = [
        'name',
        'email',
        'phone',
        'enquiry_for',
        'address',
        'lead_type',
        'status',
        'lead_given_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
