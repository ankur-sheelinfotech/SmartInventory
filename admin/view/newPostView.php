<?php
require_once("../view/template/top.inc.php");
?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <?php
  require_once("../view/template/sidebar.inc.php")
  ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <h2> New Post </h2>
      </div>
      <form class="forms-sample" method="POST" action="" id="newPost" enctype="multipart/form-data" autocomplete="off">
        
      <div class="form-group row">
          <label class="col-sm-3 col-form-label">Post For Hero Section</label>
          <div class="col-sm-4">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="heroRadios" id="heroRadiosYes" value="Yes"> Yes </label>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="heroRadios" id="heroRadiosNo" value="No" checked> No </label>
            </div>
          </div>
        </div>

        <div id="heroimage-container" class="form-group" style="display:none;">
        <label>Hero Image</label>
          <input type="file" id="heroImage" name="heroImage" class="form-control" required>
          <img src="" id="hero_image" name="hero_image" height="100" width="100" style="display: none;">
          <small id="hero_image_error" class="form-text text-danger" style="display:none;"></small>
        </div>

        <div class="form-group">
          <label>Category</label>
          <select class="js-example-basic-single" style="width:100%" id="category" name="category">
          </select>
        </div>

        <div class="form-group">
          <label>Category Section Group</label>
          <select class="js-example-basic-single" style="width:100%" id="categorySection" name="categorySection">
          </select>
        </div>

        <div class="form-group">
          <!-- <label for="title">Title (Max 10 words)</label> -->
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title words limit" required>
          <small id="titleWordLimit" class="form-text text-muted">Words: 0/10</small>
        </div>

        <div class="form-group">
          <!-- <label for="description">Description (Max 20 words)</label> -->
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Enter the description words limit" required>
          <small id="descriptionWordLimit" class="form-text text-muted">Words: 0/20</small>
        </div>

        <div class="form-group">
          <!-- <label for="shortDescription">Short Description (Max 30 words)</label> -->
          <label for="shortDescription">Short Description</label>
          <input type="text" id="shortDescription" class="form-control" placeholder="Enter the short description words limit">
          <small id="shortDescriptionWordLimit" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
          <!-- <label for="longDescription">Long Description (Max 40 words)</label> -->
          <label for="longDescription">Long Description</label>
          <input type="text" id="longDescription" class="form-control" placeholder="Enter the long description words limit">
          <small id="longDescriptionWordLimit" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
          <label>Post Image</label>
          <input type="file" id="postImage" name="postImage" class="form-control" required>
          <img src="" id="post_image" name="post_image" height="100" width="100" style="display: none;">
          <small id="post_image_error" class="form-text text-danger" style="display:none;"></small>
        </div>

        <div class="form-group">
          <label>Facebook Image</label>
          <input type="file" id="facebookImage" name="facebookImage" class="form-control" required>
          <img src="" id="facebook_image" name="facebook_image" height="100" width="100" style="display: none;">
          <small id="facebook_image_error" class="form-text text-danger" style="display:none;"></small>
        </div>

        <div class="form-group">
          <label>Instagram Image</label>
          <input type="file" id="instagramImage" name="instagramImage" class="form-control" required>
          <img src="" id="instagram_image" name="instagram_image" height="100" width="100" style="display: none;">
          <small id="instagram_image_error" class="form-text text-danger" style="display:none;"></small>
        </div>

        <div class="form-group">
          <label>WhatsApp Image</label>
          <input type="file" id="whatsappImage" name="whatsappImage" class="form-control" required>
          <img src="" id="whatsapp_image" name="whatsapp_image" height="100" width="100" style="display: none;">
          <small id="whatsapp_image_error" class="form-text text-danger" style="display:none;"></small>
        </div>

        <div class="form-group">
          <label>Status and Visibility</label>
          <select class="js-example-basic-single" style="width:100%" id="statusVisibility" name="statusVisibility">
            <option>Draft</option>
            <option>Pending</option>
            <option>Private</option>
            <option>Scheduled</option>
            <option>Published</option>
          </select>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Sticky</label>
          <div class="col-sm-4">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="stickyRadios" id="stickyRadiosYes" value="Yes" checked> Yes </label>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="stickyRadios" id="stickyRadiosNo" value="No"> No </label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Publish</label>
          <div class="col-sm-4">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="publishRadios" id="immediately" value="immediately" checked>
                Immediately
              </label>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="publishRadios" id="scheduled" value="scheduled">
                Scheduled
              </label>
            </div>
          </div>
        </div>

        <!-- Date and Time Picker Container -->
        <div id="datetime-container" style="display: none;">
          <div class="form-group row mt-3">
            <label for="datepicker" class="col-sm-3 col-form-label">Select Date & Time</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Choose a date">
            </div>
            <div class="col-sm-5">
              <input type="time" class="form-control" id="timepicker" name="timepicker">
            </div>
          </div>
        </div>

        <!-- <div class="form-group">
          <label for="editor">Post Content</label>
          <textarea id="myeditor" name="content" class="form-control" required></textarea>
        </div> -->

        <div class="form-group">
          <label>AMP</label>
          <select class="js-example-basic-single" style="width:100%" id="amp" name="amp">
            <option>Enable</option>
            <option>Disable</option>
          </select>
        </div>

        <div class="form-group">
          <label>Tags</label>
          <select class="js-example-basic-multiple" id="tag" name="tag[]" multiple="multiple" style="width:100%" required>
            <!-- Tags will be dynamically inserted here -->
            <!-- Example: -->
            <!-- <option value="1">HealthCare</option> -->
            <!-- <option value="2">Public Health</option> -->
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputCity1">Tagged By</label>
          <input type="text" id="tagby" name="tagby" class="form-control" id="exampleInputCity1" placeholder="Tagged By" required>
        </div>

        <!-- <div class="form-group">
          <label for="Author">Author</label>
          <input type="text" id="author" name="author" class="form-control" placeholder="Author" required>
        </div> -->

        <div class="form-group">
          <label for="Author">Author</label>
          <select class="js-example-basic-single" style="width:100%" id="author" name="author">
          </select>
        </div>

        <button type="submit" id="btnSave" name="btnSave" class="btn btn-gradient-primary me-2">Submit</button>
        <!-- <button class="btn btn-light">Cancel</button> -->
      </form>
      <div>
        <small class="text-danger" id="msg"></small>
      </div>
    </div>
    <?php
    require_once("../view/template/footer.inc.php")
    ?>
     <script src="assets/js/comman.js"></script>
    <script src="../view/assets/js/newPost.js"></script>
   

    <script>
      jQuery.noConflict();
      jQuery(document).ready(function($) {
        $(document).ready(function() {
          
          $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
          });

          $('input[name="publishRadios"]').change(function() {
            if ($('#scheduled').is(':checked')) {
              $('#datetime-container').show();
            } else {
              $('#datetime-container').hide();
            }
          });

          $('input[name="heroRadios"]').change(function() {
            if ($('#heroRadiosYes').is(':checked')) {
              $('#heroimage-container').show();
            } else {
              $('#heroimage-container').hide();
            }
          });

        });
      });
    </script>

    
  </div>
</div>