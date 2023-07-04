<?php
include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

$insert = $db->insert("film", [
   "title"     => $_POST['title'],
   "thumbnail" => $_POST['thumbnail'],
   "year"      => $_POST['year'],
   "rating"    => $_POST['rating']
]);

echo "Data has been saved successfully! Click the button to go back to the dashboard.";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Save Data</title>
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


