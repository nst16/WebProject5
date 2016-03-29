<!DOCTYPE html>
<head>
</head>
<body>
	<?php include 'top.html/top.html'; ?>
	<?php
		//validate the submitted input
	
		//check if name already exists
		//first get submit values
		$file = 'singles.txt';
		// Open the file to get existing content
		$fileContents = file_get_contents($file);
		$singles = explode("\n", $fileContents);
		$position = FALSE;
		$i = 0;

		//parse for submitted person
	for($i = 0; $i < count($singles); $i++)
	{	
		$position = strpos($singles[$i], $_POST["Name"]);
		if($position !== FALSE)
		{
			$position = $i;
			break;
		}
	}

	if($position == $i)
	{
		echo "Error: " . $_POST["Name"] . " already has an account";
		exit();
	}

		//check if name is blank
	if($_POST["Name"] == "")
	{
		echo "Error: Name cannot be blank.";
		exit();
	}

		//ago must be between 0 and 99
	if($_POST["Age"] <= 0 || $_POST["Age"] >= 99)
	{
		echo "Error: Age cannot be outside of (0, 99).";
		exit();
	}

		//gender must be m/f
	if($_POST["Gender"] != "M" &&  $_POST["Gender"] != "F")
	{
		echo "Error: Gender must be male or female";
		exit();
	}

		//personality type must contain correct letters
	$letters = str_split($_POST["PersonalityType"]);
	if($letters[0] != 'I' && $letters[0] != 'E')
	{
		if($letters[1] != 'S' && $letters[1] != 'N')
		{
			if($letters[2] != 'F' && $letters[2] != 'T')
			{
				if($letters[3] != 'P' && $letters[3] != 'J')
				{
					echo "Error: Invalid personality type";
					exit();
				}
			}
		}
	}

		//valid favorite OS
	if($_POST["FavoriteOS"] != "Windows" && $_POST["FavoriteOS"] != "Mac OS X" && $_POST["FavoriteOS"] != "Linux")
	{
		echo "Error: Invalid Favorite OS";
		exit();
	}

		//min/max age must be valid
	if($_POST["MinAge"] < 0)
	{
		echo "Error: Invalid minimum age";
		exit();
	}

	if($_POST["MaxAge"] > 99)
	{
		echo "Error: Invalid maximum age";
		exit();
	}

	if($_POST["MinAge"] > $_POST["MaxAge"])
	{
		echo "Error: Minimum cannot be higher than the maximum age";
		exit();
	}

	?>
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
