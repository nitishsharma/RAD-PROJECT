<?php
//for putting up the articles


$title=$_POST['title'];
$link=$_POST['link'];
$description=$_POST['description'];

$dbc=new mysqli('localhost','root','nitish2012','articles');
if (!$dbc)
  {
  die('Could not connect:'. $dbc->error);
  }

$query="INSERT INTO articles (title,link,description)"." VALUES ('$title','$link','$description')";

$result=$dbc->query($query);
if($result)
{echo"<h2>your article was successfully added..please go back to check our articles</h2>";}


	
mysqli_close($dbc);

?>
