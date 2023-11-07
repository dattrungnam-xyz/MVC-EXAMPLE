<?php
include_once("../Model/M_Student.php");
class Ctrl_Student
{
    public function invoke()
    {
        if (isset($_GET["Id"])) {
            $modelStudent = new Model_Student();
            $student = $modelStudent->getStudent($_GET["Id"]);
            include_once("../View/Student.php");
        } else {
            $modelStudent = new Model_Student();
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentList.php");
        }
    }
    public function addStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST["Id"]) && isset($_REQUEST["Name"]) && isset($_REQUEST["Age"]) && isset($_REQUEST["University"])) {
                $modelStudent = new Model_Student();
                $rs = $modelStudent->addStudent($_REQUEST["Id"], $_REQUEST["Name"], $_REQUEST["Age"], $_REQUEST["University"]);
                if ($rs == true) {
                    header("Location: ../index.php");
                } else {
                    header("Location: C_Student.php?mod2=1&error=Mã sinh viên đã tồn tại");
                }
            }
        } else {
            include_once("../View/form_addStudent.php");
        }
    }
    public function updateStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST["Id"]) && isset($_REQUEST["Name"]) && isset($_REQUEST["Age"]) && isset($_REQUEST["University"])) {
                $modelStudent = new Model_Student();

                $modelStudent->updateStudent($_REQUEST["Id"], $_REQUEST["Name"], $_REQUEST["Age"], $_REQUEST["University"]);

                header("Location: ../index.php");
            }
        } else {
            if (isset($_REQUEST["Id"])) {
                $modelStudent = new Model_Student();
                $student = $modelStudent->getStudent($_REQUEST["Id"]);
                include_once("../View/form_updateStudent.php");
            } else {
                $modelStudent = new Model_Student();
                $studentList = $modelStudent->getAllStudent();
                include_once("../View/StudentList.php");
            }
        }
    }
    public function deleteStudent()
    {
        if (isset($_REQUEST["Id"])) {

            if ($_REQUEST["Id"] == "All") {
                $modelStudent = new Model_Student();
                $modelStudent->deleteAllStudent();
            } else {
                $modelStudent = new Model_Student();
                $modelStudent->deleteStudent($_REQUEST["Id"]);
            }
            header("Location: ../index.php");
        } else {
            $modelStudent = new Model_Student();
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentList.php");
        }
    }
    public function searchStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST["field"]) && isset($_REQUEST["text_search"]) ) {
                $modelStudent = new Model_Student();

                $studentList = $modelStudent->searchStudent($_REQUEST["field"], $_REQUEST["text_search"]);

                include_once("../View/searchResult.php");
            }
        } else {

            include_once("../View/form_searchStudent.php");
        }
    }
}

$C_Student = new Ctrl_Student();
if (isset($_GET["mod2"])) {
    $C_Student->addStudent();
} else if (isset($_GET["mod3"])) {
    $C_Student->updateStudent();
} else if (isset($_GET["mod4"])) {
    $C_Student->deleteStudent();
} else if (isset($_GET["mod5"])) {
    $C_Student->searchStudent();
} else {

    $C_Student->invoke();
}
