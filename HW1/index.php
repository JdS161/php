<!DOCTYPE html>
<html>
<head>
    <title>Color Picker</title>
</head>
<body>
    <h1>Color Picker</h1>
    <form method="post">
        <label for="r">R:</label>
        <input type="number" id="r" name="r" min="0" max="255" required>
        <br>
        <label for="g">G:</label>
        <input type="number" id="g" name="g" min="0" max="255" required>
        <br>
        <label for="b">B:</label>
        <input type="number" id="b" name="b" min="0" max="255" required>
        <br>
        <input type="submit" name="submit" value="Accept">
    </form>
    <?php
        if (isset($_POST['submit'])) {
            $r = $_POST['r'];
            $g = $_POST['g'];
            $b = $_POST['b'];

            $background_color = "rgb($r, $g, $b)";
            $text_color = "rgb(" . (255 - $r) . ", " . (255 - $g) . ", " . (255 - $b) . ")";

            echo '<span style="background-color:' . $background_color . '; color:' . $text_color . ';">This is a colored span</span>';
        }
    ?>
</body>
</html>
