<!DOCTYPE html>
    <head>
	<link rel="stylesheet" type="text/css" href="nerdluv.css">
    </head>
    <body>
	<?php include 'top.html/top.html'; ?>
        <form action="signup-submit.php" method="post">
	  <fieldset> <legend>New User Signup:</legend>
            Name:<input type="text" maxlength="16" name="Name"> <br>
            Gender:<input type="radio" name="Gender" value="M"> Male
            <input type="radio" name="Gender" value="F" checked="checked"> Female <br>
            Age: <input type="text" name="Age" size="6" maxlength="2"> <br>
            Personality Type: <input type="text" size="6" maxlength="4" name="PersonalityType"> (<a href=http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>) <br>
            Favorite OS:  <select name="FavoriteOS">
		<option value="Windows">Windows</option>
		<option value="Mac OS X">Mac OS X</option>
		<option value="Linux">Linux</option>
		</select><br>
		Seeking age: <input name="MinAge" placeholder="min" size="6" 
		maxlength="2"> to <input name="MaxAge" placeholder="max"
		size="6" maxlength="2"><br>                                                                       
            <input type="submit" value="Sign Up">
	  </fieldset>
        </form>
       
	<?php include 'bottom.html/bottom.html'; ?>
     </body>
</html>
