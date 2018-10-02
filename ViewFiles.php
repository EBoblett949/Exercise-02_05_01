<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.02.18 
        ViewFiles.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>View Files</h2>
    <?php
    // variables
        $dir = "../Exercise-02_01_01";
        $openDir = opendir($dir);
        // loops through files in the selected directory
        while ($curFile = readdir($openDir)) {
            if (strcmp($curFile, '.') !== 0 && strcmp($curFile, '..') !== 0) {
                // echo "$curFile<br>";
                echo "<a href=\"$dir/$curFile\">$curFile</a><br>\n";
            }
        }
        closedir($openDir);
    ?>
</body>
</html>