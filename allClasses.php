<?php
error_reporting(0);

session_start();
if ($_GET['logout']==1 AND $_SESSION['id']!="") {
    session_destroy();
    $mess="You have been successfully logged out. Have a nice day!";
    session_start();
}

/**
* class technical servises
*/
class technicalServices
{
	function connection()
	{
		$link=mysqli_connect("localhost","root","","ttms");
		$err="";
		if (mysqli_connect_error()) {
			$err="Unable to connect the database";
			 echo '<div class="alert alert-danger alert-dismissable">'.addslashes($err).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
		}
		return $link;
	}
  function getCourseD($data)
  {
     $d=$this->connection();
    $query="SELECT `course_id`, `course_name` FROM `course_cataloge` WHERE course_id='$data'";
        $run=mysqli_query($d,$query);
        $result=mysqli_fetch_array($run);
        //echo $result;
        return $result;
  }
  function getRoomD($data)
  {
     $d=$this->connection();
    $query="SELECT * FROM `room_cataloge` WHERE room_id='$data'";
        $run=mysqli_query($d,$query);
        $result=mysqli_fetch_array($run);
        //echo $result;
        return $result;
  }
  function getTimeD($data)
  {
     $d=$this->connection();
    $query="SELECT * FROM `time_slot_table` WHERE time_id='$data'";
        $run=mysqli_query($d,$query);
        $result=mysqli_fetch_array($run);
        //echo $result;
        return $result;
  }
  function getDayD($data)
  {
     $d=$this->connection();
    $query="SELECT * FROM `day_table` WHERE day_id='$data'";
        $run=mysqli_query($d,$query);
        $result=mysqli_fetch_array($run);
      //  echo $result;
       return $result;
  }
   function verifyAdminLogin($mail,$pas)
   {
   	   $d=$this->connection();
		$query="SELECT * FROM admin_login WHERE email='$mail' AND pass='$pas'";
		$run=mysqli_query($d,$query);
		$result=mysqli_fetch_array($run);
		return $result;
   }
   function verifyTeacherLogin($mail,$pas)
   {
   	    $d=$this->connection();
		$query="SELECT * FROM teacher_login WHERE email='$mail' AND pass='$pas'";
		$run=mysqli_query($d,$query);
		$result=mysqli_fetch_array($run);
		return $result;
   }
   function verifyStudentLogin($mail,$pas)
   {
   	    $d=$this->connection();
		$query="SELECT * FROM student_login WHERE email='$mail' AND pass='$pas'";
		$run=mysqli_query($d,$query);
		$result=mysqli_fetch_array($run);
		return $result;
   }
   function enterSemester($data)
   {
   	   $d=$this->connection();
   	   $query="SELECT * FROM `semester_table` WHERE `sem_name`='$data'";
	   $results=mysqli_query($d,$query);
	   $result=mysqli_num_rows($results);
   	   if ($result) {
   	   	  $err="Sorry,".$data." semester name already registered.";
   	   	  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($err).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
   	   }
   	   else{
            $query="INSERT INTO `semester_table`(`sem_id`, `sem_name`) VALUES ('','$data')";
            $run=mysqli_query($d,$query);
	        if ($run) {
			    $mess="Semester Register Sucessfylly...!!";
		        echo '<div class="alert alert-success alert-dismissable">'.addslashes($mess).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            }
        }
   }
   function chkSemester($sem)
   {
      $d=$this->connection();
       $query="SELECT * FROM `semester_table` WHERE `sem_name`='$sem'";
       $results=mysqli_query($d,$query);
       $result=mysqli_num_rows($results);
       return $result;
   }
   function enterRoom($room)
   {
   	    $d=$this->connection();
   	    $query="SELECT * FROM `room_cataloge` WHERE `room_name`='$room'";
	    $results=mysqli_query($d,$query);
	    $result=mysqli_num_rows($results);
	    if ($result) {
   	   	  $err="Sorry,".$room." room name already registered.";
   	   	  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($err).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
   	   }
   	   else{
            $query="INSERT INTO `room_cataloge`(`room_id`, `room_name`) VALUES ('','$room')";
            $run=mysqli_query($d,$query);
	        if ($run) {
			    $mess="Room Register Sucessfylly...!!";
		        echo '<div class="alert alert-success alert-dismissable">'.addslashes($mess).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            }
        }
   }
   function delRoom($room)
   {
   	    $d=$this->connection();
   	    $query="SELECT * FROM `room_cataloge` WHERE `room_name`='$room'";
	    $results=mysqli_query($d,$query);
	    $result=mysqli_num_rows($results);
	    if (!$result) {
   	   	  $err="Sorry,".$room." doesn't exist.";
   	   	  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($err).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
   	   }
   	   else{
            $query="DELETE FROM `room_cataloge` WHERE `room_name`='$room'";
            $run=mysqli_query($d,$query);
	        if ($run) {
			    $mess="Room Deleted Sucessfylly...!!";
		        echo '<div class="alert alert-success alert-dismissable">'.addslashes($mess).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            }
        }
   }
   function upRoom($new,$old)
   {
   	    $d=$this->connection();
   	    $query="SELECT * FROM `room_cataloge` WHERE `room_name`='$old'";
	    $results=mysqli_query($d,$query);
	    $result=mysqli_num_rows($results);
	    if (!$result) {
   	   	  $err="Sorry,".$old." Room you want to update does not exist.";
   	   	  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($err).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
   	   }
   	   else{
   	   	    if ($new!="") {
   	   	    	$query="SELECT * FROM `room_cataloge` WHERE `room_name`='$new'";
	            $resuts=mysqli_query($d,$query);
	            $resul=mysqli_num_rows($resuts);
	            if ($resul) {
   	   	            $err="Sorry,".$new." Room already exist.";
   	   	            echo '<div class="alert alert-danger alert-dismissable">'.addslashes($err).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
   	            }else if (!$resul) {
   	            	$query="UPDATE `room_cataloge` SET `room_name`='$new' WHERE `room_name`='$old'";
                    $run=mysqli_query($d,$query);
	                    if ($run) {
			                $mess="Room Updated Sucessfylly...!!";
		                    echo '<div class="alert alert-success alert-dismissable">'.addslashes($mess).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
                        }
   	                }
   	   	    }
            
        }
   }
   function templ($data)
   {
   	if ($data=="1") {
   		$d=$this->connection();
   	    $query="SELECT * FROM `template` WHERE `subject`='class cancellation teacher'";
	    $results=mysqli_query($d,$query);
	    $result=mysqli_fetch_array($results);
	    if ($result) {
   	   	  return $result;
   	   	}
   	} else if ($data=="2") {
   		$d=$this->connection();
   	    $query="SELECT * FROM `template` WHERE `subject`='class cancellation student'";
	    $results=mysqli_query($d,$query);
	    $result=mysqli_fetch_array($results);
	    if ($result) {
   	   	  return $result;
   	   	}
   	}
   }
   function getCourse()
   {
   	    $d=$this->connection();
   	    $query="SELECT * FROM `course_cataloge`";
	    $results=mysqli_query($d,$query);
	    //$result=mysqli_fetch_array($results);
	    $aray = array();
	    if ($results) {
   	   	  while($result=mysqli_fetch_assoc($results))
   	   	  {
   	   	  	$aray[]=$result;
   	   	  }
   	   	  return $aray;
   	   	}
   }
   function getDay()
   {
   	    $d=$this->connection();
   	    $query="SELECT * FROM `day_table`";
	    $results=mysqli_query($d,$query);
	    $aray = array();
	    if ($results) {
   	   	  while($result=mysqli_fetch_assoc($results))
   	   	  {
   	   	  	$aray[]=$result;
   	   	  }
   	   	  return $aray;
   	   	}
   }
   function getTime()
   {
   	    $d=$this->connection();
   	    $query="SELECT * FROM `time_slot_table`";
	    $results=mysqli_query($d,$query);
	    $aray = array();
	    if ($results) {
   	   	  while($result=mysqli_fetch_assoc($results))
   	   	  {
   	   	  	$aray[]=$result;
   	   	  }
   	   	  return $aray;
   	   	}
   }
   function getRoom()
   {
        $d=$this->connection();
   	    $query="SELECT * FROM `room_cataloge`";
	    $results=mysqli_query($d,$query);
	    $aray = array();
	    if ($results) {
   	   	  while($result=mysqli_fetch_assoc($results))
   	   	  {
   	   	  	$aray[]=$result;
   	   	  }
   	   	  return $aray;
   	   	}
   }
   function verifyTeacherMail($mail)
   {
        $d=$this->connection();
   	    $query="SELECT * FROM `teacher_login` WHERE `email`='$mail'";
	    $results=mysqli_query($d,$query);
	    $result=mysqli_fetch_array($results);
	    return $result;
   }
   function messageToTeacher($sub,$des,$get)
   {
        $d=$this->connection();
        $query="INSERT INTO `message`(`message_id`, `subject`, `description`, `template_id`) VALUES ('','$sub','$des','$get')";
        $run=mysqli_query($d,$query);
        $query1="SELECT * FROM `message` WHERE `subject`='$sub' AND `description`='$des' AND `template_id`='$get'";
        $run1=mysqli_query($d,$query1);
	    $result=mysqli_fetch_array($run1);
        return $result;
   }
   function messageToStudent($sub,$des,$get)
   {
        $d=$this->connection();
        $query="INSERT INTO `message`(`message_id`, `subject`, `description`, `template_id`) VALUES ('','$sub','$des','$get')";
        $run=mysqli_query($d,$query);
        $query1="SELECT * FROM `message` WHERE `subject`='$sub' AND `description`='$des' AND `template_id`='$get'";
        $run1=mysqli_query($d,$query1);
	    $result=mysqli_fetch_array($run1);
        return $result;
   }
   function foreignTeacher($mailid,$messageid)
   {
   	 $d=$this->connection();
        $query="INSERT INTO `message_teacher_table` VALUES ('','$mailid','$messageid')";
        $run=mysqli_query($d,$query);
        return $run;
   }
   function foreignStd($courseid,$messagid)
   {
   	 $d=$this->connection();
        $query="INSERT INTO `message_student_table`(`message_s_rec_id`, `course_id`, `message_id`) VALUES ('','$courseid','$messagid')";
        $run=mysqli_query($d,$query);
        return $run;
   }
  function getTeacherId($id)
  {
  	$d=$this->connection();
  	$query="SELECT * FROM `message_teacher_table` WHERE teacher_id='$id'";
  	$run=mysqli_query($d,$query);
  	$aray1 = array();
	    if ($run) {
	    	//$i=0;
   	   	  while($result=mysqli_fetch_assoc($run))
   	   	  {
   	   	  	$aray1[]= $result;
   	   	  	//echo $array[0]['message_id'];
   	   	  	//$i++;
   	   	  }
   	   	  return $aray1;
   	   	}
  }
  function getCId($id)
  {
  	$d=$this->connection();
  	$query="SELECT * FROM `offered_c_t_std` WHERE student_id=$id";
  	$run=mysqli_query($d,$query);
  	$aray4 = array();
	    if ($run) {
   	   	  while($result=mysqli_fetch_assoc($run))
   	   	  {
   	   	  	$aray4[]= $result;
   	   	  }
   	   	}
   	$i=0;
   	$aray2 = array();
   	while($aray4[$i]['course_id']!=""){
   		$l=$aray4[$i]['course_id'];
        $query1="SELECT * FROM `message_student_table` WHERE course_id='$l'";
        $run1=mysqli_query($d,$query1);
        if ($run1) {
        	while($result1=mysqli_fetch_assoc($run1))
   	   	  {
   	   	  	$aray2 []= $result1;
   	   	  }
        }
        $i++;
    }
    return $aray2;
  }
  function getCourseId($cou)
  {
  	$d=$this->connection();
  	$query="SELECT * FROM `course_cataloge` WHERE `course_name`='$cou'";
  	$run=mysqli_query($d,$query);
  	$result=mysqli_fetch_array($run);
  	return $result;
  }
  function getMessage($mid)
  {
  	$d=$this->connection();
  	$query="SELECT * FROM `message` WHERE message_id='$mid'";
  	 $run=mysqli_query($d,$query);
  	 $result=mysqli_fetch_array($run);
  	 //echo $result['subject'];
  	 //echo $result['description'];
     return $result;
  }
  function showSemDetail($sem)
  {
      $d=$this->connection();
      $query1="SELECT * FROM `semester_table` WHERE sem_name='$sem'";
      $run1=mysqli_query($d,$query1);
      $reult1=mysqli_fetch_array($run1);
      $data=$reult1['sem_id'];
      $query="SELECT * FROM `time_table` WHERE sem_id='$data'";
      $run=mysqli_query($d,$query);
      $e=array();
      if ($run) {
        while ($result=mysqli_fetch_assoc($run)) {
          $e[]=$result;
          //echo $result['room_id'];
        }
      }
      return $e;
  }
  function getCou($res)
  {
      $d=$this->connection();
      $i=0;
      $f=array();
      while ($res[$i]['course_id']!="") {
        $data=$res[$i]['course_id'];
        $query1="SELECT * FROM `course_cataloge` WHERE course_id='$data'";
        $run1=mysqli_query($d,$query1);
        $result=mysqli_fetch_array($run1);
          $f[]=$result;
          //echo $f[$i]['course_name']."<br>";
          //print_r($f[$i]['course_name']);
          $i++;
      }
      return $f;
  }
  
