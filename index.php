<?php

require 'classes/Event.php';
require 'classes/Server.php';
require 'classes/SystemQueue.php';

$servers = array();
$events = array();
$now = time();
$sigma = 0;
$time = 0;
$mi = 0;
srand(time());

for ($i = 0; $i < SystemQueue::NUMBER_OF_SERVERS; $i++) {
    $servers[$i] = new Server();
    $servers[$i]->setIsBusy(0);
    $servers[$i]->setServerNumber($i);
}

while ($time < 1) {
    for ($i = 0; $i < SystemQueue::NUMBER_OF_SERVERS; $i++) {

        if ($time == $servers[$i]->getTime()) {
            $servers[$i]->setIsBusy(0);
            $servers[$i]->setTime(0);
        }

        $isNewEvent = rand(0, 1);

        if ($isNewEvent == 1) {
            $event = new Event();
            $event->setArrivalTime(microtime(true));
            $event->setCurrentState(0);
            $event->setIsServed('no');
            array_push($events, $event);
            if ($mi < SystemQueue::NUMBER_OF_SERVERS) {  
                for ($i = 0; $i < sizeof($servers); $i++) {
                    if ($servers[$i]->getIsBusy() == 0) {
                        $actionTime = rand(0, 10) / 10;
                        $servers[$i]->setTime($time + $actionTime);
                        $servers[$i]->printServer();

                        $event->setServiceTime($actionTime);
                        $event->setCurrentState(1);

                        $mi++;
                    }
                }
            } else {
                echo "all servers are busy now<br><br>";
                $event->setCurrentState(-1);
                $event->setIsServed('waiting');
            }
        }

        $sleep = 0.1;
        sleep($sleep);
        $actionTime = $sleep;
        $time += $actionTime;
        echo $time . '<br>';
        $servers[$i]->printServer();
    }
}