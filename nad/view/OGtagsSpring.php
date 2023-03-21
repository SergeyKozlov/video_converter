<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 16.07.18
 * Time: 12:58
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/iOGtags.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Html2.php');


class OGtagsSpring implements iOGtags
{
    public function showOGtags($dom, $head, $trueContentInfo)
    {
        //print_r($contentInfo);
        $element = new Element();
        $welcome = new NAD();
        //$contentInfo = $this->getContentInfo();
        if (!empty($trueContentInfo)) {
            if (!empty($trueContentInfo['user_display_name'])) {
                $user_display_name = $trueContentInfo['user_display_name'];
            } else {
                $user_display_name = "";
            }
            if (!empty($trueContentInfo['user_cover'])) {
                //$user_cover = "https://img.rate-my.life/" . $trueContentInfo['user_cover'];
                $user_cover = $welcome->getOriginImgVideMe() . $trueContentInfo['user_cover'];
            } else {
                //$user_cover = "https://img.rate-my.life/videme_cover.png";
                $user_cover = $welcome->getOriginImgVideMe() . "videme_cover.png";
            }
            if (!empty($trueContentInfo['spring'])) {
                $link = "https://www.vide.me/" . $trueContentInfo['spring'];
            } else {
                $link = "https://www.vide.me";
            }
            if (!empty($trueContentInfo['bio'])) {
                $bio = $trueContentInfo['bio'];
            } else {
                $bio = "Vide.me video service";
            }

            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:site_name',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'Vide.me'
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'fb:app_id',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => '1675775936007165'
                ]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property =>'og:title',
                    $element->content => $user_display_name . ' | Vide.me']);
            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:description',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $bio
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:url',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $link
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:image',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $user_cover
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:type',
                    $element->attributeName2 => 'content',
                    //$element->attributeValue2 => 'video'
                    $element->attributeValue2 => 'website'
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
        }
    }
}