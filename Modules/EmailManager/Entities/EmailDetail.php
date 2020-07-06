<?php

namespace Modules\EmailManager\Entities;

use Illuminate\Database\Eloquent\Model;

class EmailDetail extends Model
{
    protected $fillable = ['email_id','name','number','email','batch_id'];
    public $timestamps = false;

    public static $createRules = [
        'email' => 'required|email',
    ];

    public function batchs()
    {
        return $this->belongsTo('Modules\EmailManager\Entities\Batch','batch_id','id');
    }






}
