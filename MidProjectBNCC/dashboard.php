<?php
// Include authentication check and session start at the beginning of the file
session_start();

// Logout logic
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();
}

function connectToDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "attendance_system";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    $sql = "SELECT ID, `firstName`, `lastName`, Email, Password, Bio FROM user";
    $result = mysqli_query($conn, $sql);

    $allUsers = [];
    if (mysqli_num_rows($result) > 0) {
        // Ambil setiap baris data dan tambahkan ke array $allUsers
        while ($row = mysqli_fetch_assoc($result)) {
            $allUsers[] = $row;
        }
    } else {
        echo "0 results";
    }

    // Tutup koneksi
    mysqli_close($conn);

    return $allUsers;
}

$allUsers = connectToDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Dashboard</h2>
            <p>Welcome!</p> 

            <!-- Search Bar -->
            <div class="mb-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Search by name or email,blm jalan sih💀" style="width: 50%;">
            </div>

            <!-- User List Table -->
            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allUsers as $index => $user) : ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $user['firstName'] . ' ' . $user['lastName']; ?></td>
                        <td><?php echo $user['Email']; ?></td>
                        <td>
                            <a href="viewuser.php?id=<?php echo $user['ID']; ?>" class="btn btn-info">View</a>
                            <a href="edituser.php?id=<?php echo $user['ID']; ?>" class="btn btn-warning">Edit</a>
                            <a href="deleteuser.php?email=<?php echo $user['Email']; ?>" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <button class="btn btn-success" onclick="window.location.href='addnewuser.php'">Add New User</button>

            <!-- Logout Button -->
            <a href="?logout=true" class="btn btn-danger">Logout</a>
            <footer class="mt-5">
            </footer>
        </div>
    </div>
</div>

</body>
</html>
