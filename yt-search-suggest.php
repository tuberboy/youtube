<?php
/*
 * Youtube search suggest queries
 */
function yt_suggests($key) {
    $ch = curl_init('https://suggestqueries.google.com/complete/search?ds=yt&oe=UTF-8&xssi=t&client=youtube-android-pb&hl=en&gl=us&hjson=t&cp=8&ytbolding=1&q='.str_replace(" ", "+", $key));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_COOKIEJAR, '');
    curl_setopt($ch, CURLOPT_COOKIEFILE, '');
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $response = curl_exec($ch);
    if ($response === false) {
        return 'Error: ' . curl_error($ch);
    }
    curl_close($ch);
	return $response;
}

$ytks = "tuber boy";
echo yt_suggests($ytks);
?>
