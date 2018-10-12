<?php
        
?>

<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.09.18 
        VisitorComments.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Comments</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <?php  
        $dir = "./comments";
        if (is_dir($dir)) {
            if ($_POST['save']) {
                if (empty($_POST['name'])) {
                    echo "Unknown Visitor\n";
                }
                else {
                    $saveString = stripslashes($_POST['name']) . "\n";
                    $saveString .= stripslashes($_POST['email']) . "\n";
                    $saveString .= date('r') . "\n";
                    $saveString .= stripslashes($_POST['comment']) . "\n";
                    echo "\$saveString: $saveString";
                    $currentTime = microtime();
                    echo "\$currentTime: $currentTime";
                    $timeArray = explode(" ", $currentTime);
                    echo var_dump($timeArray) . "<br>";
                    $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                    echo "\$timeStamp: $timeStamp";
                    $saveFileName = "$dir/Comment.$timeStamp.txt";
                    echo "\$saveFileName: $saveFileName";
                    if (file_put_contents($saveFileName, $saveString) > 0) {
                        echo "File \"" . htmlentities($saveFileName) . "\" successfully saved.<br>\n";

                    }
                    else {
                        echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                    }
                }
            }
        }
        else {
            mkdir($dir);
            chmod($dir, 0757);
        }
    ?>
    <h2>Visitor Comments</h2>
    <form action="VisitorComments.php" method="POST">
        Your Name: <input type="text" name="name"><br>
        Your Email: <input type="email" name="email"><br>
        <textarea name="comment" cols="100" rows="6"></textarea><br>
        <input type="submit" name="save" value="Submit Your Comment">
    </form>
</body>
</html>