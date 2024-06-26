<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
         'title', 'cover', 'year', 'publisher_id', 'authors_id'
    ];

    public function authors() {
        return $this->belongsTo(Authors::class);
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }
}
