<?php
	session_start();

	if(isset($_GET['email'])) {
       $email=$_GET['email'];
		$_SESSION['username'] = $email;
	    header('Location:guide.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<style>
    * {
	     padding: 0px;
	     margin: 0px;
      }
    html {
	     height: 100%;
    }
    body {
	    display: flex;
	    flex-flow: column nowrap;
	    height: 100%;
	   background-color: #f2f2f2;
    }
    div#header {
	    background-color: #e9dbd8;
	    max-width: 100%;
	    font-family: verdana;
	    color: #348e9e;
    }
    div#login {
	    float: right;
	    padding: 30px;
    }
    input[type=password].login, input[type=text].login {
    width: 150px; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical; /* Allow the user to vertically resize the textarea (not horizontally) */
    }
		
    input[type=submit].login {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }
		
    input[type=submit]:hover {
    	background-color: #348e9e; /*#45a049*/
    }
  </style>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
<!--  		<meta name="google-signin-client_id" content="893838997651-bqi7foj2m5hjb2to50906tjfnio1furm.apps.googleusercontent.com"> -->
<meta name="google-signin-client_id" content="893838997651-1hp3r2mhib9sbhhsmsn911bev9voif0g.apps.googleusercontent.com">
	<meta name="google-signin-hosted_domain" content="nitc.ac.in" />
</head>
<body>
  <div id="header">
    <div id="login">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <input type="text" placeholder="Administrator" class="login" name="username" required="" >
        <input type="password" placeholder="Password" class="login" name="password" required="" >
        <input type="submit" value="Login" class="login">
        <input type="text" style="display: none;" name="source" value="topbar_login" >
      </form>
    </div>
  </div>
<br><br>	
<center>
<h1>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</h1>
<h2>phD Student Project Management System</h2></center>

	
	
	<div id="reg">
		<center>
			<br><br><br><br>
			<h4 style="font-family: verdana;margin-bottom:10px;font-weight:100">Guides login with your NITC email ID</h4>
		<div class="g-signin2" data-onsuccess="onSignIn"></div>
		<center>
	</div>

	<script>
		function onSignIn(googleUser) {
			var profile = googleUser.getBasicProfile();
			var id = profile.getId();
			var name = profile.getName();
			var email = profile.getEmail();
			console.log('ID: ' + id); // Do not send to your backend! Use an ID token instead.
			console.log('Name: ' + name);
			console.log('Image URL: ' + profile.getImageUrl());
			console.log('Email: ' + email); // This is null if the 'email' scope is not present.
			window.location.href="index.php?name="+name+"&email="+email;
		}
	</script>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['source'] == 'topbar_login') {
      $username= $_POST['username'];
      $pass = $_POST['password'];
      if($username == 'admin' && $pass == 'admin') {
        $_SESSION['username'] = $username;
//         header('Location:notify.php ');
	    ?>
	      <script type="text/javascript">
window.location.href = 'notify.php';
          </script>
		  <?php
      }
      else {
        echo "<script>window.alert('Incorrect Username or Password')</script>";
        die();
      }
    }
  }
?>
</body>
</html>
