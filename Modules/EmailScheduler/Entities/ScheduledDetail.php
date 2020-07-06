<?php

namespace Modules\EmailScheduler\Entities;

use Illuminate\Database\Eloquent\Model;

class ScheduledDetail extends Model
{
    protected $fillable = ['email','subject','emailBody','send_date'];
    public $timestamps = false;

    

    public function scheduledAttachements()
    {
        //return $this->belongsTo('Modules\EmailManager\Entities\Batch','batch_id','id');
        return $this->hasMany('Modules\EmailScheduler\Entities\ScheduledAttachement','schedule_details_id','id');
    }


    public function batchs()
    {
       // return $this->hasOne('App\Biker_foreign','id');
        return $this->belongsToMany('Modules\EmailManager\Entities\Batch',
                                    'schedule_batch',
                                    'schedule_detail_id',
                                    'batch_id')->withTimestamps();
          
         

    }




}
