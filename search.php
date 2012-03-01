<?php
error_reporting(E_ALL);

ini_set('display_errors', '1');

$search=$_POST['search'];


$dbc= mysql_connect('localhost','root','nitish2012');
mysql_select_db("articles");

if (!$dbc)
  {
  die('Could not connect:'. $dbc->error);
  }
  
$query="SELECT * FROM articles WHERE title LIKE '%".$search."%' OR link LIKE '%".$search."%'";

$doQuery=mysql_query($query);
 

$numrows=mysql_num_rows($doQuery);

$i=0;
if($numrows>0)
{
 while($result=mysql_fetch_assoc($doQuery))
  {
 $sno[$i]=$i;
  $link_count[$i]=substr_count($result['link'],$search);
  $link[$i]=$result['link'];
  
  $title_count[$i]=substr_count($result['title'],$search);
  $title[$i]=$result['title'];
  
  $weight[$i]=$link_count[$i]+5*$title_count[$i];
  
  
  $i++;
  }
}
else
{
 echo 'No results in database';
}

array_multisort($weight,$sno);


$k=1;

for($j=$i-1;$j>=0;$j--)
{
	echo $k.'</br>';
	echo $title[$sno[$j]].'</br>';
	echo $link[$sno[$j]].'</br>';
	$k++;
}





mysql_close($dbc);

?>


