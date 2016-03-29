<!DOCTYPE html>
        <head>
        </head>
        <body>
        <?php include 'top.html/top.html'; ?>
	 <form action="matches-submit.php" method="get">
          <fieldset> <legend>Returning User:</legend>
            Name:<input type="text" maxlength="16" name="Name"> <br>
	  <input type="submit" value="View My Matches">
	  </fieldset>
	</form>
        <?php include 'bottom.html/bottom.html'; ?>
        </body>
</html>