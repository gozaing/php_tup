<?php

class MyMail {
    public $to;
    public $subject;
    public $message;

    private $headers = [];

    public function __set($name, $value) {
        $this->headers[$name] = $value;
    }

    public function __get($name) {
        return $this->headers[$name];
    }

    public function send() {
        $others = '';
        foreach ($this->headers as $key => $value) {
            $key = str_replace('_', '-', $key);
            $others .= "{$key}: {$value}\n";

        }

        mb_send_mail($this->to, $this->subject, $this->message, $others);
    }

}
