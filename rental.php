<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .main-content {
            padding: 20px;
            display: flex;
            justify-content: space-around;
            
        }
        .category {
            text-align: center;
        }
        .category .imgForm {
            width: 100%;
            width: 400px;
	    height: 300px;
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .category .imgForm:hover {
            transform: scale(1.1);
        }
       
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>
<div class="main-content" id = "home">
    <div class="category">
	<form action="testing.php" method="post"> 
   <form> 
	
            <h3>Properties</h3>
  
	    <p> View and manage property listings.</p>
         <input type="image" class = "imgForm" src="img/propertiesimg.jpeg" >
   </form> 
        
    </div>
  
    <div class="category">
	<form action="groups.php" method="post"> 
   <form> 
	
           <h3>Rental Groups</h3>
	    <p> Manage groups and their preferences.</p>
         <input type="image" class = "imgForm" src="img/rentalgroupimg.jpg">
   </form> 
        
    </div>

   <div class="category">
	<form action="rents.php" method="post"> 
   <form> 
	
	    <h3>Average Rent</h3>
	    <p>  See the average rent for different rental units. </p>
         <input type="image" class = "imgForm" src="img/avgrentsimg.jpg" value = >
   </form> 
        
    </div>
</div>


</body>
</html>
