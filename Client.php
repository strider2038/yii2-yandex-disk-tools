<?php

namespace strider2038\yandexDiskTools;

use Yandex\Disk\DiskClient;

/**
 * Yii2 wrapper class for DiskClient
 * 
 * @see https://github.com/nixsolutions/yandex-php-library/wiki/Yandex-Disk
 * @author Igor Lazarev <strider2038@rambler.ru>
 */
class Client extends \yii\base\Component {
    
    /**
     * Access token for Yandex.Disk service
     * @var string
     */
    public $token;
    
    /**
     * @var Yandex\Disk\DiskClient
     */
    protected $client;

    /**
     * @inheritdoc
     * @throws \yii\base\Exception
     */
    public function init() {
        if (empty($this->token)) {
            throw new \yii\base\Exception('Empty token for Yandex.Disk service');
        }
        $this->client = new DiskClient($this->token);
        $this->client->setServiceScheme(DiskClient::HTTPS_SCHEME);
    }
    
    /**
     * Calls the method of original Yandex\Disk\DiskClient class
     * @param string $name
     * @param array $params
     * @return mixed
     * @throws UnknownMethodException
     */
    public function __call($name, $params)
    {
        if (method_exists($this->client, $name)) {
            return call_user_func_array([$this->client, $name], $params);
        }
        throw new UnknownMethodException('Calling unknown method: ' . get_class($this) . "::$name()");
    }
}
