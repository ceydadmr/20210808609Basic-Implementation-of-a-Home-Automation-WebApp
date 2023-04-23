<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home Automation</title>
	<style>
		
        body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f5f5f5;
}

.container {
  margin: 50px auto;
  width: 500px;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 0px 10px #999;
  border-radius: 5px;
}

h1 {
  font-size: 28px;
  color: #333;
  text-align: center;
  margin-bottom: 30px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  font-size: 18px;
  color: #333;
  margin-bottom: 10px;
}

input[type="text"], select {
  font-size: 16px;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 5px #999;
}

input[type="submit"] {
  font-size: 18px;
  padding: 10px 20px;
  background-color: #ff6700;
  color: #fff;
  border: none;
  border-radius: 5px;
  box-shadow: 0px 0px 5px #999;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #e65c00;
}

.view-sensors {
  font-size: 18px;
  color: #333;
  text-align: center;
  margin-top: 30px;
  cursor: pointer;
}

.view-sensors:hover {
  text-decoration: underline;
}

	</style>
</head>
<body>



<?php
	
	if(isset($_POST['submit'])){
		$sensor_name = $_POST['sensor_name'];
		$sensor_type = $_POST['sensor_type'];
		$sensor_value = $_POST['sensor_value'];

		
		$file = fopen("sensor.txt", "a");
		fwrite($file, $sensor_name . "," . $sensor_type . "," . $sensor_value . "\n");
		fclose($file);

		
		echo "<h2>Submitted Sensor Data:</h2>";
		echo "<p>Sensor Name: " . $sensor_name . "</p>";
		echo "<p>Sensor Type: " . $sensor_type . "</p>";
		echo "<p>Sensor Value: " . $sensor_value . "</p>";
	}

	
	if(isset($_POST['view'])){
		
		$file = fopen("sensor.txt", "r");

		
		while(!feof($file)) {
			$data = fgets($file);
			if($data != ""){
				$sensor = explode(",", $data);
				echo "<h2>Sensor Data:</h2>";
				echo "<p>Sensor Name: " . $sensor[0] . "</p>";
				echo "<p>Sensor Type: " . $sensor[1] . "</p>";
				echo "<p>Sensor Value: " . $sensor[2] . "</p>";
			}
		}

		
		fclose($file);
	}
?>

<form method="post" action="producerpage.html">
	<input type="submit" name="add_sensor" value="Add New Sensor">
</form>

</body>
</html>