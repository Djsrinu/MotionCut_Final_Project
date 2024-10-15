<?php
error_reporting(0);
include("../Controller/ControllerClasses.php");
if (!$_SESSION['id']) {
      header("location:login.php?error=Logged in first please if you want to go Admin panel.");
    }
?>
<!DOCTYPE html> 
<html lang="en">    
<h<!DOCTYPE html> 
<html lang="en">    
<head>      
  <meta charset="utf-8">      
  <meta http-equiv="X-UA-Compatible" content="IE=edge">     
  <meta name="viewport" content="width=device-width, initial-scale=1">      
  <title>StudyWorld College of Engineering</title>     <!-- Bootstrap -->     
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->                          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->                          <!--[if lt IE 9]>                          <script src="https://oss.maxcdn.com/libs/html5shiv/ 3.7.0/html5shiv.js"></script>                           <script src="https://oss.maxcdn.com/libs/respond.js/ 1.4.2/respond.min.js"></script>                          <![endif]-->
     <script type="text/javascript" src="jquery-3.2.1.min.js"></script>   
    <!-- Include all compiled plugins (below), or include individual files as needed -->      
    <script src="js/bootstrap.min.js"></script>          
  <style>  
  .navbar-brand{
    font-size: 1.8em;
  }     
  #topContainer{
    background-image: url("123.JPG");
    height: 662px;
    width: 100%;
    background-size: cover;
    
  }   
  #topPage{
    margin-top: 40px;
    text-align: center;
    color: black;
  }
  #topPage h2{
    font-size: 330%;
    color:black;
  } 
  #col{
    color: black;
    font-size: 20px;
  }  
  .bold{
    color: black;
    font-weight: bold;
  }
.padTop{
  margin-top: 200px;
}
.center{
  text-align: center;
}
.title{
  margin-top: 100px;
  font-size: 300%;
}

.mBottom{
  margin-bottom: 30px;
}
.appimg{
  width: 250px;
}
.clr{
  color: black;
  font-size: 1.5em;
  margin-top: 40px;
}
.clr1{
  color: black;
  font-size: 1.5em;
  margin-top: 20px;
}
.m{
  margin-left: 280px;
}
.ab{
  text-decoration: none;
  color: white;
}
.ab:hover{
  text-decoration: none;
  color: white;
}
.ps{
  margin-left: -150px;
}
      </style>    
    </head>  
    <body data-spy="scroll" data-target=".navbar-collapse">     
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid ">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">

          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>


        </button>
        <a href="adminp.php" class="navbar-brand">StudyWorld College of Engineering</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li  class="nav-item"><a href="adminp.php" title="Home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li  class="nav-item dropdown"><a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Time Table<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="timetable1.php">Schedult Time Table</a></li>
            <li><a href="cta.php?sem=<?php $t = new technicalServices;
		$d=$t->connection();
	  $query="SELECT sem_name FROM `semester_table`";
      $run=mysqli_query($d,$query);
	  $k=0;
    while($result=mysqli_fetch_array($run))
    {
      $e[]=$result;
	  $k++;
    }
	print_r($e[$k-1]['sem_name']);
		?>">Current Time Table</a></li>
            <li class="nav-item"><a href="olda.php">Old Time Tables</a></li>
            </ul>
          </li>
          <li  class="nav-item active dropdown"><a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Message<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="amt.php" title="Send to Teacher">Send to Teacher</a></li>
            <li class="nav-item "><a href="ams.php">Send to Student</a></li>
            <li class="nav-item active"><a href="template.php">Message Templates</a></li>
            </ul>
          </li>
          <li  class="nav-item dropdown"><a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="addroom1.php" title="Add Room">Add Room</a></li>
            <li class="nav-item"><a href="updater.php">Update Room</a></li>
            <li class="nav-item"><a href="deleter.php">Delete Room</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="registerS.php">Register Semester</a></li>
          <li class="nav-item"><a href="login.php?logout=1" class="m" title="Log Out!">Log out</a></li>
        </ul>
       

      </div>
     

    </div>
</div>
  <div class="container contentContainer" id="topContainer">
    <div class="row">
      <div class="col-md-6 col-md-offset-3" id="topPage">
        <form class="padTop"  method="post">
          <button class="btn btn-success btn-lg ps"><a href="template1.php?template=1" class="ab">Template of Class Cancelation for Teacher</a></button>
          <button class="btn btn-success btn-lg ps"><a href="template2.php?template=2" class="ab">Template of Class Cancelation for Student</a></button>
          <button class="btn btn-success btn-lg ps"><a href="" class="ab">Template of Holiday Notification for Teacher</a></button>
          <button class="btn btn-success btn-lg ps"><a href="" class="ab">Template of Holiday Notification for Student</a></button>
        </form>
      </div>
    </div>
  </div>
    <script type="text/javascript">
  $(".contentContainer").css("min-height",$(window).height());
  $("#txt").css("min-height",$(window).height()-440);
  $(".ps").css("width",$(window).width()-440);
  $(".form-control")
  .mouseenter(function(){
$(this).css("background-color", "lightgrey");
})
  .mouseleave(function(){
$(this).css("background-color", "white");
 })
  .mousedown(function(){
$(this).css("background-color", "white");
 });
  $( document ).tooltip();
  </script>
      </body>  
      </html>
      
  