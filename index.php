<?php

require 'classes/Event.php';
require 'classes/Server.php';
require 'classes/SystemQueue.php';

$queue = new SplQueue();
$servers = array();
$events = array();
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
    for ($i = 0; $i <= SystemQueue::NUMBER_OF_SERVERS; $i++) {
        $isNewEvent = rand(0, 1);

        if ($isNewEvent == 1) {

            $event = new Event();
            $event->setArrivalTime($time);
            $event->setCurrentState(0);
            $event->setIsServed('no');

            if ($mi <= SystemQueue::NUMBER_OF_SERVERS) {
                for ($i = 0; $i < sizeof($servers); $i++) {
                    if ($servers[$i]->getIsBusy() == 0) {
                        $actionTime = rand(0, 10) / 10;
                        $event->setServiceTime($actionTime);
                        $event->setStartServiceTime($time);
                        $event->setStopServiceTime($time + $actionTime);
                        $event->setIsServed('yes');
                        $event->setCurrentState(1);
                        $mi++;
                        $servers[$i]->setTime($time + $actionTime);
                    }
                }
            } else {
                $event->setCurrentState(-1);
                $event->setIsServed('waiting');
            }
            $queue->enqueue($event);

//            foreach ($queue as $event) {
//                if (is_null($event->getStopServiceTime()) &&  $time == $event->getStopServiceTime()) {
//                    print_r("Time = " . $time . " Serwer gotowy na kolejne zgłoszenie<br>");
//                    $servers[$i]->setIsBusy(0);
//                    $mi--;
//                }
//            }
        }



        if ($i == SystemQueue::NUMBER_OF_SERVERS) {
            $sleep = 0.1;
            sleep($sleep);
            $actionTime = $sleep;
            $time += $actionTime;
        }
    }
}

//print_r("<pre>");
//print_r($servers);
//print_r("</pre>");
print_r("<pre>");
print_r($queue);
print_r("</pre>");
die;
