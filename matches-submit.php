<!DOCTYPE html>
        <head>
        </head>
        <body>
        <?php include 'top.html/top.html'; ?>
        <?php
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
				
				if($position != $i)
				{
				echo nl2br("\nError: " . $_GET["Name"] . " not found");
				exit();
				}

 			   	echo "<b>" . "Matches for " . htmlspecialchars($_GET["Name"]) . "</b>";

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
										//display image and match name in a <p>
										//display match information in an <ul>
										?> 
										<div class="match"> 
											<p>
										 	   	<?
												echo '<img src="user.jpg" class="match"/>'; 
												echo $potMatch[0];
												?> 
											</p>
											<ul class="match">
												<li> <? echo "<b>" . "gender: " . "</b>". $potMatch[1]; ?> </li>
												<li> <? echo "<b>" . "age: " . "</b>" . $potMatch[2]; ?> </li>
												<li> <? echo "<b>" . "type: " . "</b>" . $potMatch[3]; ?> </li>
												<li> <? echo "<b>" . "OS: " . "</b>" . $potMatch[4]; ?> </li>
											</ul>
										</div> 
										<?
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
