
<?php
$weight=array('1','2','3','4');
$title=array('q','w','e','r');





array_multisort($weight,$title);
for($i=0;$i<4;$i++)
{echo $title[$i];
}

?>