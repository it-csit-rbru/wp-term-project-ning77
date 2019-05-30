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
                    <h4>เพิ่มข้อมูลลูกค้า</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $cm_fname = $_GET['cm_fname'];
                            $cm_lname = $_GET['cm_lname'];
                            $cm_ad = $_GET['cm_ad'];
                            $cm_tel = $_GET['cm_tel'];
                            $cm_class = $_GET['cm_class'];
                            $cm_rent = $_GET['cm_rent'];
                            $sql = "insert into custumer";
                            $sql .= " values (null,'$cm_fname','$cm_lname','$cm_ad','$cm_tel','$cm_class','$cm_rent')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มข้อมูลลูกค้า $cm_fname $cm_lname $cm_ad $cm_tel $cm_class $cm_rent เรียบร้อยแล้ว<br>";
                            echo '<a href="custumer_list.php">แสดงข้อมูลลูกค้าทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="custumer_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="cm_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cm_fname" id="cm_fname" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="cm_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cm_lname" id="cm_lname" class="form-control">
                            </div>    
                        </div>

                        <div class="form-group">
                            <label for="cm_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cm_ad" id="cm_ad" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="cm_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cm_tel" id="cm_tel" class="form-control">
                           </div>    
                        </div> 
                        <div class="form-group">
                            <label for="cm_class" class="col-md-2 col-lg-2 control-label">ประเภท</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cm_class" id="cm_class" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="cm_rent" class="col-md-2 col-lg-2 control-label">ค่าเช่าสูงสุด/เดือน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cm_rent" id="cm_rent" class="form-control">
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