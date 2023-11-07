<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Danh sach sinh vien</h1>
    <?php
    for ($i = 0; $i < sizeof($studentList); $i++) {
        echo '<div>
        <a href="?Id=' . $studentList[$i]->id . '">' . $studentList[$i]->name . '</a>
        <a href="?Id=' . $studentList[$i]->id . '&mod3=1"> Cap nhat</a>
        <a href="?Id=' . $studentList[$i]->id . '&mod4=1"> Xoa</a>
        </div>';
    }
    echo '<div><a href="?mod4=1&Id=All"> Xoa tat ca</a></div>';
    ?>
</body>

</html>