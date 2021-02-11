
<body>
<form method="post" attribute="post" action="disp_form.php">
<p>Enter Value 1 : <br/>
<input type="text" id="a" name="a"></p>
<p>Enter Value 2 : <br/>
<input type="text" id="b" name="b"></p>

</form>
</body>


<html>
<?php

if ($_POST['group1'] == '+'){
	echo $a+$b;
}
else if ($o == '-'){
	echo $a-$b;
}
else if ($o == '*'){
	echo $a*$b;
}
else if ($o == '/'){
	echo $a/$b;
}
else if ($o == '%'){
	echo $a%$b;
}
else 
	echo "Error";

echo nl2br("\n");
echo $a+$b;

?>
</html>