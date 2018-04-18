<?php
include 'header.php';
?>
<h1>Home</h1>

<center>
<h2>July</h2>
<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td valign=top>
<table border=0 cellpadding=0 cellspacing=0>
<?
$total_days = date("t")+1;
$year = date("Y");
$month = date("m");
for($i=1;$i<$total_days;$i++){
	?>
	<tr>
	<td style="height: 54px; border: 1px solid #fff; background-color: #e7e7e7;"><? echo $i; ?></td>
	</tr>
	<?
}
?>
</table>
</td>
<td valign=top>

<?php

for($i=1;$i<$total_days;$i++){
	if($i < 10){
		$checkdate = $year.'-'.$month.'-0'.$i;
	}else{
		$checkdate = $year.'-'.$month.'-'.$i;
	}

	$result = mysql_query("SELECT *,DATEDIFF(travelto,travelfrom) AS num_days FROM table WHERE status!='cancelled' AND status!='removed' AND destination='Alcudia' AND (travelfrom='$checkdate' OR travelto='$checkdate') ORDER BY travelfrom") or die(mysql_error());
	$numrows = mysql_num_rows($result);

	if($numrows == 0){
		?>
		<div style="width: 252px; height: 52px; border-top: 1px solid #fff; border-bottom: 1px solid #fff; background-color: #e7e7e7;"></div>
		<?
	}elseif($numrows == 1){
		$row = mysql_fetch_array($result);
		$num_days = $row['num_days'] * 54 - 2;
		?>
		<div style="width: 252px; height: 25px; border-top: 1px solid #fff; border-bottom: 1px solid #e7e7e7; background-color: #e7e7e7;"></div>
		<div style="width: 245px; height: <? echo $num_days; ?>px; border-left: 1px solid #ccc; border-right: 1px solid #ccc; border-top: 1px solid #000; border-bottom: 1px solid #000;text-align: left; background-color: #ccc; padding-left: 5px;">
		<h3><a href="booking.php?id=<? echo $row['id']; ?>"><? echo $row['surname']; ?></a></h3>
		Price: £<? echo $row['price']; ?><br>
		<? echo $row['adults']; ?> Adults, <? echo $row['children']; ?> Children<br>
		<? echo $row['travelfrom']; ?> - <? echo $row['travelto']; ?>
		</div>
		<div style="width: 252px; height: 25px; border-top: 1px solid #e7e7e7; border-bottom: 1px solid #fff;background-color: #e7e7e7;"></div>
		<?
		$i = $i + $row['num_days'];
	}elseif($numrows == 2){
}
?>

</td>
</tr>
</table>
</center>

<?
include 'footer.php';
?>