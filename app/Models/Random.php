<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Random extends Model {
    use HasFactory;

    public $timestamps = false;

    public $fillable = ["value", "flag"];
    
    protected $casts = [
        'flag' => 'boolean',
    ];

    public function breakdowns() {
        return $this->hasMany(Breakdown::class, "random_id");
    }

    public function scopeIsNew($query) {
        return $query->where("flag", false);
    }

    public function createBreakdowns(array $breakdowns) {
        return $this->breakdowns()->createMany($breakdowns);
    }

}
