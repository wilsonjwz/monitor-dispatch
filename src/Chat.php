<?php

namespace Wilson\MonitorDispatch;

class Chat extends Api
{
    public function tranChatInfo(array $params)
    {
        return $this->request("", $params);
    }
}