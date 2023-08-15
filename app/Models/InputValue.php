<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputValue extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'input_values'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
