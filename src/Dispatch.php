<?php

namespace Wilson\MonitorDispatch;

use \Hanson\Foundation\Foundation;


/**
 * Class Dispatch
 * @package Wilson\MonitorDispatch
 *
 * @method array tranChatInfo($params)
 */
class Dispatch extends Foundation
{
    private $chat;

    public function __construct($config)
    {
        parent::__construct($config);
        $this->chat = new Chat($config['gameId']);
    }

    public function __call($name, $arguments)
    {
        return $this->chat->{$name}(...$arguments);
    }
}