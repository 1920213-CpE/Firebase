<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple Firebase RDB CRUD</title>
	<link rel="stylesheet" href="style1.css">

   <style>body {
    font-family: "Times New Roman", Times, serif;
    font-size: 16px;
    font-weight: bold;
  }  </style>
</head>
<body>
	<div class="container">
		<a href="add.php"><button class="add-button">ADD DATA</button></a>
		<table class="data-table">
		    <thead>
		        <tr>
		            <th>Thumbnail</th>
		            <th>Anime Title</th>
		            <th>Year</th>
		            <th>Rating</th>
		            <th colspan="2">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php
		   $data = $db->retrieve("film");
		   $data = json_decode($data, 1);
		   
		   if(is_array($data)){
		      foreach($data as $id => $film){
		         echo "<tr>
		         <td><img class='thumbnail' src='{$film['thumbnail']}'></td>
		         <td>{$film['title']}</td>
		         <td>{$film['year']}</td>
		         <td>{$film['rating']}</td>
		         <td><a href='edit.php?id=$id'><button class='edit-button'>EDIT</button></a></td>
		         <td><a href='delete.php?id=$id'><button class='delete-button'>DELETE</button></a></td>
		      </tr>";
		      }
		   }
		   ?>
		   </tbody>
		</table>
	</div>
</body>
</html>


<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js";
    import { getDatabase, set, ref, push, child} from "https://www.gstatic.com/firebasejs/9.17.1/firebase-database.js";
    //import {  } from "firebase/database";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries
  
    // Your web app's Firebase configuration
    const firebaseConfig = {
      apiKey: "AIzaSyCDLtQp3QJw29Gjh_vDhrj1vbOZq901sv0",
      authDomain: "database-1f45f.firebaseapp.com",
      projectId: "database-1f45f",
      storageBucket: "database-1f45f.appspot.com",
      messagingSenderId: "822577133461",
      appId: "1:822577133461:web:e7eecfb97f1f0d59f9a89c"
    };
  
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);

    // Initialize Realtime Database and get a reference to the service
    const database = getDatabase(app);
    

// write data
submit.addEventListener('click',(e) => {
    var firstName = document.getElementById('first-name').value;  
    var lastName = document.getElementById('last-name').value;  
    var email = document.getElementById('email').value;  

    const userId = push(child(ref(database), 'users')).key;
   
    set(ref(database, 'users/' + userId), {
    firstName: firstName,
    lastName: lastName,
    email : email
   });
   alert('saved');
  });

  // read data
  getData.addEventListener('click',(e) => {

    $('#dataTbl td').remove();
    var rowNum = 0; 
    const dbRef = ref(database, 'users/');

    onValue(dbRef, (snapshot) => {
      snapshot.forEach((childSnapshot) => {
      const childKey = childSnapshot.key;
      const childData = childSnapshot.val();
      // ...
      rowNum += 1; 
      var row = "<tr><td>" + rowNum + "</td><td>" + childData.firstName + "</td><td>" + childData.lastName + "</td><td>" + childData.email + "</td></tr>"

      $(row).appendTo('#dataTbl');
      
      });
    }, {
       onlyOnce: true
    });


  });




  </script>