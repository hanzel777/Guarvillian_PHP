<?php
    $con = mysqli_connect("localhost", "test2021", "Q1W2E3R4!", "test2021");

    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];
    $userRescueGrade = $_POST["userRescueGrade"];


    $statement = mysqli_prepare($con, "SELECT userID FROM user WHERE userID = ? AND userPassword = ? AND userRescueGrade = ?");
    mysqli_stmt_bind_param($statement, "sss", $userID, $userPassword, $userRescueGrade);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID);


    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["userID"] = $userID; 
        $response["userRescueGrade"] = $userRescueGrade;
    }

    echo json_encode($response);
?>