  function getTim($res)
  {
    $d=$this->connection();
      $i=0;
      $f=array();
      while ($res[$i]['time_id']!="") {
        $data=$res[$i]['time_id'];
        $query1="SELECT * FROM `time_slot_table` WHERE time_id='$data'";
        $run1=mysqli_query($d,$query1);
        $result=mysqli_fetch_array($run1);
          $f[]=$result;
         // echo $f[$i]['time_slot']."<br>";
          //print_r($f[$i]['course_name']);
          $i++;
      }
      return $f;
  }
  function getRom($res)
  {
    $d=$this->connection();
      $i=0;
      $f=array();
      while ($res[$i]['room_id']!="") {
        $data=$res[$i]['room_id'];
        $query1="SELECT * FROM `room_cataloge` WHERE room_id='$data'";
        $run1=mysqli_query($d,$query1);
        $result=mysqli_fetch_array($run1);
          $f[]=$result;
         //echo $f[$i]['room_name']."<br>";
          //print_r($f[$i]['course_name']);
          $i++;
      }
      return $f;
  }
  function getd($res)
  {
    $d=$this->connection();
      $i=0;
      $f=array();
      while ($res[$i]['day_id']!="") {
        $data=$res[$i]['day_id'];
        $query1="SELECT * FROM `day_table` WHERE day_id='$data'";
        $run1=mysqli_query($d,$query1);
        $result=mysqli_fetch_array($run1);
          $f[]=$result;
         //echo $f[$i]['day_id']."<br>";
          //print_r($f[$i]['course_name']);
          $i++;
      }
      return $f;
  }
  function saveTable($data,$get){
    $i=0;
    while ($data[$i]!="") {
    $d=$this->connection();
    $e=$data[$i];
    $query="SELECT course_id FROM `course_cataloge` WHERE course_name='$e'";
    $run=mysqli_query($d,$query);
    $result=mysqli_fetch_array($run);
    $r1=$result['course_id'];
    $i++;
    $e=$data[$i];
    $query2="SELECT room_id FROM `room_cataloge` WHERE room_name='$e'";
    $run2=mysqli_query($d,$query2);
    $result=mysqli_fetch_array($run2);
    $r2=$result['room_id'];
    $i++;
    $e=$data[$i];
    $query1="SELECT time_id FROM `time_slot_table` WHERE time_slot='$e'";
    $run1=mysqli_query($d,$query1);
    $result=mysqli_fetch_array($run1);
    $r3=$result['time_id'];
    $i++;
    $e=$data[$i];
    $query3="SELECT day_id FROM `day_table` WHERE day_name='$e'";
    $run3=mysqli_query($d,$query3);
    $result=mysqli_fetch_array($run3);
    $r4=$result['day_id'];
    $i++;
    $query4="SELECT sem_id FROM `semester_table` WHERE sem_name='$get'";
    $run4=mysqli_query($d,$query4);
    $result=mysqli_fetch_array($run4);
    $r5=$result['sem_id'];
    $query5="INSERT INTO `time_table`(`lecture_id`, `course_id`, `time_id`, `room_id`, `sem_id`, `day_id`) VALUES ('','$r1','$r3','$r2','$r5','$r4')";
    $run5=mysqli_query($d,$query5);
  }
  return "done";
  }
  function stdCourse()
  {
    $d=$this->connection();
    $query="SELECT * FROM `offered_c_t_std` WHERE student_id=1";
    $run=mysqli_query($d,$query);
    $e=array();
    if ($run) {
      while ($result=mysqli_fetch_array($run)) {
        $e[]=$result;
      }
      $i=0;
      while ($e[$i]['course_id']) {
        $n=$e[$i]['course_id'];
        //echo $n;
        $query1="SELECT * FROM `course_cataloge` WHERE course_id='$n'";
        $run1=mysqli_query($d,$query1);
        $result1=mysqli_fetch_array($run1);
        $f[]=$result1['course_name'];
        //print_r($f);
        //echo $f['course_name'];
        $i++;
      }
     //print_r($f);
      return $f;
    }
  }
  function getSemData($data)
  {
    $d=$this->connection();
    $query1="SELECT * FROM `semester_table` WHERE sem_name='$data'";
    $run1=mysqli_query($d,$query1);
    $reult1=mysqli_fetch_array($run1);
    $data1=$reult1['sem_id'];
    $query="SELECT * FROM `time_table` WHERE sem_id='$data1'";
    $run=mysqli_query($d,$query);
    while($result=mysqli_fetch_array($run))
    {
      $e[]=$result;
    }
    return $e;
  }
}
/**
* this class get data from timetable1.php
*/
class TimeTable1Controller
{
  
