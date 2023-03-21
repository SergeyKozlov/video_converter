<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 17.10.18
 * Time: 9:02
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/article/article.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/cm/cm.php');

function maie()
{

    $welcome = new NAD();

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

    $model = new Model();
    $controller = new Controller($model);
    $view = new View($controller, $model);

    $article = new Article(); // TODO: why?
    $cm = new CM();

//$userId = $welcome->CookieToUserId();
    if (!empty($_REQUEST['m'])) $req = $_REQUEST['m'];
    if (!empty($_REQUEST['a'])) $req = $_REQUEST['a'];
    if (!empty($_REQUEST['i'])) $req = $_REQUEST['i'];
    if (!empty($_REQUEST['e'])) $req = $_REQUEST['e'];

    if (!empty($_REQUEST['t'])) $req = $_REQUEST['t'];

    if ($req == '7ce1cda0bbbf') header('Location: https://vide.me/');


    if (!empty($req)) {
        //echo '[' . $ddb->ddbGetArticleByName($_REQUEST['a']) . ']';
        //$welcome->outputCBData($ddb->ddbGetArticleByName($_REQUEST['a']));
        /*print_r($_REQUEST['m']);
        print_r($_REQUEST['a']);
        print_r($_REQUEST['i']);
        print_r($_REQUEST['e']);
        print_r($req);*/
        //$welcome->pgItemCountAdder(['count_item_id' => $req]);
        //print_r($req);

        //$pg = new PostgreSQL();
        //$itemInfo = $welcome->pgItemFullInfo($req);
        $itemInfo = $welcome->pgItemFullInfoAccess(['item_id' => $req]);
        //print_r($itemInfo);

        if (!empty($itemInfo['type'])) {
            // header('Location: https://vide.me/');

            //if ($itemInfo['type'] == 'article') {
            if ($itemInfo['type'] == 'article' and !empty($_REQUEST['t'])) { // TODO: remove
                $showArticle = $welcome->pgGetArticle(['item_id' => $req]);

                /*$showArticle = $welcome->ConvParseData($pg->pgOneDataByColumn([
                    'table' => $pg->table_items,
                    'find_column' => 'item_id',
                    'find_value' => $_REQUEST['a']]));*/

                $HTML_Header['head_title'] = $showArticle['title'];
                $HTML_Header['meta_content_description'] = substr($showArticle['body'][0]['text'], 0, 155);

                $allText = "";
//echo "body ";
//print_r($showArticle['body']);
                foreach ($showArticle['body'] as $value1) {
                    //echo "value1 ";
                    //print_r($value1);
                    foreach ($value1 as $key => $value2) {

                        if ($key == "text") {
                            /*echo "key ";
                            print_r($key);
                            echo "value2 ";
                            print_r($value2);
                            echo "implode(value2) ";
                            print_r(implode($value2));*/
                            //$allText .= implode($value2);
                            $allText .= $value2;
                            //echo "allText ";
                            //print_r($allText);
                        }
                    }
                }
                $showArticle["oaTags"] = $cm->extract_common_words($allText, $cm->stopWord, 20);

                $HTML_Header['meta_content_keywords'] = substr(implode(", ", $showArticle["oaTags"]), 0, 255);

//print_r($fileInfo);

                //$view->htmlArticle($showArticle, $itemInfo);
                $view->htmlArticle($showArticle, $itemInfo);
                exit;
            }
            //if ($itemInfo['type'] == 'article' and !empty($_REQUEST['t'])) {
            if ($itemInfo['type'] == 'article') {
                $showArticle = $welcome->pgGetArticle(['item_id' => $req]);

                /*$showArticle = $welcome->ConvParseData($pg->pgOneDataByColumn([
                    'table' => $pg->table_items,
                    'find_column' => 'item_id',
                    'find_value' => $_REQUEST['a']]));*/

                //$HTML_Header['head_title'] = $showArticle['title'];
                $HTML_Header['head_title'] = $itemInfo['title'];
                //$HTML_Header['meta_content_description'] = substr($showArticle['body'][0]['text'], 0, 155);

                $allText = "";
//echo "body ";
//print_r($showArticle['body']);
                //foreach ($showArticle['body'] as $value1) {
                $bodyJSON = json_decode($itemInfo['body']);
                // wrong $showArticle['body'] = json_encode($showArticle['body']);
                //echo "\npgGetArticle bodyJSON\n";
                //print_r($bodyJSON);
                //exit;
                $trueBody = [];
                foreach ($bodyJSON as $value1) {
                    //echo "\nvalue1 \n";
                    //print_r($value1);
                    $trueBody[] = $welcome->ConvParseData($value1);
                    /*foreach ($value1 as $key => $value2) {
                        echo "\nvalue2 \n";
                        print_r($value2);
                    }*/
                }
                $itemInfo['body'] = $trueBody;
                $HTML_Header['meta_content_description'] = substr($itemInfo['body'][0]['text'], 0, 155);

                foreach ($itemInfo['body'] as $value1) {
                    //echo "value1 ";
                    //print_r($value1);
                    foreach ($value1 as $key => $value2) {

                        if ($key == "text") {
                            /*echo "key ";
                            print_r($key);
                            echo "value2 ";
                            print_r($value2);
                            echo "implode(value2) ";
                            print_r(implode($value2));*/
                            //$allText .= implode($value2);
                            $allText .= $value2;
                            //echo "allText ";
                            //print_r($allText);
                        }
                    }
                }
                //$showArticle["oaTags"] = $cm->extract_common_words($allText, $cm->stopWord, 20);
                $itemInfo["oaTags"] = $cm->extract_common_words($allText, $cm->stopWord, 20);

                //$HTML_Header['meta_content_keywords'] = substr(implode(", ", $showArticle["oaTags"]), 0, 255);
                $HTML_Header['meta_content_keywords'] = substr(implode(", ", $itemInfo["oaTags"]), 0, 255);

//print_r($fileInfo);

                //$view->htmlArticle($showArticle, $itemInfo);
                //$view->htmlArticleV3($showArticle, $itemInfo);
                $view->htmlArticleV3($itemInfo);
                exit;
            }
            /*if ($itemInfo['type'] == 'image' and empty($_REQUEST['t'])) {
                $view->htmlImage($itemInfo);
            }*/
            //if ($itemInfo['type'] == 'image' and !empty($_REQUEST['t'])) {
            if ($itemInfo['type'] == 'image') {

                //error_reporting(0); // Turn off error reporting
                //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors
                //echo '--------------------------------';
                $view->htmlImageV3($itemInfo);
            }
            if ($itemInfo['type'] == 'video' and !empty($_REQUEST['t'])) {// TODO: Delete?
                //error_reporting(0); // Turn off error reporting
                //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

                //$fileInfo = $welcome->pgItemFullInfo($req); // TODO: why?
                $fileInfo = $itemInfo; // TODO: why?
                //print_r($fileInfo);
                if (!empty($fileInfo['title'])) {
                    $fileInfo['meta_content_description'] = substr($fileInfo['title'], 0, 155);
                } else {
                    //$trueFileInfo[$welcome->subject] = "";
                    $fileInfo["title"] = "";
                    $fileInfo['meta_content_description'] = "";
                }
                if (!empty($fileInfo['tags']) and count(json_decode($fileInfo['tags'], true)) > 0) { // TODO: control convert json
                    $fileInfo['meta_content_keywords'] = substr(implode(", ", $fileInfo['tags']), 0, 255);
                } else {
                    $fileInfo['meta_content_keywords'] = "";
                }
//print_r($fileInfo);
                //$view->htmlVideoTest11072019($fileInfo);
                //$view->htmlVideoV3($fileInfo);
                $view->htmlVideo($itemInfo);
                exit;
            }
            if ($itemInfo['type'] == 'video' or $itemInfo['type'] == 'videoEmail') {
                //$fileInfo = $welcome->pgItemFullInfo($req); // TODO: why?
                //$fileInfo = $itemInfo; // TODO: why?
                if (!empty($itemInfo['title'])) {
                    $itemInfo['meta_content_description'] = substr($itemInfo['title'], 0, 155);
                } else {
                    //$trueFileInfo[$welcome->subject] = "";
                    $itemInfo["title"] = "";
                    $itemInfo['meta_content_description'] = "";
                }

                if (is_array($itemInfo['tags'])) {
                    if (!empty($itemInfo['tags']) and count(json_decode($itemInfo['tags'], true)) > 0) { // TODO: control convert json
                        $itemInfo['meta_content_keywords'] = substr(implode(", ", $itemInfo['tags']), 0, 255);
                    } else {
                        $itemInfo['meta_content_keywords'] = "";
                    }
                } else {
                    $itemInfo['meta_content_keywords'] = "";
                    $itemInfo['tags'] = [];
                }
//print_r($fileInfo);
                //$view->htmlVideo($itemInfo);
                $view->htmlVideoV3($itemInfo);
                exit;
            }
            if ($itemInfo['type'] == 'event' and !empty($_REQUEST['t'])) { // TODO: remove

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

                //$showArticle = $welcome->pgGetArticle(['item_id' => $req]);
                //$showArticle = $welcome->pgItemFullInfo($req);

                /*$showArticle = $welcome->ConvParseData($pg->pgOneDataByColumn([
                    'table' => $pg->table_items,
                    'find_column' => 'item_id',
                    'find_value' => $_REQUEST['a']]));*/

                $HTML_Header['head_title'] = $itemInfo['title'];
                $HTML_Header['meta_content_description'] = substr($itemInfo['body'][0]['text'], 0, 155);

                $allText = "";
//echo "body ";
//print_r($itemInfo['body']);
                foreach ($itemInfo['body'] as $value1) {
                    //echo "value1 ";
                    //print_r($value1);
                    foreach ($value1 as $key => $value2) {

                        if ($key == "text") {
                            /*echo "key ";
                            print_r($key);
                            echo "value2 ";
                            print_r($value2);
                            echo "implode(value2) ";
                            print_r(implode($value2));*/
                            //$allText .= implode($value2);
                            $allText .= $value2;
                            //echo "allText ";
                            //print_r($allText);
                        }
                    }
                }
                $itemInfo["oaTags"] = $cm->extract_common_words($allText, $cm->stopWord, 20);

                $HTML_Header['meta_content_keywords'] = substr(implode(", ", $itemInfo["oaTags"]), 0, 255);

//print_r($fileInfo);

                //$view->htmlArticle($showArticle, $itemInfo);
                $view->htmlEvent($itemInfo);
                exit;
            }

            //if ($itemInfo['type'] == 'event' and !empty($_REQUEST['t'])) {
            if ($itemInfo['type'] == 'event') {

                //error_reporting(0); // Turn off error reporting
                //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

                //$showArticle = $welcome->pgGetArticle(['item_id' => $req]);
                //$showArticle = $welcome->pgItemFullInfo($req);

                /*$showArticle = $welcome->ConvParseData($pg->pgOneDataByColumn([
                    'table' => $pg->table_items,
                    'find_column' => 'item_id',
                    'find_value' => $_REQUEST['a']]));*/

                $HTML_Header['head_title'] = $itemInfo['title'];
                //$HTML_Header['meta_content_description'] = substr($itemInfo['body'][0]['text'], 0, 155);

                $allText = "";
//echo "body ";
//print_r($itemInfo['body']);
/*                foreach ($itemInfo['body'] as $value1) {
                    //echo "value1 ";
                    //print_r($value1);
                    foreach ($value1 as $key => $value2) {

                        if ($key == "text") {
                            /!*echo "key ";
                            print_r($key);
                            echo "value2 ";
                            print_r($value2);
                            echo "implode(value2) ";
                            print_r(implode($value2));*!/
                            //$allText .= implode($value2);
                            $allText .= $value2;
                            //echo "allText ";
                            //print_r($allText);
                        }
                    }
                }*/
    $bodyJSON = json_decode($itemInfo['body']);
    // wrong $showArticle['body'] = json_encode($showArticle['body']);
    //echo "\npgGetArticle bodyJSON\n";
    //print_r($bodyJSON);
    //exit;
    $trueBody = [];
    foreach ($bodyJSON as $value1) {
        //echo "\nvalue1 \n";
        //print_r($value1);
        $trueBody[] = $welcome->ConvParseData($value1);
        /*foreach ($value1 as $key => $value2) {
            echo "\nvalue2 \n";
            print_r($value2);
        }*/
    }
    $itemInfo['body'] = $trueBody;
                $itemInfo["oaTags"] = $cm->extract_common_words($allText, $cm->stopWord, 20);

                $HTML_Header['meta_content_keywords'] = substr(implode(", ", $itemInfo["oaTags"]), 0, 255);
                $HTML_Header['meta_content_description'] = substr($itemInfo['body'][0]['text'], 0, 155);

//print_r($fileInfo);

                //$view->htmlArticle($showArticle, $itemInfo);
                $view->htmlEventV3($itemInfo);
                exit;
            }

        } else {
            $fileInfo = $welcome->pgItemFullInfo($req);
            $view->htmlPrivateItem($fileInfo);
            exit;
            //header('Location: https://vide.me/');
        }

    } else {
        echo 'i';
    }

//print_r($showArticle);
//exit;

//$showArticle = $article->getArticle(['article' => $_GET['yyyy'] . "/" . $_GET['mm'] . "/" . $_GET['dd'] . "/" . $_GET['article']]);
}