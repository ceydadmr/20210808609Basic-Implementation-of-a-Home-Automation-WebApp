
<?php

$light_name = $_POST['light_name'];
$light_status = $_POST['light_status'];
$brightness = $_POST['brightness'];


$data = $light_name . ',' . $light_status . ',' . $brightness . "\n";
$file = fopen('sensor.txt', 'a');
fwrite($file, $data);
fclose($file);


header('Location: settings.html');
exit;
?>
