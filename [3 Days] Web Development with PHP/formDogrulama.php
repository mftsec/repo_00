<?php
function validateFormInput($name, $email, $age){
    
    $errors = array();

    if (empty($name) || !ctype_alpha($name)) {
        $errors[] = "isim alfabetik karakter içermeli veya boş olmamali";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email adresi vali olmalidir";
    }


    if ($age <= 0 || !ctype_digit($age)) {
        $errors[] = "yas 0 dan büyük olmali ve integer olmali";
    }

    return $errors;


}

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];


$errors = validateFormInput($name,$email,$age);


if (empty($errors)){
    echo "form başarili sekilde dogrulandi";
} else {
    foreach ($errors as $error){
        echo $error;
    }
}

?>