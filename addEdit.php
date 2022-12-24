<?php

// Start session 
if (!session_id()) {
    session_start();
}

// Retrieve session data 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

// Get status message from session 
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

// Get Mahasiswa data 
$MembersData = $userData = array();
if (!empty($_GET['id'])) {
    // Include database configuration file 
    require_once 'dbConfig.php';

    // Fetch data from SQL server by row ID 
    $sql = "SELECT * FROM Members WHERE ID = " . $_GET['id'];
    $query = $conn->prepare($sql);
    $query->execute();
    $MembersData = $query->fetch(PDO::FETCH_ASSOC);
}
$userData = !empty($sessData['userData']) ? $sessData['userData'] : $MembersData;
unset($_SESSION['sessData']['userData']);

$actionLabel = !empty($_GET['id']) ? 'Edit' : 'Add';

?>

<!-- Display status message -->
<?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    </div>
<?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <h2><?php echo $actionLabel; ?> Mahasiswa</h2>
    </div>
    <div class="col-md-6">
        <form method="post" action="userAction.php">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" class="form-control" name="NIM" placeholder="Enter your first name" value="<?php echo !empty($userData['NIM']) ? $userData['NIM'] : ''; ?>" required="">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="Nama" placeholder="Enter your last name" value="<?php echo !empty($userData['Nama']) ? $userData['Nama'] : ''; ?>" required="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="Email" placeholder="Enter your email" value="<?php echo !empty($userData['Email']) ? $userData['Email'] : ''; ?>" required="">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="Alamat" placeholder=" Alamat" value="<?php echo !empty($userData['Alamat']) ? $userData['Alamat'] : ''; ?>" required="">
            </div>

            <a href="index.php" class="btn btn-secondary">Back</a>
            <input type="hidden" name="ID" value="<?php echo !empty($userData['ID']) ? $userData['ID'] : ''; ?>">
            <input type="submit" name="userSubmit" class="btn btn-success" value="Submit">
        </form>
    </div>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