  function getSemId()
  {
    $semId=$_POST['sID'];
    return $semId;
  }
  function getsub()
  {
    $sub=$_POST['submit'];
    return $sub;
  }
}
/**
* this class redirect to page timetable2.php
*/
class TimeTable2
{
  private $semId;
  function TimeTable2()
  {
    $chk=new TimeTable1Controller;
    $this->semId=$chk->getSemId();
  }
  function RTT2P()
  {
    $chk=new TimeTable1Controller;
    $sub=$chk->getsub();
    if ($sub=="Next") {
      if ($this->semId=="") {
          $error="Please enter semester name in the field.";
            echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
        }
        else{
          if(strlen($this->semId)>5 || strlen($this->semId)<5){
            $error.="<br>Please enter 5 digit semester ID  i.e:2017S( mean 2017 Spring) ";
              echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            } else{
              if(preg_match('/^20[0-9]{2}(F|S){1}$/', $this->semId)){
              $d=new technicalServices;
              $s=$d->chkSemester($this->semId);
               if ( $s) {
                  ?>
                  <script type="text/javascript">
                  window.location.href="timetable2.php?sem=<?php echo $this->semId; ?>";
                  </script>
                  <?php
               }else{
                $error.="<br>Sorry, Semester ".$this->semId." does not exist.";
                  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            
                }
              }else{
                  $error.="<br>Please enter correct format  i.e:2017S( mean 2017 S=Spring and F=Fall) ";
                  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            
                }
            }
      }

    }
  }
}
/**
* this class is controller class and gets data from olda.php interface
*/
class OldTimeTableAdminController
{
  
