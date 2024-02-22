<?php
require_once "database/database.php";

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $conn = connectToDB();
    $stmt = $conn->prepare("SELECT * FROM user WHERE ID = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found!";
        exit();
    }
    closeConnection();

    if (isset($_POST['update'])) {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];
        $conn = connectToDB();
        $stmt = $conn->prepare("UPDATE user SET firstName=?, lastName=?, Email=?, Bio=? WHERE ID=?");
        $stmt->execute([$firstName, $lastName, $email, $bio, $userId]);
        closeConnection();

        header("Location: dashboard.php");
        exit();
    }
} else {
    echo "User ID is missing!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mb-4">Edit User</h2>

            <!-- Edit User Form -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstName']; ?>">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastName']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['Email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" name="bio"><?php echo $user['Bio']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
