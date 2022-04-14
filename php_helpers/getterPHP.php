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

    function getSubjects($data)
    {
        $grade = $data["grade"];
        if($grade>=6 && $grade<=12){
            $res = selectDatabase("SELECT * FROM subjects WHERE active=1 AND grade_level=$grade ORDER BY subject_name");
        }else{
            $res = selectDatabase("SELECT * FROM subjects WHERE active=1 ORDER BY subject_name");
        }
        return $res;
    }

    function getSections($data)
    {
        $grade = $data["grade"];
        if($grade>=6 && $grade<=12){
            $res = selectDatabase("SELECT * FROM sections WHERE active=1 AND grade_level=$grade ORDER BY section_name");
        }else{
            $res = selectDatabase("SELECT * FROM sections WHERE active=1 ORDER BY section_name");
        }
        return $res;
    }

    function getTeachersClass($data)
    {
        $res = selectDatabase("SELECT ID, last_name, first_name, active FROM `teacher` WHERE active=1");
        return $res;
    }

    function getTeachersHandledClass($data)
    {
        $res = selectDatabase("SELECT handle.ID, teacher.ID AS teacher_ID, teacher.last_name, teacher.first_name, teacher.active, subjects.subject_name, subjects.active, handle.grade_level, handle.active, sections.section_name, sections.active FROM `teacher` INNER JOIN `handle` ON teacher.ID=handle.teacher_ID INNER JOIN sections ON sections.ID=handle.section_ID INNER JOIN subjects ON subjects.ID=handle.subject_ID WHERE handle.active=1");
        return $res;
    }

    function getTeacherHandledClasses($data)
    {
        $ID = intval($data["ID"]);
        $res = selectDatabase("SELECT handle.ID, teacher.ID AS teacher_ID, teacher.last_name, teacher.first_name, teacher.active, subjects.ID AS subject_ID, subjects.subject_name, subjects.active, handle.grade_level, handle.active, sections.section_name, sections.active FROM `teacher` INNER JOIN `handle` ON teacher.ID=handle.teacher_ID INNER JOIN sections ON sections.ID=handle.section_ID INNER JOIN subjects ON subjects.ID=handle.subject_ID WHERE handle.active=1 AND teacher.ID=$ID");
        return $res;
    }
    
    function getTeacherSections($data)
    {
        $res = selectDatabase("SELECT * FROM sections WHERE active=1 ORDER BY grade_level");
        $section = [];
        $temp = [];
        $grade = 7;
        foreach ($res as $key => $value) {
            if($grade!=$value["grade_level"]){
                $section[$grade] = $temp;
                $grade=$value["grade_level"];
                $temp = array();
            }
            array_push($temp, [$value["section_name"], $value["ID"]]);
        }
        $section[$grade] = $temp;
        return $section;
    }

    function getTeacherSubjects($data)
    {
        $res = selectDatabase("SELECT * FROM subjects WHERE active=1 ORDER BY grade_level");
        $ubject = [];
        $temp = [];
        $grade = 7;
        foreach ($res as $key => $value) {
            if($grade!=$value["grade_level"]){
                $ubject[$grade] = $temp;
                $grade=$value["grade_level"];
                $temp = array();
            }
            array_push($temp, [$value["subject_name"], $value["ID"]]);
        }
        $ubject[$grade] = $temp;
        return $ubject;
    }

    function getGradeSections($data)
    {
        $res = selectDatabase("SELECT * FROM sections WHERE active=1 ORDER BY grade_level");
        $section = [];
        $temp = [];
        $grade = 7;
        foreach ($res as $key => $value) {
            if($grade!=$value["grade_level"]){
                $section[$grade] = $temp;
                $grade+=1;
                $temp = array();
            }
            array_push($temp, $value["section_name"]);
        }
        $section[$grade] = $temp;
        return $section;
    }

    function checkStudentLRN($data)
    {
        $lrn = $data["LRN"];
        $res = selectDatabase("SELECT COUNT(LRN) FROM student WHERE LRN=$lrn AND active=1");
        return $res[0]["COUNT(LRN)"];
    }

    function checkTeacherEmployeeNum($data)
    {
        $employeeNumber = $data["employeeNumber"];
        $res = selectDatabase("SELECT COUNT(employee_no) FROM teacher WHERE employee_no='$employeeNumber' AND active=1");
        return $res[0]["COUNT(employee_no)"];
    }
    
    function checkUserPassword($data)
    {
        $ID = $data["ID"];
        $role = $data["role"];
        $oldPassword = $data["oldPassword"];
        $res = selectDatabase("SELECT COUNT(ID) FROM $role WHERE password='$oldPassword' AND active=1 AND ID=$ID");
        return $res[0]["COUNT(ID)"];
    }

    function getHandledActivities($data)
    {
        $handle_ID = $data["handle_ID"];
        $sqlWhere = "handle_ID=";
        if(count($handle_ID)==1){
            $sqlWhere .= $handle_ID[0];
        }else{
            for ($i=0; $i < count($handle_ID); $i++) { 
                # code...
                if($i==count($handle_ID)-1){
                    $sqlWhere .= $handle_ID[$i];
                }else{
                    $sqlWhere .= $handle_ID[$i].' OR handle_ID=';
                }
            }
        }
        $res = selectDatabase("SELECT * FROM subject_activity WHERE ($sqlWhere) AND active=1");
        return $res;
    }

    function getTeacherActivityHistoryStudents($data)
    {
        $activityList = $data["activityList"];
        $sqlWhere = "activity_ID=";
        if(count($activityList)==1){
            $sqlWhere .= $activityList[0];
        }else{
            for ($i=0; $i < count($activityList); $i++) { 
                # code...
                if($i==count($activityList)-1){
                    $sqlWhere .= $activityList[$i];
                }else{
                    $sqlWhere .= $activityList[$i].' OR activity_ID=';
                }
            }
        }
        $res = selectDatabase("SELECT `student_activity`.`activity_ID`, `student_activity`.`ID` AS `student_activity_ID`, `student`.`first_name`, `student`.`middle_name`, `student`.`last_name`, `student_activity`.`status` FROM `subject_activity` JOIN `student_activity` ON `subject_activity`.`ID`=`student_activity`.`activity_id` JOIN `student` ON `student`.`LRN`=`student_activity`.`LRN` WHERE $sqlWhere AND `subject_activity`.`active` = 1");
        return $res;
    }

    function getStudentActivityCount($data)
    {
        $ID = $data["ID"];
        $statistics = [];
        $divisor = 4;
        $dividen = 0;

        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Assignment'");
        $statistics["Assignment"]["Total"] = $res[0]["Total"];
        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Assignment' AND student_activity.status=1");
        $statistics["Assignment"]["Finished"] = $res[0]["Total"];
        if($statistics["Assignment"]["Total"] == 0){
            $statistics["Assignment"]["Percent"] = 100;
            $divisor = $divisor - 1;
        }else{
            $statistics["Assignment"]["Percent"] = ($statistics["Assignment"]["Finished"]/$statistics["Assignment"]["Total"])*100;
            $dividen = $dividen + $statistics["Assignment"]["Percent"];
        }
        

        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Quiz'");
        $statistics["Quiz"]["Total"] = $res[0]["Total"];
        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Quiz' AND student_activity.status=1");
        $statistics["Quiz"]["Finished"] = $res[0]["Total"];
        if($statistics["Quiz"]["Total"] == 0){
            $statistics["Quiz"]["Percent"] = 100;
            $divisor = $divisor - 1;
        }else{
            $statistics["Quiz"]["Percent"] = ($statistics["Quiz"]["Finished"]/$statistics["Quiz"]["Total"])*100;
            $dividen = $dividen + $statistics["Quiz"]["Percent"];

        }
        

        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Performance Task'");
        $statistics["Performance Task"]["Total"] = $res[0]["Total"];
        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Performance Task' AND student_activity.status=1");
        $statistics["Performance Task"]["Finished"] = $res[0]["Total"];
        if($statistics["Performance Task"]["Total"] == 0){
            $statistics["Performance Task"]["Percent"] = 100;
            $divisor = $divisor - 1;
        }else{
            $statistics["Performance Task"]["Percent"] = ($statistics["Performance Task"]["Finished"]/$statistics["Performance Task"]["Total"])*100;
            $dividen = $dividen + $statistics["Performance Task"]["Percent"];
            
        }
        

        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Other'");
        $statistics["Other"]["Total"] = $res[0]["Total"];
        $res = selectDatabase("SELECT COUNT(student_activity.ID) AS Total  FROM student_activity JOIN subject_activity ON student_activity.activity_id=subject_activity.ID WHERE subject_activity.handle_ID=$ID AND subject_activity.active=1 AND subject_activity.category='Other' AND student_activity.status=1");
        $statistics["Other"]["Finished"] = $res[0]["Total"];
        if($statistics["Other"]["Total"] == 0){
            $statistics["Other"]["Percent"] = 100;
            $divisor = $divisor - 1;

        }else{
            $statistics["Other"]["Percent"] = ($statistics["Other"]["Finished"]/$statistics["Other"]["Total"])*100;
            $dividen = $dividen + $statistics["Other"]["Percent"];
        }
        if($divisor==0){
            $statistics["TotalPercent"]=100;
        }else{
            $statistics["TotalPercent"] = $dividen/$divisor;
        }
        $statistics["TotalActivities"] = $statistics["Assignment"]["Total"]+$statistics["Quiz"]["Total"]+$statistics["Performance Task"]["Total"]+$statistics["Other"]["Total"];
        $statistics["TotalFinished"] = $statistics["Assignment"]["Finished"]+$statistics["Quiz"]["Finished"]+$statistics["Performance Task"]["Finished"]+$statistics["Other"]["Finished"];
        return $statistics;
    }

    function test(){
        echo "hey";
    }
    function testSlow(){
        sleep(2);
        return 1;
    }
