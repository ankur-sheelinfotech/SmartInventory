<?php
require_once('../view/connection.inc.php');
require_once("../view/template/top.inc.php");
$id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;
if ($id === null) {
    header("Location: viewPostList.php");
    exit();
}
$sql = "select * from posts where id = :id";
try {
    $stmt = $pdo->prepare($sql);
    $params = [
        ':id' => $id,
    ];
    if ($stmt->execute($params)) {
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Post not found.";
        exit;
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
}
?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <?php
    require_once("../view/template/sidebar.inc.php")
    ?>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <h2> New Post </h2>
            </div>
            <form class="forms-sample" method="POST" action="" id="editPost">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Post For Hero Section</label>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="heroRadios" id="heroRadiosYes" value="Yes" <?php echo ($post['hero_section'] == 'Yes') ? 'checked' : ''; ?>> Yes </label>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="heroRadios" id="heroRadiosNo" value="No" <?php echo ($post['hero_section']) == "No" ? 'checked' : ''; ?>> No </label>
                        </div>
                    </div>
                </div>

                <div id="heroimage-container" class="form-group" style="display: <?php echo ($post['hero_section'] == 'Yes') ? 'block' : 'none'; ?>;">
                    <label>Hero Image</label>
                    <input type="file" id="heroImage" name="heroImage" class="form-control" required>
                    <?php if (!empty($post['hero_image'])) { ?>
                        <img src="../assets/uploads/<?php echo htmlspecialchars($post['hero_image']); ?>" id="hero_image" name="hero_image" height="100" width="100" style="display: block;">
                    <?php } else { ?>
                        <img src=" " id="hero_image" name="hero_image" height="100" width="100" style="display: none;">
                    <?php } ?>
                    <small id="hero_image_error" class="form-text text-danger" style="display:none;"></small>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="js-example-basic-single" style="width:100%" id="category" name="category">
                        <?php
                        $sql = "SELECT id,category_name FROM categories";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($categories as $row) {
                            $category_id = $row['id'];
                            $category = $row['category_name'];
                            $selected = ($post['category'] == $category_id) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($category_id) . '" ' . $selected . '>' . htmlspecialchars($category) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">

                    <label>Category Section Group</label>
                    <select class="js-example-basic-single" style="width:100%" id="categorySection" name="categorySection">
                        <?php
                        $sql = "select * from category_duration";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($categories as $row) {
                            $category_id = $row['id'];
                            $category = $row['category'];
                            $selected = ($post['category_section'] === $category_id) ? 'selected' : '';
                            echo '<option value ="' . htmlspecialchars($category_id) . '" ' . $selected . '>' . htmlspecialchars($category) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title (Max 10 words)</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title words limit" required value="<?php echo htmlspecialchars($post['title']); ?>">
                    <small id="titleWordLimit" class="form-text text-muted">Words: 0/10</small>
                </div>

                <div class="form-group">
                    <label for="description">Description (Max 20 words)</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter the description words limit" required value="<?php echo htmlspecialchars($post['description']); ?>">
                    <small id="descriptionWordLimit" class="form-text text-muted">Words: 0/20</small>
                </div>

                <div class="form-group">
                    <label for="shortDescription">Short Description (Max 30 words)</label>
                    <input type="text" id="shortDescription" class="form-control" placeholder="Enter the short description words limit" value="<?php echo htmlspecialchars($post['short_description']); ?>">
                    <small id="shortDescriptionWordLimit" class="form-text text-muted">Words: 0/30</small>
                </div>

                <div class="form-group">
                    <label for="longDescription">Long Description (Max 40 words)</label>
                    <input type="text" id="longDescription" class="form-control" placeholder="Enter the long description words limit" value="<?php echo htmlspecialchars($post['long_description']); ?>">
                    <small id="longDescriptionWordLimit" class="form-text text-muted">Words: 0/40</small>
                </div>

                <div class="form-group">
                    <label>Post Image</label>
                    <input type="file" id="postImage" name="postImage" class="form-control">
                    <?php if ($post['post_image']) { ?>
                        <img src="../assets/uploads/<?php echo $post['post_image']; ?>" id="post_image" name="post_image" height="100" width="100" style="display: block;">
                    <?php } ?>
                    <small id="post_image_error" class="form-text text-danger" style="display:none;"></small>
                </div>

                <div class="form-group">
                    <label>Facebook Image</label>
                    <input type="file" id="facebookImage" name="facebookImage" class="form-control">
                    <?php if ($post['facebook_image']) { ?>
                        <img src="../assets/uploads/<?php echo $post['facebook_image']; ?>" id="facebook_image" name="facebook_image" height="100" width="100" style="display: block;">
                    <?php } ?>
                    <small id="facebook_image_error" class="form-text text-danger" style="display:none;"></small>
                </div>

                <div class="form-group">
                    <label>Instagram Image</label>
                    <input type="file" id="instagramImage" name="instagramImage" class="form-control">
                    <?php if ($post['instagram_image']) { ?>
                        <img src="../assets/uploads/<?php echo $post['instagram_image']; ?>" id="instagram_image" name="instagram_image" height="100" width="100" style="display: block;">
                    <?php } ?>
                    <small id="instagram_image_error" class="form-text text-danger" style="display:none;"></small>
                </div>

                <div class="form-group">
                    <label>WhatsApp Image</label>
                    <input type="file" id="whatsappImage" name="whatsappImage" class="form-control">
                    <?php if ($post['whatsapp_image']) { ?>
                        <img src="../assets/uploads/<?php echo $post['whatsapp_image']; ?>" id="whatsapp_image" name="whatsapp_image" height="100" width="100" style="display: block;">
                    <?php } ?>
                    <small id="whatsapp_image_error" class="form-text text-danger" style="display:none;"></small>
                </div>

                <div class="form-group">
                    <label>Status and Visibility</label>
                    <select class="js-example-basic-single" style="width:100%" id="statusVisibility" name="statusVisibility">
                        <option value="Draft" <?php echo ($post['status_visibility'] == 'Draft') ? 'selected' : ''; ?>>Draft</option>
                        <option value="Pending" <?php echo ($post['status_visibility'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Private" <?php echo ($post['status_visibility'] == 'Private') ? 'selected' : ''; ?>>Private</option>
                        <option value="Scheduled" <?php echo ($post['status_visibility'] == 'Scheduled') ? 'selected' : ''; ?>>Scheduled</option>
                        <option value="Published" <?php echo ($post['status_visibility'] == 'Published') ? 'selected' : ''; ?>>Published</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sticky</label>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="stickyRadios" id="stickyRadiosYes" value="Yes" <?php echo ($post['sticky'] == 'Yes') ? 'checked' : ''; ?>> Yes
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="stickyRadios" id="stickyRadiosNo" value="No" <?php echo ($post['sticky'] == 'No') ? 'checked' : ''; ?>> No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Publish</label>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="publishRadios" id="immediately" value="immediately" <?php echo ($post['publish'] == 'Immediately') ? 'checked' : ''; ?>> Immediately
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="publishRadios" id="scheduled" value="scheduled" <?php echo ($post['publish'] == 'Scheduled') ? 'checked' : ''; ?>> Scheduled
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Date and Time Picker Container -->
                <div id="datetime-container" style="display: <?php echo ($post['publish'] == 'Scheduled') ? 'block' : 'none'; ?>;">
                    <div class="form-group row mt-3">
                        <label for="datepicker" class="col-sm-3 col-form-label">Select Date & Time</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="datepicker" name="datepicker" value="<?php echo htmlspecialchars($post['datepicker']); ?>" placeholder="Choose a date">
                        </div>
                        <div class="col-sm-5">
                            <input type="time" class="form-control" id="timepicker" name="timepicker" value="<?php echo htmlspecialchars($post['timepicker']); ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>AMP</label>
                    <select class="js-example-basic-single" style="width:100%" id="amp" name="amp">
                        <option value="Enable" <?php echo ($post['amp'] == 'Enable') ? 'selected' : ''; ?>>Enable</option>
                        <option value="Disable" <?php echo ($post['amp'] == 'Disable') ? 'selected' : ''; ?>>Disable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <select class="js-example-basic-multiple" id="tag" name="tag[]" multiple="multiple" style="width:100%" required>
                        <?php
                        $tags = $post['tag']; // Example comma-separated tags string
                        $tagsArray = explode(',', $tags); // Convert the string to an array
                        foreach ($tagsArray as $tag) {
                            echo '<option value="' . $tag . '" selected>' . $tag . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">Tagged By</label>
                    <input type="text" id="tagby" name="tagby" class="form-control" value="<?php echo htmlspecialchars($post['tagby']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="Author">Author</label>
                    <select class="js-example-basic-single" style="width:100%" id="author" name="author">
                        <?php
                        $sql = "select * from tbl_author";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $authors = $stmt->fetchALL(PDO::FETCH_ASSOC);
                        foreach ($authors as $row) {
                            $author_id = $row['id'];
                            $author = $row['author_name'];
                            $selected = ($post['author'] === $author_id) ? 'selected' : '';
                            echo '<option value = "' . htmlspecialchars($author_id) . '" ' . $selected . '>' . htmlspecialchars($author) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <input type="hidden" id="catid" name="postid" value="<?php echo htmlspecialchars($post['id']); ?>">
                </div>
                <button type="submit" id="btnUpdate" name="btnUpdate" class="btn btn-gradient-primary me-2">Update</button>
                <button class="btn btn-light">Cancel</button>
            </form>

            <div>
                <small class="text-danger" id="msg"></small>
            </div>
        </div>
        <?php
        require_once("../view/template/footer.inc.php")
        ?>
        <script src="assets/js/comman.js"></script>
        <script src="../view/assets/js/editPost.js"></script>
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

                    $(document).ready(function() {
                        // Initialize Select2 (if used)
                        $("#category").select2();

                        // Ensure the selected value is applied correctly
                        var selectedCategory = "<?php echo htmlspecialchars($post['category']); ?>";

                        if (selectedCategory) {
                            $("#category").val(selectedCategory).trigger('change'); // Set value and trigger change
                        }
                    });
                });
            });
            // Initialize select2 on the tag select element after page is ready
        </script>
    </div>
</div>