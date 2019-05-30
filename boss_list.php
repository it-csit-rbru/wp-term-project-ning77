<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>พื้นที่เจ้าของ</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-color: #E0FFFF;">        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: #BA55D3;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>พื้นที่เจ้าของ</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h2>เจ้าของ</h2>
                    <a href="boss_add.php" class="btn btn-link">เพิ่มข้อมูลเจ้าของ</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> รหัสเจ้าของ </th>
                                <th> ชื่อ </th>
                                <th> ที่อยู่ </th>
                                <th colspan="2"> เบอร์โทรศัพท์ </th>
                            </tr>                
                        </thead>
                        <tbody>
                            <?php
                                include 'connectdb.php';
                                $sql =  'SELECT * FROM boss order by bos_id';
                                $result = mysqli_query($conn,$sql);
                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                    echo '<tr>';
                                    echo '<td>' . $row['bos_id'] . '</td>';
                                    echo '<td>' . $row['bos_fname'] . '</td>';
                                    echo '<td>' . $row['bos_ad'] . '</td>';
                                    echo '<td>' . $row['bos_tel'] . '</td>';
                                    echo '<td>';
                            ?>
                                <a href="boss_edit.php?bos_id=<?php echo $row['bos_id'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='boss_delete.php?bos_id=<?php echo $row["bos_id"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                mysqli_free_result($result);
                                mysqli_close($conn);
                            ?>
                        </tbody>    
                    </table>
                </div>    
            </div>
        </div>    
    </body>
</html></th>