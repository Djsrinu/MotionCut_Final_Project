<?php
error_reporting(0);
include("../Controller/ControllerClasses.php");

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
    margin-top: 150px;
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
        <a href="index.php" class="navbar-brand">StudyWorld College of Engineering</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li  class="nav-item"><a href="index.php" title="Home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li class="nav-item active"><a href="login.php" title="Login">Login</a></li>
          <li class="nav-item"><a href="help.php" title="Need Help click here!">Help</a></li>
        </ul>
       

      </div>
     

    </div>
</div>
  <div class="container contentContainer" id="topContainer">
    <div class="row">
      <div class="col-md-6 col-md-offset-3" id="topPage">
        <h2 class="padTop">Welcome to our Login Page!</h2>
        <?php
        $var=$_GET['error'];
        if($var)
          {
            echo '<div class="alert alert-danger alert-dismissable">'.addslashes($var).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
          }
        if ($mess) {
            echo '<div class="alert alert-success alert-dismissable">'.addslashes($mess).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
          }else{
          $db=new technicalServices;
          $db->connection();
          $log=new AdminLogin;
          $log->loginAdmin();
		  $chk=new StudentLogin;
          $chk->loginStudent();
		  $log1=new TeacherLogin;
          $log1->loginTeacher();
        }
        ?>
        <form class="padTop"  method="post">
          <div class="form-group">
         <label class="clr" for="email">Email</label>
          <input type="email" name="email" title="Enter your Email to Login!" class="form-control" placeholder="Your Email" pattern="[a-zA-Z0-9._+-]+@[a-z.-]+\.[a-z]{2,4}$">
          </div>
          <div class="form-group">
         <label class="clr" for="pass">Password</label>
          <input type="password" name="pass" title="Enter your Password to Login!" class="form-control" placeholder="Your Password">
          </div>
		  <label class="clr" for="login">Admin</label>
          <input type="radio" name="login" value="admin">
		  <label class="clr" for="login">Teacher</label>
          <input type="radio" name="login" value="teacher">
		  <label class="clr" for="login">Student</label>
          <input type="radio" name="login" value="std"><br>
          <input type="submit" name="submit" class="btn btn-success btn-lg padTop" title="Click to Log In!" value="Log In">
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
      
  