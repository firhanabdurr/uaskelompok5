<?php
// Start session 
if (!session_id()) {
    session_start();
}

// Include database configuration file 
require_once 'dbConfig.php';

// Set default redirect url 
$redirectURL = 'index.php';

if (isset($_POST['userSubmit'])) {
    // Get form fields value 
    $ID = $_POST['ID'];
    $NIM = trim(strip_tags($_POST['NIM']));
    $Nama = trim(strip_tags($_POST['Nama']));
    $Email = trim(strip_tags($_POST['Email']));
    $Alamat = trim(strip_tags($_POST['Alamat']));

    $id_str = '';
    if (!empty($id)) {
        $id_str = '?id=' . $ID;
    }

    // Fields validation 
    $errorMsg = '';
    if (empty($NIM)) {
        $errorMsg .= '<p>Masukan NIM.</p>';
    }
    if (empty($Nama)) {
        $errorMsg .= '<p>Masukan Nama.</p>';
    }
    if (empty($Email) || !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= '<p>Masukan email.</p>';
    }
    if (empty($Alamat)) {
        $errorMsg .= '<p>Masukan Alamat.</p>';
    }

    // Submitted form data 
    $userData = array(
        'NIM' => $NIM,
        'Nama' => $nama,
        'Email' => $Email,
        'Alamat' => $Alamat
    );

    // Store the submitted field values in the session 
    $sessData['userData'] = $userData;

    // Process the form data 
    if (empty($errorMsg)) {
        if (!empty($ID)) {
            // Update data in SQL server 
            $sql = "UPDATE Members SET NIM = ?, Nama = ?, Email = ?, Alamat = ? WHERE ID = ?";
            $query = $conn->prepare($sql);
            $update = $query->execute(array($NIM, $Nama, $Email, $Alamat, $ID));

            if ($update) {
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Member data has been updated successfully.';

                // Remove submitted field values from session 
                unset($sessData['userData']);
            } else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';

                // Set redirect url 
                $redirectURL = 'addEdit.php' . $id_str;
            }
        } else {
            // Insert data in SQL server 
            $sql = "INSERT INTO Members (NIM, Nama, Email, Alamat, Created) VALUES (?,?,?,?,?)";
            $params = array(
                &$NIM,
                &$Nama,
                &$Email,
                &$Alamat,
                date("Y-m-d H:i:s")
            );
            $query = $conn->prepare($sql);
            $insert = $query->execute($params);

            if ($insert) {
                //$ID = $conn->lastInsertId(); 

                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Member data has been added successfully.';

                // Remove submitted field values from session 
                unset($sessData['userData']);
            } else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';

                // Set redirect url 
                $redirectURL = 'addEdit.php' . $id_str;
            }
        }
    } else {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>' . $errorMsg;

        // Set redirect url 
        $redirectURL = 'addEdit.php' . $id_str;
    }

    // Store status into the session 
    $_SESSION['sessData'] = $sessData;
} elseif (($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])) {
    $ID = $_GET['id'];

    // Delete data from SQL server 
    $sql = "DELETE FROM Members WHERE ID = ?";
    $query = $conn->prepare($sql);
    $delete = $query->execute(array($ID));

    if ($delete) {
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'Member data has been deleted successfully.';
    } else {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
    }

    // Store status into the session 
    $_SESSION['sessData'] = $sessData;
}

// Redirect to the respective page 
header("Location:" . $redirectURL);
exit();
