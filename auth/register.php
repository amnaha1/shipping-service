<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>
<?php
  if(isset($_SESSION['username']))
  {
     header("location: ".APPURL."");
  }
     if(isset($_POST['submit']))
     {
        if(empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password']))
        {
            echo"<script>alart('one or more inputs are empty');<script>";
        }
        else 
        {
            $username = $_POST['username']; 
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            
            $insert = $conn->prepare("INSERT INTO users (username, email, mypassword) 
            VALUES (:username, :email, :mypassword)");

            $insert->execute([
                  ':username' => $username,
                  ':email' => $email,
                  ':mypassword' => password_hash($password, PASSWORD_DEFAULT), 
                ]);
            
            header("location: login.php");

        }
       } 
     ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
            <form class="form-control mt-5" method="POST" action="register.php">
                    <h4 class="text-center mt-3"> Register </h4>
                    <div class="">
                        <label for="" class="col-sm-2 col-form-label">Username</label>
                        <div class="">
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button name="submit" class="w-100 btn btn-lg btn-primary mt-4 mb-4" type="submit">Register</button>

                </form>
            </div>
        </div>
 
   

        </div>
        <?php require "../includes/footer.php"; ?>