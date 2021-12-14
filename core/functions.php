<?php


// common functions start
function runQuery($sql){
    if (mysqli_query(con(),$sql)){
        return true;
    }else{
        die("Query Fail : ".mysqli_error());
    }
}

function redirect($l){
    header("location:$l");
}

function linkTo($l){
    echo "<script>location.href=$l</script>";
}

function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}

function fetch($sql){
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function showTime($timestamp,$format = "h:i (y-m-d)"){
    return date($format,strtotime($timestamp));
}

// common functions end

// contact functions start

function contactAdd(){
    $name = textFilter($_POST['name']);
    $phone = textFilter($_POST['phone']);
    $saveFolder = "store/";
    $photo = $saveFolder.$_FILES['photo']['name'];
    $sql = "INSERT INTO contacts (photo,name,phone) VALUES ('$photo','$name','$phone')";
//    die($sql);
    if  (runQuery($sql)){
        linkTo('contact_add.php');
    }
}

function contact($id){
    $sql = "SELECT * FROM contacts WHERE id = $id";
    return fetch($sql);
}

function contacts(){
    $sql = "SELECT * FROM contacts ORDER BY name ASC";
    return fetchAll($sql);
}

function contactDelete($id){
    $sql = "SELECT * FROM contacts WHERE id = '$id'";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    unlink($row['photo']);
    $sql = "DELETE FROM contacts WHERE id = $id";
    return runQuery($sql);
}

function contactEdit(){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $saveFolder = "store/";
    $photo = $saveFolder.$_FILES['photo']['name'];
    $sql = "UPDATE contacts SET name = '$name',phone = '$phone',photo='$photo' WHERE id = $id";
    return runQuery($sql);
}

// contact functions end

// validation start

function setSuccess($successName,$message){
    $_SESSION['success'][$successName] = $message;
}

function getSuccess($successName){
    if(isset($_SESSION['success'][$successName])){
        return $_SESSION['success'][$successName];
    }else{
        return "";
    }
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName]  = $message;
}

function getError($inputName){
    if  (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}

function cleanError(){
    $_SESSION['error'] = [];
}

function request($functionName,$location = ""){

    $errorStatus = 0;
    $photo = "";
    $name = "";
    $phone = "";

    if  (empty($_POST['name'])){
        setError('name','Name is required.');
        $errorStatus = 1;
    }else{
        if (strlen($_POST['name']) < 5){
            setError('name','name is too short.');
            $errorStatus = 1;
        }else{
            if (strlen($_POST['name']) > 20){
                setError('name','name is too long.');
                $errorStatus = 1;
            }else{
                if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) {
                    setError('name', "Only letters and space allowed.");
                    $errorStatus = 1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if (empty($_POST['phone'])){
        setError('phone','phone is required.');
        $errorStatus = 1;
    }else{
        if  (!preg_match("/^[0-9 ]*$/",$_POST['phone'])){
            setError('phone','phone format invalid.');
            $errorStatus = 1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    $supportFileType = ['image/jpeg','image/png'];

    if(empty($_FILES['photo']['name'])) {
        setError('photo',"Profile is required.");
        $errorStatus = 1;
    }else{
        $tempFile = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        if (in_array($_FILES['photo']['type'], $supportFileType)) {
            $saveFolder = "store/";
            move_uploaded_file($tempFile,$saveFolder.$fileName);
        } else {
            setError("photo", "File is invalid.");
            $errorStatus = 1;
        }
    }

    if (!$errorStatus){
        $functionName();
        redirect($location);
        setSuccess('submit','Contact added completely.');

    }

}

// validation end