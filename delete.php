<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
if($id != ""){
   $delete = $db->delete("film", $id);
   echo "Data has been deleted successfully! Click the button to go back to the dashboard.";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirm to Delete</title>
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

