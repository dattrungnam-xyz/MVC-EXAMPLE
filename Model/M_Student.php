<?php
include_once("E_Student.php");
class Model_Student
{

    public function __construct()
    {
    }
    public function getAllStudent()
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";

        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu");
        $sql = "SELECT * FROM sinhvien";
        $i = 0;
        $students = array();
        $rs = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['Id'];
            $name = $row['Name'];
            $age = $row['Age'];
            $university = $row['University'];
            $students[$i++] = new Entity_Student($id, $name, $age, $university);
            // echo '<tr><td class="td"> ' . $row['IDNV'] . '</td><td class="td"> ' . $row['HoTen'] . '<td class="td"> ' . $row['DiaChi'] . '</td><td class="td"> ' . $row['IDPB'] . '</td></tr>';
        }
        return $students;
    }
    public function getStudent($id)
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu");
        $sql = "SELECT * FROM sinhvien where id =" . $id . " ";
        $i = 0;
        $students = array();
        $rs = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['Id'];
            $name = $row['Name'];
            $age = $row['Age'];
            $university = $row['University'];
            $students[$i++] = new Entity_Student($id, $name, $age, $university);

            // echo '<tr><td class="td"> ' . $row['IDNV'] . '</td><td class="td"> ' . $row['HoTen'] . '<td class="td"> ' . $row['DiaChi'] . '</td><td class="td"> ' . $row['IDPB'] . '</td></tr>';
        }
        return $students[0];
    }
    public function addStudent($id, $name, $age, $university)
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu");
        $sql = "SELECT * FROM sinhvien where Id = " . $id . "";
        $rs = mysqli_query($connection, $sql);
        $check = true;
        while ($row = mysqli_fetch_array($rs)) {
            if ($row['Id'] == $id) {
                $check = false;
                break;
            }
        }
        if ($check == false) {
            return false;
        } else {
            // $id = $_REQUEST['Id'];
            // $name = $_REQUEST['Name'];
            // $age = $_REQUEST['Age'];
            // $university = $_REQUEST['University'];

            $sql_insert = " INSERT INTO sinhvien (Id, Name, Age, University)  
            VALUES (" . $id . ", '" . $name . "', " . $age . ", '" . $university . "');";
            $connection->query($sql_insert);
            return true;
        }
    }
    public function updateStudent($id, $name, $age, $university)
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu");
        $sql_update = 'UPDATE sinhvien
                        SET Name = "' . $name . '", Age = ' . $age . ', University = "' . $university . '"
                        WHERE Id = ' . $id . ';';
        $connection->query($sql_update);
    }
    public function deleteStudent($id)
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu");
        $sql_update = 'DELETE FROM sinhvien
                        WHERE Id = ' . $id . ';';
        $connection->query($sql_update);
    }
    public function deleteAllStudent()
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu");
        $sql_update = 'DELETE FROM sinhvien';
        $connection->query($sql_update);
    }
    public function searchStudent($field, $value)
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";

        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu");
        $sql = "SELECT * FROM sinhvien WHERE " . $field . " = '" . $value . "'";
        $i = 0;
        $students = array();
        $rs = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['Id'];
            $name = $row['Name'];
            $age = $row['Age'];
            $university = $row['University'];
            $students[$i++] = new Entity_Student($id, $name, $age, $university);
            // echo '<tr><td class="td"> ' . $row['IDNV'] . '</td><td class="td"> ' . $row['HoTen'] . '<td class="td"> ' . $row['DiaChi'] . '</td><td class="td"> ' . $row['IDPB'] . '</td></tr>';
        }
        return $students;
    }
}
