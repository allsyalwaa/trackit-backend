<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable=[
      'title',
      'amount',
    ];

    public function balance():BelongsTo
    {
        return $this->belongsTo(Balance::class);
    }
}
