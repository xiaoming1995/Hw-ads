<?php


namespace Xinxi\HwAds;

use GuzzleHttp\Client;

/**
 * 华为请求客户端
 * Class Client
 * @package Xinxi\HwAds
 */
class HwClient
{
    /**
     * 网络类型
     * @var string[]
     */
    protected $networkType = [
        'Asia' => 'https://ads-dra.cloud.huawei.com',       // 亚非拉
        'Russia' => 'https://ads-drru.cloud.huawei.ru',     // 俄罗斯
        'Europe' => 'https://ads-dre.cloud.huawei.com'      // 欧洲
    ];

    /**
     * 默认亚非拉
     * @var string
     */
    protected $baseUrl = '';

    protected $header = [
        'Accept:application/json',
        'Content-Type:application/json',
    ];

    /**
     * @var array
     */
    private $guzzleOptions;

    public function __construct($token,$networkType = 'Asia')
    {
        $this->header[] = 'Authorization:Bearer ' . $token;
        $this->baseUrl = $this->networkType[$networkType];
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }
}