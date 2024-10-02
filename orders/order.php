<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
     if(isset($_GET['id']))
     {
   
     $id =$_GET['id'];
   
    //$id = $conn->query("SELECT services.id AS id, services.type AS typy, services.size AS size, services.price AS price, services.status AS status FROM services JOIN orders ON services.id = orders.service_id GROUP BY (orders.service_id)");
 $service = $conn->query("SELECT * FROM services WHERE id='$id'");
  $service->execute();
  $getservice = $service->fetch(PDO::FETCH_OBJ);
 

   
    if(isset($_POST['submit']))
    {
         
    //if(empty($_POST['from']) OR empty($_POST['destination']) OR empty($_POST['size'])
   //    OR empty($_POST['phone']) OR empty($_POST['date']) OR empty($_POST['servic_id']))
   // {
    
     echo "<script>alart('one or more inputs are empty');</script>";
    //}
    //else 
    //{
       
    $from = $_POST['from']; 
    $destination = $_POST['destination'];
    $size = $_POST['size'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $status = "pinding";
    $service_id = $id;
    $user_id = $_SESSION['user_id'];
    $payment = $getservice->price;
    $_SESSION['payment'] = $payment;

    $insert = $conn->prepare("INSERT INTO orders (froma, destination, sizea, phone, datea, statusa, service_id, user_id) 
    VALUES (:from, :destination, :size, :phone, :date, :status, :service_id, :user_id)");
    $insert->execute([
    ':from' => $from, 
    ':destination' => $destination,
    ':size' => $size,
    ':phone' => $phone,
    ':date' => $date,
    ':status' => $status,
    ':service_id' => $service_id, 
    'user_id' => $user_id,
    ]);
    //}
    header("location: payment.php");
    }}
     else 
     {
      header("location: ".APPURL."");
     }
     ?>
     <div class="row justify-content-center">
            <div class="col-md-6">
            <form class="form-control mt-5" method="POST" action="order.php">
                    <h4 class="text-center mt-3"> shipping order </h4>
 
              <div class="">
                        <label for="" class="col-sm-2 col-form-label">from</label>
                        <div class="">
                            <input type="text" name="from" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">destination</label>
                        <div class="">
                            <input type="text" name="destination" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="number" class="col-sm-2 col-form-label">size</label>
                        <div class="">
                            <input type="number" name="size" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="number" class="col-sm-2 col-form-label">phone</label>
                        <div class="">
                            <input type="number" name="phone" class="form-control" require>
                        </div>

                        <fieldset>
                        <label for="number" class="col-sm-2 col-form-label">date</label>
                        <input type="date" name="date" class="form-control" require>
  </div>
</fieldset>
                        <div class="">
                            <input type="hidden"  value="<?php echo $getservice->type; ?>" name="type" class="form-control">
                        </div>
                    

           
  <button name="submit" class="w-100 btn btn-lg btn-primary mt-4 mb-4" type="submit">payment</button>
    </div>
                </form>
            </div>
        </div>
 </div>
 <?php require "includes/footer.php"; ?>