  function getSemId()
  {
    $sem=$_POST['sID'];
    return $sem;
  }
  function getsub()
  {
    $sub=$_POST['submit'];
    return $sub;
  }
}
/**
* this class handel olda.php
*/
class OldTimeTabelAdmin
{
  private $semId;
  function OldTimeTabelAdmin()
  {
    $chk=new OldTimeTableAdminController;
    $this->semId=$chk->getSemId();
  }
  function next()
  {
    $e=new OldTimeTableAdminController;
    $sub1=$e->getsub();
    if($sub1=="View Time Table")
    {
      if ($this->semId=="") {
          $error="Please enter semester name in the field.";
            echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
        }
        else{
          if(strlen($this->semId)>5 || strlen($this->semId)<5){
            $error.="<br>Please enter 5 digit semester ID  i.e:2017S( mean 2017 Spring) ";
              echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            } else{
              if(preg_match('/^20[0-9]{2}(F|S){1}$/', $this->semId)){
              $d=new technicalServices;
              $s=$d->chkSemester($this->semId);
               if ( $s) {
                  ?>
                  <script type="text/javascript">
                  window.location.href="oldat.php?sem=<?php echo $this->semId; ?>";
                  </script>
                  <?php
               }else{
                $error.="<br>Sorry, Semester ".$this->semId." does not exist.";
                  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            
                }
              }else{
                  $error.="<br>Please enter correct format  i.e:2017S( mean 2017 S=Spring and F=Fall) ";
                  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            
                }
            }
      }
   }
  }
}
/**
* this class is controller class and gets data from old.php interface
*/
class OldTimeTableTeacherController
{
  
