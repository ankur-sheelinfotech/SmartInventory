<?php
    require_once('../view/connection.inc.php');
    $action = htmlspecialchars(trim($_POST['action']));
    if($action == "submit"){
    $CategoryName = htmlspecialchars(trim($_POST['Category_name']));
    $CategoryDescription = htmlspecialchars($_POST['Category_description']);
    $sql = "INSERT INTO categories(category_name,category_description) values(:category_name,:category_description)";
    try{
        $stmt = $pdo->prepare($sql);
        $params = [
            ":category_name" => $CategoryName,
            ":category_description" => $CategoryDescription,
        ];
        if($stmt->execute($params)){
            echo json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Record not inserted successfully!"]);
        }
    }catch(PDOException $e){
            echo json_encode(["status" => "error", "message" => "Error!" . $e->getMessage()]);
    }
    }else if($action == "load"){
        try{
        $sql = "SELECT * from categories";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $Categorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = '<table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';

// Loop through the Categorys and create table rows
foreach ($Categorys as $key => $Category) {
    $recid = $Category['id'];
    $statusClass = ($Category['status'] == 1) ? 'btn-success' : 'btn-warning';
    $statusText = ($Category['status'] == 1) ? 'Active' : 'Inactive';
    $toggleStatus = ($Category['status'] == 1) ? 0 : 1; // Toggle between 1 and 0

    $table .= '<tr id="row_' . $Category['id'] . '">
                  <td>' . ($key + 1) . '</td>
                  <td>' . htmlspecialchars($Category['category_name']) . '</td>
                  <td>' . htmlspecialchars($Category['category_description']) . '</td>
                  <td>
                    <!-- Use button for status toggle -->
                    <button id="status"  class="btn ' . $statusClass . ' btn-sm" data-id="' . $Category['id'] . '" onclick="toggleStatus(' . $Category['id'] . ')">
                        ' . $statusText . '
                    </button>
                  </td>
                  <td>
                    <button id="btnEdit" class="btn btn-info btn-sm" data-value ="' . $Category['id'] .'"><i class="mdi mdi-pencil menu-icon"></i></button>
                    <button id="btnDelete" class="btn btn-danger btn-sm" data-value ="' . $Category['id'] .'"><i class="mdi mdi-trash-can menu-icon"></i></button>
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
}else if($action == "active"){
    $id = htmlspecialchars($_POST['id']);
    $status = htmlspecialchars($_POST['status']);
    $sql = "update categories set status = :status WHERE id = :id";
    try{
        $stmt = $pdo->prepare($sql);
        $params = [
            ":id" => $id,
            ":status" => $status,
        ];
        if($stmt->execute($params)) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated succesfully', 'newStatus' => $status]);
        }else {
            echo json_encode(['status' => 'error', 'message' => 'Record not inserted successfully!']);
        }   
    } catch(PDOException $e){
        echo json_encode(["status" => "error", "message" => "Error!" . $e->getMessage()]);
    }
}else if($action == "delete"){
    $id = htmlspecialchars($_POST['id']);
    $sql = "DELETE from categories where id = :id";
    try{
        $stmt = $pdo->prepare($sql);
        $params = [
            ':id' => $id,
        ];
        if($stmt->execute($params)){
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully']);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Record not deleted']);
        }
    }catch(PDOException $e){
        echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
    }
}else if($action == "show"){
    $id = htmlspecialchars($_POST['id']);
    $sql = "select * from categories where id = :id";
    try{
        $stmt = $pdo->prepare($sql);
        $params = [
            ':id' => $id,
        ];
        if($stmt->execute($params)){
            $result = $stmt->fetch(PDO:: FETCH_ASSOC);
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully', 'record' => $result]);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Record not deleted']);
        }
    }catch(PDOException $e){
        echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
    }
}else if($action == "update"){
    $id = htmlspecialchars($_POST['catid']);
    $CategoryName = htmlspecialchars(trim($_POST['Category_name']));
    $CategoryDescription = htmlspecialchars($_POST['Category_description']);
    $sql = "update categories set category_name = :category_name,category_description = :category_description where id = :id";
    try{
        $stmt = $pdo->prepare($sql);
        $params = [
            ':id' => $id,
            ':category_name' => $CategoryName,
            ':category_description' => $CategoryDescription 
        ];
        if($stmt->execute($params)){
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
            
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Record not updated']);
        }
    }catch(PDOException $e){
        echo json_encode(['status' => 'error', 'message' => "Error!" . $e->getMessage()]);
    }
}





?>