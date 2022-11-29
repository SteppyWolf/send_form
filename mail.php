<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$text = trim($_POST['text']);
// $file = $_FILES['myfile'];

// Проверка метода
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Формирование самого письма
    $title = "Заголовок письма";
    $body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Номер телефона:</b> $phone<br><br>
<b>Сообщение:</b><br>$text
";

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        // $mail->SMTPDebug = 2;
        $mail->Debugoutput = function ($str, $level) {
            $GLOBALS['status'][] = $str;
        };

        // Настройки вашей почты
        $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
        $mail->Username   = 'leonisuz@gmail.com'; // Логин на почте
        $mail->Password   = 'yfdtbxesmggirvla'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('leonisuz@gmail.com', 'MagmaWeb'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress('info@magmastore.uz');
        // $mail->addAddress('info@leonis.uz'); // Ещё один, если нужен

        // Прикрипление файлов к письму
        // if (!empty($file['name'][0])) {
        //     for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
        //         $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
        //         $filename = $file['name'][$ct];
        //         if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
        //             $mail->addAttachment($uploadfile, $filename);
        //             $rfile[] = "Файл $filename прикреплён";
        //         } else {
        //             $rfile[] = "Не удалось прикрепить файл $filename";
        //         }
        //     }
        // }
        // Отправка сообщения
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $body;

        // Проверяем отравленность сообщения
        if ($mail->send()) {
            $result = "success";
        } else {
            $result = "error";
        }
    } catch (Exception $e) {
        $result = "error";
        $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
    }
    $mail->clearAttachments();

    // Отображение результата
    // echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

    // Подключение и проверка подключения к базе данных
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'feedback_form');
    if (!$mysqli) {
        die("ERROR: " . mysqli_connect_error($mysqli));
    }

    // Использование таблицы и запись данных в нее
    $sql = "USE feedback_form";
    $time = date("Y-m-d H:i:s");
    $sql = "INSERT INTO sended_forms (name, phone, text, date) VALUES
    ('$name', '$phone', '$text', '$time')
";
    // Проверка синтаксиса
    if (!mysqli_query($mysqli, $sql)) {
        die("Error: " . mysqli_error($mysqli));
    }

    // Закрытие подключения к базе данных
    mysqli_close($mysqli);
    

    
}