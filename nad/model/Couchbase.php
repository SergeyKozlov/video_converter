<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 02.10.17
 * Time: 9:02
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');

class Couchbase
{
    public function __construct()
    {
        $this->welcome = new NAD();

        $this->fileActivity = "fileActivity";
        $this->user = "user";
        $this->file = "file";
        $this->contactDirectory = "contactDirectory";
        $this->deletedFile = "deletedFile";
        $this->deletedFileActivity = "deletedFileActivity";
        $this->fileShow = "fileShow";
        $this->fileCountShow = "fileCountShow";
        $this->fileCouple = "fileCouple";
        $this->list = "list"; // multi
        $this->article = "article";
        $this->articleDraft = "articleDraft";
        $this->articleMostPopTags = "articleMostPopTags";

        $this->docType = [
            $this->fileActivity,
            $this->user,
            $this->file,
            $this->fileShow,
            $this->contactDirectory,
            $this->deletedFile,
            $this->deletedFileActivity,
            $this->fileCountShow,
            $this->fileCouple,
            $this->list,
            $this->article,
            $this->articleDraft,
            $this->articleMostPopTags
        ];
    }

    public function cbShowBucketUserTotal($cbShowBucketUserTotal)
    {
        $bucket = $this->welcome->autoConnectToBucket(["bucket" => "user"]);
        $query = CouchbaseViewQuery::from("user", 'createdAt')->skip($cbShowBucketUserTotal["skip"])->stale(CouchbaseViewQuery::UPDATE_BEFORE);
        try {
            //return $bucket->query($query);
            $res = $bucket->query($query);
            //print_r($res);
            return $res->total_rows;
        } catch (Exception $e) {
            return false;
        }
    }

}