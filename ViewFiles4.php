<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.05.18 
        ViewFiles4.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Files 4</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>View Files 4</h2>
    <?php
    // variables
        $dir = "../Exercise-02_01_01";
        $dirEntries = scandir($dir);
        echo "<table border='1' width='100%'>";
        echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
        echo "<tr>";
        echo "<th><strong><em>Name</em></strong></th>";
        echo "<th><strong><em>Owner</em></strong></th>";
        echo "<th><strong><em>Permissions</em></strong></th>";
        echo "<th><strong><em>Size</em></strong></th>";
        echo "</tr>\n";

        // loops through files in the selected directory
        foreach ($dirEntries as $entry) {
            if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
                $fullEntryName = $dir . "/" . $entry;
                echo "<tr><td>";
                if (is_file($fullEntryName)) {
                    echo "<a href=\"FileDownloader.php? fileName=$entry\">" . htmlentities($entry) . "</a><br>\n";
                }
                else {
                    echo htmlentities($entry);
                }
                echo "</td><td align='center'>" . fileowner($fullEntryName);
                if (is_file($fullEntryName)) {
                    $perms = fileperms($fullEntryName);
                    $perms = decoct($perms % 01000);
                    echo "</td><td align='center'>0$perms";
                    echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . " bytes";
                }
                else {
                    echo "</td><td colspan='2' align='center'>&lt;DIR&gt;</td>";
                }
                echo "</tr></td>";
            }
        }
        echo "</table>";
    ?>
</body>
</html>