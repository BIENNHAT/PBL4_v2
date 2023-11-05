<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/copy.css">
    <title>Lựa chọn Bot</title>
    <style>
        body {
            background-image: url('../img/homepage.jpg');
            background-size: cover;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <form action="homepage.php" name="formHomePage" method="post">
        <input type="submit" class="codepro-custom-btn codepro-btn-6" id="btnBotActive" name="btnBotActive" value="BOT ACTIVE">
        <input type="submit" class="codepro-custom-btn codepro-btn-6" id="btnBotPassive" name="btnBotPassive" value="BOT PASSIVE">
    </form>
</body>

</html>
<?php
if (isset($_POST['btnBotActive'])) {
    header("Location: ../php/indexBotActive.php");
    exit; // Thêm exit để ngăn mã PHP tiếp tục thực thi
} else if (isset($_POST['btnBotPassive'])) {
    header("Location: ../php/indexBotPassive.php");
    exit; // Thêm exit để ngăn mã PHP tiếp tục thực thi
}
?>