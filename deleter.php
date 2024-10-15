<?php
error_reporting(0);
include("../Controller/ControllerClasses.php");
if (!$_SESSION['id']) {
      header("location:login.php?error=Logged in first please if you want to go Admin panel.");
    }else if($_SESSION['id']!="" AND $_SESSION['name']=="admin"){
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
    margin-top: 240px;
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
  margin-top: 20px;
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
  margin-bottom: 40px;
}
.m{
  margin-left: 280px;
}
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
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
            <li class="nav-item"><a href="timetable1.php">Schedule Time Table</a></li>
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
          <li  class="nav-item dropdown"><a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Message<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="amt.php" title="Send to Teacher">Send to Teacher</a></li>
            <li class="nav-item "><a href="ams.php">Send to Student</a></li>
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Message Template</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a tabindex="-1" href="template1.php?template=1">Template Class Cancellation Teacher</a></li>
                  <li class="nav-item"><a tabindex="-1" href="template2.php?template=2">Template Class Cancellation Student</a></li>
                </ul>
            </li>
            </ul>
          </li>
          <li  class="nav-item active dropdown"><a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="addroom1.php" title="Add Room">Add Room</a></li>
            <li class="nav-item"><a href="updater.php">Update Room</a></li>
            <li class="nav-item active"><a href="deleter.php">Delete Room</a></li>
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
          <?php
            $chk=new AdminPanel;
            $chk->deleteRoom();
          ?>
          <label class="clr" for="room">Enter Room Name want to delete:</label>
          <input type="text" name="delroom" title="enter room number" class="form-control" placeholder="Room Name">
          <h4>(<b>Hint:</b>i.e:R201)</h4>
          <input type="submit" title="Click to delete room!" value="Delete Room" name="submit" class="btn btn-success btn-lg padTop">
        </form>
      </div>
    </div>
  </div>
    <script type="text/javascript">
  $(".contentContainer").css("min-height",$(window).height());
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
      <?php
    }else if($_SESSION['name']=="teacher"){
      header("location:teacherp.php?error=sorry you cannot go teacher this panel.");
    }else if($_SESSION['name']=="student"){
      header("location:studentp.php?error=sorry you cannot go student this panel.");
    }
    ?>
  