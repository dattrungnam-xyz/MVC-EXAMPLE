<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ket qua tim kiem</h1>
    <?php
    for ($i = 0; $i < sizeof($studentList); $i++) {
        echo '<div>
        Student: 
        <a href="?Id=' . $studentList[$i]->id . '">' . $studentList[$i]->name . '</a>

        </div>';
    }

    ?>
</body>

</html>