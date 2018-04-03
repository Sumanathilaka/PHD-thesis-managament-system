<?php
session_start();
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
if(!$conn) {
  echo "<script>console.log('Connection Failed ".mysqli_connect_error()."')</script>";
  die();
}
$sql ="SELECT * FROM login";
$result = mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0){
                  
mysqli_close($conn);
  header('Location:index.php');
}
 ?>

<center>
 <h2>WELCOME TO Ph.D. Thesis Management System</h2>
<br>
<h4> Create login credentials for administrator to continue </h4>
<br> 
 <div id="login">
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
     <input type="text" placeholder="Username" class="login" name="username" required="" > <br><br>
     <input type="password" placeholder="Password" class="login" name="password" required="" ><br><br>
     <input type="submit" value="Create" class="login">
   </form>
 </div>
 <?php
 if(isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $sql = "INSERT INTO login VALUES('$username', '$password')";

 if(mysqli_query($conn, $sql)) {
   header('Location:index.php');
 }
 }
                  
mysqli_close($conn);
 ?>
