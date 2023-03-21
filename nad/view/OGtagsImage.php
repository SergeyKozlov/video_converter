<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 14.07.18
 * Time: 16:13
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/iOGtags.php');

class OGtagsImage implements iOGtags
{
    public function showOGtags($dom, $head, $contentInfo)
    {
        $element = new Element();
        $welcome = new NAD();
        $pg = new PostgreSQL();
        $trueContentInfo = $pg->pgPaddingItems($contentInfo);
        if (!empty($trueContentInfo)) {
            //echo $contentInfo[$welcome->subject] . "[this->welcome->subject]";

            /*if (!empty($trueContentInfo['title'])) {
                $og[$welcome->subject] = $trueContentInfo['title'];
                //$htmlData["title"] = $htmlMetaOpenGraph[$welcome->subject];
            } else {
                $og[$welcome->subject] = "";
            }
            if (!empty($trueContentInfo['cover'])) {
                $og["cover"] = $trueContentInfo['cover'];
            } else {
                $og["cover"] = "";
            }
            if (!empty($trueContentInfo['content'])) {
                $og[$welcome->message] = $trueContentInfo['content'];
            } else {
                $og[$welcome->message] = "";
            }
            if (!empty($trueContentInfo['item_id'])) {
                $og['item_id'] = $trueContentInfo['item_id'];
            } else {
                $og['item_id'] = "";
            }*/
            if (!empty($trueContentInfo['created_at'])) {
                $og["updated_time"] = $welcome->pgTimeToIso($trueContentInfo['created_at']);
            } else {
                $og["updated_time"] = "";
            }
            /*if (!empty($contentInfo['updated_at'])) {
                $og["updated_time"] = $welcome->pgTimeToIso($contentInfo['updated_at']);
            } else {
                $og["updated_time"] = "";
            }*/

            if (!empty($trueContentInfo['video_duration'])) {
                $og[$welcome->videoDuration] = $trueContentInfo['video_duration'];
            } else {
                $og[$welcome->videoDuration] = "";
            }

            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:site_name',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'Vide.me'
                ]);
            //$element->createTextNode($dom, $head, ['text' => "</meta>"]);
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
                    $element->content => 'Vide.me | ' . $trueContentInfo['title']]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:description',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $trueContentInfo['user_display_name'] . " | " . $trueContentInfo['title']
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:url',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'https://www.vide.me/i/?i=' . $trueContentInfo['item_id']
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:image',
                    $element->attributeName2 => 'content',
                    //$element->attributeValue2 => 'https://s3.amazonaws.com/img.vide.me/' . $trueContentInfo['cover']
                    $element->attributeValue2 => $welcome->getOriginImgVideMe() . $trueContentInfo['cover']
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
            /*$element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:url',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'https://api.vide.me/embed/?m=' . $og['video']
            ]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:secure_url',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'https://api.vide.me/embed/?m=' . $og['video']
            ]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:type',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'text/html'
            ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:width',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => '320'
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:height',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => '180'
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:url',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'https://api.vide.me/StrobeMediaPlayback.swf?src=https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8&plugin_hls=flashlsOSMF.swf&autoPlay=true"
                ]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:secure_url',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'https://api.vide.me/StrobeMediaPlayback.swf?src=https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8&plugin_hls=flashlsOSMF.swf&autoPlay=true"
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'https://api.vide.me/StrobeMediaPlayback.swf'
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:type',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => 'application/x-shockwave-flash'
                    //$element->attributeValue2 => 'flash'
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);*/
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:updated_time',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $og["updated_time"]
                ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            /*$element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'video:duration',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $og[$welcome->videoDuration]
            ]);*/
            /*if (!empty($contentInfo[$welcome->tags])) {
                if (count($contentInfo[$welcome->tags]) > 0) {
                    foreach ($contentInfo[$welcome->tags] as $value1) {
                        //echo "<meta property=\"og:video:tag\" content=\" . $value1 . \">";
                        $element->writeSmartTag($dom, $head,
                            [$element->elementName => 'meta',
                                $element->attributeName => 'property',
                                $element->attributeValue => 'og:video:tag',
                                $element->attributeName2 => 'content',
                                $element->attributeValue2 => $value1]);
                    }
                }
                $element->createTextNode($dom, $head, ['text' => "\n"]);
            }*/
        }
    }
}