<?php
require_once('../view/connection.inc.php');
$action = htmlspecialchars(trim($_POST['action']));
if ($action == "submit") {
    $CategoryName = htmlspecialchars(trim($_POST['Category_name']));
    $CategoryDescription = htmlspecialchars($_POST['Category_description']);
    $sql = "INSERT INTO categories(category_name,category_description) values(:category_name,:category_description)";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ":category_name" => $CategoryName,
            ":category_description" => $CategoryDescription,
        ];
        if ($stmt->execute($params)) {
            echo json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Record not inserted successfully!"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error!" . $e->getMessage()]);
    }
} else if ($action == "load") {
    try {
        $sql = "SELECT * from tbl_author";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '<table class="table table-bordered table-responsive">
        <thead>
            <tr>
               <th style="width: 5%; text-align: center;">#</th>
                <th style="width: 20%; text-align: center;">Name</th>
                <th style="width: 40%; text-align: center;">Description</th>
                <th style="width: 10%; text-align: center;">Image</th>
                <th style="width: 10%; text-align: center;">Status</th>
                <th style="width: 10%; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>';

        // Loop through the Categorys and create table rows
        foreach ($users as $key => $user) {
            $recid = $user['id'];
            $statusClass = ($user['status'] == 1) ? 'btn-success' : 'btn-warning';
            $statusText = ($user['status'] == 1) ? 'Active' : 'Inactive';
            $toggleStatus = ($user['status'] == 1) ? 0 : 1; // Toggle between 1 and 0

            $table .= '<tr id="row_' . $user['id'] . '">
                  <td style="text-align: center;">' . ($key + 1) . '</td>
                  <td>' . htmlspecialchars($user['author_name']) . '</td>
                  <td>' . htmlspecialchars($user['author_description']) . '</td>
                  <td style="text-align: center;"><img src="../assets/uploads/' . htmlspecialchars($user['author_image']) . '" alt="Author Image" width="100"></td>

                  <td style="text-align: center;">
                    <!-- Use button for status toggle -->
                    <button id="status"  class="btn ' . $statusClass . ' btn-sm" data-id="' . $user['id'] . '" onclick="toggleStatus(' . $user['id'] . ')">
                        ' . $statusText . '
                    </button>
                  </td>
                  <td>
                    <button id="btnEdit" class="btn btn-info btn-sm" data-value ="' . $user['id'] . '"><i class="mdi mdi-pencil menu-icon"></i></button>
                    <button id="btnDelete" class="btn btn-danger btn-sm" data-value ="' . $user['id'] . '"><i class="mdi mdi-trash-can menu-icon"></i></button>
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
    $sql = "update tbl_author set status = :status WHERE id = :id";
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
    $sql = "DELETE from tbl_author where id = :id";
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
    $sql = "SELECT * FROM tbl_author WHERE id = :id";
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
    $id = htmlspecialchars($_POST['catid']);
    $CategoryName = htmlspecialchars(trim($_POST['Category_name']));
    $CategoryDescription = htmlspecialchars($_POST['Category_description']);
    $sql = "update categories set category_name = :category_name,category_description = :category_description where id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $params = [
            ':id' => $id,
            ':category_name' => $CategoryName,
            ':category_description' => $CategoryDescription
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
