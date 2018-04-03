<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
  $status1 = array
    (
      array("SynMailtoE1L1-1",14),
      array("SynRem1toE1L1-1",7),
      array("SynRem2toE1L1-1",7),
      array("SynMailtoE1L1-2",14),
      array("SynRem1toE1L1-2",7),
      array("SynRem2toE1L1-2",7),
      array("SynMailtoE1L1-3",14),
      array("SynRem1toE1L1-3",7),
      array("SynRem2toE1L1-3",7),
      array("SynMailtoE1L1-4",14),
      array("SynRem1toE1L1-4",7),
      array("SynRem2toE1L1-4",7),
      array("SynMailtoE1L2-1",14),
      array("SynRem1toE1L2-1",7),
      array("SynRem2toE1L2-1",7),
      array("SynMailtoE1L2-2",14),
      array("SynRem1toE1L2-2",7),
      array("SynRem2toE1L2-2",7),
      array("SynMailtoE1L2-3",14),
      array("SynRem1toE1L2-3",7),
      array("SynRem2toE1L2-3",7),
      array("SynMailtoE1L2-4",14),
      array("SynRem1toE1L2-4",7),
      array("SynRem2toE1L2-4",7),
      array("E1ReadyForThesisReview",365),
      array("ThesisSentToE1",45),
      array("ThesisE1Rem1",7),
      array("ThesisE1Rem2",7),
      array("ThesisE1Rem3",7),
      array("ThesisE1Rem4",7),
      array("E1ApprovedThesis",7),
      array("E1ApprovedHonInitiated",365)
     );
     $status2 = array
       (
         array("SynMailtoE2L1-1",14),
         array("SynRem1toE2L1-1",7),
         array("SynRem2toE2L1-1",7),
         array("SynMailtoE2L1-2",14),
         array("SynRem1toE2L1-2",7),
         array("SynRem2toE2L1-2",7),
         array("SynMailtoE2L1-3",14),
         array("SynRem1toE2L1-3",7),
         array("SynRem2toE2L1-3",7),
         array("SynMailtoE2L1-4",14),
         array("SynRem1toE2L1-4",7),
         array("SynRem2toE2L1-4",7),
         array("SynMailtoE2L2-1",14),
         array("SynRem1toE2L2-1",7),
         array("SynRem2toE2L2-1",7),
         array("SynMailtoE2L2-2",14),
         array("SynRem1toE2L2-2",7),
         array("SynRem2toE2L2-2",7),
         array("SynMailtoE2L2-3",14),
         array("SynRem1toE2L2-3",7),
         array("SynRem2toE2L2-3",7),
         array("SynMailtoE2L2-4",14),
         array("SynRem1toE2L2-4",7),
         array("SynRem2toE2L2-4",7),
         array("E2ReadyForThesisReview",365),
         array("ThesisSentToE2",45),
         array("ThesisE2Rem1",7),
         array("ThesisE2Rem2",7),
         array("ThesisE2Rem3",7),
         array("ThesisE2Rem4",7),
         array("E2ApprovedThesis",7),
         array("E2ApprovedHonInitiated",365)
        );
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
<label for="department">Student Department</label>
<select  name="department">
<option value="">Select the department</option>
<option value="Architecture and Planning ">Architecture and Planning </option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Civil Engineering">Civil Engineering </option>
<option value="Computer Science & Engineering">Computer Science Engineering</option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Electronics & Communication Engineering">Electronics Communication Engineering </option>
<option value="Mechanical Engineering">Mechanical Engineering  </option>
<option value="Nano-Technology">Nano-Technology</option>
<option value="Bio-Technology">Bio-Technology</option>
<option value="Management Studies">Management Studies</option>	
<option value="Mathematics">Mathematics</option>
<option value="Physics">Physics</option>
<option value="Chemistry">Chemistry</option>	
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
<label >Status of Examiner 1</label>
<select  name="status1">

<?php
echo "<option value=\"\">Select</option>";
for($row=0;$row<32;$row++)
  {
    echo "<option value=".$row.">".$status1[$row][0]."</option>";
  }
?>
</select>
<br>
<label >Modified Date</label>
<input type="date"  name="date1" placeholder="Date" required="true">
<br>
<label >Status of Examiner 2</label>
<select  name="status2">

<?php
echo "<option value=\"\">Select</option>";
for($row=0;$row<32;$row++)
  {
    echo "<option value=".$row.">".$status2[$row][0]."</option>";
  }
?>
</select>
<br>
<label >Modified Date</label>
<input type="date"  name="date2" placeholder="Date">


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
