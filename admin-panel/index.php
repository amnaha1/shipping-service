
<?php require "layouts/header.php"; ?>
<?php require "config/config.php"; ?>
<meta http-equiv="refresh" content="5">
<?php
   
   if(isset($_SESSION['adminname']))
   {
    header("location: ".ADMINURL."");
   }
   $order = $conn->query("SELECT * FROM orders");
   $order->execute();
   $allorder = $order->fetchAll(PDO::FETCH_OBJ);
?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">oeders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">from</th>
                    <th scope="col">destination</th>
                    <th scope="col">size</th>
                    <th scope="col">phone</th>
                    <th scope="col">date</th>
                    <th scope="col">service_id</th>
                    <th scope="col">user_id</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allorder as $order) : ?>
                  <tr>
                    <th scope="row"><?php echo $order->id; ?></th>
                    <td><?php echo $order->froma; ?></td>
                    <td><?php echo $order->destination; ?></td>
                    <td><?php echo $order->sizea; ?></td>
                    <td><?php echo $order->phone; ?></td>
                    <td><?php echo $order->datea; ?></td>
                    <td><?php echo $order->service_id; ?></td>
                    <td><?php echo $order->user_id; ?></td>
                    <?php if($order->statusa == "pending") : ?>
                    <td><?php echo $order->statusa; ?></td>
                     <td><a href="status.php?id=<?php echo $order->id; ?>&status=<?php echo $order->statusa; ?>" class="btn btn-danger  text-center ">pending</a></td>
                  <?php else : ?>
                    <td><a href="status.php?id=<?php echo $order->id; ?>&status=<?php echo $order->statusa; ?>" class="btn btn-danger  text-center ">successfull </a></td>
                    </tr>
            <?php endif ?>
                  <tr>
                    <?php endforeach ?>
                   
                </tbody>
              </table> 
              <?php require "layouts/footer.php";?>