<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/copy.css">
    <title>View Capture</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            /* //background-color: #87ceeb; */
            padding: 20px;
            background-image: url('../img/botactive.png');
            background-size: cover;
        }

        a {
            /* text-decoration: none; */
            color: white;
        }

        caption {
            font-size: 40px;
            /* font-family: "Brush Script MT", cursive; */
            font-family: "Courier New", monospace;
            color: red;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <?php
    if ((isset($_GET['ID']) && !empty($_GET['ID']))) {
        $ID =  $_GET['ID'];
    } else if ((isset($_POST['ID']) && !empty($_POST['IDp']))) {
        $ID =  $_POST['ID'];
    } else {
        $ID = 'no bot';
    }

    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYySQL");
    mysqli_select_db($link, "pbl4_v2");
    $sql = "SELECT * FROM capture WHERE IDbot='$ID'";
    $result = mysqli_query($link, $sql);
    echo '<table class="container">';
    echo '<caption>View Capture IDbot=' . $ID . '</caption>';
    echo '<tr> <th>ID</th> <th>Time Capture</th> <th>Picture</th> </tr>';
    while ($row = mysqli_fetch_array($result)) {
        $id = $row["IDcap"];
        $time = $row["timecapture"];
        $picture = $row["getcapture"];
        echo "<tr> <td>$id</td> <td>$time</td> <td>$picture</td> </tr>";
    }
    echo '</Table';
    mysqli_free_result($result);
    mysqli_close($link);
    ?>
</body>

</html>