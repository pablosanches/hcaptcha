<?php

namespace PabloSanches;

class Response {

    private $response;
    private $errors = [];
    private $raw = null;
    private $success = false;

    public function __construct($response)
    {
        $this->response = $response;
        $this->raw = $this->response->getResponse();
        $jsonPayload = json_decode($this->getRaw(), true);
        $this->success = $jsonPayload['success'];

        if (!$this->success) {
            $this->errors = array_merge($this->errors, $jsonPayload['error-codes']);
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getRaw()
    {
        return $this->raw;
    }

    public function isHuman()
    {
        return $this->success;
    }
}