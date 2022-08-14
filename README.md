<?php

include_once('DBConfig.php');

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

if(isset($_POST['submit']))
{
	if(empty($productname) || empty($customername) || empty($customermobno) || empty($problemdetails))
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
	if(empty($ticketdate))
	{
		echo "Please enter date";
	}
	}
	else
	{
		$ticketdate=date('Y/d/m');
		$sql="INSERT INTO tblgenerateticket(productname, customername, customermobno, problemdetails, ticketdate,solutiondetails) VALUES ('$productname', '$customername', '$customermobno', '$problemdetails','$ticketdate','Pending')";
	    if(mysqli_query($mysqli,$sql))
	    {
			$lastid=mysqli_insert_id($mysqli);
		}
	}	
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
            <!-- Brand -->
            <a class="navbar-brand" href="index.html">Microcare Computer Systems</a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Call Log
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="generateticket.php">Generate Ticket</a>
                            <a class="dropdown-item" href="viewticket.php">View Ticket</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Office Login</a>
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
                <form method="POST" action="generateticket.php">
                    <select name="productname" required="" class="form-group form-control">
                        <option value="">Select Product</option>
                        <option value="Billing Software">Billing Software</option>
                        <option value="School ERP">School ERP</option>
                        <option value="GYM Pro">Gym Pro.</option>
                        <option value="Clinic Desk">Clinic Desk</option>
                        <option value="Repo App">Repo App</option>
                        <option value="Attendance Tracker">Attendance Tracker</option>
                        <option value="Customized App">Customized App</option>
                        <option value="Website">Website</option>
                        <option value="Other">Other</option>
                    </select>
                    <input type="text" name="customername" class="form-group form-control" placeholder="Enter your name" required=""/>
                    <input type="text" name="customermobno" 
					class="form-group form-control" 
					placeholder="Enter your mobile number" 
					required="" maxlength="10" pattern="^[789][0-9]{9}$"/>
                    <textarea name="problemdetails" 
					class="form-group form-control" 
					placeholder="Enter your problem details" 
					required="" maxlength="500"></textarea>
					
			  <input type="submit" class="btn btn-primary" 
					name="submit"/>
					<?php
					if(isset($_POST['submit']))
					{
						if(empty($lastid))
						{
							echo "Failed to register..";
						}
						else
						{
							echo "Thank for registering your complaint. Your ticket id= $lastid";					
						}
					}
					?>
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
