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
        <h1>Category Section Group</h1>
        <!-- User Category Form -->
        <form method="POST" action="" id="categorySection">
          <div class="form-group">
            <label>Category</label>
            <select class="js-example-basic-single" style="width:100%" id="category" name="category" required>
              <option value="" selected disabled>Select Category</option> <!-- Default option with value -->
              <option value="hot">Hot</option>
              <option value="trending">Trending</option>
              <option value="breaking">Breaking</option>
              <option value="normal">Normal</option>
            </select>
            <small class="text-danger" id="category_error"></small>
          </div>

          <div class="form-group">
            <label for="duration_type">Select Duration Type:</label>
            <select class="js-example-basic-single" style="width:100%" id="duration" name="duration" required>
              <option value="" selected disabled>Select Duration Time</option> <!-- Default option with value -->
              <option value="minute">Minute(s)</option>
              <option value="hour">Hour(s)</option>
              <option value="day">Day(s)</option>
              <option value="week">Week(s)</option>
              <option value="month">Month(s)</option>
              <option value="none">none</option> 
            </select>
            <small class="text-danger" id="duration_error"></small>
          </div>

          <div class="form-group">
            <label for="duration_limit">Enter Duration Limit:</label>
            <input class="form-control" type="number" name="duration_limit" id="duration_limit" required>
            <small class="text-danger" id="duration_limit_error"></small>
          </div>

          <button type="submit" id="btnSave" name="btnSave" class="btn btn-primary">Save</button>
          <input type="hidden" id="catid" name="catid">
        </form>

        <div>
          <small class="text-danger" id="msg"></small>
        </div>

        <!-- Existing Category List -->
        <h2 class="mt-5">Existing Categorys</h2>
        <div id="tableContainer" class="table table-bordered">
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    require_once("../view/template/footer.inc.php");
    ?>
    <script src="../view/assets/js/categorySectionGroup.js"></script>
  </div>
</div>