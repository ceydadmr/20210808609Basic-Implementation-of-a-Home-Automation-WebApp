<?php
$ambient_temp = 10; 
$humidity = "50"; 

$lines = file("sensor.txt");
$last_line = $lines[count($lines)-1]; 
$last_line_arr = explode(",", $last_line); 

if (strpos($last_line_arr[0], 'Aircondition') === 0) { 
    if ($last_line_arr[1] == 'Open') {
        $adjusted_temp = $last_line_arr[2];
    } else if ($last_line_arr[1] == 'Close') {
        $adjusted_temp = '-';
    }
} else {
    $adjusted_temp = null;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Air Condition</title>
	<style>
:root {
  --main-color: #ff6700;
  --text-color: #333;
}

body {
  background-color: #f5f5f5;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: var(--text-color);
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0;
  padding: 0;
}

h1 {
  font-size: 3em;
  text-align: center;
  color: var(--main-color);
  margin: 0.5em 0;
}

p {
  font-size: 2em;
  text-align: center;
  margin: 0.5em 0;
}

p:first-child {
  margin-top: 2em;
}

p:last-child {
  margin-bottom: 2em;
}

p span {
  color: var(--main-color);
}





	</style>
</head>
<body>
	<h1>Air Condition</h1>

	<p>Ambient Temperature: <?php echo $ambient_temp; ?> °C</p>

	<p>Adjusted Temperature: <?php echo $adjusted_temp !== null ? $adjusted_temp.' °C' : '-'; ?></p>

	<p>Humidity: <?php echo $humidity; ?>%</p>

	<footer style="background-color: black; width: 100%; height: 100px; position: absolute; bottom: 0;">
		<div style="display: flex; justify-content: center; align-items: center; height: 100%;">
		  <a href="index.html" style="color: white; text-decoration: none;">
			<button style="background-color: black; border: 2px solid white; color: white; padding: 10px 20px; border-radius: 5px;">
			  Home
			</button>
		  </a>
		</div>
	  </footer>
  
</div>
</body>
</html>
