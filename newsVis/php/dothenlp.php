<?php
	// $type=$_GET["type"];
	// $cardid=$_GET["cardid"];
	// $optfile=$_GET["optfile"];
	$str=file_get_contents("php://input");
	send_post("http://tl-generator.herokuapp.com/dothenlp",$str);
	// echo file_get_contents("http://tl-generator.herokuapp.com/dothenlp");
	
function send_post($url, $post_data) {
    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

?>