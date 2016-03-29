<!DOCTYPE html>
	<head>
	</head>
	<body>
	<?php include 'top.html/top.html'; ?>
	<p> Thank you! </p>
	<?php
		echo 'Welcome to NerdLuv, ' . htmlspecialchars($_POST["Name"]) . '!';
	?>

	<p> Now <a href="matches.php">log in to see your matches!</a></p>
	
	<?php
		$file = 'singles.txt';
		// Open the file to get existing content
		$current = file_get_contents($file);
		// Append a new person to the file
		$current .= "\n" . htmlspecialchars($_POST["Name"]) . ",";
		$current .= htmlspecialchars($_POST["Gender"]) . ",";
		$current .= htmlspecialchars($_POST["Age"]) . ",";
		$current .= htmlspecialchars($_POST["PersonalityType"]) . ",";
		$current .= htmlspecialchars($_POST["FavoriteOS"]) . ",";
		$current .= htmlspecialchars($_POST["MinAge"]) . ",";
		$current .= htmlspecialchars($_POST["MaxAge"]);
		// Write the contents back to the file
		file_put_contents($file, $current);
	?>
	
	<?php include 'bottom.html/bottom.html'; ?>
	</body>
</html>
