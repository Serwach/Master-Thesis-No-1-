<?php

class Server {

    public $serverNumber;
    public $isBusy;
    public $time;

    public function __construct() {
        $this->isBusy = 0;
        $this->time = 0;
    }

    public function setIsBusy($value) {
        $this->isBusy = $value;
    }

    public function getIsBusy() {
        return $this->isBusy;
    }

    public function setTime($value) {
        $this->time = $value;
    }

    public function getTime() {
        return $this->time;
    }

    public function setServerNumber($value) {
        $this->serverNumber = $value;
    }

    public function getServerNumber() {
        return $this->serverNumber;
    }

    public function __toString() {
        echo "SERWER NR " . $this->getServerNumber() . " JEST " . $this->isBusy . " DO " . $this->time . "<br>";
    }

}
