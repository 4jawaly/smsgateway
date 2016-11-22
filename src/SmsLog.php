<?php

namespace Jawaly\SmsGateway;

use Illuminate\Contracts\Logging\Log;
use Jawaly\SmsGateway\Models\SmsLog;

class SmsLog
{

    public static function addLog($data, $container)
    {
        if ($container == 'file') {
            Log::useFiles(storage_path() . '/logs/jawaly.log');
            $insert = Log::info(json_encode($data));
            return [true];
        } elseif ($container == 'database') {
            try {
                $insert = SmsLog::insert($data);
                return [true];
            } catch (\PDOException $ex) {
                return [false, $ex->getMessage()];
            }
        }
    }

}
