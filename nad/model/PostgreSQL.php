<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 09.11.17
 * Time: 22:35
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');

class PostgreSQL
{
    public function __construct()
    {
        $this->pgConn = $this->pgConnect();
        //$this->pgConnOwn = $this->pgConnectOwn();
        $this->welcome = new NAD();
        $this->log = new log();

        $this->table_users = 'users';
        $this->table_users_prefer = 'users_prefer';
        $this->table_items = 'items';
        //$this->table_activity = 'activity3';
        $this->table_messages = 'messages';
        $this->table_signs = 'signs';
        $this->table_posts = 'posts';
        $this->table_pairs = 'pairs';
        $this->table_items_counts = 'items_counts';
        $this->table_users_items_views = 'users_items_views';
        $this->table_users_items_tags_views = 'users_items_tags_views';
        $this->table_users_items_tags_sets = 'users_items_tags_sets';
        $this->table_items_stars = 'items_stars';
        $this->table_relationships = 'relationships';
        $this->table_friendship = 'friendship';
        $this->table_tasks = 'tasks';
        $this->table_items_tags_array = 'items_tags_array';
        $this->table_access_items_friends = 'access_items_friends';
        $this->table_albums = 'albums';
        $this->table_albums_sets = 'albums_sets';
        $this->table_access_albums_friends = 'access_albums_friends';
        $this->table_items_likes = 'items_likes';
        $this->table_items_reposts = 'items_reposts';
        $this->table_external_links = 'external_links';
        $this->table_comments = 'comments';
        $this->table_items_tags = 'items_tags';
        $this->table_users_tags = 'users_tags';
        $this->table_items_trands = 'items_trands';
        $this->table_users_scores_tags = 'users_scores_tags';
        $this->table_essences = 'essences';
        $this->table_users_essences = 'users_essences';
        $this->table_users_ref_essences = 'users_ref_essences';
        $this->table_items_partners = 'items_partners';
        $this->table_facebook_users_deletion = 'facebook_users_deletion';
        $this->table_users_settings = 'users_settings';
        $this->table_lists_items = 'lists_items';
        $this->table_items_views = 'items_views';
        $this->table_el_trendmaker = 'el_trendmaker';
        //$this->table_access_items_followers = 'access_items_followers';
    }

    /**
     * @return string
     */
    public function getTableUsers(): string
    {
        return $this->table_users;
    }

    /**
     * @return string
     */
    public function getTableItems(): string
    {
        return $this->table_items;
    }

    /**
     * @return string
     */
    public function getTableActivity(): string
    {
        return $this->table_activity;
    }

    /**
     * @return string
     */
    public function getTableUsersPrefer(): string
    {
        return $this->table_users_prefer;
    }

    /**
     * @return string
     */
    public function getTableSigns(): string
    {
        return $this->table_signs;
    }

    /**
     * @return string
     */
    public function getTablePosts(): string
    {
        return $this->table_posts;
    }

    /**
     * @return string
     */
    public function getTablePairs(): string
    {
        return $this->table_pairs;
    }

    public function pgConnect()
    {
        //echo "\n\tclass PostgreSQL insight: ";
        /*$url = parse_url(getenv("DATABASE_URL"));

        $host = $url["host"];
        $port = $url["port"];
        $username = $url["user"];
        $password = $url["pass"];
        $database = substr($url["path"], 1);*/
        /*$host = 'ec2-184-73-247-240.compute-1.amazonaws.com';
        $port = '5432';
        $username = 'mmxdhsxrwhdwzx';
        $password = '21f0f813cb3815ce8b367c52e7abdd97ea326d2abe877832a12e2875242b04ec';
        $database = 'dbv4rukbnmtgtt';*/

        //$host = 'ec2-107-20-163-96.compute-1.amazonaws.com';
        //$host = 'ec2-3-91-21-32.compute-1.amazonaws.com';
        //$host = 'ec2-54-87-44-113.compute-1.amazonaws.com';
        //$host = 'ec2-3-86-95-164.compute-1.amazonaws.com';
        $host = 'insight.vide.me';
        //$host = '192.168.0.101';
        $port = '5432';
        $username = 'pgvideme';
        $password = 'Pilsner1';
        $database = 'pgvideme';

        try {
            $conn = pg_pconnect("host=$host port=$port dbname=$database user=$username password=$password") or die("No base connect");
            return $conn;

        } catch (Exception $e) {
            echo 'No DB. ' . $e;
            return false;
            //echo "No file. ";
        }
    }
    public function pgConnectOwn()
    {
        /*$url = parse_url(getenv("DATABASE_URL"));

        $host = $url["host"];
        $port = $url["port"];
        $username = $url["user"];
        $password = $url["pass"];
        $database = substr($url["path"], 1);*/
        //$host = 'ec2-184-73-247-240.compute-1.amazonaws.com';
        //$host = '172.31.28.48';
        $host = 'studio7.vide.me';
        $port = '5432';
        $username = 'pgvideme';
        $password = 'Pilsner1';
        $database = 'pgvideme';

        try {
            $conn = pg_pconnect("host=$host port=$port dbname=$database user=$username password=$password") or die("No base connect");
            return $conn;

        } catch (Exception $e) {
            echo 'No DB. ' . $e;
            return false;
            //echo "No file. ";
        }
    }

    public function pgPaddingItems($pgPaddingItems)
    {
        //echo "\npgPaddingItems pgPaddingItems\n";
        //print_r($pgPaddingItems);
        $pgTrueItems = [];
        //  =========================================
        if (!empty($pgPaddingItems['updated_at']))
            $pgTrueItems['updated_at'] = $pgPaddingItems['updated_at'];

        // users ====================================
        if (!empty($pgPaddingItems['user_id']))
            $pgTrueItems['user_id'] = $pgPaddingItems['user_id'];

        if (!empty($pgPaddingItems['user_email']))
            $pgTrueItems['user_email'] = $pgPaddingItems['user_email'];

        if (!empty($pgPaddingItems['user_display_name']))
            $pgTrueItems['user_display_name'] = $pgPaddingItems['user_display_name'];

        if (!empty($pgPaddingItems['user_first_name']))
            $pgTrueItems['user_first_name'] = $pgPaddingItems['user_first_name'];

        if (!empty($pgPaddingItems['user_last_name']))
            $pgTrueItems['user_last_name'] = $pgPaddingItems['user_last_name'];

        if (!empty($pgPaddingItems['user_link']))
            $pgTrueItems['user_link'] = $pgPaddingItems['user_link'];

        if (!empty($pgPaddingItems['user_gender']))
            $pgTrueItems['user_gender'] = $pgPaddingItems['user_gender'];

        if (!empty($pgPaddingItems['user_birthday']))
            $pgTrueItems['user_birthday'] = $pgPaddingItems['user_birthday'];

        if (!empty($pgPaddingItems['user_locale']))
            $pgTrueItems['user_locale'] = $pgPaddingItems['user_locale'];

        if (!empty($pgPaddingItems['user_picture']))
            $pgTrueItems['user_picture'] = $pgPaddingItems['user_picture'];

        if (!empty($pgPaddingItems['user_cover']))
            $pgTrueItems['user_cover'] = $pgPaddingItems['user_cover'];

        if (!empty($pgPaddingItems['user_cover_top']))
            $pgTrueItems['user_cover_top'] = $pgPaddingItems['user_cover_top'];

        if (!empty($pgPaddingItems['spring']))
            $pgTrueItems['spring'] = $pgPaddingItems['spring'];

        if (!empty($pgPaddingItems['social_prefix']))
            $pgTrueItems[$pgPaddingItems['social_prefix']] = $pgPaddingItems['social_id'];

        if (!empty($pgPaddingItems['facebook']))
            $pgTrueItems['facebook'] = $pgPaddingItems['facebook'];

        if (!empty($pgPaddingItems['google']))
            $pgTrueItems['google'] = $pgPaddingItems['google'];

        if (!empty($pgPaddingItems['microsoft']))
            $pgTrueItems['microsoft'] = $pgPaddingItems['microsoft'];

        if (!empty($pgPaddingItems['last_login']))
            $pgTrueItems['last_login'] = $pgPaddingItems['last_login'];

        if (!empty($pgPaddingItems['last_active']))
            $pgTrueItems['last_active'] = $pgPaddingItems['last_active'];

        if (!empty($pgPaddingItems['country']))
            $pgTrueItems['country'] = $pgPaddingItems['country'];

        if (!empty($pgPaddingItems['city']))
            $pgTrueItems['city'] = $pgPaddingItems['city'];

        if (!empty($pgPaddingItems['bio']))
            $pgTrueItems['bio'] = $pgPaddingItems['bio'];

        if (!empty($pgPaddingItems['slogan']))
            $pgTrueItems['slogan'] = $pgPaddingItems['slogan'];

        if (!empty($pgPaddingItems['ext_info']))
            $pgTrueItems['ext_info'] = $pgPaddingItems['ext_info'];

        if (!empty($pgPaddingItems['lat']))
            $pgTrueItems['lat'] = $pgPaddingItems['lat'];

        if (!empty($pgPaddingItems['lng']))
            $pgTrueItems['lng'] = $pgPaddingItems['lng'];

        if (!empty($pgPaddingItems['created_at']))
            $pgTrueItems['created_at'] = $pgPaddingItems['created_at'];

        if (!empty($pgPaddingItems['updated_at']))
            $pgTrueItems['updated_at'] = $pgPaddingItems['updated_at'];

        if (!empty($pgPaddingItems['updated_at']))
            $pgTrueItems['updated_at'] = $pgPaddingItems['updated_at'];

        // items =====================================

        if (!empty($pgPaddingItems['item_id']))
            $pgTrueItems['item_id'] = $pgPaddingItems['item_id'];

        if (!empty($pgPaddingItems['owner_id']))
            $pgTrueItems['owner_id'] = $pgPaddingItems['owner_id'];

        if (!empty($pgPaddingItems['type']))
            $pgTrueItems['type'] = $pgPaddingItems['type'];

        if (!empty($pgPaddingItems['title']))
            $pgTrueItems['title'] = $pgPaddingItems['title'];

        if (!empty($pgPaddingItems['content']))
            $pgTrueItems['content'] = $pgPaddingItems['content'];

        if (!empty($pgPaddingItems['video_duration']))
            $pgTrueItems['video_duration'] = $pgPaddingItems['video_duration'];

        if (!empty($pgPaddingItems['width']))
            $pgTrueItems['width'] = $pgPaddingItems['width'];

        if (!empty($pgPaddingItems['height']))
            $pgTrueItems['height'] = $pgPaddingItems['height'];

        if (!empty($pgPaddingItems['category']))
            $pgTrueItems['category'] = $pgPaddingItems['category'];

        if (!empty($pgPaddingItems['status']))
            $pgTrueItems['status'] = $pgPaddingItems['status'];

        if (!empty($pgPaddingItems['status']))
            $pgTrueItems['status'] = $pgPaddingItems['status'];

        if (!empty($pgPaddingItems['cover']))
            $pgTrueItems['cover'] = $pgPaddingItems['cover'];

        if (!empty($pgPaddingItems['body']))
            $pgTrueItems['body'] = $pgPaddingItems['body'];

        if (!empty($pgPaddingItems['tags']))
            $pgTrueItems['tags'] = $pgPaddingItems['tags'];

        if (!empty($pgPaddingItems['count_show']))
            $pgTrueItems['count_show'] = $pgPaddingItems['count_show'];

        if (!empty($pgPaddingItems['likes_count']))
            $pgTrueItems['likes_count'] = $pgPaddingItems['likes_count'];

        if (!empty($pgPaddingItems['its_like']))
            $pgTrueItems['its_like'] = $pgPaddingItems['its_like'];

        if (!empty($pgPaddingItems['reposts_count']))
            $pgTrueItems['reposts_count'] = $pgPaddingItems['reposts_count'];

        if (!empty($pgPaddingItems['ext_links']))
            $pgTrueItems['ext_links'] = $pgPaddingItems['ext_links'];

        if (!empty($pgPaddingItems['src']))
            $pgTrueItems['src'] = $pgPaddingItems['src'];

        // events =====================================

        if (!empty($pgPaddingItems['cover_video']))
            $pgTrueItems['cover_video'] = $pgPaddingItems['cover_video'];

        if (!empty($pgPaddingItems['started_at']))
            $pgTrueItems['started_at'] = $pgPaddingItems['started_at'];

        if (!empty($pgPaddingItems['stopped_at']))
            $pgTrueItems['stopped_at'] = $pgPaddingItems['stopped_at'];

        if (!empty($pgPaddingItems['item_country']))
            $pgTrueItems['country'] = $pgPaddingItems['item_country'];

        if (!empty($pgPaddingItems['item_city']))
            $pgTrueItems['city'] = $pgPaddingItems['item_city'];

        if (!empty($pgPaddingItems['place']))
            $pgTrueItems['place'] = $pgPaddingItems['place'];

        // messages =====================================

        if (!empty($pgPaddingItems['message_id']))
            $pgTrueItems['message_id'] = $pgPaddingItems['message_id'];

        if (!empty($pgPaddingItems['to_user_id']))
            $pgTrueItems['to_user_id'] = $pgPaddingItems['to_user_id'];

        if (!empty($pgPaddingItems['from_user_id']))
            $pgTrueItems['from_user_id'] = $pgPaddingItems['from_user_id'];

        if (!empty($pgPaddingItems['select_to_user_id']))
            $pgTrueItems['select_to_user_id'] = $pgPaddingItems['select_to_user_id'];

        if (!empty($pgPaddingItems['select_from_user_id']))
            $pgTrueItems['select_from_user_id'] = $pgPaddingItems['select_from_user_id'];

        if (!empty($pgPaddingItems['read_date']))
            $pgTrueItems['read_date'] = $pgPaddingItems['read_date'];

        if (!empty($pgPaddingItems['connect']))
            $pgTrueItems['connect'] = $pgPaddingItems['connect'];

        // signs =====================================

        //if (!empty($pgPaddingItems['sign_id']))
        //    $pgTrueItems['sign_id'] = $pgPaddingItems['sign_id'];

        // Albums =====================================

        if (!empty($pgPaddingItems['album_id']))
            $pgTrueItems['album_id'] = $pgPaddingItems['album_id'];

        if (!empty($pgPaddingItems['albums_sets_id']))
            $pgTrueItems['albums_sets_id'] = $pgPaddingItems['albums_sets_id'];

        // posts =====================================

        if (!empty($pgPaddingItems['post_id']))
            $pgTrueItems['post_id'] = $pgPaddingItems['post_id'];

        if (!empty($pgPaddingItems['post_owner_id']))
            $pgTrueItems['post_owner_id'] = $pgPaddingItems['post_owner_id'];

        // pairs =====================================

        if (!empty($pgPaddingItems['pair_id']))
            $pgTrueItems['pair_id'] = $pgPaddingItems['pair_id'];

        if (!empty($pgPaddingItems['prev_item_id']))
            $pgTrueItems['prev_item_id'] = $pgPaddingItems['prev_item_id'];

        if (!empty($pgPaddingItems['prev_post_id']))
            $pgTrueItems['prev_post_id'] = $pgPaddingItems['prev_post_id'];

        if (!empty($pgPaddingItems['prev_user_id']))
            $pgTrueItems['prev_user_id'] = $pgPaddingItems['prev_user_id'];

        if (!empty($pgPaddingItems['prev_sign_id']))
            $pgTrueItems['prev_sign_id'] = $pgPaddingItems['prev_sign_id'];

        if (!empty($pgPaddingItems['next_item_id']))
            $pgTrueItems['next_item_id'] = $pgPaddingItems['next_item_id'];

        if (!empty($pgPaddingItems['next_post_id']))
            $pgTrueItems['next_post_id'] = $pgPaddingItems['next_post_id'];

        if (!empty($pgPaddingItems['next_user_id']))
            $pgTrueItems['next_user_id'] = $pgPaddingItems['next_user_id'];

        if (!empty($pgPaddingItems['next_sign_id']))
            $pgTrueItems['next_sign_id'] = $pgPaddingItems['next_sign_id'];

        if (!empty($pgPaddingItems['pair_count_show']))
            $pgTrueItems['pair_count_show'] = $pgPaddingItems['pair_count_show'];

        // counts =====================================

        if (!empty($pgPaddingItems['count_item_id']))
            $pgTrueItems['count_item_id'] = $pgPaddingItems['count_item_id'];

        if (!empty($pgPaddingItems['item_count_show']))
            $pgTrueItems['item_count_show'] = $pgPaddingItems['item_count_show'];

        // relationships =====================================

        if (!empty($pgPaddingItems['relation_id']))
            $pgTrueItems['relation_id'] = $pgPaddingItems['relation_id'];

        if (!empty($pgPaddingItems['relation']))
            $pgTrueItems['relation'] = $pgPaddingItems['relation'];

        if (!empty($pgPaddingItems['relation_email']))
            $pgTrueItems['relation_email'] = $pgPaddingItems['relation_email'];

        // tasks =====================================

        if (!empty($pgPaddingItems['task_id']))
            $pgTrueItems['task_id'] = $pgPaddingItems['task_id'];

        if (!empty($pgPaddingItems['task_type']))
            $pgTrueItems['task_type'] = $pgPaddingItems['task_type'];

        if (!empty($pgPaddingItems['task_status']))
            $pgTrueItems['task_status'] = $pgPaddingItems['task_status'];

        if (!empty($pgPaddingItems['attempt']))
            $pgTrueItems['attempt'] = $pgPaddingItems['attempt'];

        if (!empty($pgPaddingItems['file_size_start']))
            $pgTrueItems['file_size_start'] = $pgPaddingItems['file_size_start'];

        if (!empty($pgPaddingItems['file_size_done']))
            $pgTrueItems['file_size_done'] = $pgPaddingItems['file_size_done'];

        if (!empty($pgPaddingItems['file']))
            $pgTrueItems['file'] = $pgPaddingItems['file'];

        if (!empty($pgPaddingItems['file_type']))
            $pgTrueItems['file_type'] = $pgPaddingItems['file_type'];

        if (!empty($pgPaddingItems['task_item_id']))
            $pgTrueItems['task_item_id'] = $pgPaddingItems['task_item_id'];

        if (!empty($pgPaddingItems['access']))
            $pgTrueItems['access'] = $pgPaddingItems['access'];

        if (!empty($pgPaddingItems['from_user_name']))
            $pgTrueItems['from_user_name'] = $pgPaddingItems['from_user_name'];

        if (!empty($pgPaddingItems['from_user_email']))
            $pgTrueItems['from_user_email'] = $pgPaddingItems['from_user_email'];

        if (!empty($pgPaddingItems['lang']))
            $pgTrueItems['lang'] = $pgPaddingItems['lang'];

        if (!empty($pgPaddingItems['to_user_email']))
            $pgTrueItems['to_user_email'] = $pgPaddingItems['to_user_email'];

        if (!empty($pgPaddingItems['cover_upload']))
            $pgTrueItems['cover_upload'] = $pgPaddingItems['cover_upload'];

        if (!empty($pgPaddingItems['parent_id']))
            $pgTrueItems['parent_id'] = $pgPaddingItems['parent_id'];

        // friendship =====================================

        if (!empty($pgPaddingItems['friendship_id']))
            $pgTrueItems['friendship_id'] = $pgPaddingItems['friendship_id'];

        if (!empty($pgPaddingItems['action_user_id']))
            $pgTrueItems['action_user_id'] = $pgPaddingItems['action_user_id'];

        // likes =====================================

        if (!empty($pgPaddingItems['like_id']))
            $pgTrueItems['like_id'] = $pgPaddingItems['like_id'];

        // Reposts =====================================

        if (!empty($pgPaddingItems['repost_id']))
            $pgTrueItems['repost_id'] = $pgPaddingItems['repost_id'];

        // Service =====================================

        if (!empty($pgPaddingItems['users_service_id']))
            $pgTrueItems['users_service_id'] = $pgPaddingItems['users_service_id'];

        if (!empty($pgPaddingItems['service_id']))
            $pgTrueItems['service_id'] = $pgPaddingItems['service_id'];

        // Talents =====================================

        if (!empty($pgPaddingItems['users_talent_id']))
            $pgTrueItems['users_talent_id'] = $pgPaddingItems['users_talent_id'];

        if (!empty($pgPaddingItems['talent_id']))
            $pgTrueItems['talent_id'] = $pgPaddingItems['talent_id'];

        // Stars =====================================

        if (!empty($pgPaddingItems['ui_view_id']))
            $pgTrueItems['ui_view_id'] = $pgPaddingItems['ui_view_id'];

        if (!empty($pgPaddingItems['views_stars']))
            $pgTrueItems['views_stars'] = $pgPaddingItems['views_stars'];

        if (!empty($pgPaddingItems['star_id']))
            $pgTrueItems['star_id'] = $pgPaddingItems['star_id'];

        // Send stat =====================================

        if (!empty($pgPaddingItems['send_rating_period']))
            $pgTrueItems['send_rating_period'] = $pgPaddingItems['send_rating_period'];

        if (!empty($pgPaddingItems['dont_send_rating']))
            $pgTrueItems['dont_send_rating'] = $pgPaddingItems['dont_send_rating'];

        if (!empty($pgPaddingItems['send_stats_period']))
            $pgTrueItems['send_stats_period'] = $pgPaddingItems['send_stats_period'];

        if (!empty($pgPaddingItems['dont_send_stats']))
            $pgTrueItems['dont_send_stats'] = $pgPaddingItems['dont_send_stats'];
        //if (!empty($pgPaddingItems['dont_send_rating']))
        //if (!empty($pgPaddingItems['dont_send_rating']) or $pgPaddingItems['dont_send_rating'] == intval(false))
        //if (!empty($pgPaddingItems['dont_send_rating']) or is_bool($pgPaddingItems['dont_send_rating'])) {
        /*if (is_bool($pgPaddingItems['$pgPaddingItems'])) {
            echo "\npgPaddingItems\n";
            print_r($pgPaddingItems);
            $pgTrueItems['dont_send_rating'] = $pgPaddingItems['dont_send_rating'];
        }*/
        if (!empty($pgPaddingItems['last_rating']))
            $pgTrueItems['last_rating'] = $pgPaddingItems['last_rating'];

        if (!empty($pgPaddingItems['stats_my_rating_next_at']))
            $pgTrueItems['stats_my_rating_next_at'] = $pgPaddingItems['stats_my_rating_next_at'];

        if (!empty($pgPaddingItems['stats_my_items_last_at']))
            $pgTrueItems['stats_my_items_last_at'] = $pgPaddingItems['stats_my_items_last_at'];

        // Comments
        if (!empty($pgPaddingItems['comment_id']))
            $pgTrueItems['comment_id'] = $pgPaddingItems['comment_id'];

        // stars tags
        if (!empty($pgPaddingItems['uit_view_id']))
            $pgTrueItems['uit_view_id'] = $pgPaddingItems['uit_view_id'];

        if (!empty($pgPaddingItems['tag']))
            $pgTrueItems['tag'] = $pgPaddingItems['tag'];

        if (!empty($pgPaddingItems['uit_set_id']))
            $pgTrueItems['uit_set_id'] = $pgPaddingItems['uit_set_id'];

        if (!empty($pgPaddingItems['it_id']))
            $pgTrueItems['it_id'] = $pgPaddingItems['it_id'];

        if (!empty($pgPaddingItems['ut_id']))
            $pgTrueItems['ut_id'] = $pgPaddingItems['ut_id'];

        if (!empty($pgPaddingItems['tag_count']))
            $pgTrueItems['tag_count'] = $pgPaddingItems['tag_count'];

        if (!empty($pgPaddingItems['tit_id']))
            $pgTrueItems['tit_id'] = $pgPaddingItems['tit_id'];

        if (!empty($pgPaddingItems['el_it_id'])) // TODO: temp
            $pgTrueItems['el_it_id'] = $pgPaddingItems['el_it_id'];
        /* Essence ******************************************************************************/
        if (!empty($pgPaddingItems['essence_id']))
            $pgTrueItems['essence_id'] = $pgPaddingItems['essence_id'];
        if (!empty($pgPaddingItems['ue_id']))
            $pgTrueItems['ue_id'] = $pgPaddingItems['ue_id'];
        if (!empty($pgPaddingItems['ure_id']))
            $pgTrueItems['ure_id'] = $pgPaddingItems['ure_id'];
        if (!empty($pgPaddingItems['users_essences']))
            $pgTrueItems['users_essences'] = $pgPaddingItems['users_essences'];
        /* Partners ******************************************************************************/
        if (!empty($pgPaddingItems['ip_id']))
            $pgTrueItems['ip_id'] = $pgPaddingItems['ip_id'];
        if (!empty($pgPaddingItems['partner_id']))
            $pgTrueItems['partner_id'] = $pgPaddingItems['partner_id'];
        /* Lists ******************************************************************************/
        if (!empty($pgPaddingItems['li_id']))
            $pgTrueItems['li_id'] = $pgPaddingItems['li_id'];
        if (!empty($pgPaddingItems['dynamic']))
            $pgTrueItems['dynamic'] = $pgPaddingItems['dynamic'];
        if (!empty($pgPaddingItems['title_vector']))
            $pgTrueItems['title_vector'] = $pgPaddingItems['title_vector'];
        if (!empty($pgPaddingItems['content_vector']))
            $pgTrueItems['content_vector'] = $pgPaddingItems['content_vector'];
        if (!empty($pgPaddingItems['items_array']))
            $pgTrueItems['items_array'] = $pgPaddingItems['items_array'];
        /*if (!empty($pgPaddingItems['src_array']))
            $pgTrueItems['src_array'] = $pgPaddingItems['src_array'];*/
        if (!empty($pgPaddingItems['covers_array']))
            $pgTrueItems['covers_array'] = $pgPaddingItems['covers_array'];
        if (!empty($pgPaddingItems['titles_array']))
            $pgTrueItems['titles_array'] = $pgPaddingItems['titles_array'];
        if (!empty($pgPaddingItems['contents_array']))
            $pgTrueItems['contents_array'] = $pgPaddingItems['contents_array'];
        if (!empty($pgPaddingItems['authors_array']))
            $pgTrueItems['authors_array'] = $pgPaddingItems['authors_array'];
        if (!empty($pgPaddingItems['springs_array']))
            $pgTrueItems['springs_array'] = $pgPaddingItems['springs_array'];
        if (!empty($pgPaddingItems['tags_array']))
            $pgTrueItems['tags_array'] = $pgPaddingItems['tags_array'];
        if (!empty($pgPaddingItems['list_count_show']))
            $pgTrueItems['list_count_show'] = $pgPaddingItems['list_count_show'];
        if (!empty($pgPaddingItems['latest_at']))
            $pgTrueItems['latest_at'] = $pgPaddingItems['latest_at'];
        /* GeoIp2 ******************************************************************************/
        if (!empty($pgPaddingItems['iv_id']))
            $pgTrueItems['iv_id'] = $pgPaddingItems['iv_id'];
        if (!empty($pgPaddingItems['continent']))
            $pgTrueItems['continent'] = $pgPaddingItems['continent'];
        if (!empty($pgPaddingItems['country']))
            $pgTrueItems['country'] = $pgPaddingItems['country'];
        if (!empty($pgPaddingItems['state']))
            $pgTrueItems['state'] = $pgPaddingItems['state'];
        if (!empty($pgPaddingItems['city']))
            $pgTrueItems['city'] = $pgPaddingItems['city'];
        if (!empty($pgPaddingItems['area']))
            $pgTrueItems['area'] = $pgPaddingItems['area'];
        /* Deleting ******************************************************************************/
        if (!empty($pgPaddingItems['fud_id']))
            $pgTrueItems['fud_id'] = $pgPaddingItems['fud_id'];
        /* Trend Maker ******************************************************************************/
        if (!empty($pgPaddingItems['period_now']))
            $pgTrueItems['period_now'] = $pgPaddingItems['period_now'];
        if (!empty($pgPaddingItems['rise_start']))
            $pgTrueItems['rise_start'] = $pgPaddingItems['rise_start'];
        if (!empty($pgPaddingItems['rise_stop']))
            $pgTrueItems['rise_stop'] = $pgPaddingItems['rise_stop'];
        if (!empty($pgPaddingItems['fall_start']))
            $pgTrueItems['fall_start'] = $pgPaddingItems['fall_start'];
        if (!empty($pgPaddingItems['fall_stop']))
            $pgTrueItems['fall_stop'] = $pgPaddingItems['fall_stop'];
        if (!empty($pgPaddingItems['rise_count_show']))
            $pgTrueItems['rise_count_show'] = $pgPaddingItems['rise_count_show'];
        if (!empty($pgPaddingItems['fall_count_show']))
            $pgTrueItems['fall_count_show'] = $pgPaddingItems['fall_count_show'];
        if (!empty($pgPaddingItems['sum_count_show']))
            $pgTrueItems['sum_count_show'] = $pgPaddingItems['sum_count_show'];

        return $pgTrueItems;
    }