  function getSemId()
  {
    $sem=$_POST['sID'];
    return $sem;
  }
  function getsub()
  {
    $sub=$_POST['submit'];
    return $sub;
  }
}
/**
* this class handle the page of old.php page and gets data from OldTimeTableTeacherController class
*/
class OldTimeTableTeacher
{
  private $semId;
  function OldTimeTableTeacher()
  {
    $chk=new OldTimeTableTeacherController;
    $this->semId=$chk->getSemId();
  }
  function nextPage()
  {
     $e=new OldTimeTableTeacherController;
    $Subm=$e->getsub();
    if ($Subm=="View Time Table") {
       if ($this->semId=="") {
          $error="Please enter semester name in the field.";
            echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
        }
        else{
          if(strlen($this->semId)>5 || strlen($this->semId)<5){
            $error.="<br>Please enter 5 digit semester ID  i.e:2017S( mean 2017 Spring) ";
              echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            }
            else{
              if(preg_match('/^20[0-9]{2}(F|S){1}$/', $this->semId)){
              $d=new technicalServices;
              $s=$d->chkSemester($this->semId);
              if($s)
              {
                header("location:oldt.php?sem=$this->semId");
              }else{
                $error.="<br>Sorry, Semester ".$this->semId." does not exist.";
                  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            
              }
                    }else{
                      $error.="<br>Please enter correct format  i.e:2017S( mean 2017 S=Spring and F=Fall) ";
                  echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
            
                    }
          }
        }
    }
  }
}
/**
* 
*/
class ShowOldTable
{
  function showCourse()
  {
    $sem1=$_GET['sem'];
    $chk=new technicalServices;
    $res=$chk->showSemDetail($sem1);
   // echo $res[0]['course_id'];
    $cour=$chk->getCou($res);
    return $cour;
  }
  function showRoom()
  {
    $sem1=$_GET['sem'];
    $chk=new technicalServices;
    $res=$chk->showSemDetail($sem1);
   // echo $res[0]['time_id'];
    $rom=$chk->getRom($res);
    return $rom;
  }
  function showTime()
  {
    $sem1=$_GET['sem'];
    $chk=new technicalServices;
    $res=$chk->showSemDetail($sem1);
   // echo $res[0]['time_id'];
    $time=$chk->getTim($res);
    return $time;
  }
  function showDay()
  {
    $sem1=$_GET['sem'];
    $chk=new technicalServices;
    $res=$chk->showSemDetail($sem1);
   // echo $res[0]['time_id'];
    $day=$chk->getd($res);
    return $day;
  }
}
/**
* this is controller class and gets data from admin login interface and pass to AdminLogin class
*/
class AdminController
{
	function getAdminMail()
	{
		$acmail=$_POST['email'];
		return $acmail;
	}
	function getAdminPass()
	{
		$acpass=$_POST['pass'];
		return $acpass;
	}
	function getAdminSub()
	{
		$acsubmit=$_POST['submit'];
		return $acsubmit;
	}
	function getAdminRad()
	{
		$acRad=$_POST['login'];
		return $acRad;
	}
}
/**
* class admin verification it verify the admin login and return message
*/
class AdminLogin
{	
	private $amail;
	private $apass;
	function AdminLogin()
	{
		$amp=new AdminController();
		$this->amail=$amp->getAdminMail();
		$this->apass=$amp->getAdminPass();
	}
	function loginAdmin()
	{
		$amp=new AdminController();
		$submit=$amp->getAdminSub();
		$aRad=$amp->getAdminRad();
        if ($submit=="Log In" && $aRad=="admin") {
	    if($this->amail=="" AND $this->apass==""){
           $error= "Please enter both email and password for log in.";
           echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	     }else if($this->amail=="" AND $this->apass!=""){
           $error= "Please enter an email and also password again for log in.";
           echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	      }
	     else if($this->apass=="")
	      {
		    $error= "Please enter an email again and password for log in.";
		    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	      }else{
		    $chk=new technicalServices;
		    $c=$chk->verifyAdminLogin($this->amail,$this->apass);
		    if ($c) {
		        $_SESSION['id']=$c['admin_id'];
		        $_SESSION['name']="admin";
			    header("location:adminp.php");
		  }
		else{
			$error= "Please enter correct email or password.";
			echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
		  }
	     }
        }
	}
}
/**
* this is controller class and gets data from teachers login interface and pass to Teacher login Class
*/
class TeacherController
{
	function getTeacherMail()
	{
		$tcmail=$_POST['email'];
		return $tcmail;
	}
	function getTeacherPass()
	{
		$tcpass=$_POST['pass'];
		return $tcpass;
	}
	function getTeacherSub()
	{
		$tcsubmit=$_POST['submit'];
		return $tcsubmit;
	}
	function getTeacherRad()
	{
		$tcRad=$_POST['login'];
		return $tcRad;
	}
}
/**
* this class verify teacher only
*/
class TeacherLogin
{
	private $tmail;
	private $tpass;
	function TeacherLogin()
	{
		$tmp=new TeacherController();
		$this->tmail=$tmp->getTeacherMail();
		$this->tpass=$tmp->getTeacherPass();
	}
	function loginTeacher()
	{
		$tmp=new TeacherController();
		$submit=$tmp->getTeacherSub();
		$tRad=$tmp->getTeacherRad();
        if ($submit=="Log In" && $tRad=="teacher") {
	    if($this->tmail=="" AND $this->tpass==""){
           $error= "Please enter both email and password for log in.";
           echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	     }else if($this->tmail=="" AND $this->tpass!=""){
           $error= "Please enter an email and also password again for log in.";
           echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	      }
	     else if($this->tpass=="")
	      {
		    $error= "Please enter an email again and password for log in.";
		    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	      }else{
		    $chk=new technicalServices;
		    $c=$chk->verifyTeacherLogin($this->tmail,$this->tpass);
		    if ($c) {
		        $_SESSION['id']=$c['teacher_id'];
		        $_SESSION['name']="teacher";
			    header("location:teacherp.php");
		  }
		else{
			$error= "Please enter correct email or password.";
			echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
		  }
	     }
        }
	}
}
/**
* this is controller class and gets data from Students login interface and pass to Student login Class
*/
class StudentController
{
	function getStudentMail()
	{
		$scmail=$_POST['email'];
		return $scmail;
	}
	function getStudentPass()
	{
		$scpass=$_POST['pass'];
		return $scpass;
	}
	function getStudentSub()
	{
		$scsubmit=$_POST['submit'];
		return $scsubmit;
	}
	function getStudentRad()
	{
		$scRad=$_POST['login'];
		return $scRad;
	}
}
/**
* this class verify students login only
*/
class StudentLogin
{
	private $smail;
	private $spass;
	function StudentLogin()
	{
		$tmp=new StudentController();
		$this->smail=$tmp->getStudentMail();
		$this->spass=$tmp->getStudentPass();
	}
	function loginStudent()
	{
		$tmp=new StudentController();
		$submit=$tmp->getStudentSub();
		$sRad=$tmp->getStudentRad();
        if ($submit=="Log In" && $sRad=="std") {
	    if($this->smail=="" AND $this->spass==""){
           $error= "Please enter both email and password for log in.";
           echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	     }else if($this->smail=="" AND $this->spass!=""){
           $error= "Please enter an email and also password again for log in.";
           echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	      }
	     else if($this->spass=="")
	      {
		    $error= "Please enter an email again and password for log in.";
		    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
	      }else{
		    $chk=new technicalServices;
		    $c=$chk->verifyStudentLogin($this->smail,$this->spass);
		    if ($c) {
		       $_SESSION['id']=$c['std_id'];
		       $_SESSION['name']="student";
			   header("location:studentp.php");
		  }
		else{
			$error= "Please enter correct email or password.";
			echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
		  }
	     }
        }
	}
}
/**
* this class get data from semester interfaces of admin panel and send it to funtion registerSem of Admin panel class.
*/
class SemesterController
{
	function getSub()
	{
		$sub=$_POST['submit'];
		return $sub;
	}
	function getSemName()
	{
		$semName=$_POST['sID'];
		return $semName;
	}
}
/**
* this is controller class gets data from add room interface and pass to regrister romm function
*/
class AddRoomController
{
	function getRoomName()
	{
		$room=$_POST['addroom'];
		return $room;
	}
	function getRoomSub()
	{
		$subm=$_POST['submit'];
		return $subm;
	}
}
/**
* this is controller class gets data from delete room interface and pass to delete room function
*/
class DeleteRoomController
{
	function getRoom()
	{
		$roomd=$_POST['delroom'];
		return $roomd;
	}
	function getRoomSub()
	{
		$subm=$_POST['submit'];
		return $subm;
	}
}
/**
* this is controller class gets data from update room interface and pass to update room function
*/
class UpdateRoomController
{
	function getOldRoom()
	{
		$roomUO=$_POST['oldroom'];
		return $roomUO;
	}
	function getNewRoom()
	{
		$roomN=$_POST['newroom'];
		return $roomN;
	}
	function getRoomSub()
	{
		$subm=$_POST['submit'];
		return $subm;
	}
}
/**
* this is controller class gets data from update room interface and pass to update room function
*/
class TemplateController
{
	function getTempId()
	{
		$subm=$_GET['template'];
		return $subm;
	}
}
/**
* this controller class get data from interface and send to  semdMessage to teacher function
*/
class MessageTeacherController
{
	
