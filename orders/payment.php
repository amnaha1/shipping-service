<?php require "../includes/header.php"; ?>



    <div class="container">  
      <!-- Heading -->
      <h2 class="my-5 h2 text-center">payment</h2>

      <!--Grid row-->
      <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form">
                    <label for="firstName" class="">First name</label>

                    <input type="text" id="firstName" class="form-control">
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <label for="lastName" class="">Last name</label>

                    <input type="text" id="lastName" class="form-control">
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <div class="md-form mb-5">
                <label for="email" class="">Username</label>

                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <label for="email" class="">Email</label>

                <input type="text" id="email" class="form-control" placeholder="youremail@example.com">
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <label for="address" class="">Address</label>

                <input type="text" id="address" class="form-control" placeholder="1234 Main St">
              </div>

             
              <!--Grid row-->
              <div class="row">

              

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                <select class="form-select" aria-label="Default select example">
                  <option selected>Choose City</option>
                  <option value="1">madinah</option>
                  <option value="2">makkah</option>
                  <option value="3">ryad</option>
                </select>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6">

                  <input type="text" placeholder="Zip Code" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->
              
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AV_yHCCYeW9q4aaK3alPSF5X3DxFwMYPxqYOeHuV6zibbhJHxl9Px-qBeeymOmCx3hhilD7aVMUhFSUn&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: <?php $_SESSION['payment']; ?>// Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='index.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>
            </form>

          </div>
         
        </div>
    </div>
  </div>
      
  <?php require "../includes/footer.php"; ?>
