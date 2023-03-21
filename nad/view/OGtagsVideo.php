<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 09.08.17
 * Time: 14:25
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/iOGtags.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/OGtags.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Html2.php');


class OGtagsVideo implements iOGtags
//class OGtagsVideo extends OGtags
{
    public function showOGtags($dom, $head, $trueContentInfo)
    {
        $element = new Element();
        $welcome = new NAD();
        $pg = new PostgreSQL();
        //$contentInfo = $this->getContentInfo();
        $trueContentInfo = $pg->pgPaddingItems($trueContentInfo);
        //if (!empty($contentInfo)) {
            //echo $contentInfo[$welcome->subject] . "[this->welcome->subject]";

            /*if (!empty($contentInfo['title'])) {
                $og[$welcome->subject] = $contentInfo['title'];
                //$htmlData["title"] = $htmlMetaOpenGraph[$welcome->subject];
            } else {
                $og[$welcome->subject] = "";
            }
            if (!empty($contentInfo['content'])) {
                $og[$welcome->message] = $contentInfo['content'];
            } else {
                $og[$welcome->message] = "";
            }*/
            if (!empty($trueContentInfo['item_id'])) {
                $og['video'] = $trueContentInfo['item_id'];
            } else {
                $og['video'] = "";
            }
            if (!empty($trueContentInfo['created_at'])) {
                $og["updated_time"] = $welcome->pgTimeToIso($trueContentInfo['created_at']);
            } else {
                $og["updated_time"] = "";
            }
            if (!empty($trueContentInfo['cover'])) {
                $item_image = $trueContentInfo['cover'];
            } else {
                $item_image =  $trueContentInfo["item_id"] . '.jpg';
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
            /*$element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:title',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $og[$welcome->subject]
            ]);*/

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
                    $element->attributeValue2 => 'https://www.vide.me/v/?m=' . $og['video']
                    //$element->attributeValue2 => 'https://vide.me/v?m=' . $og['video']
            ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:image',
                    $element->attributeName2 => 'content',
                    //$element->attributeValue2 => 'https://s3.amazonaws.com/img.vide.me/' . $og['video'] . '.jpg'
                    //$element->attributeValue2 => 'https://s3.amazonaws.com/img.vide.me/' . $item_image
                    $element->attributeValue2 => $welcome->getOriginImgVideMe() . $item_image
            ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:type',
                    $element->attributeName2 => 'content',
                    //$element->attributeValue2 => 'video'
                    $element->attributeValue2 => 'video.other'
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
            ]);*/
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
                    //$element->attributeValue2 => 'https://api.vide.me/StrobeMediaPlayback.swf?src=https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8&plugin_hls=flashlsOSMF.swf&autoPlay=true"
                    //$element->attributeValue2 => 'https://api.vide.me/StrobeMediaPlayback.swf?src=https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8&plugin_hls=flashlsOSMF.swf"
                    //$element->attributeValue2 => 'https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8"
                    $element->attributeValue2 => 'https://api.vide.me/embed/?i=' . $og['video']
                ]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:secure_url',
                    $element->attributeName2 => 'content',
                    //$element->attributeValue2 => 'https://api.vide.me/StrobeMediaPlayback.swf?src=https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8&plugin_hls=flashlsOSMF.swf"
                    //$element->attributeValue2 => 'https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8"
                    $element->attributeValue2 => 'https://api.vide.me/embed/?i=' . $og['video']

            ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video',
                    $element->attributeName2 => 'content',
                    //$element->attributeValue2 => 'https://api.vide.me/StrobeMediaPlayback.swf'
                    //$element->attributeValue2 => 'https://s3.amazonaws.com/video.vide.me/' . $og['video'] . ".m3u8"
                    $element->attributeValue2 => $welcome->getOriginVideoVideMe() . $og['video'] . ".m3u8"
            ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'og:video:type',
                    $element->attributeName2 => 'content',
                    //$element->attributeValue2 => 'application/x-shockwave-flash'
                    $element->attributeValue2 => 'video/mp4'
                    //$element->attributeValue2 => 'flash'
            ]);
            $element->createTextNode($dom, $head, ['text' => "\n"]);
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
            /*if (!empty($trueContentInfo['tags'])) { // Следующие объекты монетизации указаны на веб-странице, однако НЕ поддерживаются для указанного 'og:type': og:video:tag

                $tags = json_decode($trueContentInfo['tags'], true);
                if (count($tags) > 0) {
                    foreach ($tags as $value1) {
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
        //}
    }
}