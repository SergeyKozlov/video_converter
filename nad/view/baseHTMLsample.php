<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 10.08.17
 * Time: 14:05
 */

class baseHTMLsample
{
    public function __construct()
    {
        $this->welcome = new NAD();
        //$this->origin_video_vide_me = 'https://video.vide.me/';
        //$this->origin_video_vide_me = 'https://video.rate-my.life/';
        //$this->origin_video_vide_me = 'https://video.videcdn.net/';
        $this->origin_video_vide_me = $this->welcome->getOriginVideoVideMe();
        //$this->origin_img_vide_me = 'https://img.vide.me/';
        //$this->origin_img_vide_me = 'https://img.rate-my.life/';
        //$this->origin_img_vide_me = 'https://img.videcdn.net/';
        $this->origin_img_vide_me = $this->welcome->getOriginImgVideMe();
        //$this->origin_pre_image_w320_vide_me = 'https://pre-image-w320.vide.me/';
        //$this->origin_pre_image_w320_vide_me = 'https://pre-image-w320.rate-my.life/';
        //$this->origin_pre_image_w320_vide_me = 'https://pre-image-w320.videcdn.net/';
        $this->origin_pre_image_w320_vide_me = $this->welcome->getOriginPreImageW320VideMe();
        //$this->origin_pre_video_w320_vide_me = 'https://pre-video-w320.vide.me/';
        //$this->origin_pre_video_w320_vide_me = 'https://pre-video-w320.rate-my.life/';
        //$this->origin_pre_video_w320_vide_me = 'https://pre-video-w320.videcdn.net/';
        $this->origin_pre_video_w320_vide_me = $this->welcome->getOriginPreVideoW320VideMe();
        //$this->origin_sprite_w120_vide_me = 'https://sprite-w120.vide.me/';
        //$this->origin_sprite_w120_vide_me = 'https://sprite-w120.rate-my.life/';
        //$this->origin_sprite_w120_vide_me = 'https://sprite-w120.videcdn.net/';
        $this->origin_sprite_w120_vide_me = $this->welcome->getOriginSpriteW120VideMe();
        //$this->origin_static_vide_me = 'https://sprite-w120.vide.me/';
        //$this->origin_static_vide_me = 'https://sprite-w120.rate-my.life/';
        $this->origin_static_vide_me = $this->welcome->getOriginStaticVideMe();
    }

    public function htmlSidebar() // TODO: remove?
    {
        //global $lang;
        return "
<nav class=\"navbar navbar-expand-lg fixed-top navbar-toggleable-md navbar-light bg-light bg-faded navbar-custom\">

    <a class=\"navbar-brand\" href=\"https://www.vide.me\">
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/button.png\"
             width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\" /> <!--TODO: get smile-->
        Vide.me
    </a>

    <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\"
            data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\"
            aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item\">
                <a class=\"nav-link font-weight-bold text-body\" id='sidebar_user_name' href=\"https://www.vide.me/\"></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://www.vide.me/web/posts/my/\">Activity</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://www.vide.me/web/my_friends/\">
                Network
                <span class=\"badge badge-primary videme_nav_network_badge_pend_friends\"></span>
                </a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://www.vide.me/rec/\">Send video</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://www.vide.me/web/upload/\">Upload</a>
            </li>
            <!--<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://api.vide.me/article/my/html/\">Article</a>
            </li>-->
        </ul>
        <form class=\"form-inline my-2 my-lg-0\" action='https://www.vide.me/search/' method='get'>
            <input class=\"form-control mr-sm-2 videme-search\" type=\"text\" name='q' placeholder=\"I seek...\" aria-label=\"Search Vide.me\"/>
            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Search</button>
        </form>
        <ul class=\"navbar-nav\">
            <li class=\"nav-item\">
                <a class=\"nav-link\" id='sidebar_signin' href=\"https://www.vide.me/web/my_info/\">Sign In</a>
            </li>
        </ul>
    </div>
</nav>";
    }

    public function htmlSidebarButton()
    {
        //global $lang;
        return "
<nav class=\"navbar navbar-expand-lg fixed-top navbar-toggleable-md navbar-light bg-light bg-faded navbar-custom\">
<div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"https://www.vide.me\">
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_bf.svg\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\" /> <!--TODO: get smile-->
        Vide.me
    </a>
    <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
            <!--<li class=\"nav-item videme_nav_badge_stars_count_place hidden\">
                <a class=\"nav-link\" href=\"\">
                    <div class=\"videme-nav-link-button\">
                        <i class=\"fa fa-star-o fa-lg\"></i>
                        <span class=\"badge badge-light videme_nav_badge_stars_count\"></span>
                    </div>
                    <div class=\"d-none d-sm-block d-md-none\">Stars</div>
                </a>
            </li>-->
            <!--<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"\">
                    <div class=\"videme-nav-link-button\">
                        <i class=\"fa fa-dot-circle-o fa-lg\"></i>
                        <span class=\"badge badge-light videme_nav_badge_views_stars\"></span>
                    </div>
                    <div class=\"d-none d-sm-block d-md-none\">Pulse</div>
                </a>
            </li>-->
        <form class=\"form-inline my-2 my-lg-0\" action=\"https://www.vide.me/search/\" method=\"get\">
            <!--<input class=\"form-control mr-sm-2 videme-search\" type=\"text\" name=\"q\" placeholder=\"I seek...\" aria-label=\"Search Vide.me\" />
            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Search</button>-->
            <div class=\"input-group\">
                <input class=\"form-control videme-nav-form-control border-right-0 border\" type=\"search\" name=\"q\" placeholder=\"I seek...\" id=\"example-search-input\" aria-label=\"Search Vide.me\" />
                <span class=\"input-group-append\">
                <button class=\"btn btn-outline-secondary border-left-0 border\" type=\"submit\">
                    <i class=\"fa fa-search\"></i>
                </button>
              </span>
            </div>
        </form>
            
        </ul>
        
        <div class=\"spinner-border spinner-border-sm videme-nav-spinner hidden\" role=\"status\">
          <span class=\"sr-only\">Loading...</span>
        </div>
        

        <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0\">
        
        <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://www.vide.me/web/posts/my/\">
                    <div class=\"videme-nav-link-button\">
                        <i class=\"fa fa-bell-o fa-lg\"></i>
                        <span class=\"badge bg-primary videme_nav_badge_last_upload\"></span>
                    </div>
                    <div class=\"d-none d-sm-block d-md-none\">Activity</div>
                </a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://www.vide.me/web/my_friends/\">
                    <div class=\"videme-nav-link-button\">
                        <i class=\"fa fa-group fa-lg\"></i>
                        <span class=\"badge bg-primary videme_nav_network_badge_pend_friends\"></span>
                     </div>
                     <div class=\"d-none d-sm-block d-md-none\">Network</div>
                </a>
            </li>
            <!--<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"https://www.vide.me/rec/\">
                    <div class=\"videme-nav-link-button\">
                        <i class=\"fa fa-envelope-o fa-lg\"></i>
                    </div>
                    <div class=\"d-none d-sm-block d-md-none\">Send video email</div>
                </a>
            </li>-->
            <li class=\"nav-item\">
                <a class=\"nav-link\" id='videme_upload_video_image' href=\"https://www.vide.me/web/upload/\">
                    <div class=\"videme-nav-link-button\">
                        <i class=\"fa fa-cloud-upload fa-lg\" style=\"color: #ce0040;\"></i>
                    </div>
                    <div class=\"d-none d-sm-block d-md-none\">Upload</div>
                </a>
            </li>
        
            <li class=\"nav-item\">
                <a class=\"nav-link font-weight-bold text-body\" id=\"sidebar_user_name_href\" href=\"https://www.vide.me/\">
                <div class='sidebar_user_name_img_title'>
                <img class=\"rounded-circle sidebar_user_name_img hidden\" id='sidebar_user_name_img'/>
                <div class='sidebar_user_name_title' id=\"sidebar_user_name\"></div>
                </div>
                </a>
            </li>
            
            <li class=\"nav-item videme_nav_badge_tags_count_place hidden\">
                <a class=\"nav-link\" href=\"https://api.vide.me/web/earned_tags/\">
                    <div class=\"videme-nav-link-button\">
                        <i class=\"fa fa-check-circle-o fa-lg\"></i>
                        <span class=\"badge bg-light text-dark videme_nav_badge_tags_conf_count\"></span>|
                        <i class=\"fa fa-hashtag fa-lg\"></i>
                        <span class=\"badge bg-light text-dark videme_nav_badge_tags_view_count\"></span>
                    </div>
                    <div class=\"d-none d-sm-block d-md-none\"></div>
                </a>
            </li>
            
            <li class=\"nav-item\">
                <a class=\"nav-link\" id=\"sidebar_signin\" href=\"https://www.vide.me/web/enter/\">
                    <div class=\"videme-nav-link-button\">
                    <i class=\"fa fa-sign-in fa-lg\"></i>
                    </div>
                    <div class=\"d-none d-sm-block d-md-none\">Sign in</div>
                </a>
            </li>
        </ul>
    </div>
</div>
</nav>";
    }

    public function htmlNextVideoPagination()
    {
        //global $lang;
        return "
<div class=\"videme-shownext-pagination\">
    <h3><a href=\"https://api.vide.me/file/shownext/html/\">Next video</a></h3>
    <div class=\"videme-shownext-tile\">
    </div>
    <div class='videme-tile-signboard'>
        <a href=\"#\" class=\"\" data-action=\"previous\">
            previous
        </a>
        <a href=\"#\" class=\"\" data-action=\"next\">
            next
        </a>
    </div>
        <hr /> 
</div>
<script type=\"text/javascript\">
    $(document).ready(function() {
        var file = getParameterByName('m');
        $.fn.showNextVideoPagination({
            prev_item_id: $.cookie('vide_prev_item_id'),
            next_item_id: file,
            limit: 6
        });
        $.cookie(\"vide_prev_item_id\", file, {expires: 14, path: '/', domain: 'vide.me', secure: true});
    });
</script>";
    }

    public function htmlNext()
    {
        //global $lang;
        return "
<div class=\"videme-shownext hidden\">
    <div class=\"container-fluid videme-tile-border\">
        <div class=\"row\">
            <div class=\"videme-tile-title\" id=\"videme-tile-title\">Next video</div>
            <div class=\"videme-shownext-tile\"></div>
            <hr/>
        </div>
    </div>
</div>
<script type=\"text/javascript\">
    $(document).ready(function () {
        var file = getParameterByName('m');
        $('.videme-shownext-tile').showNext({
            prev_item_id: $.cookie('vide_prev_item_id'),
            next_item_id: file,
            limit: 6
        });
        $.cookie(\"vide_prev_item_id\", file, {expires: 14, path: '/', domain: 'vide.me', secure: true});
    });
</script>";
    }

    public function htmlNextV3()
    {
        //global $lang;
        return "
<div class=\"videme-shownext hidden\">
    <!--<div class=\"container-fluid videme-tile-border\">
        <div class=\"row\">
            <div class=\"videme-tile-title\" id=\"videme-tile-title\">Next video</div>
            <div class=\"videme-shownext-tile\"></div>
            <hr/>
        </div>
    </div>-->
    
                <div class=\"videme-v3-tile-title\" id=\"videme-v3-tile-title\">Related media</div>
                <div class=\"container-fluid\">
                    <div class=\"row\" id=\"videme-shownext-tile\">
                    </div>
                </div>
    
</div>
<script type=\"text/javascript\">
                require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        $('#videme-shownext-tile').showNextV3({limit: 6});
    });
    });
</script>";
    }

    public function htmlMyConnectV3() // 26072022
    {
        return "
<div class=\"videme-my_connect hidden\">
                <div class=\"videme-v3-tile-title\" id=\"videme-v3-tile-title\"><a href='https://www.vide.me/web/my_connect/'>Updates</a></div>
                <div class=\"container-fluid\">
                    <div class=\"row\" id=\"videme-my_connect-tile\">
                    </div>
                </div>
</div>
<script type=\"text/javascript\">
                /* 22122021 */
                require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        $('#videme-my_connect-tile').postsMyConnectV3({limit: 8});
    });
    });
</script>";
    }

    public function htmlNewPostPagination()
    {
        //global $lang;
        return "
        <h6><a href=\"\">New posts</a></h6>
        <div class=\"videme-shownew-pagination\">
            <div class=\"videme-shownew-tile\">
            </div>
            <div class='videme-tile-signboard'>
            <a href=\"#\" class=\"\" data-action=\"previous\">
                previous
            </a>
            <a href=\"#\" class=\"\" data-action=\"next\">
                next
            </a>
            </div>
        <hr />
        </div>
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $.fn.showNewPostsPagination({});
                /*$('.videme-shownew-pagination').postsShowNewScroll({
                    //limit: 18
                });*/
            });
        </script>
        ";
    }

    public function htmlNewPostScroll() // 26072022 remove
    {
        //global $lang;
        return "
<div class=\"container-fluid videme-tile-border\">
    <div class=\"row\">
        <div class=\"videme-tile-title\" id=\"\">New posts</div>
        <div class=\"videme-tile\" id='videme-postsShowNewScroll'></div>
    </div>
</div>
<script type=\"text/javascript\">
    $(document).ready(function () {
        //$.fn.showNewPostsPagination({});
        $('#videme-postsShowNewScroll').postsShowNewScroll({
            //limit: 18
        });
    });
</script>
        ";
    }

    public function htmlNewPostScrollV3()
    {
        //global $lang;
        return "
<!--<div class=\"container-fluid videme-tile-border\">
    <div class=\"row\">
        <div class=\"videme-tile-title\" id=\"\">New posts</div>
        <div class=\"videme-tile\" id='videme-postsShowNewScroll'></div>
    </div>
</div>-->

                <div class=\"videme-v3-tile-title\" id=\"videme-v3-tile-title\">New posts</div>
                <div class=\"container-fluid\">
                    <div class=\"row\" id=\"videme-v3-shownew-tile\">
                    </div>
                </div>
<script type=\"text/javascript\">
                /* 22122021 */
                require(['jquery', 'videme_jq'], function( $ ) {

    $(document).ready(function () {
        //$.fn.showNewPostsPagination({});
        $('#videme-v3-shownew-tile').postsShowNewScrollV3({});
    });
    });
</script>
        ";
    }

    public function htmlNextFromUserV3($contentInfo)
    {
        return "
<div class='' id='videme-v3-show-next-from-user-place'>
    <div class=\"videme-v3-tile-title\" id=\"videme-v3-tile-title\">Media from " . $contentInfo['user_display_name'] . "</div>
    <div class=\"container-fluid\">
        <div class=\"row\" id=\"videme-v3-show-next-from-user-tile\"></div>
    </div>
</div>
<script type=\"text/javascript\">
                require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        $('#videme-v3-show-next-from-user-tile').postsShowNextFromUserV3({
            'item_id': '" . $contentInfo['item_id'] . "'
        });
    });
    });
</script>";
    }

    public function htmlTrendsItemsWeekV3()
    {
        return "
<div class='' id='videme-v3-show-trends-item-week-place'>
    <div class=\"videme-v3-tile-title\" id=\"videme-v3-tile-title\">Media trends</div>
    <div class=\"container-fluid\">
        <div class=\"row\" id=\"videme-v3-show-trends-item-week-tile\"></div>
    </div>
</div>
<script type=\"text/javascript\">
                require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        $('#videme-v3-show-trends-item-week-tile').postsShowTrendsItemWeekV3({});
    });
    });
</script>";
    }

    public function htmlTrendsTegsItemsV3() // 25072022
    {
        return "
<div class='videme-v3-show-trends-tags-item-place' id='videme-v3-show-trends-tags-item-place'>
    <div class=\"videme-v3-tile-title\" id=\"\">Media trends</div>
    <div class=\"container-fluid\">
        <div class=\"row\" id=\"videme-v3-show-trends-tags-item-tile\"></div>
    </div>
</div>
<script type=\"text/javascript\">
                /* 22122021 */
                require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {

        $('#videme-v3-show-trends-tags-item-tile').postsShowTrendsTagsItemV3({});
    });
    });
</script>";
    }

    public function htmlShow1stList() // remove 26072022
    {
        return "
<div class='videme-v3-show-trends-tags-item-place' id='videme-v3-show-trends-tags-item-place'>
    <div class=\"videme-v3-tile-title\" id=\"\">Popular Collection</div>
    <div class=\"container-fluid\">
        <div class=\"row\" id=\"videme-v3-show-1st-list\"></div>
    </div>
</div>
<script type=\"text/javascript\">
                /* 22122021 */
                require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        $('#videme-v3-show-1st-list').showListPanel({});
        
    });
    });
</script>";
    }

    public function htmlPopVideoPagination()
    {
        //global $lang;
        return "
        <h6><a href=\"\">Pop video</a></h6>
        <div class=\"videme-showpop-pagination\">
            <div class=\"videme-showpop-tile\">
            </div>
            <div class='videme-tile-signboard'>
            <a href=\"#\" class=\"previous\" data-action=\"previous\">
                previous
            </a>
            <a href=\"#\" class=\"next\" data-action=\"next\">
                next
            </a>
            </div>
            <hr />
        </div>
        <script type=\"text/javascript\">
        $(document).ready(function () {
            $.fn.showPopVideoPagination({});
        });
        </script>
        ";
    }

    public function htmlConnectForFriendsPagination() // remove
    {
        //global $lang;
        return "
<div class='videme-update-for-friends hidden'>
        <h6>Update for friends</h6>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-update-for-friends-tile\">
            </div>
        </div>
    </div>
    <hr />
</div>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-update-for-friends-tile').fileMyConnectForFriends({
                limit: 18
            });
        });
    </script>
        ";
    }

    public function htmlConnectPagination()
    {
        //global $lang;
        return "
<div class='bg-white my-2 px-2'>
" . $this->htmlMyLastTaskForTile() . "
    <div class=\"container-fluid videme-tile-border\">
        <div class=\"row\">
            <div class=\"videme-tile-title\" id=\"videme-tile-title_updates\"></div>
            <div class=\"videme-tile\" id=\"videme-tile\"></div>
            <noscript>
                <div class=\"videme-tile\" id=\"\">
                    <h5>New posts</h5>" . $this->noscritpNewPost() . "
                </div>
            </noscript>
        </div>
    </div>
</div>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            /*$('#videme-tile').fileMyConnect({
                limit: 18
            });*/
            $('#videme-tile').postsMyConnectScroll({
                limit: 6
            });
        });
    </script>";
    }

    public function htmlMyLastTaskForTile() // 26072022
    {
        //global $lang;
        return "
    <div class=\"container-fluid videme-tile-border\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-tile-my-tasks\"></div>
        </div>
    </div>
    <script type=\"text/javascript\">
        $(document).ready(function () {
                setInterval(function () {
                    $.fn.showMyTaskActiveOnly({
                        limit: 6,
                        showcaseMyTask: \"#videme-tile-my-tasks\"
                    });
                    $('#timer').pietimer('start');
                }, 5000);
        });
    </script>";
    }

    public function htmlConnectPaginationAdd()
    {
        //global $lang;
        return "
<div class='bg-white my-2 px-2 py-2'>
    <div class=\"container-fluid videme-tile-border\">
        <div class=\"row\">
            <div class=\"videme-tile-title\" id=\"videme-tile-title_updates\"></div>
            <div class=\"videme-tile\" id=\"videme-tile\"></div>
            <noscript>
                <div class=\"videme-tile\" id=\"\">
                    <h5>New posts</h5>" . $this->noscritpNewPost() . "
                </div>
            </noscript>
        </div>
    </div>
</div>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            /*$('#videme-tile').fileMyConnect({
                limit: 18
            });*/
            $('#videme-tile').postsMyConnectScroll({
                limit: 6
            });
        });
    </script>";
    }

    public function noscritpNewPost()
    {
        $welcome = new NAD();
        $pgShowNewPosts['offset'] = $welcome->setOffset();
        $pgShowNewPosts['limit'] = $welcome->setLimit();
        $newPost = $welcome->pgShowNewPosts($pgShowNewPosts);
        return $this->showTile($newPost);
    }

    public function noscritpSpringPosts($noscritpSpringPosts = [])
    {
        //print_r($noscritpSpringVideo);
        $welcome = new NAD();
        $noscritpSpringPosts['offset'] = $welcome->setOffset();
        $noscritpSpringPosts['limit'] = $welcome->setLimit();
        $newPost = $welcome->pgShowPostsOfUser($noscritpSpringPosts);
        return $this->showTile($newPost);
    }

    public function noscritpSpringVideo($noscritpSpringVideo = [])
    {
        //print_r($noscritpSpringVideo);
        $welcome = new NAD();
        $noscritpSpringVideo['offset'] = $welcome->setOffset();
        $noscritpSpringVideo['limit'] = $welcome->setLimit();
        $newPost = $welcome->pgShowVideoOfUser($noscritpSpringVideo);
        return $this->showTile($newPost);
    }

    public function noscritpSpringImage($noscritpSpringImage = [])
    {
        //print_r($noscritpSpringImage);
        $welcome = new NAD();
        $noscritpSpringImage['offset'] = $welcome->setOffset();
        $noscritpSpringImage['limit'] = $welcome->setLimit();
        $newPost = $welcome->pgShowImageOfUser($noscritpSpringImage);
        return $this->showTile($newPost);
    }

    public function noscritpSpringArticle($noscritpSpringArticle = [])
    {
        //print_r($noscritpSpringImage);
        $welcome = new NAD();
        $noscritpSpringArticle['offset'] = $welcome->setOffset();
        $noscritpSpringArticle['limit'] = $welcome->setLimit();
        $newPost = $welcome->pgShowArticleOfUser($noscritpSpringArticle);
        return $this->showTile($newPost);
    }

    public function noscritpSpringEvent($noscritpSpringEvent = [])
    {
        //print_r($noscritpSpringImage);
        $welcome = new NAD();
        $noscritpSpringEvent['offset'] = $welcome->setOffset();
        $noscritpSpringEvent['limit'] = $welcome->setLimit();
        $newPost = $welcome->pgShowEventOfUser($noscritpSpringEvent);
        return $this->showTile($newPost);
    }

    public function showTile($showTile)
    {
        $welcome = new NAD();
        $echo = "";
        if (!empty($showTile)) {
            $echo .= "<ul class='list-group' id=''>";
            foreach ($showTile as $key => $value) {
                $mainInsert = "";
                if ($value['type'] == 'video') $mainInsert = "<video id='' class='video-js vjs-default-skin vjs-big-play-centered' controls='controls' preload='auto' poster='" . $this->origin_img_vide_me . $value['item_id'] . ".jpg'></video>";
                if ($value['type'] == 'image') $mainInsert = "<img class='videme_tile_img_class' src='" . $this->origin_img_vide_me . $value['cover'] . "' alt='" . $welcome->safetyTagsSlashesTrim4096($value['title']) . "'></img>";
                if ($value['type'] == 'article') $mainInsert = "<img class='videme_tile_img_class' src='" . $this->origin_img_vide_me . $value['cover'] . "' alt='" . $welcome->safetyTagsSlashesTrim4096($value['title']) . "'></img>";
                if ($value['type'] == 'event') $mainInsert = "<img class='videme_tile_img_class' src='" . $this->origin_img_vide_me . $value['cover'] . "' alt='" . $welcome->safetyTagsSlashesTrim4096($value['title']) . "'></img>";
                $echo .= "<li class='list-group-item videme-tile-item' id=''>";
                $echo .= "<a href='https://www.vide.me/" . $value['post_spring'] . "'>
                <img src='" . $this->origin_img_vide_me . $value['post_user_picture'] . "' alt='' class='img-thumbnail videme-relation-card-img-tile'/>
                </a>
                <div class='videme-tile-item-1-line'>
                <div class='videme-tile-item-1-line-bar'>
                <div class='font-weight-bold videme-tile-item-user'>
                <a href='https://www.vide.me/" . $value['post_spring'] . "' class='videme-tile-post-owner'>
                " . $value['post_user_display_name'] . "
                </a>
                </div>
                <div class='text-muted videme-tile-post-type'>" . $value['post_type'] . "</div>
                <a href='https://www.vide.me/" . $value['item_spring'] . "' class='videme-tile-item-owner'>
                " . $value['item_user_display_name'] . "
                </a>
                </div>
                <div class='text-right text-muted videme-tile-item-created-at'>" . $value['created_at'] . "</div>
                </div>
                <div class='videme-tile-item-2-line'>
                <a class='shownext' href='https://www.vide.me/a/?a=" . $value['item_id'] . "'><div class='videme-tile-item-title'>" . $welcome->safetyTagsSlashesTrim4096($value['title']) . "</div></a>
                <span class='iconic' data-glyph='star' title='star' aria-hidden='true'></span>
                </div>
                <div class='videme-tile-box'>
            <div class='videme-tile-boxInner'>
            <a class='' href='https://www.vide.me/a/?a=" . $value['item_id'] . "' id=''>
			<div class='titleTop'>
						 " . $value['type'] . "
			</div>
			<div class='videme-tile-signboard-true' id=''></div>
						 " . $mainInsert . "
				</a>
			</div>
				</div>
				<div class='videme_showcase_item_info'>
                </div>";
                $echo .= "</li>";


            }
            $echo .= "</ul>";
        }
        //print_r($echo);
        return $echo;
    }

    public function htmlSelecFromtMyImage()
    {
        //global $lang;
        // https://github.com/rvera/image-picker
        return "
<link type=\"text/css\" href=\"https://api.vide.me/system/image-picker.css\" rel=\"stylesheet\" />
<!--<script type=\"text/javascript\" src=\"https://api.vide.me/system/image-picker.min.js\"></script>-->
        <h6>Select image</h6>
    <div class=\"container-fluid\">
        <div class=\"row\">
        <select class=\"image-picker\">
            <div class=\"\" id=\"select-from-my-image\"></div>
        </select>
        </div>
    </div>
    <hr />
    <script type=\"text/javascript\">
      require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#select-from-my-image').selectFromMyImages({
                limit: 18
            });
        });
      });
    </script>
        ";
    }

    public function htmlSelecFromtMyImageForCreateAlbum()
    {
        //global $lang;
        return "
<link type=\"text/css\" href=\"https://api.vide.me/system/image-picker.css\" rel=\"stylesheet\" />
<!--<script type=\"text/javascript\" src=\"https://api.vide.me/system/image-picker.min.js\"></script>-->
        <h6>Select image</h6>
    <div class=\"container-fluid\">
        <div class=\"row\">
        <select class=\"image-picker-create-album\">
            <div class=\"\" id=\"select-from-my-image-create-album\"></div>
            </select>
        </div>
    </div>
    <hr />
    <script type=\"text/javascript\">
      require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#select-from-my-image-create-album').selectFromMyImagesCreateAlbum({
                limit: 18
            });
        });
      });
    </script>
        ";
    }

    public function htmlSelectFromMyVideoForCreateArticle()
    {
        //global $lang;
        return "<link type=\"text/css\" href=\"https://api.vide.me/system/image-picker.css\" rel=\"stylesheet\"/>
<!--<script type=\"text/javascript\" src=\"https://api.vide.me/system/image-picker.min.js\"></script>-->
<h6>Select video</h6>
<div class=\"container-fluid\">
    <div class=\"row\">
        <select class=\"video-picker-create-article\" name='video-picker-create-article'>
            <div class=\"\" id=\"select-from-my-video-create-article\"></div>
        </select>
    </div>
</div>
<hr/>
<script type=\"text/javascript\">
  require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        $('#select-from-my-video-create-article').selectFromMyVideoCreateArticle({
            limit: 18
        });
    });
  });
</script>
        ";
    }

    public function htmlSelectFromMyVideoForCreateCover()
    {
        //global $lang;
        return "<link type=\"text/css\" href=\"https://api.vide.me/system/image-picker.css\" rel=\"stylesheet\"/>
<!--<script type=\"text/javascript\" src=\"https://api.vide.me/system/image-picker.min.js\"></script>-->
<h6>Select video</h6>
<div class=\"container-fluid\">
    <div class=\"row\">
        <select class=\"video-picker-create-cover\" name='video-picker-create-cover'>
            <div class=\"\" id=\"select-from-my-video-create-cover\"></div>
        </select>
    </div>
</div>
<hr/>
<script type=\"text/javascript\">
    $(document).ready(function () {
        $('#select-from-my-video-create-cover').selectFromMyVideoCreateCover({
            limit: 18
        });
    });
</script>
        ";
    }

    public function htmlSelectFromMyImageForCreateArticle() // 25072022
    {
        //global $lang;
        return "<link type=\"text/css\" href=\"https://api.vide.me/system/image-picker.css\" rel=\"stylesheet\"/>
<!--<script type=\"text/javascript\" src=\"https://api.vide.me/system/image-picker.min.js\"></script>-->
<h6>Select image</h6>
<div class=\"container-fluid\">
    <div class=\"row\">
        <select class=\"my-image-picker-create-article\" name='my-image-picker-create-article'>
            <div class=\"\" id=\"select-from-my-image-create-article\"></div>
        </select>
    </div>
</div>
<hr/>
<script type=\"text/javascript\">
  require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        $('#select-from-my-image-create-article').selectFromMyImageCreateArticle({
            limit: 18
        });
    });
  });
</script>
        ";
    }

    public function htmlNewArticle()
    {
        //global $lang;
        return "
        <!--<div class=\"row\">-->
        <h4>New article</h4>
        <div class=\"videme-new-article-bottom-pagination\">
            <div class=\"videme-new-article-bottom\">
            </div>
            <div class='videme-tile-signboard'>
                <a href=\"#\" class=\"previous\" data-action=\"previous\">
                    previous
                </a>
                <a href=\"#\" class=\"next\" data-action=\"next\">
                    next
                </a>
            </div>
        </div>
            <hr />
        <!--</div>-->
        <script type=\"text/javascript\">
        $(document).ready(function () {
            $('.videme-new-article-bottom').showNewArticlePagination({
                limit: 6
            });
        });
        </script>
        ";
    }

    public function htmlSearchPeoples() // 26072022
    {
        return "
        <div class=\"peoples-search-title hidden\">
            <div class=\"videme-tile-title\" id=\"videme-tile-title\">Users</div>
            <div class=\"videme-search-peoples-tile\"></div>
        </div>
        <script type=\"text/javascript\">
        require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            var q = getParameterByName('q');
            $('.videme-search-peoples-tile').showSearchPeoples({
                q: q,
                limit: 6
            });
        });
        });
        </script>
        ";
    }

    public function htmlPartnersItemEdit() // 27072022
    {
        return "
        <div class='videme-partners-list-place hidden'>
        <div class='videme-tile-title'>Partners</div>
        <div class='videme-partners-list' id='videme-partners-list'></div>
        </div>
        <script type='text/javascript'>
        require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            var item_id = getParameterByName('i');
            $.fn.showItemPartnersMy({'item_id': item_id});
        });
        });
        </script>
        ";
    }
    public function htmlSearchPeoplesForPartners()
    {
        return "
        <div class='videme-tile-title'>Search the partners</div>
<!--<div id='videme-form-partners-search' class=\"form-inline my-2 my-lg-0\" action=\"https://api.vide.me/v2/user/search/\" method=\"get\">-->
            <!--<input class=\"form-control mr-sm-2 videme-search\" type=\"text\" name=\"q\" placeholder=\"I seek...\" aria-label=\"Search Vide.me\" />
            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Search</button>-->
            <div class=\"input-group\">
                <input class=\"form-control videme-nav-form-control py-2 border-right-0 border\" type=\"search\" name=\"q\" placeholder=\"I seek...\" id=\"videme-form-partners-search-input\" aria-label=\"Search Vide.me\" />
                <span class=\"input-group-append\">
                <button id='videme-form-partners-search-btn' class=\"btn btn-outline-secondary border-left-0 border\" type=\"button\">
                    <i class=\"fa fa-search\"></i>
                </button>
              </span>
            </div>
        <!--</div>-->
        
        <div class=\"peoples-search-title hidden\">
            <div class=\"videme-tile-title\" id=\"videme-tile-title\">Partners</div>
            <div class=\"videme-search-partners-tile\"></div>
        </div>
        <script type=\"text/javascript\">
        require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            /*var q = getParameterByName('q');
            $('.videme-search-peoples-tile').showSearchPeoples({
                q: q,
                limit: 6
            });*/
        });
        });
        </script>
        ";
    }

    public function htmlSearchEssences()
    {
        return "
        <div class='videme-v3-tile-title'>Search essences</div>
<form id='videme-form-essences-search' class=\"form-inline my-2 my-lg-0\" action=\"https://api.vide.me/v2/essences/search/\" method=\"get\">
            <!--<input class=\"form-control mr-sm-2 videme-search\" type=\"text\" name=\"q\" placeholder=\"I seek...\" aria-label=\"Search Vide.me\" />
            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Search</button>-->
            <div class=\"input-group\">
                <input class=\"form-control videme-nav-form-control py-2 border-right-0 border\" type=\"search\" name=\"q\" placeholder=\"I seek...\" id=\"videme-form-essences-search-input\" aria-label=\"Search Vide.me\" />
                <span class=\"input-group-append\">
                <button class=\"btn btn-outline-secondary border-left-0 border\" type=\"submit\">
                    <i class=\"fa fa-search\"></i>
                </button>
              </span>
            </div>
        </form>
        
        <div class=\"peoples-search-title hidden\">
            <div class=\"videme-v3-tile-title\" id=\"\">Essences</div>
            <div class=\"videme-search-essences-tile\"></div>
        </div>
        <script type=\"text/javascript\">
        //$(document).ready(function () {
            /*var q = getParameterByName('q');
            $('.videme-search-peoples-tile').showSearchPeoples({
                q: q,
                limit: 6
            });*/
        //});
        </script>
        ";
    }

    public function htmlSearchItems() // remove
    {
        return "
<!--<div class=\"container-fluid videme-tile-border\">
            <div class=\"row\">
        <div class=\"items-search-title hidden\">
            <div class=\"videme-tile-title\" id=\"videme-tile-title\">Search result</div>
            <div class='videme-tile' id=\"videme-search-items-tile\"></div>
        </div>
            </div>
        </div>-->
        <div class=\"container-fluid videme-tile-border\">
            <div class=\"row items-search-title hidden\">
                <div class=\"videme-v3-tile-title\" id=\"\">Search result</div>
                <div class=\"videme-tile\" id=\"videme-search-items-tile\"></div>
            </div>
        </div>
        <script type=\"text/javascript\">
        $(document).ready(function () {
            var q = getParameterByName('q');
            $('#videme-search-items-tile').showSearchItemByText({
                q: q,
                limit: 6
            });
        });
        </script>
        ";
    }

    public function htmlSearchItemsV3() // 26072022
    {
        return "<div class='items-search-title'>
                <div class=\"videme-v3-tile-title\" id=\"videme-v3-tile-title-res-for\"></div>
                <!--<div class=\"container-fluid\">
                    <div class=\"row\" id=\"videme-search-items-tile\">
                    </div>
                </div>-->
                <div class=\"container-fluid\">
                    <div class=\"row\" id=\"videme-search-items-landscape\">
                    </div>
                </div>
                </div>
<script type=\"text/javascript\">
require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
            var q = getParameterByName('q');
            /*$('#videme-search-items-tile').showSearchItemByTextScrollV3({
                q: q,
                limit: 16
            });*/
            /*$('#videme-search-items-landscape').showSearchItemByTextScrollV4landscape({
                q: q,
                limit: 16
            });*/
            $('#videme-search-items-landscape').showLSsearch({
                q: q,
                limit: 16
            });
    });
});
</script>
        ";
    }

    public function htmlOpportunities()
    {
        //global $lang;
        /*14122018
        return "
        <h4>Opportunities</h4>

      <div class=\"\">
        <p>The Vide.me it's Media sharing network for creativity and art.</p>
        <p>This network can do:</p>
      </div>
      <div class=\"\">
        <h3>Upload your videos, photos or articles</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_upload.png\" alt=\"videme upload\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>Create ads about your events</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_event.png\" alt=\"videme event\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>Find your customers and viewers</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_viewers.png\" alt=\"videme viewers\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>Send a video email</h3>
        <p>You can record and send a video email without restrictions.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-later-cloud.png\" alt=\"Video email\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>Share posts in social networks</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_share.png\" alt=\"videme share\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>Video Vide.me on your pages</h3>
        <p>A public video Vide.me on other sites using HTML code.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-video-on-html.png\" alt=\"Video Vide.me on your pages\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>API Vide.me for Developers</h3>
        <p>Create your own app for Android, iOS, OS X, MS Windows, Linux.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-api.png\" alt=\"API Vide.me for Developers\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>New opportunities</h3>
        <p>New opportunities. Excellent opportunity. Regular updates.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-refresh.png\" alt=\"Article for author\" class=\"img-fluid\" />
      </div>";*/

        return "
<div class='videme-article-center'>
        <h4>Opportunities</h4>
        
      <div class=\"\">
        <p>The Vide.me it's Media sharing network for creativity and art.</p>
        <p>This network can do:</p>
      </div>
      <div class=\"\">
        <h3>Upload your videos, photos or articles</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_upload.png\" alt=\"videme upload\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>Create ads about your events</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_event.png\" alt=\"videme event\" class=\"img-fluid\" />        
      </div>
      <hr/>
      <div class=\"\">
        <h3>Find your customers and viewers</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_viewers.png\" alt=\"videme viewers\" class=\"img-fluid\" />        
      </div>
      <hr/>
      <div class=\"\">
        <h3>Send a video email</h3>
        <p>You can record and send a video email without restrictions.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-later-cloud.png\" alt=\"Video email\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>Share posts in social networks</h3>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_share.png\" alt=\"videme share\" class=\"img-fluid\" />                
      </div>
      <hr/>
      <div class=\"\">
        <h3>Video Vide.me on your pages</h3>
        <p>A public video Vide.me on other sites using HTML code.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-video-on-html.png\" alt=\"Video Vide.me on your pages\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>API Vide.me for Developers</h3>
        <p>Create your own app for Android, iOS, OS X, MS Windows, Linux.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-api.png\" alt=\"API Vide.me for Developers\" class=\"img-fluid\" />
      </div>
      <hr/>
      <div class=\"\">
        <h3>New opportunities</h3>
        <p>New opportunities. Excellent opportunity. Regular updates.</p>
        <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme-opp-refresh.png\" alt=\"Article for author\" class=\"img-fluid\" />
      </div>
</div>";
    }

    public function htmlOpportunitiesNew()
    {
        //global $lang;
        return "
<style>

.card {
  height: 100%;
}

</style>
    <!-- Page Content -->
    <div class=\"\">

      <!-- Page Features -->
      <div class=\"row text-center\">

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Upload your videos</h4>
              <p class=\"card-text\">Your videos are a whole lot more fun when you can share them online, and Vide.me is one of the best ways to do that. You can upload files of most popular formats: mp4, 3gp, mkv, webm, flv, mpg, mpeg, wmf, avi, mov, vob, rm, rmvb.</p>
              <a href=\"https://www.vide.me/keizemontoya/?show=video\" class=\"card-link\">Example</a>
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"https://www.vide.me/keizemontoya/?show=video\" class=\"btn btn-primary\">Example</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Upload photos</h4>
              <p class=\"card-text\">Easily upload your images and host them on the Internet, forever. Your followers and fans will welcome your new photos.</p>
              <a href=\"https://www.vide.me/tsedi/?show=image\" class=\"card-link\">Example</a>              
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"https://www.vide.me/tsedi/?show=image\" class=\"btn btn-primary\">Example</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Create articles</h4>
              <p class=\"card-text\">Create articles with videos and photos from any source on the Internet.</p>
              <a href=\"https://www.vide.me/a/?a=5d735aaf2632\" class=\"card-link\">Example</a>                            
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"https://www.vide.me/a/?a=5d735aaf2632\" class=\"btn btn-primary\">Example</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Create ads about your events</h4>
              <p class=\"card-text\">Announcements of your events will be seen by thousands of viewers.
- Find your customers and viewers.</p>
              <a href=\"https://www.vide.me/a/?e=1a5edc57b3b4\" class=\"card-link\">Example</a>                            
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"https://www.vide.me/a/?e=1a5edc57b3b4\" class=\"btn btn-primary\">Example</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_viewed.jpg\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Find your customers and viewers</h4>
              <p class=\"card-text\">Get hundreds and thousands of views for your video posts.</p>
              <a href=\"https://www.vide.me/tsedi/\" class=\"card-link\">Example</a>                                          
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"#\" class=\"btn btn-primary\">Find Out More!</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Send a video email</h4>
              <p class=\"card-text\">You can record and send a video email without restrictions.</p>
              <a href=\"https://www.vide.me/rec/\" class=\"card-link\">Do it!</a>                                                        
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"https://www.vide.me/rec/\" class=\"btn btn-primary\">Do it!</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Share posts on social networks</h4>
              <p class=\"card-text\">With social sharing, your prospects take a turn for the better. As you share more, the domino effect ensues. You share more, then your network will share more, assuming you are spreading relevant content.</p>
              <a href=\"https://www.vide.me/\" class=\"card-link\">Do it!</a>                                                                      
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"#\" class=\"btn btn-primary\">Find Out More!</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">External links</h4>
              <p class=\"card-text\">Attract more potential customers to your sites with External Links. Right while viewing your publications.</p>
              <a href=\"https://www.vide.me/v?m=6c7f8c036fe9\" class=\"card-link\">Example</a>                                                                                 
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"#\" class=\"btn btn-primary\">Find Out More!</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Tags</h4>
              <p class=\"card-text\">You can use tags to organize content and help visitors find content that interests them. Using tags you structure your publications.</p>
              <a href=\"https://www.vide.me/search/?q=time\" class=\"card-link\">Example</a>   
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"#\" class=\"btn btn-primary\">Find Out More!</a>
            </div>-->
          </div>
        </div>

        <div class=\"col-lg-6 col-md-12 mb-4\">
          <div class=\"card\">
            <!--<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\"/>-->
            <div class=\"card-body\">
              <h4 class=\"card-title\">Video Vide.me on your pages</h4>
              <p class=\"card-text\">A public video Vide.me on other sites using HTML code.</p>
              <a href=\"https://www.vide.me\" class=\"card-link\">Example</a>                 
            </div>
            <!--<div class=\"card-footer\">
              <a href=\"#\" class=\"btn btn-primary\">Find Out More!</a>
            </div>-->
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
";
    }

    public function htmlYouSign($contentInfo) // 28072022
    {
        //$spring = '';
        //if (!empty($contentInfo['spring'])) $spring = $contentInfo['spring'];
        if (!empty($contentInfo['user_id']) or !empty($contentInfo['spring'])) {
        return "
<div class=\"bg-white my-2\">
    <!--<img class=\"videme-you-sign-user_cover img-fluid\" src=\"https://s3.amazonaws.com/img.vide.me/videme_cover.png\" alt=\"\"
         id='nav_user_cover' style='width: 100%;'/>-->
    <div class=\"videme-you-sign-user_cover\" id='nav_user_cover'></div>
    <img src=\"" . $this->origin_img_vide_me . "nonname.jpg\"
         alt=\"...\" class=\"img-thumbnail rounded-circle bqr videme-you-sign-user_picture\" id=\"nav_user_brand\" width=\"48\"
         height=\"48\"/>
    <br/>
    <div class=\"px-2 py-2\">
        <h5 class=\"nav_form_user_name\" id=\"nav_form_user_name\">
            <a href=\"https://www.vide.me/web/enter/\" class=\"videme-sign-sign-in font-weight-bold\">
                Sign In
            </a>
        </h5>
        <div class=\"videme-you-sign-bio\" id=\"\"></div>
        <div class=\"videme-you-sign-talents\" id=\"\"></div>
        <div class=\"videme-you-sign-service\" id=\"\"></div>
        <div class=\"videme-you-sign-country\" id=\"\"></div>
        <div class=\"videme-you-sign-city\" id=\"\"></div>
    </div>
</div>
<script type=\"text/javascript\">
                /* 22122021 fade enyware!!! hide into spring only  require(['jquery', 'videme_jq'], function( $ ) {

    $(document).ready(function () {
        $.fn.myNetworkActivity({});
        $('.videme-you-sign-talents').showTalentsMySign({spring: '" . $contentInfo['spring'] . "'});
        $('.videme-you-sign-service').showServiceMySign({spring: '" . $contentInfo['spring'] . "'});
    });
    });*/
</script>";
        } else {
            return "
<div class=\"bg-white my-2\">
    <!--<img class=\"videme-you-sign-user_cover img-fluid\" src=\"https://s3.amazonaws.com/img.vide.me/videme_cover.png\" alt=\"\"
         id='nav_user_cover' style='width: 100%;'/>-->
    <div class=\"videme-you-sign-user_cover_nologin\" id='nav_user_cover'></div>
    <img src=\"" . $this->origin_img_vide_me . "nonname.jpg\"
         alt=\"...\" class=\"img-thumbnail rounded-circle bqr videme-you-sign-user_picture\" id=\"nav_user_brand\" width=\"48\"
         height=\"48\"/>
    <br/>
    <div class=\"px-2 py-2\">
        <h5 class=\"nav_form_user_name\" id=\"nav_form_user_name\">
            <a href=\"https://www.vide.me/web/enter/\" class=\"videme-sign-sign-in font-weight-bold\">
                Sign In
            </a>
        </h5>
        <div class=\"videme-you-sign-bio\" id=\"\"></div>
        <div class=\"videme-you-sign-talents\" id=\"\"></div>
        <div class=\"videme-you-sign-service\" id=\"\"></div>
        <div class=\"videme-you-sign-country\" id=\"\"></div>
        <div class=\"videme-you-sign-city\" id=\"\"></div>
    </div>
</div>";
        }
    }

    public function htmlOwnerSign($contentInfo = [])
    {
        //print_r($contentInfo);
        if (!empty($contentInfo['user_cover'])) {
            $user_cover = $this->origin_img_vide_me . $contentInfo['user_cover'];
            $user_cover_style = "style='background-image: url(\"" . $contentInfo['user_cover'] . "\");'";
        } else {
            //$user_cover = 'https://s3.amazonaws.com/img.vide.me/videme_cover.png';
            //$user_cover = '';
            $user_cover = $this->welcome->randBackground();
            //$user_cover_style = "style='background-image: url(\"" . $contentInfo['user_cover'] . \"; height: 7rem;\"'";

        }

        if (!empty($contentInfo['user_picture'])) {
            $user_picture = $this->origin_img_vide_me . $contentInfo['user_picture'];
        } else {
            $user_picture = $this->origin_img_vide_me . 'nonname.jpg';
        }
        $bio = 'No user information';
        $country = '';
        $city = '';
        if (!empty($contentInfo['bio'])) {
            $bio = $contentInfo['bio'];
        }
        if (!empty($contentInfo['user_link'])) {
            $link = "<i class=\"fa fa-external-link videme-user_link-marker\"></i>
        <a class='videme-user_link-name' href='" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "' target='_blank'>" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "</a>";
        } else {
            $link = '';
        }
        if (!empty($contentInfo['country'])) {
            $country = "
    <div class=\" videme-owner-sign-country\" id=\"\">
        <i class=\"fa fa-globe videme-country-marker\"></i>
        <div class='videme-country-name'> " . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "</div>
    </div>";
        }
        if (!empty($contentInfo['city'])) {
            $city = "
    <div class=\" videme-owner-sign-city\" id=\"\">
        <i class=\"fa fa-map-marker videme-city-marker\"></i>
        <div class='videme-city-name'> " . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "</div>
    </div>";
        }
        return "
<div class=\"bg-white my-2\">
    <!--<img class=\"videme-owner-sign-user_cover img-fluid\" src=\"" . $user_cover . "\" alt=\"\" id='' style='width: 100% \9;'/>-->
    <div class='videme-owner-sign-user_cover' style='background-image: url(\"" . $user_cover . "\");'></div>
    <img src=\"" . $user_picture . "\" alt=\"\" class=\"img-thumbnail rounded-circle bqr videme-owner-sign-user_picture\" id=\"\" width=\"48\" height=\"48\"/>
    <br/>
    <div class=\"px-2 py-2\">
        <h4 class=\"videme-owner-sign_display_name\" id=\"\"><a href='https://vide.me/" . $contentInfo['spring'] . "'>" . $contentInfo['user_display_name'] . "</a></h4>
        <div class=\"videme-owner-sign-bio\" id=\"\">" . $this->welcome->safetyTagsSlashesTrim4096($bio) . "</div>
        <div class=\"videme-owner-sign-talents\" id=\"\"></div>
        <div class=\"videme-owner-sign-service\" id=\"\"></div>
" . $country . "
" . $city . "
        
        <!--<div class=\"videme-owner-sign-country\" id=\"\">
        <i class=\"fa fa-globe videme-country-marker\"></i>
            <div class=\"videme-country-name\">" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "</div></div>
        <div class=\"videme-owner-sign-city\" id=\"\">
        <i class=\"fa fa-map-marker videme-city-marker\"></i>
            <div class=\"videme-city-name\">" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "</div></div>
        <div class='videme-owner-sign-user_link'>
        <i class=\"fa fa-external-link videme-user_link-marker\"></i>
        <a class=\"videme-user_link-name\" href=\"" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "\" target=\"_blank\">" . $contentInfo['user_link'] . "</a></div>-->
        <div class='videme-owner-sign-full-info'><a href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=about\">Full info</a></div>
    </div>
</div>
        ";
    }

    public function htmlOwnerSignV3($contentInfo = []) // 27072022
    {
        //print_r($contentInfo);
        if (!empty($contentInfo['user_cover'])) {
            $user_cover = $this->origin_img_vide_me . $contentInfo['user_cover'];
            $user_cover_style = "style='background-image: url(\"" . $contentInfo['user_cover'] . "\");'";
        } else {
            //$user_cover = 'https://s3.amazonaws.com/img.vide.me/videme_cover.png';
            //$user_cover = '';
            $user_cover = $this->welcome->randBackground();
            //$user_cover_style = "style='background-image: url(\"" . $contentInfo['user_cover'] . \"; height: 7rem;\"'";

        }

        if (!empty($contentInfo['user_picture'])) {
            $user_picture = $this->origin_img_vide_me . $contentInfo['user_picture'];
        } else {
            $user_picture = $this->origin_img_vide_me . 'nonname.jpg';
        }
        //$bio = 'No user information';
        $bio = '';
        $country = '';
        $city = '';
        if (!empty($contentInfo['bio'])) {
            $bio = $contentInfo['bio'];
        }
        if (!empty($contentInfo['user_link'])) {
            $link = "<i class=\"text-secondary fa fa-external-link videme-user_link-marker\"></i>
        <a class='text-secondary videme-user_link-name videme-v3-spring-breadcrumb-item' href='" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "' target='_blank'>" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "</a>";
        } else {
            $link = '';
        }
        if (!empty($contentInfo['country'])) {
            $country = "
    <div class=\"text-secondary videme-v3-owner-sign-country\" id=\"\">
        <i class=\"fa fa-globe videme-country-marker\"></i>
        <div class='videme-country-name videme-v3-spring-breadcrumb-item'> " . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "</div>
    </div>";
        }
        if (!empty($contentInfo['city'])) {
            $city = "
    <div class=\"text-secondary videme-owner-sign-city\" id=\"\">
        <i class=\"fa fa-map-marker videme-city-marker\"></i>
        <div class='videme-city-name videme-v3-spring-breadcrumb-item'> " . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "</div>
    </div>";
        }



        return "
<div class=\"bg-white my-2\">
    <!--<img class=\"videme-owner-sign-user_cover img-fluid\" src=\"" . $user_cover . "\" alt=\"\" id='' style='width: 100% \9;'/>-->
    <div class='videme-owner-sign-user_cover-v3' style='background-image: url(\"" . $user_cover . "\");'></div>
    <img src=\"" . $user_picture . "\" alt=\"\" class=\"img-thumbnail rounded-circle bqr videme-owner-sign-user_picture\" id=\"\" width=\"48\"
         height=\"48\"/>
    <br/>
    <div class=\"px-2 py-2\">
    <div class='row'>
        <h4 class=\"videme-owner-sign_display_name col\" id=\"\"><a class='videme-v3-link float-left mr-2' href='https://www.vide.me/" . $contentInfo['spring'] . "'>" . $contentInfo['user_display_name'] . "</a>
            <div class=\"hidden\" id='videme-v3-spring-activity_tags_confirmed_label_place_top'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_tags_confirmed_label\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=tags_conf\">
                    <i class=\"fa fa-check-circle-o fa-lg\"></i>
                        <span class=\"badge badge-light videme_nav_badge_tags_conf_count spring_activity_tags_confirmed_value\"></span>
                </a>
            </div>
        </h4>
        <div class=\"videme-v3-spring-navbar-button end-0\">
            <div class=\"videme-v3-spring-breadcrumb-item\">
                <a class=\"videme-v3-spring-nav-link spring_relation\" href=\"#\"></a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item\">
                <div class=\"spring_make_friends\"></div>
            </div>
        </div>
        </div>
        <div class=\"text-secondary videme-v3-spring-essence-list videme-owner-sign-city\">
        </div>
        " . $country . "
        " . $city . "
        <div class=\"videme-owner-sign-bio videme-v3-font\" id=\"\">" . $this->welcome->safetyTagsSlashesTrim4096($bio) . "</div>
        
        <div class='videme-v3-spring_activity_t'>
            <div class=\"text-center2 videme-v3-spring_activity_starred2 text-secondary videme-v3-owner-sign-country\">
        <i id='spring_activity_starred_label' class='fa fa-star videme-v3-spring_activity_starred_label2 videme-city-marker hidden'>
        </i>
        <div id='spring_activity_starred_value' class='videme-v3-spring_activity_starred_value2 videme-v3-spring-breadcrumb-item'></div>
    </div>

    <div class=\"text-center2 videme-v3-spring_activity_liked2 text-secondary videme-v3-owner-sign-country\">
        <i id='spring_activity_liked_label' class='fa fa-thumbs-up videme-v3-spring_activity_liked_label2 videme-city-marker hidden'>
        </i>
        <div id='spring_activity_liked_value' class='videme-v3-spring_activity_liked_value2 videme-v3-spring-breadcrumb-item'></div>
        <!--<div class='spring_activity_liked_label hidden'>Liked</div>-->

        <!--<div class=\"videme_item_info_val\">0</div>-->
    </div>
        </div>
        
    <div class=\" videme-v3-owner-sign-user_link\">
        " . $link . "</div>
    <div class='videme-spring-navbar-v3 videme-v3-font'>

        <!--<div class=\"videme-v3-spring-navbar-username\">
            <div class=\"videme-v3-spring-breadcrumb-item\">
                <a class=\"videme-spring-user_display_name\" href=\"#\"></a>
            </div>
        </div>-->
        <!--<div class=\"videme-v3-spring-navbar-button\">
            <div class=\"videme-v3-spring-breadcrumb-item\">
                <a class=\"videme-v3-spring-nav-link spring_relation\" href=\"#\"></a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item\">
                <a class=\"spring_make_friends\" href=\"#\"></a>
            </div>
        </div>-->
        <div class=\"videme-v3-spring-navbar-list1\">
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_viewed_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center spring_activity_viewed2 text-secondary\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=viewed\">
                    <strong><span class='spring_activity_viewed_value'></span></strong>
                    <span class='videme-v3-spring-activity_viewed_label'>Viewed</span>
                </a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_posts_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center spring_activity_posts2 text-secondary\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=posts\">
                    <strong><span class='spring_activity_posts_value'></span></strong>
                    <span class='videme-v3-spring-activity_posts_label'>Posts</span>
                </a>
            </div>
        <!--</div>
        <div class=\"videme-v3-spring-navbar-list2\">-->
            <div class=\"w-100\"></div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_video_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_video2\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=video\">
                    <strong><span class='spring_activity_video_value'></span></strong>
                    <span class='videme-v3-spring-activity_video_label'>Video</span>
                </a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_image_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_image2\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=image\">
                    <strong><span class='spring_activity_image_value'></span></strong>
                    <span class='videme-v3-spring-activity_image_label'>Image</span>
                </a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_article_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_article2\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=article\">
                    <strong><span class='spring_activity_article_value'></span></strong>
                    <span class='videme-v3-spring-activity_article_label'>Article</span>
                </a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_event_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_event2\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=event\">
                    <strong><span class='spring_activity_event_value'></span></strong>
                    <span class='videme-v3-spring-activity_event_label'>Events</span>
                </a>
            </div>
        <!--</div>
        <div class=\"videme-v3-spring-navbar-list3\">-->
            <div class=\"w-100\"></div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_friends_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_friend2s\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=friends\">
                    <strong><span class='spring_activity_friends_value'></span></strong>
                    <span class='videme-v3-spring-activity_friends_label'>Friends</span>
                </a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_relation_to_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_relation_to2\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=followers\">
                    <strong><span class='spring_activity_relation_to_value'></span></strong>
                    <span class='videme-v3-spring-activity_relation_to_label'>Followers</span>
                </a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_relation_from_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_relation_from2\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=following\">
                    <strong><span class='spring_activity_relation_from_value'></span></strong>
                    <span class='videme-v3-spring-activity_relation_from_label'>Following</span>
                </a>
            </div>
            <div class=\"videme-v3-spring-breadcrumb-item hidden\" id='videme-v3-spring-activity_tags_confirmed_label_place'>
                <a class=\"videme-v3-spring-nav-link text-center text-secondary spring_activity_relation_from2\"
                   href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=tags_conf\">
                    <strong><span class='spring_activity_tags_confirmed_value'></span></strong>
                    <span class='spring_activity_tags_confirmed_label'>Tags confirmed</span>
                </a>
            </div>
        </div>
    </div>

        <!--<div class=\"videme-owner-sign-country\" id=\"\">
        <i class=\"fa fa-globe videme-country-marker\"></i>
            <div class=\"videme-country-name\">" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "</div></div>
        <div class=\"videme-owner-sign-city\" id=\"\">
        <i class=\"fa fa-map-marker videme-city-marker\"></i>
            <div class=\"videme-city-name\">" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "</div></div>
        <div class='videme-owner-sign-user_link'>
        <i class=\"fa fa-external-link videme-user_link-marker\"></i>
        <a class=\"videme-user_link-name\" href=\"" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "\" target=\"_blank\">" . $contentInfo['user_link'] . "</a></div>-->
        

        <div class=\"videme-owner-sign-talents videme-v3-font\" id=\"\"></div>
        <div class=\"videme-owner-sign-service videme-v3-font\" id=\"\"></div>
        
        <div class='videme-owner-sign-full-info'><a href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=about\">Full info</a></div>
        " . $this->htmlEssenceFromMeSpring() .  "
        " . $this->htmlEssenceToMeSpring() .  "
    </div>
</div>
<!--<div class=\"bg-white my-2 px-3 py-3\">

    <div class=\"text-center videme-v3-spring_activity_starred\">
        <i id='spring_activity_starred_label' class='fa fa-star videme-v3-spring_activity_starred_label hidden'>
        </i>
        <div id='spring_activity_starred_value' class='videme-v3-spring_activity_starred_value'></div>
    </div>

    <div class=\"text-center videme-v3-spring_activity_liked\">
        <i id='spring_activity_liked_label' class='fa fa-thumbs-up videme-v3-spring_activity_liked_label hidden'>
        </i>
        <div id='spring_activity_liked_value' class='videme-v3-spring_activity_liked_value'></div>
        &lt;!&ndash;<div class='spring_activity_liked_label hidden'>Liked</div>&ndash;&gt;

        &lt;!&ndash;<div class=\"videme_item_info_val\">0</div>&ndash;&gt;
    </div>
</div>
<div class=\"bg-white my-2 px-3 py-3\">


</div>-->

<script type=\"text/javascript\">
                require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        //$('#videme-album-of-spring').showAlbumOfSpring({});
        /*$('#videme-list-of-spring-friends').showSignsOfSpringForFriends({});
        $('#videme-list-of-spring-public').showSignsOfSpringForPublic({});
        $('#videme-list-of-spring-private').showSignsOfSpringForPrivate({});*/
        //$.fn.userSpringForMe({});
        var url = parseUrl();
        $.fn.userSpringForMeFriendship();
        $.fn.userSpringForMeFollow();
        $.fn.userSpringInfo();
        $.fn.springActivity();
        $.fn.springEssences();
        //$.fn.showEssenceFromMeSpring();
        $.fn.springTalents(url);
        $.fn.springService(url);
    });
    });
</script>

        ";
    }
    public function htmlShowcaseVideoV3($contentInfo = []) // 26072022
    {
        $welcome = new NAD();
        if (!empty($contentInfo['type']) && $contentInfo['type'] == 'video') {
            $addClass = '';
        } else {
            $addClass = 'hidden';
        }
        //$htmlItemscope = $this->htmlShowcaseV3($contentInfo);
        $htmlItemscope = $this->htmlShowcaseV3Dinamic($contentInfo);
        $trueContentInfo['tags'] = $contentInfo['tags'] ?? "[]";
        $trueContentInfo['src'] = $contentInfo['src'] ?? "''";
        $trueContentInfo['cover'] = $contentInfo['cover'] ?? "";
        $action_url_class = $welcome->defineShowcaseClass($contentInfo);
        return "
<div class=\"bg-white my-2 videme-showcase-video-main " . $addClass . "
\">
<!--<div class='container-fluid videme-tile-border'>
<div class='row'>-->
" . $this->htmlItemscope($htmlItemscope, $contentInfo) . "
<!--</div>
</div>-->
            <script type=\"text/javascript\">
                            require(['jquery', 'videme_jq'], function( $ ) {

                //$(document).ready(function () {
                    /*var file = getParameterByName('m');
                    $.fn.showNextVideoPagination({
                        prev_item_id: $.cookie('vide_prev_item_id'),
                        next_item_id: file,
                        limit: 6
                    });
                    $.cookie(\"vide_prev_item_id\", file, {expires: 14, path: '/', domain: 'vide.me', secure: true});*/
                    $.fn.oneTimeV3({
                        type: '" . $contentInfo["type"] . "',
                        video: '" . $contentInfo["item_id"] . "',
                        item_id: '" . $contentInfo["item_id"] . "',
                        owner_id: '" . $contentInfo["owner_id"] . "',
                        access: '" . $contentInfo["access"] . "',
                        message_id: '" . /*$message_id .*/ "',
                        src: " . $trueContentInfo['src'] . ",
                        cover: '" . $trueContentInfo['cover'] . "',
                        created_at: '" . $contentInfo['created_at'] . "',
                        updated_at: '" . $contentInfo['updated_at'] . "',
                        title: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['title']) . "',
                        content: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['content']) . "',
                        video_duration: '" . $contentInfo['video_duration'] . "',
                        tags: " . $trueContentInfo['tags'] . ",
                        to_user_id: '" . $contentInfo['to_user_id'] . "',
                        spring: '" . $contentInfo['spring'] . "',
                        bio: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['bio']) . "',
                        country: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "',
                        city: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "',
                        item_count_show: '" . $contentInfo['item_count_show'] . "',
                        likes_count: '" . $contentInfo['likes_count'] . "',
                        stars_count: '" . $contentInfo['stars_count'] . "',
                        its_like: '" . $contentInfo['its_like'] . "',
                        stars_count: '" . $contentInfo['stars_count'] . "',
                        comments_count: '" . $contentInfo['comments_count'] . "',
                        its_star: '" . $contentInfo['its_star'] . "',
                        reposts_count: '" . $contentInfo['reposts_count'] . "',
                        ext_links: '" . htmlspecialchars($contentInfo['ext_links']) . "',
                        from_user_id: '" . $contentInfo['from_user_id'] . "',
                        user_picture: '" . htmlspecialchars($contentInfo['user_picture']) . "',
                        user_cover: '" . htmlspecialchars($contentInfo['user_cover']) . "',
                        from_user_display_name: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['from_user_display_name']) . "',
                        user_display_name: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . "',
                        from_user_name: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . "',
                        recipients: '" . /*$recipients .*/ "',
                        conference_id: '" . $contentInfo['conference_id'] . "',
                        key: 'oneTimeV3',
                        pre_v_w320: '" . $contentInfo['pre_v_w320'] . "',
                        pre_i_w320: '" . $contentInfo['pre_i_w320'] . "',
                        spr_w120: '" . $contentInfo['spr_w120'] . "',
                        vtt_w120: '" . $contentInfo['vtt_w120'] . "',
                        user_tags_conf: '" . $contentInfo['user_tags_conf'] . "',
                        user_tags_conf_new: '" . $contentInfo['user_tags_conf_new'] . "',
                        //action_url_class: 'showmulti'
                        action_url_class: '" . $action_url_class . "'
                    });



                    /*$.fn.ownerSignUserInfo({
                        user_picture: \"" . htmlspecialchars($contentInfo['user_picture']) . "\",
                        user_cover: \"" . htmlspecialchars($contentInfo['user_cover']) . "\",
                        user_display_name: \"" . $contentInfo['user_display_name'] . "\",
                        spring: \"" . $contentInfo['spring'] . "\",
                        bio: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['bio']) . "\",
                        country: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "\",
                        city: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "\",
                        user_link: \"" /*. $welcome->safetyTagsSlashesTrim4096($contentInfo['user_link'])*/ . "\"
                    });*/
                    /*$.fn.springTalents({spring: '" . $contentInfo['spring'] . "'});
                    $.fn.springService({spring: '" . $contentInfo['spring'] . "'});*/
                    
                    var siteURL = 'https://www.vide.me/',
                    entries = $('.videme-showcase-message');
                    if ( entries.length > 0 ) {
                        entries.each(function(){
                            contents = $(this).text().replace(/#(\S+)/g,'<a href=\"'+siteURL+'search/?q=$1\" title=\"Find more posts tagged with #$1\">#$1</a>');
                            $(this).html(contents);
                        });
                    }
                    
                });
            </script>
" . $this->htmlCommentsJS($contentInfo). "
</div>
<div class='hidden' id='showcaseNext'></div>
        ";
    }

    /**
     * @param NAD $welcome
     */
    public function setWelcome(NAD $welcome): void
    {
        $this->welcome = $welcome;
    }

    /**
     * @return NAD
     */
    public function getWelcome(): NAD
    {
        return $this->welcome;
    }

    public function htmlComments($contentInfo) // TODO: remove
    {
        $welcome = $this->getWelcome();
        $userId = $welcome->CookieToUserId();
        $commentInsPost = '';
        $readOnly = 'true';
        $userPicture = 'https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png';
        $urlCommentsGet = 'https://api.vide.me/v2/comments/get/?item_id=' . $contentInfo["item_id"];

        if (!empty($userId)) {
            $readOnly = 'false';
            $userInfo = $welcome->pgUserInfo($userId);
            $userPicture = $this->origin_img_vide_me . $userInfo["user_picture"];
            $urlCommentsGet = 'https://api.vide.me/v2/comments/get/?item_id=' . $contentInfo["item_id"] . '&';

        }
        return "
<div class='videme-showcase-title'>Comments:</div>
<div id='comments-container'></div>
<script type=\"text/javascript\">
/*$('#comments-container').comments({
    getComments: function(success, error) {
        var commentsArray = [{
            id: 1,
            created: '2015-10-01',
            content: 'Lorem ipsum dolort sit amet',
            fullname: 'Simon Powell',
            upvote_count: 2,
            user_has_upvoted: false
        }];
        success(commentsArray);
    }
});*/


$('#comments-container').comments({
fieldMappings: {
    id: 'comment_id',
    parent: 'parent',
    created: 'created_at',
    modified: 'modified',
    content: 'content',
    file: 'file',
    fileURL: 'file_url',
    fileMimeType: 'file_mime_type',
    pings: 'pings',
    creator: 'creator',
    fullname: 'user_display_name',
    profileURL: 'spring',
    profilePictureURL: 'user_picture',
    isNew: 'is_new',
    createdByAdmin: 'created_by_admin',
    createdByCurrentUser: 'its_comment',
    upvoteCount: 'upvote_count',
    userHasUpvoted: 'user_has_upvoted'
},
    timeFormatter: function(time) {
        return moment(time).fromNow();
    },
    readOnly: " . $readOnly . ",
    enableUpvoting: false,
    enableReplying: false,
    //enableEditing: false,
    enableDeleting: false,
    enableAttachments: false,
    enableNavigation: false,
    roundProfilePictures: true,
    profilePictureURL: '" . $userPicture . "',
    /*enablePinging: true,
    searchUsers: function(term, success, error) {
        $.ajax({
            type: 'get',
            url: 'https://api.vide.me/v2/friendship/my/',
            success: function(userArray) {
                console.log('searchUsers userArray ' + userArray);
                success(userArray)
            },
            error: error
        });
    },*/
    getComments: function(success, error) {
        $.ajax({
            type: 'get',
            url: 'https://api.vide.me/v2/comments/get/?item_id=" . $contentInfo["item_id"] . "' + urlCommentsGetAddon,
            success: function(commentsArray) {
                console.log('getComments commentsArray ' + commentsArray);
                var array = $.map(commentsArray, function(value, index) {
                    return [value];
                });
                console.log('getComments array ' + array);
                var commTest = JSON.stringify(commentsArray);
                console.log('getComments commTest ' + commTest);
                var obj = $.parseJSON(commTest);
                console.log('getComments obj ' + obj);
                /*var arraycommTest = $.map(commTest, function(value, index) {
                    return [value];
                });
                console.log('getComments arraycommTest ' + arraycommTest);*/
                success(commentsArray)
                //success(array)
                //success(commTest);
                //success(obj);
                //success(arraycommTest)
            },
            error: error
        });

    }
});
			/*var saveComment = function(data) {

					// Convert pings to human readable format
					$(data.pings).each(function(index, id) {
						var user = usersArray.filter(function(user){return user.id == id})[0];
						data.content = data.content.replace('@' + id, '@' + user.fullname);
					});

					return data;
				}*/
				$('#comments-container').comments({
    postComment: function(commentJSON, success, error) {
    //var commentJSON = { \"CVM\": commentJSON, \"articleId\": 'sdf' };
    //console.log('nad' + $.cookie('vide_nad'));

        
        $.ajax({
            type: 'post',
            url: 'https://api.vide.me/v2/comments/post/',
            //data: commentJSON + { \"CVM\": commentJSON, \"articleId\": 'sdf' },
            data: { 'commentJSON': commentJSON, 'item_id': '" . $contentInfo["item_id"] . "', 'nad': $.cookie('vide_nad') }, // work
            //data: { \"CVM\": 'teted', \"articleId\": 'sdf' }, // work
            //data: commentJSON + {\"articleId\": 'sdf'},
            //data: commentJSON,
            success: function(comment) {
                //success(comment)
                					/*setTimeout(function() {
							success(saveComment(comment));
						}, 500);*/
                /*success(comment);
                console.log('comment' + comment);
                console.log('data' + data);*/
                console.log('postComment comment ' + comment);
                //var commentArray = jQuery.parseJSON(comment);
                var commentArray = $.parseJSON(comment);
                /*var commentArray= $.map(comment, function(value, index) {
                    return [[index,value]];
                });
                
                console.log(commentArray);*/
                
                $('#comments-container').comments({
                    profilePictureURL: '" . $userPicture . "',
                    getComments: function(success, error) {
                        
                        //success(comment);
                        //success(JSON.parse(comment));
                        console.log('getComments comment ' + comment);
                        //console.log('getComments commentArray ' + commentArray);
                        success(commentArray);
                        //console.log('getComments comment ' + JSON.parse(comment));

                    }
                });

            },
            error: error
        });
    }
});
				</script>";
    }

    public function htmlCommentsJS($contentInfo) // 26072022
    {
        $welcome = $this->getWelcome();
        $userId = $welcome->CookieToUserId();
        //$commentInsPost = '';
        //$readOnly = 'true';
        $userPicture = 'https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png';
        //$urlCommentsGet = 'https://api.vide.me/v2/comments/get/?item_id=' . $contentInfo["item_id"];

        if (!empty($userId)) {
            //$readOnly = 'false';
            $userInfo = $welcome->pgUserInfo($userId);
            $userPicture = $this->origin_img_vide_me . $userInfo["user_picture"];
            //$urlCommentsGet = 'https://api.vide.me/v2/comments/get/?item_id=' . $contentInfo["item_id"] . '&';
        }
        return "
<div class='videme-showcase-title'>Comments:</div>
<div id='videme-showcase-comments-container'></div>
<script type=\"text/javascript\">
                require(['jquery', 'videme_jq'], function( $ ) {
    $.fn.showcaseComments({
        item_id: \"" . $contentInfo["item_id"] . "\",
        showcaseCommentsPlace: \"videme-showcase-comments-container\",
        user_picture: \"" . $userPicture . "\"
    });
    });
</script>";
    }

    public function htmlSpringSign($contentInfo)
    {
        $bio = 'No user information';
        $country = '';
        $city = '';
        if (!empty($contentInfo['bio'])) {
            $bio = $contentInfo['bio'];
        }
        if (!empty($contentInfo['user_link'])) {
            $link = "<i class=\"fa fa-external-link videme-user_link-marker\"></i>
        <a class='videme-user_link-name' href='" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "' target='_blank'>" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['user_link']) . "</a>";
        } else {
            $link = '';
        }
        if (!empty($contentInfo['country'])) {
            $country = "
    <div class=\" videme-owner-sign-country\" id=\"\">
        <i class=\"fa fa-globe videme-country-marker\"></i>
        <div class='videme-country-name'> " . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "</div>
    </div>";
        }
        if (!empty($contentInfo['city'])) {
            $city = "
    <div class=\" videme-owner-sign-city\" id=\"\">
        <i class=\"fa fa-map-marker videme-city-marker\"></i>
        <div class='videme-city-name'> " . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "</div>
    </div>";
        }
        return "<div class=\"bg-white my-2 px-2 py-2\">
    <div class='videme-sign-text ellipsis'>
        <div class=\" videme-owner-sign-bio videme-sign-text-concat\" id=\"\">" . $this->welcome->safetyTagsSlashesTrim4096($bio) . "</div>
    </div>
    <div class=\"videme-owner-sign-talents\" id=\"\"></div>
    <div class=\"videme-owner-sign-service\" id=\"\"></div>
" . $country . "
" . $city . "
    <div class=\" videme-owner-sign-user_link\">
        " . $link . "</div>
    <div class='videme-owner-sign-full-info'>
        <a href='https://www.vide.me/" . $this->welcome->safetyTagsSlashesTrim4096($contentInfo['spring']) . "/?show=about'>Full info</a>
    </div>
</div>
        ";
    }

    public function htmlHow_does_it_work()
    {
        return "
<div class='bg-white my-2 px-3 py-3'>
    <h4>How does it work?</h4>
    <p>The sender writes the video, the recipient gets a personalized invitation for viewing.</p>

    <h4>Is it confidentiality?</h4>
    <p>Individual invitation for watching video receives only the mailbox owner.</p>

    <h4>How safe is it?</h4>
    <p>To record and send video messages Vide.me uses only secure Internet channels.</p>
</div>
                       ";
    }

    public function htmlTrendsNowPopular() // 25072022
    {
        return "   
    <div class=\"bg-white my-2 px-3 py-3\">
        <div class=\"videme-sidebar-title\">Now popular</div>
        <div class=\"\" id=\"videme-trends-users\">
        </div>
        <!--<a class=\"videme-sidebar-bottom-link\" href=\"https://www.vide.me/web/now_popular/\">Show more</a>-->
    </div>
    <script type=\"text/javascript\">
                /* 22122021 */ 
                require(['jquery', 'videme_jq'], function( $ ) {

        $(document).ready(function () {
            $('#videme-trends-users').showTrendsUsers({
                size: 'small',
                limit: 5
            });
        });
        });
    </script>";
    }

    public function htmlTrendsItems() // 25072022
    {
        return "
    <div class=\"bg-white my-2 px-3 py-3\">
        <div class=\"videme-sidebar-title\">Trending up</div>
        <div class=\"\" id=\"videme-trends-items\">
        </div>
        <!--<a class=\"videme-sidebar-bottom-link\" href=\"https://www.vide.me/web/now_popular/\">Show more</a>-->
    </div>
    <script type=\"text/javascript\">
                /* 22122021 */ 
                require(['jquery', 'videme_jq'], function( $ ) {

        $(document).ready(function () {
            $('#videme-trends-items').showTrendsItems({
                size: 'small',
                limit: 8
            });
        });
        });
    </script>";
    }

    public function htmlHot_Springs() // remvoe
    {
        return "
            <div class='bg-white my-2 px-3 py-3'>
                <div class='videme-sidebar-title'>Now popular</div>
                <div class=\"\" id=\"videme-pop-connect\">
                </div>
                <a class='videme-sidebar-bottom-link' href='https://www.vide.me/web/now_popular/'>Show more</a>
            </div>
                <script type=\"text/javascript\">
                    $(document).ready(function () {
                        $('#videme-pop-connect').showPopConnect({
                            size: 'small',
                            limit: 8
                        });
                    });
                </script>";
    }

    public function htmlConnectRecommended() // 25072022
    {
        return "
            <div class='bg-white my-2 px-3 py-3 videme-connect-recommended-panel hidden'>
                <div class='videme-sidebar-title'>Recommended connection</div>
                <div class=\"\" id=\"videme-connect-recommended\">
                </div>
                <a class='videme-sidebar-bottom-link' href='https://www.vide.me/web/recommended_connection/'>Show more</a>                
            </div>
                <script type=\"text/javascript\">
                /* 22122021 */
                require(['jquery', 'videme_jq'], function( $ ) {

                    $(document).ready(function () {
                        console.log(\"$.fn.showConnectRecommended -----> fetch \");
                        $('#videme-connect-recommended').showConnectRecommended({
                            size: 'small',
                            limit: 5
                        });
                    });
                    });
                </script>";
    }

    public function htmlConnectRecommendedDBS()
    {
        return "
            <!--<div class='bg-white my-2 px-3 py-3 videme-connect-recommended-panel hidden'>-->
                <div class='videme-tile-title'>Recommended connection</div>
                <div class=\"\" id=\"videme-connect-recommended-dbs\">
                </div>
            <!--</div>-->
                <script type=\"text/javascript\">
                    require(['jquery', 'videme_jq'], function( $ ) {
                    $(document).ready(function () {
                        console.log(\"$.fn.showConnectRecommended -----> fetch \");
                        $('#videme-connect-recommended-dbs').showConnectRecommendedDBS({
                            size: 'small',
                            limit: 18
                        });
                    });
                    });
                </script>";
    }

    public function htmlNowPopularDBS() // 26072022
    {
        return "
            <!--<div class='bg-white my-2 px-3 py-3 videme-connect-recommended-panel hidden'>-->
                <div class='videme-tile-title'>Now popular</div>
                <div class='videme-now-popular-dbs'>
                </div>
            <!--</div>-->
                <script type=\"text/javascript\">
                    require(['jquery', 'videme_jq'], function( $ ) {
                    $(document).ready(function () {
                        console.log(\"$.fn.showPopConnectDBS -----> fetch \");
                        $('.videme-now-popular-dbs').showPopConnectDBS({
                            size: 'small',
                            limit: 18
                        });
                    });
                    });
                </script>";
    }

    public function htmlFriendsRecommended()
    {
        return "
            <div class='bg-white my-2 px-3 py-3 videme-friends-recommended-panel hidden'>
                <div class='videme-sidebar-title'>Recommended friends</div>
                <div class=\"\" id=\"videme-friends-recommended\">
                </div>
                <a class='videme-sidebar-bottom-link' href='https://www.vide.me/web/recommended_friends/'>Show more</a>
            </div>
                <script type=\"text/javascript\">
                
                /*require(['jquery', 'videme_jq'], function( $ ) {
                    $(document).ready(function () {
                        //console.log(\"$.fn.showConnectRecommended -----> fetch \");
                        $('#videme-friends-recommended').showFriendsRecommended({
                            size: 'small',
                            limit: 5
                        });
                    });
                    });*/
                </script>";
    }

    public function htmlFriendsRecommendedDBS()
    {
        return "
            <!--<div class='bg-white my-2 px-3 py-3 videme-friends-recommended-panel hidden'>-->
                <div class='videme-tile-title'>Recommended friends</div>
                <div class=\"\" id=\"videme-friends-recommended-dbs\">
                </div>
            <!--</div>-->
                <script type=\"text/javascript\">
                                require(['jquery', 'videme_jq'], function( $ ) {
                    $(document).ready(function () {
                        //console.log(\"$.fn.showConnectRecommended -----> fetch \");
                        $('#videme-friends-recommended-dbs').showFriendsRecommendedDBS({
                            size: 'small',
                            limit: 18
                        });
                    });
                    });
                </script>";
    }

    public function htmlHotTags()
    {
        return "
                <div class='bg-white my-2 px-3 py-3'>
                  <div class='videme-sidebar-title'>Hot tags</div>
                  <hr/>
                    <!--<div class='videme-pop-tags' id='videme-pop-tags'></div>-->
                    <div class='videme-trends-tags' id='videme-trends-tags'></div>
                </div>
                        <script type=\"text/javascript\">
                /* 22122021 */ 
                require(['jquery', 'videme_jq'], function( $ ) {

                            $(document).ready(function () {
                                //$.fn.showPopTags();
                                $.fn.showTrendsTags();
                            });
                            });
                        </script>
                       ";
    }

    public function htmlShowTags($htmlShowTags)
    {
        if (!empty($htmlShowTags['tags'])) {
            $echo = "<h5>Tags</h5>
            <p>
            ";
            //print_r($showArticle[$this->welcome->tags]);
            $tags = json_decode($htmlShowTags['tags']);
            //print_r($tags);
            foreach ($tags as $value1) {
                $echo .= "<a href=\"https://vide.me/search/?q=" . $value1 . "\" class=\"badge badge-primary\"> " . $value1 . " </a> ";
            }
            $echo .= "</p>";
        }
        return $echo;
    }

    public function html_Album_Of_Spring() // 27072022
    {
        return "
<div class='bg-white my-2 px-3 py-3 videme-spring-album hidden'>
<div class='videme-sidebar-title'>Albums</div>
<div class=\"videme-album-of-spring\" id=\"videme-album-of-spring\"></div>
</div>
    <script type=\"text/javascript\">
                    require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#videme-album-of-spring').showAlbumOfSpring({});
        });
        });
    </script>";
    }

    public function html_Tags_Of_Spring() // 28072022
    {
        return "
<div class='bg-white my-2 px-3 py-3 videme-tags-of-spring_place hidden'>
<div class='videme-sidebar-title'>Tags</div>
<div class=\"videme-tags-of-spring\" id=\"videme-tags-of-spring\"></div>
</div>
    <script type=\"text/javascript\">
                    require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#videme-tags-of-spring').showTagsOfSpring({});
        });
        });
    </script>";
    }

    public function htmlShareToFB()
    {
        /*return "
<div class='bg-white2 my-2x px-3x py-3'>
<div class='videme-sidebar-title'>Share</div>"
            . $this->htmlButtonSocShareAllNoLabel() .
            "</div>";*/
    }

    public function html_My_Album_Of_Spring()
    {
        return "
<div class='bg-white my-2 px-3 py-3'>
<div class='videme-sidebar-title'>My albums</div>
<div class=\"videme-album-of-spring\" id=\"videme-album-of-spring\">
</div>
</div>

    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-album-of-spring').showList({});
        });
    </script>";
    }

    public function htmlList_Of_Spring_For_Friends() // TODO: remove
    {
        return "
<p>Signs for friends</p>
<div class=\"videme-list-of-spring-friends\" id=\"videme-list-of-spring-friends\"></div>";
    }

    public function htmlList_Of_Spring() // TODO: remove
    {
        return "
<p>Public Signs</p>
<div class=\"videme-list-of-spring-public\" id=\"videme-list-of-spring-public\"></div>";
    }

    public function htmlListOfSpringPrivate() // TODO: remove
    {
        return "
<p>Private Signs</p>
<div class=\"videme-list-of-spring-private\" id=\"videme-list-of-spring-private\"></div>";
    }

    public function htmlSignInProvider()
    {
        return "
<div class=\"\" id=\"oa\">
    <div class=\"row videme-white\">
        <div class=\"col-md-9\">
            <div id=\"login-result\">
            </div>
            <div class=\"panel panel-info\">
                <div class=\"panel-heading\">
                    Log in
                </div>
                <div class=\"panel-body\">
                    <form class=\"form\" id=\"user-login-form\" role=\"form\" action=\"https://api.vide.me/v2/user/login/\"
                          method=\"post\">
                        <input name=\"feedback\" class=\"\" id=\"feedback\"  type=\"hidden\" value='https://www.vide.me' />
                        <div class=\"form-group\">
                            <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\" placeholder=\"Your email address\" />
                        </div>
                        <div class=\"form-group\">
                            <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\"
                                   placeholder=\"Password\"/>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">
                            Log in
                            <div id=\"videme-progress\">
                            </div>
                        </button>
                        <a href=\"https://api.vide.me/pas/restore/\" class=\"btn btn-warning\" role=\"button\">Forgot
                            password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class=\"\" id=\"oa\">
    <div class=\"row videme-white\">
        <div class=\"col-md-9\">
            <div class=\"panel panel-info\">
                <div class=\"panel-heading\">
                    Sign Up
                </div>
                <div class=\"panel-body\">
                    <form class=\"form-inline\" role=\"form\" action=\"https://api.vide.me/v2/user/new/\" method=\"post\">
                        <div class=\"form-group\">
                            <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\" placeholder=\"Your email address\" />
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"\" id=\"oa\">
    <div class=\"row videme-white\">
        <div class=\"col-md-9\">
            <div class=\"panel panel-info\">
                <div class=\"panel-heading\">
                    Sign-in with:
                </div>
                <div class=\"panel-body\">
                    <a href='https://api.vide.me/google/'>
                        <img src='https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/oa_google.png' />
                    </a>
                    <a href='https://api.vide.me/facebook/'>
                        <img src='https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/oa_facebook.png' />
                    </a>
                    <!--                    <a href='https://api.vide.me/microsoft/'>
                                            <img src='https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/oa_microsoft.png'>
                                        </a>-->
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function htmlSignInProvider2()
    {
        return "<style>
    .btn-facebook {
        color: #fff;
        background-color: #4267b2;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-google {
        color: #fff;
        background-color: #4285f4;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-microsoft {
        color: #fff;
        background-color: #737373;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-twitter {
        color: #fff;
        background-color: #38A1F3;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-social {
        position: relative;
        padding-left: 44px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1rem;
        width: 75%;
    }

    .btn-social:hover {
        color: #eee;
    }

    .btn-social :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        padding: 7px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }
    
    .videme-forgot-pass {
        margin-bottom: -1rem;
    }
</style>
<div class=\"container-fluid\">
    <div class=\"row\">
        <!--<div class='videme-tile'>-->
            <div class=\"videme-tile-title\">Log in:</div>
            <form class=\"form\" id=\"user-login-form-modal\" role=\"form\" action=\"https://api.vide.me/v2/user/login/\"
                  method=\"post\">
                <input name=\"feedback\" class=\"\" id=\"feedback\" type=\"hidden\" value='https://www.vide.me'/>
                <div class=\"form-group\">
                    <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                           placeholder=\"Your email address\"/>
                </div>
                <div class=\"form-group\">
                    <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\"
                           placeholder=\"Password\"/>
                    <div class='videme-forgot-pass'>
                        <a class='form-text' href=\"https://api.vide.me/pas/restore/\">Forgot your password?</a>
                    </div>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Log in</button>
            </form>
            <hr/>
            <div class=\"videme-tile-title\">Sign Up:</div>
            <form class=\"form-inline\" role=\"form\" action=\"https://api.vide.me/v2/user/new/\" method=\"post\">
                <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                       placeholder=\"Your email address\"/>
                <button type=\"submit\" class=\"btn btn-primary\">Sign Up</button>
            </form>
            <hr/>
            <div class=\"videme-tile-title\">Sign-in with:</div>
            <a href='https://api.vide.me/facebook/' class=\"btn btn-lg btn-social btn-facebook\">
                <i class=\"fa fa-facebook\"></i> Sign in with Facebook
            </a>
            <a href='https://api.vide.me/google/' class=\"btn btn-lg btn-social btn-google\">
                <i class=\"fa fa-google\"></i> Sign in with Google
            </a>
            <a href='https://api.vide.me/microsoft/' class=\"btn btn-lg btn-social btn-microsoft\">
                <i class=\"fa fa-windows\"></i> Sign in with Microsoft
            </a>
            <a href='https://api.vide.me/twitter/' class=\"btn btn-lg btn-social btn-twitter\">
                <i class=\"fa fa-twitter\"></i> Sign in with Twitter
            </a>
        <!--</div>-->
    </div>
</div>
";
    }

    public function htmlSignInProvider2Web()
    {
        return "<style>
    .btn-facebook {
        color: #fff;
        background-color: #4267b2;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-google {
        color: #fff;
        background-color: #4285f4;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-microsoft {
        color: #fff;
        background-color: #737373;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-twitter {
        color: #fff;
        background-color: #38A1F3;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-social {
        position: relative;
        padding-left: 44px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1rem;
        width: 75%;
    }

    .btn-social:hover {
        color: #eee;
    }

    .btn-social :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        padding: 7px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }
    
    .videme-forgot-pass {
        margin-bottom: -1rem;
    }
</style>
<script src=\"https://www.google.com/recaptcha/api.js?render=6LfkLtQZAAAAAGTz14hnNraCaaO3N4kXnQCDrTmt\"></script>
<script>
    grecaptcha.ready(function() {
        // do request for recaptcha token
        // response is promise with passed token
        grecaptcha.execute('6LfkLtQZAAAAAGTz14hnNraCaaO3N4kXnQCDrTmt', {action:'validate_captcha'})
            .then(function(token) {
            // add token value to form
            //document.getElementById('g-recaptcha-response').value = token;
            $('.g-recaptcha-response').val(token);
        });
    });
</script>
<div class=\"container-fluid\">
    <div class=\"row\">
        <!--<div class='videme-tile'>-->
            <div class=\"videme-v3-tile-title\">Log in:</div>
            <form class=\"form\" id=\"user-login-form\" role=\"form\" action=\"https://api.vide.me/v2/user/login/\"
                  method=\"post\">
                <input type=\"hidden\" class='g-recaptcha-response' id=\"g-recaptcha-response-login\" name=\"g-recaptcha-response\"/>
                <input type=\"hidden\" name=\"action\" value=\"validate_captcha\"/>
                <input name=\"feedback\" class=\"\" id=\"feedback\" type=\"hidden\" value='https://www.vide.me'/>
                <div class=\"mb-3\">
                    <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                           placeholder=\"Your email address\"/>
                </div>
                <div class=\"mb-3\">
                    <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\"
                           placeholder=\"Password\"/>
                    <div class='videme-forgot-pass'>
                        <a class='form-text' href=\"https://api.vide.me/pas/restore/\">Forgot your password?</a>
                    </div>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Log in</button>
            </form>
            <hr />
            <div class=\"videme-v3-tile-title\">Sign Up:</div>
            <form class=\"form-inline\" role=\"form\" action=\"https://api.vide.me/v2/user/new/\" method=\"post\">
              <div class=\"mb-3\">
                <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                       placeholder=\"Your email address\"/>
                <input type=\"hidden\" class='g-recaptcha-response' id=\"g-recaptcha-response-sign-up\" name=\"g-recaptcha-response\"/>
                <input type=\"hidden\" name=\"action\" value=\"validate_captcha\"/>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Sign Up</button>
            </form>
            <hr/>
            <div class=\"videme-v3-tile-title\">Sign-in with:</div>
            <a href='https://api.vide.me/facebook/' class=\"btn btn-lg btn-social btn-facebook\">
                <i class=\"fa fa-facebook\"></i> Sign in with Facebook
            </a>
            <a href='https://api.vide.me/google/' class=\"btn btn-lg btn-social btn-google\">
                <i class=\"fa fa-google\"></i> Sign in with Google
            </a>
            <a href='https://api.vide.me/microsoft/' class=\"btn btn-lg btn-social btn-microsoft\">
                <i class=\"fa fa-windows\"></i> Sign in with Microsoft
            </a>
            <a href='https://api.vide.me/twitter/' class=\"btn btn-lg btn-social btn-twitter\">
                <i class=\"fa fa-twitter\"></i> Sign in with Twitter
            </a>
        <!--</div>-->
    </div>
</div>
";
    }

    public function htmlSignInProvider2WebV2()
    {
        return "<style>
    .btn-facebook {
        color: #fff;
        background-color: #4267b2;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-google {
        color: #fff;
        background-color: #4285f4;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-microsoft {
        color: #fff;
        background-color: #737373;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-twitter {
        color: #fff;
        background-color: #38A1F3;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-social {
        position: relative;
        padding-left: 44px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1rem;
        width: 75%;
    }

    .btn-social:hover {
        color: #eee;
    }

    .btn-social :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        padding: 7px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }
    
    .videme-forgot-pass {
        margin-bottom: -1rem;
    }
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class=\"container-fluid\">
    <div class=\"row\">
        <div class='videme-tile'>
            <div class=\"videme-tile-title\">Log in:</div>
            <form class=\"form\" id=\"user-login-form_v2\" role=\"form\" action=\"https://api.vide.me/v2/user/login_v2/\"
                  method=\"post\">
    <div class=\"g-recaptcha\" data-sitekey=\"6LcjV-AZAAAAANGTzVaTAxv3WKAQsPRuCRotd3Gy\"></div>
                <input name=\"feedback\" class=\"\" id=\"feedback\" type=\"hidden\" value='https://www.vide.me'/>
                <div class=\"form-group\">
                    <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                           placeholder=\"Your email address\"/>
                </div>
                <div class=\"form-group\">
                    <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\"
                           placeholder=\"Password\"/>
                    
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Log in</button>
            </form>
            <hr/>
            <!--<div class=\"videme-tile-title\">Sign Up:</div>
            <form class=\"form-inline\" role=\"form\" action=\"https://api.vide.me/v2/user/new_v2/\" method=\"post\">
                <div class=\"g-recaptcha\" data-sitekey=\"6LcjV-AZAAAAANGTzVaTAxv3WKAQsPRuCRotd3Gy\"></div>
                <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                       placeholder=\"Your email address\"/>
                <input type=\"hidden\" class='g-recaptcha-response' id=\"g-recaptcha-response-sign-up\" name=\"g-recaptcha-response\"/>
                <input type=\"hidden\" name=\"action\" value=\"validate_captcha\"/>
                <button type=\"submit\" class=\"btn btn-primary\">Sign Up</button>
            </form>
            <hr/>-->
            <div class=''>
            Don't have an account?<a class='' href=\"https://www.vide.me/web/new_user_v2/\">&#160;Sign Up</a>
            </div>
            <div class=''>
            <a class='' href=\"https://api.vide.me/pas/restore/\">Forgot your password?</a>
            </div>
            <hr/>
            <div class=\"videme-tile-title\">Sign-in with:</div>
            <a href='https://api.vide.me/facebook/' class=\"btn btn-lg btn-social btn-facebook\">
                <i class=\"fa fa-facebook\"></i> Sign in with Facebook
            </a>
            <a href='https://api.vide.me/google/' class=\"btn btn-lg btn-social btn-google\">
                <i class=\"fa fa-google\"></i> Sign in with Google
            </a>
            <a href='https://api.vide.me/microsoft/' class=\"btn btn-lg btn-social btn-microsoft\">
                <i class=\"fa fa-windows\"></i> Sign in with Microsoft
            </a>
            <a href='https://api.vide.me/twitter/' class=\"btn btn-lg btn-social btn-twitter\">
                <i class=\"fa fa-twitter\"></i> Sign in with Twitter
            </a>
        </div>
    </div>
</div>
";
    }

    public function htmlNewUserProviderWebV2()
    {
        return "<style>
    .btn-facebook {
        color: #fff;
        background-color: #4267b2;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-google {
        color: #fff;
        background-color: #4285f4;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-microsoft {
        color: #fff;
        background-color: #737373;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-twitter {
        color: #fff;
        background-color: #38A1F3;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-social {
        position: relative;
        padding-left: 44px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1rem;
        width: 75%;
    }

    .btn-social:hover {
        color: #eee;
    }

    .btn-social :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        padding: 7px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }
    
    .videme-forgot-pass {
        margin-bottom: -1rem;
    }
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class=\"container-fluid\">
    <div class=\"row\">
        <!--<div class='videme-tile'>-->
            <div class=\"videme-v3-tile-title\">Sign Up:</div>
            <form class=\"form-inline\" role=\"form\" action=\"https://api.vide.me/v2/user/new_v2/\" method=\"post\">
                <div class=\"g-recaptcha\" data-sitekey=\"6LcjV-AZAAAAANGTzVaTAxv3WKAQsPRuCRotd3Gy\"></div>
                <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                       placeholder=\"Your email address\"/>
                <!--<input type=\"hidden\" name=\"action\" value=\"validate_captcha\"/>-->
                <button type=\"submit\" class=\"btn btn-primary\">Sign Up</button>
            </form>
            <hr/>
            <div class=\"videme-v3-tile-title\">Sign-in with:</div>
            <a href='https://api.vide.me/facebook/' class=\"btn btn-lg btn-social btn-facebook\">
                <i class=\"fa fa-facebook\"></i> Sign in with Facebook
            </a>
            <a href='https://api.vide.me/google/' class=\"btn btn-lg btn-social btn-google\">
                <i class=\"fa fa-google\"></i> Sign in with Google
            </a>
            <a href='https://api.vide.me/microsoft/' class=\"btn btn-lg btn-social btn-microsoft\">
                <i class=\"fa fa-windows\"></i> Sign in with Microsoft
            </a>
            <a href='https://api.vide.me/twitter/' class=\"btn btn-lg btn-social btn-twitter\">
                <i class=\"fa fa-twitter\"></i> Sign in with Twitter
            </a>
        <!--</div>-->
    </div>
</div>
";
    }

    public function htmlSignInProviderModal()
    {
        return "<style>
    .btn-facebook {
        color: #fff;
        background-color: #4267b2;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-google {
        color: #fff;
        background-color: #4285f4;
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-social {
        position: relative;
        padding-left: 44px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1rem;
        width: 75%;
    }

    .btn-social:hover {
        color: #eee;
    }

    .btn-social :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        padding: 7px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }
    
    .videme-forgot-pass {
        margin-bottom: -1rem;
    }
</style>
<div class=\"container-fluid\">
    <div class=\"row\">
        <div class='videme-tile'>
            <div class=\"videme-tile-title\">Log in:</div>
            <form class=\"form\" id=\"user-login-form-modal\" role=\"form\" action=\"https://api.vide.me/v2/user/login/\"
                  method=\"post\">
                <input name=\"feedback\" class=\"\" id=\"feedback\" type=\"hidden\" value='https://www.vide.me'/>
                <div class=\"form-group\">
                    <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                           placeholder=\"Your email address\"/>
                </div>
                <div class=\"form-group\">
                    <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\"
                           placeholder=\"Password\"/>
                    <div class='videme-forgot-pass'>
                        <a class='form-text' href=\"https://api.vide.me/pas/restore/\">Forgot your password?</a>
                    </div>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Log in</button>
            </form>
            <hr/>
            <div class=\"videme-tile-title\">Sign Up:</div>
            <form class=\"form-inline\" role=\"form\" action=\"https://api.vide.me/v2/user/new/\" method=\"post\">
                <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                       placeholder=\"Your email address\"/>
                <button type=\"submit\" class=\"btn btn-primary\">Sign Up</button>
            </form>
            <hr/>
            <div class=\"videme-tile-title\">Sign-in with:</div>
            <a href='https://api.vide.me/facebook/' class=\"btn btn-lg btn-social btn-facebook\">
                <i class=\"fa fa-facebook\"></i> Sign in with Facebook
            </a>
            <a href='https://api.vide.me/google/' class=\"btn btn-lg btn-social btn-google\">
                <i class=\"fa fa-google\"></i> Sign in with Google
            </a>
        </div>
    </div>
</div>
";
    }

    public function htmlRestorePassword()
    {
        return "
<div class=\"container-fluid\">
    <div class=\"row\">
        <!--<div class='videme-tile'>-->
            <div class=\"videme-v3-tile-title\">Set new password</div>
            <form id=\"user-restore-form\" role=\"form\" action=\"https://api.vide.me/v2/user/restore/\"
                  method=\"post\">
            <div class=\"mb-3\">
                <input name=\"userinvite\" value=\"" . $_GET['userinvite'] . "\" type=\"hidden\" />
                <input class=\"form-control\" type=\"password\" id=\"password\" placeholder=\"Password\" name=\"password\" />
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">
                Set password
            </button>
            </form>
        <!--</div>-->
    </div>
</div>
";
    }

    public function htmlRestore()
    {
        return "
<script src=\"https://www.google.com/recaptcha/api.js?render=6LfkLtQZAAAAAGTz14hnNraCaaO3N4kXnQCDrTmt\"></script>
<script>
    grecaptcha.ready(function() {
        // do request for recaptcha token
        // response is promise with passed token
        grecaptcha.execute('6LfkLtQZAAAAAGTz14hnNraCaaO3N4kXnQCDrTmt', {action:'validate_captcha'})
            .then(function(token) {
            // add token value to form
            //document.getElementById('g-recaptcha-response').value = token;
            $('.g-recaptcha-response').val(token);
        });
    });
</script>
<div class=\"container-fluid\">
    <div class=\"row\">
        <!--<div class='videme-tile'>-->
            <div class=\"videme-v3-tile-title\">Restore password enter email</div>
            <form class=\"form-inline\" id=\"user-restore-form\" role=\"form\" action=\"https://api.vide.me/v2/user/restore/\"
                  method=\"post\">
                <div class=\"mb-3\">
                    <input type=\"hidden\" class='g-recaptcha-response' id=\"g-recaptcha-response-restore\" name=\"g-recaptcha-response\"/>
                    <input type=\"hidden\" name=\"action\" value=\"validate_captcha\"/>
                    <input type=\"email\" name=\"username\" class=\"form-control\" id=\"username\"
                               placeholder=\"Your email address\"/>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Restore password</button>
            </form>
        <!--</div>-->
    </div>
</div>
";
    }

    public function htmlNotification()
    {
        return "
        <div id=\"process_notification\" class=\"alert alert-info flyover flyover-bottom\">
    <h3>Do</h3>
    <p>in process …</p>
</div>
<div id=\"error_notification\" class=\"alert alert-danger flyover flyover-bottom\">
    <h3>Error</h3>
    <p>Something bad happened.  You should try to fix …</p>
</div>
<div id=\"success_notification\" class=\"alert alert-info flyover flyover-bottom\">
    <h3>Success</h3>
    <p>The action is completed. </p>
</div>
        ";
    }

    public function htmlNavPas()
    {
        return "
<div class='bg-white my-2 px-2 py-2'>
    <a class=\"nav-link\" href=\"https://www.vide.me\">
        <i class=\"fa fa-arrow-left fa-lg videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    </a>
                        <div class='h5'>My options</div>
                    <ul class=\"nav flex-column\">
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link active\" href=\"https://www.vide.me/web/my_info/\">
                            <i class=\"fa fa-address-card-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Info
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_spring/\">
                            <i class=\"fa fa-link videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Spring
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://api.vide.me/web/my_pas/\">
                            <i class=\"fa fa-key videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Password
                            </a>
                        </li>
                        <!--<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_contact/\">Contacts</a>
                        </li>-->
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_albums/\">
                            <i class=\"fa fa-list videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Albums
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://api.vide.me/web/essence/\">
                            <i class=\"fa fa-briefcase videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Essence
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_service/\">
                            <i class=\"fa fa-magic videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Service
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_talents/\">
                            <i class=\"fa fa-microphone videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Talents
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_map/\">
                            <i class=\"fa fa-map-marker videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Map
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/settings/\">
                            <i class=\"fa fa-cogs videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Settings
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://www.vide.me/web/subscriptions/\">
                            <i class=\"fa fa-envelope-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Subscriptions
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://api.vide.me/web/profile_state/\">
                            <i class=\"fa fa-exclamation-circle videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Profile state
                            </a>
                        </li>
                        <li class=\"nav-item h5\">
                            <a class=\"nav-link\" href=\"https://api.vide.me/v2/user/exit/\">
                            <i class=\"fa fa-sign-out videme-nav-v3-icon\" aria-hidden=\"true\"></i>
                            Log out
                            </a>
                        </li>
                    </ul>
                 </div>";
    }

    public function htmlNavPasMobile()
    {
        return "
<div class=\"btn-group d-block d-md-none\" role=\"group\" aria-label=\"Options user\">
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_info/\">Info</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_spring/\">Spring</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://api.vide.me/web/my_pas/\">Password</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_albums/\">Albums</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://api.vide.me/web/essence/\">Essence</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_service/\">Service</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_talents/\">Talents</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_map/\">Map</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/settings/\">Settings</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/subscriptions/\">Subscriptions</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://api.vide.me/web/profile_state/\">Profile state</a>
    <a type=\"button\" class=\"btn btn-outline-danger\" href=\"https://api.vide.me/v2/user/exit/\">Log out</a>
<hr/>
</div>";
    }

    public function htmlNavMyMobileOld()
    {
        return "
<div class=\"btn-group d-block d-md-none\" role=\"group\" aria-label=\"Options user\">
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/posts/my/\">Posts</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_video/\">Video</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_image/\">Images</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_article/\">Article</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_event/\">Events</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/inbox/\">Inbox</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/sent/\">Sent</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/history/upload/\">History of uploads</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/history/starred/\">History of starred</a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/history/likes/\">History of likes</a>
<hr/>
</div>";
    }

    public function htmlNavMyMobile()
    {
        return "
<div class=\"btn-group d-block d-md-none\" role=\"group\" aria-label=\"Options user\">
<ul class=\"nav justify-content-center\">
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/posts/my/\">
            <i class=\"fa fa-rss videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Posts
            </a>
        </li>
        <!--<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_video/\">
            <i class=\"fa fa-video-camera videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Video
            <span class=\"badge badge-primary badge-pill videme_nav_badge_last_upload\"></span></a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_image/\">
            <i class=\"fa fa-picture-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Images
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_article/\">
            <i class=\"fa fa-file-text-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Article
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_event/\">
            <i class=\"fa fa-calendar videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Events
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link active\" href=\"https://www.vide.me/web/inbox/\">
            <i class=\"fa fa-inbox videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Inbox
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/sent/\">
            <i class=\"fa fa-envelope-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Sent
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/history/upload/\">
            <i class=\"fa fa-cloud-upload videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            History of uploads
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/history/starred/\">
            <i class=\"fa fa-star-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            History of starred
            </a>
        </li>-->
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/earned_tags/\">
            <i class=\"fa fa-tags videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            My tags
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/history/tags_confirmed/\">
            <i class=\"fa fa-check videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Confirmed tags
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/history/tagged/\">
            <i class=\"fa fa-history videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            History of tagged
            </a>
        </li>
</ul>
<hr/>
</div>
";
    }

    public function htmlNavSecondMyActivity()
    {
        return "
<ul class=\"nav justify-content-center\">
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/posts/my/\">
            <i class=\"fa fa-rss videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Posts
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_video/\">
            <i class=\"fa fa-video-camera videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Video
            <span class=\"badge badge-primary badge-pill videme_nav_badge_last_upload\"></span></a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_image/\">
            <i class=\"fa fa-picture-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Images
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_article/\">
            <i class=\"fa fa-file-text-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Article
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_event/\">
            <i class=\"fa fa-calendar videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Events
            </a>
        </li>
</ul>
";
    }

    public function htmlNavSecondMyPartners()
    {
        return "
<ul class=\"nav justify-content-center\">
        <li class=\"nav-item\">
            <a class=\"nav-link videme-nav-partners-pending\" href=\"https://api.vide.me/web/my_partners/\">
            <i class=\"fa fa-rss videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Pending partners
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link videme-nav-partners-pending-to-me\" href=\"https://api.vide.me/web/my_partners/\">
            <i class=\"fa fa-rss videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Pending to me
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link videme-nav-partners-pending-from-me\" href=\"https://api.vide.me/web/my_partners/\" id='videme-nav-partners-pending-from-me'>
            <i class=\"fa fa-video-camera videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Pending from me
            <span class=\"badge badge-primary badge-pill videme_nav_badge_last_upload\"></span></a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link videme-nav-partners-accepted\" href=\"https://api.vide.me/web/my_partners/\">
            <i class=\"fa fa-picture-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Partners
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link videme-nav-partners-declined\" href=\"https://api.vide.me/web/my_partners/\">
            <i class=\"fa fa-file-text-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Declined partners
            </a>
        </li>
</ul>
";
    }
    public function htmlNavSecondMyNetworkFriends()
    {
        return "
<ul class=\"nav justify-content-center\">
  <li class=\"nav-item\">
    <a class=\"nav-link active\" href=\"https://www.vide.me/web/my_friends/\">
    <i class=\"fa fa-users videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    Friends
    <span class=\"badge badge-secondary videme_nav_network_badge_friends\"></span>
    </a>
    </li>
  <li class=\"nav-item\">
    <a class=\"nav-link\" href=\"https://www.vide.me/web/pending_friends/\">
    <i class=\"fa fa-user-plus videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    Friend Requests
    <span class=\"badge badge-primary videme_nav_network_badge_pend_friends\"></span>
    </a>
  </li>
  <li class=\"nav-item\">
    <a class=\"nav-link\" href=\"https://www.vide.me/web/requests_friendships/\">
    <i class=\"fa fa-user-circle-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    Friendship Requests
    <span class=\"badge badge-secondary videme_nav_network_badge_req_friends\"></span>
    </a>
  </li>
  <li class=\"nav-item\">
    <a class=\"nav-link\" href=\"https://www.vide.me/web/recommended_friends/\">
    <i class=\"fa fa-user-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    Recommended friends
    </a>
  </li>
  <li class=\"nav-item\">
    <a class=\"nav-link\" href=\"https://www.vide.me/web/denial_of_friendship/\">
    <i class=\"fa fa-ban videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    Declined of friendship
    </a>
  </li>
</ul>
";
    }

    public function htmlNavSecondMyNetworkFollowers()
    {
        return "
<ul class=\"nav justify-content-center\">
  <li class=\"nav-item\">
    <a class=\"nav-link active\" href=\"https://www.vide.me/web/my_followers/\">
    <i class=\"fa fa-sign-language videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    My followers
    <span class=\"badge badge-secondary videme_nav_network_badge_followers\"></span>
    </a>
    </li>
  <li class=\"nav-item\">
    <a class=\"nav-link\" href=\"https://www.vide.me/web/im_following/\">
    <i class=\"fa fa-arrow-right videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    I'm following
    <span class=\"badge badge-secondary videme_nav_network_badge_following\"></span>
    </a>
  </li>
  <li class=\"nav-item\">
    <a class=\"nav-link\" href=\"https://www.vide.me/web/recommended_connection/\">
    <i class=\"fa fa-plug videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    Recommended connection
    </a>
  </li>
</ul>
";
    }

    public function htmlNavNetworkMobile10082020()
    {
        return "
<div class=\"btn-group d-block d-md-none\" role=\"group\" aria-label=\"Options user\">
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_friends/\">
        Friends
        <span class=\"badge badge-secondary videme_nav_network_badge_friends\"></span>
    </a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/pending_friends/\">
        Friend Requests
        <span class=\"badge badge-primary videme_nav_network_badge_pend_friends\"></span>
    </a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/requests_friendships/\">
        Friendship Requests
        <span class=\"badge badge-secondary videme_nav_network_badge_req_friends\"></span>
    </a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/my_followers/\">
        My followers
        <span class=\"badge badge-secondary videme_nav_network_badge_followers\"></span>
    </a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/im_following/\">
        I'm following
        <span class=\"badge badge-secondary videme_nav_network_badge_following\"></span>
    </a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/recommended_friends/\">
        Recommended friends
    </a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/recommended_connection/\">
        Recommended connection
    </a>
    <a type=\"button\" class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/denial_of_friendship/\">
        Denial of friendship
    </a>
    <hr/>
</div>";
    }

    public function htmlNavNetworkMobile()
    {
        return "
<div class=\"btn-group d-block d-md-none\" role=\"group\" aria-label=\"Options user\">
    <ul class=\"nav justify-content-center\">
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_friends/\">
            <i class=\"fa fa-users videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Friends
            <span class=\"badge badge-secondary videme_nav_network_badge_friends\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/pending_friends/\">
            <i class=\"fa fa-user-plus videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Friend Requests
            <span class=\"badge badge-primary videme_nav_network_badge_pend_friends\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/requests_friendships/\">
            <i class=\"fa fa-user-circle-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Friendship Requests
            <span class=\"badge badge-secondary videme_nav_network_badge_req_friends\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_followers/\">
            <i class=\"fa fa-sign-language videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            My followers
            <span class=\"badge badge-secondary videme_nav_network_badge_followers\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/im_following/\">
            <i class=\"fa fa-arrow-right videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            I'm following
            <span class=\"badge badge-secondary videme_nav_network_badge_following\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/recommended_friends/\">
            <i class=\"fa fa-user-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Recommended friends
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/recommended_connection/\">
            <i class=\"fa fa-plug videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Recommended connection
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/denial_of_friendship/\">
            <i class=\"fa fa-ban videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Denial of friendship
            </a>
        </li>
    </ul>
</div>";
    }

    public function htmlNavMessageOLD23082020()
    {
        return "
<div class='bg-white2 my-2x px-2x py-2'>
    <a class=\"nav-link\" href=\"https://www.vide.me\">
        <i class=\"fa fa-arrow-left fa-lg videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    </a>
    <div class='h5'>My activity</div>
    <ul class=\"nav flex-column\">
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/posts/my/\">
            <i class=\"fa fa-rss videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-rss fa-stack-1x\"></i>
            </span>-->
            Posts
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_video/\">
            <i class=\"fa fa-video-camera videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-video-camera fa-stack-1x\"></i>
            </span>-->
            Video
            <span class=\"badge badge-primary badge-pill videme_nav_badge_last_upload\"></span></a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_image/\">
            <i class=\"fa fa-picture-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-picture-o fa-stack-1x\"></i>
            </span>-->
            Images
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_article/\">
            <i class=\"fa fa-file-text-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-file-text-o fa-stack-1x\"></i>
            </span>-->
            Article
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_event/\">
            <i class=\"fa fa-calendar videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-calendar fa-stack-1x\"></i>
            </span>-->
            Events
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link active\" href=\"https://www.vide.me/web/inbox/\">
            <i class=\"fa fa-inbox videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-inbox fa-stack-1x\"></i>
            </span>-->
            Inbox
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/sent/\">
            <i class=\"fa fa-envelope-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-envelope-o fa-stack-1x\"></i>
            </span>-->
            Sent
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/history/upload/\">
            <i class=\"fa fa-cloud-upload videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-cloud-upload fa-stack-1x\"></i>
            </span>-->
            History of uploads
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/history/starred/\">
            <i class=\"fa fa-star-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-star-o fa-stack-1x\"></i>
            </span>-->
            History of starred
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/earned_tags/\">
            <i class=\"fa fa-tags videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-tags fa-stack-1x\"></i>
            </span>-->
            My tags
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/history/tags_confirmed/\">
            <i class=\"fa fa-check videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-check fa-stack-1x\"></i>
            </span>-->
            Confirmed tags
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/history/tagged/\">
            <i class=\"fa fa-history videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-history fa-stack-1x\"></i>
            </span>-->
            History of tagged
            </a>
        </li>
        <!--<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/history/likes/\">History of likes</a>
        </li>-->
    </ul>
</div>";
    }

    public function htmlNavMessage()
    {
        return "
<div class='bg-white2 my-2x px-2x py-2'>
    <a class=\"nav-link\" href=\"https://www.vide.me\">
        <i class=\"fa fa-arrow-left fa-lg videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    </a>
    <div class='h5'>My activity</div>
    <ul class=\"nav flex-column\">
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/posts/my/\">
            <i class=\"fa fa-rss videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-rss fa-stack-1x\"></i>
            </span>-->
            My media
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/my_partners/\">
            <i class=\"fa fa-creative-commons videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-rss fa-stack-1x\"></i>
            </span>-->
            Partnership
            </a>
        </li>
        <!--<li class=\"nav-item h5\">
            <a class=\"nav-link active\" href=\"https://www.vide.me/web/inbox/\">
            <i class=\"fa fa-inbox videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-inbox fa-stack-1x\"></i>
            </span>
            Inbox
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/sent/\">
            <i class=\"fa fa-envelope-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-envelope-o fa-stack-1x\"></i>
            </span>
            Sent
            </a>
        </li>-->
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/history/upload/\">
            <i class=\"fa fa-cloud-upload videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-cloud-upload fa-stack-1x\"></i>
            </span>-->
            History of uploads
            </a>
        </li>
    </ul>
</div>";
    }

    public function htmlNavMyTags()
    {
        return "
<div class='bg-white2 my-2x px-2x py-2'>
    <a class=\"nav-link\" href=\"https://www.vide.me\">
        <i class=\"fa fa-arrow-left fa-lg videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    </a>
    <div class='h5'>My tags</div>
    <ul class=\"nav flex-column\">
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/earned_tags/\">
            <i class=\"fa fa-tags videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-tags fa-stack-1x\"></i>
            </span>-->
            My tags
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/history/tags_confirmed/\">
            <i class=\"fa fa-check videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-check fa-stack-1x\"></i>
            </span>-->
            Confirmed tags
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://api.vide.me/web/history/tagged/\">
            <i class=\"fa fa-history videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-history fa-stack-1x\"></i>
            </span>-->
            History of tagged
            </a>
        </li>
    </ul>
</div>";
    }

    public function htmlNavNetworkOLD23082020()
    {
        return "
<div class='bg-white my-2 px-2 py-2'>
    <a class=\"nav-link\" href=\"https://www.vide.me\">
        <i class=\"fa fa-arrow-left fa-lg videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    </a>
    <div class='h5'>My network</div>
    <ul class=\"nav flex-column\">
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_friends/\">
            <i class=\"fa fa-users videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Friends
            <span class=\"badge badge-secondary videme_nav_network_badge_friends\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/pending_friends/\">
            <i class=\"fa fa-user-plus videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Friend Requests
            <span class=\"badge badge-primary videme_nav_network_badge_pend_friends\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/requests_friendships/\">
            <i class=\"fa fa-user-circle-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Friendship Requests
            <span class=\"badge badge-secondary videme_nav_network_badge_req_friends\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_followers/\">
            <i class=\"fa fa-sign-language videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            My followers
            <span class=\"badge badge-secondary videme_nav_network_badge_followers\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/im_following/\">
            <i class=\"fa fa-arrow-right videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            I'm following
            <span class=\"badge badge-secondary videme_nav_network_badge_following\"></span>
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/recommended_friends/\">
            <i class=\"fa fa-user-o videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Recommended friends
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/recommended_connection/\">
            <i class=\"fa fa-plug videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Recommended connection
            </a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/denial_of_friendship/\">
            <i class=\"fa fa-ban videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            Denial of friendship
            </a>
        </li>
    </ul>
</div>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $.fn.myNetworkActivity({});
        });
    </script>";
    }

    public function htmlNavNetwork()
    {
        return "
<div class='bg-white my-2 px-2 py-2'>
    <a class=\"nav-link\" href=\"https://www.vide.me\">
        <i class=\"fa fa-arrow-left fa-lg videme-nav-v3-icon\" aria-hidden=\"true\"></i>
    </a>
    <div class='h5'>My network</div>
    <ul class=\"nav flex-column\">
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_friends/\">
            <i class=\"fa fa-users videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-users fa-stack-1x\"></i>
            </span>-->
            Friends
            <span class=\"badge badge-secondary videme_nav_network_badge_friends\"></span>
            </a>
        </li>
        <li class=\"nav-item h5\">
            <a class=\"nav-link\" href=\"https://www.vide.me/web/my_followers/\">
            <i class=\"fa fa-sign-language videme-nav-v3-icon\" aria-hidden=\"true\"></i>
            <!--<span class=\"fa-stack fa-lg2\">
              <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
              <i class=\"fa fa-sign-language fa-stack-1x\"></i>
            </span>-->
            Followers
            <span class=\"badge badge-secondary videme_nav_network_badge_followers\"></span>
            </a>
        </li>
    </ul>
</div>
    <script type=\"text/javascript\">
                    require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $.fn.myNetworkActivity({});
        });
        });
    </script>";
    }

    public function htmlNavChart()
    {
        return "
<div class='bg-white my-2 px-2 py-2'>
</div>
";
    }

    public function HTML_Form_Set_Password_For_Primary_User($userInfo = [])
    {
        //print_r($userInfo);
        return "
    <div id='videme-result'></div>
        <div class=\"videme-v3-tile-title\">Password</div>
            <form class=\"form-horizontal\" id=\"user-pas-form\" name=\"user-pas-form\"
                  action=\"https://api.vide.me/v2/user/update/pas/\"
                  method=\"post\">
                <input name=\"nad\" class='nad' id=\"nad\" type=\"hidden\" />
                <input type=\"hidden\" class=\"form-control\" id=\"username\" value=\"" . $userInfo['user_email'] . "\"
                               name=\"username\" />
                <!-- <span class=\"label label-success\">" . $userInfo['user_display_name'] . "</span>-->
                <div class=\"mb-3\">
                    <label class=\"form-label\" for=\"newpassword\">Set a password to get started</label>
                    <input type=\"password\" class=\"form-control\" id=\"newpassword\" placeholder=\"Password\"
                               name=\"newpassword\" />
                </div>
                <button type=\"submit\" class=\"btn btn-primary videme-round-button\" id=\"user-pas-submit\" name=\"user-pas-submit\">Save
                    <div class=\"videme-progress\"></div>
                </button>
            </form>";
    }

    public function HTML_Form_Change_Password_For_Exist_User()
    {
        global $lang, $userInfo;
        return "
    <div class='videme-v3-tile-title'>Change your password</div>
    <hr />
    <div class=\"panel panel-info\">
        <div class=\"panel-heading\">" . $userInfo['userDisplayName'] . "</div>
        <div class=\"panel-body\">
            <form class=\"form-horizontal\" id=\"user-pas-form\" name=\"user-pas-form\" role=\"form\"
                  action=\"https://api.vide.me/v2/user/update/pas/\" method=\"post\">
                <input name=\"nad\" id=\"nad\" type=\"hidden\" />
                <input id=\"username\" value=\"" . $userInfo['userEmail'] . "\" name=\"username\" type=\"hidden\" />
                <div class=\"form-group\">
                    <label class=\"control-label\" for=\"password\">Current password:</label>
                    <div class=\"\">
                        <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Current password\"
                               name=\"password\" />
                    </div>
                </div>
                <div class=\"form-group has-error\">
                    <label class=\"control-label\" for=\"newpassword\">Change password:</label>
                    <div class=\"\">
                        <input type=\"password\" class=\"form-control\" id=\"newpassword\" placeholder=\"New password\"
                               name=\"newpassword\" />
                    </div>
                </div>
                <button type=\"submit\" class=\"btn btn-primary videme-round-button\" id=\"user-pas-submit\" name=\"user-pas-submit\">
                    Save
                    <div class=\"videme-progress\"></div>
                </button>
            </form>
        </div>
    </div>";
    }

    public function HTML_Form_Set_Password_For_Confirm_Email($UserEmail)
    {
        //global $lang, $UserEmail;
        return "
<script src=\"https://www.google.com/recaptcha/api.js?render=6LfkLtQZAAAAAGTz14hnNraCaaO3N4kXnQCDrTmt\"></script>
<script>
    grecaptcha.ready(function() {
        // do request for recaptcha token
        // response is promise with passed token
        grecaptcha.execute('6LfkLtQZAAAAAGTz14hnNraCaaO3N4kXnQCDrTmt', {action:'validate_captcha'})
            .then(function(token) {
            // add token value to form
            //document.getElementById('g-recaptcha-response').value = token;
            $('.g-recaptcha-response').val(token);
        });
    });
</script>
<div class=\"\">
  <div class=\"videme-v3-tile-title\">
    Set password for email:
  </div>
  <div class=\"\">
    <form id=\"\" name=\"\" role=\"form\" action=\"https://api.vide.me/v2/user/new/\" method=\"post\">

      <div class=\"form-group has-error\">
        <h3><span class=\"label label-success\">$UserEmail</span></h3>
        <input type=\"hidden\" class='g-recaptcha-response' id=\"g-recaptcha-response-restore\" name=\"g-recaptcha-response\"/>
        <input type=\"hidden\" name=\"action\" value=\"validate_captcha\"/>
        <input name=\"userinvite\" value=\"" . $_GET['userinvite'] . "\" type=\"hidden\" />
        <label for=\"password\">Set password:</label>
        <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\" name=\"password\" />
      </div>

      <button type=\"submit\" class=\"btn btn-primary videme-round-button\">
        Registration
        <div class=\"videme-progress\"></div>
      </button>
    </form>
  </div>
</div>
";
    }

    public function HTML_Form_Sing_up()
    {
        global $lang;
        return "
<div class=\"col-md-4\">
<b>" . $lang['New_to_Videme'] . "</b>" . $lang['Sign_up'] . "
    <form class=\"form-text-left\" id=\"user_new_form\" name=\"user_new_form\" action=\"https://api.vide.me/v2/user/new/\" method=\"post\">
      <input type=\"text\" name=\"username\" placeholder=\"" . $lang['Email'] . "\" />
<br />
      <button class=\"btn btn-primary\" id=\"user_new_submit\" name=\"user_new_submit\" type=\"submit\">
	" . $lang['Registration'] . "
	    <div class=\"videme-progress\"></div>
      </button>
    </form>
</div>
";
    }

    public function HTML_Form_Expired_Invite()
    {
        global $lang;
        return "
<div class='videme-v3-tile-title'>
Your invitation has expired. Please login again.
</div>
<div class='bg-white my-2 px-2 py-2'>
" . $this->htmlSignInProvider2Web() . "
</div>
";
    }

    public function HTML_Form_Update_User_Info($userInfo) // 31072022
    {
        global $lang /*$userInfo, $userInfo2*/
               ;
        //echo 'eeeeeeee';
        //print_r($userInfo2);
        return "
<div class=\"\">
    <div class=\"\">
        <div class=\"videme-v3-tile-title\">Information about " . $this->welcome->safetyTagsSlashesTrim4096($userInfo['user_display_name']) .
            "</div>
        <hr />
        <div class='pas_info_user_id_face' id='pas_info_user_id_face'>
        <div class=''>
        <div class=''>
                    <div class='videme-v3-tile-title'>Upload new picture</div>

            <img class='img-thumbnail rounded-circle pas_info_user_id_face_img' src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png' style=\"max-width: 50%;\" />
            </div>
            <!--<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#modal-cropper\" id='upload_user_picture'>
  Upload new picture
            </button>-->
        <div class=''>
            <!--<h5>Upload new picture</h5>-->
                        <!--<input accept=\"image/*\" class=\"videme-file-input-pas\" id=\"upload_user_picture\"
                   name=\"croppedImage\"
                   type=\"file\"/>-->
                   
    <div class=\"input-group col-6\">
        <div class=\"custom-file2\">
            <input accept=\"image/*\" type=\"file\"
                   class=\"form-control\" id=\"upload_user_picture\"
                   name=\"croppedImage\" aria-describedby=\"inputGroupFileAddon032\"/>
            <label class=\"custom-file-label2\" for=\"upload_user_picture2\"></label>
        </div>
    </div>
                </div>

    </div>
        </div>
        <hr />

        <div class='' id=''>
                    <div class='videme-v3-tile-title'>Upload new cover</div>

            <img class='img-thumbnail pas_info_user_cover' src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png' style=\"max-width: 50%;\" />
            <!--<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#modal-cropper\" id='upload_user_cover'>
  Upload new cover
            </button>-->
            <!--<h5>Upload new cover</h5>-->
                                    <!--<input accept=\"image/*\" class=\"videme-file-input-pas\" id=\"upload_user_cover\"
                   name=\"croppedImage\"
                   type=\"file\"/>-->
                       <div class=\"input-group col-6\">
        <div class=\"custom-file2\">
            <input accept=\"image/*\" type=\"file\"
                   class=\"form-control\" id=\"upload_user_cover\"
                   name=\"croppedImage\" aria-describedby=\"inputGroupFileAddon032\"/>
            <label class=\"custom-file-label2\" for=\"upload_user_cover2\"></label>
        </div>
    </div>
        </div>
        <!--<hr />

        <div class='' id=''>
                    <div class='videme-tile-title'>Upload new cover for your Spring</div>

            <img class='img-thumbnail pas_info_user_cover_top' src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png' style=\"max-width: 50%;\"/>-->
            <!--<br />-->
            <!--<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#modal-cropper\" id='upload_user_cover_top'>
  Upload new cover for your Spring
            </button>-->
            <!--<h5>Upload new cover for your Spring</h5>-->
                                                <!--<input accept=\"image/*\" class=\"videme-file-input-pas\" id=\"upload_user_cover_top\"
                   name=\"croppedImage\"
                   type=\"file\"/>-->
                                          <!--<div class=\"input-group col-6\">
                           <div class=\"custom-file\">
            <input accept=\"image/*\" type=\"file\"
                   class=\"custom-file-input\" id=\"upload_user_cover_top\"
                   name=\"croppedImage\" aria-describedby=\"inputGroupFileAddon03\"/>
            <label class=\"custom-file-label\" for=\"upload_user_cover_top\">Choose file</label>
        </div>
        </div>
        </div>-->
        <hr />

        <div class=\"panel-body\">
            <form class=\"form-vertical\" id=\"user-info-form\" name=\"user-info-form\" role=\"form\">
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"user_display_name\">Display name:</label>
                    <div class=\"\">
                        <input type=\"text\" class=\"form-control\" id=\"user_display_name\" placeholder=\"Display name\" name=\"user_display_name\" value=\"" ./*  $this->welcome->safetyTagsSlashesTrim4096($userInfo['user_display_name']) .*/
            "\"/>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"user_first_name\">First name:</label>
                    <div class=\"\">
                        <input type=\"text\" class=\"form-control\" id=\"user_first_name\" placeholder=\"First name\" name=\"user_first_name\" value=\"" ./*  $this->welcome->safetyTagsSlashesTrim4096($userInfo['user_first_name']) .*/
            "\"/>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"user_last_name\">Last name:</label>
                    <div class=\"\">
                        <input type=\"text\" class=\"form-control\" id=\"user_last_name\" placeholder=\"Last name\" name=\"user_last_name\" value=\"" ./*  $this->welcome->safetyTagsSlashesTrim4096($userInfo['user_last_name']) .*/
            "\"/>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"user_link\">Link: </label>
                    <div class=\"\">
                        <input type=\"text\" class=\"form-control\" id=\"user_link\" placeholder=\"Link\" name=\"user_link\" value=\"" . /*$userInfo['user_link'] .*/
            "\"/>
                        <small id=\"user_link\" class=\"text-muted\">
                        Use http:// or https://
                        </small>
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" >Gender:</label>
                    <div class=\"\">
                        <div class=\"radio\">
                            <label>
                                <input type=\"radio\" name=\"user_gender\" id=\"user_gender\" value=\"male\" checked=\"checked\"/>
                                Male
                            </label>
                        </div>
                        <div class=\"radio\">
                            <label>
                                <input type=\"radio\" name=\"user_gender\" id=\"user_gender\" value=\"female\"/>
                                Female
                            </label>
                        </div>
                    </div>
                </div>

                <!--<div class=\"form-group\">
                    <label class=\"col-md-3 control-label\" for=\"user_locale\">Locale:</label>
                    <div class=\"col-md-7\">
                        <input type=\"text\" class=\"form-control\" id=\"user_locale\" placeholder=\"Locale\" name=\"user_locale\" value=\"" . /*$userInfo['user_locale'] .*/
            "\"/>
                    </div>
                </div>-->
                <!--<div class=\"form-group\">
                    <label class=\"col-md-3 control-label\" for=\"user_picture\">Picture:</label>
                    <div class=\"col-md-7\">
                        <input type=\"text\" class=\"form-control\" id=\"user_picture\" placeholder=\"Picture\" name=\"user_picture\" value=\"" . /*$this->welcome->safetyTagsSlashesTrim4096($userInfo['user_picture']) .*/
            "\"/>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-md-3 control-label\" for=\"user_cover\">Cover</label>
                    <div class=\"col-md-7\">
                        <input type=\"text\" class=\"form-control\" id=\"user_cover\" placeholder=\"\"
                               name=\"user_cover\" value=\"" . /*$userInfo['user_cover'] .*/
            "\"/>
                    </div>
                </div>-->
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"country\">Country</label>
                    <div class=\"\">
                        <input type=\"text\" class=\"form-control\" id=\"country\" placeholder=\"\"
                               name=\"country\" value=\"" .  /*$this->welcome->safetyTagsSlashesTrim4096($userInfo['country']) .*/
            "\"/>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"city\">City</label>
                    <div class=\"\">
                        <input type=\"text\" class=\"form-control\" id=\"city\" placeholder=\"\"
                               name=\"city\" value=\"" . /* $this->welcome->safetyTagsSlashesTrim4096($userInfo['city']) .*/
            "\"/>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"bio\">Bio</label>
                    <div class=\"\">
                        <textarea class=\"form-control\" id=\"bio\" placeholder=\"\"
                               name=\"bio\" value=\"\">" . /*$this->welcome->safetyTagsSlashesTrim4096($userInfo['bio']) .*/
            "</textarea>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"videme-v3-tile-title\" for=\"bio\">Extended info</label>
                    <div class=\"\">
                        <textarea class=\"form-control\" id=\"ext_info\" placeholder=\"\"
                               name=\"ext_info\" value=\"\">" . $this->welcome->safetyTagsSlashesTrim4096($userInfo['ext_info']) .
            "</textarea>
                    </div>
                </div>
                <!--<div class=\"form-group\">
                    <label class=\"videme-tile-title\" for=\"slogan\">Slogan</label>
                    <div class=\"\">
                        <input type=\"text\" class=\"form-control\" id=\"slogan\" placeholder=\"\"
                               name=\"slogan\" value=\"" . /* $this->welcome->safetyTagsSlashesTrim4096($userInfo['city']) .*/
            "\"/>
                    </div>
                </div>-->
                <button type=\"submit\" class=\"btn btn-primary videme-round-button\" id=\"user_info_submit\" name=\"user_info_submit\">
                    Save
                    <div class=\"videme-progress\"></div>
                </button>
            </form>
            <div id='videme-result'></div>
            

            <script type=\"text/javascript\">
                            require(['jquery', 'videme_jq'], function( $ ) {
                $(document).ready(function () {
                                    pas_info();
                });
                });
            </script>
        </div>
    </div>
    

            <style>


.page {
	margin: 1em auto;
	max-width: 768px;
	display: flex;
	align-items: flex-start;
	flex-wrap: wrap;
	height: 100%;
}

.box {
	padding: 0.5em;
	width: 100%;
	/*margin:0.5em;*/
}

.box-2 {
	/*padding: 0.5em;
	width: calc(100%/2 - 1em);*/

}
/*
.options label,
.options input{
	width:4em;
	padding:0.5em 1em;
}
.btn{
	background:white;
	color:black;
	border:1px solid black;
	padding: 0.5em 1em;
	text-decoration:none;
	margin:0.8em 0.3em;
	display:inline-block;
	cursor:pointer;
}

.hide {
	display: none;
}*/

img {
	max-width: 100%;
}

/* ======     ====          ===== */

/*.img-result {
  border: 2px solid;
  width: 50px;
  height: 50px;
}*/

/*.img-result img {
  max-height: 100%;
  max-width: 100%;
}

.page {
  display: flex;
  align-items: flex-start;
  flex-wrap: wrap;
  height: 100%;
}

.result {
  display: flex;
}

.box {
  padding: 0.5em;
  width: 100%;
  margin: 0.5em;
}

.box-2 {
  padding: 0.5em;
  width: calc(100%/2 - 1em);
}*/

/*.img-w {
  display: none;
}*/

img {
  max-width: 100%; /* This rule is very important, please do not ignore this! */
}
            </style>
    
</div>
";
    }

    public function HTML_Form_Change_Spring($userInfo) // 28072022
    {
        global $lang;
        return "
<div class='videme-v3-tile-title'>Your current Vide.me Spring:</div>
<h4>
<a target='_blank' href='http://vide.me/" . $userInfo['spring'] . "' class=\"badge badge-primary\">http://vide.me/" . $userInfo['spring'] . "</a>
</h4>
<hr />
<div class='videme-v3-tile-title'>Change User Vide.me Spring</div>

<form id=\"user-spring-form\" name=\"user-spring-form\" action=\"https://api.vide.me/v2/user/update/spring/\" method=\"post\">
  <div class=\"form-group\">

        <input name=\"nad\" id=\"nad_for_pas_spring\" type=\"hidden\" />
          <!--<input id=\"username\" value=\"" . $userInfo['user_email'] . "\" name=\"username\" type=\"hidden\" />-->
  <!--<label for=\"basic-url\">Your User URL</label>-->
<div class=\"input-group mb-3\">
  <div class=\"input-group-prepend\">
    <span class=\"input-group-text\" id=\"basic-addon3\">https://vide.me/</span>
  </div>
  <input type=\"text\" class=\"form-control\" id=\"videme_pas_spring\" value=\"" . $userInfo['spring'] . "\" name=\"spring\" aria-describedby=\"basic-addon3\" minlength='5' maxlength='24'/>
        <!--<span class=\"pull-right label label-default limit\"></span>-->
</div>
          <small class=\"text-right form-text text-muted limit\" id='videme_pas_spring_counter'></small>

    <label for=\"exampleInputPassword1\">Current password</label>
    <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\" name='password' />
  </div>

  <button type=\"submit\" class=\"btn btn-primary videme-round-button\">Save</button>
  	    <div class=\"videme-progress\"></div>
  	      <div id='videme-result'></div>
</form>
        <script type='text/javascript'>
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
              $('#nad_for_pas_spring').val($.cookie('vide_nad'));
              //$('textarea, ._textfield').countChar();
              $('#videme_pas_spring').countChar();
            });
          });
        </script>
";
    }

    public function HTML_Show_Contact() // remove 26072022
    {
        return "
        <div id=\"videme-result\"></div>
        <button type='button'
        class='btn btn-primary contact-create-toggle' data-bs-toggle='modal'
        data-bs-target='#modal-create-contact'>
        <span class='glyphicon glyphicon-plus'></span> Create new contact
        </button>
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $('#videme-tile').showRelation({
                    //limit: 6
                });
            });
        </script>
        <div id=\"videme-tile\">
        </div>";
    }

    public function htmlImFollowing() // 26072022
    {
        return "
        <div class='videme-v3-tile-title'>I'm following</div>
        <script type=\"text/javascript\">
            require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-tile').showImFollowing({
                    //limit: 6
                });
            });
            });
        </script>
        <div id=\"videme-tile\">
        </div>";
    }

    public function htmlMyFollowers() // 26072022
    {
        return "
        <div class='videme-v3-tile-title'>My followers</div>
        <script type=\"text/javascript\">
            require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-tile').showMyFollowers({
                    //limit: 6
                });
            });
            });
        </script>
        <div id=\"videme-tile\">
        </div>";
    }

    public function htmlFriendsMy() // 26072022
    {
        return "
        <div class='videme-v3-tile-title'>My friends</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-my-friends-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
                        require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-my-friends-tile').showFriendsMy({
                    //limit: 6
                });
            });
            });
        </script>";
    }

    public function htmlDenialOfFriendship() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>Declined friends</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-my-friends-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
                        require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-my-friends-tile').showDenialOfFriendship({
                    //limit: 6
                });
            });
            });
        </script>";
    }

    public function htmlPendingFriends() // 27072022
    {
        return "
<div class='videme-friends-my-pending-request'>
        <div class='videme-v3-tile-title'>Pending request for me</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-friends-my-pending-request-tile\">
            </div>
        </div>
    </div>
    <hr />
</div>
        <script type=\"text/javascript\">
                        require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-friends-my-pending-request-tile').showFriendsMyPendingRequest({
                    //limit: 6
                });
            });
            });
        </script>";
    }

    public function htmlRequestFriends() // 27072022
    {
        return "
<div class='videme-friends-my-pending-request'>
        <div class='videme-v3-tile-title'>Requests friendships</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-requests-friends-tile\">
            </div>
        </div>
    </div>
    <hr />
</div>
        <script type=\"text/javascript\">
                        require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-requests-friends-tile').showRequestsFriendships({
                    //limit: 6
                });
            });
            });
        </script>";
    }

    public function htmlChartItems()
    {
        return "
        <div class='videme-v3-tile-title'>Charts for media</div>
        <div class='videme-tile' id='videme-chart-items-list'></div>
        <script type=\"text/javascript\">
            require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-chart-items-list').showChartItems({
                    //limit: 6
                });
            });
            });
        </script>";
    }
    public function htmlChartShareItem() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>Chart</div>
    <div class='container-fluid'>
        <div class='row'>
            <div class='videme-tile'>
                <div class='videme-media-info'></div>
                <div id='videme-item-chart-canvas-share-place'></div>
            </div>
        </div>
    </div>
        <script type='text/javascript'>
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                var item = getParameterByName('item');
                var d_start = getParameterByName('d_start');
                var d_stop = getParameterByName('d_stop');
                var w_start = getParameterByName('w_start');
                var w_stop = getParameterByName('w_stop');
                var m_start = getParameterByName('m_start');
                var m_stop = getParameterByName('m_stop');
                if (d_start == null ) ;
                
                //$('.videme-media-info').showItemCard({'item_id': item});
                $('.videme-media-info').showItemCardChart({'item_id': item});
                $('#videme-item-chart-canvas-share-place').html(chartButtonComposition(item));
                
                $('#videme-chart-stump_' + item).attr('toggled', 'false');
                if (!d_start) {
                    if (!d_stop) {
                        if (!w_start) {
                            if (!w_stop) {
                                if (!m_start) {
                                    if (!m_stop) {
                                        m_stop = '1';
                                    }
                                }
                            }
                        }
                    }
                } 

                if (w_stop) {
                    if (w_stop == '2') {
                        $('#videme-chart-button-1st2weeks_' + item).removeClass('text-bg-secondary').addClass('text-bg-primary');
                        $('#videme-chart-stump_' + item).attr('time_shift_type', 'w_stop').attr('time_shift_val', '2');
                    }
                    if (w_stop == '-2') {
                        $('#videme-chart-button-last2weeks_' + item).removeClass('text-bg-secondary').addClass('text-bg-primary');
                        $('#videme-chart-stump_' + item).attr('time_shift_type', 'w_stop').attr('time_shift_val', '-2');
                    }
                } 
                if (m_stop) {
                    if (m_stop == '1') {
                        $('#videme-chart-button-1st1months_' + item).removeClass('text-bg-secondary').addClass('text-bg-primary');
                        $('#videme-chart-stump_' + item).attr('time_shift_type', 'm_stop').attr('time_shift_val', '1');
                    }
                    if (m_stop == '-1') {
                        $('#videme-chart-button-last1months_' + item).removeClass('text-bg-secondary').addClass('text-bg-primary');
                        $('#videme-chart-stump_' + item).attr('time_shift_type', 'm_stop').attr('time_shift_val', '-1');
                    }
                }
                $('.videme-item-chart-canvas-place').attr('id', 'videme-item-chart-canvas-place_' + item);

                $('#videme-item-chart-canvas_' + item).showChartShareItem({
                    showChartShareItemId: 'videme-item-chart-canvas_' + item,
                    item: item,
                    d_start: d_start,
                    d_stop: d_stop,
                    w_start: w_start,
                    w_stop: w_stop,
                    m_start: m_start,
                    m_stop: m_stop,
                });
                $.fn.showChartPopStates({
                    item: item,
                    showChartPopStatesId: 'videme-chart-pop-states-place_' + item
                });
                //$('#videme-item-chart-canvas_' + item).html(showListMedia(parseMyChartItemsForDoorbellSign({0: item})));

            });
          });
        </script>";
    }

    public function htmlEssenceToMe() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>My related essences</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-essence-to-me-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-essence-to-me-tile').showEssenceToMe({
                    //limit: 6
                });
            });
          });
        </script>";
    }
    public function htmlEssenceToMePending() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>My related essences pending</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-essence-to-me-pending-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-essence-to-me-pending-tile').showEssenceToMePending({
                    //limit: 6
                });
            });
          });
        </script>";
    }
    public function htmlEssenceFromMe() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>Connections with my essences</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-essence-from-me-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-essence-from-me-tile').showEssenceFromMe({
                    //limit: 6
                });
            });
          });
        </script>";
    }
    public function htmlEssenceFromMePending() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>Connections with my essences pending</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-essence-from-me-pending-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-essence-from-me-pending-tile').showEssenceFromMePending({
                    //limit: 6
                });
            });
          });
        </script>";
    }
    public function htmlEssenceRefAdd()
    {
        return "
        <div class='videme-v3-tile-title'>My friends</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-my-friends-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
            $(document).ready(function () {
                /*$('#videme-my-friends-tile').showFriendsMy({
                    //limit: 6
                });*/
            });
        </script>";
    }
    public function htmlEssenceFromMeSpring() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'></div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-essence-from-me-tile-spring\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
                        require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-essence-from-me-tile-spring').showEssenceFromMeSpring({
                    //limit: 6
                });
            });
            });
        </script>";
    }
    public function htmlEssenceToMeSpring() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'></div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-essence-to-me-tile-spring\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
                        require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-essence-to-me-tile-spring').showEssenceToMeSpring({
                    //limit: 6
                });
            });
            });
        </script>";
    }
    public function HTML_Show_List() // 26072022
    {
        return "
        <button type='button'
                class='btn btn-primary list-create-toggle' data-bs-toggle='modal'
                data-bs-target='#modal-create-list'>
            <span class='glyphicon glyphicon-plus'></span> Create new album
        </button>
        <div id=\"videme-tile-album\"></div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-tile-album').showList({
                    //limit: 6
                });
            });
          });
        </script>";
    }

    public function htmlItemscope($htmlItemscope, $contentInfo)
    {
        //print_r($contentInfo);
        if (!empty($contentInfo['item_id'])) {
            $item_id = $contentInfo['item_id'];
        } else {
            $item_id = '';
        }
        $welcome = new NAD();
        return "<div id='itemscope' class=\"itemscope\" itemscope=\"itemscope\" itemtype=\"https://schema.org/VideoObject\" style=\"min-width: 100%;\">
    {$htmlItemscope}
    <link itemprop=\"url\" href=\"https://www.vide.me/v?m=" . $item_id . "\" />
    <meta itemprop=\"name\" content=\"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['title']) . "\" />
    <meta itemprop=\"description\" content=\"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . " | Vide.me\"/>
    <meta itemprop=\"contentUrl\" content=\"" . $this->origin_video_vide_me . $contentInfo['item_id'] . ".m3u8\"/>
    <link itemprop=\"embedUrl\" href=\"https://api.vide.me/embed/?i=" . $contentInfo['item_id'] . "\"/>
    <meta itemprop=\"duration\" content=\"" . $welcome->iso8601_duration($contentInfo['video_duration']) . "\" />
    <meta itemprop=\"isFamilyFriendly\" content=\"True\" />
    <meta itemprop=\"uploadDate\" content=\"" . $contentInfo['created_at'] . "\" />
    <meta itemprop=\"thumbnailUrl\" content=\"" . $this->origin_img_vide_me . $contentInfo['item_id'] . ".jpg\" />
    <span itemprop=\"thumbnail\" itemscope='itemscope' itemtype=\"https://schema.org/ImageObject\">
           <link itemprop=\"contentUrl\" href=\"" . $this->origin_img_vide_me . $contentInfo['item_id'] . ".jpg\" />
           <!--<meta itemprop=\"width\" content=\"240\" />
           <meta itemprop=\"height\" content=\"135\" />-->
        </span>
</div>
        ";
    }

    public function htmlTile()
    {
        return "
    <div class=\"container-fluid videme-tile-border\">
        <div class=\"row\">
            <div class=\"\" id=\"result-response-for-friends\"></div>
            <div class=\"videme-tile\" id=\"videme-tile-for-friends\"></div>
            <div class=\"\" id=\"result-response\"></div>
            <div class=\"videme-tile\" id=\"videme-tile\"></div>
            <div class=\"videme-tile\" id=\"videme-tile-spring-video\"></div>
            <div class=\"videme-tile\" id=\"videme-tile-history-upload\"></div>
            <div class=\"videme-tile\" id=\"videme-my-starred\"></div>
        </div>
    </div>";
    }
    public function htmlTileV3()
    {
        return "
    <div class='container-fluid my-2 py-2 videme-tile-border'>
        <div class='row' id='videme-tile-v3'>
        </div>
    </div>";
    }

    public function htmlSpringContainer($userInfo)
    {
        if (!empty($userInfo['user_cover'])) {
            $user_cover = $this->origin_img_vide_me . $userInfo['user_cover_top'];
        } else {
            $user_cover = $this->origin_img_vide_me . 'videme_cover.png';
        }

        if (!empty($userInfo['user_picture'])) {
            $user_picture = $this->origin_img_vide_me . $userInfo['user_picture'];
        } else {
            $user_picture = $this->origin_img_vide_me . 'nonname.jpg';
        }
        return "
        <style type=\"text/css\">
        /* Show it is fixed to the top */
        body {
            padding-top: 57px;
        }
        </style>
<div class=\"springContainer\">
    <div class='header-site' style='background-image: url(\"" . $user_cover . "\")'>
        <div class='h4 text-right videme-spring-slogan' id='videme-spring-slogan'></div>
        <div id=\"imageContainer\" class='imageContainer'>
            <img src=\"" . $user_picture . "\" alt=\"...\" class=\"img-thumbnail rounded-circle float-left \" id=\"vide_spring_user_picture\"/>
        </div>
        <!--<div id='test'>T</div>
        <button id='go_test' type=\"button\" class=\"btn btn-light float-right go_test\">t</button>-->
        <div class=\"text-center spring_activity_starred\">
            <i id='spring_activity_starred_label' class='fa fa-star spring_activity_starred_label hidden'>
            </i>
            <div id='spring_activity_starred_value' class='spring_activity_starred_value'></div>
        </div>
        <div class=\"text-center spring_activity_liked\">
        
            </i>
            <i id='spring_activity_liked_label' class='fa fa-thumbs-up spring_activity_liked_label hidden'>
            <div id='spring_activity_liked_value' class='spring_activity_liked_value'></div>
            <!--<div class='spring_activity_liked_label hidden'>Liked</div>-->
            
                <!--<div class=\"videme_item_info_val\">0</div>-->
        </div>
    </div>
    
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
        <ul class=\"navbar-nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link videme-spring-user_display_name\" href=\"#\"></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link spring_relation\" href=\"#\"></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link spring_make_friends\" href=\"#\"></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_viewed\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=viewed\">
                <span class='spring_activity_viewed_label'>Viewed</span>
                <span class='spring_activity_viewed_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_posts\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=posts\">
                <span class='spring_activity_posts_label'>Posts</span>
                <span class='spring_activity_posts_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_video\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=video\">
                <span class='spring_activity_video_label'>Video</span>
                <span class='spring_activity_video_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_image\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=image\">
                <span class='spring_activity_image_label'>Image</span>
                <span class='spring_activity_image_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_article\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=article\">
                <span class='spring_activity_article_label'>Article</span>
                <span class='spring_activity_article_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_event\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=event\">
                <span class='spring_activity_event_label'>Events</span>
                <span class='spring_activity_event_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_friends\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=friends\">
                <span class='spring_activity_friends_label'>Friends</span>
                <span class='spring_activity_friends_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_relation_to\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=followers\">
                <span class='spring_activity_relation_to_label'>Followers</span>
                <span class='spring_activity_relation_to_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_relation_from\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=following\">
                <span class='spring_activity_relation_from_label'>Following</span>
                <span class='spring_activity_relation_from_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_tags_confirmed\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=tags_conf\">
                <span class='spring_activity_tags_confirmed_label'>Tags confirmed</span>
                <span class='spring_activity_tags_confirmed_value'></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
</div>
    <script type=\"text/javascript\">
                    //require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            //$('#videme-album-of-spring').showAlbumOfSpring({});
            /*$('#videme-list-of-spring-friends').showSignsOfSpringForFriends({});
            $('#videme-list-of-spring-public').showSignsOfSpringForPublic({});
            $('#videme-list-of-spring-private').showSignsOfSpringForPrivate({});*/
            //$.fn.userSpringForMe({});
            var url = parseUrl();
            $.fn.userSpringForMeFriendship();
            $.fn.userSpringForMeFollow();
            $.fn.userSpringInfo();
            $.fn.springActivity();
            $.fn.springTalents(url);
            $.fn.springService(url);
        });
        //});
    </script>
        ";
    }

    public function htmlSpringContainerMy($userInfo)
    {
        return "
<div class=\"springContainer\">
    <div class='header-site'>
        <div class='h4 text-right videme-spring-slogan' id='videme-spring-slogan'></div>
        <div id=\"imageContainer\" class='imageContainer'>
            <img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/magnetar.jpg\" alt=\"...\" class=\"img-thumbnail rounded-circle float-left \" id=\"vide_spring_user_picture\"/>
        </div>
        <!--<div id='test'>T</div>
        <button id='go_test' type=\"button\" class=\"btn btn-light float-right go_test\">t</button>-->
        <div class=\"text-center spring_activity_starred\">
            <i id='spring_activity_starred_label' class='fa fa-star spring_activity_starred_label hidden'>
            </i>
            <div id='spring_activity_starred_value' class='spring_activity_starred_value'></div>
        </div>
        <div class=\"text-center spring_activity_liked\">
        
            <i id='spring_activity_liked_label' class='fa fa-thumbs-up spring_activity_liked_label hidden'>
            </i>
            <div id='spring_activity_liked_value' class='spring_activity_liked_value'></div>
            <!--<div class='spring_activity_liked_label hidden'>Liked</div>-->
            
                <!--<div class=\"videme_item_info_val\">0</div>-->
        </div>
    </div>
    
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
        <ul class=\"navbar-nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link videme-spring-user_display_name\" href=\"#\"></a>
          </li>
          <!--<li class=\"nav-item\">
            <a class=\"nav-link spring_relation\" href=\"#\"></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link spring_make_friends\" href=\"#\"></a>
          </li>-->
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_viewed\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=viewed\">
                <span class='spring_activity_viewed_label'>Viewed</span>
                <span class='spring_activity_viewed_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_posts\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=posts\">
                <span class='spring_activity_posts_label'>Posts</span>
                <span class='spring_activity_posts_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_video\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=video\">
                <span class='spring_activity_video_label'>Video</span>
                <span class='spring_activity_video_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_image\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=image\">
                <span class='spring_activity_image_label'>Image</span>
                <span class='spring_activity_image_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_article\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=article\">
                <span class='spring_activity_article_label'>Article</span>
                <span class='spring_activity_article_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_event\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=event\">
                <span class='spring_activity_event_label'>Events</span>
                <span class='spring_activity_event_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_friends\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=friends\">
                <span class='spring_activity_friends_label'>Friends</span>
                <span class='spring_activity_friends_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_relation_to\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=followers\">
                <span class='spring_activity_relation_to_label'>Followers</span>
                <span class='spring_activity_relation_to_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_relation_from\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=following\">
                <span class='spring_activity_relation_from_label'>Following</span>
                <span class='spring_activity_relation_from_value'></span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link text-center spring_activity_tags_confirmed\" href=\"https://www.vide.me/" . $userInfo['spring'] . "/?show=tags_conf\">
                <span class='spring_activity_tags_confirmed_label'>Tags confirmed</span>
                <span class='spring_activity_tags_confirmed_value'></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
</div>
    <script type=\"text/javascript\">
                    require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            //$('#videme-album-of-spring').showAlbumOfSpring({});
            /*$('#videme-list-of-spring-friends').showSignsOfSpringForFriends({});
            $('#videme-list-of-spring-public').showSignsOfSpringForPublic({});
            $('#videme-list-of-spring-private').showSignsOfSpringForPrivate({});*/
            $.fn.userSpringInfo({});
            $.fn.springActivity({});
        });
        });
    </script>
        ";
    }

    public function htmlSpringAbout($userInfo = [])
    {
        $pg = new PostgreSQL();
        $userTrue = $pg->pgPaddingItems($userInfo);

        if (!empty($userTrue['user_link'])) {
            $link = "<i class=\"fa fa-external-link videme-user_link-marker\"></i>
        <a class='videme-user_link-name' href='" . $this->welcome->safetyTagsSlashesTrim4096($userTrue['user_link']) . "' target='_blank'>" . $this->welcome->safetyTagsSlashesTrim4096($userInfo['user_link']) . "</a>";
        } else {
            $link = '';
        }
        return "
        <div class='videme-v3-tile-title'>Talents</div>
        <div class=\"videme-owner-sign-talents\" id=\"\"></div>
        <div class='videme-v3-tile-title'>Service</div>
        <div class=\"videme-owner-sign-service\" id=\"\"></div>
        <div class='videme-v3-tile-title'>Biography</div>
        <div class=''>" . $this->welcome->safetyTagsSlashesTrim4096($userTrue['bio']) . "</div>
        <i class=\"fa fa-globe videme-country-marker\"></i>
        <div class=\"videme-country-name\">" . $this->welcome->safetyTagsSlashesTrim4096($userTrue['country']) . "</div>
        <i class=\"fa fa-map-marker videme-city-marker\"></i>
        <div class=\"videme-city-name\">" . $this->welcome->safetyTagsSlashesTrim4096($userTrue['city']) . "</div>
        " . $link . "
        <div class='videme-v3-tile-title'>Additional Information</div>
        <div class=''>" . $this->welcome->safetyTagsSlashesTrim4096($userTrue['ext_info']) . "</div>
        " . $this->htmlGoogleMaps($userTrue) . "
<script type=\"text/javascript\">
    require(['jquery', 'videme_jq'], function( $ ) {
    //$(document).ready(function () {
        var url = parseUrl();
        $.fn.springTalents(url);
        $.fn.springService(url);
    //});
    });
</script>
        ";
    }

    public function htmlGoogleMaps($htmlGoogleMaps)
    {
        if (!empty($htmlGoogleMaps['lat'] and !empty($htmlGoogleMaps['lng']))) {
            return "
        <style>
 #map {
   width: 100%;
   height: 400px;
   background-color: grey;
 }
</style>
        <div class='h5 videme-title-map'>On map</div>
         <div id=\"map\">My map will go here</div>
       <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: " . $htmlGoogleMaps['lat'] . ", lng: " . $htmlGoogleMaps['lng'] . "};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
        </script>
        <script async='async' defer='defer'
  src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyC4PncXvxMGDeIupaghNoEFxQtW4aN99zU&amp;callback=initMap\">
</script>";
        } else {
            return '';
        }
    }

    public function htmlGoogleMyMap()
    {
        return "<style>
    #map {
        width: 100%;
        height: 400px;
        background-color: grey;
    }
</style>
<div class='videme-v3-tile-title'>Pick your place on the map</div>
<div id=\"map\"></div>
<form class=\"\" id=\"user-map-form\" name=\"user-map-form\" role=\"form\">
    <div class=\"form-row\">
        <div class=\"col\">
            <input class=\"\" id=\"lat\" placeholder=\"latitude\" name=\"lat\" value=\"lat\" aria-invalid=\"false\" type=\"text\"/>
        </div>
        <div class=\"col\">
            <input class=\"\" id=\"lng\" placeholder=\"longitude\" name=\"lng\" value=\"lng\" aria-invalid=\"false\" type=\"text\"/>
        </div>
        <div class=\"col\">
            <button type=\"submit\" class=\"btn btn-primary videme-round-button\" id=\"user_map_submit\" name=\"user_map_submit\">
                Save
                <div class=\"videme-progress\"></div>
            </button>
        </div>
    </div>

</form>
<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error \"The Geolocation service
    // failed.\", it means you probably did not give permission for the browser to
    // locate you.
    var map, infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        google.maps.event.addListener(map, 'click', function (event) {
            //alert(\"Latitude: \" + event.latLng.lat() + \" \" + \", longitude: \" + event.latLng.lng());
            $('#lat').val(event.latLng.lat());
            $('#lng').val(event.latLng.lng());
        });
    }


    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
<script async='async' defer='defer'
        src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyC4PncXvxMGDeIupaghNoEFxQtW4aN99zU&amp;callback=initMap\">
</script>";
    }

    public function htmlGoogleMapSelect()
    {
        return "<style>
    #map {
        width: 100%;
        height: 400px;
        background-color: grey;
    }
</style>
        <label for=\"\">Select a place on the map</label>
<div id=\"map\"></div>

<!--
<form class=\"\" id=\"user-map-form\" name=\"user-map-form\" role=\"form\">
-->
    <div class=\"form-row\">

        <div class=\"col\">
            <input class=\"\" id=\"lat\" placeholder=\"latitude\" name=\"lat\" value=\"lat\" aria-invalid=\"false\" type=\"text\"/>
        </div>
        <div class=\"col\">
            <input class=\"\" id=\"lng\" placeholder=\"longitude\" name=\"lng\" value=\"lng\" aria-invalid=\"false\" type=\"text\"/>
        </div>
        <!--<div class=\"col\">
            <button type=\"submit\" class=\"btn btn-primary\" id=\"user_map_submit\" name=\"user_map_submit\">
                Save
                <div class=\"videme-progress\"></div>
            </button>
        </div>-->
    </div>

<!--
</form>
-->
<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error \"The Geolocation service
    // failed.\", it means you probably did not give permission for the browser to
    // locate you.
    var map, infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        google.maps.event.addListener(map, 'click', function (event) {
            //alert(\"Latitude: \" + event.latLng.lat() + \" \" + \", longitude: \" + event.latLng.lng());
            $('#lat').val(event.latLng.lat());
            $('#lng').val(event.latLng.lng());
        });
    }


    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
<script async='async' defer='defer'
        src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyC4PncXvxMGDeIupaghNoEFxQtW4aN99zU&amp;callback=initMap\">
</script>";
    }

    public function htmlShowcase($contentInfo)
    {
        //$welcome = new NAD();
        //$videoTag = '';
        $src = '';
        //print_r($contentInfo);
        if (!empty($contentInfo['src'])) {
            $srcA = json_decode($contentInfo['src']);
            //print_r($srcA);

            foreach ($srcA as $key => $value) {
                //echo "foreach" . $value;

                $src .= '<source src="' . $this->origin_video_vide_me . $value . '" type="video/mp4" />';
            }
        } /*else {*/
            $src .= '<source src="' . $this->origin_video_vide_me . $contentInfo['item_id'] . '.m3u8" type="video/mp4"/>';
        //}
        $videoTag = '<video controls="controls" poster="' . $this->origin_img_vide_me . $contentInfo['item_id'] . '.jpg">' . $src . '</video>';
        return "<div id=\"videme-showcase-video\" class=\"videme-showcase-video\">" . $videoTag . "</div>" . $this->htmlShowcasePanelInfo($contentInfo);
    }
    public function htmlShowcaseV3($contentInfo) // TODO: why? remove
    {
        //$welcome = new NAD();
        //$videoTag = '';
        $src = '';
        //print_r($contentInfo);
        if (!empty($contentInfo['src'])) {
            $srcA = json_decode($contentInfo['src']);
            //print_r($srcA);

            foreach ($srcA as $key => $value) {
                //echo "foreach" . $value;

                $src .= '<source src="' . $this->origin_video_vide_me . $value . '" type="video/mp4" />';
            }
        } /*else {*/
            $src .= '<source src="' . $this->origin_video_vide_me . $contentInfo['item_id'] . '.m3u8" type="video/mp4"/>';
        //}
        $videoTag = '<video controls="controls" poster="' . $this->origin_img_vide_me . $contentInfo['item_id'] . '.jpg">' . $src . '</video>';
        return "<div id=\"videme-showcase-video\" class=\"videme-showcase-video\">" . $videoTag . "</div>" . $this->htmlShowcasePanelInfoV3($contentInfo);
    }

    public function htmlShowcaseV3Dinamic($contentInfo)
    {
        //$welcome = new NAD();
        //$videoTag = '';
        $src = '';
        $vtt = '';
        //print_r($contentInfo);
        if (!empty($contentInfo['src'])) { // TODO: why?
            $srcA = json_decode($contentInfo['src']);
            //print_r($srcA);

            foreach ($srcA as $key => $value) {
                //echo "foreach" . $value;

                $src .= '<source src="' . $this->origin_video_vide_me . $value . '" type="video/mp4" />';
            }
        }
        if (!empty($contentInfo['vtt_w120'])) {
                //$vtt = '<track kind="metadata" src="https://s3.amazonaws.com/vtt-w120.vide.me/' . $contentInfo['item_id'] . '-spr-w120.vtt"></track>';
                $vtt = '<track kind="metadata" src="' . $this->origin_sprite_w120_vide_me . $contentInfo['item_id'] . '-spr-w120.vtt"></track>';
        } /*else {*/
            $src .= '<source src="' . $this->origin_video_vide_me . $contentInfo['item_id'] . '.m3u8" type="video/mp4"/>';
        //}
        //$videoTag = '<video controls="controls" poster="https://s3.amazonaws.com/img.vide.me/' . $contentInfo['item_id'] . '.jpg">' . $src . '</video>';
        //    class="video-js vjs-default-skin vjs-big-play-centered"
        $videoTag = '<video
    id="my-player"
    class="video-js vjs-default-skin vjs-big-play-centered vjs-fluid"
    controls="controls"
    preload="auto"
    poster="' . $this->origin_img_vide_me . $contentInfo['item_id'] . '.jpg">
   ' . $src . '
   ' . $vtt . '
  <p class="vjs-no-js">
    To view this video please enable JavaScript, and consider upgrading to a
    web browser that
    <a href="https://videojs.com/html5-video-support/" target="_blank">
      supports HTML5 video
    </a>
  </p>
</video>';
        /*$videoTag = '<video
        id="videme-v3-player"
        class="video-js"
        preload="auto"
        poster="https://s3.amazonaws.com/img.vide.me/1e9ac0d3ab1d.jpg"
        data-setup=\'{}\'>
    <!--<source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4"></source>
    <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm"></source>
    <source src="//vjs.zencdn.net/v/oceans.ogv" type="video/ogg"></source>-->

    <source src="https://s3.amazonaws.com/video.vide.me/1e9ac0d3ab1d-240.mp4" type="video/mp4"></source>
    <source src="https://s3.amazonaws.com/video.vide.me/1e9ac0d3ab1d.m3u8" type="video/mp4"></source>
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank">
            supports HTML5 video
        </a>
    </p>
</video>';*/
        if ($contentInfo['embed']) {
            return "<div id=\"videme-showcase-video\" class=\"videme-showcase-video\">" . $videoTag . "</div>";
        } else {
            return "<div id='videme-showcase-item-cover'><div id=\"videme-showcase-video\" class=\"videme-showcase-video\">" . $videoTag . "</div></div>" . $this->htmlShowcasePanelInfoV3($contentInfo);
        }
    }

    public function htmlShowcasePanelInfo($contentInfo)
    {
        $welcome = new NAD();
        return "
<div class=\"px-2 py-2\">

    <!--<img class=\"mr-3 videme-relation-card-img\" id='videme_showcase_user_picture' src=\"\" alt=\"\"/>-->
    <!--<h5 class=\"mt-0 videme-showcase-from_user_name\"><a href='https://vide.me/" . $contentInfo['spring'] . "/'>" . $contentInfo['user_display_name'] . "</a>
    </h5>-->
    <div class=\"h5 videme-showcase-subject\">" . $welcome->safetyTagsSlashesTrim4096($contentInfo['title']) . "
    </div>
    <div class=\"videme-showcase-message\">" . $welcome->safetyTagsSlashesTrim4096($contentInfo['content']) . "
    </div>
    <div class=\"text-muted videme-showcase-createdat\">" . $welcome->pgTimeToHuman($contentInfo['created_at']) . "
    </div>
    <div class='container'>
        <div class='row'>
            <div class='videme_showcase_item_info'></div>
    <div class=\"videme-showcase-stars\"></div>
    <div class=\"videme-showcase-likes\"></div>
    <div class=\"videme-showcase-reposts\"></div>
    <div class=\"videme-showcase-share\"></div>
    <div class=\"videme-showcase-tags hidden\"></div>
        <!--<button type=\"button\" class=\"btn btn-link show_comment_showcase\"><i class=\"fa fa-commenting-o\" aria-hidden=\"true\"></i>" . $contentInfo['comments_count'] . "</button>-->
    </div>
        <!--Tags-->
    </div>
    <!--<div class=\"videme-showcase-ext_links-title hidden\">
        Links
        <div class='videme-showcase-ext_links'></div>
    </div>-->
</div>";
    }

    public function htmlShowcasePanelInfoV3($contentInfo)
    {
        if (!empty($contentInfo['user_picture'])) {
            $user_picture = $this->origin_img_vide_me . $contentInfo['user_picture'];
        } else {
            $user_picture = $this->origin_img_vide_me . 'nonname.jpg';
        }
        $welcome = new NAD();
        return "
<div class=\"px-2 py-2\">
<div class='container'>
    <!--<div class='videme-v3-owner-sign-user-brand'>
            <img class=\"mr-3 videme-relation-card-img rounded-circle videme-relation-card-img-tile-v3\" id='videme_showcase_user_picture' src=\"" . $user_picture . "\" alt=\"\"/>
        <h5 class=\"mt-0 videme-showcase-from_user_name\">
            <a class='videme-v3-link' href='https://vide.me/" . $contentInfo['spring'] . "/'>" . htmlspecialchars($contentInfo['user_display_name'], ENT_QUOTES) . "</a>
        </h5>
        <h5 class=\"\">
            <a class='text-center text-secondary' href='https://vide.me/" . $contentInfo['spring'] . "/'>@" . $contentInfo['spring'] . "</a>
        </h5>
    </div>-->
    <div class='d-flex justify-content-end align-items-center videme-v3-item-action-button-place'>
        <!--<div class='d-flex2 justify-content-end align-items-center videme-v3-item-action-button-place'>-->
            <div class='videme_showcase_item_info videme-v3-item-action-button'></div>
            <!--<div class=\"videme-showcase-stars-v3 videme-v3-item-action-button\"></div>-->
            <!--<div class=\"videme-showcase-reposts-v3 videme-v3-item-action-button\"></div>-->
            <div class='show_action_button_showcase videme-v3-item-action-button'></div>
            <div class=\"videme-showcase-follow-v3 videme-v3-item-action-button\"></div>
    
            <!--</div>-->
    </div>
    <div class='row videme-ralation-card-small'>
            <div class=\"col-2 videme-v3-relation-card-1-column\">
                <a href=\"https://www.vide.me/" . $contentInfo['spring'] . "\">
                <img class=\"rounded-circle videme-v3-relation-card-img\" src=\"" . $user_picture . "\" alt=\"\"/>
                </a>
            </div>
            <div class=\"col-10 videme-relation-card-2-column\">
                <div class=\"d-flex float-start justify-content-between align-items-center\">
                    <div class=\"videme-relation-card-user\">
                    <a href=\"https://www.vide.me/" . $contentInfo['spring'] . "/\">" . htmlspecialchars($contentInfo['user_display_name'], ENT_QUOTES) . "</a>
                    </div>
                    
                </div>
                <div class=\"d-flex justify-content-between align-items-center\">
                    <div class=\"ms-2 videme-relation-card-user2\">
                    <a class=\"text-muted\" href=\"https://www.vide.me/" . $contentInfo['spring'] . "/\">@" . $contentInfo['spring'] . "</a>
                    </div>
                    <!--<div class='show_action_button_showcase'></div>
    
                    <a href=\"https://api.vide.me/v2/relation/connect/?user_id=b83f720554c8&amp;nad=undefined\" class=\"btn btn-outline-primary btn-sm videme-relation-card-button-connect relation_connect\" user_id=\"b83f720554c8\" feedback=\"https://www.vide.me/happy6654lust23f\">Follow</a>-->
                </div>
                
                    <div class=\"text-muted videme-showcase-createdat\">" . $welcome->pgTimeToHuman($contentInfo['created_at']) . "</div>
               
                
            </div>
    </div>
            
    <div class=\"videme-showcase-partnership-review-place\"></div>
            
    <div class=\"h5 videme-showcase-subject\">" . $welcome->safetyTagsSlashesTrim4096($contentInfo['title']) . "
    </div>
    <div class=\"videme-showcase-message\">" . $welcome->safetyTagsSlashesTrim4096($contentInfo['content']) . "
    </div>
    <!--<div class=\"text-muted videme-showcase-createdat\">" . $welcome->pgTimeToHuman($contentInfo['created_at']) . "
    </div>-->
    
        <!--<div class='row'>-->
            <!--<div class='videme_showcase_item_info'></div>
    <div class=\"videme-showcase-stars\"></div>
    <div class=\"videme-showcase-likes\"></div>
    <div class=\"videme-showcase-reposts\"></div>
    <div class=\"videme-showcase-share\"></div>-->
    <div class=\"videme-showcase-tags hidden\"></div>
    <div class='container'>
        <div class='row'>
            <div class=\"videme-showcase-tags-alert\"></div>
        </div>
    </div>
    <div id='videme-showcase-partners-item' class='videme-tile hidden'>
        <div class='d-flex videme-showcase-title'>
            <div class='float-left' id='videme-showcase-partners_count'></div>
            <div class='float-left'>Partners&#160;</div>
            <!--<div class=\"hidden\" id='videme-v3-spring-activity_partners_confirmed_label_place_top'>
                    <a class=\"badge badge-secondary badge-pill service1\"
                       href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=tags_conf\">
                        <i class=\"fa fa-check-circle-o fa-lg\"></i>
                            <span class=\"badge badge-light videme_nav_badge_tags_conf_count spring_activity_tags_confirmed_value\"></span>
                    </a>
            </div>-->
        </div>
        <div class='videme-showcase-partners-item_place'></div>
    </div>
    <div class=\"videme-showcase-tags-item hidden\">
        <div class='d-flex videme-showcase-title'>
            <div class='float-left' id='videme-showcase-tags-item_count'></div>
            <div class='float-left'>Tags&#160;</div>
            <div class=\"hidden\" id='videme-v3-spring-activity_tags_confirmed_label_place_top'>
                    <a class=\"badge badge-secondary badge-pill service1\"
                       href=\"https://www.vide.me/" . $contentInfo['spring'] . "/?show=tags_conf\">
                        <i class=\"fa fa-check-circle-o fa-lg\"></i>
                            <span class=\"badge badge-light videme_nav_badge_tags_conf_count spring_activity_tags_confirmed_value\"></span>
                    </a>
            </div>
        </div>
        <div class='videme-showcase-tags-item_place'></div>
    </div>
    <div class=\"videme-showcase-tags-user hidden\">
        <div class='d-flex videme-showcase-title'>
            <div class='videme-showcase-tags_count' id='videme-showcase-tags-user_count'></div>You tags
        </div>
        <div class='videme-showcase-tags-user_place'></div>
    </div>
        <!--<button type=\"button\" class=\"btn btn-link show_comment_showcase\"><i class=\"fa fa-commenting-o\" aria-hidden=\"true\"></i>" . $contentInfo['comments_count'] . "</button>-->
    <!--</div>-->
        <!--Tags-->
    <!--</div>-->
    <!--<div class=\"videme-showcase-ext_links-title hidden\">
        Links
        <div class='videme-showcase-ext_links'></div>
    </div>-->
" . /*$this->htmlShowTags($contentInfo) .*/ "
" . $this->htmlShowExtLinks($contentInfo) . "
</div>
</div>"; // TODO: Why for???^htmlShowExtLinks
    }

    public function htmlImage($htmlImage)
    {
        if (!empty($htmlImage['cover'])) {
            $trueImage = $htmlImage['cover'];
        } else {
            $trueImage = $htmlImage['item_id'] . ".jpg";

        }
        return "<div class=\"videme-showcase-header\">
</div>
<!--<div id=\"videme-showcase-video\" class=\"videme-showcase-video\">
</div>-->
<a class='image-url' 
user_display_name='" . $htmlImage['user_display_name'] . "' 
created_at='" . $htmlImage['created_at'] . "' 
title='" . $htmlImage['title'] . "' 
content='" . $htmlImage['content'] . "' 
user_picture='" . $htmlImage['user_picture'] . "' 
item_id='" . $htmlImage['item_id'] . "' 
href='https://www.vide.me/i/?i=" . $htmlImage['item_id'] . "'>
<div class=\"videme-modal-item-image-place\"><img src=\"" . $this->origin_img_vide_me . $trueImage . "\"
                                                class=\"videme-modal-item-image\"/></div>
</a>
" . $this->htmlShowcasePanelInfo($htmlImage);
    }

    public function htmlImageV3($htmlImage)
    {
        $welcome = new NAD();
        $addClass = '';
        /*if (!empty($htmlImage['cover'])) { // TODO: why?
            $trueImage = $htmlImage['cover'];
        } else {
            $trueImage = $htmlImage['item_id'] . ".jpg";
            $addClass = 'hidden';
        }*/
        if (!empty($htmlImage['type']) && $htmlImage['type'] == 'image') {
            $addClass = '';
        } else {
            $addClass = 'hidden';
        }
        $action_url_class = $welcome->defineShowcaseClass($htmlImage);
        return "
<div class=\"bg-white my-2 videme-showcase-image-main " . $addClass . "\">
<div class=\"videme-showcase-header\">
</div>
<!--<div id=\"videme-showcase-video\" class=\"videme-showcase-video\">
</div>-->
<a id='videme-showcase-item-cover' class='image-url' 
user_display_name='" . $welcome->safetyTagsSlashesTrim4096($htmlImage['user_display_name']) . "' 
created_at='" . $htmlImage['created_at'] . "' 
title='" . $htmlImage['title'] . "' 
content='" . $htmlImage['content'] . "' 
user_picture='" . $htmlImage['user_picture'] . "' 
item_id='" . $htmlImage['item_id'] . "' 
cover='" . $htmlImage['cover'] . "' 
href='https://www.vide.me/i/?i=" . $htmlImage['item_id'] . "'>
<div class=\"videme-modal-item-image-place\"><img src=\"" . $this->origin_img_vide_me . $htmlImage['cover'] . "\"
                                                class=\"videme-modal-item-image\"/></div>
</a>
<!-- htmlImageV3 -->

<script type=\"text/javascript\">
require(['jquery', 'videme_jq'], function( $ ) {
$(document).ready(function () {
var oneTimeV3Settings = {
                        type: '" . $htmlImage["type"] . "',
                        video: '" . $htmlImage["item_id"] . "',
                        item_id: '" . $htmlImage["item_id"] . "',
                        cover: '" . $htmlImage["cover"] . "',
                        owner_id: '" . $htmlImage["owner_id"] . "',
                        access: '" . $htmlImage["access"] . "',
                        message_id: '" . /*$message_id .*/ "',
                        created_at: '" . $htmlImage['created_at'] . "',
                        updated_at: '" . $htmlImage['updated_at'] . "',
                        title: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['title']) . "',
                        content: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['content']) . "',
                        video_duration: '" . $htmlImage['video_duration'] . "',
                        spring: '" . $htmlImage['spring'] . "',
                        bio: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['bio']) . "',
                        country: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['country']) . "',
                        city: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['city']) . "',
                        item_count_show: '" . $htmlImage['item_count_show'] . "',
                        likes_count: '" . $htmlImage['likes_count'] . "',
                        stars_count: '" . $htmlImage['stars_count'] . "',
                        its_like: '" . $htmlImage['its_like'] . "',
                        comments_count: '" . $htmlImage['comments_count'] . "',
                        its_star: '" . $htmlImage['its_star'] . "',
                        reposts_count: '" . $htmlImage['reposts_count'] . "',
                        ext_links: '" . $htmlImage['ext_links'] . "',
                        from_user_id: '" . $htmlImage['from_user_id'] . "',
                        user_picture: '" . htmlspecialchars($htmlImage['user_picture']) . "',
                        user_cover: '" . htmlspecialchars($htmlImage['user_cover']) . "',
                        from_user_display_name: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['from_user_display_name']) . "',
                        user_display_name: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['user_display_name']) . "',
                        from_user_name: '" . $welcome->safetyTagsSlashesTrim4096($htmlImage['user_display_name']) . "',
                        recipients: '" . /*$recipients .*/ "',
                        conference_id: '" . $htmlImage['conference_id'] . "',
                        //action_url_class: 'showmulti'
                        action_url_class: '" . $action_url_class . "'
                    };
                                        $.fn.oneTimeV3(oneTimeV3Settings);

        //$('.show_action_button_showcase').html(showDropdownForDoorbelSignV3(paddingButtonAction(oneTimeV3Settings)));
});
});
</script>
" . $this->htmlShowcasePanelInfoV3($htmlImage) . "
" /*. $this->htmlShowcasePanelInfo($htmlImage)*/ . "
</div>";
    }

    public function htmlArticleV3($contentInfo)
    {
        $welcome = new NAD();
        $article = new Article();
        /*if (!empty($contentInfo['cover'])) {
            $trueImage = $contentInfo['cover'];
        } else {
            $trueImage = $contentInfo['item_id'] . ".jpg";

        }*/
        //print_r($contentInfo);

        /*$addClass = '';
        if (empty($contentInfo['item_id'])) {
            $addClass = 'hidden';
        }*/
        if (!empty($contentInfo['type']) && $contentInfo['type'] == 'article') {
            $addClass = '';
        } else {
            $addClass = 'hidden';
        }
        $action_url_class = $welcome->defineShowcaseClass($contentInfo);
        return "
<div class=\"bg-white my-2 px-2 videme-showcase-article-main " . $addClass . "\">
<div class=\"videme-article-center\">
<div class=\"videme-modal-article-content-place\">
" . $article->showArticleMVC($contentInfo) . "
" . $this->htmlShowTags($contentInfo) . "
" . $this->htmlShowExtLinks($contentInfo) . "
<!-- htmlArticleV3 -->
    <script type=\"text/javascript\">
    require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            //$.cookie(\"vide_prev_item_id\", file, {expires: 14, path: '/', domain: 'vide.me', secure: true});
            goToUrl('https://api.vide.me/system/items/item_count_add/?item=" . $contentInfo['item_id'] . "');
            $.fn.ownerSignUserInfo({ // TODO: not working
                    user_picture: \"" . htmlspecialchars($contentInfo['user_picture']) . "\",
                    user_cover: \"" . htmlspecialchars($contentInfo['user_cover']) . "\",
                    user_display_name: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . "\",
                    spring: \"" . $contentInfo['spring'] . "\",
                    bio: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['bio']) . "\",
                    country: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "\",
                    city: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "\"
            });
            var oneTimeV3Settings = {
                        type: '" . $contentInfo["type"] . "',
                        video: '" . $contentInfo["item_id"] . "',
                        item_id: '" . $contentInfo["item_id"] . "',
                        owner_id: '" . $contentInfo["owner_id"] . "',
                        access: '" . $contentInfo["access"] . "',
                        message_id: '" . /*$message_id .*/ "',
                        created_at: '" . $contentInfo['created_at'] . "',
                        updated_at: '" . $contentInfo['updated_at'] . "',
                        title: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['title']) . "',
                        content: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['content']) . "',
                        video_duration: '" . $contentInfo['video_duration'] . "',
                        spring: '" . $contentInfo['spring'] . "',
                        bio: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['bio']) . "',
                        country: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "',
                        city: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "',
                        item_count_show: '" . $contentInfo['item_count_show'] . "',
                        likes_count: '" . $contentInfo['likes_count'] . "',
                        stars_count: '" . $contentInfo['stars_count'] . "',
                        its_like: '" . $contentInfo['its_like'] . "',
                        comments_count: '" . $contentInfo['comments_count'] . "',
                        its_star: '" . $contentInfo['its_star'] . "',
                        reposts_count: '" . $contentInfo['reposts_count'] . "',
                        ext_links: '" . $contentInfo['ext_links'] . "',
                        from_user_id: '" . $contentInfo['from_user_id'] . "',
                        user_picture: '" . htmlspecialchars($contentInfo['user_picture']) . "',
                        user_cover: '" . htmlspecialchars($contentInfo['user_cover']) . "',
                        from_user_display_name: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['from_user_display_name']) . "',
                        user_display_name: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . "',
                        from_user_name: '" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . "',
                        recipients: '" . /*$recipients .*/ "',
                        conference_id: '" . $contentInfo['conference_id'] . "',
                        //action_url_class: 'showmulti'
                        action_url_class: '" . $action_url_class . "'
                    };
        //===$('.show_action_button_showcase').html(showDropdownForDoorbelSignV3(paddingButtonAction(oneTimeV3Settings)));
            //$.fn.springTalents({spring: '" . $contentInfo['spring'] . "'});
            //$.fn.springService({spring: '" . $contentInfo['spring'] . "'});
        });
    });
    </script>
    </div>
    </div>
" /*. $this->htmlShowcasePanelInfoV3($contentInfo)*/ . "
" /*. $this->htmlShowcasePanelInfo($htmlImage)*/ . "
</div>";
    }
    public function htmlEventV3($contentInfo)
    {
        $welcome = new NAD();
        $article = new Article();
        $HTMLsample = new baseHTMLsample();
        //$addClass = '';
        /*if (empty($contentInfo['item_id'])) {
            $addClass = 'hidden';
        }*/
        //var_dump($contentInfo);

        if (!empty($contentInfo['type']) && $contentInfo['type'] == 'event') {
            $addClass = '';
        } else {
            $addClass = 'hidden';
        }
        $itemScope = "<div class=\"bg-white my-2 videme-showcase-event-main " . $addClass . "\">";
        $htmlItemscope = "";

        if (!empty($contentInfo['cover_video'])) {
            // video ============================================================================================================
            $htmlItemscope = $this->htmlShowcaseV3Dinamic($contentInfo);
            $trueContentInfo['tags'] = $contentInfo['tags'] ?? '[]'; // TODO: why???
        } else {
            // image ============================================================================================================
            $htmlItemscope = $this->htmlImageEventV3($contentInfo);
        }
        /*if (!empty($_GET['item'])) {
            $action_url_class = "action_url_class: 'videme-v3-my-posts-url',";
        } else {
            $action_url_class = "action_url_class: 'showmulti',";
        }*/
        $action_url_class = $welcome->defineShowcaseClass($contentInfo);
        //action_url_class: '" . $action_url_class . "',
        $itemScope .= $this->htmlItemscope($htmlItemscope, $contentInfo) . "
<!-- htmlEventV3 -->
            <script type=\"text/javascript\">
                    require(['jquery', 'videme_jq'], function( $ ) {
                    //goToUrl('https://api.vide.me/system/items/item_count_add/?item=" . $contentInfo['item_id'] . "');
                    $.fn.oneTimeV3({
                    //" . $action_url_class . "
                    action_url_class: '" . $action_url_class . "',
                        video: \"" . $contentInfo["cover_video"] . "\",
                        item_id: \"" . $contentInfo["item_id"] . "\",
                        owner_id: \"" . $contentInfo["owner_id"] . "\",
                        access: \"" . $contentInfo["access"] . "\",
                        created_at: \"" . $contentInfo['created_at'] . "\",
                        updated_at: \"" . $contentInfo['updated_at'] . "\",
                        title: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['title']) . "\",
                        content: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['content']) . "\",
                        video_duration: \"" . $contentInfo['video_duration'] . "\",
                        tags: \"" . $trueContentInfo['tags'] . "\",
                        to_user_id: \"" . $contentInfo['to_user_id'] . "\",
                        spring: \"" . $contentInfo['spring'] . "\",
                        bio: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['bio']) . "\",
                        country: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['country']) . "\",
                        city: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['city']) . "\",
                        item_count_show: \"" . $contentInfo['item_count_show'] . "\",
                        likes_count: \"" . $contentInfo['likes_count'] . "\",
                        reposts_count: \"" . $contentInfo['reposts_count'] . "\",
                        ext_links: '" . $contentInfo['ext_links'] . "',
                        from_user_id: \"" . $contentInfo['from_user_id'] . "\",
                        user_picture: \"" . htmlspecialchars($contentInfo['user_picture']) . "\",
                        user_cover: \"" . htmlspecialchars($contentInfo['user_cover']) . "\",
                        from_user_display_name: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['from_user_display_name']) . "\",
                        user_display_name: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . "\",
                        from_user_name: \"" . $welcome->safetyTagsSlashesTrim4096($contentInfo['user_display_name']) . "\"
                    });
                    });
            </script>";
        $itemScope .= "<div class='itemscope'>";

        if (!empty($contentInfo['started_at'])) {
            $itemScope .= $this->eventStartStopPanel($contentInfo);
        }
        if (!empty($contentInfo['started_at'])) {
            $itemScope .= $HTMLsample->eventCountryCityPlacePanel($contentInfo);
        }
        if (!empty($contentInfo['lat'])) {
            $itemScope .= $this->htmlGoogleMaps($contentInfo);
        }
        if (!empty($contentInfo['body'])) {
            $bodyTrue['body'] = $contentInfo['body'];
            $itemScope .= $article->showArticleMVC($bodyTrue);
        }
        $itemScope .= $this->htmlShowTags($contentInfo);
        $itemScope .= "</div>";
        $itemScope .= "</div>";

        return $itemScope;
    }

    public function htmlImageEvent($htmlImageEvent)
    {
        return "<div class=\"videme-showcase-header\">
</div>
<!--<div id=\"videme-showcase-video\" class=\"videme-showcase-video\">
</div>-->
<a class='image-url' 
user_display_name='" . $htmlImageEvent['user_display_name'] . "' 
created_at='" . $htmlImageEvent['created_at'] . "' 
title='" . $htmlImageEvent['title'] . "' 
content='" . $htmlImageEvent['content'] . "' 
user_picture='" . $htmlImageEvent['user_picture'] . "' 
item_id='" . $htmlImageEvent['item_id'] . "' 
href='https://www.vide.me/i/?i=" . $htmlImageEvent['item_id'] . "'>
<div class=\"videme-modal-item-image-place\"><img src=\"" . $this->origin_img_vide_me . $htmlImageEvent['cover'] . "\"
                                                class=\"videme-modal-item-image\"/></div>
</a>

<div class=\"px-2 py-2\">
    <!--<img class=\"mr-3 videme-relation-card-img\" id='videme_showcase_user_picture' src=\"\" alt=\"\"/>-->
    <h5 class=\"mt-0 videme-showcase-from_user_name\"><a href='https://vide.me/" . $htmlImageEvent['spring'] . "/'>" . $htmlImageEvent['user_display_name'] . "</a>
    </h5>
    <div class=\"videme-showcase-subject\">" . $this->welcome->safetyTagsSlashesTrim4096($htmlImageEvent['title']) . "
    </div>
    <div class=\"videme-showcase-message\">" . $htmlImageEvent['content'] . "
    </div>
    <div class=\"text-muted videme-showcase-createdat\">" . $this->welcome->pgTimeToHuman($htmlImageEvent['created_at']) . "
    </div>
    <div class='container'>
        <div class='row'>
            <div class='videme_showcase_item_info'></div>
        </div>
    </div>
    <div class=\"videme-showcase-tags hidden\">
        tags
    </div>
</div>

<!--<div class=\"media\">
    <img class=\"mr-3 videme-showcase-user_picture\" src=\"https://s3.amazonaws.com/img.vide.me/" . $htmlImageEvent['user_picture'] . ".jpg\"
         alt=\"\"/>
    <div class=\"media-body\">
        <h5 class=\"mt-0 videme-showcase-from_user_name\">" . $htmlImageEvent['user_display_name'] . "</h5>
        <div class=\"videme-showcase-subject\">
            " . $htmlImageEvent['title'] . "
        </div>
        <div class=\"videme-showcase-message\">
            " . $htmlImageEvent['content'] . "
        </div>
        <div class=\"videme-showcase-createdat\">
            " . $htmlImageEvent['created_at'] . "
        </div>
    </div>
</div>
<div class=\"videme-showcase-tags\">
    tags
</div>-->
        ";
    }

    public function htmlImageEventV3($htmlImageEventV3)
    {
        if ($htmlImageEventV3['embed']) {
            $htmlShowcasePanelInfoV3 = '';
        } else {
            $htmlShowcasePanelInfoV3 =  $this->htmlShowcasePanelInfoV3($htmlImageEventV3);
        }
        return "<div class=\"videme-showcase-header\"></div>
<!--<div id=\"videme-showcase-video\" class=\"videme-showcase-video\">
</div>-->
<a id='videme-showcase-item-cover' class='image-url' 
user_display_name='" . $htmlImageEventV3['user_display_name'] . "' 
created_at='" . $htmlImageEventV3['created_at'] . "' 
title='" . $htmlImageEventV3['title'] . "' 
content='" . $htmlImageEventV3['content'] . "' 
user_picture='" . $htmlImageEventV3['user_picture'] . "' 
item_id='" . $htmlImageEventV3['item_id'] . "' 
href='https://www.vide.me/i/?i=" . $htmlImageEventV3['item_id'] . "'>
<div class=\"videme-modal-item-image-place\"><img src=\"" . $this->origin_img_vide_me . $htmlImageEventV3['cover'] . "\"
                                                class=\"videme-modal-item-image\"/></div>
</a>

<!--<div class=\"px-2 py-2\">
    <h5 class=\"mt-0 videme-showcase-from_user_name\"><a href='https://vide.me/" . $htmlImageEventV3['spring'] . "/'>" . $htmlImageEventV3['user_display_name'] . "</a>
    </h5>
    <div class=\"videme-showcase-subject\">" . $this->welcome->safetyTagsSlashesTrim4096($htmlImageEventV3['title']) . "
    </div>
    <div class=\"videme-showcase-message\">" . $htmlImageEventV3['content'] . "
    </div>
    <div class=\"text-muted videme-showcase-createdat\">" . $this->welcome->pgTimeToHuman($htmlImageEventV3['created_at']) . "
    </div>
    <div class='container'>
        <div class='row'>
            <div class='videme_showcase_item_info'></div>
        </div>
    </div>
    <div class=\"videme-showcase-tags hidden\">
        tags
    </div>
</div>-->

<!--<div class=\"media\">
    <img class=\"mr-3 videme-showcase-user_picture\" src=\"https://s3.amazonaws.com/img.vide.me/" . $htmlImageEventV3['user_picture'] . ".jpg\"
         alt=\"\"/>
    <div class=\"media-body\">
        <h5 class=\"mt-0 videme-showcase-from_user_name\">" . $htmlImageEventV3['user_display_name'] . "</h5>
        <div class=\"videme-showcase-subject\">
            " . $htmlImageEventV3['title'] . "
        </div>
        <div class=\"videme-showcase-message\">
            " . $htmlImageEventV3['content'] . "
        </div>
        <div class=\"videme-showcase-createdat\">
            " . $htmlImageEventV3['created_at'] . "
        </div>
    </div>
</div>
<div class=\"videme-showcase-tags\">
    tags
</div>-->
        " . $htmlShowcasePanelInfoV3;
    }

    public function htmlButtonShowcase()
    {
        return "
            <div class='videme-showcase-button'>
            <a class=\"btn btn-warning reply-toggle hidden\" href=\"#\" role=\"button\">
                <span class='glyphicon glyphicon-envelope'>
                </span>
                Reply
            </a>
            <button type='button' class='btn btn-outline-success contact-toggle hidden' data-bs-toggle='modal'
                    data-bs-target='#modal-contact' id='contact-toggle-showcase'>
                    <span class='glyphicon glyphicon-envelope'>
                    </span>
                Send
            </button>
            <button type='button' class='btn btn-outline-success list-toggle hidden' data-bs-toggle='modal'
                    data-bs-target='#modal-list' id='list-toggle-showcase'>
                    <span class='glyphicon glyphicon-envelope'>
                    </span>
                Share
            </button>
            <button type='button' class='btn btn-outline-primary item-edit-toggle hidden' data-bs-toggle='modal' data-bs-target='#modal-item-edit' id='item-edit-toggle-showcase'>
                    <span class='glyphicon glyphicon-remove'>
                    </span>
                Edit
            </button>
            <!--<button type='button' class='btn btn-default share-toggle hidden' data-toggle='modal'
                    data-target='#modal-del'>
                <span class='glyphicon glyphicon-envelope'>
                </span>
                delete
            </button>-->
            </div>
        ";
    }

    public function htmlButtonFBSendMessage()
    {
        if (!empty($_REQUEST["m"])) {
            $m = $_REQUEST["m"];
        } else {
            $m = "";
        }

        if (!empty($_REQUEST["messageid"])) {
            $messageid = $_REQUEST["messageid"];
        } else {
            $messageid = "";
        }
        return "
        <button id='fb-send-message' class=\"btn btn-outline-secondary fb-send-message hidden\" type=\"button\"
                file='" . $m . "' messageid='" . $messageid . "'>
        		<span class='glyphicon glyphicon-envelope'>
                </span>
            Send to my friend on Facebook
        </button>
        ";
    }

    public function htmlButtonSocShare3B()
    {
        return "
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $(\"#videme-soc-share-3b\").jsSocials({
                    shares: [\"twitter\", \"facebook\", \"googleplus\"],
                    showLabel: false,
                    showCount: true,
                    shareIn: 'popup'
                });
            });
        </script>
        <div class='videme-soc-share ml-auto'>
        <div id=\"videme-soc-share-3b\"></div>
        </div>
        ";
    }

    public function htmlButtonSocShareAll()
    {
        return "
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $(\"#videme-soc-share-all\").jsSocials({
                    shares: [\"twitter\", \"facebook\", \"googleplus\", \"linkedin\", \"email\",  \"pinterest\", \"stumbleupon\", \"whatsapp\"],
                    showLabel: true,
                    showCount: true,
                    shareIn: 'popup'
                });
            });
        </script>
        <div id=\"videme-soc-share-all\" style='font-size: .8rem;'></div>
        ";
    }

    public function htmlButtonSocShareAllNoLabel()
    {
        return "
<script type=\"text/javascript\">
      require(['jquery', 'videme_jq'], function( $ ) {
                //url: https://www.vide.me/a/?a=,
            $(document).ready(function () {
            //var url = removeParam('fbclid', window.location.href);
            var url = removeURLParameter(window.location.href, 'fbclid');
            window.history.pushState({}, document.title, url);
            url = removeURLParameter(url, 'viewed');
            url = removeURLParameter(url, 'show');
            url = removeURLParameter(url, 'post_id');
            console.log('Clear URL ' , url);
                $(\"#videme-soc-share-all\").jsSocials({
                    shares: [\"twitter\", \"facebook\", \"linkedin\", \"email\",  \"pinterest\", \"stumbleupon\", \"whatsapp\"],
                    url: url,
                    showLabel: false,
                    showCount: true,
                    shareIn: 'popup'
                });
                
            });
    });
</script>
        <div id=\"videme-soc-share-all\" style='font-size: .8rem;'></div>
        ";
    }

    public function htmlButtonSocShareAllModal()
    {
        return "
        <div id=\"videme-soc-share-all-modal\" style='font-size: .8rem;'></div>
        ";
    }

    public function htmlConference($contentInfo)
    {
        $sendmail = new sendmail();

        $conference = "";

        if (!empty($contentInfo["conferenceId"])) {
            $fileInfo2 = $sendmail->converseEmails($contentInfo);
            $conference = "<br />In conference: <br />";
            foreach ($fileInfo2["recipients"] as $key => $val) {
                //echo "[ " . $val . " ]<br />";
                $conference .= "<span class=\"label label-primary\">" . $val . "</span>&nbsp;";
            }
        }

        return "
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $(\"#share\").jsSocials({
                    shares: [\"twitter\", \"facebook\", \"googleplus\", \"linkedin\", \"pinterest\", \"whatsapp\", \"line\", \"stumbleupon\", \"email\"]
                });
            });
        </script>
        <div id=\"share\"></div>
        ";
    }

    public function htmlSampleUpload()
    {
        return "
        <script type=\"text/javascript\">
                require(['jquery', 'videme_jq'], function( $ ) {

            $(document).ready(function () {
                $('#timer').pietimer({
                        seconds: 5,
                        color: 'rgba(102, 0, 255, 0.8)',
                        height: 40,
                        width: 40
                    },
                    function () {
                        console.log(\"pietimer -----> location.reload();\");
                    });
                setInterval(function () {
                    $.fn.showMyTask({
                        limit: 6,
                        showcaseMyTask: \"#videme-my-task\"
                    });
                    $('#timer').pietimer('start');
                }, 5000);

                $('input[type=\"file\"]').change(function(e){
                    var fullFileName = e.target.files[0].name;
                    var fileName = fullFileName.split('.').slice(0, -1).join('.');
                    //console.log('file: ', fileName);
                    //fileName.substr(0, fileName.lastIndexOf(\".\"));
                    $(\"#title_for_video\").val(fileName);
                    $(\"#title_image\").val(fileName);


                });
            });
            });
        </script>
        
        <div class='videme-tile-item-title'>Select your files to upload to the service of the Vide.me.</div>
            


        <!-- The file upload form used as target for the file upload widget -->
        <form id=\"fileupload\" action=\"//api.vide.me/upload/\" method=\"POST\" enctype=\"multipart/form-data\">
            <!-- Redirect browsers with JavaScript disabled to the origin page -->
            <!--<noscript><input type=\"hidden\" name=\"redirect\" value=\"https://api.vide.me/upload/\"/>
            </noscript>-->
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <input id='videme-upload-video-ticket_id' class='hidden'/>
            <input id='videme-upload-video-ticket' class='hidden'/>
            <div class=\"row fileupload-buttonbar\">
                <div class=\"col-lg-7\">
                 <div class=\"btn-group\">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span type='button' class=\"btn btn-outline-success fileinput-button\" id='videme-button-upload-video'>
                        <i class=\"glyphicon glyphicon-plus\"></i>
                        <span class=\"fa fa-video-camera fa-lg\" aria-hidden=\"true\"></span>
                        Upload video
                        <input type=\"file\" name=\"files[]\" accept=\"video/*\"/>
                    </span>
                    <a role=\"button\" class=\"btn btn-outline-primary\" id='upload_image' href='' feedback='' data-toggle=\"modal\" data-target=\"\" >
                        <span class=\"fa fa-photo fa-lg\" aria-hidden=\"true\"></span>
                        Upload image
                    </a>
                 </div> 
                    <!--<button type=\"submit\" class=\"btn btn-primary start\">
                        <i class=\"glyphicon glyphicon-upload\"></i>
                        <span>Start upload</span>
                    </button>
                    <button type=\"reset\" class=\"btn btn-warning cancel\">
                        <i class=\"glyphicon glyphicon-ban-circle\"></i>
                        <span>Cancel upload</span>
                    </button>
                    <button type=\"button\" class=\"btn btn-danger delete\">
                        <i class=\"glyphicon glyphicon-trash\"></i>
                        <span>Delete</span>
                    </button>
                    <input type=\"checkbox\" class=\"toggle\"/>-->
                    <!-- The global file processing state -->
                    <span class=\"fileupload-process\"></span>
                </div>
                <!-- The global progress state -->
                <div class=\"col-lg-5 fileupload-progress fade\">
                    <!-- The global progress bar -->
                    <div class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\"
                         aria-valuemax=\"100\">
                        <div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div>
                    </div>
                    <!-- The extended global progress state -->
                    <div class=\"progress-extended\">&#160;</div>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role=\"presentation\" class=\"table table-striped\">
                <tbody class=\"files\"></tbody>
            </table>
        </form>
        <div class=\"alert alert-secondary\" role=\"alert\">
          <h5 class=\"alert-heading\">Upload notes</h5>
                <ul>
                    <li>The maximum file size for uploads is <strong>300 MB</strong>.
                    </li>
                    <li>Only video files (<strong>mp4, 3gp, mkv, webm, flv, mpg, mpeg, wmf, avi, mov, vob, rm, rmvb</strong>) are allowed.
                    </li>
                </ul>
        </div>
        <!--<div id='timer'></div>-->
        <div id=\"videme-my-task\" class=\"\"></div>
<!-- The blueimp Gallery widget -->
<div id=\"blueimp-gallery\" class=\"blueimp-gallery blueimp-gallery-controls\" data-filter=\":even\">
    <div class=\"slides\"></div>
    <h3 class=\"title\"></h3>
    <a class=\"prev\">‹</a>
    <a class=\"next\">›</a>
    <a class=\"close\">×</a>
    <a class=\"play-pause\"></a>
    <ol class=\"indicator\"></ol>
</div>
";
    }

    public function htmlSampleUploadTest($userList) // why for???
    {
        return
            "<style>

</style>

<!--<div class=\"toast videme-toast-upload-end\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">
  <div class=\"toast-header\">
    <svg class=\"bd-placeholder-img rounded mr-2\" width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\"><rect width=\"100%\" height=\"100%\" fill=\"#007aff\"></rect></svg>
    <strong class=\"mr-auto\">Upload</strong>
    <small>1 mins ago</small>
    <button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&#215;</span>
    </button>
  </div>
  <div class=\"toast-body\">
    Ready for publication.
  </div>
</div>-->

<script type=\"text/javascript\">
    $(document).ready(function () {

        $('#timer').pietimer({
                seconds: 5,
                color: 'rgba(102, 0, 255, 0.8)',
                height: 40,
                width: 40
            },
            function () {
                console.log(\"pietimer -----> location.reload();\");
            });
        setInterval(function () {
            $.fn.showMyTaskById({
                task_id: $('#videme-upload-video-ticket_id').val(),
                showcaseMyTask: \"#videme_last_task\"
            });
            $.fn.showMyTask({
                limit: 6,
                showcaseMyTask: \"#videme-my-task\"
            });
            $('#timer').pietimer('start');
        }, 5000);
        //$('input[type=\"file\"]').change(function (e) {
        //$('.videme_upload_video_file').change(function (e) {
        $(document).on(\"change\", \".videme_upload_video_file\", function (e) {
            console.log(\"input[type='file' change\");

            /*console.log(\"input[type='file' name\", e.target.files[0].name);
            console.log(\"input[type='file' mozFullPath\", e.target.files[0].mozFullPath);
            console.dir(this.files[0]);
            var upload_object = this.files[0];
            console.log('upload_object', upload_object);
            console.log('upload_object.preview', upload_object.preview);
            console.log('upload_object.File.preview', upload_object.File.preview);*/

            //$('.videme-upload-video-preview').html(this.files[0].preview);
            //===var source = $('#video_here');
            //===source[0].src = URL.createObjectURL(this.files[0]);
            //===source.parent()[0].load();
            //==var filename = $('#fileInput').get(0).files[0].name;

            var fileUrl = URL.createObjectURL(this.files[0]);
            console.log('fileUrl', fileUrl);
            var fileType = this.files[0].type;
            console.log('fileType', fileType);

            //var file = document.getElementById('videme_upload_video_file');

            var options = {};

            var player = videojs('my-video_upload', options, function onPlayerReady() {
                //videojs.log('Your player is ready!');
                /*this.src({
                    type: \"video/mp4\",
                    //src: 'http://techslides.com/demos/sample-videos/small.mp4'
                    //src: art_file.name
                    //src: file
                    //type: fileType,
                    src: file_src
                });*/

                this.src({type: fileType, src: fileUrl});
                this.currentTime(3);

                //this.src(file.value);

                // In this context, `this` is the player that was created by Video.js.
                //this.play();
                this.on(\"pause\", function () {
                    this.bigPlayButton.show();
                });
                // How about an event listener?
                this.on('ended', function () {
                    videojs.log('Awww...over so soon?!');
                });

                this.player().on('error', function (e) {
                    console.log(e);
                    e.stopImmediatePropagation();
                    var error = this.player().error();
                    console.log('error!', error.code, error.type, error.message);
                    /*$('.videme-upload-video-preview').html('<div class=\"videme-preview-unavailable-panel\">' +
                        '<img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_bf.svg\" class=\"mx-auto d-block videme-preview-unavailable-img\" alt=\"\"/>' +
                        '<div class=\"text-center text-muted videme-preview-unavailable-text\">There is no preview for this file type.</div>' +
                        '</div>');*/
                        $('.videme-upload-video-preview').addClass('hidden');
                        $('.videme-preview-unavailable-panel').removeClass('hidden');


                });
            });


            var fullFileName = e.target.files[0].name;
            var fileName = fullFileName.split('.').slice(0, -1).join('.');
            //console.log('file: ', fileName);
            //fileName.substr(0, fileName.lastIndexOf(\".\"));
            //$('#upload_public_submit').addClass('disabled');
            $(\"#upload_public_submit\").attr('disabled', true);
            $(\"#title_for_video\").val(fileName);
            $(\"#title_image\").val(fileName);
            $('#videme-upload-video-ticket_id_for_uploader').val($('#videme-upload-video-ticket_id').val());
            $('#videme-upload-video-cancel').attr('ticket_id', $('#videme-upload-video-ticket_id').val());
            //console.log('#input[type=file] -----> data.value:', $('#videme-upload-video-ticket_id').val());
            $('#content').val('');
            $('.videme-upload-video-preview-panel').removeClass('hidden');
            $('.videme-upload-video-preview').removeClass('hidden');
            $('.videme-upload-user-form').removeClass('hidden');
            $('.videme-preview-unavailable-panel').addClass('hidden');

        });
    });
</script>

<!--<div class='videme-tile-item-title'>Select your files to upload to the service of the Vide.me.</div>-->
<!-- The file upload form used as target for the file upload widget -->
<form id=\"fileupload\" action=\"https://api.vide.me/upload/\" method=\"POST\" enctype=\"multipart/form-data\">
    <!--<form class=\"form-vertical\" id=\"upload_public\" name=\"upload_public\" role=\"form\">-->
    <!-- Redirect browsers with JavaScript disabled to the origin page -->
    <!--<noscript><input type=\"hidden\" name=\"redirect\" value=\"https://api.vide.me/upload/\"/>
    </noscript>-->
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->

    <div class=\"fileupload-buttonbar\">
        <!--<div class=\"col-lg-7\">-->
        <div class=\"btn-group\">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span type='button' class=\"btn btn-outline-success fileinput-button\" id='videme-button-upload-video'>
                        <i class=\"glyphicon glyphicon-plus\"></i>
                        <span class=\"fa fa-video-camera fa-lg\" aria-hidden=\"true\"></span>
                        Upload video
                        <input type=\"file\" name=\"files[]\" class='videme_upload_video_file' accept=\"video/*\"/>
                    </span>
            <a role=\"button\" class=\"btn btn-outline-primary\" id='upload_image' href='' feedback=''
               data-toggle=\"modal\" data-target=\"\">
                <span class=\"fa fa-photo fa-lg\" aria-hidden=\"true\"></span>
                Upload image
            </a>
        </div>
        <!--<button type=\"submit\" class=\"btn btn-primary start\">
            <i class=\"glyphicon glyphicon-upload\"></i>
            <span>Start upload</span>
        </button>
        <button type=\"reset\" class=\"btn btn-warning cancel\">
            <i class=\"glyphicon glyphicon-ban-circle\"></i>
            <span>Cancel upload</span>
        </button>
        <button type=\"button\" class=\"btn btn-danger delete\">
            <i class=\"glyphicon glyphicon-trash\"></i>
            <span>Delete</span>
        </button>
        <input type=\"checkbox\" class=\"toggle\"/>-->
        <!-- The global file processing state -->
        <!--<span class=\"fileupload-process\"></span>-->
        <!--</div>-->
        <!-- The global progress state -->
        <!--<div class=\"col-lg-5 fileupload-progress fade\">-->
        <!-- The global progress bar -->
        <!--<div id='' class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\"
             aria-valuemax=\"100\">
            <div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div>
        </div>-->
        <!-- The extended global progress state -->
        <!--<div class=\"progress-extended\">&#160;</div>-->
        <!--</div>-->
    </div>


    <!--    <div class='videme-upload-video-preview hidden bg-warning'>
    
                <div class='videme-upload-video-preview'>
                <video id='my-video_upload' class='video-js vjs-big-play-centered' controls='controls' preload='auto' 
                 data-setup='{\"fluid\": true}'>
                  <p class='vjs-no-js'>
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                  </p>
                </video>
            </div>
        </div>-->
    <input type='text' name='ticket_id' id='videme-upload-video-ticket_id_for_uploader' class='hidden'/>

    <!-- The table listing the files available for upload/download 
    <table role=\"presentation\" class=\"table table-striped\">
        <tbody class=\"files\"></tbody>
    </table>-->
</form>

<div class='videme-upload-user-form hidden'>
    <form class=\"form-vertical\" id=\"upload_public\" name=\"upload_public\" role=\"form\">

        <!--<div class='videme-upload-video-preview'>
            <video id='my-video_upload' class='video-js vjs-big-play-centered' controls='controls' preload='auto' 
             data-setup='{\"fluid\": true}'>
              &lt;!&ndash;<source src=\"\" id=\"video_here\"/>&ndash;&gt;
              <p class='vjs-no-js'>
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
              </p>
            </video>
        </div>-->

        <input type='text' name='ticket_id' id='videme-upload-video-ticket_id' class='hidden'/>
        <!--<input type='text' name='ticket' id='videme-upload-video-ticket' class=''/>-->

        <!--<div class=\"progress\">
          <div id='videme_upload_progress' class=\"progress-bar progress-bar-striped progress-bar-animated\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"\"></div>
        </div>-->


        <div class='container-fluide'>
            <div class='row'>
                <div class='col-8'>
                    <div class='videme-upload-video-preview-panel hidden'> <!-- ??? -->

                        <div class='videme-upload-video-preview'>
                            <video id='my-video_upload' class='video-js vjs-big-play-centered' controls='controls'
                                   preload='auto'
                                   data-setup='{\"fluid\": true}'>
                                <p class='vjs-no-js'>
                                    To view this video please enable JavaScript, and consider upgrading to a web browser
                                    that
                                    <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5
                                        video</a>
                                </p>
                            </video>
                            <!--<video id='my-video_upload' class='' controls='controls' preload='auto'>
                             <source src=\"\" id=\"video_here\"/>
                            </video>-->
                        </div>
                        

                        <div class='text-center videme-preview-unavailable-panel hidden'>
                        <div class='videme-preview-unavailable-icon'></div>
                        <div class='videme-preview-unavailable-status'></div>
                        <div class='text-muted videme-preview-unavailable-text'>There is no preview for this file type.</div>
                        </div>
                    </div>
                </div>
                <div class='col-4'>
                    <div class='videme-upload-video-right-panel-1'>

                        <button type=\"submit\" class=\"btn btn-primary videme-round-button\" id=\"upload_public_submit\"
                                name=\"\">
                            Publish
                            <div class=\"videme-progress\"></div>
                        </button>
                        <hr/>
                    </div>
                    <div class='videme-upload-video-right-panel-2'>
                        " . $userList . "
                    </div>
                    <div class='videme-upload-video-right-panel-3'>
                        <hr/>
                        <div class='videme-uploader-status'></div>
                        <a href='https://www.vide.me/web/upload/' class='videme-upload-video-cancel'
                           id='videme-upload-video-cancel'>Cancel</a>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"\">
            <div class=\"progress\">
                <div id=\"videme_upload_progress\" class=\"progress-bar progress-bar-striped progress-bar-animated\"
                     role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"\"></div>
                <!--<div id=\"videme_conversion_progress\" class=\"progress-bar bg-success progress-bar-striped progress-bar-animated\"
                     role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"\"></div>-->
            </div>
        </div>

        <!-- The table listing the files available for upload/download -->
        <table role=\"presentation\" class=\"table table-striped\">
            <tbody class=\"files\"></tbody>
        </table>

        <div class=\"form-group\">
            <!--<label for=\"subject\">Title</label>-->
            <input type=\"text\" class=\"form-control\" id=\"title_for_video\" name=\"title\" placeholder=\"Title\"/>
        </div>
        <div class=\"form-group\">
            <!--<label for=\"message\">Content</label>-->
            <input type=\"text\" class=\"form-control\" id=\"content\" name=\"content\" placeholder=\"Content\"/>
        </div>
    </form>
</div>


<div class=\"alert alert-secondary\" role=\"alert\">
    <h5 class=\"alert-heading\">Upload notes</h5>
    <ul>
        <li>The maximum file size for uploads is <strong>300 MB</strong>.
        </li>
        <li>Only video files (<strong>mp4, 3gp, mkv, webm, flv, mpg, mpeg, wmf, avi, mov, vob, rm, rmvb</strong>) are
            allowed.
        </li>
    </ul>
</div>

<!--<div id='timer'></div>-->
<div id=\"videme-my-task\" class=\"\"></div>
<!-- The blueimp Gallery widget -->
<div id=\"blueimp-gallery\" class=\"blueimp-gallery blueimp-gallery-controls\" data-filter=\":even\">
    <div class=\"slides\"></div>
    <h3 class=\"title\"></h3>
    <a class=\"prev\">‹</a>
    <a class=\"next\">›</a>
    <a class=\"close\">×</a>
    <a class=\"play-pause\"></a>
    <ol class=\"indicator\"></ol>
</div>
";
    }

    public function htmlSampleUploadTestModal($userList) // remove
    {
        return
            "<style>
</style>
<script type=\"text/javascript\">
    $(document).ready(function () {
        /*$('#timer').pietimer({
                seconds: 5,
                color: 'rgba(102, 0, 255, 0.8)',
                height: 40,
                width: 40
            },
            function () {
                console.log(\"pietimer -----> location.reload();\");
            });
        setInterval(function () {
            $.fn.showMyTaskById({
                task_id: $('#videme-upload-video-ticket_id').val(),
                showcaseMyTask: \"#videme_last_task\"
            });
            /!*$.fn.showMyTask({
                limit: 6,
                showcaseMyTask: \"#videme-my-task\"
            });*!/
            $('#timer').pietimer('start');
        }, 5000);*/
        //$('input[type=\"file\"]').change(function (e) {
        //$('.videme_upload_video_file').change(function (e) {
        /*$(document).on(\"change\", \".videme_upload_video_file\", function (e) {
            console.log(\"input[type='file' change\");

            console.log(\"input[type='file' name\", e.target.files[0].name);
            console.log(\"input[type='file' mozFullPath\", e.target.files[0].mozFullPath);
            console.dir(this.files[0]);
            var upload_object = this.files[0];
            console.log('upload_object', upload_object);
            console.log('upload_object.preview', upload_object.preview);
            console.log('upload_object.File.preview', upload_object.File.preview);*/

            //$('.videme-upload-video-preview').html(this.files[0].preview);
            //===var source = $('#video_here');
            //===source[0].src = URL.createObjectURL(this.files[0]);
            //===source.parent()[0].load();
            //==var filename = $('#fileInput').get(0).files[0].name;

/*            var fileUrl = URL.createObjectURL(this.files[0]);
            console.log('fileUrl', fileUrl);
            var fileType = this.files[0].type;
            console.log('fileType', fileType);

            //var file = document.getElementById('videme_upload_video_file');

            var options = {};

            var player = videojs('my-video_upload', options, function onPlayerReady() {
                //videojs.log('Your player is ready!');
                /!*this.src({
                    type: \"video/mp4\",
                    //src: 'http://techslides.com/demos/sample-videos/small.mp4'
                    //src: art_file.name
                    //src: file
                    //type: fileType,
                    src: file_src
                });*!/

                this.src({type: fileType, src: fileUrl});
                this.currentTime(3);

                //this.src(file.value);

                // In this context, `this` is the player that was created by Video.js.
                //this.play();
                this.on(\"pause\", function () {
                    this.bigPlayButton.show();
                });
                // How about an event listener?
                this.on('ended', function () {
                    videojs.log('Awww...over so soon?!');
                });

                this.player().on('error', function (e) {
                    console.log(e);
                    e.stopImmediatePropagation();
                    var error = this.player().error();
                    console.log('error!', error.code, error.type, error.message);
                    /!*$('.videme-upload-video-preview').html('<div class=\"videme-preview-unavailable-panel\">' +
                        '<img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_bf.svg\" class=\"mx-auto d-block videme-preview-unavailable-img\" alt=\"\"/>' +
                        '<div class=\"text-center text-muted videme-preview-unavailable-text\">There is no preview for this file type.</div>' +
                        '</div>');*!/
                        $('.videme-upload-video-preview').addClass('hidden');
                        $('.videme-preview-unavailable-panel').removeClass('hidden');


                });
            });


            var fullFileName = e.target.files[0].name;
            var fileName = fullFileName.split('.').slice(0, -1).join('.');
            //console.log('file: ', fileName);
            //fileName.substr(0, fileName.lastIndexOf(\".\"));
            //$('#upload_public_submit').addClass('disabled');
            $(\"#upload_public_submit\").attr('disabled', true);
            $(\"#title_for_video\").val(fileName);
            $(\"#title_image\").val(fileName);
            $('#videme-upload-video-ticket_id_for_uploader').val($('#videme-upload-video-ticket_id').val());
            $('#videme-upload-video-cancel').attr('ticket_id', $('#videme-upload-video-ticket_id').val());
            //console.log('#input[type=file] -----> data.value:', $('#videme-upload-video-ticket_id').val());
            $('#content').val('');
            $('.videme-upload-video-preview-panel').removeClass('hidden');
            $('.videme-upload-video-preview').removeClass('hidden');
            $('.videme-upload-user-form').removeClass('hidden');
            $('.videme-preview-unavailable-panel').addClass('hidden');

        });*/
    });
</script>
            <a role=\"button\" class=\"btn btn-outline-primary\" id='videme_upload_video_image' href='' feedback=''
               data-toggle=\"modal\" data-target=\"\">
                <span class=\"fa fa-photo fa-lg\" aria-hidden=\"true\"></span>
                Upload image
            </a>
<div id=\"videme-my-task\" class=\"\"></div>

<br/>
    <input type=\"file\" class=\"custom-file-input\" id=\"inputGroupFile01\" aria-describedby=\"inputGroupFileAddon01\" />

<br/>
<div class=\"input-group mb-3\">
  <!--<div class=\"input-group-prepend\">
    <span class=\"input-group-text\" id=\"inputGroupFileAddon01\">Upload</span>
  </div>-->
  <div class=\"custom-file\">
    <input type=\"file\" class=\"custom-file-input\" id=\"inputGroupFile01\" aria-describedby=\"inputGroupFileAddon01\" />
    <label class=\"custom-file-label\" for=\"inputGroupFile01\">Choose file</label>
  </div>
</div>

";
    }

    public function htmlSampleUploadTest18042019($userList) // remvoe
    {
        return
            "<style>
</style>

<div class=\"toast videme-toast-upload-end\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">
  <div class=\"toast-header\">
    <svg class=\"bd-placeholder-img rounded mr-2\" width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\"><rect width=\"100%\" height=\"100%\" fill=\"#007aff\"></rect></svg>
    <strong class=\"mr-auto\">Upload</strong>
    <small>1 mins ago</small>
    <button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&#215;</span>
    </button>
  </div>
  <div class=\"toast-body\">
    Ready for publication.
  </div>
</div>

<script type=\"text/javascript\">
    $(document).ready(function () {

        $('#timer').pietimer({
                seconds: 5,
                color: 'rgba(102, 0, 255, 0.8)',
                height: 40,
                width: 40
            },
            function () {
                console.log(\"pietimer -----> location.reload();\");
            });
        setInterval(function () {
            $.fn.showMyTaskById({
                task_id: $('#videme-upload-video-ticket_id').val(),
                showcaseMyTask: \".videme_last_task_icon\"
            });
            $.fn.showMyTask({
                limit: 6,
                showcaseMyTask: \"#videme-my-task\"
            });
            $('#timer').pietimer('start');
        }, 15000);
        //$('input[type=\"file\"]').change(function (e) {
        //$('.videme_upload_video_file').change(function (e) {
        $(document).on(\"change\", \".videme_upload_video_file\", function (e) {
            console.log(\"input[type='file' change\");

            /*console.log(\"input[type='file' name\", e.target.files[0].name);
            console.log(\"input[type='file' mozFullPath\", e.target.files[0].mozFullPath);
            console.dir(this.files[0]);
            var upload_object = this.files[0];
            console.log('upload_object', upload_object);
            console.log('upload_object.preview', upload_object.preview);
            console.log('upload_object.File.preview', upload_object.File.preview);*/

            //$('.videme-upload-video-preview').html(this.files[0].preview);
            //===var source = $('#video_here');
            //===source[0].src = URL.createObjectURL(this.files[0]);
            //===source.parent()[0].load();
            //==var filename = $('#fileInput').get(0).files[0].name;

            var fileUrl = URL.createObjectURL(this.files[0]);
            console.log('fileUrl', fileUrl);
            var fileType = this.files[0].type;
            console.log('fileType', fileType);

            //var file = document.getElementById('videme_upload_video_file');

            var options = {};

            var player = videojs('my-video_upload', options, function onPlayerReady() {
                //videojs.log('Your player is ready!');
                /*this.src({
                    type: \"video/mp4\",
                    //src: 'http://techslides.com/demos/sample-videos/small.mp4'
                    //src: art_file.name
                    //src: file
                    //type: fileType,
                    src: file_src
                });*/

                this.src({type: fileType, src: fileUrl});
                this.currentTime(3);

                //this.src(file.value);

                // In this context, `this` is the player that was created by Video.js.
                //this.play();
                this.on(\"pause\", function () {
                    this.bigPlayButton.show();
                });
                // How about an event listener?
                this.on('ended', function () {
                    videojs.log('Awww...over so soon?!');
                });

                this.player().on('error', function (e) {
                    console.log(e);
                    e.stopImmediatePropagation();
                    var error = this.player().error();
                    console.log('error!', error.code, error.type, error.message);
                    //$('.videme-upload-video-preview').html('<img src=\"https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/videme_bf.svg\" class=\"d-inline-block align-top videme-preview-unavailable-img\" alt=\"\"/><div class=\"text-muted videme-preview-unavailable-text\">Preview unavailable</div>');
                    
                    $('.videme-upload-video-preview').addClass('hidden');

                    //$('.videme_last_task_panel').removeClass('hidden');
                    $('.videme-toast-no-preview').toast('show');

                });
            });


            var fullFileName = e.target.files[0].name;
            var fileName = fullFileName.split('.').slice(0, -1).join('.');
            //console.log('file: ', fileName);
            //fileName.substr(0, fileName.lastIndexOf(\".\"));
            //$('#upload_public_submit').addClass('disabled');
            $(\"#upload_public_submit\").attr('disabled', true);
            $(\"#title_for_video\").val(fileName);
            $(\"#title_image\").val(fileName);
            $('#videme-upload-video-ticket_id_for_uploader').val($('#videme-upload-video-ticket_id').val());
            $('#videme-upload-video-cancel').attr('ticket_id', $('#videme-upload-video-ticket_id').val());
            //console.log('#input[type=file] -----> data.value:', $('#videme-upload-video-ticket_id').val());
            $('#content').val('');
            $('.videme_last_task_panel').addClass('hidden');
            $('.videme-select-access').addClass('hidden');
            $('.videme-upload-user-form').removeClass('hidden');
            $('.videme-upload-panel').removeClass('hidden');
            /*$('#upload_public').removeClass('form-vertical');
            $('#upload_public').addClass('form-inline');*/
            

        });
    });
</script>

<!--<div class='videme-tile-item-title'>Select your files to upload to the service of the Vide.me.</div>-->
<!-- The file upload form used as target for the file upload widget -->
<form id=\"fileupload\" action=\"https://api.vide.me/upload/\" method=\"POST\" enctype=\"multipart/form-data\">
    <!--<form class=\"form-vertical\" id=\"upload_public\" name=\"upload_public\" role=\"form\">-->
    <!-- Redirect browsers with JavaScript disabled to the origin page -->
    <!--<noscript><input type=\"hidden\" name=\"redirect\" value=\"https://api.vide.me/upload/\"/>
    </noscript>-->
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->

    <div class=\"fileupload-buttonbar\">
        <!--<div class=\"col-lg-7\">-->
        <div class=\"btn-group\">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span type='button' class=\"btn btn-outline-success fileinput-button\" id='videme-button-upload-video'>
                        <i class=\"glyphicon glyphicon-plus\"></i>
                        <span class=\"fa fa-video-camera fa-lg\" aria-hidden=\"true\"></span>
                        Upload video
                        <input type=\"file\" name=\"files[]\" class='videme_upload_video_file' accept=\"video/*\"/>
                    </span>
            <a role=\"button\" class=\"btn btn-outline-primary\" id='upload_image' href='' feedback=''
               data-toggle=\"modal\" data-target=\"\">
                <span class=\"fa fa-photo fa-lg\" aria-hidden=\"true\"></span>
                Upload image
            </a>
        </div>
        <!--<button type=\"submit\" class=\"btn btn-primary start\">
            <i class=\"glyphicon glyphicon-upload\"></i>
            <span>Start upload</span>
        </button>
        <button type=\"reset\" class=\"btn btn-warning cancel\">
            <i class=\"glyphicon glyphicon-ban-circle\"></i>
            <span>Cancel upload</span>
        </button>
        <button type=\"button\" class=\"btn btn-danger delete\">
            <i class=\"glyphicon glyphicon-trash\"></i>
            <span>Delete</span>
        </button>
        <input type=\"checkbox\" class=\"toggle\"/>-->
        <!-- The global file processing state -->
        <!--<span class=\"fileupload-process\"></span>-->
        <!--</div>-->
        <!-- The global progress state -->
        <!--<div class=\"col-lg-5 fileupload-progress fade\">-->
        <!-- The global progress bar -->
        <!--<div id='' class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\"
             aria-valuemax=\"100\">
            <div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div>
        </div>-->
        <!-- The extended global progress state -->
        <!--<div class=\"progress-extended\">&#160;</div>-->
        <!--</div>-->
    </div>


    <!--    <div class='videme-upload-video-preview hidden bg-warning'>
    
                <div class='videme-upload-video-preview'>
                <video id='my-video_upload' class='video-js vjs-big-play-centered' controls='controls' preload='auto' 
                 data-setup='{\"fluid\": true}'>
                  <p class='vjs-no-js'>
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                  </p>
                </video>
            </div>
        </div>-->
    <input type='text' name='ticket_id' id='videme-upload-video-ticket_id_for_uploader' class='hidden'/>

    <!-- The table listing the files available for upload/download 
    <table role=\"presentation\" class=\"table table-striped\">
        <tbody class=\"files\"></tbody>
    </table>-->
</form>

<div class='videme-upload-user-form hidden'>
    <form class=\"form-vertical\" id=\"upload_public\" name=\"upload_public\" role=\"form\">

        <!--<div class='videme-upload-video-preview'>
            <video id='my-video_upload' class='video-js vjs-big-play-centered' controls='controls' preload='auto' 
             data-setup='{\"fluid\": true}'>
              &lt;!&ndash;<source src=\"\" id=\"video_here\"/>&ndash;&gt;
              <p class='vjs-no-js'>
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
              </p>
            </video>
        </div>-->

        <input type='text' name='ticket_id' id='videme-upload-video-ticket_id' class='hidden'/>
        <!--<input type='text' name='ticket' id='videme-upload-video-ticket' class=''/>-->

        <!--<div class=\"progress\">
          <div id='videme_upload_progress' class=\"progress-bar progress-bar-striped progress-bar-animated\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"\"></div>
        </div>-->


        <div class='container-fluide'>
            <div class='row'>
                
                <div class='videme-upload-panel hidden'> <!-- ??? -->
                    <div class='col-8'>
                        <div class='videme-upload-video-preview'>
                            <video id='my-video_upload' class='video-js vjs-big-play-centered' controls='controls'
                                   preload='auto'
                                   data-setup='{\"fluid\": true}'>
                                <p class='vjs-no-js'>
                                    To view this video please enable JavaScript, and consider upgrading to a web browser
                                    that
                                    <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5
                                        video</a>
                                </p>
                            </video>
                            <!--<video id='my-video_upload' class='' controls='controls' preload='auto'>
                             <source src=\"\" id=\"video_here\"/>
                            </video>-->
                        </div>
                        
<div class=\"toast videme-toast-no-preview\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">
  <div class=\"toast-header\">
    <img src=\"...\" class=\"rounded mr-2\" alt=\"...\"/>
    <strong class=\"mr-auto\">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\">
      <span aria-hidden=\"true\">x</span>
    </button>
  </div>
  <div class=\"toast-body\">
    Hello, world! This is a toast message.
  </div>
</div>
                        
                    </div>
                    <div class='col-4'>
                        <div class='videme-upload-video-right-panel-1'>

                            <button type=\"submit\" class=\"btn btn-primary videme-round-button\" id=\"upload_public_submit\"
                                    name=\"\">
                                Publish
                                <div class=\"videme-progress\"></div>
                            </button>
                            <hr/>
                        </div>
                        <div class='videme-upload-video-right-panel-2'>
                            " . $userList . "
                        </div>
                        <div class='videme-upload-video-right-panel-3'>
                            <hr/>
                            <div class='videme-uploader-status'></div>
                            <a href='https://www.vide.me/web/upload/' class='videme-upload-video-cancel'
                               id='videme-upload-video-cancel'>Cancel</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
                
             <div class='videme_last_task_panel hidden'>
                <div class='form-row'>
                
                  <div class=\"form-group col-4\">
                    <div class='videme_last_task_icon'></div>
                    <div class=''>
                    </div>
                  </div>
                  
                    <div class='form-group col-auto'>
                        " . $userList . "
                    </div>

                    <div class='form-group col-auto'>
                        <button type=\"submit\" class=\"btn btn-primary md-2 videme-round-button\" id=\"upload_public_submit\"
                                name=\"\">
                            Publish
                            <div class=\"videme-progress\"></div>
                        </button>
                    </div>
                    

                </div>

                    <div class='text-muted'>There is no preview for this file type.</div>

                    <div class='videme-uploader-status'></div>
                    <a href='https://www.vide.me/web/upload/' class=''
                           id='videme-upload-video-cancel'>Cancel</a>
             </div>
                
        <div class=\"\">
            <div class=\"progress\">
                <div id=\"videme_upload_progress\" class=\"progress-bar progress-bar-striped progress-bar-animated\"
                     role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"\"></div>
                <!--<div id=\"videme_conversion_progress\" class=\"progress-bar bg-success progress-bar-striped progress-bar-animated\"
                     role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"\"></div>-->
            </div>
        </div>

        <!-- The table listing the files available for upload/download -->
        <table role=\"presentation\" class=\"table table-striped\">
            <tbody class=\"files\"></tbody>
        </table>

        <div class=\"form-group\">
            <!--<label for=\"subject\">Title</label>-->
            <input type=\"text\" class=\"form-control\" id=\"title_for_video\" name=\"title\" placeholder=\"Title\"/>
        </div>
        <div class=\"form-group\">
            <!--<label for=\"message\">Content</label>-->
            <input type=\"text\" class=\"form-control\" id=\"content\" name=\"content\" placeholder=\"Content\"/>
        </div>
    </form>
</div>


<div class=\"alert alert-secondary\" role=\"alert\">
    <h5 class=\"alert-heading\">Upload notes</h5>
    <ul>
        <li>The maximum file size for uploads is <strong>300 MB</strong>.
        </li>
        <li>Only video files (<strong>mp4, 3gp, mkv, webm, flv, mpg, mpeg, wmf, avi, mov, vob, rm, rmvb</strong>) are
            allowed.
        </li>
    </ul>
</div>

<!--<div id='timer'></div>-->
<div id=\"videme-my-task\" class=\"\"></div>
<!-- The blueimp Gallery widget -->
<div id=\"blueimp-gallery\" class=\"blueimp-gallery blueimp-gallery-controls\" data-filter=\":even\">
    <div class=\"slides\"></div>
    <h3 class=\"title\"></h3>
    <a class=\"prev\">‹</a>
    <a class=\"next\">›</a>
    <a class=\"close\">×</a>
    <a class=\"play-pause\"></a>
    <ol class=\"indicator\"></ol>
</div>
";
    }

    public function htmlFooter()
    {
        $HTMLsample = new baseHTMLsample();
        /*$modalSignIn = new ModalNoForm();
        $HTMLsample->modalSignInNew($modalSignIn);*/
        //$modalSignIn = new baseHTMLmodal();
        //$HTMLsample->modalSignIn();
        return "
" . /*$HTMLsample->modalSignIn() .*/ "
" . /*$modalSignIn->htmlModalCommon() .*/ "
<div class='mx-2'>
<p><small>
<!--<a href=\"https://vide.me/article/all/\">Article</a>

<a href=\"http://videme.blogspot.com/\">Blog</a>
-->
<!--
<a href=\"https://github.com/SergeyKozlov/vide.me-js/wiki/\">API</a>
-->
<a href=\"https://www.vide.me/web/opportunities/\">Opportunities</a>
<a target='_blank' href=\"https://www.vide.me/privacypolicy.htm\">Privacy Policy</a>
<button type=\"button\" class=\"btn btn-link\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-feedback\">Feedback</button>
</small></p>
</div>
<div class=\"modal\" id='modal-feedback'>
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <form class=\"\" id=\"feedback-form\" name=\"feedback-form\" role=\"form\" action=\"\" method=\"post\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">On this error page</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
                        <div class=\"form-group form-check\">
                            <input type=\"checkbox\" class=\"form-check-input\" id=\"content1\" name=\"content\" value=\"content\" />
                            <label class=\"form-check-label\" for=\"content1\">Obscene content</label>
                        </div>
                        <div class=\"form-group form-check\">
                            <input type=\"checkbox\" class=\"form-check-input\" id=\"copyright\" name=\"copyright\" value=\"copyright\" />
                            <label class=\"form-check-label\" for=\"copyright\">Copyright infringement</label>
                        </div>
                        <div class=\"form-group form-check\">
                            <input type=\"checkbox\" class=\"form-check-input\" id=\"view\" name=\"view\" value=\"view\" />
                            <label class=\"form-check-label\" for=\"view\">Incorrect page display</label>
                        </div>
                        <div class=\"form-group\">
                            <input type=\"hidden\" id=\"feedback-location\" name=\"location\" value=\"\" />
                            <label for=\"feedback-message\">You message</label>
                            <textarea class=\"form-control\" id=\"feedback-message\" rows=\"3\" name=\"message\"></textarea>
                        </div>
                        <div class=\"form-group form-check hidden\" id='videme-feedback-response'>
                            <input type=\"text\" class=\"form-check-input hidden\" id=\"response_user_id\" name=\"response_user_id\" value=\"\" />
                            <input type=\"checkbox\" class=\"form-check-input\" id=\"response\" name=\"response\" value=\"response\" />
                            <label class=\"form-check-label\" for=\"response\">I want to receive a response from the support service</label>
                        </div>
      </div>
      <div class=\"modal-footer\">
              <span class=\"spinner-border spinner-border-sm videme-send-feedback-spinner hidden\" role=\"status\"
      aria-hidden=\"true\"></span>
                    <button type=\"submit\" class=\"btn btn-primary\" id=\"feedback-submit\" name=\"feedback-submit\">
                        Send
                        <div class=\"videme-progress\"></div>
                    </button>
                    <!--<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>-->
      </div>
                  </form>

    </div>
  </div>
</div>
";
    }

    public function htmlArticleCover($htmlArticleCover)
    {
        if (!empty($htmlArticleCover['item_id'])) {
            $item_id = $htmlArticleCover['item_id'];
        } else {
            $item_id = '';
        }
        if (!empty($htmlArticleCover['title'])) {
            $title = $htmlArticleCover['title'];
        } else {
            $title = '';
        }
        if (!empty($htmlArticleCover)) {
            $formName = "article-update";
            $formAction = "https://api.vide.me/article/update/";
            /*if (!empty($htmlArticleCover['type']) and $htmlArticleCover['type'] == 'event') {
                $formName = "event-new";
                $formAction = "https://api.vide.me/v2/events/create/";
            } else {
                $formName = "article-update";
                $formAction = "https://api.vide.me/article/update/";
            }*/
        } else {
            $formName = "article-new";
            $formAction = "https://api.vide.me/article/new/";
        }
        if (!empty($htmlArticleCover['cover'])) {
            $divStyleVidemeCoverImage = " src='" . $this->origin_img_vide_me . $htmlArticleCover['cover'] . "'";
            $cover = $htmlArticleCover['cover'];
        } else {
            $divStyleVidemeCoverImage = "src='" . $this->origin_static_vide_me . "select_image.png'";
            $cover = '';
        }
        $echo = '';
        $echo .= "<form id='" . $formName . "' action='" . $formAction . "' method='post'>
        <div class='videme-article-edit-cover-container'>
    <img class=\"videme_item_edit_image_now\" id=\"videme_item_edit_image_now\" " . $divStyleVidemeCoverImage . "/>
    
    <button type=\"button\" class=\"btn btn-primary videme-article-edit-cover-sel-image-btn\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-select-image\">
  Select image
</button>
    </div>

        <div class=\"videme-article-right-panel-content\">
           <input name='nad' id='nad' type='hidden' />
           <input name=\"article[item_id]\" id=\"\" type=\"hidden\" value=\"" . $item_id . "\" />
           <input name=\"article[type]\" id=\"\" type=\"hidden\" value=\"article\" />
           <input name='article[cover]' id='cover' type='hidden' value='" . $cover . "' />
           <div class=\"form-group\">
             <label for=\"exampleInputEmail1\">Title</label>
            <input type=\"text\" class=\"form-control\" name=\"article[title]\" placeholder=\"Title\"
value=\"" . $title . "\" />
           </div>
        </div>
";
        return $echo;
    }

    public function htmlEventEditCover($htmlEventEditCover)
    {
        if (!empty($htmlEventEditCover['item_id'])) {
            $item_id = $htmlEventEditCover['item_id'];
        } else {
            $item_id = '';
        }
        if (!empty($htmlEventEditCover['cover'])) {
            $cover_src = $this->origin_img_vide_me . $htmlEventEditCover['cover'];
            $cover_hidden = '';
        } else {
            $cover_src = '';
            $cover_hidden = 'hidden';
        }
        if (!empty($htmlEventEditCover['cover_video'])) {
            $cover_video_src = $this->origin_img_vide_me . $htmlEventEditCover['cover_video'] . '.jpg';
            $cover_video_hidden = '';
        } else {
            $cover_video_src = '';
            $cover_video_hidden = 'hidden';
        }
        if (!empty($htmlEventEditCover['title'])) {
            $title = $htmlEventEditCover['title'];
        } else {
            $title = '';
        }
        if (!empty($htmlEventEditCover['content'])) {
            $content = $htmlEventEditCover['content'];
        } else {
            $content = '';
        }
        if (!empty($htmlEventEditCover['cover'])) {
            $cover = $htmlEventEditCover['cover'];
        } else {
            $cover = '';
        }
        if (!empty($htmlEventEditCover['cover_video'])) {
            $cover_video = $htmlEventEditCover['cover_video'];
        } else {
            $cover_video = '';
        }
        /*        if (!empty($htmlEventEditCover)) {
                    //$formName = "article-update";
                    //$formAction = "https://api.vide.me/article/update/";*/
        if ($htmlEventEditCover['type'] == 'event_new') {
            $formName = "event-edit-form";
            $formAction = "https://api.vide.me/v2/events/create/";
        }
        if ($htmlEventEditCover['type'] == 'event_update') {
            $formName = "event-update-form";
            $formAction = "https://api.vide.me/v2/events/update/";
        }
        /*} else {
            $formName = "article-new";
            $formAction = "https://api.vide.me/article/new/";
        }
        if (!empty($htmlEventEditCover['cover'])) {
            $divStyleVidemeCoverImage = " src='https://s3.amazonaws.com/img.vide.me/" . $htmlEventEditCover['cover'] . "'";
            $cover = $htmlEventEditCover['cover'];
        } else {
            $divStyleVidemeCoverImage = "src='https://s3.amazonaws.com/vide.me/select_image.png'";
            $cover = '';
        }*/
        $echo = '';
        $echo .= "
        
        
<style>
    label > input { /* HIDE RADIO */
        visibility: hidden; /* Makes input not-clickable */
        position: absolute; /* Remove input from document flow */
    }

    label > input + img { /* IMAGE STYLES */
        cursor: pointer;
        border: 2px solid transparent;
    }

    label > input:checked + img { /* (RADIO CHECKED) IMAGE STYLES */
        border: 2px solid #f00;
    }

    .videme_item_edit_image_label {
        position: relative;
        text-align: center;
        color: white;
    }

    .videme_item_edit_image_text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: rgb(65, 180, 83);
        font-weight: bold;
    }
    
.videme-fit-2-box {
float: left;
position: relative;
width: 50%;
padding-bottom: 28.125%;
}

.videme-fit-2-boxInner {
position: absolute;
top: 0%;
bottom: 0%;
overflow: hidden;
width: 100%;
background: bisque;
}

.videme-fit-2-boxInner img {
width: 100%;
}
    .social-box {
  display: inline-block;
  width: 3em;
  height: 3em;
  margin-right: 1em;
  background-color: #97a4ae;
  text-align: center;
}

.social-box:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -0.25em; /* Adjusts for spacing */
}

.social-box a {  
  color: white;
  font-size: 3em;
  margin: auto;
  text-align: center;
  vertical-align: middle;
}
</style>
        
        <form id='" . $formName . "' action='" . $formAction . "' method='post'>

    
            <label for='title'>Select image for video poster</label>
    <div class='container-fluid'>

        <div class='videme_item_edit_image_label videme-fit-2-box videme_select_image'>
            <!--<input type='radio' name='cover_select' value='cover' id='cover_select' class='videme_select_image'/>-->
            <div class='videme-fit-2-boxInner'>
            <img class='videme_item_edit_image img-thumbnail " . $cover_hidden . "' id='videme_item_edit_image' src='" . $cover_src . "' alt='Select image'/>
            <i class='fa fa-file-photo-o' style=\"color: black;font-size: 5rem;/*! top: 50%; */padding-top: 13%;\"></i>
            <div class='videme_item_edit_image_text' style=\"background-color: ghostwhite;\">Select image</div>
            </div>
        </div>
    
        <div class='videme_item_edit_image_label videme-fit-2-box videme_select_video'>
            <!--<input type='radio' name='cover_select' value='item_id' id='cover_select' class='videme_select_image_item'/>-->
            <div class='videme-fit-2-boxInner'>
            <img class='videme_item_edit_image img-thumbnail " . $cover_video_hidden . "' id='videme_item_edit_video' src='" . $cover_video_src . "'
                 alt='Select video'/>
            <i class='fa fa-file-photo-o' style=\"color: black;font-size: 5rem;/*! top: 50%; */padding-top: 13%;\"></i>
            <div class='videme_item_edit_image_text' style=\"background-color: ghostwhite;\">Select video</div>
            </div>
        </div>
    </div>
    


        <div class=\"videme-article-right-panel-content\">
        
    <input name='article[cover]' id='cover' type='hidden' value=\"" . $cover . "\"/>
    <input name='article[cover_video]' id='cover_video' type='hidden' value=\"" . $cover_video . "\"/>
        
           <input name='nad' id='nad' type='hidden' />
           <input name=\"item_id\" id=\"\" type=\"hidden\" value=\"" . $item_id . "\" />
           <div class=\"form-group\">
            <label for=\"title\">Title</label>
            <input type=\"text\" class=\"form-control\" name=\"title\" placeholder=\"Title\"
value=\"" . $title . "\" id='title'/>
           </div>
           <div class=\"form-group\">
            <label for=\"content\">Content</label>
            <textarea class=\"form-control\" name=\"content\" placeholder=\"Content\" id=\"content\" rows=\"2\">" . $content . "</textarea>
           </div>
        </div>
";
        return $echo;
    }

    public function htmlArticleButton()
    {
        $echo = '';
        $echo .= "
<hr />
<div id=\"PanelNewItem\" class=\"\">
            <div class=\"form-group\">

        <label for='NewItemText'>Add content</label>
        <br />

        <button id=\"NewItemText\" type=\"button\" class=\"btn btn-default\">Text</button>
        <button id=\"NewItemImg\" type=\"button\" class=\"btn btn-default\">Image URL</button>
        <!--<button id=\"NewItemVideo\" type=\"button\" class=\"btn btn-default\">Video</button>-->
        <button id=\"NewItemEmbed\" type=\"button\" class=\"btn btn-default\">Youtube video</button>
        <button type='button' class='btn btn-default select-video-toggle' data-bs-toggle='modal'
                data-bs-target='#modal-select-video'>
            Add my video
        </button>
        <button type='button' class='btn btn-default select-image-toggle' data-bs-toggle='modal'
                data-bs-target='#modal-select-my-image'>
            Add my image
        </button>
        </div>
<!--<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        <h3 class=\"panel-title\">Add Related</h3>
    </div>
    <div class=\"panel-body\">
        <div class=\"form-inline\">
            <div class=\"form-group\">
                <input type=\"text\" class=\"form-control\" name=\"\" id=\"RelatedTitle\" placeholder=\"Related Title\" />
                <input type=\"text\" class=\"form-control\" name=\"\" id=\"RelatedValue\" placeholder=\"Related Value\" />
            </div>
            <button id=\"NewItemRelated\" type=\"submit\" class=\"btn btn-default\">Add Related</button>
        </div>
    </div>
</div>-->
<hr />


<!-- <div id=\"CopyItem\" class=\"CopyItem\">Drop to Copy Item </div> -->

<div id=\"PanelCopyItem\" class=\"PanelCopyItem\">
        Drop to Copy Item
</div>
</div>";
        return $echo;
    }

    public function htmlTagsInput()
    {
        return '
<div class="form-group">
    <label for=\'TagValue\'>Tags:</label>
    <div class=\'videme-item-edit-tags-links\' id=\'videme-item-edit-tags\'></div>
    <div class="form-row">
        <div class=\'col\'>
            <input type="text" class="form-control" name="" id="TagValue" placeholder="Tag"/>
        </div>
        <div class=\'col\'>
            <button id="NewItemTag" type="submit" class="btn btn-outline-info">Add Tag</button>
        </div>
    </div>
</div>';
    }

    public function htmlTagsInputEdit()
    {
        return '
<div class="form-group">
    <label for=\'TagValue\'>Tags:</label>
    <div class=\'videme-item-edit-tags-links\' id=\'videme-item-edit-tags_edit\'></div>
    <div class="form-row">
        <div class=\'col\'>
            <input type="text" class="form-control" name="" id="EditTagValue" placeholder="Tag"/>
        </div>
        <div class=\'col\'>
            <button id="EditItemTag" type="submit" class="btn btn-outline-info">Add Tag</button>
        </div>
    </div>
</div>';
    }

    public function htmlTagsInputArticle()
    {
        return '
            <div class="form-group">
                <label for=\'ArticleTagValue\'>Add tags</label>
                <input type="text" class="form-control" name="" id="ArticleTagValue" placeholder="Tag" />
                <button id="NewArticleTag" type="submit" class="btn btn-default">Add Tag</button>
            </div>';
    }

    public function htmlDateTimeInput($htmlDateTimeInput = [])
    {
        //$start = '';
        if (!empty($htmlDateTimeInput['started_at'])) {
            $started_at_js = "
            //var date = moment('" . $htmlDateTimeInput['started_at'] . "').format('YYYY-MM-DD HH:mm',timeZone);
            var date_started_at = moment('" . $htmlDateTimeInput['started_at'] . "').format('YYYY-MM-DD HH:mm');
            console.log('htmlDateTimeInput date ' + date_started_at);
                $('#datetimepicker_started_at').datetimepicker({
                    defaultDate: date_started_at
                });
            ";
        } else {
            $started_at_js = "$('#datetimepicker_started_at').datetimepicker();";
        }
        if (!empty($htmlDateTimeInput['stopped_at'])) {
            $stopped_at_js = "
            var date_stopped_at = moment('" . $htmlDateTimeInput['stopped_at'] . "').format('YYYY-MM-DD HH:mm');
            console.log('htmlDateTimeInput date ' + date_stopped_at);
                $('#datetimepicker_stopped_at').datetimepicker({
                    defaultDate: date_stopped_at
                });
            ";
        } else {
            $stopped_at_js = "$('#datetimepicker_stopped_at').datetimepicker();";
        }
        return "<script type=\"text/javascript\" src=\"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js\"></script>
<script type=\"text/javascript\"
        src=\"https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js\"></script>
<link rel=\"stylesheet\"
      href=\"https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css\"/>
<hr/>
<div class=\"form-group\">
    <label for=\"datetimepicker_started_at\">Pick start time</label>
    <div class=\"input-group date\" id=\"datetimepicker_started_at\" data-target-input=\"nearest\">
        <input type=\"text\" class=\"form-control datetimepicker-input\" data-target=\"#datetimepicker_started_at\" 
        placeholder=\"Pick start time\" name='started_at' id='datetimepicker_started_at'/>
        <div class=\"input-group-append\" data-target=\"#datetimepicker_started_at\" data-toggle=\"datetimepicker\">
            <div class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></div>
        </div>
    </div>
</div>
<script type=\"text/javascript\">
    $(document).ready(function () {
        " . $started_at_js . "
    });
</script>
<div class=\"form-group\">
    <label for=\"datetimepicker_stopped_at\">Pick stop time</label>
    <div class=\"input-group date\" id=\"datetimepicker_stopped_at\" data-target-input=\"nearest\">
        <input type=\"text\" class=\"form-control datetimepicker-input\" data-target=\"#datetimepicker_stopped_at\" 
        placeholder=\"Pick start time\" name='stopped_at' id='datetimepicker_stopped_at'/>
        <div class=\"input-group-append\" data-target=\"#datetimepicker_stopped_at\" data-toggle=\"datetimepicker\">
            <div class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></div>
        </div>
    </div>
</div>
<script type=\"text/javascript\">
    $(document).ready(function () {
        " . $stopped_at_js . "
    });
</script>";
    }

    public function htmlCountryCityInput($htmlCountryCityInput)
    {
        if (!empty($htmlCountryCityInput['item_country'])) {
            $item_country = $htmlCountryCityInput['item_country'];
        } else {
            $item_country = '';
        }
        if (!empty($htmlCountryCityInput['item_city'])) {
            $item_city = $htmlCountryCityInput['item_city'];
        } else {
            $item_city = '';
        }
        return "
  <div class=\"form-group\">
    <label for=\"exampleInputEmail111\">Country</label>
    <input type=\"text\" class=\"form-control\" id=\"exampleInputEmail111\" aria-describedby=\"emailHelp\" placeholder=\"Country\" name='article[country]' value='" . $item_country . "'/>
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail121\">City</label>
    <input type=\"text\" class=\"form-control\" id=\"exampleInputEmail121\" aria-describedby=\"emailHelp\" placeholder=\"City\" name='article[city]' value='" . $item_city . "'/>
  </div>";
    }

    public function htmlPlaceInput($htmlPlaceInput)
    {
        if (!empty($htmlPlaceInput['place'])) {
            $place = $htmlPlaceInput['place'];
        } else {
            $place = '';
        }
        return "
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1112\">A place</label>
    <input type=\"text\" class=\"form-control\" id=\"exampleInputEmail1112\" aria-describedby=\"emailHelp\" placeholder=\"A place\" name='article[place]' value='" . $place . "' />
  </div>";
    }

    public function htmlAccessSelect()
    {
        return '
                <div class="form-group">
                    <label for="exampleRadios1">Access select</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="article[access]" id="exampleRadios1" value="public" checked="checked" />
                  <label class="form-check-label" for="exampleRadios1">
                    Public
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="article[access]" id="exampleRadios2" value="friends" />
                  <label class="form-check-label" for="exampleRadios2">
                    For friends
                        </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="article[access]" id="exampleRadios3" value="private" />
                  <label class="form-check-label" for="exampleRadios3">
                    For me only
                    </label>
                </div>
                </div>';
    }

    public function htmlServiceMy() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>My service</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-my-service-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-my-service-tile').showServiceMy({});
            });
          });
        </script>";
    }

    public function htmlEssenceMy() // 27072022
    {
        return "
        <div class='videme-v3-tile-title'>My essences</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-my-essence-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-my-essence-tile').showEssenceMy({});
            });
          });
        </script>";
    }

    public function htmlServiceSelect() // 28072022
    {
        return "
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class='videme-v3-tile-title'>Select your main service</div>
            <div class=\"videme-tile\" id=\"videme-select-service-tile\"></div>
        </div>
        <div class=\"row\">
            <div class='videme-v3-tile-title'>Select your optional service</div>
            <div class=\"videme-tile\" id=\"videme-select-service2-tile\"></div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-select-service-tile').showServiceSelect({
                    //limit: 6
                });
            });
          });
        </script>";
    }
    public function htmlEssenceSelect() // TODO: remove
    {
        return "
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class='videme-tile-title'>Select your essence</div>
            <div class=\"videme-tile\" id=\"videme-select-essence-tile\"></div>
        </div>

        <div class=\"row\">
            <div class='videme-tile-title'>Select your optional essence</div>
            <div class=\"videme-tile\" id=\"videme-select-essence2-tile\"></div>
        </div>
    </div>
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $('#videme-select-essence-tile').showEssenceSelect({
                    //limit: 6
                });
            });
        </script>";
    }

    public function htmlEssenceCreate()  // 02082022
    {
        return "
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class='videme-v3-tile-title'>Define your essences</div>
            <div class=\"videme-tile\" id=\"videme-select-essence-tile\"></div>

            <form class=\"form\" id=\"videme-essences-select\" role=\"form\" action=\"https://api.vide.me/v2/essences/create/\"
                  method=\"get\">
                <input name=\"feedback\" class=\"\" id=\"feedback\" type=\"hidden\" value='https://www.vide.me'/>
                <div class=\"form-group\">
                    <input type=\"text\" name=\"videme_new_essences\" class=\"form-control\" id=\"videme_new_essences\"
                           placeholder=\"Start type\"/>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Add</button>
            </form>
        </div>
    </div>
            <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
$(function () {
    function split(val) {
        return val.split(/,\s*/);
    }

    function extractLast(term) {
        return split(term).pop();
    }

    $('#videme_new_essences')
            // don't navigate away from the field on tab when selecting an item
            .on('keydown', function (event) {
                if (event.keyCode === $.ui.keyCode.TAB &amp;&amp;
                    $(this).autocomplete('instance').menu.active) {
                    event.preventDefault();
                }
            })
            .autocomplete({
            source: function (request, response) {
        $.getJSON('https://api.vide.me/v2/essences/search_title?q=' + request.term, function (data) {
            response($.map(data, function (value, key) {
                    return {
                        label: value.title,
                            value: value.essence_id
                        };
                    }));
        });
    },
            search: function () {
        // custom minLength
        var term = extractLast(this.value);
        //var term = extractLast(this.title);
        console.log('search term ' + JSON.stringify(term))
                if (term.length &lt; 2) {
                    return false;
                }
            },
            focus: function () {
        // prevent value inserted on focus
        return false;
    },
            select: function (event, ui) {
        var terms = split(this.value);
        //var terms = split(this.title);
        console.log('select terms ' + JSON.stringify(terms));
        // remove the current input
        terms.pop();
        // add the selected item
        //terms.push(ui.item.value);
        terms.push(ui.item.label);
        // add placeholder to get the comma-and-space at the end
        terms.push('');
        this.value = terms.join(', ');
        //this.value = terms.join('; ');
        return false;
    }
        });
});

          });
        </script>";
    }

    public function htmlTalentsMy() // 28072022
    {
        return "
        <div class='videme-v3-tile-title'>My talents</div>
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"videme-tile\" id=\"videme-my-talents-tile\">
            </div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-my-talents-tile').showTalentsMy({
                    //limit: 6
                });
            });
          });
        </script>";
    }

    public function htmlTalentsSelect() // 28072022
    {
        return "
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class='videme-v3-tile-title'>Select your main talents</div>
            <div class=\"videme-tile\" id=\"videme-select-talents-tile\"></div>
        </div>
        <div class=\"row\">
            <div class='videme-v3-tile-title'>Select your optional talents</div>
            <div class=\"videme-tile\" id=\"videme-select-talents2-tile\"></div>
        </div>
    </div>
        <script type=\"text/javascript\">
          require(['jquery', 'videme_jq'], function( $ ) {
            $(document).ready(function () {
                $('#videme-select-talents-tile').showTalentsSelect({
                    //limit: 6
                });
            });
          });
        </script>";
    }

    public function htmlMySubscribers()
    {
        return "
        <div class='videme-v3-tile-title'>Subscriptions</div>
        <!--<form class=\"form-vertical\" id=\"videme-subscribe\" name=\"videme-subscribe\" role=\"form\">-->
        <form class=\"form-vertical\" id=\"user-subscriptions-form\" name=\"user-subscriptions-form\" role=\"form\">
            <div class=\"form-group\">
                <label for=\"send_rating_period\">Send rating changes for a period of days</label>
                <select class=\"form-control\" id=\"send_rating_period\" name=\"send_rating_period\">
                    <option>7</option>
                    <option>14</option>
                </select>
            </div>
            <div class=\"form-group form-check\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"dont_send_rating\" name=\"dont_send_rating\"
                       value='true'/>
                <label class=\"form-check-label\" for=\"dont_send_rating\">Do not send rating changes</label>
            </div>
            <hr/>

            <div class=\"form-group\">
                <label for=\"send_stats_period\">Send stats for a period of days</label>
                <select class=\"form-control\" id=\"send_stats_period\" name=\"send_stats_period\">
                    <option>14</option>
                    <option>30</option>
                </select>
            </div>
            <div class=\"form-group form-check\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"dont_send_stats\" name=\"dont_send_stats\"
                       value='true'/>
                <label class=\"form-check-label\" for=\"dont_send_stats\">Do not send stats</label>
            </div>
            <hr/>

            <button type=\"submit\" class=\"btn btn-primary videme-round-button\" id=\"user_info_submit\"
                    name=\"user_info_submit\">
                Save
                <div class=\"videme-progress\"></div>
            </button>
        </form>";
    }
    public function htmlSettings()
    {
        return "
        <div class='videme-v3-tile-title'>Settings</div>
        <form class='ms-auto d-flex'>
            <div class='form-check form-switch tooltip-demo'>
                <input class='form-check-input' type='checkbox' id='videme-dark-mode-toggle-btn' title='' data-bs-toggle='tooltip' data-bs-placement='left' data-bs-title=''/>
                <label class='form-check-label' for='videme-dark-mode-toggle-btn'>Use dark mode</label>
            </div>
        </form>";
    }

    public function htmlItemEdit() // 27072022
    {
        return "<!--<div class='videme-modal-article-content-place'>-->
<!--<div class='videme_item_card_edit'></div>-->
<!--<img class='videme_item_edit_image_now img-thumbnail' id='videme_item_edit_image_now' src='' alt=''/>-->

<style>
    label > input { /* HIDE RADIO */
        visibility: hidden; /* Makes input not-clickable */
        position: absolute; /* Remove input from document flow */
    }

    label > input + img { /* IMAGE STYLES */
        cursor: pointer;
        border: 2px solid transparent;
    }

    label > input:checked + img { /* (RADIO CHECKED) IMAGE STYLES */
        border: 2px solid #f00;
    }

    .videme_item_edit_image_label {
        position: relative;
        text-align: center;
        color: white;
    }

    .videme_item_edit_image_text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: rgb(65, 180, 83);
        font-weight: bold;
    }
    
.videme-fit-2-box {
float: left;
position: relative;
width: 50%;
padding-bottom: 28.125%;
}

.videme-fit-2-boxInner {
position: absolute;
top: 0%;
bottom: 0%;
overflow: hidden;
width: 100%;
background: bisque;
}

.videme-fit-2-boxInner img {
width: 100%;
}
    .social-box {
  display: inline-block;
  width: 3em;
  height: 3em;
  margin-right: 1em;
  background-color: #97a4ae;
  text-align: center;
}

.social-box:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -0.25em; /* Adjusts for spacing */
}

.social-box a {  
  color: white;
  font-size: 3em;
  margin: auto;
  text-align: center;
  vertical-align: middle;
}
</style>

<div class='videme-v3-tile-title'>Edit item</div>
<form class='' id='item-edit-form' name='' role='form' action='https://api.vide.me/v2/items/update/' method='post'>
        <label for='title'>Select image for video poster</label>
    <div class='form-group'>
        <label class='videme_item_edit_image_label videme-fit-2-box'>
            <input type='radio' name='cover_select' value='item_id' id='cover_select' class='videme_select_image_item'/>
            <div class='videme-fit-2-boxInner'>
            <img class='videme_item_edit_image img-thumbnail' id='videme_item_edit_image_item' src=''
                 alt='Use image from video'/>
            <div class='videme_item_edit_image_text'>Use image from video</div>
            </div>
        </label>

        <label class='videme_item_edit_image_label videme-fit-2-box'>
            <input type='radio' name='cover_select' value='cover' id='cover_select' class='videme_select_image'/>
            <div class='videme-fit-2-boxInner'>
            <img class='videme_item_edit_image img-thumbnail hidden' id='videme_item_edit_image' src='' alt='Select image'/>
            <i class='fa fa-file-photo-o' style=\"color: black;font-size: 5rem;/*! top: 50%; */padding-top: 13%;\"></i>
            <div class='videme_item_edit_image_text'>Select image</div>
            </div>
        </label>
    </div>

    <input name='nad' id='nad' type='hidden'/>
    <input name='item_id' id='item_id' type='hidden'/>
    <input name='item_type' id='item_type' type='hidden'/>
    <input name='cover' id='cover' type='hidden'/>
    <hr/>
    <div class='form-group'>
        <label for='title'>Title</label>
        <input type='text' class='form-control' id='item_edit_title' aria-describedby='title' placeholder='Title' name='title'/>
    </div>
    <div class='form-group'>
        <label for='content'>Content</label>
        <textarea class='form-control' id='item_edit_content_edit' rows='3' name='content'></textarea>
    </div>
    <div class='form-group'>
        <label for='exampleRadios1'>Access select</label>
        <div class='form-check'>
            <input class='form-check-input' type='radio' name='access' id='exampleRadios1' value='public'
                   checked='checked'/>
            <label class='form-check-label' for='exampleRadios1'>
                Public
            </label>
        </div>
        <div class='form-check'>
            <input class='form-check-input' type='radio' name='access' id='exampleRadios2' value='friends'/>
            <label class='form-check-label' for='exampleRadios2'>
                For friends
            </label>
        </div>
        <div class='form-check disabled'>
            <input class='form-check-input' type='radio' name='access' id='exampleRadios3' value='private'/>
            <label class='form-check-label' for='exampleRadios3'>
                Private
            </label>
        </div>
    </div>
    <hr/>
" . $this->htmlTagsInputEdit() . "
    <hr/>
" . $this->htmlAddExtLinks() . "
    <hr/>
" . $this->htmlPartnersItemEdit() . "
" . $this->htmlSearchPeoplesForPartners() . "
    <hr/>
<div class='d-flex'>
    <button type='button' class='btn btn-outline-danger del-my-toggle mr-auto'  data-bs-toggle='modal'
                                data-bs-target='#modal-del'>
        Delete
    </button>
    <a class=\"btn btn-outline-secondary\" href=\"https://www.vide.me/web/posts/my/\" role=\"button\">Cancel</a>
    <button type='submit' class='btn btn-primary' name='item-edit-submit'>
        Save
    </button>
    </div>
</form>

<script type='text/javascript'>
require(['jquery', 'videme_jq'], function( $ ) {
    $(document).ready(function () {
        itemEdit();
        $('#item_edit_content_edit').hashtags();
    });
    });
</script>";
    }

    public function htmlAddExtLinks()
    {
        return "
<div class='form-group'>
    <label for='ext_link_title'>External link:</label>
    <div class='videme-item-edit-tags-links' id='add_ext_links'></div>
    <div class='form-row'>
        <div class='col'>
            <input type='text' class='form-control' name='' id='ext_link_title' placeholder='Title'/>
        </div>
        <div class='col'>
            <input type='text' class='form-control' name='' id='ext_link_link' placeholder='link'/>
        </div>
        <div class='col'>
            <button id='NewItemExtLink' type='submit' class='btn btn-outline-info'>Add link</button>
        </div>
    </div>
</div>";
    }

    public function htmlShowExtLinksEdit($htmlShowExtLinksEdit)
    {
        $element = '';
        if (!empty($htmlShowExtLinksEdit['ext_links'])) {
            $ext_links = json_decode($htmlShowExtLinksEdit['ext_links'], true);
            foreach ($ext_links as $value) {
                $web_id = $this->welcome->trueRandom();
                $element .= "
<input type=\"hidden\" name=\"ext_links[" . $value['title'] . "][title]\" value='" . $value['title'] . "' class='" . $web_id . "'/>
<input type=\"hidden\" name=\"ext_links[" . $value['title'] . "][link]\" value='" . $value['link'] . "' class='" . $web_id . "'/>
<a class=\"badge badge-primary videme-edit-ext_link " . $web_id . "\" href='" . $value['link'] . "' target='_blank' > " .
                    $value['title'] .
                    "<a class=\"ext_link_remove\" href=\"#\" ext_link_title=\"" . $web_id . "\"><i class=\"fa fa-remove\"></i></a></a>";
            }
        }
        return $element;
    }

    public function htmlShowExtLinks($htmlShowExtLinks)
    {
        $element = '';
        //print_r($htmlShowExtLinks);
        if (!empty($htmlShowExtLinks['ext_links'])) {
            $element .= "<h5>External links</h5>";
            $ext_links = json_decode($htmlShowExtLinks['ext_links'], true);
            foreach ($ext_links as $value) {
                $web_id = $this->welcome->trueRandom();
                $element .= "
<input type=\"hidden\" name=\"ext_links[" . $value['title'] . "][title]\" value='" . $value['title'] . "' class='" . $web_id . "'/>
<input type=\"hidden\" name=\"ext_links[" . $value['title'] . "][link]\" value='" . htmlspecialchars($value['link']) . "' class='" . $web_id . "'/>
<a class=\"badge badge-primary videme-edit-ext_link " . $web_id . "\" href='" . htmlspecialchars($value['link']) . "' target='_blank' > " .
                    $value['title'] .
                    "</a>";
            }
        }
        return $element;
    }

    public function modalDel($modalDel)
    {
        $modalDel->setModalId('modal-del');
        $modalDel->setModalFormId('');
        $modalDel->setModalFormAction('');
        $modalDel->setModalTitle('Please confirm:');
        $modalDel->setModalBody('
                <h4>
                    Delete this item?
                </h4>
                <div class="videme_item_card_del" >
                </div>');
        $modalDel->setModalFooter('
            <div class="modal-footer videme-del-list">
            </div>');
    }

    public function modalDelPost($modalDelPost)
    {
        $modalDelPost->setModalId('modal-del-post');
        $modalDelPost->setModalFormId('');
        $modalDelPost->setModalFormAction('');
        $modalDelPost->setModalTitle('Please confirm:');
        $modalDelPost->setModalBody('
                <h4>
                    Delete this post?
                </h4>
                <div class="videme_item_card" >
                </div>');
        $modalDelPost->setModalFooter('
            <div class="modal-footer videme-del-list">
            </div>');
    }

    public function modalDelInbox($modalDelInbox)
    {
        $modalDelInbox->setModalId('modal-del-inbox');
        $modalDelInbox->setModalFormId('');
        $modalDelInbox->setModalFormAction('');
        $modalDelInbox->setModalTitle('Please confirm:');
        $modalDelInbox->setModalBody('
                <h4>
                    Delete this message?
                </h4>
                <div class="videme_item_card_messages" >
                </div>');
        $modalDelInbox->setModalFooter('
            <div class="modal-footer videme-del-list">
            </div>');
    }

    public function modalDelSent($modalDelSent)
    {
        $modalDelSent->setModalId('modal-del-sent');
        $modalDelSent->setModalFormId('');
        $modalDelSent->setModalFormAction('');
        $modalDelSent->setModalTitle('Please confirm:');
        $modalDelSent->setModalBody('
                <h4>
                    Delete this message?
                </h4>
                <div class="videme_item_card_messages" >
                </div>');
        $modalDelSent->setModalFooter('
            <div class="modal-footer videme-del-list">
            </div>');
    }

    public function modalFriendshipDelete($modalFriendshipDelete)
    {
        $HTMLsample = new baseHTMLsample();

        $modalFriendshipDelete->setModalId('modal-del-friendship');
        $modalFriendshipDelete->setModalFormId('');
        $modalFriendshipDelete->setModalFormAction('');
        $modalFriendshipDelete->setModalTitle('Accept delete:');
        $modalFriendshipDelete->setModalBody('<div class="videme_user_card"></div>');
        $modalFriendshipDelete->setModalFooter('
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <a class="btn btn-danger videme-round-button uni-url" id="videme_friendship_del_submit" href="#" role="button">Delete</a>');
    }

    public function modalCreateNewEssenceToMe($modalCreateNewEssenceToMe)
    {
        $HTMLsample = new baseHTMLsample();

        $modalCreateNewEssenceToMe->setModalId('modal-create-new-essence-to-me');
        $modalCreateNewEssenceToMe->setModalFormId('');
        $modalCreateNewEssenceToMe->setModalFormAction('');
        $modalCreateNewEssenceToMe->setModalTitle('Join to essence:');
        $modalCreateNewEssenceToMe->setModalBody('
<div class="videme_user_card"></div>
  <div class="mb-3">
    <label for="create-new-essence-to-me-title" class="form-label">Essence title</label>
    <input type="text" class="form-control" id="create-new-essence-to-me-title" aria-describedby="title" name="title"/>
    <!--<div id="title" class="form-text">title</div>-->
  </div>
  <div class="mb-3">
  <label for="create-new-essence-to-me-content" class="form-label">Essence content</label>
  <textarea class="form-control" id="create-new-essence-to-me-content" rows="3"></textarea>
</div>');
        $modalCreateNewEssenceToMe->setModalFooter('
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <a class="btn btn-primary videme-round-button222 uni-url222 create-new-essence-to-me_submit" href="#" role="button">Join</a>');
    }

    public function modalPartnerInvite($modalPartnerInvite) // 27072022
    {
        //$HTMLsample = new baseHTMLsample();
        $modalPartnerInvite->setModalId('modal-partner-invite');
        $modalPartnerInvite->setModalFormId('modal-form-partner-invite');
        $modalPartnerInvite->setModalFormAction('');
        $modalPartnerInvite->setModalTitle('Invite a partner:');
        $modalPartnerInvite->setModalBody('
<input type="hidden" name="item_id" id="partner-invite-item_id" />
<input type="hidden" name="partner_id" id="partner-invite-partner_id" />
<div class="videme_user_card" id="videme-modal-partner-invite-card"></div>
  <div class="mb-3">
    <label for="partner-invite-title" class="form-label">Partner title</label>
    <input type="text" class="form-control" id="partner-invite-title" aria-describedby="title" name="title"/>
  </div>
  <div class="mb-3">
      <label for="partner-invite-content" class="form-label">Partner content</label>
      <textarea class="form-control" id="partner-invite-content" rows="3" name="content"></textarea>
</div>');
        $modalPartnerInvite->setModalFooter('<button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
    Сancel
</button>
<button class="btn btn-primary videme-round-button222 partner-invite_submit" href="#" role="button" type="submit">
    Invite
</button>');
    }

    public function modalPartnerDelete($modalPartnerDelete)
    {
        //$HTMLsample = new baseHTMLsample();
        $modalPartnerDelete->setModalId('modal-partner-delete');
        $modalPartnerDelete->setModalFormId('modal-form-partner-delete');
        $modalPartnerDelete->setModalFormAction('');
        $modalPartnerDelete->setModalTitle('Delete the partner:');
        $modalPartnerDelete->setModalBody('
<input type="hidden" name="ip_id" id="partner-delete-ip_id" />
<input type="hidden" name="item_id" id="partner-delete-item_id" />
<input type="hidden" name="partner_id" id="partner-delete-partner_id" />
<div class="videme_user_card" id="videme-modal-partner-delete-card"></div>
<div class="videme-modal-partnership-status" id="videme-modal-partnership-status"></div>');
        $modalPartnerDelete->setModalFooter('<button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
    Сancel
</button>
<button class="btn btn-primary videme-round-button222 partner-delete_submit" href="#" role="button" type="submit">
    Delete
</button>');
    }

    public function modalSignIn(/*$modalSignIn*/)
    {
        return '
<div class="modal" id="modal-signinZZZZZZZZZZZZZZZZZZZZZ">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Please sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&#215;</span>
        </button>
      </div>
      <div class="modal-body">
  <form class="form-horizontal" id="signin" role="form" action="https://api.vide.me/v2/user/login/" method="post">
  <input name="feedback" class="" id="feedback" type="hidden" />
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username" />
    <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" />
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

<hr />

            <div class="panel panel-info">
                <div class="panel-heading">
                    Sign Up
                </div>
                <div class="panel-body">
                    <form class="form-inline" role="form" action="https://api.vide.me/v2/user/new/" method="post">
                        <div class="form-group">
                            <input type="email" name="username" class="form-control" id="username" placeholder="Your email address" />
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>

<hr />

            <div class="panel panel-info">
                <div class="panel-heading">
                    Sign-in with:
                </div>
                <div class="panel-body">
                    <a href=\'https://api.vide.me/google/\'>
                        <img src=\'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/oa_google.png\' />
                    </a>
                    <a href=\'https://api.vide.me/facebook/\'>
                        <img src=\'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/oa_facebook.png\' />
                    </a>
                    <!--                    <a href=\'https://api.vide.me/microsoft/\'>
                                            <img src=\'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/oa_microsoft.png\'>
                                        </a>-->
                </div>
            </div>

<hr />


      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div> 
';
        /*$modalSignIn->setModalId('modal-signin');
        $modalSignIn->setModalFormId('');
        $modalSignIn->setModalFormAction('');
        $modalSignIn->setModalTitle('Please sign in');
        $modalSignIn->setModalBody($this->htmlSignInProvider2());*/
        /*$modalSignIn->setModalFooter('
            <div class="modal-footer videme-del-list">
            </div>');*/
        //return $this->htmlSignInProvider2();

    }

    public function modalSignInNew($modalSignIn)
    {
        $HTMLsample = new baseHTMLsample();
        $modalSignIn->setModalId('modal-signin');
        $modalSignIn->setModalFormId('');
        $modalSignIn->setModalFormAction('');
        $modalSignIn->setModalTitle('Please sign in');
        //$modalSignIn->setModalBody($HTMLsample->htmlSignInProviderModal());
        $modalSignIn->setModalBody($HTMLsample->htmlSignInProvider2());
    }

    public function modalSendToContact($modalSendToContact)
    {
        //$HTMLsample = new baseHTMLsample();
        $modalSendToContact->setModalId('modal-contact');
        $modalSendToContact->setModalFormId('');
        $modalSendToContact->setModalFormAction('');
        $modalSendToContact->setModalTitle('Send by e-mail:');
        $modalSendToContact->setModalBody('
                <h4></h4>
                <!--<div class="item-card" id="item-card">
                </div>-->
                <div class="videme_item_card_contact">
                </div>
                <div class="videme-contact-list">
                </div>
                ' . $this->htmlButtonFBSendMessage() . '
                ' /*. $HTMLsample->htmlButtonSocShareAll()*/ . '
');
        $modalSendToContact->setModalFooter('
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Сancel
                </button>
                <div class="videme-progress"></div>');
    }

    public function modalShareToSign($modalShareToSign)
    {
        $HTMLsample = new baseHTMLsample();
        $modalShareToSign->setModalId('modal-list');
        $modalShareToSign->setModalFormId('list-form');
        $modalShareToSign->setModalFormAction('https://api.vide.me/v2/items/share/');
        $modalShareToSign->setModalTitle('Please confirm:');
        $modalShareToSign->setModalBody('
                <div class="videme_item_card_album">
                </div>
                <h4>
                    Choose your Album
                </h4>
                <div class="videme-list-list">
                </div>
                <a class="pull-left" href="https://www.vide.me/web/my_albums/">
                        Manage my Albums
                </a>');
        /*$modalShareToSign->setModalFooter('
                    <!--<a class="pull-left videme-tile-title" href="https://api.vide.me/pas/albums/">
                        Manage my Albums
                    </a>
                    <div class="form-group">
                        <input name="file" id="file" value="" type="hidden"/>
                        <label class="control-label" for="list">New list</label>
                        <input type="text" class="form-control" id="sharelist" value="common" name="list"/>
                    </div>-->

                    <button type="submit" class="btn btn-primary list-submit" id="list-submit" name="list-submit">
                        Save
                        <div class="videme-progress"></div>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>');*/
    }

    public function modalShowComment($modalShowComment)
    {
        $HTMLsample = new baseHTMLsample();
        $modalShowComment->setModalId('modal-show-comments');
        $modalShowComment->setModalFormId('');
        $modalShowComment->setModalFormAction('');
        $modalShowComment->setModalTitle('Comments:');
        $modalShowComment->setModalBody('

<div id="comments-container"></div>



                ');
        /*$modalShareToSign->setModalFooter('
                    <!--<a class="pull-left videme-tile-title" href="https://api.vide.me/pas/albums/">
                        Manage my Albums
                    </a>
                    <div class="form-group">
                        <input name="file" id="file" value="" type="hidden"/>
                        <label class="control-label" for="list">New list</label>
                        <input type="text" class="form-control" id="sharelist" value="common" name="list"/>
                    </div>-->

                    <button type="submit" class="btn btn-primary list-submit" id="list-submit" name="list-submit">
                        Save
                        <div class="videme-progress"></div>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>');*/
    }

    public function modalShareToFB($modalShareSpringToFB)
    {
        $HTMLsample = new baseHTMLsample();
        $modalShareSpringToFB->setModalId('modal-share-to-fb');
        $modalShareSpringToFB->setModalFormId('');
        $modalShareSpringToFB->setModalFormAction('');
        $modalShareSpringToFB->setModalTitle('Please share:');
        $modalShareSpringToFB->setModalBody('
                <div class="videme_item_card_share_to_fb">
                </div>
                ' . $HTMLsample->htmlButtonSocShareAllModal());
    }

    public function modalShowImage($modalShowImage)
    {
        $modalShowImage->setModalId('modal-show-image');
        $modalShowImage->setModalFormId('');
        $modalShowImage->setModalFormAction('');
        $modalShowImage->setModalTitle('<div class="videme_img_modal_title"></div>');
        $modalShowImage->setModalBody('
                <div class="videme-modal-item-image-place">
                </div>
                <div class="videme-modal-item-title-place">
                </div>
                <div class="videme-modal-item-content-place">
                </div>
                <div class="videme-modal-item-created_at-place">
                </div>
                <div class="videme-v3-tile-title ext_links_modal_image_title hidden">External links</div>
                <div class="ext_links_modal_image"></div>
                <div class="videme-v3-tile-title">Share</div>
                <div id="videme-soc-share-all-modal-image" style=\'font-size: .8rem;\'></div>');
        $modalShowImage->setModalFooter('');
    }

    public function modalShowArticle($modalShowArticle)
    {
        $modalShowArticle->setModalId('modal-show-article');
        $modalShowArticle->setModalFormId('');
        $modalShowArticle->setModalFormAction('');
        $modalShowArticle->setModalTitle('<div class="videme_img_modal_title"></div>');
        $modalShowArticle->setModalBody('
                <div class="videme-article-center">
                    <div class="videme-modal-article-content-place"></div>
                </div>');
        $modalShowArticle->setModalFooter('');
    }

    public function modalShowEmbedCode($modalShowEmbedCode)
    {
        $modalShowEmbedCode->setModalId('modal-show-embed-code');
        $modalShowEmbedCode->setModalFormId('');
        $modalShowEmbedCode->setModalFormAction('');
        $modalShowEmbedCode->setModalTitle('Embed code:');
        $modalShowEmbedCode->setModalBody('
                <div class="videme-embed-example"></div>
                <div class="videme-embed-code"></div>');
        $modalShowEmbedCode->setModalFooter('
                        <button type="button" class="btn btn-primary embed_copy" id="embed_copy">
                            Copy
                        </button>');
    }

    public function modalShowCopyLink($modalShowCopyLink)
    {
        $modalShowCopyLink->setModalId('modal-show-copy-link');
        $modalShowCopyLink->setModalFormId('');
        $modalShowCopyLink->setModalFormAction('');
        $modalShowCopyLink->setModalTitle('Copy link:');
        $modalShowCopyLink->setModalBody('
                <div class="videme-copy-link">
                </div>
                <div class="videme-copy-link-result">
                </div>');
        $modalShowCopyLink->setModalFooter('
                        <button type="button" class="btn btn-primary copy_link" id="copy_link">
                            Copy link
                        </button>');
    }

    public function modalShowNoStars($modalShowNoStars)
    {
        $modalShowNoStars->setModalId('modal-show-no-stars');
        //$modalShowNoStars->setModalFormId('');
        //$modalShowNoStars->setModalFormAction('');
        $modalShowNoStars->setModalTitle('Information');
        $modalShowNoStars->setModalBody('<p>You have no stars.</p>
Watch the video and get the stars.
For every 10 watched videos you get a star.');
        /*$modalShowNoStars->setModalFooter('
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');*/
    }

    public function modalAlbumEdit($modalAlbumEdit)
    {
        $HTMLsample = new baseHTMLsample();

        $modalAlbumEdit->setModalId('modal-edit-list');
        $modalAlbumEdit->setModalFormId('list-edit-form');
        $modalAlbumEdit->setModalFormAction('https://api.vide.me/v2/album/update/');
        $modalAlbumEdit->setModalTitle('Edit album:');
        $modalAlbumEdit->setModalBody('
<div class="form-group">
    <label class="col-md-3 control-label" for="new_title">Album</label>
    <div class="col-md-7">
        <input name="nad" id="nad" value="" type="hidden" />
        <input name="title" id="edit_album" value="" type="hidden" />
        <input type="text" class="form-control" id="new_title" value="" name="new_title" />
        <select class="form-control" id="access" name="access">
          <option value="public">public</option>
          <option value="private">private</option>
          <option value="friends">friends</option>
        </select>
    </div>
</div>'
            . $HTMLsample->htmlSelecFromtMyImage()
        );
        $modalAlbumEdit->setModalFooter('
        <button type=\'button\'
                                class=\'btn btn-danger pull-left btn-sm list-del-toggle\' data-bs-toggle=\'modal\'
                                data-bs-target=\'#modal-del-list\'>
                            <span class=\'glyphicon glyphicon-remove\'></span> Delete
                        </button>
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <button type="submit" class="btn btn-primary list-edit-submit" id="list-edit-submit"
                                name="list-edit-submit">
                            Save
                            <div class="videme-progress"></div>
                        </button>');
    }

    public function toastUploadSuccess()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLtoast.php');
        $toastUploadSuccess = new baseHTMLtoast();
        $toastUploadSuccess->setToastId('videme-toast-upload-success');
        $toastUploadSuccess->setToastTitleId('videme-toast-upload-success-title');
        $toastUploadSuccess->setToastTitle('Success');
        $toastUploadSuccess->setToastTimeAgoId('videme-toast-upload-success-time-ago');
        $toastUploadSuccess->setToastTimeAgo('moment ago');
        $toastUploadSuccess->setToastBodyId('videme-toast-upload-success-body');
        $toastUploadSuccess->setToastBody('Media uploaded');
        return $toastUploadSuccess->htmlToastCommon();
    }

    public function toastSuccess()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/toastSucces.php');
        $toastUploadSuccess = new toastSucces();
        $toastUploadSuccess->setToastId('videme-toast-success');
        //$toastUploadSuccess->setToastTitleId('videme-toast-upload-success-title');
        $toastUploadSuccess->setToastTitle('Success');
        //$toastUploadSuccess->setToastTimeAgoId('videme-toast-upload-success-time-ago');
        $toastUploadSuccess->setToastTimeAgo('moment ago');
        //$toastUploadSuccess->setToastBodyId('videme-toast-upload-success-body');
        $toastUploadSuccess->setToastBody('Done');
        return $toastUploadSuccess->htmlToastCommon();
    }

    public function modalItemEdit($modalItemEdit) // TODO: remove? 26072022 remove
    {
        //$HTMLsample = new baseHTMLsample();

        $modalItemEdit->setModalId('modal-item-edit');
        $modalItemEdit->setModalFormId('item-edit-form');
        $modalItemEdit->setModalFormAction('https://api.vide.me/v2/items/update/');
        $modalItemEdit->setModalTitle('Edit item:');
        $modalItemEdit->setModalBody('
        <div class="videme-modal-article-content-place">
          <!--<div class="videme_item_card_edit"></div>-->
                  <!--<img class="videme_item_edit_image_now img-thumbnail" id="videme_item_edit_image_now" src="" alt=""/>-->
          
<style>
label > input{ /* HIDE RADIO */
  visibility: hidden; /* Makes input not-clickable */
  position: absolute; /* Remove input from document flow */
}
label > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
}
label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
  border:2px solid #f00;
}
.videme_item_edit_image_label {
    position: relative;
    text-align: center;
    color: white;
}
.videme_item_edit_image_text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #b6001f;
}
</style>
                  <div class="form-group">
                    Select image
  <label class="videme_item_edit_image_label">
    <input type="radio" name="cover_select" value="item_id" id="cover_select" class="videme_select_image_item"/>
    <img class="videme_item_edit_image img-thumbnail" id="videme_item_edit_image_item" src="" alt="Use image from video"/>
  </label>
  
  <label class="videme_item_edit_image_label">
    <input type="radio" name="cover_select" value="cover" id="cover_select" class="videme_select_image"/>
    <img class="videme_item_edit_image img-thumbnail" id="videme_item_edit_image" src="" alt="Select image"/>
    <div class="videme_item_edit_image_text">Select image</div>
  </label>
                  </div>

                  <input name="nad" id="nad" type="hidden" />
                  <input name="item_id" id="item_id" type="hidden" />
                  <input name="cover" id="cover" type="hidden" />
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Title" name="title"/>
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>                  
                  </div>
                Access select
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="access" id="exampleRadios1" value="public" checked="checked" />
                  <label class="form-check-label" for="exampleRadios1">
                    Public
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="access" id="exampleRadios2" value="friends" />
                  <label class="form-check-label" for="exampleRadios2">
                    For friends
                  </label>
                </div>
                <div class="form-check disabled">
                  <input class="form-check-input" type="radio" name="access" id="exampleRadios3" value="private" />
                  <label class="form-check-label" for="exampleRadios3">
                    For me only
                  </label>
                </div>
                  <div id="tags"></div>
                  
                <hr />
                Add external link
                <div class="form-group">
                    <div class="form-group">
                        <input type="text" class="form-control" name="" id="ext_link_title" placeholder="Title" />
                        <input type="text" class="form-control" name="" id="ext_link_link" placeholder="link" />
                    </div>
                    <button id="NewItemExtLink" type="submit" class="btn btn-default">Add link</button>
                </div>
                <div class="add_ext_links"></div>
              </div>


            <!--<div class="sel-image"></div>-->
');
        $modalItemEdit->setModalFooter('
            <button type=\'button\' class=\'btn btn-outline-danger del-inbox-toggle mr-auto hidden\' data-bs-toggle=\'modal\'
                    data-bs-target=\'#modal-del\'>
                    <span class=\'glyphicon glyphicon-remove\'>
                    </span>
                delete
            </button>
            <button type=\'button\' class=\'btn btn-outline-danger del-sent-toggle mr-auto hidden\' data-bs-toggle=\'modal\'
                    data-bs-target=\'#modal-del\'>
                    <span class=\'glyphicon glyphicon-remove\'>
                    </span>
                delete
            </button>
            <button type=\'button\' class=\'btn btn-outline-danger del-my-toggle mr-auto\' data-bs-toggle=\'modal\'
                    data-bs-target=\'#modal-del\' data-dismiss="modal">
                    <span class=\'glyphicon glyphicon-remove\'>
                    </span>
                delete
            </button>
            <button type=\'button\' class=\'btn btn-outline-danger del-sharefile-toggle mr-auto hidden\' data-bs-toggle=\'modal\'
                    data-bs-target=\'#modal-del\'>
                    <span class=\'glyphicon glyphicon-remove\'>
                    </span>
                delete
            </button>
                        <div class="videme-progress"></div>
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <button type="submit" class="btn btn-primary item-edit-submit" id="list-edit-submit" name="item-edit-submit">
                            Save
        </button>');
    }

    public function modalSelectImage($modalSelectImage)
    {
        $HTMLsample = new baseHTMLsample();

        $modalSelectImage->setModalId('modal-select-image');
        $modalSelectImage->setModalFormId('');
        $modalSelectImage->setModalFormAction('');
        $modalSelectImage->setModalTitle('Select image:');
        $modalSelectImage->setModalBody(
            '<div class="videme-modal-article-content-place">'
            . $HTMLsample->htmlSelecFromtMyImage() .
            '</div>');
        $modalSelectImage->setModalFooter('
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <a class="btn btn-primary videme_select_image_submit" href="#" role="button">Ok</a>');
    }

    public function modalSelectVideoForCover($modalSelectVideoForCover) // 25072022
    {
        $HTMLsample = new baseHTMLsample();

        $modalSelectVideoForCover->setModalId('modal-select-video-true');
        $modalSelectVideoForCover->setModalFormId('');
        $modalSelectVideoForCover->setModalFormAction('');
        $modalSelectVideoForCover->setModalTitle('Select video');
        $modalSelectVideoForCover->setModalBody($HTMLsample->htmlSelectFromMyVideoForCreateCover());
        $modalSelectVideoForCover->setModalFooter('
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <a class="btn btn-primary videme_select_video_submit" href="#" role="button">Ok</a>');
    }

    public function modalSelectMyImage($modalSelectMyImage) // 25072022
    {
        $HTMLsample = new baseHTMLsample();

        $modalSelectMyImage->setModalId('modal-select-my-image');
        $modalSelectMyImage->setModalFormId('');
        $modalSelectMyImage->setModalFormAction('');
        $modalSelectMyImage->setModalTitle('Select image');
        $modalSelectMyImage->setModalBody($HTMLsample->htmlSelectFromMyImageForCreateArticle());
        $modalSelectMyImage->setModalFooter('
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <button class="btn btn-primary NewVidemeImageEmbed" id="NewVidemeImageEmbed" name="NewVidemeImageEmbed">
                            Select
                            <div class="videme-progress"></div>
                        </button>');
    }

    public function modalSelectMyVideo($modalSelectMyVideo)
    {
        $HTMLsample = new baseHTMLsample();

        $modalSelectMyVideo->setModalId('modal-select-video');
        $modalSelectMyVideo->setModalFormId('');
        $modalSelectMyVideo->setModalFormAction('');
        $modalSelectMyVideo->setModalTitle('Select video');
        $modalSelectMyVideo->setModalBody($HTMLsample->htmlSelectFromMyVideoForCreateArticle());
        $modalSelectMyVideo->setModalFooter('
                        <button type=\'button\' class=\'btn btn-default\' data-dismiss=\'modal\'>
                            Сancel
                        </button>
                        <button class="btn btn-primary NewVidemeVideoEmbed" id="NewVidemeVideoEmbed" name="NewVidemeVideoEmbed">
                            Select
                            <div class="videme-progress"></div>
                        </button>');
    }

    public function modalUploadImageOld16052019($modalUploadImage)
    {
        $modalUploadImage->setModalId('modal-cropper');
        $modalUploadImage->setModalFormId('');
        $modalUploadImage->setModalFormAction('');
        $modalUploadImage->setModalTitle('Cropper:');
        $modalUploadImage->setModalBody('
<!--
<main class="page">
-->
<div class="container-fluid">

    <h3>Upload image</h3>
                <div class="progress">
                    <div class="progress-bar result-progress" id="result-progress" role="progressbar" aria-valuenow="0"
                         aria-valuemin="0" aria-valuemax="0">
                        <span class="result-progress-value" id="result-progress-value"></span>
                    </div>
                </div>

    <!-- input file -->
    <div class="box">
        <input type="file" id="file-input" accept="image/*" name="croppedImage"/>
    </div>
    <!-- leftbox -->
    <div class="box-2">
        <div class="result"></div>
    </div>
    <!--rightbox-->
    <div class="box-2 img-result hidden">
        <!-- result of crop -->
        <img class="cropped" src="" alt=""/>
    </div>
    <!-- input file -->
    <div class="box">
        <div class="options hidden">
            <label> Width</label>
            <input type="number" class="img-w" value="300" min="100" max="1200"/>
        </div>
        <!-- save btn 
        <button class="btn save hidden" id="">Save</button>-->
        <!-- download btn -->
        <!--<a href="" class="btn download hidden">Download</a>
        <button  type="submit" name="save" value="crop" id="crop">Save to</button>-->

        <input name="upload_type" id="upload_type" type="hidden" />
        <input name=\'nad\' id=\'nad\' type=\'hidden\' />
        <div class="upload_options">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title_image" aria-describedby="title" placeholder="Title"
                       name="title"/>
                <!--<small id="title" class="form-text text-muted">Item title.</small>-->
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="2" name="content"></textarea>
                <!--<small id="content" class="form-text text-muted">Item content.</small>-->
            </div>
            <div class="form-group">
                <label for="access">Access select</label>
                <select class="form-control" id="access" name="access">
                    <option value="public" selected="selected">public</option>
                    <option value="private">private</option>
                    <option value="friends">friends</option>
                </select>
                <!--<small id="access" class="form-text text-muted">Access select.</small>-->
            </div>
            <div id="tags"></div>
        </div>
    </div>
    

<!--
</main>
-->

            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css" />
<!--
            <script src="https://fengyuanchen.github.io/js/common.js"></script>
-->
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"></script>-->
            <!--<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
            <script src="https://fengyuanchen.github.io/jquery-cropper/js/jquery-cropper.js"></script>-->
            
            
<!--25112021  <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
  <script src="https://fengyuanchen.github.io/jquery-cropper/js/jquery-cropper.js"></script>-->
            
            

</div>

');
        $modalUploadImage->setModalFooter('
        <div id="res"></div>
        <!--<button type="button" class="btn btn-primary" id="crop2">Save2</button>-->
        <button type="button" class="btn btn-primary hidden save" id="crop">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        ');
    }

    public function modalUploadImage($modalUploadImage)
    {
        $modalUploadImage->setModalId('modal-cropper');
        $modalUploadImage->setModalFormId('');
        $modalUploadImage->setModalFormAction('');
        $modalUploadImage->setModalTitle('Choose image');
        $modalUploadImage->setModalBody('
<!--
<main class="page">
-->
<div class="container-fluid">

    <!--<h3>Upload image</h3>-->
                <!--<div class="progress">
                    <div class="progress-bar result-progress" id="result-progress" role="progressbar" aria-valuenow="0"
                         aria-valuemin="0" aria-valuemax="0">
                        <span class="result-progress-value" id="result-progress-value"></span>
                    </div>
                </div>-->

    <!-- input file -->
    <!--<div class="box">
        <input type="file" id="file-input" accept="image/*" name="croppedImage"/>
    </div>-->
    <!-- leftbox -->
    <div class="box-2">
        <div class="videme-result-crop-choose"></div>
    </div>
    <div class="progress videme-crop-choose-progress hidden" style="height: .2rem; margin-top: .2rem;">
        <div aria-valuemax="100" aria-valuemin="0"
             class="progress-bar progress-bar-striped progress-bar-animated" id="videme-crop-choose-progress-val"
             role="progressbar" style=""></div>
    </div>
    <!--rightbox-->
    <!--<div class="box-2 img-result hidden">
        &lt;!&ndash; result of crop &ndash;&gt;
        <img class="cropped" src="" alt=""/>
    </div>-->
    <!-- input file -->
    <div class="box">
        <!--<div class="options hidden">
            <label> Width</label>
            <input type="number" class="img-w" value="300" min="100" max="1200"/>
        </div>-->
        <!-- save btn 
        <button class="btn save hidden" id="">Save</button>-->
        <!-- download btn -->
        <!--<a href="" class="btn download hidden">Download</a>
        <button  type="submit" name="save" value="crop" id="crop">Save to</button>-->

        <input name="upload_type" id="upload_type" type="hidden" />
        <input name=\'nad\' id=\'nad\' type=\'hidden\' />
        <!--<div class="upload_options">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title_image" aria-describedby="title" placeholder="Title"
                       name="title"/>
                &lt;!&ndash;<small id="title" class="form-text text-muted">Item title.</small>&ndash;&gt;
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="2" name="content"></textarea>
                &lt;!&ndash;<small id="content" class="form-text text-muted">Item content.</small>&ndash;&gt;
            </div>
            <div class="form-group">
                <label for="access">Access select</label>
                <select class="form-control" id="access" name="access">
                    <option value="public" selected="selected">public</option>
                    <option value="private">private</option>
                    <option value="friends">friends</option>
                </select>
                &lt;!&ndash;<small id="access" class="form-text text-muted">Access select.</small>&ndash;&gt;
            </div>
            <div id="tags"></div>
        </div>-->
    </div>
    

<!--
</main>
-->

            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css" />
<!--
            <script src="https://fengyuanchen.github.io/js/common.js"></script>
-->
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"></script>-->
            <!--<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
            <script src="https://fengyuanchen.github.io/jquery-cropper/js/jquery-cropper.js"></script>-->
            
            
  <!-- 22122021 <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
  <script src="https://fengyuanchen.github.io/jquery-cropper/js/jquery-cropper.js"></script>-->
            
            

</div>

');
        $modalUploadImage->setModalFooter('
        <!--<div id="res"></div>-->
        <!--<button type="button" class="btn btn-primary" id="crop2">Save2</button>-->
        
            <!--<div class="input-group videme_upload_video_file_all">
        <button type=\'button\' class="btn btn-success videme-button-crop-choose videme-round-button fileinput-button"
                id="">
            Choose file
            <input accept="image/*" class="videme-file-input-pas" id=""
                   name="croppedImage"
                   type="file"/>
        </button>-->
        <!--<input class="hidden" id=\'videme-upload-video-ticket_id_for_uploader\' name=\'ticket_id\' type=\'text\'/>-->
    <!--</div>-->

    <!--<div class="input-group videme_upload_video_file_ie hidden">
        <div class="custom-file">
            <input accept="image/*" type="file"
                   class="videme-file-input-pas custom-file-input" id="inputGroupFile03"
                   name="croppedImage" aria-describedby="inputGroupFileAddon03"/>
            <label class="custom-file-label videme-button-crop-choose" for="inputGroupFile03">Choose file</label>
        </div>
    </div>-->
        <span class="spinner-border spinner-border-sm videme-crop-save-upload-spinner hidden" role="status"
      aria-hidden="true"></span>
        <button type="button" class="btn btn-primary videme-round-button hidden" id="videme-button-crop-save-upload">Save</button>
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        
        
        ');
    }

    public function modalUploadMedia($modalUploadMedia) // main uploader
    {
        //$userList = $modalUploadMedia->getAdditional();
        $modalUploadMedia->setModalId('modal-videme_upload_video_image');
        $modalUploadMedia->setModalFormId('');
        $modalUploadMedia->setModalFormAction('');
        $modalUploadMedia->setModalTitle('Upload your media');
        $modalUploadMedia->setModalBody('
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.30.0/js/jquery.fileupload.js"></script>
<script src="https://api.vide.me/system/videme_upload.js"></script>
<script src="https://api.vide.me/system/jquery.autosize.min.js"></script>
<script src="https://api.vide.me/system/jquery.hashtags.min.js"></script>
<script src="https://api.vide.me/system/image-picker.min.js"></script>-->
<link type="text/css" href="https://api.vide.me/system/image-picker.css" rel="stylesheet" />
<link rel="stylesheet" href="https://api.vide.me/system/jquery.hashtags.min.css" />

<style type="text/css">
    .files video {
        max-width: 100%
    }
    /* ******************************************************************************** */
    #dropzone {
        /*background: palegreen;
        width: 150px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        font-weight: bold;*/
    }
    #dropzone.in {
        /*width: 600px;
        height: 200px;
        line-height: 200px;*/
        font-size: larger;
    }
    #dropzone.hover {
        background: lawngreen;
    }
    #dropzone.fade {
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
        opacity: 1;
    }
    /* ******************************************************************************** */
    .videme-upload-form-footer {
        width: 100%;
    }
    /* ******************************************************************************** */
    .fileinput-button {
  position: relative;
  overflow: hidden;
  display: inline-block;
}
    .fileinput-button input {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    opacity: 0;
    -ms-filter: \'alpha(opacity=0)\';
    font-size: 200px !important;
    direction: ltr;
    cursor: pointer;
}
</style>
<form class="form-vertical" id="upload_public" name="upload_public" role="form">
    <input aria-describedby="title" class="form-control" id="title" name="title" placeholder="Title" type="text"
           style="/*! padding-bottom: 1px; */margin-bottom: .3rem;"/>
    <!--<textarea class="form-control" id="content" name="content" rows="2"></textarea>-->
    <div class=\'videme-upload-video-preview-panel\'>
        <div id="dropzone" class="text-center videme-preview-unavailable-panel fade well">
            <div class=\'videme-preview-unavailable-icon\'><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>
            <div class=\'videme-preview-unavailable-status\'><p class="h6">Select your media file</p></div>
            <div class=\'text-muted videme-preview-unavailable-text\'>You can drag and drop files here to add them.
            </div>
        </div>

        <div class=\'videme-upload-video-preview hidden\'>
            <video class=\'video-js vjs-big-play-centered\' controls=\'controls\' data-setup=\'{"fluid": true}\'
                   id=\'my-video_upload\'
                   preload=\'auto\'>
                <p class=\'vjs-no-js\'>
                    To view this video please enable JavaScript, and consider upgrading to a web browser
                    that
                    <a href=\'https://videojs.com/html5-video-support/\' target=\'_blank\'>supports HTML5
                        video</a>
                </p>
            </video>
        </div>

        <div class="videme-upload-image-preview-panel hidden">
            <img class="videme-upload-image-preview" src="" alt=""/>
        </div>
    </div>
    <div class="progress videme-upload-progress hidden" style="height: .5rem; margin-top: .2rem;">
        <div aria-valuemax="100" aria-valuemin="0"
             class="progress-bar progress-bar-striped progress-bar-animated" id="videme_upload_progress_modal"
             role="progressbar" style=""></div>
    </div>
    
    <div class=\'videme-upload-video-preview-collection-panel hidden\'>
        <h5 class="d-flex justify-content-center" id="">Select the poster frame or video thumbnail</h5>
        <span class="spinner-border spinner-border-sm videme-load-image-colletion-form-spinner hidden" role="status"
      aria-hidden="true"></span>
        <select class=\'videme-upload-video-preview-collection-tile-image-picker show-html hidden\' name="cover_upload">
        </select>
    </div>
    
    <input id=\'nad\' name=\'nad\' type=\'hidden\'/>
    <input class=\'hidden\' id=\'videme-upload-video-ticket_id\' name=\'ticket_id\' type=\'text\'/>
    <!--<input id="upload_type" name="upload_type" type="" class="hidden"/>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css" rel="stylesheet"/>
    
    
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <div class=\'form-group\'>
        <label for=\'content\'>Content</label>
        <textarea class=\'form-control\' id=\'item_edit_content\' rows=\'3\' name=\'content\'></textarea>
    </div>
    ' . $this->htmlTagsInput() . '
    
    <div class="form-group form-check hidden" id=\'videme-upload-no-post\'>
        <input type="checkbox" class="form-check-input" id="no_post" name="no_post" value="no_post" />
        <label class="form-check-label" for="no_post">Do not create a post</label>
    </div>
    
  </div>
</div>

</form>

<div class="alert alert-warning alert-dismissible videme_upload_alert hidden" role="alert">
  <strong>File size is too big!</strong> The maximum upload file size is 300 MB.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="videme-upload-form-modal-close-button-alert">
    <span aria-hidden="true">&#215;</span>
  </button>
</div>

<div class="videme-tile-my-tasks"></div>
    <script type="text/javascript">
                require(["jquery", "videme_jq"], function( $ ) {

        $(document).ready(function () {
                             $(\'#timer\').pietimer({
                                    seconds: 5,
                                    color: \'rgba(102, 0, 255, 0.8)\',
                                    height: 40,
                                    width: 40
                                },
                                function () {
                                    console.log("pietimer -----> location.reload();");
                                });
                            setInterval(function () {
                                $.fn.showMyTaskActiveOnly({
                                    limit: 6,
                                    showcaseMyTask: ".videme-tile-my-tasks"
                                });
                                $(\'#timer\').pietimer(\'start\');
                            }, 5000);
    });
    });
    </script>
');
        $modalUploadMedia->setModalFooter('
<form class="videme-upload-form-footer d-flex justify-content-between" action="https://api.vide.me/upload/"
      enctype="multipart/form-data" id="fileupload" method="POST">
      <div class="container-fluid px-0">
      <div class="row justify-content-end">
    <!--<div class="col-auto">-->

    ' . /*$userList['userList'] .*/ '
        <!--</div>-->

    <!--<div class="col-auto">
        <div class="input-group">
<span class="spinner-border spinner-border-sm2 videme-upload-form-spinner hidden" role="status"
      aria-hidden="true"></span>
    </div>
    </div>-->
    <input id="upload_type" name="upload_type" type="" class="hidden"/>

    <div class="col-auto">
    <!--<div class="input-group2 videme_upload_video_file_all">-->
    
        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-cog" aria-hidden="true"></i>
        </button>
    
        <button type="button" class="btn btn-success videme-browse-media-button videme-round-button fileinput-button"
                id="">
            Choose file
            <input accept="video/*,image/*" class="videme_upload_video_file videme-file-input" id=""
                   name="files"
                   type="file"/>
        </button>
        <input class="hidden" id="videme-upload-video-ticket_id_for_uploader" name="ticket_id" type="text"/>
    <!--</div>-->
    <div class="input-group videme_upload_video_file_ie hidden">
        <div class="custom-file">
            <input accept="video/*,image/*" type="file"
                   class="videme-browse-media-button videme-file-input custom-file-input" id="inputGroupFile03"
                   name="files" aria-describedby="inputGroupFileAddon03"/>
            <label class="custom-file-label videme-browse-media-button" for="inputGroupFile03">Choose file</label>
        </div>
    </div>
    <button type="button" class="btn btn-primary upload_public_submit videme-round-button hidden"
        id="upload_public_image_submit">
    Publish
</button>

<button type="button" class="btn btn-primary upload_public_submit videme-round-button hidden"
        id="upload_public_video_submit"
        name="">
    Publish
</button>
    </div>

   <!-- <div class="col-auto">
    <div class="input-group videme_upload_video_file_ie hidden">
        <div class="custom-file">
            <input accept="video/*,image/*" type="file"
                   class="videme-browse-media-button videme-file-input custom-file-input" id="inputGroupFile03"
                   name="files" aria-describedby="inputGroupFileAddon03"/>
            <label class="custom-file-label videme-browse-media-button" for="inputGroupFile03">Choose file</label>
        </div>
    </div>
    </div>-->
    
        <!--<div class="col-auto">
<button type="button" class="btn btn-primary upload_public_submit videme-round-button hidden"
        id="upload_public_image_submit">
    Publish
</button>

<button type="button" class="btn btn-primary upload_public_submit videme-round-button hidden"
        id="upload_public_video_submit"
        name="">
    Publish
</button>

</div>-->
</div>
</div>
</form>
');
    }
    public function showAlbumsForUploadModal($user_id)
    {
        $resUserList = $this->welcome->ConvParseData($this->welcome->pgShowMyAlbums(['user_id' => $user_id]));
        //echo "<!--";
        //print_r($resUserList);
        //echo "-->";
        $userList = "
                  <div class=\"input-group\">
               <!--<label for=\"album_id\" class='text-muted'><small>Select access</small></label>-->
                   <!--<div class=\"input-group-prepend\">-->
      <label class=\"input-group-text\" id='videme-form-upload-select-assess'><i class=\"fa fa fa-unlock videme_item_info_icon\"></i></label>
    <!--</div>-->
                   <select id=\"album_id\" class=\"form-select videme-upload-video-access-select\" name=\"album_id\">
                ";
        if ($resUserList) {

            foreach ($resUserList as $value1) {
                //echo "<!-- sign_id ";
                //print_r($value1["sign_id"]);
                //echo "-->";
                if (!empty($value1['album_id'])) {
                    $userList .= "<option value=\"" . $value1['album_id'] . "\">" . $value1["title"] . "</option>";
                }
            }

        } /*else {
                $userList = "";
            }*/
        $userList .= "
                    <option value=\"public\">Public</option>
                    <option value=\"friends\">Friends</option>
                    <option value=\"private\">Private</option>
               </select>

                 </div>
                ";
        return $userList;
    }

    public function fileUpload($dom, $domOutput)
    {
        $element = new Element();

        /*$element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_css,
                $element->href => 'https://api.vide.me/upload/css/style.css']);
        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_css,
                $element->href => 'https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css']);
        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_css,
                $element->href => 'https://api.vide.me/upload/css/jquery.fileupload.css']);
        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_css,
                $element->href => 'https://api.vide.me/upload/css/jquery.fileupload-ui.css']);
        $fileupload = $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->elementName => 'noscript']);
        $element->writeSmartTag($dom, $fileupload,
            [$element->type => $element->text_css,
                $element->href => 'https://api.vide.me/upload/css/jquery.fileupload-noscript.css']);
        $fileuploadUi = $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->elementName => 'noscript']);
        $element->writeSmartTag($dom, $fileuploadUi,
            [$element->type => $element->text_css,
                $element->href => 'https://api.vide.me/upload/css/jquery.fileupload-ui-noscript.css']);
        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/vendor/jquery.ui.widget.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.iframe-transport.js']);*/

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.fileupload.js']);

        /*$element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.fileupload-process.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.fileupload-image.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.fileupload-audio.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.fileupload-video.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.fileupload-validate.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/jquery.fileupload-ui.js']);

        $element->writeSmartTag($dom, $domOutput['col2'],
            [$element->type => $element->text_javascript,
                $element->src => 'https://api.vide.me/upload/js/main.js']);*/
    }

    public function sharePanel()
    {
        return "
<div class='bg-white my-2 px-2 py-2'>
        <div class=\"share-panel\">
            <div class=\"share-panel-title\">Share</div>
            <a role=\"button\" class=\"btn btn-outline-primary\" id='share-panel-button' href='https://www.vide.me/rec/' feedback='https://www.vide.me/rec/'>Send video</a>
            <a role=\"button\" class=\"btn btn-outline-primary share-panel-button\" id='share-panel-button' href='https://www.vide.me/web/upload/' feedback='https://www.vide.me/web/upload/'>Upload video</a>
            <a role=\"button\" class=\"btn btn-outline-primary\" id='upload_image' href='' feedback='' data-toggle=\"modal\" data-target=\"\" >Upload photo</a>
            <a role=\"button\" class=\"btn btn-outline-primary share-panel-button\" id='share-panel-button' href='https://api.vide.me/article/my/html/' feedback='https://api.vide.me/article/my/html/'>Create article</a>
        </div>
</div>
        
                    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css\" />

  <script src=\"https://unpkg.com/cropperjs/dist/cropper.js\"></script>
  <!--<script src=\"https://fengyuanchen.github.io/jquery-cropper/js/jquery-cropper.js\"></script>-->
            
            <style>


.page {
	margin: 1em auto;
	max-width: 768px;
	display: flex;
	align-items: flex-start;
	flex-wrap: wrap;
	height: 100%;
}
/*
.box {
	padding: 0.5em;
	width: 100%;
	!*margin:0.5em;*!
}*/

.box-2 {
	/*padding: 0.5em;
	width: calc(100%/2 - 1em);*/

}
/*
.options label,
.options input{
	width:4em;
	padding:0.5em 1em;
}
.btn{
	background:white;
	color:black;
	border:1px solid black;
	padding: 0.5em 1em;
	text-decoration:none;
	margin:0.8em 0.3em;
	display:inline-block;
	cursor:pointer;
}

.hide {
	display: none;
}*/

img {
	max-width: 100%;
}

/* ======     ====          ===== */

/*.img-result {
  border: 2px solid;
  width: 50px;
  height: 50px;
}*/

/*.img-result img {
  max-height: 100%;
  max-width: 100%;
}

.page {
  display: flex;
  align-items: flex-start;
  flex-wrap: wrap;
  height: 100%;
}

.result {
  display: flex;
}

.box {
  padding: 0.5em;
  width: 100%;
  margin: 0.5em;
}

.box-2 {
  padding: 0.5em;
  width: calc(100%/2 - 1em);
}*/

/*.img-w {
  display: none;
}*/

img {
  max-width: 100%; /* This rule is very important, please do not ignore this! */
}
            </style>
        ";

    }

    public function sharePanelMini()
    {
        return "
<div class='bg-white my-2 px-2 py-2'>
        <div class=\"share-panel\">
            <div class=\"share-panel-title\">Share to Vide.me</div>
            <a role=\"button\" class=\"btn btn-outline-primary\" id='share-panel-button' href='https://www.vide.me/rec/' feedback='https://www.vide.me/rec/'>
                <span class=\"fa fa-file-video-o fa-lg\" aria-hidden=\"true\"></span>
            </a>
            <a role=\"button\" class=\"btn btn-outline-primary share-panel-button\" id='share-panel-button' href='https://www.vide.me/web/upload/' feedback='https://www.vide.me/web/upload/'>
                <span class=\"fa fa-video-camera fa-lg\" aria-hidden=\"true\"></span>
            </a>
            <a role=\"button\" class=\"btn btn-outline-primary\" id='upload_image' href='' feedback='' data-toggle=\"modal\" data-target=\"\" >
                <span class=\"fa fa-photo fa-lg\" aria-hidden=\"true\"></span>
            </a>
            <a role=\"button\" class=\"btn btn-outline-primary share-panel-button\" id='share-panel-button' href='https://api.vide.me/article/my/html/' feedback='https://api.vide.me/article/my/html/'>
                <span class=\"fa fa-newspaper-o fa-lg\" aria-hidden=\"true\"></span>
            </a>
        </div>
</div>
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css\" />
<script src=\"https://unpkg.com/cropperjs/dist/cropper.js\"></script>";
    }

    public function eventStartStopPanel($eventStartStopPanel)
    {
        //$time = '<div class=\'videme-tile-title\'>started_at</div>';
        if (!empty($eventStartStopPanel['started_at'])) {
            //$time .= '<p>' . $eventStartStopPanel['started_at'] . '</p>';
            return '<div class="h5">Event time</div><div class=\'videme-title-started_at\'>' . $this->welcome->humanDateRanges($eventStartStopPanel['started_at'], $eventStartStopPanel['stopped_at']) . '</div>';
        }
        /*if (!empty($eventStartStopPanel['stopped_at'])) {
            $time .= '<p>' . $eventStartStopPanel['stopped_at'] . '</p>';
        }*/
        //return $time;
    }

    public function eventCountryCityPlacePanel($eventCountryCityPlacePanel)
    {
        //$time = '<div class=\'videme-tile-title\'>Place</div>';
        if (!empty($eventCountryCityPlacePanel['item_country'])) {
            $time = '<div class=\'h3 videme-title-item_country\'>' . $eventCountryCityPlacePanel['item_country'] . ', </div>';
        }
        if (!empty($eventCountryCityPlacePanel['item_city'])) {
            $time .= '<div class=\'h3 videme-title-item_city\'>' . $eventCountryCityPlacePanel['item_city'] . ', </div>';
        }
        if (!empty($eventCountryCityPlacePanel['place'])) {
            $time .= '<div class=\'h3 videme-title-place\'>' . $eventCountryCityPlacePanel['place'] . '</div>';
        }
        return $time;
    }

    public function innerDivContainer($innerDivContainer)
    {
        return "<div class='container'>" . $innerDivContainer . "</div>";
    }

    public function showBody($convert)
    {
        $welcome = new NAD();
        $echo = '';
        if (isset($convert['body'])) {
            foreach ($convert['body'] as $value1) {
                foreach ($value1 as $key => $value2) {
                    switch (key($value1)) {
                        case "text":
                            $echo .= "
<div class=\"portlet\">
  <div class=\"portlet-header\">text</div>
    <div class=\"portlet-content\">
      <textarea class=\"form-control\" name=\"article[body][][text]\" rows=\"3\">
{$welcome->safetyTagsSlashesTrim4096($value2)}
      </textarea>
    </div>
</div>
";
                            break;
                        case "video":
                            $echo .= "
<div class=\"portlet\">
  <div class=\"portlet-header\">video</div>
    <div class=\"portlet-content\">
      <textarea class=\"form-control\" name=\"article[body][][video]\" rows=\"3\">
" . $value2 . "
      </textarea>
    </div>
</div>
";
                            break;
                        case "url":
                            $echo .= "
<div class=\"portlet\">
  <div class=\"portlet-header\">url</div>
    <div class=\"portlet-content\">
      <textarea class=\"form-control\" name=\"article[body][][url]\" rows=\"3\">
" . $value2 . "
      </textarea>
    </div>
</div>
";
                            break;
                        case "YTVideo":
                            $echo .= "
<div class=\"portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all\">
  <div class=\"portlet-header ui-widget-header ui-corner-all\">Embed youtube video
    <span class='ui-icon ui-icon-closethick portlet-close'></span>
  </div>
    <div class=\"portlet-content\">
        <div class=\"fixed-aspect-wrapper\">
            <div class=\"fixed-aspect-padder\">
                <iframe src=\"https://www.youtube.com/embed/" . $value2 . "\" frameborder=\"0\" class='whatever-needs-the-fixed-aspect' allowfullscreen='allowfullscreen'></iframe>
                    <input type=\"hidden\" id=\"VMVideo\" name=\"article[body][][YTVideo]\" value=\"" . $value2 . "\" />
            </div>
        </div>
    </div>
</div>
";
                            break;

                        case "VMVideo":
                            $echo .= "
<div class=\"portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all\">
  <div class=\"portlet-header ui-widget-header ui-corner-all\">Embed your video
    <span class='ui-icon ui-icon-closethick portlet-close'></span>
  </div>
    <div class=\"portlet-content\">
        <div class=\"fixed-aspect-wrapper\">
            <div class=\"fixed-aspect-padder\">
                <iframe src='https://www.vide.me/embed/?i=" . $value2 . "' frameborder=\"0\" class='whatever-needs-the-fixed-aspect' allowfullscreen='allowfullscreen'></iframe>
                    <input type=\"hidden\" id=\"VMVideo\" name=\"article[body][][VMVideo]\" value=\"" . $value2 . "\" />
            </div>
        </div>
    </div>
</div>
";
                            break;
                        case "VMImage":
                            $echo .= "
<div class=\"portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all\">
  <div class=\"portlet-header ui-widget-header ui-corner-all\">Embed your image
    <span class='ui-icon ui-icon-closethick portlet-close'></span>
  </div>
    <div class=\"portlet-content\">
<img src='" . $this->origin_img_vide_me . $value2 . ".jpg' />
<input type='hidden' id='VMImage' name='article[body][][VMImage]' value='" . $value2 . "' />
    </div>
</div>
";
                            break;
                        case "img":
                            $echo .= "
<div class=\"portlet\">
  <div class=\"portlet-header\">img</div>
    <div class=\"portlet-content\">
      <textarea class=\"form-control\" name=\"article[body][][img]\" rows=\"3\">
{$welcome->safetyTagsSlashesTrim4096($value2)}
      </textarea>
    </div>
</div>
";
                            break;
                        default:
                            break;
                    }
                }
            }
        }
        return $echo;
    }

    public function showEditTags($convert)
    {
        $echo = '';
        if (!empty($convert['tags'])) {
            //var_dump($convert['tags']);
            $tags = json_decode($convert['tags']);
            foreach ($tags as $value1) {
                $web_id = $this->welcome->trueRandom();
                $echo .= "
<input type=\"hidden\" name=\"article[tags][$value1]\" value=\"" . $value1 . "\" class='" . $web_id . "'/>
<a class=\"badge badge-primary videme-edit-tag " . $web_id . "\" href='#'>
    " . $value1 . "
    <a class=\"tag_remove\" href=\"#\" tag_remove_title=\"" . $web_id . "\">
        <i class=\"fa fa-remove\"></i>
    </a>
</a>";
            }
        }
        return $echo;
    }
    public function showBS5_darkJS()
    {
        return "    /*
      *************************************************************************
      *** CODE FOR THE TOGGLE BUTTON STARTS HERE
      *************************************************************************
    */
        //localStorage.setItem('preferred-color-scheme', 'light');
        //localStorage.setItem('preferred-color-scheme', 'dark');
        // from: https://stackoverflow.com/questions/9899372#9899701
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === 'complete' || document.readyState === 'interactive') {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener('DOMContentLoaded', fn);
            }
        }
        docReady(function() {
            // DOM is loaded and ready for manipulation from here
            // parts from: https://radek.io/posts/secret-darkmode-toggle/
            const toggle_btn = document.getElementById('videme-dark-mode-toggle-btn');
            if (toggle_btn) {
                toggle_btn.addEventListener('click', () => {
                const color_p = toggle_btn.checked ? 'dark' : 'light';
            
                if (!isCssInit) initColorCSS(color_p);
            
                setColorPreference(color_p, true);
                updateUI(color_p);
            });
             }
            var isCssInit = false;
            function setColorPreference(color_p, persist = false) {
                const new_s = color_p;
                const old_s = color_p === 'light' ? 'dark' : 'light'
                const el = document.body;  // gets root html tag
                el.classList.add('color-scheme-' + new_s);
                el.classList.remove('color-scheme-' + old_s);
                if (persist) {
                    localStorage.setItem('preferred-color-scheme', color_p);
                    document.cookie = 'preferred-color-scheme=' + color_p + '; path=/; domain=vide.me; max-age=1209600; secure; SameSite=None;';
                }
            }

            function updateUI(color_p, id = 'css') {
                if (toggle_btn) {
                    toggle_btn.checked = color_p === 'dark';
                    if (isCssInit) {
                        const el = document.querySelector('#'+id);
                        const data = el.dataset;
                        if (toggle_btn.checked) {
                            el.setAttribute('href', data.hrefDark)
                        } else {
                            el.setAttribute('href', data.hrefLight);
                        }
                        data.colorScheme = color_p;
                    }
                }
            }

            function initColorCSS(color_p, id = 'css') {
                isCssInit = true;
            
                el_o = document.querySelector('#'+id);
                if (el_o !== null) el_o.remove();
                el_l = document.querySelector('#'+id+'-light');
                el_d = document.querySelector('#'+id+'-dark');
                if (color_p === 'dark') {
                    el = el_d;
                    el_o = el_l;
                } else {
                    el = el_l;
                    el_o = el_d;
                }
                el.setAttribute('data-href-light', el_l.getAttribute('href'));
                el.setAttribute('data-href-dark', el_d.getAttribute('href'));
                el.setAttribute('data-color-scheme', color_p);
                el.setAttribute('media', 'all');
                el.setAttribute('id', id);
                el_o.remove();
            }

            /*document.addEventListener('keypress', function(event){
                var keyName = event.key;
                if ((keyName == 'd') || (keyName == 'D')) {
                    toggle_btn.click();
                }
            });*/
            /* Set Preference on load */
            const osColorPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            // console.log('OS wants ' + osColorPreference);
            //var preferredColorScheme = localStorage.getItem('preferred-color-scheme');
            var preferredColorScheme =  document.cookie.match('(^|;)\\\\s*' + 'preferred-color-scheme' + '\\\\s*=\\\\s*([^;]+)')?.pop() || '';
            if (preferredColorScheme !== null) {
                initColorCSS(preferredColorScheme);
            } else {
                preferredColorScheme = osColorPreference;
            }
            setColorPreference(preferredColorScheme, false);
            updateUI(preferredColorScheme);
            //console.info('hs5 coolie ---> ' + $.cookie('vide_nad'));

        });";
    }
    public function showBS5_darkCSS()
    {
        return "
        <style type=\"text/css\">
        /* Show it is fixed to the top */
        body {
            /*min-height: 75rem;*/ /* TODO: remove */
            /*padding-top: 2.6rem;*/
            padding-top: 47px;
        }
        video {
            max-width: 100%;
            vertical-align: top;
        }
        /*video[poster]{
            max-height: 100px;
        }*/
        .recordrtc video {
            /*
                        width: 70%;
            */
            width: 100%;
        }
        body {
            /*background-color: #EAF3FF;*/
            background-image:none
        }
        .bg-white {
            background-color: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.125);
border-radius: 0.25rem;

        }
        .card-img-top{
            width:100%;
            /*height:auto;*/
            height: 10rem;
        }

        .bqr {
            max-width: 100px;
            min-width: 100px;
            margin-top: -70px;
            /*margin-bottom: 5px;
            border: 3px solid #fff;
            border-radius: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);*/
        }
        /*.box {
            width: 100%;
            padding-bottom: 56.25%;
        }*/
        
        
        :root {
            --videme-color: rgb(250, 250, 250);
            --videme-color-gray: rgb(168, 168, 168);
            --videme-background-color: rgb(5, 5, 5);
        }
        .color-scheme-dark .bg-white {
            background-color: var(--videme-background-color) !important;
        }
        .color-scheme-dark .itemscope {
            background-color: var(--videme-background-color);
        }
        .color-scheme-dark .videme-tile-v3-card-block {
            background-color: var(--videme-background-color);
        }
        .color-scheme-dark a.videme-v3-link:link {
            background-color: var(--videme-background-color);
            color: var(--videme-color);
        }

        .color-scheme-dark a.videme-v3-link {
            color: white;
        }

        .color-scheme-dark .videme-tile-v3-card-text-date {
            color: white;
        }

        .color-scheme-dark .videme-tile-v3-card-footer {
            color: white;
        }

        .color-scheme-dark .videme-relation-card-user a {
            color: white;
        }

        .color-scheme-dark .text-muted {
            color: white !important;;
        }
        .color-scheme-dark .videme_showcase_item_info {
            color: white;
        }
        .color-scheme-dark .navbar {
            /*background-color: #121212 !important;*/
            background-color: var(--videme-background-color) !important;
        }
        .color-scheme-dark .videme-preview-unavailable-panel {
            background-color: var(--videme-background-color);
        }
        .color-scheme-dark .videme-trend-tag-title a {
            color: var(--videme-color);
        }
        .color-scheme-dark .videme-sign-sign-in {
            color: var(--videme-color);
        }
        .color-scheme-dark .videme-doorbell-sign-1st-line-trend-title a {
            color: var(--videme-color);
        }
        .color-scheme-dark .videme-showcase-title {
            color: var(--videme-color);
        }
        .color-scheme-dark .videme-doorbell-sign-content a {
            color: var(--videme-color);
        }
        .color-scheme-dark .videme-doorbell-sign-title a {
            color: var(--videme-color);
        }
        .color-scheme-dark .videme-doorbell-sign-2nd-line-trend-user-display-name a {
            color: var(--videme-color-gray);
        }
        /* playlist */
        .color-scheme-dark .list-group-item.videme-list-media-li.active {
            background-color: var(--videme-background-color);
            color: var(--videme-color);
        }
        .color-scheme-dark .videme-list-media-title a {
            color: var(--videme-color);
        }
    </style>
        ";
    }
}