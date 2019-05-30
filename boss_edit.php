<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Music Station</title>
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
                    <p>Music Station</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>แก้ไขข้อมูลเจ้าของ</h4>
                    <?php
                        $bos_id = $_REQUEST['bos_id'];
                        if(isset($_GET['submit'])){
                            $bos_id = $_GET['bos_id'];
                            $bos_fname = $_GET['bos_fname'];
                            $bos_ad = $_GET['bos_ad'];
                            $bos_tel = $_GET['bos_tel'];
                            $sql = "update boss set ";
                            $sql .= "bos_fname='$bos_fname',bos_ad='$bos_ad',bos_tel='$bos_tel'";
                            $sql .="where bos_id='$bos_id'";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลเจ้าของ $bos_fname $bos_ad $bos_tel  เรียบร้อยแล้ว<br>";
                            echo '<a href="boss_list.php">แสดงข้อมูลเจ้าของทั้งหมด</a>';
                        }else{
                    ?>
                    <?php
                            include 'connectdb.php';
                            $sql2 = "select * from boss where bos_id ='$bos_id'";
                            $result2 = mysqli_query($conn,$sql2);
                            $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                            $fbos_fname = $row2['bos_fname'];
                            $fbos_ad = $row2['bos_ad'];
                            $fbos_tel = $row2['bos_tel'];
                            mysqli_free_result($result2);
                            mysqli_close($conn);
                        ?>
                    <form class="form-horizontal" role="form" name="boss_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                        <input type="hidden" name="bos_id" id="bos_id" value="<?php echo "$bos_id";?>">
                            <label for="bos_fname" class="col-md-2 col-lg-2 control-label">ชื่อเจ้าของ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="bos_fname" id="bos_fname" class="form-control" value="<?php echo $fbos_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="bos_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="bos_ad" id="bos_ad" class="form-control" value="<?php echo $fbos_ad;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="bos_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="bos_tel" id="bos_tel" class="form-control" value="<?php echo $fbos_tel;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
        </div>    
    </body>
</html>