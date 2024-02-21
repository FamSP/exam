<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style type="text/css">
        img {
            transition: transform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
        }
    </style>


</head>

<body>
<?php
require 'connect.php';

if (isset($_POST['submit'])) {
    try {
        $sql = "INSERT INTO queue (QDate, QNumber, Pid, Qstatus) VALUES (:QDate, :QNumber, :Pid, 'รอเข้ารับการรักษา')";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':QDate', $_POST['Qdate']);
        $stmt->bindParam(':QNumber', $_POST['QNumber']);
        $stmt->bindParam(':Pid', $_POST['Pid']);

        if ($stmt->execute()) {
            // หลังจากเพิ่มข้อมูลเรียบร้อยแล้ว ให้ redirect ไปที่ index.php
            header("Location: index.php");
            exit();
        } else {
            $message = 'ไม่สามารถเพิ่มคิวใหม่ได้';
        }
    } catch (PDOException $e) {
        echo 'เกิดข้อผิดพลาด: ' . $e->getMessage();
    }
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style type="text/css">
        img {
            transition: transform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <br>
                <h3>ฟอร์มเพิ่มข้อมูลคิว</h3>
                <br><br>
                <form action="AddQueue.php" method="post">
                    <input type="date" placeholder="วันที่" name="Qdate" class="form-control" required>
                    <br>
                    <input type="text" placeholder="หมายเลขคิว" name="QNumber" class="form-control" required>
                    <br>
                    <input type="text" placeholder="รหัสบัตรประชาชน" class="form-control" name="Pid">
                    <br>
                    <input type="submit" value="ยืนยัน" name="submit" class="btn btn-primary" />
                </form>
            </div>
        </div>
    </div>
</body>
</html>
