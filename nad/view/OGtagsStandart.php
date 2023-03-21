<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 27.08.18
 * Time: 8:57
 */

class OGtagsStandart implements iOGtags
{
    public function showOGtags($dom, $head, $trueContentInfo)
    {
        $element = new Element();
        $welcome = new NAD();
        $pg = new PostgreSQL();
        //$contentInfo = $this->getContentInfo();
        $trueContentInfo = $pg->pgPaddingItems($trueContentInfo);

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
                $element->content => 'Vide.me | Media sharing network']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'property',
                $element->attributeValue => 'og:description',
                $element->attributeName2 => 'content',
                $element->attributeValue2 => 'Upload video. Create your own page.'
            ]);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'property',
                $element->attributeValue => 'og:url',
                $element->attributeName2 => 'content',
                $element->attributeValue2 => 'https://www.vide.me/'
            ]);
        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'property',
                $element->attributeValue => 'og:image',
                $element->attributeName2 => 'content',
                //$element->attributeValue2 => 'https://s3.amazonaws.com/vide.me/videme_bf_logo_title.png'
                $element->attributeValue2 => $welcome->getOriginStaticVideMe() . 'videme_bf_logo_title.png'
            ]);
        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'property',
                $element->attributeValue => 'og:type',
                $element->attributeName2 => 'content',
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
        ]);*/
        /*$element->createTextNode($dom, $head, ['text' => "\n"]);
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
        $element->createTextNode($dom, $head, ['text' => "\n"]);*/

        /*$element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'property',
                $element->attributeValue => 'video:duration',
                $element->attributeName2 => 'content',
                $element->attributeValue2 => $og[$welcome->videoDuration]
        ]);*/

    }
}