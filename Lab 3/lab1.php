<?php
  include_once 'DBConnector.php';
  include_once 'user.php';
  $con =new DBConnector;
  
  if(isset ($_POST['btn-save'])){
	  $first_name =$_POST['first_name'];
	  $last_name =$_POST['last_name'];
	  $city_name =$_POST['city_name'];
	  $username = $_POST['username'];
	  $password= $_POST['password'];
	  $fileToUpload= $_POST['fileToUpload'];
	  $utc_timestamp = $_POST['utc_timestamp'];
	  $offset = $_POST['time_zone_offset'];

	  
	  $user = new User($first_name,$last_name,$city_name,$username,$password,$fileToUpload,$utc_timestamp,	$offset);
      $uploader= new FileUploader;
	  if(!$user->validateForm()){
	  	$user->createFormErrorSessions();
	  	header("Refresh:5");
	  	die();
	  }
	  $res =$user->save();
	  $file_upload_response= $uploader->uploadFile();

	  
	  if($res){
		  echo "Save operation was successful";
	  }else{
		 echo "An error occured ";
	  }
  }

?>





<html>
 <head>
 
    <title>Form-Lab 1</title>
    <script type="text/javascript"src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="validate.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="timezone.js"></script>
 
 </head>
 <body>
    <form method ="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
	  <table>
	  	<tr>
	  		<td>
	  			<div>
	  				<id ="form-errors">
	  					<?php
	  					session_start();
	  					if(!empty($_SESSION['form-errors'])){
	  						echo " " .$_SESSION['form-errors'];
	  						unset($_SESSION['form-errors']);
	  					}

	  					?>
	  			</div>
	  		</td>
	  	</tr>
	     <tr>
		    <td><input type ="text" name ="first_name" required placeholder ="First Name" /> </td>
		 
		 </tr>
		 
	    <tr>
		    <td><input type ="text" name ="last_name"  placeholder ="Last Name" /> </td>
		 
		 </tr>
		 
	    <tr>
		    <td><input type ="text" name ="city_name"  placeholder ="City" /> </td>
		 
		 </tr>	   
		 <tr>
		 	<td><input type="text" name="username" placeholder="Username"/>
		 	
		 	</td>
		 </tr>
		 <tr>
		 	<td><input type="password" name="password" placeholder="Password"/>
		 	
		 	</td>
		 </tr>
		 <tr>
				<td><input type="file" name="fileToUpload"  placeholder="Profile image:"
				</td>
			</tr>

		  <tr>
		    <td><input type ="submit" name ="btn-save"><strong>SAVE</strong> </td>
		 
		 </tr>
		  <tr>
				<input type="hidden" name="utc_timestamp" id ="utc_timestamp" value=""/>
				<input type="hidden" name="time_zone_offset" id ="time_zone_offset" value=""/>
				
			</tr
		 <tr>
		 	<td><a href="login.php">Login</a></td>
		 </tr>
	  
	  </table>
 
    </form>
 </body>


</html>