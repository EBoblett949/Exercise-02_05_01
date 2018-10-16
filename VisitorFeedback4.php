<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.12.18 
        VisitorFeedback3.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Feedback 4</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
<h2>Visitor Feedback 4</h2>
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    $fileHandle = fopen($dir . "/" . $fileName , "rb");
                    if ($fileHandle === false) {
                        echo "There was an error reading file \"$fileName\".<br>\n";
                    }
                    else {
                        $from = fgets($fileHandle);
                        echo "From: " . htmlentities($from) . "<br>\n";
                        $email = fgets($fileHandle);
                        echo "Email Address: " . htmlentities($email) . "<br>\n";
                        $date = fgets($fileHandle);
                        echo "Date: " . htmlentities($date) . "<br>\n";
                        $comment = "";
                        while (!feof($fileHandle)) {
                            $comment = fgets($fileHandle);
                            echo htmlentities($comment) . "<br>\n";
                        }
                        echo "<hr>\n";
                        fclose($fileHandle);
                    }
                }
            }
        }
        else {
            echo "Folder \"$dir\" does not exist.<br>\n";
        }
    ?>
</body>
</html>