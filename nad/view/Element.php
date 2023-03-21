<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 28.07.17
 * Time: 15:35
 */

//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');

class Element
{
    //public $welcome;
    public function __construct()
    {
        //$this->welcome = new NAD();
        $this->elementName = 'elementName';
        $this->attributeName = 'attributeName';
        $this->attributeName2 = 'attributeName2';
        $this->attributeName3 = 'attributeName3';
        $this->attributeValue = 'attributeValue';
        $this->attributeValue2 = 'attributeValue2';
        $this->attributeValue3 = 'attributeValue3';
        $this->text = 'text';
        $this->class = 'class';
        $this->type = 'type';
        $this->text_css = 'text/css';
        $this->property = 'property';
        $this->content = 'content';
        $this->src = 'src';
        $this->href = 'href';
        $this->rel = 'rel';
        $this->stylesheet = 'stylesheet';
        $this->shortcut_icon = 'shortcut icon';
        $this->apple_touch_icon = 'apple-touch-icon';
        $this->og_meta = 'og_meta';
        $this->text_javascript = 'text/javascript';
        $this->text_x_tmpl = 'text/x-tmpl';
        $this->sizes = 'sizes';
        $this->fragmentElement = null;
    }
    public function writeElement($doc, $parent, $writeElement)
    {
        if (isset($doc) && isset($writeElement[$this->elementName])){
            $element = $this->createElement($doc, $parent, $writeElement);
            if (isset($writeElement[$this->attributeName])
                && isset($writeElement[$this->attributeValue])) {
                $this->createAttribute($doc, $element, $writeElement[$this->attributeName], $writeElement[$this->attributeValue]);
            }
            if (isset($writeElement[$this->attributeName2])
                && isset($writeElement[$this->attributeValue2])) {
                $this->createAttribute($doc, $element, $writeElement[$this->attributeName2], $writeElement[$this->attributeValue2]);
            }
            if (isset($writeElement[$this->attributeName3])
                && isset($writeElement[$this->attributeValue3])) {
                $this->createAttribute($doc, $element, $writeElement[$this->attributeName3], $writeElement[$this->attributeValue3]);
            }
            if (isset($writeElement[$this->text])) {
                $this->createTextNode($doc, $element, $writeElement);
            }
            return $element;
        } else {
            return false;
        }
    }
    public function createElement($doc, $parent, $createElement){
        $element = $doc->createElement($createElement[$this->elementName]);
        $parent->appendChild($element);
        return $element;
    }
    public function createAttribute($doc, $element, $attributeName, $attributeValue)
    {
        $attributeElement = $doc->createAttribute($attributeName);
        //$attributeElement->value = $attributeValue;
        $attributeElement->value = htmlspecialchars($attributeValue);
        $element->appendChild($attributeElement);
    }
    public function createTextNode($doc, $element, $createTextNode)
    {
        $textElement = $doc->createTextNode($createTextNode[$this->text]);
        $element->appendChild($textElement);
    }
    public function writeDiv($doc, $parent, $writeDiv)
    {
        $writeDiv[$this->elementName] = 'div';
        $writeDiv[$this->attributeName] = 'class';
        return $this->writeElement($doc, $parent, $writeDiv);
    }
    public function writeSmartTag($doc, $parent, $writeSmartTag)
    {
        if (isset($writeSmartTag[$this->class])){
            $writeSmartTag[$this->elementName] = 'div';
            $writeSmartTag[$this->attributeName] = 'class';
            $writeSmartTag[$this->attributeValue] = $writeSmartTag[$this->class];
        }
        if (isset($writeSmartTag[$this->type])){
            if ($writeSmartTag[$this->type] == $this->og_meta) {
                $writeSmartTag[$this->elementName] = 'meta';
                $writeSmartTag[$this->attributeName] = 'property';
                $writeSmartTag[$this->attributeValue] = $writeSmartTag[$this->property];
                $writeSmartTag[$this->attributeName2] = 'content';
                $writeSmartTag[$this->attributeValue2] = $writeSmartTag[$this->content];
            }
            if ($writeSmartTag[$this->type] == $this->text_javascript) {
                $writeSmartTag[$this->elementName] = 'script';
                $writeSmartTag[$this->attributeName] = 'type';
                $writeSmartTag[$this->attributeValue] = $writeSmartTag[$this->type];
                if (isset($writeSmartTag[$this->src])){
                    $writeSmartTag[$this->attributeName2] = $this->src;
                    $writeSmartTag[$this->attributeValue2] = $writeSmartTag[$this->src];
                }
            }
            if ($writeSmartTag[$this->type] == $this->text_x_tmpl) {
                $writeSmartTag[$this->elementName] = 'script';
                $writeSmartTag[$this->attributeName] = 'type';
                $writeSmartTag[$this->attributeValue] = $writeSmartTag[$this->type];
                if (isset($writeSmartTag[$this->src])){
                    $writeSmartTag[$this->attributeName2] = $this->src;
                    $writeSmartTag[$this->attributeValue2] = $writeSmartTag[$this->src];
                }
            }
            if ($writeSmartTag[$this->type] == $this->text_css) {
                $writeSmartTag[$this->elementName] = 'link';
                $writeSmartTag[$this->attributeName] = 'type';
                $writeSmartTag[$this->attributeValue] = $writeSmartTag[$this->type];
                $writeSmartTag[$this->attributeName2] = $this->href;
                $writeSmartTag[$this->attributeValue2] = $writeSmartTag[$this->href];
                $writeSmartTag[$this->attributeName3] = $this->rel;
                $writeSmartTag[$this->attributeValue3] = $this->stylesheet;
            }
        }
        if (isset($writeSmartTag[$this->rel])){
            if ($writeSmartTag[$this->rel] == $this->apple_touch_icon) {
                $writeSmartTag[$this->elementName] = 'link';
                $writeSmartTag[$this->attributeName] = $this->rel;
                $writeSmartTag[$this->attributeValue] = $writeSmartTag[$this->rel];
                $writeSmartTag[$this->attributeName2] = $this->sizes;
                $writeSmartTag[$this->attributeValue2] = $writeSmartTag[$this->sizes];
                $writeSmartTag[$this->attributeName3] = $this->href;
                $writeSmartTag[$this->attributeValue3] = $writeSmartTag[$this->href];
            }
            if ($writeSmartTag[$this->rel] == $this->shortcut_icon) {
                $writeSmartTag[$this->elementName] = 'link';
                $writeSmartTag[$this->attributeName] = $this->rel;
                $writeSmartTag[$this->attributeValue] = $writeSmartTag[$this->rel];
                $writeSmartTag[$this->attributeName3] = $this->href;
                $writeSmartTag[$this->attributeValue3] = $writeSmartTag[$this->href];
            }
        }
        return $this->writeElement($doc, $parent, $writeSmartTag);
    }

