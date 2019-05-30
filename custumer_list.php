<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>พื้นที่ลูกค้า</title>
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
                <div class="jumbotron" style="background-color: #FFA500;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>พื้นที่ลูกค้า</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>แสดงข้อมูลลูกค้า</h4>
                    <a href="custumer_add.php" class="btn btn-link">เพิ่มข้อมูลลูกค้า</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทร</th>
                                    <th>ประเภท</th>
                                    <th colspan="2">ค่าเช่าสูงสุด/เดือน</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                        include 'connectdb.php';                        
                        $sql =  'SELECT * FROM custumer order by cm_id';
                        $result = mysqli_query($conn,$sql);
                        while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            echo '<tr>';
                            echo '<td>' . $row['cm_id'] . '</td>';
                            echo '<td>' . $row['cm_fname'] . '</td>';
                            echo '<td>' . $row['cm_lname'] . '</td>';
                            echo '<td>' . $row['cm_ad'] . '</td>';
                            echo '<td>' . $row['cm_tel'] . '</td>';
                            echo '<td>' . $row['cm_class'] . '</td>';
                            echo '<td>' . $row['cm_rent'] . '</td>';
                            echo '<td>';
                            ?>
                                <a href="custumer_edit.php?cm_id=<?php echo $row['cm_id'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true)
                                   {window.location='custumer_delete.php?cm_id=<?php echo $row["cm_id"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';                            
                            echo '</tr>';
                        }
                        mysqli_free_result($result);
                        echo '</table>';
                        mysqli_close($conn);
                    ?>
                            </tbody>
                        </table>    
                </div>    
            </div>
        </div>    
    </body>
</html>