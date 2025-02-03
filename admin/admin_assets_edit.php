<?php
include("admin_header.php");

$username = "root";
$password = "";
$server_name = "localhost";
$db_name = "arms_db";

$conn = new mysqli($server_name, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
        $type = $_POST['type'];
        $supplier = $_POST['supplier'];
        $assetModel = $_POST['assetModel'];
        $department = $_POST['department'];
        $status = $_POST['status'];

        $sql = "UPDATE assets SET type='$type',supplier='$supplier',
    assetModel='$assetModel',department='$department',status='$status'";

        $conn->query($sql);
        header("Location: admin_assets.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Assets</title>
</head>

<body>
    <div class="container-fluid">

        <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" class="form-control" id="type" placeholder="e.g. Phone">
            </div>
            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <input type="text" name="supplier" class="form-control" id="supplier" placeholder="e.g. Apple">
            </div>
            <div class="mb-3">
                <label for="assetModel" class="form-label">Asset Model</label>
                <input type="text" name="assetModel" class="form-control" id="assetModel" placeholder="e.g. Iphone 23 PRO MAX">
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" name="department" class="form-control" id="department" placeholder="e.g. IOS">
            </div>
            <div class="form-check">
                <h6>Status</h6>
                <input class="form-check-input" value="available" type="radio" name="status" id="status1">
                <label class="form-check-label" for="status1">
                    Available
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="unavailable" type="radio" name="status" id="status2">
                <label class="form-check-label" for="status2">
                    Unavailable
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="maintenance" type="radio" name="status" id="status3">
                <label class="form-check-label" for="status3">
                    Maintenance
                </label>
            </div>

            <a class="btn btn-danger" href="admin_assets.php" role="button" id="cancel">Cancel</a>

            <input class="btn btn-primary" type="submit" value="Update" id="submit">
        </form>

    </div>
</body>

</html>