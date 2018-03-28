<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="nitc.png">

<style>

body{
    background-color: #f2f2f2;
}

input[type=text], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

input[type=date], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

input[type=time], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}


input[type=file], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

</style>




</head>


<body>
	<a href="adminhome.php"><img src="back.png" height="50px" width="50px"></a>

<center>
<h1>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</h1>
<h2>phD Student Project Management System</h2></center>
<br><br>

 <div class="container">
 <form action="studentdata.php" method="POST" enctype="multipart/form-data">


   <label >Student Full Name</label>
    <input type="text"  name="name" placeholder="Name" required="true">
        <label >Student Roll No</label>
    <input type="text"  name="rollno" placeholder="Roll No" required="true">
        <label > Student Email Id</label>
    <input type="text"  name="emailid" placeholder="EmailId" required="true">

<label for="department">Student Department</label>
<select  name="department">
<option value="">Select the department</option>    
<option value="Architecture and Planning ">Architecture and Planning </option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Civil Engineering">Civil Engineering </option>
<option value="Computer Science & Engineering">Computer Science Engineering</option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Electronics & Communication Engineering">Electronics Communication Engineering </option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering  </option> 
<option value="Mathematics">Mathematics</option> 
<option value="Physics">Physics</option>   
<br>
</select>

<label >Guide Name</label>
<input type="text"  name="guidance" placeholder="Guidance" required="true">
<label >Guide Email-Id</label>
<input type="text"  name="guide_emailid" placeholder="Email -Id" required="true" pattern="[a-z0-9._%+-]+@nitc.ac.in">

<label >Guide Name (optional)</label>
<input type="text"  name="guidance2" placeholder="Guide-2" >

  <h3 style="color:green">Project Details</h3></center>
  <br>
  <label >Project Topic </label>
<input type="text"  name="topic" placeholder="project Name" required="true">
<label >Status of the project</label>

<select  name="status">
<option value="">select the option</option>    
<option value="option1">option1</option>
<option value="option2">option2</option>
<option value="option3">option3</option>
<option value="option4">option4</option>
<option value="option5">option5</option>
<option value="option6">option6</option>
<option value="option7">option7</option>
<option value="option8">option8</option>
<option value="option9">option9</option>
<option value="option10">option10</option>


</select>
<br>
<label >Date</label>
<input type="date"  name="date" placeholder="Date" required="true">
	 
	 <label >Thesis Submitted Date</label>
<input type="date"  name="tdate" placeholder="Thesis Submitted Date" >
	 
	 <label >Evaluation Report to Department</label>
<input type="date"  name="edate" placeholder="Evaluation Report to Department" >

	 <label >Defense Date</label>
<input type="date"  name="ddate" placeholder="Defense Date" >

<input type="submit" value="Submit">
</form>

</div> 


</body>
</html>
