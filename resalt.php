<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>بيانات الطلاب</title>
    <style>
     #tbl{

          width:100%;
          font-size:20px;
      }
      #tbl th{
          text-align :center;
          background-color:rgb(148, 99, 26);
          color:#fff;
          font-size:29px;
          padding:10px;
      }
      #tbl td{
          text-align :center;
          background-color:rgba(209, 176, 87, 0.6);
          color:black;
          font-size:20px;
          padding:10px;
      }
      button{
          color:#fff;
          background: seagreen;
	      height: 50px;
          font-size:20px;
          width:433px;
          
      }
      input{
        width:32%;
        font-size:20px;
      }
      div{
          padding-top:20px;
          height: 150px;
          font-size:20px;
          color:#fff;
          background:#eeff90;
          width:100%;
         
      }
    </style>
</head>
<body dir="rtl">
<nav>
	      <ul>
		  <li class="active"><a href="Login.php">الرئسية لتسجيل الطلاب</a></li>
		  <li><a href="resalt.php">عرض بيانات الطلاب </a></li>
		  </ul>
	   </nav>

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
    $batchname= $_POST['batchname'];
}


$sqls ='';
if(isset($_POST['add'])){
    $sqls= "insert into stud value('$name', '$email', $stdnember, '$studyyear','$batchname')";
    mysqli_query($con,$sqls);
    header("location: resalt.php");
}

if(isset($_POST['del'])){
    $sqls= "delete from stud where name ='$name'";
    mysqli_query($con,$sqls);
    header("location: resalt.php");
}

if(isset($_POST['upd'])){
    $sqls= "update stud set '$name', '$email', $stdnember, '$studyyear','$batchname' WHERE stud";
    mysqli_query($con,$sqls);
    header("location: resalt.php");
}
 ?>
 <form method= 'POST'>
<div>
   <input type="text" placeholder="الاسم...." name='name' id='name'>
	<input type="text" placeholder="بريد الالكتروني" name='email' id='email'>
	<input type="text" name='stdnember' id='stdnember' placeholder="رقم الطالب"><br><br>
	<input type="text" name='studyyear' id='studyyear' placeholder="سنة الدراسي">
    <input type="text" name='batchname' id='batchname' placeholder="اسم الدفعة">
   <br><br>
     <input type="submit" value="تعديل" name ='updet'>
     <input type="submit" value="حذف" name ='del'>
     <input type="submit" value="اضافة" name ='add'>
</div>
<table id='tbl'>
                  <tr>
                  <th>الاسم</th>
                  <th>بريد الالكتروني</th>
                  <th>رقم الهاتف</th>
                  <th>سنة الدراسي</th>
                  <th>اسم الدفعة</th>
                 
                  
                  </tr>
                  <?php
                  while  ( $row = mysqli_fetch_array($res)){
                      echo "<tr>";
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['email']."</td>";
                      echo "<td>".$row['stdnember']."</td>";
                      echo "<td>".$row['studyyear']."</td>";
                      echo "<td>".$row['batchname']."</td>";
                    
                      echo "</tr>";
                  }
                ?>
</table> 
</form>
<script>
    var tbl = document.getElementById("tbl");
    for(var x = 1 ; x < tbl.rows.length ; x++){

        tbl.rows[x].onclick = function(){
            document.getElementById("name").value = this.cells[0].innerHTML;
            document.getElementById("email").value = this.cells[1].innerHTML;
            document.getElementById("stdnember").value = this.cells[2].innerHTML;
            document.getElementById("studyyear").value = this.cells[3].innerHTML;
            document.getElementById("batchname").value = this.cells[4].innerHTML;
        
        }
    }
</script>
</body>
</html>