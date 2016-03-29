<!DOCTYPE html>
        <head>
        </head>
        <body>
        <?php include 'top.html/top.html'; ?>
        <?php
                echo 'Matches for ' . htmlspecialchars($_GET["Name"]);

                //generating matches
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
					$position = strpos($singles[$i], $_GET["Name"]);
					if($position !== FALSE)
					{
						$position = $i;
						break;
					}
				}

				$submit = $singles[$position];
				$submitValues = explode("," , $submit);

				//parse through to find matches
				for($i = 0; $i < count($singles); $i++)
				{
					$potMatch = explode("," , $singles[$i]);

					//check for gender
					if($submitValues[1] != $potMatch[1])
					{

						//check for compatible ages
						if($potMatch[2] >= $submitValues[5])
						{
							if($potMatch[2] <= $submitValues[6])
							{

								//check for same favorite OS
								if($submitValues[4] == $potMatch[4])
								{
									
									//check for personality type
									$subType = str_split($submitValues[3]);
									$potType = str_split($potMatch[3]);

									if($potType[0] == $subType[0] || $potType[1] == $subType[1] ||
										$potType[2] == $subType[2] || $potType[3] == $subType[3])
									{
										//display image and match information
										//echo '<img src="user.jpg"/>';
										echo nl2br("\n" . $potMatch[0]);
										echo nl2br("\ngender: " . $potMatch[1]);
										echo nl2br("\nage: " . $potMatch[2]);
										echo nl2br("\ntype: " . $potMatch[3]);
										echo nl2br("\nOS: " . $potMatch[4]);
										
									}
								}
							}
						}
					}
				}
        ?>
	<?php include 'bottom.html/bottom.html'; ?>
        </body>
</html>



