<?php
include_once('db.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$title = "Add";
$name = "";
$email = "";
$position = "";  // Define position variable
$salary = "";    // Define salary variable
$btn_title = "Save";

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = " . $id;
    $user = mysqli_query($conn, $sql);
    if ($user) {
        $title = "Update";
        $current_user = $user->fetch_assoc();
        $name = $current_user['name'];
        $email = $current_user['email'];
        $position = $current_user['position'];  // Fix: use position instead of mobile
        $salary = $current_user['salary'];      // Fix: use salary instead of password
        $btn_title = "Update";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Employees App</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2><?php echo $title; ?> Employee</h2>
                <div><a href="index.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="<?php echo $name; ?>"
                        placeholder="enter your name" name="name"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo $email; ?>"
                        placeholder="enter your email" name="email"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" class="form-control" value="<?php echo $position; ?>"
                        placeholder="enter your position" name="position"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input type="text" class="form-control" value="<?php echo $salary; ?>"
                        placeholder="enter your salary" name="salary"
                        autocomplete="false">
                </div>
                <?php
                if (isset($_GET['id'])) { ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <?php } ?>
                <input type="submit" class="btn btn-primary" value="<?php echo $btn_title; ?>" name="save"> <!-- Changed to type="submit" -->
            </form>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/icons.js"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>