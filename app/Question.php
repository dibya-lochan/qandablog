<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['questions'];
    
    public function answers(){
    	 return $this->hasMany('App\Answer', 'questions_id');
    }
}
