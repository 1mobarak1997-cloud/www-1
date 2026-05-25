<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"href="Login.css">
    <title>Document</title>
</head>
<body dir="rtl">
<?php
$host="localhost";
    $user="phpMyAdmin";
    $pass='';
    $db="test";
    $con = mysqli_connect($host,$user,$pass,$db);
    $res=mysqli_query($con,"select * from stud");
#button  variable-----
$name='';
$email='';
$stdnember='';
$studyyear='';
$batchname='';

if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['stdnember'])){
    $stdnember= $_POST['stdnember'];
}
if(isset($_POST['studyyear'])){
    $studyyear = $_POST['studyyear'];
}
if(isset($_POST['batchname'])){
    $batchname = $_POST['batchname'];
}


$sqls ='';
if(isset($_POST['add'])){
    $sqls= "insert into stud value('$name', '$email', $stdnember, '$studyyear', '$batchname')";
    mysqli_query($con,$sqls);
    header("location: Login.php");
}

if(isset($_POST['del'])){
    $sqls= "delete into stud value('$name', '$email', $stdnember, '$studyyear', '$batchname')";
    mysqli_query($con,$sqls);
    header("location: Login.php");
}
?>	

<div class="container">
     <header>

	   <nav>
	      <ul>
		  <li class="active"><a href="LoginN.php">الرئسية لتسجيل الطلاب</a></li>
		  <li><a href="resalt.php">عرض بيانات الطلاب </a></li>
		  </ul>
	   </nav>
     </header>

</div>
 <form  method='POST'>
	<h2>تسجيل دخول للطلاب </h2>
	<input type="text" placeholder="اسم الطالب" name='name' id='name'><br>
	<input type="text" placeholder="بريد الالكتروني" name='email' id='email'><br>
	<input type="text" name='stdnember' id='stdnember' placeholder="رقم الطالب"><br>
	<input type="text" name='studyyear' id='studyyear' placeholder="سنة الدراسي "><br>
	<input type="text" name='batchname id='batchname' placeholder="اسم الدفعة "><br>
	<br>
	
	<input type="submit" value="انشاء دخول" name ='add'>

</form>



<script>
   let btn = document.getElementById('btn');
   window.onscroll = function(){
	   if(scrolly <= 300){ btn.style.display ='block';}
	   else{ btn.style.display ='none';}
   }
   btn.onclick = function(){ scroll({
       left:0,
	   top:0,
	   behavior:"smooth"
       })
   }
</script>
</body>
</html>