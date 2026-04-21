  <?php
    include('layout/header.php');

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
   


    $id = $_GET['id'];  
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contact_requests WHERE id='$id'"));
 
    ?>
  <main class="nxl-container">
      <div class="nxl-content">
          <!-- [ page-header ] start -->
          <div class="page-header">
              <div class="page-header-left d-flex align-items-center">
                  <div class="page-header-title">
                      <h5 class="m-b-10">Form</h5>
                  </div>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item">Create</li>
                  </ul>
              </div>
              <div class="page-header-right ms-auto">
                  <div class="page-header-right-items">
                      <div class="d-flex d-md-none">
                          <a href="javascript:void(0)" class="page-header-right-close-toggle">
                              <i class="feather-arrow-left me-2"></i>
                              <span>Back</span>
                          </a>
                      </div>

                  </div>
                  <div class="d-md-none d-flex align-items-center">
                      <a href="javascript:void(0)" class="page-header-right-open-toggle">
                          <i class="feather-align-right fs-20"></i>
                      </a>
                  </div>
              </div>
          </div>

<?php

if(isset($_POST['submit'])){
$id=$_GET['id'];
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$teams = htmlspecialchars($_POST['teams']);
$phone = htmlspecialchars($_POST['phone']);
$address1 = htmlspecialchars($_POST['address1']);
$address2 = htmlspecialchars($_POST['address2']);
$country = htmlspecialchars($_POST['country']);
$state = htmlspecialchars($_POST['state']);
$city = htmlspecialchars($_POST['city']);
$designation = htmlspecialchars($_POST['designation']);
$message = htmlspecialchars($_POST['message']);
$date = htmlspecialchars($_POST['date']);


$update_query =  "UPDATE contact_requests SET name='$name', email='$email', teams='$teams', phone='$phone', address1='$address1', address2='$address2', country='$country', state='$state' , city='$city', designation='$designation' , message='$message', date='$date' WHERE id='$id' ";

mysqli_query($conn , $update_query);
}

