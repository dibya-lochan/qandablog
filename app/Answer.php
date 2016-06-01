<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

	protected $fillable = ['questions_id', 'answers', 'status'];
    
    public function question(){
    	return $this->belongsTo('App\Question');
    }
}
