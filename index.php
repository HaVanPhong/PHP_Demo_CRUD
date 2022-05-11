<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<?php
 
//ket noi db
$serverName="localhost";
$userName="root";
$pass="";
$db="haphongth";
$con= mysqli_connect($serverName, $userName, $pass, $db);
if (!$con){
    echo "<h1>ket noi that bai</h1>";
    die("Connection failed: ".mysqli_connect_error());
}else {
    echo "ket noi thanh cong";
}

//controll
handleSubmit($con);

//default
if (!isset($_POST['search'])){
    $sql= "select * from hocsinh";
    $result= mysqli_query($con, $sql) or die("query error submit search");
    renderMain($result);
}


//function
function addStudent($con){
    

}


function renderBody($res){
    while ($row= mysqli_fetch_assoc($res)){
        echo '
                <tr style="display: flex;">
                    <td>'.$row["masv"].'</td>
                    <td>'.$row["hoten"].'</td>
                    <td>'.$row["gioitinh"].'</td>
                    <td>'.$row["quequan"].'</td>
                    <td>'.$row["sdt"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["malop"].'</td>
                    <td>'.$row["ghichu"].'</td>
                </tr>';
    }

}

function renderMain($result){
    if (mysqli_num_rows($result)>0){
        echo '<form action="index.php" method="POST">
            <table border="1" border-spacing="0">
                <thead>
                    <tr style="display: flex;">
                        <td>MaSV</td>
                        <td>HoTen</td>
                        <td>GioiTinh</td>
                        <td>QueQuan</td>
                        <td>SDT</td>
                        <td>Email</td>
                        <td>Malop</td>
                        <td>GhiChu</td>
                    </tr>
                </thead>
                <tbody>';
        renderBody($result);
        echo '
        </tbody>
        <tfoot>
            <tr style="display: flex;">
                <td>
                    <input type="text" name="" id="" placeholder="MaSV readonly" >
                </td>
                <td>
                    <input type="text" name="hoten" id="" placeholder="Nhap ho ten">
                </td>
                <td>
                    <input type="text" name="gioitinh" id="" placeholder="Nhap gioi tinh">
                </td>
                <td>
                    <input type="text" name="quequan" id="" placeholder="Nhap que quan">
                </td>
                <td>
                    <input type="text" name="sdt" id="" placeholder="Nhap sdt">
                </td>
                <td>
                    <input type="text" name="email" id="" placeholder="Nhap email">
                </td>
                <td>
                    <input type="text" name="malop" id="" placeholder="Nhap ma lop">
                </td>
                <td>
                    <input type="text" name="ghichu" id="" placeholder="Nhap ghi chu">
                </td>
                <td>
                    <button onclick="haha()">Add</button>
                </td>
            </tr>
            
        </tfoot>
        </table>
        </form>';
    }
}


function handleSubmit($con){
    echo '<form action="index.php" method="POST">
    <br/>
    <br/>
    <input name="search" placeholder="search by name">
    <button type="submit">Search</button>
    <br/>
    <br/> </form>';
    $s= $_POST['search'];
    if (isset($s)){
        $sql= "select * from hocsinh where hoten like '%".$s."%'";
        $result= mysqli_query($con, $sql) or die("query error submit search");
        renderMain($result);
    }
}



?>







</body>
<script src="./js.js"></script>
</html>