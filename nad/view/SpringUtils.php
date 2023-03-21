<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.04.18
 * Time: 16:13
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Spring.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringViewed.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringViewedMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringVideo.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringVideoMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringImage.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringImageMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringArticle.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringArticleMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringEvent.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringEventMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringFriends.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringFriendsMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringRelToSpr.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringRelToSprMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringRelFromSpr.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringRelFromSprMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringAbout.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringViewedV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringVideoV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringImageV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringArticleV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringEventV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringFriendsV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringFollowersV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringFollowingV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringMyV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringTagsV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringTagsConfV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringTagV3.php');

/*spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});*/

class SpringUtils
{
    public static function formatSpring($type){
        $formatSpring = self::createSpringFormatter($type);
        return $formatSpring;
    }
    public static function createSpringFormatter($type){
        //echo 'createSpringFormatter $type ' . $type;
        switch ($type) {
            case "my_spring":
                //$formatter = new SpringMy();
                $formatter = new SpringMyV3();
                break;
            //case "viewed":
            case "viewedV2":
                $formatter = new SpringViewed();
                break;
            //case "viewedV3":
            case "viewed":
                $formatter = new SpringViewedV3();
                break;
            case "my_viewed":
                $formatter = new SpringViewedMy();
                break;
            //case "posts":
            case "postsV2":
                $formatter = new Spring();
                break;
            //case "postsV3":
            case "posts":
                $formatter = new SpringV3();
                break;
            case "my_posts":
                $formatter = new SpringMy();
                break;
            //case "video":
            case "videoV2":
                $formatter = new SpringVideo();
                break;
            //case "videoV3":
            case "video":
                $formatter = new SpringVideoV3();
                break;
            case "my_video":
                $formatter = new SpringVideoMy();
                //$formatter = new SpringVideoMyV3();
                break;
            //case "image":
            case "imageV2":
                $formatter = new SpringImage();
                break;
            //case "imageV3":
            case "image":
                $formatter = new SpringImageV3();
                break;
            case "my_image":
                $formatter = new SpringImageMy();
                //$formatter = new SpringImageMyV3();
                break;
            //case "article":
            case "articleV2":
                $formatter = new SpringArticle();
                break;
            //case "articleV3":
            case "article":
                $formatter = new SpringArticleV3();
                break;
            case "my_article":
                $formatter = new SpringArticleMy();
                break;
            //case "event":
            case "eventV2":
                $formatter = new SpringEvent();
                break;
            //case "eventV3":
            case "event":
                $formatter = new SpringEventV3();
                break;
            case "my_event":
                $formatter = new SpringEventMy();
                break;
            //case "friends":
            case "friendsV2":
                $formatter = new SpringFriends();
                break;
            //case "friendsV3":
            case "friends":
                $formatter = new SpringFriendsV3();
                break;
            case "tags": // TODO: why for???!!!
                $formatter = new SpringTagsV3();
                break;
            case "tag_of_spring":
                $formatter = new SpringTagV3();
                break;
            case "tags_conf":
                $formatter = new SpringTagsConfV3();
                break;
            case "my_friends":
                $formatter = new SpringFriendsMy();
                break;
            //case "followers":
            case "followersV2":
                $formatter = new SpringRelToSpr();
                break;
            //case "followersV3":
            case "followers":
                $formatter = new SpringFollowersV3();
                break;
            case "my_followers":
                $formatter = new SpringRelToSprMy();
                break;
            //case "following":
            case "followingV2":
                $formatter = new SpringRelFromSpr();
                break;
            //case "followingV3":
            case "following":
                $formatter = new SpringFollowingV3();
                break;
            case "my_following":
                $formatter = new SpringRelFromSprMy();
                break;
            case "about":
                $formatter = new SpringAbout();
                break;
            case "springV3":
                $formatter = new SpringV3();
                break;
            default:
                //$formatter = new Spring();
                $formatter = new SpringV3();
                break;
        }
        return $formatter;
    }
}