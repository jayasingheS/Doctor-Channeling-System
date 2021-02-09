<html>
<style>


input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #00ACFF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #FC4850;
  box-shadow: -3px 10px 20px -13px rgba(0,0,0,0.67);
}
.h1{
	font: normal 20px "Open Sans", sans-serif;
	margin-bottom: 15px;
	text-align: center;
	color:#00ACFF;
}
.font{
	font: normal 16px "Open Sans", sans-serif;
	margin-bottom: 15px;
	text-align: center;
	color:#00ACFF;

}
 .position{
  margin-top: 150px;
 }
.flex-container {

  display: flex;
  justify-content: center;


}

.flex-container > div {
  background-color: #f1f1f1;
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
</style>
<body>

<section class="position">


	<div class="flex-container">

		<form  method="post">
			<div >
					<h3 class="h1">Admin</h3>
			</div>

			<div >
				<label for="fname" class="font">Username</label>
				<input type="text" name="Username" >
			</div>
			<div >
				<label for="fname" class="font">Password</label>
				<input type="password"  name="password1" >
			</div>
			<div>
				<input type="submit" value="Login" name="submit_form" >
			</div>


		</form>
	</div>
</section>
</body>
</html>
<?php

  $username ="shehan";
  $password = "shehan";

if(isset($_POST['submit_form'])){
echo "string";
   
   
  
       if (  $_POST['Username']==$username && $_POST['password1']==$password) {
         # code...
      
      ?>    <script>
              location.replace("admin.php")
            </script>
   <?php 
  }else{
    echo "password incarect";
  }
 }
  
         

 ?>
