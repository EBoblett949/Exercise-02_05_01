<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.02.18 
        ViewFiles2.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Files 2</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>View Files 2</h2>
    <?php
    // variables
        $dir = "../Exercise-02_01_01";
        $dirEntries = scandir($dir);
        // loops through files in the selected directory
        foreach ($dirEntries as $entry) {
            if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
                // echo "$curFile<br>";
                echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
            }
        }
    ?>
</body>
</html>