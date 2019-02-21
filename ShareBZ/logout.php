<?header("content-type:text/html; charset=UTF-8"); ob_start;

setcookie("COOKIES", "", 0, "/"); //delete cookie data
?>

<script>
//window.alert("logout!");
location.href='./index.php';
</script>