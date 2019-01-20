<?php

namespace App\Services\SDK;


class Client
{
    private $phoneNumber;

    private $comment;

    private $files = [];

    /**
     * Client constructor.
     * @param $clientId
     * @param $phoneNumber
     * @param $comment
     * @param $files
     */
    public function __construct($phoneNumber, $comment, $files) {
        $this->phoneNumber = $phoneNumber;
        $this->comment = $comment;
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getComment() {
        return $this->comment;
    }

    /**
     * @return array
     */
    public function getFiles() {
        return $this->files;
    }
}
