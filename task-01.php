<?php
$dayValue = isset($_POST['day']) ? $_POST['day'] : '';
$monthValue = isset($_POST['month']) ? $_POST['month'] : '';
$yearValue = isset($_POST['year']) ? $_POST['year'] : '';
$dayPattern = '/^(0[1-9]|[1-9]|1[0-9]|2[0-9]|30|31)$/'; //01-31
$monthPattern = '/^(0[1-9]|[1-9]|10|11|12)$/'; //01-12
$yearPattern = '/^(19[0-9][0-9]|20[0-9][0-9])$/'; //1900-2099
$error = false;
$message = '';

	if(!preg_match($dayPattern, $dayValue)){
		$error = true;
	}
	if(!preg_match($monthPattern, $monthValue)){
		$error = true;
	}
	if(!preg_match($yearPattern, $yearValue)){
		$error = true;
	}
	if(!empty($_POST['day']) || !empty($_POST['month']) || !empty($_POST['year'])){		
		if(!$error){
		$message = "Date $dayValue/$monthValue/$yearValue is valid date.";
		}else{
			$message = "Date $dayValue/$monthValue/$yearValue is  not valid date.";
		}
	}
?>
<html>
	<head>
		<title>date validation</title>
	</head>
	<body>
		<form action="" method="POST">
			Day: <input type="text" name="day" value="<?=$dayValue?>"/>
			Month: <input type="text" name="month"  value="<?=$monthValue?>"/>
			Year: <input type="text" name="year"  value="<?=$yearValue?>"/>
			<input type="submit" value="Submit"/>
		</form>
		<p><?=$message?></p>
	</body>
</html>