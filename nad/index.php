<?php
################################################################################
################################################################################
###  ###  ####   ####      ####     ####     ####     ###  ###  ##  ##       ###
###   ##  #### # ####  ##   ##  ###  ##  ###  ##  ###  ##  #  ########  ########
###  # #  ### ### ###  ###  ##  #######  ###  ##  ###  ##    #####  ##    ######
###  ##   ###     ###  ##   ##  ###  ##  ###  ##  ###  ##  #  ####  ##  ########
###  ###  ##  ###  ##      ####     ####     ####     ###  ###  ##  ##       ###
################################################################################
################################################################################


// Загрузчик predis
// https://github.com/nrk/predis
require($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

//include_once($_SERVER['DOCUMENT_ROOT'] . '/Predis/Autoloader.php');
//Predis\Autoloader::register();
//include_once($_SERVER['DOCUMENT_ROOT'] . '/parsecom/parse.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/rackspace/vendor/autoload.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/pas/html/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/sendmail/sendmail.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/system/sync/parsesync.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/DynamoDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/PostgreSQL.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/PG_insight.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/GetMemcached.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/RedisVideme.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/Model.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/View.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHtml.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/Controller.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/article/article.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/Trends.php');


header('Access-Control-Allow-Origin: *');
//Так не работает логин header('Access-Control-Allow-Origin: https://vide.me');
//$log = new log();

//error_reporting(-1); // Добавлять в отчет все PHP ошибки


error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//Now beta branch

/**
 * Class NAD
 */
class NAD
{
    //private $log;
    public function __construct(/*log $log*/)
    {
        $this->setOriginVideoVideMe('https://video.videcdn.net/');
        $this->setOriginImgVideMe('https://img.videcdn.net/');
        $this->setOriginPreImageW320VideMe('https://pre-image-w320.videcdn.net/');
        $this->setOriginPreVideoW320VideMe('https://pre-video-w320.videcdn.net/');
        $this->setOriginSpriteW120VideMe('https://sprite-w120.videcdn.net/');
        $this->setOriginStaticVideMe('https://static.videcdn.net/');

        if (!extension_loaded('couchbase')) {
            //exit('error db');
            /*if (!dl('couchbase.so')) {
                exit;
            }*/
        }
        //$this->stack = true;
        $this->stack = false;

        $this->authorArray = ["e185775fc4f5", "9ecd2bff590e", "84dfe0e9a11c", "cf3bc9c40036", "8d68c9055b98", "b8ab3fecea1e", "c7a22d4c04c7"];

        $this->type = "type";
        // type ========================================================================================
        $this->fileActivity = "fileActivity";
        $this->user = "user";
        $this->file = "file";
        $this->contactDirectory = "contactDirectory";
        $this->deletedFile = "deletedFile";
        $this->deletedFileActivity = "deletedFileActivity";
        $this->fileShow = "fileShow";
        $this->fileCountShow = "fileCountShow";
        $this->fileCouple = "fileCouple";
        $this->list = "list"; // multi
        $this->article = "article";
        $this->articleDraft = "articleDraft";
        $this->articleMostPopTags = "articleMostPopTags";

        // docType ========================================================================================
        $this->docType = [
            $this->fileActivity,
            $this->user,
            $this->file,
            $this->fileShow,
            $this->contactDirectory,
            $this->deletedFile,
            $this->deletedFileActivity,
            $this->fileCountShow,
            $this->fileCouple,
            $this->list,
            $this->article,
            $this->articleDraft,
            $this->articleMostPopTags
        ];

        $this->docId = "docId";
        $this->createdAt = "createdAt";
        $this->updatedAt = "updatedAt";

        // user ========================================================================================================
        $this->userEmail = "userEmail";
        $this->userPassword = "userPassword";
        $this->userDisplayName = "userDisplayName";
        $this->userFirstName = "userFirstName";
        $this->userLastName = "userLastName";
        $this->userLink = "userLink";
        $this->userGender = "userGender";
        $this->userLocale = "userLocale";
        $this->userPicture = "userPicture";
        $this->spring = "spring";
        $this->facebook = "facebook";
        $this->google = "google";
        $this->microsoft = "microsoft";

        $this->socialId = "socialId";
        $this->socialPrefix = "socialPrefix";

        $this->limit = "limit";

        // file ========================================================================================================
        //$this->file = "file";
        $this->ownerId = "ownerId";
        $this->subject = "subject";
        $this->message = "message";
        $this->videoDuration = "videoDuration";
        $this->listId = "listId";
        $this->countShow = "countShow";
        $this->tags = "tags";

        // article
        $this->tag = "tag";
        $this->cnt = "cnt";

        // list ========================================================================================================
        $this->imageBrand = "imageBrand";

        // fileActivity ========================================================================================================
        $this->fromUserId = "fromUserId";
        $this->toUserId = "toUserId";
        $this->oldFromUserId = "oldFromUserId";
        $this->oldToUserId = "oldToUserId";
        $this->fromUserName = "fromUserName";
        $this->toUserName = "toUserName";
        // Conference
        $this->recipients = "recipients";
        //$this->conference = "conference";
        $this->conferenceId = "conferenceId";
        $this->inReplyTo = "inReplyTo";
        $this->read = "read";

        // fileShow ========================================================================================================
        $this->userId = "userId";
        $this->IP = "IP";

        // pas ========================================================================================================
        $this->newUserPassword = "newUserPassword";
        $this->ownerId = "ownerId";


        $this->sendMail = "sendMail";
        $this->ticket = "ticket";
        $this->nad = "nad";
        $this->fromEmail = "fromEmail";
        $this->name = "name";
        $this->userToken = "userToken";

        $this->errorReporting = "0"; // Turn off error reporting
        //$this->errorReporting = "E_ALL"; // Report all errors

        //$this->ps = new parseSync(); // если включить - сервер помрёт

        //=$this->nadtemp = "/var/www/nadtemp/";
        //05022023 $this->nadtemp = "/usr/share/nginx/nadtemp/";
        $this->nadtemp = "/usr/share/nginx/nadtemp/";
        //$this->nadtemp = "/var/www/html/ext/";
        $this->nadlogs = "/usr/share/nginx/nadlogs/";
        ///$this->videoDir = $_SERVER['DOCUMENT_ROOT'] . "/var/www/video/";
        //$this->videoDir = $_SERVER['DOCUMENT_ROOT'] . "/var/www/html/pas/zVxvCeKtgvXB9xTr";
        $this->cm_nadtemp = "/usr/share/nginx/nadtemp/";
        //=$this->videoDir = "/var/www/nadtemp/";
        //$this->videoDir = "/usr/share/nginx/nadtemp/";

        $this->log = new log();  // если включить - сервер помрёт
        //$this->log = $log;

        $this->classBucket = [ // Это часть sync
            "FileActivity" => "file",
            "User" => "user",
            "File" => "file",
            "FileShow" => "file",
            "ContactDirectory" => "properties",
            "DeletedFile" => "file",
            "DeletedFileActivity" => "file",
            "FileCountShow" => "file",
            "FileCouple" => "file",
            "List" => "properties"
        ];


        // messageType =============================================================
        $this->empty = "empty";
        $this->busy = "busy";
        $this->set = "set";
        $this->false = "false";
        $this->forgery = "forgery";
        $this->sendmail = "sendmail";
        $this->checkdone = "checkdone";
        $this->upcdn = "upcdn";
        $this->API = "API";
        $this->OA = "OA";
        $this->free = "free";
        $this->login = "login";
        $this->change = "change";
        $this->cookie = "cookie";
        $this->ffmpeg = "ffmpeg";
        $this->couchbase = "couchbase";
        $this->cmtotwitter = "cmtotwitter";
        $this->cmtofacebook = "cmtofacebook";
        $this->cmtolinkedin = "cmtolinkedin";

        $this->messageType = [
            $this->empty,
            $this->busy,
            $this->set,
            $this->false,
            $this->forgery,
            $this->sendmail,
            $this->checkdone,
            $this->upcdn,
            $this->API,
            $this->OA,
            $this->free,
            $this->login,
            $this->change,
            $this->cookie,
            $this->ffmpeg,
            $this->couchbase,
            $this->cmtotwitter,
            $this->cmtofacebook,
            $this->cmtolinkedin
        ];

        $this->subscribers = ['a162bcf65384', '06bc4ade548d', '0707eeb284cf', '6181daa3a957', 'ff3fa4b895b0', '43d12e2368b2', '5a639fba3655', 'f7c3772ee965', '2b9fe1b46139', '47a2bc0b711c', '8d48b966e6e7', 'a80a3c561ea6', 'cee467e42482', '838dae32e713', 'c291085a4185', '56a316e3bd05', 'b09b26ea296e', '82288c40196c'];
        $this->subscribersTrue = ['3d57db5f2a16', '73012745e0af', '912ec7caf28f', 'b08b4c526429', '143a3ce7d40e', 'e678369e4fc0', '205fb9a3cc2a', '9def3c762599', 'be0c0dbd7b7d', 'f8b94dd0bf9a', '18171bb149ec', 'ce8234c7f37c', '43b53e9365b7', '5edb133b3c3f', '38aa3557e08f', '119aae042de9', 'ac114825bde5', '29c130f25d28', '74780e023220', 'c6456577fee3', 'a1c2eb82de71', 'b3234a0ed8f2', 'd4c419cc3838', 'b975cc73be05', '015bdc01f0ea', 'da4f7164e7ef', 'e46c62b076e4', '97d891075f23', 'efee9878c349', '00e73ddc6897', 'e89593355039', '6ef38e448268', '5c278c252376', '75474550a3c3', '7bcd1e7fd51e', '4aba4e9fa76b', '7604d08470df', '25498cff9c1d', '4aba4e9fa76b', '7604d08470df', '09a756c8e718', 'd3d68f4d25aa', '5a2d68d2332f', 'ba1e172c4524', 'b24f7df8ed37', '4f71cc223f55', '3aefadc14c16', 'd1a7dbcb2bef', 'aa399d6d20be', '83224a3f0798', '3ba0c91bff67', '2552674e349b', 'a5230f236f26', 'b12ce3a854ca', '81b7347f43bd', '25340d51aa1e', 'c8344909a6b3', 'ade5911753f0']; // force
        array_push($this->subscribersTrue, 'aa0c2b336f3a', '809b33aeefca', '49682d09a761', 'ac247b0f2f53', '7bcd1e7fd51e', 'e0c637dc071e', '62217bf074bb', '69105a1e57eb', '5dcf6b61c7a9', '663959fb9de4', '7c0f178796e6', '9155a376aaea', 'f7bcd275e399'); // true
        $this->userNonFormat = ['663959fb9de4', '63eaba3a2fec', '3c46e72fdc16', '83815419a3ed', '83815419a3ed', 'd9df4a25ffbd', '83815419a3ed', '680ddc644fef', 'd0f50d2a7ab4'];
        $this->subscribersTrue = array_merge($this->subscribersTrue, $this->userNonFormat);
        $this->backgrounds = ['sunset-1373171_960_720.jpg',
            'fall-leaves-3744649_960_720.jpg',
            'landscape-2090495_960_720.jpg',
            'windrader-1048981_960_720.jpg',
            'wave-3473335_960_720.jpg'];

        if (!function_exists('apache_request_headers')) {
            function apache_request_headers()
            {
                foreach ($_SERVER as $key => $value) {
                    if (substr($key, 0, 5) == "HTTP_") {
                        $key = str_replace(" ", "-", ucwords(strtolower(str_replace("_", " ", substr($key, 5)))));
                        $out[$key] = $value;
                    } else {
                        $out[$key] = $value;
                    }
                }
                return $out;
            }
        }
    }
    public $origin_video_vide_me,
        $origin_img_vide_me,
        $origin_pre_image_w320_vide_me,
        $origin_pre_video_w320_vide_me,
        $origin_sprite_w120_vide_me,
        $origin_static_vide_me;

    public $user_id_global;

    /**
     * @param mixed $origin_video_vide_me
     */
    public function setOriginVideoVideMe($origin_video_vide_me): void
    {
        $this->origin_video_vide_me = $origin_video_vide_me;
    }

    /**
     * @param mixed $origin_img_vide_me
     */
    public function setOriginImgVideMe($origin_img_vide_me): void
    {
        $this->origin_img_vide_me = $origin_img_vide_me;
    }

    /**
     * @param mixed $origin_pre_image_w320_vide_me
     */
    public function setOriginPreImageW320VideMe($origin_pre_image_w320_vide_me): void
    {
        $this->origin_pre_image_w320_vide_me = $origin_pre_image_w320_vide_me;
    }

    /**
     * @param mixed $origin_pre_video_w320_vide_me
     */
    public function setOriginPreVideoW320VideMe($origin_pre_video_w320_vide_me): void
    {
        $this->origin_pre_video_w320_vide_me = $origin_pre_video_w320_vide_me;
    }

    /**
     * @param mixed $origin_sprite_w120_vide_me
     */
    public function setOriginSpriteW120VideMe($origin_sprite_w120_vide_me): void
    {
        $this->origin_sprite_w120_vide_me = $origin_sprite_w120_vide_me;
    }

    /**
     * @param mixed $origin_static_vide_me
     */
    public function setOriginStaticVideMe($origin_static_vide_me): void
    {
        $this->origin_static_vide_me = $origin_static_vide_me;
    }

    /**
     * @return mixed
     */
    public function getOriginVideoVideMe()
    {
        return $this->origin_video_vide_me;
    }

    /**
     * @return mixed
     */
    public function getOriginImgVideMe()
    {
        return $this->origin_img_vide_me;
    }

    /**
     * @return mixed
     */
    public function getOriginPreImageW320VideMe()
    {
        return $this->origin_pre_image_w320_vide_me;
    }

    /**
     * @return mixed
     */
    public function getOriginPreVideoW320VideMe()
    {
        return $this->origin_pre_video_w320_vide_me;
    }

    /**
     * @return mixed
     */
    public function getOriginSpriteW120VideMe()
    {
        return $this->origin_sprite_w120_vide_me;
    }

    /**
     * @return mixed
     */
    public function getOriginStaticVideMe()
    {
        return $this->origin_static_vide_me;
    }

    /**
     * @param mixed $user_id_global
     */
    public function setUserId($setUserId): void
    {
        //echo "\n\rsetUserId " . $setUserId . "\n\r";
        //print_r($userId);
        $this->user_id_global = $setUserId;
        $this->user_id_global = 'sdsd';
        //echo "\n\rsetUserId this->user_id_global " . $this->user_id_global . "\n\r";

    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        //echo "\n\rgetUserId this->user_id_global " . $this->user_id_global . "\n\r";
        return $this->user_id_global;
    }

    public function staffOnly()
    {
        $userId = $this->CookieToUserId();
        //echo "userId ";
        //print_r($userId);
        if (empty($userId) and $userId = "a056833fe94a") {
            header('Location: https://www.vide.me/web/enter/');
            exit;
        } else {
            return true;
        }
    }

    public function CookieToUserId()
    {
        // redis-cli -h pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com -p 14102 -a 2IIg4aHASXmDpTai
        /*try {
            $redis = new Predis\Client(array(
                'scheme' => 'tcp',
                'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
                'port' => 14102,
                'password' => '2IIg4aHASXmDpTai'
            ));
            $userId = $redis->get($UserCookie);
            return $userId;
        } catch (Exception $e) {
            //echo "Not found. "; //. $e->getMessage();
            return false;
        }
        */
        $userCookie = $this->GetUserCookieValue();
        //echo "\n\r---> CookieToUserId:\n\r";
        //print_r($userCookie);
        //$this->setUserId('ertert');

        if (!empty($userCookie)) {
            /*$this->log->setEvent([
                "type" => "attempt",
                "message" => "set",
                "val" => $CookieToUserId,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            $userId = $this->memcachedGetKey(["key" => $userCookie]);
            //echo "\n\r---> CookieToUserId userId\n\r";
            //print_r($userId);
            if (!empty($userId)) {
                $this->checkUserBlocked($userId);
                $this->setUserId($userId);
                return $userId;
            } else {
                /*$this->log->setEvent([
                    "type" => "PEBKAC",
                    "message" => "empty",
                    "val" => $CookieToUserId,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);*/
                return false;
            }
        } else {
            return false;
        }
    }

    public function staffNadInvite()
    {
        $userCookie = $this->GetUserCookieValue();
        //echo "\n\r---> CookieToUserId:\n\r";
        //print_r($userCookie);
        if (!empty($userCookie)) {
            $userId = $this->memcachedGetKey(["key" => $userCookie]);
            //echo "\n\r---> CookieToUserId userId\n\r";
            //print_r($userId);
            if (!empty($userId)) {
                $this->checkUserBlocked($userId);
                $this->setUserId($userId);
                $this->memcachedCheckCookie(["value" => $userId]);
                return $userId;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function defineShowcaseClass($defineShowcaseClass)
    {
        $action_url_class = 'showmulti';
        $userId = $this->CookieToUserId();
        if (!empty($userId)) {
            if ($defineShowcaseClass['owner_id'] == $userId) {
                $action_url_class = 'videme-v3-my-item-url';
            }
            if (!empty($_GET['post'])) {
                $postInfo = $this->pgPostInfo(['post_id' => $_GET['post']]);
                //print_r($postInfo);
                if ($postInfo['post_owner_id'] == $userId) {
                    $action_url_class = 'videme-v3-my-post-url';
                }
            }
        }
        return $action_url_class;
    }

    public function checkUserBlocked($checkUserBlocked)
    {
        $blockedUsers = ['0a02b42d4c80', 'f8d46ddff124', '0d91b260f79b'];
        if (in_array($checkUserBlocked, $blockedUsers)) header('Location: https://www.vide.me/web/blocked/');
    }

    public function GetUserCookieValue()
    {
        $HTTPHeaders = apache_request_headers();
        if (!empty($_POST['usertoken'])) {
            $userId = $_POST['usertoken'];
        } elseif (!empty($HTTPHeaders['X-Videme-User-Token'])) {
            $userId = $HTTPHeaders['X-Videme-User-Token'];
        } elseif (!empty($_COOKIE["vide_nad"])) {
            $userId = $_COOKIE["vide_nad"];
        } elseif (!empty($_POST["nad"])) {
            $userId = $_POST["nad"];
        } elseif (!empty($_GET["nad"])) {
            $userId = $_GET["nad"];
        }
        //echo "GetUserId userId " . $userId . " <--";
        if (!empty($userId)) {
            return $userId;
        }
    }

    public function getPrevItemId()
    {
        $HTTPHeaders = apache_request_headers();
        if (!empty($_POST['prev_item_id'])) {
            $prevItemId = $_POST['prev_item_id'];
        } elseif (!empty($HTTPHeaders['prev_item_id'])) {
            $prevItemId = $HTTPHeaders['prev_item_id'];
        } elseif (!empty($_COOKIE["prev_item_id"])) {
            $prevItemId = $_COOKIE["prev_item_id"];
        } elseif (!empty($_GET["prev_item_id"])) {
            $prevItemId = $_GET["prev_item_id"];
        }
        //echo "GetUserId userId " . $userId . " <--";
        if (!empty($prevItemId)) {
            return $prevItemId;
        }
    }
    public function getNextItemId()
    {
        $HTTPHeaders = apache_request_headers();
        if (!empty($_POST['next_item_id'])) {
            $nextItemId = $_POST['next_item_id'];
        } elseif (!empty($HTTPHeaders['next_item_id'])) {
            $nextItemId = $HTTPHeaders['next_item_id'];
        } elseif (!empty($_COOKIE["next_item_id"])) {
            $nextItemId = $_COOKIE["next_item_id"];
        } elseif (!empty($_GET["next_item_id"])) {
            $nextItemId = $_GET["next_item_id"];
        }
        //echo "GetUserId userId " . $userId . " <--";
        if (!empty($nextItemId)) {
            return $nextItemId;
        }
    }

    public function getMediaId()
    {
        if (!empty($_GET['m'])) {
            $item_id = $_GET['m'];
        } elseif (!empty($_GET['i'])) {
            $item_id = $_GET['i'];
        } elseif (!empty($_GET['a'])) {
            $item_id = $_GET['a'];
        } elseif (!empty($_GET['e'])) {
            $item_id = $_GET['e'];
        } else {
            $item_id = false;
        }
        return $item_id;
    }

    public function memcachedGetKey($memcachedGetKey)
    {
        /*try {
            $bucketTickets = $this->autoConnectToBucket(["bucket" => "tickets"]);
            $res = $bucketTickets->get($memcachedGetKey["key"]);
            //unset ($bucketTickets);
            //echo " memcachedGetKey res ";
            //print_r($res);
            return $this->ConvParseData($res->value);
        } catch (Exception $e) {
            //echo "Not found. " . $e->getMessage();
            return false;
        }
        $getmc = new GetMemcached();
        $mc = $getmc->getMemcached();*/
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        try {
            //$res = $mc->get($memcachedGetKey["key"]);
            $res = $redis->get($memcachedGetKey["key"]);
            //echo " memcachedGetKey res ";
            //print_r($res);
            return $res;
        } catch (Exception $e) {
            //echo "Not found. " . $e->getMessage();
            /* Не включать виснут web + studio7
             * $sendmail = new sendmail();
            $sendmail->SendStaffAlert(['message' => "Trends getEvent zRangeByScore error: " . $e]);
            $log = new log();
            $log->toFile(['service' => 'redis', 'type' => 'error', 'text' => 'Trends getEvent zRangeByScore error']);
            $getRredis->redisRepair();*/
            return false;
        }
    }

    public function uploadSetParam($uploadSetParam)
    {
        //echo "\n\ruploadSetParam\n\r";
        //print_r($uploadSetParam);
        $uploadDo['owner_id'] = $this->CookieToUserId();
        if (!empty($uploadSetParam['title'])) {
            $uploadDo['title'] = $uploadSetParam['title'];
        } else {
            $uploadDo['title'] = '';
        }
        if (!empty($uploadSetParam['content'])) {
            $uploadDo['content'] = $uploadSetParam['content'];
        } else {
            $uploadDo['content'] = '';
        }
        if (!empty($uploadSetParam['album_id'])) {
            $uploadDo['album_id'] = $uploadSetParam["album_id"];
        } else {
            $uploadDo['album_id'] = '';
        }
        if (!empty($uploadSetParam['ticket_id'])) $uploadDo['ticket_id'] = $uploadSetParam["ticket_id"]; //??????????????????
//if (!empty($_POST['ticket'])) $retVal['ticket'] = $_POST["ticket"];
        $uploadDo['task_id'] = $this->memcachedGetKey(['key' => $uploadSetParam['ticket_id']]);
        $uploadDo['ticket'] = $this->memcachedGetKey(['key' => $uploadSetParam['ticket_id']]); // TODO: why?
//$retVal['access'] = $_POST['access'] ?? 'private';
        /* desabled because no web button if ($uploadDo['album_id'] == 'public') {
            $uploadDo['access'] = 'public';
        } elseif ($uploadDo['album_id'] == 'friends') {
            $uploadDo['access'] = 'friends';
        } elseif ($uploadDo['album_id'] == 'private') {
            $uploadDo['access'] = 'private';
        } elseif (!empty($uploadDo['album_id'])) {
            $albumInfo = $this->pgAlbumInfoById($uploadDo);
            echo 'albumInfo';
            print_r($albumInfo);
            $uploadDo['access'] = $albumInfo['access'];
        }*/
        $uploadDo['access'] = 'public'; // because no web button

        if (!empty($_POST['upload_type'])) {
            $uploadDo['upload_type'] = $uploadSetParam['upload_type'];
        }
        return $uploadDo;
    }

    public function autoConnectToBucket($autoConnectToBucket)
    {
        /*if ($autoConnectToBucket["bucket"] == "video" or $autoConnectToBucket["bucket"] == "img") {
            $bucket = new CouchbaseCluster("http://192.168.0.182:8091", "Administrator", "Pilsner1", "default");
        } else {
            $bucket = new CouchbaseCluster("http://192.168.0.181:8091", "Administrator", "Pilsner1", "default");
        }*/
        $bucket2 = $autoConnectToBucket["bucket"];

        //$clusterUser = "couchbase://192.168.0.181";
        //$clusterUser = "couchbase://192.168.0.17";
        //$clusterUser = "couchbase://192.168.0.37";
        $clusterUser = "couchbase://192.168.0.141";
        //$clusterVideo = "http://192.168.0.182:8091";
        //$clusterVideo = "couchbase://192.168.0.182";
        //$clusterVideo = "couchbase://192.168.0.42"; // b2 113
        //$clusterLogs = "http://192.168.0.96:8091"; //
        //$clusterLogs5 = "couchbase://192.168.0.96"; // a3-1 112
        //$clusterLogs5 = "couchbase://192.168.0.37"; // a3-1 112
        $clusterLogs5 = "couchbase://192.168.0.141"; // a3-1 112
        //$clusterLogs5 = "couchbase://192.168.0.51"; // b3 151. a-cb-v5b-1.ter.local  ip-0.51 2. CB

        // Establish username and password for bucket-access
        $authenticator = new \Couchbase\PasswordAuthenticator();
        $authenticator->username('Administrator')->password('Pilsner1');

        switch ($bucket2) {
            case "article":
                //$bucket = new CouchbaseCluster($clusterUser, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterUser);
                /*try {
                    //return $bucket->openBucket($autoConnectToBucket["bucket"]);
                    $authenticator5 = new \Couchbase\ClassicAuthenticator();
                    $authenticator5->bucket('Administrator', 'Pilsner1');
                    $cluster->authenticate($authenticator5);
                    return $cluster->openBucket($autoConnectToBucket["bucket"]);
                } catch (Exception $e) {
                    //exit ("Not found. " . $e->getMessage());
                    echo "Not found. " . $e->getMessage();
                    return false;
                }*/
                break;
            case "file":
                //$bucket = new CouchbaseCluster($clusterUser, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterUser);
                /*try {
                    //return $bucket->openBucket($autoConnectToBucket["bucket"]);
                    $authenticator5 = new \Couchbase\ClassicAuthenticator();
                    $authenticator5->bucket('Administrator', 'Pilsner1');
                    $cluster->authenticate($authenticator5);
                    return $cluster->openBucket($autoConnectToBucket["bucket"]);
                } catch (Exception $e) {
                    //exit ("Not found. " . $e->getMessage());
                    echo "Not found. " . $e->getMessage();
                    return false;
                }*/
                break;
            case "properties":
                //$bucket = new CouchbaseCluster($clusterUser, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterUser);
                break;
            case "user":
                //$bucket = new CouchbaseCluster($clusterUser, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterUser);
                /*try {
                    //return $bucket->openBucket($autoConnectToBucket["bucket"]);
                    $authenticator5 = new \Couchbase\ClassicAuthenticator();
                    $authenticator5->bucket('Administrator', 'Pilsner1');
                    $cluster->authenticate($authenticator5);
                    return $cluster->openBucket($autoConnectToBucket["bucket"]);

                } catch (Exception $e) {
                    //exit ("Not found. " . $e->getMessage());
                    echo "Not found. " . $e->getMessage();
                    return false;
                }*/
                break;
            case "tickets":
                //$bucket = new CouchbaseCluster($clusterUser, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterUser);
                /*try {
                    //return $bucket->openBucket($autoConnectToBucket["bucket"]);
                    $authenticator5 = new \Couchbase\ClassicAuthenticator();
                    $authenticator5->bucket('Administrator', 'Pilsner1');
                    $cluster->authenticate($authenticator5);
                    return $cluster->openBucket($autoConnectToBucket["bucket"]);
                } catch (Exception $e) {
                    //exit ("Not found. " . $e->getMessage());
                    echo "Not found. " . $e->getMessage();
                    return false;
                }*/
                break;
            case "video":
                //$bucket = new CouchbaseCluster($clusterVideo, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterVideo);
                /*try {
                    //return $bucket->openBucket($autoConnectToBucket["bucket"]);
                    $authenticator5 = new \Couchbase\ClassicAuthenticator();
                    $authenticator5->bucket('Administrator', 'Pilsner1');
                    $cluster->authenticate($authenticator5);
                    return $cluster->openBucket($autoConnectToBucket["bucket"]);
                } catch (Exception $e) {
                    //exit ("Not found. " . $e->getMessage());
                    echo "Not found. " . $e->getMessage();
                    return false;
                }*/
                break;
            case "img":
                //$bucket = new CouchbaseCluster($clusterVideo, "Administrator", "Pilsner1", "default");
                //$authenticator5 = new \Couchbase\ClassicAuthenticator();
                //$authenticator5->bucket('Administrator', 'Pilsner1');
                $cluster = new CouchbaseCluster($clusterVideo);
                /*try {
                    //return $bucket->openBucket($autoConnectToBucket["bucket"]);
                    $authenticator5 = new \Couchbase\ClassicAuthenticator();
                    $authenticator5->bucket('Administrator', 'Pilsner1');
                    $cluster->authenticate($authenticator5);
                    return $cluster->openBucket($autoConnectToBucket["bucket"]);
                } catch (Exception $e) {
                    //exit ("Not found. " . $e->getMessage());
                    echo "Not found. " . $e->getMessage();
                    return false;
                }*/
                break;
            case "logs":
                // Connect to Couchbase Server
                $cluster = new CouchbaseCluster($clusterLogs5);
                /*try {
                    //return $bucket->openBucket($autoConnectToBucket["bucket"]);
                    $authenticator5 = new \Couchbase\ClassicAuthenticator();
                    $authenticator5->bucket('Administrator', 'Pilsner1');
                    $cluster->authenticate($authenticator5);
                    return $cluster->openBucket($autoConnectToBucket["bucket"]);
                } catch (Exception $e) {
                    //exit ("Not found. " . $e->getMessage());
                    echo "Not found. " . $e->getMessage();
                    return false;
                }*/
                // Authenticate, then open bucket
                //$bucket = new CouchbaseCluster($clusterLogs, "Administrator", "Pilsner1", "default");
                break;
            case "stack":
                //$bucket = new CouchbaseCluster($clusterLogs, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterLogs5);
                break;
            case "scheduler":
                //$bucket = new CouchbaseCluster($clusterLogs, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterLogs5);
                break;
            case "sync":
                //$bucket = new CouchbaseCluster($clusterLogs, "Administrator", "Pilsner1", "default");
                $cluster = new CouchbaseCluster($clusterLogs5);
                break;
            default:
                echo "No bucket";
                break;
        }

        try {
            //return $bucket->openBucket($autoConnectToBucket["bucket"]);
            // https://forums.couchbase.com/t/how-to-connect-to-the-server-correctly/13956
            //$cluster->authenticate($authenticator);
            //$cluster = new CouchbaseCluster($clusterLogs5);
            $cluster->authenticateAs('Administrator', 'Pilsner1');
            return $cluster->openBucket($autoConnectToBucket["bucket"]);

        } catch (Exception $e) {
            //exit ("Not found. " . $e->getMessage());
            echo "Not found. CB auto connect " . $e->getMessage();
            return false;
        }
    }

    public function ConvParseData($ConvParseData)
    {
        // TODO:  Похоже тут не работает
        if (is_object($ConvParseData)) {
            foreach (get_object_vars($ConvParseData) as $key => $val) {
                if (is_object($val) || is_array($val)) {
                    $ret[$key] = $this->ConvParseData($val);
                } else {
                    $ret[$key] = $val;
                }
            }
            return $ret;
        } elseif (is_array($ConvParseData)) {
            foreach ($ConvParseData as $key => $val) {
                if (is_object($val) || is_array($val)) {
                    $ret[$key] = $this->ConvParseData($val);
                } else {
                    $ret[$key] = $val;
                }
            }
            return $ret;
        } else {
            return $ConvParseData;
        }
    }

    public function memcachedRemoveKey($memcachedRemoveKey) // work 14022023
    {
        /*try {
            $bucket = $this->autoConnectToBucket(["bucket" => "tickets"]);
            return $bucket->remove($memcachedRemoveKey["key"]);
        } catch (Exception $e) {
            //echo "Not found. "; //. $e->getMessage();
            return false;
        }
        $getmc = new GetMemcached();
        $mc = $getmc->getMemcached();
        return $mc->delete($memcachedRemoveKey["key"]);*/
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        //return $redis->delete($memcachedRemoveKey["key"]);
        return $redis->del($memcachedRemoveKey["key"]);
    }

    public function memcachedWebStart($memcachedWebStart)
    {
        /*$this->log->setEvent([
            "type" => "info",
            "message" => "set",
            "val" => $memcachedWebStart["key"],
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);*/
        //echo "memcachedWebStart:<br>\n\r";
        //print_r($memcachedWebStart);
        /*$bucket = $this->autoConnectToBucket(["bucket" => "tickets"]);
        $bucket->upsert($memcachedWebStart["key"], "1", ["expiry" => 60 * 15]);
        $getmc = new GetMemcached();
        $mc = $getmc->getMemcached();
        $mc->set($memcachedWebStart["key"], "1", 60 * 15);*/
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        $redis->set($memcachedWebStart["key"], "1");
        $redis->expire($memcachedWebStart["key"], 60 * 15);

    }

    public function memcachedOnPublish($memcachedOnPublish)
    {
        $this->log->setEvent([
            "type" => "info",
            "message" => $this->set,
            "val" => $memcachedOnPublish["key"],
            //"val" => "ticket: " . $_REQUEST["ticket"] . " ticketId: " . $_REQUEST["ticketId"] . " name: " . $_REQUEST["name"],
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);
        try {
            $key = $this->memcachedGetKey(["key" => $memcachedOnPublish["key"]]);
            if (!empty($key)) {
                $this->log->setEvent([
                    "type" => "attempt",
                    "message" => "set",
                    "val" => $memcachedOnPublish["key"],
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                return true;
            } else {
                $this->log->setEvent([
                    "type" => "attempt",
                    "message" => "empty",
                    //"val" => $memcachedOnPublish["key"],
                    "val" => $key,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                return false;
                //return true;
            }
        } catch (Exception $e) {
            $this->log->setEvent([
                "type" => "error",
                "message" => "set",
                "val" => $memcachedOnPublish["key"],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            //echo "Not found. "; //. $e->getMessage();
            //exit(1);
            return false;
        }
    }

    public function memcachedRecorddone($memcachedRecorddone)
    {
        $this->log->setEvent([
            "type" => "info",
            "message" => "set",
            "val" => $memcachedRecorddone["key"],
            //"val" => "ticket: " . $_REQUEST["ticket"] . " ticketId: " . $_REQUEST["ticketId"] . " name: " . $_REQUEST["name"],
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);
        //echo "memcachedWebStart:<br>\n\r";
        //print_r($memcachedWebStart);
        /*$bucket = $this->autoConnectToBucket(["bucket" => "tickets"]);
        return $bucket->upsert($memcachedRecorddone["key"], $memcachedRecorddone["value"], ["expiry" => 60 * 10]);
        $getmc = new GetMemcached();
        $mc = $getmc->getMemcached();
        return $mc->set($memcachedRecorddone["key"], $memcachedRecorddone["value"], 60 * 10);*/
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        $redis->set($memcachedRecorddone["key"], $memcachedRecorddone["value"]);
        $redis->expire($memcachedRecorddone["key"], 60 * 10);
        return true;
    }

    public function memcachedCheckDone($memcachedCheckDone)
    {
        $this->log->setEvent([
            "type" => "info",
            "message" => "checkdone",
            "val" => $memcachedCheckDone["key"],
            //"val" => "key: " . $memcachedCheckDone["key"] . " value: " . $memcachedCheckDone["value"],
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);
        if (!empty($memcachedCheckDone["key"]) and !empty($memcachedCheckDone["value"])) {
            //if ($this->memcachedGetKey($memcachedCheckDone["key"]) == $memcachedCheckDone["value"]) {
            if ($this->memcachedGetKey(["key" => $memcachedCheckDone["key"]]) == $memcachedCheckDone["value"]) {
                return true;
            } else {
                return false;
            }
        } else {
            echo "no key or value.";
            return false;
        }
    }

    public function ffmpegFullConv($ffmpegFullConv)
    {
        if (!empty($ffmpegFullConv["fullFileName"]) and !empty($ffmpegFullConv["fullNewFilename"])) {
            // Кодировка сырца в mp4
            $ffpegConvRes = shell_exec("ffmpeg -y -i " . escapeshellcmd($ffmpegFullConv["fullFileName"]) . " -strict -2 -ab 128k -ar 22050 -ac 2 -preset superfast " . escapeshellcmd($ffmpegFullConv["fullNewFilename"]) . "-t.mp4 -an -ss 00:00:03 -r 1 -vframes 1 -s 640?360 -y -f mjpeg " . escapeshellcmd($ffmpegFullConv["fullNewFilename"]) . ".jpg  2>&1 && echo $(date)");
            $this->log->setEvent([
                "res" => "stack",
                "type" => "info",
                "message" => "ffmpeg",
                "val" => substr($ffpegConvRes, 0, 64),
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            // Перемещение метаданных из конца в начало
            $qtConvRes = shell_exec("qt-faststart " . escapeshellcmd($ffmpegFullConv["fullNewFilename"]) . "-t.mp4 " . escapeshellcmd($ffmpegFullConv["fullNewFilename"]) . ".mp4");
            // Get video Duration
            $ffmpegFullConv[$this->videoDuration] = $this->ffmpegGetDuration($ffmpegFullConv["fullNewFilename"]);
            $this->log->setEvent([
                "res" => "stack",
                "type" => "info",
                "message" => "qt-faststart",
                "val" => substr($qtConvRes, 0, 64),
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return $ffmpegFullConv;
        } else {
            return false;
        }
    }

    public function ffmpegGetImg($ffmpegGetImg)
    {
        if (!empty($ffmpegGetImg["fullFileName"]) and !empty($ffmpegGetImg["fullNewFilename"])) {
            // Сделать только картинку
            $ffpegConvRes = shell_exec("ffmpeg -y -i " . escapeshellcmd($ffmpegGetImg["fullFileName"]) . " -an -ss 00:00:03 -r 1 -vframes 1 -s 640?360	-y -f mjpeg " . escapeshellcmd($ffmpegGetImg["fullNewFilename"]) . ".jpg;");
            $this->log->setEvent([
                "res" => "stack",
                "type" => "info",
                "message" => "ffmpeg",
                "val" => substr($ffpegConvRes, 0, 64),
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function ffmpegFullHLSConv($ffmpegFullHLSConv)
    {
        if (!empty($ffmpegFullHLSConv)) {
            $ffmpegFullHLSConvRes = [];
            $fullFileName = $this->nadtemp . $ffmpegFullHLSConv;
            $ffmpegFullHLSConvRes['hls_res'] = shell_exec("ffmpeg -i " . $fullFileName . ".webm -strict -2 -c:v h264 -flags +cgop -g 30 -hls_time 5 -hls_list_size 0 " . $fullFileName . ".m3u8 -ss 00:00:03 -r 1 -vframes 1 -s 640?360 -y -f mjpeg " . $fullFileName . ".jpg 2>&1 && echo $(date)");
            $ffmpegFullHLSConvRes['video_duration'] = $this->ffmpegGetDurationHLS($fullFileName);
            return $ffmpegFullHLSConvRes;
        } else {
            return false;
        }

    }

    /*public function ffmpegHLSConv($ffmpegHLSConv){
        if (!empty($ffmpegHLSConv)) {
            $ffmpeg = FFMpeg\FFMpeg::create();
            $video = $ffmpeg->open('video.mpg');
            $video
                ->filters()
                ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
                ->synchronize();
            $video
                ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
                ->save('frame.jpg');
            $video
                ->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')
                ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
                ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');
        } else {
            return false;
        }
    }*/

    public function ffmpegMP4toHLSConv($ffmpegMP4toHLSConv)
    {
        //echo "\n\r ffmpegMP4toHLSConv $ffmpegMP4toHLSConv \n\r";
        if (!empty($ffmpegMP4toHLSConv)) {
            $ffmpegFullHLSConvRes = [];
            //$fullFileName = $this->nadtemp . $ffmpegMP4toHLSConv;
            $ffmpegFullHLSConvRes['hls_res'] = shell_exec("ffmpeg -i " . $ffmpegMP4toHLSConv . ".mp4 -strict -2 -c:v h264 -flags +cgop -g 30 -hls_time 5 -hls_list_size 0 " . $ffmpegMP4toHLSConv . ".m3u8 -ss 00:00:03 -r 1 -vframes 1 -s 640?360 -y -f mjpeg " . $ffmpegMP4toHLSConv . ".jpg 2>&1 && echo $(date)");
            $ffmpegFullHLSConvRes['video_duration'] = $this->ffmpegGetDurationHLS($ffmpegMP4toHLSConv);
            return $ffmpegFullHLSConvRes;
        } else {
            return false;
        }

    }

    function get_m3u8_video_segment($url)
    {
        // https://s3.amazonaws.com/video.vide.me/ff407c4bf24c.m3u8
        $path_parts = pathinfo($url);
        $fullFileName = $this->nadtemp . $path_parts['filename'] . ".m3u8";
        try {
            $m3u8 = @file_get_contents($fullFileName);
        } catch (Exception $e) {
            echo "\n\rget_m3u8_video_segment file_get_contents error: " . $e . "\n\r";
            //exit;
            return false;
        }
        if (strlen($m3u8) > 3) {
            $tmp = strrpos($fullFileName, '/');
            if ($tmp !== false) {
                //$base_url = substr($url, 0, $tmp + 1);
                //if (is_good_url($base_url)) {
                $array = preg_split('/\s*\R\s*/m', trim($m3u8), NULL, PREG_SPLIT_NO_EMPTY);
                $url2 = array();
                foreach ($array as $line) {
                    $line = trim($line);
                    if (strlen($line) > 2) {
                        if ($line[0] != '#') {
                            //if (is_good_url($line)) {
                            $url2[] = $line;
                            /*} else {
                                $url2[] = $base_url . $line;
                            }*/
                        }
                    }
                }
                return $url2;
                //}
            }
        }
        return false;
    }


    public function ffmpegGetDuration($ffmpegGetDuration)
    {
        if (!empty($ffmpegGetDuration)) {
            // Get video Duration
            $ffpegDuration = intval(shell_exec("ffprobe -v quiet -of csv=p=0 -show_entries format=duration " . $ffmpegGetDuration . ".mp4"));
            $this->log->setEvent([
                "res" => "stack",
                "type" => "info",
                "message" => "ffmpeg",
                "val" => $ffpegDuration,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return $ffpegDuration;
        } else {
            return false;
        }
    }

    public function ffmpegGetDurationHLS($ffmpegGetDurationHLS)
    {
        if (!empty($ffmpegGetDurationHLS)) {
            // Get video Duration
            $ffpegDuration = intval(shell_exec("ffprobe -v quiet -of csv=p=0 -show_entries format=duration " . $ffmpegGetDurationHLS . ".m3u8"));
            /*$this->log->setEvent([
                "res" => "stack",
                "type" => "info",
                "message" => "ffmpeg",
                "val" => $ffpegDuration,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            return $ffpegDuration;
        } else {
            return false;
        }
    }

    public function fileResize($fileResize) // Возможно не нужна
    {
        if (file_exists($fileResize)) {
            // Если файл существует
            $handleMp4 = fopen($fileResize, "r+");
            // Размер mp4 файла
            $fileSizeMp4 = filesize($fileResize);
            $this->log->setEvent([
                "res" => "stack",
                "type" => "info",
                "message" => "upcdn",
                "val" => $fileResize . " size - " . $fileSizeMp4,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            if ($fileSizeMp4 >= 20971520) $fileSizeMp4 = 18874368;
            // Прочитать файл mp4 в переменную
            $contentsMp4 = fread($handleMp4, $fileSizeMp4);
            fwrite($handleMp4, $contentsMp4);
            fclose($handleMp4);
            if (!$contentsMp4) {
                return false;
            } else {
                return $fileSizeMp4;
            }
        } else {
            return false;
        }
    }

    public function fileCheckSize($fileCheckSize) // Возможно не нужна
    {
        if (file_exists($fileCheckSize)) {
            // Если файл существует
            // Размер mp4 файла
            $fileSizeMp4 = filesize($fileCheckSize);
            //echo 'File size: ' . $fileSizeMp4 . ' ';
            $this->log->setEvent([
                "res" => "stack",
                "type" => "info",
                "message" => "upcdn",
                "val" => $fileCheckSize . " size - " . $fileSizeMp4,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            if ($fileSizeMp4 >= 20971520) {
                return false;
            } else {
                return $fileSizeMp4;
            }
        } else {
            echo 'File open error';
            return false;
        }
    }

    public function mp4AndJpgToCb($mp4AndJpgToCb)
    {
        if (!empty($mp4AndJpgToCb["file"])) {
            //$filenameMp4 = "/var/www/html/rec/uploads/2616665238934444.mp4";
            // Открыть файл mp4
            $filenameMp4 = $mp4AndJpgToCb["file"] . ".mp4";
            $filenameJpg = $mp4AndJpgToCb["file"] . ".jpg";
            if (file_exists($filenameMp4)) {
                // Если файл существует
                $handleMp4 = fopen($filenameMp4, "r");
                // Размер mp4 файла
                $fileSizeMp4 = filesize($filenameMp4);
                $this->log->setEvent([
                    "res" => "stack",
                    "type" => "info",
                    "message" => "upcdn",
                    "val" => $filenameMp4 . " size - " . $fileSizeMp4,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                if ($fileSizeMp4 >= 20971520) $fileSizeMp4 = 18874368;
                // Прочитать файл mp4 в переменную
                $contentsMp4 = fread($handleMp4, $fileSizeMp4);
                if (!$contentsMp4) {
                    // Если файл можно прочитать
                    $this->log->setEvent([
                        "type" => "error",
                        "message" => "upcdn",
                        "val" => $filenameMp4,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    return false;
                } else {
                    $bucketVideo = $this->autoConnectToBucket(["bucket" => "video"]);
                    try {
                        $resMp4 = $bucketVideo->upsert($mp4AndJpgToCb["name"], $contentsMp4);
                        $this->log->setEvent([
                            //"res" => "stack",
                            "type" => "info",
                            "message" => "couchbase",
                            "val" => $resMp4,
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                    } catch (Exception $e) {
                        $this->log->setEvent([
                            //"res" => "stack",
                            "type" => "error",
                            "message" => "couchbase",
                            //"val" => $e,
                            "val" => $mp4AndJpgToCb["file"],
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                        exit ("Binary upsert failed. " . $e->getMessage());
                    }
                }
            } else {
                $this->log->setEvent([
                    "type" => "error",
                    "message" => "upcdn",
                    "val" => $filenameMp4,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                return false;
            }
            fclose($handleMp4);
            // Img ===========================================================
            if (file_exists($filenameJpg)) {
                // Если файл существует
                $handleJpg = fopen($filenameJpg, "r");
                // Размер mp4 файла
                $fileSizeJpg = filesize($filenameJpg);
                $this->log->setEvent([
                    "type" => "info",
                    "message" => "upcdn",
                    "val" => $filenameJpg . " size - " . $fileSizeJpg,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                // Прочитать файл mp4 в переменную
                $contentsJpg = fread($handleJpg, $fileSizeJpg);
                if (!$contentsJpg) {
                    // Если файл можно прочитать
                    $this->log->setEvent([
                        "type" => "error",
                        "message" => "upcdn",
                        "val" => $filenameJpg,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    return false;
                } else {
                    $bucketVideo = $this->autoConnectToBucket(["bucket" => "img"]);
                    try {
                        $resJpg = $bucketVideo->upsert($mp4AndJpgToCb["name"], $contentsJpg);
                        $this->log->setEvent([
                            //"res" => "stack",
                            "type" => "info",
                            "message" => "couchbase",
                            "val" => $resJpg,
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                    } catch (Exception $e) {
                        $this->log->setEvent([
                            "res" => "stack",
                            "type" => "error",
                            "message" => "couchbase",
                            "val" => $e,
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                        exit ("Binary upsert failed. " . $e->getMessage());
                    }
                }
            } else {
                $this->log->setEvent([
                    "type" => "error",
                    "message" => "upcdn",
                    "val" => $filenameMp4,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                return false;
            }
            fclose($handleJpg);
            return true;
        } else {
            $this->log->setEvent([
                "type" => "error",
                "message" => "empty",
                "val" => "file",
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return false;
        }
    }

    public function randomDate($minDate = "2005/01/01")
    {
        $randEpoch = rand(strtotime($minDate), strtotime(date("Y/m/d", time())));
        return date("Y/m/d", $randEpoch);
    }

    public function randomTime($minTime = "00:00:00")
    {
        $randEpoch = rand(strtotime($minTime), strtotime(date("H:i:s", time())));
        return date("H:i:s", $randEpoch);
    }

    public function setLimit()
    {
        if (!empty($_REQUEST['limit'])) {
            return $_REQUEST['limit'];
        } else {
            return 16;
        }
    }

    public function setOffset()
    {
        if (!empty($_REQUEST['offset'])) {
            return $_REQUEST['offset'];
        } else {
            return 0;
        }
    }

    public function checkRemoteImage($url)
    {
        /*        $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                // don't download content
                curl_setopt($ch, CURLOPT_NOBODY, 1);
                curl_setopt($ch, CURLOPT_FAILONERROR, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                if(curl_exec($ch)!==FALSE)
                {
                    return true;
                }
                else
                {
                    return false;
                }*/
        if (getimagesize($url) !== false) {

            return true;
        } else {
            return false;
        }
    }

    public function userIdExit($userIdExit)
    {
        /*$redis = new Predis\Client(array(
            'scheme' => 'tcp',
            'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
            'port' => 14102,
            'password' => '2IIg4aHASXmDpTai'
        ));
        $redis->del($userIdExit);*/
        $this->memcachedRemoveKey($userIdExit);
        //$redis->expire($userIdExit, 1);
        //setcookie("vide_nad", $user_cookie, time() - 3600, "/", "vide.me", 0);
        setcookie("vide_nad", "", time() - 3600, "/", "vide.me", 0);
    }

    public function RedisSetTicketId($RedisSetTicketId)
    {
        /*        try {
                    // ВНИМАНИЕ!!! Тут другой сервер редис!
                    $redis = new Predis\Client(array(
                        'scheme' => 'tcp',
                        'host' => 'pub-redis-17954.us-east-1-4.3.ec2.garantiadata.com',
                        'port' => 17954,
                        'password' => 'XD1TpCMCWKwB'
                    ));
                } catch (Exception $e) {
                    //echo "Not found. "; //. $e->getMessage();
                    //exit(1);
                }
                $IPclient = $_SERVER['HTTP_X_FORWARDED_FOR'];
                // Если проходит через наш Nginx
                $IPclient = preg_replace('#, 166.78.154.162#', '', $IPclient);
                $ticketid = bin2hex(sip_hash('aON1dHrq90SbG8Hx', $IPclient));
                $redis->set("url:" . $ticketid, $RedisSetTicketId);
                $redis->expire("url:" . $ticketid, 300);*/
    }

    public function RedisSetCheckpointTicketId($RedisSetCheckpointTicketId)
    {
        try {
            // ВНИМАНИЕ!!! Тут другой сервер редис!
            $redis = new Predis\Client(array(
                'scheme' => 'tcp',
                'host' => 'pub-redis-17954.us-east-1-4.3.ec2.garantiadata.com',
                'port' => 17954,
                'password' => 'XD1TpCMCWKwB'
            ));
        } catch (Exception $e) {
            //echo "Not found. "; //. $e->getMessage();
            //exit(1);
        }
        //$ticketid = bin2hex(sip_hash('aON1dHrq90SbG8Hx', $IPclient));
        //$ticketid = bin2hex(sip_hash('aON1dHrq90SbG8Hx', $this->getHashClientIp()));
        //echo "ttttttiiiiiiiccccckkkeeeetttt ------------------------------ ";
        //print_r($ticketid);
        $redis->set($RedisSetCheckpointTicketId["ticketid"], "0"); // <<"ticketId">>, <<"name">> вначале записи устанавливается на 0
        $redis->expire($RedisSetCheckpointTicketId["ticketid"], 300); // <================= ???
    }

    public function getClientIp()
    {
        //$IPclient = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // Если проходит через наш Nginx
        //return preg_replace('#, 83.169.208.155#', '', $IPclient);
        //return preg_replace('#, 83.169.208.155#', '', $_SERVER['HTTP_X_FORWARDED_FOR']);
        //==return $_SERVER['HTTP_X_FORWARDED_FOR'];

        $ipAddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipAddress = 'UNKNOWN';
        return $ipAddress;
    }

    // Ready

    public function getHashClientIp()
    {
        /*if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $IPclient = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }*/

        // Если проходит через наш Nginx
        //return preg_replace('#, 83.169.208.155#', '', $IPclient);
        //==return bin2hex(sip_hash("aON1dHrq90SbG8Hx", preg_replace('#, 83.169.208.155#', '', $_SERVER['HTTP_X_FORWARDED_FOR'])));
        //return bin2hex(sip_hash("aON1dHrq90SbG8Hx", $IPclient)); //<-- Need sip_hash
        //return bin2hex($IPclient);
        return md5($this->getClientIp());
        //$ticketid = bin2hex(sip_hash('aON1dHrq90SbG8Hx', $IPclient));
    }

    public function ParseFileAdd($ParseFileAdd) // Ready
    {
        if (!empty($ParseFileAdd['file'])) {
            $File = new parseObject('File');
            $File->File = $ParseFileAdd['file'];
            $File->OwnerId = $ParseFileAdd['userid'];
            $File->Subject = $ParseFileAdd['Subject'];
            $File->Message = $ParseFileAdd['Message'];
            $SaveFile = $File->save();
            return $SaveFile->objectId;
        }
    }

    public function cbFileAdd($cbFileAdd) // Добавляет запись в ведро file
    {
        if (!empty($cbFileAdd['file'])) {
            return $this->cbSetDocument($cbFileAdd, ["bucket" => "file"]);
        } else {
            return false;
        }
    }

    public function ddbFileAdd($ddbFileAdd)
    {
        if (!empty($ddbFileAdd['file'])) {
            return $this->ddbSetDocument($ddbFileAdd, ["table" => "file"]);
        } else {
            return false;
        }
    }

    public function cbSetDocument($cbSetDocument, $cbBucket)
    {
        //echo "\n\r<br>setDocument -----> bucket: " . $copyParseItems["bucket"];
        //echo "\n\r<br>setDocument -----> document: "; // ============== НЕ ВКЛЮЧАТЬ! Мешает выдаче mp4
        //print_r($cbSetDocument["document"]);
        $cbSetDocument[$this->createdAt] = time();
        $bucket = $this->autoConnectToBucket(["bucket" => $cbBucket["bucket"]]);
        if ($cbBucket["bucket"] == "user") {
            $docId = $cbSetDocument[$this->userEmail];
            $cbPaddingDocument = $this->paddingCBData($cbSetDocument);
            //===print_r($cbPaddingDocument);
            $res = $bucket->upsert($docId, $cbPaddingDocument);
            //$res = $bucket->replace($docId, $cbPaddingDocument); //<-------------------------------
        } else {
            $cbPaddingDocument = $this->paddingCBData($cbSetDocument);
            $this->log->setEvent([
                "res" => "stack",
                "type" => "attempt",
                "message" => "set",
                "val" => http_build_query($cbPaddingDocument),
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            $res = $bucket->upsert($cbPaddingDocument[$this->docId], $cbPaddingDocument);
            //$res = $bucket->replace($cbSetDocument[$this->docId], $cbSetDocument); //<--------------------------
        }
        /*
        switch ($cbBucket["bucket"]) {
            case "user":
                break;
            case "article":
                break;
            default:
                break;
        }
        */
        //echo "\n\r<br>setDocument -----> res: ";
        //print_r($res);
        if (isset($res->cas)) {
            //echo "\n\r<br>setDocument -----> res: ";
            //print_r($res);
            //return $res->cas;
            /*$this->log->setEvent([
                "type" => "success",
                "message" => "couchbase",
                "val" => $cbPaddingDocument[$this->docId],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            return $cbPaddingDocument[$this->docId];
        } else {
            //echo "\n\r<br><b>Document insert failed in bucket: " . $copyParseItems["bucket"] . "</b>";
            $this->log->setEvent([
                "type" => "error",
                "message" => "couchbase",
                "val" => $res,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return false;
        }
    }

    public function ddbSetDocument($ddbSetDocument, $table)
    {
        $ddbPaddingDocument = $this->paddingCBData($ddbSetDocument);


        $dynamodb = new Aws\DynamoDb\DynamoDbClient([
            'profile' => 'default',
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $marshaler = new Aws\DynamoDb\Marshaler();

        $time = (string)time();

        try {

            $response = $dynamodb->putItem(array(
                'TableName' => 'test_inbox',
                'Item' => array(
                    'user_id' => array('S' => $ddbPaddingDocument[$this->ownerId]),
                    'time' => array('N' => $time),
                    'file' => ['S' => $$ddbPaddingDocument[$this->file]],
                    'subject' => ['S' => $$ddbPaddingDocument[$this->subject]],
                    'message' => ['S' => $$ddbPaddingDocument[$this->message]],
                    'videoDuration' => ['S' => $$ddbPaddingDocument[$this->videoDuration]]
                )
            ));

            return $response;
        } catch (DynamoDbException $e) {
            //echo "Unable to add item:\n";
            echo $e->getMessage() . "\n";
            return false;
        }
    }

    public function paddingCBData($paddingUserData)
    {
        // Добавлять в отчет все PHP ошибки
        //error_reporting(-1);
        //echo "\r\n<hr>paddingUserData paddingUserData<br>";
        //print_r($paddingUserData);
        /*$this->log->setEvent([
            "res" => "stack",
            "type" => "attempt",
            "message" => "set",
            "val" => "start " .
                $this->type . ": " . $paddingUserData[$this->type] . " " .
                $this->docId . ": " . $paddingUserData[$this->docId] . " " .
                $this->createdAt . ": " . $paddingUserData[$this->createdAt] . " " .
                $this->fromUserId . ": " . $paddingUserData[$this->fromUserId] . " " .
                $this->fromUserName . ": " . $paddingUserData[$this->fromUserName] . " " .
                $this->toUserId . ": " . $paddingUserData[$this->toUserId] . " " .
                $this->toUserName . ": " . $paddingUserData[$this->toUserName] . " " .
                $this->file . ": " . $paddingUserData[$this->file] . " " .
                $this->subject . ": " . $paddingUserData[$this->subject] . " " .
                $this->message . ": " . $paddingUserData[$this->message],
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);*/
        if (!empty($paddingUserData[$this->type])) {
            $cbItems[$this->type] = $paddingUserData[$this->type];
        } else {
            $this->log->setEvent([
                "type" => "error",
                "message" => "set",
                "val" => http_build_query($paddingUserData),
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            exit;
        }
        if (!empty($paddingUserData[$this->docId])) {
            $cbItems[$this->docId] = $paddingUserData[$this->docId];
        } else {
            $cbItems[$this->docId] = $this->trueRandom();
        }
        if (!empty($paddingUserData[$this->createdAt])) $cbItems[$this->createdAt] = $paddingUserData[$this->createdAt];
        $cbItems[$this->updatedAt] = time();
        // user ========================================================================================================
        if (!empty($paddingUserData[$this->userEmail])) {
            $cbItems[$this->userEmail] = $paddingUserData[$this->userEmail];
        } /*else {
            echo "No email " . $this->userEmail;
            return false;
        }*/
        if (!empty($paddingUserData[$this->userPassword])) $cbItems[$this->userPassword] = $paddingUserData[$this->userPassword];
        if (!empty($paddingUserData[$this->userDisplayName])) $cbItems[$this->userDisplayName] = $paddingUserData[$this->userDisplayName];
        if (!empty($paddingUserData[$this->userFirstName])) $cbItems[$this->userFirstName] = $paddingUserData[$this->userFirstName];
        if (!empty($paddingUserData[$this->userLastName])) $cbItems[$this->userLastName] = $paddingUserData[$this->userLastName];
        if (!empty($paddingUserData[$this->userLink])) $cbItems[$this->userLink] = $paddingUserData[$this->userLink];
        if (!empty($paddingUserData[$this->userGender])) $cbItems[$this->userGender] = $paddingUserData[$this->userGender];
        //if ($paddingItems->get('UserLocale')) $cbItems["document"]["userLocale"] = $paddingItems->get('UserLocale');
        if (!empty($paddingUserData[$this->userPicture])) $cbItems[$this->userPicture] = $paddingUserData[$this->userPicture];
        if (!empty($paddingUserData[$this->spring])) $cbItems[$this->spring] = $paddingUserData[$this->spring];
        /*if (!empty($paddingUserData[$this->facebook])) $cbItems[$this->facebook] = $paddingUserData[$this->facebook];
        if (!empty($paddingUserData[$this->google])) $cbItems[$this->google] = $paddingUserData[$this->google];
        if (!empty($paddingUserData[$this->microsoft])) $cbItems[$this->microsoft] = $paddingUserData[$this->microsoft];*/
        //if (!empty($paddingUserData[$this->socialPrefix])) $cbItems[$this->socialPrefix] = $paddingUserData[$this->socialPrefix];
        //$socialPrefix = $cbItems[$this->socialPrefix];
        if (!empty($paddingUserData[$this->socialId])) $cbItems[$paddingUserData[$this->socialPrefix]] = $paddingUserData[$this->socialId];

        // common ======================================================================================================
        if (!empty($paddingUserData[$this->file])) $cbItems[$this->file] = $paddingUserData[$this->file];
        if (!empty($paddingUserData[$this->subject])) $cbItems[$this->subject] = $paddingUserData[$this->subject];
        if (!empty($paddingUserData[$this->message])) $cbItems[$this->message] = $paddingUserData[$this->message];
        if (!empty($paddingUserData["status"])) $cbItems["status"] = $paddingUserData["status"];
        if (!empty($paddingUserData["fileSizeDone"])) $cbItems["fileSizeDone"] = $paddingUserData["fileSizeDone"]; // ???

        // file ========================================================================================================
        if (!empty($paddingUserData[$this->ownerId])) $cbItems[$this->ownerId] = $paddingUserData[$this->ownerId];
        if (!empty($paddingUserData[$this->videoDuration])) $cbItems[$this->videoDuration] = $paddingUserData[$this->videoDuration];
        if (!empty($paddingUserData[$this->listId])) $cbItems[$this->listId] = $paddingUserData[$this->listId];
        if (!empty($paddingUserData[$this->countShow])) $cbItems[$this->countShow] = $paddingUserData[$this->countShow];

        // fileCouple ======================================================================================================
        if (!empty($paddingUserData['prevFile'])) $cbItems['prevFile'] = $paddingUserData['prevFile'];
        if (!empty($paddingUserData['case'])) $cbItems['case'] = $paddingUserData['case'];

        // fileActivity ================================================================================================
        if (!empty($paddingUserData[$this->fromUserId])) $cbItems[$this->fromUserId] = $paddingUserData[$this->fromUserId];
        if (!empty($paddingUserData[$this->toUserId])) $cbItems[$this->toUserId] = $paddingUserData[$this->toUserId];
        if (!empty($paddingUserData[$this->oldToUserId])) $cbItems[$this->oldToUserId] = $paddingUserData[$this->oldToUserId];
        if (!empty($paddingUserData[$this->oldFromUserId])) $cbItems[$this->oldFromUserId] = $paddingUserData[$this->oldFromUserId];
        if (!empty($paddingUserData[$this->fromUserName])) $cbItems[$this->fromUserName] = $paddingUserData[$this->fromUserName];
        if (!empty($paddingUserData[$this->toUserName])) $cbItems[$this->toUserName] = $paddingUserData[$this->toUserName];
        // Conference ====================================================================
        if (!empty($paddingUserData[$this->recipients])) $cbItems[$this->recipients] = $paddingUserData[$this->recipients];
        //if (!empty($paddingUserData[$this->conference])) $cbItems[$this->conference] = $paddingUserData[$this->conference];
        if (!empty($paddingUserData[$this->conferenceId])) $cbItems[$this->conferenceId] = $paddingUserData[$this->conferenceId];
        if (!empty($paddingUserData[$this->inReplyTo])) $cbItems[$this->inReplyTo] = $paddingUserData[$this->inReplyTo];
        if (!empty($paddingUserData[$this->read])) $cbItems[$this->read] = $paddingUserData[$this->read];

        // list ========================================================================================================
        if (!empty($paddingUserData[$this->list])) $cbItems[$this->list] = $paddingUserData[$this->list];

        // fileShow ======================================================================================================
        if (!empty($paddingUserData[$this->IP])) $cbItems[$this->IP] = $paddingUserData[$this->IP];

        // article & video ======================================================================================================
        if (!empty($paddingUserData[$this->tags])) $cbItems[$this->tags] = $paddingUserData[$this->tags];
        if (!empty($paddingUserData[$this->tag])) $cbItems[$this->tag] = $paddingUserData[$this->tag];
        if (!empty($paddingUserData[$this->cnt])) $cbItems[$this->cnt] = $paddingUserData[$this->cnt];

        /*$this->log->setEvent([
            "res" => "stack",
            "type" => "info",
            "message" => "set",
            "val" => "exit " .
                $this->type . ": " . $cbItems[$this->type] . " " .
                $this->docId . ": " . $cbItems[$this->docId] . " " .
                $this->createdAt . ": " . $cbItems[$this->createdAt] . " " .
                $this->fromUserId . ": " . $cbItems[$this->fromUserId] . " " .
                $this->fromUserName . ": " . $cbItems[$this->fromUserName] . " " .
                $this->toUserId . ": " . $cbItems[$this->toUserId] . " " .
                $this->toUserName . ": " . $cbItems[$this->toUserName] . " " .
                $this->file . ": " . $cbItems[$this->file] . " " .
                $this->subject . ": " . $cbItems[$this->subject] . " " .
                $this->message . ": " . $cbItems[$this->message],
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);*/
        return $cbItems;
    }

    /**
     * @param int $trueRandom
     * @return string
     */
    public function trueRandom($trueRandom = 6)
    {
        // return 6 * 2
        $bytes = openssl_random_pseudo_bytes($trueRandom, $cstrong);
        $hex = bin2hex($bytes);
        return $hex;
    }

    public function randBackground()
    {
        // return 6 * 2
        return 'https://img.rate-my.life/' . $this->backgrounds[array_rand($this->backgrounds)];
    }

    public function ParseFileActivityAdd($ParseFileActivityAdd)
    {
        if (!empty($ParseFileActivityAdd['File'])) {
//$ParseFileActivityAdd['Message'] = substr($ParseFileActivityAdd['Message'], 0, 100);
            $FileActivityAdd = new parseObject('FileActivity');
            $FileActivityAdd->FromUserId = $ParseFileActivityAdd['FromUserId'];
            $FileActivityAdd->FromUserName = $ParseFileActivityAdd['FromUserName'];
            $FileActivityAdd->ToUserId = $ParseFileActivityAdd['ToUserId'];
            $FileActivityAdd->ToUserName = $ParseFileActivityAdd['ToUserName'];
            $FileActivityAdd->File = $ParseFileActivityAdd['File'];
            $FileActivityAdd->Subject = $ParseFileActivityAdd['Subject'];
            $FileActivityAdd->Message = $ParseFileActivityAdd['Message'];
            $SaveResult = $FileActivityAdd->save();
            // Поставить 1 в таблице _User
            $this->ParseSetPushinbox(array(
                'userid' => $ParseFileActivityAdd['ToUserId']
            ));
            return $SaveResult->objectId;
        }
    }

    public function ParseSetPushinbox($ParseSetPushinbox)
    {
        if (isset($ParseSetPushinbox['userid'])) {
            $ResultUserSessionToken = $this->ParseGetUserSessionToken(array(
                'UserObjectId' => $ParseSetPushinbox['userid']
            ));
            $UserSessionToken = $ResultUserSessionToken['results']['0']['UserSessionToken'];
            $UpdateUser = new parseUser;
            $UpdateUser->pushinbox = 1;
            $UpdateResult = $UpdateUser->update($ParseSetPushinbox['userid'], $UserSessionToken);
        } else {
        }
    }

    public function ParseGetUserSessionToken($ParseGetUserSessionToken)
    {
        if (!empty($ParseGetUserSessionToken['UserObjectId'])) {

            $TempUserSessionToken = new parseQuery('TempUserSessionToken');
            $TempUserSessionToken->where('UserObjectId', $ParseGetUserSessionToken['UserObjectId']);
            return $this->ConvParseData($TempUserSessionToken->find());
        } else {
            // Запросить Session-Token пользователя
            $LoginUser = new parseUser;
            $LoginUser->username = $ParseGetUserSessionToken['username'];
            $LoginUser->password = $ParseGetUserSessionToken['password'];
            return $LoginUser->login();
        }
    }

    public function cbFileActivityAdd($cbFileActivityAdd)
    {
        // TODO: Поставить проверку $cbFileActivityAdd[$this->conferenceId]
        $this->log->setEvent([
            "res" => "stack",
            "type" => "attempt",
            "message" => "set",
            "val" => $cbFileActivityAdd,
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);
        if (!empty($cbFileActivityAdd[$this->file])) {
//$ParseFileActivityAdd['Message'] = substr($ParseFileActivityAdd['Message'], 0, 100);
            /*            $FileActivityAdd = new parseObject('FileActivity');
                        $FileActivityAdd->FromUserId = $cbFileActivityAdd['FromUserId'];
                        $FileActivityAdd->FromUserName = $cbFileActivityAdd['FromUserName'];
                        $FileActivityAdd->ToUserId = $cbFileActivityAdd['ToUserId'];
                        $FileActivityAdd->ToUserName = $cbFileActivityAdd['ToUserName'];
                        $FileActivityAdd->File = $cbFileActivityAdd['File'];
                        $FileActivityAdd->Subject = $cbFileActivityAdd['Subject'];
                        $FileActivityAdd->Message = $cbFileActivityAdd['Message'];
                        $SaveResult = $FileActivityAdd->save();
                        // Поставить 1 в таблице _User
                        $this->ParseSetPushinbox(array(
                            'userid' => $cbFileActivityAdd['ToUserId']
                        ));
                        return $SaveResult->objectId;*/
            //$cbPaddingDocument = $this->paddingCBData($cbFileActivityAdd);

            //return $this->cbSetDocument($cbPaddingDocument, ["bucket" => "file"]);
            return $this->cbSetDocument($cbFileActivityAdd, ["bucket" => "file"]);
        } else {
            return false;
        }
    }

    public function ParseSetFileShow($ParseSetFileShow)
    {
        if (!empty($ParseSetFileShow['File'])) {
            $FileCountShow = new parseQuery('FileCountShow');
            $FileCountShow->where('File', $ParseSetFileShow['File']);
            $ResultFileCountShow = $this->ConvParseData($FileCountShow->find());
            $FileCountShowObject = new parseObject('FileCountShow');
            if (empty($ResultFileCountShow['results']['0']['CountShow'])) {
                $FileCountShowObject->File = $ParseSetFileShow['File'];
                $FileCountShowObject->CountShow = 1;
                $FileCountShowObject->save();
//				$FileCountShowObject->update($ResultFileCountShow['results']['0']['objectId']);
            } else {
                $ResultFileCountShow['results']['0']['CountShow'] = $ResultFileCountShow['results']['0']['CountShow'] + 1;
                $FileCountShowObject->CountShow = $ResultFileCountShow['results']['0']['CountShow'];
                $FileCountShowObject->update($ResultFileCountShow['results']['0']['objectId']);
            }
            $FileShow = new parseObject('FileShow');
            $FileShow->File = $ParseSetFileShow['File'];
            $FileShow->UserId = $ParseSetFileShow['userId'];
            $FileShow->IP = $ParseSetFileShow['UserIP'];
            $FileShow->PrevFile = $ParseSetFileShow['prev_file'];
            $FileShow->save();
            $FileActivity = new parseObject('FileActivity');
            $FileActivity->Read = true;
            $FileActivity->update($ParseSetFileShow['messageid']);

            // Стереть предвыборку из кэша
            $this->CacheInboxDel(array('userid' => $ParseSetFileShow['userId']
            ));
        }
    }

// ready

    public function CacheInboxDel($CacheInboxDel) // TODO: remove
    {
        if (!empty($CacheInboxDel['userid'])) {
            $url = "http://vide-cache-inbox.herokuapp.com/file/inbox/del?t=" . $CacheInboxDel['userid'];
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_TIMEOUT, 30);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_HEADER, false);
            curl_exec($handle);
            curl_close($handle);
        }
    }

    public function cbSetFileShow($cbSetFileShow)
    {
        //echo "cbSetFileShow ";
        //print_r($cbSetFileShow);
        if (!empty($cbSetFileShow[$this->file])) {
            // Прибавить 1 к количеству просмотров файла
            $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
            $query = CouchbaseViewQuery::from("file", "file")->key($cbSetFileShow[$this->file])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                //$res = $bucket->query($query);
                $res = $this->SharePreParseData($bucket->query($query));
                //echo "res ";
                //print_r($res);
                //exit;
                //$fileCountShow = $res["rows"][0]["value"];
                $fileCountShow = $res["rows"][0]["value"];
                //echo "fileCountShow ";
                //print_r($fileCountShow);
            } catch (Exception $e) {
                echo "Error cbSetFileShow get file: " . $e->getMessage();
                return false;
            }
            if (!empty($fileCountShow)) {
                if (!array_key_exists($this->countShow, $fileCountShow)) {
                    $fileCountShow[$this->countShow] = 0;
                }
                $fileCountShow[$this->countShow] = $fileCountShow[$this->countShow] + 1;
                $this->cbUpdateDocument($fileCountShow, ["bucket" => "file"]);
            }/* else {
                $newCbSetFileCountShow[$this->type] = $this->fileCountShow;
                $newCbSetFileCountShow[$this->file] = $cbSetFileShow[$this->file];
                $newCbSetFileCountShow[$this->countShow] = 1;
                $this->cbSetDocument($newCbSetFileCountShow, ["bucket" => "file"]);

            }*/
            // Записать лог просмотра
            $newCbSetFileShow[$this->type] = $this->fileShow;
            $newCbSetFileShow[$this->file] = $cbSetFileShow[$this->file];
            $newCbSetFileShow[$this->IP] = $cbSetFileShow[$this->IP];
            $newCbSetFileShow[$this->userId] = $cbSetFileShow[$this->userId];
            $this->cbSetDocument($newCbSetFileShow, ["bucket" => "file"]);
            // Указать, что сообщение прочтено
            if (!empty($cbSetFileShow['messageid'])) {
                $oldDoc = $this->cbGet($this->autoConnectToBucket(["bucket" => "file"]), $cbSetFileShow['messageid']);
                $oldDoc[$this->read] = true;
                $newDoc = $this->paddingCBData($oldDoc);
                $this->cbSetDocument($newDoc, ["bucket" => "file"]);
            }
            // Стереть предвыборку из кэша
            //$this->CacheInboxDel(array('userid' => $cbSetFileShow['userId']
            //));
            return true;
        } else {
            return false;
        }
    }

    public function cbUpdateDocument($cbUpdateDocument, $cbBucket)
    {
        // Обновление документа слиение старых и новых строк, ID сохраняется
        //error_reporting(0); // Turn off error reporting
        //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors
        //echo "<br>cbUpdateDocument: <br>"; // <============== НЕ ВКЛЮЧАТЬ! Мешает выдаче mp4
        //print_r($cbUpdateDocument);

        // "docId": "c6feca07129c946a2e67a777",
        // $bucket = $this->autoConnectToBucket(["bucket" => $cbBucket["bucket"]]);
        //if ($cbBucket["bucket"] == $this->classBucket["User"]) {
        if ($cbBucket["bucket"] == "user") {
            $docId = $cbUpdateDocument[$this->userEmail];
            //unset ($setDocument["document"][$this->userEmail]);

            //$result = $bucket->get($docId);
            //print_r($result->value->createdAt);

            /*if (!empty($cbItems["document"][$this->createdAt])) {
                $cbItems["document"][$this->createdAt] = $paddingUserData[$this->createdAt];
            } else {
                $cbItems["document"][$this->createdAt] = time();
            }*/

        } else {
            $docId = $cbUpdateDocument[$this->docId];
        }
        /*$this->log->setEvent([
                "res" => "stack",
                "type" => "attempt",
                "message" => "set",
                "val" => "docId: " . $docId,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/

        /*$result = $bucket->get($docId);
        echo "\r\n<hr>cbUpdateDocument result<br>";
        print_r($result);
        echo "\r\n<hr>cbUpdateDocument result->value->createdAt<br>";
        print_r($result->value->createdAt);
        echo "\r\n<hr>cbUpdateDocument result->value->docId<br>";
        print_r($result->value->docId);
        $ConvParseData = $this->ConvParseData($result->value);
        echo "\r\n<hr>cbUpdateDocument ConvParseData<br>";
        print_r($ConvParseData);
        //$cbItems = $this->paddingUserData(["document" => $ConvParseData]);
        $cbItems = $this->paddingUserData($ConvParseData);
        echo "\r\n<hr>cbUpdateDocument paddingUserData cbItems<br>";
        print_r($cbItems);*/

        //$oldDocRes = $bucket->get($docId);
        $oldDoc = $this->cbGet($this->autoConnectToBucket(["bucket" => $cbBucket["bucket"]]), $docId);

        //$oldDoc = $this->ConvParseData($oldDocRes->value);
        //echo "\r\n<hr>cbUpdateDocument paddingUserData cbItems<br>";
        //print_r($cbItems);
        //$newDoc = $this->paddingCBData($cbUpdateDocument);
        /*echo "\r\n<hr>cbUpdateDocument oldDoc<br>";
        print_r($oldDoc);
        echo "\r\n<hr>cbUpdateDocument newDoc<br>";
        print_r($newDoc);
        error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors*/
        //== not work paddingCBData $trueDoc = array_merge($oldDoc, $newDoc);
        $trueDoc = array_merge($oldDoc, $cbUpdateDocument);
        //$trueDoc[$this->updatedAt] = time();
        $trueDoc = array_slice($trueDoc, 0, 2, true) +
            [
                $this->updatedAt => time()
            ] +
            array_slice($trueDoc, 0, count($trueDoc), true);
        //echo "\r\n<hr>cbUpdateDocument trueDoc<br>";
        //print_r($trueDoc);
        $this->log->setEvent([
            "res" => "stack",
            "type" => "attempt",
            "message" => "set",
            "val" => http_build_query($trueDoc),
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);

        //$result = $bucket->replace('aass_brewery-juleol', $doc);
        $bucket = $this->autoConnectToBucket(["bucket" => $cbBucket["bucket"]]);
        try {
            $res = $bucket->upsert($docId, $trueDoc);
        } catch (Exception $e) {
            echo "Error cbUpdateDocument: " . $e->getMessage();
            return false;
        }
        //echo "ok";

        if (isset($res->cas)) {
            //echo "\n\r<br>cbUpdateDocument -----> res: ";
            //print_r($res);
            //return $res->cas;
            return $docId;
        } else {
            //echo "\n\r<br><b>Document insert failed in bucket: " . $cbBucket["bucket"] . "</b>";
            $this->log->setEvent([
                "type" => "error",
                "message" => "set",
                "val" => "couchbase",
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return false;
        }

        //$res = $bucket->upsert($docId, $cbUpdateDocument["document"]);

        /*


                // Не нужная функция обновления с переименованием документа
                echo "\n\r<br>setDocument -----> bucket: " . $cbBucket["bucket"];
                echo "\n\r<br>setDocument -----> document: ";
                print_r($cbOldDocument["document"]);
                $bucket = $this->autoConnectToBucket(["bucket" => $cbBucket["bucket"]]);
                $cbNewDocument["article"]["updatedAt"] = time();
                if ($cbBucket["bucket"] == $this->classBucket["User"]) {
                    $docId = $cbOldDocument["document"][$this->userEmail];
                    //unset ($setDocument["document"][$this->userEmail]);
                    $res = $bucket->upsert($docId, $cbOldDocument["document"]);
                } else {
                    $res = $bucket->upsert($cbOldDocument["document"]["docId"], $cbOldDocument["document"]);
                }
                if ($cbOldDocument["document"]["docId"] == $cbNewDocument["document"]["docId"]) {
                    // Если Id документа не меняется
                    try {
                        $res = $bucket->replace($cbOldDocument["document"]["docId"], $cbNewDocument);
                        echo "Doc updated successfully";
                    } catch (Exception $e) {
                        exit ("Error: " . $e->getMessage());
                    }
                } else {
                    // Если Id документа меняется
                    $bucket->remove($cbOldDocument["document"]["docId"]);
                    $bucket->insert($cbNewDocument["document"]["docId"], $cbNewDocument);
                    echo "Doc renew successfully";
                }
                if (isset($res->cas)) {
                    echo "\n\r<br>setDocument -----> res: ";
                    print_r($res);
                    //return $res->cas;
                    return $cbOldDocument["document"]["docId"];
                } else {
                    echo "\n\r<br><b>Document insert failed in bucket: " . $cbBucket["bucket"] . "</b>";
                    return false;
                }*/
    }

    public function cbRebuildDocument($cbRebuildDocument, $cbBucket)
    {
        //echo "cbRebuildDocument\r\n";
        //print_r($cbRebuildDocument, $cbBucket);
        // Перезапись документа новыми строками, ID сохраняется
        $cbPaddingDocument = $this->paddingCBData($cbRebuildDocument);
        $bucket = $this->autoConnectToBucket(["bucket" => $cbBucket["bucket"]]);
        $this->log->setEvent([
            "res" => "stack",
            "type" => "attempt",
            "message" => "set",
            "val" => http_build_query($cbPaddingDocument),
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);
        $bucket->replace($cbRebuildDocument[$this->docId], $cbPaddingDocument);
        return $cbPaddingDocument[$this->docId];
    }

    public function cbGet($cbBucket, $cbGet)
    {
        //==echo "\r\n<hr><b>cbGet cbBucket</b><br>";
        //==print_r($cbBucket);
        //==echo "\r\n<hr><b>cbGet cbGet</b><br>";
        //==print_r($cbGet);
        try {
            $res = $cbBucket->get($cbGet);

            //==echo "\r\n<hr><b>cbGet res</b><br>";
            //==var_dump($res);

            // Начало аномалии
            // https://forums.couchbase.com/t/get-why-is-change-the-data-type/6723
            if (is_object($res->value)) {
                /*$this->log->setEvent([
                    "type" => "attempt",
                    "message" => "set",
                    "val" => "is_object",
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);*/
                // Вариант 1
                /*
                 * При cbUpdateUserPas 01.02.2016 возвращается:
                 * cbGet res
            object(CouchbaseMetaDoc)#16 (4) { ["error"]=> NULL ["value"]=> object(stdClass)#8 (5) { ["docId"]=> string(24) "062e186f1b210e49d17a914a" ["createdAt"]=> int(1454140186) ["updatedAt"]=> int(1454266897) ["userEmail"]=> string(19) "mne@sergeykozlov.ru" ["userPassword"]=> string(8) "Pilsner1" } ["flags"]=> int(33554438) ["cas"]=> resource(7) of type (CouchbaseCAS) } */

                // Исправлено для userLogin. Не работает с cbUpdateUserPas!
                $convGetData = $this->ConvParseData($res->value); // <--- Работает с userLogin cbUpdateUserPas
                //==echo "\r\n<hr><b>cbGet ConvParseData convGetData</b><br>";
                //==var_dump($convGetData);
                //return $resConvParseData;
                /*
                 * При userLogin 02.02.2016 возвращается:
                 * cbGet res
            object(CouchbaseMetaDoc)#12 (4) {
            ["error"]=>
            NULL
            ["value"]=>
            string(142) "{"docId":"eded5a6cc3ec348e767084d2","createdAt":1454390234,"updatedAt":1454393253,"userEmail":"mne@sergeykozlov.ru","userPassword":"Password"}" */
                /*echo "\r\n<hr><b>cbGet var_dump res->value</b><br>";
                var_dump($res->value);
                $resConv = $this->objectToArray($res->value);
                echo "\r\n<hr><b>cbGet objectToArray resConv</b><br>";
                var_dump($resConv);*/

            } elseif (is_string($res->value)) {
                $this->log->setEvent([
                    "type" => "attempt",
                    "message" => "set",
                    "val" => "is_string",
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                $convGetData = json_decode($res->value, true);
                //==echo "\r\n<br><b>cbGet json_decode, true</b><br>";
                //==var_dump($convGetData);
            }
            // Вариант 2


            //$convGetDataresConv = json_decode($resConv, true);
            //echo "\r\n<br><b>cbGet json_decode resConvParseData onv, true</b><br>";
            //==$onv = json_decode($resConvParseData, true);
            // Исправлено для cbUpdateUserPas. Не работает с userLogin!
            //==========$convGetData = json_decode($res->value, true); // <--- Работает с cbUpdateUserPas
            //====echo "\r\n<br><b>cbGet onv</b><br>";
            //====print_r($onv);
            //echo "\r\n<br><b>cbGet json_decode resConv, true</b><br>";
            //var_dump($convGetDataresConv);
            //if ($res->value) return $convGetData;
            //if ($res->value) return $res->value;

            // Разрыв аномалии
            // Нужно возвращать массив
            //if ($resConvParseData) return $resConvParseData; // <--- Работает с userLogin cbUpdateUserPas
            //if ($convGetData) return $convGetData; // <--- Работает с cbUpdateUserPas
            if ($convGetData) return $convGetData; // <--- Для разрыва аномалии
        } catch (Exception $e) {
            echo "Error cbGet: " . $e->getMessage();
        }
        return false;
    }

    public function cbRemove($cbBucket, $cbRemove)
    {
        //==echo "\r\n<hr><b>cbGet cbBucket</b><br>";
        //==print_r($cbBucket);
        //==echo "\r\n<hr><b>cbGet cbGet</b><br>";
        //==print_r($cbGet);
        // DDDDDDDDDDDDDDelll b1bee4d099b6 video and img ===================================================================
        try {
            $res = $cbBucket->remove($cbRemove);
            if ($res) return $res;
        } catch (Exception $e) {
            echo "Not found. $cbRemove"; //. $e->getMessage();
        }
        return false;
    }

    public function ParseFileInfo($ParseFileInfo) // ready
    {
        if (!empty($ParseFileInfo['File'])) {
            $FindFileInfo = new parseQuery('File');
            $FindFileInfo->where('File', $ParseFileInfo['File']);
            $FindFileInfo->where('File', $ParseFileInfo['File']);
            return $FindFileInfo->find();
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbFileInfo($cbFileInfo)
    {
        //echo "\r\n<br>cbFileInfo <br>\r\n";
        //print_r($cbFileInfo);
        if (!empty($cbFileInfo[$this->file])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
            $query = CouchbaseViewQuery::from('file', 'file')->key($cbFileInfo[$this->file])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                //$res = $bucket->query($query);
                $res = $this->SharePreParseData($bucket->query($query));
                //echo "\r\n<br>cbFileInfo res<br>\r\n";
                //print_r($res);
                //return $res["rows"][0]["value"];
                if (!empty($res["rows"][0]["value"])) {
                    return $res["rows"][0]["value"];
                } else {
                    return false;
                }
            } catch (Exception $e) {
                return false;
            }
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgFileInfo($pgFileInfo)
    {
        //echo "\r\n<br>cbFileInfo <br>\r\n";
        //print_r($cbFileInfo);
        if (!empty($pgFileInfo['item_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataByColumn([
                'table' => $pg->table_items,
                'find_column' => 'item_id',
                'find_value' => $pgFileInfo['item_id']]);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgPostInfo($pgPostInfo)
    {
        //echo "\r\n<br>cbFileInfo <br>\r\n";
        //print_r($cbFileInfo);
        if (!empty($pgPostInfo['post_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataByColumn([
                'table' => $pg->table_posts,
                'find_column' => 'post_id',
                'find_value' => $pgPostInfo['post_id']]);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgItemFullInfo($pgItemFullInfo)
    {
        //echo "\r\n<br>cbFileInfo <br>\r\n";
        //print_r($cbFileInfo);
        if (!empty($pgItemFullInfo)) {
            $pg = new PostgreSQL();
            //return $pg->pgGetItemFullInfo($pgItemFullInfo);
            $resItem = $pg->pgGetItemFullInfo($pgItemFullInfo);
            /*if (!empty($resItem['body'])) {
                $bodyJSON = json_decode($resItem['body']);
                $trueBody = [];
                foreach ($bodyJSON as $value1) {
                    $trueBody[] = $this->ConvParseData($value1);
                }
                $resItem['body'] = $trueBody;
            }*/
            if (!empty($resItem['body'])) {
                $resItem['body'] = $this->pgJSONconvert($resItem, 'body');
            }
            return $resItem;
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }
    public function pgJSONconvert($resItem, $keyName) {
        $newresItem = [];
        //var_dump($resItem);
        //echo 'key' . $resItem["$keyName"];
        if (!empty($resItem["$keyName"])) {
            $bodyJSON = json_decode($resItem["$keyName"]);
            $trueBody = [];
            foreach ($bodyJSON as $value1) {
                $trueBody[] = $this->ConvParseData($value1);
            }
            $newresItem["$keyName"] = $trueBody;
        }
        return $newresItem["$keyName"];
    }
    public function pgJSONconvertComplexForList($resList) {
        $resList['items_array'] = $this->pgJSONconvert($resList, 'items_array');
        //$resList['src_array'] = $this->pgJSONconvert($resList, 'src_array');
        $resList['covers_array'] = $this->pgJSONconvert($resList, 'covers_array');
        $resList['titles_array'] = $this->pgJSONconvert($resList, 'titles_array');
        $resList['contents_array'] = $this->pgJSONconvert($resList, 'contents_array');
        $resList['authors_array'] = $this->pgJSONconvert($resList, 'authors_array');
        $resList['springs_array'] = $this->pgJSONconvert($resList, 'springs_array');
        $resList['tags_array'] = $this->pgJSONconvert($resList, 'tags_array');
        return $resList;
    }

    public function pgItemTagsAccess($pgItemTagsAccess)
    {
        //echo "\r\n<br>cbFileInfo <br>\r\n";
        //print_r($cbFileInfo);
        if (!empty($pgItemTagsAccess)) {
            $pg = new PostgreSQL();
            //return $pg->pgGetItemFullInfo($pgItemFullInfo);
            //$resItem = $pg->pgGetItemTags($pgItemTags);
            if (!empty($pgItemTagsAccess['user_id'])) {
                return $pg->pgGetItemTagsAccess($pgItemTagsAccess);
            } else {
                $userCookie = $this->GetUserCookieValue();
                if (!empty($userCookie)) {
                    $pgItemTagsAccess['user_id'] = $this->CookieToUserId();
                    return $pg->pgGetItemTagsAccess($pgItemTagsAccess);
                } else {
                    return $pg->pgGetItemTagsAccessNOA($pgItemTagsAccess);
                }
            }
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgItemFullInfoAccess($pgItemFullInfo)
    {
        //echo "\r\n<br>cbFileInfo <br>\r\n";
        //print_r($cbFileInfo);
        if (!empty($pgItemFullInfo)) {
            $pg = new PostgreSQL();
            $userCookie = $this->GetUserCookieValue();
            if (!empty($userCookie)) {
                $pgItemFullInfo['to_user_id'] = $this->CookieToUserId();
                return $pg->pgGetItemFullInfoAccess($pgItemFullInfo);
            } else {
                return $pg->pgGetItemFullInfoAccessNOA($pgItemFullInfo);
            }
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    /*
        public function cbMessageInfo($cbMessageInfo)
        {
            //echo "\r\n<br>cbFileInfo <br>\r\n";
            //print_r($cbFileInfo);
            if (!empty($cbMessageInfo[$this->file])) {
                $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
                $query = CouchbaseViewQuery::from('file', 'file')->key($cbMessageInfo[$this->file])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
                try {
                    //$res = $bucket->query($query);
                    $res = $this->SharePreParseData($bucket->query($query));
                    //echo "\r\n<br>cbFileInfo res<br>\r\n";
                    //print_r($res);
                    //return $res["rows"][0]["value"];
                    if (!empty($res["rows"][0]["value"])) {
                        return $res["rows"][0]["value"];
                    } else {
                        return false;
                    }
                } catch (Exception $e) {
                    return false;
                }
            } else {
                //header('Location: https://vide.me/VictorLustig.html');
                return false;
            }
        }*/

    public function ParseMessageInfo($ParseMessageInfo) // ready
    {
        if (!empty($ParseMessageInfo['MessageId'])) {
            $FindMessageInfo = new parseQuery('FileActivity');
            //$FindMessageInfo->where('File', $ParseMessageInfo['File']);
            $FindMessageInfo->where('objectId', $ParseMessageInfo['MessageId']);
            $ConvParseData = $this->ConvParseData($FindMessageInfo->find());
            return $ConvParseData;
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function ParseShowMyInboxFile($ParseShowMyInboxFile)
    {
        if (!empty($ParseShowMyInboxFile['userid'])) {
            $FindMyInboxFile = new parseQuery('FileActivity');
            $FindMyInboxFile->where('ToUserId', $ParseShowMyInboxFile['userid']);
            $FindMyInboxFile->orderByDescending('createdAt');
            $FindMyInboxFile->setLimit(500);
            /*
                        // Поставить 0 в таблице _User
                        $this->ParseUnSetPushinbox(array(
                                    'userid' => $ParseShowMyInboxFile['userid']
                                    ));
            */
            // Отправляем сообщение в нотификатор:
            $this->NotifFileSend(array('userid' => $ParseShowMyInboxFile['userid']
            ));
            return $FindMyInboxFile->find();
        } else {
            echo "Missing argument - userid";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function NotifFileSend($NotifFileSend) // TODO: Remove
    {
        if (!empty($NotifFileSend['userid'])) {
            $url = "https://ws-1000.herokuapp.com/pushinbox";
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_TIMEOUT, 30);
            //curl_setopt($handle, CURLOPT_USERAGENT, 'parse.com-php-library/2.0');
            curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
            //curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLINFO_HEADER_OUT, true);
            curl_setopt($handle, CURLOPT_HTTPHEADER, array(
                'X-Videme-User-Id: ' . $NotifFileSend['userid']
            ));
            // Поставить 0 в таблице _User
            //$this->ParseUnSetPushinbox(array(
            $this->ParseSetPushinbox(array(
                'userid' => $NotifFileSend['userid']
            ));
            //$params = array(
            //	'ListId' => array(
            //		'__op' => 'Delete'
            //	)
            //);
            //$postData = json_encode($params);
            //curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            curl_close($handle);
            //$getData = json_decode($response, true);
            //	echo "File no share: " . $getData['updatedAt'];
        } else {
            //echo "Missing argument - file";
            //header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function showBucketUser($showBucketUser)
    {
        $bucket = $this->autoConnectToBucket(["bucket" => "user"]);
        $query = CouchbaseViewQuery::from("user", 'createdAt')->skip($showBucketUser["skip"])->limit($showBucketUser[$this->limit])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
        try {
            //return $bucket->query($query);
            $res = $bucket->query($query);
            return $res->rows;
        } catch (Exception $e) {
            return false;
        }
    }

    public function showBucketFileActivity($showBucketFileActivity)
    {
        $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
        $query = CouchbaseViewQuery::from("fileActivity", 'createdAt')->skip($showBucketFileActivity["skip"])->limit($showBucketFileActivity[$this->limit])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
        try {
            $res = $bucket->query($query);
            return $res->rows;
        } catch (Exception $e) {
            return false;
        }
    }

    public function cbShowMyInboxFile($cbShowMyInboxFile)
    {
        if (!empty($cbShowMyInboxFile[$this->userId])) {
            $bucketFile = $this->autoConnectToBucket(["bucket" => "file"]);
            //$query = CouchbaseViewQuery::from("fileActivity", 'toUserId')->key($cbShowMyInboxFile['userId'])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //==$startKey = json_encode([$cbShowMyInboxFile[$this->userId], 0]);
            $startKey = json_encode([$cbShowMyInboxFile[$this->userId], time()]);
            //echo "startkey " . $startKey;
            //==$endKey = json_encode([$cbShowMyInboxFile[$this->userId], time()]);
            $endKey = json_encode([$cbShowMyInboxFile[$this->userId], 0]);
            //==$query = CouchbaseViewQuery::from("fileActivity", 'toUserId')->custom(["startkey" => $startKey, "endkey" => $endKey])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            $query = CouchbaseViewQuery::from("fileActivity", 'toUserId')->custom(["startkey" => $startKey, "endkey" => $endKey])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE)->limit($cbShowMyInboxFile[$this->limit]);
            try {
                //return $bucket->query($query);
                $res = $bucketFile->query($query);
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }
        } else {
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyInboxMessage($pgShowMyInboxMessage)
    {
        if (!empty($pgShowMyInboxMessage['select_to_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyInbox($pgShowMyInboxMessage);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMySentMessage($pgShowMySentMessage)
    {
        if (!empty($pgShowMySentMessage['select_from_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMySent($pgShowMySentMessage);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyItems($pgShowMyItems)
    {
        if (!empty($pgShowMyItems['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyVideo($pgShowMyItems);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyPosts($pgShowMyPosts)
    {
        if (!empty($pgShowMyPosts['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyPosts($pgShowMyPosts);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowItemsImages($pgShowItemsImages)
    {
        if (!empty($pgShowItemsImages['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyImages($pgShowItemsImages);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyItemsArticle($pgShowMyItemsArticle)
    {
        if (!empty($pgShowMyItemsArticle['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyArticle($pgShowMyItemsArticle);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyItemsEvents($pgShowMyItemsEvents)
    {
        if (!empty($pgShowMyItemsEvents['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyEvents($pgShowMyItemsEvents);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyConnect($pgShowMyConnect)
    {
        if (!empty($pgShowMyConnect['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyConnect($pgShowMyConnect);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyConnectForFriends($pgShowMyConnectForFriends)
    {
        if (!empty($pgShowMyConnectForFriends['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyConnectForFriends($pgShowMyConnectForFriends);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgMessageInboxDelete($pgMessageInboxDelete)
    {
        if (!empty($pgMessageInboxDelete['message_id'])
            and !empty($pgMessageInboxDelete['select_to_user_id'])) {
            $pg = new PostgreSQL();
            $messageInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_messages,
                'find_column' => 'message_id',
                'find_value' => $pgMessageInboxDelete['message_id']]);
            //echo "\npgMessageInboxDelete messageInfo \n";
            //print_r($messageInfo);
            if ($messageInfo['select_to_user_id'] == $pgMessageInboxDelete['select_to_user_id']) {
                return $pg->pgUpdateData($pg->table_messages, 'select_to_user_id', '', 'message_id', $pgMessageInboxDelete['message_id']);
            } else {
                return 'You ar not owner';
            }
        } else {
            return false;
        }
    }

    public function pgMessageSentDelete($pgMessageSentDelete)
    {
        if (!empty($pgMessageSentDelete['message_id'])
            and !empty($pgMessageSentDelete['select_from_user_id'])) {
            $pg = new PostgreSQL();
            $messageInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_messages,
                'find_column' => 'message_id',
                'find_value' => $pgMessageSentDelete['message_id']]);
            if ($messageInfo['select_from_user_id'] == $pgMessageSentDelete['select_from_user_id']) {
                return $pg->pgUpdateData($pg->table_messages, 'select_from_user_id', '', 'message_id', $pgMessageSentDelete['message_id']);
            } else {
                return 'You ar not owner';
            }
        } else {
            return false;
        }
    }

    public function pgItemsMyDelete($pgItemsMyDelete)
    {
        if (!empty($pgItemsMyDelete['owner_id'])
            and !empty($pgItemsMyDelete['item_id'])) {
            $pg = new PostgreSQL();
            $log = new log();
            $itemInfo = $this->pgFileInfo($pgItemsMyDelete);
            //echo "\npgItemsMyDelete itemInfo \n";
            //print_r($itemInfo);
            if ($itemInfo['owner_id'] == $pgItemsMyDelete['owner_id']) {
                //return $pg->pgDeleteitem($pgItemsMyDelete['item_id']);
                $pg->pgDeleteitem($pgItemsMyDelete['item_id']);
                //$log->toFile(['service' => 'file', 'type' => '', 'text' => 'delete item_id : ' . $pgItemsMyDelete['item_id'] . ' owner_id: ' . $pgItemsMyDelete['owner_id']]);
                $log->toFile(['service' => 'file', 'type' => '', 'text' => 'delete item_id ' . $pgItemsMyDelete['item_id']]);

                return true;
            } else {
                return 'You ar not owner';
            }
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgPostMyDelete($pgPostMyDelete)
    {
        if (!empty($pgPostMyDelete['post_owner_id'])
            and !empty($pgPostMyDelete['post_id'])) {
            $pg = new PostgreSQL();
            $postInfo = $this->pgPostInfo($pgPostMyDelete);
            //echo "\npgItemsMyDelete itemInfo \n";
            //print_r($itemInfo);
            if ($postInfo['post_owner_id'] == $pgPostMyDelete['post_owner_id']) {
                return $pg->pgDelete($pg->table_posts, 'post_id', $pgPostMyDelete['post_id']);
            } else {
                return 'You ar not owner';
            }
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function ParseShowMyFile($ParseShowMyFile)
    {
        if (!empty($ParseShowMyFile['userid'])) {
            $FindMyFile = new parseQuery('File');
            $FindMyFile->where('OwnerId', $ParseShowMyFile['userid']);
            $FindMyFile->orderByDescending('createdAt');
            $FindMyFile->setLimit(500);
            if (!empty($ParseShowMyFile['listid'])) {
                $FindMyFile->where('ListId', $ParseShowMyFile['listid']);
            } else {
                //$FindMyFile->whereExists('ListId');
            }
            return $FindMyFile->find();
        } else {
            echo "Missing argument - userid";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    // Ok

    public function cbShowMyFile($cbShowMyFile)
    {
        if (!empty($cbShowMyFile[$this->userId])) {
            $bucketFile = $this->autoConnectToBucket(["bucket" => "file"]);
            //$query = CouchbaseViewQuery::from("fileActivity", 'toUserId')->key($cbShowMyInboxFile['userId'])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //==$startKey = json_encode([$cbShowMyInboxFile[$this->userId], 0]);
            $startKey = json_encode([$cbShowMyFile[$this->userId], time()]);
            //echo "startkey " . $startKey;
            //==$endKey = json_encode([$cbShowMyInboxFile[$this->userId], time()]);
            $endKey = json_encode([$cbShowMyFile[$this->userId], 0]);
            //==$query = CouchbaseViewQuery::from("fileActivity", 'toUserId')->custom(["startkey" => $startKey, "endkey" => $endKey])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            $query = CouchbaseViewQuery::from("file", 'myFileOwnerId')->custom(["startkey" => $startKey, "endkey" => $endKey])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE)->limit($cbShowMyFile[$this->limit]);
            try {
                //return $bucket->query($query);
                $res = $bucketFile->query($query);
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }

        } else {
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

// ready

    public function ParseShowMySentFile($ParseShowMySentFile)
    {
        if (!empty($ParseShowMySentFile['userid'])) {
            $FindMySentFile = new parseQuery('FileActivity');
            $FindMySentFile->where('FromUserId', $ParseShowMySentFile['userid']);
            $FindMySentFile->orderByDescending('createdAt');
            $FindMySentFile->setLimit(500);
            return $FindMySentFile->find();
        } else {
            echo "Missing argument - userid: " . $ParseShowMySentFile['userid'];
            header('Location: https://vide.me/VictorLustig.html');
        }
    }


    public function cbShowMySentFile($cbShowMySentFile)
    {
        if (!empty($cbShowMySentFile['userId'])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
            //$query = CouchbaseViewQuery::from("fileActivity", 'fromUserId')->key($cbShowMySentFile['userId'])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            $startKey = json_encode([$cbShowMySentFile['userId'], time()]);
            $endKey = json_encode([$cbShowMySentFile['userId'], 0]);
            $query = CouchbaseViewQuery::from("fileActivity", 'fromUserId')->custom(["startkey" => $startKey, "endkey" => $endKey])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE)->limit($cbShowMySentFile[$this->limit]);
            try {
                $res = $bucket->query($query);
                //return $res["rows"];
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }
        } else {
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function ParseFileShowNew($ParseFileShowNew)
    {
        if ((!$ParseFileShowNew['limit']) or ($ParseFileShowNew['limit'] > 99)) $ParseFileShowNew['limit'] = 99;
        $FindShowNew = new parseQuery('File');
        $FindShowNew->setLimit($ParseFileShowNew['limit']);
        $FindShowNew->setSkip($ParseFileShowNew['skip']);
        $FindShowNew->orderByDescending('createdAt');
        $FindShowNew->whereExists('ListId');
        return $FindShowNew->find();
    }

    public function cbFileShowNew($cbFileShowNew)
    {
        $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
        $query = CouchbaseViewQuery::from("file", "getShare")->skip($cbFileShowNew["skip"])->limit($cbFileShowNew[$this->limit])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
        try {
            //return $bucket->query($query);
            $res = $bucket->query($query);
            //var_dump($res);
            //return $res["rows"];
            return $res->rows;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getShareFileByUserId($getShareFileByUserId)
    {
        if (!empty($getShareFileByUserId[$this->userId])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
            $query = CouchbaseViewQuery::from("file", 'getShareByOwnerId')->key($getShareFileByUserId[$this->userId])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                $res = $bucket->query($query);
                //return $res["rows"];
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }
        } else {
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function ParseFileShowNext($ParseFileShowNext) // Ready
    {
//==============================================================================
//if ($ParseFileShowNext['prev_file'] == $ParseFileShowNext['File']) {
//==============================================================================
//echo "\r\nParseFileShowNext['limit']: " . $ParseFileShowNext['limit'];
        if ((!$ParseFileShowNext['limit']) or ($ParseFileShowNext['limit'] > 99)) $ParseFileShowNext['limit'] = 99;
        if (!empty($ParseFileShowNext['file'])) {
//echo "\r\nParseFileShowNext['File']: " . $ParseFileShowNext['File'];
//echo "\r\nParseFileShowNext['prev_file']: " . $ParseFileShowNext['prev_file'];
            $FindFileCouple = new parseQuery('FileCouple');
            $FindFileCouple->where('PrevFile', $ParseFileShowNext['prevfile']);
            $FindFileCouple->where('File', $ParseFileShowNext['file']);
            $ResultFindFileCouple = $this->ConvParseData($FindFileCouple->find());
            $FileCouple = new parseObject('FileCouple');
            if (empty($ResultFindFileCouple['results']['0']['Case'])) {
//echo "\r\nResultFindFileCouple['results']['0']['Case']: " . $ResultFindFileCouple['results']['0']['Case'];
                // Если такой пары ещё нет - записать её
                if ($ParseFileShowNext['prevfile'] != $ParseFileShowNext['file'] and !empty($ParseFileShowNext['prevfile'])) {
                    $FileCouple->PrevFile = $ParseFileShowNext['prevfile'];
                    $FileCouple->File = $ParseFileShowNext['file'];
                    $FileCouple->Case = 1;
                    $FileCouple->save();
                }
                // Включить реверс выборку
                // Реверс выборка пар по запрошенному Next файлу
                $ResultFindReverseFileCouple = $this->ParseFileShowNextReverse($ParseFileShowNext);
                $ResultFindReverseFile = $this->ConvParseData($ResultFindReverseFileCouple);
                if (!empty($ResultFindReverseFile['results']['0']['PrevFile'])) {
                    // Показать результат реверс поиска
//echo "\r\n Revers poisk\r\n";
                    return $ResultFindReverseFileCouple;
                } else {
                    // Если и реверс поиск не помог
                    // Показать просто популярное видео
                    return $this->ParseFileShowPop(array('limit' => $ParseFileShowNext['limit']));
                }
            } else {
                // Если такая пара уже есть, прибавить 1 к случаю просмотра
                $ResultFindFileCouple['results']['0']['Case'] = $ResultFindFileCouple['results']['0']['Case'] + 1;
                $FileCouple->Case = $ResultFindFileCouple['results']['0']['Case'];
                $FileCouple->update($ResultFindFileCouple['results']['0']['objectId']);
//echo "\r\nResultFindFileCouple['results']['0']['Case']: " . $ResultFindFileCouple['results']['0']['Case'];
//echo "\r\nResultFindFileCouple['results']['0']['objectId']: " . $ResultFindFileCouple['results']['0']['objectId'];
//echo "\r\n";
                // Показать выборку пар по запрошенному Prevфайлу
                $FindMatchFileCouple = new parseQuery('FileCouple');
                $FindMatchFileCouple->setLimit($ParseFileShowNext['limit']);
                $FindMatchFileCouple->setSkip($ParseFileShowNext['skip']);
                $FindMatchFileCouple->orderByDescending('Case');
                $FindMatchFileCouple->where('PrevFile', $ParseFileShowNext['file']);
                $ResultFindMatchFile = $FindMatchFileCouple->find();
                $ResultFindMatchFileCouple = $this->ConvParseData($ResultFindMatchFile);
                if (empty($ResultFindMatchFileCouple['results']['0']['PrevFile'])) {
//echo "\r\n Pusto\r\n";
                    // Реверс выборка пар по запрошенному Next файлу
                    return $this->ParseFileShowNextReverse($ParseFileShowNext);
                } else {
//echo "\r\n NE Pusto\r\n";
                    return $ResultFindMatchFile;
                }

            }

        } else {
            // Если пользователь не указал название файла
            // Показать просто популярное видео
            return $this->ParseFileShowPop(array('limit' => $ParseFileShowNext['limit']));
        }
//return $this->ParseFileShowPop(array('limit' => $ParseFileShowNext['limit']));
    }

    public function cbFileShowNext($cbFileShowNext)
    {
        if (!empty($cbFileShowNext[$this->file])) {
            if (!empty($cbFileShowNext[$this->file]) and !empty($cbFileShowNext['prevfile'])) {
                // Если польователь пришёл с файлом и предидущем файлом Запустить Автомат
                $this->cbCoupleFileAutomate($cbFileShowNext);
            } else {
                //return false;
            }

            $bucket = $this->autoConnectToBucket(["bucket" => "properties"]);

            //$startKey = json_encode([$cbFileShowNext[$this->file], $cbFileShowNext['prevfile'], 0]);
            //$startKey = json_encode([$cbFileShowNext[$this->file], "", 0]);
            //$startKey = json_encode([$cbFileShowNext[$this->file], [], 0]);
            //$startKey = json_encode([$cbFileShowNext[$this->file]]);
            //$startKey = json_encode($cbFileShowNext[$this->file]);
            //$startKey = json_encode([$cbFileShowNext[$this->file], "0", 1]);
            //$startKey = json_encode([$cbFileShowNext[$this->file], 1, "0"]);
            //$startKey = json_encode([$cbFileShowNext[$this->file], 1]);
            $startKey = json_encode([$cbFileShowNext[$this->file], 10000]);
            //$startKey = json_encode($cbFileShowNext[$this->file], 1);
            //$startKey = json_encode([$cbFileShowNext[$this->file]]);

            //echo "startkey " . $startKey;
            //$endKey = json_encode([$cbFileShowNext[$this->file], $cbFileShowNext['prevfile'], 100]);
            //$endKey = json_encode([$cbFileShowNext[$this->file], "", 100]);
            //$endKey = json_encode([$cbFileShowNext[$this->file], [], 100]);
            //$endKey = json_encode([$cbFileShowNext[$this->file]]);
            //$endKey = json_encode($cbFileShowNext[$this->file]);
            //$endKey = json_encode([$cbFileShowNext[$this->file], "zzzzzzzzzzzz", 100]);
            //$endKey = json_encode([$cbFileShowNext[$this->file], 100, "zzzzzzzzzzzz"]);
            //$endKey = json_encode([$cbFileShowNext[$this->file], 100]);
            $endKey = json_encode([$cbFileShowNext[$this->file], 1]);
            //$endKey = json_encode($cbFileShowNext[$this->file], 100);
            //$endKey = json_encode([$cbFileShowNext[$this->file]]);
            //$endKey = json_encode([$cbFileShowNext[$this->file], "zzzzzzzzzzzz"]);
            //===$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->custom(["startkey" => $startKey, "endkey" => $endKey])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->custom(["endkey" => $endKey, "startkey" => $startKey])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            $query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->custom(["startkey" => $startKey, "endkey" => $endKey])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //===$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->skip($cbFileShowNext["skip"])->limit($cbFileShowNext["limit"])->custom(["startkey" => $startKey, "endkey" => $endKey])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->custom($cbFileShowNext[$this->file])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->custom([$cbFileShowNext[$this->file]])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->key($cbFileShowNext[$this->file])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->key([$cbFileShowNext[$this->file]])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            //$query = CouchbaseViewQuery::from("fileCouple", 'fileCoupleChain')->key([$cbFileShowNext[$this->file], $cbFileShowNext['prevfile']])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                //print_r($query);
                //return $bucket->query($query);
                $res = $bucket->query($query);
                //echo "\r\n<br>cbFileShowNext fileCoupleChain <br>\r\n";
                //  print_r($res);
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function pgFileShowNext($pgFileShowNext)
    {
        //if (!empty($pgFileShowNext['prev_item_id'])) {
        if (!empty($pgFileShowNext['next_item_id'])) {
            //$itemInfo = $this->pgItemFullInfo($pgFileShowNext['prev_item_id']);
            $itemInfo = $this->pgItemFullInfo($pgFileShowNext['next_item_id']);
            //if ($itemInfo['access'] <> 'public') return false;
            if ($itemInfo['access'] !== 'public') return false;
            if ($itemInfo['type'] == 'videoEmail') return false;

            if (!empty($pgFileShowNext['next_item_id']) and !empty($pgFileShowNext['prev_item_id'])) {
                // Если польователь пришёл с файлом и предидущем файлом Запустить Автомат
                $this->pgCoupleFileAutomate($pgFileShowNext);
            }
            $pg = new PostgreSQL();
            if (!empty($pgFileShowNext['user_id'])) {
                $result = $pg->pgGetNextVideo($pgFileShowNext);
            } else {
                $result = $pg->pgGetNextVideoNOA($pgFileShowNext);
            }
            if (!empty($result)) {
                //echo 'yes';
                return $result;
            } /*elseif (!empty($pgFileShowNext['next_item_id'])) {
                $pgFileShowNext['prev_item_id'] = $pgFileShowNext['next_item_id']; // reverse
                $result = $pg->pgGetNextVideoNOA($pgFileShowNext);
                if (!empty($result)) {
                    return $result;
                } else {
                    return false;
                }
            }*/ else {
                //echo 'no';
                return false;
            }
        } else {
            //echo 'no next_item_id';
            return false;
        }
    }

    public function pgNextFromUser($pgNextFromUser)
    {
        if (!empty($pgNextFromUser['item_id']) and !empty($pgNextFromUser['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetNextFromUserNOA($pgNextFromUser);
        } else {
            return false;
        }
    }

    public function pgItemCountAdder($pgItemCountAdder)
    {
        //echo "\npgItemCountAdder pgItemCountAdder\n";
        //print_r($pgItemCountAdder);
        if (!empty($pgItemCountAdder['count_item_id'])) {
            $pg = new PostgreSQL();
            $itemRes = $pg->pgOneDataByColumn([
                'table' => $pg->table_items_counts,
                'find_column' => 'count_item_id',
                'find_value' => $pgItemCountAdder['count_item_id']]);
            //echo "\npgItemCountAdder itemRes\n";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (empty($itemRes['count_item_id'])) {
                // Ещё нет такого счётчика
                $countItem['count_item_id'] = $pgItemCountAdder['count_item_id'];
                $countItem['item_count_show'] = 1;
                //$trueCountItem = $pg->pgPaddingItems($countItem);
                $pg->pgAddData($pg->table_items_counts, $countItem);
                return 1;
            } else {
                // Прибавить счётчик
                $pg->pgUpdateData($pg->table_items_counts, 'item_count_show', $itemRes['item_count_show'] + 1, 'count_item_id', $pgItemCountAdder['count_item_id']);
                return $itemRes['item_count_show'] + 1;
            }
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function pgUsersItemsViewsAdder($pgUsersItemsViewsAdder)
    {
        //echo "\n\rpgUsersItemsViewsAdder pgUsersItemsViewsAdder\n\r";
        //print_r($pgUsersItemsViewsAdder);
        //https://api.vide.me/system/items/item_count_add/?nad=83db6bbc1c29348626073a2e7e33e58d&item=1bd8f2ae6b8d
        if (!empty($pgUsersItemsViewsAdder['user_id']) and !empty($pgUsersItemsViewsAdder['item_id'])) {
            $ret = [];
            $pg = new PostgreSQL();
            $itemRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_users_items_views,
                'find_column' => 'user_id',
                'find_value' => $pgUsersItemsViewsAdder['user_id'],
                'find_column2' => 'item_id',
                'find_value2' => $pgUsersItemsViewsAdder['item_id']]);
            //echo "\n\rpgUsersItemsViewsAdder itemRes\n\r";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (empty($itemRes['ui_view_id'])) {
                // Ещё нет такого view
                $countItem['ui_view_id'] = $this->trueRandom();
                $countItem['user_id'] = $pgUsersItemsViewsAdder['user_id'];
                $countItem['item_id'] = $pgUsersItemsViewsAdder['item_id'];
                //$trueCountItem = $pg->pgPaddingItems($countItem);
                $pg->pgAddData($pg->table_users_items_views, $countItem);
                //$this->viewsAdder($pgUsersItemsViewsAdder);
                //return $this->viewsAdder($pgUsersItemsViewsAdder);
                $ret = $this->viewsAdder($pgUsersItemsViewsAdder);
                //return 1;
            } else {
                //return false;
                return $ret;
            }
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function viewsAdder($viewsAdder)
    {
        //echo "\n\rviewsAdder viewsAdder\n\r";
        //print_r($viewsAdder);
        if (!empty($viewsAdder['user_id'])) {
            $user_views_count = $this->getViewsUser($viewsAdder);
            if ($user_views_count < 9) {
                $viewsAdder['views'] = $user_views_count + 1;
                $ret = ['status' => 'success', 'response' => 'new_view', 'views_stars' => $viewsAdder['views']];
            } else {
                //$starUserAdder['user_id'] = $viewsAdder['user_id'];
                $viewsAdder['views'] = 1;
                //$this->setUserViewStar($viewsAdder);
                $retTemp = ['status' => 'success', 'response' => 'new_views_stars'];
                $retRes = $this->setUserViewStar($viewsAdder);
                //print_r($retTemp);
                //print_r($retRes);
                // {"status":"success","response":"new_views_stars","user_id":"e185775fc4f5","user_email":"aida.atwater@outlook.com","user_display_name":"Aida Atwater","user_first_name":"Aida","user_last_name":"Atwater","user_link":null,"user_gender":"male","user_birthday":null,"user_locale":null,"user_picture":"51d5369060e3.jpg","spring":"aidaatwater","facebook":null,"google":null,"microsoft":null,"last_login":null,"last_active":null,"user_cover":"7fe1a5524ea4.jpg","country":"US","city":"Dallas","bio":"love Yorkies, writing, singing, computers, self improvement, learning. I get passionate and vocal about how I feel and wrongs I see sometimes!","slogan":"Nature is for your need not for your greed","created_at":"2018-07-16 05:22:12.670981+00","updated_at":null,"ext_info":"Ok","user_cover_top":"3460e2cd44c8.jpg","lat":"32.8209402236505","lng":"-96.7816407558755","options":"{\"last_rating\": {\"posts\": \"73\", \"events\": \"0\", \"images\": \"21\", \"videos\": \"107\", \"friends\": \"7\", \"articles\": \"4\", \"followers\": \"16\", \"following\": \"18\", \"count_show\": \"2491\", \"count_likes\": \"1\", \"count_stars\": \"4\", \"views_stars\": \"11\"}, \"send_stats_period\": 0, \"send_rating_period\": 14, \"stats_my_items_last_at\": \"2019-11-13 19:00:01.583913+0000\", \"stats_my_items_next_at\": \"2019-11-13 19:00:01.583918+0000\", \"stats_my_rating_last_at\": \"2019-10-06 10:00:01.768670+0000\", \"stats_my_rating_next_at\": \"2019-11-27 22:00:01.168037+0000\"}","views_stars":15,"send_rating":null}
                $ret = array_merge($retTemp, $retRes);
            }
            $this->setViewsUser($viewsAdder);
            //return $viewsAdder['views'];
            return $ret;
        } else {
            return false;
        }
    }

    public function getViewsUser($getViewsUser)
    {
        //echo "\n\rgetViewsUser getViewsUser\n\r";
        //print_r($getViewsUser);
        if (!empty($getViewsUser['user_id'])) {
            $res = $this->memcachedGetKey(['key' => $getViewsUser['user_id'] . '_views']);
            if (!empty($res)) {
                return $res;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setViewsUser($setViewsUser)
    {
        //echo "\n\rsetViewsUser setViewsUser\n\r";
        //print_r($setViewsUser);
        if (!empty($setViewsUser['user_id']) and !empty($setViewsUser['views'])) {
            $memcachedSetKey['key'] = $setViewsUser['user_id'] . '_views';
            $memcachedSetKey['value'] = $setViewsUser['views'];
            $this->memcachedSetKey($memcachedSetKey);
            return true;
        } else {
            return false;
        }
    }

    public function setListByTag($searchRequest, $searchParam)
    {
        echo "\n\rsetListByTag searchRequest\n\r";
        print_r($searchRequest);
        echo "\n\rsetListByTag searchParam\n\r";
        print_r($searchParam);
        //$article = new Article();
        $pg = new PostgreSQL();

        if (!empty($searchRequest['q']) and !empty($searchParam)) {
            $resSearch = $this->pgSearchItemByTextV4($searchRequest, $searchParam);
            //echo "\n\r resSearch : \n\r ";
            //print_r($resSearch);
            $titleCount = 0;
            $contentCount = 0;
            $titleArray = [];
            $contentArray = [];
            $titleTS = '';
            $contentTS = '';
            //$authorSet = [];
            $itemsSet = [];
            //$coversSet = [];
            $tags = [];

            if (!empty($resSearch)) {

                foreach($resSearch as $key => $value) {
                //echo "\n\r" . 'key: ' . $key . ' item_id: ' . $value['item_id'];
                //echo "\n\r" . 'key: ' . $key . ' title: ' . $value['title'];
                //echo "\n\r" . 'titleCount: ' . $titleCount;
                    //$titleTS .= $this->safetyTagsSlashesTrimX($value['title']) . '. ';
                    $titleTS .= $value['title'] . '. ';
                    //$contentTS .= $value['content'] . '. ';
                    //$contentTS .= $this->safetyTagsSlashesTrimX($value['content'], 75) . '. ';
                    $contentTS .= $value['content'] . '. ';

                    if ($titleCount < 3) {
                    $titleArray[] = $value['title'];
                    $titleCount++;
                }
                if ($contentCount < 3) {
                    $contentArray[] = $value['user_display_name'];
                    $contentCount++;
                }
                    $authorSet[] = $value['user_display_name'];
                    $springSet[] = $value['spring'];
                    if (!empty($value['tags'])) {

                        //$tagsItemArray = $this->ConvParseData(json_decode($value['tags']));
                        $tagsArray = json_decode($value['tags']);
                        //echo "\n\r tagsArray : \n\r ";
                        //var_dump($tagsArray);
                        //$tagsItemArray = json_encode($article->paddingTagsForItem($tagsArray));
//                        echo "\n\r tagsItemArray : \n\r ";
//                        var_dump($tagsItemArray);
//                        $tags[] = array_merge($tags, $tagsArray);

                        foreach ($tagsArray as $key2 => $value2) {
                            //echo "\n\r paddingTagsForItem foreach key: " . $key2;
                            //echo "\n\r paddingTagsForItem foreach value: " . $value2;
                            $tags[] = $value2;
                        }
                    }
                    $itemsSet[] = $value['item_id'];
                    /*if (!empty($value['src'])) {
                        $srcArray = json_decode($value['src']);
                        foreach ($srcArray as $key3 => $value3) {
                            //echo "\n\r paddingTagsForItem foreach key: " . $key2;
                            //echo "\n\r paddingTagsForItem foreach value: " . $value2;
                            $srcSet[$value['item_id']] = $value3;
                        }
                        //$srcSet[$value['item_id']] = $value['src'];
                    } else {
                        $srcSet[$value['item_id']] = '';
                    }*/
                    if (!empty($value['cover'])) {
                        $coversSet[] = $value['cover'];
                    } else {
                        $coversSet[] = $value['item_id'] . '.jpg';
                    }
                //array_push($itemsSet, $value['item_id']);
            }
            //print_r($titleArray);
            //print_r($contentArray);
            //$key_list = 'list_' . $this->trueRandom();

            //$memcachedSetKey['key'] = $key_list;
            //$memcachedSetKey['value'] = ['title_array' => $titleArray, 'content_array' => $contentArray, 'title_full_array' => $titleFullArray, 'content_full_array' => $contentFullArray, 'covers_array' => $coversSet, 'items_array' => $itemsSet];
            //$memcachedSetKey['value'] = ['title_array' => $titleArray, 'title_ts' => $titleTS, 'content_ts' => $contentTS, 'author_array' => $authorSet,  'spring_array' => $springSet, 'tags_array' => $tags, 'covers_array' => $coversSet, 'items_array' => $itemsSet];
                //echo "\n\r memcachedSetKey : \n\r ";
                //print_r($memcachedSetKey);

            $listTrue['li_id'] = $this->trueRandom();
            $listTrue['slogan'] = $searchRequest['q'];
            $listTrue['dynamic'] = true;
            //$listTrue['title_vector'] = $titleTS;
            //$listTrue['title_vector'] = "to_tsvector('$titleTS')";
            //$listTrue['title_vector'] = "to_tsvector('" . addslashes(str_replace("'", "", $titleTS)) . "')";
            //$listTrue['title_vector'] = "to_tsvector('" . str_replace("'", "", $titleTS) . "')";
            //$listTrue['title_vector'] = "to_tsvector('" . str_replace("\"", "", str_replace("'", "", $titleTS)) . "')";
            //==$listTrue['title_vector'] = "to_tsvector('sgdfg sfg sdfg sdfg sdf sfg s')";
            //$listTrue['title_vector'] = 'to_tsvector("' . $titleTS . '");';
            //$listTrue['title_vector'] = 'to_tsvector("' . $this->safetyTagsSlashesTrim4096($titleTS) . '");';
            $listTrue['title_vector'] = 'to_tsvector("' . $this->safetyTextForVectorX($titleTS) . '");';
            //$listTrue['content_vector'] = "to_tsvector('$contentTS')";
            //$listTrue['content_vector'] = "to_tsvector('" . addslashes($contentTS) . "')";
            //$listTrue['content_vector'] = "to_tsvector('" . str_replace("\"", "", str_replace("'", "", $contentTS)) . "')";
            //==$listTrue['content_vector'] = "to_tsvector('gsdfg sdfgsdfg sdf gsdfg sdfg sdf gsf')";
            //$listTrue['content_vector'] = 'to_tsvector("' . $contentTS . '");';
            //$listTrue['content_vector'] = 'to_tsvector("' . $this->safetyTagsSlashesTrim4096($contentTS) . '");';
            $listTrue['content_vector'] = 'to_tsvector("' . $this->safetyTextForVectorX($contentTS, 2048) . '");';
            //$listTrue['items_array'] = json_encode($itemsSet);
            //$listTrue['items_array'] = $itemsSet;
                //==$listTrue['items_array'] = json_encode($itemsSet);
                $listTrue['items_array'] = $itemsSet;
                //$listTrue['items_array'] = htmlspecialchars(json_encode($itemsSet), ENT_QUOTES, 'UTF-8');
                //$listTrue['src_array'] = json_encode($srcSet);
                //--$listTrue['covers_array'] = json_encode($coversSet);
                $listTrue['covers_array'] = $coversSet;
                //$listTrue['covers_array'] = htmlspecialchars(json_encode($coversSet), ENT_QUOTES, 'UTF-8');
                //==$listTrue['titles_array'] = json_encode($titleArray);
                //--$listTrue['titles_array'] = json_encode($this->safetyTextForJSONb($titleArray));
                $listTrue['titles_array'] = $this->safetyTextForJSONb($titleArray);
                //$listTrue['titles_array'] = htmlspecialchars(json_encode($titleArray), ENT_QUOTES, 'UTF-8');
                //--$listTrue['contents_array'] = json_encode($contentArray);
                $listTrue['contents_array'] = $contentArray;
                //$listTrue['contents_array'] = htmlspecialchars(json_encode($contentArray), ENT_QUOTES, 'UTF-8');
                //--$listTrue['authors_array'] = json_encode($authorSet);
                $listTrue['authors_array'] = $authorSet;
            //--$listTrue['springs_array'] = json_encode($springSet);
            $listTrue['springs_array'] = $springSet;
            //--$listTrue['tags_array'] = json_encode($tags);
            $listTrue['tags_array'] = $tags;

                echo "\n\rsetListByTag listTrue : \n\r ";
                print_r($listTrue);
            //$this->RedisAddArray($memcachedSetKey);
                $res = $pg->pgAddData($pg->table_lists_items, $listTrue);

                //return $key_list;
                return $listTrue;
            } else {
                echo "\n\rsetListByTag empty resSearch : \n\r ";
                return false;
            }
        } else {
            echo "\n\rsetListByTag empty searchRequest['q'] and searchParam : \n\r ";
            return false;
        }
    }

    public function getList($getList)
    {
        //echo "\n\rgetList getList\n\r";
        //print_r($getList);
        if (!empty($getList['list'])) {
            //$resRedisJSON = $this->memcachedGetKey(['key' => 'list_' . $getList['list']]);
            //echo "\n\rgetList resRedisJSON\n\r";
            //print_r($resRedisJSON);
            //$listArray = $this->ConvParseData(json_decode($resRedisJSON));
            $pg = new PostgreSQL();
            //return $pg->pgGetItemFullInfo($pgItemFullInfo);
            $resList = $pg->pgOneDataByColumn([
                'table' => $pg->table_lists_items,
                'find_column' => 'li_id',
                'find_value' => $getList['list']]);
            //echo "\n\rgetList resList\n\r";
            //print_r($resList);
            //echo "\n\rgetList listArray['items_array']\n\r";
            //print_r($listArray['items_array']);
            /*if (!empty($resRedisJSON)) {
                $this->RedisExpUpdate(['key' => 'list_' . $getList['list']], 3);
                $pg = new PostgreSQL();
                //$inQuery = implode(',', array_fill(0, count($listArray['items_array']), '?'));
                //$inQuery = implode (", ", $listArray['items_array']);
                $inQuery = "'" . implode ( "', '", $listArray['items_array'] ) . "'";
                //echo "\n\rgetList inQuery\n\r";
                //print_r($inQuery);
                return $pg->pgGetPostsFromList($inQuery);
            } else {
                return false;
            }*/
            /*$resList['items_array'] = $this->pgJSONconvert($resList, 'items_array');
            $resList['covers_array'] = $this->pgJSONconvert($resList, 'covers_array');
            $resList['titles_array'] = $this->pgJSONconvert($resList, 'titles_array');
            $resList['contents_array'] = $this->pgJSONconvert($resList, 'contents_array');
            $resList['authors_array'] = $this->pgJSONconvert($resList, 'authors_array');
            $resList['springs_array'] = $this->pgJSONconvert($resList, 'springs_array');
            $resList['tags_array'] = $this->pgJSONconvert($resList, 'tags_array');*/

            $resList = $this->pgJSONconvertComplexForList($resList);

            return $resList;
        } else {
            return false;
        }
    }

    public function getListComposition($getListComposition)
    {
        echo "\n\rgetListComposition getListComposition\n\r";
        print_r($getListComposition);
        if (!empty($getListComposition['q'])) {
            $pg = new PostgreSQL();
            //return $pg->pgGetItemFullInfo($pgItemFullInfo);
            $resList = $pg->pgOneDataByColumn([
                'table' => $pg->table_lists_items,
                'find_column' => 'slogan',
                'find_value' => $getListComposition['q']]);
            echo "\n\rgetListComposition resList\n\r";
            print_r($resList);
            //$listArray = $this->ConvParseData(json_decode($resRedisJSON));
            //echo "\n\rgetList listArray\n\r";
            //print_r($listArray);
            //echo "\n\rgetList listArray['items_array']\n\r";
            //print_r($listArray['items_array']);
            if (!empty($resList)) {
                $resList = $this->pgJSONconvertComplexForList($resList);
                return $resList;
            } else {
                $searchParam['offset'] = $this->setOffset();
                $searchParam['limit'] = $this->setLimit();
                $resNewList = $this->setListByTag($getListComposition, $searchParam);
                echo "\n\rgetListComposition resNewList\n\r";
                print_r($resNewList);
                return $resNewList;
            }
        } else {
            return false;
        }
    }

    public function getListDetailsForPlayer($getListDetailsForPlayer)
    {
        //echo "\n\rgetListDetailsForPlayer getListDetailsForPlayer\n\r";
        //print_r($getListDetailsForPlayer);
        if (!empty($getListDetailsForPlayer['list'])) {
            $pg = new PostgreSQL();
            //return $pg->pgGetItemFullInfo($pgItemFullInfo);
            $resList = $pg->pgOneDataByColumn([
                'table' => $pg->table_lists_items,
                'find_column' => 'li_id',
                'find_value' => $getListDetailsForPlayer['list']]);
            //echo "\n\rgetListDetailsForPlayer resList\n\r";
            //var_dump($resList);
            //$listArray = $this->ConvParseData(json_decode($resRedisJSON));
            //echo "\n\rgetList listArray\n\r";
            //print_r($listArray);
            //echo "\n\rgetList listArray['items_array']\n\r";
            //print_r($listArray['items_array']);
            if (!empty($resList)) {
                //$this->RedisExpUpdate(['key' => 'list_' . $getList['list']], 3);
                //$pg = new PostgreSQL();
                //$inQuery = implode(',', array_fill(0, count($listArray['items_array']), '?'));
                //$inQuery = implode (", ", $listArray['items_array']);
                //$inQuery = "'" . implode ( "', '", $resList['items_array'] ) . "'";
                //$inQuery = "'" . implode ( "', '", $resList['items_array'] ) . "'";
                $inQuery = "'" . implode ( "', '", json_decode($resList['items_array']) ) . "'";
                //echo "\n\rgetList inQuery\n\r";
                //print_r($inQuery);
                //return $pg->pgGetPostsFromList($inQuery);
                $resList = $this->pgJSONconvertComplexForList($resList);
                $items_array = $pg->pgGetPostsFromList($inQuery);
                $retArray = ['list' => $resList, 'items_array' => $items_array];
                return $retArray;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setUserViewStar($setUserViewStar)
    {
        //echo "\n\rsetUserViewStar setUserViewStar\n\r";
        //print_r($setUserViewStar);
        if (!empty($setUserViewStar['user_id'])) {
            $userInfo = $this->pgUserInfo($setUserViewStar['user_id']);
            if (empty($userInfo['views_stars'])) $userInfo['views_stars'] = 0;
            //$newUserInfo['user_id'] = $setUserViewStar['user_id'];
            //$newUserInfo['views_stars'] = $userInfo['views_stars'] + 1;
            $userInfo['views_stars'] = $userInfo['views_stars'] + 1;
            //echo "\n\rsetUserViewStar newUserInfo\n\r";
            //print_r($newUserInfo);
            //$this->pgUpdateUserInfo($userInfo, $newUserInfo);
            $pg = new PostgreSQL();
            //$pg->pgUpdateData($pg->table_users, 'views_stars', $userInfo['views_stars'] + 1, 'user_id', $setUserViewStar['user_id']);
            $pg->pgUpdateData($pg->table_users, 'views_stars', $userInfo['views_stars'], 'user_id', $setUserViewStar['user_id']);
            //return true;
            return $userInfo;
        } else {
            return false;
        }

    }

    public function delUserViewStar($delUserViewStar)
    {
        //echo "\n\rdelUserViewStar delUserViewStar\n\r";
        //print_r($delUserViewStar);
        if (!empty($delUserViewStar['user_id'])) {
            $userInfo = $this->pgUserInfo($delUserViewStar['user_id']);
            //echo "\n\rdelUserViewStar userInfo\n\r";
            //print_r($userInfo);
            if (!empty($userInfo['views_stars']) and $userInfo['views_stars'] > 0) {
                $pg = new PostgreSQL();
                $pg->pgUpdateData($pg->table_users, 'views_stars', $userInfo['views_stars'] - 1, 'user_id', $delUserViewStar['user_id']);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function viewsTagsAdder($viewsTagsAdder)
    {
        //echo "\n\rviewsTagsAdder viewsTagsAdder\n\r";
        //print_r($viewsTagsAdder);
        if (!empty($viewsTagsAdder['user_id'])) {
            $user_views_count = $this->getViewsTagsUser($viewsTagsAdder);
            //echo "\n\rviewsTagsAdder user_views_count\n\r";
            //print_r($user_views_count);
            //echo "\n\r-------------------------------\n\r";
            //if ($user_views_count < 2) {
            if ($user_views_count < 0) {
                //echo "\n\rviewsTagsAdder ================ NOT time ========================\n\r";
                $viewsTagsAdder['views'] = $user_views_count + 1;
                $ret = ['status' => 'success', 'response' => 'new_view_tag', 'views_stars' => $viewsTagsAdder['views']];
            } else {
                //echo "\n\rviewsTagsAdder ================ YES time ========================\n\r";
                //$starUserAdder['user_id'] = $viewsAdder['user_id'];
                $viewsTagsAdder['views'] = 1;
                //$this->setUserViewStar($viewsAdder);
                $retTemp = ['status' => 'success', 'response' => 'new_views_stars_tags'];
                //$retRes = $this->setUserViewTagStar($viewsTagsAdder);
                $retRes = $this->pgSetUserTag($viewsTagsAdder);
                //print_r($retTemp);
                //print_r($retRes);
                // {"status":"success","response":"new_views_stars","user_id":"e185775fc4f5","user_email":"aida.atwater@outlook.com","user_display_name":"Aida Atwater","user_first_name":"Aida","user_last_name":"Atwater","user_link":null,"user_gender":"male","user_birthday":null,"user_locale":null,"user_picture":"51d5369060e3.jpg","spring":"aidaatwater","facebook":null,"google":null,"microsoft":null,"last_login":null,"last_active":null,"user_cover":"7fe1a5524ea4.jpg","country":"US","city":"Dallas","bio":"love Yorkies, writing, singing, computers, self improvement, learning. I get passionate and vocal about how I feel and wrongs I see sometimes!","slogan":"Nature is for your need not for your greed","created_at":"2018-07-16 05:22:12.670981+00","updated_at":null,"ext_info":"Ok","user_cover_top":"3460e2cd44c8.jpg","lat":"32.8209402236505","lng":"-96.7816407558755","options":"{\"last_rating\": {\"posts\": \"73\", \"events\": \"0\", \"images\": \"21\", \"videos\": \"107\", \"friends\": \"7\", \"articles\": \"4\", \"followers\": \"16\", \"following\": \"18\", \"count_show\": \"2491\", \"count_likes\": \"1\", \"count_stars\": \"4\", \"views_stars\": \"11\"}, \"send_stats_period\": 0, \"send_rating_period\": 14, \"stats_my_items_last_at\": \"2019-11-13 19:00:01.583913+0000\", \"stats_my_items_next_at\": \"2019-11-13 19:00:01.583918+0000\", \"stats_my_rating_last_at\": \"2019-10-06 10:00:01.768670+0000\", \"stats_my_rating_next_at\": \"2019-11-27 22:00:01.168037+0000\"}","views_stars":15,"send_rating":null}
                $ret = array_merge($retTemp, $retRes);
            }
            $this->setViewsTagUser($viewsTagsAdder);
            //return $viewsAdder['views'];
            return $ret;
        } else {
            return false;
        }
    }

    public function setViewsTagUser($setViewsTagUser)
    {
        //echo "\n\rsetViewsUser setViewsUser\n\r";
        //print_r($setViewsUser);
        if (!empty($setViewsTagUser['user_id']) and !empty($setViewsTagUser['views'])) {
            $memcachedSetKey['key'] = $setViewsTagUser['user_id'] . '_' . $setViewsTagUser['tag'] . '_views';
            $memcachedSetKey['value'] = $setViewsTagUser['views'];
            $this->memcachedSetKey($memcachedSetKey);
            return true;
        } else {
            return false;
        }
    }

    public function getViewsTagsUser($getViewsTagsUser)
    {
        //echo "\n\rgetViewsUser getViewsUser\n\r";
        //print_r($getViewsUser);
        if (!empty($getViewsTagsUser['user_id'])) {
            $res = $this->memcachedGetKey(['key' => $getViewsTagsUser['user_id'] . '_' . $getViewsTagsUser['tag'] . '_views']);
            //echo "\n\rgetViewsUser getViewsUser \n\r";
            //echo $getViewsTagsUser['user_id'] . '_' . $getViewsTagsUser['tag'] . '_views = ';
            //print_r($res);
            if (!empty($res)) {
                return $res;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setUserViewTagStar($setUserViewTagStar) // TODO: remove
    {
        //echo "\n\rsetUserViewTagStar setUserViewTagStar\n\r";
        //print_r($setUserViewTagStar);
        if (!empty($setUserViewTagStar['user_id'])) {
            $userInfo = $this->pgUserInfo($setUserViewTagStar['user_id']);
            /*if (empty($userInfo['stars_tags'])) {
                $userInfo['stars_tags'] = [];
                $stars_tags[$setUserViewTagStar['tag']] = 1; // TODO: remove
                echo "\n\rsetUserViewTagStar empty(userInfo['stars_tags stars_tags\n\r";
                print_r($stars_tags);
            } else {*/
            $stars_tags_Object = json_decode($userInfo['stars_tags']);
            $stars_tags = $this->ConvParseData($stars_tags_Object);
            //echo "\n\rsetUserViewTagStar NOT empty(userInfo['stars_tags stars_tags json_decode stars_tags\n\r";
            //print_r($stars_tags);
            if (array_key_exists($setUserViewTagStar['tag'], $stars_tags)) { // true
                //echo "Массив содержит элемент 'tag'. " . $setUserViewTagStar['tag'];
                //$stars_tags[$setUserViewTagStar['tag']] = $setUserViewTagStar['tag'] + 1;
                $stars_tags[$setUserViewTagStar['tag']] = $stars_tags[$setUserViewTagStar['tag']] + 1; // work
                //$tempArray[$setUserViewTagStar['tag']] = $setUserViewTagStar['tag'] + 1;
                //$tempArray = [$setUserViewTagStar['tag'] => $setUserViewTagStar['tag'] + 1];
                //$tempArray = [$setUserViewTagStar['tag'] => $stars_tags[$setUserViewTagStar['tag']] + 1];
                //$setUserViewTagStar['tag'] = $setUserViewTagStar['tag'] + 1; // NOOOO
            } else {
                //$key = $setUserViewTagStar["tag"];
                //$tempArray["$key"] = 1;
                //$tempArray[$setUserViewTagStar['tag']] = 1;
                //$tempArray = [$setUserViewTagStar['tag'] => 1];
                //$setUserViewTagStar['tag'] = 1; // NOOOO
                /*$tempArray[$setUserViewTagStar['tag']] = 1;
                echo "\n\rsetUserViewTagStar stars_tags\n\r";
                print_r($stars_tags);
                echo "\n\rsetUserViewTagStar tempArray\n\r";
                print_r($tempArray);*/
                //echo "\n\rsetUserViewTagStar setUserViewTagStar['tag']\n\r";
                //print_r($setUserViewTagStar['tag']);
                //--array_merge($stars_tags, $tempArray);
                //array_push($stars_tags, $tempArray);
                //--array_push($stars_tags, $tempArray[0]);
                //array_push($stars_tags, [$setUserViewTagStar['tag'] => $tempArray[$setUserViewTagStar['tag']]]);
                //array_merge($stars_tags, $setUserViewTagStar['tag']);
                //array_push($stars_tags, $setUserViewTagStar['tag']);
                $stars_tags[$setUserViewTagStar['tag']] = 1; // work
            }

            //}
            //echo "\n\rsetUserViewTagStar stars_tags after\n\r";
            //print_r($stars_tags);
            $stars_tags_json = json_encode($stars_tags);
            //echo "\n\rsetUserViewTagStar stars_tags_json\n\r";
            //print_r($stars_tags_json);
            //$newUserInfo['user_id'] = $setUserViewStar['user_id'];
            //$newUserInfo['views_stars'] = $userInfo['views_stars'] + 1;
            //=$userInfo['stars_tags'] = $userInfo['stars_tags'] + 1;
            //echo "\n\rsetUserViewStar newUserInfo\n\r";
            //print_r($newUserInfo);
            //$this->pgUpdateUserInfo($userInfo, $newUserInfo);
            $pg = new PostgreSQL();
            //$pg->pgUpdateData($pg->table_users, 'views_stars', $userInfo['views_stars'] + 1, 'user_id', $setUserViewStar['user_id']);
            $pg->pgUpdateData($pg->table_users, 'stars_tags', $stars_tags_json, 'user_id', $setUserViewTagStar['user_id']);
            //return true;
            //return $userInfo;
            return $stars_tags;
        } else {
            return false;
        }
    }

    public function pgSetUserTag($pgSetUserTag)
    {
        //echo "\n\rpgSetUserTag pgSetUserTag\n\r";
        //print_r($pgSetUserTag);
        if (!empty($pgSetUserTag['user_id']
            and (!empty($pgSetUserTag['tag'])))) {
            $pg = new PostgreSQL();

            //$userInfo = $this->pgUserInfo($pgSetUserTag['user_id']);
            //$userTags = $this->pgGetUserTagsALL($pgSetUserTag);
            //$userTags = $pg->pgGetTagsOfUser($pgSetUserTag);
            $userTags = $pg->pgGet1UserTag($pgSetUserTag);
            /*if (empty($userInfo['stars_tags'])) {
                $userInfo['stars_tags'] = [];
                $stars_tags[$setUserViewTagStar['tag']] = 1; // TODO: remove
                echo "\n\rsetUserViewTagStar empty(userInfo['stars_tags stars_tags\n\r";
                print_r($stars_tags);
            } else {*/
            /*$stars_tags_Object = json_decode($userInfo['stars_tags']);
            $stars_tags = $this->ConvParseData($stars_tags_Object);*/
            //echo "\n\rsetUserViewTagStar NOT empty(userInfo['stars_tags stars_tags json_decode stars_tags\n\r";
            //print_r($stars_tags);
            //if (array_key_exists($pgSetUserTag['tag'], $stars_tags)) { // true
            /*echo "\n\rpgSetUserTag array_key_exists(pgSetUserTag['tag'], userTags\n\r";
            print_r($pgSetUserTag['tag']);
            print_r($userTags);*/
            //echo "\n\rpgSetUserTag userTags\n\r";
            //print_r($userTags);
            //echo "\n\r-------------------------------------------------\n\r";
            if (!empty($userTags)) {
                /*if (array_key_exists($pgSetUserTag['tag'], $userTags)) {
                    echo "Массив содержит элемент 'tag'. " . $pgSetUserTag['tag'];
                    //$stars_tags[$setUserViewTagStar['tag']] = $setUserViewTagStar['tag'] + 1;
                    //===$stars_tags[$pgSetUserTag['tag']] = $stars_tags[$pgSetUserTag['tag']] + 1; // work
                    //$tempArray[$setUserViewTagStar['tag']] = $setUserViewTagStar['tag'] + 1;
                    //$tempArray = [$setUserViewTagStar['tag'] => $setUserViewTagStar['tag'] + 1];
                    //$tempArray = [$setUserViewTagStar['tag'] => $stars_tags[$setUserViewTagStar['tag']] + 1];
                    //$setUserViewTagStar['tag'] = $setUserViewTagStar['tag'] + 1; // NOOOO
                    $setUserTag['tag_count'] = $userTags['tag_count'] + 1; // work
                } else {
                    echo "Массив NOOO содержит элемент 'tag'. " . $pgSetUserTag['tag'];

                    //$key = $setUserViewTagStar["tag"];
                    //$tempArray["$key"] = 1;
                    //$tempArray[$setUserViewTagStar['tag']] = 1;
                    //$tempArray = [$setUserViewTagStar['tag'] => 1];
                    //$setUserViewTagStar['tag'] = 1; // NOOOO
                    /!*$tempArray[$setUserViewTagStar['tag']] = 1;
                    echo "\n\rsetUserViewTagStar stars_tags\n\r";
                    print_r($stars_tags);
                    echo "\n\rsetUserViewTagStar tempArray\n\r";
                    print_r($tempArray);*!/
                    //echo "\n\rsetUserViewTagStar setUserViewTagStar['tag']\n\r";
                    //print_r($setUserViewTagStar['tag']);
                    //--array_merge($stars_tags, $tempArray);
                    //array_push($stars_tags, $tempArray);
                    //--array_push($stars_tags, $tempArray[0]);
                    //array_push($stars_tags, [$setUserViewTagStar['tag'] => $tempArray[$setUserViewTagStar['tag']]]);
                    //array_merge($stars_tags, $setUserViewTagStar['tag']);
                    //array_push($stars_tags, $setUserViewTagStar['tag']);
                    $setUserTag['tag_count'] = 1; // work
                }*/
                //foreach ($userTags as $key => $value) {

                if ($pgSetUserTag['tag'] == $userTags['tag']) {
                    //echo "\n\rpgSetUserTag userTags foreach YES tag \n\r";
                    //print_r($userTags['tag']);
                    //$setUserTag['ut_id'] = $userTags['ut_id'];
                    //$setUserTag['tag_count'] = $value['tag_count'] + 1;
                    //echo "\n\rpgSetUserTag setUserTag\n\r";
                    //print_r($setUserTag);
                    //$pg->pgUpdateDataArray($pg->table_users_tags, $setUserTag);
                    $pg->pgUpdateData($pg->table_users_tags, 'tag_count', $userTags['tag_count'] + 1, 'ut_id', $userTags['ut_id']);
                    //$pg->pgUpdateDataArray($pg->table_items, $itemTrue, ['item_id' => $all_data[0]['item_id']]);

                } else {

                    //echo "\n\rpgSetUserTag userTags foreach NOOOOO tag \n\r";
                    //print_r($userTags['tag']);
                    $setUserTag['ut_id'] = $this->trueRandom();
                    $setUserTag['user_id'] = $pgSetUserTag['user_id'];
                    $setUserTag['tag'] = $pgSetUserTag['tag'];
                    $setUserTag['tag_count'] = 1;
                    //echo "\n\rpgSetUserTag setUserTag\n\r";
                    //print_r($setUserTag);
                    $pg->pgAddData($pg->table_users_tags, $setUserTag);
                }
                //}
            } else {
                //echo "\n\rpgSetUserTag EMPTY userTags set first tag\n\r";
                // Ещё нет такого Like
                $setUserTag['ut_id'] = $this->trueRandom();
                $setUserTag['user_id'] = $pgSetUserTag['user_id'];
                $setUserTag['tag'] = $pgSetUserTag['tag'];
                $setUserTag['tag_count'] = 1;
                $pg->pgAddData($pg->table_users_tags, $setUserTag);
            }


            //}
            //echo "\n\rsetUserViewTagStar stars_tags after\n\r";
            //print_r($stars_tags);
            //$stars_tags_json = json_encode($stars_tags);
            //echo "\n\rsetUserViewTagStar stars_tags_json\n\r";
            //print_r($stars_tags_json);
            //$newUserInfo['user_id'] = $setUserViewStar['user_id'];
            //$newUserInfo['views_stars'] = $userInfo['views_stars'] + 1;
            //=$userInfo['stars_tags'] = $userInfo['stars_tags'] + 1;
            //echo "\n\rsetUserViewStar newUserInfo\n\r";
            //print_r($newUserInfo);
            //$this->pgUpdateUserInfo($userInfo, $newUserInfo);
            //$pg->pgUpdateData($pg->table_users, 'views_stars', $userInfo['views_stars'] + 1, 'user_id', $setUserViewStar['user_id']);
            //$pg->pgUpdateData($pg->table_users, 'stars_tags', $stars_tags_json, 'user_id', $pgSetUserTag['user_id']);
            //return true;
            //return $userInfo;

            //return $stars_tags;
            //return $setUserTag;
            return $pgSetUserTag;
        } else {
            return false;
        }
    }

    public function pgGetUserTagsALL($pgGetUserTags)
    {
        if (!empty($pgGetUserTags['user_id'])) {
            $pg = new PostgreSQL();
            /*return $pg->pgDataByColumn([
                'table' => $pg->table_users_tags,
                'find_column' => 'user_id',
                'find_value' => $pgGetUserTags['user_id']]);*/
            return $pg->pgGetTagsOfUser($pgGetUserTags);
            //echo "\n\rpgGetUserTag pgOneDataBy2Column utRes\n\r";
            //print_r($utRes);
            //return $utRes;
            // wrong if (empty($itemRes['item_count_show'])) {
            //if (!empty($utRes['ut_id'])) {
            /*if (!empty($utRes)) {
                return $utRes;
            } else {
                return false;
                //return [];
            }*/
        } else {
            return false;
        }
    }

    public function pgGetUserTags($pgGetUserTags) // TODO: why for?
    {
        if (!empty($pgGetUserTags['user_id'])
            and !empty($pgGetUserTags['tag'])) {
            $pg = new PostgreSQL();
            $utRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_users_tags,
                'find_column' => 'user_id',
                'find_value' => $pgGetUserTags['user_id'],
                'find_column2' => 'tag',
                'find_value2' => $pgGetUserTags['tag']]);
            echo "\n\rpgGetUserTag pgOneDataBy2Column utRes\n\r";
            print_r($utRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (!empty($utRes['ut_id'])) {
                return $utRes;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function pgUsersItemsTagsViewsAdderWrap($pgUsersItemsTagsViewsAdderWrap)
    {
        if (!empty($pgUsersItemsTagsViewsAdderWrap['user_id'])
            and !empty($pgUsersItemsTagsViewsAdderWrap['item_id'])) {
            //$itemInfo = $this->pgFileInfo($pgUsersItemsTagsViewsAdderWrap);
            $itemTagsArray = $this->pgItemTagsAccess($pgUsersItemsTagsViewsAdderWrap);
            //$welcome->outputDDBData($this->pgItemTagsAccess(['item_id' => $_REQUEST['item_id']]));
            //echo "\n\rpgUsersItemsTagsViewsAdder itemInfo\n\r";
            //print_r($itemInfo);
            //echo "\n\rpgUsersItemsTagsViewsAdder itemTagsArray\n\r";
            //print_r($itemTagsArray);
            //exit;
            $ret = [];
            ///if (!empty($itemInfo['tags']) and $itemInfo['tags'] <> 'false') {
            if (!empty($itemTagsArray)) {
                //$tags = json_decode($itemInfo['tags'], true);
                //echo "\n\rpgUsersItemsTagsViewsAdderWrap itemTagsArray\n\r";
                //print_r($itemTagsArray);
                foreach ($itemTagsArray as $key => $value) {
                    //echo "\n\rpgUsersItemsTagsViewsAdder tags foreach value \n\r";
                    //print_r($value);
                    //echo "\n\rpgUsersItemsTagsViewsAdder tags foreach['tag'] \n\r";
                    //print_r($value['tag']);
                    $pgUsersItemsTagsViewsAdderWrap['tag'] = $value['tag'];
                    //echo "\n\rpgUsersItemsTagsViewsAdder tags foreach pgUsersItemsTagsViewsAdderWrap \n\r";
                    //print_r($pgUsersItemsTagsViewsAdderWrap);
                    $ret[] = $this->pgUsersItemsTagsViewsAdder($pgUsersItemsTagsViewsAdderWrap);
                }
            }
            return $ret;
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function pgUsersItemsTagsViewsAdder($pgUsersItemsTagsViewsAdder)
    {
        //echo "\n\rpgUsersItemsTagsViewsAdder pgUsersItemsTagsViewsAdder\n\r";
        //print_r($pgUsersItemsTagsViewsAdder);
        //https://api.vide.me/system/items/item_count_add/?nad=83db6bbc1c29348626073a2e7e33e58d&item=1bd8f2ae6b8d
        if (!empty($pgUsersItemsTagsViewsAdder['user_id'])
            and !empty($pgUsersItemsTagsViewsAdder['item_id'])
            and !empty($pgUsersItemsTagsViewsAdder['tag'])) {
            $pg = new PostgreSQL();
            $itemRes = $pg->pgOneDataBy3Column([
                'table' => $pg->table_users_items_tags_views,
                'find_column' => 'user_id',
                'find_value' => $pgUsersItemsTagsViewsAdder['user_id'],
                'find_column2' => 'item_id',
                'find_value2' => $pgUsersItemsTagsViewsAdder['item_id'],
                'find_column3' => 'tag',
                'find_value3' => $pgUsersItemsTagsViewsAdder['tag']]);
            //echo "\n\rpgUsersItemsTagsViewsAdder pgOneDataBy3Column itemRes\n\r";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (empty($itemRes['uit_view_id'])) {
                //echo "\n\rpgUsersItemsTagsViewsAdder pgOneDataBy3Column users_items_tags_views empty\n\r";
                // Ещё нет такого view
                $countItem['uit_view_id'] = $this->trueRandom();
                $countItem['user_id'] = $pgUsersItemsTagsViewsAdder['user_id'];
                $countItem['item_id'] = $pgUsersItemsTagsViewsAdder['item_id'];
                $countItem['tag'] = $pgUsersItemsTagsViewsAdder['tag'];
                //$trueCountItem = $pg->pgPaddingItems($countItem);
                $pg->pgAddData($pg->table_users_items_tags_views, $countItem);
                //$this->viewsAdder($pgUsersItemsViewsAdder);
                return $this->viewsTagsAdder($pgUsersItemsTagsViewsAdder);
                //return 1;
            } else {
                //echo "\n\rpgUsersItemsTagsViewsAdder pgOneDataBy3Column users_items_tags_views NOOO empty\n\r";
                return ['status' => 'success', 'response' => 'view_tag_exist', 'views_tags' => $pgUsersItemsTagsViewsAdder['tag']];
                //return false;
                //return $this->viewsTagsAdder($pgUsersItemsTagsViewsAdder);
            }
        } else {
            return false;
        }
    }

    public function pgItemSetLike($pgItemSetLike)
    {
        //echo "\npgItemCountAdder pgItemCountAdder\n";
        //print_r($pgItemCountAdder);
        if (!empty($pgItemSetLike['item_id']) and !empty($pgItemSetLike['user_id'])) {
            $pg = new PostgreSQL();
            $likesRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_items_likes,
                'find_column' => 'item_id',
                'find_value' => $pgItemSetLike['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgItemSetLike['user_id']]);
            //exit;
            //echo "\npgItemCountAdder itemRes\n";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (empty($likesRes['like_id'])) {
                // Ещё нет такого Like
                $setLike['like_id'] = $this->trueRandom();
                $setLike['item_id'] = $pgItemSetLike['item_id'];
                $setLike['user_id'] = $pgItemSetLike['user_id'];
                //$trueSetLike = $pg->pgPaddingItems($setLike);
                $pg->pgAddData($pg->table_items_likes, $setLike);
                //return true;
                // TODO: return real val likes count
                //$itemInfo = $this->pgFileInfo($pgItemSetLike);
                /* WARNING turn off !!!
                   for logic stain */
                /*if ($itemInfo['access'] !== 'private') {
                    // add to posts =======================================
                    $dataPosts['item_id'] = $pgItemSetLike['item_id'];
                    $dataPosts['post_owner_id'] = $pgItemSetLike['user_id'];
                    $dataPosts['type'] = 'item_like';
                    //echo "\nadd to posts: \n";
                    //print_r($dataPosts);
                    //echo $this->welcome->pgAddData($this->pg->getTableItems(), $dataSigns);
                    $res = $this->addToPosts($dataPosts);
                    // ====================================================
                }*/
                return true;
            } else {
                return false;
                // TODO: return real val likes count
            }
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function pgItemDeleteLike($pgItemDeleteLike)
    {
        //echo "\n\rpgItemDeleteLike pgItemDeleteLike\n\r";
        //print_r($pgItemDeleteLike);
        if (!empty($pgItemDeleteLike['item_id']) and !empty($pgItemDeleteLike['user_id'])) {
            $pg = new PostgreSQL();
            $likesRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_items_likes,
                'find_column' => 'item_id',
                'find_value' => $pgItemDeleteLike['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgItemDeleteLike['user_id']]);
            //exit;
            //echo "\npgItemCountAdder itemRes\n";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (!empty($likesRes['like_id'])) {
                $pg->pgDelete($pg->table_items_likes, 'like_id', $likesRes['like_id']);
                //$this->setUserViewStar($pgItemDeleteLike);
                return true;
            } else {
                return false;
            }
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function pgShowMyLikesHistory($pgShowMyLikesHistory)
    {
        if (!empty($pgShowMyLikesHistory['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyLikesHistory($pgShowMyLikesHistory);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgCommentPost($pgCommentPost)
    {
        //echo "\npgItemCountAdder pgItemCountAdder\n";
        //print_r($pgItemCountAdder);
        if (!empty($pgCommentPost['item_id']) and !empty($pgCommentPost['user_id']) and !empty($pgCommentPost['content'])) {
            $pg = new PostgreSQL();
            /*$likesRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_items_likes,
                'find_column' => 'item_id',
                'find_value' => $pgCommentPost['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgCommentPost['user_id']]);*/
            //exit;
            //echo "\npgItemCountAdder itemRes\n";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            //if (empty($likesRes['like_id'])) {
            // Ещё нет такого Like
            $seComment['comment_id'] = $this->trueRandom();
            $seComment['item_id'] = $pgCommentPost['item_id'];
            $seComment['user_id'] = $pgCommentPost['user_id'];
            $seComment['content'] = $pgCommentPost['content'];
            //$trueSetLike = $pg->pgPaddingItems($setLike);
            $pg->pgAddData($pg->table_comments, $seComment);
            //return true;
            // TODO: return real val likes count
            //$itemInfo = $this->pgFileInfo($pgItemSetLike);
            /* WARNING turn off !!!
               for logic stain */
            /*if ($itemInfo['access'] !== 'private') {
                // add to posts =======================================
                $dataPosts['item_id'] = $pgItemSetLike['item_id'];
                $dataPosts['post_owner_id'] = $pgItemSetLike['user_id'];
                $dataPosts['type'] = 'item_like';
                //echo "\nadd to posts: \n";
                //print_r($dataPosts);
                //echo $this->welcome->pgAddData($this->pg->getTableItems(), $dataSigns);
                $res = $this->addToPosts($dataPosts);
                // ====================================================
            }*/
            //return true;
            /*} else {
                return false;
                // TODO: return real val likes count
            }*/
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function pgCommentUpdate($pgCommentUpdate)
    {
        //echo "\npgCommentUpdate pgCommentUpdate\n";
        //print_r($pgCommentUpdate);
        if (!empty($pgCommentUpdate['user_id'])
            and !empty($pgCommentUpdate['content'])
            and !empty($pgCommentUpdate['comment_id'])) {
            $pg = new PostgreSQL();
            $commentRes = $pg->pgOneDataByColumn([
                'table' => $pg->table_comments,
                'find_column' => 'comment_id',
                'find_value' => $pgCommentUpdate['comment_id']]);
            //exit;
            //echo "\npgCommentUpdate commentRes\n";
            //print_r($commentRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (!empty($commentRes['comment_id'])) {
                if ($commentRes['user_id'] == $pgCommentUpdate['user_id']) {
                    $updateComment['comment_id'] = $commentRes['comment_id'];
                    $updateComment['item_id'] = $commentRes['item_id'];
                    $updateComment['user_id'] = $commentRes['user_id'];
                    $updateComment['content'] = $pgCommentUpdate['content'];
                    $updateComment['updated_at'] = $this->getTimeForPG_tz();
                    //$trueSetLike = $pg->pgPaddingItems($setLike);
                    $res = $pg->pgUpdateDataArray($pg->table_comments, $updateComment, ['comment_id' => $updateComment['comment_id']]);
                    return $res;
                } else {
                    //echo "\npgCommentUpdate not owner?\n";
                    return false;
                }
            } else {
                //echo "\npgCommentUpdate empty commentRes\n";
                return false;
            }
        } else {
            //echo "\npgCommentUpdate empty param?\n";
            return false;
        }
    }

    public function pgCommentDelete($pgCommentDelete)
    {
        //echo "\npgCommentUpdate pgCommentUpdate\n";
        //print_r($pgCommentUpdate);
        if (!empty($pgCommentDelete['user_id'])
            and !empty($pgCommentDelete['comment_id'])) {
            $pg = new PostgreSQL();
            $commentRes = $pg->pgOneDataByColumn([
                'table' => $pg->table_comments,
                'find_column' => 'comment_id',
                'find_value' => $pgCommentDelete['comment_id']]);
            //exit;
            //echo "\npgCommentUpdate commentRes\n";
            //print_r($commentRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (!empty($commentRes['comment_id'])) {
                if ($commentRes['user_id'] == $pgCommentDelete['user_id']) {
                    $pg->pgDelete($pg->table_comments, 'comment_id', $commentRes['comment_id']);
                    return true;
                } else {
                    //echo "\npgCommentUpdate not owner?\n";
                    return false;
                }
            } else {
                //echo "\npgCommentUpdate empty commentRes\n";
                return false;
            }
        } else {
            //echo "\npgCommentUpdate empty param?\n";
            return false;
        }
    }

    public function pgCommentsGet($pgCommentsGet)
    {
        //echo "\npgItemCountAdder pgItemCountAdder\n";
        //print_r($pgItemCountAdder);
        //if (!empty($pgCommentsGet['item_id']) and !empty($pgCommentsGet['user_id'])) {
        if (!empty($pgCommentsGet['item_id'])) {
            $userCookie = $this->GetUserCookieValue();
            $pg = new PostgreSQL();
            if (!empty($userCookie)) {
                $pgCommentsGet['to_user_id'] = $this->CookieToUserId();
                return $pg->pgGetCommentsAccess($pgCommentsGet);
            } else {
                return $pg->pgGetCommentsNOA($pgCommentsGet);
            }
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function pgItemSetStar($pgItemSetStar)
    {
        //echo "\n\rpgItemSetStar pgItemSetStar\n\r";
        //print_r($pgItemSetStar);
        if (!empty($pgItemSetStar['item_id']) and !empty($pgItemSetStar['user_id'])) {
            $pg = new PostgreSQL();
            $starsRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_items_stars,
                'find_column' => 'item_id',
                'find_value' => $pgItemSetStar['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgItemSetStar['user_id']]);
            $userInfo = $this->pgUserInfo($pgItemSetStar['user_id']);
            if (!empty($userInfo['views_stars']) and $userInfo['views_stars'] > 0) {
                if (empty($starsRes['star_id'])) {
                    // Ещё нет такого Star
                    $setStar['star_id'] = $this->trueRandom();
                    $setStar['item_id'] = $pgItemSetStar['item_id'];
                    $setStar['user_id'] = $pgItemSetStar['user_id'];
                    $pg->pgAddData($pg->table_items_stars, $setStar);
                    $this->delUserViewStar($pgItemSetStar);
                    //echo 'Exist';
                    //return true;
                    return ['status' => 'success', 'response' => 'star sending', 'views_stars' => $userInfo['views_stars'] - 1];
                } else {
//                    return false;
                    return ['status' => 'success', 'response' => 'already exist view', 'views_stars' => $userInfo['views_stars']];
                }
            } else {
                //echo 'No stars';
                //return false;
                return ['status' => 'success', 'response' => 'no star', 'views_stars' => $userInfo['views_stars']];
            }
        } else {
            return false;
        }
    }

    public function pgItemDeleteStar($pgItemDeleteStar)
    {
        //echo "\n\pgItemDeleteStar pgItemDeleteStar\n\r";
        //print_r($pgItemDeleteStar);
        if (!empty($pgItemDeleteStar['item_id']) and !empty($pgItemDeleteStar['user_id'])) {
            $pg = new PostgreSQL();
            $starsRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_items_stars,
                'find_column' => 'item_id',
                'find_value' => $pgItemDeleteStar['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgItemDeleteStar['user_id']]);
            //exit;
            //echo "\npgItemCountAdder itemRes\n";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (!empty($starsRes['star_id'])) {
                $pg->pgDelete($pg->table_items_stars, 'star_id', $starsRes['star_id']);
                /*$this->setUserViewStar($pgItemDeleteStar);
                return true;*/
                $ret = $this->setUserViewStar($pgItemDeleteStar);
                //return ['status' => 'success', 'response' => 'star delete', 'views_stars' => $ret['views_stars'] + 1];
                return ['status' => 'success', 'response' => 'star delete', 'views_stars' => ''];
            } else {
                return false;
            }
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function pgShowMyStarsHistory($pgShowMyStarsHistory)
    {
        if (!empty($pgShowMyStarsHistory['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyStarsHistory($pgShowMyStarsHistory);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyTagsHistory($pgShowMyTagsHistory)
    {
        if (!empty($pgShowMyTagsHistory['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyTagsHistory($pgShowMyTagsHistory);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowTagsForMeHistory($pgShowTagsForMeHistory)
    {
        if (!empty($pgShowTagsForMeHistory['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetTagsForMeHistory($pgShowTagsForMeHistory);
        } else {
            return false;
        }
    }

    public function pgItemSetTag($pgItemSetTag)
    {
        //echo "\n\rpgItemSetTag pgItemSetTag\n\r";
        //print_r($pgItemSetTag);
        //exit;
        $pg = new PostgreSQL();

        $ret = [];
        if (!empty($pgItemSetTag['item_id'])
            and !empty($pgItemSetTag['tag'])
            and !empty($pgItemSetTag['user_id'])) {
            $tagSet = $this->pgGetItemUserTag($pgItemSetTag);
            if (empty($tagSet)) {
                //echo "\n\rpgItemSetTag pgGetItemUserTag empty\n\r";
                // Начало попытки поставить таг
                // Если ещё нет такого Item User Tag
                //$userInfo = $this->pgUserInfo($pgItemSetTag['user_id']);
                //$stars_tags_Object = json_decode($userInfo['stars_tags']);
                //$stars_tags = $this->ConvParseData($stars_tags_Object);
                $stars_tags = $this->pgGetUserTagsALL($pgItemSetTag);
                //echo "\n\rpgItemSetTag NOT empty(userInfo['stars_tags stars_tags json_decode stars_tags\n\r";
                //print_r($stars_tags);
                //exit;
                foreach ($stars_tags as $key => $value) {
                    //if (array_key_exists($pgItemSetTag['tag'], $stars_tags)) { // true
                    if ($pgItemSetTag['tag'] == $value['tag']) {
                        // Если у пользователя есть такой таг
                        //echo "\n\rpgItemSetTag user if stars_tags YES\n\r" . $pgItemSetTag['tag'] . ' == ' . $value['tag'] . "\n\r";
                        //print_r($value);
                        //=$stars_tags[$pgItemSetTag['tag']] = $stars_tags[$pgItemSetTag['tag']] + 1; // work
                        if ($value['tag_count'] > 0) {
                            //echo "\n\rpgItemSetTag user if stars_tags YES > 0\n\r";
                            $this->pgSetItemUserTag($pgItemSetTag);
                            $pg->pgUpdateData($pg->table_users_tags, 'tag_count', $value['tag_count'] - 1, 'ut_id', $value['ut_id']);

                        } else {
                            //echo "\n\rpgItemSetTag user if stars_tags YES < 1\n\r";
                            $ret = ['status' => 'error', 'response' => 'star delete', 'views_stars' => ''];
                        }
                    } else {
                        //echo "\n\rpgItemSetTag user array_key_exists stars_tags NOOO\n\r" . $pgItemSetTag['tag'] . ' <> ' . $value['tag'] . "\n\r";
                        //print_r($value);
                        $ret = ['status' => 'success', 'response' => 'star delete', 'views_stars' => ''];
                        //=$stars_tags[$pgItemSetTag['tag']] = 1; // work
                    }
                }
                //echo "\n\rpgItemSetTag stars_tags\n\r";
                //print_r($stars_tags);
            } else {
                //echo "\n\rpgItemSetTag pgGetItemUserTag already exist\n\r";
                $ret = ['status' => 'success', 'response' => 'star delete', 'views_stars' => ''];
            }
            return $ret;
        } else {
            return $ret;
        }
    }

    public function pgItemSetTagStaff($pgItemSetTag)
    {
        $ret = [];
        if (!empty($pgItemSetTag['item_id'])
            and !empty($pgItemSetTag['tag'])
            and !empty($pgItemSetTag['user_id'])) {
            $tagSet = $this->pgGetItemUserTag($pgItemSetTag);
            if (empty($tagSet)) {
                $this->pgSetItemUserTag($pgItemSetTag); // <--- do
            } else {
                echo "\n\rpgItemSetTag pgGetItemUserTag already exist\n\r";
                $ret = ['status' => 'success', 'response' => 'star delete', 'views_stars' => ''];
            }
            return $ret;
        } else {
            return $ret;
        }
    }

    public function pgSetItemUserTag($pgSetItemUserTag)
    {
        //echo "\n\rpgSetItemUserTag pgSetItemUserTag\n\r";
        //print_r($pgSetItemUserTag);
        if (!empty($pgSetItemUserTag['item_id'])
            and !empty($pgSetItemUserTag['tag'])
            and !empty($pgSetItemUserTag['user_id'])) {
            $pg = new PostgreSQL();
            $seTag['uit_set_id'] = $this->trueRandom();
            $seTag['item_id'] = $pgSetItemUserTag['item_id'];
            $seTag['tag'] = $pgSetItemUserTag['tag'];
            $seTag['user_id'] = $pgSetItemUserTag['user_id'];
            $pg->pgAddData($pg->table_users_items_tags_sets, $seTag);
            $this->pgTagsConfCountUpdate($pgSetItemUserTag);
            return true;
        } else {
            return $this->false;
        }
    }

    public function pgGetItemUserTag($pgGetItemUserTag)
    {
        //echo "\n\rpgGetItemUserTag pgGetItemUserTag\n\r";
        //print_r($pgGetItemUserTag);
        if (!empty($pgGetItemUserTag['item_id'])
            and !empty($pgGetItemUserTag['tag'])
            and !empty($pgGetItemUserTag['user_id'])) {
            $pg = new PostgreSQL();

            $tagRes = $pg->pgOneDataBy3Column([
                'table' => $pg->table_users_items_tags_sets,
                'find_column' => 'item_id',
                'find_value' => $pgGetItemUserTag['item_id'],
                'find_column2' => 'tag',
                'find_value2' => $pgGetItemUserTag['tag'],
                'find_column3' => 'user_id',
                'find_value3' => $pgGetItemUserTag['user_id']]);
            return $tagRes;
        } else {
            return false;
        }
    }

    public function pgDeleteItemTag($pgDeleteItemTag)
    {
        //echo "\n\rpgDeleteItemTag pgDeleteItemTag\n\r";
        //print_r($pgDeleteItemTag);
        $ret = [];
        if (!empty($pgDeleteItemTag['item_id'])
            and !empty($pgDeleteItemTag['tag'])
            and !empty($pgDeleteItemTag['user_id'])) {
            $pg = new PostgreSQL();
            $tagSet = $this->pgGetItemUserTag($pgDeleteItemTag);
            if (!empty($tagSet)) {
                //echo "\n\rpgDeleteItemTag pgGetItemUserTag NOT empty\n\r";
                $pg->pgDelete($pg->table_users_items_tags_sets, 'uit_set_id', $tagSet['uit_set_id']);
                $userTags = $pg->pgGet1UserTag($pgDeleteItemTag);
                if (!empty($userTags)) {
                    $pg->pgUpdateData($pg->table_users_tags, 'tag_count', $userTags['tag_count'] + 1, 'ut_id', $userTags['ut_id']);
                } else {
                    //echo "\n\rpgDeleteItemTag pgGetItemUserTag empty\n\r";
                    // Ещё нет такого Tag
                    $setUserTag['ut_id'] = $this->trueRandom();
                    $setUserTag['user_id'] = $pgDeleteItemTag['user_id'];
                    $setUserTag['tag'] = $pgDeleteItemTag['tag'];
                    $setUserTag['tag_count'] = 1;
                    $pg->pgAddData($pg->table_users_tags, $setUserTag);
                }
                $ret = ['status' => 'success', 'response' => 'star delete', 'views_stars' => ''];
            } else {
                //echo "\n\rpgItemSetTag pgGetItemUserTag already exist\n\r";
                $ret = ['status' => 'success', 'response' => 'star delete', 'views_stars' => ''];
            }
            return $ret;
        } else {
            return $ret;
        }
    }

    public function pgUsersScoreUpdate($pgUsersScoreUpdate)
    {
        echo "\n\rpgUsersScoreUpdate pgUsersScoreUpdate\n\r";
        print_r($pgUsersScoreUpdate);
        if (!empty($pgUsersScoreUpdate['user_id'])) {
            //$pg = new PostgreSQL();
            $oldUserScore = $this->pgGetUsersScore($pgUsersScoreUpdate);
            $oldUserScore['user_id'] = $pgUsersScoreUpdate['user_id'];
            echo "\n\rpgUsersScoreUpdate oldUserScore\n\r";
            print_r($oldUserScore);
            if (!empty($oldUserScore['tags_conf'])) {
                $this->pgSetUsersScoreTagsConf($oldUserScore);
            }
            return true;
        } else {
            return false;
        }
    }

    public function pgTagsConfCountUpdate($pgTagsConfCountUpdate)
    {
        echo "\n\rpgTagsConfCountUpdate pgTagsConfCountUpdate\n\r";
        print_r($pgTagsConfCountUpdate);
        if (!empty($pgTagsConfCountUpdate['item_id'])) {
            $itemInfo = $this->pgItemFullInfo($pgTagsConfCountUpdate['item_id']);
            echo "\n\rpgTagsConfCountUpdate itemInfo\n\r";
            print_r($itemInfo);
            if (!empty($itemInfo['owner_id'])) {
                $this->pgUsersScoreUpdate(['user_id' => $itemInfo['owner_id']]);
            }
            return true;
        } else {
            return false;
        }
    }

    public function pgGetUsersScore($pgGetUsersScore)
    {
        echo "\n\rpgGetUsersScore pgGetUsersScore\n\r";
        print_r($pgGetUsersScore);
        if (!empty($pgGetUsersScore['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetSpringActivity($pgGetUsersScore);
        } else {
            return false;
        }
    }

    public function pgSetUsersScoreTagsConf($pgSetUsersScoreTagsConf)
    {
        echo "\n\rpgSetUsersScoreTagsConf pgSetUsersScoreTagsConf\n\r";
        print_r($pgSetUsersScoreTagsConf);
        if (!empty($pgSetUsersScoreTagsConf['user_id'])
            and !empty($pgSetUsersScoreTagsConf['tags_conf'])) {
            $pg = new PostgreSQL();
            //error_reporting(0); // Turn off error reporting
            error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors
            $tagRes = $this->pgGetUsersScoreTags($pgSetUsersScoreTagsConf);
            if (!empty($tagRes)) {
                echo 'pgGetUsersScoreTags NOT empty';
                $pg->pgUpdateData($pg->table_users_scores_tags, 'tags_conf', $pgSetUsersScoreTagsConf['tags_conf'], 'user_id', $tagRes['user_id']);
            } else {
                $setUserScoreTag['user_id'] = $pgSetUsersScoreTagsConf['user_id'];
                $setUserScoreTag['tags_conf'] = $pgSetUsersScoreTagsConf['tags_conf'];
                echo 'pgGetUsersScoreTags empty setUserScoreTag';
                print_r($setUserScoreTag);
                $pg->pgAddData($pg->table_users_scores_tags, $setUserScoreTag);
            }
            return true;
        } else {
            return false;
        }
    }

    public function pgGetUsersScoreTags($pgGetUsersScoreTags)
    {
        echo "\n\rpgGetUsersScoreTags pgGetUsersScoreTags\n\r";
        print_r($pgGetUsersScoreTags);
        if (!empty($pgGetUsersScoreTags['user_id'])) {
            $pg = new PostgreSQL();
            $tagRes = $pg->pgOneDataByColumn([
                'table' => $pg->table_users_scores_tags,
                'find_column' => 'user_id',
                'find_value' => $pgGetUsersScoreTags['user_id']]);
            if (!empty($tagRes)) {
                return $tagRes;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function pgRepostsItem($pgRepostsItem)
    {
        //echo "\npgItemCountAdder pgItemCountAdder\n";
        //print_r($pgItemCountAdder);
        if (!empty($pgRepostsItem['item_id']) and !empty($pgRepostsItem['user_id'])) {
            $pg = new PostgreSQL();
            $likesRes = $pg->pgOneDataBy2Column([
                'table' => $pg->table_items_reposts,
                'find_column' => 'item_id',
                'find_value' => $pgRepostsItem['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgRepostsItem['user_id']]);
            //exit;
            //echo "\npgItemCountAdder itemRes\n";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (empty($likesRes['repost_id'])) {
                // Ещё нет такого Like
                $seRepost['repost_id'] = $this->trueRandom();
                $seRepost['item_id'] = $pgRepostsItem['item_id'];
                $seRepost['user_id'] = $pgRepostsItem['user_id'];
                //$trueSetLike = $pg->pgPaddingItems($setLike);
                $pg->pgAddData($pg->table_items_reposts, $seRepost);
                //return true;
                // TODO: return real val likes count
                $itemInfo = $this->pgFileInfo($pgRepostsItem);
                /* WARNING turn off !!!
                   for logic stain */
                if ($itemInfo['access'] !== 'private') {
                    // add to posts =======================================
                    $dataPosts['item_id'] = $pgRepostsItem['item_id'];
                    $dataPosts['post_owner_id'] = $pgRepostsItem['user_id'];
                    $dataPosts['type'] = 'item_repost';
                    //echo "\nadd to posts: \n";
                    //print_r($dataPosts);
                    //echo $this->welcome->pgAddData($this->pg->getTableItems(), $dataSigns);
                    $this->addToPosts($dataPosts);
                    // ====================================================
                }
                return true;
            } else {
                return false;
                // TODO: return real val likes count
            }
        } else {
            //echo "\npgItemCountAdder empty item_id\n";
            return false;
        }
    }

    public function cbCoupleFileGet($cbCoupleFileGet)
    {
        if (!empty($cbCoupleFileGet[$this->file]) and !empty($cbCoupleFileGet['prevfile'])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "properties"]);
            $query = CouchbaseViewQuery::from("fileCouple", "fileCouple")->key([$cbCoupleFileGet[$this->file], $cbCoupleFileGet['prevfile']])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                //$res = $bucket->query($query);
                $res = $this->SharePreParseData($bucket->query($query));
                //echo "res ";
                //print_r($res);
                //exit;
                //$fileCountShow = $res["rows"][0]["value"];
                //$fileCoupe = $res["rows"][0]["value"];
                if (!empty($res["rows"][0]["value"])) {
                    //echo "\r\n<br>cbGetFileCouple fileCouple exist<br>\r\n";
                    return $res["rows"][0]["value"];
                } else {
                    //echo "\r\n<br>cbGetFileCouple fileCouple empty<br>\r\n";
                    return false;
                }
            } catch (Exception $e) {
                //return false;
                echo "CB error " . $e;
                return false;
            }
        } else {
            return false;
        }
    }

    public function pgCoupleFileGet($pgCoupleFileGet)
    {
        if (!empty($pgCoupleFileGet['next_item_id'])
            and !empty($pgCoupleFileGet['prev_item_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column([
                'table' => $pg->table_pairs,
                'find_column' => 'prev_item_id',
                'find_value' => $pgCoupleFileGet['prev_item_id'],
                'find_column2' => 'next_item_id',
                'find_value2' => $pgCoupleFileGet['next_item_id']
            ]);
        } else {
            return false;
        }
    }

    public function cbCoupleFileSet($cbCoupleFileSet)
    {
        if (!empty($cbCoupleFileSet[$this->file]) and !empty($cbCoupleFileSet['prevfile'])) {
            // Проверить, есть ли такая пара
            $getCouple = $this->cbCoupleFileGet($cbCoupleFileSet);
            //echo "\r\n<br>getCouple <br>\r\n";
            //print_r($getCouple);
            //if (!empty($getCouple["rows"][0]["value"])) {
            if (!empty($getCouple[$this->docId])) {
                //echo "\r\n<br>cbCoupleFileSet Couple exist <br>\r\n";
                //print_r($getCouple);
                return $getCouple[$this->docId];
            } else {
                if ($cbCoupleFileSet[$this->file] != $cbCoupleFileSet['prevfile']) {
                    // Если файлы разные
                    $fileInfo = $this->cbFileInfo([$this->file => $cbCoupleFileSet[$this->file]]);
                    //$fileInfo = $this->cbFileInfo($cbCoupleFileSet[$this->file]);
                    //echo "\r\n<br>cbCoupleFileSet cbFileInfo fileInfo<br>\r\n";
                    //print_r($fileInfo);
                    //exit;
                    $prevFileInfo = $this->cbFileInfo([$this->file => $cbCoupleFileSet['prevfile']]);
                    // Запросить информацио о файлах
                    //echo "\r\n<br>cbCoupleFileSet cbFileInfo prevFileInfo <br>\r\n";
                    //print_r($prevFileInfo);
                    if (!empty($fileInfo[$this->listId]) and !empty($prevFileInfo[$this->listId])) {
                        // Если файлы расшарены
                        //echo "\r\n<br>cbCoupleFileSet Couple not exist <br>\r\n";
                        //print_r($getCouple);
                        // Записать пару просмотра
                        $newCbSetFileCouple[$this->type] = $this->fileCouple;
                        $newCbSetFileCouple[$this->file] = $cbCoupleFileSet[$this->file];
                        $newCbSetFileCouple[$this->subject] = $fileInfo[$this->subject];
                        $newCbSetFileCouple[$this->message] = $fileInfo[$this->message];
                        $newCbSetFileCouple[$this->videoDuration] = $fileInfo[$this->videoDuration];
                        $newCbSetFileCouple[$this->listId] = $fileInfo[$this->listId];
                        $newCbSetFileCouple['prevFile'] = $cbCoupleFileSet['prevfile'];
                        $newCbSetFileCouple['case'] = 1;
                        $res = $this->cbSetDocument($newCbSetFileCouple, ["bucket" => "properties"]);
                        //echo "\r\n<br>Couple create ";
                        //print_r($res);
                        return $res;
                    } else {
                        //echo "File no share";
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function pgCoupleFileSet($pgCoupleFileSet)
    {
        if (!empty($pgCoupleFileSet['next_item_id']) and !empty($pgCoupleFileSet['prev_item_id'])) {
            // Проверить, есть ли такая пара
            $getCouple = $this->pgCoupleFileGet($pgCoupleFileSet); // TODO: why???
            //echo "\r\n<br>getCouple <br>\r\n";
            //print_r($getCouple);
            //if (!empty($getCouple["rows"][0]["value"])) {
            if (!empty($getCouple['pair_id'])) {
                //echo "\r\n<br>cbCoupleFileSet Couple exist <br>\r\n";
                //print_r($getCouple);
                return $getCouple['pair_id'];
            } else {
                if ($pgCoupleFileSet['next_item_id'] != $pgCoupleFileSet['prev_item_id']) {
                    // Если файлы разные
                    $fileInfo = $this->pgFileInfo(['item_id' => $pgCoupleFileSet['next_item_id']]);
                    //$fileInfo = $this->cbFileInfo($cbCoupleFileSet[$this->file]);
                    //echo "\r\n<br>cbCoupleFileSet cbFileInfo fileInfo<br>\r\n";
                    //print_r($fileInfo);
                    //exit;
                    $prevFileInfo = $this->pgFileInfo(['item_id' => $pgCoupleFileSet['prev_item_id']]);
                    // Запросить информацио о файлах
                    //echo "\r\n<br>cbCoupleFileSet cbFileInfo prevFileInfo <br>\r\n";
                    //print_r($prevFileInfo);
                    if ($fileInfo['access'] == 'public' and $prevFileInfo['access'] == 'public') {
                        // Если файлы расшарены
                        //echo "\r\n<br>cbCoupleFileSet Couple not exist <br>\r\n";
                        //print_r($getCouple);
                        // Записать пару просмотра
                        /*$newCbSetFileCouple[$this->type] = $this->fileCouple;
                        $newCbSetFileCouple[$this->file] = $cbCoupleFileSet[$this->file];
                        $newCbSetFileCouple[$this->subject] = $fileInfo[$this->subject];
                        $newCbSetFileCouple[$this->message] = $fileInfo[$this->message];
                        $newCbSetFileCouple[$this->videoDuration] = $fileInfo[$this->videoDuration];
                        $newCbSetFileCouple[$this->listId] = $fileInfo[$this->listId];
                        $newCbSetFileCouple['prevFile'] = $cbCoupleFileSet['prevfile'];
                        $newCbSetFileCouple['case'] = 1;*/
                        $new_pair['pair_id'] = $this->trueRandom();
                        $new_pair['prev_item_id'] = $pgCoupleFileSet['prev_item_id'];
                        /*$new_pair['prev_post_id'] = $pgCoupleFileSet['prev_post_id'];
                        $new_pair['prev_user_id'] = $pgCoupleFileSet['prev_user_id'];
                        $new_pair['prev_sign_id'] = $pgCoupleFileSet['prev_sign_id'];*/
                        $new_pair['next_item_id'] = $pgCoupleFileSet['next_item_id'];
                        /*$new_pair['next_post_id'] = $pgCoupleFileSet['next_post_id'];
                        $new_pair['next_user_id'] = $pgCoupleFileSet['next_user_id'];
                        $new_pair['next_sign_id'] = $pgCoupleFileSet['next_sign_id'];*/
                        $new_pair['pair_count_show'] = 1;
                        $pg = new PostgreSQL();
                        $true_new_pair = $pg->pgPaddingItems($new_pair);
                        $res = $pg->pgAddData($pg->table_pairs, $true_new_pair);
                        //$res = $this->cbSetDocument($newCbSetFileCouple, ["bucke+t" => "properties"]);
                        //echo "\r\n<br>Couple create ";
                        //print_r($res);
                        return $res;
                    } else {
                        return false;
                    }
                } else {
                    echo "File similar";
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function cbCoupleFileAdder($cbCoupleFileAdder)
    {
        if (!empty($cbCoupleFileAdder[$this->file]) and !empty($cbCoupleFileAdder['prevfile'])) {
            // Проверить, есть ли такая пара
            $getCouple = $this->cbCoupleFileGet($cbCoupleFileAdder);
            //echo "\r\n<br>getCouple <br>\r\n";
            //print_r($getCouple);
            //if (!empty($getCouple["rows"][0]["value"])) {
            if (!empty($getCouple[$this->docId])) {
                //echo "\r\n<br>cbCoupleFileAdder Couple exist <br>\r\n";
                //print_r($getCouple);
                //return $getCouple[$this->docId];
                // Если пара есть Увеличить пару просмотра newCbSetFileCouple[$this->type] = $this->fileCouple;
                //$updateFileCouple[$this->file] = $cbAdderFileCouple[$this->file];
                //$updateFileCouple['prevFile'] = $cbAdderFileCouple['prevfile'];
                $getCouple['case'] = $getCouple['case'] + 1;
                //$res = $this->cbRebuildDocument($getCouple, ["bucket" => "properties"]);
                $res = $this->cbUpdateDocument($getCouple, ["bucket" => "properties"]);
                //echo "\r\n<br>Couple Rebild ";
                //print_r($res);
                return $res;
            } else {
                //echo "\r\n<br>cbCoupleFileAdder Couple not exist <br>\r\n";
                //print_r($getCouple);
                return false;
            }
        } else {
            return false;
        }
    }

    public function pgCoupleFileAdder($pgCoupleFileAdder)
    {
        if (!empty($pgCoupleFileAdder['next_item_id'])
            and !empty($pgCoupleFileAdder['prev_item_id'])) {
            // Проверить, есть ли такая пара
            $getCouple = $this->pgCoupleFileGet($pgCoupleFileAdder);
            //echo "\r\n<br>getCouple <br>\r\n";
            //print_r($getCouple);
            //if (!empty($getCouple["rows"][0]["value"])) {
            if (!empty($getCouple['pair_id'])) {
                //echo "\r\n<br>cbCoupleFileAdder Couple exist <br>\r\n";
                //print_r($getCouple);
                //return $getCouple[$this->docId];
                // Если пара есть Увеличить пару просмотра newCbSetFileCouple[$this->type] = $this->fileCouple;
                //$getCouple['pair_count_show'] = $getCouple['pair_count_show'] + 1;
                //$res = $this->cbUpdateDocument($getCouple, ["bucket" => "properties"]);
                $pg = new PostgreSQL();
                $res = $pg->pgUpdateData($pg->table_pairs,
                    'pair_count_show',
                    $getCouple['pair_count_show'] + 1,
                    'pair_id',
                    $getCouple['pair_id']);
                //echo "\r\n<br>Couple Rebild ";
                //print_r($res);
                return $res;
            } else {
                //echo "\r\n<br>cbCoupleFileAdder Couple not exist <br>\r\n";
                //print_r($getCouple);
                return false;
            }
        } else {
            return false;
        }
    }

    public function cbCoupleFileAutomate($cbCoupleFileAutomate)
    {
        if (!empty($cbCoupleFileAutomate[$this->file]) and !empty($cbCoupleFileAutomate['prevfile'])) {
            // Проверить, есть ли такая пара
            $getCouple = $this->cbCoupleFileGet($cbCoupleFileAutomate);
            //echo "\r\n<br>cbCoupleFileAutomate getCouple <br>\r\n";
            //print_r($getCouple);
            if (!empty($getCouple[$this->docId])) {
                //echo "\r\n<br>cbCoupleFileAutomate Couple exist <br>\r\n";
                //print_r($getCouple);
                // Если пара есть Увеличить пару просмотра
                $resCoupleFileAdd = $this->cbCoupleFileAdder([$this->file => $cbCoupleFileAutomate[$this->file],
                    "prevfile" => $cbCoupleFileAutomate['prevfile']]);
                return $resCoupleFileAdd;
            } else {
                // Если такой пары ещё нет Создать её
                //echo "\r\n<br>cbCoupleFileAutomate Couple not exist <br>\r\n";
                //print_r($getCouple);
                $resCoupleFileCreate = $this->cbCoupleFileSet([$this->file => $cbCoupleFileAutomate[$this->file],
                    "prevfile" => $cbCoupleFileAutomate['prevfile']]);
                return $resCoupleFileCreate;
            }
        } else {
            return false;
        }
    }

    public function pgCoupleFileAutomate($pgCoupleFileAutomate)
    {
        if (!empty($pgCoupleFileAutomate['next_item_id'])
            and !empty($pgCoupleFileAutomate['prev_item_id'])) {
            // Проверить, есть ли такая пара
            $getCouple = $this->pgCoupleFileGet($pgCoupleFileAutomate);
            //echo "\r\n<br>cbCoupleFileAutomate getCouple <br>\r\n";
            //print_r($getCouple);
            if (!empty($getCouple['pair_id'])) {
                //echo "\r\n<br>cbCoupleFileAutomate Couple exist <br>\r\n";
                //print_r($getCouple);
                // Если пара есть Увеличить пару просмотра
                $resCoupleFileAdd = $this->pgCoupleFileAdder($pgCoupleFileAutomate);
                return $resCoupleFileAdd;
            } else {
                // Если такой пары ещё нет Создать её
                //echo "\r\n<br>cbCoupleFileAutomate Couple not exist <br>\r\n";
                //print_r($getCouple);
                $resCoupleFileCreate = $this->pgCoupleFileSet($pgCoupleFileAutomate);
                return $resCoupleFileCreate;
            }
        } else {
            return false;
        }
    }

    public function ParseFileShowNextReverse($ParseFileShowNextReverse)
    {
        if ((!$ParseFileShowNextReverse['limit']) or ($ParseFileShowNextReverse['limit'] > 99)) $ParseFileShowNextReverse['limit'] = 99;
        // Реверс выборка пар по запрошенному Next файлу
        $FindReverseFileCouple = new parseQuery('FileCouple');
        $FindReverseFileCouple->orderByDescending('Case');
        $FindReverseFileCouple->setLimit($ParseFileShowNextReverse['limit']);
        $FindReverseFileCouple->where('File', $ParseFileShowNextReverse['file']);
        $ResultFindReverseFileCouple = $this->PreParseReverseData($FindReverseFileCouple->find());
//			return $FindReverseFileCouple->find();
        return $ResultFindReverseFileCouple;
    }

// ready

    public function PreParseReverseData($PreParseReverseData)
    {
        if (is_object($PreParseReverseData)) {
            foreach (get_object_vars($PreParseReverseData) as $key => $val) {
                if (is_object($val) || is_array($val)) {
                    $ret[$key] = $this->PreParseReverseData($val);
                    $ret['File'] = $ret['PrevFile'];
                } else {
                    $ret[$key] = $val;
                }
            }
            //unset ($ret['objectId']);
            //unset ($ret['FromUserId']);
            return $ret;
        } elseif (is_array($PreParseReverseData)) {
            foreach ($PreParseReverseData as $key => $val) {
                if (is_object($val) || is_array($val)) {
                    $ret[$key] = $this->PreParseReverseData($val);
                    $ret['File'] = $ret['PrevFile'];
                } else {
                    $ret[$key] = $val;
                }
            }
            return $ret;
        } else {
            return $PreParseReverseData;
        }
    }

    public function ParseFileShowPop($ParseFileShowPop)
    {
        if ((!$ParseFileShowPop['limit']) or ($ParseFileShowPop['limit'] > 99)) $ParseFileShowPop['limit'] = 99;
        $FindShowPop = new parseQuery('FileCountShow');
        $FindShowPop->setLimit($ParseFileShowPop['limit']);
        $FindShowPop->setSkip($ParseFileShowPop['skip']);
        $FindShowPop->orderByDescending('CountShow');
        $FindShowPop->whereExists('ListId');
        return $FindShowPop->find();
    }

    public function cbFileShowPop($cbFileShowPopp)
    {
        $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
        $query = CouchbaseViewQuery::from("file", "countShow")->limit($cbFileShowPopp[$this->limit])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
        try {
            //return $bucket->query($query);
            $res = $bucket->query($query);
            //return $res["rows"];
            return $res->rows;
        } catch (Exception $e) {
            return false;
        }
    }

    public function ParseListProperties($ParseListProperties) // ready
    {
        if (!empty($ParseListProperties['listid'])) {
            $ListProperties = new parseQuery('List');
            //$ListProperties->where('OwnerId', $ParseListProperties['userid']);
            $ListProperties->where('objectId', $ParseListProperties['listid']);
            $ListProperties->orderByDescending('createdAt');
            $ListProperties->setLimit(500);
            return $ListProperties->find();
        } else {
            if (!empty($ParseListProperties['userid'])) {
                $ListProperties = new parseQuery('UserProperties');
                //$ListProperties->where('OwnerId', $ParseListProperties['userid']);
                $ListProperties->where('OwnerId', $ParseListProperties['userid']);
                $ListProperties->orderByDescending('createdAt');
                $ListProperties->setLimit(500);
                return $ListProperties->find();
            } else {
                echo "Missing argument - userid";
                //header('Location: https://vide.me/VictorLustig.html');
            }
        }
    }

    public function cbListProperties($cbListProperties)
    {
        //print_r($cbListProperties);
        //exit;
        if (!empty($cbListProperties['listid'])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "properties"]);
            $query = CouchbaseViewQuery::from("list", "list")->key($cbListProperties['listid'])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                $res = $bucket->query($query);
                //return $res["rows"];
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }
        } else {
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function ParseFileShare($ParseFileShare)
    {
        if (!empty($ParseFileShare['file'])) {
            $FindFileId = new parseQuery('File');
            $FindFileId->where('File', $ParseFileShare['file']);
            $ConvParseData = $this->ConvParseData($FindFileId->find());
            // ВАЖНОЕ условие - если пользователь владелец файлаы
            if ($ConvParseData['results']['0']['OwnerId'] == $ParseFileShare['userid']) {
                // Если пользователь не назвал лист, создать comon лист:
                if (empty($ParseFileShare['list'])) {
                    $ParseFileShare['list'] = "common";
                    //$ListId = "QhUMSrElbV";
                    //} else {
                    //$ListId = $this->ParseListCreate($ParseFileShare);
                }
                $ListId = $this->ParseListCreate($ParseFileShare);
                // Запись идентификатора списка из List
                $FileShare = new parseObject('File');
                $FileShare->ListId = $ListId;
                $ShareResult = $FileShare->update($ConvParseData['results']['0']['objectId']);

                $FindFileCountShow = new parseQuery('FileCountShow');
                $FindFileCountShow->where('File', $ParseFileShare['file']);
                $ConvShare = $this->ConvParseData($FindFileCountShow->find());
                $FileCountShow = new parseObject('FileCountShow');
                if (!empty($ConvShare['results']['0']['objectId'])) {
                    $FileCountShow->ListId = $ListId;
                    $FileCountShow->update($ConvShare['results']['0']['objectId']);
                } else {
                    $FileCountShow->File = $ParseFileShare['file'];
                    //$FindFileCountShowShare->CountShow = 1;
                    $FileCountShow->ListId = $ListId;
                    $FileCountShow->save();
                }


                echo "File share success: " . $ShareResult->updatedAt;
            } else {
                echo "This is not your file ";
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

// ready

    function safetyTagsSlashesTrim32($safetyTagsSlashesTrim32)
    {
        // http://php.net/manual/ru/function.htmlentities.php
        if (isset($safetyTagsSlashesTrim32)) {
            $safetyTagsSlashesTrim32 = strip_tags(substr(stripslashes(trim($safetyTagsSlashesTrim32)), 0, 32));
            return $safetyTagsSlashesTrim32;
        } else {
            return false;
        }
    }

    function safetyTextForVectorX($safetyTextForVectorX, $length = 256)
    {
        // http://php.net/manual/ru/function.htmlentities.php
        if (isset($safetyTextForVectorX)) {
            $safetyTextForVectorX = trim($safetyTextForVectorX);
            $safetyTextForVectorX = stripslashes($safetyTextForVectorX);
            $safetyTextForVectorX = substr($safetyTextForVectorX, 0, $length);
            $safetyTextForVectorX = strip_tags($safetyTextForVectorX);
            $safetyTextForVectorX = str_replace(["\r\n", "\n", "\r", "<br />", ":", "_", "=", "#"], "", $safetyTextForVectorX);
            $safetyTextForVectorX = preg_replace("/[^A-Za-z0-9 ]/", '', $safetyTextForVectorX);
            return $safetyTextForVectorX;
        } else {
            return false;
        }
    }
    function safetyTextForJSONb($safetyTextForJSONb, $length = 256)
    {
        // http://php.net/manual/ru/function.htmlentities.php
        if (isset($safetyTextForJSONb)) {
            $safetyTextForJSONb = str_replace(["\""], "", $safetyTextForJSONb);
            return $safetyTextForJSONb;
        } else {
            return false;
        }
    }

    public function ParseListCreate($ParseListCreate)
    {
        if (!empty($ParseListCreate['list']) && !empty($ParseListCreate['userid'])) {
            $ParseListCreate['list'] = $this->safetyTagsSlashesTrim32($ParseListCreate['list']);
            $ParseListId = $this->ParseListToListId($ParseListCreate);
            // Только если у пользователя нет такого листа
            if (empty($ParseListId)) {
                $List = new parseObject('List');
                $List->ListName = $ParseListCreate['list'];
                $List->OwnerId = $ParseListCreate['userid'];
                $SaveResult = $List->save();
                return $SaveResult->objectId;
            } else {
                return $ParseListId;
            }
        } else {
            echo "Missing argument - list";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    function safetyTagsSlashesTrim4096($safetyTagsSlashesTrim4096) // TODO: str_ireplace why?
    {
        // http://php.net/manual/ru/function.htmlentities.php
        if (isset($safetyTagsSlashesTrim4096)) {
            $safetyTagsSlashesTrim4096 = html_entity_decode($safetyTagsSlashesTrim4096);
            $safetyTagsSlashesTrim4096 = str_ireplace(
                ['<', '>', '&', '\'', '"', '&#8220;', ';'],
                ['&lt;', '&gt;', '&amp;', '&apos;', '&quot;', '&ldquo;', ''], $safetyTagsSlashesTrim4096);
            $safetyTagsSlashesTrim4096 = htmlspecialchars($safetyTagsSlashesTrim4096);
            $safetyTagsSlashesTrim4096 = strip_tags(substr(stripslashes(trim($safetyTagsSlashesTrim4096)), 0, 4096));
            $safetyTagsSlashesTrim4096 = str_replace(["\r\n", "\n", "\r"], '<br />', $safetyTagsSlashesTrim4096);
            $safetyTagsSlashesTrim4096 = str_replace('|', ' ', $safetyTagsSlashesTrim4096);
            //$safetyTagsSlashesTrim4096 = pg_escape_string($safetyTagsSlashesTrim4096);
            //$safetyTagsSlashesTrim4096 = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#", '', $safetyTagsSlashesTrim4096);
            return $safetyTagsSlashesTrim4096;
        } else {
            return false;
        }
    }

    function safetyText($safetyText) // TODO: remove
    {
        // http://php.net/manual/ru/function.htmlentities.php
        if (isset($safetyTagsSlashesTrim32)) {
            $safetyTagsSlashesTrim32 = strip_tags(substr(stripslashes(trim($safetyTagsSlashesTrim32)), 0, 32));
            return $safetyTagsSlashesTrim32;
        } else {
            return false;
        }
    }

    function safetySubstrText($safetySubstrText)
    {
        // http://php.net/manual/ru/function.htmlentities.php
        if (isset($safetySubstrText)) {
            $safetySubstrText = strip_tags(substr(stripslashes(trim($safetySubstrText)), 0, 512));
            return $safetySubstrText;
        } else {
            return false;
        }
    }

    public function ParseListToListId($ParseListToListId)
    {
        if (!empty($ParseListToListId['list']) && !empty($ParseListToListId['userid'])) {
            $ParseListToListId['list'] = $this->safetyTagsSlashesTrim32($ParseListToListId['list']);
            $FindListId = new parseQuery('List');
            $FindListId->where('ListName', $ParseListToListId['list']);
            $FindListId->where('OwnerId', $ParseListToListId['userid']);
            $ConvParseData = $this->ConvParseData($FindListId->find());
            return $ConvParseData['results']['0']['objectId'];
        } else {
            echo "Missing argument - list";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    /*
        public function ParseFileShow($ParseFileShow) {
            if ((!$ParseFileShow['limit']) or ($ParseFileShow['limit'] > 32)) $ParseFileShow['limit'] = 32;
                $FindShowNew = new parseQuery('FileShow');
                //$FindShowNew->orderByDescending('CountShow');
            //	$FindShowNew->setLimit($ParseFileShow['limit']);
                //$FindShowNew->whereExists('ListId');
                $FindShowNew->where('File', $ParseFileShow['File']);
                return $FindShowNew->find();
        }
    */
// ready

    public function cbFileShare($cbFileShare)
    {
        if (!empty($cbFileShare['file'])) {
            $oldFile = $this->cbGet("file", $cbFileShare['file']);
            print_r($oldFile);
            exit;
            // ВАЖНОЕ условие - если пользователь владелец файлаы
            if ($ConvParseData['results']['0']['OwnerId'] == $cbFileShare['userid']) {
                // Если пользователь не назвал лист, создать comon лист:
                if (empty($cbFileShare['list'])) {
                    $cbFileShare['list'] = "common";
                    //$ListId = "QhUMSrElbV";
                    //} else {
                    //$ListId = $this->ParseListCreate($ParseFileShare);
                }
                $ListId = $this->ParseListCreate($cbFileShare);
                // Запись идентификатора списка из List
                $FileShare = new parseObject('File');
                $FileShare->ListId = $ListId;
                $ShareResult = $FileShare->update($ConvParseData['results']['0']['objectId']);

                $FindFileCountShow = new parseQuery('FileCountShow');
                $FindFileCountShow->where('File', $cbFileShare['file']);
                $ConvShare = $this->ConvParseData($FindFileCountShow->find());
                $FileCountShow = new parseObject('FileCountShow');
                if (!empty($ConvShare['results']['0']['objectId'])) {
                    $FileCountShow->ListId = $ListId;
                    $FileCountShow->update($ConvShare['results']['0']['objectId']);
                } else {
                    $FileCountShow->File = $cbFileShare['file'];
                    //$FindFileCountShowShare->CountShow = 1;
                    $FileCountShow->ListId = $ListId;
                    $FileCountShow->save();
                }


                echo "File share success: " . $ShareResult->updatedAt;
            } else {
                echo "This is not your file ";
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function pgFileShare($pgFileShare)
    {
        //echo "\npgFileShare \n";
        //print_r($pgFileShare);
        if (!empty($pgFileShare['item_id'])) {
            //$oldFile = $this->cbGet("file", $pgFileShare['file']);
            $itemInfo = $this->pgFileInfo($pgFileShare);
            //print_r($itemInfo);
            //exit;
            // ВАЖНОЕ условие - если файл публичный ИЛИ принадлежит польхователю
            //if ($itemInfo['access'] == 'public' or $itemInfo['owner_id'] == $pgFileShare['user_id']) {
            if ($itemInfo['access'] == 'public' or $itemInfo['owner_id'] == $pgFileShare['owner_id']) {
                /*if (empty($pgFileShare['album'])) {
                    // Если пользователь не назвал лист, создать common лист:
                    //$pgFileShare['list'] = "common";
                    //$ListId = "QhUMSrElbV";
                    //} else {
                    //$ListId = $this->ParseListCreate($ParseFileShare);
                } else {
                    $pgAlbumToAlbumId['owner_id'] = $pgFileShare['user_id'];
                    $pgAlbumToAlbumId['title'] = $pgFileShare['album'];
                    //$dataPosts['album_id'] = $this->pgAlbumToAlbumId($pgFileShare);
                    $album_id = $this->pgAlbumToAlbumId($pgAlbumToAlbumId);
                    //==================
                    $dataAlbumsSets['album_id'] = $album_id;
                    $dataAlbumsSets['owner_id'] = $pgFileShare['user_id'];
                    $dataAlbumsSets['item_id'] = $pgFileShare['item_id'];
                    //echo "\nadd to album dataAlbumsSets \n";
                    //print_r($dataAlbumsSets);
                    $resAlbum = $this->addToAlbumsSets($dataAlbumsSets);
                    //echo "\nadd to album res \n";
                    //print_r($resAlbum);
                    // ====================================================
                }*/
                if (!empty($pgFileShare['album_id'])) $this->addToAlbumsSets($pgFileShare);
                // add to posts =======================================
                $dataPosts['item_id'] = $pgFileShare['item_id'];
                //$dataPosts['post_owner_id'] = $pgFileShare['user_id'];
                $dataPosts['post_owner_id'] = $pgFileShare['owner_id'];
                $dataPosts['type'] = 'item_repost';
                //echo "\nadd to posts: \n";
                //print_r($dataPosts);
                //echo $this->welcome->pgAddData($this->pg->getTableItems(), $dataSigns);
                $res = $this->addToPosts($dataPosts);
                // ====================================================
                echo "Item share success";
                //if ($itemInfo['owner_id'] == $pgFileShare['user_id']) {
                if ($itemInfo['owner_id'] == $pgFileShare['owner_id']) {
                    // Add access public to items ==============================
                    // TODO: if access = friend ??? Check album access type, set access to items
                    if ($pgFileShare['access'] == 'friends') $this->pgSetAccessFriends($pgFileShare);
                    //$pgAlbumToAlbumId['owner_id'] = $pgFileShare['user_id'];
                    /*$pgAlbumToAlbumId['owner_id'] = $pgFileShare['owner_id'];
                    $pgAlbumToAlbumId['title'] = $pgFileShare['album'];*/
                    //$albumInfo = $this->pgAlbumInfoByTitle($pgAlbumToAlbumId);
                    $albumInfo = $this->pgAlbumInfoById($pgFileShare);
                    $access = $albumInfo['access']; // TODO: why ??? for friends?
                    //echo "\nalbumInfo: \n";
                    //print_r($albumInfo);
                    $this->pgItemUpdate([
                        "item_id" => $pgFileShare["item_id"],
                        "owner_id" => $itemInfo['owner_id'],
                        'access' => $access
                    ]);
                    // ====================================================
                }
            } elseif ($itemInfo['owner_id'] == $pgFileShare['user_id']) {

            } else {
                echo "This is item not public ";
                //header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - item";
            //header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function pgAlbumsItemsDelete($pgAlbumsItemsDelete)
    {
        //echo "\npgFileShare \n";
        //print_r($pgFileShare);
        $ret = [];
        if (!empty($pgAlbumsItemsDelete['albums_sets_id']) and !empty($pgAlbumsItemsDelete['user_id'])) {
            $pg = new PostgreSQL();
            $albums_setsRes = $pg->pgOneDataByColumn([
                'table' => $pg->table_albums_sets,
                'find_column' => 'albums_sets_id',
                'find_value' => $pgAlbumsItemsDelete['albums_sets_id']]);
            //exit;
            //echo "\npgItemCountAdder itemRes\n";
            //print_r($itemRes);
            // wrong if (empty($itemRes['item_count_show'])) {
            if (!empty($albums_setsRes['albums_sets_id']) and $albums_setsRes['owner_id'] == $pgAlbumsItemsDelete['user_id']) {
                $pg->pgDelete($pg->table_albums_sets, 'albums_sets_id', $albums_setsRes['albums_sets_id']);
                //$this->setUserViewStar($pgItemDeleteLike);
                //return true;
                $ret = ['status' => 'success', 'response' => 'albums items delete'];
            } else {
                //return false;
                $ret = ['status' => 'error', 'response' => 'albums items delete', 'text' => 'albums_sets_id'];

            }
        } else {
            //echo "Missing argument - albums_sets_id";
            //header('Location: https://vide.me/VictorLustig.html');
            $ret = ['status' => 'error', 'response' => 'albums items delete', 'text' => 'albums_sets_id empty'];
        }
        return $ret;
    }

    public function pgItemUpdate($pgItemUpdate)
    {
        //print_r($pgItemUpdate);
        if (!empty($pgItemUpdate['item_id']) and !empty($pgItemUpdate['owner_id'])) {
            $article = new Article();
            //$oldFile = $this->cbGet("file", $pgFileShare['file']);
            $itemOld = $this->pgFileInfo($pgItemUpdate);
            //print_r($itemOld);
            //exit;
            $itemTemp["item_id"] = ($pgItemUpdate["item_id"]) ?: null;
            $itemTemp["owner_id"] = ($pgItemUpdate["owner_id"]) ?: null;
            $itemTemp["cover"] = ($pgItemUpdate["cover"]) ?: null;
            $itemTemp["title"] = ($pgItemUpdate["title"]) ?: null;
            $itemTemp["content"] = ($pgItemUpdate["content"]) ?: null;
            $itemTemp["access"] = ($pgItemUpdate["access"]) ?: 'private';
            $itemTemp['updated_at'] = $this->getTimeForPG_tz();

            //print_r($itemTemp);

            //$this->pgSetAccessFollowers($pgItemUpdate);
            //$followers = ($pgItemUpdate["followers"]) ?: null;
            // ВАЖНОЕ условие - если файл принадлежит польхователю
            if ($itemOld['owner_id'] == $pgItemUpdate['owner_id']) {
                $this->pgSetAccessFriends($pgItemUpdate);
                $pg = new PostgreSQL();
                $itemNew = array_merge($itemOld, $itemTemp);
                $itemTrue = $pg->pgPaddingItems($itemNew);
                if (!empty($pgItemUpdate["cover"])) {
                    $itemTrue["cover"] = $pgItemUpdate["cover"];
                } else {
                    $itemTrue["cover"] = '';
                }

                if (!empty($pgItemUpdate["tags"])) {
                    $itemTrue['tags'] = json_encode($article->paddingTagsForItem($pgItemUpdate['tags'])); // Brasília -> [tags] => ["Bras\u00edlia"]
                    //$itemTrue['tags'] = json_encode($pgItemUpdate['tags']); // NOOO [tags] => {"Bras\u00edlia":"Bras\u00edlia"}
                    $this->itemUpdateTags($pgItemUpdate);
                }

                /*if (!empty($pgItemUpdate['content'])) { // TODO: why for?
                    $hashtagsExtractor = $this->hashtagsExtractor($pgItemUpdate['content']);
                    $tagsAddToItems = $this->tagsAddToItems($hashtagsExtractor);
                    $itemTrue['tags'] = $this->tagsSplitter($itemTrue, $tagsAddToItems);
                }*/
                if (!empty($pgItemUpdate['ext_links'])) {
                    //$this->addExtLinkAgregation($pgItemUpdate);
                    $itemTrue['ext_links'] = json_encode($pgItemUpdate['ext_links']);
                    //print_r($itemTrue);
                } else {
                    //$itemTrue['ext_links'] = 'NULL';
                    $itemTrue['ext_links'] = NULL;
                    //$itemTrue['ext_links'] = '{}';
                    //$itemTrue['ext_links'] = '';
                }
                /*if (!empty($pgItemUpdate['partners'])) {
                    //$itemTrue['partners'] = json_encode($pgItemUpdate['partners']);
                    $this->itemUpdatePartners($pgItemUpdate);
                } else {
                    $itemTrue['partners'] = NULL;
                }*/
                //print_r($itemTrue);
                $res = $pg->pgUpdateDataArray($pg->table_items, $itemTrue, ['item_id' => $pgItemUpdate['item_id']]);
                if ($pgItemUpdate["access"] == 'public' and $itemOld['access'] !== 'public') {
                    // add to posts =================================================
                    $dataPosts['post_id'] = $this->trueRandom();
                    $dataPosts['item_id'] = $pgItemUpdate["item_id"];
                    $dataPosts['type'] = 'update';
                    $dataPosts['post_owner_id'] = $pgItemUpdate["owner_id"];
                    //echo "\nadd to posts: \n";
                    //print_r($dataPosts);
                    $res = $this->addToPosts($dataPosts);
                    //==================
                }
                return $res;
            } else {
                echo "This is item not public ";
                return false;
                //header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - item";
            return false;
            //header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function itemUpdateTags($itemUpdateTags)
    {
        echo "\n\ritemUpdateTags itemUpdateTags\n\r";
        print_r($itemUpdateTags);
        if (!empty($itemUpdateTags['item_id']) and !empty($itemUpdateTags['owner_id'])) {
            $this->scratchItemMyTagsSets($itemUpdateTags);
            $this->scratchItemMyTags($itemUpdateTags);
            $itemUpdateTags['tags'] = json_encode($itemUpdateTags['tags']);
            $this->addTagsForItemV4($itemUpdateTags);
        }
    }
    /*public function itemUpdatePartners($itemUpdatePartners)
    {
        echo "\n\ritemUpdatePartners itemUpdatePartners\n\r";
        print_r($itemUpdatePartners);
        if (!empty($itemUpdatePartners['partners']) and !empty($itemUpdatePartners['owner_id'])) {
            //$this->scratchItemMyTagsSets($itemUpdatePartners);
            //$this->scratchItemMyTags($itemUpdatePartners);
            $partnersArray = json_encode($itemUpdatePartners['partners']);
            echo "\n\ritemUpdatePartners partnersArray\n\r";
            print_r($partnersArray);
            //$this->addPartnersForItem($partnersArray);
            //$this->addPartnersForItem($itemUpdatePartners['partners']);
            //if (!empty($partnersArray)) {
                $pg = new PostgreSQL();
                foreach ($itemUpdatePartners['partners'] as $key => $value) {
                    echo "\n\ritemUpdatePartners item_id ---> \n\r";
                    print_r($itemUpdatePartners['item_id']);
                    echo "\n\ritemUpdatePartners foreach partnersArray key --->\n\r";
                    print_r($key);
                    echo "\n\ritemUpdatePartners foreach partnersArray value --->\n\r";
                    print_r($value);
                }
            //}
        }
    }*/

    public function scratchItemMyTagsSets($scratchItemMyTagsSets)
    {
        echo "\n\rscratchItemMyTagsSets scratchItemMyTagsSets\n\r";
        print_r($scratchItemMyTagsSets);
        if (!empty($scratchItemMyTagsSets['item_id']) and !empty($scratchItemMyTagsSets['owner_id'])) {
            $pg = new PostgreSQL();
            $itemRes = $pg->pgDeleteDataBy2Column([
                'table' => $pg->table_users_items_tags_sets,
                'find_column' => 'user_id',
                'find_value' => $scratchItemMyTagsSets['owner_id'],
                'find_column2' => 'item_id',
                'find_value2' => $scratchItemMyTagsSets['item_id']]);
            echo "\n\rscratchItemMyTagsSets itemRes\n\r";
            print_r($itemRes);
            return $itemRes;
        } else {
            return false;
        }
    }

    public function scratchItemMyTags($scratchItemMyTags)
    {
        echo "\n\rscratchItemMyTags scratchItemMyTags\n\r";
        print_r($scratchItemMyTags);
        if (!empty($scratchItemMyTags['item_id'])) {
            $pg = new PostgreSQL();
            $itemRes = $pg->pgDelete($pg->table_items_tags, 'item_id', $scratchItemMyTags['item_id']);
            echo "\n\rscratchItemMyTags itemRes\n\r";
            print_r($itemRes);
            return $itemRes;
        } else {
            return false;
        }
    }

    public function pgSetAccessFriends($pgSetAccessFriends)
    {
        if (!empty($pgSetAccessFriends['item_id']) and !empty($pgSetAccessFriends['owner_id'])) {
            $pg = new PostgreSQL();
            //если указан доступ друзьям
            // find since access
            $accessFriends = $this->pgGetAccessFriends($pgSetAccessFriends);
            if ($pgSetAccessFriends['access'] == 'friends') {
                //если такая зипись есть
                if (!$accessFriends) {
                    $accessTemp["item_id"] = ($pgSetAccessFriends["item_id"]);
                    $accessTemp["user_id"] = ($pgSetAccessFriends["owner_id"]);
                    $pg->pgInsertData($pg->table_access_items_friends, $accessTemp);
                    // add to posts =================================================
                    $dataPosts['post_id'] = $this->trueRandom();
                    $dataPosts['item_id'] = $pgSetAccessFriends["item_id"];
                    $dataPosts['type'] = 'update';
                    $dataPosts['post_owner_id'] = $pgSetAccessFriends["owner_id"];
                    //echo "\nadd to posts: \n";
                    //print_r($dataPosts);
                    $this->addToPosts($dataPosts); // TODO: remove to owner
                    //==================
                } else {
                    return false;
                }
            } else {
                // If since access
                if ($accessFriends) {
                    $accessTemp["item_id"] = ($pgSetAccessFriends["item_id"]);
                    $accessTemp["user_id"] = ($pgSetAccessFriends["owner_id"]);
                    return $pg->pgDelete($pg->table_access_items_friends, 'item_id', $pgSetAccessFriends["item_id"]);
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function pgSetAccessAlbumFriends($pgSetAccessAlbumFriends)
    {
        //print_r($pgSetAccessAlbumFriends);
        if (!empty($pgSetAccessAlbumFriends['album_id']) and !empty($pgSetAccessAlbumFriends['owner_id'])) {
            $pg = new PostgreSQL();
            //если указан доступ друзьям
            // find since access
            $accessFriends = $this->pgGetAccessAlbumFriends($pgSetAccessAlbumFriends);
            if ($pgSetAccessAlbumFriends['access'] == 'friends') {
                //если такая зипись есть
                if (!$accessFriends) {
                    $accessTemp['album_id'] = ($pgSetAccessAlbumFriends['album_id']);
                    $accessTemp['owner_id'] = ($pgSetAccessAlbumFriends['owner_id']);
                    return $pg->pgInsertData($pg->table_access_albums_friends, $accessTemp);
                } else {
                    return false;
                }
            } else {
                // If since access
                if ($accessFriends) {
                    $accessTemp['album_id'] = ($pgSetAccessAlbumFriends['album_id']);
                    $accessTemp['owner_id'] = ($pgSetAccessAlbumFriends['owner_id']);
                    return $pg->pgDelete($pg->table_access_albums_friends, 'album_id', $pgSetAccessAlbumFriends['album_id']);
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    /*public function pgAddExtLink($pgAddExtLink)
    {
        //print_r($pgSetAccessAlbumFriends);
        if (!empty($pgAddExtLink['item_id'])
            and !empty($pgAddExtLink['title'])
            and !empty($pgAddExtLink['link'])
            and !empty($pgAddExtLink['owner_id'])) {
            $pg = new PostgreSQL();
            // find since access
            //$accessFriends = $this->pgGetAccessAlbumFriends($pgAddExtLink);
            /!*$linkTemp['owner_id'] = ($pgAddExtLink['owner_id']);
            $linkTemp['item_id'] = ($pgAddExtLink['item_id']);
            $linkTemp['title'] = ($pgAddExtLink['title']);
            $linkTemp['link'] = ($pgAddExtLink['link']);*!/
            $pgAddExtLink['ext_links_id'] = $this->trueRandom();
            return $pg->pgInsertData($pg->table_external_links, $pgAddExtLink);
        } else {
            return false;
        }
    }
    public function addExtLinkAgregation($addExtLinkAgregation)
    {
        if (!empty($addExtLinkAgregation['ext_link'])) {
            foreach ($addExtLinkAgregation['ext_link'] as $key => $value) {
                echo "\n\r foreach key: " . $key;
                $value['owner_id'] = $addExtLinkAgregation['owner_id'];
                $value['item_id'] = $addExtLinkAgregation['item_id'];
                print_r($value);
                //$this->pgAddExtLink($value);
            }
            //$dataItems['tags'] = json_encode($tags);
        }
    }*/

    /*public function pgSetAccessFollowers($pgSetAccessFollowers)
    {
        if (!empty($pgSetAccessFollowers['item_id']) and !empty($pgSetAccessFollowers['owner_id'])) {
            $pg = new PostgreSQL();
            //если указан доступ relationships
            // find since access
            $accessFollowers = $this->pgGetAccessFollowers($pgSetAccessFollowers);
            if (!empty($pgSetAccessFollowers['followers'])
                and $pgSetAccessFollowers['followers'] == 'followers') {
                //если такая зипись есть
                if (!$accessFollowers) {
                    $accessTemp["item_id"] = ($pgSetAccessFollowers["item_id"]);
                    $accessTemp["user_id"] = ($pgSetAccessFollowers["owner_id"]);
                    return $pg->pgInsertData($pg->table_access_items_followers, $accessTemp);
                } else {
                    return false;
                }
            } else {
                // If since access
                if ($accessFollowers) {
                    $accessTemp["item_id"] = ($pgSetAccessFollowers["item_id"]);
                    $accessTemp["user_id"] = ($pgSetAccessFollowers["owner_id"]);
                    return $pg->pgDelete($pg->table_access_items_followers, 'item_id', $pgSetAccessFollowers["item_id"]);
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }*/

    public function pgGetAccessFriends($pgGetAccessFriends)
    {
        if (!empty($pgGetAccessFriends['item_id']) and !empty($pgGetAccessFriends['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column([
                'table' => $pg->table_access_items_friends,
                'find_column' => 'item_id',
                'find_value' => $pgGetAccessFriends['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgGetAccessFriends['owner_id']
            ]);
        } else {
            return false;
        }
    }

    public function pgGetAccessAlbumFriends($pgGetAccessAlbumFriends)
    {
        if (!empty($pgGetAccessAlbumFriends['album_id']) and !empty($pgGetAccessAlbumFriends['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column([
                'table' => $pg->table_access_albums_friends,
                'find_column' => 'album_id',
                'find_value' => $pgGetAccessAlbumFriends['album_id'],
                'find_column2' => 'owner_id',
                'find_value2' => $pgGetAccessAlbumFriends['owner_id']
            ]);
        } else {
            return false;
        }
    }

    /*public function pgGetAccessFollowers($pgGetAccessFollowers)
    {
        if (!empty($pgGetAccessFollowers['item_id']) and !empty($pgGetAccessFollowers['owner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column([
                'table' => $pg->table_access_items_followers,
                'find_column' => 'item_id',
                'find_value' => $pgGetAccessFollowers['item_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgGetAccessFollowers['owner_id']
            ]);
        } else {
            return false;
        }
    }*/

    /**
     * @param $cbListCreate
     * @return bool
     */
    public function cbListCreate($cbListCreate)
    {
        if (!empty($cbListCreate[$this->list]) && !empty($cbListCreate[$this->userId])) {
            $cbListCreate[$this->list] = $this->safetyTagsSlashesTrim32($cbListCreate[$this->list]);
            $cbListId = $this->cbListToListId($cbListCreate);
            // Только если у пользователя нет такого листа
            if (empty($cbListId)) {
                $newList[$this->type] = $this->list;
                $newList[$this->list] = $cbListCreate[$this->list];
                $newList[$this->ownerId] = $cbListCreate[$this->userId];
                if (!empty($cbListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $cbListCreate[$this->imageBrand];
                return $this->cbSetDocument($newList, ["bucket" => "properties"]);
            } else {
                return $cbListId["id"];
            }
        } else {
            echo "Missing argument - list";
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgListCreate($pgListCreate)
    {
        if (!empty($pgListCreate[$this->list]) && !empty($pgListCreate['user_id'])) {
            $pgListCreate[$this->list] = $this->safetyTagsSlashesTrim32($pgListCreate[$this->list]);
            $pgListId = $this->pgListToListId($pgListCreate);
            //print_r($pgListId);
            // Только если у пользователя нет такого листа
            if (empty($pgListId)) {
                //$newList[$this->type] = $this->list;
                $newList['sign_id'] = $this->trueRandom();
                $newList['title'] = $pgListCreate[$this->list];
                $newList['access'] = $pgListCreate['access'];
                $newList['owner_id'] = $pgListCreate['user_id'];
                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                $pg = new PostgreSQL();
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                $this->addToSigns($newList);
            } else {
                return $pgListId;
            }
        } else {
            echo "Missing argument - list";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgAlbumCreate($pgAlbumCreate)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgAlbumCreate['owner_id']) && !empty($pgAlbumCreate['title'])) {
            $pgAlbumCreate['title'] = $this->safetyTagsSlashesTrim32($pgAlbumCreate['title']);
            $pgAlbumId = $this->pgAlbumToAlbumId($pgAlbumCreate);
            //print_r($pgAlbumId);
            // Только если у пользователя нет такого листа
            if (empty($pgAlbumId)) {
                //$newList[$this->type] = $this->list;
                $newAlbum['album_id'] = $this->trueRandom();
                $newAlbum['owner_id'] = $pgAlbumCreate['owner_id'];
                $newAlbum['access'] = $pgAlbumCreate['access'];
                $newAlbum['title'] = $pgAlbumCreate['title'];
                $newAlbum['content'] = $pgAlbumCreate['content'];
                $newAlbum['cover'] = $pgAlbumCreate['cover'];
                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                //$pg = new PostgreSQL();
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                $this->addToAlbums($newAlbum);
                $pgAlbumCreate['album_id'] = $newAlbum['album_id'];
                $this->pgSetAccessAlbumFriends($pgAlbumCreate);
                return $newAlbum['album_id'];
            } else {
                return $pgAlbumId;
            }
        } else {
            echo "Missing argument - list";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgListUpdate($pgListUpdate) // TODO: remove
    {
        //print_r($pgListUpdate);
        if (!empty($pgListUpdate[$this->list]) && !empty($pgListUpdate['user_id'])) {
            $pg = new PostgreSQL();
            // TODO: поставить проверку значений access
            $pgListIdOld = $this->pgListToListId($pgListUpdate);
            if (!empty($pgListUpdate['newlist'])) {
                $pgListUpdate['list'] = $this->safetyTagsSlashesTrim32($pgListUpdate['newlist']);
            } else {
                $pgListUpdate['list'] = $this->safetyTagsSlashesTrim32($pgListUpdate['list']);
            }
            $pgListToListId['user_id'] = $pgListUpdate['user_id'];
            $pgListToListId['list'] = $pgListUpdate['newlist'];
            $pgListId = $this->pgListToListId($pgListToListId);
            //echo "\n pgListUpdate pgListToListId\n";
            //print_r($pgListId);
            $oldList = $pg->pgOneDataByColumn([
                'table' => $pg->table_signs,
                'find_column' => 'sign_id',
                'find_value' => $pgListId]);
            //echo "\n pgListUpdate oldList\n";
            //print_r($oldList);
            // Только если у пользователя нет такого листа
            if (empty($pgListId)) {
                //$newList[$this->type] = $this->list;
                //$newList['sign_id'] = $pgListId;
                $oldList['title'] = $pgListUpdate['list'];
                $oldList['access'] = $pgListUpdate['access'];
                //$newList['owner_id'] = $pgListUpdate['user_id'];
                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                //$this->addToSigns($newList);
                //echo "\n pgListUpdate oldList\n";
                //print_r($oldList);
                return $pg->pgUpdateDataArray($pg->table_signs, $oldList, ['sign_id' => $pgListIdOld]);
                //echo "\n pgListUpdate pgUpdateDataArray\n";
                //print_r($res);
                //return $res;
            } elseif (!empty($pgListUpdate['access'])) {
                $oldList['title'] = $pgListUpdate['list'];
                $oldList['access'] = $pgListUpdate['access'];
                //$newList['owner_id'] = $pgListUpdate['user_id'];
                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                //$this->addToSigns($newList);
                //echo "\n pgListUpdate oldList\n";
                //print_r($oldList);
                return $pg->pgUpdateDataArray($pg->table_signs, $oldList, ['sign_id' => $pgListIdOld]);
            } else {
                return false;
            }
        } else {
            echo "Missing argument - list";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgAlbumsUpdate($pgAlbumsUpdate)
    {
        //print_r($pgListUpdate);
        if (!empty($pgAlbumsUpdate['owner_id'] and !empty($pgAlbumsUpdate['title']))) {
            $pg = new PostgreSQL();
            // TODO: поставить проверку значений access
            $pgAlbumIdOld = $this->pgAlbumToAlbumId($pgAlbumsUpdate);
            if (!empty($pgAlbumsUpdate['new_title'])) {
                $pgAlbumsUpdate['title'] = $this->safetyTagsSlashesTrim32($pgAlbumsUpdate['new_title']);
            } else {
                $pgAlbumsUpdate['title'] = $this->safetyTagsSlashesTrim32($pgAlbumsUpdate['title']);
            }
            $pgAlbumToAlbumId['owner_id'] = $pgAlbumsUpdate['owner_id'];
            $pgAlbumToAlbumId['title'] = $pgAlbumsUpdate['new_title'];
            $pgAlbumId = $this->pgAlbumToAlbumId($pgAlbumToAlbumId);
            //echo "\n pgListUpdate pgListToListId\n";
            //print_r($pgListId);
            $oldAlbum = $pg->pgOneDataByColumn([
                'table' => $pg->table_albums,
                'find_column' => 'album_id',
                'find_value' => $pgAlbumId]);
            //echo "\n pgListUpdate oldList\n";
            //print_r($oldList);
            // Только если у пользователя нет такого листа
            if (empty($pgAlbumId)) { // TODO:??? Why
                //$newList[$this->type] = $this->list;
                //$newList['sign_id'] = $pgListId;
                $oldAlbum['title'] = $pgAlbumsUpdate['title'];
                $oldAlbum['access'] = $pgAlbumsUpdate['access'];
                $oldAlbum['cover'] = $pgAlbumsUpdate['cover'];
                //$newList['owner_id'] = $pgListUpdate['user_id'];
                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                //$this->addToSigns($newList);
                //echo "\n pgListUpdate oldList\n";
                //print_r($oldList);
                $this->pgSetAccessAlbumFriends($oldAlbum);
                return $pg->pgUpdateDataArray($pg->table_albums, $oldAlbum, ['album_id' => $pgAlbumIdOld]);

                //echo "\n pgListUpdate pgUpdateDataArray\n";
                //print_r($res);
                //return $res;
            } elseif (!empty($pgAlbumsUpdate['access'])) { // TODO: Duble
                $oldAlbum['title'] = $pgAlbumsUpdate['title'];
                $oldAlbum['access'] = $pgAlbumsUpdate['access'];
                $oldAlbum['cover'] = $pgAlbumsUpdate['cover'];
                //$newList['owner_id'] = $pgListUpdate['user_id'];
                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                //$this->addToSigns($newList);
                //echo "\n pgListUpdate oldList\n";
                //print_r($oldList);
                $this->pgSetAccessAlbumFriends($oldAlbum);

                return $pg->pgUpdateDataArray($pg->table_albums, $oldAlbum, ['album_id' => $pgAlbumIdOld]);
            } else {
                return false;
            }
        } else {
            echo "Missing argument - title";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgAlbumsDelete($pgAlbumsDelete)
    {
        //print_r($pgListUpdate);
        if (!empty($pgAlbumsDelete['owner_id'] and !empty($pgAlbumsDelete['title']))) {
            $pg = new PostgreSQL();
            // TODO: поставить проверку значений access
            $pgAlbumId = $this->pgAlbumToAlbumId($pgAlbumsDelete);
            $oldAlbum = $pg->pgOneDataByColumn([
                'table' => $pg->table_albums,
                'find_column' => 'album_id',
                'find_value' => $pgAlbumId]);
            if ($pgAlbumsDelete['owner_id'] == $oldAlbum['owner_id']) {
                return $pg->pgDelete($pg->table_albums, 'album_id', $pgAlbumId);
            } else {
                return 'You ar not owner';
            }
        } else {
            echo "Missing argument - title";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgServiceCreate($pgServiceCreate)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgServiceCreate['owner_id']) && !empty($pgServiceCreate['service_id'])) {
            $resService = $this->pgServiceCheckUser($pgServiceCreate);
            //print_r($pgAlbumId);
            // Только если у пользователя нет такого Service
            if (empty($resService)) {

                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                //$pg = new PostgreSQL();
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                $this->addToService($pgServiceCreate);
                return $pgServiceCreate['service_id'];
            } else {
                return $resService;
            }
        } else {
            echo "Missing argument - service_id";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgEssenceCreate($pgEssenceCreate)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgEssenceCreate['owner_id']) && !empty($pgEssenceCreate['essence_id'])) {
            $resEssence = $this->pgEssenceCheckUser($pgEssenceCreate);
            //print_r($pgAlbumId);
            // Только если у пользователя нет такого Service
            if (empty($resEssence)) {
                //if (!empty($pgListCreate[$this->imageBrand])) $newList[$this->imageBrand] = $pgListCreate[$this->imageBrand];
                //$pg = new PostgreSQL();
                //$res = $this->pgAddData($pg->getTableSign(), $newList);
                $this->addToEssence($pgEssenceCreate);
                return $pgEssenceCreate['essence_id'];
            } else {
                return $resEssence;
            }
        } else {
            echo "Missing argument - essence_id";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgServiceDelete($pgServiceDelete)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgServiceDelete['owner_id']) && !empty($pgServiceDelete['service_id'])) {
            $resService = $this->pgServiceCheckUser($pgServiceDelete);
            //print_r($resService);
            // Только если у пользователя Yes Service
            if (!empty($resService)) {
                $pg = new PostgreSQL();
                return $pg->pgDelete('users_service', 'users_service_id', $resService['users_service_id']);
                //return $pgServiceDelete['service_id'];
            } else {
                return false;
            }
        } else {
            echo "Missing argument - service_id";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgServiceCheckUser($pgServiceCheckUser)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgServiceCheckUser['owner_id']) && !empty($pgServiceCheckUser['service_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column(
                ['table' => 'users_service',
                    'find_column' => 'owner_id',
                    'find_value' => $pgServiceCheckUser['owner_id'],
                    'find_column2' => 'service_id',
                    'find_value2' => $pgServiceCheckUser['service_id']]);
        } else {
            echo "Missing argument - service_id";
            return false;
        }
    }

    public function pgEssenceCheckUser($pgEssenceCheckUser)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgEssenceCheckUser['owner_id']) && !empty($pgEssenceCheckUser['essence_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column(
                ['table' => 'users_essences',
                    'find_column' => 'owner_id',
                    'find_value' => $pgEssenceCheckUser['owner_id'],
                    'find_column2' => 'essence_id',
                    'find_value2' => $pgEssenceCheckUser['essence_id']]);
        } else {
            echo "Missing argument - essence_id";
            return false;
        }
    }

    public function pgTalentCreate($pgTalentCreate)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgTalentCreate['owner_id']) && !empty($pgTalentCreate['talent_id'])) {
            $resTalent = $this->pgTalentCheckUser($pgTalentCreate);
            //print_r($pgAlbumId);
            // Только если у пользователя нет такого Talent
            if (empty($resTalent)) {
                $this->addToTalent($pgTalentCreate);
                return $pgTalentCreate['talent_id'];
            } else {
                return $resTalent;
            }
        } else {
            echo "Missing argument - service_id";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgTalentDelete($pgTalentDelete)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgTalentDelete['owner_id']) && !empty($pgTalentDelete['talent_id'])) {
            $resTalent = $this->pgTalentCheckUser($pgTalentDelete);
            //print_r($resTalent);
            // Только если у пользователя Yes Talent
            if (!empty($resTalent)) {
                $pg = new PostgreSQL();
                return $pg->pgDelete('users_talents', 'users_talent_id', $resTalent['users_talent_id']);
                //return $pgServiceDelete['service_id'];
            } else {
                return false;
            }
        } else {
            echo "Missing argument - talent_id";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgTalentCheckUser($pgTalentCheckUser)
    {
        //print_r($pgAlbumCreate);
        if (!empty($pgTalentCheckUser['owner_id']) && !empty($pgTalentCheckUser['talent_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column(
                ['table' => 'users_talents',
                    'find_column' => 'owner_id',
                    'find_value' => $pgTalentCheckUser['owner_id'],
                    'find_column2' => 'talent_id',
                    'find_value2' => $pgTalentCheckUser['talent_id']]);
        } else {
            echo "Missing argument - talent_id";
            return false;
        }
    }

    public function cbListToListId($cbListToListId) // TODO: remove
    {
        //echo "\r\n<hr><b>cbListToListId</b><br>";
        //var_dump($cbListToListId);
        if (!empty($cbListToListId[$this->userId]) && !empty($cbListToListId[$this->list])) {
            $cbListToListId[$this->list] = $this->safetyTagsSlashesTrim32($cbListToListId[$this->list]);
            $this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => $cbListToListId[$this->userId] . $cbListToListId[$this->list],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            $bucket = $this->autoConnectToBucket(["bucket" => "properties"]);
            $query = CouchbaseViewQuery::from("list", 'listId')->key([$cbListToListId[$this->userId], $cbListToListId[$this->list]])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                //$res = $bucket->query($query);
                /*$res = $bucket->query($query);
                $convRes = $this->ConvParseData($res);*/
                $res = $this->ConvParseData($bucket->query($query));
                //echo "<br>res: ";
                //print_r($res);
                //return $res["rows"][0]["id"];
                return $res["rows"][0]["id"];
            } catch (Exception $e) {
                return false;
            }
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            //echo '!empty($cbListToListId[\'userid\']) && !empty($cbListToListId[\'list\']';
            return false;
        }
    }

    public function pgListToListId($pgListToListId)
    {
        //echo "\r\n<hr><b>cbListToListId</b><br>";
        //var_dump($cbListToListId);
        if (!empty($pgListToListId['user_id']) && !empty($pgListToListId[$this->list])) {
            $pgListToListId[$this->list] = $this->safetyTagsSlashesTrim32($pgListToListId[$this->list]);
            /*$this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => $pgListToListId[$this->userId] . $pgListToListId[$this->list],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            $pg = new PostgreSQL();
            $res = $pg->pgOneDataBy2Column([
                'table' => $pg->getTableSigns(),
                'find_column' => 'owner_id',
                'find_value' => $pgListToListId['user_id'],
                'find_column2' => 'title',
                'find_value2' => $pgListToListId[$this->list]]);
            return $res['sign_id'];
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            //echo '!empty($cbListToListId[\'userid\']) && !empty($cbListToListId[\'list\']';
            return false;
        }
    }

    public function pgAlbumToAlbumId($pgAlbumToAlbumId)
    {
        //echo "\r\n<hr><b>pgAlbumToAlbumId</b><br>";
        //var_dump($pgAlbumToAlbumId);
        if (!empty($pgAlbumToAlbumId['owner_id']) && !empty($pgAlbumToAlbumId['title'])) {
            $pgAlbumToAlbumId['title'] = $this->safetyTagsSlashesTrim32($pgAlbumToAlbumId['title']);
            /*$this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => $pgListToListId[$this->userId] . $pgListToListId[$this->list],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            $pg = new PostgreSQL();
            $res = $pg->pgOneDataBy2Column([
                'table' => $pg->table_albums,
                'find_column' => 'owner_id',
                'find_value' => $pgAlbumToAlbumId['owner_id'],
                'find_column2' => 'title',
                'find_value2' => $pgAlbumToAlbumId['title']]);
            return $res['album_id'];
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            //echo '!empty($cbListToListId[\'userid\']) && !empty($cbListToListId[\'list\']';
            return false;
        }
    }

    public function pgAlbumInfoByTitle($pgAlbumInfoByTitle)
    {
        //echo "\r\n<hr><b>cbListToListId</b><br>";
        //var_dump($cbListToListId);
        if (!empty($pgAlbumInfoByTitle['owner_id']) && !empty($pgAlbumInfoByTitle['title'])) {
            $pgAlbumInfoByTitle['title'] = $this->safetyTagsSlashesTrim32($pgAlbumInfoByTitle['title']);
            /*$this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => $pgListToListId[$this->userId] . $pgListToListId[$this->list],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            $pg = new PostgreSQL();
            $res = $pg->pgOneDataBy2Column([
                'table' => $pg->table_albums,
                'find_column' => 'owner_id',
                'find_value' => $pgAlbumInfoByTitle['owner_id'],
                'find_column2' => 'title',
                'find_value2' => $pgAlbumInfoByTitle['title']]);
            return $res;
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            //echo '!empty($cbListToListId[\'userid\']) && !empty($cbListToListId[\'list\']';
            return false;
        }
    }

    public function pgAlbumInfoById($pgAlbumInfoById)
    {
        //echo "\r\n<hr><b>cbListToListId</b><br>";
        //var_dump($cbListToListId);
        if (!empty($pgAlbumInfoById['owner_id']) && !empty($pgAlbumInfoById['album_id'])) {
            $pg = new PostgreSQL();
            $res = $pg->pgOneDataBy2Column([
                'table' => $pg->table_albums,
                'find_column' => 'owner_id',
                'find_value' => $pgAlbumInfoById['owner_id'],
                'find_column2' => 'album_id',
                'find_value2' => $pgAlbumInfoById['album_id']]);
            return $res;
        } else {
            return false;
        }
    }

    public function ParseFileNoShare($ParseFileNoShare)
        /*
    Слабое место
    */
    {
        if (!empty($ParseFileNoShare['file'])) {
            $FindFileId = new parseQuery('File');
            $FindFileId->where('File', $ParseFileNoShare['file']);
            $ConvParseData = $this->ConvParseData($FindFileId->find());
            // ВАЖНОЕ условие - если пользователь владелец файлаы
            if ($ConvParseData['results']['0']['OwnerId'] == $ParseFileNoShare['userid']) {
                $url = "https://api.parse.com/1/classes/File/" . $ConvParseData['results']['0']['objectId'];
                $handle = curl_init($url);
                curl_setopt($handle, CURLOPT_TIMEOUT, 30);
                //curl_setopt($handle, CURLOPT_USERAGENT, 'parse.com-php-library/2.0');
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($handle, CURLINFO_HEADER_OUT, true);
                curl_setopt($handle, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-Parse-Application-Id: JC1kgjApgkMHgZxGPQnAUq64d5NSLlYUsS3oqd36',
                    'X-Parse-REST-API-Key: B3hRzM6Mhd1rux2yDkHaJplL5MuBadR8BApPtVAD'
                ));
                $params = array(
                    'ListId' => array(
                        '__op' => 'Delete'
                    )
                );
                $postData = json_encode($params);
                curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
                $response = curl_exec($handle);
                $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $getData = json_decode($response, true);

                // Удалить ListId в таблице FileCountShow
                $FindFileCountShowId = new parseQuery('FileCountShow');
                $FindFileCountShowId->where('File', $ParseFileNoShare['file']);
                $ConvParseDataCountShow = $this->ConvParseData($FindFileCountShowId->find());
                $urlCountShow = "https://api.parse.com/1/classes/FileCountShow/" . $ConvParseDataCountShow['results']['0']['objectId'];
                $handleCountShow = curl_init($urlCountShow);
                curl_setopt($handleCountShow, CURLOPT_TIMEOUT, 30);
                //curl_setopt($handleCountShow, CURLOPT_USERAGENT, 'parse.com-php-library/2.0');
                curl_setopt($handleCountShow, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handleCountShow, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($handleCountShow, CURLINFO_HEADER_OUT, true);
                curl_setopt($handleCountShow, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-Parse-Application-Id: JC1kgjApgkMHgZxGPQnAUq64d5NSLlYUsS3oqd36',
                    'X-Parse-REST-API-Key: B3hRzM6Mhd1rux2yDkHaJplL5MuBadR8BApPtVAD'
                ));
                $params = array(
                    'ListId' => array(
                        '__op' => 'Delete'
                    )
                );
                $postData = json_encode($params);
                curl_setopt($handleCountShow, CURLOPT_POSTFIELDS, $postData);
                $response = curl_exec($handleCountShow);
                $httpCode = curl_getinfo($handleCountShow, CURLINFO_HTTP_CODE);
                curl_close($handle);
                echo "File no share: " . $getData['updatedAt'];
            } else {
                //echo "This is not your file " . $ParseFileNoShare['userid'] . " Id";
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function ParseFileDeleteInbox($ParseFileDeleteInbox)
    {
        if (!empty($ParseFileDeleteInbox['objectId'])) {
            $FindFileId = new parseQuery('FileActivity');
            $FindFileId->where('objectId', $ParseFileDeleteInbox['objectId']);
            $ConvParseData = $this->ConvParseData($FindFileId->find());
            // ВАЖНОЕ условие - если файл адресован пользователю
            if ($ConvParseData['results']['0']['ToUserId'] == $ParseFileDeleteInbox['userid']) {
                // Запись идентификатора списка из List
                $DeletedFileActivity = new parseObject('DeletedFileActivity');
                $DeletedFileActivity->File = $ConvParseData['results']['0']['File'];
                $DeletedFileActivity->FromUserId = $ConvParseData['results']['0']['FromUserId'];
                $DeletedFileActivity->ToUserId = $ConvParseData['results']['0']['ToUserId'];
                $DeletedFileActivity->Message = $ConvParseData['results']['0']['Message'];
                $DeletedFileActivity->Subject = $ConvParseData['results']['0']['Subject'];
                $DeletedFileActivity->Read = $ConvParseData['results']['0']['Read'];
                $DeletedFileActivity->FromUserName = $ConvParseData['results']['0']['FromUserName'];
                $DeletedFileActivity->ToUserName = $ConvParseData['results']['0']['ToUserName'];
                $DeletedFileActivity->MessageId = $ConvParseData['results']['0']['objectId'];
                $DeletedFileActivity->save();

                $url = "https://api.parse.com/1/classes/FileActivity/" . $ConvParseData['results']['0']['objectId'];
                $handle = curl_init($url);
                curl_setopt($handle, CURLOPT_TIMEOUT, 30);
                //curl_setopt($handle, CURLOPT_USERAGENT, 'parse.com-php-library/2.0');
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($handle, CURLINFO_HEADER_OUT, true);
                curl_setopt($handle, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-Parse-Application-Id: JC1kgjApgkMHgZxGPQnAUq64d5NSLlYUsS3oqd36',
                    'X-Parse-REST-API-Key: B3hRzM6Mhd1rux2yDkHaJplL5MuBadR8BApPtVAD'
                ));
                $params = array(
                    'ToUserId' => array(
                        '__op' => 'Delete'
                    )
                );
                $postData = json_encode($params);
                curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
                $response = curl_exec($handle);
                $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $getData = json_decode($response, true);
                // Стереть предвыборку из кэша
                $this->CacheInboxDel(array('userid' => $ParseFileDeleteInbox['userid']
                ));
                echo "File delete: " . $getData['updatedAt'];
            } else {
                echo "This is not your file " . $ParseFileDeleteInbox['userid'] . " Id";
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - objectId";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbFileDeleteInbox($cbFileDeleteInbox)
    {
        if (!empty($cbFileDeleteInbox['messageid'])) {
            $oldDoc = $this->cbGet($this->autoConnectToBucket(["bucket" => "file"]), $cbFileDeleteInbox['messageid']);
            // ВАЖНОЕ условие - если файл адресован пользователю
            if ($oldDoc["toUserId"] == $cbFileDeleteInbox['userid']) {
                // Сделать копию документа
                $delDoc = $oldDoc;
                $delDoc[$this->type] = $this->deletedFileActivity;
                // TODO: Что делать если удалён fromUserId? что показывать в строке "от кого", oldFromUserId?
                $delDoc[$this->oldFromUserId] = $delDoc[$this->fromUserId]; // Это чтобы не светилось и у отправителя в удалённых
                if (isset($delDoc["docId"])) unset ($delDoc["docId"]);
                if (isset($delDoc["fromUserId"])) unset ($delDoc["fromUserId"]);
                // Записать копию документа в DeletedFileActivity
                $this->cbSetDocument($delDoc, ["bucket" => "file"]);
                // Стереть toUserId из fileActivity
                if (isset($oldDoc["toUserId"])) unset ($oldDoc["toUserId"]);
                // Перезаписать документ в FileActivity
                return $this->cbRebuildDocument($oldDoc, ["bucket" => "file"]);
            } else {
                echo "Wrong file or user";
                header('Location: https://vide.me/VictorLustig.html');
                return false;
            }
        } else {
            echo "Missing argument - messageid";
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function ParseFileDeleteSent($ParseFileDeleteSent) // ready
    {
        if (!empty($ParseFileDeleteSent['objectId'])) {
            $FindFileId = new parseQuery('FileActivity');
            $FindFileId->where('objectId', $ParseFileDeleteSent['objectId']);
            $ConvParseData = $this->ConvParseData($FindFileId->find());
            // ВАЖНОЕ условие - если файл адресован пользователю
            if ($ConvParseData['results']['0']['FromUserId'] == $ParseFileDeleteSent['userid']) {
                // Запись идентификатора списка из List
                $DeletedFileActivity = new parseObject('DeletedFileActivity');
                $DeletedFileActivity->File = $ConvParseData['results']['0']['File'];
                $DeletedFileActivity->FromUserId = $ConvParseData['results']['0']['FromUserId'];
                $DeletedFileActivity->ToUserId = $ConvParseData['results']['0']['ToUserId'];
                $DeletedFileActivity->Message = $ConvParseData['results']['0']['Message'];
                $DeletedFileActivity->Subject = $ConvParseData['results']['0']['Subject'];
                $DeletedFileActivity->Read = $ConvParseData['results']['0']['Read'];
                $DeletedFileActivity->FromUserName = $ConvParseData['results']['0']['FromUserName'];
                $DeletedFileActivity->ToUserName = $ConvParseData['results']['0']['ToUserName'];
                $DeletedFileActivity->MessageId = $ConvParseData['results']['0']['objectId'];
                $DeletedFileActivity->save();

                $url = "https://api.parse.com/1/classes/FileActivity/" . $ConvParseData['results']['0']['objectId'];
                $handle = curl_init($url);
                curl_setopt($handle, CURLOPT_TIMEOUT, 30);
                //curl_setopt($handle, CURLOPT_USERAGENT, 'parse.com-php-library/2.0');
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($handle, CURLINFO_HEADER_OUT, true);
                curl_setopt($handle, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-Parse-Application-Id: JC1kgjApgkMHgZxGPQnAUq64d5NSLlYUsS3oqd36',
                    'X-Parse-REST-API-Key: B3hRzM6Mhd1rux2yDkHaJplL5MuBadR8BApPtVAD'
                ));
                $params = array(
                    'FromUserId' => array(
                        '__op' => 'Delete'
                    )
                );
                $postData = json_encode($params);
                curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
                $response = curl_exec($handle);
                $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $getData = json_decode($response, true);
                // Стереть предвыборку из кэша
                $this->CacheSentDel(array('userid' => $ParseFileDeleteSent['userid']
                ));
                echo "File delete: " . $getData['updatedAt'];
            } else {
                echo "This is not your file " . $ParseFileDeleteSent['userid'] . " Id";
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbFileDeleteSent($cbFileDeleteSent)
    {
        if (!empty($cbFileDeleteSent['messageid'])) {
            $oldDoc = $this->cbGet($this->autoConnectToBucket(["bucket" => "file"]), $cbFileDeleteSent['messageid']);
            // ВАЖНОЕ условие - если файл адресован пользователю
            if ($oldDoc["fromUserId"] == $cbFileDeleteSent['userid']) {
                // Сделать копию документа
                $delDoc = $oldDoc;
                $delDoc[$this->type] = $this->deletedFileActivity;
                // TODO: Что делать если удалён fromUserId? что показывать в строке "от кого", oldToUserId?
                $delDoc[$this->oldToUserId] = $delDoc[$this->toUserId]; // Это чтобы не светилось и у получателя в удалённых
                if (isset($delDoc["docId"])) unset ($delDoc["docId"]);
                if (isset($delDoc["toUserId"])) unset ($delDoc["toUserId"]);
                // Записать копию документа в DeletedFileActivity
                $res = $this->cbSetDocument($delDoc, ["bucket" => "file"]);
                // Стереть fromUserId из fileActivity
                if (isset($oldDoc["fromUserId"])) unset ($oldDoc["fromUserId"]);
                // Перезаписать документ в FileActivity
                //===return $this->cbRebuildDocument($oldDoc, ["bucket" => "file"]);
                return $res;
            } else {
                echo "Wrong file or user";
                //header('Location: https://vide.me/VictorLustig.html');
                return false;
            }
        } else {
            echo "Missing argument - messageid";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    /*
    Слабое место
    */

    public function CacheSentDel($CacheSentDel)
    {
        if (!empty($CacheSentDel['userid'])) {
            $url = "http://vide-cache-sent.herokuapp.com/file/sent/del?t=" . $CacheSentDel['userid'];
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_TIMEOUT, 30);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_HEADER, false);
            curl_exec($handle);
            curl_close($handle);
        }
    }

    public function ParseFileDelete($ParseFileDelete)
    {
        if (!empty($ParseFileDelete['file'])) {
            $FindFileId = new parseQuery('File');
            $FindFileId->where('File', $ParseFileDelete['file']);
            $ConvParseData = $this->ConvParseData($FindFileId->find());
            // ВАЖНОЕ условие - если пользователь владелец файлаы
            if ($ConvParseData['results']['0']['OwnerId'] == $ParseFileDelete['userid']) {
                // Удаляем видео
                try {
                    $client = new Rackspace(RACKSPACE_US, array(
                        'username' => 'kozlov',
                        'apiKey' => '1e6647c9825a59e5a1cb11ba09fefc98'
                    ));
                    $service = $client->objectStoreService('cloudFiles', 'DFW');
                    $container = $service->getContainer('vide');
                    $object = $container->getObject($ParseFileDelete['file'] . ".mp4");
                    $NewFileName = md5(rand());
                    $object->copy('/DeletedFile/' . $NewFileName . '.mp4');
                    $object->delete();
                } catch (Exception $e) {
                    //echo 'No file. '.$e;
                    echo "No file. ";
                }
                // Удаляем картинку
                try {
                    $clientJPG = new Rackspace(RACKSPACE_US, array(
                        'username' => 'kozlov',
                        'apiKey' => '1e6647c9825a59e5a1cb11ba09fefc98'
                    ));
                    $serviceJPG = $clientJPG->objectStoreService('cloudFiles', 'DFW');
                    $containerJPG = $serviceJPG->getContainer('jpg');
                    $objectJPG = $containerJPG->getObject($ParseFileDelete['file'] . ".jpg");
                    $objectJPG->copy('/DeletedJPG/' . $NewFileName . '.jpg');
                    $objectJPG->delete();
                } catch (Exception $e) {
                    //echo 'No file. '.$e;
                    echo "No file. ";
                }

                $DeletedFileActivity = new parseObject('DeletedFile');
                $DeletedFileActivity->File = $ConvParseData['results']['0']['File'];
                $DeletedFileActivity->FromUserId = $ConvParseData['results']['0']['OwnerId'];
                $DeletedFileActivity->FileId = $ConvParseData['results']['0']['objectId'];
                $DeletedFileActivity->NewFileName = $NewFileName;
                $DeletedFileActivity->save();

                $url = "https://api.parse.com/1/classes/File/" . $ConvParseData['results']['0']['objectId'];
                $handle = curl_init($url);
                curl_setopt($handle, CURLOPT_TIMEOUT, 30);
                //curl_setopt($handle, CURLOPT_USERAGENT, 'parse.com-php-library/2.0');
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($handle, CURLINFO_HEADER_OUT, true);
                curl_setopt($handle, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-Parse-Application-Id: JC1kgjApgkMHgZxGPQnAUq64d5NSLlYUsS3oqd36',
                    'X-Parse-REST-API-Key: B3hRzM6Mhd1rux2yDkHaJplL5MuBadR8BApPtVAD'
                ));
                $params = array(
                    'OwnerId' => array(
                        '__op' => 'Delete'
                    )
                );
                $postData = json_encode($params);
                curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
                $response = curl_exec($handle);
                $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $getData = json_decode($response, true);
                // Удалить запись в таблице FileCountShow
                $FindFileCountShow = new parseQuery('FileCountShow');
                $FindFileCountShow->where('File', $ParseFileDelete['file']);
                $ConvParseDataCountShow = $this->ConvParseData($FindFileCountShow->find());
                $FileCountShowRemove = new parseObject('FileCountShow');
                $FileCountShowRemove->delete($ConvParseDataCountShow['results']['0']['objectId']);

                // Стереть предвыборку из кэша
                $this->CacheSentDel(array('userid' => $ParseFileDelete['userid']
                ));
                $this->CacheMyDel(array('userid' => $ParseFileDelete['userid']
                ));
                echo "File " . $ParseFileDelete['file'] . "file was removed at " . $getData['updatedAt'];
            } else {
                echo "This is not your file " . $ParseFileDelete['userid'] . " Id, file " . $ParseFileDelete['file'];
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function CacheMyDel($CacheMyDel)
    {
        if (!empty($CacheMyDel['userid'])) {
            $url = "http://vide-cache-my.herokuapp.com/file/my/del?t=" . $CacheMyDel['userid'];
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_TIMEOUT, 30);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_HEADER, false);
            curl_exec($handle);
            curl_close($handle);
        }
    }

    public function cbFileDelete($cbFileDelete)
    {
        if (!empty($cbFileDelete['file'])) {
            /*
            $FindFileId = new parseQuery('File');
            $FindFileId->where('File', $cbFileDelete['file']);
            $ConvParseData = $this->ConvParseData($FindFileId->find());
            // ВАЖНОЕ условие - если пользователь владелец файлаы*/

            $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
            $query = CouchbaseViewQuery::from("file", 'fileOwner')->key($cbFileDelete['file'])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                $res = $bucket->query($query);
            } catch (Exception $e) {
                //return false;
            }
            //$res2 = $this->ConvParseData($res);
            print_r($res["rows"][0]["value"]["ownerId"]);
            print_r($res["rows"][0]["value"]["ownerId"]);
            //echo $res2["rows"]["0"]["ownerId"];
            //echo $res2["rows"];
//exit;
            if ($res["rows"][0]["value"]["ownerId"] == $cbFileDelete['userId']) {
                unset($res["rows"][0]["value"]["ownerId"]);
                print_r($res);
                // Удаляем видео

                /*                try {
                                    $client = new Rackspace(RACKSPACE_US, array(
                                        'username' => 'kozlov',
                                        'apiKey'   => '1e6647c9825a59e5a1cb11ba09fefc98'
                                    ));
                                    $service = $client->objectStoreService('cloudFiles', 'DFW');
                                    $container = $service->getContainer('vide');
                                    $object = $container->getObject($cbFileDelete['file'] . ".mp4");
                                    $NewFileName = md5(rand());
                                    $object->copy('/DeletedFile/' . $NewFileName . '.mp4');
                                    $object->delete();
                                } catch (Exception $e) {
                                    //echo 'No file. '.$e;
                                    echo "No file. ";
                                }
                                // Удаляем картинку
                                try {
                                    $clientJPG = new Rackspace(RACKSPACE_US, array(
                                        'username' => 'kozlov',
                                        'apiKey'   => '1e6647c9825a59e5a1cb11ba09fefc98'
                                    ));
                                    $serviceJPG = $clientJPG->objectStoreService('cloudFiles', 'DFW');
                                    $containerJPG = $serviceJPG->getContainer('jpg');
                                    $objectJPG = $containerJPG->getObject($cbFileDelete['file'] . ".jpg");
                                    $objectJPG->copy('/DeletedJPG/' . $NewFileName . '.jpg');
                                    $objectJPG->delete();
                                } catch (Exception $e) {
                                    //echo 'No file. '.$e;
                                    echo "No file. ";
                                }

                                $DeletedFileActivity = new parseObject('DeletedFile');
                                $DeletedFileActivity->File = $ConvParseData['results']['0']['File'];
                                $DeletedFileActivity->FromUserId = $ConvParseData['results']['0']['OwnerId'];
                                $DeletedFileActivity->FileId = $ConvParseData['results']['0']['objectId'];
                                $DeletedFileActivity->NewFileName = $NewFileName;
                                $DeletedFileActivity->save();

                                $url    = "https://api.parse.com/1/classes/File/" . $ConvParseData['results']['0']['objectId'];
                                $handle = curl_init($url);
                                curl_setopt($handle, CURLOPT_TIMEOUT, 30);
                                //curl_setopt($handle, CURLOPT_USERAGENT, 'parse.com-php-library/2.0');
                                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($handle, CURLINFO_HEADER_OUT, true);
                                curl_setopt($handle, CURLOPT_HTTPHEADER, array(
                                    'Content-Type: application/json',
                                    'X-Parse-Application-Id: JC1kgjApgkMHgZxGPQnAUq64d5NSLlYUsS3oqd36',
                                    'X-Parse-REST-API-Key: B3hRzM6Mhd1rux2yDkHaJplL5MuBadR8BApPtVAD'
                                ));
                                $params = array(
                                    'OwnerId' => array(
                                        '__op' => 'Delete'
                                    )
                                );
                                $postData = json_encode($params);
                                curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
                                $response = curl_exec($handle);
                                $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                                curl_close($handle);
                                $getData = json_decode($response, true);
                                // Удалить запись в таблице FileCountShow
                                $FindFileCountShow = new parseQuery('FileCountShow');
                                $FindFileCountShow->where('File', $cbFileDelete['file']);
                                $ConvParseDataCountShow = $this->ConvParseData($FindFileCountShow->find());
                                $FileCountShowRemove = new parseObject('FileCountShow');
                                $FileCountShowRemove->delete($ConvParseDataCountShow['results']['0']['objectId']);

                                // Стереть предвыборку из кэша
                                $this->CacheSentDel(array('userid'  => $cbFileDelete['userid']
                                ));
                                $this->CacheMyDel(array('userid'  => $cbFileDelete['userid']
                                ));
                                echo "File " . $cbFileDelete['file'] . "file was removed at " . $getData['updatedAt'];*/
            } else {
                echo "This is not your file. You id: " . $cbFileDelete['userId'] . " , ownerId: " . $res["rows"][0]["value"]["ownerId"] . " file " . $cbFileDelete['file'];
                //header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "Missing argument - file";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    // Ready

    public function ParseListIdToList($ParseListIdToList)
    {
        if (!empty($ParseListIdToList['listid'])) {
            $FindList = new parseQuery('List');
            $FindList->where('objectId', $ParseListIdToList['listid']);
            $ConvParseData = $this->ConvParseData($FindList->find());
            return $ConvParseData;
        } else {
            echo "Missing argument - listid";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

// Ready

    public function ParseListRemove($ParseListRemove)
    {
        if (!empty($ParseListRemove['list']) && !empty($ParseListRemove['userid'])) {
            $ParseListRemove['listid'] = $this->ParseListToListId($ParseListRemove);
            // Проверить есть ли у пользователя такой лист
            if (!empty($ParseListRemove['listid'])) {
                // Списка пользователя найден
                // Узнать сколько фалов у пользователя в удаляемом листе
                $ParseData = $this->ParseFileSpringShow($ParseListRemove);
                $ConvParseData = $this->ConvParseData($ParseData);
                // Если в листе нет файлов
                if (sizeof($ConvParseData['results']) < 1) {
                    $ListRemove = new parseObject('List');
                    return $ListRemove->delete($ParseListRemove['listid']);
                } else {
                    echo "List <b>" . $ParseListRemove['list'] . "</b> contains " . sizeof($ConvParseData['results']) . " files.";
                }
            } else {
                echo "-----> List NOT found";
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "-----> Param list empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbListRemove($cbListRemove)
    {
        if (!empty($cbListRemove[$this->list]) && !empty($cbListRemove[$this->userId])) {
            $cbListRemove[$this->listId] = $this->cbListToListId($cbListRemove);
            // Проверить есть ли у пользователя такой лист
            if (!empty($cbListRemove[$this->listId])) {
                $bucketProperties = $this->autoConnectToBucket(["bucket" => "properties"]);
                return $this->cbRemove($bucketProperties, $cbListRemove[$this->listId]);
            } else {
                echo "-----> List NOT found";
                header('Location: https://vide.me/VictorLustig.html');
                return false;
            }
        } else {
            echo "-----> Param list empty";
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function ParseFileSpringShow($ParseFileSpringShow) // ready
    {
        if (!empty($ParseFileSpringShow['userid'])) {
            $FindShareFile = new parseQuery('File');
            $FindShareFile->where('OwnerId', $ParseFileSpringShow['userid']);
            $FindShareFile->orderByDescending('createdAt');
            $FindShareFile->setLimit(500);
            if (!empty($ParseFileSpringShow['listid'])) {
                $FindShareFile->where('ListId', $ParseFileSpringShow['listid']);
            } else {
                $FindShareFile->whereExists('ListId');
            }
            return $FindShareFile->find();
        } else {
            echo "Missing argument - userid";
            //header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbFileSpringShow($cbFileSpringShow)
    {
        //var_dump($cbFileSpringShow);
        if (!empty($cbFileSpringShow[$this->userId])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
            $query = CouchbaseViewQuery::from("file", 'spring')->key($cbFileSpringShow[$this->userId])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE)->limit($cbFileSpringShow[$this->limit]);
            try {
                $res = $bucket->query($query);
                //return $res["rows"];
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            return false;
        }
    }

    public function pgUserPostShow($pgUserPostShow)
    {
        //echo "\r\npgUserPostShow\n";
        //print_r($pgUserPostShow);
        if (!empty($pgUserPostShow['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgDataByColumn([
                'table' => $pg->table_posts,
                'find_column' => 'owner_id',
                'find_value' => $pgUserPostShow['user_id']]);
        } else {
            echo "No user_id";
            return false;
        }
    }

    public function cbSearchArticle($cbSearchArticle)
    {
        if (!empty($cbSearchArticle['q'])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "article"]);
            $query = CouchbaseN1qlQuery::fromString("
                SELECT META(t).id, t.title, t.createdAt, t.updatedAt, t.userDisplayName, t.`cover`, t.category, t.tags
                FROM `article` t 
                WHERE type='article' 
                AND status='published' 
                AND ANY v IN body SATISFIES v.text LIKE '%" . $cbSearchArticle['q'] . "%' 
                END LIMIT " . $cbSearchArticle[$this->limit] . ";");
            $query->namedParams(array('limit' => 9));
            try {
                return $bucket->query($query);
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function pgSearchByTag($pgSearchByTag)
    {
        if (!empty($pgSearchByTag['q'])) {
            $pg = new PostgreSQL();
            return $pg->pgSearchItemByTag($pgSearchByTag);
        } else {
            //echo 'No q';
            return false;
        }
    }

    public function pgSearchItemByText($pgSearchItemByText)
    {
        if (!empty($pgSearchItemByText['q'])) {
            $pg = new PostgreSQL();
            return $pg->pgSearchItemByText($pgSearchItemByText);
        } else {
            //echo 'No q';
            return false;
        }
    }

    public function pgSearchItemByTextV3($pgSearchItemByText)
    {
        if (!empty($pgSearchItemByText['q'])) {
            $pg = new PostgreSQL();
            return $pg->pgSearchItemByTextV3($pgSearchItemByText);
        } else {
            //echo 'No q';
            return false;
        }
    }

    public function pgSearchItemByTextV4($pgSearchItemByTextV4, $searchParam)
    {
        if (!empty($pgSearchItemByTextV4['q'])) {
            $pg = new PostgreSQL();
            $request = $pgSearchItemByTextV4['q'];
            /*echo "\n\r----------------------------------------\n\r";
            echo "\n\rrequest\n\r";
            echo $request;
            echo "\n\r----------------------------------------\n\r";*/
            $roReq = preg_replace('/\s+/', ' ', $pgSearchItemByTextV4['q']);
            /*echo "\n\r----------------------------------------\n\r";
            echo "\n\rrequest\n\r";
            echo $request;
            echo "\n\r----------------------------------------\n\r";*/
            //$cuteRequest = $this->limit_text($request, 4);
            $cuteRequest = $this->limit_text($roReq, 4);
            //$cuteRequest = $this->limit_text($request, 16);
            /*echo "\n\rlimit_text\n\r";
            print_r($cuteRequest);
            echo "\n\r----------------------------------------\n\r";*/
            //$TempRequestExplode = explode(' ', $cuteRequest, 4);
            //$filterRequest = array_filter($TempRequestExplode, [$this,"safetyTagsSlashesTrim32"]);
            $requestExplode = explode(' ', $cuteRequest, 4);
            /*echo "\n\rrequestExplode\n\r";
            print_r($requestExplode);
            echo "\n\r----------------------------------------\n\r";*/
            //$requestExplode = explode(' ', $filterRequest, 4);
            //$requestExplode = array_filter($TempRequestExplode);
            /*$requestExplode = array_filter($requestExplode);
            echo "\n\rrequestExplode\n\r";
            print_r($requestExplode);
            echo "\n\r----------------------------------------\n\r";
            echo "\n\rcount requestExplode\n\r";
            print_r(count($requestExplode));
            echo "\n\r----------------------------------------\n\r";*/
            switch (count($requestExplode)) {
                case 0:
                    exit ("0");
                    break;
                case 1:
                    //echo "i равно 1";
                    $res = $pg->pgFullTextSearchItemByTextV4_1W($requestExplode, $searchParam);
                    break;
                case 2:
                    //echo "i равно 2";
                    $res = $pg->pgFullTextSearchItemByTextV4_2W($requestExplode, $searchParam);
                    break;
                case 3:
                    //echo "i равно 2";
                    $res = $pg->pgFullTextSearchItemByTextV4_3W($requestExplode, $searchParam);
                    break;
                case 4:
                    //echo "i равно 2";
                    $res = $pg->pgFullTextSearchItemByTextV4_4W($requestExplode, $searchParam);
                    break;
                default:
                    $res = $pg->pgFullTextSearchItemByTextV4_1W($requestExplode, $searchParam);
            }
            return $res;
        } else {
            //echo 'No q';
            return false;
        }
    }

    public function pgSearchUser($pgSearchUser)
    {
        if (!empty($pgSearchUser['q'])) {
            $pg = new PostgreSQL();
            return $pg->pgSearchUser($pgSearchUser);
        } else {
            //echo 'No q';
            return false;
        }
    }

    public function pgSearchEssences($pgSearchEssences)
    {
        if (!empty($pgSearchEssences['q'])) {
            $pg = new PostgreSQL();
            //return $pg->pgSearchUser($pgSearchEssences);
            return $pg->pgSearchEssences($pgSearchEssences);
        } else {
            //echo 'No q';
            return false;
        }
    }

    public function pgSearchEssencesTitle($pgSearchEssencesTitle)
    {
        if (!empty($pgSearchEssencesTitle['q'])) {
            $pg = new PostgreSQL();
            //return $pg->pgSearchUser($pgSearchEssences);
            return $pg->pgSearchEssencesTitle($pgSearchEssencesTitle);
        } else {
            //echo 'No q';
            return false;
        }
    }
    public function pgSearchEssencesTitleAdd($pgSearchEssencesTitle, $owner_id)
    {
        //if (!empty($pgSearchEssencesTitle['q'])) {
            $pg = new PostgreSQL();
            $pgEssenceCreate['owner_id'] = $owner_id;
            foreach ($pgSearchEssencesTitle as $key => $value) {
             $res = $pg->pgSearchEssencesTitleF($value);
                /*echo ' --- ';
                echo ' key ' . $key;
                echo ' value ' . $value;
                echo ' res ';
                print_r($res);*/
                if (empty($res['essence_id'])) {
                    //echo ' --- new essence --- ';
                    $pgEssenceCreate['essence_id'] = $this->addNewEssence(['title' => $value]);
                } else {
                    //echo ' --- exist essence --- ';
                    $pgEssenceCreate['essence_id'] = $res['essence_id'];
                }
                //echo ' --- $pgEssenceCreate --- ';
                print_r($pgEssenceCreate);
                $this->pgEssenceCreate($pgEssenceCreate);
            }
        /*} else {
            //echo 'No q';
            return false;
        }*/
    }

    public function cbQuery($cbQuery)
    {
        if (!empty($cbQuery['bucket']) and !empty($cbQuery['query'])) {
            $bucket = $this->autoConnectToBucket($cbQuery);
            $query = CouchbaseN1qlQuery::fromString($cbQuery['query']);
            //$query->namedParams(array('limit' => 9));
            try {
                return $bucket->query($query);
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function cbMostPopTags()
    {
        $bucket = $this->autoConnectToBucket(["bucket" => "article"]);
        $query = CouchbaseN1qlQuery::fromString("
                SELECT  tag, SUM(ARRAY_LENGTH(ARRAY v FOR v IN SPLIT(b.text) WHEN v = tag END)) AS cnt
                FROM article AS d
                UNNEST d.tags AS tag
                UNNEST d.body AS b
                WHERE d.type = \"article\" AND tag IS NOT NULL AND b.text IS NOT NULL
                GROUP BY tag
                ORDER BY cnt DESC
                LIMIT 10;");
        $query->namedParams(array('limit' => 9));
        try {
            return $bucket->query($query);
        } catch (Exception $e) {
            return false;
        }

    }

    public function ParseListUpdate($ParseListUpdate)
    {
        if (!empty($ParseListUpdate['list']) && !empty($ParseListUpdate['userid'])) {
            $ParseListUpdate['list'] = $this->safetyTagsSlashesTrim32($ParseListUpdate['list']);
            $ParseListUpdate['listid'] = $this->ParseListToListId($ParseListUpdate);
            // Проверить есть ли у пользователя такой лист
            if (!empty($ParseListUpdate['listid'])) {
                $ListRename = new parseObject('List');
                $ListRename->ListName = $ParseListUpdate['newlist'];
                return $ListRename->update($ParseListUpdate['listid']);
            } else {
                echo "-----> List NOT found";
                header('Location: https://vide.me/VictorLustig.html');
            }
        } else {
            echo "-----> Param list empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

// ready

    public function cbListUpdate($cbListUpdate)
    {
        /*$this->log->setEvent([
            "res" => "stack",
            "type" => "attempt",
            "message" => "set",
            "val" => "list: " . $cbListUpdate['list'] . " newlist " . $cbListUpdate['newlist'],
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);*/
        if (!empty($cbListUpdate[$this->list]) && !empty($cbListUpdate[$this->userId])) {
            $cbListUpdate[$this->list] = $this->safetyTagsSlashesTrim32($cbListUpdate[$this->list]);
            $cbListUpdate[$this->listId] = $this->cbListToListId($cbListUpdate);
            // Только если у пользователя нет такого листа
            //if (empty($cbListId)) { // TODO: Тут нужно проверять или нет?
            $newList[$this->type] = $this->list;
            $newList[$this->docId] = $cbListUpdate[$this->listId];
            $newList[$this->updatedAt] = time();
            $newList[$this->list] = $cbListUpdate['newlist'];
            $newList[$this->ownerId] = $cbListUpdate[$this->userId];
            if (!empty($cbListUpdate[$this->imageBrand])) $newList[$this->imageBrand] = $cbListUpdate[$this->imageBrand];
            return $this->cbUpdateDocument($newList, ["bucket" => "properties"]);
            //} else {
            //    return $cbListId["id"];
            //}
        } else {
            echo "Missing argument - list";
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function ParseShowUserList($ParseShowUserList)
    {
        $FindListId = new parseQuery('List');
        $FindListId->where('OwnerId', $ParseShowUserList['userid']);
        //$this->OutputParseData($FindListId->find());
        return $FindListId->find();
    }

    public function cbShowUserList($cbShowUserList)
    {
        if (!empty($cbShowUserList[$this->userId])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "properties"]);
            $query = CouchbaseViewQuery::from("list", 'ownerId')->key($cbShowUserList[$this->userId])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                $res = $bucket->query($query);
                //return $res["rows"];
                return $res->rows;
            } catch (Exception $e) {
                return false;
            }
        } else {
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowUserList($pgShowUserList)
    {
        if (!empty($pgShowUserList['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgMySign($pgShowUserList);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyAlbums($pgShowMyAlbums)
    {
        if (!empty($pgShowMyAlbums['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgMyAlbums($pgShowMyAlbums);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyService($pgShowMyService)
    {
        if (!empty($pgShowMyService['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgMyService($pgShowMyService);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowMyEssence($pgShowMyEssence)
    {
        if (!empty($pgShowMyEssence['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgMyEssence($pgShowMyEssence);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowEssenceToMe($pgShowEssenceToMe)
    {
        if (!empty($pgShowEssenceToMe['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgEssenceToMe($pgShowEssenceToMe);
        } else {
            return false;
        }
    }

    public function pgShowEssenceToMePending($pgShowEssenceToMePending)
    {
        if (!empty($pgShowEssenceToMePending['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgEssenceToMePending($pgShowEssenceToMePending);
        } else {
            return false;
        }
    }

    public function pgShowEssenceFromMe($pgShowEssenceFromMe)
    {
        //print_r($pgShowEssenceFromMe);
        if (!empty($pgShowEssenceFromMe['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgEssenceFromMe($pgShowEssenceFromMe);
        } else {
            return false;
        }
    }

    public function pgShowEssenceFromMePending($pgShowEssenceFromMePending)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowEssenceFromMePending['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgEssenceFromMePending($pgShowEssenceFromMePending);
        } else {
            return false;
        }
    }

    public function pgShowItemPartnersAll($pgShowItemPartnersAll)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowItemPartnersAll['item_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersAll($pgShowItemPartnersAll);
        } else {
            return false;
        }
    }

    public function pgShowItemPartnersMy($pgShowItemPartnersMy)
    {
        //echo "\n\rpgShowItemPartnersMy\n\r";
        //print_r($pgShowItemPartnersMy);
        if (!empty($pgShowItemPartnersMy['item_id']) and !empty($pgShowItemPartnersMy['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersMy($pgShowItemPartnersMy);
        } else {
            return false;
        }
    }

    public function pgShowItemPartnersConfirmed($pgShowItemPartnersConfirmed)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowItemPartnersConfirmed['item_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersConfirmed($pgShowItemPartnersConfirmed);
        } else {
            return false;
        }
    }

    public function pgShowItemPartnersReview($pgShowItemPartnersReview)
    {
        //echo "\n\rpgShowItemPartnersReview\n\r";
        //print_r($pgShowItemPartnersReview);
        if (!empty($pgShowItemPartnersReview['ip_id']) and !empty($pgShowItemPartnersReview['user_id'])) {
            $pg = new PostgreSQL();
            $ipInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_items_partners,
                'find_column' => 'ip_id',
                'find_value' => $pgShowItemPartnersReview['ip_id']]);
            //echo "\n\rpgShowItemPartnersReview ipInfo\n\r";
            //print_r($ipInfo);
            $itemInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_items,
                'find_column' => 'item_id',
                'find_value' => $ipInfo['item_id']]);
            //echo "\n\rpgShowItemPartnersReview itemInfo\n\r";
            //print_r($itemInfo);
            $ownerInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_users,
                'find_column' => 'user_id',
                'find_value' => $itemInfo['owner_id']]);
            //echo "\n\rpgShowItemPartnersReview ownerInfo\n\r";
            //print_r($ownerInfo);
            $partnerInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_users,
                'find_column' => 'user_id',
                'find_value' => $ipInfo['partner_id']]);
            //echo "\n\rpgShowItemPartnersReview partnerInfo\n\r";
            //print_r($partnerInfo);
            if ($ipInfo['partner_id'] != $pgShowItemPartnersReview['user_id']) {
                //echo "\n\rpgShowItemPartnersReview not your\n\r";
                $partnership = 'to_me';
            } else {
                //echo "\n\rpgShowItemPartnersReview your\n\r";
                $partnership = 'from_me';
            }
            return [
                'event_type' => 'partnership_request',
                'partnership_type' => $partnership,
                'partnership' => $ipInfo,
                'item_info' => $itemInfo,
                'owner_info' => $ownerInfo,
                'partner_info' => $partnerInfo];
        } else {
            //echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowItemPartnersPendingToMe($pgShowItemPartnersPendingToMe)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowItemPartnersPendingToMe['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersPendingToMe($pgShowItemPartnersPendingToMe);
        } else {
            return false;
        }
    }

    public function pgShowItemPartnersPendingFromMe($pgShowItemPartnersPendingFromMe)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowItemPartnersPendingFromMe['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersPendingFromMe($pgShowItemPartnersPendingFromMe);
        } else {
            return false;
        }
    }
    public function pgShowItemPartnersPending($pgShowItemPartnersPending)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowItemPartnersPending['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersPending($pgShowItemPartnersPending);
        } else {
            return false;
        }
    }

    public function pgShowItemPartnersDeclined($pgShowItemPartnersDeclined)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowItemPartnersDeclined['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersDeclined($pgShowItemPartnersDeclined);
        } else {
            return false;
        }
    }

    public function pgShowItemPartnersAccepted($pgShowItemPartnersAccepted)
    {
        //print_r($pgShowEssenceFromMePending);
        if (!empty($pgShowItemPartnersAccepted['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgItemPartnersAccepted($pgShowItemPartnersAccepted);
        } else {
            return false;
        }
    }

    public function pgShowMyTalents($pgShowMTalents)
    {
        if (!empty($pgShowMTalents['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgMyTalents($pgShowMTalents);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowUserListPrivate($pgShowUserListPrivate)
    {
        if (!empty($pgShowUserListPrivate['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetUserListsPrivate($pgShowUserListPrivate);
        } else {
            return false;
        }
    }

    public function pgShowUserListsForFriends($pgShowUserListsForFriends)
    {
        if (!empty($pgShowUserListsForFriends['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetUserListsForFriends($pgShowUserListsForFriends);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowUserListsForFriendsRev($pgShowUserListsForFriendsRev)
    {
        if (!empty($pgShowUserListsForFriendsRev['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetUserListsForFriendsRev($pgShowUserListsForFriendsRev);

        } else {
            return false;
        }
    }

    public function urlImgToItem($urlImgToItem)
    {
        if (!empty($urlImgToItem['url']) and !empty($urlImgToItem['owner_id'])) {
            //echo "\nurlImgToItem \n";
            //print_r($urlImgToItem);
            //$path_parts = pathinfo($urlImgToItem['url']);
            //echo "\npath_parts \n";
            //print_r($path_parts);
            $urlImgToItem['item_id'] = $this->trueRandom();
            //$urlImgToItem['file'] = $path_parts['basename']; // file.jpg
            //$fullFilename = $path_parts['basename']; // file.jpg
            $fullFilename = $this->getFileName($urlImgToItem['url']); // file.jpg
            //echo "\nfullFilename \n";
            //print_r($fullFilename);
            //$urlImgToItem['file'] = $urlImgToItem['item_id'] . '.' . $path_parts['extension']; // jpg
            $path_parts = pathinfo($fullFilename);
            $urlImgToItem['file'] = $urlImgToItem['item_id'] . '.' . $path_parts['extension']; // jpg
            //echo "\nurlImgToItem \n";
            //print_r($urlImgToItem);
            $this->downloadFile($urlImgToItem);
            if (empty($path_parts['extension'])) {
                // for FB url https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=173836260152297&height=200&width=200&ext=1566380067&hash=AeSM2P75ZqrwDCy9
                rename($this->nadtemp . $urlImgToItem['file'], $this->nadtemp . $urlImgToItem['file'] . 'jpg');
                $urlImgToItem['file'] = $urlImgToItem['file'] . 'jpg';
            }

            $this->imgToS3Items($urlImgToItem);
            return $urlImgToItem['file'];
        } else {
            echo 'urlImgToItem No URL or owner_id';
            return false;
        }
    }

    public function downloadFile($downloadFile)
    {
        //echo 'downloadFile ';
        //print_r($downloadFile);
        if (!empty($downloadFile['url'])) {
            if (file_put_contents($this->nadtemp . $downloadFile['file'], fopen($downloadFile['url'], 'r'))) {
                return $this->nadtemp . $downloadFile['file'];
            } else {
                echo 'downloadFile file_put_contents error ' . $this->nadtemp . $downloadFile['file'];
                return false;
            }
        } else {
            echo 'downloadFile No URL';
            return false;
        }
    }

    public function getFileName($getFileName)
    {
        // http://php.net/manual/en/regexp.reference.delimiters.php
        preg_match('#[^/\\&\?]+\.\w{3,4}(?=([\?&].*$|$))#', $getFileName, $matches);
        return $matches[0];
    }

    public function pgShowSpringListsForFriends($pgShowSpringListsForFriends) // TODO: remove
    {
        if (!empty($pgShowSpringListsForFriends['to_user_id'])
            and !empty($pgShowSpringListsForFriends['from_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetSpringListsForFriends($pgShowSpringListsForFriends);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowAlbumOfUser($pgShowAlbumOfUser)
    {
        //echo "\r\npgShowUserPubList\n";
        //print_r($pgShowUserPubList);
        if (!empty($pgShowAlbumOfUser)) {
            $pg = new PostgreSQL();
            return $pg->pgGetUserAlbums($pgShowAlbumOfUser);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowUserPubList($pgShowUserPubList)
    {
        //echo "\r\npgShowUserPubList\n";
        //print_r($pgShowUserPubList);
        if (!empty($pgShowUserPubList)) {
            $pg = new PostgreSQL();
            return $pg->pgGetUserListsPublic($pgShowUserPubList);
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgShowNewPosts($pgShowNewPosts)
    {
        //$start = microtime(true);
        $pg = new PostgreSQL();
        $userCookie = $this->GetUserCookieValue();
        if (!empty($userCookie)) {
            $pgShowNewPosts['to_user_id'] = $this->CookieToUserId();
            //$time_elapsed_secs = microtime(true) - $start;
            //header("videme-api-v2-posts-shownew-time-elapsed-secs: " . microtime(true) - $start);
            //header("videme-api-v2-posts-shownew-time-elapsed-secs: " . $time_elapsed_secs);
            return $pg->pgGetNewPostsAccess($pgShowNewPosts);
        } else {
            //return $pg->pgGetItemFullInfoAccessNOA($pgItemFullInfo);
            //print_r($pg->pgGetNewPostsNOA($pgShowNewPosts));
            //header("videme-api-v2-posts-shownew-time-elapsed-secs: " . microtime(true) - $start);
            //$time_elapsed_secs = microtime(true) - $start;
            //header("videme-api-v2-posts-shownew-time-elapsed-secs: " . $time_elapsed_secs);
            return $pg->pgGetNewPostsNOA($pgShowNewPosts);
        }
        //return $pg->pgGetNewPosts($pgShowNewPosts);
    }

    public function pgShowTrendsPosts($pgShowTrendsPosts)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetTrendsPostsNOA($pgShowTrendsPosts);
    }

    public function pgShowTrendsTags($pgShowTrendsTags)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetTrendsTagsNOA($pgShowTrendsTags);
    }

    public function pgShowTrendsUsers($pgShowTrendsUsers)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetTrendsUsersNOA($pgShowTrendsUsers);
    }

    public function pgShowChartByItem($pgShowChartByItem) // TODO: remove - only 48 hours
    {
        $pg = new PostgreSQL();
        //$userCookie = $this->GetUserCookieValue();
        /*if (!empty($userCookie)) {
            $pgShowNewPosts['to_user_id'] = $this->CookieToUserId();
            return $pg->pgGetNewPostsAccess($pgShowNewPosts);
        } else {*/
            //return $pg->pgGetItemFullInfoAccessNOA($pgItemFullInfo);
            //print_r($pg->pgGetNewPostsNOA($pgShowNewPosts));
            return $pg->pgGetChartByItemNOA($pgShowChartByItem);
        //}
        //return $pg->pgGetNewPosts($pgShowNewPosts);
    }

    public function pgShowChartByItem1stDays($pgShowChartByItem1stDays)
    {
        //$pg = new PostgreSQL();
        $pgAmazon = new PostgreSQL(); // <----------------------------------------------
        $pgInsight = new PG_insight(); // <----------------------------------------------
        //$userCookie = $this->GetUserCookieValue();
        $itemInfo = $pgAmazon->pgOneDataByColumn([
            'table' => $pgAmazon->table_items,
            'find_column' => 'item_id',
            'find_value' => $pgShowChartByItem1stDays['item_id']]);
        //echo "\n\tpgShowChartByItem1stDays item created_at: " . $itemInfo['created_at'];
        $pgShowChartByItem1stDays['chart_time_at'] = $itemInfo['created_at'];

        $pgShowChartByItem1stDays['where'] = '';

        if (!empty($pgShowChartByItem1stDays['state'])) {
            $pgShowChartByItem1stDays['where'] = "and items_views.state = '" . $pgShowChartByItem1stDays['state'] . "'";
        }

        if (!empty($pgShowChartByItem1stDays['w_start']))
            $pgShowChartByItem1stDays['d_start'] = $pgShowChartByItem1stDays['w_start'] * 7;

        if (!empty($pgShowChartByItem1stDays['w_stop']))
            $pgShowChartByItem1stDays['d_stop'] = $pgShowChartByItem1stDays['w_stop'] * 7;

        if (!empty($pgShowChartByItem1stDays['m_start']))
            $pgShowChartByItem1stDays['d_start'] = $pgShowChartByItem1stDays['m_start'] * 30;

        if (!empty($pgShowChartByItem1stDays['m_stop']))
            $pgShowChartByItem1stDays['d_stop'] = $pgShowChartByItem1stDays['m_stop'] * 30;

            if (!empty($pgShowChartByItem1stDays['item_id'])) {
            //echo "\n\tpgShowChartByItem1stDays pgShowChartByItem1stDays: ";
            //print_r($pgShowChartByItem1stDays);
            if (!empty($pgShowChartByItem1stDays['d_stop'])) {
                //echo "\n\tpgShowChartByItem1stDays d_stop exist";
                if (empty($pgShowChartByItem1stDays['d_start']) and ($pgShowChartByItem1stDays['d_stop'] > 0)) {
                    $pgShowChartByItem1stDays['d_start'] = 0;
                }
                if (empty($pgShowChartByItem1stDays['d_start']) and ($pgShowChartByItem1stDays['d_stop'] < 0)) {
                    //$pgShowChartByItem1stDays['d_start'] = $pgShowChartByItem1stDays['d_stop'] - 1;
                    $pgShowChartByItem1stDays['d_start'] = $pgShowChartByItem1stDays['d_stop'];
                    $pgShowChartByItem1stDays['d_stop'] = 0;
                    $pgShowChartByItem1stDays['chart_time_at'] = $this->getTimeForPG_tz();
                }
                if ($pgShowChartByItem1stDays['d_stop'] > 0 and $pgShowChartByItem1stDays['d_start'] > 0) {
                    //echo "\n\tpgShowChartByItem1stDays d_stop > 0: " . $pgShowChartByItem1stDays['d_stop'];
                    if (empty($pgShowChartByItem1stDays['d_start']) or $pgShowChartByItem1stDays['d_stop'] < 0) $pgShowChartByItem1stDays['d_start'] = 0;
                    //if ($pgShowChartByItem1stDays['d_stop'] < 0) $pgShowChartByItem1stDays['d_stop'] = -1 * abs($pgShowChartByItem1stDays['d_stop']);
                    if ($pgShowChartByItem1stDays['d_start'] > $pgShowChartByItem1stDays['d_stop']) {
                        if ($pgShowChartByItem1stDays['d_stop'] > 1) {
                            //echo "\n\tpgShowChartByItem1stDays d_stop > 1\n\t";
                            $pgShowChartByItem1stDays['d_start'] = $pgShowChartByItem1stDays['d_stop'] - 1;
                        } else {
                            //$pgShowChartByItem1stDays['d_start'] = $pgShowChartByItem1stDays['d_stop'];
                            return false;
                        }
                    }
                    //$pgShowChartByItem1stDays['time_start'] = $this->timeShift($itemInfo['created_at'], $pgShowChartByItem1stDays['d_start']);
                    //$pgShowChartByItem1stDays['time_stop'] = $this->timeShift($itemInfo['created_at'], $pgShowChartByItem1stDays['d_stop']);
                } elseif (($pgShowChartByItem1stDays['d_start'] > 0 and $pgShowChartByItem1stDays['d_stop'] < 0) or ($pgShowChartByItem1stDays['d_start'] < 0 and $pgShowChartByItem1stDays['d_stop'] > 0)) {
                    //echo "\n\t---> pgShowChartByItem1stDays d_stop > 0 and d_start < 0: CONFUSE 1 return false " . $pgShowChartByItem1stDays['d_stop'];
                    return false;
                }
            } elseif (empty($pgShowChartByItem1stDays['d_start'])) {
                //echo "\n\t---> pgShowChartByItem1stDays EMPTY d_stop and d_start: CONFUSE 1.1 return false";
                return false;
            }
            if (!empty($pgShowChartByItem1stDays['d_start'])) {
                //echo "\n\tpgShowChartByItem1stDays d_start exist";
                if (empty($pgShowChartByItem1stDays['d_stop']) and ($pgShowChartByItem1stDays['d_start'] < 0)) {
                    $pgShowChartByItem1stDays['d_stop'] = 0;
                }
                if (empty($pgShowChartByItem1stDays['d_stop']) and ($pgShowChartByItem1stDays['d_start'] > 0)) {
                    $pgShowChartByItem1stDays['d_stop'] = $pgShowChartByItem1stDays['d_start'] + 1;
                }
                if ($pgShowChartByItem1stDays['d_start'] < 0 and $pgShowChartByItem1stDays['d_stop'] <= 0) {
                    //echo "\n\tpgShowChartByItem1stDays d_start < 0: " . $pgShowChartByItem1stDays['d_start'];
                    //if (empty($pgShowChartByItem1stDays['d_stop']) or $pgShowChartByItem1stDays['d_stop'] > 0) $pgShowChartByItem1stDays['d_stop'] = 0;
                    //if ($pgShowChartByItem1stDays['d_stop'] < 0) $pgShowChartByItem1stDays['d_stop'] = -1 * abs($pgShowChartByItem1stDays['d_stop']);
                    if ($pgShowChartByItem1stDays['d_start'] > $pgShowChartByItem1stDays['d_stop']) {
                        if ($pgShowChartByItem1stDays['d_start'] < -1) {
                            //echo "\n\tpgShowChartByItem1stDays d_start < -1\n\t";
                            $pgShowChartByItem1stDays['d_stop'] = $pgShowChartByItem1stDays['d_start'] + 1;
                        } else {
                            //echo "\n\t---> pgShowChartByItem1stDays d_start > -1 return false\n\t";
                            return false;
                        }
                    }
                    $pgShowChartByItem1stDays['chart_time_at'] = $this->getTimeForPG_tz();

                } elseif (($pgShowChartByItem1stDays['d_start'] > 0 and $pgShowChartByItem1stDays['d_stop'] < 0) or ($pgShowChartByItem1stDays['d_start'] < 0 and $pgShowChartByItem1stDays['d_stop'] > 0)) {
                    //echo "\n\t---> pgShowChartByItem1stDays d_start < 0 and d_stop > 0: CONFUSE 2 return false " . $pgShowChartByItem1stDays['d_stop'];
                    return false;
                }
            } elseif (empty($pgShowChartByItem1stDays['d_stop'])) {
                //echo "\n\t---> pgShowChartByItem1stDays EMPTY d_start and d_stop: CONFUSE 2.1 return false";
                return false;
            }
            $pgShowChartByItem1stDays['start_date'] = $this->timeShift($pgShowChartByItem1stDays['chart_time_at'], $pgShowChartByItem1stDays['d_start']);
            $pgShowChartByItem1stDays['stop_date'] = $this->timeShift($pgShowChartByItem1stDays['chart_time_at'], $pgShowChartByItem1stDays['d_stop']);
                //$pgShowChartByItem1stDays['start_date'] = $itemInfo['created_at'];
                //$pgShowChartByItem1stDays['stop_date'] = $this->timeShift($itemInfo['created_at'], $pgShowChartByItem1stDays['days']);
                //echo "\n\tpgShowChartByItem1stDays pgShowChartByItem1stDays: ";
                //
                //print_r($pgShowChartByItem1stDays);
                //echo "\n\tpgShowChartByItem1stDays pgShowChartByItem1stDays['start_date']: " . $pgShowChartByItem1stDays['start_date'];
                //echo "\n\tpgShowChartByItem1stDays pgShowChartByItem1stDays['stop_date']: " . $pgShowChartByItem1stDays['stop_date'];
                return $pgInsight->pgGetChartByItem1stDaysNOA($pgShowChartByItem1stDays);
            } else {
            return false;
        }
    }

    public function pgChartGetPopState($pgShowChartByItem1stDays)
    {
        //$pg = new PostgreSQL();
        $pg = new PG_insight(); // <----------------------------------------------
            if (!empty($pgShowChartByItem1stDays['item_id'])) {
                return $pg->pgGetChartPopStates($pgShowChartByItem1stDays);
            } else {
            return false;
        }
    }

    public function getItemsByTag($getItemsByTag)
    {
        if (!empty($getItemsByTag['tag']) and !empty($getItemsByTag['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetItemsByTagNOA($getItemsByTag);
        } else {
            return false;
        }
    }

    public function getTagsOfSpring($getTagsOfSpring)
    {
        if (!empty($getTagsOfSpring['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetTagsBySpringNOA($getTagsOfSpring);
        } else {
            return false;
        }
    }

    public function pgShowService($pgShowService)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetService($pgShowService);
    }

    public function pgShowEssences($pgShowService)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetEssences($pgShowService);
    }

    public function pgShowTalents($pgShowTalents)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetTalents($pgShowTalents);
    }

    public function pgShowPopTags()
    {
        $pg = new PostgreSQL();
        return $pg->pgGetPopTags();
    }

    public function pgShowPopPosts()
    {
        $pg = new PostgreSQL();
        return $pg->pgGetPopPosts();
    }

    public function pgShowPopPostsVideo($pgShowPopPostsVideo)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetPopPostsVideo($pgShowPopPostsVideo);
    }

    public function pgGetArticle($pgGetArticle) // TODO: why. YES
    {
        if (!empty($pgGetArticle['item_id'])) {
            //echo '[' . $ddb->ddbGetArticleByName($_REQUEST['a']) . ']';
            //$welcome->outputCBData($ddb->ddbGetArticleByName($_REQUEST['a']));
            $pg = new PostgreSQL();
            $showArticle = $pg->pgOneDataByColumn([
                'table' => $pg->table_items,
                'find_column' => 'item_id',
                'find_value' => $pgGetArticle['item_id']]);

            $bodyJSON = json_decode($showArticle['body']);
            // wrong $showArticle['body'] = json_encode($showArticle['body']);
            //echo "\npgGetArticle bodyJSON\n";
            //print_r($bodyJSON);
            //exit;
            $trueBody = [];
            foreach ($bodyJSON as $value1) {
                //echo "\nvalue1 \n";
                //print_r($value1);
                $trueBody[] = $this->ConvParseData($value1);
                /*foreach ($value1 as $key => $value2) {
                    echo "\nvalue2 \n";
                    print_r($value2);
                }*/
            }
            $showArticle['body'] = $trueBody;
            //echo "\ntrueBody \n";
            //print_r($trueBody);
            //$jsonB = json_encode($trueBody);
            //echo "\njsonB \n";
            //print_r($jsonB);
            //exit;
            return $showArticle;
        } else {
            //echo 'no a';
            return false;
            //header("HTTP/1.0 404 Not Found");
        }
    }

    public function pgShowNewArticle($limit = 18)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetNewArticle($limit);
    }

    public function pgShowNewVideo($limit = 18)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetNewVideo($limit);
    }

    public function pgShowNewItems($limit = 18)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetNewItems($limit);
    }

    public function pgShowNewItemsNoArticle($limit = 18)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetNewItemsNoArticle($limit);
    }

    public function pgShowUserWithItems($limit = 18)
    {
        $pg = new PostgreSQL();
        return $pg->pgGetUserWithItems($limit);
    }

    public function ParseUserInfo($ParseUserInfo)
    {
        // TODO: прятать sessionToken:"n8cuoct947oi7fcum68mbtp2d"
        try {
            if (!empty($ParseUserInfo)) {
                $FindUser = new parseUser;
                return $FindUser->get($ParseUserInfo);
            }
        } catch (Exception $e) {
            //echo "Not found. "; //. $e->getMessage();
            $StatusError['app'] = "BaseUser";
            $StatusError['status'] = "5";
            $StatusError['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
            $Status = new Status();
            $Status->StatusSet($StatusError);
        }
    }

    public function cbUserInfo($cbUserInfo)
    {
        //echo "\r\n<hr>cbUserInfo cbUserInfo<br>";
        //print_r($cbUserInfo);
        $bucket = $this->autoConnectToBucket(["bucket" => "user"]);
        $query = CouchbaseViewQuery::from("user", "userInfo")->key($cbUserInfo)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
        try {
            //$res = $bucket->query($query);
            $res = $this->SharePreParseData($bucket->query($query));
            //echo "\r\n<hr>cbUserInfo res<br>";
            //print_r($res);
            /*echo "res ";
            print_r($res);
            echo "resArray ";
            print_r($res);
            echo "resArray[0][value] ";
            print_r($res["rows"][0]["value"]);*/
            //exit;
            //if (isset($res["rows"][0]["value"])) {
            if (isset($res["rows"][0]["value"])) {
                //echo $res["rows"][0];

                //return $res["rows"][0]["value"];
                return $res["rows"][0]["value"];
            } else {
                //echo "Email free";
                return false;
            }
            //return $res["rows"][0];
        } catch (Exception $e) {
            echo("Err CB User. " . $e->getMessage());
            return false;
        }
    }

    public function pgUserInfo($user_id)
    {
        //echo "\r\n<hr>cbUserInfo cbUserInfo<br>";
        //print_r($cbUserInfo);
        $pg = new PostgreSQL();
        return $pg->pgOneDataByColumn([
            'table' => $pg->table_users,
            'find_column' => 'user_id',
            'find_value' => $user_id]);
    }

    public function preUserInfo($preUserInfo)
    {
        if (!empty($preUserInfo['user_display_name'])) {
            $preUserInfo['user_display_name'] = $this->safetyTagsSlashesTrim4096($preUserInfo['user_display_name']);
        }
        return $preUserInfo;
    }

    public function pgUserFullInfo($pgUserFullInfo)
    {
        if (!empty($pgUserFullInfo['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetUserFullInfo($pgUserFullInfo);
        } else {
            return false;
        }
    }

    public function pgProfileStat($pgUserFullInfo)
    {
        if (!empty($pgUserFullInfo['user_id'])) {
            if (!empty($pgUserFullInfo['profile_state'])) {
                $pg = new PostgreSQL();
                if ($pgUserFullInfo['profile_state'] == 'true') {
                    $pg->pgUpdateData($pg->table_users, 'state', 'suspend', 'user_id', $pgUserFullInfo['user_id']);
                }
                if ($pgUserFullInfo['profile_state'] == 'false') {
                    $pg->pgUpdateData($pg->table_users, 'state', 'normal', 'user_id', $pgUserFullInfo['user_id']);
                }
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function userSettingsSet($userSettingsSet)
    {
        if (!empty($userSettingsSet['user_id'])) {
            $pg = new PostgreSQL();
            switch ($userSettingsSet['key']) {
                case 'web_theme':
                    echo "\n\ruserSettingsSet key - web_theme \n\r";
                    $pg->pgUpdateOnConflict($pg->table_users_settings, 'web_theme', $userSettingsSet['value'], 'user_id', $userSettingsSet['user_id']);
                    break;
                default:
                    echo "\n\ruserSettingsSet no key\n\r";
                    break;
            }
            return true;
        } else {
            echo 'userSettingsSet empty user_id';
            return false;
        }
    }

    public function pgSpringActivity($pgSpringActivity)
    {
        //echo "\r\n<hr>cbUserInfo cbUserInfo<br>";
        //print_r($cbUserInfo);
        $pg = new PostgreSQL();
        return $pg->pgGetSpringActivity($pgSpringActivity);
    }

    public function pgMyNetworkActivity($pgNetWorkActivity)
    {
        //echo "\r\n<hr>cbUserInfo cbUserInfo<br>";
        //print_r($cbUserInfo);
        $pg = new PostgreSQL();
        return $pg->pgGetMyNetworkActivity($pgNetWorkActivity);
    }

    public function cbUserDocId($cbUserProp)
    {
        //echo "\r\n<hr>cbUserInfo cbUserInfo<br>";
        //print_r($cbUserInfo);
        $bucket = $this->autoConnectToBucket(["bucket" => "user"]);
        $query = CouchbaseViewQuery::from("user", "docId")->key($cbUserProp)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
        try {
            //$res = $bucket->query($query);
            //echo "\r\n<hr>cbUserInfo res<br>";
            //print_r($res);
            $res = $this->SharePreParseData($bucket->query($query));

            if (isset($res["rows"][0]["value"])) {
                //echo $res["rows"][0];
                return $res["rows"][0]["value"];
            } else {
                echo "Email free";
                return false;
            }
            //return $res["rows"][0];
        } catch (Exception $e) {
            return false;
        }
    }

// ready
    public function ParseContactDirectoryCreate($ParseContactDirectoryCreate)
    {
        // Проверить есть ли Email, нельзя пропустить пустой Email,
        if (!empty($ParseContactDirectoryCreate['email']) && !empty($ParseContactDirectoryCreate['userid'])) {
            $ParseContactDirectoryCreate['email'] = $this->PreEmail($ParseContactDirectoryCreate['email']);
            $FindContact = new parseQuery('ContactDirectory');
            $FindContact->where('OwnerId', $ParseContactDirectoryCreate['userid']);
            $FindContact->where('Email', $ParseContactDirectoryCreate['email']);
            $ConvParseData = $this->ConvParseData($FindContact->find());
            // Если результат выборки пустой:
            if (empty($ConvParseData['results']['0']['Email'])) {
                $SaveContact = new parseObject('ContactDirectory');
                $SaveContact->OwnerId = $ParseContactDirectoryCreate['userid'];
                $SaveContact->Email = $ParseContactDirectoryCreate['email'];
                $SaveResult = $SaveContact->save();
                return $SaveResult->objectId;
            } else {
                return $ConvParseData['results']['0']['objectId'];
            }
        }
    }

    public function cbContactDirectoryCreate($cbContactDirectoryCreate)
    {
        if (!empty($cbContactDirectoryCreate['email']) && !empty($cbContactDirectoryCreate['userid'])) {
            $cbContactDirectoryCreate['email'] = $this->PreEmail($cbContactDirectoryCreate['email']);
            $cbListId = $this->cbContactToContactId($cbContactDirectoryCreate);
            // Только если у пользователя нет такого email
            if (empty($cbListId)) {
                $newContact[$this->type] = $this->contactDirectory;
                $newContact[$this->userEmail] = $cbContactDirectoryCreate['email'];
                $newContact[$this->ownerId] = $cbContactDirectoryCreate['userid'];
                //if (!empty($cbContactDirectoryCreate[$this->imageBrand])) $newContact[$this->imageBrand] = $cbContactDirectoryCreate[$this->imageBrand];
                return $this->cbSetDocument($newContact, ["bucket" => "properties"]);
            } else {
                return $cbListId["id"];
            }
        } else {
            echo "Missing argument - email";
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgRelationshipCreate($pgRelationshipCreate)
    {
        //echo 'pgRelationshipCreate ';
        //print_r($pgRelationshipCreate);
        if (!empty($pgRelationshipCreate['from_user_id'])) {
            if (!empty($pgRelationshipCreate['email'])) { // TODO: why?
                $pgRelationshipCreate['email'] = $this->PreEmail($pgRelationshipCreate['email']);
                $pgRelationshipCreate['to_user_id'] = $this->pgUserEmailCheck(['user_email' => $pgRelationshipCreate['email']]);
            } else {
                $pgRelationshipCreate['email'] = '';
            }
            $relationInfo = $this->pgGetRelationInfo($pgRelationshipCreate);
            //echo 'pgRelationshipCreate $relationInfo';
            //print_r($relationInfo);
            // Только если у пользователя нет такого email
            if (empty($relationInfo['relation_id'])) {
                $pg = new PostgreSQL();
                $relation = [];
                $relation['relation_id'] = $this->trueRandom();
                $relation['from_user_id'] = $pgRelationshipCreate['from_user_id'];
                $relation['to_user_id'] = $pgRelationshipCreate['to_user_id'];
                $relation['relation'] = 'contact';
                $relation['relation_email'] = $pgRelationshipCreate['email'];
                $trueData = $pg->pgPaddingItems($relation);
                $pg->pgInsertData($pg->table_relationships, $trueData);
                //return $relation;
                return true;
            } else {
                return $relationInfo;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgFriendRequest($pgFriendRequest)
    {
        //echo 'pgRelationshipCreate ';
        //print_r($pgRelationshipCreate);
        if (!empty($pgFriendRequest['from_user_id'])
            and !empty($pgFriendRequest['to_user_id'])) {
            $status = $this->pgFriendGetStatus($pgFriendRequest);
            //print_r($status);
            //exit;
            // Только если у пользователя нет такого email
            if (empty($status['status']) and $status['status'] !== '0') {
                /* set task ****************************/
                if (!empty($pgFriendRequest['title'])) {
                    $title = $pgFriendRequest['title'];
                } else {
                    $title = '';
                }
                $log = new log();
                $log->pgSetTask([
                    "task_type" => "request_friends",
                    "task_status" => "awaiting",
                    'title' => $title,
                    'owner_id' => $pgFriendRequest['from_user_id'],
                    'to_user_id' => $pgFriendRequest['to_user_id']
                ]);
                /* end set task ****************************/
                $pg = new PostgreSQL();
                $friendship = [];
                $friendship['friendship_id'] = $this->trueRandom();
                $friendship['from_user_id'] = $pgFriendRequest['from_user_id'];
                $friendship['to_user_id'] = $pgFriendRequest['to_user_id'];
                $friendship['action_user_id'] = $pgFriendRequest['from_user_id'];
                //$friendship['status'] = 0;
                $trueData = $pg->pgPaddingItems($friendship);
                $trueData['status'] = 0;
                //echo 'pgFriendRequest $trueData';
                //print_r($trueData);
                $pg->pgInsertData($pg->table_friendship, $trueData);
                //return $relation;
                return true;
            } else {
                return $status;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgEssenceJoin($pgEssenceJoin)
    {
        //echo 'pgEssenceJoin ';
        //print_r($pgEssenceJoin);
        if (!empty($pgEssenceJoin['ue_id'])
            and !empty($pgEssenceJoin['user_id'])) {
            $ureInfo = $this->pgEssenceRefGetStatus($pgEssenceJoin);
            //print_r($status);
            //exit;
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            if (empty($ureInfo['status'])) {
                $pg = new PostgreSQL();
                $friendship = [];
                $friendship['ure_id'] = $this->trueRandom();
                $friendship['users_essences'] = $pgEssenceJoin['ue_id'];
                $friendship['user_id'] = $pgEssenceJoin['user_id'];
                $friendship['title'] = $pgEssenceJoin['title'];
                $friendship['content'] = $pgEssenceJoin['content'];
                $friendship['action_user_id'] = $pgEssenceJoin['user_id'];
                //$friendship['status'] = 0;
                $trueData = $pg->pgPaddingItems($friendship);
                $trueData['status'] = 0;
                //echo 'pgFriendRequest $trueData';
                //print_r($trueData);
                $pg->pgInsertData($pg->table_users_ref_essences, $trueData);
                //return $relation;
                return true;
            } else {
                return $ureInfo;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function essenceAccept($essenceAccept)
    {
        //echo 'pgEssenceAccept ';
        //print_r($essenceAccept);
        if (!empty($essenceAccept['ure_id'])
            and !empty($essenceAccept['ue_id'])
            and !empty($essenceAccept['user_id'])) {
            $userEenceInfo = $this->pgGetUsersEssencesInfo($essenceAccept);
            //echo '$userEenceInfo ';
            //print_r($userEenceInfo);
            //exit;
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            if ($essenceAccept['user_id'] = $userEenceInfo['owner_id']) {
                $pg = new PostgreSQL();
                //$pg->pgUpdateDataArray($pg->table_signs, $oldList, ['sign_id' => $pgListIdOld]);
                $pg->pgUpdateData($pg->table_users_ref_essences, 'status', 1, 'ure_id', $essenceAccept['ure_id']);
                //return $relation;
                return true;
            } else {
                return $userEenceInfo;
            }
        } else {
            echo "essenceAccept Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }
    public function essenceDeleteFrom($essenceDeleteFrom)
    {
        //echo 'pgEssenceAccept ';
        //print_r($essenceAccept);
        if (!empty($essenceDeleteFrom['ure_id'])
            and !empty($essenceDeleteFrom['ue_id'])
            and !empty($essenceDeleteFrom['user_id'])) {
            $userEenceInfo = $this->pgGetUsersEssencesInfo($essenceDeleteFrom);
            //echo '$userEenceInfo ';
            //print_r($userEenceInfo);
            //exit;
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            if ($essenceDeleteFrom['user_id'] = $userEenceInfo['owner_id']) {
                $pg = new PostgreSQL();
                //$pg->pgUpdateDataArray($pg->table_signs, $oldList, ['sign_id' => $pgListIdOld]);
                //$pg->pgUpdateData($pg->table_users_ref_essences, 'status', 1, 'ure_id', $essenceDeleteFrom['ure_id']);
                //$pg->pgUpdateData($pg->table_users_ref_essences, 'status', 1, 'ure_id', $essenceDeleteFrom['ure_id']);
                $pg->pgDelete($pg->table_users_ref_essences, 'ure_id', $essenceDeleteFrom['ure_id']);
                //return $relation;
                return true;
            } else {
                return $userEenceInfo;
            }
        } else {
            echo "essenceDeleteFrom Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function essenceDeleteMy($essenceDeleteMy)
    {
        //echo 'pgEssenceAccept ';
        //print_r($essenceAccept);
        if (!empty($essenceDeleteMy['essence_id'])
            and !empty($essenceDeleteMy['owner_id'])) {
            //$userEenceInfo = $this->pgGetUsersEssencesInfo($essenceDeleteMy);
            //echo '$userEenceInfo ';
            //print_r($userEenceInfo);
            //exit;
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            //if ($essenceDeleteMy['user_id'] = $userEenceInfo['owner_id']) {
                $pg = new PostgreSQL();
                //$pg->pgUpdateDataArray($pg->table_signs, $oldList, ['sign_id' => $pgListIdOld]);
                //$pg->pgUpdateData($pg->table_users_ref_essences, 'status', 1, 'ure_id', $essenceDeleteFrom['ure_id']);
                //$pg->pgUpdateData($pg->table_users_ref_essences, 'status', 1, 'ure_id', $essenceDeleteFrom['ure_id']);
                $pg->pgDeleteDataBy2Column([
                'table' => $pg->table_users_essences,
                'find_column' => 'essence_id',
                'find_value' => $essenceDeleteMy['essence_id'],
                'find_column2' => 'owner_id',
                'find_value2' => $essenceDeleteMy['owner_id']]);
                //return $relation;
                return true;
            /*} else {
                return $userEenceInfo;
            }*/
        } else {
            echo "essenceDeleteMy Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgEssenceDeleteTo($pgEssenceDeleteTo)
    {
        //echo 'pgRelationshipCreate ';
        //print_r($pgRelationshipCreate);
        if (!empty($pgEssenceDeleteTo['ure_id'])
            and !empty($pgEssenceDeleteTo['user_id'])) {
            $pg = new PostgreSQL();
            $trueData = $pg->pgDeleteDataBy2Column([
                'table' => $pg->table_users_ref_essences,
                'find_column' => 'ure_id',
                'find_value' => $pgEssenceDeleteTo['ure_id'],
                'find_column2' => 'user_id',
                'find_value2' => $pgEssenceDeleteTo['user_id']]);
            return true;
        } else {
            echo "Missing argument";
            return false;
        }
    }

    public function pgPartnerInvite($pgPartnerInvite)
    {
        echo 'pgPartnerInvite ';
        print_r($pgPartnerInvite);
        if (!empty($pgPartnerInvite['item_id'])
            and !empty($pgPartnerInvite['partner_id'])
            and !empty($pgPartnerInvite['user_id'])) {
            $partnerInfo = $this->pgPartnerRefGetStatus($pgPartnerInvite);
            //print_r($status);
            //exit;
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            if (empty($partnerInfo['status'])) {
                $pg = new PostgreSQL();
                $partnership = [];
                $partnership['ip_id'] = $this->trueRandom();
                $partnership['item_id'] = $pgPartnerInvite['item_id'];
                $partnership['partner_id'] = $pgPartnerInvite['partner_id'];
                $partnership['title'] = $pgPartnerInvite['title'];
                $partnership['content'] = $pgPartnerInvite['content'];
                $partnership['action_user_id'] = $pgPartnerInvite['user_id'];
                //$friendship['status'] = 0;
                $trueData = $pg->pgPaddingItems($partnership);
                $trueData['status'] = 0;
                echo 'pgPartnerInvite $trueData';
                print_r($trueData);
                $pg->pgInsertData($pg->table_items_partners, $trueData);
                //return $relation;
                return true;
            } else {
                return $partnerInfo;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }
    public function pgPartnerAccept($pgPartnerAccept)
    {
        echo 'pgPartnerInvite ';
        print_r($pgPartnerAccept);
        if (!empty($pgPartnerAccept['ip_id']) and !empty($pgPartnerAccept['user_id'])) {
            $pg = new PostgreSQL();
            $ipInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_items_partners,
                'find_column' => 'ip_id',
                'find_value' => $pgPartnerAccept['ip_id']]);
            //print_r($status);
            //exit;
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            if ($ipInfo['status'] == 0 and $ipInfo['action_user_id'] !== $pgPartnerAccept['user_id']) {
                $pg->pgUpdateData($pg->table_items_partners, 'status', '1', 'ip_id', $pgPartnerAccept['ip_id']);
                return true;
            } else {
                return $ipInfo;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }
    public function pgPartnerDecline($pgPartnerDecline)
    {
        echo 'pgPartnerDecline ';
        print_r($pgPartnerDecline);
        if (!empty($pgPartnerDecline['ip_id']) and !empty($pgPartnerDecline['user_id'])) {
            $pg = new PostgreSQL();
            $ipInfo = $pg->pgOneDataByColumn([
                'table' => $pg->table_items_partners,
                'find_column' => 'ip_id',
                'find_value' => $pgPartnerDecline['ip_id']]);
            if ($ipInfo['status'] == 0 and $ipInfo['action_user_id'] !== $pgPartnerDecline['user_id']) {
                $pg->pgUpdateData($pg->table_items_partners, 'status', '2', 'ip_id', $pgPartnerDecline['ip_id']);
                return true;
            } else {
                return $ipInfo;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }
    public function pgPartnerDelete($pgPartnerDelete)
    {
        echo "\npgPartnerDelete\n";
        print_r($pgPartnerDelete);
        if (!empty($pgPartnerDelete['ip_id']) and !empty($pgPartnerDelete['user_id'])) {
            //$partnerInfo = $this->pgPartnerRefGetStatus($pgPartnerDelete);
            $pg = new PostgreSQL();
            $partnershipInfo = $pg->pgOneDataByColumn(['table' => $pg->table_items_partners, 'find_column' => 'ip_id', 'find_value' => $pgPartnerDelete['ip_id']]);
            $itemInfo = $this->pgFileInfo($pgPartnerDelete);
            //echo "\npgPartnerDelete partnerInfo\n";
            //print_r($partnerInfo);
            echo "\npgPartnerDelete partnershipInfo\n";
            print_r($partnershipInfo);
            echo "\npgPartnerDelete itemInfo\n";
            print_r($itemInfo);
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            //if (!empty($partnerInfo['status'])) {
            if (isset($partnershipInfo['status'])) {
                //$pg = new PostgreSQL();
                /*$partnership = [];
                $partnership['ip_id'] = $this->trueRandom();
                $partnership['item_id'] = $pgPartnerDelete['item_id'];
                $partnership['partner_id'] = $pgPartnerDelete['partner_id'];
                $partnership['title'] = $pgPartnerDelete['title'];
                $partnership['content'] = $pgPartnerDelete['content'];
                $partnership['action_user_id'] = $pgPartnerDelete['user_id'];
                //$friendship['status'] = 0;
                $trueData = $pg->pgPaddingItems($partnership);
                $trueData['status'] = 0;
                echo 'pgPartnerInvite $trueData';
                print_r($trueData);
                $pg->pgInsertData($pg->table_items_partners, $trueData);*/
                if (($itemInfo['owner_id'] == $pgPartnerDelete['user_id'])
                        or ($partnershipInfo['partner_id'] == $pgPartnerDelete['user_id'])) {
                    //==$pg->pgDelete($pg->table_items_partners, 'ip_id', $pgPartnerDelete['ip_id']);
                } else {
                    echo "\npgPartnerDelete no math\n";
                }
                //return $relation;
                return true;
            } else {
                echo "\npgPartnerDelete no status\n";
                return $pgPartnerDelete;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }
    public function pgPartnerJoinRequest($pgPartnerJoinRequest)
    {
        //echo "\r\npgPartnerJoinRequest\n\r ";
        //print_r($pgPartnerJoinRequest);
        if (!empty($pgPartnerJoinRequest['item_id'])
            and !empty($pgPartnerJoinRequest['user_id'])) {
            $partnershipInfo = $this->pgPartnerRefGetStatus($pgPartnerJoinRequest);
            //print_r($partnershipInfo);
            //exit;
            // Только если у пользователя нет такого email
            //if (empty($status['status']) and $status['status'] !== '0') {
            //if (empty($partnershipInfo['status'])) {
            if (empty($partnershipInfo['status']) or $partnershipInfo['status'] <> 0) {
                //$pg = new PostgreSQL();
                $partnerFullInfo = $this->pgUserInfo($pgPartnerJoinRequest['user_id']);
                $partnershipInfo = $partnerFullInfo;
                $itemFullInfo = $this->pgItemFullInfoAccess($pgPartnerJoinRequest);
                $itemInfo = $itemFullInfo;
                return ['partner_info' => $partnershipInfo, 'item_info' => $itemInfo];
            } else {
                return $partnershipInfo;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }
    public function pgFriendRequestAccept($pgFriendRequestAccept)
    {
        //echo 'pgFriendRequestAccept ';
        //print_r($pgFriendRequestAccept);
        if (!empty($pgFriendRequestAccept['from_user_id'])
            and !empty($pgFriendRequestAccept['to_user_id'])) {
            $status = $this->pgFriendGetStatus($pgFriendRequestAccept);
            //print_r($status);
            //exit;

            //$relationInfo = $this->pgGetRelationInfo($pgRelationshipCreate); // TODO: Set check
            //echo 'pgRelationshipCreate $relationInfo';
            //print_r($relationInfo);
            // Только если у пользователя нет такого friendship
            if (!empty($status) and $status['status'] == '0') {
                /* set task ****************************/
                if (!empty($pgFriendRequestAccept['title'])) {
                    $title = $pgFriendRequestAccept['title'];
                } else {
                    $title = '';
                }
                $log = new log();
                $log->pgSetTask([
                    "task_type" => "accept_friends",
                    "task_status" => "awaiting",
                    'title' => $title,
                    'owner_id' => $pgFriendRequestAccept['from_user_id'],
                    'to_user_id' => $pgFriendRequestAccept['to_user_id']
                ]);
                /* end set task ****************************/
                $pg = new PostgreSQL();
                //$friendship = [];
                //$friendship['friendship_id'] = $this->trueRandom();
                //$friendship['from_user_id'] = $pgFriendRequestAccept['from_user_id'];
                //$friendship['to_user_id'] = $pgFriendRequestAccept['to_user_id'];
                //$friendship['action_user_id'] = $pgFriendRequestAccept['from_user_id'];
                $status['status'] = 1;
                $status['updated_at'] = $this->getTimeForPG_tz();
                //$trueData = $pg->pgPaddingItems($friendship);
                //$trueData['status'] = 0;
                //echo 'pgFriendRequest $trueData';
                //print_r($trueData);
                //$date = new Data();
                //echo 'date ';

                //print_r($date);
                //echo 'date ISO8601 \n';
                //echo date(DateTime::ISO8601);
                //echo 'date Y-m-d H:i:sO \n';

                //echo date('Y-m-d H:i:sO');
                //echo 'gettime \n';
                //echo $this->getTimeFoPG_tz();

                //exit;

                $pg->pgUpdateDataArray(
                    $pg->table_friendship,
                    $status,
                    ['friendship_id' => $status['friendship_id']]);
                //return $relation;
                return true;
            } else {
                //return $status;
                return false;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgFriendRequestDeclined($pgFriendRequestDeclined)
    {
        //echo 'pgFriendRequestAccept ';
        //print_r($pgFriendRequestDeclined);
        if (!empty($pgFriendRequestDeclined['from_user_id'])
            and !empty($pgFriendRequestDeclined['to_user_id'])) {
            $status = $this->pgFriendGetStatus($pgFriendRequestDeclined);
            //print_r($status);
            //exit;

            //$relationInfo = $this->pgGetRelationInfo($pgRelationshipCreate); // TODO: Set check
            //echo 'pgRelationshipCreate $relationInfo';
            //print_r($relationInfo);
            // Только если у пользователя нет такого friendship
            if (!empty($status)
                and $status['status'] == '0') {
                $pg = new PostgreSQL();
                //$friendship = [];
                //$friendship['friendship_id'] = $this->trueRandom();
                //$friendship['from_user_id'] = $pgFriendRequestAccept['from_user_id'];
                //$friendship['to_user_id'] = $pgFriendRequestAccept['to_user_id'];
                //$friendship['action_user_id'] = $pgFriendRequestAccept['from_user_id'];
                $status['status'] = 2;
                $status['updated_at'] = $this->getTimeForPG_tz();
                //$trueData = $pg->pgPaddingItems($friendship);
                //$trueData['status'] = 0;
                //echo 'pgFriendRequest $trueData';
                //print_r($trueData);
                $pg->pgUpdateDataArray(
                    $pg->table_friendship,
                    $status,
                    ['friendship_id' => $status['friendship_id']]);
                //return $relation;
                return true;
            } else {
                //return $status;
                return false;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgFriendDelete($pgFriendDelete)
    {
        //echo 'pgFriendRequestAccept ';
        //print_r($pgFriendRequestDeclined);
        if (!empty($pgFriendDelete['from_user_id'])
            and !empty($pgFriendDelete['to_user_id'])) {
            $status = $this->pgFriendGetStatus($pgFriendDelete);
            print_r($status);
            //exit;

            //$relationInfo = $this->pgGetRelationInfo($pgRelationshipCreate); // TODO: Set check
            //echo 'pgRelationshipCreate $relationInfo';
            //print_r($relationInfo);
            // Только если у пользователя нет такого friendship
            if (!empty($status) and $status['status'] == '1') {
                $pg = new PostgreSQL();
                /*$pg->pgDelete(
                    $pg->table_friendship,
                    'friendship_id',
                    $status['friendship_id']);*/
                $status['status'] = 2;
                $status['updated_at'] = $this->getTimeForPG_tz();
                //$trueData = $pg->pgPaddingItems($friendship);
                //$trueData['status'] = 0;
                //echo 'pgFriendRequest $trueData';
                //print_r($trueData);
                $pg->pgUpdateDataArray(
                    $pg->table_friendship,
                    $status,
                    ['friendship_id' => $status['friendship_id']]);

                return true;
            } else {
                echo "You status " . $status['status'];

                //return $status;
                return false;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgFriendGetStatus($pgFriendGetStatus)
    {
        //echo 'pgFriendGetStatus ';
        //print_r($pgFriendGetStatus);
        if (!empty($pgFriendGetStatus['from_user_id'])
            and !empty($pgFriendGetStatus['to_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetFriendsStatus($pgFriendGetStatus);
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgEssenceRefGetStatus($pgEssenceRefGetStatus)
    {
        //echo 'pgFriendGetStatus ';
        //print_r($pgFriendGetStatus);
        if (!empty($pgEssenceRefGetStatus['ue_id'])
            and !empty($pgEssenceRefGetStatus['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetUsersRefEssencesInfo($pgEssenceRefGetStatus);
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgGetUsersEssencesInfo($pgGetUsersEssencesInfo)
    {
        //echo 'pgFriendGetStatus ';
        //print_r($pgFriendGetStatus);
        if (!empty($pgGetUsersEssencesInfo['ue_id'])) {
            $pg = new PostgreSQL();
            //return $pg->pgGetUsersEssencesInfo($pgGetUsersEssencesInfo);
            return $pg->pgOneDataByColumn([
                'table' => $pg->table_users_essences,
                'find_column' => 'ue_id',
                'find_value' => $pgGetUsersEssencesInfo['ue_id']]);
        } else {
            echo "pgGetUsersEssencesInfo Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgPartnerRefGetStatus($pgPartnerRefGetStatus)
    {
        //echo 'pgFriendGetStatus ';
        //print_r($pgFriendGetStatus);
        if (!empty($pgPartnerRefGetStatus['item_id'])
            and !empty($pgPartnerRefGetStatus['partner_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetUsersRefPartnersInfo($pgPartnerRefGetStatus);
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgRelationshipDelete($pgRelationshipDelete)
    {
        //echo 'pgRelationshipDelete ';
        //print_r($pgRelationshipDelete);
        if (!empty($pgRelationshipDelete['to_user_id'])) {
            $relationInfo = $this->pgGetRelationInfo($pgRelationshipDelete);
            // Только если у пользователя есть эта связь
            if (!empty($relationInfo['relation_id'])) {
                $pg = new PostgreSQL();
                $res = $pg->pgDelete($pg->table_relationships, 'relation_id', $relationInfo['relation_id']);
                return true;
            } else {
                return false;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgRelationshipUpdate($pgRelationshipUpdate)
    {
        /*if (!empty($pgRelationshipUpdate['userid'])
            && !empty($pgRelationshipUpdate['email'])
            && !empty($pgRelationshipUpdate['newemail'])) {
            $pgRelationshipUpdate['email'] = $this->PreEmail($pgRelationshipUpdate['email']);
            $pgRelationshipUpdate['emailid'] = $this->cbContactToContactId($pgRelationshipUpdate);
            // Только если у пользователя нет такого email
            //if (empty($cbListId)) { // TODO: Тут нужно проверять или нет?
            $newContactDirectory[$this->type] = $this->contactDirectory;
            $newContactDirectory[$this->docId] = $pgRelationshipUpdate['emailid'];
            $newContactDirectory[$this->updatedAt] = time();
            $newContactDirectory[$this->userEmail] = $pgRelationshipUpdate['newemail'];
            $newContactDirectory[$this->ownerId] = $pgRelationshipUpdate['userid'];
            //if (!empty($cbListUpdate[$this->imageBrand])) $newList[$this->imageBrand] = $cbListUpdate[$this->imageBrand];
            //return $this->cbUpdateDocument($newContactDirectory, ["bucket" => "properties"]);
            //} else {
            //    return $cbListId["id"];
            //}
        } else {
            echo "Missing argument - list";
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }*/

        if (!empty($pgRelationshipUpdate['from_user_id'])
            && !empty($pgRelationshipUpdate['to_user_id'])) {
            $relationInfo = $this->pgGetRelationInfo($pgRelationshipUpdate);
            // Только если у пользователя есть эта связь
            if (!empty($relationInfo['relation_id'])) {
                if (!empty($pgRelationshipUpdate['relation_email'])) $relationInfo['relation_email'] = $pgRelationshipUpdate['relation_email'];
                $pg = new PostgreSQL();
                //$res = $pg->pgDelete($pg->table_relationships, 'relation_id', $relationInfo['relation_id']);
                $pg->pgUpdateDataArray(
                    $pg->table_relationships,
                    $relationInfo,
                    ['relation_id' => $relationInfo['relation_id']]);
                return true;
            } else {
                return false;
            }
        } else {
            echo "Missing argument";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

    public function pgGetRelationInfo($pgGetRelationInfo)
    {
        if (!empty($pgGetRelationInfo['from_user_id'])
            && !empty($pgGetRelationInfo['to_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgOneDataBy2Column([
                'table' => $pg->table_relationships,
                'find_column' => 'from_user_id',
                'find_value' => $pgGetRelationInfo['from_user_id'],
                'find_column2' => 'to_user_id',
                'find_value2' => $pgGetRelationInfo['to_user_id']]);
        } else {
            echo "Missing argument - email";
            //header('Location: https://vide.me/VictorLustig.html');
            return false;
        }

    }

    public function PreEmail($PreEmail)
    {
        $PreEmail = trim($PreEmail);
        $PreEmail = strtolower($PreEmail);
        return $PreEmail;
    }

    // Ready
    public function ParseContactDirectoryShow($ParseContactDirectoryShow)
    {
        if (!empty($ParseContactDirectoryShow)) {
            $FindContact = new parseQuery('ContactDirectory');
            $FindContact->where('OwnerId', $ParseContactDirectoryShow);
            //$ParseData = $FindContact->find();
            //return $ParseData;
            return $FindContact->find();
        } else {
            echo "-----> Param userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbContactDirectoryShow($cbContactDirectoryShow)
    {
        if (!empty($cbContactDirectoryShow[$this->userId])) {
            $bucketProperties = $this->autoConnectToBucket(["bucket" => "properties"]);
            $query = CouchbaseViewQuery::from('contactDirectory', 'contactDirectory')->key($cbContactDirectoryShow[$this->userId])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                $res = $bucketProperties->query($query);
                //echo $cbContactDirectoryShow[$this->userId];
                //print_r($res);
                //return $res["rows"];
                return $res->rows;
            } catch (Exception $e) {
                //echo ("Not found. " . $e->getMessage());
                return false;
            }
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgRelationshipsShow($pgRelationshipsShow, $limit = 100)
    {
        if (!empty($pgRelationshipsShow['from_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyRelationships($pgRelationshipsShow);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgRelationshipsToMe($pgRelationshipsToMe, $limit = 100) // TODO: limit
    {
        if (!empty($pgRelationshipsToMe['to_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetRelationshipsToMe($pgRelationshipsToMe);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgRelationshipsFromMe($pgRelationshipsFromMe, $limit = 100) // TODO: limit
    {
        if (!empty($pgRelationshipsFromMe['from_user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetRelationshipsFromMe($pgRelationshipsFromMe);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgMyFriendship($pgMyFriendship)
    {
        if (!empty($pgMyFriendship['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetMyFriends($pgMyFriendship);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgFriendshipMyPendingRequest($pgFriendshipMyPendingRequest)
    {
        if (!empty($pgFriendshipMyPendingRequest['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetFriendshipMyPendingRequest($pgFriendshipMyPendingRequest);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgFriendshipMyDeclined($pgFriendshipMyDeclined)
    {
        if (!empty($pgFriendshipMyDeclined['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetFriendshipMyDeclined($pgFriendshipMyDeclined);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgFriendshipMyPendingRequestCount($pgFriendshipMyPendingRequestCount)
    {
        if (!empty($pgFriendshipMyPendingRequestCount['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetFriendshipMyPendingRequestCount($pgFriendshipMyPendingRequestCount);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgFriendshipMyRequest($pgFriendshipMyRequest)
    {
        if (!empty($pgFriendshipMyRequest['user_id'])) {
            $pg = new PostgreSQL();
            return $pg->pgGetFriendshipMyRequest($pgFriendshipMyRequest);
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgRecommendedConnection($pgRecommendedConnection)
    {
        if (!empty($pgRecommendedConnection['to_user_id'])) {
            $pg = new PostgreSQL();
            $res = $pg->pgGetRecommendedConnection($pgRecommendedConnection);
            if (!empty($res)) {
                return $res;
            } else {
                return $this->getRandPopConnect();
            }
        } else {
            echo "No user";
            return false;
        }
    }

    public function pgRecommendedFriends($pgRecommendedFriends)
    {
        if (!empty($pgRecommendedFriends['user_id'])) {
            $pg = new PostgreSQL();
            //return $pg->pgGetRecommendedFriends($pgRecommendedFriends);
            $res = $pg->pgGetRecommendedFriends($pgRecommendedFriends);
            //echo "res: ";
            //print_r($res);
            if (!empty($res)) {
                return $res;
            } else {
                return $this->getRandPopConnect();
            }
        } else {
            echo "No user";
            return false;
        }
    }

    public function getRandPopConnect()
    {
        /*echo "getRandPopConnect: ";
        print_r($getRandPopConnect);*/
        $resConn = $this->pgShowPopUsers(['limit' => 18]);
        //var_dump($resConn);

        /*echo "res pgShowPopUsers: ";
        print_r($resConn);
        $randUsers = array_rand($resConn, 2);
        echo "randUsers: ";
        print_r($randUsers);*/
        //echo $resConn[$section][array_rand($resConn[$section])];
        $result = [];
        foreach (array_rand($resConn, 3) as $k) {
            $result[] = $resConn[$k];
        }
        //echo "result: ";
        //print_r($result);
        //var_dump($result);
        return $result;
    }

    // Ready
    public function ParseContactDirectoryUpdate($ParseContactDirectoryUpdate) // TODO: remove
    {
        if (!empty($ParseContactDirectoryUpdate['email']) && !empty($ParseContactDirectoryUpdate['userid'])) {
            //$ParseContactDirectoryUpdate['email'] = $this->PreEmail($ParseContactDirectoryUpdate['email']);
            $ParseContactDirectoryUpdate['newemail'] = $this->PreEmail($ParseContactDirectoryUpdate['newemail']);
            $ParseContactDirectoryUpdate['objectId'] = $this->ParseContactToContactId($ParseContactDirectoryUpdate);
            // Проверить есть ли у пользователя такой Контакт
            if (!empty($ParseContactDirectoryUpdate['objectId'])) {
                $UpdateContact = new parseObject('ContactDirectory');
                $UpdateContact->Email = $ParseContactDirectoryUpdate['newemail'];
                //$UpdateContactResult = $UpdateContact->update($ParseContactDirectoryUpdate['objectId']);
                $UpdateContactResult = $this->ConvParseData($UpdateContact->update($ParseContactDirectoryUpdate['objectId']));
                $ParseContactDirectoryUpdate['updatedAt'] = $UpdateContactResult['updatedAt'];
                return $ParseContactDirectoryUpdate;
            } else {
                echo "-----> Email NOT found";
            }
        } else {
            echo "-----> Param Email, userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbContactDirectoryUpdate($cbContactDirectoryUpdate) // ready
    {
        /*if (!empty($ParseContactDirectoryUpdate['email']) && !empty($ParseContactDirectoryUpdate['userid'])) {
            //$ParseContactDirectoryUpdate['email'] = $this->PreEmail($ParseContactDirectoryUpdate['email']);
            $ParseContactDirectoryUpdate['newemail'] = $this->PreEmail($ParseContactDirectoryUpdate['newemail']);
            $ParseContactDirectoryUpdate['objectId'] = $this->ParseContactToContactId($ParseContactDirectoryUpdate);
            // Проверить есть ли у пользователя такой Контакт
            if (!empty($ParseContactDirectoryUpdate['objectId'])) {
                $UpdateContact = new parseObject('ContactDirectory');
                $UpdateContact->Email = $ParseContactDirectoryUpdate['newemail'];
                //$UpdateContactResult = $UpdateContact->update($ParseContactDirectoryUpdate['objectId']);
                $UpdateContactResult = $this->ConvParseData($UpdateContact->update($ParseContactDirectoryUpdate['objectId']));
                $ParseContactDirectoryUpdate['updatedAt'] = $UpdateContactResult['updatedAt'];
                return $ParseContactDirectoryUpdate;
            } else {
                echo "-----> Email NOT found";
            }
        } else {
            echo "-----> Param Email, userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }*/

        if (!empty($cbContactDirectoryUpdate['email']) && !empty($cbContactDirectoryUpdate['userid'])) {
            $cbContactDirectoryUpdate['email'] = $this->PreEmail($cbContactDirectoryUpdate['email']);
            $cbContactDirectoryUpdate['emailid'] = $this->cbContactToContactId($cbContactDirectoryUpdate);
            // Только если у пользователя нет такого email
            //if (empty($cbListId)) { // TODO: Тут нужно проверять или нет?
            $newContactDirectory[$this->type] = $this->contactDirectory;
            $newContactDirectory[$this->docId] = $cbContactDirectoryUpdate['emailid'];
            $newContactDirectory[$this->updatedAt] = time();
            $newContactDirectory[$this->userEmail] = $cbContactDirectoryUpdate['newemail'];
            $newContactDirectory[$this->ownerId] = $cbContactDirectoryUpdate['userid'];
            //if (!empty($cbListUpdate[$this->imageBrand])) $newList[$this->imageBrand] = $cbListUpdate[$this->imageBrand];
            return $this->cbUpdateDocument($newContactDirectory, ["bucket" => "properties"]);
            //} else {
            //    return $cbListId["id"];
            //}
        } else {
            echo "Missing argument - list";
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }


    public function ParseContactToContactId($ParseContactToContactId) // ready
    {
        // TODO: Большие и маленькие буквы
        if (!empty($ParseContactToContactId['email']) && !empty($ParseContactToContactId['userid'])) {
            $ParseContactToContactId['email'] = $this->PreEmail($ParseContactToContactId['email']);
            $FindContactDirectoryId = new parseQuery('ContactDirectory');
            $FindContactDirectoryId->where('Email', $ParseContactToContactId['email']);
            $FindContactDirectoryId->where('OwnerId', $ParseContactToContactId['userid']);
            $ConvParseData = $this->ConvParseData($FindContactDirectoryId->find());
            return $ConvParseData['results']['0']['objectId'];
        } else {
            echo "Missing argument - Contact";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbContactToContactId($cbContactToContactId)
    {
        if (!empty($cbContactToContactId['userid']) && !empty($cbContactToContactId['email'])) {
            $cbContactToContactId['email'] = $this->PreEmail($cbContactToContactId['email']);
            $this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => $cbContactToContactId['userid'] . $cbContactToContactId['email'],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            $bucket = $this->autoConnectToBucket(["bucket" => "properties"]);
            $query = CouchbaseViewQuery::from("contactDirectory", 'contactId')->key([$cbContactToContactId['userid'], $cbContactToContactId['email']])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                //$res = $bucketProperties->query($query);
                $res = $this->SharePreParseData($bucket->query($query));
                //echo "<br>res: ";
                //print_r($res);
                return $res["rows"][0]["id"];
            } catch (Exception $e) {
                return false;
            }
        } else {
            header('Location: https://vide.me/VictorLustig.html');
            return false;
        }
    }

// ready
    public function ParseContactDirectoryRemove($ParseContactDirectoryRemove)
    {
        if (!empty($ParseContactDirectoryRemove['email']) && !empty($ParseContactDirectoryRemove['userid'])) {
            //$ParseContactDirectoryRemove['email'] = $this->PreEmail($ParseContactDirectoryRemove['email']);
            $ParseContactDirectoryRemove['objectId'] = $this->ParseContactToContactId($ParseContactDirectoryRemove);
            // Проверить есть ли у пользователя такой Контакт
            if (!empty($ParseContactDirectoryRemove['objectId'])) {
                $RemoveContact = new parseObject('ContactDirectory');
                //return $RemoveContact->delete($ParseContactDirectoryRemove['objectId']);
                $RemoveContactResult = $this->ConvParseData($RemoveContact->delete($ParseContactDirectoryRemove['objectId']));
                $ParseContactDirectoryRemove['updatedAt'] = $RemoveContactResult['updatedAt'];
                return $ParseContactDirectoryRemove;
            } else {
                echo "-----> Email NOT found";
            }
        } else {
            echo "-----> Param Email, userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbContactDirectoryRemove($cbContactDirectoryRemove)
    {
        if (!empty($cbContactDirectoryRemove['email']) && !empty($cbContactDirectoryRemove['userid'])) {
            $cbContactDirectoryRemove['emailid'] = $this->cbContactToContactId($cbContactDirectoryRemove);
            // Проверить есть ли у пользователя такой email
            $this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => $cbContactDirectoryRemove['userid'] . $cbContactDirectoryRemove['email'],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            if (!empty($cbContactDirectoryRemove['emailid'])) {
                $bucketProperties = $this->autoConnectToBucket(["bucket" => "properties"]);
                return $this->cbRemove($bucketProperties, $cbContactDirectoryRemove['emailid']);
            } else {
                $this->log->setEvent([
                    "type" => "IDS",
                    "message" => "forgery",
                    "val" => "userid " . $cbContactDirectoryRemove['userid'] . " email " . $cbContactDirectoryRemove['email'] . " emailid " . $cbContactDirectoryRemove['emailid'],
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                header('Location: https://vide.me/VictorLustig.html');
                echo "Email NOT found";
                return false;
            }
        } else {
            //header('Location: https://vide.me/VictorLustig.html');
            echo "Param email empty";
            return false;
        }
    }

    public function ParseUpdateUserInfo($ParseUpdateUserInfo) // ready
    {
        if (isset($ParseUpdateUserInfo['userid'])) {
            $ResultUserSessionToken = $this->ParseGetUserSessionToken(array(
                'UserObjectId' => $ParseUpdateUserInfo['userid']
            ));
            $UserSessionToken = $ResultUserSessionToken['results']['0']['UserSessionToken'];
            $UpdateUser = new parseUser;
            $UpdateUser->data = array(
                'UserDisplayName' => $ParseUpdateUserInfo['userdisplayname'],
                'UserFirstName' => $ParseUpdateUserInfo['userfirstname'],
                'UserLastName' => $ParseUpdateUserInfo['userlastname'],
                'UserLink' => $ParseUpdateUserInfo['userlink'],
                'UserGender' => $ParseUpdateUserInfo['usergender'],
                'UserEmail' => $ParseUpdateUserInfo['useremail'],
                'UserTimeZone' => $ParseUpdateUserInfo['usertimezone'],
                'UserLocale' => $ParseUpdateUserInfo['userlocale'],
                'UserPicture' => $ParseUpdateUserInfo['userpicture']
            );
            $UpdateResult = $UpdateUser->update($ParseUpdateUserInfo['userid'], $UserSessionToken);
            echo "User information has been changed in: <br>";
            echo $UpdateResult->updatedAt;
        } else {
            echo "-----> Param userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function cbUpdateUserInfo($cbUpdateUserInfo)
    {
        if (isset($cbUpdateUserInfo[$this->userId])) {
            /*$ResultUserSessionToken = $this->ParseGetUserSessionToken(array(
                'UserObjectId' => $cbUpdateUserInfo['userid']
            ));
            $UserSessionToken = $ResultUserSessionToken['results']['0']['UserSessionToken'];
            $UpdateUser = new parseUser;
            $UpdateUser->data = array(
                'UserDisplayName' => $cbUpdateUserInfo['userdisplayname'],
                'UserFirstName' => $cbUpdateUserInfo['userfirstname'],
                'UserLastName' => $cbUpdateUserInfo['userlastname'],
                'UserLink' => $cbUpdateUserInfo['userlink'],
                'UserGender' => $cbUpdateUserInfo['usergender'],
                'UserEmail' => $cbUpdateUserInfo['useremail'],
                'UserTimeZone' => $cbUpdateUserInfo['usertimezone'],
                'UserLocale' => $cbUpdateUserInfo['userlocale'],
                'UserPicture' => $cbUpdateUserInfo['userpicture']
            );
            $UpdateResult = $UpdateUser->update($cbUpdateUserInfo['userid'], $UserSessionToken);
            echo "User information has been changed in: <br>";
            echo $UpdateResult->updatedAt;*/
            $userData = $this->cbUserInfo($cbUpdateUserInfo[$this->userId]);
            $cbUpdateUserInfo[$this->userEmail] = $userData[$this->userEmail];
            return $this->cbUpdateDocument($cbUpdateUserInfo, ["bucket" => "user"]); // <<<<-----------------

        } else {
            echo "-----> Param userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function pgUpdateUserInfo($pgUpdateUserInfo, $info)
    {
        if (isset($pgUpdateUserInfo['user_id'])) {
            //==$userOld = $this->pgUserDataById($pgUpdateUserInfo);
            //echo "\npgUpdateUserInfo userOld\n";
            //print_r($userOld);
            //echo "\npgUpdateUserInfo pgUpdateUserInfo\n";
            //print_r($pgUpdateUserInfo);
            //==$userNew = array_merge($userOld, $pgUpdateUserInfo);
            //echo "\npgUpdateUserInfo userNew\n";
            //print_r($userNew);
            $pg = new PostgreSQL();
            $userTrue = $pg->pgPaddingItems($info);
            if (isset($userTrue['spring'])) unset ($userTrue['spring']);
            /*$res = $pg->pgUpdateData(
                $pg->table_users,
                ['user_id', 'user_email', 'user_display_name', 'user_first_name', 'user_last_name', 'user_link', 'user_gender', 'user_birthday', 'user_locale', 'user_picture', 'spring', 'facebook', 'google', 'microsoft', 'last_login', 'last_active', 'user_cover'],
                $userTrue,
                'user_id',
                $pgUpdateUserInfo['user_id']);*/
            $res = $pg->pgUpdateDataArray($pg->table_users, $userTrue, $pgUpdateUserInfo);
            //return $res;
            return ['status' => 'success', 'response' => 'user/update/info'];

        } else {
            echo "-----> Param userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function pgUpdateUserSubscriptions($user_id, $setUserOptions)
    {
        echo "\npgUpdateUserSubscriptions setUserOptions\n";
        print_r($setUserOptions);
        if (!empty($user_id)) {
            //==$userOld = $this->pgUserDataById($pgUpdateUserInfo);
            //echo "\npgUpdateUserInfo userOld\n";
            //print_r($userOld);
            //echo "\npgUpdateUserInfo pgUpdateUserInfo\n";
            //print_r($pgUpdateUserInfo);
            //==$userNew = array_merge($userOld, $pgUpdateUserInfo);
            //echo "\npgUpdateUserInfo userNew\n";
            //print_r($userNew);
            $pg = new PostgreSQL();

            //if (empty($setUserOptions['dont_send_rating'])) $setUserOptions['dont_send_rating'] = intval(false);
            // if (empty($setUserOptions['dont_send_rating'])) $setUserOptions['dont_send_rating'] = false;
            echo "\npgUpdateUserSubscriptions setUserOptions\n";
            print_r($setUserOptions);

            $userInfo = $this->pgUserInfo($user_id);
            //$this->toFile(['service' => 'send_rating', 'type' => 'success', 'text' => 'compose_init : user_id: ' . $userInfo['user_id'] . ' user_display_name ' . $userInfo['user_display_name']]);


            $oldUserOptions = json_decode($userInfo['options'], true);
            echo "\npgUpdateUserSubscriptions oldUserOptions\n";
            print_r($oldUserOptions);

            $trueOldUserOptions = $pg->pgPaddingItems($oldUserOptions);
            $trueSetUserOptions = $pg->pgPaddingItems($setUserOptions);
            //if (empty($setUserOptions['dont_send_rating'])) $trueSetUserOptions['dont_send_rating'] = false;
            if (empty($setUserOptions['dont_send_rating'])) $trueSetUserOptions['dont_send_rating'] = intval(false);
            if (empty($setUserOptions['dont_send_stats'])) $trueSetUserOptions['dont_send_stats'] = intval(false);


            $newUserOptions = array_merge($trueOldUserOptions, $trueSetUserOptions);
            echo "\npgUpdateUserSubscriptions newUserOptions\n";
            print_r($newUserOptions);

            $jsonUserOptions['options'] = json_encode($newUserOptions);
            echo "\npgUpdateUserSubscriptions jsonUserOptions\n";
            print_r($jsonUserOptions);

            $res = $pg->pgUpdateDataArray($pg->table_users, $jsonUserOptions, ['user_id' => $userInfo['user_id']]);


            //if (isset($userTrue['spring'])) unset ($userTrue['spring']);
            /*$res = $pg->pgUpdateData(
                $pg->table_users,
                ['user_id', 'user_email', 'user_display_name', 'user_first_name', 'user_last_name', 'user_link', 'user_gender', 'user_birthday', 'user_locale', 'user_picture', 'spring', 'facebook', 'google', 'microsoft', 'last_login', 'last_active', 'user_cover'],
                $userTrue,
                'user_id',
                $pgUpdateUserInfo['user_id']);*/
            //$res = $pg->pgUpdateDataArray($pg->table_users, $userTrue, $pgUpdateUserInfo);
            //return $res;

        } else {
            echo "-----> Param userid empty";
            header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function pgUpdateUserMap($pgUpdateUserInfo, $info)
    {
        if (isset($pgUpdateUserInfo['user_id'])) {
            //==$userOld = $this->pgUserDataById($pgUpdateUserInfo);
            //echo "\npgUpdateUserInfo userOld\n";
            //print_r($userOld);
            //echo "\npgUpdateUserInfo pgUpdateUserInfo\n";
            //print_r($pgUpdateUserInfo);
            //==$userNew = array_merge($userOld, $pgUpdateUserInfo);
            //echo "\npgUpdateUserInfo userNew\n";
            //print_r($userNew);
            $pg = new PostgreSQL();
            $userTrue = $pg->pgPaddingItems($info);
            if (isset($userTrue['spring'])) unset ($userTrue['spring']);
            /*$res = $pg->pgUpdateData(
                $pg->table_users,
                ['user_id', 'user_email', 'user_display_name', 'user_first_name', 'user_last_name', 'user_link', 'user_gender', 'user_birthday', 'user_locale', 'user_picture', 'spring', 'facebook', 'google', 'microsoft', 'last_login', 'last_active', 'user_cover'],
                $userTrue,
                'user_id',
                $pgUpdateUserInfo['user_id']);*/
            $res = $pg->pgUpdateDataArray($pg->table_users, $userTrue, $pgUpdateUserInfo);
            return $res;

        } else {
            echo "-----> Param userid empty";
            //header('Location: https://vide.me/VictorLustig.html');
        }
    }

    public function pgUpdateUserSpring($pgUpdateUserSpring)
    {
        if (isset($pgUpdateUserSpring['user_id'])
            and isset($pgUpdateUserSpring['spring'])
            and isset($pgUpdateUserSpring['user_email'])
            and isset($pgUpdateUserSpring['user_password'])) {
            if ($this->checkSpringText($pgUpdateUserSpring)) {
                if ($this->pgUserLogin($pgUpdateUserSpring)) {
                    $springOwnerId = $this->pgSpringToUserId($pgUpdateUserSpring);
                    echo "-----> springOwnerId\n\r";
                    print_r($springOwnerId);
                    //if ($springOwnerId == $pgUpdateUserSpring['user_id']) {
                    if (!$springOwnerId or $springOwnerId == $pgUpdateUserSpring['user_id']) {
                        // unmach case reg
                        echo "\n\rIt`s you Spring\n\r";
                        //return false;
                        $pg = new PostgreSQL();
                        //$userTrue = $pg->pgPaddingItems($_POST);
                        $newUserInfo['spring'] = $pgUpdateUserSpring['spring'];
                        $res = $pg->pgUpdateDataArray($pg->table_users, $newUserInfo, ['user_id' => $pgUpdateUserSpring['user_id']]);
                        return $res;
                    } elseif ($springOwnerId) {
                        echo "\n\rSpring busy\n\r";
                        return false;
                    }/* elseif (!$springOwnerId) {
                    $pg = new PostgreSQL();
                    //$userTrue = $pg->pgPaddingItems($_POST);
                    $newUserInfo['spring'] = $pgUpdateUserSpring['spring'];
                    $res = $pg->pgUpdateDataArray($pg->table_users, $newUserInfo, ['user_id' => $pgUpdateUserSpring['user_id']]);
                    return $res;
                }*/
                } else {
                    echo 'Wrong password';
                    return false;
                }
            } else {
                echo "\n\rCheck spring\n\r";
                return false;
            }
            return false;
        } else {
            //echo "-----> Params  empty";
            //print_r($pgUpdateUserSpring);
            return false;
        }
    }

    public function userDeletion($userDeletion)
    {
        //echo "\n\ruserDeletion\n\r";
        //print_r($userDeletion);
        if (!empty($userDeletion['social_id'])
            and !empty($userDeletion['social_type'])) {
                $pg = new PostgreSQL();
                switch ($userDeletion['social_type']) {
                    case 'facebook':
                        $userInfo = $pg->pgGetUserInfoByFB_ID(['facebook' => $userDeletion['social_id']]);
                        break;
                    default:
                        echo "\n\ruserDeletion no case social_type\n\r";
                        break;
                }
                if (!empty($userInfo['user_id'])) {
                    //$this->pgProfileStat(['user_id' => $userInfo['user_id'], 'profile_state' => true]);
                    if (!empty($userDeletion['confirmation_code'])) {
                        $newUserDeleting['fud_id'] = $userDeletion['confirmation_code'];
                    } else {
                        $newUserDeleting['fud_id'] = $this->trueRandom();
                    }
                    $newUserDeleting['user_id'] = $userInfo['user_id'];
                    $newUserDeleting['facebook'] = $userDeletion['social_id']; // TODO: add google.. twitter...
                    $newUserDeleting['status'] = 1;
                    $res = $pg->pgAddData($pg->table_facebook_users_deletion, $newUserDeleting);
                    //print_r($res);
                    $sendmail = new sendmail();
                    if ($this->pgProfileStat(['user_id' => $userInfo['user_id'], 'profile_state' => 'true'])) {
                        $sendmail->SendStaffAlert(['message' => "Facebook deletion success: " . $userInfo['user_id']]);
                        return true;
                    } else {
                        $sendmail->SendStaffAlert(['message' => "Facebook deletion error: " . $userInfo['user_id']]);
                        return false;
                    }
                } else {
                    //echo "\n\ruserDeletion no user_id\n\r";
                    return false;
                }
            } else {
                //echo "\n\ruserDeletion empty social_id or social_type\n\r";
                return false;
            }
    }

    public function checkSpringText($checkSpringText)
    {
        if (strlen($checkSpringText['spring']) > 24) return false;
        if (strlen($checkSpringText['spring']) < 5) return false;
        //var_dump(preg_match('^\p{Latin}+$', $checkSpringText['spring']));  //int(0)
        //var_dump(preg_match('/^[\w\d\s.,-]*$/', $checkSpringText['spring']));  //int(0)
        //if (!preg_match('/^[\w\d\s.,-]*$/', $checkSpringText['spring'])) return false;
        if (!preg_match('/^[\w\d\s]*$/', $checkSpringText['spring'])) return false;
        //if (!preg_match('^\p{Latin}+$', $checkSpringText['spring'])) return false;
        return true;
    }

    public function ParseUnSetPushinbox($ParseUnSetPushinbox)
    {
        if (isset($ParseUnSetPushinbox['userid'])) {
            $ResultUserSessionToken = $this->ParseGetUserSessionToken(array(
                'UserObjectId' => $ParseUnSetPushinbox['userid']
            ));
            $UserSessionToken = $ResultUserSessionToken['results']['0']['UserSessionToken'];
            $UpdateUser = new parseUser;
            $UpdateUser->pushinbox = 0;
            $UpdateResult = $UpdateUser->update($ParseUnSetPushinbox['userid'], $UserSessionToken);
        } else {
        }
    }

    public function ParseUserLogin($ParseUserLogin)
    {
        if (isset($ParseUserLogin['username']) and isset($ParseUserLogin['password'])) {
            $ParseUserLogin['username'] = $this->PreEmail($ParseUserLogin['username']);
            $LoginUser = new parseUser;
            $LoginUser->username = $ParseUserLogin['username'];
            $LoginUser->password = $ParseUserLogin['password'];
            $ResultLogin = $LoginUser->login();
            return $ResultLogin->objectId;


        } else {
            echo "<br>ParseUserLogin Please enter your user name and password.<br>";
        }
    }

    public function ParseUserNew($ParseUserNew) // TODO: remove delete
    {
        if (!empty($ParseUserNew['userinvite'])) {
            $ParseUserNew['username'] = $this->CookieToUserIdAction($ParseUserNew['userinvite']);
        } else {
        }
        $ParseUserNew['username'] = $this->PreEmail($ParseUserNew['username']);
        $ResultUserId = $this->ParseUserNameExist($ParseUserNew);
        // Если пользователя с таким ящиком ещё нет
        if (empty($ResultUserId)) {
            // Если пользователь пришёл С Инвайтом
            if (isset($ParseUserNew['userinvite'])) {
                // Если пользователь пришёл с Паролем
                if (isset($ParseUserNew['password'])) {
                    $redis = new Predis\Client(array(
                        'scheme' => 'tcp',
                        'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
                        'port' => 14102,
                        'password' => '2IIg4aHASXmDpTai'
                    ));
                    $redis->del($UserCookie);
                    // Создать нового пользователя
                    $ResultUserId = $this->ParseUserEmailCheck($ParseUserNew);
                    // Отложить куку с userId
                    $this->RedisCheckCookie($ResultUserId);
                    // Выяснить расположение временного токена
                    $ParseGetUserSessionToken['UserObjectId'] = $ResultUserId;
                    $UserSessionToken = $this->ParseGetUserSessionToken($ParseGetUserSessionToken);
                    // Удалить одноразовый UserSessionToken пользователя из временной таблицы
                    $RemoveUserSessionToken = new parseObject('TempUserSessionToken');
                    $RemoveUserSessionToken->delete($UserSessionToken['results']['0']['objectId']);
                    echo "<br>U3EP CO3DAH 3AHOBO !!!" . $UserSessionToken['results']['0']['objectId'] . " YDALEH<br>";
                    header('Location: https://api.vide.me/pas/');
                } else {
                    echo "<br>Please enter your user password.<br>";
                    header('Location: https://vide.me/VictorLustig.html');
                }
                // Если пользователь пришёл БЕЗ Инвайта
            } else {
                // Если пользователь указал Почтовый адрес
                if (isset($ParseUserNew['username'])) {
                    $sendmail = new sendmail();
                    $sendmail->SendInvite(array('username' => $ParseUserNew['username']));
                    // Если пользователь НЕ указал Почтовый адрес
                } else {
                    echo "<br>Please enter your Email.<br>";
                    header('Location: https://vide.me/VictorLustig.html');
                }
            }
            // Если пользователя с таким ящиком уже есть
        } else {
            $ParseGetUserSessionToken['UserObjectId'] = $ResultUserId;
            $UserSessionToken = $this->ParseGetUserSessionToken($ParseGetUserSessionToken);
            // Если пользователь уже создан, но ещё не входил
            if (isset($UserSessionToken['results']['0']['UserObjectId'])) {
                // Пользователь задал Пароль
                if (isset($ParseUserNew['password'])) {
                    $ParseUserNew['userid'] = $ParseGetUserSessionToken['UserObjectId'];
                    // Создать нового пользователя
                    $ResultUserId = $this->ParseUpdateUserPas($ParseUserNew);
                    // Отложить куку с userId
                    $this->RedisCheckCookie($ResultUserId);
                    //echo "<br>U3EP PAHEE CO3DAH - PAROL YCTAHOBLEH !!!" . $UserSessionToken['results']['0']['objectId'] . "YDALEH";
                    header('Location: https://api.vide.me/pas/');
                    // Если Пароль не задан - отправить письмо
                } else {
                    // Если пользователь указал Почтовый адрес
                    if (!empty($ParseUserNew['username'])) {
                        $sendmail = new sendmail();
                        $sendmail->SendInvite(array('username' => $ParseUserNew['username']));
                    } else {
                        //echo "<br>Please enter your Email.<br>";
                        header('Location: https://vide.me/VictorLustig.html');
                    }
                    //echo "<br>U3EP PAHEE CO3DAH - PICMO OTPRABLEHO" . $ParseUserNew['username'] . ".<br>";
                    header('Location: https://vide.me/invite.html');
                }
            } else {
                //echo "<br>BOCCTAHOBNTE PAROL!!!";
                header('Location: https://api.vide.me/pas/restore/');
            }
        }
    }

    public function CookieToUserIdAction($CookieToUserIdAction)
    {
        $userId = $this->memcachedGetKey(["key" => $CookieToUserIdAction]);
        if (!empty($userId)) {
            return $userId;
        } else {
            $this->log->setEvent([
                "type" => "PEBKAC",
                "message" => "empty",
                "val" => $CookieToUserIdAction,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return false;
        }
    }

    // Готово

    public function ParseUserNameExist($ParseUserNameExist)
    {
        $FindUser = new parseQuery('users');
        $FindUser->where('username', $ParseUserNameExist['username']);
        $ConvParseData = $this->ConvParseData($FindUser->find());
        return $ConvParseData['results']['0']['objectId'];
    }

    public function ParseUserEmailCheck($ParseUserEmailCheck)
    {
        if (empty($ParseUserEmailCheck['username'])) $ParseUserEmailCheck['username'] = $ParseUserEmailCheck['useremail'];
        if (empty($ParseUserEmailCheck['password'])) $ParseUserEmailCheck['password'] = md5(rand());
        // Проверить вернулся-ли от провайдера OA ответ с ящиком
        // пользователя, нельзя пропустить пустой ящик, чтобы не создать
        // нового пользователя с пустым ящиком:
        // Если ящик есть:

        if (isset($ParseUserEmailCheck['username'])) {
            $ParseUserEmailCheck['username'] = $this->PreEmail($ParseUserEmailCheck['username']);
            // Проверка существования пользователя
            // Если оприделён $Socialprefix, пройти по полной программе
            if (!empty($ParseUserEmailCheck['socialprefix'])) {
                $FindUser = new parseQuery('users');
                $FindUser->where($ParseUserEmailCheck['socialprefix'], $ParseUserEmailCheck['socialid']);
                $ResultFindUser = $this->ConvParseData($FindUser->find());
                // Проверить есть-ли у нас такой пользователь с $SocialID
                $socialprefix = $ParseUserEmailCheck['socialprefix'];
                if (empty($ResultFindUser['results']['0']["$socialprefix"])) {
                    // Если нет у нас такого пользователя с $SocialID
                    // Проверить есть-ли у нас такой почтовый ящик
                    $ResultUserEmail = $this->ParseUserNameExist($ParseUserEmailCheck);
                    // Если нет пользователя с таким ящиком - создать пользователя:
                    if (empty($ResultUserEmail)) {
                        $NewUser = new parseUser;
                        $NewUser->username = $ParseUserEmailCheck['username'];
                        $NewUser->password = $ParseUserEmailCheck['password'];
                        $NewUser->UserDisplayName = $ParseUserEmailCheck['userdisplayname'];
                        $NewUser->UserFirstName = $ParseUserEmailCheck['userfirstname'];
                        $NewUser->UserLastName = $ParseUserEmailCheck['userlastname'];
                        $NewUser->UserLink = $ParseUserEmailCheck['userlink'];
                        $NewUser->UserGender = $ParseUserEmailCheck['usergender'];
//						$NewUser->UserTimeZone = $ParseUserEmailCheck['usertimezone'];
                        $NewUser->UserLocale = $ParseUserEmailCheck['userlocale'];
                        $NewUser->UserPicture = $ParseUserEmailCheck['userpicture'];
                        if ($ParseUserEmailCheck['socialprefix'] == "google_") {
                            $NewUser->google_ = $ParseUserEmailCheck['socialid'];
                        }
                        if ($ParseUserEmailCheck['socialprefix'] == "facebook_") {
                            $NewUser->facebook_ = $ParseUserEmailCheck['socialid'];
                        }
                        if ($ParseUserEmailCheck['socialprefix'] == "microsoft_") {
                            $NewUser->microsoft_ = $ParseUserEmailCheck['socialid'];
                        }
                        $ResultNewUser = $NewUser->signup();
                        /*
                                                $ResultNewUser = $NewUser->signup(array(
                                                    'UserDisplayName' => $ParseUserEmailCheck['userdisplayname'],
                                                    'UserFirstName' => $ParseUserEmailCheck['userfirstname'],
                                                    'UserLastName' 	=> $ParseUserEmailCheck['userlastname'],
                                                    'UserLink' 	=> $ParseUserEmailCheck['userlink'],
                                                    'UserGender' 	=> $ParseUserEmailCheck['usergender'],
                                                    //'UserEmail' 	=> $ParseUserEmailCheck['password'],
                                                    'UserTimeZone' 	=> $ParseUserEmailCheck['usertimezone'],
                                                    'UserLocale' 	=> $ParseUserEmailCheck['userlocale'],
                                            //		'UserPicture' 	=> $ParseUserEmailCheck['userpicture'],
                                                    $ParseUserEmailCheck['socialprefix']	=> $ParseUserEmailCheck['socialid']
                                        ));
                        */
                        $LoginResults = $this->ParseGetUserSessionToken(array(
                            'username' => $ParseUserEmailCheck['username'],
                            'password' => $ParseUserEmailCheck['password']
                        ));
                        $this->ParseSetUserSessionToken(array(
                            'UserObjectId' => $LoginResults->objectId,
                            'UserSessionToken' => $LoginResults->sessionToken
                        ));
                    } else {
                        return $this->ParseUserNameExist($ParseUserEmailCheck);
                    }
                    return $ResultNewUser->objectId;
                    // Конец проверки на существование socialID
                } else {
                    // Если у нас уже есть пользователь с таким socialID,
                    // вернуть его objectId
                    return $this->ParseUserNameExist($ParseUserEmailCheck);
                }
            } else {
                // Если не оприделён $Socialprefix, просто проверить UserEmail
                $ResultUserEmail = $this->ParseUserNameExist($ParseUserEmailCheck);
                // Если нет пользователя с таким ящиком - создать пользователя:
                if (empty($ResultUserEmail)) {
                    $NewUser = new parseUser;
                    $NewUser->username = $ParseUserEmailCheck['username'];
                    $NewUser->password = $ParseUserEmailCheck['password'];
                    $NewUser->UserDisplayName = $ParseUserEmailCheck['userdisplayname'];
                    $NewUser->UserFirstName = $ParseUserEmailCheck['userfirstname'];
                    $NewUser->UserLastName = $ParseUserEmailCheck['userlastname'];
                    $NewUser->UserLink = $ParseUserEmailCheck['userlink'];
                    $NewUser->UserGender = $ParseUserEmailCheck['usergender'];
//					$NewUser->UserTimeZone = $ParseUserEmailCheck['usertimezone'];
                    $NewUser->UserLocale = $ParseUserEmailCheck['userlocale'];
                    $NewUser->UserPicture = $ParseUserEmailCheck['userpicture'];
                    $ResultNewUser = $NewUser->signup();
                    /*
                                        $ResultNewUser = $NewUser->signup(array(
                                            'UserDisplayName' => $ParseUserEmailCheck['userdisplayname'],
                                            'UserFirstName' => $ParseUserEmailCheck['userfirstname'],
                                            'UserLastName' 	=> $ParseUserEmailCheck['userlastname'],
                                            'UserLink' 	=> $ParseUserEmailCheck['userlink'],
                                            'UserGender' 	=> $ParseUserEmailCheck['usergender'],
                                            //'UserEmail' 	=> $ParseUserEmailCheck['password'],
                                            'UserTimeZone' 	=> $ParseUserEmailCheck['usertimezone'],
                                            'UserLocale' 	=> $ParseUserEmailCheck['userlocale'],
                                            'UserPicture' 	=> $ParseUserEmailCheck['userpicture'],
                                            $ParseUserEmailCheck['socialprefix']	=> $ParseUserEmailCheck['socialid']
                                    ));
                    */
                    // Вот здесь запрашивается Session-Token
                    // нового пользователя и сохраняется вместе с
                    // objectId в тайный класс Parse
                    $LoginResults = $this->ParseGetUserSessionToken(array(
                        'username' => $ParseUserEmailCheck['username'],
                        'password' => $ParseUserEmailCheck['password']
                    ));
                    $resultSetUserSessionToken = $this->ParseSetUserSessionToken(array(
                        'UserObjectId' => $LoginResults->objectId,
                        'UserSessionToken' => $LoginResults->sessionToken
                    ));
                    return $ResultNewUser->objectId;
                }
                // Если ЕСТЬ пользователь с таким именем - вернуть результат objectId выборки
                return $ResultUserEmail;
            }
        }
    }

    public function ParseSetUserSessionToken($ParseSetUserSessionToken)
    {
        // Записать Session-Token пользователя
        if (!empty($ParseSetUserSessionToken['UserObjectId']) and !empty($ParseSetUserSessionToken['UserSessionToken'])) {
            // Если есть objectId и sessionToken записать их в основную таблицу
            $UserSessionToken = new parseObject('UserSessionToken');
            $UserSessionToken->UserObjectId = $ParseSetUserSessionToken['UserObjectId'];
            $UserSessionToken->UserSessionToken = $ParseSetUserSessionToken['UserSessionToken'];
            $UserSessionToken->save();
            // objectId и sessionToken записать во временную таблицу
            $TempUserSessionToken = new parseObject('TempUserSessionToken');
            $TempUserSessionToken->UserObjectId = $ParseSetUserSessionToken['UserObjectId'];
            $TempUserSessionToken->UserSessionToken = $ParseSetUserSessionToken['UserSessionToken'];
            $TempUserSessionToken->save();
        }
    }

    public function RedisCheckCookie($objectId) // TODO: remove delete
    {
        // TODO: Поставить обращение в редис на try
        $redis = new Predis\Client(array(
            'scheme' => 'tcp',
            'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
            'port' => 14102,
            'password' => '2IIg4aHASXmDpTai'
        ));
        $user_cookie = md5(rand());
        $redis->set($user_cookie, $objectId);
        $redis->expire($user_cookie, 1209600);
        // Откладываем куку пользователю 60×60×24×14 = 1209600
        // поставить 1 вместо 0 --------------------------------------------->
        setcookie("vide_nad", $user_cookie, time() + 1209600, "/", "vide.me", 0);
        $this->log->setEvent([
            "type" => "success",
            "message" => "cookie",
            "val" => $objectId,
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);
        return $user_cookie;
    }

    public function RedisAddArray($RedisAddArray)
    {
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        //$redis->set($RedisAddArray['key'], $RedisAddArray["value"]);
        //$redis->set('pop_items', json_encode([$resTrendsTags[0]['tag'] => $res0, $resTrendsTags[1]['tag'] => $res1, $resTrendsTags[2]['tag'] => $res2]));
        echo "\r\nRedisAddArray RedisAddArray\r\n";
        print_r($RedisAddArray);
        $res = $redis->get($RedisAddArray["key"]);
        echo "\r\nRedisAddArray res\r\n";
        print_r($res);
        if (!empty($res)) {
            echo "\r\nRedisAddArray no empty\r\n";
            if (is_array($res)) {
                echo "\r\nRedisAddArray res array\r\n";
            } else {
                echo "\r\nRedisAddArray res no array\r\n";
            }
            //$res2 = json_decode($res);
            //$res2 = json_decode($res, true);
            $res2 = json_decode($res);
            echo "\r\nRedisAddArray res2\r\n";
            print_r($res2);
            if (!is_array($res2)) {
                echo "\r\nRedisAddArray res2 no array\r\n";
                //$redis->set($RedisAddArray['key'], json_encode(array_merge(json_decode($res), $RedisAddArray["value"])));
                //$res3 = $res2[] = $RedisAddArray["value"];
                //$res3 = $res2[] = json_decode($RedisAddArray["value"]);
                //$res3 = json_encode($RedisAddArray["value"]);
                /*$res3 = json_encode($RedisAddArray["value"], true); // no
                echo "\r\nRedisAddArray res3\r\n";
                print_r($res3);*/
                //$res7 = $res2[] = $res3;
                //$res7 = $res[] = $res3;
                $res8 = [];
                //$res8[] = $res3;
                $res8[] = $res2;
                //$res8[] = $res3;
                $res8[] = $RedisAddArray["value"];
                echo "\r\nRedisAddArray res8\r\n";
                print_r($res8);
                $redis->set($RedisAddArray['key'], json_encode($res8));
            } else {
                echo "\r\nRedisAddArray res2 array\r\n";
                $res2[] = $RedisAddArray["value"];
                echo "\r\nRedisAddArray res2\r\n";
                print_r($res2);
                //$res8 = $res2;
                $redis->set($RedisAddArray['key'], json_encode($res2));
            }
            //$res9 = array_merge($res2, $res3);
            /*$res9 = array_merge($res2, $res8);
            echo "\r\nRedisAddArray res9\r\n";
            print_r($res9);*/
            //$redis->set($RedisAddArray['key'], json_encode($res2[] = $RedisAddArray["value"]));
            //$redis->set($RedisAddArray['key'], json_encode($res8));
            //$redis->set($RedisAddArray['key'], json_encode($res9));
        } else {
            $res5 = [];
            echo "\r\nRedisAddArray empty\r\n";
            //$res4 = json_encode($RedisAddArray["value"], true);
            //$res4 = json_encode($RedisAddArray["value"]);
            /*$res4 = $RedisAddArray["value"];
            echo "\r\nRedisAddArray res4\r\n";
            print_r($res4);*/
            //$res5[] = $res4;
            $res5[] = $RedisAddArray["value"];
            echo "\r\nRedisAddArray res5\r\n";
            print_r($res5);
            //$redis->set($RedisAddArray['key'], json_encode($RedisAddArray["value"]));
            $res = [];
            $redis->set($RedisAddArray['key'], json_encode($res[] = $RedisAddArray["value"]));
        }
        $redis->expire($RedisAddArray['key'], 60 * 60 * 24 * 14);
    }

    public function RedisExpUpdate($RedisExpUpdate, $day = 1)
    {
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        //$redis->set($RedisAddArray['key'], $RedisAddArray["value"]);
        //$redis->set('pop_items', json_encode([$resTrendsTags[0]['tag'] => $res0, $resTrendsTags[1]['tag'] => $res1, $resTrendsTags[2]['tag'] => $res2]));
        //echo "\r\nRedisExpUpdate RedisExpUpdate\r\n";
        //print_r($RedisExpUpdate);
        $res = $redis->get($RedisExpUpdate["key"]);
        //echo "\r\nRedisAddArray res\r\n";
        //print_r($res);
        if (!empty($res)) {
            //echo "\r\nRedisExpUpdate no empty\r\n";
            $redis->expire($RedisExpUpdate["key"], 60 * 60 * 24 * $day);
            return true;
        } else {
            //echo "\r\nRedisExpUpdate empty\r\n";
            return false;
        }
    }

    public function ParseUpdateUserPas($ParseUpdateUserPas)
    {

        if (isset($ParseUpdateUserPas['userid'])) {
            $HTML = new HTML();
            if (empty($ParseUpdateUserPas['newusername'])) {
                $ParseUpdateUserPas['newusername'] = $ParseUpdateUserPas['username'];
            }
            if (empty($ParseUpdateUserPas['newpassword'])) {
                $ParseUpdateUserPas['newpassword'] = $ParseUpdateUserPas['password'];
            }
            $TempUserSessionToken = $this->ParseGetUserSessionToken(array(
                'UserObjectId' => $ParseUpdateUserPas['userid']
            ));
            $UpdateUser = new parseUser;
            if (!empty($TempUserSessionToken['results']['0']['UserSessionToken'])) {
                $userId = $TempUserSessionToken['results']['0']['UserObjectId'];
                $UserSessionToken = $TempUserSessionToken['results']['0']['UserSessionToken'];
                // Удалить одноразовый UserSessionToken пользователя из временной таблицы
                $UserSessionTokenRemove = new parseObject('TempUserSessionToken');
                $UserSessionTokenRemove->delete($TempUserSessionToken['results']['0']['objectId']);
            } else {
                // Если установленны имя и пароль пользователя
                $UpdateUser->username = $ParseUpdateUserPas['username'];
                $UpdateUser->password = $ParseUpdateUserPas['password'];
///				$ResultLogin 	  = $UpdateUser->login();
                try {
                    $ResultLogin = $UpdateUser->login();
                } catch (Exception $e) {
                    $HTML->HTMLEchoErrorLogin(array(
                        'error' => $e->getMessage()
                    ));
                    exit;
                }
                $userId = $ResultLogin->objectId;
                $UserSessionToken = $ResultLogin->sessionToken;
            }
            if (empty($ParseUpdateUserPas['newspring'])) {
                $UpdateUser->data = array(
                    'username' => $ParseUpdateUserPas['newusername'],
                    'password' => $ParseUpdateUserPas['newpassword'],
                    //'email' 	=> $ParseUpdateUserPas['newusername']
                );
                $UpdateResult = $UpdateUser->update($userId, $UserSessionToken);
                $HTML->HTMLEchoPasUpdate(array(
                    'date' => $UpdateResult->updatedAt
                ));
            } else {
                $ParseUpdateUserPas['newspring'] = $this->PreEmail($ParseUpdateUserPas['newspring']);
                $OvnerSpringId = $this->ParseSpringToUserId($ParseUpdateUserPas['newspring']);
                if (empty($OvnerSpringId) || ($userId == $OvnerSpringId)) {
                    $UpdateUser->data = array(
                        'username' => $ParseUpdateUserPas['newusername'],
                        'password' => $ParseUpdateUserPas['newpassword'],
                        //'email' 	=> $ParseUpdateUserPas['newusername'],
                        'spring' => $ParseUpdateUserPas['newspring']
                    );
                    $UpdateResult = $UpdateUser->update($userId, $UserSessionToken);
///			echo $UpdateResult->updatedAt;
                    $HTML->HTMLEchoSpringUpdate(array(
                        'spring' => $ParseUpdateUserPas['newspring']
                    ));
                } elseif ($userId != $OvnerSpringId) {
                    $HTML->HTMLEchoSpringUse(array(
                        'spring' => $ParseUpdateUserPas['newspring']
                    ));
                }
            }

        } else {
            echo "-----> Param empty";
        }
    }

    public function ParseSpringToUserId($ParseSpringToUserId)
    {
        if (!empty($ParseSpringToUserId)) {
            $ParseSpringToUserId = $this->PreEmail($ParseSpringToUserId);
            $FindUserSpring = new parseQuery('users');
            $FindUserSpring->where('spring', $ParseSpringToUserId);
            $ConvParseData = $this->ConvParseData($FindUserSpring->find());
            return $ConvParseData['results']['0']['objectId'];
        }
    }

    public function cbUserNew($cbUserNew)
    {
        echo "\r\n<hr>cbUserNew cbUserNew<br>";
        print_r($cbUserNew);
        if (!empty($cbUserNew['userinvite'])) {
            $cbUserNew[$this->userEmail] = $this->CookieToUserIdAction($cbUserNew['userinvite']);
        } else {
        }
        $cbUserNew[$this->userEmail] = $this->PreEmail($cbUserNew[$this->userEmail]);
        $ResultUserId = $this->cbUserDataByEmail($cbUserNew);
        echo "\r\n<hr>cbUserNew cbUserDataByEmail ResultUserId<br>";
        //if (isset($cbUserNew[$this->userPassword])) $cbUserNew[$this->userPassword] = password_hash($cbUserNew[$this->userPassword], PASSWORD_DEFAULT);
        if (isset($cbUserNew[$this->userPassword])) $cbUserNew[$this->userPassword] = $this->getPassHash($cbUserNew[$this->newUserPassword]);

        if (empty($ResultUserId[$this->userEmail])) {
            // Если пользователя с таким ящиком ещё нет
            echo "\r\n<hr>cbUserNew userEmail empty<br>";
            print_r($ResultUserId[$this->userEmail]);

            if (!empty($cbUserNew['userinvite'])) {
                // Если пользователь пришёл С Инвайтом
                if (isset($cbUserNew[$this->userPassword])) {
                    // Если пользователь пришёл с Паролем
                    /*$redis = new Predis\Client(array(
                        'scheme' => 'tcp',
                        'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
                        'port' => 14102,
                        'password' => '2IIg4aHASXmDpTai'
                    ));
                    $redis->del($cbUserNew['userinvite']);*/
                    // Стереть Инвайт пользователя из memcached
                    $this->memcachedRemoveKey(["key" => $cbUserNew['userinvite']]);
                    // Создать нового пользователя
                    $ResultUserId = $this->cbUserEmailCheck($cbUserNew); // TODO: Wrong
                    // Отложить куку с userId
                    echo "\r\n<hr>cbUserNew cbUserEmailCheck ResultUserId<br>";
                    print_r($ResultUserId);
                    //$this->RedisCheckCookie($ResultUserId);
                    $this->memcachedCheckCookie(["value" => $ResultUserId]);
                    /*
                    // Выяснить расположение временного токена
                    $ParseGetUserSessionToken['UserObjectId'] = $ResultUserId;
                    $UserSessionToken = $this->ParseGetUserSessionToken($ParseGetUserSessionToken);
                    // Удалить одноразовый UserSessionToken пользователя из временной таблицы
                    $RemoveUserSessionToken = new parseObject('TempUserSessionToken');
                    $RemoveUserSessionToken->delete($UserSessionToken['results']['0']['objectId']);
                    */

                    $this->log->setEvent([
                        "type" => "success",
                        "message" => "set",
                        "val" => $this->userEmail,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);


                    echo "<br>U3EP CO3DAH 3AHOBO !!!<br>";
                    header('Location: https://api.vide.me/pas/');
                } else {
                    echo "<br>Please enter your user password.<br>";
                    header('Location: https://vide.me/VictorLustig.html');
                }
                // Если пользователь пришёл БЕЗ Инвайта
            } else {
                // Если пользователь указал Почтовый адрес
                if (!empty($cbUserNew[$this->userEmail])) {
                    $sendmail = new sendmail();
                    $sendmail->SendInvite(array('username' => $cbUserNew[$this->userEmail]));
                    // Если пользователь НЕ указал Почтовый адрес
                } else {
                    echo "<br>Please enter your Email.<br>";
                    header('Location: https://vide.me/VictorLustig.html');
                }
            }
        } else {
            // Если пользователя с таким ящиком уже есть
            //$ParseGetUserSessionToken['UserObjectId'] = $ResultUserId;
            //$UserSessionToken = $this->ParseGetUserSessionToken($ParseGetUserSessionToken);

            $this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => "email isset in system",
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);

            //if (isset($UserSessionToken['results']['0']['UserObjectId'])) {
            if (empty($ResultUserId[$this->userPassword])) {
                // Если пользователь уже создан, но ещё не входил или не назначал пароль
                echo "<br>No set password<br>";

                $this->log->setEvent([
                    "type" => "info",
                    "message" => "set",
                    "val" => "email isset in system, pass - empty",
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);

                if (!empty($cbUserNew[$this->userPassword])) {
                    // Пользователь пришёл с Паролем
                    //$cbUserNew[$this->docId] = $ResultUserId->value->docId;
                    $cbUserNew[$this->docId] = $ResultUserId[$this->docId];
                    //$cbUserNew[$this->userPassword] = $cbUserNew[$this->userPassword];
                    /*echo "cbUpdateUserPas ";
                    print_r($cbUserNew);
                    exit;*/
                    // Обновить нового пользователя
                    $cbUserNew[$this->newUserPassword] = $cbUserNew[$this->userPassword];
                    // TODO: Тут что-то не так...
                    $ResultUserId = $this->cbUpdateUserPas($cbUserNew);
                    // Отложить куку с userId
                    //$this->RedisCheckCookie($ResultUserId);
                    $this->memcachedCheckCookie(["value" => $ResultUserId]);
                    //echo "<br>U3EP PAHEE CO3DAH - PAROL YCTAHOBLEH !!!" . $UserSessionToken['results']['0']['objectId'] . "YDALEH";

                    $this->log->setEvent([
                        "type" => "success",
                        "message" => "set",
                        "val" => $this->userPassword,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    header('Location: https://api.vide.me/pas/');
                } else {
                    // Если Пользователь пришёл без Пароля - отправить письмо
                    if (!empty($cbUserNew[$this->userEmail])) {
                        // Если пользователь указал Почтовый адрес
                        $sendmail = new sendmail();
                        $sendmail->SendInvite(array('username' => $cbUserNew[$this->userEmail]));
                    } else {
                        //echo "<br>Please enter your Email.<br>";
                        header('Location: https://vide.me/VictorLustig.html');
                    }
                    //echo "<br>U3EP PAHEE CO3DAH - PICMO OTPRABLEHO" . $ParseUserNew['username'] . ".<br>";
                    //header('Location: https://vide.me/invite.html');
                }
            } else {
                echo "<br>BOCCTAHOBNTE PAROL!!!";
                header('Location: https://api.vide.me/pas/restore/');
            }
        }
        print_r($ResultUserId);
        /*print_r($ResultUserId);
        echo "<br>ResultUserId<br>";
        print_r($ResultUserId->value->docId);
        exit;*/
    }
    /*
        public function cbSetNewUser($cbSetNewUser, $resultUserEmail)
        {
            // Проверить есть-ли у нас такой почтовый ящик
            // Если нет пользователя с таким ящиком - создать пользователя:
            if (empty($resultUserEmail)) {
                //echo "<br>Email free<hr>";
                $cbItems = $this->paddingCBData($cbSetNewUser);
                echo "<br>Here write to cb<hr>";
                print_r($cbItems);
                /*
                                        $bucket = $this->autoConnectToBucket(["bucket" => "user"]);
                                            $docId = $cbItems["document"][$this->welcome->userEmail];
                                            unset ($cbItems["document"][$this->welcome->userEmail]);
                                            $res = $bucket->upsert($docId, $cbItems["document"]);
                                        echo "\n\r<br>setDocument -----> res: ";
                                        print_r($res);
                                        echo "\n\r<br>docId -----> " . $cbItems["document"][$this->docId];
                                        */
    /*            return $this->cbSetDocument($cbItems, ["bucket" => "user"]);

                // Вернуть userId
            } else {
                echo "<br>Email exist<hr>";
                return $resultUserEmail;
            }
        }*/

    public function pgUserNew($pgUserNew)
    {

        //error_reporting(0); // Turn off error reporting
        //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

        //echo "\r\n<hr>pgUserNew pgUserNew<br>";
        //print_r($pgUserNew);
        //exit;
        //$invite_to_email = $this->CookieToUserIdAction($pgUserNew['userinvite']);
        $invite_to_email = $this->memcachedGetKey(['key' => $pgUserNew['userinvite']]);
        //echo "\r\n<hr>pgUserNew invite_to_email<br>";
        //print_r($invite_to_email);
        if (!empty($pgUserNew['userinvite'])) {
            //$pgUserNew['user_email'] = $this->CookieToUserIdAction($pgUserNew['userinvite']);
            $pgUserNew['user_email'] = $this->memcachedGetKey(['key' => $pgUserNew['userinvite']]);
        } else {
        }
        $pgUserNew['user_email'] = $this->PreEmail($pgUserNew['user_email']);
        $ResultUserId = $this->pgUserDataByEmail($pgUserNew);
        //echo "\r\n<hr>pgUserNew cbUserDataByEmail ResultUserId<br>";
        //print_r($ResultUserId);
        //if (isset($pgUserNew[$this->userPassword])) $pgUserNew[$this->userPassword] = password_hash($pgUserNew[$this->userPassword], PASSWORD_DEFAULT);
        if (isset($pgUserNew['user_new_password'])) $pgUserNew['user_password'] = $this->getPassHash($pgUserNew['user_new_password']);

        if (empty($ResultUserId['user_email'])) {
            // Если пользователя с таким ящиком ещё нет
            //echo "\r\n<hr>pgUserNew userEmail empty<br>";
            //print_r($ResultUserId['user_email']);

            if (!empty($pgUserNew['userinvite'])) {
                // Если пользователь пришёл С Инвайтом
                if (isset($pgUserNew['user_password'])) {
                    // Если пользователь пришёл с Паролем
                    /*$redis = new Predis\Client(array(
                        'scheme' => 'tcp',
                        'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
                        'port' => 14102,
                        'password' => '2IIg4aHASXmDpTai'
                    ));
                    $redis->del($pgUserNew['userinvite']);*/
                    // Стереть Инвайт пользователя из memcached
                    $this->memcachedRemoveKey(["key" => $pgUserNew['userinvite']]);
                    //echo "\r\n<hr>pgUserNew pre create<br>";
                    //print_r($pgUserNew);
                    // Создать нового пользователя
                    $userId = $this->pgUserEmailCheck($pgUserNew); // TODO: Wrong
                    // Отложить куку с userId
                    //echo "\r\n<hr>pgUserNew cbUserEmailCheck ResultUserId<br>";
                    //print_r($ResultUserId);
                    // 22042018 $userId = $this->pgUpdateUserPas($pgUserNew);
                    $userId = $this->pgUpdateUserPas($pgUserNew);
                    //???$userId = $this->pgSetUserPassword($pgUserNew);
                    //echo "\r\n<hr>pgUserNew cbUserEmailCheck ResultUserId<br>";
                    //print_r($ResultUserId);
                    //$this->RedisCheckCookie($ResultUserId);
                    $this->memcachedCheckCookie(["value" => $userId]);
                    /*
                    // Выяснить расположение временного токена
                    $ParseGetUserSessionToken['UserObjectId'] = $ResultUserId;
                    $UserSessionToken = $this->ParseGetUserSessionToken($ParseGetUserSessionToken);
                    // Удалить одноразовый UserSessionToken пользователя из временной таблицы
                    $RemoveUserSessionToken = new parseObject('TempUserSessionToken');
                    $RemoveUserSessionToken->delete($UserSessionToken['results']['0']['objectId']);
                    */
                    /*$this->log->setEvent([
                        "type" => "success",
                        "message" => "set",
                        "val" => $this->userEmail,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);*/
                    //echo "<br>U3EP CO3DAH 3AHOBO !!!<br>";
                    header('Location: https://api.vide.me/pas/info/');
                } else {
                    //echo "<br>Please enter your user password.<br>";
                    header('Location: https://www.vide.me/web/enter/');
                }
                // Если пользователь пришёл БЕЗ Инвайта
            } else {
                // Если пользователь указал Почтовый адрес
                if (!empty($pgUserNew['user_email'])) {
                    // TODO: Это вообще не срабатывает <--- wrong | work
                    $pgUserNew['userinvite'] = md5($_SERVER['HTTP_X_FORWARDED_FOR']);
                    //echo "\r\n<hr>pgUserNew _SERVER['HTTP_X_FORWARDED_FOR'] 1<br>";
                    //print_r($_SERVER['HTTP_X_FORWARDED_FOR']);
                    //echo "\r\n<hr>pgUserNew memcachedSetKey 1<br>";
                    //print_r(['key' => $pgUserNew['userinvite'],
                    //    'value' => $pgUserNew['user_email']]);
                    $this->memcachedSetKey(['key' => $pgUserNew['userinvite'],
                        'value' => $pgUserNew['user_email']]);

                    //$getRredis = new Redis();
                    //$redis = $getRredis->redisConnect();
                    //$redis->set($pgUserNew['userinvite'], $pgUserNew['user_email']);
                    //$redis->expire($pgUserNew['userinvite'], 60 * 60 * 24 * 14);

                    $sendmail = new sendmail();
                    // Вообще первый раз
                    $sendmail->SendInvite(['userinvite' => $pgUserNew['userinvite'],
                        'username' => $pgUserNew['user_email']]);
                    // Если пользователь НЕ указал Почтовый адрес
                } else {
                    //echo "<br>Please enter your Email.<br>";
                    header('Location: https://www.vide.me/web/enter/');
                }
            }
        } else {
            // Если пользователя с таким ящиком уже есть
            //$ParseGetUserSessionToken['UserObjectId'] = $ResultUserId;
            //$UserSessionToken = $this->ParseGetUserSessionToken($ParseGetUserSessionToken);

            /*$this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => "email isset in system",
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/

            //if (isset($UserSessionToken['results']['0']['UserObjectId'])) {
            if (empty($ResultUserId['user_password'])) {
                // Если пользователь уже создан, но ещё не входил или не назначал пароль
                //echo "<br>No set password<br>";

                /*$this->log->setEvent([
                    "type" => "info",
                    "message" => "set",
                    "val" => "email isset in system, pass - empty",
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);*/

                if (!empty($pgUserNew['user_password'])) {
                    /* 22042018
                     * if (!empty($pgUserNew['userinvite'])) {
                        $this->pgSetUserPassword($pgUserNew);

                    } else {*/
                    // Пользователь пришёл с Паролем
                    //$pgUserNew[$this->docId] = $ResultUserId->value->docId;
                    $pgUserNew['user_id'] = $ResultUserId['user_id'];
                    //$pgUserNew[$this->userPassword] = $pgUserNew[$this->userPassword];
                    /*echo "cbUpdateUserPas ";
                    print_r($pgUserNew);
                    exit;*/
                    // Обновить нового пользователя
                    $pgUserNew['user_new_password'] = $pgUserNew['user_password'];
                    // TODO: Тут что-то не так...
                    $userId = $this->pgUpdateUserPas($pgUserNew);
                    // Отложить куку с userId
                    //$this->RedisCheckCookie($ResultUserId);
                    $this->memcachedCheckCookie(["value" => $userId]);
                    //echo "<br>U3EP PAHEE CO3DAH - PAROL YCTAHOBLEH !!!" . $UserSessionToken['results']['0']['objectId'] . "YDALEH";

                    /*$this->log->setEvent([
                        "type" => "success",
                        "message" => "set",
                        "val" => $this->userPassword,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);*/
                    //echo "<br>if (!empty(pgUserNew[user_password])) {<br>";
                    header('Location: https://api.vide.me/pas/info/');
                    //}
                } else {
                    // Если Пользователь пришёл без Пароля - отправить письмо
                    if (!empty($pgUserNew['user_email'])) {
                        // Если пользователь указал Почтовый адрес
                        // TODO: Это вообще не срабатывает nooo
                        //==$pgUserNew['userinvite'] = md5($_SERVER['HTTP_X_FORWARDED_FOR']);
                        //echo "\r\n<hr>pgUserNew _SERVER['HTTP_X_FORWARDED_FOR'] 1<br>";
                        //print_r($_SERVER['HTTP_X_FORWARDED_FOR']);
                        //echo "\r\n<hr>pgUserNew memcachedSetKey 2<br>";
                        //print_r(['key' => $pgUserNew['userinvite'],
                        //   'value' => $pgUserNew['user_email']]);
                        //==$this->memcachedSetKey(['key' => $pgUserNew['userinvite'],
                        //==    'value' => $pgUserNew['user_email']]);

                        //$getRredis = new Redis();
                        //$redis = $getRredis->redisConnect();
                        //$redis->set($pgUserNew['userinvite'], $pgUserNew['user_email']);
                        //$redis->expire($pgUserNew['userinvite'], 60 * 60 * 24 * 14);

                        // Это работает когда пользователь пытается создать заново свой ящик
                        //==$sendmail = new sendmail();
                        //==$sendmail->SendInvite(['userinvite' => $pgUserNew['userinvite'],
                        //==    'username' => $pgUserNew['user_email']]);
                    } else {
                        //echo "<br>Please enter your Email.<br>";
                        header('Location: https://www.vide.me/web/enter/');
                    }
                    //echo "<br>U3EP PAHEE CO3DAH - PICMO OTPRABLEHO" . $ParseUserNew['username'] . ".<br>";
                    // Это работает когда пользователь пытается создать заново свой ящик
                    //echo " Это работает когда пользователь пытается создать заново свой ящик";
                    //header('Location: https://vide.me/invite.html');
                    header('Location: https://api.vide.me/pas/restore/');
                }
            } else {
                //echo "<br>BOCCTAHOBNTE PAROL!!!";
                header('Location: https://api.vide.me/pas/restore/');
            }
        }
    }

    public function cbUserDataByEmail($cbUserDataByEmail)
    {
        //==echo "\r\n<hr><b>cbUserDataByEmail</b> cbUserDataByEmail<br>";
        //==print_r($cbUserDataByEmail);
        //$bucket = $this->autoConnectToBucket(["bucket" => "user"]);
        //return $this->cbGet($bucket, $cbUserDataByEmail[$this->userEmail]);
        //print_r($this->cbGet($this->autoConnectToBucket(["bucket" => "user"]), $cbUserDataByEmail[$this->userEmail]));
        //$res = $this->cbGet($this->autoConnectToBucket(["bucket" => "user"]), $cbUserDataByEmail[$this->userEmail]);
        /*echo "\r\n<hr><b>cbUserIdByEmail res</b><br>";
        var_dump($res);
        echo "\r\n<hr><b>cbUserIdByEmail res</b><br>";*/

        return $this->cbGet($this->autoConnectToBucket(["bucket" => "user"]), $cbUserDataByEmail[$this->userEmail]);
        /*        try {
                    $res = $bucket->get($cbUserDataByEmail[$this->userEmail]);
                    echo "\r\n<hr><b>cbUserIdByEmail res</b><br>";
                    var_dump($res);
                    echo "\r\n<hr><b>cbUserIdByEmail res->value</b><br>";
                    var_dump($res->value);
                    //$convUserData = $this->ConvParseData($res->value);
                    //$convUserData = $this->SharePreParseData($res->value);
                    //$convUserData = json_decode($res->value);
                    //$t1 = $res->value;
                    //$convUserData = $this->objectToArray($res->value);
                    //$convUserData = $this->objectToArray($t1);
                    //$convUserData = json_decode($this->objectToArray($res));
                    //$convUserData = $this->objectToArray(json_decode($this->objectToArray($res->value)));
                    //$convUserData = $this->objectToArray(json_decode($res->value));
                    //$convUserData = (array)$res->value;
                    //$convUserData = $this->ConvParseData($res);
                    //$convUserData = json_decode($res->value);
                    //$convUserData = json_decode($t1);
                    $convUserData = json_decode($res->value, true);
                    //$convUserData2 = $this->objectToArray($convUserData);

                    //echo "\r\n<br>cbUserIdByEmail (array)convUserData<br>";
                    //echo "\r\n<br>cbUserIdByEmail SharePreParseData<br>";
                    //echo "\r\n<br><b>cbUserIdByEmail json_decode</b><br>";
                    echo "\r\n<br><b>cbUserIdByEmail json_decode, true</b><br>";
                    //echo "\r\n<br>cbUserIdByEmail json_decode(objectToArray)<br>";
                    //echo "\r\n<hr><b>cbUserIdByEmail objectToArray var_dump</b><br>";
                    var_dump($convUserData);
                    //echo "\r\n<br><b>cbUserIdByEmail objectToArray2</b><br>";
                    //var_dump($convUserData2);

                    //echo "\r\n<br>cbUserIdByEmail objectToArray(json_decode<br>";
                    //echo "\r\n<br>cbUserIdByEmail objectToArray(json_decode(this->objectToArray<br>";
        //            $convUserData = json_decode($convUserData);
        //            echo "\r\n<hr><b>cbUserIdByEmail convUserData</b><br>";
        //            var_dump($convUserData);
                    //print_r($convUserData["value"]);
                    //echo $convUserData["userPassword"];
                    //if ($res->value->docId) return $res;
                    //if ($res->value->docId) return $convUserData;
                    if ($res->value) return $convUserData;
                } catch (Exception $e) {
                    echo "Not found. "; //. $e->getMessage();
                }*/
        //echo "UserData ERROR";
        //return false;
    }

    public function pgUserDataByEmail($pgUserDataByEmail)
    {
        $pg = new PostgreSQL();
        $resultUser = $pg->pgOneDataByColumn([
            'table' => $pg->getTableUsers(),
            'find_column' => 'user_email',
            'find_value' => $pgUserDataByEmail['user_email']]);
        return $resultUser;
    }

    public function pgUserDataById($pgUserDataById)
    {
        $pg = new PostgreSQL();
        $resultUser = $pg->pgOneDataByColumn([
            //'table' => $pg->getTableUsers(),
            'table' => 'users',
            'find_column' => 'user_id',
            'find_value' => $pgUserDataById['user_id']]);
        return $resultUser;
    }

    public function cbUserEmailCheck($cbUserEmailCheck)
    {
        //$ps = new parseSync();
        //if (empty($cbUserEmailCheck[$this->userEmail])) 	$cbUserEmailCheck['username'] = $cbUserEmailCheck['useremail'];
        // Проверить вернулся-ли от провайдера OA ответ с ящиком
        // пользователя, нельзя пропустить пустой ящик, чтобы не создать
        // нового пользователя с пустым ящиком:
        // Если ящик есть:

        if (isset($cbUserEmailCheck[$this->userEmail])) { // TODO: if !empty
            $this->log->setEvent([
                "type" => "attempt",
                "message" => "set",
                "val" => $cbUserEmailCheck[$this->userEmail],// . " soc.id:" . $cbUserEmailCheck[$this->socialPrefix],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            //echo "Email present.<br><hr>";
            $cbUserEmailCheck[$this->userEmail] = $this->PreEmail($cbUserEmailCheck[$this->userEmail]);
            // Проверка существования пользователя
            // Если оприделён $Socialprefix, пройти по полной программе
            $resultUserEmail = $this->cbUserDataByEmail($cbUserEmailCheck);
            //echo "\r\n<br><b>cbUserEmailCheck</b> resultUserEmail<br>";
            //print_r($resultUserEmail);
            if (!empty($cbUserEmailCheck[$this->socialPrefix])) {
                // Если пользователь пришёл с $socialprefix
                $this->log->setEvent([
                    "type" => "info",
                    "message" => "set",
                    "val" => $cbUserEmailCheck[$this->socialPrefix],
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                //$socialprefix = $cbUserEmailCheck[$this->socialPrefix];
                //echo "\r\n<br><b>cbUserEmailCheck cbUserEmailCheck[this->socialPrefix]</b><br>";
                //print_r($cbUserEmailCheck[$this->socialPrefix]);
                // Запросить socialprefix используя View
                $bucket = $this->autoConnectToBucket(["bucket" => "user"]);
                $query = CouchbaseViewQuery::from("user", $cbUserEmailCheck[$this->socialPrefix])->key($cbUserEmailCheck[$this->socialId])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
                try {
                    //$res = $bucket->query($query);
                    $res = $this->SharePreParseData($bucket->query($query));
                } catch (Exception $e) {
                    //return false;
                }
                /*$resConv = $this->ConvParseData($res->value);
                $this->log->setEvent([
                    "res" => "stack",
                    "type" => "info",
                    "message" => "OA",
                    "val" => print_r($resConv),
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);*/
                //$res2 = $this->ConvParseData($res);
                //print_r($res["rows"][0]["value"]["$socialprefix"]);
                //echo "\r\n<br><b>cbUserEmailCheck cbUserEmailCheck[this->socialId]</b><br>";
                //print_r($cbUserEmailCheck[$this->socialId]);
                //echo "\r\n<br><b>cbUserEmailCheck res</b><br>";
                //print_r($res);
                //exit();
                //$socialprefix = $cbUserEmailCheck[$this->socialPrefix];
                if (empty($res["rows"][0]["value"][$cbUserEmailCheck[$this->socialPrefix]])) {
                    // Если нет пользователя с таким socialId
                    $this->log->setEvent([
                        "type" => "info",
                        "message" => "free",
                        "val" => $cbUserEmailCheck[$this->socialPrefix],
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    //echo "SocialId prefix free<br><hr>";
                    if (empty($resultUserEmail[$this->docId])) {
                        // Если ящик свободен


                        //==$this->cbSetNewUser($cbUserEmailCheck, $resultUserEmail[$this->docId]); //<--- так было и работало
                        $cbUserEmailCheck[$this->type] = "user";
                        //return $this->cbSetDocument($cbUserEmailCheck, ["bucket" => "user"]);
                        $setRes = $this->cbSetDocument($cbUserEmailCheck, ["bucket" => "user"]);
                        $this->log->setEvent([
                            "res" => "stack",
                            "type" => "attempt",
                            "message" => "OA",
                            "val" => print_r($setRes),
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                        return $setRes;
                        //return $ResultNewUser->objectId;
                    } else {
                        // Если ящик НЕ свободен
                        $resultUserEmail[$cbUserEmailCheck[$this->socialPrefix]] = $cbUserEmailCheck[$this->socialId];
                        $this->cbUpdateDocument($resultUserEmail, ["bucket" => "user"]);
                    }

                    // Конец проверки на существование socialId
                } else {
                    // Если у нас уже есть пользователь с таким socialID,
                    // вернуть его objectId
                    $this->log->setEvent([
                        "type" => "info",
                        "message" => "busy",
                        "val" => $cbUserEmailCheck[$this->socialPrefix],
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    //echo "<br>SocialId <b>$socialprefix</b> no empty<hr>";
                    //echo "\r\n<hr><b>cbUserEmailCheck</b> resultUserEmail<br>";
                    //print_r($resultUserEmail);
                    return $resultUserEmail[$this->docId];
                }
            } else {
                // Если пользователь пришёл БЕЗ $Socialprefix, просто проверить userEmail
                if (!empty($resultUserEmail[$this->docId])) {
                    //==echo "Email busy.<br><hr>";
                    $this->log->setEvent([
                        "type" => "info",
                        "message" => "busy",
                        "val" => $cbUserEmailCheck[$this->userEmail],
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    return $resultUserEmail[$this->docId];
                } else {
                    $this->log->setEvent([
                        "type" => "info",
                        "message" => "free",
                        "val" => $cbUserEmailCheck[$this->userEmail],
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    //echo "No SocialId prefix.<br> Set new email<hr>";
                    if (empty($cbUserEmailCheck[$this->userPassword])) $cbUserEmailCheck[$this->userPassword] = $this->trueRandom();
                    //$this->cbSetNewUser($cbUserEmailCheck, $resultUserEmail[$this->docId]); //<--- так было и работало
                    $cbUserEmailCheck[$this->type] = "user";
                    return $this->cbSetDocument($cbUserEmailCheck, ["bucket" => "user"]);
                }
            }
            return false;
        } else {
            return false;
        }
    }

    public function ddbUserEmailCheck($ddbUserEmailCheck)
    {
        // Проверить вернулся-ли от провайдера OA ответ с ящиком
        // пользователя, нельзя пропустить пустой ящик, чтобы не создать
        // нового пользователя с пустым ящиком:
        // Если ящик есть:
        //error_reporting(0); // Turn off error reporting
        //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors
        //echo "ddbUserEmailCheck ddbUserEmailCheck \n\r";
        //print_r($ddbUserEmailCheck);
        $ddb = new DynamoDB();

        if (!empty($ddbUserEmailCheck->userEmail)) {
            $ddbUserEmailCheck->userEmail = $this->PreEmail($ddbUserEmailCheck->userEmail);
            $resultUserEmail = $this->ddbUserDataByEmail($ddbUserEmailCheck);
            //echo "ddbUserEmailCheck ddbUserDataByEmail \n\r";
            //print_r($resultUserEmail);
            if (!empty($ddbUserEmailCheck->socialPrefix)) {
                // Если пользователь пришёл с socialPrefix
                // Запросить socialPrefix используя Scan
                $resObject = $this->ddbUserDataSocId($ddbUserEmailCheck);
                $res = $this->ConvParseData($resObject);
                //echo "ddbUserEmailCheck ddbUserDataSocId \n\r";
                //print_r($res);
                if (empty($res[$ddbUserEmailCheck->socialPrefix])) {
                    //echo "ddbUserEmailCheck ddbUserDataSocId empty\n\r";

                    // Если нет пользователя с таким socialId
                    //echo "SocialId prefix free<br><hr>";
                    if (empty($resultUserEmail->userEmail)) {
                        //echo "ddbUserEmailCheck resultUserEmail->userEmail empty\n\r";
                        // Если ящик свободен
                        // Cоздать пользователя
                        $setRes = $ddb->newUser($ddbUserEmailCheck);
                        //echo "ddbUserEmailCheck newUser setRes\n\r";
                        //print_r($setRes);
                        return $setRes;
                    } else {
                        //echo "ddbUserEmailCheck Email busy \n\r";
                        // Если ящик НЕ свободен
                        // TODO: Сделать обновить пользователя
                        /*$resultUserEmail[$cbUserEmailCheck[$this->socialPrefix]] = $cbUserEmailCheck[$this->socialId];
                        $this->cbUpdateDocument($resultUserEmail, ["bucket" => "user"]);*/
                        return $resultUserEmail->userId;
                    }
                    // Конец проверки на существование socialId
                } else {
                    // Если у нас уже есть пользователь с таким socialID,
                    // вернуть его objectId
                    return $resultUserEmail->userId;
                }
            } else {
                // Если пользователь пришёл БЕЗ $Socialprefix, просто проверить userEmail
                //echo "ddbUserEmailCheck no socialPrefix \n\r";

                if (!empty($resultUserEmail->userId)) {
                    //echo "ddbUserEmailCheck resultUserEmail[this->userId] YES \n\r";

                    return $resultUserEmail->userId;
                } else {
                    //echo "ddbUserEmailCheck resultUserEmail[this->userId] NO \n\r";
                    if (empty($ddbUserEmailCheck->userPassword)) $ddbUserEmailCheck->userPassword = $this->trueRandom();
                    // TODO: Добавить случайный пароль
                    //$cbUserEmailCheck[$this->type] = "user";
                    //return $this->cbSetDocument($cbUserEmailCheck, ["bucket" => "user"]);
                    return $ddb->newUser($ddbUserEmailCheck);
                }
            }
        }

    }

    public function pgUserEmailCheck_before17012020($pgUserEmailCheck)
    {
        // Проверить вернулся-ли от провайдера OA ответ с ящиком
        // пользователя, нельзя пропустить пустой ящик, чтобы не создать
        // нового пользователя с пустым ящиком:
        // Если ящик есть:
        //error_reporting(0); // Turn off error reporting
        //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors
        //echo "pgUserEmailCheck \n\r";
        //print_r($pgUserEmailCheck);
        $pg = new PostgreSQL();

        if (!empty($pgUserEmailCheck['user_email'])) {
            $pgUserEmailCheck['user_email'] = $this->PreEmail($pgUserEmailCheck['user_email']);
            //$resultUserEmail = $this->ddbUserDataByEmail($pgUserEmailCheck['user_email']);
            //$resultUserEmail = $pg->pgOneDataByColumn('users', 'user_email', $pgUserEmailCheck['user_email']);
            $resultUserEmail = $this->pgUserDataByEmail($pgUserEmailCheck);
            /*$parts = explode("@", $pgUserEmailCheck['user_email']);
            $artName = $parts[0] . $this->trueRandom(3);
            //$pgUserEmailCheck['spring'] = $parts[0] . $this->trueRandom(3);
            $pgUserEmailCheck['spring'] = $artName;*/
            $pgUserEmailCheck['spring'] = $this->emailToSpring($pgUserEmailCheck);
            //$pgUserEmailCheck['user_display_name'] = $artName;
            if (empty($pgUserEmailCheck['user_display_name'])) {
                $pgUserEmailCheck['user_display_name'] = $this->emailToSpring($pgUserEmailCheck);
            }
            //echo "pgUserEmailCheck parts \n\r";
            //print_r($parts);
            //echo "pgUserEmailCheck pgUserEmailCheck \n\r";
            //print_r($pgUserEmailCheck);
            ////exit;
            //echo "pgUserEmailCheck resultUserEmail \n\r";
            //print_r($resultUserEmail);
            if (!empty($pgUserEmailCheck['social_prefix'])) {
                // Если пользователь пришёл с socialPrefix
                // Запросить socialPrefix используя Scan
                $res = $pg->pgOneDataByColumn([
                    'table' => $pg->getTableUsers(),
                    'find_column' => $pgUserEmailCheck['social_prefix'],
                    'find_value' => $pgUserEmailCheck['social_id']]);
                //$res = $this->ConvParseData($resObject);
                //echo "pgUserEmailCheck pgUserDataSocId \n\r";
                //print_r($res);
                if (empty($res[$pgUserEmailCheck['social_prefix']])) {
                    //echo "ddbUserEmailCheck ddbUserDataSocId empty\n\r";
                    // Если нет пользователя с таким socialId
                    //echo "SocialId prefix free<br><hr>";
                    if (empty($resultUserEmail['user_email'])) {
                        //echo "pgUserEmailCheck resultUserEmail userEmail empty\n\r";
                        // Если ящик свободен
                        // Cоздать пользователя
                        $setRes = $pg->newUser($pgUserEmailCheck);
                        //echo "ddbUserEmailCheck newUser setRes\n\r";
                        //print_r($setRes);
                        return $setRes;
                    } else {
                        //echo "ddbUserEmailCheck Email busy \n\r";
                        // Если ящик НЕ свободен
                        // TODO: Сделать обновить пользователя
                        /*$resultUserEmail[$cbUserEmailCheck[$this->socialPrefix]] = $cbUserEmailCheck[$this->socialId];
                        $this->cbUpdateDocument($resultUserEmail, ["bucket" => "user"]);*/
                        return $resultUserEmail['user_id'];
                    }
                    // Конец проверки на существование socialId
                } else {
                    // Если у нас уже есть пользователь с таким socialID,
                    // вернуть его objectId
                    return $resultUserEmail['user_id'];
                }
            } else {
                // Если пользователь пришёл БЕЗ $Socialprefix, просто проверить userEmail
                //echo "ddbUserEmailCheck no socialPrefix \n\r";

                if (!empty($resultUserEmail['user_id'])) {
                    //echo "pgUserEmailCheck resultUserEmail user_id YES \n\r";
                    return $resultUserEmail['user_id'];
                } else {
                    //echo "pgUserEmailCheck resultUserEmail user_id NO \n\r";
                    if (empty($pgUserEmailCheck['user_password'])) $pgUserEmailCheck['user_password'] = $this->trueRandom();
                    // TODO: Добавить случайный пароль
                    //$cbUserEmailCheck[$this->type] = "user";
                    //return $this->cbSetDocument($cbUserEmailCheck, ["bucket" => "user"]);
                    return $pg->newUser($pgUserEmailCheck);
                }
            }
        } else {
            echo 'No user_email';
        }
    }

    public function pgUserEmailCheck($pgUserEmailCheck)
    {
        $pg = new PostgreSQL();
        if (!empty($pgUserEmailCheck['user_email'])) {
            $pgUserEmailCheck['user_email'] = $this->PreEmail($pgUserEmailCheck['user_email']);
            $resultUserEmail = $this->pgUserDataByEmail($pgUserEmailCheck);
            $pgUserEmailCheck['spring'] = $this->emailToSpring($pgUserEmailCheck);
            if (empty($pgUserEmailCheck['user_display_name'])) {
                $pgUserEmailCheck['user_display_name'] = $pgUserEmailCheck['spring'];
            }
            if (!empty($resultUserEmail['user_id'])) {
                //echo "pgUserEmailCheck resultUserEmail user_id YES \n\r";
                return $resultUserEmail['user_id'];
            } else {
                //echo "pgUserEmailCheck resultUserEmail user_id NO \n\r";
                if (empty($pgUserEmailCheck['user_password'])) $pgUserEmailCheck['user_password'] = $this->trueRandom();
                return $pg->newUser($pgUserEmailCheck);
            }
        } else {
            echo 'No user_email';
            return false;
        }
    }

    public function emailToSpring($emailToSpring)
    {
        if (!empty($emailToSpring['user_email'])) {
            $parts = explode("@", $emailToSpring['user_email']);
            $result = preg_replace("/[^a-zA-Z0-9]+/", "", $parts[0]);
            return substr($result . $this->trueRandom(3), 0, 16);
        } else {
            return false;
        }
    }

    public function getTime()
    {
        $trueTimeObj = new DateTime();
        $trueTime = $trueTimeObj->format('Y-m-d\TH:i:s.u');
        return $trueTime;
    }

    public function getTimeForPG_tz()
    {
        // http://php.net/manual/ru/function.date-default-timezone-set.php
        $trueTimeObj = new DateTime();
        $trueTime = $trueTimeObj->format('Y-m-d H:i:s.uO');
        //$trueTime = substr($trueTime,0, -2);
        return $trueTime;
    }
    public function convTimeForPG_tz($convTimeForPG_tz)
    {
        // http://php.net/manual/ru/function.date-default-timezone-set.php
        $trueTimeObj = new DateTime($convTimeForPG_tz);
        $trueTime = $trueTimeObj->format('Y-m-d H:i:s.uO');
        //$trueTime = substr($trueTime,0, -2);
        return $trueTime;
    }
    public function rand_date_between($min_date, $max_date) {
        /* Gets 2 dates as string, earlier and later date.
           Returns date in between them.
        https://stackoverflow.com/questions/14186800/random-time-and-date-between-2-date-values
        */
        $min_epoch = strtotime($min_date);
        $max_epoch = strtotime($max_date);
        $rand_epoch = rand($min_epoch, $max_epoch);
        //return date('Y-m-d H:i:s', $rand_epoch);
        //return date('Y-m-d H:i:sO', $rand_epoch);
        return date('Y-m-d H:i:s.uO', $rand_epoch);
    }
    public function timeShift($date, $vel = 12) // Work, not used? // used 08062022
    {
        $datetime = new DateTime($date);
        //echo "\n\ttimeShift datetime: " . $datetime;
        //$timeShift= date("Y-m-d H:i:s.uO", strtotime("+1 month", $date));
        //echo "\n\ttimeShift timeShift: " . $timeShift;
        if ($vel > 0) {
            //echo "\n\ttimeShift vel > 0: " . $vel;
            $datetime->modify('+' . $vel . ' day');
        } else {
            //echo "\n\ttimeShift vel < 0: " . $vel;
            //$datetime->modify('-' . $vel . ' day');
            $datetime->modify($vel . ' day');
        }
        return $datetime->format('Y-m-d H:i:s.uO');
    }
    public function ddbUserDataByEmail($ddbUserDataByEmail)
    {
        if (!empty($ddbUserDataByEmail->userEmail)) {
            $ddb = new DynamoDB();
            $res = $ddb->ddbGetIteratorScan('Users', 'userEmail', $ddbUserDataByEmail->userEmail);
            $res = json_decode($res);
            return $res;
        } else {
            return false;
        }
    }

    public function ddbUserDataSocId($ddbUserDataSocId)
    {
        if (!empty($ddbUserDataSocId->socialPrefix)) {
            $ddb = new DynamoDB();
            $res = $ddb->ddbGetIteratorScan('Users', $ddbUserDataSocId->socialPrefix, $ddbUserDataSocId->socialId);
            $res = json_decode($res);
            return $res;
        } else {
            return false;
        }
    }

    public function memcachedCheckCookie($memcachedCheckCookie)
    {
        // TODO: Поставить обращение в редис на try
        /*$redis = new Predis\Client(array(
            'scheme' => 'tcp',
            'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
            'port' => 14102,
            'password' => '2IIg4aHASXmDpTai'
        ));*/
        $key = $this->memcachedGetKey(["key" => $memcachedCheckCookie["value"]]);
        //echo "\r\n<hr><b>memcachedCheckCookie</b> memcachedGetKey<br>\n";
        //var_dump($key);
        /*$getmc = new GetMemcached();
        $mc = $getmc->getMemcached();*/
        if (!empty($key)) {
            /*$this->log->setEvent([
                "type" => "info",
                "message" => "set",
                "val" => $memcachedCheckCookie["value"],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            // ==== $user_cookie = $key;
            $user_cookie = $key;
        } else {
            /*$this->log->setEvent([
                "type" => "info",
                "message" => "empty",
                "val" => $memcachedCheckCookie["value"],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            $user_cookie = md5(rand());
        }
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        //$bucket = $this->autoConnectToBucket(["bucket" => "tickets"]);
        //$bucket->upsert($user_cookie, $memcachedCheckCookie["value"], ["expiry" => 60 * 60 * 24 * 14]);
        //echo "\r\n<hr><b>memcachedCheckCookie</b> user_cookie<br>\n";
        //var_dump($user_cookie);
        //echo "\r\n<hr><b>memcachedCheckCookie</b> memcachedCheckCookie[\"value\"]<br>\n";
        //var_dump($memcachedCheckCookie["value"]);
        //$mc->set($user_cookie, $memcachedCheckCookie["value"], 60 * 60 * 24 * 14);
        $redis->set($user_cookie, $memcachedCheckCookie["value"]);
        $redis->expire($user_cookie, 60 * 60 * 24 * 14);


        // Откладываем куку пользователю 60×60×24×14 = 1209600
        // поставить 1 вместо 0 --------------------------------------------->
        setcookie("vide_nad", $user_cookie, time() + 60 * 60 * 24 * 14, "/", "vide.me", true);
        //setcookie("vide_nad", $user_cookie, time() + 60 * 60 * 24 * 14, "/;SameSite=none", "vide.me", true);
        //setcookie("vide_nad", $user_cookie, time() + 60 * 60 * 24 * 14, "/", "vide.me", true, ['samesite' => 'None']);
        //setcookie("vide_nad", $user_cookie, time() + 60 * 60 * 24 * 14, "/", "www.vide.me", true);
        $this->log->setEvent([
            "type" => "success",
            "message" => "cookie",
            "val" => $user_cookie,
            "file" => $_SERVER["PHP_SELF"],
            "class" => __CLASS__,
            "funct" => __FUNCTION__
        ]);
        return $user_cookie;
    }

    public function memcachedSetKey($memcachedSetKey)
    {
        //echo "\r\n<hr>memcachedSetKey<br>";
        //print_r($memcachedSetKey);
        /*$bucket = $this->autoConnectToBucket(["bucket" => "tickets"]);
        $bucket->upsert($memcachedSetKey["key"], $memcachedSetKey["value"], ["expiry" => 60 * 60 * 24 * 14]);
        $getmc = new GetMemcached();
        $mc = $getmc->getMemcached();*/
        $getRredis = new RedisVideme();
        $redis = $getRredis->redisConnect();
        try {
            //$mc->set($memcachedSetKey["key"], $memcachedSetKey["value"], 60 * 60 * 24 * 14);
            $redis->set($memcachedSetKey["key"], $memcachedSetKey["value"]);
            $redis->expire($memcachedSetKey["key"], 60 * 60 * 24 * 14);
            return true;
        } catch (Exception $e) {
            //echo "Not found. " . $e->getMessage();
            $log = new log();
            $log->toFile(['service' => 'memcachedSetKey', 'type' => 'error', 'text' => 'memcachedSetKey error: key ' . $memcachedSetKey["key"] . ' value ' . $memcachedSetKey["value"]]);
            return false;
        }
    }

    public function cbUpdateUserPas($cbUpdateUserPas)
    {
        //echo "\r\n<hr>cbUpdateUserPas cbUpdateUserPas<br>";
        //print_r($cbUpdateUserPas);
        if (!empty($cbUpdateUserPas[$this->userEmail]) and isset($cbUpdateUserPas[$this->userPassword])) {
            // В запросе есть ящик и пароль
            $userData = $this->cbUserDataByEmail($cbUpdateUserPas);
            //$convUserInfo = $this->ConvParseData($resultUserId->value);
            /*echo "\r\n<br>cbUpdateUserPas userData<br>";
            print_r($userData);
            echo "\r\n<br>cbUpdateUserPas userData[this->userPassword]<br>";
            print_r($userData[$this->userPassword]);*/
            //exit; ////================
            //if (!empty($resultUserId->value->userPassword)) {
            //if (!empty($userData[$this->userPassword])) {
            if (!empty($userData[$this->userPassword]) and empty($cbUpdateUserPas[$this->newUserPassword])) {
                // Если пароль уже установлен и не нужно установить новый пароль
                if ($this->cbUserLogin($cbUpdateUserPas)) {
                    // Если проходит логин со старым паролем
                } else {
                    $this->log->setEvent([
                        "type" => "PEBKAC",
                        "message" => "false",
                        "val" => "Error login pair",
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    return false;
                }
            } else {
                // Если пароль ещё НЕ установлен

            }
            if (!empty($cbUpdateUserPas[$this->newUserPassword])) {
                // Если нужен новый пароль
                //$cbUpdateUserPas[$this->userPassword] = $cbUpdateUserPas["newUserPassword"]; // <--- ERROR
                $this->log->setEvent([
                    "type" => "attempt",
                    "message" => "set",
                    "val" => $this->newUserPassword,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                /*$userId = $this->CookieToUserId($this->GetUserId());
                echo "\r\n<br>cbUpdateUserPas $userId<br>";
                print_r($userId);
                if ($userId) {
                    // Если в данный момент пользователь авторизован
                    //$ownerId = $this->getConformity(["conformity" => ["type" => "conformity" . "-" . $userId]]);
                    $cbUpdateUserPas[$this->userPassword] = $cbUpdateUserPas[$this->newUserPassword];

                    /*
                    $resNewPass = $this->cbUpdateDocument($cbUpdateUserPas, ["bucket" => "user"]); // <<<<--------------------
                    if ($resNewPass) {
                        $this->log->setEvent([
                            "type" => "attempt",
                            "message" => "set",
                            "val" => $this->newUserPassword,
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                        return true;
                    } else {
                        $this->log->setEvent([
                            "type" => "error",
                            "message" => "set",
                            "val" => $this->newUserPassword,
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                    }
                    //==================/
                } else {
                    // Если в данный момент пользователь НЕ авторизован, но хочет сменить пароль
                    $this->log->setEvent([
                        "type" => "IDS",
                        "message" => "forgery",
                        "val" => $this->newUserPassword,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    return false;
                }*/
                //$cbUpdateUserPas[$this->userPassword] = $cbUpdateUserPas[$this->newUserPassword];
                /*if (strlen($cbUpdateUserPas[$this->newUserPassword]) > 70) exit("Password length > 70");
                $cbUpdateUserPas[$this->userPassword] = password_hash($cbUpdateUserPas[$this->newUserPassword], PASSWORD_DEFAULT);*/
                $cbUpdateUserPas[$this->userPassword] = $this->getPassHash($cbUpdateUserPas[$this->newUserPassword]);

            } else {
                // Пользователь пришёл без нового пароля
                /*$this->log->setEvent([
                    "type" => "PEBKAC",
                    "message" => "forgery",
                    "val" => $this->userPassword,
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                return false;*/
            }
            if (!empty($cbUpdateUserPas[$this->spring])) {
                // Если нужен новый спринг
                if (!$this->cbSpringToUserId($cbUpdateUserPas)) {
                    // Спринг свободен
                } else {
                    // Спринг занят
                    $this->log->setEvent([
                        "type" => "PEBKAC",
                        "message" => "busy",
                        "val" => $cbUpdateUserPas[$this->spring],
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    return false;
                }
            }
            // Работать сдесь
            unset ($cbUpdateUserPas[$this->newUserPassword]);
            unset ($cbUpdateUserPas["userinvite"]);
            unset ($cbUpdateUserPas["username"]);
            unset ($cbUpdateUserPas["password"]);

            /*echo "\r\n<hr><b>cbUpdateUserPas</b> cbUpdateUserPas<br>";
            print_r($cbUpdateUserPas);
            echo "\r\n<hr><b>cbUpdateUserPas</b> cbSetDocument<br>";*/
            //print_r($this->cbUpdateDocument($cbUpdateUserPas, ["bucket" => "user"])); // <<<<--------------------
            $this->cbUpdateDocument($cbUpdateUserPas, ["bucket" => "user"]); // <<<<--------------------

            $this->log->setEvent([
                "type" => "info",
                "message" => "success",
                "val" => $cbUpdateUserPas[$this->userEmail],
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return true;
        } else {
            $this->log->setEvent([
                "type" => "PEBKAC",
                "message" => "empty",
                "val" => $this->userEmail . ", " . $this->userPassword,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            return false;
        }

        /*                try {
                            $ResultLogin = $UpdateUser->login();
                        } catch (Exception $e) {
                            $HTML->HTMLEchoErrorLogin(array(
                                'error' => $e->getMessage()
                            ));
                            exit;
                        }
                        $userId = $ResultLogin->objectId;
                        $UserSessionToken = $ResultLogin->sessionToken;
                    }
                    if (empty($cbUpdateUserPas['newspring'])) {
                        $UpdateUser->data = array(
                            'username' => $cbUpdateUserPas['newusername'],
                            'password' => $cbUpdateUserPas['newpassword'],
                            //'email' 	=> $ParseUpdateUserPas['newusername']
                        );
                        $UpdateResult = $UpdateUser->update($userId, $UserSessionToken);
                        $HTML->HTMLEchoPasUpdate(array(
                            'date' => $UpdateResult->updatedAt
                        ));
                    } else {
                        $cbUpdateUserPas['newspring'] = $this->PreEmail($cbUpdateUserPas['newspring']);
                        $OvnerSpringId = $this->ParseSpringToUserId($cbUpdateUserPas['newspring']);
                        if (empty($OvnerSpringId) || ($userId == $OvnerSpringId)) {
                            $UpdateUser->data = array(
                                'username' => $cbUpdateUserPas['newusername'],
                                'password' => $cbUpdateUserPas['newpassword'],
                                //'email' 	=> $ParseUpdateUserPas['newusername'],
                                'spring' => $cbUpdateUserPas['newspring']
                            );
                            $UpdateResult = $UpdateUser->update($userId, $UserSessionToken);
        ///			echo $UpdateResult->updatedAt;
                            $HTML->HTMLEchoSpringUpdate(array(
                                'spring' => $cbUpdateUserPas['newspring']
                            ));
                        } elseif ($userId != $OvnerSpringId) {
                            $HTML->HTMLEchoSpringUse(array(
                                'spring' => $cbUpdateUserPas['newspring']
                            ));
                        }
                    }

                } else {
                    echo "-----> Param empty";
                }*/
    }

    public function pgUpdateUserPas($pgUpdateUserPas)
    {
        echo "\r\n<hr>pgUpdateUserPas <br>";
        print_r($pgUpdateUserPas);
        if (!empty($pgUpdateUserPas['user_email'])
            and (!empty($pgUpdateUserPas['user_password']) or !empty($pgUpdateUserPas['new_user_password']))) {
            // В запросе есть ящик и пароль
            //$pg = new PostgreSQL();
            //$userData = $this->pgUserDataByEmail($pgUpdateUserPas);
            //$userData = $pg->pgOneDataByColumn('users_prefer', 'user_email', $pgUpdateUserPas['user_email']);
            $userData = $this->pgUserPreferByEmail($pgUpdateUserPas['user_email']);
            echo "\r\n<hr><b>pgUpdateUserPas</b> userData<br>";
            print_r($userData);
            //$convUserInfo = $this->ConvParseData($resultUserId->value);
            //echo "\r\n<br>pgUpdateUserPas userData<br>";
            //print_r($userData);
            //echo "\r\n<br>pgUpdateUserPas userData[user_password]<br>";
            //print_r($userData[0]['user_password']);
            //exit; ////================
            //if (!empty($resultUserId->value->userPassword)) {
            //if (!empty($userData[$this->userPassword])) {
            $pg = new PostgreSQL();

            if (!empty($userData['user_password'])
                and empty($pgUpdateUserPas['new_user_password'])) {
                // Если пароль уже установлен и не нужно установить новый пароль
                if ($this->pgUserLogin($pgUpdateUserPas)) {
                    // Если проходит логин со старым паролем
                } else {
                    /*$this->log->setEvent([
                        "type" => "PEBKAC",
                        "message" => "false",
                        "val" => "Error login pair",
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);*/
                    return false;
                }
                if (!empty($pgUpdateUserPas['new_user_password'])) {
                    // Если нужен новый пароль
                    //$cbUpdateUserPas[$this->userPassword] = $cbUpdateUserPas["newUserPassword"]; // <--- ERROR
                    /*$this->log->setEvent([
                        "type" => "attempt",
                        "message" => "set",
                        "val" => $this->newUserPassword,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);*/
                    $pgUpdateUserPas['user_password'] = $this->getPassHash($pgUpdateUserPas['new_user_password']);
                } else {
                    // Пользователь пришёл без нового пароля
                    /*$this->log->setEvent([
                        "type" => "PEBKAC",
                        "message" => "forgery",
                        "val" => $this->userPassword,
                        "file" => $_SERVER["PHP_SELF"],
                        "class" => __CLASS__,
                        "funct" => __FUNCTION__
                    ]);
                    return false;*/
                    $pgUpdateUserPas['user_password'] = $this->getPassHash($pgUpdateUserPas['user_password']);
                }
                /*if (!empty($pgUpdateUserPas[$this->spring])) {
                    // Если нужен новый спринг
                    if (!$this->pgSpringToUserId($pgUpdateUserPas)) {
                        // Спринг свободен
                    } else {
                        // Спринг занят
                        $this->log->setEvent([
                            "type" => "PEBKAC",
                            "message" => "busy",
                            "val" => $pgUpdateUserPas[$this->spring],
                            "file" => $_SERVER["PHP_SELF"],
                            "class" => __CLASS__,
                            "funct" => __FUNCTION__
                        ]);
                        return false;
                    }
                }*/
                // Работать сдесь
                unset ($pgUpdateUserPas['new_user_password']);
                unset ($pgUpdateUserPas["userinvite"]);
                unset ($pgUpdateUserPas["username"]);
                unset ($pgUpdateUserPas["password"]);

                echo "\r\n<hr><b>pgUpdateUserPas</b> pgUpdateUserPas<br>";
                print_r($pgUpdateUserPas);
                //echo "\r\n<hr><b>pgUpdateUserPas</b> userData['user_id']<br>";
                //print_r($userData['user_id']);
                //echo "\r\n<hr><b>cbUpdateUserPas</b> cbSetDocument<br>";
                //print_r($this->cbUpdateDocument($cbUpdateUserPas, ["bucket" => "user"])); // <<<<--------------------
                //$this->pgUpdateDocument($pgUpdateUserPas, ["bucket" => "user"]); // <<<<--------------------
                $res = $pg->pgUpdateData($pg->table_users_prefer, 'user_password', $pgUpdateUserPas['user_password'], 'user_id', $userData['user_id']);
                //$res = $pg->pgUpdateData($pg->table_users_prefer, 'user_password', $pgUpdateUserPas['user_password'], 'user_id', $pgUpdateUserPas['user_id']);
                //echo "\r\n<hr><b>pgUpdateUserPas pgUpdateData </b> res <br> \r\n";
                //print_r($res);
                //echo "yes email new_user_password ";

                /*$this->log->setEvent([
                    "type" => "info",
                    "message" => "success",
                    "val" => $pgUpdateUserPas['user_email'],
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);*/
                return $userData['user_id'];
                //return $pgUpdateUserPas['user_id'];
            } else {
                // Если пароль ещё НЕ установлен
                //echo "no email new_user_password ";
                $userPrefer['user_id'] = $pgUpdateUserPas['user_id'];
                $userPrefer['user_password'] = $this->getPassHash($pgUpdateUserPas['new_user_password']);
                $userPrefer['user_email'] = $pgUpdateUserPas['user_email'];
                $pg->pgInsertData($pg->table_users_prefer, $userPrefer);
                return $pgUpdateUserPas['user_id'];
            }

        } else {
            /*$this->log->setEvent([
                "type" => "PEBKAC",
                "message" => "empty",
                "val" => $this->userEmail . ", " . $this->userPassword,
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            echo "no email pass";
            return false;
        }
    }

    public function reCAPTCHA()
    {
        /* reCAPTCHA start ****************************************************************************************************/
        $log = new log();
        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = $_POST['g-recaptcha-response'];
        } else {
            $captcha = false;
        }
        if (!$captcha) {
            //Do something with error
            echo 'error 1';
        } else {
            $secret = '6LfkLtQZAAAAAFehonX2t2wyNyts42elKTclJjnj';
            $response = file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
            );
            // use json_decode to extract json response
            $response = json_decode($response);
            if ($response->success === false) {
                //Do something with error
                echo 'error 2';
            }
        }
        //print_r($response);
        //print_r($response->score);

//... The Captcha is valid you can continue with the rest of your code
//... Add code to filter access using $response . score
        if ($response->success == true && $response->score <= 0.5) {
            //Do something to denied access
            echo 'denied access ';
            print_r($response);
            $log->toFile(['service' => 'reCAPTCHA', 'type' => 'alert', 'text' => $_REQUEST['username'] . ' score: ' . $response->score]);
            return false;
            //exit();
        } else {
            //return true;
            return $response;
        }
    }

    public function reCAPTCHAV2()
    {
        /* reCAPTCHA v2 start ****************************************************************************************************/
        $log = new log();
//Получаем пост от recaptcha
        $recaptcha = $_POST['g-recaptcha-response'];

//Сразу проверяем, что он не пустой
        if (!empty($recaptcha)) {
            //Получаем HTTP от recaptcha
            $recaptcha = $_REQUEST['g-recaptcha-response'];
            //Сюда пишем СЕКРЕТНЫЙ КЛЮЧ, который нам присвоил гугл
            $secret = '6LcjV-AZAAAAAMvEpmBlgJdTr5yQF8XCJ-BWJESf';
            //Формируем utl адрес для запроса на сервер гугла
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];

            //Инициализация и настройка запроса
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
            //Выполняем запрос и получается ответ от сервера гугл
            $curlData = curl_exec($curl);

            curl_close($curl);
            //Ответ приходит в виде json строки, декодируем ее
            $curlData = json_decode($curlData, true);

            //Смотрим на результат
            if ($curlData['success']) {
                //Сюда попадем если капча пройдена, дальше выполняем обычные
                //действия(добавляем коммент или отправляем письмо) с формой
                return $curlData;
            } else {
                //Капча не пройдена, сообщаем пользователю, все закрываем стираем и так далее
                $log->toFile(['service' => 'reCAPTCHAv2', 'type' => 'alert', 'text' => $_REQUEST['username']]);
                //return false;
                exit();
            }
        } else {
            //Капча не введена, сообщаем пользователю, все закрываем стираем и так далее
            $log->toFile(['service' => 'reCAPTCHAv2', 'type' => 'alert', 'text' => 'no response ' . $_REQUEST['username']]);
            //return false;
            echo 'reCAPTCHAv2 g-recaptcha-response empty';
            exit();
        }
    }

    public function pgSetUserPassword($pgSetUserPassword) // ??? Remove ???
    {
        echo "<br>pgSetUserPassword <br>";
        print_r($pgSetUserPassword);
        if (!empty($pgSetUserPassword['user_email']) and isset($pgSetUserPassword['user_password'])) {
            $userData = $this->pgUserPreferByEmail($pgSetUserPassword['user_email']);
            //if (empty($userData['user_password'])) {
            $userDataFull = $this->pgUserDataByEmail($pgSetUserPassword);
            $pgSetUserPassword['user_id'] = $userDataFull['user_id'];
            //$pgSetUserPassword['user_password'] = $this->getPassHash($pgSetUserPassword['user_password']);
            unset ($pgSetUserPassword['new_user_password']);
            unset ($pgSetUserPassword["userinvite"]);
            unset ($pgSetUserPassword["username"]);
            //unset ($pgSetUserPassword["password"]);
            echo "<br>pgSetUserPassword <br>";
            print_r($pgSetUserPassword);
            $pg = new PostgreSQL();
            //$res = $pg->pgUpdateData($pg->table_users_prefer, 'user_password', $pgUpdateUserPas['user_password'], 'user_id', $userData['user_id']);
            //exit;
            $res = $pg->pgAddData($pg->table_users_prefer, $pgSetUserPassword);
            print_r($res);
            // Почему-то сразу пароль не устанавливается, нужно запускать обновление пароля
            $res2 = $this->pgUpdateUserPas($pgSetUserPassword);
            print_r($res2);

            //}
        }
    }

    public function addToItems($addToItems)
    {
        $log = new log();
        $log->toFile(['service' => 'file', 'type' => '', 'text' => 'addToItems start ' . $addToItems['item_id']]);
        if (!empty($addToItems['owner_id'])) {
            if (!empty($addToItems['content'])) {
                $hashtagsExtractor = $this->hashtagsExtractor($addToItems['content']);
                $tagsAddToItems = $this->tagsAddToItems($hashtagsExtractor);
                //$add_tags = json_decode($tagsAddToItems['tags']);
                //$old_tags = json_decode($addToItems['tags']);
                //$new_tags = array_merge($old_tags, $add_tags);
                //echo "\n\raddToItems new_tags\n\r";
                //print_r($new_tags);
                //$addToItems['tags'] = json_encode($new_tags);
                $addToItems['tags'] = $this->tagsSplitter($addToItems, $tagsAddToItems);
            }
            $this->addTagsForItemV4($addToItems);
            if (empty($addToItems['item_id'])) $addToItems['item_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            $log->toFile(['service' => 'file', 'type' => '', 'text' => 'addToItems return ' . $addToItems['item_id']]);
            return $pg->pgAddData($pg->table_items, $addToItems);
        } else {
            $log->toFile(['service' => 'file', 'type' => 'error', 'text' => 'addToItems empty owner_id ' . $addToItems['item_id']]);
            return false;
        }
    }

    public function addTagsForItemV4($addTagsForItemV4)
    {
        echo "\n\raddTagsForItemV4 addTagsForItemV4 --------------\n\r";
        print_r($addTagsForItemV4);
        if (!empty($addTagsForItemV4['tags'])) {
            $pg = new PostgreSQL();
            //$article = new Article();
            $tagsArrayTemp1['tags'] = json_decode($addTagsForItemV4['tags'], true);
            echo "\n\raddTagsForItemV4 tagsArrayTemp1 --------------\n\r";
            print_r($tagsArrayTemp1);
            $tagsArrayTemp2 = $this->tagsAddToItems($tagsArrayTemp1['tags']);
            //--$tagsArrayTemp2 = $this->tagsAddToItems($addTagsForItem);
            //--$tagsArrayTemp2 = $this->tagsAddToItems($addTagsForItem['tags']);
            echo "\n\raddTagsForItemV4 tagsArrayTemp2 --------------\n\r";
            print_r($tagsArrayTemp2);
            //$tagsArray = json_encode($addTagsForItem['tags']);
            $tagsArray = json_decode($tagsArrayTemp2['tags'], true);

            //$tagsArray = $tagsArrayTemp3['tags'];

            //$tagsArray = $article->paddingTagsForItem($addTagsForItem['tags']); // Brasília -> [tags] => ["Bras\u00edlia"]
            echo "\n\raddTagsForItemV4 tagsArray --------------\n\r";
            print_r($tagsArray);
            if (!empty($tagsArray)) {
                foreach ($tagsArray as $key => $value) {
                    echo "\n\raddTagsForItem foreach tagsArray value --------------\n\r";
                    print_r($value);
                    if (!empty($value)) {
                        $user_items_tags['uit_set_id'] = $this->trueRandom();
                        $user_items_tags['user_id'] = $addTagsForItemV4['owner_id'];
                        $user_items_tags['item_id'] = $addTagsForItemV4['item_id'];
                        $user_items_tags['tag'] = $value;
                        echo "\n\raddTagsForItem user_items_tags --------------\n\r";
                        print_r($user_items_tags);
                        $pg->pgAddData($pg->table_users_items_tags_sets, $user_items_tags);

                        $Items_tags['it_id'] = $this->trueRandom();
                        $Items_tags['item_id'] = $addTagsForItemV4['item_id'];
                        $Items_tags['tag'] = $value;
                        echo "\n\raddTagsForItem Items_tags --------------\n\r";
                        print_r($Items_tags);
                        $pg->pgAddData($pg->table_items_tags, $Items_tags);
                    }
                }
            }
        }
    }

    public function hashtagsExtractor($hashtagsExtractor)
    {
        //echo "\n\rhashtagsExtractor hashtagsExtractor\n\r";
        //print_r($hashtagsExtractor);
        preg_match_all('/#([^\s]+)/', $hashtagsExtractor, $matches);
        //$hashtags = implode(',', $matches[1]);
        //echo "\n\rhashtagsExtractor hashtags\n\r";
        //print_r($hashtags);
        //echo "\n\rhashtagsExtractor matches\n\r";
        //print_r($matches);
        //if ($matches[1] === false) $matches[1] = '';
        return $matches[1];
    }

    public function addPartnersForItem($addPartnersForItem)
    {
        echo "\n\raddPartnersForItem addPartnersForItem --------------\n\r";
        print_r($addPartnersForItem);
        if (!empty($addPartnersForItem)) {
            $pg = new PostgreSQL();
            /*$partnersArray = json_decode($addPartnersForItem['partners'], true);
            echo "\n\raddPartnersForItem partnersArray --------------\n\r";
            print_r($partnersArray);*/
                foreach ($addPartnersForItem as $key => $value) {
                    echo "\n\raddPartnersForItem foreach partnersArray value --------------\n\r";
                    print_r($value);
                    /*if (!empty($value)) {
                        $user_items_tags['uit_set_id'] = $this->trueRandom();
                        $user_items_tags['user_id'] = $addPartnersForItem['owner_id'];
                        $user_items_tags['item_id'] = $addPartnersForItem['item_id'];
                        $user_items_tags['tag'] = $value;
                        echo "\n\raddTagsForItem user_items_tags --------------\n\r";
                        print_r($user_items_tags);
                        $pg->pgAddData($pg->table_users_items_tags_sets, $user_items_tags);

                        $Items_tags['it_id'] = $this->trueRandom();
                        $Items_tags['item_id'] = $addPartnersForItem['item_id'];
                        $Items_tags['tag'] = $value;
                        echo "\n\raddTagsForItem Items_tags --------------\n\r";
                        print_r($Items_tags);
                        $pg->pgAddData($pg->table_items_tags, $Items_tags);
                    }*/
                }
        }
    }

    public function tagsAddToItems($tagsAddToItems)
    {
        //echo "\n\rtagsAddToItems tagsAddToItems\n\r";
        //print_r($tagsAddToItems);
        $article = new Article();
        $retVal['tags'] = json_encode($article->paddingTagsForItem($tagsAddToItems)); // Brasília -> [tags] => ["Bras\u00edlia"]
        //echo "\n\rtagsAddToItems retVal\n\r";
        //print_r($retVal);
        return $retVal;
    }

    public function tagsSplitter($oldTagsArray, $newTagsArray)
    {
        //echo "\n\rtagsSplitter oldTagsArray\n\r";
        //print_r($oldTagsArray);
        //echo "\n\rtagsSplitter newTagsArray\n\r";
        //print_r($newTagsArray);
        if (!empty($oldTagsArray['tags']) and !empty($newTagsArray['tags'])) {
            $add_tags = json_decode($newTagsArray['tags']);
            $old_tags = json_decode($oldTagsArray['tags']);
            if ($add_tags === false) $add_tags = [];
            if ($old_tags === false) $old_tags = [];
            $new_tags = array_merge($old_tags, $add_tags);
            //echo "\n\rtagsSplitter json_encode(new_tags)\n\r";
            //print_r(json_encode($new_tags));
            return json_encode($new_tags);
        } elseif (!empty($newTagsArray['tags'])) {
            //echo "\n\rtagsSplitter newTagsArray['tags']\n\r";
            //print_r($newTagsArray['tags']);
            return $newTagsArray['tags'];
        } else {
            return false;
        }
    }

    public function addToMessages($addToMessages)
    {
        if (!empty($addToMessages['to_user_id'])) {
            if (empty($addToMessages['message_id'])) $addToMessages['message_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            return $pg->pgAddData($pg->table_messages, $addToMessages);
        } else {
            return false;
        }
    }

    public function addToSigns($addToSigns)
    {
        if (!empty($addToSigns['owner_id'])) {
            if (empty($addToSigns['sign_id'])) $addToSigns['sign_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            return $pg->pgAddData($pg->getTableSigns(), $addToSigns);
        } else {
            return false;
        }
    }

    public function addToAlbums($addToAlbums)
    {
        //echo "\n\raddToAlbums\n\r";
        //print_r($addToAlbums);
        if (!empty($addToAlbums['owner_id'])) {
            if (empty($addToAlbums['album_id'])) $addToAlbums['album_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            return $pg->pgAddData($pg->table_albums, $addToAlbums);
        } else {
            return false;
        }
    }

    public function addToService($addToService)
    {
        //echo "\n\raddToAlbums\n\r";
        //print_r($addToAlbums);
        if (!empty($addToService['owner_id']) and !empty($addToService['service_id'])) {
            if (empty($addToService['users_service_id'])) $addToService['users_service_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            return $pg->pgAddData('users_service', $addToService);
        } else {
            return false;
        }
    }

    public function addToEssence($addToEssence)
    {
        //echo "\n\raddToEssence\n\r";
        //print_r($addToEssence);
        if (!empty($addToEssence['owner_id']) and !empty($addToEssence['essence_id'])) {
            if (empty($addToEssence['ue_id'])) $addToEssence['ue_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            return $pg->pgAddData('users_essences', $addToEssence);
        } else {
            return false;
        }
    }

    public function addNewEssence($addNewEssence)
    {
        //echo "\n\raddToEssence\n\r";
        //print_r($addToEssence);
        if (!empty($addNewEssence['title'])) {
            if (empty($addNewEssence['essence_id'])) $addNewEssence['essence_id'] = $this->trueRandom();
            $addNewEssence['title'] = $this->essenceTitleCheck($addNewEssence);
            $pg = new PostgreSQL();
            $pg->pgAddData('essences', $addNewEssence);
            return $addNewEssence['essence_id'];
        } else {
            return false;
        }
    }

    public function essenceTitleCheck($essenceTitleCheck)
    {
        //echo "\n\raddToEssence\n\r";
        //print_r($addToEssence);
        if (!empty($essenceTitleCheck['title'])) {
            $essenceTitleCheck['title'] = $this->safetyTagsSlashesTrim32($essenceTitleCheck['title']);
            return ucfirst(strtolower($essenceTitleCheck['title']));
        } else {
            return false;
        }
    }

    public function addToTalent($addToTalent)
    {
        //echo "\n\raddToAlbums\n\r";
        //print_r($addToAlbums);
        if (!empty($addToTalent['owner_id']) and !empty($addToTalent['talent_id'])) {
            if (empty($addToTalent['users_talent_id'])) $addToTalent['users_talent_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            return $pg->pgAddData('users_talents', $addToTalent);
        } else {
            return false;
        }
    }

    public function addToPosts($addToPosts)
    {
        if (!empty($addToPosts['post_owner_id'])) {
            if (empty($addToPosts['post_id'])) $addToPosts['post_id'] = $this->trueRandom();
            $pg = new PostgreSQL();
            return $pg->pgAddData($pg->table_posts, $addToPosts);
        } else {
            return false;
        }
    }

    public function addToAlbumsSets($addToAlbumsSets)
    {
        //echo "\r\naddToAlbumsSets\r\n";
        //print_r($addToAlbumsSets);
        if (!empty($addToAlbumsSets['album_id'])
            and !empty($addToAlbumsSets['owner_id'])
            and !empty($addToAlbumsSets['item_id'])) {
            if (empty($addToAlbumsSets['albums_sets_id'])) $addToAlbumsSets['albums_sets_id'] = $this->trueRandom();
            $accessTemp["albums_sets_id"] = $addToAlbumsSets['albums_sets_id'];
            $accessTemp["album_id"] = $addToAlbumsSets["album_id"];
            $accessTemp["owner_id"] = $addToAlbumsSets["owner_id"];
            $accessTemp["item_id"] = $addToAlbumsSets["item_id"];
            $pg = new PostgreSQL();
            return $pg->pgAddData($pg->table_albums_sets, $accessTemp);
        } else {
            return false;
        }
    }

    public function addToTags($addToTags) // TODO: remove
    {
        //echo "\r\naddToTags\r\n";
        //print_r($addToTags);
        if (!empty($addToTags['item_id'])) {
            if (!empty($addToTags['tags'])) {
                $addToTagsTrue['item_id'] = $addToTags['item_id'];
                $addToTagsTrue['tags'] = $addToTags['tags'];
                /*$tags = $addToTags['tags'];
                echo "\r\naddToTags tags\t\n";
                var_dump($tags);
                //$tags = json_decode($addToTags['tags']);
                $tags = json_decode($tags, true);

                echo "\r\naddToTags json_decode tags\t\n";
                var_dump($tags);
                //$tagsA = array_slice($addToTags['tags'], 5);
                $tagsA = array_slice($tags, 5);
                //safetyTagsSlashesTrim32
                foreach ($tagsA as $key => $val) {
                    //$trimmed_array=array_map('trim',$fruit);
                    $tagsB[] = $this->safetyTagsSlashesTrim32($val);
                }
                $addToTagsTrue['tags'] = $tagsB;
                echo "\r\naddToTags addToTagsTrue\t\n";
                print_r($addToTagsTrue);
                exit();*/
                $pg = new PostgreSQL();
                return $pg->pgInsertTags($addToTagsTrue);
            } else {
                echo "\r\naddToTags tags empty\t\n";
                return false;
            }
        } else {
            return false;
        }
    }

    public function safetyTags($safetyTags)
    {
        //echo "\r\nsafetyTags safetyTags\t\n";
        //var_dump($safetyTags);
        $tagsA = array_slice($safetyTags, 0, 25);
        //echo "\r\nsafetyTags tagsA\t\n";
        //print_r($tagsA);
        foreach ($tagsA as $key => $val) {
            //$trimmed_array=array_map('trim',$fruit);
            $tagsB[] = $this->safetyTagsSlashesTrim32($val);
        }

        //echo "\r\nsafetyTags tagsB\t\n";
        //print_r($tagsB);
        //exit();
        return $tagsB;
    }

    public function cbUserLogin($cbUserLogin)
    {
        //==echo "\r\n<hr><b>cbUserLogin cbUserLogin</b><br>";
        //==var_dump($cbUserLogin);
        if (isset($cbUserLogin[$this->userEmail]) and isset($cbUserLogin[$this->userPassword])) {
            /*            $bucket = $this->autoConnectToBucket(["bucket" => "user"]);
                        try {
                            $res = $bucket->get($cbUserLogin[$this->userEmail]);
                            //$convert = $welcome->SharePreParseData($res->value);
                            //return $convert;
                            //print_r($res->value->docId);
                            //if ($res->value->docId) return $res->value->docId;
                        } catch (Exception $e) {
                            echo "User not found. "; //. $e->getMessage();
                            return false;
                        }
                        echo "\r\n<hr><b>cbUserLogin res</b><br>";
                        var_dump($res);
                        echo "\r\n<hr><b>cbUserLogin res->value->docId</b><br>";
                        var_dump($res->value["docId"]);*/
            $userData = $this->cbGet($this->autoConnectToBucket(["bucket" => "user"]), $cbUserLogin[$this->userEmail]);
            //==echo "\r\n<hr><b>cbUserLogin userData</b><br>";
            //==var_dump($userData);
            //if ($res->value->docId) {
            if ($userData[$this->docId]) {
                //if ($userData[$this->userEmail] == $cbUserLogin[$this->userEmail] and $userData[$this->userPassword] == $cbUserLogin[$this->userPassword]) {
                if (password_verify($cbUserLogin[$this->userPassword], $userData[$this->userPassword])) {
                    return $userData[$this->docId];
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            echo "<br>Please enter your user name and password.<br>";
            return false;
        }
    }

    public function ddbUserLogin($ddbUserLogin)
    {
        //==echo "\r\n<hr><b>cbUserLogin cbUserLogin</b><br>";
        //==var_dump($cbUserLogin);
        if (isset($ddbUserLogin[$this->userEmail]) and isset($ddbUserLogin[$this->userPassword])) {
            $ddb = new DynamoDB();
            $userData = $ddb->ddbGetByPrKeyOne('UsersPrefer', 'userEmail', $ddbUserLogin[$this->userEmail]);
            //$userDataObject = json_decode($userDataJson);
            // [] or '' DDB $userData = json_decode($userDataJson);
            //$userData = $this->ConvParseData($userDataJson);
            //$userData = $this->ConvParseData($userDataObject);
            //echo "\n\rddbUserLogin userData\n\r";
            //print_r($userData);
            //echo "\n\rddbUserLogin userData['userPassword']\n\r";
            //print_r($userData['userPassword']);
            if ($userData['userPassword']) {
                //if ($userData[$this->userEmail] == $cbUserLogin[$this->userEmail] and $userData[$this->userPassword] == $cbUserLogin[$this->userPassword]) {
                if (password_verify($ddbUserLogin[$this->userPassword], $userData['userPassword'])) {
                    //echo "\n\rddbUserLogin pass true\n\r";
                    return $userData['userId'];
                } else {
                    //echo "\n\rddbUserLogin pass false\n\r";
                    return false;
                }
            } else {
                //echo "\n\rddbUserLogin no pass\n\r";
                return false;
            }
        } else {
            echo "<br>Please enter your user name and password.<br>";
            return false;
        }
    }

    public function pgUserLogin($pgUserLogin)
    {
        //echo "\r\n<hr><b>pgUserLogin pgUserLogin</b><br>";
        //print_r($pgUserLogin);
        if (isset($pgUserLogin['user_email']) and isset($pgUserLogin['user_password'])) {
            $pgUserLogin['user_email'] = $this->PreEmail($pgUserLogin['user_email']);

            //$pg = new PostgreSQL();
            //$userData = $pg->pgOneDataByColumn('users_prefer', 'user_email', $pgUserLogin['user_email']);
            $userData = $this->pgUserPreferByEmail($pgUserLogin['user_email']);
            //echo "\n\rpgUserLogin userData\n\r";
            //print_r($userData);
            //echo "\n\rddbUserLogin userData['userPassword']\n\r";
            //print_r($userData['user_password']);
            if ($userData['user_password']) {
                //if ($userData[$this->userEmail] == $cbUserLogin[$this->userEmail] and $userData[$this->userPassword] == $cbUserLogin[$this->userPassword]) {
                if (password_verify($pgUserLogin['user_password'], $userData['user_password'])) {
                    //echo "\n\rpgUserLogin pass true\n\r";
                    return $userData['user_id'];
                } else {
                    echo "\n\rpgUserLogin pass false\n\r";
                    return false;
                }
            } else {
                echo "\n\rpgUserLogin no pass\n\r";
                return false;
            }
        } else {
            echo "<br>Please enter your user name and password.<br>";
            return false;
        }
    }

    public function pgUserPreferByEmail($pgUserPreferByEmail)
    {
        if (!empty($pgUserPreferByEmail)) {
            $pg = new PostgreSQL();
            //echo 'get user prefer ' . $pg->getTableUsersPrefer();
            //echo 'get user prefer $pgUserPreferByEmail' . $pgUserPreferByEmail;
            return $pg->pgOneDataByColumn([
                'table' => $pg->table_users_prefer,
                'find_column' => 'user_email',
                'find_value' => $pgUserPreferByEmail]);
        } else {
            echo 'no prefer email ';
            return false;
        }
    }

    public function pgUserPreferById($pgUserPreferById)
    {
        if (!empty($pgUserPreferById)) {
            $pg = new PostgreSQL();
            //echo 'get user prefer ' . $pg->getTableUsersPrefer();
            //echo 'get user prefer $pgUserPreferByEmail' . $pgUserPreferByEmail;
            return $pg->pgOneDataByColumn([
                'table' => $pg->getTableUsersPrefer(),
                'find_column' => 'user_id',
                'find_value' => $pgUserPreferById]);
        } else {
            echo 'no prefer email ';
            return false;
        }
    }

    public function cbSpringToUserId($cbSpringToUserId)
    {
        //echo "\r\n<hr><b>cbSpringToUserId</b><br>";
        //var_dump($cbSpringToUserId);
        if (!empty($cbSpringToUserId[$this->spring])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "user"]);
            $query = CouchbaseViewQuery::from("user", "spring")->key(strtolower($this->safetyTagsSlashesTrim32($cbSpringToUserId[$this->spring])))->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE);
            try {
                $res = $bucket->query($query);
                //$res = $this->SharePreParseData($bucket->query($query));
            } catch (Exception $e) {
                //echo "Spring free";
                return false;
            }
            $res = $this->ConvParseData($res);
            //echo "\r\n<hr><b>cbSpringToUserId</b><br>";
            //print_r($res);
            if (!empty($res["rows"][0]["value"]["docId"])) {
                //echo "\r\n<hr><b>cbSpringToUserId return true: </b><br>" . $res["rows"][0]["value"]["docId"];
                return $res["rows"][0]["value"]["docId"];
            } else {
                //echo "\r\n<hr><b>cbSpringToUserId return false</b><br>";
                return false;
            }
        } else {
            echo "No spring";
            return false;
        }
    }

    public function pgSpringToUserId($pgSpringToUserId)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        if (!empty($pgSpringToUserId[$this->spring])) {
            $pg = new PostgreSQL();
            /*$resultUserId = $pg->pgOneDataByColumn([
                'table' => $pg->table_users,
                'find_column' => 'spring',
                'find_value' => $pgSpringToUserId[$this->spring]]);*/
            $resultUserId = $pg->pgGetUserInfoBySpring($pgSpringToUserId);
            //print_r($resultUserId);
            if (!empty($resultUserId)) {
                return $resultUserId['user_id'];
            } else {
                //echo "No spring result";
                //print_r($pgSpringToUserId);
                return false;
            }
        } else {
            echo "No spring";
            return false;
        }
    }

    public function cbOwnerIdListId($cbOwnerIdListId)
    {
        //echo "\r\n<hr><b>cbOwnerIdListId</b><br>";
        //var_dump($cbOwnerIdListId);
        if (!empty($cbOwnerIdListId[$this->userId]) and !empty($cbOwnerIdListId[$this->listId])) {
            $bucket = $this->autoConnectToBucket(["bucket" => "file"]);
            $query = CouchbaseViewQuery::from("file", "ownerIdlistId")->key([$cbOwnerIdListId[$this->userId], $cbOwnerIdListId[$this->listId]])->order(CouchbaseViewQuery::ORDER_DESCENDING)->stale(CouchbaseViewQuery::UPDATE_BEFORE)->limit($cbOwnerIdListId[$this->limit]);

            try {
                $res = $bucket->query($query);
                return $res->rows;
            } catch (Exception $e) {
                //echo "Spring free";
                return false;
            }
            //echo "\r\n<hr><b>cbOwnerIdListId res</b><br>";
            //var_dump($res);
            //$res = $this->ConvParseData($res);
        } else {
            echo "No userId or listId";
            return false;
        }
    }

    public function pgShowItemsOfUser($pgShowPostsOfUser)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        return $pg->pgGetItemsOfUser($pgShowPostsOfUser);
    }

    public function pgShowPostsOfUser($pgShowPostsOfUser)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowPostsOfUser['for_user_id'])) {
            return $pg->pgGetPostOfUserAuthorised($pgShowPostsOfUser);
        } else {
            return $pg->pgGetPostOfUser($pgShowPostsOfUser);
        }
    }

    public function pgShowViewedOfUser($pgShowViewedOfUser)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowViewedOfUser['for_user_id'])) {
            return $pg->pgGetViewedOfUserAuthorised($pgShowViewedOfUser);
        } else {
            return $pg->pgGetViewedOfUser($pgShowViewedOfUser);
        }
    }

    public function pgShowSpringForMe($pgShowSpringForMe)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowSpringForMe['user_id']) and !empty($pgShowSpringForMe['for_user_id'])) {
            return $pg->pgGetSpringForMe($pgShowSpringForMe);
        } else {
            return false;
        }
    }

    public function pgShowSpringForMeFollow($pgShowSpringForMeFollow)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowSpringForMeFollow['to_user_id']) and !empty($pgShowSpringForMeFollow['from_user_id'])) {
            return $pg->pgGetSpringForMeFollow($pgShowSpringForMeFollow);
        } else {
            return false;
        }
    }

    public function pgShowSpringForMeFrindship($pgShowSpringForMeFriendship)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowSpringForMeFriendship['user_id']) and !empty($pgShowSpringForMeFriendship['for_user_id'])) {
            return $pg->pgGetSpringForMeFrindship($pgShowSpringForMeFriendship);
        } else {
            return false;
        }
    }

    public function pgShowVideoOfUser($pgShowVideoOfUser)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowVideoOfUser['for_user_id'])) {
            return $pg->pgGetVideoOfUserAuthorised($pgShowVideoOfUser);
        } else {
            return $pg->pgGetVideoOfUser($pgShowVideoOfUser);
        }
    }

    public function pgShowImageOfUser($pgShowItemsOfUserImageOnly) // TODO: remove NOO 21122022
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        //return $pg->pgGetItemOfUserImageOnly($pgShowItemsOfUserImageOnly);

        if (!empty($pgShowItemsOfUserImageOnly['for_user_id'])) {
            return $pg->pgGetImageOfUserAuthorised($pgShowItemsOfUserImageOnly);
        } else {
            return $pg->pgGetImageOfUser($pgShowItemsOfUserImageOnly);
        }
    }

    public function pgShowPostsOfUserImageOnly($pgShowPostsOfUserImageOnly) // TODO: remove?
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowPostsOfUserImageOnly['for_user_id'])) {
            return $pg->pgGetPostOfUserImageOnlyAuthorised($pgShowPostsOfUserImageOnly);
        } else {
            return $pg->pgGetPostOfUserImageOnly($pgShowPostsOfUserImageOnly);
        }
    }

    public function pgShowArticleOfUser($pgShowArticleOfUser)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowArticleOfUser['for_user_id'])) {
            return $pg->pgGetArticleOfUserAuthorised($pgShowArticleOfUser);
        } else {
            return $pg->pgGetArticleOfUser($pgShowArticleOfUser);
        }
    }

    public function pgShowEventOfUser($pgShowEventOfUser)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowEventOfUser['for_user_id'])) {
            return $pg->pgGetEventOfUserAuthorised($pgShowEventOfUser);
        } else {
            return $pg->pgGetEventOfUser($pgShowEventOfUser);
        }
    }

    public function pgShowPopUsers($pgShowPopUsers)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        return $pg->pgGetPopUsers($pgShowPopUsers);
    }

    public function pgShowPostsOfUserVideoOnlyForFriends($pgShowPostsOfUserVideoOnlyForFriends) // TODO: remove
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        return $pg->pgGetPostOfUserVideoOnlyForFriends($pgShowPostsOfUserVideoOnlyForFriends);
    }

    public function pgShowPostsOfUserImageOnlyForFriends($pgShowPostsOfUserImageOnlyForFriends) // TODO: remove
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        return $pg->pgGetPostOfUserVideoOnlyForFriends($pgShowPostsOfUserImageOnlyForFriends);
    }

    public function pgShowPostsOfUserSignVideoOnlyForFriends($pgShowPostsOfUserSignVideoOnlyForFriends) // TODO: remove
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        return $pg->pgGetPostOfUserSignVideoOnlyForFriends($pgShowPostsOfUserSignVideoOnlyForFriends);
    }

    public function pgShowPostsOfUserSign($pgShowPostsOfUserSign) // TODO: remove
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        return $pg->pgGetPostOfUserSign($pgShowPostsOfUserSign);
    }

    public function pgShowPostsOfUserAlbum($pgShowPostsOfUserAlbum)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowPostsOfUserAlbum['for_user_id'])) {
            return $pg->pgGetPostOfUserAuthorisedAlbum($pgShowPostsOfUserAlbum);
        } else {
            return $pg->pgGetPostOfUserAlbum($pgShowPostsOfUserAlbum);
        }
    }

    public function pgShowPostsOfUserAlbumMy($pgShowPostsOfUserAlbumMy)
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        if (!empty($pgShowPostsOfUserAlbumMy['album_id'])) {
            return $pg->pgGetPostOfUserAlbumMy($pgShowPostsOfUserAlbumMy);
        } else {
            return false;
        }
    }

    public function pgShowPostsOfUserAlbumVideoOnly($pgShowPostsOfUserSignVideoOnly) // TODO: remove
    {
        //echo "\r\npgSpringToUserId\n";
        //print_r($pgSpringToUserId);
        $pg = new PostgreSQL();
        return $pg->pgGetPostOfUserSignVideosOnly($pgShowPostsOfUserSignVideoOnly);

        if (!empty($pgShowPostsOfUserAlbum['for_user_id'])) {
            return $pg->pgGetPostOfUserAuthorisedAlbum($pgShowPostsOfUserAlbum);
        } else {
            return $pg->pgGetPostOfUserAlbum($pgShowPostsOfUserAlbum);
        }
    }

    function objectToArray($d) // TODO: remove
    {
        //echo "\r\n<hr><b>objectToArray</b><br>";
        //print_r($d);
        if (is_object($d)) {
            echo "\r\n<hr><b>objectToArray is_object</b><br>";
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            echo "\r\n<hr><b>objectToArray is_array</b><br>";
            //$a = array_map(__FUNCTION__, $d);
//print_r($a);
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        } else {
            echo "\r\n<hr><b>objectToArray Return array</b><br>";
            // Return array
            return $d;
        }
    }

    // ready

    public function ParseUserRestore($ParseUserRestore)
    {
        if (!empty($ParseUserRestore['userinvite'])) {
            $ParseUserRestore['username'] = $this->CookieToUserIdAction($ParseUserRestore['userinvite']);
        } else {
        }
        $ParseUserRestore['username'] = $this->PreEmail($ParseUserRestore['username']);
        $ResultUserId = $this->ParseUserNameExist($ParseUserRestore);
        // Если пользователя с таким ящиком ЕСТЬ
        if (!empty($ResultUserId)) {
            // Если пользователь пришёл С Инвайтом
            if (isset($ParseUserRestore['userinvite'])) {
                // Если пользователь пришёл с Паролем
                if (isset($ParseUserRestore['password'])) {
                    $redis = new Predis\Client(array(
                        'scheme' => 'tcp',
                        'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
                        'port' => 14102,
                        'password' => '2IIg4aHASXmDpTai'
                    ));
                    $redis->del($UserCookie);
                    // Получить Id пользователя
                    $ParseUserRestore['userid'] = $this->ParseUserEmailCheck($ParseUserRestore);
                    print_r($ParseUserRestore);

                    // Создать нового пользователя
                    $UpdateResult = $this->ParseUpdateUserPas($ParseUserRestore);
                    // Отложить куку с userId
                    $this->RedisCheckCookie($ResultUserId);
                    echo "<br>U3EP N3MEHEH - PAROL YCTAHOBLEH !!!" . $UpdateResult->updatedAt;
                    header('Location: https://api.vide.me/pas/');

                } else {
                    echo "<br>Please enter your user password.<br>";
                    header('Location: https://api.vide.me/pas/restore/');
                }
                // Если пользователь пришёл БЕЗ Инвайта
            } else {
                // Если пользователь указал Почтовый адрес
                if (isset($ParseUserRestore['username'])) {
                    $sendmail = new sendmail();
                    $sendmail->SendRestoreInvite(array('username' => $ParseUserRestore['username']));
                    // Если пользователь НЕ указал Почтовый адрес
                } else {
                    echo "<br>Please enter your Email.<br>";
                    //header('Location: https://vide.me/VictorLustig.html');
                }
            }
        } else {
            header('Location: https://api.vide.me/pas/freeemail/');
        }
    }

    public function cbUserRestore($cbUserRestore)
    {
        //echo "cbUserRestore ";
        //print_r($cbUserRestore);
        if (!empty($cbUserRestore['userinvite'])) {
            //$cbUserRestore['username'] = $this->CookieToUserIdAction($cbUserRestore['userinvite']);
            $cbUserRestore['username'] = $this->memcachedGetKey(["key" => $cbUserRestore['userinvite']]);
        } else {
        }
        $cbUserRestore['username'] = $this->PreEmail($cbUserRestore['username']);
        //$ResultUserId = $this->ParseUserNameExist($cbUserRestore);
        //$ResultUserId = $this->cbUserDocId([$this->userEmail => $cbUserRestore['username']]);
        $ResultUserId = $this->cbUserDataByEmail([$this->userEmail => $cbUserRestore['username']]);
        //echo "ResultUserId ";
        //print_r($ResultUserId);
        //exit;
        if (!empty($ResultUserId)) {
            // Если пользователя с таким ящиком ЕСТЬ
            if (isset($cbUserRestore['userinvite'])) {
                // Если пользователь пришёл С Инвайтом
                if (isset($cbUserRestore['password'])) {
                    // Если пользователь пришёл с Паролем
                    /*$redis = new Predis\Client(array(
                        'scheme' => 'tcp',
                        'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
                        'port' => 14102,
                        'password' => '2IIg4aHASXmDpTai'
                    ));
                    $redis->del($UserCookie);
                    // Получить Id пользователя
                    $cbUserRestore['userid'] = $this->ParseUserEmailCheck($cbUserRestore);
                    print_r($cbUserRestore);*/

                    $this->memcachedRemoveKey(["key" => $cbUserRestore['userinvite']]);

                    // Сбросить пароль пользователя
                    //$UpdateResult = $this->ParseUpdateUserPas($cbUserRestore);
                    $cbUserRestore[$this->userEmail] = $cbUserRestore['username'];
                    $cbUserRestore[$this->userPassword] = $cbUserRestore['password']; // <--- ???
                    $cbUserRestore[$this->newUserPassword] = $cbUserRestore['password'];
                    //echo "cbUserRestore ";
                    //print_r($cbUserRestore);
                    $UpdateResult = $this->cbUpdateUserPas($cbUserRestore);
                    // Отложить куку с userId
                    //$this->RedisCheckCookie($ResultUserId);
                    //echo "<br>U3EP N3MEHEH - PAROL YCTAHOBLEH !!!" . $UpdateResult->updatedAt;
                    header('Location: https://api.vide.me/pas/');

                } else {
                    echo "<br>Please enter your user password.<br>";
                    header('Location: https://api.vide.me/pas/restore/');
                }
            } else {
                // Если пользователь пришёл БЕЗ Инвайта
                if (isset($cbUserRestore['username'])) {
                    // Если пользователь указал Почтовый адрес
                    echo "email send";
                    $sendmail = new sendmail();
                    $sendmail->SendRestoreInvite(array('username' => $cbUserRestore['username']));
                    // Если пользователь НЕ указал Почтовый адрес
                } else {
                    echo "<br>Please enter your Email.<br>";
                    //header('Location: https://vide.me/VictorLustig.html');
                }
            }
        } else {
            header('Location: https://api.vide.me/pas/freeemail/?email=' . $cbUserRestore['username']);
        }
    }

    public function pgUserRestore($pgUserRestore)
    {
        //echo "pgUserRestore ";
        //print_r($pgUserRestore);
        if (!empty($pgUserRestore['userinvite'])) {
            //$cbUserRestore['username'] = $this->CookieToUserIdAction($cbUserRestore['userinvite']);
            $pgUserRestore['username'] = $this->memcachedGetKey(["key" => $pgUserRestore['userinvite']]);
        } else {
            //return false;
        }
        $pgUserRestore['username'] = $this->PreEmail($pgUserRestore['username']);
        //$ResultUserId = $this->ParseUserNameExist($cbUserRestore);
        //$ResultUserId = $this->cbUserDocId([$this->userEmail => $cbUserRestore['username']]);
        $ResultUserId = $this->pgUserDataByEmail(['user_email' => $pgUserRestore['username']]);
        //echo "ResultUserId ";
        //print_r($ResultUserId);
        //exit;
        if (!empty($ResultUserId['user_email'])) {
            // Если пользователя с таким ящиком ЕСТЬ
            if (isset($pgUserRestore['userinvite'])) {
                // Если пользователь пришёл С Инвайтом
                if (isset($pgUserRestore['password'])) {
                    // Если пользователь пришёл с Паролем
                    /*$redis = new Predis\Client(array(
                        'scheme' => 'tcp',
                        'host' => 'pub-redis-14102.us-east-1-4.1.ec2.garantiadata.com',
                        'port' => 14102,
                        'password' => '2IIg4aHASXmDpTai'
                    ));
                    $redis->del($UserCookie);
                    // Получить Id пользователя
                    $cbUserRestore['userid'] = $this->ParseUserEmailCheck($cbUserRestore);
                    print_r($cbUserRestore);*/

                    $this->memcachedRemoveKey(["key" => $pgUserRestore['userinvite']]);

                    // Сбросить пароль пользователя
                    //$UpdateResult = $this->ParseUpdateUserPas($cbUserRestore);
                    $pgUserRestore['user_email'] = $pgUserRestore['username'];
                    $pgUserRestore['user_password'] = $pgUserRestore['password']; // <--- ???
                    $pgUserRestore['new_user_password'] = $pgUserRestore['password'];
                    //echo "pgUserRestore new_user_password \n";
                    //print_r($pgUserRestore);
                    $UpdateResult = $this->pgUpdateUserPas($pgUserRestore);
                    //echo "pgUserRestore UpdateResult \n";
                    //print_r($UpdateResult);
                    // Отложить куку с userId
                    //$this->RedisCheckCookie($ResultUserId);
                    //echo "<br>U3EP N3MEHEH - PAROL YCTAHOBLEH !!!" . $UpdateResult->updatedAt;
                    header('Location: https://api.vide.me/pas/');

                } else {
                    //echo "<br>Please enter your user password.<br>";
                    header('Location: https://api.vide.me/pas/restore/');
                }
            } else {
                // Если пользователь пришёл БЕЗ Инвайта
                if (isset($pgUserRestore['username'])) {
                    // Если пользователь указал Почтовый адрес
                    //echo "email send";
                    $sendmail = new sendmail();
                    $sendmail->SendRestoreInvite(['username' => $pgUserRestore['username']]);
                    // Если пользователь НЕ указал Почтовый адрес
                } else {
                    //echo "<br>Please enter your Email.<br>";
                    header('Location: https://www.vide.me/web/enter/');
                }
            }
        } else {
            header('Location: https://api.vide.me/pas/freeemail/?email=' . $pgUserRestore['username']);
        }
    }

    public function OutputParseData($OutputParseData)
    {
        $PreParseData = $this->SharePreParseData($OutputParseData);
        header('Content-Type: application/json');
        if (!empty($_GET['videmecallback'])) {
            echo $_GET['videmecallback'] . "(" . json_encode($PreParseData) . ")";
        } else {
            echo json_encode($PreParseData);
        }
    }

    public function SharePreParseData($SharePreParseData)
    {

        //error_reporting(0); // Turn off error reporting
        //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

        if (is_object($SharePreParseData)) {
            foreach (get_object_vars($SharePreParseData) as $key => $val) {
                if (is_object($val) || is_array($val)) {
                    $ret[$key] = $this->SharePreParseData($val);
                } else {
                    $ret[$key] = $val;
                }
            }
            //unset ($ret['objectId']);
            /*unset ($ret['FromUserId']);
            unset ($ret['ToUserId']);
            unset ($ret['OwnerId']);*/
            if (isset($ret['key'])) unset ($ret['key']);
            if (isset($ret[$this->ownerId])) unset ($ret[$this->ownerId]);
            if (isset($ret[$this->toUserId])) unset ($ret[$this->toUserId]);
            if (isset($ret[$this->fromUserId])) unset ($ret[$this->fromUserId]);
            return $ret;
        } elseif (is_array($SharePreParseData)) {
            foreach ($SharePreParseData as $key => $val) {
                if (is_object($val) || is_array($val)) {
                    $ret[$key] = $this->SharePreParseData($val);
                } else {
                    $ret[$key] = $val;
                }
            }
            if (isset($ret)) {
                return $ret;
            } else {
                //return false;
                return "";
            }
        } else {
            return $SharePreParseData;
        }
    }

    public function outputCBData($outputCBData)
    {
        //header('Content-Type: application/json');
        header('Content-Type: application/javascript');
        //echo "\r\n<hr><b>outputCBData</b> outputCBData<br>";
        //print_r($outputCBData);
        if (!empty($outputCBData)) {
            /*foreach ($outputCBData as $key => $value) {
                //echo  "= key " . $key . " = ";
                //echo "---".$outputCBData["$value"];
                if (isset($value['key'])) unset ($value['key']);
                $outputConv[$key] = $value;
            }*/
            $outputConv = $this->SharePreParseData($outputCBData);
            if (!empty($outputConv)) {
                //echo "\r\n<hr><b>outputCBData</b> outputConv<br>";
                //print_r($outputConv);
                //$outputJSON = json_encode($outputConv);
                //echo "\r\n<hr><b>outputCBData</b> outputConv json_encode<br>";
                //print_r($outputJSON);
                if (!empty($_GET['videmecallback'])) {
                    echo $_GET['videmecallback'] . "(" . json_encode($outputConv) . ")";
                } else {
                    echo json_encode($outputConv);
                    //print_r($outputConv);
                }
                return true;
            } else {
                return false;
            }
        } else {
            /* Именно так для js нужно чтобы он показал что чего-то нет, иначе будет строить пустой список.
             * ([]) будет пустой список */
            if (!empty($_GET['videmecallback'])) {
                echo $_GET['videmecallback'] . "()";
            } else {
                //echo json_encode($outputConv);
            }
            return false;
        }
    }

    public function outputDDBData($outputCBData)
    {
        //$start = microtime(true);
        // https://stackoverflow.com/questions/477816/what-is-the-correct-json-content-type
        //header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        if (!empty($outputCBData)) {
            if (!empty($_GET['videmecallback'])) {
                header('Content-Type: application/javascript');
                echo $_GET['videmecallback'] . "(" . json_encode($outputCBData) . ")";
            } else {

                //$time_elapsed_secs = microtime(true) - $start;
                //header("videme-output-time-elapsed-secs: " . $time_elapsed_secs);
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($outputCBData);
            }
            return true;

        } else {
            /* Именно так для js нужно чтобы он показал что чего-то нет, иначе будет строить пустой список.
             * ([]) будет пустой список */
            if (!empty($_GET['videmecallback'])) {
                echo $_GET['videmecallback'] . "()";
            } else {
                echo '()';
            }
            return false;
        }
    }

    public function outputJSONData($outputJSONData)
    {
        // https://stackoverflow.com/questions/477816/what-is-the-correct-json-content-type
        //header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        if (!empty($outputJSONData)) {
            if (!empty($_GET['videmecallback'])) {
                header('Content-Type: application/javascript');
                echo $_GET['videmecallback'] . "(" . $outputJSONData . ")";
            } else {
                header('Content-Type: application/json; charset=utf-8');
                echo $outputJSONData;
            }
            return true;
        } else {
            /* Именно так для js нужно чтобы он показал что чего-то нет, иначе будет строить пустой список.
             * ([]) будет пустой список */
            if (!empty($_GET['videmecallback'])) {
                echo $_GET['videmecallback'] . "()";
            } else {
                //echo json_encode($outputConv);
                echo '()';
            }
            return false;
        }
    }

    /**
     * Email validation function. Thanks to http://www.linuxjournal.com/article/9585
     */
    public function validEmail($email)
    {
        $isValid = true;
        $atIndex = strrpos($email, "@");
        if (is_bool($atIndex) && !$atIndex) {
            $isValid = false;
        } else {
            $domain = substr($email, $atIndex + 1);
            $local = substr($email, 0, $atIndex);
            $localLen = strlen($local);
            $domainLen = strlen($domain);
            if ($localLen < 1 || $localLen > 64) {
                // local part length exceeded
                $isValid = false;
            } else if ($domainLen < 1 || $domainLen > 255) {
                // domain part length exceeded
                $isValid = false;
            } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
                // local part starts or ends with '.'
                $isValid = false;
            } else if (preg_match('/\\.\\./', $local)) {
                // local part has two consecutive dots
                $isValid = false;
            } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
                // character not valid in domain part
                $isValid = false;
            } else if (preg_match('/\\.\\./', $domain)) {
                // domain part has two consecutive dots
                $isValid = false;
            } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
                // character not valid in local part unless
                // local part is quoted
                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                    $isValid = false;
                }
            }

            if ($isValid && function_exists('checkdnsrr')) {
                if (!(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
                    // domain not found in DNS
                    $isValid = false;
                }
            }
        }
        return $isValid;
    }

    function user_browser($agent)
    {
        preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info); // регулярное выражение, которое позволяет отпределить 90% браузеров
        list(, $browser, $version) = $browser_info; // получаем данные из массива в переменную
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera ' . $opera[1]; // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
        if ($browser == 'MSIE') { // если браузер определён как IE
            preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie); // проверяем, не разработка ли это на основе IE
            if ($ie) return $ie[1] . ' based on IE ' . $version; // если да, то возвращаем сообщение об этом
            return 'IE ' . $version; // иначе просто возвращаем IE и номер версии
        }
        if ($browser == 'Firefox') { // если браузер определён как Firefox
            preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); // проверяем, не разработка ли это на основе Firefox
            if ($ff) return $ff[1] . ' ' . $ff[2]; // если да, то выводим номер и версию
        }
        if ($browser == 'Opera' && $version == '9.80') return 'Opera ' . substr($agent, -5); // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
        if ($browser == 'Version') return 'Safari ' . $version; // определяем Сафари
        if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko'; // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
        return $browser . ' ' . $version; // для всех остальных возвращаем браузер и версию
    }

    /**
     * @return string
     */
    public function getPassHash($password)
    {
        if (strlen($password) > 70) exit("Password length > 70");
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        return $passwordHash;
    }

    public function pgTimeToIso($pgTimeToIso)
    {
        $datetime = new DateTime($pgTimeToIso);
        return $datetime->format(DateTime::ATOM); // Updated ISO8601
    }

    public function pgTimeToHuman($pgTimeToHuman)
    {
        //$datetime = new DateTime("Y-m-d", $pgTimeToHuman);
        //return $datetime->format(DateTime::ATOM); // Updated ISO8601

        //$date = DateTime::createFromFormat("Y-m-d", $pgTimeToHuman);
        //return $date->format("d");
        //return date("g:ia \- M j Y l", strtotime($pgTimeToHuman));
        return date("g:ia \- M j Y", strtotime($pgTimeToHuman));
    }

    function humanDateRanges($start, $end)
    {
        // https://stackoverflow.com/questions/29976026/php-human-date-range-duration-format
        $startTime = strtotime($start);
        $endTime = strtotime($end);

        if (date('Y', $startTime) != date('Y', $endTime)) {
            // в разные годы
            // Y 	Порядковый номер года, 4 цифры
            //echo date('F j, Y',$startTime) . " to " . date('F j, Y',$endTime);
            return date('F j, Y', $startTime) . " to " . date('F j, Y', $endTime);
        } else {
            if ((date('j', $startTime) == 1) && (date('j', $endTime) == date('t', $endTime))) {
                // Первый и послений день месяца
                // j День месяца без ведущего нуля && t Количество дней в указанном месяце
                //echo date('F',$startTime) . " to " . date('F, Y',$endTime);
                return date('F', $startTime) . " to " . date('F, Y', $endTime);
            } else {
                if (date('m', $startTime) != date('m', $endTime)) {
                    // месяц старта не равен месяцу конца
                    // m 	Порядковый номер месяца с ведущим нулём
                    //echo date('F j',$startTime) . " to " . date('F j, Y',$endTime);
                    return date('F j', $startTime) . " to " . date('F j, Y', $endTime);
                } else {
                    //echo date('F j',$startTime) . " to " . date('j, Y',$endTime);
                    return date('F j', $startTime) . " to " . date('j, Y', $endTime);
                }
            }
        }
        // F 	Полное наименование месяца, например
    }
    function iso8601_duration($seconds)
    {
        $intervals = array('D' => 60*60*24, 'H' => 60*60, 'M' => 60, 'S' => 1);

        $pt = 'P';
        $result = '';
        foreach ($intervals as $tag => $divisor)
        {
            $qty = floor($seconds/$divisor);
            if ( !$qty && $result == '' )
            {
                $pt = 'T';
                continue;
            }

            $seconds -= $qty * $divisor;
            $result  .= "$qty$tag";
        }
        if ( $result=='' )
            $result='0S';
        //return "$pt$result";
        return $pt . $result;
        //return "34";
    }
    public function use_curl($url, $filename)
    {
        set_time_limit(0);
        //This is the file where we save the    information
        $fp = fopen($this->nadtemp . $filename, 'w+');
        //Here is the file we are downloading, replace spaces with %20
        $ch = curl_init(str_replace(" ", "%20", $url));
        curl_setopt($ch, CURLOPT_TIMEOUT, 50);
        // write curl response to file
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // get curl response
        curl_exec($ch);
        print_r($ch);
        curl_close($ch);
        fclose($fp);
    }

    function limit_text($text, $limit)
    {
        // https://stackoverflow.com/a/965269/1895392
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            //$text  = substr($text, 0, $pos[$limit]) . '...';
            $text = substr($text, 0, $pos[$limit]);
        }
        return $text;
    }
}

abstract class OutputData
{
    // https://habrahabr.ru/post/37576/
    // таблица, в которой хранятся данные по элементу
    protected $table;

    // свойства элемента нам неизвестны
    protected $properties = [];

    // конструктор
    public function __construct($id)
    {
        // обратите внимание, мы не знаем, из какой таблицы нам нужно получить данные
        //$result = mysql_query ('SELECT * FROM `'.$this->table.'` WHERE `id`="'.$id.'" LIMIT 1');
        // какие мы получили данные, мы тоже не знаем
        //$this->properties = mysql_fetch_assoc($result);
        $this->properties = $id;
    }

    // метод, одинаковый для любого типа публикаций, возвращает значение свойства
    public function get_property($name)
    {
        if (isset($this->properties[$name]))
            return $this->properties[$name];

        return false;
    }

    // метод, одинаковый для любого типа публикаций, устанавливает значение свойства
    public function set_property($name, $value)
    {
        if (!isset($this->properties[$name]))
            return false;

        $this->properties[$name] = $value;

        return $value;
    }

    // а этот метод должен напечатать публикацию, но мы не знаем, как именно это сделать, и потому объявляем его абстрактным
    abstract public function do_print();
}


class StafData extends OutputData
{
    // конструктор класса новостей, производного от класса публикаций
    public function __construct($id)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по новостям
        $this->table = 'news_table';
        // вызываем конструктор родительского класса
        parent::__construct($id);
    }

    // переопределяем абстрактный метод печати
    public function do_print()
    {
        $welcome = new NAD();
        header('Content-Type: application/javascript');
        if (!empty($this->properties['outputCBData'])) {
            $outputConv = $welcome->ConvParseData($this->properties['outputCBData']);
            if (!empty($outputConv)) {
                if (!empty($_GET['videmecallback'])) {
                    echo $_GET['videmecallback'] . "(" . json_encode($outputConv) . ")";
                } else {
                    echo json_encode($outputConv);
                }
                return true;
            } else {
                return false;
            }
        } else {
            /* Именно так для js нужно чтобы он показал что чего-то нет, иначе будет строить пустой список.
             * ([]) будет пустой список */
            if (!empty($_GET['videmecallback'])) {
                echo $_GET['videmecallback'] . "()";
            } else {
                //echo json_encode($outputConv);
            }
            return false;
        }
    }
}

class PublicData extends OutputData
{
    // конструктор класса новостей, производного от класса публикаций
    public function __construct($outputData)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по новостям
        $this->table = 'news_table';
        // вызываем конструктор родительского класса
        parent::__construct($outputData);
    }

    // переопределяем абстрактный метод печати
    public function do_print()
    {
        $welcome = new NAD();
        header('Content-Type: application/javascript');
        if (!empty($this->properties['outputCBData'])) {
            $outputConv = $welcome->SharePreParseData($this->properties['outputCBData']);
            if (!empty($outputConv)) {

                if (!empty($_GET['videmecallback'])) {
                    echo $_GET['videmecallback'] . "(" . json_encode($outputConv) . ")";
                } else {
                    echo json_encode($outputConv);
                }
                return true;
            } else {
                return false;
            }
        } else {
            /* Именно так для js нужно чтобы он показал что чего-то нет, иначе будет строить пустой список.
             * ([]) будет пустой список */
            if (!empty($_GET['videmecallback'])) {
                echo $_GET['videmecallback'] . "()";
            } else {
                //echo json_encode($outputConv);
            }
            return false;
        }
    }
}