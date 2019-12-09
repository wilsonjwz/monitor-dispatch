<?php

namespace Wilson\MonitorDispatch;

class Api extends \Hanson\Foundation\AbstractAPI
{
    private $gameId;

    const URL = '183.60.191.99:9223';

    public function __construct(int $gameId)
    {
        $this->gameId = $gameId;
    }

    public function request(string $method, array $params)
    {
        $params = array_merge($params, [
            'gameId' => $this->gameId
        ]);

        $params['sign'] = $this->signature($params);
        $http = $this->getHttp();
        $response = $http->post(self . self::URL . $method, $params);
        $result = json_decode(strval($response->getBody()), true);
        $this->checkErrorAndThrow($result);

        return $result;
    }


    public function signature(array $params)
    {
        return '';
    }

    private function checkErrorAndThrow($result)
    {
        if (!$result || $result['ret'] != 1) {
            throw new MonitorException($result['msg'], $result['code']);
        }
    }
}