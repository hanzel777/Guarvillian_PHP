<?php
    $con = mysqli_connect("localhost", "test2021", "Q1W2E3R4!", "test2021");

    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];
    $userGender = $_POST["userGender"];
    $userRescueGrade = $_POST["userRescueGrade"];
    $userEmail = $_POST["userEmail"];
    $userPhoneNumber = $_POST["userPhoneNumber"];
    $userBirth = $_POST["userBirth"];

    $statement = mysqli_prepare($con, "INSERT INTO user VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sssssss", $userID, $userPassword, $userEmail, $userGender, $userPhoneNumber, $userBirth, $userRescueGrade);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");

    echo json_encode($response);
?>