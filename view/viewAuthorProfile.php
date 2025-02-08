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
        <h2>Author Profile</h2>

        <form id="authorprofile" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required>
          </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" placeholder="Enter Description" rows="4"></textarea>
          </div>

          <div class="form-group">
            <label for="authorImage">Image:</label>
            <input type="file" id="authorImage" name="authorImage" class="form-control" accept="image/*" required>
            <img src="" id="author_image" name="author_image" height="100" width="100" style="display: none;">
            <small id="author_image_error" class="form-text text-danger" style="display:none;"></small>
          </div>

          <div class="form-group">
            <label for="whatsapp">WhatsApp Link:</label>
            <input type="url" id="whatsapp" name="whatsapp" class="form-control" placeholder="Enter WhatsApp Link (e.g., https://wa.me/yourphonenumber)" required>
          </div>

          <div class="form-group">
            <label for="facebook">Facebook Link:</label>
            <input type="url" id="facebook" name="facebook" class="form-control" placeholder="Enter Facebook Profile/Business Link" required>
          </div>

          <div class="form-group">
            <label for="linkedin">LinkedIn Link:</label>
            <input type="url" id="linkedin" name="linkedin" class="form-control" placeholder="Enter LinkedIn Profile/Company Link" required>
          </div>

          <div class="form-group">
            <label for="instagram">Instagram Link:</label>
            <input type="url" id="instagram" name="instagram" class="form-control" placeholder="Enter Instagram Profile Link" required>
          </div>

          <div class="form-group">
            <label for="twitter">Twitter Link:</label>
            <input type="url" id="twitter" name="twitter" class="form-control" placeholder="Enter Twitter Profile Link" required>
          </div>

          <button type="submit" id="btnSave" name="btnSave" class="btn btn-primary">Save</button>

          <div>
            <input type="hidden" id="authorId" name="authorId">
          </div>

        </form>
        <div>
          <small class="text-danger" id="msg"></small>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    require_once("../view/template/footer.inc.php");
    ?>
    <script src="../view/assets/js/authorProfile.js"></script>
    <script>
      // Toggle the status of the category between Active and Inactive
      function toggleCategoryStatus(categoryId) {
        var button = document.getElementById("toggle-" + categoryId);
        // Check the current text and toggle it
        if (button.innerHTML === "Enable") {
          button.innerHTML = "Disable";
          button.classList.remove("btn-gradient-success");
          button.classList.add("btn-gradient-warning");
        } else {
          button.innerHTML = "Enable";
          button.classList.remove("btn-gradient-warning");
          button.classList.add("btn-gradient-success");
        }
        // Optionally, make an AJAX call to update the status in the database
        // Example:
        // $.post('update_category_status.php', { category_id: categoryId, status: button.innerHTML });
      }
    </script>
  </div>
</div>