<?php

namespace Modules\EmailScheduler\Entities;

use Illuminate\Database\Eloquent\Model;

class ScheduledAttachement extends Model
{
    protected $fillable = ['path','schedule_details_id'];    
    public $timestamps = false;

    

    public function scheduledDetails()
    {
        //return $this->belongsTo('Modules\EmailManager\Entities\Batch','batch_id','id');
        return $this->belongsTo('Modules\EmailScheduler\Entities\ScheduledDetail','schedule_details_id','id');
    }

}
