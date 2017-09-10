
<?php
    require("password.php");
    
    //$dbh = new PDO('mysql:host=localhost;dbname=project1', "root", NULL);
    //$con = mysqli_connect("mysql10.000webhost.com", "a3288368_user", "abcd1234", "a3288368_data");
    $dbh = mysqli_connect("localhost", "root", NULL, "project1");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //$statement = mysqli_prepare($dbh, "SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt = $dbh->prepare("SELECT * FROM user_info WHERE username = ?");
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    //$stmt->bindParam('ss', $username, $password);
    //mysqli_stmt_execute($statement);
    $stmt->execute();
    
    //mysqli_stmt_store_result($statement);
    $stmt->store_result();
    //mysqli_stmt_bind_result($statement, $userID, $name, $username, $password);
    $stmt->bind_result($colName, $colUsername, $colPassword);
    
    $response = array();
    $response["success"] = false;  
    
    //while(mysqli_stmt_fetch($stmt)){
    while($stmt->fetch()){
        if (password_verify($password,$colPassword)){
            $response["success"] = true;  
            $response["name"] = $colName;
            //$response["username"] = $colUsername;
            //$response["password"] = $colPassword;
        }
    }
    
    echo json_encode($response);
?>
