<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>ShareBZ</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form name='form' class="form-login" action="newAccount_post.php" method=post>
        <h2 class="form-login-heading">JOIN</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name=name placeholder="Name" autofocus>
          <br>
          <input type="text" class="form-control" name=email placeholder="E-mail" autofocus>
          <br>
          <input type="text" class="form-control" name=birth placeholder="Birth ex)20060123" autofocus>
          <br>
          <input type="text" class="form-control" name=user_id placeholder="ID" autofocus>
          <br>
          <input type="password" class="form-control" name=pw placeholder="Password">
          <br>
          <input type="password" class="form-control" name=pw_ck placeholder="Check Password">
          <br>
          <input type="text" class="form-control" id=etherAddr name=etherAddr placeholder="Ethereum Address: 0x....">
          <br>
          <div class="col-lg-4">
          <input class="col-lg-4" type="radio" name=user_type value="Guest" id='guest'> <p>Guest</p> 
          </div> 
          <div class="col-lg-4">
          <input class="col-lg-4" type="radio" name=user_type value="Host" id='host'> <p>Host</p>
          </div>
          <div class="col-lg-12">
          <hr>
          <h5>Check Platform & Type Your Platform ID</h5>
          <p><input type="checkbox" id="ckairbnb" value="">Airbnb &nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" id="airbnb" name="airbnbID" placeholder="ID" value="" disabled></p><br>
          <p><input type="checkbox" id="ckuber" value="">Uber&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" id="uber" name="uberID" placeholder="ID" value="" disabled></p><br>
          <p><input type="checkbox" id="ckwework" value="">WeWork&nbsp;&nbsp;&nbsp;
                 <input type="text" id="wework" name="weworkID" placeholder="ID" value="" disabled></p>
          </div>
          <button id="complete" class="btn btn-theme btn-block"  type="submit"><i class="fa fa-lock"></i>Complete</button> <!-- href에 index.html 파일 들어가있어서 무조건 메인으로 감 -->
          <hr>
          <div class="login-social-link centered">
            <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>
          <div class="registration">이미 계정이 있다면?<br/>
            <a class="login-wrap" href="login.php">Login</a>
          </div>
        </div>
      
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
  <script type='text/javascript' src='./sharebzAbi.js'></script> <!-- ABI include -->
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });

    if (typeof web3 !== 'undefined') {
	    web3 = new Web3(web3.currentProvider);
	  } else {
	    web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
	  };

	  var shareBZContract = web3.eth.contract(shareBZABI);

	  var shareBZ = shareBZContract.at('0xc5bd7b208f4c1f0c1c7bd75671c9d946ae2b8298');

	  $(document).ready(function(){

		  $("#ckairbnb").click(function(){
		        if($("#ckairbnb").is(":checked")){
		            $("#airbnb").attr('disabled', false);
		        }
		        else {
		            $("#airbnb").attr('disabled', true);
		            $("#airbnb").val(""); // check 해제하면 값 초기화
		            }
		        });
		    
		    $("#ckuber").click(function(){
		        if($("#ckuber").is(":checked")){
		            $("#uber").attr('disabled', false);
		        }
		        else {
		            $("#uber").attr('disabled', true);
		            $("#uber").val(""); // check 해제하면 값 초기화
		            }
		        });
		    
		    $("#ckwework").click(function(){
		        if($("#ckwework").is(":checked")){
		            $("#wework").attr('disabled', false);
		        }
		        else {
		            $("#wework").attr('disabled', true);
		            $("#wework").val(""); // check 해제하면 값 초기화
		            }
		        });	
				  
	  });

    
        
  </script>
</body>

</html>