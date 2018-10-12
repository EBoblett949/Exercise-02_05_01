<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.12.18 
        VisitorFeedback2.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Feedback 2</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
<h2>Visitor Feedback 2</h2>
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    echo "<pre>\n";
                    readfile($dir . "/" . $fileName);
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