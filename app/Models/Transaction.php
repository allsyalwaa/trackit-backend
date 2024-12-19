<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable=[
      'title',
      'amount',
        'balance_id'
    ];

    protected $hidden=[
        'updates_at'
    ];

    protected $appends=[
        'created_at_human'
    ];

    public function balance():BelongsTo
    {
        return $this->belongsTo(Balance::class);
    }

    public function createdAtHuman(): Attribute
    {
        return new Attribute(
            get: function (){
                return Carbon::parse($this->attributes['created_at'])->diffForHumans();
            }
        );
    }




}
