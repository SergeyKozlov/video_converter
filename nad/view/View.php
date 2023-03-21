<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 25.07.17
 * Time: 17:01
 */

//include_once($_SERVER['DOCUMENT_ROOT'] . '/pas/html/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Html2.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLsample.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringUtils.php');

/*spl_autoload_register(function ($name) {
    echo "Хочу загрузить $name.\n";
    throw new Exception("Невозможно загрузить $name.");
});*/


class View
{

    private $model;
    private $controller;

    public function __construct($controller, $model)
    {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output()
    {
        return "<p>zzz<a href='mvc.php?action=clicked'>" . $this->model->string . "ccc</a></p>";
    }

    public function mainHtml($mainHtml, $dom, $contentInfo = [])
    {
        $html = new Html2();

        $html->setContentInfo($contentInfo);


        //echo "========+++++++++++++++++===========";

        //$dom = $html->htmlSet($dom);

        //echo $html->row('test row');
//$this->model->stack;

        $domOutput = $html->templateStandart($mainHtml, $dom);
        return $domOutput;
        //print_r($html->templateStandart('f'));

        //$body = $dom->getElementsByTagName('body')->item(0);


        //$html = new Html2();
        /*echo $html->tagHTML(
            ["type" => "article", "html_lang" => "en"],
            ["next1" => "End of test", "next2" => "End of test 22222"]

        );*/
        //echo $html->tagHTMLBegin($mainHtml);
        //echo $html->tagHead($mainHtml);


        //echo $html->showOG("1234567890");

        //$sidebar = SidebarUtils::formatSidebar($mainHtml);
        //echo $sidebar->showSidebar();
        //echo $html->mainContainer($sidebar->showNav());

        //echo $html->showFooter();
        //echo $html->tagHTMLend();

    }

    public function htmlVideo($contentInfo)
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'item'
        ], $dom, $contentInfo);
        $html->showcaseVideo($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlVideoV3($contentInfo)
    {

        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'itemV3'
        ], $dom, $contentInfo);
        $html->showcaseTileForItemV3($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlNextShocase($contentInfo = '')
    {

        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'empty'
        ], $dom, $contentInfo);
        //$html->showcaseTileForItemV3($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlPrivateItem($contentInfo)
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'item'
        ], $dom, $contentInfo);
        $html->showcasePrivateItem($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlVideoTest11072019($contentInfo)
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'itemTest11072019'
        ], $dom, $contentInfo);
        $html->showcaseVideoTest11072019($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlVideoTest05022019($contentInfo) // remove 26072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'item'
        ], $dom, $contentInfo);
        $html->showcaseVideoTest05022019($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlImage($contentImage) // remove 26072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'item'
        ], $dom, $contentImage);
        $html->showcaseImage($dom, $domOutput, $contentImage);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlImageV3($contentImage)
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'imageV3'
            //'sidebar' => 'itemV3' // nooo
        ], $dom, $contentImage);
        //$html->showcaseImage($dom, $domOutput, $contentImage);
        $html->showcaseTileForItemV3($dom, $domOutput, $contentImage);
        echo $dom->saveHTML();
        //echo $dom->saveXML(); // <?xml version="1.0"
    }

    public function htmlMessage()
    {
        $this->mainHtml([
            'sidebar' => 'message'
        ]);

    }
    public function htmlNewVideo()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'new video'
        ], $dom);
        $html->showcaseNewVideo($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlNewVideoMobile()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));

        $userId = $welcome->CookieToUserId();
        $userInfo = [];
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        }

        $domOutput = $this->mainHtml([
            'sidebar' => 'new video'
        ], $dom, $userInfo);
        $html->showcaseNewVideoMobile($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlNewVideoMobileB()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'new video'
        ], $dom);
        $html->showcaseNewVideoMobileB($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlIndex()
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();

        //error_reporting(0); // Turn off error reporting
        //error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $userId = $welcome->CookieToUserId();
        //echo $userId;
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        }
        $userInfo['type'] = 'index';
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'navV3'
            ], $dom, $userInfo);
            $html->showcaseIndexV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'index'
            ], $dom, $userInfo);
            $html->showcaseIndex($dom, $domOutput);
        }*/

        echo $dom->saveHTML();
    }
    public function htmlMyConnect() // remove 26072022
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();

        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        }
        $userInfo['type'] = 'index';
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'navV3'
            ], $dom, $userInfo);
            //$html->showcaseMyConnectV3($dom, $domOutput);
            $html->showcaseMyConnectV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'index'
            ], $dom, $userInfo);
            $html->showcaseIndex($dom, $domOutput);
        }*/

        echo $dom->saveHTML();
    }
    public function htmlIndexAdd()
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $type['type'] = 'index';
        $domOutput = $this->mainHtml([
            'sidebar' => 'index'
        ], $dom, $type);
        $html->showcaseIndexAdd($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlSignIn()
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();

        $userId = $welcome->CookieToUserId();
        $userInfo = [];

        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom, $userInfo);
        $html->showcaseSignIn($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlSignInV2()
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();

        $userId = $welcome->CookieToUserId();
        $userInfo = [];

        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom, $userInfo);
        $html->showcaseSignInV2($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlNewUserV2()
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();

        $userId = $welcome->CookieToUserId();
        $userInfo = [];

        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom, $userInfo);
        $html->showcaseNewUserV2($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlRestore()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom);
        $html->showcaseRestore($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlOpportunities()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom);
        $html->showcaseOpportunities($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlOpportunitiesNew()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'opportunities'
        ], $dom);
        $html->showcaseOpportunitiesNew($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlUnsubscribe()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom);
        $html->showcaseUnsubscribe($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlBlocked()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom);
        $html->showcaseBlocked($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlDeletion()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom);
        $html->showcaseDeleted($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlFreeEmail()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'signin'
        ], $dom);
        $html->showcaseFreeEmail($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlPas()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        $userInfo = [];
        $sidebar = 'signin';
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
            $sidebar = 'pasV3';
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => $sidebar
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePas($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlProfileState()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        $userInfo = [];
        $sidebar = 'signin';
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
            $sidebar = 'pasV3';
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => $sidebar
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcaseProfileState($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlPasInfo()
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        //print_r($userInfo);
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasInfo($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlPasSpring() // 28072022
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasSpring($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlPasRelation() // remove 26072022
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasRelation($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlNetworkImFollowing() // 26072022
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkImFollowing($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlNetworkMyFollowers() // 26072022
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkMyFollowers($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlNetworkFriends() // 26072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        //print_r($userId);
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkFriends($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlNetworkDenialOfFriendship() // 27072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkDenialOfFriendship($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlNetworkRecommendedFriends()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkRecommendedFriends($dom, $domOutput);
        echo $dom->saveHTML();
    }

    public function htmlChartItems()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $welcome->staffNadInvite();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
        $domOutput = $this->mainHtml([
            //'sidebar' => 'index'
            'sidebar' => 'chartV3'
        ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseChartItems($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlChartShareItem() // 27072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        //$userId = $welcome->CookieToUserId();
        /*if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }*/
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
        $domOutput = $this->mainHtml([
            //'sidebar' => 'index'
            'sidebar' => 'chartV3'
        ], $dom);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseChartShareItem($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlEssencesToMe()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'networkV3'
        ], $dom, $userInfo);
        $html->showcaseEssencesToMe($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlEssencesFromMe()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'networkV3'
        ], $dom, $userInfo);
        $html->showcaseEssencesFromMe($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlNetworkRecommendedConnection()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkRecommendedConnection($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlNetworkPendingFriends()
    {
        $html = new Html2();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkPendingFriends($dom, $domOutput); // 27072022
        echo $dom->saveHTML();
    }
    public function htmlNetworkRequestsFriends() // 27072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                'sidebar' => 'networkV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'network'
            ], $dom, $userInfo);
        }*/
        $html->showcaseNetworkRequestsFriends($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlPasArticleMy()
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
        if (!empty($_GET['item'])) {
            $userInfo = $welcome->pgItemFullInfo($_GET['item']);
        }
            $domOutput = $this->mainHtml([
                //'sidebar' => 'index'
                //'sidebar' => 'articleV3'
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
            $html->showcaseMyArticleV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
            $html->showcaseMyArticle($dom, $domOutput);
        }*/
        echo $dom->saveHTML();

    }
    public function htmlPasArticleUpdate() // remove
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;

        $domOutput = $this->mainHtml([
            'sidebar' => 'message'
        ], $dom, $userInfo);
        $html->showcasePasArticleUpdate($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlPasArticleNew() // remove
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;

        $domOutput = $this->mainHtml([
            'sidebar' => 'message'
        ], $dom, $userInfo);
        $html->showcasePasArticleNew($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlInbox()
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
            $html->showcaseInboxV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
        }*/
        $html->showcaseInbox($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlSent()
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
            $html->showcaseSentV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
            $html->showcaseSent($dom, $domOutput);
        }*/

        echo $dom->saveHTML();

    }
    public function htmlHistoryUpload()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
        }*/
        $html->showcaseHistoryUpload($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlHistoryStarred()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
        }*/
        $html->showcaseHistoryStarred($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlHistoryTagged() // 26072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'my_tagsV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
        }*/
        $html->showcaseHistoryTagged($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlEarnedTags() // 26072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'my_tagsV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
        }*/
        $html->showcaseEarnedTags($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlHistoryTagsConfirmed()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'my_tagsV3'
        ], $dom, $userInfo);
        $html->showcaseHistoryTagsConfirmed($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlHistoryLikes()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
        }*/
        $html->showcaseHistoryLikes($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlUpload() // recreate remove
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $domOutput = $this->mainHtml([
            'sidebar' => 'new video'
        ], $dom, $userInfo);
        $html->showcaseUpload($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlUploadTest()
    {
        $html = new Html2();
        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;
        $domOutput = $this->mainHtml([
            'sidebar' => 'new video'
        ], $dom, $userInfo);
        $html->showcaseUploadModal($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlMy()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
        if (!empty($_GET['item'])) {
            $userInfo = $welcome->pgItemFullInfo($_GET['item']);
        }
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
            $html->showcaseMyV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
            $html->showcaseMy($dom, $domOutput);
        }*/
        echo $dom->saveHTML();
    }
    public function htmlMyPosts()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) { // TODO: Remove on V3
            //$userInfo = $welcome->pgUserInfo($userId);
            $userInfo = $welcome->preUserInfo($welcome->pgUserInfo($userId));
        } else {
            //$userInfo = [];
            header('Location: https://www.vide.me/web/enter/');
            exit;
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        if (!empty($_GET['item'])) {
            $userInfo = $welcome->pgItemFullInfo($_GET['item']);
        }
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
            $html->showcaseMyPostsV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
            $html->showcaseMyPosts($dom, $domOutput);
        }*/
        echo $dom->saveHTML();
    }
    public function htmlMyImages()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
        if (!empty($_GET['item'])) {
            $userInfo = $welcome->pgItemFullInfo($_GET['item']);
        }
            $domOutput = $this->mainHtml([
                'sidebar' => 'messageV3' // noo
                //'sidebar' => 'imageV3'
            ], $dom, $userInfo);
            $html->showcaseMyImagesV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
            $html->showcaseMyImages($dom, $domOutput);
        }*/
        echo $dom->saveHTML();
    }
    public function htmlMyEvents()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        if (!empty($_GET['item'])) {
            $userInfo = $welcome->pgItemFullInfo($_GET['item']);
        }
            $domOutput = $this->mainHtml([
                //'sidebar' => 'eventV3'
                'sidebar' => 'messageV3'
            ], $dom, $userInfo);
            $html->showcaseMyEventsV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
            $html->showcaseMyEvents($dom, $domOutput);
        }*/
        echo $dom->saveHTML();
    }
    public function htmlMyPartners() // 27072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
        /*if (!empty($_GET['item'])) {
            $userInfo = $welcome->pgItemFullInfo($_GET['item']);
        }*/
        $domOutput = $this->mainHtml([
            'sidebar' => 'messageV3'
        ], $dom, $userInfo);
        $html->showcaseMyPartnersV3($dom, $domOutput);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'message'
            ], $dom, $userInfo);
            $html->showcaseMy($dom, $domOutput);
        }*/
        echo $dom->saveHTML();
    }
    /*public function htmlNetwork()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'network'
        ], $dom);
        $html->showcaseConnect($dom, $domOutput);
        echo $dom->saveHTML();
    }*/
    public function htmlConnect() // TODO: why?
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'message'
        ], $dom);
        $html->showcaseConnect($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlNowPopular() // 26072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
            $userInfo['user_display_name'] = 'Now popular | ' . $userInfo['user_display_name'];
        } else {
            $userInfo['title'] = 'Now popular';
        }

        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'new video'
        ], $dom, $userInfo);
        $html->showcaseNowPopular($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlArticleAll() // remove
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'index'
        ], $dom);
        $html->showcaseArticleAll($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlPasAlbums()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasList($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlMyService()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasMyService($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlMyEssence() // 27072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasMyEssence($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlMyTalents() // 28072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasMyTalents($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlMySubscribers()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'pasV3'
        ], $dom, $userInfo);
        $html->showcasePasMySubscribers($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlSettings()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
        $domOutput = $this->mainHtml([
            'sidebar' => 'pasV3'
        ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasSettings($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlItemEdit() // 25072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            //'sidebar' => 'message'
            'sidebar' => 'myActivityOnlyV3'
        ], $dom, $userInfo);
        if (!empty($_GET['i'])) {
            $itemInfo = $welcome->pgItemFullInfoAccess(['item_id' => $_GET['i']]);
            if ($itemInfo["type"] == 'video' or $itemInfo["type"] == 'image') {
                $html->showcaseItemEdit($dom, $domOutput);
            } elseif ($itemInfo["type"] == 'article') {
                $html->showcasePasArticleUpdate($dom, $domOutput);
            } elseif ($itemInfo["type"] == 'event') {
                $html->showcaseEventUpdate($dom, $domOutput);
            }
        } else {
            exit;
        }
        echo $dom->saveHTML();
    }
    public function htmlEventNew() // 25072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'message'
        ], $dom, $userInfo);
        $html->showcaseEventNew($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlEventUpdate() // TODO: V2 remove
    {
        $html = new Html2();

        /*$dom = DOMImplementation::createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        /*$dom = new DOMImplementation->createDocument(null, '',
            DOMImplementation::createDocumentType("html"));*/
        //$dom->formatOutput = true;

        $domOutput = $this->mainHtml([
            'sidebar' => 'message'
        ], $dom, $userInfo);
        $html->showcaseEventUpdate($dom, $domOutput);

        echo $dom->saveHTML();

    }
    public function htmlMyMap()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //if (!empty($_GET['V3'])) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pasV3'
            ], $dom, $userInfo);
        /*} else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'pas'
            ], $dom, $userInfo);
        }*/
        $html->showcasePasMyMap($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlArticle($contentInfo, $itemInfo = '')
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'item'
        ], $dom, $itemInfo);
        $html->showcaseArticle($dom, $domOutput, $contentInfo, $itemInfo);
        echo $dom->saveHTML();
    }
    public function htmlArticleV3($contentInfo)
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'articleV3'
        ], $dom, $contentInfo);
        //$html->showcaseArticle($dom, $domOutput, $contentInfo, $itemInfo);
        $html->showcaseTileForItemV3($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();
    }
    public function htmlEvent($itemInfo = '')
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'item'
        ], $dom, $itemInfo);
        $html->showcaseEvent($dom, $domOutput, $itemInfo);
        echo $dom->saveHTML();
    }
    public function htmlEventV3($itemInfo = '')
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'eventV3'
        ], $dom, $itemInfo);
        //$html->showcaseEvent($dom, $domOutput, $itemInfo);
        $html->showcaseTileForItemV3($dom, $domOutput, $itemInfo);
        echo $dom->saveHTML();
    }
    public function htmlSpring($userInfo, $show, $sidebar = 'spring')
    {
        //echo 'htmlSpring';
        //$html = new Html2();
        //$welcome = new NAD();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //$myId = $welcome->CookieToUserId();
        //print_r($userInfo);
        //print_r($myId);
        //print_r($show);
        //exit;
        /*if ($userInfo['user_id'] == $myId) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'my_spring'
            ], $dom, $userInfo);
        } else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'spring'
            ], $dom, $userInfo);
        }*/
        $domOutput = $this->mainHtml([
            'sidebar' => $sidebar
        ], $dom, $userInfo);
        //$html->showcaseSpring($dom, $domOutput);
        $spring = SpringUtils::formatSpring($show);
        //var_dump($spring);
        //print_r($userInfo);
        //exit;
        $spring->showSpring($dom, $domOutput, $userInfo);
        echo $dom->saveHTML();
    }
    public function htmlSpringV3($userInfo, $show, $sidebar = 'springV3')
    {
        //echo 'htmlSpringV3';
        /*
         *         $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'item'
        ], $dom, $contentInfo);
        $html->showcaseVideo($dom, $domOutput, $contentInfo);
        echo $dom->saveHTML();*/
        //$html = new Html2();
        //$welcome = new NAD();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        //$myId = $welcome->CookieToUserId();
        //print_r($userInfo);
        //print_r($myId);
        //exit;
        /*if ($userInfo['user_id'] == $myId) {
            $domOutput = $this->mainHtml([
                'sidebar' => 'my_spring'
            ], $dom, $userInfo);
        } else {
            $domOutput = $this->mainHtml([
                'sidebar' => 'spring'
            ], $dom, $userInfo);
        }*/
        $domOutput = $this->mainHtml([
            'sidebar' => $sidebar
        ], $dom, $userInfo);
        //$html->showcaseSpring($dom, $domOutput);
        $spring = SpringUtils::formatSpring($show);
        //var_dump($spring);
        //print_r($userInfo);
        //exit;
        $spring->showSpring($dom, $domOutput, $userInfo);
        echo $dom->saveHTML();
    }
    /*public function htmlSpringMy($userInfo, $show)
    {
        //$html = new Html2();
        //$welcome = new NAD();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'my_spring'
        ], $dom, $userInfo);
        //$html->showcaseSpring($dom, $domOutput);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }*/
    /*public function htmlSpringMy($userInfo, $show)
    {
        //$html = new Html2();
        $welcome = new NAD();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $myId = $welcome->CookieToUserId();
        //print_r($userInfo);
        //print_r($myId);
        //exit;
        $domOutput = $this->mainHtml([
            'sidebar' => 'spring'
        ], $dom, $userInfo);

        //$html->showcaseSpring($dom, $domOutput);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }*//*
    public function htmlSpringPosts($userInfo, $show)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'spring'
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlSpringVideo($userInfo, $show)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'spring'
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlSpringImage($userInfo, $show)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'spring'
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlSpringArticle($userInfo, $show)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'spring'
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlRelationTo($userInfo, $show)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'relations'
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlRelationFrom($userInfo, $show)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'relations'
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }*/
    public function htmlSpringRelation($userInfo, $show, $sidebar)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => $sidebar
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);
        $spring->showSpring($dom, $domOutput);
        echo $dom->saveHTML();
    }
    public function htmlSpringAbout($userInfo, $show)
    {
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            'sidebar' => 'relations'
        ], $dom, $userInfo);
        $spring = SpringUtils::formatSpring($show);

        //$html = new Html2();
        //$html->setContentInfo($userInfo);
        //$welcome = new NAD();
        $pg = new PostgreSQL();
        $trueuserInfo = $pg->pgPaddingItems($userInfo);

        $spring->showSpring($dom, $domOutput, $trueuserInfo);
        echo $dom->saveHTML();
    }
    public function htmlSearch() // 26072022
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));
        $domOutput = $this->mainHtml([
            //'sidebar' => 'index'
            'sidebar' => 'navV3'
        ], $dom);
        $html->showcaseSearchV3($dom, $domOutput);
        echo $dom->saveHTML();
    }

    /**
     * @param mixed <model>
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function htmlConsoleAllTasks()
    {
        $html = new Html2();
        $domImplement = new DOMImplementation();
        $welcome = new NAD();
        //$welcome->staffOnly();
        $userId = $welcome->CookieToUserId();
        if (!empty($userId)) {
            $userInfo = $welcome->pgUserInfo($userId);
        } else {
            $userInfo = [];
        }
        $dom = $domImplement->createDocument(null, '',
            $domImplement->createDocumentType("html"));

        $domOutput = $this->mainHtml([
            'sidebar' => 'messageV3'
        ], $dom, $userInfo);
        //$html->showcaseMyImagesV3($dom, $domOutput);
        $html->showcaseConsoleAllTasks($dom, $domOutput);
        echo $dom->saveHTML();
    }
}