<?php

if(isset($_GET['id'])){

$id= $_GET['id'];

$servername="localhost";

$dbname="upload";

$user="root";

$pass="";

$dblink=mysql_connect($servername,$user,$pass);

mysql_select_db($dbname,$dblink);

// انتخاب دیتابیس

$dbresult=mysql_query("SELECT * FROM  images where imageID=$id",$dblink);

// انتخاب آی دی یا شماره ی عکس از جدول

mysql_query("SET CHARACTER SET  utf8",$dblink);

// سازگاری با زبان فارسی

while($record=mysql_fetch_assoc($dbresult))

{

print ($record["imageData"]."<hr>");

// چاپ عکس

}

mysql_close($dblink);

}

?>