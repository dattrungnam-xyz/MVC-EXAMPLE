<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Thong tin sinh vien:</h1>
    <?php

    echo '<div>
                <div style:"display:flex">
                                Id:'
                    . $student->id . '
                            </div>
            <div style:"display:flex">
                Ho Ten:'
                     . $student->name . '
            </div>
             <div style:"display:flex">
                Tuoi: ' . $student->age . '
            </div>
            <div style:"display:flex">
                University: ' . $student->university . '
            </div>
        </div>
    ';

    ?>
</body>

</html>