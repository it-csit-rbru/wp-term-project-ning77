<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>orders Station</title>
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
    <body style="background-color: #E0FFFFe;">        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: #ADFF2F;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>orders Station</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>เพิ่มข้อมูลการเข้าชม</h4>    
                <?php
                        if(isset($_GET['submit'])){
                            $b_cm_id     = $_GET['b_cm_id'];
                            $build_name   = $_GET['build_name'];
                            $da_te       = $_GET['da_te'];
                            $com_m       = $_GET['com_m'];
                            $sql        = "insert into visit";
                            $sql        .= " values (null,'$b_cm_id','$build_name','$da_te','$com_m')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มข้อมูลการเข้าชม $b_cm_id $build_name $da_te $com_m เรียบร้อยแล้ว<br>";
                            echo '<a href="visit_list.php">แสดงข้อมูลการเข้าชมทั้งหมด</a>';
                        }else{
                ?>
                    <form class="form-horizontal" role="form" name="visit_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="or_cm_id" class="col-md-2 col-lg-2 control-label">ชื่อผู้เข้าชม</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="b_cm_id" id="b_cm_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM custumer order by cm_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['cm_id'] . '">';
                                        echo $row['cm_fname'] . $row['cm_lname'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="build_name" class="col-md-2 col-lg-2 control-label">สิ่งปลูกสร้าง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="build_name" id="build_name" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="da_te" class="col-md-2 col-lg-2 control-label">วันที่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="date" name="da_te" id="da_te" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="com_m" class="col-md-2 col-lg-2 control-label">ความคิดเห็น</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="com_m" id="com_m" class="form-control">
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