	function getMial()
	{
		$mail=$_POST['mail'];
		return $mail;
	}
	function getSubject()
	{
		$subject=$_POST['subject'];
		return $subject;
	}
	function getDesc()
	{
		$desp=$_POST['description'];
		return $desp;
	}
	function getSub()
	{
		$submt=$_POST['submit'];
		return $submt;
	}
}
/**
* this controller class get data from interface and send to  sendMessage to student function
*/
class MessageStudentController
{
	
	function getCourse()
	{
		$course=$_POST['course'];
		return $course;
	}
	function getSubject()
	{
		$subject=$_POST['subject'];
		return $subject;
	}
	function getDesc()
	{
		$desp=$_POST['description'];
		return $desp;
	}
	function getSub()
	{
		$submt=$_POST['submit'];
		return $submt;
	}
}
/**
* this class sends data to student and teacher
*/
class SendMessage
{
	private $teacherMail;
	Private $teacherSubject;
	private $teacherDes;
	private $course;
	Private $stdSubject;
	private $stdDes;
	function SendMessage()
	{
		$chk=new MessageTeacherController;
		$this->teacherMail=$chk->getMial();
		$this->teacherSubject=$chk->getSubject();
		$this->teacherDes=$chk->getDesc();
		$chk1=new MessageStudentController;
		$this->course=$chk1->getCourse();
		$this->stdSubject=$chk->getSubject();
		$this->stdDes=$chk->getDesc();
	}
	function sendMessageTeacher()
	{
		$chk=new MessageTeacherController;
		$sub=$chk->getSub();
		$get=$_GET['template'];
		if ($sub=="Send to Teacher") {
			if($this->teacherSubject=="" AND $this->teacherDes=="          ")
			{
				$error= "Please enter Message Subject and Message Description.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->teacherDes=="          ") {
				$error= "Please enter Message Description.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->teacherSubject=="") {
				$error= "Please enter Message Subject.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if($this->teacherSubject!="" AND $this->teacherDes!="")
			{
				$d=new technicalServices;
				$s=$d->verifyTeacherMail($this->teacherMail);
				if($s=="")
				{
					$error= "<strong>Warning!</strong> Please enter correct email of teacher.";
			        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
				}else
				{
					$e=new technicalServices;
					$f=$e->messageToTeacher($this->teacherSubject,$this->teacherDes,$get);
					$g=$e->foreignTeacher($s['teacher_id'],$f['message_id']);
					if($g=="")
					{
						$error="Sorry,Message not Sent...!!";
		                echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
                    }else
                    {
                        
                        $mess="<strong>Success!</strong> Message Sucessfylly Sent...!!";
		                echo '<div class="alert alert-success alert-dismissable">'.addslashes($mess).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
                    
                    }
				}
			}
		}
	}
	function sendMessageStudent()
	{
		$chk=new MessageStudentController;
		$sub=$chk->getSub();
		$get1=$_GET['template'];
		if ($sub=="Send to Student") {
			if($this->course=="" AND $this->stdSubject=="" AND $this->stdDes=="          ")
			{
				$error= "<strong>Warning!</strong> Please enter Message Subject and Message Description and Select a course.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->stdDes=="          " AND $this->stdSubject=="") {
				$error= "<strong>Warning!</strong> Please enter Message Description and  Message Subject.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->stdDes=="          " AND $this->course=="") {
				$error= "<strong>Warning!</strong> Please enter Message Description and  Select a course.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->stdSubject=="" AND $this->course=="") {
				$error= "<strong>Warning!</strong> Please enter Message Subject and Select a course.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->stdSubject=="") {
				$error= "<strong>Warning!</strong> Please enter Message Subject.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->course=="") {
				$error= "<strong>Warning!</strong> Please Select a course.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if ($this->stdDes=="          ") {
				$error= "<strong>Warning!</strong> Please enter Message Description.";
			    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
			}else if($this->stdSubject!="" AND $this->stdDes!="          " AND $this->course!="")
			{
				
				{
					$e=new technicalServices;
					$f=$e->messageToStudent($this->stdSubject,$this->stdDes,$get1);
                    $c=$e->getCourseId($this->course);
					$g=$e->foreignStd($c['course_id'],$f['message_id']);
					if($g=="")
					{
						$error="<strong>Warning!</strong> Sorry,Message not Sent...!!";
		                echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
                    }else
                    {
                        
                        $mess="<strong>Success!</strong> Message Sucessfylly Sent...!!";
		                echo '<div class="alert alert-success alert-dismissable">'.addslashes($mess).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
                    
                    }
				}
			}
		}
	}
	   
}
/**
* this class display messages from database to teacher panel
*/
class DisplayMessage
{
	
