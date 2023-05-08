<?php

namespace App\ResponseObject;

class ResponseObject
{
    private $result;
    private $data;
    private $message;

    /**
     * @param $result
     * @param $data
     * @param $message
     */
    public function __construct($result, $data, $message)
    {
        $this->result = $result;
        $this->data = $data;
        $this->message = $message;
    }

    public function responseObject() {
        return array(
            'result' => $this->result,
            'message' => $this->message,
            'data' => $this->data
        );
    }

}
