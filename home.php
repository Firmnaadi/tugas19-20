<?php
session_start();
if (!isset($_SESSION["masuk"])) {
    header("Location: login.php");
    exit();
} elseif (!isset($_COOKIE["masuk"])) {
    session_destroy();
    header("Location: login.php");
}
require "fungsi.php";
$data = show_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        .table-wrapper {
            width: 800px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;	
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: fixed;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:last-child {
            width: 100px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }    
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }    
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: none;
        }
    </style>
</head>

<body><div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
    <h1>Wellcome Home</h1>
    <table border="1" class="table table-bordered">
    <body>
   
        <div class="container">
            <h2>UPLOAD MULTI FILE PHP</h2>
            <form action="proses_act.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Foto :</label>
                    <input type="file" name="foto[]" required="required" multiple />
                    <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                </div>
                <input type="submit" name="" value="Simpan" class="btn btn-primary">
            </form>
        </div>
    </body>
    
    <br>
    <br>
    <tr>
    <td>id</td>
            <td>email</td>
            <td>password</td>
            <td>user</td>
            <td>level</td>
        </tr>
        <?php foreach ($data as $temp) : ?>
        <tr>
        <td><?php echo $temp["id"] ?></td>
                <td><?php echo $temp["user_email"] ?></td>
                <td><?php echo $temp["user_password"] ?> </td>
                <td><?php echo $temp["user_fullname"] ?></td>
                <td><?php echo $temp["level"] ?></td>
        </tr>    
        <?php endforeach ?>
    </tr>
    </table>
    <br>
    <p><a href="index.php"><button class="btn btn-primary btn-lg">username</button></a></p>
    <p><a href="keluar.php"><button class="btn btn-primary btn-lg">Logout</button></a></p>
    <?php if ($_COOKIE["level"] == 2) :
       ?>
        <button class="btn btn-primary btn-lg">tambah
        </button>
            <?php endif ?>
            
        </body>

</html>