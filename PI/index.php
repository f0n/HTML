<?php
if ( file_get_contents('test.txt') == 'exit' )
{
	file_put_contents('test.txt', '000');
}
if ( $_GET['get'] == 1 && ctype_digit(file_get_contents('test.txt')) )
{
	$red = substr(file_get_contents('test.txt'),0,1);
	$green = substr(file_get_contents('test.txt'),1,1);
	$blue = substr(file_get_contents('test.txt'),2,1);

	if ( $_GET['red'] == 1 )
	{
		if ( substr(file_get_contents('test.txt'),0,1) == 1 )
		{
			$red = 0;
		}
		else
		{
			$red = 1;
		}
	}
	else if ( $_GET['green'] == 1 )
	{
		if ( substr(file_get_contents('test.txt'),1,1) == 1 )
		{
			$green = 0;
		}
		else
		{
			$green = 1;
		}
	}
	else if ( $_GET['blue'] == 1 )
	{
		if ( substr(file_get_contents('test.txt'),2,1) == 1 )
		{
			$blue = 0;
		}
		else
		{
			$blue = 1;
		}
	}
	$combined = $red . $green . $blue;
	file_put_contents('test.txt', $combined);
}
echo '
<html>
	<head>
		<title>LED Controller</title>

	</head>
<body>';

if ( !ctype_digit(file_get_contents('test.txt')) )
{
	echo '<span style="color: #ff0000">Text file contents not an integer.</span>';
}

echo '
<style>
    body {
        overflow: hidden;
        
        }

#LEDControl {
margin: auto;
font-size: 30px;
width: 50%;
text-align: center;
margin-top: 50px;
}

a{
margin-top: 30px;
margin-bottom: 30px;
}
</style>
<div id="LEDControl" style="width: 100%; height: 100%;">

<a class="textB" href="controller.php?red=1&get=1" style="text-decoration: none; color: #ff0000;">
	RED
</a><br>
<a class="textB" href="controller.php?green=1&get=1" style="text-decoration: none; color: #00ff00;">
	GREEN
</a><br>
<a class="textB" href="controller.php?blue=1&get=1" style="text-decoration: none; color: #0000ff;">
	BLUE
</a>

</div>

</body>
</html>';
?>