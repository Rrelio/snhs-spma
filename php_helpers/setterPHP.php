<?php
    header('Content-Type: application/json');
    $data=json_decode(file_get_contents("php://input"), true);
    $funct=$data['func'];
    $response = $funct($data);
    echo json_encode($response);

    function modifyDatabase($query){
        include 'db_connect.php';
        if(mysqli_query($conn, $query)){
            return "1";
        }else{
            return mysqli_error($conn);
        }
        include 'db_close.php';
    }

    function selectDatabase($query){
        include 'db_connect.php';
        $res = [];
        $counter = 0;
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $res = array_merge($res, [strval($counter) => $row]);
                $counter++;
            }
            return $res;
        }else{
            return "0";
        }
        include 'db_close.php';
    }

    function setInitialPassword($data)
    {
        $ID = $data["ID"];
        $password = $data["password"];
        $user = $data["user"];
        $res = modifyDatabase("UPDATE $user SET password='$password', initial='0' WHERE ID='$ID'");
        return $res;
    }

    function requestPasswordReset($data)
    {
        $user = $data["user"];
        $credential = $data["credential"];
        $res = '';
        $res1 = '';
        $check = '';
        if($user === "teacher")
        {
            $res = selectDatabase("SELECT * FROM teacher WHERE employee_no='$credential'");
        }elseif($user === "parent")
        {
            $res = selectDatabase("SELECT * FROM parent WHERE child_lrn='$credential'");
        }elseif($user === "student")
        {
            $res = selectDatabase("SELECT * FROM student WHERE LRN='$credential'");
        }
        // print_r($res);
        if($res!="0")
        {
            $ID = $res[0]["ID"];
            $check = selectDatabase("SELECT * FROM reset_requests WHERE role_id='$ID'");
            if($check=="0")
            {
                $res1 = modifyDatabase("INSERT INTO reset_requests (role,role_id,active, date) VALUES ('$user','$ID','1', NOW());");
            }else
            {
                $res1 = modifyDatabase("UPDATE reset_requests SET active='1', date=NOW() WHERE role_id='$ID'");
            }
            return $res1;
        }else
        {
            return $res;
        }
    }

    function setNewNote($data)
    {
        $header = $data["header"];
        $body = $data["body"];
        $res = modifyDatabase("INSERT INTO notes (header, body, date) VALUES ('$header', '$body', NOW())");
        return $res;
    }

    function setNoteEdit($data)
    {
        $id = $data["id"];
        $header = $data["header"];
        $body = $data["body"];
        $res = modifyDatabase("UPDATE notes SET header='$header', body='$body' WHERE id='$id'");
        return $res;
    }

    function setNoteDelete($data)
    {
        $id = $data["id"];
        $res = modifyDatabase("DELETE FROM notes WHERE id='$id'");
        return $res;
    }

    function setActive($data)
    {
        $ID = $data["ID"];
        $role = $data["role"];
        $active = $data["active"];
        $res = modifyDatabase("UPDATE $role SET active='$active' WHERE ID='$ID'");
        return $res;
    }

    function setResetPassword($data)
    {
        $id = $data["id"];
        $role = $data["role"];
        $info = $data["info"];
        $res = modifyDatabase("UPDATE $role SET password='$info', reset=0 WHERE ID='$id'");
        return $res;
    }

    function setEvent($data)
    {
        $date = $data["date"];
        $color = $data["color"];
        $category = $data["category"];
        $name = $data["name"];
        $res = modifyDatabase("INSERT INTO events (date, holiday, holiday_info, color) VALUES ('$date', '$category', '$name', '$color')");
        return $res;
    }

    function setEventEdit($data)
    {
        $id = $data["id"];
        $date = $data["date"];
        $name = $data["name"];
        $category = $data["category"];
        $color = $data["color"];
        $res = modifyDatabase("UPDATE events SET date='$date', holiday='$category', holiday_info='$name', color='$color' WHERE ID=$id");
        return $res;
    }

    function setEventDelete($data)
    {
        $id = $data["id"];
        $res = modifyDatabase("DELETE FROM events WHERE ID=$id");
        return $res;
    }

    function setNewSubject($data)
    {
        $grade = $data["grade"];
        $subject = $data["subject"];
        $res = modifyDatabase("INSERT INTO subjects (subject_name, grade_level, active) VALUE ('$subject', $grade, 1)");
        return $res;
    }

    function setSubjectDelete($data)
    {
        $ID = $data["ID"];
        $res = modifyDatabase("UPDATE subjects SET active = 0 WHERE ID=$ID");
        return $res;
    }

    function setNewSection($data)
    {
        $grade = $data["grade"];
        $section = $data["section"];
        $res = modifyDatabase("INSERT INTO sections (section_name, grade_level, active) VALUE ('$section', $grade, 1)");
        return $res;
    }

    function setSectionDelete($data)
    {
        $ID = $data["ID"];
        $res = modifyDatabase("UPDATE sections SET active = 0 WHERE ID=$ID");
        return $res;
    }

    function setTeacherHandles($data)
    {
        $handle = $data["handle"];
        $ID = $data["ID"];
        $res = modifyDatabase("UPDATE teacher SET handle='$handle' WHERE ID=$ID");
        return $res;
    }

    function setAddStudent($data)
    {
        $lastName = $data["lastName"];
        $firstName = $data["firstName"];
        $middleName = $data["middleName"];
        $LRN = $data["LRN"];
        $gradeLevel = $data["gradeLevel"];
        $section = $data["section"];
        $res = modifyDatabase("INSERT INTO student (last_name, first_name, middle_name, LRN, password, grade_level, section, active, reset, initial, theme) VALUE ('$lastName', '$firstName', '$middleName', '$LRN', '$LRN', '$gradeLevel', '$section', 1, 0, 1, '128, 168, 63')");
        return $res;
    }

    function setAddParent($data)
    {
        $lastName = $data["lastName"];
        $firstName = $data["firstName"];
        $middleName = $data["middleName"];
        $LRN = $data["LRN"];
        $contactNumber = $data["contactNumber"];
        $res = modifyDatabase("INSERT INTO parent (last_name, first_name, middle_name, contact_number, child_lrn, password, active, reset, initial, theme) VALUE ('$lastName', '$firstName', '$middleName', '$contactNumber', '$LRN', '$LRN', 1, 0, 1, '128, 168, 63')");
        return $res;
    }
    function setAddTeacher($data)
    {
        $lastName = $data["lastName"];
        $firstName = $data["firstName"];
        $middleName = $data["middleName"];
        $employeeNumber = $data["employeeNumber"];
        $email = $data["email"];
        $res = modifyDatabase("INSERT INTO teacher (last_name, first_name, middle_name, employee_no, email, handle, password, active, reset, initial, theme) VALUE ('$lastName', '$firstName', '$middleName', '$employeeNumber', '$email', '{}', '$employeeNumber', 1, 0, 1, '128, 168, 63')");
        return $res;
    }
    