<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- route -->
 <?= form_open(url_to(''), "class='my_form', id='my_form'") ?>
     <?
        $name_attributes = [
            "name" => "txt_name",
            //"value" => "txt_name",
            "placeholder" => "Enter User Name",
            "class" => "c_user_name",
            "id" => "class_name"
        ];

          $password_attributes = [
            "password" => "txt_password",
            //"value" => "txt_name",
            "placeholder" => "Enter Password",
            "class" => "c_password",
            "id" => "class_passwords"
        ];
    ?>
 <? form_input($name_attributes) ?>
 <?form_submit("btn_submit", "Submit") ?>
 <?= form_close() ?>
</body>
</html>