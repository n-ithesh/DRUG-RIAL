<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['e_id'])){
  header('Location:index.php');
}
$eid=$_SESSION['e_id'];
$stmt=$admin->ret("SELECT * FROM `employee` where `e_id`='$eid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Drug Rial | Employee</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
    <?php include 'includes/sidebar.php';?>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <?php include 'includes/topbar.php';?>

        <div class="main-panel">
          <div class="content-wrapper pb-0">
           
            <div class="row">
              <div class="col-lg-12 stretch-card grid-margin">
              <div class="card">
                  <div class="card-body bg-secondary">
                    <h4 class="card-title badge badge-inverse-success ">Add Medicines</h4>
                    <!-- <p class="card-description">Basic form layout</p> -->
                    <form class="forms-sample" action="controller/add_medicine.php" method="post" enctype="multipart/form-data">
                      <div class="d-flex" style="gap: 20px;">
                        <div class="form-group w-100">
                            <label >Medicine Title</label>
                            <input required type="text" class="form-control"  placeholder="Title" name="Title"/>
                        </div>                       
                        <div class="form-group w-100">
                            <label>category</label>
                            <select class="form-control text-dark" name="cat" required>
                              <option value="" hidden>Choose category</option>
                              <?php $stmt=$admin->ret("SELECT * FROM `category` where `cat_status`='active'");
                              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                              <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                            
                            <?php } ?>  
                            </select>                      
                          </div>
                      </div>
                      <div class="d-flex" style="gap: 20px;">
                      <div class="form-group w-100">
                            <label>Description</label>
                            <input required type="text" class="form-control"  placeholder="Description" name="Description"/>
                        </div>                        
                        <div class="form-group w-100">
                            <label >Price</label>
                            <input required type="text" class="form-control"  placeholder="Price" name="price" />
                        </div>
                      </div>
                      <div class="d-flex" style="gap: 20px;">
                      <div class="form-group w-50">
                            <label >Btach No.</label>
                            <input required type="number" class="form-control"  placeholder="Btach No" name="batch" />
                        </div>                 
                        <div class="form-group w-50">
                            <label >Manufacture</label>
                            <input required type="text" class="form-control"  placeholder="Manufacture" name="manu" />
                        </div>
                      </div>
                      <div class="d-flex" style="gap: 20px;">
                        <div class="form-group w-50">
                            <label >Expiry Date</label>
                            <input required type="date" class="form-control"  placeholder="Expiry Date" name="expiry" />
                        </div>
                        <div class="form-group w-50">
                            <label >Quantity</label>
                            <input required type="text" class="form-control"  placeholder="Quantity" name="quty" />
                        </div>
                    </div>
                    <div class="form-group w-100">
                            <label >Image</label>
                            <input required type="file" class="form-control"  placeholder="Image" name="image"/>
                        </div>                                                               
                      <button style="float: right;" type="submit" class="btn btn-primary ml-2" name="sub"> Submit </button>
                      <button style="float: right;" class="btn btn-light" type="reset" name="add">Cancel</button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
          <?php include 'includes/footer.php'?>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>