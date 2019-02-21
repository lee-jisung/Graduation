<?header("content-type:text/html; charset=UTF-8"); ob_start();
include './db_connect.php';
$connect = db_conn();

$user_id=$_POST[user_id];
$pws=$_POST[pw];

$pw = md5($pws);

$query= "select * from member where user_id='$user_id'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$member = mysqli_fetch_array($result);

if(!$user_id){
	error("아이디를 입력해주세요.");
}elseif(!$member[user_id]){
	error("존재하지 않는 아이디 입니다.");
}

if(!$pw){
	error("비밀번호를 입력해 주세요.");
}elseif($pw != $member[pw]){
	error("비밀번호가 틀렸습니다.");
}

if($member[user_id] and $member[pw]==$pw){
	$tmp = $member[user_id]."//".$member[pw];
	setcookie("COOKIES", $tmp, time()+60*60*24, "/"); // 24시간동안 세션 유지
}
?>

<script>
location.href='./index.php';
</script>
