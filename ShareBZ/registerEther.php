<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>ShareBZ</title>
  <script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>

<?php
// login session 유지 
include ("./db_connect.php");
$connect = db_conn();
$member = member();
?>

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
      <div class="form-login" >
        <h2 class="form-login-heading">Check Information</h2>
        <div class="login-wrap">
          <h4>ID</h4>
          <input type="text" class="form-control" name=user_id value="<?=$member[user_id]?>" disabled>
          <h4>Name</h4>
          <input type="text" class="form-control" name=name value="<?=$member[name]?>" disabled>
          <hr>
          <h4>Ethereum Acccount Address</h4>
          <input type="text" class="form-control" id="etherAddr" name="etherAddr" value="<?=$member[etherAddr]?>" disabled>
          <hr>
          <p id="blockNumber"></p>
          <!-- 여기에 이용한 platform과 id를 받아야 함  / 받아서 연동했다고  치자 -->
          <h5>Check Platform & Your Platform ID</h5>
          <label>Airbnb ID</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" id="airbnb" placeholder="Empty" value="<?=$member[airbnbID]?>" disabled><br>
          <label>Uber ID</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" id="uber" placeholder="Empty" value="<?=$member[uberID]?>" disabled><br>
          <label>WeWork ID</label> &nbsp;&nbsp;&nbsp;
                 <input type="text" id="wework" placeholder="Empty" value="<?=$member[weworkID]?>" disabled>
          <hr>
          <button class="btn btn-theme btn-block"  id="register"><i class="fa fa-lock"></i>Register</button> 
          <button class="btn btn-theme btn-block" data-toggle="modal" data-target="#myModal">
                Cancel
                </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Cancel register account</h4>
                    </div>
                    <div class="modal-body">
                      Are you sure to cancel register ethereum account?  you can reigster in 'My Page' later.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="cancel">OK</button>
                    </div>
                  </div>
                </div>
              </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
  
<script>
$.backstretch("img/login-bg.jpg", {
    speed: 500
  });
</script>
<script type='text/javascript' src='./sharebzAbi.js'></script> <!-- ABI include -->
<script>
  var n1, n2, n3;
  n1=n2=n3=0;

  if (typeof web3 !== 'undefined') {
	    web3 = new Web3(web3.currentProvider);
	  } else {
	    web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
	  };

	  var shareBZContract = web3.eth.contract(shareBZABI);

	  var shareBZ = shareBZContract.at('0xc5bd7b208f4c1f0c1c7bd75671c9d946ae2b8298');

    $(document).ready(function(){
  	  
        $("#cancel").click(function(){
            location.href="./index.php";
        });

        $("#register").click(function(){
            // get Ethereum address and user's information
            // store data into the ethereum blockchain
            
            var addr = $("#etherAddr").val();
            alert(addr);
            
            location.href="./showUsedList.php";

            shareBZ.firstJoin(addr, <?=$member[level]?>, 0, 0, 0, function(e,r){
	            if(!e){	
	                //alert(r);
	            }
	            else
	                console.log(e);
	            });
            
			shareBZ.newOwner(addr, function(e,r){
				if(!e){console.log(r);
					}
				else console.log(e);
			});

       });
        
    });

  </script>
</body>

</html>