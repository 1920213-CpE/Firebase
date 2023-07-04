<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$id = $_POST['id'];
$update = $db->update("film", $id, [
   "title"     => $_POST['title'],
   "thumbnail" => $_POST['thumbnail'],
   "year"      => $_POST['year'],
   "rating"    => $_POST['rating']
]);

echo "Data updated successfully! Click the button to go back to the dashboard.";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirm to Edit</title>
</head>
<body>
	<button onclick="redirectToIndex()">Dashboard</button>

	<script>
		function redirectToIndex() {
			window.location.href = "index.php";
		}
	</script>
</body>
</html>



