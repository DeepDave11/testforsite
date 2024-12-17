	<?php 
	session_start();
	if(isset($_REQUEST['Submit']))
	{
		extract($_POST);
		include("b2b/connect.php");
		$ldt=date('Y-m-d');
		$p=md5($_REQUEST['pwd']);
		$q=mysqli_query($dhy, "select *from admin where login='$lid' and password='$p' and flag!=1")or die("QF1");
		if(mysqli_num_rows($q))
		{
			$data=mysqli_fetch_array($q);
			$_SESSION['admin']=$data['aid'];
			header("location:b2b/home.php");
		}
		else
		{
			$q_lt=mysqli_query($dhy,"select login_try from admin where login='$lid'")or die("QF@@");
			$d_lt=mysqli_fetch_array($q_lt);
			$lt=$d_lt['login_try'];
			if($lt==3)
			{
				$cdt=date('Y-m-d' ,strtotime($date. ' +1 days'));
				mysqli_query($dhy,"update admin set flag=1 , next_login_date='$cdt' where login='$lid'")or die("QF#$");
				header("location:index.php?mb=block");
				exit(0);
			}
			else
			{
				$lt=$lt+1;
				mysqli_query($dhy,"update admin set login_try=$lt where login='$lid'")or die("QF44");
			}
		header("location:index.php?msg=wrong");
		}
	}
	?>
 <!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Video Login Form Responsive Widget Template :: w3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Video Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext"
	    rel="stylesheet">
	<!-- //web-fonts -->
<script>
function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


</head>




<body>
	<div class="video-w3l" data-vide-bg="video/2">
		<!-- title -->
		<h1>
			<span>V</span>ideo
			<span>L</span>ogin
			<span>F</span>orm</h1>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
				<form action="" method="post" name="form1" id="form1" onSubmit="return f1();">
				<div class="form-style-agile">
					<label>
						<i class="fas fa-user"></i>Username</label>
					<input placeholder="Login Id" name="lid" id="lid" type="text" >
				</div>
				<div class="form-style-agile">
					<label>
						<i class="fas fa-unlock-alt"></i>Password</label>
					<input placeholder="Password" name="pwd" id="pwd" type="password" >
				</div>
<div class="form-style-agile">
					<label>
						<input type="checkbox"  name="v" id="v"
onClick="myFunction();" >Click Here to View Password
				</div>
				<!-- switch -->
				 
				<!-- //switch -->
				<input type="submit" name="Submit" value="Log In">
				<!-- social icons -->
				<div class="footer-social">
					<h2><a href="admin_forgot.php"><font color="#FFFFFF">Forgot Password</font></a></h2>
					 
				</div>
				<!-- //social icons -->
			</form>
		</div>
		<!-- //content -->

		<!-- copyright -->
		<div class="footer">
			<p>&copy; 2018 Video Login Form. All rights reserved | Design by
				<a href="http://w3layouts.com">W3layouts</a>
			</p>
		</div>
		<!-- //copyright -->
	</div>

	
	<!-- Jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->

	<!-- Video js -->
	<script src="js/jquery.vide.min.js"></script>
	<!-- //Video js -->
	
</body>

</html>
<script>
function f1()
{
	if(form1.lid.value=="")
	{
			alert("Enter your Login Id");
			form1.lid.focus();
			return false;
	}
	else if(form1.pwd.value=="")
	{
			alert("Enter Your Password");
			form1.pwd.focus();
			return false;
	}	
}
</script>
<?php if(isset($_REQUEST['msg'])=="wrong") { ?>
<script>
alert("You entered wrong Login ID or Password");
</script>
<?php  }?>

<?php if(isset($_REQUEST['m1'])=="1") { ?>
<script>
alert("Login Required");
</script>
<?php  }?>

<?php if(isset($_REQUEST['m3'])=="3") { ?>
<script>
alert("Logout Successfully");
</script>
<?php  }?>
<?php if(isset($_REQUEST['mb'])=="block") { ?>
<script>
alert("your account has been blocked for 24 hours");
</script>
<?php  }?>
