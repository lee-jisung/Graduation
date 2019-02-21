<?header("content-type:text/html; charset=UTF-8"); ob_start();
include './db_connect.php';
$connect = db_conn();

$name=$_POST[name];
$email=$_POST[email];
$birth=$_POST[birth];
$user_id=$_POST[user_id];
$pws=$_POST[pw];
$pw_ck = $_POST[pw_ck];
$user_type = $_POST[user_type];
$level = 0;
$etherAddr = $_POST[etherAddr];

$airbnbID = $_POST[airbnbID];
$uberID = $_POST[uberID];
$weworkID = $_POST[weworkID];


if(!$name)error("이름을 입력해주세요!");
if(strlen($name)<1 or strlen($name)>15)error("이름은 1~5자까지만 가능합니다"); //한글 - 1글자당 3byte

if(!$email)error("E-mail을 입력해주세요");
$check_email = filter_var($email, FILTER_VALIDATE_EMAIL);
if(!$check_email){
	error("이메일 입력이 잘못됐습니다.");
}
if(!$birth)error("생일을 입력해주세요 ");

$query= "select * from member where user_id='$user_id'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$member = mysqli_fetch_array($result);

if(!$user_id){error("아이디를 입력해주세요!");} 
elseif($member[user_id]){
	error("이미 존재하는 아이디 입니다.");
}

if(substr($user_id,"15"))error("아이디는 15자 이하로 가능합니다");
if(preg_match("/[^a-z0-9-_]/i", $user_id))error("아이디는 영문,숫자,-,_만 가능합니다");

if(!$pws)error("비밀번호를 입력해주세요!");
if($pws != $pw_ck)error("비밀번호가 일치하지 않습니다!");

if(!$etherAddr)error("Ethereum 계좌 주소를 입력해주세요");

if(!$user_type)error("Guest / Host 선택해주세요");

if(!$airbnbID && !$uberID && !$weworkID){
	echo "<script> alert('Paltform ID는 추후 My Page에서 등록하실 수 있습니다.') </script>";
}

// guest=1 / host=2 / admin=0
if(!strcmp($user_type, "Guest")){
	$level = 1;
}else{ 
	$level = 2;
}

$pw = md5($pws); //encrypt password

$regdate=date("YmdHis", time());
$ip=getenv("REMOTE_ADDR");

$query="insert into member(user_id, name, birth, user_type, email, pw, regdate, ip, level, etherAddr, airbnbID, uberID, weworkID)
values('$user_id', '$name', '$birth', '$user_type', '$email', '$pw', '$regdate', '$ip', '$level', '$etherAddr', '$airbnbID', '$uberID', '$weworkID')";
mysqli_query($connect, "set names utf8");
mysqli_query($connect, $query);
mysqli_close($connect);

// 회원 가입 후 바로 login이 되도록 만듦
$tmp = $user_id."//".$pw;
setcookie("COOKIES", $tmp, time()+60*60*24, "/");
?>
<script type='text/javascript' src='./sharebzAbi.js'></script>
<script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script>
//window.alert("Sucess join");
location.href='./registerEther.php';
</script>


