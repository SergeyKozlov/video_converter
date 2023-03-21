<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 26.07.17
 * Time: 16:36
 */

/*include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarMessage.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNewVideo.php');*/
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarShowcase.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarMessage.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNewVideo.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarIndex.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarSignIn.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarPas.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarSpring.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarSpringMy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar12.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar12My.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNetwork.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar12Opp.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarShowcaseTest11072019.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarSpringV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarSpringMyV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarShowcaseV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarImageV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarArticleV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarEventV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNetworkV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarMessageV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarPasV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarMyActivityOnlly.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarMyTags.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarChartV3.php');

/*spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});*/

class SidebarUtils
{
    public static function formatSidebar($type, $contentInfo){
        $formatSB = self::createSidebarFormatter($type, $contentInfo);
        return $formatSB;
    }
    public static function createSidebarFormatter($type, $contentInfo){
        switch ($type['sidebar']){
            case 'item':
                $formatter = new SidebarShowcase();
                break;
            case 'itemV3':
                $formatter = new SidebarShowcaseV3();
                break;
            case 'imageV3':
                $formatter = new SidebarImageV3();
                break;
            case 'articleV3':
                $formatter = new SidebarArticleV3();
                break;
            case 'eventV3':
                $formatter = new SidebarEventV3();
                break;
            case 'springV3':
                $formatter = new SidebarSpringV3();
                break;
            case 'itemTest11072019':
                $formatter = new SidebarShowcaseTest11072019();
                break;
            case 'message':
                $formatter = new SidebarMessage();
                break;
            case 'messageV3':
                $formatter = new SidebarMessageV3();
                break;
            case 'my_tagsV3':
                $formatter = new SidebarMyTags();
                break;
            case 'myActivityOnlyV3':
                $formatter = new SidebarMyActyvityOnly();
                break;
            case 'new video':
                $formatter = new SidebarNewVideo();
                break;
            case 'index':
                $formatter = new SidebarIndex();
                break;
            case 'navV3':
                $formatter = new SidebarNavV3();
                break;
            case 'signin':
                $formatter = new SidebarSignIn();
                break;
            case 'pas':
                $formatter = new SidebarPas();
                break;
            case 'pasV3':
                $formatter = new SidebarPasV3();
                break;
            case 'spring':
                $formatter = new SidebarSpring();
                break;
            case 'my_spring':
                $formatter = new SidebarSpringMy();
                //$formatter = new SidebarSpringMyV3();
                break;
            case 'relations':
                //$formatter = new Sidebar12();
                $formatter = new SidebarSpring();
                break;
            case 'my_relations':
                $formatter = new SidebarSpring();
                break;
            case 'network':
                $formatter = new SidebarNetwork();
                break;
            case 'networkV3':
                $formatter = new SidebarNetworkV3();
                break;
            case 'chartV3':
                $formatter = new SidebarChartV3();
                break;
            case 'opportunities':
                $formatter = new Sidebar12Opp();
                break;
            case 'empty':
                $formatter = new Sidebar12Opp();
                break;
            default:
                //$formatter = new SidebarNewVideo();
                $formatter = new SidebarSpring();
        }
        return $formatter;
    }
}