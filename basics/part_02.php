<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php
        $age = 30;
        $data = "Hello world";

        echo $data;
        echo "<br>";
        echo "Age is  $age";
        echo strtoupper($data);
        echo "<br>";
        echo strtolower($data);
        echo "<br>";
        echo "string lenght: ";
        echo strlen($data);

        echo "<br>";
        echo $data[0];
        echo "<br>";
        $data[3] = 't';
        echo $data;
        echo "<br>";
        echo str_replace("world", "Love", $data);

        echo "<br>";
        echo substr($data, 5);
    ?>
</body>
</html>