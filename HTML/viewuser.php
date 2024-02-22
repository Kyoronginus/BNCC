<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="viewuser.css">
</head>
<body>
    <div class="user-details">
        <?php
            require_once "database/database.php";
            session_start();
            function getUserDetails($userID)
            {
                $conn = connectToDB();
                $stmt = $conn->prepare("SELECT * FROM user WHERE ID = :userID");
                $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt->execute();
                $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
                $conn = null;
                return $userDetails;
            }
            if(isset($_GET['id'])) {
                $userID = $_GET['id'];
                $userDetails = getUserDetails($userID);
                if($userDetails) {
                    echo "<h2>User Details</h2>";
                    echo "<p>ID: " . $userDetails['ID'] . "</p>";
                    echo "<p>Name: " . $userDetails['firstName'] . " " . $userDetails['lastName'] . "</p>";
                    echo "<p>Email: " . $userDetails['Email'] . "</p>";
                    echo "<p>Bio: " . $userDetails['Bio'] . "</p>"; 
                } else {
                    echo "User not found.";
                }
            } else {
                echo "User ID not provided.";
            }
        ?>
    </div>
</body>
</html>