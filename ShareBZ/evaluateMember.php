<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  
<?php 
// login session 유지 
include ("./db_connect.php");
$connect = db_conn();
$member = member();

$host_id = $_GET[hostid];
$platform = $_GET[platform];

if(!strcmp($platform, "airbnb")){
$query= "select * from member where airbnbID='$host_id'";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
$recipient = mysqli_fetch_array($result);
}

if(!$member[user_id]){?>
<script>location.href='./login.php'</script>
<?}?>
  
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
  <script type='text/javascript' src='./sharebzAbi.js'></script> <!-- ABI include -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>Share<span>Bz</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.php#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <?php 
      // if login, display logout button
       if($member[user_id]){?>
       <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
      <?} // display login button 
      else {?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.php">Login</a></li>
        </ul>
      </div>
      <?}?>
    </header>
    <!--header end-->
     <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li>
            <a href="index.php">
              <i class="fa fa-desktop"></i>
              <span>Home</span>
              </a>
          </li>
          <li class="mt">
            <a class="active" href="evaluateMember.php">
              <i class="fa fa-dashboard"></i>
              <span>Sending BZ</span>
              </a>
          </li>
          <li>	
            <a href="showUsedList.php">  <!--  class="active"가 현재 클릭한 menu임을 알려줌 -->
              <i class="fa fa-desktop"></i>
              <span>Using Platform Details</span>
              </a>
          </li>
          <li>
            <a href="registeredPlatform.php">
              <i class="fa fa-desktop"></i>
              <span>Serviced Platform</span>
              </a>
          </li>
          <li>
            <a href="profile.php">
              <i class="fa fa-desktop"></i>
              <span>My Page</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- member의 level을 check해서 1이면 guest / host면 2 -->
    <!-- 평가를 눌렀을 때 넘어 올 거임 (hostid랑  platform 이름) -->
    <?php if($member[level] == 1){?>
     <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel"> <!-- platform별로 나눠야 할듯 -->
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <!-- 여기에 현재 보유하고 있는 ether / 평점 / 평가 횟수 등 써줄 것  -->
                  <h4><span id="evaluatePoint"></span></h4>
                  <h6>평 점</h6>
                  
                  <h4><span id="evaluateTimes"></span></h4>
                  <h6>평가한 사람 수</h6> 
                  
<!--                   <h4>$ 13,980</h4> -->
<!--                   <h6>여긴 뭘 넣지? </h6> -->

                </div>
              </div>
              <!-- /col-md-4 여기에 review들을 써주자 (list로)-->
              <div class="col-md-4 profile-text">
                <h3><?=$recipient[name]?>'s Information</h3>
                <h5>Email: <?=$recipient[email]?></h5>
                <h5>Ethereum Account Addres</h5>
                <h6 id="recipientAddr"><?=$recipient[etherAddr]?></h6>
                <br>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="img/friends/fr-03.jpg" class="img-circle"></p>
                  <p>
                    <button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
                    <button class="btn btn-theme02">Add</button>
                  </p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <!-- /row -->
        </div>
            
        <!-- Reviews -->
      <div class="row mt">
      <div class="col-lg-12 col-md-4 col-sm-4">
          <div class="row content-panel">
              <h4><i class="fa fa-star-half-empty"></i>Scores</h4>
              <!-- Split button -->
              <div class="col-lg-9">
                <input id="review" type="text" class="form-control" placeholder="Type the reivew">
                <div class="help-block">
                <h4 class="col-lg-2"><i class="fa fa-star"></i> 8 ~ 10: 3BZ </h4>
                <h4 class="col-lg-2"><i class="fa fa-star"></i> 4 ~  7: 2BZ </h4>
                <h4 class="col-lg-2"><i class="fa fa-star"></i> 1 ~  3: 1BZ </h4>
                <h4 class="col-lg-10"><i class="fa fa-bullhorn"></i>각 점수당 소모되는 bz(Ether)의 양 (1bz = 1ether)</h4>
                </div>
                </div>
              <div class="btn-group">
                <button id="scores" type="button" class="btn btn-theme03">
                <a id="score10"><i class="fa fa-star"></i><i class="fa fa-star"></i>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 10</a></button>
                <button id="points" type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                  </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a id="score10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 10</a></li>
                  <li class="divider"></li>
                  <li><a id="score9"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i> 9</a></li>
                  <li class="divider"></li>
                  <li><a id="score8"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> 8</a></li>
                  <li class="divider"></li>
                  <li><a id="score7"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i> 7</a></li>
                  <li class="divider"></li>
                  <li><a id="score6"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 6</a></li>
                  <li class="divider"></li>
                  <li><a id="score5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 5</a></li>
                  <li class="divider"></li>
                  <li><a id="score4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 4</a></li>
                  <li class="divider"></li>
                  <li><a id="score3"><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 3</a></li>
                  <li class="divider"></li>
                  <li><a id="score2"><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 2</a></li>
                  <li class="divider"></li> 
                  <li><a id="score1"><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 1</a></li>
                </ul>
                
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button id="registerReview" type="button" class="btn btn-theme03">Register</button>
            </div>
          </div>
      
        <div class="col-lg-12">
        <div class="row content-panel">
        <hr>
        <section class="task-panel tasks-widget">
              <div class="panel-heading profile-text" >
              <h3><i class="fa fa-tasks"></i>Reviews</h3>
              </div>
              <div class="panel-body">
                <div class="task-content">
                  <ul id="reviewlist" class="task-list">
                  
<!--                    review 등록하면 채워질 공간  -->
                          <li>
			              <div class="task-title">
			              <i class="fa fa-square"></i>
			               <a id="score6"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 6</a>&nbsp;&nbsp;&nbsp;&nbsp;      
			               숙소가 좀 더러웠어요... 그리고 주변도 좀 시끄러웠네요 좀 아쉬웠습니다..ㅠ&nbsp;&nbsp;&nbsp;&nbsp;
			                &nbsp;&nbsp;&nbsp;&nbsp;<button id="accusation" class="badge bg-important">신고</button>
			                <div class="pull-right hidden-phone">
			                  <button class="btn btn-success btn-xs"><i class=" fa fa-thumbs-up"></i></button>
			                  <button class="btn btn-theme02 btn-xs"><i class=" fa fa-thumbs-down"></i></button>
			                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
			                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
			                </div>
			              </div>
			            </li>
			            <hr>
			            
			            <li>
			              <div class="task-title">
			              <i class="fa fa-square"></i>
			              <a id="score9"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i> 9</a>&nbsp;&nbsp;&nbsp;&nbsp;       
			               호스트가 매우 친절했어요!! 다음에도 또 이용하고 싶네요~~&nbsp;&nbsp;&nbsp;&nbsp;
			                &nbsp;&nbsp;&nbsp;&nbsp;<button id="accusation" class="badge bg-important">신고</button>
			                <div class="pull-right hidden-phone">
			                  <button class="btn btn-success btn-xs"><i class=" fa fa-thumbs-up"></i></button>
			                  <button class="btn btn-theme02 btn-xs"><i class=" fa fa-thumbs-down"></i></button>
			                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
			                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
			                </div>
			              </div>
			            </li>
			            <hr>
                    
                  </ul>
                </div>
                <div class=" add-task-row">
<!--                   <a class="btn btn-success btn-sm pull-left" href="#">Add New Tasks</a> -->
                  <a class="btn btn-default btn-sm pull-right" href="#">See All Reviews</a>
                </div>
              </div>
            </section>
           </div>
         </div>
       </div>
        
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <?}?>
    
    
    <?php host 
    
    ?>
    <!--/showback -->
    
     <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="buttons.php#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    </section>
    
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
  <script type='text/javascript' src='./sharebzAbi.js'></script> <!-- ABI include -->
  
  <script>

  if (typeof web3 !== 'undefined') {
	    web3 = new Web3(web3.currentProvider);
	  } else {
	    web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
	  };

	  var shareBZContract = web3.eth.contract(shareBZABI);

	  var shareBZ = shareBZContract.at('0xc5bd7b208f4c1f0c1c7bd75671c9d946ae2b8298');

	  var writer = "<?=$member[etherAddr]?>";
      var recipient = "<?=$recipient[etherAddr]?>";

      var time=0;
      var values=0;

      var review;
      var scoreHtml;

      var flag = 0;

      var reviewArr = new Array();
      var scoreArr = new Array();
      
      shareBZ.getEvaluatedTimes(recipient, function(e,result){
		  if(!e) {
			  times = result;
			  $("#evaluateTimes").html("<a>" + result + "</a>");
			  }
		  else console.log(e);
	  });

      shareBZ.getEvaluatedValue(recipient, function(e,r){
		  if(!e){
			  values = r/times;
			  values = values.toFixed(2);
			  $("#evaluatePoint").html("<a>" + values + "</a>");
		  }else console.log(e);
	  });

  $(document).ready(function(){
	  
	  var score = 10;

	  shareBZ.getReviews(recipient, 2, function(e,r){
		  if(!e){
			  var review = r;
			  shareBZ.getScore(recipient, 2, function(e,r){
				  if(!e) {
					  var scorehtml = r;
					  $("#reviewlist").prepend('<li>'+
				              '<div class="task-title">'+
				              '<i class="fa fa-square"></i>'+
				               scorehtml + '&nbsp;&nbsp;&nbsp;&nbsp;'+         
				               review + '&nbsp;&nbsp;&nbsp;&nbsp;'+
				                '&nbsp;&nbsp;&nbsp;&nbsp;<button id="accusation" class="badge bg-important">신고</button>'+
				                '<div class="pull-right hidden-phone">'+
				                  '<button class="btn btn-success btn-xs"><i class=" fa fa-thumbs-up"></i></button>'+
				                  '<button class="btn btn-theme02 btn-xs"><i class=" fa fa-thumbs-down"></i></button>'+
				                  '<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>'+
				                  '<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>'+
				                '</div>'+
				              '</div>'+
				            '</li>'+
				            '<hr>');
					  }
				  else console.log(e);
			  });
		  }
		  else console.log(e);
	  });
	  
	  $("#points").click(function(){
		  $("#score10").click(function(){
			  score = 10;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 10</a>');
		   });

		  $("#score9").click(function(){
			  score = 9;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i> 9 </a>');
		  });

		  $("#score8").click(function(){
			  score = 8;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> 8 </a>')
		  });

		  $("#score7").click(function(){
			  score = 7;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i> 7 </a>')
		  });

		  $("#score6").click(function(){
			  score = 6;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 6 </a>')
		  });

		  $("#score5").click(function(){
			  score = 5;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 5 </a>')
			  });

		  $("#score4").click(function(){
			  score = 4;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 4 </a>')
			  });

		  $("#score3").click(function(){
			  score = 3;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 3 </a>')
			  });

		  $("#score2").click(function(){
			  score = 2;
			  $("#scores").html('<a><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 2 </a>')
			  });

		  $("#score1").click(function(){
			  score = 1;
			  $("#scores").html('<a><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 1</a>')
			  });
	  });

	  $("#registerReview").click(function(){

		  flag++;
          var writer = "<?=$member[etherAddr]?>";
          var recipient = "<?=$recipient[etherAddr]?>";
          var sendAmount;

          var reviews = $("#review").val();
          var scorehtml = $("#scores").html();
          
		  if(score>7 && score <=10){
			  sendAmount = web3.toWei(3, "ether");
		  }else if(score >3 && score <=7){
			  sendAmount = web3.toWei(2, "ether");
		  }else{
			  sendAmount = web3.toWei(1, "ether");
		  }

		  shareBZ.setReviews(writer, recipient, reviews, score, scorehtml, function(e,r){
			  if(!e) {
				  web3.eth.sendTransaction({from:writer, to:recipient, value: sendAmount}, 
		    	    	  function(e, r){
			    	  if(!e){console.log(r);}
			    	  else console.log(e);
		        	});
				  console.log(r);
			  }
			  else console.log(e);
		  });
		  
	  });

	  
  });
  </script>
  
</body>
</html>