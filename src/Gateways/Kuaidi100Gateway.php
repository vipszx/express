<?php

namespace Vipszx\Express\Gateways;

use Vipszx\Express\Contracts\PackageInterface;
use Vipszx\Express\Exceptions\GatewayErrorException;
use Vipszx\Express\Exceptions\HttpException;
use GuzzleHttp\Client;

class Kuaidi100Gateway extends Gateway
{
    const ROOT_URL = 'https://poll.kuaidi100.com/';
    const QUERY_URL = self::ROOT_URL . 'poll/query.do';
    const SUBSCRIBE_URL = self::ROOT_URL . 'poll';

    protected $appKey;
    protected $customer;

    public function __construct($appKey, $customer)
    {
        $this->appKey = $appKey;
        $this->customer = $customer;
    }

    public function query(PackageInterface $package)
    {
        $param = [
            'com' => $package->getCompanyCode(),       //快递公司编码
            'num' => $package->getNumber(),            //快递单号
            'phone' => $package->getReceiverContact(), //手机号
            'from' => $package->getSenderAddress(),    //出发地城市
            'to' => $package->getReceiverAddress(),    //目的地城市
            'resultv2' => '1'                          //开启行政区域解析
        ];

        $postData['customer'] = $this->customer;
        $postData['param'] = json_encode($param);
        $postData['sign'] = $this->sign($postData['param']);

        return $this->httpRequest(self::QUERY_URL, $postData);
    }

    public function subscribe(PackageInterface $package, string $callbackUrl)
    {
        $param = [
            'company' => $package->getCompanyCode(), //快递公司编码
            'number' => $package->getNumber(),       //快递单号
            'from' => $package->getSenderAddress(),  //出发地城市
            'to' => $package->getReceiverAddress(),  //目的地城市
            'key' => $this->appKey,                  //客户授权key
            'parameters' => [
                'callbackurl' => $callbackUrl,          //回调地址
//                'salt' => '',                 //加密串
                'resultv2' => '1',            //行政区域解析
//                'autoCom' => '0',             //单号智能识别
//                'interCom' => '0',            //开启国际版
//                'departureCountry' => '',     //出发国
//                'departureCom' => '',         //出发国快递公司编码
//                'destinationCountry' => '',   //目的国
//                'destinationCom' => '',       //目的国快递公司编码
//                'phone' => ''                 //手机号
            ],
        ];

        $postData['schema'] = 'json';
        $postData['param'] = json_encode($param);

        return $this->httpRequest(self::SUBSCRIBE_URL, $postData);
    }

    public function sign($param): string
    {
        return strtoupper(md5($param . $this->appKey . $this->customer));
    }

    protected function httpRequest($url, $postData)
    {
        $client = new Client();
        try {
            $response = $client->post($url, ['form_params' => $postData]);
            $response = json_decode($response->getbody()->getContents(), true);
        } catch (\Exception $e) {
            throw new HttpException('Http Error');
        }

        if (isset($response['result']) && $response['result'] == false) {
            throw new GatewayErrorException($response['message'], $response['returnCode'], $response);
        }

        return $response;
    }
}
