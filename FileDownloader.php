<?php
        $dir = "../Exercise-02_01_01";
        if (isset($_GET['fileName'])) {
            $fileToGet = $dir . "/" . stripslashes($_GET['fileName']);
            if (is_readable($fileToGet)) {
                $errorMsg = "";
                $showErrorPage = true;
            }
            else {
                $errorMsg = "cannot read \"$fileToGet\"";
                $showErrorPage = true;
            }
        }
        else {
            $errorMsg = "No file name specified";
            $showErrorPage = true;
        }
        if ($showErrorPage) {
    ?>
<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.05.18 
        FileDownload.php
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Download Error</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <p>There was an error downloading "<?php echo htmlentities($_GET['fileName']); ?>"</p>
    <p><?php echo htmlentities($errorMsg); ?></p>
</body>
</html>

    <?php
        }
    ?>