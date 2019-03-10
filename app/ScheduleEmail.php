<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleEmail extends Model
{
    public $fillable = ['batch_id','subject','body_type','body','date'];

}
