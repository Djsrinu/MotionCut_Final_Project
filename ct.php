<?php
error_reporting(0);
include("../Controller/ControllerClasses.php");
if (!$_SESSION['id']) {
      header("location:login.php?error=Logged in first please if you want to go Teachers panel.");
    }else if($_SESSION['id']!="" AND $_SESSION['name']=="teacher"){
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
  margin-left: 500px;
}
table{
  border:1px solid black;
  background-color: white;
  opacity: 0.9;
}
th{
  border-right: 1px solid black;
  text-align: center;
}
td{
  border-right: 1px solid black;
  text-align: center;
}
.cct{
  color: white;
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
        <a href="teacherp.php" class="navbar-brand">StudyWorld College of Engineering</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li  class="nav-item"><a href="teacherp.php" title="Home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li  class="nav-item active dropdown"><a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Time Table<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="nav-item active"><a href="ct.php?sem=<?php $t = new technicalServices;
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
            <li><a href="old.php">Old Time Tables</a></li>
            </ul>
          </li>
          <li  class="nav-item"><a href="mit.php" title="Message Inbox">Message Inbox</a></li>
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
    }else if($_SESSION['name']=="admin"){
      header("location:adminp.php?error=sorry you cannot go admin this panel.");
    }else if($_SESSION['name']=="student"){
      header("location:studentp.php?error=sorry you cannot go student this panel.");
    }
    ?>