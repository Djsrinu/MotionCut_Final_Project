<?php
include("../Controller/ControllerClasses.php");
?>
<!DOCTYPE html> 
<html lang="en">    
<head>      
  <meta charset="utf-8">      
  <meta http-equiv="X-UA-Compatible" content="IE=edge">     
  <meta name="viewport" content="width=device-width, initial-scale=1">      
  <title>StudyWorld College of Engineering</title>   
  <link href="css/bootstrap.min.css" rel="stylesheet">  
  
   <script type="text/javascript" src="jquery-3.2.1.min.js"></script>        
  <script src="js/bootstrap.min.js"></script>                                      
  <style>
  .overlay {
    height: 100%;
    width: 0;
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0, 0.9); 
    overflow-x: hidden; 
    transition: 0.5s; 
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%; 
    text-align: center;
    margin-top: 30px; 
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block; 
    transition: 0.3s; 
}
.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}
.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}
@media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
    }
}
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
    margin-top: 70px;
    text-align: center;
    margin-top: 170px;
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
#cs{
  color:white;
  margin-left:210px;
  margin-right:210px;
  text-align: center;
}
#vc:hover{
  color: black;
}
      </style>    
    </head>  
    <body data-spy="scroll" data-target=".navbar-collapse"> 
    <div class="navbar-wrapper">    
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid ">
      <div class="navbar-header">
        
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>


        </button>
        <a href="" class="navbar-brand">StudyWorld College of Engineering</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li  class="nav-item active"><a href="index.php" title="Home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li class="nav-item"><a href="login.php" title="Login">Login</a></li>
          <li class="nav-item"><a href="help.php" title="Need Help click here!">Help</a></li>
        </ul>
       

      </div>

    </div>
</nav>
</div>
  <div class="container contentContainer" id="topContainer">
    <div class="row">
      <div class="col-md-6 col-md-offset-3" id="topPage">
        <h1 class="padTop">Welcome To Our Site</h1>
        <?php
        $connection1=new technicalServices;
        $connection1->connection();
        ?>
        <p class="bold lead" id="col">This site is only for members of Computer science department.</p>
        <p id="col">Admins can manage time table here and sends message to students and teacher.Students and Teachers can view time tables and view messages.</p>
         <div id="myNav" class="overlay">
           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             <div class="overlay-content">
               <p id="cs">I welcome you to Quaid-i-Azam University, the premier seat of learning in Pakistan. QAU has consistently been ranked the top university in the country by the Higher Education Commission. In addition, according to U.S. News and World Report, QAU is the only academic institution in Pakistan among the top 500 universities in the world. As a student here, you are a member of a privileged and distinguished group.
                         Faculty along with students in our Masters, M. Phil, and Ph.D. programmes produce world-class research, as is evident from the high-quality outlets in which their scholarship appears.
                         Our faculty members have received numerous awards, both nationally and internationally for their research. Many of our students have gone on to highly productive careers in academia, as well as governmental and international organizations.
                         Unlike many research universities, QAU views quality teaching as a pivotal part of its commitment to students. Faculty members are readily available, and are often to be found in the late evenings working in their offices or laboratories.
                         Nestled in the backdrop of the Margalla Hills, our seventeen hundred acre campus provides a serene environment for the serious scholar. The natural beauty of the campus in a near-rural setting belies the fact that we are only fifteen minutes away from the bustling, urban metropolis of Islamabad.
                         In choosing to be a student at Pakistan’s most elite academic institution, you have made a wise choice. Along with the staff and faculty, I as Vice Chancellor, look forward to the opportunity to serve you, and provide you with the best academic experience possible.
                         <br><br><img style="width:100px;height:100px;" src="vc1.jpg"><br>
                         <h2 style='color:white;'>Dr. Muhammad Ali</h2>
                       </p>
            </div>
        </div>
         <span id="vc" style="font-size:30px;cursor:pointer" onclick="openNav()">Click to see VC Message</span>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
  </script>
      </body>  
      </html>