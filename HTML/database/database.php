<?php

$conn = "";
$stmt = "";

function connectToDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "attendance_system"; 
    $dataSourceName = "mysql:host=" . $servername . ";dbname=" . $dbName;
    try
    {
        $conn = new PDO($dataSourceName, $username, $password);
        return $conn;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        return null;
    }
}

function closeConnection()
{
    $conn = null;
    $stmt = null;
}

connectToDB();

function login($data)
{
    $conn = connectToDB();
    $stmt = $conn->prepare("SELECT * FROM user WHERE Email = ?");
    $stmt->execute([$data["email"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user["Password"] === md5($data["password"])) 
    { 
        if (isset($data["checkbox"]) && $data["checkbox"]) 
        {
            setcookie("email", $data["email"], time() + 3600);
        }
        header("Location: dashboard.php");
        exit;
    } else {
        echo($data["password"]);
        echo(" ");
        echo(md5($data["password"]));
        echo(" ");
        echo($user["Password"]);
        echo "Invalid email or password!";
    }
    closeConnection();
}


function register($data)
{
    $conn = connectToDB();
    $stmt = $conn->prepare("INSERT INTO user (ID,firstName,lastName,Email,Password) VALUES(?,?, ?, ?, ?)");
    $hashedPassword = md5($data["password"]);
    closeConnection();
    $id =  generateId();

    $stmt->execute([
        $id,
        $data["firstname"],
        $data["lastname"],
        $data["email"],
        $hashedPassword
    ]);
}

function generateRandomPassword($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $password;
}

function generateId($length = 5)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $nums = '0123456789';
    $id = '';

    for ($i = 0; $i < 2; $i++) {
        $id .= $characters[rand(0, strlen($characters) - 1)];
    }
    for ($i = 2; $i < 5; $i++) {
        $id .= $nums[rand(0, strlen($numd) - 1)];
    }

    return $id;
}
function addnewuser($data)
{
    $password = generateRandomPassword();
    $hashedPassword = md5($password);
    $conn = connectToDB();
    $id =  generateId();
    $stmt = $conn->prepare("INSERT INTO user (ID, firstName, lastName, Email, Password,Bio) VALUES (?, ?, ?, ?, ?, ?)");
    closeConnection();
    $stmt->execute([
        $id,
        $data["firstname"],
        $data["lastname"],
        $data["email"],
        $hashedPassword,
        $data["bio"]
    ]);
}

function deleteUser($email)
{
    $conn = connectToDB();
    $stmt = $conn->prepare('DELETE FROM user WHERE Email = ?');
    $stmt->execute([$email]);
    $stmt = null;
    closeConnection(); 
}




?>
