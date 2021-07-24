<?php

namespace App\Message;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\DTO\HealthdataDTO;

class Healthdata implements MessageHandlerInterface
{
    /**
     * Main consumer method
     *
     * @param HealthdataDTO $message
     * @return void
     */
    public function __invoke(HealthdataDTO $message)
    {
        error_log("dsdsdsdsdsadlj a,skdj lkjd lkjd lksa");
        die("for tour loveeee");
    }
}
