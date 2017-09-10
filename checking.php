<form action="">
<input type="date" name="dd"/>
<input type="submit"/>
</form>
<?php
/*$td=date("Y-m-d");
/*$startdate=strtotime("today");
$enddate=strtotime("+1 week +2 days",$startdate);
echo date("M d Y", $startdate);
echo date("M d Y", $enddate);
if ($startdate-$enddate>(strtotime(""))) {
   echo date("M d Y", $startdate),"<br>";
  // $startdate = strtotime("+1 week", $startdate);
}*/

/*$arr=array("1"=>"35","1"=>"36");
print_r($arr);*/

$today=strtotime("today");
$due=strtotime("+2 Months");
echo date("d-m-Y",$today);
echo date("d-m-Y",$due);
//echo $due;
?>