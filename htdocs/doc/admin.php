<?php
  $server = "localhost";
  $username ="shehan";
  $password = "shehan";
  $db = "channeling";
  $conn = mysqli_connect( $server , $username , $password , $db );


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Adnin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container" >
		<div class="jumbotron">
			<h1>Admin Database</h1>
		</div>
    <?php
     if(isset($_GET['Edit_id'])){
        $sql = "SELECT * FROM users WHERE u_id = '$_GET[Edit_id]' ";
        $run = mysqli_query($conn,$sql);
        while ($rows =mysqli_fetch_assoc($run)) {
          $Specialization = $rows[u_Information];
          $Doctor_Name = $rows[u_doctor];
          $Patient_SName =$rows[u_Patient];
          $Patient_Address =$rows[u_Address];
          $Telephone_Number_Work =$rows[u_Telephone];
          $Date =date('Y-m-d');
          $Email =$rows[u_Email];
        }
       ?>
       <section>
         <h2>Edit User</h2>
         <form method="post" class="jumbotron"  >
           <div class="form-group">
            <label for="sel1">Specialization</label>
              <select class="form-control" id="sel1" name="Specialization" required value="$Specialization" >
               <option>Specialization Surgeon</option>
               <option>Cardiologist</option>
               <option>Dental Surgeon</option>
               <option>ENT Surgeon</option>
               <option>Neurologist</option>
               <option>Paediatrician</option>
               <option>Psychiatrist</option>
              </select>
             <br>

             <div class="form-group">
               <label for="example-text-input">Date</label>
               <input type="text" class="form-control" name="Date" value="<?php echo $Date;  ?> "  >
             </div>

           <div class="form-group">
             <label for="example-text-input">Doctor Name</label>
             <input type="text" class="form-control" name="Doctor_Name" value="<?php echo $Doctor_Name; ?>"  >
           </div>

            <div class="form-group">
             <label for="example-text-input">Patient Name</label>
             <input type="text" class="form-control" name="Patient_SName" value="<?php echo $Patient_SName; ?>" >
           </div>

           <div class="form-group">
             <label for="example-text-input">Patient Address</label>
             <input type="text" class="form-control" name="Patient_Address" value="<?php echo $Patient_Address;?>" >
           </div>

           <div class="form-group">
             <label for="email">Email address</label>
             <input type="email" class="form-control" name="Email" value="<?php echo $Email;?>" >
           </div>

           <div class="form-group">
             <label for="text">Telephone Number Work</label>
             <input type="text" class="form-control" value="<?php echo $Telephone_Number_Work;  ?>" name="Telephone_Number_Work" >
           </div>

           <div class="form-group">
              <input type="hidden"  value="<?php echo $_GET['Edit_id']?>" class="btn btn-primary" name="submit_form_id" >
             <input type="submit" value =" Done Editing" class="btn btn-primary" name="submit_form" >
           </div>

         </form>



       </section>

       <?php
     }
     ?>
		<?php
     $sql = "SELECT * FROM users";
     $run = mysqli_query($conn ,$sql);
       echo " <table class = 'table table-borderless'>
                <thead>
	               <tr>
	                  <th>Id</th>
	                  <th>Category</th>
	                  <th>Date</th>
	                  <th>Doctor</th>
	                  <th>Name</th>
	                  <th>Address</th>
	                  <th>Email</th>
	                  <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>

	               </tr>
	             </thead>
	             <tbody>
               ";

     while ($rows = mysqli_fetch_assoc($run)) {
     	echo "
                <tr>
                <th>$rows[u_id]</th>
                <th>$rows[u_Information]</th>
                <th>$rows[u_date]</th>
                <th>$rows[u_doctor]</th>
                <th>$rows[u_Patient]</th>
                <th>$rows[u_Address]</th>
                <th>$rows[u_Email]</th>
                <th>$rows[u_Telephone]</th>
                <th><a href =' admin.php?Edit_id=$rows[u_id]'' class ='btn btn-success'>Edit</a></th>
                <th><a href ='admin.php?del_id=$rows[u_id]' class ='btn btn-danger'>Delete</a></th>
                </tr>

     	";
     }
      echo "</tbody></table>";
	?>

	</div>


</body>
</html>
<?php
if(isset($_GET['del_id'])){
  $del_sql = "DELETE FROM users WHERE u_id = '$_GET[del_id]'";
}
if(mysqli_query($conn,$del_sql)){
  ?>
  <script>window.location = "admin.php";</script>
<?php
}


 ?>

 <?php
   if(!isset($_POST['submit_form'])){
     echo "not yet submited";
   }
   if(isset($_POST['submit_form'])){
     echo "string";
      $Specialization = mysqli_real_escape_string($conn,strip_tags($_POST['Specialization']));
      $Doctor_Name =mysqli_real_escape_string($conn,strip_tags($_POST['Doctor_Name']));
      $Patient_SName =mysqli_real_escape_string($conn,strip_tags($_POST['Patient_SName']));
      $Patient_Address =mysqli_real_escape_string($conn,strip_tags($_POST['Patient_Address']));
      $Telephone_Number_Work =mysqli_real_escape_string($conn,strip_tags($_POST['Telephone_Number_Work']));

     if(isset($_POST["Date"])){
      $Date =mysqli_real_escape_string($conn,strip_tags($_POST['Date']));

     }

     if(isset($_POST["Email"])){
       $Email =mysqli_real_escape_string($conn,strip_tags($_POST['Email']));
     }

     echo $edit_id = $_POST['submit_form_id'];
     $ins_sql11 = "UPDATE users SET  u_Information = '$Specialization',u_date = '$Date',u_doctor = '$Doctor_Name',u_Patient = '$Patient_SName',u_Address ='$Patient_Address',u_Email ='$Email',u_Telephone = '$Telephone_Number_Work'
     WHERE u_id = '$edit_id'";

     if(!mysqli_query($ins_sql,$conn)){
        echo "not work";
              ?>
      
              <script>window.location = "admin.php";</script>

    <?php
     }

     if(mysqli_query($conn,$ins_sql11)){
       echo "Done";
       ?>
       <script>window.location = "admin.php";</script>

 <?php
     }

   }
  ?>
