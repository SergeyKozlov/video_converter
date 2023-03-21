<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 09.08.17
 * Time: 14:30
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/iOGtags.php');

class OGtagsArticle implements iOGtags
{
    public function showOGtags($dom, $head, $contentInfo)
    {
        //print_r($contentInfo);
        //$contentInfo = $this->getContentInfo();
        $element = new Element();
        $welcome = new NAD();
        $pg = new PostgreSQL();
        $trueContentInfo = $pg->pgPaddingItems($contentInfo);
        if (!empty($trueContentInfo)) {
            /*if (!empty($trueContentInfo['item_id'])) {
                $og["url"] = 'https://vide.me/a/?a=' . $trueContentInfo['item_id'];
                //$htmlData["title"] = $htmlMetaOpenGraph[$welcome->subject];
            } else {
                $og["url"] = "";
            }
            if (!empty($trueContentInfo['title'])) {
                $og["title"] = $trueContentInfo['title'];
            } else {
                $og["title"] = "";
            }
            if (!empty($trueContentInfo['cover'])) {
                $og["cover"] = $trueContentInfo['cover'];
            } else {
                $og["cover"] = "";
            }
            if (!empty($trueContentInfo[$welcome->userDisplayName])) {
                $og[$welcome->userDisplayName] = $trueContentInfo[$welcome->userDisplayName];
            } else {
                $og[$welcome->userDisplayName] = "";
            }*/
            if (!empty($trueContentInfo['created_at'])) {
                // date(DATE_ISO8601, strtotime('2010-12-30 23:21:46'))
                $og["created_at"] = $welcome->pgTimeToIso($trueContentInfo['created_at']);
                //$og["created_at"] = date(DATE_ISO8601, strtotime($contentInfo['created_at']));
            } else {
                $og["created_at"] = "";
            }
            /*if (!empty($contentInfo[$welcome->updatedAt])) {
                $og["updated_time"] = date("c", $contentInfo[$welcome->updatedAt]);
            } else {
                $og["updated_time"] = "";
            }*/
            /*if (!empty($trueContentInfo["category"])) {
                $og["category"] = $trueContentInfo['category'];
            } else {
                $og["category"] = "";
            }*/
            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'og:site_name',
                    $element->content => 'Vide.me ']);

            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'fb:app_id',
                    $element->content => '1675775936007165']);

            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'og:type',
                    $element->content => 'article']);
            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'og:url',
                    $element->content => 'https://vide.me/a/?a=' . $trueContentInfo['item_id']]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'og:title',
                    $element->content => 'Vide.me | ' . $trueContentInfo['title']]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'og:description',
                    $element->content => $trueContentInfo['user_display_name'] . " | " . $trueContentInfo['title']]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'og:image',
                    //$element->content => 'https://s3.amazonaws.com/img.vide.me/' . $trueContentInfo["cover"]]);
                    $element->content => $welcome->getOriginImgVideMe() . $trueContentInfo["cover"]]);
            // TODO: https://stackoverflow.com/questions/29748013/what-is-the-correct-implementation-of-the-open-graph-article-type
            /*$element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'property',
                    $element->attributeValue => 'article:author',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $og[$welcome->userLink]
                ]);*/
            $element->createTextNode($dom, $head, ['text' => "\n"]);

            $element->writeSmartTag($dom, $head,
                [$element->type => $element->og_meta,
                    $element->property => 'article:published_time',
                    $element->content => $trueContentInfo["created_at"]]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);

            /*$element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    [$element->type => $element->og_meta,
                        $element->property => 'article:section',
                        $element->content => $trueContentInfo["category"]]]);*/

            $element->createTextNode($dom, $head, ['text' => "\n"]);
            if (!empty($trueContentInfo[$welcome->tags])) {
                $tags = json_decode($trueContentInfo['tags'], true);
                if (count($tags) > 0) {
                    foreach ($tags as $value1) {
                        //echo "<meta property=\"article:tag\" content=\" . $value1 . \">";
                        $element->writeSmartTag($dom, $head,
                            [$element->type => $element->og_meta,
                                $element->property => 'article:tag',
                                $element->content => $value1]);
                    }
                }
            }
        }
    }
}