<?php
session_start();

$dateTimeArr = [
		'day'=>'',
		'2day'=>'',
		'month'=>'',
		'2month'=>'',
		'year'=>'',
		'2year'=>'',
		'hour'=>'',
		'2hour'=>'',
		'minute'=>'',
		'2minute'=>'',
		'second'=>'',
		'2second'=>''	
];

$pattern = [
		'day'=>'/^([1-9]|0[1-9]|1[0-9]|2[0-9]|30|31)$/',
		'month'=>'/^([1-9]|0[1-9]|10|11|12)$/',
		'year'=>'/^(19[7-9][0-9]|20[0-9][0-9])$/',
		'hour'=>'/^([0-9]|0[0-9]|10|11|12)$/',
		'minute'=>'/^([0-9]|0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])$/',
		'second'=>'/^([0-9]|0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])$/'
];

$error = false;
$message = '';
$format = isset($_POST['format']) ? $_POST['format'] : 'Y-m-d H:i:s';
if(!empty($_POST['format'])){
	$_SESSION[$format] = $format;
}else{
	$_SESSION[$format] = 'Y-m-d H:i:s';
}

foreach ($dateTimeArr as $key=>$value){
	$dateTimeArr[$key] = trim(isset($_POST[$key]) ? $_POST[$key] : '');
}

foreach ($dateTimeArr as $key=>$value){
	if(!empty($_POST[$key])){
	$_SESSION[$key] = $value;
	}else{
	$_SESSION[$key] = '';
	}
}

foreach ($pattern as $key=>$value){
if(!preg_match($pattern[$key], $dateTimeArr[$key])){
	$error = true;
	$message="incorrect input date";
	}
}
if(!$error){
		$ts = mktime(
				$dateTimeArr['hour']+$dateTimeArr['2hour'],
				$dateTimeArr['minute']+$dateTimeArr['2minute'],
				$dateTimeArr['second']+$dateTimeArr['2second'],
				$dateTimeArr['month']+$dateTimeArr['2month'],
				$dateTimeArr['day']+$dateTimeArr['2day'],
				$dateTimeArr['year']+$dateTimeArr['2year']
				);
}
?>
<html>
<head>
<title>date calc</title>
</head>
<body>
	<div  id="container">
		<form action="" method="POST">
			<div>
			<?php 
			 foreach ($dateTimeArr as $key=>$value){
			 	if (!is_numeric((string)$key[0])){
			 		echo "<p><label> $key : </label></p>";
			 	}
			 	if (is_numeric((string)$key[0])){
			 		echo "<span> + </span>";
			 	}
			 	echo "<input name=\"$key\" type=\"number\" value=\"$_SESSION[$key]\">";	 
			 }			 
			?> 
			</div>
			<p><label> format: </label></p>
			<p><input name="format" type="text" value="<?=$_SESSION[$format]?>"></p>
			<p><input type="submit" value="Submit"/></p>
		</form>
		<div>
			<p><label> ouput:</label>
				<?php 
					if(!$error){
						echo date($format,$ts);
					} 
				?>
			</p>
			<p>
				<?php 
				if($error && !empty($_POST)){ 
					echo $message;
				}
				?>
			</p>
		</div>
	</div>
	</body>
</html>