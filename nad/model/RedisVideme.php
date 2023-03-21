<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 12.11.17
 * Time: 1:22
 */

//include_once($_SERVER['DOCUMENT_ROOT'] . '/sendmail/sendmail.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/REDIS_URL.php');

class RedisVideme
{
    public function redisConnect()
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/nad/model/REDIS_URL.php';

        //try {
            /*$redis = new Predis\Client(array(
                'scheme' => 'tcp',
                'host' => 'ec2-18-207-82-91.compute-1.amazonaws.com',
                'port' => 10869,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ));*/
            /*$redis = new Predis\Client(array( 18112018
                'scheme' => 'tcp',
                'host' => 'ec2-100-24-199-242.compute-1.amazonaws.com',
                'port' => 9389,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ));*/
            /*$redis = new Predis\Client(array( // 15042019
                'scheme' => 'tcp',
                'host' => 'ec2-3-213-138-90.compute-1.amazonaws.com',
                'port' => 28449,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ));*/
            /*$redis = new Predis\Client([ // 29052019
                'scheme' => 'tcp',
                'host' => 'ec2-3-217-60-228.compute-1.amazonaws.com',
                'port' => 15739,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ]);*/
            /*$redis = new Predis\Client([ // 19072019
                'scheme' => 'tcp',
                'host' => 'ec2-34-227-45-168.compute-1.amazonaws.com',
                'port' => 10639,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ]);*/
            /*$redis = new Predis\Client([ // 25092019
                'scheme' => 'tcp',
                'host' => 'ec2-34-234-61-236.compute-1.amazonaws.com',
                'port' => 26179,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ]);*/
            /*$redis = new Predis\Client([ // 08102019
                'scheme' => 'tcp',
                'host' => 'ec2-3-229-104-36.compute-1.amazonaws.com',
                'port' => 26559,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ]);*/
            /*$redis = new Predis\Client([ // 09102019
                'scheme' => 'tcp',
                'host' => 'ec2-3-230-93-85.compute-1.amazonaws.com',
                'port' => 29619,
                'password' => 'pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715'
            ]);*/

        //$redis = new Predis\Client(getenv('REDIS_URL'));
        //https://stackoverflow.com/questions/2995461/save-php-variables-to-a-text-file
        //$redis = new Predis\Client('redis://h:pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715@ec2-3-230-93-85.compute-1.amazonaws.com:29619');
        //$redis = new Predis\Client('redis://h:pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715@ec2-3-211-161-199.compute-1.amazonaws.com:15989'); // 30102019
        //$redis = new Predis\Client("redis://h:pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715@ec2-52-1-179-111.compute-1.amazonaws.com:31589"); //07012020
        //$redis = new Predis\Client("redis://h:pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715@ec2-52-206-255-114.compute-1.amazonaws.com:10979"); //06022020
        //$redis = new Predis\Client("redis://h:pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715@ec2-34-238-58-29.compute-1.amazonaws.com:25449"); //05032020
        //$redis = new Predis\Client("redis://h:pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715@ec2-35-153-219-142.compute-1.amazonaws.com:16539"); //02042020
        //$redis = new Predis\Client("redis://h:pa39d047491d2aeb63b6924fb9128b22e9d4b710679a40061086ec6a0823f5715@ec2-35-168-243-201.compute-1.amazonaws.com:9139"); //30042020
        //$redis = new Predis\Client("redis://h:192.168.0.121:6379"); //08122022
        //$redis = new Predis\Client('tcp://192.168.1.121:6379'); //10122022
        //$redis = new Predis\Client('tcp://192.168.1.111:6379'); //16012023
        $redis = new Predis\Client('tcp://eu1.vide.me:6379'); //16012023
        /*$redis = new Predis\Client(array(
            "scheme" => "tcp",
            "host" => "redis-node-1",
            "port" => 6379,
            "password" => "Pilsner1",
            "persistent" => "1"));*/ // 26012023
        //include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/REDIS_URL.php');
        //print_r($redis_url);
        //$redis = new Predis\Client("$redis_url");
        //error_reporting(0); // Turn off error reporting
        //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors
        //$redis = new Predis\Client($redis_url); // TODO: not work login
        //$redis = new Predis\Client($redis_url); // work


        //print_r($redis);

        /*} catch (Exception $e) {
            //header('HTTP/1.1 500 Internal Server Error', true, 500);
            //echo $e->getMessage();

            echo "\n\r======================================================\n\r";
            echo "\n\rRedis redisConnect Predis\Client error: " . $e . "\n\r";
            echo "\n\r======================================================\n\r";
            /!*$sendmail = new sendmail();
            $sendmail->SendStaffAlert(['message' => "Redis redisConnect Predis\Client error: " . $e]);

            $log = new log();
            $log->toFile(['service' => 'redis', 'type' => 'error', 'text' => $e]);*!/
            exit;
        }*/
        return $redis;
        //return $redis_url;
    }
    public function redisRepair()
    {
        /*$redis_url = file_get_contents('http://vide.herokuapp.com/system/test/redis_var.php');

        $file_reids_url = $_SERVER['DOCUMENT_ROOT'] . '/nad/model/REDIS_URL.php';
        // Открываем файл для получения существующего содержимого
        $current = file_get_contents($file_reids_url);
        //echo $current;
        // Добавляем нового человека в файл
        //$current .= "\n\r" . '$redis_url = "' . $redis_url . '"; //' . date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
        $current .= "\n\r" . '$redis_url = "' . $redis_url . '"; //' . date("D M j G:i:s T Y");
        // Пишем содержимое обратно в файл
        file_put_contents($file_reids_url, $current);*/
    }

}