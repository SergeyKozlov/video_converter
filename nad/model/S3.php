<?php
/**
 * Created by IntelliJ IDEA.
 * User: Сергей
 * Date: 14.10.2017
 * Time: 14:01
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/sendmail/sendmail.php');

//define ("AWS_KEY", "AKIAIEHORDEO6SWNPRTQ");
//define ("AWS_SECRET", "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");
use Aws\S3\S3Client;

class S3
{
    //private $bucket_video_vide_me = 'video.rate-my.life';
    private $bucket_video_vide_me = 'video.videcdn.net';
    //private $bucket_img_vide_me = 'img.rate-my.life';
    private $bucket_img_vide_me = 'img.videcdn.net';
    //private $bucket_pre_image_w320_vide_me = 'pre-image-w320.rate-my.life';
    private $bucket_pre_image_w320_vide_me = 'pre-image-w320.videcdn.net';
    //private $bucket_pre_video_w320_vide_me = 'pre-video-w320.rate-my.life';
    private $bucket_pre_video_w320_vide_me = 'pre-video-w320.videcdn.net';
    //private $bucket_sprite_w120_vide_me = 'sprite-w120.rate-my.life';
    private $bucket_sprite_w120_vide_me = 'sprite-w120.videcdn.net';
    //private $bucket_static_vide_me = 'https://static.rate-my.life/';


    public function __construct()
    {
        //echo "\n s3 cons \n";
        $this->s3 = new Aws\S3\S3Client([
            /*'profile' => 'default',*/
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => $this->access_key,
                'secret' => $this->access_secret,
            ]
        ]);

        // Instantiate the S3 client with your AWS credentials
        /*$this->s3 = S3Client::factory(array(
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => array(
                'key'    => 'AKIAIEHORDEO6SWNPRTQ',
                'secret' => '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',
            )
        ));*/
        $this->welcome = new NAD();

    }

    /**
     * @param string $bucket_video_vide_me
     */
    public function setBucketVideoVideMe(string $bucket_video_vide_me): void
    {
        $this->bucket_video_vide_me = $bucket_video_vide_me;
    }

    /**
     * @param string $bucket_img_vide_me
     */
    public function setBucketImgVideMe(string $bucket_img_vide_me): void
    {
        $this->bucket_img_vide_me = $bucket_img_vide_me;
    }

    /**
     * @param string $bucket_pre_image_w320_vide_me
     */
    public function setBucketPreImageW320VideMe(string $bucket_pre_image_w320_vide_me): void
    {
        $this->bucket_pre_image_w320_vide_me = $bucket_pre_image_w320_vide_me;
    }

    /**
     * @param string $bucket_pre_video_w320_vide_me
     */
    public function setBucketPreVideoW320VideMe(string $bucket_pre_video_w320_vide_me): void
    {
        $this->bucket_pre_video_w320_vide_me = $bucket_pre_video_w320_vide_me;
    }

    /**
     * @param string $bucket_sprite_w120_vide_me
     */
    public function setBucketSpriteW120VideMe(string $bucket_sprite_w120_vide_me): void
    {
        $this->bucket_sprite_w120_vide_me = $bucket_sprite_w120_vide_me;
    }

    /**
     * @return string
     */
    public function getBucketVideoVideMe(): string
    {
        return $this->bucket_video_vide_me;
    }

    /**
     * @return string
     */
    public function getBucketImgVideMe(): string
    {
        return $this->bucket_img_vide_me;
    }

    /**
     * @return string
     */
    public function getBucketPreImageW320VideMe(): string
    {
        return $this->bucket_pre_image_w320_vide_me;
    }

    /**
     * @return string
     */
    public function getBucketPreVideoW320VideMe(): string
    {
        return $this->bucket_pre_video_w320_vide_me;
    }

    /**
     * @return string
     */
    public function getBucketSpriteW120VideMe(): string
    {
        return $this->bucket_sprite_w120_vide_me;
    }

    /**
     * @param string $access_key
     */
    public function setAccessKey(string $access_key): void
    {
        $this->access_key = $access_key;
    }

    /**
     * @param string $access_secret
     */
    public function setAccessSecret(string $access_secret): void
    {
        $this->access_secret = $access_secret;
    }


    public function uploadVideo($uploadVideo) // TODO: Remove ?
    {
        //$bucket = 'video.vide.me';
        $result = $this->s3->putObject([
            'Bucket'       => $this->bucket_video_vide_me,
            'Key'          => $uploadVideo['name'] . '.mp4',
            'SourceFile'   => $uploadVideo['file'] . '.mp4',
            'ContentType'  => 'video/mp4',
            'ACL'          => 'public-read',
            //'StorageClass' => 'REDUCED_REDUNDANCY',
            'Metadata'     => [
                'param1' => 'Source',
                'param2' => 'www.vide.me'
            ]]);
        return $result['ObjectURL'];
    }
    public function uploadFile($uploadFile)
    {
        $fileInfo = pathinfo($uploadFile['name']);
        //echo "\n\rS3 uploadFile \n\r";
        //print_r($fileInfo);
        $ContentType = '';
        if ($fileInfo['extension'] == 'ts') $ContentType = 'video/mp4';
        //if ($fileInfo['extension'] == 'jpg') $ContentType = 'image/jpeg';
        if ($fileInfo['extension'] == 'm3u8') $ContentType = 'application/x-mpegURL';
        if ($fileInfo['extension'] == 'webm') $ContentType = 'video/webm';
        if ($fileInfo['extension'] == 'mp4') $ContentType = 'video/mp4';
        //$bucket = 'video.vide.me';
        try {
            $result = $this->s3->putObject([
                'Bucket'       => $this->bucket_video_vide_me,
                'Key'          => $uploadFile['name'],
                'SourceFile'   => $uploadFile['file'],
                'ContentType'  => $ContentType,
                'ACL'          => 'public-read',
                //'StorageClass' => 'REDUCED_REDUNDANCY',
                'Metadata'     => [
                    'param1' => 'Source',
                    'param2' => 'www.vide.me'
                ]]);
        } catch (Exception $e) {
            echo "\n\ruploadFile this->s3->putObject: " . $e . "\n\r";
            $sendmail = new sendmail();
            $sendmail->SendStaffAlert(['message' => "\n\ruploadFile this->s3->putObject: " .$e]);
            exit;
            //return false;
        }
        return $result['ObjectURL'];
    }
    public function uploadFile_pre_video($uploadFile_pre_video)
    {
        //$fileInfo = pathinfo($uploadFile_pre_video['name']);
        //echo "\n\rS3 uploadFile \n\r";
        //print_r($fileInfo);
        $ContentType = '';
        /*if ($fileInfo['extension'] == 'ts') $ContentType = 'video/mp4';
        //if ($fileInfo['extension'] == 'jpg') $ContentType = 'image/jpeg';
        if ($fileInfo['extension'] == 'm3u8') $ContentType = 'application/x-mpegURL';
        if ($fileInfo['extension'] == 'webm') $ContentType = 'video/webm';
        if ($fileInfo['extension'] == 'mp4') $ContentType = 'video/mp4';
        $bucket = 'pre-video-w320';*/
        try {
            $result = $this->s3->putObject([
                'Bucket'       => $this->bucket_pre_video_w320_vide_me,
                'Key'          => $uploadFile_pre_video['name'],
                'SourceFile'   => $uploadFile_pre_video['file'],
                'ContentType'  => 'video/mp4',
                'ACL'          => 'public-read',
                //'StorageClass' => 'REDUCED_REDUNDANCY',
                'Metadata'     => [
                    'param1' => 'Source',
                    'param2' => 'www.vide.me'
                ]]);
        } catch (Exception $e) {
            echo "\n\ruploadFile_pre_video this->s3->putObject: " . $e . "\n\r";
            $sendmail = new sendmail();
            $sendmail->SendStaffAlert(['message' => "\n\ruploadFile_pre_video this->s3->putObject: " .$e]);
            exit;
            //return false;
        }
        return $result['ObjectURL'];
    }
    public function uploadFile_pre_image($uploadFile_pre_image)
    {
        //$fileInfo = pathinfo($uploadFile_pre_image['name']);
        //echo "\n\rS3 uploadFile \n\r";
        //print_r($fileInfo);
        $ContentType = '';
        /*if ($fileInfo['extension'] == 'ts') $ContentType = 'video/mp4';
        //if ($fileInfo['extension'] == 'jpg') $ContentType = 'image/jpeg';
        if ($fileInfo['extension'] == 'm3u8') $ContentType = 'application/x-mpegURL';
        if ($fileInfo['extension'] == 'webm') $ContentType = 'video/webm';
        if ($fileInfo['extension'] == 'mp4') $ContentType = 'video/mp4';
        $bucket = 'pre-video-w320';*/
        try {
            $result = $this->s3->putObject([
                'Bucket'       => $this->bucket_pre_image_w320_vide_me,
                'Key'          => $uploadFile_pre_image['name'],
                'SourceFile'   => $uploadFile_pre_image['file'],
                'ContentType'  => 'image/jpeg',
                'ACL'          => 'public-read',
                //'StorageClass' => 'REDUCED_REDUNDANCY',
                'Metadata'     => [
                    'param1' => 'Source',
                    'param2' => 'www.vide.me'
                ]]);
        } catch (Exception $e) {
            echo "\n\ruploadFile_pre_image this->s3->putObject: " . $e . "\n\r";
            $sendmail = new sendmail();
            $sendmail->SendStaffAlert(['message' => "\n\ruploadFile_pre_image this->s3->putObject: " .$e]);
            exit;
            //return false;
        }
        return $result['ObjectURL'];
    }
    public function uploadFile_thumb_sprite($uploadFile_thumb_sprite)
    {
        //$fileInfo = pathinfo($uploadFile_pre_image['name']);
        //echo "\n\rS3 uploadFile \n\r";
        //print_r($fileInfo);
        $ContentType = '';
        /*if ($fileInfo['extension'] == 'ts') $ContentType = 'video/mp4';
        //if ($fileInfo['extension'] == 'jpg') $ContentType = 'image/jpeg';
        if ($fileInfo['extension'] == 'm3u8') $ContentType = 'application/x-mpegURL';
        if ($fileInfo['extension'] == 'webm') $ContentType = 'video/webm';
        if ($fileInfo['extension'] == 'mp4') $ContentType = 'video/mp4';
        $bucket = 'pre-video-w320';*/
        try {
            $result = $this->s3->putObject([
                'Bucket'       => $this->bucket_sprite_w120_vide_me,
                'Key'          => $uploadFile_thumb_sprite['name'],
                'SourceFile'   => $uploadFile_thumb_sprite['file'],
                'ContentType'  => 'image/jpeg',
                'ACL'          => 'public-read',
                //'StorageClass' => 'REDUCED_REDUNDANCY',
                'Metadata'     => [
                    'param1' => 'Source',
                    'param2' => 'www.vide.me'
                ]]);
        } catch (Exception $e) {
            echo "\n\ruploadFile_thumb_sprite this->s3->putObject: " . $e . "\n\r";
            $sendmail = new sendmail();
            $sendmail->SendStaffAlert(['message' => "\n\ruploadFile_thumb_sprite this->s3->putObject: " .$e]);
            exit;
            //return false;
        }
        return $result['ObjectURL'];
    }
    public function uploadFile_vtt($uploadFile_vtt)
    {
        //$fileInfo = pathinfo($uploadFile_pre_image['name']);
        //echo "\n\rS3 uploadFile \n\r";
        //print_r($fileInfo);
        $ContentType = '';
        /*if ($fileInfo['extension'] == 'ts') $ContentType = 'video/mp4';
        //if ($fileInfo['extension'] == 'jpg') $ContentType = 'image/jpeg';
        if ($fileInfo['extension'] == 'm3u8') $ContentType = 'application/x-mpegURL';
        if ($fileInfo['extension'] == 'webm') $ContentType = 'video/webm';
        if ($fileInfo['extension'] == 'mp4') $ContentType = 'video/mp4';
        $bucket = 'pre-video-w320';*/
        try {
            $result = $this->s3->putObject([
                //'Bucket'       => 'vtt-w120.vide.me',
                'Bucket'       => $this->bucket_sprite_w120_vide_me,
                'Key'          => $uploadFile_vtt['name'],
                'SourceFile'   => $uploadFile_vtt['file'],
                'ContentType'  => 'text/vtt',
                'ACL'          => 'public-read',
                //'StorageClass' => 'REDUCED_REDUNDANCY',
                'Metadata'     => [
                    'param1' => 'Source',
                    'param2' => 'www.vide.me'
                ]]);
        } catch (Exception $e) {
            echo "\n\ruploadFile_thumb_sprite this->s3->putObject: " . $e . "\n\r";
            $sendmail = new sendmail();
            $sendmail->SendStaffAlert(['message' => "\n\ruploadFile_vtt this->s3->putObject: " .$e]);
            exit;
            //return false;
        }
        return $result['ObjectURL'];
    }
    public function uploadImage($uploadImage)
    {   // https://www.w3.org/Graphics/JPEG/
        //echo "\n\rs3 uploadImage uploadImage:\n\r";
        //print_r($uploadImage);
        //$bucket = 'img.vide.me';
        $result = $this->s3->putObject([
            'Bucket'       => $this->bucket_img_vide_me,
            'Key'          => $uploadImage['file'],
            'SourceFile'   => $this->welcome->nadtemp . $uploadImage['file'],
            'ContentType'  => 'image/jpeg',
            'ACL'          => 'public-read',
            //'StorageClass' => 'REDUCED_REDUNDANCY',
            'Metadata'     => [
                'param1' => 'Source',
                'param2' => 'www.vide.me'
            ]]);
        return $result['ObjectURL'];
    }
    public function uploadUserPicture($uploadUserPicture) // TODO: remove
    {   // https://www.w3.org/Graphics/JPEG/

        //echo "\n\rs3 uploadImage uploadImage:\n\r";
        //print_r($uploadImage);

        $bucket = 'users.vide.me';
        $result = $this->s3->putObject([
            'Bucket'       => $bucket,
            'Key'          => $uploadUserPicture['name'],
            'SourceFile'   => $uploadUserPicture['file'],
            'ContentType'  => 'image/jpeg',
            'ACL'          => 'public-read',
            //'StorageClass' => 'REDUCED_REDUNDANCY',
            'Metadata'     => [
                'param1' => 'Source',
                'param2' => 'www.vide.me'
            ]]);
        return $result['ObjectURL'];
    }

    public function downloadVideo($file)
    {
        //$result = $client->getObject(array(
        $result = $this->s3->getObject(array(
            'Bucket' => $this->bucket_video_vide_me,
            'Key'    => $file,
            'SaveAs' => $this->welcome->nadtemp . $file
        ));

        // Contains an EntityBody that wraps a file resource of /tmp/data.txt
        //echo $result['Body']->getUri() . "\n";
        // > /tmp/data.txt
    }
}