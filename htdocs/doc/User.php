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
    <title>User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="styles.css">
     <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>


        <header style=" position:relative;
                        z-index: 12;
                        text-decoration: none;" >
         <img src="assets/img/logo.png" alt="no image">
         <nav>
           <li>
            <a href="DOCmain.php">Home</a>
            <a href="#">Facilities</a>
            <a href="#">Functionalities</a>
            <a href="User.php">channel</a>
          
           </li>
         </nav>
       </header>
       <section class="hero">
          <img class="background-image" src="assets/img/12.jpg" alt="no image">
        <div class="hero-content-area">
          <h1>Grow Old But Stay Young</h1>
          <h3>The well-being and happiness of the elderly is our concern</h3>
          <a href="#" type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal">Channeling Now</a>
        </div>
      </section>


          <!-- Modal -->
          <div class="modal fade " id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title text-center text-primary">Channeling</h2>
                </div>
                <div class="modal-body">
                    <form method="post">
                      <div class="form-group">
                       <label for="sel1">Specialization</label>
                         <select class="form-control" id="sel1" name="Specialization" required>
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
                         <label for="example-date-input" class="col-2 col-form-label">Date</label>
                          <div class="col-10">
                              <input class="form-control" type="date" name="Date" value="2011-08-19" id="example-date-input">
                         </div>
                        </div>
                      <div class="form-group">
                        <label for="example-text-input">Doctor Name</label>
                        <input type="text" class="form-control" name="Doctor_Name"  >
                      </div>

                       <div class="form-group">
                        <label for="example-text-input">Patient Name</label>
                        <input type="text" class="form-control" name="Patient_SName">
                      </div>

                      <div class="form-group">
                        <label for="example-text-input">Patient Address</label>
                        <input type="text" class="form-control" name="Patient_Address" >
                      </div>

                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="Email">
                      </div>

                      <div class="form-group ">
                       <label for="example-tel-input" class="col-2 col-form-label">Telephone Number - Personal</label>
                        <div class="col-10">
                          <input class="form-control" type="tel" value="1-(555)-555-5555" name="Telephone_Number_Personal" >
                       </div>
                      </div>


                      <div class="form-group ">
                       <label for="example-tel-input" class="col-2 col-form-label">Telephone Number-Work</label>
                        <div class="col-10">
                          <input class="form-control" type="tel" value="1-(555)-555-5555" name="Telephone_Number_Work" >
                       </div>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-danger" name="submit_form" >
                      </div>

                    </form>
                </div>
              </div>
            </div>
          </div>

     </div>

    <div class="container" style="
                position:relative;
                z-index: 12;" >

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


                </tr>

        ";
     }
      echo "</tbody></table>";
    ?>

    </div>


</body>
</html>

<?php
  if(!isset($_POST['submit_form'])){
    echo "not yet submited";
  }
  if(isset($_POST['submit_form'])){
    echo "string";
     $Specialization =mysqli_real_escape_string($conn,strip_tags($_POST['Specialization']));
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
    if(isset($_POST["Telephone_Number_Personal"])){
       $Telephone_Number_Personal =mysqli_real_escape_string($conn,strip_tags($_POST['Telephone_Number_Personal']));
    }

    $ins_sql = "INSERT INTO users (u_id,u_Information,u_date,u_doctor,u_Patient,u_Address,u_Email,u_Telephone) VALUES (NULL,'$Specialization','$Date','$Doctor_Name','$Patient_SName','$Patient_Address','$Email','$Telephone_Number_Work')";


    if(!mysqli_query($ins_sql,$conn)){
       echo "not work";
             ?>
      <script>window.location = "User.php";</script>
      <script>window.location = "admin.php";</script>
   <?php
    }

    if(mysqli_query($conn,$ins_sql)){
      ?>
      <script>window.location = "Payment.php";</script>
      <script>window.location = "admin.php";</script>
<?php
    }

  }
 ?>
