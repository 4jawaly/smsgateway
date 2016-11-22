<?php

namespace Jawaly\SmsGateway;

use Jawaly\SmsGateway\Gateway\JawalyGateway;
use Jawaly\SmsGateway\SmsLogModel;

class Jawaly
{

    private $username;
    private $password;
    private $from;
    private $to;
    private $jawaly;

    public function __construct($sender = null)
    {
        
        $this->jawaly = new JawalyGateway();
        if ($sender == null) {
            $this->from = config('jawaly.sender');
        } else {
            $this->from = $sender;
        }
        $this->username = config('jawaly.username');
        $this->password = config('jawaly.password');
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    public function send($message, $numbers = null, $sender = null)
    {
        if ($sender) {
            $this->from = $sender;
        }
        if ($numbers) {
            $this->to = $numbers;
        }
        $send = $this->jawaly->setUser($this->username, $this->password)
                ->setSender($this->from)
                ->setNumbers($this->to)
                ->setMessage($message)
                ->send();
        if (config('jawaly.save_log') == true) {
            $gateMessage = isset($send['message']) ? $send['message'] : '';
            SmsLogModel::addLog([
                'body' => $message,
                'numbers' => $this->to,
                'sender' => $this->from,
                'status' => $send['status'] ? 'success' : 'failed',
                'response' => $send['response'],
                'gate_message' => $gateMessage
                    ], config('jawaly.container'));
        }
    }

    public function getCredits()
    {
        $jawaly = JawalyGateway::getInstance();
        $balance = $this->jawaly->setUser($this->username, $this->password)->getBalance();
        if ($balance['status']) {
            return [true, $balance['response']];
        }
        return [false, $balance['message']];
    }

}
