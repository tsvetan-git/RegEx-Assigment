<?php
$subject = '999 1000 10000 19000 19001 <html> 0877443344 </html>testov.testov@gmail.com 
		    0888-443344 0895 443344 —¿4455“T —“5566““ —“4455’“
		    <?php echo $a; ?> is testing »‚‡Ì ing ingis »‚‡Ì isis ising. 
		    This is testing. SELECT * FROM Customers WHERE Country=Mexico
           .myclass { color: #fff; }';

$pattern1 = '/is/';
$pattern2 = '/(ing)+\b/'; 
$pattern3 = '/[a-z]\w*/i'; 
$pattern4 = '/[A-Z]{1}[^.?!]*[.?!]/i';
$pattern5 = '/(08(7|8|9){1}[1-9]{1}((\s+)?(\-)?(\s+)?)([0-9]{6}))/';
$pattern6 = '/<\/?[a-z][a-z]*[^<>]*>/';
$pattern7 = '/ (<\?php).*?(\?>) /';
$pattern8 = '/[»‚‡Ì]+/';
$pattern9 = '/([—“][0-9]{4}[¿-ﬂ]{2})+/';
$pattern10 = '/\b[A-Z0-9._]+@[gmail]*\.[com]*\b/';
$pattern11 = '/\b[A-Z0-9._]+@[gmail|yahoo|abv]*\.[com|bg]*\b/';
$pattern12 = '/\b([1-9][0-9][0-9][0-9]|[1][0-8][0-9][0-9][0-9]|19000)\b/';
$pattern14 = '/\.-?[_a-zA-Z]+[_a-zA-Z0-9-]*\s*\{.*}/';
$pattern15 = '/SELECT\\s+?[^\\s]+?\\s+?FROM\\s+?[^\\s]+?\\s+?WHERE.*/';

preg_match_all($pattern15, $subject, $matches);
var_dump($matches);