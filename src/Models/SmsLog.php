<?php

namespace Jawaly\SmsGateway\Models;

use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{

    protected $table = 'sms_log';
    protected $fillable = ['body', 'numbers', 'status', 'gate_message', 'response', 'sender'];

}
