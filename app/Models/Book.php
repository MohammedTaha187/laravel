<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded =['id' , 'created_at' , 'updated_at'];

    public function cat(){
        return $this->belongsTo(Cat::class );
    }

}