<?php
require_once(dirname(dirname(__FILE__)).'/mns-autoloader.php');

use AliyunMNS\Client;

use AliyunMNS\Requests\ListQueueRequest;

class Queue 
{
    private $accessId;
    private $accessKey;
    private $endPoint;
    private $client;

    public function __construct($accessId, $accessKey, $endPoint)
    {
        $this->accessId = $accessId;
        $this->accessKey = $accessKey;
        $this->endPoint = $endPoint;
    }

    public function run() 
    {
        $this->client = new Client($this->endPoint, $this->accessId, $this->accessKey);
        $listQueueRequest = new ListQueueRequest();
        $q = $this->client->listQueue($listQueueRequest);

        var_dump($q);
        

    }
    //$queueName = "CreateQueueAndSendMessageExample";

}

$accessId = "";
$accessKey = "";
$endPoint = "";

if (empty($accessId) || empty($accessKey) || empty($endPoint))
{
    echo "Must Provide AccessId/AccessKey/EndPoint to Run the Example. \n";
    return;
}

$instance = new  Queue($accessId, $accessKey, $endPoint);
$instance->run();
