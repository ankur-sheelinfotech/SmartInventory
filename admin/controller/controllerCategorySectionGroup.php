<?php
require_once('../view/connection.inc.php');
$action = htmlspecialchars(trim($_POST['action']));
if ($action == "submit") {
    // Sanitize the input values
    $category = htmlspecialchars(trim($_POST['category']));
    $duration = htmlspecialchars($_POST['duration']);
    $duration_limit = htmlspecialchars($_POST['duration_limit']);

    // Check if the category already exists
    $sql = "SELECT * FROM category_duration WHERE category = :category";
    $stmt = $pdo->prepare($sql);
    $params = [':category' => $category];
    $stmt->execute($params);

    // If the category already exists
    if ($stmt->rowCount() > 0) {
        echo json_encode(["status" => "error", "message" => "This category already exists. You can only update it."]);
    } else {
        // If the category doesn't exist, proceed to insert the data
        $sql = "INSERT INTO category_duration(category, duration_type, duration_limit) VALUES(:category, :duration_type, :duration_limit)";

        try {
            $stmt = $pdo->prepare($sql);
            $params = [
                ":category" => $category,
                ":duration_type" => $duration,
                ":duration_limit" => $duration_limit,
            ];

            if ($stmt->execute($params)) {
                echo json_encode(["status" => "success", "message" => "Record inserted successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Record not inserted successfully!"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
        }
    }
} else if ($action == "load") {
    try {
        $sql = "SELECT * from category_duration";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $Categorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '<table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th style="text-align:center; width: 5%;">#</th>
                <th>Category</th>
                <th>Duration Type</th>
                <th>Duration Limit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';
        // Loop through the Categorys and create table rows
        foreach ($Categorys as $key => $Category) {
            $recid = $Category['id'];
            $table .= '<tr id="row_' . $Category['id'] . '">
                  <td style="text-align:center; width: 5%;">' . ($key + 1) . '</td>
                  <td>' . htmlspecialchars($Category['category']) . '</td>
                  <td>' . htmlspecialchars($Category['duration_type']) . '</td>
                  <td>' . htmlspecialchars($Category['duration_limit']) . '</td>
                  <td>
                    <button id="btnEdit" class="btn btn-info btn-sm" data-value ="' . $Category['id'] . '"><i class="mdi mdi-pencil menu-icon"></i></button>
                    <button id="btnDelete" class="btn btn-danger btn-sm" data-value ="' . $Category['id'] . '"><i class="mdi mdi-trash-can menu-icon"></i></button>
                  </td>
                </tr>';
        }

        // End the table HTML
        $table .= '</tbody></table>';

        // Return the table as part of the JSON response
        echo json_encode(['status' => 'success', 'table' => $table]);
    } catch (PDOException $e) {
        // Handle any exceptions and return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else if ($action == "active") {
    $id = htmlspecialchars($_POST['id']);
    $status = htmlspecialchars($_POST['status']);
    $sql = "update categories set status = :status WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ":id" => $id,
            ":status" => $status,
        ];
        if ($stmt->execute($params)) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated succesfully', 'newStatus' => $status]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record not inserted successfully!']);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error!" . $e->getMessage()]);
    }
} else if ($action == "delete") {
    $id = htmlspecialchars($_POST['id']);
    $sql = "DELETE from category_duration where id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ':id' => $id,
        ];
        if ($stmt->execute($params)) {
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record not deleted']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
    }
} else if ($action == "show") {
    $id = htmlspecialchars($_POST['id']);
    $sql = "select * from category_duration where id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ':id' => $id,
        ];
        if ($stmt->execute($params)) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode(['status' => 'success', 'record' => $result]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record can not edit']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
    }
} else if ($action == "update") {
    $id = htmlspecialchars($_POST['catid']);
    $category = htmlspecialchars(trim($_POST['category']));
    $duration = htmlspecialchars($_POST['duration']);
    $duration_limit = htmlspecialchars($_POST['duration_limit']);
    $sql = "update category_duration set 
            category        = :category,
            duration_type   = :duration_type, 
            duration_limit  = :duration_limit 
            where id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ':category'         => $category,
            ':duration_type'    => $duration,
            ':duration_limit'   => $duration_limit,
            ':id' => $id
        ];
        if ($stmt->execute($params)) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record not updated']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
    }
}
