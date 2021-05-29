<!DOCTYPE html>
<html>
	<head>
		<script src='http://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
		<script src='jquery.keyframes.min.js'></script>
		<link rel="stylesheet" type="text/css" href="css.css">
		<script src="jq.js"></script>
	</head>

	<body>
		<div class="nav">
			<ul>
				<li><a href="index.php">Početna</a></li>
				<li><a href="oa.php">O Autoru</a></li>
				<li><a href="ku.php">Korisničko Uputstvo</a></li>
			</ul>
		</div> 

		<form method="POST">
			<div class="person1">
				<input type="text" id="ime1" name="ime1" placeholder="IME">
				<input type="date" id="bday1" name="bday1" placeholder="dd-mm-yyyy" value="">
			</div>

			<div class="person2">
				<input type="text" id="ime2" name="ime2" placeholder="IME">
				<input type="date" id="bday2" name="bday2">		
			</div>

			<div class="heart">
				<div class="slidey"></div>
				<img class="outline" src="img/heartout.png">
				<p class="result">
					<?php 
					$array1 = array();
					$array2 = array();
					$a1 = $a2 = "";
					$sum1 = $sum2 = $rem = 0;
						if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['ime1'], $_POST['ime2'], $_POST['bday1'], $_POST['bday2']))
						{
							$name1 = $_POST['ime1'];
							$name2 = $_POST['ime2'];
							$bd1 = $_POST['bday1'];
							$bd2 = $_POST['bday2'];
							$array1 = explode("-", $bd1);
							$array2 = explode("-", $bd2);

							for ($i=0; $i<3; $i++) 
							{ 
								$a1 = $a1 . $array1[$i];
							}
							$inta1 = (int) $a1;

							for ($i=0; $i<=strlen($inta1); $i++)  
							{  
								$rem= $inta1 % 10;  
								$sum1= $sum1 + $rem;  
								$inta1= $inta1 / 10;  
							} 

							while (intdiv($sum1, 10)!=0)
							{
								$sum1 = $sum1 % 10 + intdiv($sum1, 10);
							}


							for ($i=0; $i<3; $i++) 
							{ 
								$a2 = $a2 . $array2[$i];
							}
							$inta2 = (int) $a2;

							for ($i=0; $i<=strlen($inta2); $i++)  
							{  
								$rem= $inta2 % 10;  
								$sum2= $sum2 + $rem;  
								$inta2= $inta2 / 10;  
							} 

							while (intdiv($sum2, 10)!=0)
							{
								$sum2 = $sum2 % 10 + intdiv($sum2, 10);
							}

							if ($sum1>$sum2) 
							{
								$sum = $sum2/$sum1;
							}
							else
							{
								$sum = $sum1/$sum2;
							}

							$res = $sum * 100;
							?>
							<span><?php echo " " . round($res) . "%"; ?></span>
					<?php		
						}
					?>
				</p>
			</div>

			<p class="golubi">
				<?php 
					if (!empty($name1) && !empty($name2))
					{
						echo strtoupper($name1) . " + " . strtoupper($name2);
					}
				?>
			</p>

			<div class="btn">
				<input type="submit" name="btn" value="Traži">
			</div>
		</form>

		
	</body>
</html>