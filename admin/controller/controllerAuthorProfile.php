<?php
require_once('../view/connection.inc.php');
$action = htmlspecialchars(trim($_POST['action']));
// if ($action == "load") {
//     try {
//         $sql = "select * from tbl_company";
//         $stmt = $pdo->prepare($sql);
//         $stmt->execute();
//         $company_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         echo json_encode(['status' => 'success', 'record' => $company_detail]);
//     } catch (PDOException $e) {
//         // Handle any exceptions and return an error message
//         echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
//     }
// } else 
if ($action == "update") {
    // Get POST data and sanitize it
    $id                 = $_POST['authorId'];
    $author_name        = $_POST['name'];
    $author_description = $_POST['description'];
    $whatsapp           = $_POST['whatsapp'];
    $facebook           = $_POST['facebook'];
    $linkedin           = $_POST['linkedin'];
    $instagram          = $_POST['instagram'];
    $twitter            = $_POST['twitter'];
    $oldauthor_image    = isset($_POST['authorImage']) ? $_POST['authorImage'] : null;

    // Handle file upload for images
    $uploadDir = '../assets/uploads/';
    $authorFile = isset($_FILES['authorImage']) && $_FILES['authorImage']['error'] === 0 ? $_FILES['authorImage'] : null;

    $authorIamgeForUpload = $oldauthor_image; // Default to old logo if no new file is uploaded

    if ($authorFile) {
        $authorIamgeForUpload = uniqid() . '.' . pathinfo($authorFile['name'], PATHINFO_EXTENSION);
        if (!move_uploaded_file($authorFile['tmp_name'], $uploadDir . $authorIamgeForUpload)) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload company logo.']);
            exit;
        }
    }

    // Update query
    $sql = "UPDATE tbl_author 
        SET author_name          = :author_name, 
            author_description   = :author_description, 
            author_image         = :author_image, 
            whatsapp_url         = :whatsapp_url, 
            facebook_url         = :facebook_url, 
            linkedin_url         = :linkedin_url, 
            instagram_ulr        = :instagram_ulr, 
            twitter_url          = :twitter_url 
            WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        // Prepare parameters for the query
        $params = [
            ':author_name'          => $author_name,
            ':author_description'   => $author_description,
            ':author_image'         => $authorIamgeForUpload,
            ':whatsapp_url'         => $whatsapp,
            ':facebook_url'         => $facebook,
            ':linkedin_url'         => $linkedin,
            ':instagram_ulr'        => $instagram,
            ':twitter_url'          => $twitter,
            ':id'                   => $id,
        ];

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
    $author_name        = $_POST['name'];
    $author_description = $_POST['description'];
    $whatsapp           = $_POST['whatsapp'];
    $facebook           = $_POST['facebook'];
    $linkedin           = $_POST['linkedin'];
    $instagram          = $_POST['instagram'];
    $twitter            = $_POST['twitter'];
    // Handle file upload for images
    $uploadDir = '../assets/uploads/';
    $files = [
        'authorImage' => '',
    ];
    foreach ($files as $key => &$fileName) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {
            $fileName = uniqid() . '.' . pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            $filePath = $uploadDir . $fileName;
            if (!move_uploaded_file($_FILES[$key]['tmp_name'], $filePath)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload ' . $key . '.']);
                exit;
            }
        }
    }
    // Insert data into the database
    $sql = "INSERT INTO  tbl_author
                (author_name,author_description,author_image,whatsapp_url,facebook_url,linkedin_url,instagram_ulr,twitter_url)
                VALUES
                (:author_name, :author_description, :author_image, :whatsapp_url, :facebook_url, :linkedin_url, :instagram_ulr, :twitter_url)";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ':author_name'          => $author_name,
            ':author_description'   => $author_description,
            ':author_image'         => $files['authorImage'],
            ':whatsapp_url'         => $whatsapp,
            ':facebook_url'         => $facebook,
            ':linkedin_url'         => $linkedin,
            ':instagram_ulr'        => $instagram,
            ':twitter_url'          => $twitter,
        ];
        // Execute the query with parameters
        if ($stmt->execute($params)) {
            echo json_encode(['status' => 'success', 'message' => 'The author profile has been successfully created!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Something went wrong. We couldn\'t create the author profile at this time. Please try again later.']);
        }
    } catch (PDOException $e) {
        // Catch and display errors
        echo json_encode(['status' => 'error', 'message' => "Oops! We encountered an error while saving the author profile. Please try again later. Details: " . $e->getMessage()]);
        exit;
    }
}
