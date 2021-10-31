<?php 

$datac1 = 0;
$datac2 = 0;
$datac3 = 0;
$datac11 = 0;
$datac12 = 0;
$datac13 = 0;
$hasil1 = 0;
$hasil2 = 0;
$hasil3 = 0;
$yc1 = 0;
$yc2 = 0;
$yc3 = 0;
$yc11 = 0;
$yc12 = 0;
$yc13 = 0;
$yc21 = 0;
$yc22 = 0;
$yc23 = 0;
$u=0;
$mas=100;
$i=1;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	while($u == 0){
	?><br><br><br><br><br><br>Perulangan ke <?php echo $i++; ?>
	<?php
	foreach($c as $d){
				if($datac1==0){
				$datac1 += $d->c1;
				$datac2 += $d->c2;
				$datac3 += $d->c3;
				$datac11 += $d->c11;
				$datac12 += $d->c12;
				$datac13 += $d->c13;
				}
				else{
				$datac1 = number_format($yc1/$yc3,1);
				$datac2 = number_format($yc11/$yc13,1);
				$datac3 = number_format($yc21/$yc23,1);
				$datac11 = number_format($yc2/$yc3,1);
				$datac12 = number_format($yc12/$yc13,1);
				$datac13 = number_format($yc22/$yc23,1);
				}
				}?><br>
	c1=<?php echo $datac1;?>  <?php echo $datac11;?><br>
	c2=<?php echo $datac2;?>  <?php echo $datac12;?><br>
	c3=<?php echo $datac3;?>  <?php echo $datac13;?>
	<table border="1">
		<thead>
			<tr>
				<th>Data 1</th>
				<th>Data 2</th>
				<th>Hasil<sup>1</sup></th>
				<th>Hasil<sup>2</sup></th>
				<th>Hasil<sup>3</sup></th>
				<th>C1</th>
				<th>C2</th>
				<th>C3</th>
				<th>min</th>
				<th>Kelas</th>
			</tr>
			<?php foreach($k as $l){
				$hasil1 += $l->umur;
				$hasil2 += $l->io;
				$hc1 = sqrt(pow(($l->umur - $datac1), 2)+pow(($l->io - $datac11), 2));
				$hc2 = sqrt(pow(($l->umur - $datac2), 2)+pow(($l->io - $datac12), 2));
				$hc3 = sqrt(pow(($l->umur - $datac3), 2)+pow(($l->io - $datac13), 2));
				$ss=min($hc1,$hc2,$hc3); 
				if($ss == $hc1){
					$kelas = "C1";
					$yc1 += $l->umur;
					$yc2 += $l->io;
					$yc3 += 1;
				}elseif ($ss == $hc2) {
					$kelas = "C2";
					$yc11 += $l->umur;
					$yc12 += $l->io;
					$yc13 += 1;
				}elseif ($ss == $hc3){
					$kelas = "C3";
					$yc21 += $l->umur;
					$yc22 += $l->io;
					$yc23 += 1;
				}
				
				?>
			<tr>
				<th><?php echo $l->umur;?></th>
				<th><?php echo $l->io;?></th>
				<th><?php echo (pow(($l->umur - $datac1), 2)+pow(($l->io - $datac11), 2));?></th>
				<th><?php echo (pow(($l->umur - $datac2), 2)+pow(($l->io - $datac12), 2));?></th>
				<th><?php echo (pow(($l->umur - $datac3), 2)+pow(($l->io - $datac13), 2));?></th>

				<th><?php echo sqrt(pow(($l->umur - $datac1), 2)+pow(($l->io - $datac11), 2));?></th>
				<th><?php echo sqrt(pow(($l->umur - $datac2), 2)+pow(($l->io - $datac12), 2));?></th>
				<th><?php echo sqrt(pow(($l->umur - $datac3), 2)+pow(($l->io - $datac13), 2));?></th>
				<th><?php echo $ss;?></th>
				
				<th>
				<?php 
				
				echo $kelas;?></th>
			</tr>
			<?php }?>
			<tr>
				<th><?php echo $hasil1;?></th>
				<th><?php echo $hasil2;?></th>
			</tr>
		</thead>
	</table> 
	C1= <?php echo $yc1/$yc3 ?>
	C1= <?php echo $yc2/$yc3 ?>
	<br>
	C2= <?php echo $yc11/$yc13 ?>
	C2= <?php echo $yc12/$yc13 ?>
	<br>
	C3= <?php echo $yc21/$yc23 ?>
	C3= <?php echo $yc22/$yc23;
	
	if(number_format($yc1/$yc3,1) == $datac1 and number_format($yc11/$yc13,1) == $datac2 and number_format($yc21/$yc23,1) == $datac3){
	$u=1;
	}
	}?>

</body>

	