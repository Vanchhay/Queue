<?php

require_once __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/Job/DummyJob.php';
include __DIR__ . '/Job/DummyFailingJob.php';

use Libcast\JobQueue\Task;
use Predis\Client;
use Libcast\JobQueue\Queue\QueueFactory;
use Libcast\JobQueue\TestJob;

$redis = new Client('tcp://localhost:6379');
 $i = 1;
while($i <= 50){
    $queue = QueueFactory::build($redis);

    $task = new Task(new TestJob\DummyJob, 'dummy', ['request 2']);

    $queue->enqueue($task);
    echo $i.'\n';
    $i++;
}


echo 'Done\n\n';
