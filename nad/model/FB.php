<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/sendmail/sendmail.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');

class FB
{
    //public $access_token = 'EAAX0GZC1jiZC0BAAQoyTHL9fcEuljlyk17IsCZBEB1SYIOBZApiJpqgwForwksHLZBy3tpcxtkSpXJiTZA8xcmTlMm1sNEjEgZAn6PpFrixzUNpvTqAyFZBWeJJrP9FY12liZAZBoZBqmhOu6Av5rgk5sWUvDk6N4WQRlZAVyfUUoETJhgZDZD';
    // 23062019
    public $access_token = 'EAAX0GZC1jiZC0BANVOVivHsDBowIXT4TWGPovMMpsFXk6ZBcifEeZACGSKhE5tAsDmHIEsKKXomMWFZAsOHpKZBisu8qgRcTFFgwZAUea3N4Dg0P7WzpFwT8nGtdCgL3zqpofkdI37PuG2q5tjAZAmuo9V5ro74dlMXGVOjQMvBOcwZDZD';
    //public $access_token = 'EAAX0GZC1j4WQRlZAVyfUUoETJhgZDZD';

    public function __construct()
    {
    }

    /**
     * @param mixed $access_token
     */
    public function setAccessToken($access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    function facebookDebugger($url)
    {
        // https://graph.facebook.com/v1.0/?id={Object_URL}&scrape=1
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v3.2/?id=' . urlencode($url) . '&scrape=1' . '&access_token=' . $this->getAccessToken());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resJSON = curl_exec($ch);
        $res = json_decode($resJSON);

        if (empty($res->url)) {
            echo "\n\r======================================================\n\r";
            echo "FB facebookDebugger error: ";
            echo "\n\r======================================================\n\r";
            $sendmail = new sendmail();
            $sendmail->SendStaffAlert(["FB facebookDebugger error: " . $resJSON]);
            return false;
        } else {
            return $res;
        }
    }
}