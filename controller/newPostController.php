<?php
require_once('../view/connection.inc.php');
$action = htmlspecialchars(trim($_POST['action']));
if ($action == "loadtag") {
    try {
        $sql = "SELECT * from tbl_tag";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '';
        // Loop through the Categorys and create table rows
        foreach ($tags as $key => $tag) {
            $table .= '<option value="' . htmlspecialchars($tag['tag_name']) . '">' . htmlspecialchars($tag['tag_name']) . '</option>';
        }
        // End the table HTML
        $table .= '</select>';
        // Return the table as part of the JSON response
        echo json_encode(['status' => 'success', 'table' => $table]);
    } catch (PDOException $e) {
        // Handle any exceptions and return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
if ($action == "category") {
    try {
        $sql = "SELECT * from categories";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '<option>Select Category</option>';
        // Loop through the Categorys and create table rows
        foreach ($categories as $key => $category) {
            $table .= '<option value="' . htmlspecialchars($category['id']) . '">' . htmlspecialchars($category['category_name']) . '</option>';
        }
        // End the table HTML
        $table .= '</select>';
        // Return the table as part of the JSON response
        echo json_encode(['status' => 'success', 'table' => $table]);
    } catch (PDOException $e) {
        // Handle any exceptions and return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else if ($action == "categorysection") {
    try {
        $sql = "SELECT * from category_duration";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '<option>Select Category Section Group</option>';
        // Loop through the Categorys and create table rows
        foreach ($categories as $key => $category) {
            $table .= '<option value="' . htmlspecialchars($category['id']) . '">' . ucfirst(htmlspecialchars($category['category'])) . '</option>';
        }
        // End the table HTML
        $table .= '</select>';
        // Return the table as part of the JSON response
        echo json_encode(['status' => 'success', 'table' => $table]);
    } catch (PDOException $e) {
        // Handle any exceptions and return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
if ($action == "loadauthor") {
    try {
        $sql = "SELECT * from tbl_author";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '<option>Select Author Name</option>';
        // Loop through the Categorys and create table rows
        foreach ($categories as $key => $category) {
            $table .= '<option value="' . htmlspecialchars($category['id']) . '">' . ucfirst(htmlspecialchars($category['author_name'])) . '</option>';
        }
        // End the table HTML
        $table .= '</select>';
        // Return the table as part of the JSON response
        echo json_encode(['status' => 'success', 'table' => $table]);
    } catch (PDOException $e) {
        // Handle any exceptions and return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else if ($action == "get_limt") {
    try {
        $sql = "SELECT * from tbl_tag";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '';
        // Loop through the Categorys and create table rows
        foreach ($tags as $key => $tag) {
            $table .= '<option value="' . htmlspecialchars($tag['tag_name']) . '">' . htmlspecialchars($tag['tag_name']) . '</option>';
        }
        // End the table HTML
        $table .= '</select>';
        // Return the table as part of the JSON response
        echo json_encode(['status' => 'success', 'table' => $table]);
    } catch (PDOException $e) {
        // Handle any exceptions and return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else if ($action == "fetchlimit") {
    try {
        // SQL to get the word limits for each field
        $sql = "SELECT field_name, word_limit FROM tbl_post_field_limits";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        // Fetch data as an associative array
        $wordLimits = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $wordLimits[$row['field_name']] = $row['word_limit'];
        }
        // Return the result as JSON
        echo json_encode([
            'status' => 'success',
            'data' => $wordLimits
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
} else if ($action == "editor") {
    try {
        // SQL to get the word limits for each field
        $sql = "SELECT field_name, word_limit FROM tbl_post_field_limits WHERE field_name in('Short Description','Long Description')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        // Fetch data as an associative array
        $wordLimits = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $wordLimits[$row['field_name']] = $row['word_limit'];
        }
        // Return the result as JSON
        echo json_encode([
            'status' => 'success',
            'data' => $wordLimits
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
} else if ($action == "show") {
    $id = htmlspecialchars($_POST['id']);
    $sql = "select * from user_profiles where id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ':id' => $id,
        ];
        if ($stmt->execute($params)) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully', 'record' => $result]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record not deleted']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
    }
} else if ($action == "update") {
    // Get POST data and sanitize it
    $id = $_POST['postid'];  // Make sure to get the post ID for updating
    $heroSection        = $_POST['heroRadios'];
    $category           = $_POST['category'];
    $categorySection    = $_POST['categorySection'];
    $title              = $_POST['title'];
    $description        = $_POST['description'];
    $shortDescription   = $_POST['shortDescription'];  // This will contain HTML content from TinyMCE
    $longDescription    = $_POST['longDescription'];   // This will contain HTML content from TinyMCE
    $statusVisibility   = $_POST['statusVisibility'];
    $stickyRadios       = $_POST['stickyRadios'];
    $publishRadios      = $_POST['publishRadios'];
    $datepicker         = $_POST['datepicker'];
    $timepicker         = $_POST['timepicker'];
    $amp                = $_POST['amp'];
    $tagby              = $_POST['tagby'];
    $author             = $_POST['author'];
    $tags               = isset($_POST['tag']) ? $_POST['tag'] : [];
    // Convert array to comma-separated string for tags
    $tagsString         = implode(',', $tags);
    $oldHeroImage       = isset($_POST['heroImage']) ? $_POST['heroImage'] : null;
    $oldPostImage       = isset($_POST['postImage']) ? $_POST['postImage'] : null;
    $oldFacebookImage   = isset($_POST['facebookImage']) ? $_POST['facebookImage'] : null;
    $oldInstagramImage  = isset($_POST['instagramImage']) ? $_POST['instagramImage'] : null;
    $oldWhatsappImage   = isset($_POST['whatsappImage']) ? $_POST['whatsappImage'] : null;

    // Handle file upload for images
    $uploadDir = '../assets/uploads/';
    $files = [
        'heroImage'     => '',
        'postImage'     => '',
        'facebookImage' => '',
        'instagramImage'=> '',
        'whatsappImage' => ''
    ];
    foreach ($files as $key => &$fileName) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {
            // If a new file is uploaded
            if ($_FILES[$key]['error'] === 0) {
                $fileName = uniqid() . '.' . pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
                $filePath = $uploadDir . $fileName;
                if (!move_uploaded_file($_FILES[$key]['tmp_name'], $filePath)) {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to upload ' . $key . '.']);
                    exit;
                }
            }
        } else {
            // If no new file was uploaded, use the old image
            $$key = $_POST[$key]; // Use the old image file name from the POST data
        }
    }

    // Update query
    $sql = "UPDATE posts 
            SET hero_section        = :hero_section,
                category            = :category,
                category_section    = :category_section,
                title               = :title, 
                description         = :description, 
                short_description   = :shortDescription, 
                long_description    = :longDescription, 
                status_visibility   = :statusVisibility, 
                sticky              = :stickyRadios, 
                publish             = :publishRadios, 
                datepicker          = :datepicker, 
                timepicker          = :timepicker, 
                amp                 = :amp, 
                tag                 = :tags, 
                tagby               = :tagby, 
                author              = :author, 
                hero_image          = :heroImage, 
                post_image          = :postImage, 
                facebook_image      = :facebookImage, 
                instagram_image     = :instagramImage, 
                whatsapp_image      = :whatsappImage
            WHERE id                = :id";
    try {
        $stmt = $pdo->prepare($sql);
        // Prepare parameters for the query
        $params = [
            'hero_section'      => $heroSection,
            'category'          => $category,
            'category_section'  => $categorySection,
            ':title'            => $title,
            ':description'      => $description,
            ':shortDescription' => $shortDescription,
            ':longDescription'  => $longDescription,
            ':statusVisibility' => $statusVisibility,
            ':stickyRadios'     => $stickyRadios,
            ':publishRadios'    => $publishRadios,
            ':datepicker'       => $datepicker,
            ':timepicker'       => $timepicker,
            ':amp'              => $amp,
            ':tags'             => $tagsString,
            ':tagby'            => $tagby,
            ':author'           => $author,
            // Check if a new postImage is uploaded or use the existing image name
            ':heroImage' => isset($_FILES['heroImage']) && $_FILES['heroImage']['error'] === 0 ? $files['heroImage'] : $oldHeroImage,
            ':postImage' => isset($_FILES['postImage']) && $_FILES['postImage']['error'] === 0 ? $files['postImage'] : $oldPostImage,
            // Similarly for other images
            ':facebookImage' => isset($_FILES['facebookImage']) && $_FILES['facebookImage']['error'] === 0 ? $files['facebookImage'] : $oldFacebookImage,
            ':instagramImage' => isset($_FILES['instagramImage']) && $_FILES['instagramImage']['error'] === 0 ? $files['instagramImage'] : $oldInstagramImage,
            ':whatsappImage' => isset($_FILES['whatsappImage']) && $_FILES['whatsappImage']['error'] === 0 ? $files['whatsappImage'] : $oldWhatsappImage,
            ':id'               => $id
        ];
        // Execute the query
        if ($stmt->execute($params)) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record not updated']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => "Error! " . $e->getMessage()]);
    }
} else if ($action == "submit") {
    // Sanitize and validate form data
    $heroSection        = $_POST['heroRadios'];
    $category           = $_POST['category'];
    $categorySection    = $_POST['categorySection'];
    $title              = $_POST['title'];
    $description        = $_POST['description'];
    $shortDescription   = $_POST['shortDescription'];  // This will contain HTML content from TinyMCE
    $longDescription    = $_POST['longDescription'];   // This will contain HTML content from TinyMCE
    $statusVisibility   = $_POST['statusVisibility'];
    $stickyRadios       = $_POST['stickyRadios'];
    $publishRadios      = $_POST['publishRadios'];
    $datepicker         = $_POST['datepicker'];
    $timepicker         = $_POST['timepicker'];
    $amp                = $_POST['amp'];
    $tagby              = $_POST['tagby'];
    $author             = $_POST['author'];
    $tags               = isset($_POST['tag']) ? $_POST['tag'] : [];

    // Convert array to comma-separated string
    $tagsString = implode(',', $tags);

    // Handle file upload for images
    $uploadDir = '../assets/uploads/';
    $files = [
        'heroImage' => '',
        'postImage' => '',
        'facebookImage' => '',
        'instagramImage' => '',
        'whatsappImage' => ''
    ];

    foreach ($files as $key => &$fileName) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {

            // Generate unique file name and move the uploaded file
            $fileName = uniqid() . '.' . pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            $filePath = $uploadDir . $fileName;

            if (!move_uploaded_file($_FILES[$key]['tmp_name'], $filePath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload ' . $key . '.']);
                exit;
            }
        }
    }
    // Insert data into the database
    $sql = "INSERT INTO posts
                (hero_section, category, category_section, title, description, short_description, long_description, status_visibility, sticky, publish, datepicker, timepicker, amp, tag, tagby, author, hero_image, post_image, facebook_image, instagram_image, whatsapp_image)
                VALUES
                (:hero_section, :category, :category_section, :title, :description, :short_description, :long_description, :status_visibility, :sticky, :publish, :datepicker, :timepicker, :amp, :tag, :tagby, :author, :hero_image, :post_image, :facebook_image, :instagram_image, :whatsapp_image)";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ':hero_section'      => $heroSection,
            ':category'          => $category,
            ':category_section'  => $categorySection,
            ':title'             => $title,
            ':description'       => $description,
            ':short_description' => $shortDescription,
            ':long_description'  => $longDescription,
            ':status_visibility' => $statusVisibility,
            ':sticky'            => $stickyRadios,
            ':publish'           => $publishRadios,
            ':datepicker'        => $datepicker,
            ':timepicker'        => $timepicker,
            ':amp'               => $amp,
            ':tag'               => $tagsString,  // Convert tags array to string
            ':tagby'             => $tagby,
            ':author'            => $author,
            ':hero_image'        => $files['heroImage'],
            ':post_image'        => $files['postImage'],
            ':facebook_image'    => $files['facebookImage'],
            ':instagram_image'   => $files['instagramImage'],
            ':whatsapp_image'    => $files['whatsappImage']
        ];
        // Execute the query with parameters
        if ($stmt->execute($params)) {
            echo json_encode(['status' => 'success', 'message' => 'Post created successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error: Could not create post.']);
        }
    } catch (PDOException $e) {
        // Catch and display errors
        echo json_encode(['status' => 'error', 'message' => "Error! Record not saved. " . $e->getMessage()]);
        exit;
    }
}
