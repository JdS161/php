<!DOCTYPE html>
<html>
<head>
    <title>Country Form</title>
</head>
<body>
    <h2>Country form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country">
        <input type="submit" name="submit" value="Add">
    </form>
    <br>
    <h2>Country list</h2>
    <select>
        <?php
            if (isset($_POST['submit'])) {
                $country = trim($_POST['country']);
                if (!empty($country)) {
                    // Add country to the file 
                    $file = fopen("countries.txt", "a");
                    fwrite($file, $country . "\n");
                    fclose($file);
                }
            }

            // Read the file and list countries inside select element 
            $countries = array();
            if (file_exists("countries.txt")) {
                $file = fopen("countries.txt", "r");
                while (!feof($file)) {
                    $line = trim(fgets($file));
                    if (!empty($line) && !in_array($line, $countries)) {
                        $countries[] = $line;
                        echo '<option>' . $line . '</option>';
                    }
                }
                fclose($file);
            }
        ?>
    </select>
</body>
</html>
