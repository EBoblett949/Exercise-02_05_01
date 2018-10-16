<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.15.18 
        BackupComments.php
     -->
     
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup Comments</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>Backup Comments</h2>
    <?php
        $source = "./comments";
        $destination = "./backups";
        if (!is_dir($destination)) {
            mkdir($destination);
            chmod($destination, 0757);
        }

        if (is_dir($source)) {
            $totalFiles = 0;
            $filesCopied = 0;
            $dirEntries = scandir($source);
            foreach ($dirEntries as $entry) {
                if ($entry !== "." && $entry !== "..") {
                    ++$totalFiles;
                    if (copy("$source/$entry", "$destination/$entry")) {
                        ++$filesCopied;
                    }
                    else {
                        echo "Could not copy file \"" . htmlentities($entry) . "\".<br>\n";
                    }
                }
            }
            echo "<p>$filesCopied of $totalFiles files successfully backed up.</p>\n";
        }
        else {
            echo "The source directory \"$source\" does not exist, nothing to backup.\n";
        }
    ?>
</body>
</html>