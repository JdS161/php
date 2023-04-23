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
        <br>
        <label for="message" id="message"> Enter name of the country </label>
    </form>
    <br>
    <h2>Country list</h2>
    <select>
        <?php
            if (isset($_POST['submit'])) 
            {
                // Getting value from the form
                $country = trim($_POST['country']);

                // Verification that value is not empty
                if (!empty($country)) 
                {
                    // Read list of acceptable countries from the file
                    $dictionary = file("dictionary.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                    // Verification that entered country name is acceptable
                    if (in_array($country, $dictionary)) 
                    {
                        // Open file for writing the date and write it
                        $file = fopen("countries.txt", "a");
                        fwrite($file, $country . PHP_EOL);
                        fclose($file);
                    } 

                        else 
                        {
                            $new_text= "Wrong country name</p>";
                            echo "<script>document.getElementById('message').innerHTML = '$new_text';</script>";
                        }
                } 

                    else 
                    {
                        $newText = "Enter name of the country";
                    echo "<script>document.getElementById('message').innerHTML = '$new_text';</script>";
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
