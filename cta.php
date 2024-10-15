<?php
error_reporting(0);
include("../Controller/ControllerClasses.php");
if (!$_SESSION['id']) {
      header("location:login.php?error=Logged in first please if you want to go Admin panel.");
    }else if($_SESSION['id']!="" AND $_SESSION['name']=="admin"){
?>
<!DOCTYPE html> 
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
    margin-top: 80px;
    text-align: center;
    margin-top: 220px;
  }
  #topPage h1{
    font-size: 400%;
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
  margin-top: 30px;
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
#cal{
  background-color: grey;
  border: 1px solid grey;
  height: 300px; 
}
.pad{
  margin-top: 80px;
}
.btt{
  margin: 0 auto;
  margin-top: 18px;
  margin-left: 230px;
  margin-bottom: 18px;
}
.btr{
  margin-bottom: 5px;
}
#lnd{
margin: 200px;
margin-top: 100px;
}
#c{
  margin-top: 60px;
  text-align: center;
  margin-bottom: -12px;
}
.m{
  margin-left: 280px;
}
table{
  border:1px solid black;
  background-color: white;
  opacity: 0.9;
  overflow: auto;
}
th{
  border-right: 1px solid black;
  text-align: center;
}
td{
  border-right: 1px solid black;
  text-align: center;
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
          <li  class="nav-item active dropdown"><a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Time Table<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="timetable1.php">Schedule Time Table</a></li>
            <li class="nav-item active"><a href="cta.php?sem=<?php $t = new technicalServices;
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
            <li><a href="olda.php">Old Time Tables</a></li>
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
          <li  class="nav-item dropdown"><a href="" title="Room" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="addroom1.php" title="Add Room">Add Room</a></li>
            <li class="nav-item"><a href="updater.php">Update Room</a></li>
            <li class="nav-item"><a href="deleter.php">Delete Room</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="registerS.php">Register Semester</a></li>
          <li class="nav-item "><a href="login.php?logout=1" class="m" title="Log Out!">Log out</a></li>
        </ul>
       

      </div>
     

    </div>
</div>
  <div class="container contentContainer" id="topContainer">
    <div class="row">
      <div class="col-md-6 col-md-offset-3" id="topPage">
	   <?php
                                $chk = new TimeTable;
                                $d=$chk->ckeckClash();
								$e=$chk->selectCourse();
                                $r=$chk->saveTimeTable();
                                $Oc=$chk->displayOldCourse();
                                $Od=$chk->displayOldDay();
                                $Ot=$chk->displayOldTime();
                                $Or=$chk->displayOldRoom();
								?>
        <table class="table border-collapse">
    <thead>
      <tr>
        <th>Course</th>
        <th>Room</th>
        <th>Time Slot</th>
        <th>Day</th>
      </tr>
    </thead>
        <tbody>
		
       <?php
                                            $l=0;
                                            while($Or[$l]!=""){
                                            ?>
											<tr>
                                            <td name="course[]"><?php echo $Oc[$l]; ?></td>
                                            <td name="room[]"><?php echo $Or[$l]; ?></td>
                                            <td name="time[]"><?php echo $Ot[$l]; ?></td>
                                            <td name="day[]"><?php echo $Od[$l]; ?></td>
                                            <?php
                                            $l++;
                                            }
											
                                            ?>
											</tr>
      
    </tbody>
  </table>
      </div>
    </div>
  </div>
  
   
      </body>  
      </html>
      <?php
    }else if($_SESSION['name']=="teacher"){
      header("location:teacherp.php?error=sorry you cannot go teacher this panel.");
    }else if($_SESSION['name']=="student"){
      header("location:studentp.php?error=sorry you cannot go student this panel.");
    }
    ?>