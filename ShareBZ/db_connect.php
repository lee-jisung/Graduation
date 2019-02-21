<?php

function db_conn(){
	$host_name = "localhost"; //host name
	//$host_name="211.178.141.211";
	$db_user_id = "root"; // db user id
	$db_name ="graduation"; // db name
	$db_pw="apmsetup";  // db password
	$connect = mysqli_connect($host_name, $db_user_id, $db_pw);
	mysqli_query($connect, "set names utf-8");
	mysqli_select_db($connect, $db_name);
	//echo "success db connect";
	if(!$connect)die("fail connection".mysqli_error($connect));
	return $connect;
}

/// no, user_id, pw, name, nick_name, birth, gender, tel, email, 
//  addr_1, addr_2, regdate, ip, level


//print error message
function error($msg){
	echo "
	<script>
	alert('$msg');
	history.back();
	</script> ";
	exit;
}

function member(){
	global $connect;
	$temps=$_COOKIE["COOKIES"];
	$cookies = explode("//", $temps); // explode("구분 기준문자", "처리내용");
	// id = $cookies[0]
	// pw = $cookies[1]
	
	///////회원정보////////
	$query = "select * from member where user_id='$cookies[0]'";
	mysqli_query($connect, "set names utf8");
	$result = mysqli_query($connect, $query);
	$member = mysqli_fetch_array($result);
	return $member;
}

?>