	function displayTeacherMessage()
	{
		$chk=new technicalServices;
		$d=$chk->getTeacherId($_SESSION['id']);
		$i=0;
		$e=array();
		//echo $d[$i]['message_id'];
		while($d[$i]['message_id']!="")
		{
			$e[]=$chk->getMessage($d[$i]['message_id']);
			//echo $e[$i]['subject'];
			//echo $e[$i]['description'];
			$i++;
		}
		return $e;
	}
	function displayStudentMessage()
	{
		$chk=new technicalServices;
		$d=$chk->getCId($_SESSION['id']);
		$i=0;
		$e=array();
		while($d[$i]['message_id']!="")
		{
			$e[]=$chk->getMessage($d[$i]['message_id']);
			//echo $e[$i]['subject'];
			//echo $e[$i]['description'];
			$i++;
		}
		return $e;
	}
}
/**
* this class controls all the function of admin panel
*/
class AdminPanel
{
	private $semN;
	private $roomName;
	private $roomDel;
	private $sub4;
	private $oldRoom;
	private $newRoom;
	private $tempId;
	function AdminPanel()
	{
        $regSem=new SemesterController();
		$this->semN=$regSem->getSemName();
		$regRoom=new AddRoomController();
		$this->roomName=$regRoom->getRoomName();
		$delRoom=new DeleteRoomController();
		$this->roomDel=$delRoom->getRoom();
		$upRoom=new UpdateRoomController();
		$this->oldRoom=$upRoom->getOldRoom();
		$this->newRoom=$upRoom->getNewRoom();
		$this->sub4=$upRoom->getRoomSub();
		$temp=new TemplateController();
		$this->tempId=$temp->getTempId();
	}
	/**
    * registerSem() function basically register the semester by its name taking from SemesterController class.
    */
	function registerSem()
	{
		$regSem=new SemesterController();
		$sub1=$regSem->getSub();
		if ($sub1=="Register") {
		    if ($this->semN=="") {
			    $error="<strong>Warning!</strong> Please enter semester name in the field.";
		        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
		    }
		    else{
		    	if(strlen($this->semN)>5 || strlen($this->semN)<5){
		    		$error.="<br><strong>Warning!</strong> Please enter 5 digit semester ID  i.e:2017S( mean 2017 Spring) ";
		    	    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
		        }
		        else{
		        	if(preg_match('/^20[0-9]{2}(F|S){1}$/', $this->semN)){
			        $d=new technicalServices;
			        $d->enterSemester($this->semN);
                    }else{
                    	$error.="<strong>Warning!</strong> Please enter correct format  i.e:2017S( mean 2017 S=Spring and F=Fall) ";
		    	        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
		        
                    }
			    }
		    }
	    }
    }
    /**
    * registerRoom() function basically register the Room by its name taking from AddRoomController class.
    */
    function registerRoom()
    {
    	$regRoom=new AddRoomController();
		$sub2=$regRoom->getRoomSub();
         if ($sub2=="Add Room") {
         	if ($this->roomName=="") {
         		$error="<strong>Warning!</strong> Please enter Room name in the field.";
		        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
         	}else
         	{
         		if (strlen($this->roomName)>4 || strlen($this->roomName)<4) {
         			$error.="<strong>Warning!</strong> Please enter 4 digit Room Name   i.e:R203";
		    	    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
         		}
         		else
         		{
         			if(preg_match('/^R[0-9]{3}$/', $this->roomName)){
			        $d=new technicalServices;
			        $d->enterRoom($this->roomName);
                    }else{
                    	$error.="<strong>Warning!</strong> Please enter correct format  i.e:R203";
		    	        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close top" type="button"  data-dismiss="alert">x</button></div>';
		        
                    }
         		}
         	}
         }
    }
    /**
    * deleteRoom() function basically delete the room by its name taking from DeleteRoomController() class.
    */
    function deleteRoom()
    {
    	$delRoom=new DeleteRoomController();
		$sub3=$delRoom->getRoomSub();
    	if ($sub3=="Delete Room") {
    		if ($this->roomDel=="") {
    			$error="<strong>Warning!</strong> Please enter Room name in the field you want to delete.";
		        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
    		}else
    		{
    			if (strlen($this->roomDel)>4 || strlen($this->roomDel)<4) {
         			$error.="<strong>Warning!</strong> Please enter 4 digit Room Name   i.e:R203";
		    	    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
         		}
         		else
         		{
         			if(preg_match('/^R[0-9]{3}$/', $this->roomDel)){
			        $d=new technicalServices;
			        $d->delRoom($this->roomDel);
                    }else{
                    	$error.="<strong>Warning!</strong> Please enter correct format  i.e:R203";
		    	        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close top" type="button"  data-dismiss="alert">x</button></div>';
                    }
         		}
    		}
    	}
    }
    /**
    * updateRoom() function basically update the room by its name taking from UpdateRoomController() class.
    */
    function updateRoom()
    {
    	$upRoom=new UpdateRoomController();
		$sub4=$upRoom->getRoomSub();
        if ($sub4=="Update Room") {
        	if ($this->oldRoom=="" && $this->newRoom=="") {
    			$error="<strong>Warning!</strong> Please enter both old and new Room name in the field you want to Update.";
		        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
    		} else
    		if ($this->oldRoom=="") {
    			$error="<strong>Warning!</strong> Please enter old Room name in the field you want to Update.";
		        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
    		}else
    		if ($this->newRoom=="") {
    			$error="<strong>Warning!</strong> Please enter new Room name in the field you want to Update.";
		        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
    		} else
    		{
    			if (strlen($this->newRoom)>4 || strlen($this->newRoom)<4 || strlen($this->oldRoom)>4 || strlen($this->oldRoom)<4) {
         			$error.="<strong>Warning!</strong> Please enter 4 digit Room Name  in both fields. i.e:R203";
		    	    echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
         		}
         		else
         		{
         			$p1=preg_match('/^R[0-9]{3}$/', $this->newRoom) ;
         			$p2=preg_match('/^R[0-9]{3}$/', $this->oldRoom);
         			if($p1 && $p2){
			        $d=new technicalServices;
			        $d->upRoom($this->newRoom,$this->oldRoom);
                    }else{
                    	$error.="<strong>Warning!</strong> <br>Please enter correct format in both fields.  i.e:R203";
		    	        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close top" type="button"  data-dismiss="alert">x</button></div>';
                    }
         		}
    		}
        }
    }
    /**
    * selectTemplate() function basically select template from selectTemp() function of technical services.
    */
    function selectTemplate()
    {
    	if ($this->tempId=="1") {
    		$d=new technicalServices;
			$e=$d->templ($this->tempId);
			return $e;
    	}
    	else if ($this->tempId=="2") {
    		$d=new technicalServices;
			$f=$d->templ($this->tempId);
			return $f;
    	}
    }
}
/**
* this class  select courses from database and sent to interfaec
*/
class CourseCataloge
{
	
	function sCourse()
	{
		$d=new technicalServices;
    	$chk=$d->getCourse();
    	return $chk;
	}
}
/**
* this class  select Day from database and sent to interfaec
*/
class Day
{
	
