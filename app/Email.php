<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{


    public $fillable = ['name','contact_number','network_id','email','batch_id','user_id'];
}
