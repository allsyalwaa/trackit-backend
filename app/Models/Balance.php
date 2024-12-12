<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Balance extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'amount',
    ];

    public function transactions():HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