	function sDay()
	{
		$d=new technicalServices;
     	$chk=$d->getDay();
    	return $chk;
	}
}
/**
* this class  select Day from database and sent to interfaec
*/
class TimeSlot
{
	
	function sTime()
	{
		$d=new technicalServices;
     	$chk=$d->getTime();
    	return $chk;
	}
}
/**
* this class  select Room from database and sent to interfaec
*/
class RoomCataloge
{
	
	function sRoom()
	{
		$d=new technicalServices;
     	$chk=$d->getRoom();
    	return $chk;
	}
}
/**
* this class takes data from timetable2.php page
*/
class TimeTableController
{
	function getTimeTableSubmit()
	{
		$c=$_POST['submit'];
		return $c;
	}
	function getClashValue()
	{
		$c=$_POST['submit1'];
		return $c;
	}
	function getTimeTableData()
	{
			$slot=array();
			//echo "<pre>";
            //print_r($_POST);
            $i=0;
            $j=0;
            foreach ($_POST['course'] as $key =>$course) {
                $slot[$i][$j]=$course;
                //print_r($slot[$i][$j]);
                //echo "&emsp;";
                $j=$j+1;
                $slot[$i][$j]=$_POST['room'][$key];
                //print_r($slot[$i][$j]);
                //echo "&emsp;";
                $j=$j+1;
                $slot[$i][$j]=$_POST['time'][$key];
                //print_r($slot[$i][$j]);
                //echo "&emsp;";
                $j=$j+1;
                $slot[$i][$j]=$_POST['day'][$key];
                //print_r($slot[$i][$j]);
                //echo "<br>";
                $j=0;
                $i=$i+1;
            
            //exit; 
        }
		return $slot;
	}
}
/**
* 
*/
class TimeTable
{
	
	function selectCourse()
	{
		$chk=new CourseCataloge;
		$d=$chk->sCourse();
	    //print_r($d);
		return $d;
	}
	function selectDay()
	{
		$chk=new Day;
		$d=$chk->sDay();
		return $d;
	}
	function selectRoom()
	{
		$chk=new RoomCataloge;
		$d=$chk->sRoom();
		return $d;
	}
	function selectTime()
	{
		$chk=new TimeSlot;
		$d=$chk->sTime();
		return $d;
	}
	function ckeckClash()
	{
		$chk=new TimeTableController();
		$submit=$chk->getClashValue();
		if ($submit=="Check Clash") {
			$slotArray=$chk->getTimeTableData();
      //print_r($slotArray);
      $y=0;
      $j=0;
      while($slotArray[$y][$j]!="")
      {
        $f[]=$slotArray[$y][$j];
        $y++;
      }
      $e=array();
      $chk=new technicalServices;
      $i=$chk->stdCourse();
      $b=0;
      $t=0;
      while ($i[$b]!="") {
        if($i[$b]==$f[$b]){
             $t++;
        }
        $b++;
      }
      $l=1;
      $dj=0;
      $m=0;
      while ($l!=-1) {
        $m=$m+$l-1;
        if($i[$l]==$f[$m]){
             $dj++;
             $m=$m+2;
        }
        $l--;
      }
      if($t>1 || $dj>1)
      {
        $error="<strong>Sorry!</strong> Some students have registered both courses so you cannot make these classes at a time.";
        echo '<div class="alert alert-danger alert-dismissable">'.addslashes($error).'<button class="close" type="button"  data-dismiss="alert">x</button></div>';
        
      }
		}
	}
	function saveTimeTable()
	{
	  $chk=new TimeTableController();
    $sub=$chk->getTimeTableSubmit();
    $e=array();
    $sem=$_GET['sem'];
    if ($sub=="Save Table") {
		
      $array= $chk->getTimeTableData();
      //print_r($array);
      $i=0;
      $j=0;
     while ($array[$i]!="") {
        while ($array[$i][$j]!="" AND $j<4) {
           $e[]=$array[$i][$j];
           $j++;
        }
        $j=0;
        $i++;
      }
      $chk1=new technicalServices;
      $r=$chk1->saveTable($e,$sem);
        //print_r($e);
    }
    return $r;
	}
  function displayOldTime()
  {
    $g=$_GET['sem'];
    $chk=new technicalServices;
    $e=$chk->getSemData($g);
    //print_r($e);
    $i=0;
    $j=2;
    $chk1=new technicalServices;
    while ($e[$i]!="") {
        $c=$e[$i][$j];
       // print_r($c);
        $co=$chk1->getTimeD($c);
        $cou[]=$co['time_slot'];
        $i++;
        //print_r($cou);
    }
    return $cou;
  }
  function displayOldDay()
  {
    $g=$_GET['sem'];
    $chk=new technicalServices;
    $e=$chk->getSemData($g);
    //print_r($e);
    $i=0;
    $j=5;
    $chk1=new technicalServices;
    while ($e[$i]!="") {
        $c=$e[$i][$j];
       // print_r($c);
        $co=$chk1->getDayD($c);
        $cou[]=$co['day_name'];
        $i++;
        //print_r($cou);
    }
    return $cou;
  }
  function displayOldRoom()
  {
    $g=$_GET['sem'];
    $chk=new technicalServices;
    $e=$chk->getSemData($g);
    //print_r($e);
    $i=0;
    $j=3;
    $chk1=new technicalServices;
    while ($e[$i]!="") {
        $c=$e[$i][$j];
       // print_r($c);
        $co=$chk1->getRoomD($c);
        $cou[]=$co['room_name'];
        $i++;
        //print_r($cou);
    }
    return $cou;
  }
  function displayOldCourse()
  {
    $g=$_GET['sem'];
    $chk=new technicalServices;
    $e=$chk->getSemData($g);
    //print_r($e);
    $i=0;
    $j=1;
    $chk1=new technicalServices;
    while ($e[$i]!="") {
        $c=$e[$i][$j];
       // print_r($c);
        $co=$chk1->getCourseD($c);
        $cou[]=$co['course_name'];
        $i++;
        //print_r($cou);
    }
    return $cou;
  }
}

?>