?>
          <div class="main-content">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="card stretch stretch-full">
                          <form method="post" action="">
                              <div class="card-body">

                                  <div class=" mb-4">
                                      <label for="teams" class="form-label">Teams </label>
                                      <select id="teams" value="" name="teams"  class="form-select form-control" data-select2-selector="teams" required>                               
                                          <option value=""  class="selected" aria-placeholder="teams">Teams</option>
                                          <option <?php if($row['teams'] == 'teams1'){ echo 'selected'; }?>  value="teams1">Team1</option>
                                          <option <?php if($row['teams'] == 'teams2'){ echo 'selected'; }?> value="teams2">Team2</option>
                                          <option <?php if($row['teams'] == 'teams3'){ echo 'selected'; }?> value="teams3">Team3</option>
                                          <option <?php if($row['teams'] == 'teams4'){ echo 'selected'; }?> value="teams4">Team4</option>
                                          <option <?php if($row['teams'] == 'teams5'){ echo 'selected'; }?> value="teams5">Team5</option>
                                          <option <?php if($row['teams'] == 'teams6'){ echo 'selected'; }?> value="teams6">Team6</option>
                                          <option <?php if($row['teams'] == 'teams7'){ echo 'selected'; }?> value="teams7">Team7</option>
                                          <option <?php if($row['teams'] == 'teams8'){ echo 'selected'; }?> value="teams8">Team8</option>
                                          <option <?php if($row['teams'] == 'teams9') {echo 'selected'; }?> value="teams9">Team9</option>
                                        <option   <?php if($row['teams'] == 'teams9') echo 'selected';?> value="teams9">Teams9</option>
                                        <option   <?php if($row['teams'] == 'teams10') echo 'selected'; ?>  value="teams10">Teams10</option>
                                     
                                        </select>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <label class="form-label">Name </label>
                                          <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Name" required>
                                      </div>

                                  </div>
                                  <div>
                                      <label class="form-label">Address</label>
                                      <div class="row">
                                          <div class="col-lg-6 mb-4">
                                              <input type="text" name="address1" value="<?php echo $row['address1']; ?>" class="form-control mb-2" placeholder="Address   1" required>
                                          </div>
                                          <div class="col-lg-6 mb-4">
                                              <input type="text" name="address2" value="<?php echo $row['address2']; ?>" class="form-control" placeholder="Address   2" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <label class="form-label">Email </label>
                                          <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Emial" required>
                                      </div>
                                      <div class="col-lg-6 mb-4">
                                          <label class="form-label">Phone </label>
                                          <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" placeholder="Phone" required>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <label for="country" class="form-label">Country </label>
                                          <select id="country" name="country" class="form-select form-control" required>
                                              <option  value=" " class="selected" aria-placeholder="Country">Country</option>
                                              <option <?php if($row['country'] == 'India'){echo 'selected';} ?> value="India">India</option>
                                              <option <?php if($row['country'] == 'Japan'){echo 'selected';} ?>value="Japan">Japan</option>
                                              <option <?php if($row['country'] == 'Newziland'){echo 'selected';} ?>value="Newziland">Newziland</option>
                                              <option <?php if($row['country'] == 'uk'){echo 'selected';} ?>value="uk">Uk</option>
                                              <option <?php if($row['country'] == 'usa'){echo 'selected';} ?>value="usa">USA</option>
                                              <option <?php if($row['country'] == 'uae'){echo 'selected';} ?>value="uae">UAE</option>
                                              <option <?php if($row['country'] == 'indonesia'){echo 'selected';} ?>value="indonesia">Indonesia</option>
                                              <option <?php if($row['country'] == 'saudi arabia'){echo 'selected';} ?>value="saudi arabia">Saudi Arabia</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-6 mb-4">
                                          <label for="state" class="form-label">State </label>
                                          <select id="state" name="state" class="form-select form-control" required>
                                              <option value="" class="selected" aria-placeholder="State">State</option>
                                              <option <?php if($row['state'] == 'Delhi'){echo 'selected';} ?> value="Delhi">Delhi</option>
                                              <option <?php if($row['state'] == 'UP'){echo 'selected';} ?> value="UP">UP</option>
                                              <option <?php if($row['state'] == 'Bihar'){echo 'selected';} ?> value="Bihar">Bihar</option>
                                              <option <?php if($row['state'] == 'Urisa'){echo 'selected';} ?> value="Urisa">Urisa</option>
                                              <option <?php if($row['state'] == 'Tata'){echo 'selected';} ?> value="Tata">Tata</option>
                                              <option <?php if($row['state'] == 'Jharkhand'){echo 'selected';} ?> value="Jharkhand">Jharkhand</option>
                                              <option <?php if($row['state'] == 'Telangana'){echo 'selected';} ?> value="Telangana">Telangana</option>
                                              <option <?php if($row['state'] == 'Assam'){echo 'selected';} ?> value="Assam">Assam</option>
                                          </select>
                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6 mb-4">
                                          <label for="city" class="form-label">City </label>
                                          <select id="city" name="city" class="form-select form-control" required>
                                              <option value="" class="selected" aria-placeholder="City">City</option>
                                              <option <?php if($row['city'] == 'gaya'){echo 'selected';} ?> value="gaya">Gaya</option>
                                              <option <?php if($row['city'] == 'patna'){echo 'selected';} ?>  value="patna">Patna</option>
                                              <option <?php if($row['city'] == 'nawada'){echo 'selected';} ?>  value="nawada">Nawada</option>
                                              <option <?php if($row['city'] == 'jahanabad'){echo 'selected';} ?>  value="jahanabad">Jahanabad</option>
                                              <option <?php if($row['city'] == 'sankchi'){echo 'selected';} ?>  value="sankchi">Sankchi</option>
                                              <option <?php if($row['city'] == 'noida'){echo 'selected';} ?>  value="noida">Noida</option>
                                              <option <?php if($row['city'] == 'karol bagh'){echo 'selected';} ?>  value="karol bagh">Karol Bagh</option>
                                              <option <?php if($row['city'] == 'patel nagar'){echo 'selected';} ?>  value="patel nagar">Patel Nagar</option>
                                          </select>
                                      </div>


                                      <div class="col-lg-6 mb-4">
                                          <label for="designation" class="form-label">Designation </label>
                                          <select id="designation" name="designation" class="form-select form-control" required>
                                              <option value=" " class="selected" aria-placeholder="designation">--Select Designation--</option>
                                              <option <?php if($row['designation'] == 'UI Developer'){echo 'selected';} ?> value="UI Developer">UI Developer</option>
                                              <option <?php if($row['designation'] == 'UX Developer'){echo 'selected';} ?> value="UX Developer">UX Developer</option>
                                              <option <?php if($row['designation'] == 'PHP Developer'){echo 'selected';} ?> value="PHP Developer">PHP Developer</option>
                                              <option <?php if($row['designation'] == 'JS Developer'){echo 'selected';} ?> value="JS Developer">JS Developer</option>
                                              <option <?php if($row['designation'] == 'NEXT Developer'){echo 'selected';} ?> value="NEXT Developer">NEXT Developer</option>
                                              <option <?php if($row['designation'] == 'REACT Developer'){echo 'selected';} ?> value="REACT Developer">REACT Developer</option>
                                              <option <?php if($row['designation'] == 'Node.js Developer'){echo 'selected';} ?> value="Node.js Developer">Node.js Developer</option>
                                              <option <?php if($row['designation'] == 'Laravel Developer'){echo 'selected';} ?> value="Laravel Developer">Laravel Developer</option>
                                              <option <?php if($row['designation'] == 'Python Developer'){echo 'selected';} ?> value="Python Developer">Python Developer</option>

                                          </select>
                                      </div>
                                  </div>


                                  <div class="row">
                                      <div class="col-lg-12 mb-4">
                                          <label class="form-label">Message </label>
                                          <input type="text" name="message" value="<?php echo $row['message']; ?>" class="form-control" placeholder="Message">
                                      </div>
                                  </div>



                                  <div class="row mb-4">
                                      <div class="form-check form-switch form-switch-sm ps-5">
                                          <input class="form-check-input c-pointer" type="checkbox" id="commentSwitch">
                                          <label class="form-check-label fw-500 text-dark c-pointer" for="commentSwitch">Status</label>
                                      </div>
                                  </div>
                                  <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">

                                      <input type="submit" name="submit" class="btn btn-primary ">


                                  </div>
                              </div>
                          </form>






                      </div>
                  </div>
              </div>
          </div>
          <!-- [ Main Content ] end -->
      </div>
      <!-- [ Footer ] start -->
      <footer class="footer">
          <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
              <span>Copyright ©</span>
              <script>
                  document.write(new Date().getFullYear());
              </script>
          </p>
          <p><span>By: <a target="_blank" href="https://wrapbootstrap.com/user/theme_ocean" target="_blank">theme_ocean</a></span> • <span>Distributed by: <a target="_blank" href="https://themewagon.com" target="_blank">ThemeWagon</a></span></p>
          <div class="d-flex align-items-center gap-4">
              <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
              <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
              <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
          </div>
      </footer>
      <!-- [ Footer ] end -->
  </main>



  <div class="modal fade-scale" id="searchModal" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-top modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header search-form py-0">
                  <div class="input-group">
                      <span class="input-group-text">
                          <i class="feather-search fs-4 text-muted"></i>
                      </span>
                      <input type="text" class="form-control search-input-field" placeholder="Search...">
                      <span class="input-group-text">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </span>
                  </div>
              </div>
              <div class="modal-body">
                  <div class="searching-for mb-5">
                      <h4 class="fs-13 fw-normal text-gray-600 mb-3">I'm searching for...</h4>
                      <div class="row g-1">
                          <div class="col-md-4 col-xl-2">
                              <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                  <i class="feather-compass"></i>
                                  <span>Recent</span>
                              </a>
                          </div>
                          <div class="col-md-4 col-xl-2">
                              <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                  <i class="feather-command"></i>
                                  <span>Command</span>
                              </a>
                          </div>
                          <div class="col-md-4 col-xl-2">
                              <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                  <i class="feather-users"></i>
                                  <span>Peoples</span>
                              </a>
                          </div>
                          <div class="col-md-4 col-xl-2">
                              <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                  <i class="feather-file"></i>
                                  <span>Files</span>
                              </a>
                          </div>
                          <div class="col-md-4 col-xl-2">
                              <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                  <i class="feather-video"></i>
                                  <span>Medias</span>
                              </a>
                          </div>
                          <div class="col-md-4 col-xl-2">
                              <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                  <span>More</span>
                                  <i class="feather-chevron-down"></i>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="recent-result mb-5">
                      <h4 class="fs-13 fw-normal text-gray-600 mb-3">Recnet <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-airplay fs-5"></i>
                              <div class="fs-13 fw-semibold">CRM dashboard redesign</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">/<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-file-plus fs-5"></i>
                              <div class="fs-13 fw-semibold">Create new eocument</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">N /<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-user-plus fs-5"></i>
                              <div class="fs-13 fw-semibold">Invite project colleagues</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">P /<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                  </div>
                  <div class="command-result mb-5">
                      <h4 class="fs-13 fw-normal text-gray-600 mb-3">Command <span class="badge small bg-gray-200 rounded ms-1 text-dark">5</span></h4>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-user fs-5"></i>
                              <div class="fs-13 fw-semibold">My profile</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">P /<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-users fs-5"></i>
                              <div class="fs-13 fw-semibold">Team profile</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">T /<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-user-plus fs-5"></i>
                              <div class="fs-13 fw-semibold">Invite colleagues</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">I /<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-briefcase fs-5"></i>
                              <div class="fs-13 fw-semibold">Create new project</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">CP /<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-life-buoy fs-5"></i>
                              <div class="fs-13 fw-semibold">Support center</div>
                          </a>
                          <a href="javascript:void(0);" class="badge border rounded text-dark">SC /<i class="feather-command ms-1 fs-12"></i></a>
                      </div>
                  </div>
                  <div class="file-result mb-4">
                      <h4 class="fs-13 fw-normal text-gray-600 mb-3">Files <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-folder-plus fs-5"></i>
                              <div class="fs-13 fw-semibold">CRM Desing Project <span class="fs-12 fw-normal text-muted">(56.74 MB)</span></div>
                          </a>
                          <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-4">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-folder-plus fs-5"></i>
                              <div class="fs-13 fw-semibold">Admin Dashboard Project <span class="fs-12 fw-normal text-muted">(46.83 MB)</span></div>
                          </a>
                          <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                          <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                              <i class="feather-folder-plus fs-5"></i>
                              <div class="fs-13 fw-semibold">CRM Dashboard Project <span class="fs-12 fw-normal text-muted">(68.59 MB)</span></div>
                          </a>
                          <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <!--! ================================================================ !-->
  <!--! [End] Theme Customizer !-->
  <!--! ================================================================ !-->
  <!--! ================================================================ !-->
  <!--! Footer Script !-->
  <!--! ================================================================ !-->
  <!--! BEGIN: Vendors JS !-->
  <script src="assets/vendors/js/vendors.min.js"></script>
  <!-- vendors.min.js {always must need to be top} -->
  <script src="assets/vendors/js/tagify.min.js"></script>
  <script src="assets/vendors/js/tagify-data.min.js"></script>
  <script src="assets/vendors/js/quill.min.js"></script>
  <script src="assets/vendors/js/select2.min.js"></script>
  <script src="assets/vendors/js/select2-active.min.js"></script>
  <script src="assets/vendors/js/datepicker.min.js"></script>
  <!--! END: Vendors JS !-->
  <!--! BEGIN: Apps Init  !-->
  <script src="assets/js/common-init.min.js"></script>
  <script src="assets/js/proposal-edit-init.min.js"></script>
  <!--! END: Apps Init !-->
  <!--! BEGIN: Theme Customizer  !-->
  <script src="assets/js/theme-customizer-init.min.js"></script>
  <!--! END: Theme Customizer !-->
  <script>
      $(document).ready(function() {
          var i = 1;
          $("#add_row").click(function() {
              b = i - 1;
              $("#addr" + i)
                  .html($("#addr" + b).html())
                  .find("td:first-child")
                  .html(i + 1);
              $("#tab_logic").append('<tr id="addr' + (i + 1) + '"></tr>');
              i++;
          });
          $("#delete_row").click(function() {
              if (i > 1) {
                  $("#addr" + (i - 1)).html("");
                  i--;
              }
              calc();
          });
          $("#tab_logic tbody").on("keyup change", function() {
              calc();
          });
          $("#tax").on("keyup change", function() {
              calc_total();
          });
      });

      function calc() {
          $("#tab_logic tbody tr").each(function(i, element) {
              var html = $(this).html();
              if (html != "") {
                  var qty = $(this).find(".qty").val();
                  var price = $(this).find(".price").val();
                  $(this)
                      .find(".total")
                      .val(qty * price);
                  calc_total();
              }
          });
      }

      function calc_total() {
          total = 0;
          $(".total").each(function() {
              total += parseInt($(this).val());
          });
          $("#sub_total").val(total.toFixed(2));
          tax_sum = (total / 100) * $("#tax").val();
          $("#tax_amount").val(tax_sum.toFixed(2));
          $("#total_amount").val((tax_sum + total).toFixed(2));
      }
  </script>
  </body>