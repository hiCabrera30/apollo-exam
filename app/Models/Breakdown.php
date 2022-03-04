<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model {
    use HasFactory;
    
    public $timestamps = false;

    public $fillable = ["value", "random_id"];

    protected $casts = [
        'random_id' => 'integer',
    ];

    public function random() {
        return $this->belongsTo(Random::class, "random_id");
    }

}