    /**
     * @return null
     */
    public function writeFragmentElement($doc, $parent, $fragment)
    {
        $fragmentSidebar = $doc->createDocumentFragment();
        //$fragment = $this->welcome->safetyTagsSlashesTrim4096($fragment); // Nooo!!!
        $fragmentSidebar->appendXML($fragment);
        try {
            $this->fragmentElement = $parent->appendChild($fragmentSidebar);
        } catch (Throwable $e) {
            $this->fragmentElement = $parent->appendChild('');
        }
        //$this->fragmentElement = $parent->appendChild(new DOMText($fragment)); // &lt;h3&gt;Error&lt;/h3&gt;


        return $this->fragmentElement;
    }


    public function writeFragmentElement2($doc, $parent, $fragment)
    {
        $fragmentSidebar = $doc->createDocumentFragment();
        $element = $this->createElement($doc, $parent, $fragment);

        //$fragment = $this->welcome->safetyTagsSlashesTrim4096($fragment); // Nooo!!!
        $element->createTextNode($fragment);
        try {
            $this->fragmentElement = $parent->appendChild($fragmentSidebar);
        } catch (Throwable $e) {
            $this->fragmentElement = $parent->appendChild('');
        }
        //$this->fragmentElement = $parent->appendChild(new DOMText($fragment)); // &lt;h3&gt;Error&lt;/h3&gt;


        return $this->fragmentElement;
    }



}