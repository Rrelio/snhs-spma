<?php
    $target_dir = "../images/user/" . $_POST["role"]."/";
    $temp = explode(".", $_FILES["sample_image"]["name"]);
    $filename = $_POST["role"] . "-" . $_POST["ID"] . '.' . end($temp);
    $target_file = $target_dir . $filename;
    $uploadOk = 1;
    $res = [$target_file];
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    if ($uploadOk == 0) {
    echo null;
    } else {
        if (move_uploaded_file($_FILES["sample_image"]["tmp_name"], $target_file)) {
            echo json_encode($res);
            // echo null;
        } else {
            echo null;
        }
    }
?>