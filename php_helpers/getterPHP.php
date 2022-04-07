<?php
    session_start();
    $funct = $_GET['func'];
    $data = json_decode($_GET['obj'], true);
    $response = $funct($data);
    echo json_encode($response);

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
            return null;
        }
        include 'db_close.php';
    }

    function modifyDatabase($query){
        include 'db_connect.php';
        if(mysqli_query($conn, $query)){
            return "1";
        }else{
            return mysqli_error($conn);
        }
        include 'db_close.php';
    }

    function getUserCredentials($data)
    {

        $user = $data["user"];
        $userName = $data["credential"];
        $userPassword = $data["password"];
        $res = '';
        if($user === "teacher")
        {
            $res = selectDatabase("SELECT * FROM teacher WHERE employee_no='$userName' AND password='$userPassword'");
        }elseif($user === "parent")
        {
            $res = selectDatabase("SELECT * FROM parent WHERE child_lrn='$userName' AND password='$userPassword'");
        }elseif($user === "student")
        {
            $res = selectDatabase("SELECT * FROM student WHERE LRN='$userName' AND password='$userPassword'");
        }
        return $res;
    }

    function getAdminCredential($data)
    {
        $email = $data["email"];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $res = selectDatabase("SELECT * FROM admin WHERE email='$email'");
            return $res;
        }else{
            return "Invalid";
        }
    }

    function getActiveUserTotal()
    {
        $students = selectDatabase("SELECT COUNT(ID) FROM student WHERE active=1");
        $parents = selectDatabase("SELECT COUNT(ID) FROM parent WHERE active=1");
        $teachers = selectDatabase("SELECT COUNT(ID) FROM teacher WHERE active=1");
        $res["totalStudents"] = $students[0]["COUNT(ID)"];
        $res["totalParents"] = $parents[0]["COUNT(ID)"];
        $res["totalTeachers"] = $teachers[0]["COUNT(ID)"];
        return $res;
    }

    function getNotes($data)
    {
        $res = selectDatabase("SELECT * FROM notes ORDER BY date DESC;");
        $_SESSION["notes"] = $res;
        return $res;
    }

    function getStudentAccounts($data)
    {
        $count = $data["count"];
        $sort = $data["sort"];
        $limit = 50;
        $offset = $count*$limit;
        $sortOrder = ($sort=="active")?"DESC":"ASC";
        $res = selectDatabase("SELECT ID, LRN, last_name, first_name, middle_name, grade_level, section, active FROM student ORDER BY $sort $sortOrder LIMIT $limit OFFSET $offset;");
        $total = selectDatabase("SELECT COUNT(*) FROM student");
        $res[0]["total"] = $total[0]["COUNT(*)"];
        return $res;
    }
    function getParentAccounts($data)
    {
        $count = $data["count"];
        $sort = $data["sort"];
        $limit = 50;
        $offset = $count*$limit;
        $sortOrder = ($sort=="active")?"DESC":"ASC";
        $res = selectDatabase("SELECT ID, child_lrn, last_name, first_name, middle_name, contact_number, active FROM parent ORDER BY $sort $sortOrder LIMIT $limit OFFSET $offset;");
        $total = selectDatabase("SELECT COUNT(*) FROM parent");
        $res[0]["total"] = $total[0]["COUNT(*)"];
        return $res;
    }
    function getTeacherAccounts($data)
    {
        $count = $data["count"];
        $sort = $data["sort"];
        $limit = 50;
        $offset = $count*$limit;
        $sortOrder = ($sort=="active")?"DESC":"ASC";
        $res = selectDatabase("SELECT ID, employee_no, last_name, first_name, middle_name, active FROM teacher ORDER BY $sort $sortOrder LIMIT $limit OFFSET $offset;");
        $total = selectDatabase("SELECT COUNT(*) FROM teacher");
        $res[0]["total"] = $total[0]["COUNT(*)"];
        return $res;
    }
    
    function getResets($data)
    {
        $role = $data["role"];
        $count = $data["count"];
        $sort = $data["sort"];
        $limit = 50;
        $offset = $count*$limit;
        $sortOrder = ($sort=="active")?"DESC":"ASC";
        $res = selectDatabase("SELECT * FROM reset_requests INNER JOIN $role ON reset_requests.role_id = $role.ID WHERE reset_requests.role = '$role' ORDER BY '$sort' $sortOrder LIMIT $limit OFFSET $offset;");
        if($res=="1")
        {
            $total = selectDatabase("SELECT COUNT(*) FROM reset_requests WHERE role='$role'");
            $res[0]["total"] = $total[0]["COUNT(*)"];
        }
        return $res;
    }
    function getEvents($data)
    {
        $res = selectDatabase("SELECT * FROM events WHERE date>=CURRENT_DATE() ORDER BY date ASC");
        return $res;
    }

    function getUpcomingEvents($data)
    {
        $res = selectDatabase("SELECT * FROM events WHERE date>=CURRENT_DATE() ORDER BY date LIMIT 3");
        return $res;
    }

    function test(){
        echo "hey";
    }
