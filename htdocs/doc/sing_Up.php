<?php
  $server = "localhost";
  $username ="shehan";
  $password = "shehan";
  $db = "channeling";
  $conn = mysqli_connect( $server , $username , $password , $db );


 ?>


<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  border-radius: 20px;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
  border-radius: 20px;
}

hr {
  border: 1px solid #00ACFF;
  margin-bottom: 25px;

}

/* Set a style for all buttons */
button {
  background-color: #00ACFF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 20px;
  opacity: 0.9;
}

button:hover {
  opacity:1;

}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #FC4850;
  border-radius: 20px;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
  width: 600px;
  height: auto;
  margin: 0 auto;
  margin: auto;


}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
<section>
  <div class="">
    <form method="post">
      <div class="container">
        <h1 style=" text-align: center;
                     color: #00ACFF;">Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">

          <button type="submit"name="submit_form">Sign Up</button>
        </div>
        <div class="clearfix">
        <button type="submit" onclick="myFunction()" >
            Login</button>
        </div>
      </div>
 
    </form>
      <script>
  function myFunction() {
    location.replace("loging.php")
  }
  </script>
  </div>
</section>


</body>
</html>
<?php

  if(isset($_POST['submit_form'])){
    $break_SUB=0;
    $Email22 =$_POST['email'];
    $sql = "SELECT * FROM sign_up";
    $run = mysqli_query($conn ,$sql);
    while ($rows = mysqli_fetch_assoc($run)) {
            if($rows[Email] ==$Email22  ){
             $break_SUB = 1;
            }

    }

    if($_POST['psw-repeat']=== $_POST['psw'] && $break_SUB==0){
      $Password =mysqli_real_escape_string($conn,strip_tags($_POST['psw-repeat']));
      $Date =date('Y-m-d');
      $Email =mysqli_real_escape_string($conn,strip_tags($_POST['email']));
      $ins_sql = "INSERT INTO sign_up(sign_id,Email,passward,date) VALUES (NULL,'$Email','$Password','$Date')";
      mysqli_query($conn,$ins_sql);
      ?>
      <script>
        location.replace("User.php")
      </script>
      <?php

    }if ($break_SUB>0) {
      ?>
      <h5 style=" text-align: center;

               color: #FC4850;">you're already registered with another account</h5>
      <?php

    } else {
      ?>

       <h5 style=" text-align: center;
                color: #FC4850;">password does not match</h5>
       <?php


    }


    }



 ?>
