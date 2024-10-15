<?php
include("../Model/ModelClasses.php");
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

class TemplateController
{
	function getTempId()
	{
		$subm=$_GET['template'];
		return $subm;
	}
}

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


?>