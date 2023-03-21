<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 09.08.17
 * Time: 14:30
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/OGtagsVideo.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/OGtagsArticle.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/OGtagsImage.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/OGtagsSpring.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/OGtagsStandart.php');


class OGtagsUtils
{

    public static function formatOGtags($type){
        $formatOGtags = self::createOGtagsFormatter($type);
        return $formatOGtags;
    }
    public static function createOGtagsFormatter($type){
        if (!empty($type['type'])) {
            switch ($type['type']) {
                case 'video':
                    $formatter = new OGtagsVideo();
                    break;
                case 'article':
                    $formatter = new OGtagsArticle();
                    break;
                case 'image':
                    $formatter = new OGtagsImage();
                    break;
                case 'index':
                    $formatter = new OGtagsStandart();
                    break;
                default:
                    $formatter = new OGtagsVideo();
            }
        } elseif (!empty($type['spring'])) {
            $formatter = new OGtagsSpring();
        } else {
            $formatter = new OGtagsSpring();
        }
        return $formatter;
    }
}