    public function pgInsertData($table, $pgInsertData)
    {
        //$pg = $this->pgConnect();
        //echo "\npgInsertData pgInsertData\n";
        //print_r($pgInsertData);
        try {
            $res = pg_insert($this->pgConn, $table, $pgInsertData);
        } catch (Exception $e) {
            /*$this->log->setEvent([
                "type" => "error",
                "message" => "pg",
                "val" => "cbFileAdd: ok",
                'event_id' => 'pg_ins_error',
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);*/
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        return $res;
    }

    public function pgInsertTags($pgInsertTags) //TODO: remove
    {
        //$pg = $this->pgConnect();
        echo "\npgInsertTags pgInsertTags\n";
        print_r($pgInsertTags);
        //$tag = $pgInsertTags['tags'];
        //$query =  "insert into items_tags_array values ('" . $pgInsertTags['item_id'] . "', array[" . $pgInsertTags['tags'] . "]);";
        $query =  "insert into items_tags_array values ('" . $pgInsertTags['item_id'] . "', array" . $pgInsertTags['tags'] . ");";
        //$query =  "insert into items_tags_array values ('" . $pgInsertTags['item_id'] . "', " . $pgInsertTags['tags'] . ");";
        //$query =  "insert into items_tags_array values (\"" . $pgInsertTags['item_id'] . "\", " . $pgInsertTags['tags'] . ");";
        //$query =  "insert into items_tags_array values (\"" . $pgInsertTags['item_id'] . "\", " . implode(', ', $tag) . ");";
        try {
            echo "\npgInsertTags query\n";
            print_r($query);
            $res = pg_query($this->pgConn, $query);
            //$res = pg_insert($this->pgConn, $this->table_items_tags_array, $pgInsertTags);

        } catch (Exception $e) {
            $this->log->setEvent([
                "type" => "error",
                "message" => "pg",
                "val" => "cbFileAdd: ok",
                'event_id' => 'pg_ins_error',
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        return $res;
    }

    public function pgAddData($table, $pgAddData)
    {
        //echo "\npgAddData pgAddData\n";
        //print_r($pgAddData);
        $trueItem = $this->pgPaddingItems($pgAddData);
        //echo "\npgAddData trueItem\n";
        //print_r($trueItem);
        return $this->pgInsertData($table, $trueItem);
    }
/*    public function pgInsertItemsActivity($items, $activity)
    {
        //$pg = $this->pgConnect();
        //echo "\npgInsertData $pgInsertData\n";
        //print_r($pgInsertData);
        $trueItems = $this->pgPaddingItems($items);
        try {
            $resItems = pg_insert($this->pgConn, 'items', $trueItems);
            echo "\npgInsertItemsActivity resItems\n";
            print_r($resItems);
        } catch (Exception $e) {
            $this->log->setEvent([
                "type" => "error",
                "message" => "pg",
                "val" => "cbFileAdd: ok",
                'event_id' => 'pg_ins_error',
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        if (!$resItems) {
            $trueActivity = $this->pgPaddingItems($activity);
            try {
                $resActivity = pg_insert($this->pgConn, 'activity', $trueActivity);
                echo "\npgInsertItemsActivity resActivity\n";
                print_r($resActivity);
            } catch (Exception $e) {
                $this->log->setEvent([
                    "type" => "error",
                    "message" => "pg",
                    "val" => "cbFileAdd: ok",
                    'event_id' => 'pg_ins_error',
                    "file" => $_SERVER["PHP_SELF"],
                    "class" => __CLASS__,
                    "funct" => __FUNCTION__
                ]);
                echo 'Pg. ' . $e;
                return false;
                //echo "No file. ";
            }
            return $resActivity;
        } else {
            return false;
        }
    }*/

    public function pgUpdateData($table, $setColumn, $setVal, $whereColumn, $whereVal)
    {
        try {
            $result = pg_query($this->pgConn, "
                UPDATE " . $table . "
                SET " . $setColumn . " = '" . $setVal . "'
                WHERE " . $whereColumn ." = '" . $whereVal . "'");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
            
        }
        //pg_close($this->pgConn);
        return $result;
    }

    public function pgUpdateOnConflict($table, $setColumn, $setVal, $whereColumn, $whereVal)
    {
        try {
            $result = pg_query($this->pgConn, "
            INSERT INTO " . $table . " (" . $whereColumn . ", " . $setColumn . ") 
            VALUES ('" . $whereVal . "', '" . $setVal . "')
            ON CONFLICT (" . $whereColumn .") DO UPDATE 
              SET " . $setColumn . " = excluded." . $setColumn . ",
                updated_at = clock_timestamp();");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";

        }
        //pg_close($this->pgConn);
        return $result;
    }

    public function pgUpdateDataArray($table, $newData, $whereColVal)
    {
        try {
            $result = pg_update($this->pgConn, $table, $newData, $whereColVal);
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";

        }
        return $result;
    }

    public function pgDelete($table, $whereColumn, $whereVal)
    {
        try {
            $result = pg_query($this->pgConn, "
                DELETE FROM " . $table . "
                WHERE " . $whereColumn ." = '" . $whereVal . "'");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";

        }
        //pg_close($this->pgConn);
        return $result;
    }

    public function pgDeleteitem($whereVal)
    {
        try {
            $result = pg_query($this->pgConn, "
BEGIN;
DELETE FROM access_items_friends where item_id = '" . $whereVal . "';
DELETE FROM items_counts where count_item_id = '" . $whereVal . "';
DELETE FROM items_likes where item_id = '" . $whereVal . "';
DELETE FROM items_tags_array where item_id = '" . $whereVal . "';
DELETE FROM albums_sets where item_id = '" . $whereVal . "';
DELETE FROM messages where item_id = '" . $whereVal . "';
DELETE FROM pairs where next_item_id = '" . $whereVal . "';
DELETE FROM pairs where prev_item_id = '" . $whereVal . "';
DELETE FROM posts where item_id = '" . $whereVal . "';
DELETE FROM items where item_id = '" . $whereVal . "';
COMMIT;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";

        }
        //pg_close($this->pgConn);
        return $result;
    }
    public function pgDeleteOld($table, $whereDays)
    {
        try {
            $result = pg_query($this->pgConn, "
                DELETE FROM " . $table . " WHERE " . $table . ".created_at < CURRENT_TIMESTAMP - INTERVAL '" . $whereDays . " days';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";

        }
        //pg_close($this->pgConn);
        return $result;
    }
    public function pgDataByColumn($pgDataByColumn) // TODO: why?
    {
        try {
            $result = pg_query($this->pgConn, "
              SELECT * FROM " . $pgDataByColumn['table'] . " 
              WHERE " . $pgDataByColumn['find_column'] . " = '" . $pgDataByColumn['find_value'] . "'");
            //echo "\npgOneDataByColumn \n";
            //print_r($result);
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgDataBy2Column($pgDataBy2Column) // TODO: remove
    {
        try {
            $result = pg_query($this->pgConn, "
              SELECT * FROM " . $pgDataBy2Column['table'] . " 
              WHERE " . $pgDataBy2Column['find_column'] . " = '" . $pgDataBy2Column['find_value'] . "' 
              AND " . $pgDataBy2Column['find_column2'] . " = '" . $pgDataBy2Column['find_value2'] . "'");
            //echo "\npgOneDataByColumn \n";
            //print_r($result);
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgOneDataByColumn($pgOneDataByColumn)
    {
        try {
            $result = pg_query($this->pgConn, "
              SELECT * 
              FROM " . $pgOneDataByColumn['table'] . " 
              WHERE " . $pgOneDataByColumn['find_column'] . " = '" . $pgOneDataByColumn['find_value'] . "'");
              //order by created_at desc");
            //echo "\npgOneDataByColumn \n";
            //print_r($result);
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }

    }

    public function pgOneDataBy2Column($pgOneDataBy2Column)
    {
        //echo "\npgOneDataBy2Column\n";
        //print_r($pgOneDataBy2Column);
        try {
            $result = pg_query($this->pgConn, "
              SELECT * 
              FROM " . $pgOneDataBy2Column['table'] . " 
              WHERE " . $pgOneDataBy2Column['find_column'] . " = '" . $pgOneDataBy2Column['find_value'] . "' 
              AND " . $pgOneDataBy2Column['find_column2'] . " = '" . $pgOneDataBy2Column['find_value2'] . "'");
            //echo "\npgOneDataByColumn \n";
            //print_r($result);
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgOneDataBy3Column($pgOneDataBy3Column)
    {
        //echo "\npgOneDataBy2Column\n";
        //print_r($pgOneDataBy2Column);
        try {
            $result = pg_query($this->pgConn, "
              SELECT * 
              FROM " . $pgOneDataBy3Column['table'] . " 
              WHERE " . $pgOneDataBy3Column['find_column'] . " = '" . $pgOneDataBy3Column['find_value'] . "' 
              AND " . $pgOneDataBy3Column['find_column2'] . " = '" . $pgOneDataBy3Column['find_value2'] . "'
              AND " . $pgOneDataBy3Column['find_column3'] . " = '" . $pgOneDataBy3Column['find_value3'] . "'");
            //echo "\npgOneDataByColumn \n";
            //print_r($result);
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }

    }

    public function pgDeleteDataBy2Column($pgDeleteDataBy2Column)
    {
        //echo "\npgOneDataBy2Column\n";
        //print_r($pgOneDataBy2Column);
        try {
            $result = pg_query($this->pgConn, "
              DELETE 
              FROM " . $pgDeleteDataBy2Column['table'] . " 
              WHERE " . $pgDeleteDataBy2Column['find_column'] . " = '" . $pgDeleteDataBy2Column['find_value'] . "' 
              AND " . $pgDeleteDataBy2Column['find_column2'] . " = '" . $pgDeleteDataBy2Column['find_value2'] . "'");
            //echo "\npgOneDataByColumn \n";
            //print_r($result);
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
            return $result;
            //return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgDataAll($pgDataAll)
    {
        //echo "\npgDataAll pgDataAll\n";
        //print_r($pgDataAll);
        try {
            $result = pg_query($this->pgConn, "
                SELECT * 
                FROM " . $pgDataAll['table'] . " 
                LIMIT " . $pgDataAll['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgJoin($pgJoin)
    {
        try {
            $result = pg_query($this->pgConn, "
              SELECT * FROM " . $pgJoin['table'] . " 
              JOIN " . $pgJoin['join_table'] . " 
              ON " . $pgJoin['table'] . " . " . $pgJoin['join_column'] . " = " . $pgJoin['join_table'] . "." . $pgJoin['join_column'] . " 
              WHERE " . $pgJoin['table'] . " . " . $pgJoin['find_column'] . " = '" . $pgJoin['find_value'] . "'");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }

    }

    public function pgGetAllUsers($pgGetAllUsers)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from users
                order by users.created_at desc
                LIMIT '" . $pgGetAllUsers['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }

    }

    public function pgGetAllMessages($pgGetAllMessages)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from messages
                order by messages.created_at desc
                LIMIT '" . $pgGetAllMessages['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }

    }

    public function pgGetCount($pgGetCount)
    {
        try {
            $result = pg_query($this->pgConn, "
                      select count(*) from " . $pgGetCount['table'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_all($result);
            return pg_fetch_result($result, 0);
            //return $result;
        } else {
            return false;
        }

    }

    public function pgGetUserFullInfo($pgGetUserFullInfo)
    {
        // https://api.vide.me/v2/user/info/
        try {
            $result = pg_query($this->pgConn, "
select 
        users.*,
        count(distinct items_stars.star_id) as stars_count,
        count(distinct users_items_tags_sets.uit_set_id) as tags_conf_count,
        count(distinct users_tags.ut_id) as tags_view_count
from users 
        LEFT OUTER join items on users.user_id = items.owner_id
        LEFT OUTER join items_stars on items.item_id = items_stars.item_id
        LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> users.user_id
        LEFT OUTER join users_tags on users.user_id = users_tags.user_id
where 
        users.user_id = '" . $pgGetUserFullInfo['user_id'] . "'
group by users.user_id;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
        }
        if ($result) {
            //return pg_fetch_row($result);
            return pg_fetch_assoc($result); // <-------------
            //return pg_fetch_all($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetNewPostsNOA($pgGetNewPostsNOA)
    {
        // https://api.vide.me/v2/posts/shownew/
        $start = microtime(true);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  --count(distinct items_stars.star_id) as stars_count,
  --count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  --count(distinct items_reposts.repost_id) as reposts_count,
  count(users_items_tags_sets.uit_set_id) as tags_conf,
  users_scores_tags.tags_conf as user_tags_conf,
  
  --count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
  count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from posts
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
--LEFT OUTER join items_stars on items.item_id = items_stars.item_id
--LEFT OUTER join items_likes on items.item_id = items_likes.item_id
--LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
LEFT OUTER join users_scores_tags on items.owner_id = users_scores_tags.user_id


--LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
--and items.owner_id <> users_items_tags_sets.user_id
LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
and items.owner_id <> users_items_tags_sets_new.user_id
and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'

WHERE items.access = 'public'
and (posts.type <> 'update_user_picture' and posts.type <> 'update_user_cover' and posts.type <> 'user_cover_top' and posts.type <> 'item_repost')
 and (user_item.state IS NULL or user_item.state <> 'suspend')
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, users_scores_tags.tags_conf
order by posts.created_at desc
OFFSET '" . $pgGetNewPostsNOA['offset'] . "'
LIMIT '" . $pgGetNewPostsNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        $time_elapsed_secs = microtime(true) - $start;
        header("videme-db-posts-shownew-time-elapsed-secs: " . $time_elapsed_secs);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostsFromList($pgGetPostsFromList)
    {
        // https://api.vide.me/v2/posts/shownew/
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.src,
  items.created_at,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  users.user_display_name as item_user_display_name,
  users.user_picture as item_user_picture,
  users.spring as item_spring,
  items_counts.item_count_show
from items
inner join users on items.owner_id = users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE items.type = 'video'
and item_id IN (" . $pgGetPostsFromList . ");");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetTrendsPostsNOA($pgGetTrendsPostsNOA)
    {
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country, -- TODO: remove
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  --posts.created_at,
  --posts.type,
  users.user_display_name,
  users.user_picture,
  users.spring,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  --count(distinct items_stars.star_id) as stars_count,
  --count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  count(distinct items_trands.it_id) as it_count
  --count(users_items_tags_sets.uit_set_id) as tags_conf
from items_trands
LEFT OUTER join items on items_trands.item_id = items.item_id
LEFT OUTER join posts on items.item_id = posts.item_id
LEFT OUTER join users on items.owner_id = users.user_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
--LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
WHERE items.access = 'public'
and items_trands.created_at > CURRENT_TIMESTAMP - INTERVAL '5 days'
and (posts.type <> 'update_user_picture' and posts.type <> 'update_user_cover' and posts.type <> 'user_cover_top' and posts.type <> 'item_repost')
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
order by it_count desc
OFFSET '" . $pgGetTrendsPostsNOA['offset'] . "'
LIMIT '" . $pgGetTrendsPostsNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetTrendsTagsNOA($pgGetTrendsTagsNOA)
    {
        try {
            $result = pg_query($this->pgConn, "
select
    users_items_tags_sets.tag,
    count(distinct users_items_tags_sets.uit_set_id) as tags_count
from items_trands
LEFT OUTER join users_items_tags_sets on items_trands.item_id = users_items_tags_sets.item_id
where 
items_trands.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
--users_items_tags_sets.tag IS NOT NULL
group by users_items_tags_sets.tag
order by tags_count desc
OFFSET '" . $pgGetTrendsTagsNOA['offset'] . "'
LIMIT '" . $pgGetTrendsTagsNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetTrendsUsersNOA($pgGetTrendsUsersNOA)
    {
        try {
            $result = pg_query($this->pgConn, "
select
  users.user_display_name,
  users.user_id,
  users.spring,
  users.user_picture,
  count(distinct items_trands.it_id) as it_count
from items_trands
LEFT OUTER join items on items_trands.item_id = items.item_id
LEFT OUTER join users on items.owner_id = users.user_id
WHERE items.access = 'public'
and items_trands.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
group by users.user_display_name, users.user_id, users.spring, users.user_picture
order by it_count desc
OFFSET '" . $pgGetTrendsUsersNOA['offset'] . "'
LIMIT '" . $pgGetTrendsUsersNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetNewPostsAccess($pgGetNewPostsAccess)
    {
        // https://api.vide.me/v2/posts/shownew/
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  --count(distinct items_stars.star_id) as stars_count,
  --count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  --items_likes_you.user_id as its_like
  count(users_items_tags_sets.uit_set_id) as tags_conf,
  users_scores_tags.tags_conf as user_tags_conf
from posts
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
--LEFT OUTER join items_stars on items.item_id = items_stars.item_id
--LEFT OUTER join items_likes on items.item_id = items_likes.item_id
--LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetNewPostsAccess['to_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
LEFT OUTER join users_scores_tags on items.owner_id = users_scores_tags.user_id
WHERE items.access = 'public'
and (posts.type <> 'update_user_picture' and posts.type <> 'update_user_cover' and posts.type <> 'user_cover_top' and posts.type <> 'item_repost')
 and (user_item.state IS NULL or user_item.state <> 'suspend')
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, users_scores_tags.tags_conf
order by posts.created_at desc
OFFSET '" . $pgGetNewPostsAccess['offset'] . "'
LIMIT '" . $pgGetNewPostsAccess['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetItemsByTagNOA($pgGetItemsByTagNOA)
    {
        try {
            $result = pg_query($this->pgConn, "
select
      items.item_id,
      items.type,
      items.cover,
      items.cover_video,
      items.title,
      items.content,
      items.video_duration,
      items.tags,
      items.access,
      items.ext_links,
      items.country as item_country,
      items.city as item_city,
      items.started_at,
      items.stopped_at,
      items.place,
      items.src,
      items.created_at,
      items.pre_v_w320,
      items.pre_i_w320,
      items.spr_w120,
      items.vtt_w120,
      posts.created_at,
      posts.type as post_type,
      user_item.user_display_name as item_user_display_name,
      user_item.user_picture as item_user_picture,
      user_item.spring as item_spring,
      user_post.user_display_name as post_user_display_name,
      user_post.user_picture as post_user_picture,
      user_post.spring as post_spring,
      items_counts.item_count_show,
      count(distinct items_stars.star_id) as stars_count,
      --count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
      count(distinct items_reposts.repost_id) as reposts_count
from posts
    inner join items on posts.item_id = items.item_id
    inner join users as user_item on items.owner_id = user_item.user_id
    inner join users as user_post on posts.post_owner_id = user_post.user_id
    LEFT OUTER join items_stars on items.item_id = items_stars.item_id
    --LEFT OUTER join items_likes on items.item_id = items_likes.item_id
    LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
    LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
    LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
WHERE 
    users_items_tags_sets.tag = '" . $pgGetItemsByTagNOA['tag'] . "'
    and items.owner_id = '" . $pgGetItemsByTagNOA['user_id'] . "'
    and items.access = 'public'
    and (posts.type <> 'update_user_picture' and posts.type <> 'update_user_cover' and posts.type <> 'user_cover_top' and posts.type <> 'item_repost')
group by items.owner_id, items.item_id, items.title, posts.created_at, items_reposts.item_id, items_counts.item_count_show, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring
order by posts.created_at desc
OFFSET '" . $pgGetItemsByTagNOA['offset'] . "'
LIMIT '" . $pgGetItemsByTagNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetChartByItemNOA($pgGetChartByItemNOA)
    {
        // https://api.vide.me/v2/posts/shownew/
        try {
            $result = pg_query($this->pgConn, "
with intervals as (
  select generate_series(
    date_trunc(
      'hour',
      now() at time zone 'UTC'
    ) - interval '48 hours',
    date_trunc(
      'hour',
      now() at time zone 'UTC'
    ),
    interval '1 hours'
  ) as minutes
)
select
  intervals.minutes as x,
  count(items_views.*) as y
from intervals
  left join items_views on intervals.minutes = date_trunc('hour', created_at) and items_views.item_id = '" . $pgGetChartByItemNOA['item_id'] . "'
group by intervals.minutes
order by intervals.minutes;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetChartByItem1stDaysNOA($pgGetChartByItem1stDaysNOA)
    {
        // https://api.vide.me/v2/posts/shownew/
        try {
            $result = pg_query($this->pgConn, "
with intervals as (
  select generate_series(
    date_trunc(
      'day',
      '" . $pgGetChartByItem1stDaysNOA['start_date'] . "' at time zone 'UTC'
    ),
    date_trunc(
      'day',
      '" . $pgGetChartByItem1stDaysNOA['stop_date'] . "' at time zone 'UTC'
    ),
    interval '1 day'
  ) as days
)
select
  intervals.days as x,
  count(items_views.*) as y
from intervals
  left join items_views on intervals.days = date_trunc('day', created_at) and items_views.item_id = '" . $pgGetChartByItem1stDaysNOA['item_id'] . "'
  " . $pgGetChartByItem1stDaysNOA['where'] . "
group by intervals.days
order by intervals.days;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetChartPopStates($pgGetChartByItem1stDaysNOA)
    {
        // https://api.vide.me/v2/posts/shownew/
        try {
            $result = pg_query($this->pgConn, "
select
  items_views.state,
  --geoip2_state.state_id,
  geoip2_state.iso_code,
  geoip2_state.names,
  count(items_views.city) as count_state
from items_views 
  INNER JOIN geoip2_state on items_views.state = geoip2_state.state_id
  where items_views.item_id = '" . $pgGetChartByItem1stDaysNOA['item_id'] . "'
GROUP BY items_views.state, geoip2_state.iso_code, geoip2_state.names
order by count_state DESC
LIMIT '" . $pgGetChartByItem1stDaysNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetTagsBySpringNOA($pgGetTagsBySpringNOA)
    {
        try {
            $result = pg_query($this->pgConn, "
select
  distinct(users_items_tags_sets.tag),
  count(tag) as tag_count
from users_items_tags_sets
inner join items on users_items_tags_sets.item_id = items.item_id
where 
 users_items_tags_sets.user_id = '" . $pgGetTagsBySpringNOA['user_id'] . "'
 and items.owner_id = '" . $pgGetTagsBySpringNOA['user_id'] . "'
GROUP BY users_items_tags_sets.tag
OFFSET '" . $pgGetTagsBySpringNOA['offset'] . "'
LIMIT '" . $pgGetTagsBySpringNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetService($pgGetservice)
    {
        try {
            $result = pg_query($this->pgConn, "
select *
from service
ORDER BY service.service_title;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetEssences($pgGetservice)
    {
        try {
            $result = pg_query($this->pgConn, "
select *
from essences
ORDER BY essences.title;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgMyService($pgMyService)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
select *
from users_service
JOIN service ON users_service.service_id = service.service_id
WHERE owner_id = '" . $pgMyService['user_id'] . "'
order by users_service.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgMyEssence($pgMyEssence)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
select *
from users_essences
JOIN essences ON users_essences.essence_id = essences.essence_id
WHERE users_essences.owner_id = '" . $pgMyEssence['user_id'] . "'
order by users_essences.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgEssenceToMe($pgEssenceToMe)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  user_owner.user_display_name as owner_display_name,
  user_owner.user_picture as owner_picture,
  user_owner.spring as owner_spring,
  essences.title as essence_title,
  users.user_display_name,
  users.user_picture,
  users.spring,
  users_ref_essences.title as ref_title,
  users_ref_essences.content,
  users_ref_essences.ure_id,
  users_essences.ue_id
from users_ref_essences
LEFT OUTER JOIN users on users_ref_essences.user_id = users.user_id
LEFT OUTER JOIN users_essences on users_ref_essences.users_essences = users_essences.ue_id
LEFT OUTER JOIN essences on users_essences.essence_id = essences.essence_id
LEFT OUTER JOIN users as user_owner on users_essences.owner_id = user_owner.user_id 
WHERE 
  users_ref_essences.user_id = '" . $pgEssenceToMe['user_id'] . "'
  and users_ref_essences.status = 1
order by users_ref_essences.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgEssenceToMePending($pgEssenceToMePending)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  user_owner.user_display_name as owner_display_name,
  user_owner.user_picture as owner_picture,
  user_owner.spring as owner_spring,
  essences.title as essence_title,
  users.user_display_name,
  users.user_picture,
  users.spring,
  users_ref_essences.title as ref_title,
  users_ref_essences.content,
  users_ref_essences.ure_id,
  users_essences.ue_id
from users_ref_essences
LEFT OUTER JOIN users on users_ref_essences.user_id = users.user_id
LEFT OUTER JOIN users_essences on users_ref_essences.users_essences = users_essences.ue_id
LEFT OUTER JOIN essences on users_essences.essence_id = essences.essence_id
LEFT OUTER JOIN users as user_owner on users_essences.owner_id = user_owner.user_id 
WHERE 
  users_ref_essences.user_id = '" . $pgEssenceToMePending['user_id'] . "'
  and users_ref_essences.status = 0
order by users_ref_essences.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgEssenceFromMe($pgEssenceFromMe)
    {
        //print_r($pgEssenceFromMe);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  user_owner.user_display_name as owner_display_name,
  user_owner.user_picture as owner_picture,
  user_owner.spring as owner_spring,
  essences.title as essence_title,
  users.user_display_name,
  users.user_picture,
  users.spring,
  users_ref_essences.title as ref_title,
  users_ref_essences.content,
  users_ref_essences.ure_id,
  users_essences.ue_id
from users_ref_essences
LEFT OUTER JOIN users on users_ref_essences.user_id = users.user_id
LEFT OUTER JOIN users_essences on users_ref_essences.users_essences = users_essences.ue_id
LEFT OUTER JOIN essences on users_essences.essence_id = essences.essence_id
LEFT OUTER JOIN users as user_owner on users_essences.owner_id = user_owner.user_id
WHERE 
  users_essences.owner_id = '" . $pgEssenceFromMe['user_id'] . "'
  and users_ref_essences.status = 1
order by users_ref_essences.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgEssenceFromMePending($pgEssenceFromMePending)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  user_owner.user_display_name as owner_display_name,
  user_owner.user_picture as owner_picture,
  user_owner.spring as owner_spring,
  essences.title as essence_title,
  users.user_display_name,
  users.user_picture,
  users.spring,
  users_ref_essences.title as ref_title,
  users_ref_essences.content,
  users_ref_essences.ure_id,
  users_essences.ue_id
from users_ref_essences
LEFT OUTER JOIN users on users_ref_essences.user_id = users.user_id
LEFT OUTER JOIN users_essences on users_ref_essences.users_essences = users_essences.ue_id
LEFT OUTER JOIN essences on users_essences.essence_id = essences.essence_id
LEFT OUTER JOIN users as user_owner on users_essences.owner_id = user_owner.user_id
WHERE 
  users_essences.owner_id = '" . $pgEssenceFromMePending['user_id'] . "'
  and users_ref_essences.status = 0
order by users_ref_essences.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersAll($pgItemPartnersAll)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  users.user_display_name,
  users.user_picture,
  users.spring,
  items.item_id,
  items_partners.partner_id,
  items_partners.title,
  items_partners.content,
  items_partners.action_user_id,
  items_partners.status,
  items_partners.created_at
from items_partners
LEFT OUTER JOIN items on items_partners.item_id = items.item_id
LEFT OUTER JOIN users on items.owner_id = users.user_id
WHERE 
  items_partners.item_id = '" . $pgItemPartnersAll['item_id'] . "'
order by items_partners.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersMy($pgItemPartnersMy)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_partners.item_id,
  items_partners.partner_id,
  items_partners.title,
  items_partners.content,
  items_partners.action_user_id,
  items_partners.status as partner_status,
  items_partners.created_at,
  items_partners.action_user_id = '" . $pgItemPartnersMy['user_id'] . "' as its_my_pend
from items_partners
LEFT OUTER JOIN users on items_partners.partner_id = users.user_id
WHERE 
  items_partners.item_id = '" . $pgItemPartnersMy['item_id'] . "'
order by items_partners.created_at
OFFSET '" . $pgItemPartnersMy['offset'] . "'
LIMIT " . $pgItemPartnersMy['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersConfirmed($pgItemPartnersConfirmed)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  users.user_display_name,
  users.user_picture,
  users.spring,
  items.item_id,
  items_partners.partner_id,
  items_partners.title,
  items_partners.content,
  items_partners.action_user_id,
  items_partners.status,
  items_partners.created_at
from items_partners
LEFT OUTER JOIN items on items_partners.item_id = items.item_id
LEFT OUTER JOIN users on items_partners.partner_id = users.user_id
WHERE 
  items_partners.item_id = '" . $pgItemPartnersConfirmed['item_id'] . "'
  and items_partners.status = '1'
order by items_partners.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersPendingToMe($pgItemPartnersPendingToMe)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,
  items.pre_v_w320,
  items.pre_i_w320,
  items.spr_w120,
  items.vtt_w120,  
  items_partners.ip_id,
  items_partners.partner_id,
  items_partners.title as partner_title,
  items_partners.content as partner_content,
  items_partners.action_user_id,
  items_partners.status partner_status,
  items_partners.created_at partner_created_at,
  items_counts.item_count_show,
  users.spring,
  users.user_display_name,
  users.user_picture,
  
  p_users.spring as partner_spring,
  p_users.user_display_name as partner_user_display_name,
  p_users.user_picture as partner_user_picture,
  p_users.country as partner_country,
  p_users.city as partner_city,
  
  count(users_items_tags_sets.uit_set_id) as tags_conf,
  users_scores_tags.tags_conf as user_tags_conf,
  count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
  count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from items_partners
LEFT OUTER JOIN items on items_partners.item_id = items.item_id
LEFT OUTER JOIN users on items.owner_id = users.user_id
LEFT OUTER JOIN users as p_users on items_partners.partner_id = p_users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
LEFT OUTER join users_scores_tags on items.owner_id = users_scores_tags.user_id
LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
and items.owner_id <> users_items_tags_sets_new.user_id
and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
WHERE 
--items.access = 'public' and 
--(users.state IS NULL or users.state <> 'suspend') and 
items.owner_id = '" . $pgItemPartnersPendingToMe['user_id'] . "'
or
items_partners.partner_id = '" . $pgItemPartnersPendingToMe['user_id'] . "'
and items_partners.status = '0'
group by items.item_id, items_partners.ip_id, items_partners.partner_id, items_partners.title, items_partners.content, items_partners.action_user_id, items_partners.status, items_partners.created_at, items_counts.item_count_show, users.spring, users.user_display_name, users.user_picture, p_users.spring, p_users.user_display_name, p_users.user_picture, p_users.country, p_users.city, users_scores_tags.tags_conf
order by items_partners.created_at DESC
OFFSET '" . $pgItemPartnersPendingToMe['offset'] . "'
LIMIT " . $pgItemPartnersPendingToMe['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersPendingFromMe($pgItemPartnersPendingFromMe)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
      items.item_id,
      items.type,
      items.cover,
      items.cover_video,
      items.title,
      items.content,
      items.video_duration,
      items.tags,
      items.access,
      items.ext_links,
      items.country as item_country,
      items.city as item_city,
      items.started_at,
      items.stopped_at,
      items.place,
      items.src,
      items.created_at,
      items.pre_v_w320,
      items.pre_i_w320,
      items.spr_w120,
      items.vtt_w120,  
      items_partners.ip_id,
      items_partners.partner_id,
      items_partners.title as partner_title,
      items_partners.content as partner_content,
      items_partners.action_user_id,
      items_partners.status as partner_status,
      items_partners.created_at as partner_created_at,
      items_counts.item_count_show,
  users.spring,
  users.user_display_name,
  users.user_picture,
  
  p_users.spring as partner_spring,
  p_users.user_display_name as partner_user_display_name,
  p_users.user_picture as partner_user_picture,
  p_users.country as partner_country,
  p_users.city as partner_city,
  
  count(users_items_tags_sets.uit_set_id) as tags_conf,
  users_scores_tags.tags_conf as user_tags_conf,
  count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
  count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from items_partners
LEFT OUTER JOIN items on items_partners.item_id = items.item_id
LEFT OUTER JOIN users on items.owner_id = users.user_id
LEFT OUTER JOIN users as p_users on items_partners.partner_id = p_users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
LEFT OUTER join users_scores_tags on items.owner_id = users_scores_tags.user_id
LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
and items.owner_id <> users_items_tags_sets_new.user_id
and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
WHERE 
--items.access = 'public' and 
--(users.state IS NULL or users.state <> 'suspend') and 
items_partners.action_user_id = '" . $pgItemPartnersPendingFromMe['user_id'] . "'
group by items.item_id, items_partners.ip_id, items_partners.partner_id, items_partners.title, items_partners.content, items_partners.action_user_id, items_partners.status, items_partners.created_at, items_counts.item_count_show, users.spring, users.user_display_name, users.user_picture, p_users.spring, p_users.user_display_name, p_users.user_picture, p_users.country, p_users.city, users_scores_tags.tags_conf
order by items_partners.created_at DESC
OFFSET '" . $pgItemPartnersPendingFromMe['offset'] . "'
LIMIT " . $pgItemPartnersPendingFromMe['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersPending($pgItemPartnersPending)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT
        items.item_id,
          items.type,
          items.cover,
          items.cover_video,
          items.title,
          items.content,
          items.video_duration,
          items.tags,
          items.access,
          items.ext_links,
          items.country as item_country,
          items.city as item_city,
          items.started_at,
          items.stopped_at,
      items.place,
      items.src,
      items.created_at,
      items.pre_v_w320,
      items.pre_i_w320,
      items.spr_w120,
      items.vtt_w120,  
      items_partners.ip_id,
      items_partners.partner_id,
      items_partners.title as partner_title,
      items_partners.content as partner_content,
      items_partners.action_user_id,
      items_partners.status as partner_status,
      items_partners.created_at as partner_created_at,
      items_partners.action_user_id = '" . $pgItemPartnersPending['user_id'] . "' as its_my_pend,
      
      items_counts.item_count_show,
      
      users.spring,
      users.user_display_name,
      users.user_picture,
  
      p_users.spring as partner_spring,
      p_users.user_display_name as partner_user_display_name,
      p_users.user_picture as partner_user_picture,
      p_users.country as partner_country,
      p_users.city as partner_city,
      
      count(users_items_tags_sets.uit_set_id) as tags_conf,
      users_scores_tags.tags_conf as user_tags_conf,
      count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
      count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from items_partners
    LEFT OUTER JOIN items on items_partners.item_id = items.item_id
    LEFT OUTER JOIN users on items.owner_id = users.user_id
    LEFT OUTER JOIN users as p_users on items_partners.partner_id = p_users.user_id
    LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
    LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
    LEFT OUTER join users_scores_tags on items.owner_id = users_scores_tags.user_id
    LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
    and items.owner_id <> users_items_tags_sets_new.user_id
    and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
WHERE 
--items.access = 'public' and 
--(users.state IS NULL or users.state <> 'suspend') and 
(
items.owner_id = '" . $pgItemPartnersPending['user_id'] . "'
or
items_partners.action_user_id = '" . $pgItemPartnersPending['user_id'] . "'
or
items_partners.partner_id = '" . $pgItemPartnersPending['user_id'] . "'
)
and items_partners.status = '0'
group by items.item_id, items_partners.ip_id, items_partners.partner_id, items_partners.title, items_partners.content, items_partners.action_user_id, items_partners.status, items_partners.created_at, items_counts.item_count_show, users.spring, users.user_display_name, users.user_picture, p_users.spring, p_users.user_display_name, p_users.user_picture, p_users.country, p_users.city, users_scores_tags.tags_conf
order by items_partners.created_at DESC
OFFSET '" . $pgItemPartnersPending['offset'] . "'
LIMIT " . $pgItemPartnersPending['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersDeclined($pgItemPartnersDeclined)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
      items.item_id,
      items.type,
      items.cover,
      items.cover_video,
      items.title,
      items.content,
      items.video_duration,
      items.tags,
      items.access,
      items.ext_links,
      items.country as item_country,
      items.city as item_city,
      items.started_at,
      items.stopped_at,
      items.place,
      items.src,
      items.created_at,
      items.pre_v_w320,
      items.pre_i_w320,
      items.spr_w120,
      items.vtt_w120,  
      items_partners.ip_id,
      items_partners.partner_id,
      items_partners.title as partner_title,
      items_partners.content as partner_content,
      items_partners.action_user_id,
      items_partners.status as partner_status,
      items_partners.created_at as partner_created_at,
      items_counts.item_count_show,
  users.spring,
  users.user_display_name,
  users.user_picture,
  
  p_users.spring as partner_spring,
  p_users.user_display_name as partner_user_display_name,
  p_users.user_picture as partner_user_picture,
  p_users.country as partner_country,
  p_users.city as partner_city,
  
  count(users_items_tags_sets.uit_set_id) as tags_conf,
  users_scores_tags.tags_conf as user_tags_conf,
  count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
  count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from items_partners
LEFT OUTER JOIN items on items_partners.item_id = items.item_id
LEFT OUTER JOIN users on items.owner_id = users.user_id
LEFT OUTER JOIN users as p_users on items_partners.partner_id = p_users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
LEFT OUTER join users_scores_tags on items.owner_id = users_scores_tags.user_id
LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
and items.owner_id <> users_items_tags_sets_new.user_id
and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
WHERE 
--items.access = 'public' and 
--(users.state IS NULL or users.state <> 'suspend') and 
      items_partners.status = 2 
      and (items_partners.action_user_id = '" . $pgItemPartnersDeclined['user_id'] . "'
or users.user_id = '" . $pgItemPartnersDeclined['user_id'] . "')
group by items.item_id, items_partners.ip_id, items_partners.partner_id, items_partners.title, items_partners.content, items_partners.action_user_id, items_partners.status, items_partners.created_at, items_counts.item_count_show, users.spring, users.user_display_name, users.user_picture, p_users.spring, p_users.user_display_name, p_users.user_picture, p_users.country, p_users.city, users_scores_tags.tags_conf
order by items_partners.created_at DESC
OFFSET '" . $pgItemPartnersDeclined['offset'] . "'
LIMIT " . $pgItemPartnersDeclined['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgItemPartnersAccepted($pgItemPartnersAccepted)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
      items.item_id,
      items.type,
      items.cover,
      items.cover_video,
      items.title,
      items.content,
      items.video_duration,
      items.tags,
      items.access,
      items.ext_links,
      items.country as item_country,
      items.city as item_city,
      items.started_at,
      items.stopped_at,
      items.place,
      items.src,
      items.created_at,
      items.pre_v_w320,
      items.pre_i_w320,
      items.spr_w120,
      items.vtt_w120,  
      items_partners.ip_id,
      items_partners.partner_id,
      items_partners.title as partner_title,
      items_partners.content as partner_content,
      items_partners.action_user_id,
      items_partners.status as partner_status,
      items_partners.created_at as partner_created_at,
      items_counts.item_count_show,
  users.spring,
  users.user_display_name,
  users.user_picture,
  
  p_users.spring as partner_spring,
  p_users.user_display_name as partner_user_display_name,
  p_users.user_picture as partner_user_picture,
  p_users.country as partner_country,
  p_users.city as partner_city,
  
  count(users_items_tags_sets.uit_set_id) as tags_conf,
  users_scores_tags.tags_conf as user_tags_conf,
  count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
  count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from items_partners
LEFT OUTER JOIN items on items_partners.item_id = items.item_id
LEFT OUTER JOIN users on items.owner_id = users.user_id
LEFT OUTER JOIN users as p_users on items_partners.partner_id = p_users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
LEFT OUTER join users_scores_tags on items.owner_id = users_scores_tags.user_id
LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
and items.owner_id <> users_items_tags_sets_new.user_id
and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
WHERE 
--items.access = 'public' and 
--(users.state IS NULL or users.state <> 'suspend') and 
      items_partners.status = 1 
      and (items_partners.action_user_id = '" . $pgItemPartnersAccepted['user_id'] . "'
or users.user_id = '" . $pgItemPartnersAccepted['user_id'] . "')
group by items.item_id, items_partners.ip_id, items_partners.partner_id, items_partners.title, items_partners.content, items_partners.action_user_id, items_partners.status, items_partners.created_at, items_counts.item_count_show, users.spring, users.user_display_name, users.user_picture, p_users.spring, p_users.user_display_name, p_users.user_picture, p_users.country, p_users.city, users_scores_tags.tags_conf
order by items_partners.created_at DESC
OFFSET '" . $pgItemPartnersAccepted['offset'] . "'
LIMIT " . $pgItemPartnersAccepted['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetTalents($pgGetTalents)
    {
        try {
            $result = pg_query($this->pgConn, "
select *
from talents
OFFSET '" . $pgGetTalents['offset'] . "'
LIMIT '" . $pgGetTalents['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgMyTalents($pgMyTalents)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
select *
from users_talents
JOIN talents ON users_talents.talent_id = talents.talent_id
WHERE owner_id = '" . $pgMyTalents['user_id'] . "'
order by users_talents.created_at;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPopTags()
    {
        try {
            $result = pg_query($this->pgConn, "
                SELECT tag, count(tag)
                FROM items_tags_array
                CROSS JOIN unnest(tags) as tag
                GROUP BY 1
                ORDER BY 2 DESC 
                LIMIT  10;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPopPosts()
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $this->table_items_counts . " t1 
                inner join " . $this->table_items . " t2 on t1.count_item_id = t2.item_id
                inner join " . $this->table_users . " t3 on t2.owner_id = t3.user_id
                inner join " . $this->table_posts . " t4 on t2.item_id = t4.item_id
                LEFT OUTER join " . $this->table_items_counts . " t5 on t2.item_id = t5.count_item_id
                order by t1.item_count_show desc;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPopPostsVideo($pgGetPopPostsVideo)
    {
        try {
            $result = pg_query($this->pgConn, "
select 
    items.item_id,
    items.type,
    items.cover,
    items.title,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.src,
    items.created_at,
    posts.post_id,
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count
from items_counts 
LEFT OUTER join items  on items_counts.count_item_id = items.item_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
inner join users on items.owner_id = users.user_id
inner join posts on items.item_id = posts.item_id
WHERE items.type = 'video'
group by items.item_id, posts.post_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
order by items_counts.item_count_show desc
LIMIT 18;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetNewArticle($limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
                select
                    items.item_id,
                    items.type,
                    items.cover,
                    items.title,
                    items.content,
                    items.video_duration,
                    items.tags,
                    items.access,
                    items.src,
                    items.created_at,
                    users.user_display_name,
                    items_counts.item_count_show
                from posts
                inner join items 
                on posts.item_id = items.item_id
                inner join users 
                on items.owner_id = users.user_id
                LEFT OUTER join items_counts
                on items.item_id = items_counts.count_item_id
                WHERE items.type = 'article'
                order by posts.created_at desc
                LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function pgGetNewVideo($limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $this->table_posts . " t1 
                inner join " . $this->table_items . " t2 on t1.item_id = t2.item_id
                inner join " . $this->table_users . " t3 on t2.owner_id = t3.user_id
                LEFT OUTER join " . $this->table_items_counts . " t4 on t2.item_id = t4.count_item_id
                WHERE t2.type = 'video'
                order by t1.created_at desc
                LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function pgGetNewItems($limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
select *
from items
inner join users on items.owner_id = users.user_id
where items.access = 'public'
order by items.created_at desc
LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetNewItemsNoArticle($limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
select *
from items
inner join users on items.owner_id = users.user_id
where items.access = 'public' and items.type <> 'article'
order by items.created_at desc
LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetUserWithItems($limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
items.owner_id,
users.user_display_name,
users.spring,
users.user_email,
users.updated_at,
COUNT(*) AS count_items 
FROM   items
LEFT OUTER JOIN users ON items.owner_id = users.user_id
GROUP  BY items.owner_id, users.user_display_name, users.spring, users.user_email, users.updated_at
HAVING count(*) >= 1
ORDER BY count_items DESC;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetNewVideoReverse($limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $this->table_posts . " t1 
                inner join " . $this->table_items . " t2 on t1.item_id = t2.item_id
                inner join " . $this->table_users . " t3 on t2.owner_id = t3.user_id
                LEFT OUTER join " . $this->table_items_counts . " t4 on t2.item_id = t4.count_item_id
                WHERE t2.type = 'video'
                order by t1.created_at ASC
                LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function pgGetNewVideoCountsReverse($limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $this->table_items_counts . " t1 
                inner join " . $this->table_items . " t2 on t1.count_item_id = t2.item_id
                WHERE t2.type = 'video'
                order by t1.created_at ASC
                LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function pgGetAllReverse($pgGetAllReverse)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $pgGetAllReverse['table'] . " 
                order by created_at ASC
                LIMIT " . $pgGetAllReverse['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function pgGetMyInbox($pgGetMyInbox)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  users.user_display_name,
  users.user_picture,
  users.spring,
  messages.message_id,
  messages.created_at
FROM messages
INNER JOIN items ON messages.item_id = items.item_id
INNER JOIN users ON items.owner_id = users.user_id
WHERE messages.select_to_user_id = '" . $pgGetMyInbox['select_to_user_id'] . "'
ORDER BY messages.created_at desc
OFFSET '" . $pgGetMyInbox['offset'] . "'
LIMIT " . $pgGetMyInbox['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyVideo($pgGetMyVideo)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
    items.item_id,
    items.type,
    items.cover,
    items.title,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count
FROM items
INNER JOIN users ON items.owner_id = users.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE items.owner_id = '" . $pgGetMyVideo['owner_id'] . "'
AND items.type = 'video'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
ORDER BY items.created_at desc
OFFSET '" . $pgGetMyVideo['offset'] . "'
LIMIT " . $pgGetMyVideo['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyImages($pgGetMyImages)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
    items.item_id,
    items.type,
    items.cover,
    items.title,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count
FROM items
INNER JOIN users ON items.owner_id = users.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE items.owner_id = '" . $pgGetMyImages['owner_id'] . "'
AND items.type = 'image'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
ORDER BY items.created_at desc
OFFSET '" . $pgGetMyImages['offset'] . "'
LIMIT " . $pgGetMyImages['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyArticle($pgGetMyArticle)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
    items.item_id,
    items.type,
    items.cover,
    items.title,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count
FROM items
INNER JOIN users ON items.owner_id = users.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE items.owner_id = '" . $pgGetMyArticle['owner_id'] . "'
AND items.type = 'article'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
ORDER BY items.created_at desc
OFFSET '" . $pgGetMyArticle['offset'] . "'
LIMIT " . $pgGetMyArticle['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyEvents($pgGetMyEvents)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
    items.item_id,
    items.type,
    items.cover,
    items.cover_video,
    items.title,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.country as item_country,
    items.city as item_city,
    items.started_at,
    items.stopped_at,
    items.place,
    items.src,
    items.created_at,
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count
FROM items
INNER JOIN users ON items.owner_id = users.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE items.owner_id = '" . $pgGetMyEvents['owner_id'] . "'
AND items.type = 'event'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
ORDER BY items.created_at desc
OFFSET '" . $pgGetMyEvents['offset'] . "'
LIMIT " . $pgGetMyEvents['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }
    public function pgGetMyStarsHistory($pgGetMyStarsHistory)
    {
        try {
            $result = pg_query($this->pgConn, "
select
    items.item_id,
    items.type,
    items.title,
    items.cover,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    items.updated_at,
    items_stars.created_at as star_created_at,
    users.user_display_name,
    users.user_picture,
    users.user_cover,
    users.spring,
    items_counts.item_count_show,
  count(distinct items_stars.star_id) as stars_count
from items
LEFT OUTER JOIN users on users.user_id = items.owner_id
LEFT OUTER join items_stars on items.item_id = items_stars.item_id and items_stars.user_id = '" . $pgGetMyStarsHistory['user_id'] . "'
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
items_stars.item_id = items.item_id
and items_stars.user_id = '" . $pgGetMyStarsHistory['user_id'] . "'
group by items.item_id, items_stars.created_at, users.user_display_name, users.user_picture, users.user_cover, users.spring, items_counts.item_count_show, items_stars.user_id
OFFSET '" . $pgGetMyStarsHistory['offset'] . "'
LIMIT " . $pgGetMyStarsHistory['limit'] . ";
");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyTagsHistory($pgGetMyTagsHistory)
    {
        try {
            $result = pg_query($this->pgConn, "
select
    items.item_id,
    items.type,
    items.title,
    items.cover,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    items.updated_at,
    users_items_tags_sets.created_at as tag_created_at,
    users.user_display_name,
    users.user_picture,
    users.user_cover,
    users.spring,
    items_counts.item_count_show,
    users_items_tags_sets.tag,
  count(distinct users_items_tags_sets.uit_set_id) as tags_count
from items
LEFT OUTER JOIN users on users.user_id = items.owner_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
users_items_tags_sets.item_id = items.item_id
and users_items_tags_sets.user_id = '" . $pgGetMyTagsHistory['user_id'] . "'
and items.owner_id <> '" . $pgGetMyTagsHistory['user_id'] . "'
group by items.item_id, users_items_tags_sets.created_at, users.user_display_name, users.user_picture, users.user_cover, users.spring, items_counts.item_count_show, users_items_tags_sets.user_id, users_items_tags_sets.tag
OFFSET '" . $pgGetMyTagsHistory['offset'] . "'
LIMIT " . $pgGetMyTagsHistory['limit'] . ";
");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetTagsForMeHistory($pgGetTagsForMeHistory)
    {
        try {
            $result = pg_query($this->pgConn, "
select
    users_items_tags_sets.tag,
    count(distinct users_items_tags_sets.uit_set_id) as tag_count
from users_items_tags_sets
    LEFT OUTER join items on users_items_tags_sets.item_id = items.item_id
    --LEFT OUTER JOIN users on users_items_tags_sets.user_id = users.user_id
where
    items.owner_id = '" . $pgGetTagsForMeHistory['user_id'] . "'
    and users_items_tags_sets.user_id <> '" . $pgGetTagsForMeHistory['user_id'] . "'
group by users_items_tags_sets.tag
OFFSET '" . $pgGetTagsForMeHistory['offset'] . "'
LIMIT " . $pgGetTagsForMeHistory['limit'] . ";
");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyLikesHistory($pgGetMyLikesHistory)
    {
        try {
            $result = pg_query($this->pgConn, "
select
    items.item_id,
    items.type,
    items.title,
    items.cover,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    items.updated_at,   
    --items_likes_you.created_at as like_created_at,
    --items_likes.created_at as like_created_at, 
    users.user_display_name,
    users.user_picture,
    users.user_cover,
    users.spring,
    items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count
from items
LEFT OUTER JOIN users on users.user_id = items.owner_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetMyLikesHistory['user_id'] . "'
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
--items_likes_you.item_id = items.item_id and 
items_likes_you.user_id = '" . $pgGetMyLikesHistory['user_id'] . "'
group by items.item_id, users.user_display_name, users.user_picture, users.user_cover, users.spring, items_counts.item_count_show
OFFSET '" . $pgGetMyLikesHistory['offset'] . "'
LIMIT " . $pgGetMyLikesHistory['limit'] . ";
");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyPosts($pgGetMyPosts)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
    items.item_id,
    items.type,
    items.cover,
    items.cover_video,
    items.title,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.country as item_country,
    items.city as item_city,
    items.started_at,
    items.stopped_at,
    items.place,
    items.src,
    items.width,
    items.height,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
    posts.post_id,
    posts.created_at,
    posts.type as post_type,    
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count
FROM posts
INNER JOIN items ON posts.item_id = items.item_id
INNER JOIN users ON items.owner_id = users.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetMyPosts['owner_id'] . "'
group by items.item_id, posts.post_id, posts.type, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
ORDER BY posts.created_at desc
OFFSET '" . $pgGetMyPosts['offset'] . "'
LIMIT " . $pgGetMyPosts['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyConnect($pgGetMyConnect)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
    items.item_id,
    items.type,
    items.title,
    items.cover,
    items.cover_video,    
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.country as item_country,
    items.city as item_city,
    items.started_at,
    items.stopped_at,
    items.place,
    items.src,
    items.created_at,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
    posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
    items_counts.item_count_show,
  count(distinct items_stars.star_id) as stars_count,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
    items_likes_you.user_id as its_like
FROM posts 
inner JOIN relationships ON posts.post_owner_id = relationships.to_user_id

inner JOIN items ON posts.item_id = items.item_id

inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id

LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
LEFT OUTER join items_stars on items.item_id = items_stars.item_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetMyConnect['user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE 
(friendship1.to_user_id = '" . $pgGetMyConnect['user_id'] . "' and friendship1.status = '1')
or 
(friendship2.from_user_id = '" . $pgGetMyConnect['user_id'] . "' and friendship2.status = '1')
or
(relationships.from_user_id = '" . $pgGetMyConnect['user_id'] . "' AND items.access = 'public')
or items.owner_id = '" . $pgGetMyConnect['user_id'] . "'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes_you.user_id
ORDER BY posts.created_at desc
OFFSET '" . $pgGetMyConnect['offset'] . "'
LIMIT '" . $pgGetMyConnect['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyConnectForFriends($pgGetMyConnectForFriends) // TODO: remove?
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                SELECT 
                    items.item_id,
                    items.type,
                    items.title,
                    items.content,
                    items.video_duration,
                    items.tags,
                    items.access,
                    items.created_at,
                    users.user_display_name,
                    users.user_picture,
                    users.spring,
                    items_counts.item_count_show
                FROM items 
                inner JOIN relationships 
                ON items.owner_id = relationships.to_user_id
                inner JOIN users
                ON relationships.to_user_id = users.user_id
                INNER join items_counts
                on items.item_id = items_counts.count_item_id
                WHERE relationships.from_user_id = '" . $pgGetMyConnectForFriends['user_id'] . "'
                AND items.access = 'friends'
                ORDER BY items.created_at desc
                LIMIT " . $pgGetMyConnectForFriends['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMySent($pgGetMySent)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  users.user_display_name,
  users.user_picture,
  users.spring,
  messages.message_id,
  messages.created_at
FROM messages
INNER JOIN items ON messages.item_id = items.item_id
INNER JOIN users ON items.owner_id = users.user_id
WHERE messages.select_from_user_id = '" . $pgGetMySent['select_from_user_id'] . "'
ORDER BY messages.created_at desc
OFFSET '" . $pgGetMySent['offset'] . "'
LIMIT " . $pgGetMySent['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetItemsOfUser($pgGetItemsOfUser)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                select 
                    items.item_id,
                    items.type,
                    items.cover,
                    items.title,
                    items.content,
                    items.video_duration,
                    items.tags,
                    items.access,
                    items.src,
                    items.created_at,
                    users.user_display_name,
                    items_counts.item_count_show
                from items 
                inner join users on items.owner_id = users.user_id
                LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
                WHERE items.owner_id = '" . $pgGetItemsOfUser['user_id'] . "'
                AND items.access = 'public'
                order by items.created_at desc
                LIMIT " . $pgGetItemsOfUser['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }
    public function pgGetTagsOfUser($pgGetTagsOfUser)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                select 
                *
                from users_tags
                WHERE users_tags.user_id = '" . $pgGetTagsOfUser['user_id'] . "'
                and users_tags.tag_count > 0;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGet1UserTag($pgGet1UserTag)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                select 
                *
                from users_tags
                WHERE 
                users_tags.user_id = '" . $pgGet1UserTag['user_id'] . "'
                and users_tags.tag = '" . $pgGet1UserTag['tag'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_row($result);
            return pg_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUser($pgGetPostOfUser)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,    
  items.created_at,
  items.src,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  count(users_items_tags_sets.uit_set_id) as tags_conf
  from posts 
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id and users_items_tags_sets.user_id <> items.owner_id
WHERE posts.post_owner_id = '" . $pgGetPostOfUser['user_id'] . "'
AND items.access = 'public'
AND posts.type <> 'item_like'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
order by posts.created_at desc
OFFSET '" . $pgGetPostOfUser['offset'] . "'
LIMIT '" . $pgGetPostOfUser['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserAlbum($pgGetPostOfUserAlbum)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count
from albums_sets
inner join items on albums_sets.item_id = items.item_id
inner join users on items.owner_id = users.user_id
inner join posts on items.item_id = posts.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_albums_friends on users.user_id = access_albums_friends.owner_id
LEFT OUTER JOIN albums on access_albums_friends.album_id = albums.album_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
where
albums_sets.album_id = '" . $pgGetPostOfUserAlbum['album_id'] . "'
and
(
albums_sets.owner_id = '" . $pgGetPostOfUserAlbum['user_id'] . "'
and items.access = 'public'
)
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, albums_sets.created_at
order by items.created_at desc
OFFSET '" . $pgGetPostOfUserAlbum['offset'] . "'
LIMIT '" . $pgGetPostOfUserAlbum['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserAuthorised($pgGetPostOfUserAutorised)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,    
  items.created_at,  
  items.src,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  items_likes_you.user_id as its_like
from posts
LEFT OUTER join items on posts.item_id = items.item_id and posts.post_owner_id = '" . $pgGetPostOfUserAutorised['user_id'] . "'
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id

LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetPostOfUserAutorised['for_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id

LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where

(friendship1.to_user_id = '" . $pgGetPostOfUserAutorised['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetPostOfUserAutorised['for_user_id'] . "' and friendship2.status = '1')
and items.owner_id = '" . $pgGetPostOfUserAutorised['user_id'] . "'
or (posts.post_owner_id = '" . $pgGetPostOfUserAutorised['user_id'] . "' and items.access = 'public' AND posts.type <> 'item_like')
or (items.owner_id = '" . $pgGetPostOfUserAutorised['user_id'] . "' and items.access = 'public')
or items.owner_id = '" . $pgGetPostOfUserAutorised['for_user_id'] . "'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes_you.user_id
order by posts.created_at desc
OFFSET '" . $pgGetPostOfUserAutorised['offset'] . "'
LIMIT '" . $pgGetPostOfUserAutorised['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetViewedOfUser($pgGetViewedOfUser)
    {
        // https://api.vide.me/v2/spring/viewed/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,  
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(items_likes.item_id) as likes_count,
  count(distinct items_reposts.repost_id) as reposts_count
  from posts 
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetViewedOfUser['user_id'] . "'
AND items.access = 'public'
AND posts.type <> 'item_like'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
order by items_counts.item_count_show desc
OFFSET '" . $pgGetViewedOfUser['offset'] . "'
LIMIT '" . $pgGetViewedOfUser['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetViewedOfUserAuthorised($pgGetViewedOfUserAutorised)
    {
        // https://api.vide.me/v2/spring/viewed/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,  
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(items_likes.item_id) as likes_count,
  count(distinct items_reposts.repost_id) as reposts_count,
  items_likes.user_id as its_like
from posts
LEFT OUTER join items on posts.item_id = items.item_id and posts.post_owner_id = '" . $pgGetViewedOfUserAutorised['user_id'] . "'
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id

LEFT OUTER join items_likes on items.item_id = items_likes.item_id and items_likes.user_id = '" . $pgGetViewedOfUserAutorised['for_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where
(friendship1.to_user_id = '" . $pgGetViewedOfUserAutorised['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetViewedOfUserAutorised['for_user_id'] . "' and friendship2.status = '1')
and items.owner_id = '" . $pgGetViewedOfUserAutorised['user_id'] . "'
or (posts.post_owner_id = '" . $pgGetViewedOfUserAutorised['user_id'] . "' and items.access = 'public' AND posts.type <> 'item_like')
or (items.owner_id = '" . $pgGetViewedOfUserAutorised['user_id'] . "' and items.access = 'public')
or items.owner_id = '" . $pgGetViewedOfUserAutorised['for_user_id'] . "'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes.user_id
order by items_counts.item_count_show desc
OFFSET '" . $pgGetViewedOfUserAutorised['offset'] . "'
LIMIT '" . $pgGetViewedOfUserAutorised['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserAuthorisedAlbum($pgGetPostOfUserAutorisedAlbum) // TODO: remove ???
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,

  posts.created_at,
  posts.type as post_type,
  
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,

  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  items_likes.user_id as its_like
from albums_sets
inner join items on albums_sets.item_id = items.item_id
inner join users on items.owner_id = users.user_id
inner join posts on items.item_id = posts.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_albums_friends on users.user_id = access_albums_friends.owner_id
LEFT OUTER JOIN albums on access_albums_friends.album_id = albums.album_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id and items_likes.user_id = '" . $pgGetPostOfUserAutorisedAlbum['for_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where
(
((friendship1.to_user_id = '" . $pgGetPostOfUserAutorisedAlbum['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetPostOfUserAutorisedAlbum['for_user_id'] . "' and friendship2.status = '1'))
and items.owner_id = '" . $pgGetPostOfUserAutorisedAlbum['user_id'] . "'
and albums_sets.album_id = '" . $pgGetPostOfUserAutorisedAlbum['album_id'] . "'
and albums.access = 'friends'
)
or
(
albums_sets.album_id = '" . $pgGetPostOfUserAutorisedAlbum['album_id'] . "'
and items.access = 'public'
)
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes.user_id, albums_sets.created_at
order by posts.created_at desc
OFFSET '" . $pgGetPostOfUserAutorisedAlbum['offset'] . "'
LIMIT '" . $pgGetPostOfUserAutorisedAlbum['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserAlbumMy($pgGetPostOfUserAlbumMy)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,

  --posts.created_at,
  --posts.type as post_type,
  
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show
from albums_sets
inner join items on albums_sets.item_id = items.item_id
inner join users on items.owner_id = users.user_id
--inner join posts on items.item_id = posts.item_id
--inner join users as user_item on items.owner_id = user_item.user_id
--inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where
albums_sets.album_id = '" . $pgGetPostOfUserAlbumMy['album_id'] . "'
group by items.owner_id, items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
order by items.created_at desc
OFFSET '" . $pgGetPostOfUserAlbumMy['offset'] . "'
LIMIT '" . $pgGetPostOfUserAlbumMy['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetVideoOfUser($pgGetVideoOfUser)
    {
        // https://api.vide.me/v2/spring/video/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count
  from posts 
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetVideoOfUser['user_id'] . "'
AND items.type = 'video'
AND items.access = 'public'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
order by posts.created_at desc
OFFSET '" . $pgGetVideoOfUser['offset'] . "'
LIMIT '" . $pgGetVideoOfUser['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetVideoOfUserAuthorised($pgGetVideoOfUserAuthorised)
    {
        // https://api.vide.me/v2/spring/video/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  items_likes_you.user_id as its_like
from posts
LEFT OUTER join items on posts.item_id = items.item_id and posts.post_owner_id = '" . $pgGetVideoOfUserAuthorised['user_id'] . "'
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetVideoOfUserAuthorised['for_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where
(friendship1.to_user_id = '" . $pgGetVideoOfUserAuthorised['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetVideoOfUserAuthorised['for_user_id'] . "' and friendship2.status = '1')
and items.owner_id = '" . $pgGetVideoOfUserAuthorised['user_id'] . "'
and items.type = 'video'
or (posts.post_owner_id = '" . $pgGetVideoOfUserAuthorised['user_id'] . "' and items.access = 'public' and items.type = 'video')
or (items.owner_id = '" . $pgGetVideoOfUserAuthorised['user_id'] . "' and items.access = 'public' and items.type = 'video')
or (items.owner_id = '" . $pgGetVideoOfUserAuthorised['for_user_id'] . "' and items.type = 'video')
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes_you.user_id
order by posts.created_at desc
OFFSET '" . $pgGetVideoOfUserAuthorised['offset'] . "'
LIMIT '" . $pgGetVideoOfUserAuthorised['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetImageOfUser($pgGetImageOfUserImage)
    {
        // https://api.vide.me/v2/spring/image/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count
from posts 
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetImageOfUserImage['user_id'] . "'
AND items.type = 'image'
AND items.access = 'public'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
order by posts.created_at desc
OFFSET '" . $pgGetImageOfUserImage['offset'] . "'
LIMIT '" . $pgGetImageOfUserImage['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetImageOfUserAuthorised($pgGetImageOfUserAutorised)
    {
        // https://api.vide.me/v2/spring/image/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  items_likes_you.user_id as its_like
from posts
LEFT OUTER join items on posts.item_id = items.item_id and posts.post_owner_id = '" . $pgGetImageOfUserAutorised['user_id'] . "'
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetImageOfUserAutorised['for_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where
(friendship1.to_user_id = '" . $pgGetImageOfUserAutorised['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetImageOfUserAutorised['for_user_id'] . "' and friendship2.status = '1')
and items.owner_id = '" . $pgGetImageOfUserAutorised['user_id'] . "'
and items.type = 'image'
or (posts.post_owner_id = '" . $pgGetImageOfUserAutorised['user_id'] . "' and items.access = 'public' and items.type = 'image')
or (items.owner_id = '" . $pgGetImageOfUserAutorised['user_id'] . "' and items.access = 'public' and items.type = 'image')
or (items.owner_id = '" . $pgGetImageOfUserAutorised['for_user_id'] . "' and items.type = 'image')
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes_you.user_id
order by posts.created_at desc
OFFSET '" . $pgGetImageOfUserAutorised['offset'] . "'
LIMIT '" . $pgGetImageOfUserAutorised['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetimageOfUserImageOnly($pgGetPostOfUserImageOnly) //TODO: remove?
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                select 
                    items.item_id,
                    items.type,
                    items.cover,
                    items.title,
                    items.content,
                    items.video_duration,
                    items.tags,
                    items.access,
                    posts.created_at,
                    users.user_display_name,
                    users.user_picture,
                    items_counts.item_count_show
                from posts
                inner join items on posts.item_id = items.item_id
                inner join users on items.owner_id = users.user_id
                LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
                WHERE posts.post_owner_id = '" . $pgGetPostOfUserImageOnly['user_id'] . "'
                AND items.type = 'image'
                AND items.access = 'public' 
                order by posts.created_at desc
                LIMIT '" . $pgGetPostOfUserImageOnly['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserImageOnlyAuthorised($pgGetPostOfUserImageOnlyAuthorised) // TODO: remove
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  posts.created_at,
  users.user_display_name,
  users.user_picture,
  items_counts.item_count_show
from posts
inner join items on posts.item_id = items.item_id
inner join users on items.owner_id = users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
where
(friendship1.to_user_id = '" . $pgGetPostOfUserImageOnlyAuthorised['for_user_id'] . "'
or  friendship2.from_user_id = '" . $pgGetPostOfUserImageOnlyAuthorised['for_user_id'] . "')
and items.owner_id = '" . $pgGetPostOfUserImageOnlyAuthorised['user_id'] . "'
or 
(
posts.post_owner_id = '" . $pgGetPostOfUserImageOnlyAuthorised['user_id'] . "'
and items.access = 'public'
)
or 
(
items.owner_id = '" . $pgGetPostOfUserImageOnlyAuthorised['user_id'] . "'
and
items.access = 'public'
)
and items.type = 'image'
order by posts.created_at desc
LIMIT '" . $pgGetPostOfUserImageOnlyAuthorised['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetArticleOfUser($pgGetArticleOfUser)
    {
        // https://api.vide.me/v2/spring/article/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count
from posts 
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetArticleOfUser['user_id'] . "'
AND items.type = 'article'
AND items.access = 'public'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
order by posts.created_at desc
OFFSET '" . $pgGetArticleOfUser['offset'] . "'
LIMIT '" . $pgGetArticleOfUser['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetArticleOfUserAuthorised($pgGetArticleOfUserAuthorised)
    {
        // https://api.vide.me/v2/spring/article/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  items_likes_you.user_id as its_like
from posts
LEFT OUTER join items on posts.item_id = items.item_id and posts.post_owner_id = '" . $pgGetArticleOfUserAuthorised['user_id'] . "'
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetArticleOfUserAuthorised['for_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where
(friendship1.to_user_id = '" . $pgGetArticleOfUserAuthorised['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetArticleOfUserAuthorised['for_user_id'] . "' and friendship2.status = '1')
and items.owner_id = '" . $pgGetArticleOfUserAuthorised['user_id'] . "'
and items.type = 'article'
or (posts.post_owner_id = '" . $pgGetArticleOfUserAuthorised['user_id'] . "' and items.access = 'public' and items.type = 'article')
or (items.owner_id = '" . $pgGetArticleOfUserAuthorised['user_id'] . "' and items.access = 'public' and items.type = 'article')
or (items.owner_id = '" . $pgGetArticleOfUserAuthorised['for_user_id'] . "' and items.type = 'article')
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes_you.user_id
order by posts.created_at desc
OFFSET '" . $pgGetArticleOfUserAuthorised['offset'] . "'
LIMIT '" . $pgGetArticleOfUserAuthorised['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetEventOfUser($pgGetEventOfUser)
    {
        // https://api.vide.me/v2/spring/event/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(items_likes.item_id) as likes_count,
  count(distinct items_reposts.repost_id) as reposts_count
from posts 
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetEventOfUser['user_id'] . "'
AND items.type = 'event'
AND items.access = 'public'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
order by posts.created_at desc
OFFSET '" . $pgGetEventOfUser['offset'] . "'
LIMIT '" . $pgGetEventOfUser['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetEventOfUserAuthorised($pgGetEventOfUserAuthorised)
    {
        // https://api.vide.me/v2/spring/event/?spring=tsedi
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count,
  items_likes_you.user_id as its_like
from posts
LEFT OUTER join items on posts.item_id = items.item_id and posts.post_owner_id = '" . $pgGetEventOfUserAuthorised['user_id'] . "'
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_likes as items_likes_you on items.item_id = items_likes_you.item_id and items_likes_you.user_id = '" . $pgGetEventOfUserAuthorised['for_user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where
(friendship1.to_user_id = '" . $pgGetEventOfUserAuthorised['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetEventOfUserAuthorised['for_user_id'] . "' and friendship2.status = '1')
and items.owner_id = '" . $pgGetEventOfUserAuthorised['user_id'] . "'
and items.type = 'event'
or (posts.post_owner_id = '" . $pgGetEventOfUserAuthorised['user_id'] . "' and items.access = 'public' and items.type = 'event')
or (items.owner_id = '" . $pgGetEventOfUserAuthorised['user_id'] . "' and items.access = 'public' and items.type = 'event')
or (items.owner_id = '" . $pgGetEventOfUserAuthorised['for_user_id'] . "' and items.type = 'event')
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show, items_likes_you.user_id
order by posts.created_at desc
OFFSET '" . $pgGetEventOfUserAuthorised['offset'] . "'
LIMIT '" . $pgGetEventOfUserAuthorised['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserVideoOnlyForFriends($pgGetPostOfUserVideoOnlyForFriends) // TODO: remove
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                SELECT *
                FROM posts
                inner JOIN signs
                ON posts.post_owner_id = signs.owner_id
                inner JOIN users
                ON signs.owner_id = users.user_id
                inner JOIN relationships
                ON signs.owner_id = relationships.from_user_id
                WHERE posts.post_owner_id = '" . $pgGetPostOfUserVideoOnlyForFriends['user_id'] . "'
                AND relationships.to_user_id = '" . $pgGetPostOfUserVideoOnlyForFriends['friend_id'] . "'
                AND signs.access = 'friends';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserImageOnlyForFriends($pgGetPostOfUserVideoOnlyForFriends) // TODO: remove
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                SELECT *
                FROM posts
                inner JOIN signs
                ON posts.post_owner_id = signs.owner_id
                inner JOIN users
                ON signs.owner_id = users.user_id
                inner JOIN relationships
                ON signs.owner_id = relationships.from_user_id
                WHERE posts.post_owner_id = '" . $pgGetPostOfUserVideoOnlyForFriends['user_id'] . "'
                AND relationships.to_user_id = '" . $pgGetPostOfUserVideoOnlyForFriends['friend_id'] . "'
                AND signs.access = 'friends';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserSignVideoOnlyForFriends($pgGetPostOfUserSignVideoOnlyForFriends) // TODO: remove
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                SELECT *
                FROM posts
                inner JOIN signs
                ON posts.post_owner_id = signs.owner_id
                inner JOIN users
                ON signs.owner_id = users.user_id
                inner JOIN relationships
                ON signs.owner_id = relationships.from_user_id
                WHERE  signs.sign_id = '" . $pgGetPostOfUserSignVideoOnlyForFriends['sign_id'] . "'
                AND posts.post_owner_id = '" . $pgGetPostOfUserSignVideoOnlyForFriends['user_id'] . "'
                AND relationships.to_user_id = '" . $pgGetPostOfUserSignVideoOnlyForFriends['friend_id'] . "'
                AND signs.access = 'friends';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }
    public function pgMySign($pgMySign)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from users
                inner join signs on signs.owner_id = users.user_id
                WHERE signs.owner_id = '" . $pgMySign['user_id'] . "'
                order by signs.created_at desc;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgMyAlbums($pgMyAlbums)
    {
        //print_r($pgMyAlbums);
        try {
            $result = pg_query($this->pgConn, "
select 
albums.album_id,
albums.owner_id,
albums.access,
albums.title,
albums.content,
albums.image,
albums.cover,
albums.video,
albums.created_at,
albums.updated_at,
users.user_display_name,
users.spring,
count(distinct albums_sets.item_id)
from albums
inner join users on albums.owner_id = users.user_id
left join albums_sets on albums.owner_id = albums_sets.owner_id and albums.album_id = albums_sets.album_id
WHERE albums.owner_id = '" . $pgMyAlbums['user_id'] . "'
group by albums.album_id, albums.owner_id, albums.album_id, users.user_display_name, users.spring
order by albums.created_at desc;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserSign($pgGetPostOfUserSign) // TODO: remove
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  posts.created_at,
  users.user_display_name,
  items_counts.item_count_show
from posts 
inner join items on posts.item_id = items.item_id
inner join users on items.owner_id = users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetPostOfUserSign['user_id'] ."'
AND items.access = 'public'
order by posts.created_at desc
LIMIT '" . $pgGetPostOfUserSign['limit'] ."';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPostOfUserSignVideosOnly($pgGetPostOfUserSignVideoOnly) // TODO: remove?
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select 
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  posts.created_at,
  users.user_display_name,
  users.user_picture,
  items_counts.item_count_show
from posts
inner join items on posts.item_id = items.item_id
inner join users on items.owner_id = users.user_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE posts.post_owner_id = '" . $pgGetPostOfUserSignVideoOnly['user_id'] . "'
AND items.sign_id = '" . $pgGetPostOfUserSignVideoOnly['sign_id'] . "'
AND items.type = 'video'
AND items.access = 'public' 
order by posts.created_at desc
OFFSET '" . $pgGetPostOfUserSignVideoOnly['offset'] . "'
LIMIT '" . $pgGetPostOfUserSignVideoOnly['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetPopUsers($pgGetPopUsers)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  posts.post_owner_id,
  users.user_id,
  users.user_display_name,
  users.user_picture,
  users.spring,
  users.country,
  users.city,
  COUNT(posts.post_id) as posts_count
FROM posts 
JOIN users 
ON posts.post_owner_id = users.user_id
GROUP BY posts.post_owner_id, users.user_id
ORDER BY COUNT(posts.post_id) DESC
LIMIT '" . $pgGetPopUsers['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetItemFullInfo($pgGetItemFullInfo)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
    items.item_id,
    items.owner_id,
    items.type,
    items.title,
    items.cover,
    items.cover_video,
    items.content,
    items.video_duration,
    items.body,
    items.tags,
    items.access,
    items.ext_links,
    items.created_at,
    items.updated_at,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
    items.lat,
    items.lng,
    items.country as item_country,
    items.city as item_city,
    items.place,
    items.started_at,
    items.stopped_at,
    items.src,
    users.user_display_name,
    users.user_picture,
    users.user_cover,
    users.spring,
    users.bio,
    users.country,
    users.city,
    users.user_link,
    items_counts.item_count_show,
  count(distinct items_stars.star_id) as stars_count,  --<----star_id nooo item_id
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct items_reposts.repost_id) as reposts_count
from items
inner join users on items.owner_id = users.user_id
LEFT OUTER join posts on items.item_id = posts.item_id
LEFT OUTER join items_stars on items.item_id = items_stars.item_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE items.item_id = '" . $pgGetItemFullInfo . "'
group by items.owner_id, items.item_id, users.user_display_name, users.user_picture, users.user_cover, users.spring, users.bio, users.country, users.city, users.user_link, items_counts.item_count_show;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function pgGetItemFullInfoAccess($pgGetItemFullInfoAccess)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetItemFullInfoAccess);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.owner_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.body,
  items.video_duration,
  items.tags,
  items.access,
  items.created_at,
  items.updated_at,
    items.started_at,
    items.stopped_at,
    items.lat,
    items.lng,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  items.ext_links,
  items.src,
  users.user_display_name,
  users.user_picture,
  users.user_cover,
  users.spring,
  users.bio,
  users.country,
  users.city,
  users.user_link,
  items_counts.item_count_show,
  --count(distinct items_stars.star_id) as stars_count,  --<----like_id nooo item_id
  --count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  --count(distinct items_reposts.repost_id) as reposts_count,
  --items_likes.user_id as its_like
  count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
  count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from items
--LEFT OUTER join posts on items.item_id = posts.item_id

LEFT OUTER join users on items.owner_id = users.user_id

LEFT OUTER JOIN access_items_friends on items.item_id = access_items_friends.item_id
LEFT OUTER JOIN friendship as friendship1 on access_items_friends.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_items_friends.user_id = friendship2.to_user_id
--LEFT OUTER join items_likes on items.item_id = items_likes.item_id and items_likes.user_id = '" . $pgGetItemFullInfoAccess['to_user_id'] . "'
--LEFT OUTER join items_stars on items.item_id = items_stars.item_id and items_stars.user_id = '" . $pgGetItemFullInfoAccess['to_user_id'] . "'
--LEFT OUTER join comments on items.item_id = comments.item_id
--LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id

LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
and items.owner_id <> users_items_tags_sets.user_id
LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
and items.owner_id <> users_items_tags_sets_new.user_id
and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'
where
(friendship1.to_user_id = '" . $pgGetItemFullInfoAccess['to_user_id'] . "' and friendship1.status = '1' and items.item_id = '" . $pgGetItemFullInfoAccess['item_id'] . "')
or (friendship2.from_user_id = '" . $pgGetItemFullInfoAccess['to_user_id'] . "' and friendship2.status = '1' and items.item_id = '" . $pgGetItemFullInfoAccess['item_id'] . "')
and items.item_id = '" . $pgGetItemFullInfoAccess['item_id'] . "'
or (items.access = 'public' and items.item_id = '" . $pgGetItemFullInfoAccess['item_id'] . "')
or (items.item_id = '" . $pgGetItemFullInfoAccess['item_id'] . "' and items.owner_id = '" . $pgGetItemFullInfoAccess['to_user_id'] . "')
group by items.item_id, users.user_display_name, users.user_picture, users.user_cover, users.spring, users.bio, users.country, users.city, users.user_link, items_counts.item_count_show;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function pgGetItemFullInfoAccessNOA($pgGetItemFullInfoAccessNOA)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.owner_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.body,
  items.video_duration,
  items.tags,
  items.access,
  items.created_at,
  items.updated_at,
    items.started_at,
    items.stopped_at,
    items.lat,
    items.lng,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  items.ext_links,
  items.src,
  users.user_display_name,
  users.user_picture,
  users.user_cover,
  users.spring,
  users.bio,
  users.country,
  users.city,
  users.user_link,
  items_counts.item_count_show,
  --count(distinct items_stars.star_id) as stars_count,  --<----like_id nooo item_id
  --count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  --count(distinct items_reposts.repost_id) as reposts_count,
  --items_likes.user_id as its_like
  count(distinct users_items_tags_sets.uit_set_id) as user_tags_conf,
  count(distinct users_items_tags_sets_new.uit_set_id) as user_tags_conf_new
from items
--LEFT OUTER join posts on items.item_id = posts.item_id
LEFT OUTER join users on items.owner_id = users.user_id
--LEFT OUTER join items_stars on items.item_id = items_stars.item_id
--LEFT OUTER join items_likes on items.item_id = items_likes.item_id
--LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id

LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
and items.owner_id <> users_items_tags_sets.user_id
LEFT OUTER join users_items_tags_sets as users_items_tags_sets_new on items.item_id = users_items_tags_sets_new.item_id
and items.owner_id <> users_items_tags_sets_new.user_id
and users_items_tags_sets_new.created_at > CURRENT_TIMESTAMP - INTERVAL '7 days'

where
(items.access = 'public' and items.item_id = '" . $pgGetItemFullInfoAccessNOA['item_id'] . "')
or
(items.access is null and items.item_id = '" . $pgGetItemFullInfoAccessNOA['item_id'] . "')
group by items.item_id, users.user_display_name, users.user_picture, users.user_cover, users.spring, users.bio, users.country, users.city, users.user_link, items_counts.item_count_show;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_assoc($result);
        } else {
            return false;
        }
    }
    public function pgGetItemTagsAccessNOA($pgGetItemTagsAccessNOA)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  item_id,
  tag,
  count(tag) as tags_count
from users_items_tags_sets
where item_id = '" . $pgGetItemTagsAccessNOA['item_id'] . "'
group by item_id, tag;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_assoc($result);
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetItemTagsAccess($pgGetItemTagsAccess)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT its.item_id,
       its.tag,
       count(its.tag) as tags_count,
       string_agg(u.user_id, ',') as its_tag
FROM users_items_tags_sets its
  LEFT JOIN users u on u.user_id = its.user_id and u.user_id = '" . $pgGetItemTagsAccess['user_id'] . "'
WHERE its.item_id = '" . $pgGetItemTagsAccess['item_id'] . "'
GROUP BY its.item_id, its.tag
order by its.item_id, its.tag;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_assoc($result);
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetUserInfoBySpring($pgGetUserInfoBySpring)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                SELECT * 
                FROM users
                WHERE LOWER(spring)=LOWER('" . $pgGetUserInfoBySpring['spring'] . "');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgGetUserInfoByFB_ID($pgGetUserInfoByFB_ID)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                SELECT * 
                FROM users
                WHERE facebook = '" . $pgGetUserInfoByFB_ID['facebook'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgGetDeleteUserInfoByConfirm($pgGetDeleteUserInfoByConfirm)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                SELECT * 
                FROM facebook_users_deletion
                WHERE fud_id = '" . $pgGetDeleteUserInfoByConfirm['fud_id'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetMyRelationships($pgGetMyRelationships)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $this->table_relationships . " t1
                inner join " . $this->table_users . " t2 on t1.to_user_id = t2.user_id
                WHERE t1.from_user_id = '" . $pgGetMyRelationships['from_user_id'] . "' 
                order by t1.created_at desc
                LIMIT 100;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetRelationshipsToMe($pgGetRelationshipsToMe)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
    users.user_id,
    users.user_display_name,
    users.user_picture,
    users.user_cover,
    users.spring,
    users.bio,
    users.country,
    users.city,
    relationships.created_at
from relationships 
inner join users on relationships.from_user_id = users.user_id
WHERE relationships.to_user_id = '" . $pgGetRelationshipsToMe['to_user_id'] . "' 
order by relationships.created_at desc
LIMIT 100;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetRelationshipsFromMe($pgGetRelationshipsFromMe)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
    users.user_id,
    users.user_display_name,
    users.user_picture,
    users.user_cover,
    users.spring,
    users.bio,
    users.country,
    users.city,
    relationships.created_at
from relationships 
inner join users on relationships.to_user_id = users.user_id
WHERE relationships.from_user_id = '" . $pgGetRelationshipsFromMe['from_user_id'] . "' 
order by relationships.created_at desc
LIMIT 100;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetMyFriends($pgGetMyFriends)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        /*SELECT *
FROM users
LEFT OUTER JOIN friendship as friendship1 on users.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on users.user_id = friendship2.to_user_id
WHERE
(friendship1.to_user_id = '9ecd2bff590e' and friendship1.status = '1')
or
(friendship2.from_user_id = '9ecd2bff590e' and friendship2.status = '1');*/
        try {
            $result = pg_query($this->pgConn, "
SELECT 
u.user_id, 
u.user_display_name,
u.user_picture,
u.user_cover,
u.spring,
u.country,
u.city,
f.updated_at
FROM friendship f
JOIN users u on f.from_user_id = u.user_id
where f.to_user_id = '" . $pgGetMyFriends['user_id'] . "'
AND f.status = 1
union
SELECT
u.user_id, 
u.user_display_name,
u.user_picture,
u.user_cover,
u.spring,
u.country,
u.city,
f.updated_at
FROM friendship f
JOIN users u on f.to_user_id = u.user_id
where f.from_user_id = '" . $pgGetMyFriends['user_id'] . "'
AND f.status = 1
LIMIT " . $pgGetMyFriends['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetFriendsStatus($pgGetFriendsStatus)
    {
        //echo "pgGetFriendsStatus \n\r";
        //print_r($pgGetFriendsStatus);
        try {
            $result = pg_query($this->pgConn, "
SELECT * 
FROM friendship
WHERE 
(from_user_id = '" . $pgGetFriendsStatus['from_user_id'] . "' 
and to_user_id = '" . $pgGetFriendsStatus['to_user_id'] . "')
or 
(to_user_id = '" . $pgGetFriendsStatus['from_user_id'] . "' 
and from_user_id = '" . $pgGetFriendsStatus['to_user_id'] . "');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            //return pg_fetch_all($result);
            //return pg_fetch_row($result);
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetUsersRefEssencesInfo($pgGetUsersRefEssencesInfo)
    {
        //echo "pgGetFriendsStatus \n\r";
        //print_r($pgGetFriendsStatus);
        try {
            $result = pg_query($this->pgConn, "
SELECT * 
FROM users_ref_essences
WHERE 
users_essences = '" . $pgGetUsersRefEssencesInfo['ue_id'] . "' 
and user_id = '" . $pgGetUsersRefEssencesInfo['user_id'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            //return pg_fetch_all($result);
            //return pg_fetch_row($result);
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgGetUsersRefPartnersInfo($pgGetUsersRefPartnersInfo)
    {
        //echo "pgGetFriendsStatus \n\r";
        //print_r($pgGetFriendsStatus);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  users.user_id,
  users.spring,
  items_partners.ip_id,
  items_partners.item_id,
  items_partners.partner_id,
  items_partners.status,
  items_partners.created_at
FROM items_partners
  LEFT OUTER join users on items_partners.partner_id = users.user_id
WHERE 
  item_id = '" . $pgGetUsersRefPartnersInfo['item_id'] . "' 
  and partner_id = '" . $pgGetUsersRefPartnersInfo['partner_id'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            //return pg_fetch_all($result);
            //return pg_fetch_row($result);
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetFriendshipMyPendingRequest($pgGetFriendshipMyPendingRequest)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
users.user_id, 
users.user_display_name,
users.user_picture,
users.user_cover,
users.spring,
users.country,
users.city,
friendship.created_at
FROM friendship
JOIN users on friendship.from_user_id = users.user_id
where friendship.to_user_id = '" . $pgGetFriendshipMyPendingRequest['user_id'] . "'
AND friendship.status = 0
AND friendship.action_user_id <> '" . $pgGetFriendshipMyPendingRequest['user_id'] . "'
union
SELECT
users.user_id, 
users.user_display_name,
users.user_picture,
users.user_cover,
users.spring,
users.country,
users.city,
friendship.created_at
FROM friendship
JOIN users on friendship.to_user_id = users.user_id
where friendship.from_user_id = '" . $pgGetFriendshipMyPendingRequest['user_id'] . "'
AND friendship.status = 0
AND friendship.action_user_id <> '" . $pgGetFriendshipMyPendingRequest['user_id'] . "'
LIMIT " . $pgGetFriendshipMyPendingRequest['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetFriendshipMyDeclined($pgGetFriendshipMyDeclined)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
users.user_id, 
users.user_display_name,
users.user_picture,
users.user_cover,
users.spring,
users.country,
users.city,
friendship.created_at
FROM friendship
JOIN users on friendship.from_user_id = users.user_id
where friendship.to_user_id = '" . $pgGetFriendshipMyDeclined['user_id'] . "'
AND friendship.status = 2
union
SELECT
users.user_id, 
users.user_display_name,
users.user_picture,
users.user_cover,
users.spring,
users.country,
users.city,
friendship.created_at
FROM friendship
JOIN users on friendship.to_user_id = users.user_id
where friendship.from_user_id = '" . $pgGetFriendshipMyDeclined['user_id'] . "'
AND friendship.status = 2
LIMIT " . $pgGetFriendshipMyDeclined['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetFriendshipMyPendingRequestCount($pgGetFriendshipMyPendingRequestCount)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT count(*) as pending_friends
FROM users 
LEFT OUTER JOIN friendship as friendship1 on users.user_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on users.user_id = friendship2.to_user_id
WHERE 
(friendship1.to_user_id = '" . $pgGetFriendshipMyPendingRequestCount['user_id'] . "' and friendship1.status = '0')
or 
(friendship2.from_user_id = '" . $pgGetFriendshipMyPendingRequestCount['user_id'] . "' and friendship2.status = '0');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetFriendshipMyRequest($pgGetFriendshipMyRequest)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
users.user_id, 
users.user_display_name,
users.user_picture,
users.user_cover,
users.spring,
users.country,
users.city,
friendship.created_at
FROM friendship
JOIN users on friendship.from_user_id = users.user_id
where friendship.to_user_id = '" . $pgGetFriendshipMyRequest['user_id'] . "'
AND friendship.status = 0
AND friendship.action_user_id = '" . $pgGetFriendshipMyRequest['user_id'] . "'
union
SELECT
users.user_id, 
users.user_display_name,
users.user_picture,
users.user_cover,
users.spring,
users.country,
users.city,
friendship.created_at
FROM friendship
JOIN users on friendship.to_user_id = users.user_id
where friendship.from_user_id = '" . $pgGetFriendshipMyRequest['user_id'] . "'
AND friendship.status = 0
AND friendship.action_user_id = '" . $pgGetFriendshipMyRequest['user_id'] . "'
LIMIT " . $pgGetFriendshipMyRequest['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetRecommendedConnection($pgGetRecommendedConnection)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
from_user_id, 
users.user_id, 
users.user_display_name, 
users.user_picture, 
users.spring,
users.country,
users.city,
FROM  relationships
inner join users on relationships.from_user_id = users.user_id
WHERE to_user_id = '" . $pgGetRecommendedConnection['to_user_id'] . "'
UNION
SELECT 
to_user_id, 
users.user_id, 
users.user_display_name, 
users.user_picture, 
users.spring,
users.country,
users.city,
FROM relationships 
inner join users on relationships.to_user_id = users.user_id
WHERE from_user_id = '" . $pgGetRecommendedConnection['to_user_id'] . "'
LIMIT " . $pgGetRecommendedConnection['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetRecommendedFriends($pgGetRecommendedFriends)
    {
        //echo "pgGetRecommendedFriends \n\r";
        //print_r($pgGetRecommendedFriends);
        try {
            $result = pg_query($this->pgConn, "
SELECT distinct on (users.user_id)
users.user_id, 
users.user_display_name, 
users.user_picture, 
users.spring,
users.country,
users.city,
users.created_at
from friendship
LEFT OUTER join friendship as f2 on friendship.to_user_id = f2.from_user_id
inner join users on f2.to_user_id = users.user_id
where not exists (select *
                  from friendship f
                  where f.from_user_id = '" . $pgGetRecommendedFriends['user_id'] . "' and
                        f.to_user_id = users.user_id 
                  union
                  select *
                  from friendship f
                  where f.to_user_id = '" . $pgGetRecommendedFriends['user_id'] . "' and
                        f.from_user_id = users.user_id 
                  
                 )
and friendship.from_user_id = '" . $pgGetRecommendedFriends['user_id'] . "'
    UNION
SELECT distinct on (users.user_id)
users.user_id, 
users.user_display_name, 
users.user_picture, 
users.spring,
users.country,
users.city,
users.created_at
from friendship
LEFT OUTER join friendship as f2 on friendship.from_user_id = f2.to_user_id
inner join users on f2.from_user_id = users.user_id
where not exists (select *
                  from friendship f
                  where f.to_user_id = '" . $pgGetRecommendedFriends['user_id'] . "' and
                        f.from_user_id = users.user_id 
                  union
                  select *
                  from friendship f
                  where f.from_user_id = '" . $pgGetRecommendedFriends['user_id'] . "' and
                        f.to_user_id = users.user_id 
                 )
and friendship.to_user_id = '" . $pgGetRecommendedFriends['user_id'] . "'
LIMIT '" . $pgGetRecommendedFriends['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgSearchItemByTag($pgSearchItemByTag)
    {
        try {
            $result = pg_query($this->pgConn, "
                SELECT * 
                FROM posts 
                inner JOIN items
                ON posts.item_id = items.item_id
                inner JOIN users
                ON posts.post_owner_id = users.user_id
                LEFT OUTER join items_tags_array
                on items.item_id = items_tags_array.item_id
                LEFT OUTER join items_counts
                on items.item_id = items_counts.count_item_id
                WHERE items_tags_array.tags @> ARRAY['" . $pgSearchItemByTag['q'] . "']
                ORDER BY items.created_at desc
                LIMIT " . $pgSearchItemByTag['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }

    public function pgSearchItemByText($pgSearchItemByText)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(items_likes.item_id) as likes_count,
  count(distinct items_reposts.repost_id) as reposts_count
FROM posts 
INNER JOIN items ON posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE 
items.body::TEXT ILIKE '%" . $pgSearchItemByText['q'] . "%'
or
items.title::TEXT ILIKE '%" . $pgSearchItemByText['q'] . "%'
and items.access = 'public'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
ORDER BY items.created_at desc
OFFSET '" . $pgSearchItemByText['offset'] . "'
LIMIT " . $pgSearchItemByText['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }

    public function pgSearchItemByTextV3($pgSearchItemByText)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  items.created_at,
  --posts.created_at,
  --posts.type as post_type,
  users.user_display_name,
  users.user_picture,
  users.spring,
  --user_post.user_display_name as post_user_display_name,
  --user_post.user_picture as post_user_picture,
  --user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_stars.star_id) as stars_count,
  count(items_likes.item_id) as likes_count,
  count(distinct items_reposts.repost_id) as reposts_count
--FROM posts 
FROM items 
--INNER JOIN items ON posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
--inner join users as user_post on posts.post_owner_id = user_post.user_id
inner join users on items.owner_id = users.user_id
LEFT OUTER join items_stars on items.item_id = items_stars.item_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE 
items.body::TEXT ILIKE '%" . $pgSearchItemByText['q'] . "%'
or
items.title::TEXT ILIKE '%" . $pgSearchItemByText['q'] . "%'
or
tags::jsonb ? '" . $pgSearchItemByText['q'] . "'
and items.access = 'public'
group by items.owner_id, items.item_id, items.created_at, items.type, user_item.user_display_name, user_item.user_picture, user_item.spring, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
ORDER BY items.created_at desc
OFFSET '" . $pgSearchItemByText['offset'] . "'
LIMIT " . $pgSearchItemByText['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }

    public function pgFullTextSearchItemByTextV4_2W($requestExplode, $param)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
FROM items 
  LEFT join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE
  make_tsvector(title, content) @@ to_tsquery('" . $requestExplode[0] . " & " . $requestExplode[1] . "')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show

union

select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
from users_items_tags_sets
  LEFT OUTER join items on users_items_tags_sets.item_id = items.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
  (users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[0] . "%'
  or 
  users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[1] . "%')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
OFFSET '" . $param['offset'] . "'
LIMIT " . $param['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }
    public function pgFullTextSearchItemByTextV4_1W($requestExplode, $param)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
FROM items 
  LEFT join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE
  make_tsvector(title, content) @@ to_tsquery('" . $requestExplode[0] . "')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show

union

select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
from users_items_tags_sets
  LEFT OUTER join items on users_items_tags_sets.item_id = items.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
  (users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[0] . "%')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
OFFSET '" . $param['offset'] . "'
LIMIT " . $param['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }
    public function pgFullTextSearchItemByTextV4_3W($requestExplode, $param)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
FROM items 
  LEFT join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE
  make_tsvector(title, content) @@ to_tsquery('" . $requestExplode[0] . " & " . $requestExplode[1] . " & " . $requestExplode[2] . "')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show

union

select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
from users_items_tags_sets
  LEFT join items on users_items_tags_sets.item_id = items.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
  (users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[0] . "%'
  or 
  users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[1] . "%'
  or 
  users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[2] . "%')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
OFFSET '" . $param['offset'] . "'
LIMIT " . $param['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }
    public function pgFullTextSearchItemByTextV4_4W($requestExplode, $param)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
FROM items 
  LEFT join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE
  make_tsvector(title, content) @@ to_tsquery('" . $requestExplode[0] . " & " . $requestExplode[1] . " & " . $requestExplode[2] . " & " . $requestExplode[3] . "')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show

union

select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
from users_items_tags_sets
  LEFT join items on users_items_tags_sets.item_id = items.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
  (users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[0] . "%'
  or 
  users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[1] . "%'
  or 
  users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[2] . "%'
  or 
  users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[3] . "%')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
OFFSET '" . $param['offset'] . "'
LIMIT " . $param['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }

    public function pgSearchItemByTags_1W($requestExplode, $param)
    {
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.src,
    items.pre_v_w320,
    items.pre_i_w320,
    items.spr_w120,
    items.vtt_w120,
  items.created_at,
  --users_items_tags_sets.tag,
  users.user_display_name,
  users.user_picture,
  users.spring,
  items_counts.item_count_show,
  count(distinct items_reposts.repost_id) as reposts_count,
  (select STRING_AGG(DISTINCT users_items_tags_sets.tag,'; ') from users_items_tags_sets where users_items_tags_sets.item_id = items.item_id) as array_tags
from users_items_tags_sets
  LEFT OUTER join items on users_items_tags_sets.item_id = items.item_id
  inner join users on items.owner_id = users.user_id
  LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
  LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
where 
  (users_items_tags_sets.tag::TEXT ILIKE '%" . $requestExplode[0] . "%')
  and items.access = 'public'
group by items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
OFFSET '" . $param['offset'] . "'
LIMIT " . $param['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            //echo 'No result';
            return false;
        }
    }
    public function pgSearchUser($pgSearchUser)
    {
        try {
            /*$result = pg_query($this->pgConn, "
                select 
                users.user_id as comment_id,
                users.user_display_name as fullname,
                users.user_email as email,
                users.user_picture as profile_picture_url
                 from users 
                WHERE user_display_name ILIKE '%" . $pgSearchUser['q'] . "%' 
                or user_first_name ILIKE '%" . $pgSearchUser['q'] . "%' 
                or user_last_name ILIKE '%" . $pgSearchUser['q'] . "%'
                LIMIT " . $pgSearchUser['limit'] . ";");*/
            $result = pg_query($this->pgConn, "
                select *
                 from users 
                WHERE user_display_name ILIKE '%" . $pgSearchUser['q'] . "%' 
                or user_first_name ILIKE '%" . $pgSearchUser['q'] . "%' 
                or user_last_name ILIKE '%" . $pgSearchUser['q'] . "%'
                LIMIT " . $pgSearchUser['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            //echo 'No result';
            return false;
        }
    }
    public function pgSearchEssences($pgSearchEssences)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                 from users 
                JOIN users_essences on users.user_id = users_essences.owner_id
                WHERE users.user_display_name ILIKE '%" . $pgSearchEssences['q'] . "%'
                LIMIT " . $pgSearchEssences['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            //echo 'No result';
            return false;
        }
    }

    public function pgSearchEssencesTitle($pgSearchEssencesTitle)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                 from essences 
                WHERE title ILIKE '%" . $pgSearchEssencesTitle['q'] . "%'
                LIMIT " . $pgSearchEssencesTitle['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgSearchEssencesTitleF($pgSearchEssencesTitleF)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                 from essences 
                WHERE title = '" . $pgSearchEssencesTitleF . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_row($result);
            return pg_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function pgGetMyTasks($pgGetMyTasks, $limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $this->table_tasks . " 
                WHERE owner_id = '" . $pgGetMyTasks['user_id'] . "' 
                and tasks.task_type <> 'request_friends'
                and tasks.task_type <> 'fileUploadVideoPre'
                order by created_at desc
                LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function pgGetCommentsNOA($pgGetCommentsNOA, $limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
select 
  comments.comment_id,
  to_char(comments.created_at, 'YYYY-MM-DD hh:mm:ss') as created_at,
  users.user_display_name,
  'https://www.vide.me/' || users.spring as spring,
  'https://s3.amazonaws.com/img.vide.me/' || users.user_picture as user_picture,
  comments.content
from comments
  LEFT OUTER JOIN users ON comments.user_id = users.user_id
WHERE item_id = '" . $pgGetCommentsNOA['item_id'] . "'
OFFSET '" . $pgGetCommentsNOA['offset'] . "'
LIMIT '" . $pgGetCommentsNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
        } else {
            return false;
        }

    }
    public function pgGetCommentsAccess($pgGetCommentsAccess)
    {
        try {
            $result = pg_query($this->pgConn, "
select 
  comments.comment_id,
  to_char(comments.created_at, 'YYYY-MM-DD hh:mm:ss') as created_at,
  users.user_display_name,
  'https://www.vide.me/' || users.spring as spring,
  'https://s3.amazonaws.com/img.vide.me/' || users.user_picture as user_picture,
  comments.content,
  users_comment.user_id as its_comment
from comments
  LEFT OUTER join users ON comments.user_id = users.user_id
  LEFT OUTER JOIN users as users_comment on comments.user_id = users_comment.user_id and users_comment.user_id = '" . $pgGetCommentsAccess['to_user_id'] . "'
WHERE item_id = '" . $pgGetCommentsAccess['item_id'] . "'
OFFSET '" . $pgGetCommentsAccess['offset'] . "'
LIMIT '" . $pgGetCommentsAccess['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_row($result);
            //return pg_fetch_assoc($result);
        } else {
            return false;
        }

    }

    public function pgGetMyTasksVideo($pgGetMyTasksVideo, $limit = 18)
    {
        try {
            $result = pg_query($this->pgConn, "
                select *
                from " . $this->table_tasks . " 
                WHERE owner_id = '" . $pgGetMyTasksVideo['user_id'] . "'
                AND task_type = 'itemSendmail'
                order by created_at desc
                LIMIT " . $limit . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function newUser($newUser)
    {
        $log = new log();

        //echo "<br>newUser<br>";
        //print_r($newUser);
        $trueData = $this->pgPaddingItems($newUser);
        $trueData['user_id'] = $this->welcome->trueRandom();
        if (!empty($newUser['user_password']))
        {
            $userPrefer['user_id'] = $trueData['user_id'];
            //$userPrefer['user_password'] = $newUser['user_password'];
            $userPrefer['user_password'] = $this->welcome->getPassHash($newUser['user_password']);
            //$trueData['user_password'] = $this->welcome->getPassHash($newUser['user_password']);
            //$userPrefer['user_email'] = $newUser['user_email'];
            $userPrefer['user_email'] = $trueData['user_email'];
            $this->pgInsertData($this->table_users_prefer, $userPrefer);
            //$this->pgInsertData('users_prefer', $trueData);
        }
        //echo "newUser trueData \n\r";
        //print_r($trueData);
        $log->toFile(['service' => 'pg_new_user', 'type' => 'success', 'text' => 'new user_id: ' . $trueData['user_id']]);

        $this->pgInsertData('users', $trueData);
        return $trueData['user_id'];
    }

    public function pgGetUserListsForFriends($pgGetUserListsForFriends)
    {
        try {
            $result = pg_query($this->pgConn, "
                SELECT *
                FROM signs
                inner JOIN relationships
                ON signs.owner_id = relationships.from_user_id
                inner JOIN users
                ON relationships.from_user_id = users.user_id
                WHERE relationships.to_user_id = '" . $pgGetUserListsForFriends['user_id'] . "'
                AND signs.owner_id = '" . $pgGetUserListsForFriends['owner_id'] . "'
                AND signs.access = 'friends';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetUserListsForFriendsRev($pgGetUserListsForFriendsRev)
    {
        try {

            $result = pg_query($this->pgConn, "
                SELECT *
                FROM signs
                inner JOIN users
                ON signs.owner_id = users.user_id
                WHERE signs.owner_id = '" . $pgGetUserListsForFriendsRev['user_id'] . "'
                AND signs.access = 'friends';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }
    public function pgGetUserListsPrivate($pgGetUserListsPrivate)
    {
        try {
            $result = pg_query($this->pgConn, "
                SELECT *
                FROM signs
                inner JOIN users
                ON signs.owner_id = users.user_id
                WHERE signs.owner_id = '" . $pgGetUserListsPrivate['user_id'] . "'
                AND signs.access = 'private';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetUserListsPublic($pgGetUserListsPublic)
    {
        try {

            $result = pg_query($this->pgConn, "
                SELECT *
                FROM signs
                inner JOIN users
                ON signs.owner_id = users.user_id
                WHERE signs.owner_id = '" . $pgGetUserListsPublic['user_id'] . "'
                AND signs.access = 'public';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetUserAlbums($pgGetUserAlbums)
    {
        try {

            $result = pg_query($this->pgConn, "
select
albums.owner_id,
albums.access,
albums.title,
albums.content,
albums.image,
albums.cover,
albums.video,
albums.created_at,
users.user_display_name,
users.spring,
count(distinct albums_sets.item_id)
from albums 
inner join users on albums.owner_id = users.user_id
left join albums_sets on albums.owner_id = albums_sets.owner_id and albums.album_id = albums_sets.album_id
LEFT OUTER JOIN access_albums_friends on albums.album_id = access_albums_friends.album_id
LEFT OUTER JOIN friendship as friendship1 on access_albums_friends.owner_id = friendship1.from_user_id
LEFT OUTER JOIN friendship as friendship2 on access_albums_friends.owner_id = friendship2.to_user_id
where 
(
((friendship1.to_user_id = '" . $pgGetUserAlbums['for_user_id'] . "' and friendship1.status = '1')
or (friendship2.from_user_id = '" . $pgGetUserAlbums['for_user_id'] . "' and friendship2.status = '1'))
and albums.owner_id = '" . $pgGetUserAlbums['user_id'] . "'
)
  or
(
albums.owner_id = '" . $pgGetUserAlbums['user_id'] . "'
and albums.access = 'public'
)
group by albums.owner_id, albums.album_id, users.user_display_name, users.spring;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetSpringListsForFriends($pgGetUserListsForFriends)
    {
        try {
            $result = pg_query($this->pgConn, "
                SELECT *
                FROM signs
                inner JOIN relationships
                ON signs.owner_id = relationships.from_user_id
                inner JOIN users
                ON relationships.from_user_id = users.user_id
                WHERE relationships.to_user_id = '" . $pgGetUserListsForFriends['to_user_id'] . "'
                AND  relationships.from_user_id = '" . $pgGetUserListsForFriends['from_user_id'] . "'
                AND signs.access = 'friends';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }
    public function pgGetSpringActivity($pgGetSpringActivity)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT
(SELECT 
SUM(items_counts.item_count_show) as count_show
from items_counts
JOIN items ON items_counts.count_item_id = items.item_id
WHERE items.owner_id = '" . $pgGetSpringActivity['user_id'] . "'),

(SELECT 
  count(items_stars.item_id) as count_stars
from items_stars
JOIN items ON items_stars.item_id = items.item_id
WHERE items.owner_id = '" . $pgGetSpringActivity['user_id'] . "'),

(SELECT 
  count(users_items_tags_sets.uit_set_id) as tags_conf
from users_items_tags_sets
JOIN items ON users_items_tags_sets.item_id = items.item_id
WHERE items.owner_id = '" . $pgGetSpringActivity['user_id'] . "'
and users_items_tags_sets.user_id <> '" . $pgGetSpringActivity['user_id'] . "'),

(SELECT 
  count(items_likes.item_id) as count_likes
from items_likes
JOIN items ON items_likes.item_id = items.item_id
WHERE items.owner_id = '" . $pgGetSpringActivity['user_id'] . "'),

(select count(*) as posts from posts where post_owner_id = '" . $pgGetSpringActivity['user_id'] . "'),
(select count(*) as videos from items where owner_id = '" . $pgGetSpringActivity['user_id'] . "' and items.type = 'video'),
(select count(*) as images from items where owner_id = '" . $pgGetSpringActivity['user_id'] . "' and items.type = 'image'),
(select count(*) as articles from items where owner_id = '" . $pgGetSpringActivity['user_id'] . "' and items.type = 'article'),
(select count(*) as events from items where owner_id = '" . $pgGetSpringActivity['user_id'] . "' and items.type = 'event'),
(SELECT COUNT(*) as friends
FROM
(

SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.from_user_id = u.user_id
where f.to_user_id = '" . $pgGetSpringActivity['user_id'] . "'
AND f.status = 1

    union all

SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.to_user_id = u.user_id
where f.from_user_id = '" . $pgGetSpringActivity['user_id'] . "'
AND f.status = 1
)x),

(select count(*) as followers from relationships where to_user_id = '" . $pgGetSpringActivity['user_id'] . "'),
(select count(*) as following from relationships where from_user_id = '" . $pgGetSpringActivity['user_id'] . "');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //=return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgGetSpringForMe($pgGetSpringForMe) // TODO: remove
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT
(SELECT 
friendship.status as fr_st_for_me
from friendship
WHERE 
(friendship.from_user_id = '" . $pgGetSpringForMe['user_id'] . "' and friendship.to_user_id = '" . $pgGetSpringForMe['for_user_id'] . "')
or
(friendship.from_user_id = '" . $pgGetSpringForMe['for_user_id'] . "' and friendship.to_user_id = '" . $pgGetSpringForMe['user_id'] . "')),
(SELECT 
relationships.to_user_id as rel_st_for_me
from relationships
WHERE relationships.from_user_id = '" . $pgGetSpringForMe['user_id'] . "' and relationships.to_user_id = '" . $pgGetSpringForMe['for_user_id'] . "');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgGetSpringForMeFrindship($pgGetSpringForMeFrinship)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT *
from friendship
WHERE 
(friendship.from_user_id = '" . $pgGetSpringForMeFrinship['user_id'] . "' and friendship.to_user_id = '" . $pgGetSpringForMeFrinship['for_user_id'] . "')
or
(friendship.from_user_id = '" . $pgGetSpringForMeFrinship['for_user_id'] . "' and friendship.to_user_id = '" . $pgGetSpringForMeFrinship['user_id'] . "');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    /*public function pgGetSpringForMeFrindship($pgGetSpringForMeFrinship)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT
*
FROM friendship
JOIN users on friendship.from_user_id = users.user_id
where 
(friendship.from_user_id = '" . $pgGetSpringForMeFrinship['user_id'] . "' and friendship.to_user_id = '" . $pgGetSpringForMeFrinship['for_user_id'] . "')
or
(friendship.from_user_id = '" . $pgGetSpringForMeFrinship['for_user_id'] . "' and friendship.to_user_id = '" . $pgGetSpringForMeFrinship['user_id'] . "');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }*/
    public function pgGetSpringForMeFollow($pgGetSpringForMeFollow)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
relationships.to_user_id as rel_st_for_me
from relationships
WHERE relationships.from_user_id = '" . $pgGetSpringForMeFollow['from_user_id'] . "' and relationships.to_user_id = '" . $pgGetSpringForMeFollow['to_user_id'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgGetMyNetworkActivity($pgGetMyNetworkActivity)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT
(SELECT COUNT(*) as friends
FROM
(
SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.from_user_id = u.user_id
where f.to_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
AND f.status = 1
    union all
SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.to_user_id = u.user_id
where f.from_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
AND f.status = 1
)x),
(SELECT COUNT(*) as pend_friends
FROM
(
SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.from_user_id = u.user_id
where f.to_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
AND f.status = 0
AND f.action_user_id <> '" . $pgGetMyNetworkActivity['user_id'] . "'
    union all
SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.to_user_id = u.user_id
where f.from_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
AND f.status = 0
AND f.action_user_id <> '" . $pgGetMyNetworkActivity['user_id'] . "'
)x),
(SELECT COUNT(*) req_friends
FROM
(
SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.from_user_id = u.user_id
where f.to_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
AND f.status = 0
AND f.action_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
    union all
SELECT
distinct friendship_id
FROM friendship f
JOIN users u on f.to_user_id = u.user_id
where f.from_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
AND f.status = 0
AND f.action_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'
)x),
(select count(*) as followers from relationships where to_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'),
(select count(*) as following from relationships where from_user_id = '" . $pgGetMyNetworkActivity['user_id'] . "'),
(SELECT 
  count(items_stars.item_id) as count_stars
from items_stars
JOIN items ON items_stars.item_id = items.item_id
WHERE items.owner_id = '" . $pgGetMyNetworkActivity['user_id'] . "');");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetNextVideo($pgGetNextVideo)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
    items.item_id,
    items.type,
    items.title,
    items.cover,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count,
    count(distinct items_reposts.repost_id) as reposts_count,
    items_likes.user_id as its_like
FROM pairs 
--inner JOIN items ON pairs.prev_item_id = items.item_id
inner JOIN items ON pairs.next_item_id = items.item_id
inner JOIN posts ON items.item_id = posts.item_id
inner JOIN users ON items.owner_id = users.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id and items_likes.user_id = '" . $pgGetNextVideo['user_id'] . "'
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE 
--pairs.prev_item_id = '" . $pgGetNextVideo['prev_item_id'] . "'
pairs.prev_item_id = '" . $pgGetNextVideo['next_item_id'] . "'
and items.access = 'public'
group by pairs.pair_count_show, items.owner_id, items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show, items_likes.user_id
ORDER BY pairs.pair_count_show DESC
OFFSET '" . $pgGetNextVideo['offset'] . "'
LIMIT '" . $pgGetNextVideo['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetNextVideoNOA($pgGetNextVideoNOA)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
    items.item_id,
    items.type,
    items.title,
    items.cover,
    items.content,
    items.video_duration,
    items.tags,
    items.access,
    items.ext_links,
    items.src,
    items.created_at,
    users.user_display_name,
    users.user_picture,
    users.spring,
    items_counts.item_count_show,
    count(items_likes.item_id) as likes_count,
    count(distinct items_reposts.repost_id) as reposts_count
FROM pairs 
--inner JOIN items ON pairs.prev_item_id = items.item_id
inner JOIN items ON pairs.next_item_id = items.item_id
inner JOIN posts ON items.item_id = posts.item_id
inner JOIN users ON items.owner_id = users.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_reposts on items.item_id = items_reposts.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE 
--pairs.prev_item_id = '" . $pgGetNextVideoNOA['prev_item_id'] . "'
pairs.prev_item_id = '" . $pgGetNextVideoNOA['next_item_id'] . "'
and items.access = 'public'
group by pairs.pair_count_show, items.owner_id, items.item_id, users.user_display_name, users.user_picture, users.spring, items_counts.item_count_show
ORDER BY pairs.pair_count_show DESC
OFFSET '" . $pgGetNextVideoNOA['offset'] . "'
LIMIT '" . $pgGetNextVideoNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetNextFromUserNOA($pgGetNextFromUserNOA)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.cover_video,
  items.title,
  items.content,
  items.video_duration,
  items.tags,
  items.access,
  items.ext_links,
  items.country as item_country,
  items.city as item_city,
  items.started_at,
  items.stopped_at,
  items.place,
  items.src,
  items.created_at,  
  posts.created_at,
  posts.type as post_type,
  user_item.user_display_name as item_user_display_name,
  user_item.user_picture as item_user_picture,
  user_item.spring as item_spring,
  user_post.user_display_name as post_user_display_name,
  user_post.user_picture as post_user_picture,
  user_post.spring as post_spring,
  items_counts.item_count_show,
  count(distinct items_likes.like_id) as likes_count,  --<----like_id nooo item_id
  count(distinct posts.post_id ) as reposts_count
from posts
inner join items on posts.item_id = items.item_id
inner join users as user_item on items.owner_id = user_item.user_id
inner join users as user_post on posts.post_owner_id = user_post.user_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
WHERE items.access = 'public'
and posts.post_owner_id = '" . $pgGetNextFromUserNOA['user_id'] . "'
and (posts.type <> 'update_user_picture' and posts.type <> 'update_user_cover' and posts.type <> 'user_cover_top')
and items.item_id <> '" . $pgGetNextFromUserNOA['item_id'] . "'
group by items.owner_id, items.item_id, posts.created_at, posts.type, user_item.user_display_name, user_item.user_picture, user_item.spring, user_post.user_display_name, user_post.user_picture, user_post.spring, items_counts.item_count_show
order by posts.created_at desc
LIMIT '" . $pgGetNextFromUserNOA['limit'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //print_r($result);
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    function to_pg_array($set) {
        settype($set, 'array'); // can be called with a scalar or array
        $result = array();
        foreach ($set as $t) {
            if (is_array($t)) {
                $result[] = to_pg_array($t);
            } else {
                //=$t = str_replace('"', '\\"', $t); // escape double quote
                $t = str_replace('"', "'", $t); // escape double quote
                if (! is_numeric($t)) // quote only non-numeric values
                    //=$t = '"' . $t . '"';
                    //$t = '"' . $t . "'";
                $result[] = $t;
            }
        }
        //return '{' . implode(",", $result) . '}'; // format
        return implode(", ", $result); // format
    }

    public function pgGetMyItemsCount($pgGetMyItemsCount)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT count(*)
FROM items
WHERE items.owner_id = '" . $pgGetMyItemsCount['user_id'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetMyItemsCountShow($pgGetMyItemsCountShow)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT SUM(items_counts.item_count_show)
FROM items_counts 
LEFT OUTER join items on items_counts.count_item_id = items.item_id
WHERE items.owner_id = '" . $pgGetMyItemsCountShow['user_id'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetMyItemsCountLikes($pgGetMyItemsCountLikes)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  count(items_likes.item_id) as count_likes
from items_likes
JOIN items ON items_likes.item_id = items.item_id
WHERE items.owner_id = '" . $pgGetMyItemsCountLikes['user_id'] . "';");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetMyPopItems($pgGetMyPopItems)
    {
        try {
            $result = pg_query($this->pgConn, "
select
  items.item_id,
  items.type,
  items.cover,
  items.title,
  items.access,
  items.src,
  items_counts.item_count_show,
  count(items_likes.item_id) as likes_count
from items
LEFT OUTER join items_counts on items.item_id = items_counts.count_item_id
LEFT OUTER join items_likes on items.item_id = items_likes.item_id
where items.owner_id = '" . $pgGetMyPopItems['user_id'] . "'
group by items.item_id, items_counts.item_count_show
order by items_counts.item_count_show desc NULLS LAST
LIMIT '" . $pgGetMyPopItems['limit'] . "';");

        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetUsersWhichItems($pgGetUsersWhichItems)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  items.owner_id,
  users.user_id,
  users.user_display_name,
  COUNT(items.item_id) as items_count
FROM items 
JOIN users ON items.owner_id = users.user_id
where items.type = 'video'
GROUP BY items.owner_id, users.user_id
ORDER BY COUNT(items.item_id) DESC
LIMIT '" . $pgGetUsersWhichItems['limit'] . "';");

        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetUsersWhichItemsForStat($pgGetUsersWhichItemsForStat)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  items.owner_id,
  users.user_id,
  users.user_display_name,
  users.user_email,
  COUNT(items.item_id) as items_count
FROM items 
JOIN users ON items.owner_id = users.user_id
where 
items.type = 'video'
AND
(
date_trunc('day', (users.options->>'stats_my_items_last_at')::date) < NOW() - INTERVAL '30 days'
OR (users.options->'stats_my_items_last_at') IS NULL
)
GROUP BY items.owner_id, users.user_id
ORDER BY COUNT(items.item_id) DESC
LIMIT '" . $pgGetUsersWhichItemsForStat['limit'] . "';");

        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgGetUsersWhichItemsForRatingStat($pgGetUsersWhichItemsForRatingStat)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT *
FROM items 
JOIN users ON items.owner_id = users.user_id
where 
items.type = 'video'
AND
(
date_trunc('day', (users.options->>'stats_my_rating_next_at')::date) < NOW()
OR (users.options->'stats_my_rating_next_at') IS NULL
)
GROUP BY items.owner_id, users.user_id, items.item_id
ORDER BY COUNT(items.item_id) DESC
LIMIT '" . $pgGetUsersWhichItemsForRatingStat['limit'] . "';");

        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgSetOptions($pgSetOptions) // TODO: remove
    {
        //$pg = $this->pgConnect();
        echo "\npgInsertTags pgInsertTags\n";
        print_r($pgSetOptions);
        $query =  "insert into users values ('options', array['test' => 'test']) where user_id = " . $pgSetOptions['user_id'] . ";";
        try {
            echo "\npgInsertTags query\n";
            print_r($query);
            $res = pg_query($this->pgConn, $query);

        } catch (Exception $e) {
            $this->log->setEvent([
                "type" => "error",
                "message" => "pg",
                "val" => "cbFileAdd: ok",
                'event_id' => 'pg_ins_error',
                "file" => $_SERVER["PHP_SELF"],
                "class" => __CLASS__,
                "funct" => __FUNCTION__
            ]);
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        return $res;
    }

    public function pgGetTasksWorked_fileUploadVideo()
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT *
from tasks
where tasks.type = 'fileUploadVideo' and tasks.status = 'worked'
LIMIT 9;");

        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgGetItemsNoPreVTT()
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
*
FROM items
WHERE items.vtt_w120 IS NOT TRUE
and items.type = 'video'
and items.access = 'public'
and items.src IS NOT NULL
ORDER BY items.created_at
LIMIT 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }
    }

    public function pgGetItemRandFromUser($pgGetItemRandFromUser)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
items.item_id 
FROM items 
where 
items.owner_id = '" . $pgGetItemRandFromUser['user_id'] . "'
ORDER BY RANDOM() 
LIMIT 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);        } else {
            //return false;
        }
    }
    public function pgRandItemWithTag()
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
items.item_id 
FROM items 
LEFT OUTER join users_items_tags_sets on items.item_id = users_items_tags_sets.item_id
where 
users_items_tags_sets.tag IS NOT NULL
ORDER BY RANDOM() 
LIMIT 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgRandTagOfItem($pgRandTagOfItem)
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT 
users_items_tags_sets.tag
FROM users_items_tags_sets 
where 
users_items_tags_sets.item_id = '" . $pgRandTagOfItem['item_id'] . "'
ORDER BY RANDOM() 
LIMIT 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }

    public function pgElaGetItemsNoTags()
    {
        //echo "pgGetMyInbox \n\r";
        //print_r($pgGetMyInbox);
        try {
            $result = pg_query($this->pgConn, "
SELECT
*
FROM items
LEFT OUTER join el_items_tags on items.item_id = el_items_tags.el_it_id
WHERE el_items_tags.el_it_id IS NULL
and items.access = 'public'
and items.tags::text <> '{}'::text
and items.tags::text <> 'null'::text
ORDER BY items.created_at
LIMIT 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            //return pg_fetch_all($result);
            return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
        } else {
            return false;
        }
    }
    public function pgConsoleGetAllTasks($pgConsoleGetAllTasks)
    {
        try {
            $result = pg_query($this->pgConn, "
SELECT 
  tasks.task_id,
  tasks.parent_id,
  tasks.created_at,
  tasks.task_type,
  tasks.task_status,
  tasks.task_item_id,
  tasks.title,
  tasks.file_type,
  tasks.attempt,
  tasks.percentage,
  tasks.uploaded,
  tasks.converted,
  users.user_display_name,
  --users.user_cover,
  users.spring
from tasks
LEFT OUTER JOIN users on tasks.owner_id = users.user_id
order by tasks.created_at desc 
LIMIT " . $pgConsoleGetAllTasks['limit'] . ";");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
        } else {
            return false;
        }

    }

    public function pgGeo2SetState($pgGeo2SetState)
    {
        $query =  "
INSERT INTO geoip2_state (state_id, iso_code, names)
VALUES
(
'" . $pgGeo2SetState['state_id'] . "',
'" . $pgGeo2SetState['iso_code'] . "',
'" . $pgGeo2SetState['names'] . "'
)
ON CONFLICT DO NOTHING;";
        try {
            //echo "\npgGeo2SetState query\n";
            //print_r($query);
            $res = pg_query($this->pgConn, $query);

        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
    }
    public function pgGetItemForTM_OLD($days)
    {
        echo "\n\rpgGetItemForTM_OLD days\n\r";
        print_r($days);
        try {
            $result = pg_query($this->pgConn, "
select items.item_id,
       items.title,
       items.created_at,
       et.period_now
from items
         left join el_trendmaker et on items.item_id = et.item_id
where et.period_now is null
  and et.latest_at is null
  and items.created_at < CURRENT_TIMESTAMP - INTERVAL '" . $days . " days'
  and items.type = 'video'
order by items.created_at
limit 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
            //return false;
        } else {
            echo "\n\rpgGetItemForTM_OLD res empty\n\r";
            return false;
        }
    }
    public function pgGetItemForTM_NEW($days)
    {
        echo "\n\rpgGetItemForTM_NEW days\n\r";
        print_r($days);
        try {
            $result = pg_query($this->pgConn, "
select items.item_id,
       items.title,
       items.created_at,
       et.period_now,
       et.latest_at
from items
         left outer join el_trendmaker et on items.item_id = et.item_id
where (items.created_at > CURRENT_TIMESTAMP - INTERVAL '" . $days . " days'
    and et.latest_at < CURRENT_TIMESTAMP - INTERVAL '1 days'
    and et.period_now <> 'stay'
    and items.type = 'video')
   or (
        (items.created_at > CURRENT_TIMESTAMP - INTERVAL '" . $days . " days'
            and (et.latest_at is null
                or et.latest_at < CURRENT_TIMESTAMP - INTERVAL '1 days'
                     and et.period_now <> 'stay')
            and items.type = 'video'
            )
        or (items.created_at > CURRENT_TIMESTAMP - INTERVAL '" . $days . " days'
        and et.period_now = 'awaiting'
        and et.latest_at < CURRENT_TIMESTAMP - INTERVAL '1 days'
        and et.period_now <> 'stay')
    )
order by items.created_at desc
limit 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
            //return false;
        } else {
            echo "\n\rpgGetItemForTM_OLD res empty\n\r";
            return false;
        }
    }
    public function pgGetItemRandom()
    {
        echo "\n\rpgGetItemRandom\n\r";
        //print_r($days);
        try {
            $result = pg_query($this->pgConn, "
select items.item_id,
       items.title,
       items.created_at
from items
where items.type = 'video'
  and items.access = 'public'
ORDER BY RANDOM() 
limit 1;");
        } catch (Exception $e) {
            echo 'Pg. ' . $e;
            return false;
            //echo "No file. ";
        }
        //pg_close($this->pgConn);
        if ($result) {
            return pg_fetch_all($result);
            //return pg_fetch_assoc($result);
            //return pg_fetch_row($result);
            //return pg_fetch_result($result, 0);
            //return false;
        } else {
            echo "\n\rpgGetItemForTM_OLD res empty\n\r";
            return false;
        }
    }
}