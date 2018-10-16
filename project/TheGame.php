<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_05_01
        Author: Eli Boblett
        Date: 10.16.18 
        TheGamers.php
     -->
     
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Game</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>The Game</h2>
    <?php
    $dir = "TheGamers.txt";
    if (isset($_POST['submit'])) {
        if ($_POST['username'] !== '' && $_POST['password'] !== '' && $_POST['fName'] !== '' && $_POST['email'] !== '' && $_POST['age'] !== '' && $_POST['sName'] !== '' && $_POST['comments'] !== '') {
            $saveString = stripslashes($_POST['username']) . ", ";
            $saveString .= md5(stripslashes($_POST['password'])) . ", ";
            $saveString .= stripslashes($_POST['fName']) . ", ";
            $saveString .= stripslashes($_POST['email']) . ", ";
            $saveString .= stripslashes($_POST['age']) . ", ";
            $saveString .= stripslashes($_POST['sName']) . ", ";
            $saveString .= stripslashes($_POST['comments']) . "\n";
            echo $saveString;
            $fileHandle = fopen($dir, "a+");
            fwrite($fileHandle, $saveString);
            fclose($fileHandle);
        }
        else {
            echo "<strong>you need to fill out the fields</strong><br>\n";
        }
    }

    ?>
    <form action="TheGame.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="text" name="password">
    <br>
    <label for="fName">Full Name:</label>
    <input type="text" name="fName">
    <br>
    <label for="email">Email:</label>
    <input type="text" name="email">
    <br>
    <label for="age">Age:</label>
    <input type="number" min="0" max="122" name="age">
    <br>
    <label for="sName">Screen Name:</label>
    <input type="text" name="sName">
    <br>
    <label for="comments">Comments:</label>
    <input type="text" name="comments">
    <br>
    <input type="submit" name="submit">
    <input type="reset" name="reset">
    </form>

    <h2>Here are our players:</h2>
    <?php
        $text = file_get_contents($dir);
        echo nl2br($text);
    ?>
</body>
</html>