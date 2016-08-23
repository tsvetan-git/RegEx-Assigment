<?php
session_start();

$dateTimeArr = ['day'=>'',
		'month'=>'',
		'year'=>'',
		'hour'=>'',
		'minute'=>'',
		'second'=>''
		
];
$dateTimeArr2 = ['day2'=>'',
		'month2'=>'',
		'year2'=>'',
		'hour2'=>'',
		'minute2'=>'',
		'second2'=>''
		
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
$section='2';

foreach ($dateTimeArr as $key=>$value){
	$dateTimeArr[$key] = trim(isset($_POST[$key]) ? $_POST[$key] : '');
	$dateTimeArr2[$key.$section] = trim(isset($_POST[$key.$section]) ? $_POST[$key.$section] : '');
}
var_dump($dateTimeArr);
foreach ($dateTimeArr as $key=>$value){
	if(!empty($_POST[$key])){
	$_SESSION[$key] = $value;
	}else{
	$_SESSION[$key] = '';
	}
}
foreach ($dateTimeArr2 as $key=>$value){
	if(!empty($_POST[$key])){
		$_SESSION[$key] = $value;
	}else{
		$_SESSION[$key] = '';
	}
}

foreach ($pattern as $key=>$value){
if(!preg_match($pattern[$key], $dateTimeArr[$key])){
	$error = true;
	}
}

if(!$error){
		$ts1 = mktime($dateTimeArr['day'],$dateTimeArr['month'],$dateTimeArr['year'],$dateTimeArr['hour'],$dateTimeArr['minute'],$dateTimeArr['second']);	
		//echo "$dateTimeArr['day']-$dateTimeArr['month']-$dateTimeArr['year'] $dateTimeArr['hour']:$dateTimeArr['minute']:$dateTimeArr['second']";
		var_dump($ts1);
}

?>
<html>
<head>
<title>date validation</title>
</head>
<body>
	<div  id="container">
		<p><?=$message?></p>
		<form action="" method="POST">
			<div>
			<?php 
			 foreach ($dateTimeArr as $key=>$value){
			 	echo "<p><label> $key: </label></p>
			 		  <input name=\"$key\" type=\"text\" value=\"$_SESSION[$key]\"> 
			 		  <span> + </span>
			 		  <input name=\"$key$section\" type=\"text\">";
			 }		 
			?> 
			</div>
			<p><label> format: </label></p>
			<p><input name="format" type="text" value="d-m-y H:i:s"></p>
			<p><input type="submit" value="Submit"/></p>
		</form>
		<p><label> ouput: </label></p>
		<p><input name="format" type="text"></p>
	</div>
	</body>
</html>