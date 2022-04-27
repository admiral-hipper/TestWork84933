<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','rating','subject','start_of_work'
    ];
    public function students(){
        return $this->belongsToMany(Students::class)->withPivot('is_curator');
    }
}
