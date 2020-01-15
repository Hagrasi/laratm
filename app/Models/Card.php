<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{   
    protected $guarded = [];
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    
}
