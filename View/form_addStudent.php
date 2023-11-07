<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            height: 100vh;
            overflow-y: scroll;
            max-height: 100vh;
            flex: 1;
            padding: 20px;
        }
    </style>

    <div style="display:flex; ">

        <div class="container">



            <?php

            echo '
    <form onsubmit="return handleSubmit()" name="f1" style="width: 400px;" action="C_Student.php?mod2=1" method="post">
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="Id">ID</label>
            <input  onchange="handleChange()" type="text"  name="Id" id="Id">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="Name">Name</label>
            <input onchange="handleChange()" type="text" name="Name"      id="Name">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="Age">Age</label>
            <input onchange="handleChange()" type="text" name="Age"      id="Age">
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom:4px;">
            <label for="University">University</label>
            <input onchange="handleChange()" type="text"  name="University" id="University">
        </div>
        <p class="p_text"></p>
        <div style="margin-bottom: 8px">
            <button style="padding: 4px 8px; margin-right: 8px" type="submit">OK</button>
            <button style="padding: 4px 8px;" type="reset">Cancel</button>
        </div>
        </form>
        
        <script>
        let a = document.querySelector(".p_text");
        function handleSubmit() {
            let Name = document.f1.Name.value;
            let Id = document.f1.Id.value;
            let Age = document.f1.Age.value;
            let University = document.f1.University.value;
            if (Name === "" || Id === "" || Age === "" || University ==="") {
                a.innerHTML = "không được để trống thông tin";
                return false
            }else{
                if(!isNaN(+Id) && !isNaN(+Age))
                {
                    return true
                }
                else
                {
                    a.innerHTML = "Id hoặc tuổi không hợp lệ";
                    return false;
                }
                //document.f1.submit();
            }
        }
        function handleChange() {
            a.innerHTML = "";
        }

        </script>';

            ?>
            <?php
            if (isset($_REQUEST['error'])) {
                echo '<p class="p_text">' . $_REQUEST['error'] . '</p>';
            }
            ;

            ?>
</body>

</html>