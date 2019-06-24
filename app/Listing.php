<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
   protected $table = 'list';
 
   //protected $fillable = ['todo','category','user_id','description'];

   public function User($value='')
   {
    	return $this->belongsTo('App\User');
   }

}