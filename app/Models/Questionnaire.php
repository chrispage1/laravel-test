<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
