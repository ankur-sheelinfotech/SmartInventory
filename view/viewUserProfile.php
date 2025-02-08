<?php
require_once("../view/template/top.inc.php");
?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <?php
  require_once("../view/template/sidebar.inc.php");
  ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <h2>User Profile Form</h2>
        <form method="POST" action="" enctype="multipart/form-data" id="viewUserProfile">

          <!-- First Part: Personal Information and Contact Details -->
          <div class="row">
            <div class="col-md-6">
              <fieldset>
                <legend>Personal Information</legend>
                <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name" required>
                  <small class="text-danger" id="first_name_error"></small> <!-- Error message -->
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name:</label>
                  <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name">
                  <small class="text-danger" id="last_name_error"></small>
                </div>
                <div class="form-group">
                  <label for="gender">Gender:</label>
                  <select id="gender" name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male">MALE</option>
                    <option value="female">FEMALE</option>
                    <option value="other">OTHER</option>
                  </select>
                  <small class="text-danger" id="gender_error"></small>
                </div>
                <div class="form-group">
                  <label for="dob">Date of Birth:</label>
                  <input type="date" id="dob" name="dob" class="form-control" required>
                </div>
              </fieldset>
            </div>

            <div class="col-md-6">
              <fieldset>
                <legend>Contact Details</legend>
                <div class="form-group">
                  <label for="email">Email Address:</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="phone">Mobile Number:</label>
                  <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter mobile no" maxlength="10">
                  <small class="text-danger" id="phone_error"></small> <!-- Error message -->
                </div>
              </fieldset>
            </div>
          </div>

          <!-- Second Part: Address, Profile Picture, Account Settings -->
          <div class="row">
            <div class="col-md-6">
              <fieldset>
                <legend>Address</legend>
                <div class="form-group">
                  <label for="address_line1">Address Line 1:</label>
                  <input type="text" id="address_line1" name="address_line1" class="form-control" placeholder="Enter Address Line 1">
                </div>
                <div class="form-group">
                  <label for="address_line2">Address Line 2:</label>
                  <input type="text" id="address_line2" name="address_line2" class="form-control" placeholder="Enter Address Line 2">
                </div>
                <div class="form-group">
                  <label for="city">City:</label>
                  <input type="text" id="city" name="city" class="form-control" placeholder="Enter City">
                  <small class="text-danger" id="city_error"></small>
                </div>
                <div class="form-group">
                  <label for="state">State:</label>
                  <input type="text" id="state" name="state" class="form-control" placeholder="Enter State">
                  <small class="text-danger" id="state_error"></small>
                </div>
                <div class="form-group">
                  <label for="zip_code">Zip Code:</label>
                  <input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="Enter Zip Code" maxlength="6">
                  <small class="text-danger" id="zip_code_error"></small>
                </div>
                <div class="form-group">
                  <label for="country">Country:</label>
                  <input type="text" id="country" name="country" class="form-control" placeholder="Enter Country">
                  <small class="text-danger" id="country_error"></small>
                </div>
              </fieldset>
            </div>

            <div class="col-md-6">
              <fieldset>
                <legend>Profile Picture</legend>
                <div class="form-group">
                  <label for="profile_picture">Upload Profile Picture:</label>
                  <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                  <img src="" id="profile_image" name="profile_image" height="100" width="100" style="display: none;">
                </div>
              </fieldset>

              <fieldset>
                <legend>Account Settings</legend>
                <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="confirm_password">Confirm Password:</label>
                  <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                  <label for="role">User Role:</label>
                  <select id="role" name="role" class="form-control" required>
                    <!-- <option value="">User Role</option>
              <option value="admin">Admin</option>
              <option value="editor">Editor</option>
              <option value="viewer">Viewer</option> -->
                  </select>
                </div>
              </fieldset>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="form-group">
            <button type="submit" id="btnSave" class="btn btn-primary">Save Profile</button>
          </div>
          <input type="hidden" id="userId" name="userId">
        </form>
        <div>
          <small class="text-danger" id="msg"></small>
        </div>
      </div>




      <!-- <div class="content-wrapper">
        <h2 class="mt-5">Existing Users</h2>
        <div id="tableContainer" class="table table-bordered">
        </div>
      </div> -->
      <!-- </body>
</html> -->

    </div>
    <!-- content-wrapper ends -->
    <?php
    require_once("../view/template/footer.inc.php");
    ?>
    <script src="../view/assets/js/userProfile.js"></script>
    


  </div>
</div>