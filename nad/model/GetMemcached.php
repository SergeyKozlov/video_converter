<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 30.10.17
 * Time: 9:18
 */

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

class GetMemcached
{
    public function __construct()
    {
    }

    public function getMemcached()
    {
        try {
            $mc = new Memcached();
            $mc->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
            $mc->addServer('memcached-12580.c15.us-east-1-2.ec2.cloud.redislabs.com', 12580);
            $mc->setSaslAuthData('sergey', 'memcached');
        } catch (Exception $e) {
            echo "" . $e->getMessage();
            return false;
        }
        return $mc;
    }
    public function getKey($key)
    {

    }

}