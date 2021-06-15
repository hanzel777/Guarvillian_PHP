<?php
    $con = mysqli_connect("localhost", "test2021", "Q1W2E3R4!", "test2021");

    mysqli_set_charset($con,"utf8");

    $userID = $_POST["userID"];

    $statement = mysqli_prepare($con, "SELECT userID FROM user WHERE userID = ?");
    mysqli_stmt_bind_param($statement, "s", $userID);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID);

    $response = array();
    $response["success"] = true;

    while(mysqli_stmt_fetch($statement)){
        $response["success"] = false;
        $response["userID"] = $userID; 
    }
    
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");

    echo json_encode($response);
?>