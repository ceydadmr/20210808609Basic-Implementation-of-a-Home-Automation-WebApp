<?php
$ambient_temp = 10; // sabit ambient temperature
$humidity = "50"; // sabit humidity

$lines = file("sensor.txt");
$devices = array();
foreach ($lines as $line) {
    $line_arr = explode(",", $line);
    if (count($line_arr) == 3 && strpos($line_arr[0], 'Light') === 0 && is_numeric($line_arr[2])) {
        $devices[$line_arr[0]] = array(
            'status' => $line_arr[1],
            'brightness' => $line_arr[2]
        );
    }
}

if(isset($_GET['device'])) {
    $selected_device = $_GET['device'];
    $selected_device_status = $devices[$selected_device]['status'];
    $selected_device_brightness = $devices[$selected_device]['brightness'];

    if(isset($_POST['action'])) {
        $new_status = $_POST['status'];
        $new_brightness = $_POST['brightness'];

        $devices[$selected_device]['status'] = $new_status;
        $devices[$selected_device]['brightness'] = $new_brightness;

        $lines = array();
        foreach ($devices as $device => $device_data) {
            $line = $device . "," . $device_data['status'] . "," . $device_data['brightness'] . "\n";
            array_push($lines, $line);
        }

        file_put_contents("sensor.txt", $lines);

        header('Location: control.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Smart Home</title>
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

		a {
			text-decoration: none;
			color: var(--text-color);
		}

		a:hover {
			text-decoration: underline;
		}

		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 2em;
		}

		input[type="submit"] {
			padding: 0.5em 1em;
			margin-top: 1em;
			background-color: var(--main-color);
			border: none;
			color: white;
			font-weight: bold;
			cursor: pointer;
		}

	</style>
</head>
