<?php

namespace Libcast\JobQueue\TestJob;

use Libcast\JobQueue\Job\AbstractJob;
use Libcast\JobQueue\Job\JobInterface;
use \Predis\Client;

class DummyJob extends AbstractJob implements JobInterface
{
    public function perform()
    {
        // $redis = new Client('tcp://localhost:6379');
        // $redis->set('test', 'test');
        // do dummy stuff...
        $duration = ceil($this->getParameter('progress', 'In Progress'));
        // $param = $this->getParameters();
        // echo (json_encode($param));
        // for ($i=0; $i<$duration; $i++) {
        //     $this->setTaskProgress($i / $duration);
        //     sleep(1);
        // }
        echo "Job Performed ! : ".$duration;

        return true;
    }
}
