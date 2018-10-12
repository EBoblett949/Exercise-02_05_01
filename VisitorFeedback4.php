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
    <title>Visitor Feedback 3</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
<h2>Visitor Feedback 3</h2>
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    // $comments = file($dir . "/" . $fileName);
                    $fileHandle = fopen($dir . "/" . $fileName . "rb");
                    if ($fileHandle === false) {
                        echo "There was an error reading file \"$fileName\".<br>\n";
                    }
                    else {
                        $from = fgets($fileHandle);
                        echo "From: " . htmlentities($comments[0]) . "<br>\n";
                        echo "<hr>\n";
                        fclose($fileHandle);
                    }

                    // echo "Email Address: " . htmlentities($comments[1]) . "<br>\n";
                    // echo "Date: " . htmlentities($comments[2]) . "<br>\n";
                    // $commentLines = count($comments);
                    // for ($i = 3; $i < $commentLines; $i++) {
                    //     echo htmlentities($comments[$i]) . "<br>\n";                        
                    // }
                    // echo "<hr>\n";
                }
            }
        }
        else {
            echo "Folder \"$dir\" does not exist.<br>\n";
        }
    ?>
</body>
</html>