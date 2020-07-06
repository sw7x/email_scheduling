<?php

namespace Modules\EmailManager\Entities;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['title','user_id'];
    protected $table = 'batchs';
    public $timestamps = false;


    public function emailDetails()
    {
        return $this->hasMany('Modules\EmailManager\Entities\EmailDetail','batch_id','id');
    }


    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');

    }


    public function scheduledDetails()
    {
       // return $this->hasOne('App\Biker_foreign','id');
        return $this->belongsToMany('Modules\EmailScheduler\Entities\ScheduledAttachement',
                                    'schedule_batch',
                                    'batch_id',
                                    'schedule_detail_id')->withTimestamps();        

    }

}
