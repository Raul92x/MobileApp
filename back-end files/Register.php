<?php
    require("password.php");
    
        $dbh = new PDO('mysql:host=localhost;dbname=project1', "root", NULL);
        //$dbh = mysqli_connect("localhost", "root", NULL, "project1");

        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        function registerUser() {
            global $dbh, $name, $username, $password;
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $dbh->prepare("INSERT INTO user_info (name, username, password) VALUES (?,?,?)");
            //mysqli_stmt_bind_param($stmt, "sss", $name, $username, $passwordHash);
            $stmt->execute(array($name,$username,$passwordHash));
            //$stmt->execute();
            $stmt=NULL;
            //$stmt->close();            
        }
        
        function UsernameAvailable() {
            global $dbh, $username;
            $stmt = $dbh->prepare("SELECT * FROM user_info WHERE username = ?"); 
            //mysqli_stmt_bind_param($stmt, "s", $username);
            
            if (empty($username)){
                return false;
            }else{
                $stmt->execute(array($username));
                $count = $stmt->rowCount();
                //$count = mysqli_stmt_num_rows($stmt);
                $stmt=NULL;
                //$stmt->close();         
                if ($count < 1){
                    return true; 
                }else {
                    return false; 
                }
            }
        }
   
    $response = array();
    $response["success"] = false;  
    
    
    if (usernameAvailable() == true){
        registerUser();
        $response["success"] = true;
    }
    
    echo json_encode($response);
    
?>


<h1> project 1 test</h1>

<p>
    User in database: <?php print_r($results) ?>
</p>
