<?php

function usernameCheck($conn, $username){
    $sql = "SELECT username FROM student WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0){
        $result = mysqli_fetch_array($query);
        $dbusername = $result['username'];
        if($username == $dbusername){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

}


function loginCheck($conn, $username, $password){
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        $result = mysqli_fetch_array($query);
        $dbusername = $result['username'];
        if ($username == $dbusername) {
            $dbpass = $result['password'];
            if ($password == $dbpass) {
                return true;
            }else {
                return false;
            }
        }
    }
}

function Upload($conn, $project_name, $project_status, $project_link){
    $sql = "SELECT * FROM student WHERE project_name = 'project_name' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_array($query);
        $project_name = $result['project_name'];

        $sql2 = "SELECT * FROM terminal_report
                WHERE project_status = '$project_status' && project_name = '$project_name' $$ project_link = '$project_link'";
        $query2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($query2) > 0) {
            $result2 = mysqli_fetch_array($query2);
            $project_status = $result2['project_status'];
            $project_link = $result2['project_link'];
            if ( $project_status == $project_status && $project_link == $project_link ) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }else {
        return false;
    }
}



function cardSerial($conn, $card_serial){
    $sql = "SELECT * FROM generated_pins WHERE pin = '$card_serial'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($result = mysqli_fetch_array($query)) {
            $dbserial = $result['pin'];
            if ($card_serial == $dbserial) {
                return true;
            }else {
                return false;
            }
        }
    }else {
        return false;
    }
}

function checkGeneratedPin($conn, $pin, $username){
    $sql = "SELECT exam_pin FROM student WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($result = mysqli_fetch_array($query)) {
            $dbpin = $result['exam_pin'];
            if ($pin == $dbpin) {
                return true;
            }else {
                return false;
            }
        }
    }else {
        return false;
    }
}

function ifPinAvailableForUse($conn, $card_serial){
     $sql = "SELECT * FROM generated_pins WHERE pin = '$card_serial' && status='open'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($result = mysqli_fetch_array($query)) {
            $dbpin = $result['pin'];
            if ($card_serial == $dbpin) {
                return true;
            }else {
                return false;
            }
        }
    }else {
        return false;
    }
}

function ifPinStillExists($conn, $card_serial, $name, $current_date){
    $sql = "SELECT * FROM pins WHERE pin_code = '$card_serial' && status = '1' && used_by = '$name'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_array($query);
        $dbpin = $result['pin_code'];
        $dbname = $result['used_by'];
        $db_card_expired = $result['expire_date'];
        if ($card_serial == $dbpin && $name == $dbname && $current_date < $db_card_expired) {
            return true;
        }else {
            return false;
        }
    }
}

