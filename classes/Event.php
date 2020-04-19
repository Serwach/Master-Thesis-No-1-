<?php

class Event {

    public $arrivalTime;
    public $startServiceTime;
    public $stopServiceTime;
    public $isServed;
    public $currentState;  //1-arrived, 2-service start, 3-service stop
    public $serviceTime;

    public function setArrivalTime($timeValue) {
        $this->arrivalTime = $timeValue;
    }

    public function setStartServiceTime($timeValue) {
        $this->startServiceTime = $timeValue;
    }

    public function setStopServiceTime($timeValue) {
        $this->stopServiceTime = $timeValue;
    }

    public function setServiceTime($timeValue) {
        $this->serviceTime = $timeValue;
    }

    public function setIsServed($value) {
        $this->isServed = $value;
    }

    public function setCurrentState($value) {
        $this->currentState = $value;
    }

    public function getArrivalTime() {
        return $this->a;
    }

    public function getStartServiceTime() {
        return $this->b;
    }

    public function getServiceTime() {
        return $this->serviceTime;
    }

    public function getStopServiceTime() {
        return $this->c;
    }

    public function getIsServed() {
        return $this->isServed;
    }

    public function getCurrentState() {
        return $this->currentState;
    }

    public function __toString() {
        echo "arrival time          = " . $this->getArrivalTime() . "<br>";
        echo "start-service time    = " . $this->getStartServiceTime() . "<br>";
        echo "service time          = " . $this->getServiceTime() . "<br>";
        echo "current state         = " . $this->getCurrentState() . "<br>";
        echo "is served             = " . $this->getIsServed() . "<br><br>";
    }

}
