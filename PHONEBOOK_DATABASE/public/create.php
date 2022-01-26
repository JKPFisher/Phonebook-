<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";
 

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_user = array(

      "firstname" 		 => $_POST['firstname'],
      "lastname" 		 => $_POST['lastname'],
	  "address"   		 => $_POST['address'],
      "mobilenumber"     => $_POST['mobilenumber'],
      "homenumber"       => $_POST['homenumber'],

						 );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "contacts",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>


<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php } ?>



<h2>Add a user</h2>
<form method="post">
	<label for="firstname">First Name</label>
	<input type="text" name="firstname" id="firstname">
	<label for="lastname">Last Name</label>
	<input type="text" name="lastname" id="lastname">
	<label for="address">Address</label>
	<input type="text" name="address" id="address">
	<label for="mobilenumber">Mobile Number</label>
	<input type="text" name="mobilenumber" id="mobilenumber">
	<label for="homenumber">Home Number</label>
	<input type="text" name="homenumber" id="homenumber">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to homepage</a>
<?php require "templates/footer.php"; ?>

