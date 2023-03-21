<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 02.10.17
 * Time: 22:58
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

class DynamoDB
{

    public function __construct()
    {
        echo "\n DynamoDB cons \n";

        $this->dynamodb = new Aws\DynamoDb\DynamoDbClient([
            /*'profile' => 'default',*/
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => 'AKIAIEHORDEO6SWNPRTQ',
                'secret' => '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',
            ]
        ]);

        $this->marshaler = new Aws\DynamoDb\Marshaler();

        $this->welcome = new NAD();

        $this->curentTime = (string)time();
    }

    /**
     * @return \Aws\DynamoDb\DynamoDbClient
     */
    public function getDynamodb()
    {
        return $this->dynamodb;
    }

    /**
     * @return \Aws\DynamoDb\Marshaler
     */
    public function getMarshaler()
    {
        return $this->marshaler;
    }

    public function ddbPutItem($table, $ddbPutItem)
    {
        if (count($ddbPutItem) > 0) {
            //if (empty($ddbPutItem['time'])) $ddbPutItem['time'] = $this->curentTime;
            try {
                $response = $this->dynamodb->putItem([
                    'TableName' => $table,
                    'Item' => $ddbPutItem]);
                return $response;
            } catch (DynamoDbException $e) {
                echo "Unable to add item: " . $e->getMessage();
                return false;
            }
        } else {
            echo 'No item';
            return false;
        }
    }

    public function ddbGetByPrKey($table, $prketName, $prKey, $limit = 3)
    {
        if (!empty($prKey)){
            try {
                $response = $this->dynamodb->query([
                    'TableName' => $table,
                    'ScanIndexForward' => false,
                    'Limit' => $limit,
                    'KeyConditionExpression' => $prketName . ' = :v_hash',
                    'ExpressionAttributeValues' =>  [':v_hash'  => ['S' => $prKey]]
                ]);
                //$res = '';
                $res = [];
                foreach ($response['Items'] as $key => $val) {
                    //$res .= $this->marshaler->unmarshalJson($val);
                    $res[] = $this->marshaler->unmarshalItem($val);
                }
                return $res;
            } catch (DynamoDbException $e) {
                echo "Error db get: " .$e->getMessage();
                return false;
            }
        } else {
            echo 'Empty Pr. key';
            return false;
        }
    }

    public function ddbGetByPrKeyOne($table, $prketName, $prKey, $limit = 3)
    {
        if (!empty($prKey)){
            try {
                $response = $this->dynamodb->query([
                    'TableName' => $table,
                    'ScanIndexForward' => false,
                    'Limit' => $limit,
                    'KeyConditionExpression' => $prketName . ' = :v_hash',
                    'ExpressionAttributeValues' =>  [':v_hash'  => ['S' => $prKey]]
                ]);
                //$res = '';
                //$res = [];
                foreach ($response['Items'] as $key => $val) {
                    //$res .= $this->marshaler->unmarshalJson($val);
                    $res = $this->marshaler->unmarshalItem($val);
                }
                return $res;
            } catch (DynamoDbException $e) {
                echo "Error db get: " .$e->getMessage();
                return false;
            }
        } else {
            //echo 'Empty Pr. key';
            return false;
        }
    }

    public function ddbGetByPrKeyResWord($table, $prKeyName, $prKeyVal, $limit = 3)
    {
        if (!empty($prKeyVal)){
            try {
                $response = $this->dynamodb->query([
                    'TableName' => $table,
                    'ScanIndexForward' => false,
                    'Limit' => $limit,
                    'KeyConditionExpression' => '#hash_doc = :v_hash',
                    'ExpressionAttributeNames' => ["#hash_doc" => $prKeyName],
                    'ExpressionAttributeValues' => [':v_hash' => ['S' => $prKeyVal]]
                ]);

                $res = '';
                foreach ($response['Items'] as $key => $val) {
                    $res .= $this->marshaler->unmarshalJson($val);
                }
                return $res;
            } catch (DynamoDbException $e) {
                echo "Error db get: " .$e->getMessage();
                return false;
            }
        } else {
            echo 'Empty Pr. key';
            return false;
        }
    }

    public function ddbGetFileNew($table, $limit = 3) // Remove
    {
        //if (!empty($prKey)){
            try {
                $response = $this->dynamodb->query([
                //$iterator = $this->dynamodb->getIterator('Query', [
                    'TableName' => $table,
                    'ScanIndexForward' => false,
                    'Limit' => $limit,
                    /*'KeyConditionExpression' => '#hash_doc = :v_hash',
                    'ExpressionAttributeNames' => ["#hash_doc" => $prketName],
                    'ExpressionAttributeValues' => [':v_hash' => ['S' => $prKey]],*/

                    'KeyConditions' => array(
                        'file' => array(
                            'ComparisonOperator' => 'NOT_NULL'/*,
                            'AttributeValueList' => array(
                            array('N' => '1201')*/
                        )
                        )
                    /*"KeyConditions" => array(
                        "ComparisonOperator" => 'CONTAINS',
                        'listId' => array(
                            'AttributeValueList' => array(
                                array('N' => '1201')
                            ),
                        ))*/
                ]);

                $res = '';
                foreach ($response['Items'] as $key => $val) {
                //foreach ($iterator as $item) {
                    $res .= $this->marshaler->unmarshalJson($val);
                }
                return $res;
            } catch (DynamoDbException $e) {
                echo "Error db get: " .$e->getMessage();
                return false;
            }
        /*} else {
            echo 'Empty Pr. key';
            return false;
        }*/
    }

    public function ddbScan($table, $limit = 3)
    {
        //echo 'ddbScan';
        //if (!empty($prKey)){
        $params = [
            'TableName' => $table,
            //'ScanIndexForward' => false,
            'Limit' => $limit,
        ];
            try {
                while (true) {
                    $response = $this->dynamodb->scan($params);
                    /*foreach ($result['Items'] as $i) {
                        $movie = $this->marshaler->unmarshalItem($i);
                        echo "\n = = \n";

                        print_r($movie);
                    }*/
                    //$res = '';
                    $res = [];
                    foreach ($response['Items'] as $key => $val) {
                        //print_r($response);
                        //foreach ($iterator as $item) {
                        //$res .= $this->marshaler->unmarshalJson($val) . ",";
                        //$res[] = $this->marshaler->unmarshalJson($val);
                        //$res[] = $this->marshaler->unmarshalValue($val);
                        $res[] = $this->marshaler->unmarshalItem($val);
                    }
                    if (isset($result['LastEvaluatedKey'])) {
                        $params['ExclusiveStartKey'] = $response['LastEvaluatedKey'];
                    } else {
                        break;
                    }
                }
                return $res;
            } catch (DynamoDbException $e) {
                echo "Error db get: " .$e->getMessage();
                return false;
            }
        /*} else {
            echo 'Empty Pr. key';
            return false;
        }*/
    }

    public function ddbGetIteratorScan($table, $scanAttr, $scanVal)
    {
        $eav = $this->marshaler->marshalJson('{":name": "' . $scanVal . '" }');
        //echo "ddbGetIteratorScan marshalJson eav \n";
        //print_r($eav);
        $iterator = $this->dynamodb->getIterator('Scan', [
            'TableName' => $table,
            'FilterExpression' => $scanAttr . ' = :name',
            'ExpressionAttributeValues'=> $eav
        ]);
        //$res = [];
        foreach ($iterator as $key => $val) {
            $res = $this->marshaler->unmarshalJson($val);
        }
        if (!empty($res)) {
            return $res;

        } else {
            return false;
        }
    }

    public function ddbGetArticleByName($article)
    {
        if (!empty($article)){
            try {
                $response = $this->dynamodb->query(array(
                    'TableName' => 'Article',
                    'ScanIndexForward' => false,
                    'KeyConditionExpression' => 'article = :v_hash',
                    'ExpressionAttributeValues' =>  [':v_hash'  => ['S' => $article]]
                ));
                /*$res = '';
                foreach ($response['Items'] as $key => $val) {
                    $res .= $this->marshaler->unmarshalJson($val);
                }
                return $res;*/
                return $response['Items'];
            } catch (DynamoDbException $e) {
                echo "Error db get: " .$e->getMessage();
                return false;
            }
        } else {
            echo 'Empty article';
            return false;
        }
    }

    public function paddingItems($paddingItems)
    {
        if (is_object($paddingItems)) {
            // User ==================================================================
            if (!empty($paddingItems->userId)) $trueItems[$this->welcome->userId] = ['S' => $paddingItems->userId];
            if (!empty($paddingItems->userEmail)) $trueItems[$this->welcome->userEmail] = ['S' => $paddingItems->userEmail];
            if (!empty($paddingItems->userDisplayName)) $trueItems[$this->welcome->userDisplayName] = ['S' => $paddingItems->userDisplayName];
            if (!empty($paddingItems->userFirstName)) $trueItems[$this->welcome->userFirstName] = ['S' => $paddingItems->userFirstName];
            if (!empty($paddingItems->userLastName)) $trueItems[$this->welcome->userLastName] = ['S' => $paddingItems->userLastName];
            if (!empty($paddingItems->userLink)) $trueItems[$this->welcome->userLink] = ['S' => $paddingItems->userLink];
            if (!empty($paddingItems->userGender)) $trueItems[$this->welcome->userGender] = ['S' => $paddingItems->userGender];
            if (!empty($paddingItems->userPicture)) $trueItems[$this->welcome->userPicture] = ['S' => $paddingItems->userPicture];
            if (!empty($paddingItems->spring)) $trueItems[$this->welcome->spring] = ['S' => $paddingItems->spring];
            /*if (!empty($paddingItems->google)) $trueItems['google'] = ['S' => $paddingItems->socialId];
            if (!empty($paddingItems->facebook)) $trueItems['facebook'] = ['S' => $paddingItems->socialId];*/
            if (!empty($paddingItems->socialPrefix)) $trueItems[$paddingItems->socialPrefix] = ['S' => $paddingItems->socialId];
            //if (!empty($paddingItems->userPassword)) $trueItems[$this->welcome->userPassword] = ['S' => $paddingItems->userPassword];
            /*if (!empty($paddingItems[$this->welcome->file])) $trueItems[$this->welcome->file] = ['S' => (string)$paddingItems[$this->welcome->file]];
            if (!empty($paddingItems[$this->welcome->fromUserId])) $trueItems[$this->welcome->fromUserId] = ['S' => (string)$paddingItems[$this->welcome->fromUserId]];
            if (!empty($paddingItems[$this->welcome->toUserId])) $trueItems[$this->welcome->toUserId] = ['S' => (string)$paddingItems[$this->welcome->toUserId]];
            if (!empty($paddingItems[$this->welcome->ownerId])) $trueItems[$this->welcome->ownerId] = ['S' => (string)$paddingItems[$this->welcome->ownerId]];
            if (!empty($paddingItems[$this->welcome->subject])) $trueItems[$this->welcome->message] = ['S' => (string)$paddingItems[$this->welcome->subject]];
            //if (!empty($paddingItems[$this->welcome->message])) $trueItems[$this->welcome->message] = ['S' => (string)$paddingItems[$this->welcome->message]];
            if (!empty($paddingItems[$this->welcome->fromUserName])) $trueItems[$this->welcome->fromUserName] = ['S' => (string)$paddingItems[$this->welcome->fromUserName]];
            if (!empty($paddingItems[$this->welcome->toUserName])) $trueItems[$this->welcome->toUserName] = ['S' => (string)$paddingItems[$this->welcome->toUserName]];
            //if (!empty($paddingItems[$this->welcome->read])) $trueItems[$this->welcome->read] = ['BOOL' => $paddingItems[$this->welcome->read]];
            if (!empty($paddingItems[$this->welcome->videoDuration])) $trueItems[$this->welcome->videoDuration] = ['S' => (string)$paddingItems[$this->welcome->videoDuration]];
            //if (!empty($paddingItems[$this->welcome->createdAt])) $trueItems[$this->welcome->createdAt] = ['N' => (string)$paddingItems[$this->welcome->createdAt]];
            //if (!empty($paddingItems[$this->welcome->updatedAt])) $trueItems[$this->welcome->updatedAt] = ['N' => (string)$paddingItems[$this->welcome->updatedAt]];*/

            // Video ==================================================================
            if (!empty($paddingItems->video)) $trueItems['video'] = ['S' => $paddingItems->video];
            if (!empty($paddingItems->time)) $trueItems['time'] = ['N' => (string)$paddingItems->time];
            if (!empty($paddingItems->ownerId)) $trueItems[$this->welcome->ownerId] = ['S' => $paddingItems->ownerId];
            if (!empty($paddingItems->message)) $trueItems[$this->welcome->message] = ['S' => $paddingItems->message];
            if (!empty($paddingItems->listId)) $trueItems[$this->welcome->listId] = ['S' => $paddingItems->listId];
            if (!empty($paddingItems->videoDuration)) $trueItems[$this->welcome->videoDuration] = ['N' => (string)$paddingItems->videoDuration];
            // Tags =====
            if (!empty($paddingItems->tags)) {
                $tags = [];
                foreach ($paddingItems->tags as $key) {
                    //echo ' tag key ' . $key;
                    $tags[] = $key;
                }
                $tags = array_unique($tags);
                $trueItems[$this->welcome->tags] = ['SS' => $tags];
            }
            // ==================================================================
            if (!empty($paddingItems->createdAt)) $trueItems[$this->welcome->createdAt] = ['N' => (string)$paddingItems->createdAt];
            if (!empty($paddingItems->updatedAt)) $trueItems[$this->welcome->updatedAt] = ['N' => (string)$paddingItems->updatedAt];
            // Inbox Sent ======================================================
            if (!empty($paddingItems->messageId)) $trueItems['messageId'] = ['S' => $paddingItems->messageId];
            if (!empty($paddingItems->fromUserId)) $trueItems['fromUserId'] = ['S' => $paddingItems->fromUserId];
            if (!empty($paddingItems->fromUserEmail)) $trueItems['fromUserEmail'] = ['S' => $paddingItems->fromUserEmail];
            if (!empty($paddingItems->toUserId)) $trueItems['toUserId'] = ['S' => $paddingItems->toUserId];
            if (!empty($paddingItems->inReplyTo)) $trueItems['inReplyTo'] = ['S' => $paddingItems->inReplyTo];
            // Article ================================================================
            if (!empty($paddingItems->title)) $trueItems['title'] = ['S' => $paddingItems->title];
            if (!empty($paddingItems->cover)) $trueItems['cover'] = ['S' => (string)$paddingItems->cover];
            //if (!empty($paddingItems['body'])) $trueItems['body'] = ['M' => $this->ddb->marshaler->marshalItem($paddingItems['body'])];
            //if (!empty($paddingItems['body'])) $trueItems['body'] = ['M' => $paddingItems['body']];
            //if (!empty($paddingItems[$this->welcome->tags])) $trueItems[$this->welcome->tags] = ['SS' => (string)$paddingItems[$this->welcome->tags]];
            if (!empty($paddingItems->body)) {
                echo "\n\r paddingItems->body: ";
                var_dump($paddingItems->body);
                $body = [];
                //$body = '';
                foreach ($paddingItems->body as $key => $value) {
                    echo "\n\r foreach body key: $key value: ";
                    print_r($value);
                    foreach ($value as $key2 => $value2) {
                        echo "\n\r foreach2 value key2: $key2 value2: $value2";
                        //$body[][$key2 => ['S' => $value2]];
                        //$body[$key] = [$key2 => ['S' => $value2]];
                        $body = ['M' => [$key2 => ['S' => $value2]]];
                        //$body[$key] = [$key2 => ['S' => $value2]];
                        //$key2 = ['S' => $value2];
                        //$body .= ['S' => $value2];
                    }

                }
                $trueItems['body'] = ['M' => $body];
            }
            /*if (!empty($paddingItems[$this->welcome->tags])) {
                $tags = [];
                foreach ($paddingItems[$this->welcome->tags] as $key)
                {
                    //echo ' tag key ' . $key;
                    $tags[] = $key;
                }
                $trueItems[$this->welcome->tags] = ['SS' => $tags];

            }*/
        }
        if (is_array($paddingItems)) {
            $trueTime = (string)$paddingItems['time'];
            if (!empty($paddingItems['time'])) $trueItems['time'] = ['S' => (string)$trueTime];
            if (!empty($paddingItems['id'])) $trueItems['id'] = ['S' => (string)$paddingItems['id']];
            // Logs ================================================================
            if (!empty($paddingItems['type'])) $trueItems['type'] = ['S' => (string)$paddingItems['type']];
            if (!empty($paddingItems['message'])) $trueItems['message'] = ['S' => (string)$paddingItems['message']];
            if (!empty($paddingItems['eventId'])) $trueItems['eventId'] = ['S' => (string)$paddingItems['eventId']];
            //$trueVal = (string)$paddingItems['val'];
            if (!empty($paddingItems['val'])) $trueItems['val'] = ['S' => (string)$paddingItems['val']];
            if (!empty($paddingItems['file'])) $trueItems['file'] = ['S' => (string)$paddingItems['file']];
            if (!empty($paddingItems['class'])) $trueItems['class'] = ['S' => (string)$paddingItems['class']];
            if (!empty($paddingItems['funct'])) $trueItems['funct'] = ['S' => (string)$paddingItems['funct']];
            if (!empty($paddingItems['request'])) $trueItems['request'] = ['S' => (string)$paddingItems['request']];
            if (!empty($paddingItems['ip'])) $trueItems['ip'] = ['S' => (string)$paddingItems['ip']];
        }
        //echo "\n\rpaddingItems -----> \n\r";
        //print_r($trueItems);
        //echo "\n\r<---- \n\r";
        return $trueItems;
    }

    public function newUser($newUser)
    {
        //echo "\n\rnewUser -----> \n\r";
        //print_r($newUser);
        //echo "\n\r<---- \n\r";
        $trueData = $this->paddingItems($newUser);
        $trueData['userId'] = ['S' => $this->welcome->trueRandom()];
        //echo "\n\rnewUser trueData -----> \n\r";
        //print_r($trueData);
        //echo "\n\r<---- \n\r";
        $this->ddbPutItem('Users', $trueData);
        return $trueData['userId'];
    }

    public function putToVideo($putToVideo)
    {
        $trueData = $this->paddingItems($putToVideo);
        $res = $this->ddbPutItem('Video', $trueData);
        return $res;
    }

    public function putToShareVideo($putToShareVideo)
    {
        $trueData = $this->paddingItems($putToShareVideo);
        $res = $this->ddbPutItem('ShareVideo', $trueData);
        return $res;
    }

    public function putToInbox($putToInbox)
    {
        $putToInbox->userId = $putToInbox->toUserId;
        $trueData = $this->paddingItems($putToInbox);
        $res = $this->ddbPutItem('Inbox', $trueData);
        return $res;
    }

    public function putToSent($putToSent)
    {
        $putToSent->userId = $putToSent->fromUserId;
        $trueData = $this->paddingItems($putToSent);
        $res = $this->ddbPutItem('Sent', $trueData);
        return $res;
    }

    public function putToMessage($putToMessage)
    {
        $trueData = $this->paddingItems($putToMessage);
        $res = $this->ddbPutItem('Message', $trueData);
        return $res;
    }

    public function putToTagsArticle($putToTagsArticle)
    {
        if (!empty($putToTagsArticle['tags']['SS'])) {
            //echo "putToTags \n";
            //print_r($putToTagsArticle);
            foreach ($putToTagsArticle['tags']['SS'] as $key)
            {
                //$tags[] = $key;
                $tagsBody['tag'] = ['S' => $key];
                $tagsBody['time'] = $putToTagsArticle[$this->welcome->updatedAt];
                $tagsBody['article'] = $putToTagsArticle['article'];
                $tagsBody['cover'] = $putToTagsArticle['cover'];
                $tagsBody['title'] = $putToTagsArticle['title'];
                $tagsBody['userDisplayName'] = $putToTagsArticle['userDisplayName'];
                $tagsBody[$this->welcome->updatedAt] = $putToTagsArticle[$this->welcome->updatedAt];
                $tagsBody[$this->welcome->createdAt] = $putToTagsArticle[$this->welcome->createdAt];
                echo "\n putToTags tagsBody ";
                print_r($tagsBody);
                $res = $this->ddbPutItem('Tags', $tagsBody);
                return $res;
            }
        }
        //$res = $this->ddbPutItem('Tags', $trueData);
        //return $res;
    }


}