<?php

/**
 * Description of Utility
 *
 * @author syed asfaquz Zaman
 */
class Utility
{
    /**
     * Google Api Key Value
     */
    const GOOGLE_API_KEY = 'AIzaSyBwMlVi54Fl0i7XuwoC0oByaCFOEaD7Mj8';

    /**
     * YOUTUBE API
     *
     * URL: https://www.googleapis.com/youtube/v3/videos?id=7lCDEYXw3mM&key=YOUR_API_KEY
      &fields=items(id,snippet(channelId,title,categoryId),statistics)&part=snippet,statistics
     *
     */
    const YOUTUBE_API_URL = 'https://www.googleapis.com/youtube/v3/videos';

    /**
     * Function : Fetch YouTube Video Information
     * @param String $videoUrl
     */
    public static function fetchYouTubeVideoDetails($videoUrl = '')
    {
        $reponse = [];
        if (self::url_exists($videoUrl)) {
            $videoId       = self::getYouTubeIdFromURL($videoUrl);
            $youtubeApiUrl = self::generateYouTubeApiUrl($videoId);
            $curl          = curl_init($youtubeApiUrl);
            $userAgent     = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
            curl_setopt($curl, CURLOPT_URL, $youtubeApiUrl);
            curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
            curl_setopt($curl, CURLOPT_TIMEOUT, 100);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 100);
            curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
            curl_setopt($curl, CURLOPT_AUTOREFERER, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            try {
                $result  = curl_exec($curl);
                $reponse = ['error' => false, 'result' => $result, 'message' => 'Ok'];
            } catch (Exception $e) {
                $reponse = ['error' => true, 'message' => $e->getMessage()];
            }
        } else {
            $reponse = ['error' => true, 'message' => 'Invalid Youtube Url'];
        }
        return json_encode($reponse);
    }

    /**
     *
     * @param String $url
     * @return boolean
     */
    public static function url_exists($url)
    {
        $exists       = false;
        $file_headers = @get_headers($url);
        if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
        } else {
            $exists = true;
        }
        return $exists;
    }

    /**
     *
     * @param String $url
     * @return String youtube videoId / false
     */
    public static function getYouTubeIdFromURL($url)
    {
        $args       = [];
        $url_string = parse_url($url, PHP_URL_QUERY);
        parse_str($url_string, $args);
        return isset($args['v']) ? $args['v'] : false;
    }

    /**
     *
     * @param String $videoId
     * @return string $youtubeApiUrl
     */
    public static function generateYouTubeApiUrl($videoId)
    {
        $youtubeApiUrl = '';
        if (isset($videoId)) {
            $youtubeApiUrl = self::YOUTUBE_API_URL;
            $youtubeApiUrl.="?id=$videoId";
            $youtubeApiUrl.="&key=".self::GOOGLE_API_KEY;
            // $youtubeApiUrl.="&fields=items(id,snippet(channelId,title,categoryId),statistics)";
            $youtubeApiUrl.="&part=snippet,statistics";
        }

        return $youtubeApiUrl;
    }

    /**
     *
     * @param Array $thumbnailArray
     * @param String $size
     * @return String url
     */
    public static function getThumbnails($thumbnailArray, $size = 'default')
    {
        $thumbImage              = '';
        $availableThumbnailsSize = ['default', 'medium', 'high'];
        if (in_array($size, $availableThumbnailsSize)) {
            return $thumbImage = $thumbnailArray[$size]['url'];
        }
        return $thumbImage;
    }
}