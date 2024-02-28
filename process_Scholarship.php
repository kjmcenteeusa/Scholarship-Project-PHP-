<!-- Chapter 4, page 195 -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Submitted!</title>
</head>
<body >

	<?php

	// Definiton of displayRequired() functionfunction
	function displayRequired($fieldName) {
		echo "<p style='color: red;'>The field \"$fieldName\" is required!</p>";
	}

	// Definition of the validateInput() function
	function validateInput($data, $fieldName) {
		global $errorCount;
		if (empty($data)) {
			// This is when the form field is empty.
			displayRequired($fieldName);
			++$errorCount;
			$retVal = "";

		} else {
			// Clean up input when it is NOT empty.
			$retVal = trim($data);
			$retVal = stripslashes($retVal);
		}

		return $retVal;
		}

		// Definiton of the redisplayForm() function

		function redisplayForm($firstName, $lastName) {
			?>
			<h2 style="text-align: center;">Scholarship Form</h2>
			<form name="scholarship" action="process_Scholarship.php" method="post" style= "text-align: center";>
			<label for="fName">First Name:</label>
			<input type="text" name="fName" id="fName" value="<?php echo $firstName; ?>"/>			
			<br/>
			<br/>
			<label for="lName">Last Name:</label>
			<input type="text" name="lName" id="lName" value="<?php echo $lastName; ?>"/>
			<p><input type="reset" value="Clear Form" />&nbsp; &nbsp;
			<input type="submit" value="Send Form"></p>
			
			</form>

			<?php 

		}-

		$errorCount = 0;
		$firstName = validateInput($_POST["fName"], "First Name");
		$lastName = validateInput($_POST["lName"], "Last Name");

		/* Final output is either the original configuration or an explanation of how to fix
		the errors. */

		if($errorCount > 0) {
			echo "<p>Please re-enter the missing information below.</p>";
			redisplayForm($firstName, $lastName);
		}
	
		else {
			echo "<p>Thank you for filling out the scholarship form, $firstName $lastName!</p>";
			
		}
		
	?>
	
</body>
</html>