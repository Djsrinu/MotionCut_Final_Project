<?php
//error_reporting(0);


include("../Controller/ControllerClasses.php");

if (!$_SESSION['id']) {
    header("location:login.php?error=Logged in first please if you want to go Admin panel.");
} else if ($_SESSION['id'] != "" AND $_SESSION['name'] == "admin") {
	
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
                            height: 100%;
                            width: 100%;
                            background-size: cover;
                            margin-bottom: -9%;
                        }   
                        #topPage{
                            margin-top: 200px;
                            text-align: center;
                            color: black;
                            margin-bottom: 45px;
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
                        .p{
                            color: white;
                        }
                        .p:hover{
                            color: white;
                            text-decoration: none;
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
                        table>tbody>tr:first-child .remove{
                            display: none;
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
                                            <li class="nav-item active"><a href="timetable1.php">Schedule Time Table</a></li>
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
                                            <li><a href="olda.php">Old Time Tables</a></li>
                                        </ul>
                                    </li>
                                    <li  class="nav-item dropdown">
                                        <a href="" title="Time Table" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Message<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="amt.php" title="Send to Teacher">Send to Teacher</a></li>
                                            <li class="nav-item "><a href="ams.php">Send to Student</a></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#">Message Template</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a tabindex="-1" href="template1.php?template=1">Template Class Cancellation Teacher</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a tabindex="-1" href="template2.php?template=2">Template Class Cancellation Student</a>
                                                    </li>
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
                                    <li class="nav-item"><a href="login.php?logout=1" class="m" title="Log Out!">Log out</a></li>
                                </ul>


                            </div>


                        </div>
                    </div>
                    <div class="container contentContainer" id="topContainer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2" id="topPage">
                                <div class="alert alert-danger alert-dismissable" id="fourError" hidden>
                                    <strong>Warning!</strong> Course, Room, Time Slot and Day can not be same.
                                    <button class="close" type="button"  data-dismiss="alert">x</button>
                                </div>
                                <div class="alert alert-danger alert-dismissable" id="threeError" hidden>
                                    <strong>Warning!</strong> Room, Time Slot and Day can not be same.
                                    <button class="close" type="button"  data-dismiss="alert">x</button>
                                </div>
                                <?php
                                $chk = new TimeTable;
                                $d=$chk->ckeckClash();
								$e=$chk->selectCourse();
                                $r=$chk->saveTimeTable();
                                $Oc=$chk->displayOldCourse();
                                $Od=$chk->displayOldDay();
                                $Ot=$chk->displayOldTime();
                                $Or=$chk->displayOldRoom();
                               // print_r($Oc);
                                if ($r=='done') {
                                    $error.="<strong>Success!</strong> Time Table Saved Successfully..!!";
                                    echo '<div class="alert alert-success alert-dismissable">'.addslashes($error).'<button class="close top" type="button"  data-dismiss="alert">x</button></div>';
                                }
                                ?>
                                <form  class="padTop"  method="post">
                                    <table id="table1" class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Course</th>
                                                <th>Room</th>
                                                <th>Time Slot</th>
                                                <th>Day</th>
                                                <th>Action</th>
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
                                            <td>
											<a class="btn btn-danger btn-sm">-</a>
                                            </td>
                                            <?php
                                            $l++;
                                            }
											
                                            ?>
											</tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control course" name="course[]">
                                                        <option value="">--Select Course--</option>
                                                        <?php
                                                        $i = 0;
                                                        $chk = new TimeTable;
                                                        $course = $chk->selectCourse();
                                                        while ($course[$i]['course_name'] != "") {
                                                            ?>
                                                            <option value="<?php echo $course[$i]['course_name']; ?>"><?php echo $course[$i]['course_name']; ?></option>
                                                            <?php
                                                            $i = $i + 1;
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control room" name="room[]">
                                                        <option value="">--Select Room--</option>
                                                        <?php
                                                        $i = 0;
                                                        $chk = new TimeTable;
                                                        $room = $chk->selectRoom();
                                                        while ($room[$i]['room_name'] != "") {
                                                            ?>
                                                            <option value="<?php echo $room[$i]['room_name']; ?>"><?php echo $room[$i]['room_name']; ?></option>
                                                            <?php
                                                            $i = $i + 1;
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control time" name="time[]">
                                                        <option value="">--Select Time Slot--</option>
                                                        <?php
                                                        $i = 0;
                                                        $chk = new TimeTable;
                                                        $time = $chk->selectTime();
                                                        while ($time[$i]['time_slot'] != "") {
                                                            ?>
                                                            <option value="<?php echo $time[$i]['time_slot']; ?>"><?php echo $time[$i]['time_slot']; ?></option>
                                                            <?php
                                                            $i = $i + 1;
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control day" name="day[]">
                                                        <option value="">--Select Day--</option>
                                                        <?php
                                                        $i = 0;
                                                        $chk = new TimeTable;
                                                        $day = $chk->selectDay();
                                                        while ($day[$i]['day_name'] != "") {
                                                            ?>
                                                            <option value="<?php echo $day[$i]['day_name']; ?>"><?php echo $day[$i]['day_name']; ?></option>
                                                            <?php
                                                            $i = $i + 1;
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a class="addMore btn btn-primary btn-sm">+</a>
                                                    <a class="remove btn btn-danger btn-sm">-</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" title="Click to Save!" value="Check Clash" name="submit1" class="btn btn-success btn-lg padTop">
                                    <input type="submit" title="Click to Save!" value="Save Table" name="submit" class="btn btn-success btn-lg padTop">
                                </form>

                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('body').on('click', '.addMore', function () {
                            $(this).parent().parent().clone().insertAfter($(this).parent().parent());
                        });

                        $('body').on('click', '.remove', function () {
                            $(this).parent().parent().remove();
                        });
                        $('body').on('change', '.day', function () {
                            var day = $(this).val();
                            if ($.trim(day) != "") {
                                var time = $(this).parent().parent().find('.time').val();
                                var room = $(this).parent().parent().find('.room').val();
                                var course = $(this).parent().parent().find('.course').val();
                                //alert(course);
                                var days = $('.day').serializeArray();
                                var times = $('.time').serializeArray();
                                var rooms = $('.room').serializeArray();
                                var courses = $('.course').serializeArray();
                                var match = 0;
                                var threematch = 0;
                                
                                
                                for (var i = 0; i < days.length; i++) {
                                    if (day == days[i]['value'] && time == times[i]['value'] && 
                                    room == rooms[i]['value'] && course == courses[i]['value']){
                                        match++;
                                        threematch++;
                                    } else if (day == days[i]['value'] && time == times[i]['value'] && 
                                    room == rooms[i]['value']){
                                        threematch++;
                                    }
                                }
                                if(match > 1){
                                    $(this).parent().parent().find('.day').css('border', '1px solid red').val('');
                                    $(this).parent().parent().find('.time').css('border', '1px solid red').val('');
                                    $(this).parent().parent().find('.room').css('border', '1px solid red').val('');
                                    $(this).parent().parent().find('.course').css('border', '1px solid red').val('');
                                    $('#fourError').show();
                                } else if (threematch > 1){
                                    $(this).parent().parent().find('.day').css('border', '1px solid red').val('');
                                    $(this).parent().parent().find('.time').css('border', '1px solid red').val('');
                                    $(this).parent().parent().find('.room').css('border', '1px solid red').val('');
                                    $('#threeError').show();
                                    $(this).parent().parent().find('.course').css('border', '1px solid green');
                                } else {
                                    $(this).parent().parent().find('.day').css('border', '1px solid  green');
                                    $(this).parent().parent().find('.time').css('border', '1px solid green');
                                    $(this).parent().parent().find('.room').css('border', '1px solid green');
                                    $(this).parent().parent().find('.course').css('border', '1px solid green');
                                }
                            }

                        });
                        /*$("#s").click(function myCreateFunction() {
                         var table = document.getElementById("table1");
                         var row = table.insertRow(table.rows.length);
                         var cell1 = row.insertCell(0);
                         var cell2 = row.insertCell(1);
                         var cell3 = row.insertCell(2);
                         var cell4 = row.insertCell(3);
                         var cell5 = row.insertCell(4);
                         cell1.innerHTML = "NEW CELL1";
                         cell2.innerHTML = "NEW CELL2";
                         cell3.innerHTML = "NEW CELL1";
                         cell4.innerHTML = "NEW CELL4";
                         cell5.innerHTML = "NEW CELL1";
                         });*/
                        //var $t=$("#table1").rows.length;
                        $(document).ready(function () {
                            $(".contentContainer").css("min-height", $(window).height());
                            $(".form-control")
                                    .mouseenter(function () {
                                        $(this).css("background-color", "lightgrey");
                                    })
                                    .mouseleave(function () {
                                        $(this).css("background-color", "white");
                                    })
                                    .mousedown(function () {
                                        $(this).css("background-color", "white");
                                    });
                            $(document).tooltip();

                        });

                    </script>
                </body>  
            </html>
            <?php
        } else if ($_SESSION['name'] == "teacher") {
            header("location:teacherp.php?error=sorry you cannot go teacher this panel.");
        } else if ($_SESSION['name'] == "student") {
            header("location:studentp.php?error=sorry you cannot go student this panel.");
        }
        ?> 