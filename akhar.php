<?php

$servername="localhost";

$dbname="upload";

$user="root";

$pass="";

$dblink=mysql_connect($servername,$user,$pass);

mysql_select_db($dbname,$dblink);

$dbresult=mysql_query("SELECT * FROM  images",$dblink);

mysql_query("SET CHARACTER SET  utf8",$dblink);

while($record=mysql_fetch_assoc($dbresult))

{

echo ($record["text"]."<br>"."<img width='50' src=show.php?id=".$record['imageID'].">"."<hr>" );

}

mysql_close($dblink);

?>