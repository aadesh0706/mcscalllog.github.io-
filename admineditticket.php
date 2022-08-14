<?php

include_once('DBConfig.php');

if(isset($_POST['id']))
{
$id=$_POST['id'];
}
if(isset($_POST['productname']))
{
$productname=$_POST['productname'];
}
if(isset($_POST['customername']))
{
$customername=$_POST['customername'];
}
if(isset($_POST['customermobno']))
{
$customermobno=$_POST['customermobno'];
}
if(isset($_POST['problemdetails']))
{
$problemdetails=$_POST['problemdetails'];
}
if(isset($_POST['solutiondetails']))
{
$solutiondetails=$_POST['solutiondetails'];
}

if(isset($_POST['submit']))
{
	if(empty($productname) || empty($customername) || empty($customermobno) || empty($problemdetails) || empty($solutiondetails))
	{
	if(empty($productname))
	{
		echo "Please select product";
	}
	if(empty($customername))
	{
		echo "Please enter your name";
	}
	if(empty($customermobno))
	{
		echo "Please enter your mobile number";
	}
	if(empty($problemdetails))
	{
		echo "Please enter your problem details";
	}
	if(empty($solutiondetails))
	{
		echo "Please enter your solution details";
	}
	}
	else
	{
		$sql="UPDATE tblgenerateticket SET productname='$productname',customername='$customername',customermobno='$customermobno',problemdetails='$problemdetails',solutiondetails='$solutiondetails' WHERE ticketid=$id";
	    mysqli_query($mysqli,$sql);
		header("Location: adminmanageticket.php");
	}	
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tblgenerateticket WHERE ticketid=$id");

while($res = mysqli_fetch_array($result))
{
	$ticketid = $res['ticketid'];	
	$productname = $res['productname'];
	$customername = $res['customername'];
    $customermobno = $res['customermobno'];
	$problemdetails = $res['problemdetails'];
	$solutiondetails = $res['solutiondetails'];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Microcare Call Log System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <div class="jumbotron text-center" style="margin-bottom: 0">
            <h1>Microcare Call Log System</h1>
            <p>Listening to you, and answering with software.</p>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
					<li class="nav-item">
                        <a class="nav-link" href="adminmanageticket.php">Manage Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-sm-8 order-sm-2">
                <h2>Generate Ticket</h2>
                <div style="border:groove; padding:10px; margin-bottom:10px;">
                <form method="POST" action="admineditticket.php">
                    <select name="productname" required="" class="form-group form-control">
                        <option value="" <?php if($productname == "") echo "selected"; ?>>Select Product</option>
                        <option value="Billing Software" <?php if($productname == "Billing Software") echo "selected"; ?>>Billing Software</option>
                        <option value="School ERP" <?php if($productname == "School ERP") echo "selected"; ?>>School ERP</option>
                        <option value="GYM Pro" <?php if($productname == "GYM Pro") echo "selected"; ?>>Gym Pro.</option>
                        <option value="Clinic Desk" <?php if($productname == "Clinic Desk") echo "selected"; ?>>Clinic Desk</option>
                        <option value="Repo App" <?php if($productname == "Repo App") echo "selected"; ?>>Repo App</option>
                        <option value="Attendance Tracker" <?php if($productname == "Attendance Tracker") echo "selected"; ?>>Attendance Tracker</option>
                        <option value="Customized App" <?php if($productname == "Customized App") echo "selected"; ?>>Customized App</option>
                        <option value="Website" <?php if($productname == "Website") echo "selected"; ?>>Website</option>
                        <option value="Other" <?php if($productname == "Other") echo "selected"; ?>>Other</option>
                    </select>
                    <input type="text" name="customername" class="form-group form-control" placeholder="Enter your name" required="" value="<?php echo $customername;?>"/>
                    <input type="text" name="customermobno" 
					class="form-group form-control" 
					placeholder="Enter your mobile number" 
					required="" maxlength="10" pattern="^[789][0-9]{9}$" 
					value="<?php echo $customermobno;?>"/>
                    <textarea name="problemdetails" 
					class="form-group form-control" 
					placeholder="Enter your problem details" 
					required="" maxlength="500"><?=$problemdetails?></textarea>
					<textarea name="solutiondetails" class="form-group form-control" placeholder="Enter your solution details" required=""><?=$solutiondetails?></textarea>
					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <input type="submit" class="btn btn-primary" name="submit"/>
                </form>
                    </div>
            </div>
            <div class="col-sm-4">
                <h2>About System</h2>
                <h5>24X7 Support</h5>
                <img src="images/about-system.png" class="img-fluid" />
                <p>This System is designed and developed for Computer Service Centers. This Software is Integrated, Multi-user, Online and Modular in structure. Ii will run on a web environment.</p>
                <h3>Navigation</h3>
                <p>Important Links</p>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Office Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generateticket.php">Generate Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewticket.php">View Ticket</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>            
        </div>
    </div>

    <footer>
        <div class="jumbotron text-center" style="margin-bottom: 0">
            <p>&copy; 2021 All rights reserved. Microcare Computer Systems</p>
        </div>
    </footer>

</body>
</html>