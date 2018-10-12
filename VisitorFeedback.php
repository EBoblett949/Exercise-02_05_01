<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.11.18 
        VisitorFeedback.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Feedback</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
<h2>Visitor Feedback</h2>
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    echo "<pre>\n";
                    $comment = file_get_contents($dir . "/" . $fileName);
                    echo $comment;
                    echo "</pre>\n";
                    echo "<hr>\n";
                }
            }
        }
        else {
            echo "Folder \"$dir\" does not exist.<br>\n";
        }
    ?>
</body>
</html>