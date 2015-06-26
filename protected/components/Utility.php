<?php

/**
 * Description of Utility
 *
 * @author syed asfaquz Zaman
 */
class Utility
{

    /**
     * Function : Fetch YouTube Video Information
     * @param String $videoUrl
     */
    public static function fetchYouTubeVideoDetails($videoUrl = '')
    {
        $reponse = [];
        if (self::url_exists($videoUrl)) {
            $videoUrl = "https://www.youtube.com/watch?v=YwfilXu5N8U";
            $youtube  = "http://www.youtube.com/oembed?url=".$videoUrl."&format=json";
            $curl     = curl_init($youtube);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result   = curl_exec($curl);
            curl_close($curl);
            $reponse  = ['error' => false, 'result' => $result,'videoId'=>self::getYouTubeIdFromURL($videoUrl)];
        } else {
            $reponse = ['error' => true];
        }
        return json_encode($reponse);
    }

    public static function url_exists($url)
    {
        if (!$fp = curl_init($url)) return false;
        return true;
    }

    public static function getYouTubeIdFromURL($url)
    {
        $url_string = parse_url($url, PHP_URL_QUERY);
        parse_str($url_string, $args);
        return isset($args['v']) ? $args['v'] : false;
    }
}