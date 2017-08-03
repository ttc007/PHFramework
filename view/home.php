<?php
include 'layout.php';

?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active banner1">
        <img src="../static/images/baner1.jpg" style="height: 400px">
      </div>

      <div class="item banner1">
        <img src="../static/images/banner2.jpg" style="height: 400px">
      </div>
    
      <div class="item banner1">
        <img src="../static/images/banner3.jpg" style="height: 400px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
            <?php

              include "../model/data.php";
              include "../model/tintucdata.php";

              $action=filter_input(INPUT_GET, 'action');
              if ($action=="")$action=filter_input(INPUT_POST, 'action');
              if($action=="dangki"){
                  $name=filter_input(INPUT_POST, 'name');
                  $phone=filter_input(INPUT_POST, 'phone');
                  $address=filter_input(INPUT_POST, 'address');
                  $monhoc=filter_input(INPUT_POST, 'monhoc');
                  $suat=filter_input(INPUT_POST, 'suat');
                  $thoigian=filter_input(INPUT_POST, 'thoigian');
                  global $db;
                  $q="INSERT INTO dangkihoc (namehocvien,phone,address,monhoc,suat,thoigian,ngaydangki,trangthai)
                    VALUES (:name,:phone,:address,:monhoc,:suat,:thoigian,:ngaydangki,0);";
                  $statement=$db->prepare($q);
                  $statement->bindValue(':name',$name);
                  $statement->bindValue(':phone',$phone);
                  $statement->bindValue(':address',$address);
                  $statement->bindValue(':monhoc',$monhoc);
                  $statement->bindValue(':suat',$suat);
                  $statement->bindValue(':thoigian',$thoigian);
                  $ngaydangki=date("Y/m/d H:i");
                  $statement->bindValue(':ngaydangki',$ngaydangki);
                  $statement->execute();
            ?>
                  <div class="container">
                  <div class="panel panel-info" style="margin-top: 30px;padding: 1em;color:#01576d;height: 500px;text-align: center;">
                    <h1>Chúc mừng bạn đã đăng kí thành công khóa học</h1>
                    <h2>Thông tin đăng kí của bạn</h2>
                      <h3>Tên: <?php echo $name;?></h3>
                      <h4>Phone:<?php echo $phone;?></h4>
                      <h4>Địa chỉ:<?php echo $address;?></h4>
                      <h4>Môn học:<?php echo $monhoc;?></h4>
                      <h4>Suất:<?php echo $suat;?></h4>
                      <h4>Thời gian:<?php echo $thoigian;?></h4>
                      <h4>Ngày đăng kí:<?php echo $ngaydangki;?></h4>
                      <h5>Thông tin sẽ được chuyển cho quản trị viên sớm</h5>
                      <h3><a href="home.php"><button class="btn">Xác nhận</button></a></h3>
                  </div>
                  </div>
            <?php
              include 'footer.php';
              exit();}


            ?>
  <div class="container home-tintuc" style="margin-top: 30px">
  	<div class="panel panel-info col-md-7" style="padding: 0">
  		<div class="panel-heading">
  			<h3>Tin tức</h3>
  		</div>
  		<div class="panel-body">
  			<h4>Bồi dưỡng văn hóa- Luyện thi đại học</h4>
        <?php
        $ds1=getDanhsachtintuc1();
        foreach ($ds1 as $value) {
        ?>
            <a href="tintucdetail.php?id=<?php echo $value[0];?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
  		</div>
  		<div class="panel-body">
  			<h4>Lớp nghiệp vụ xây dựng</h4>
  			<?php
        $ds1=getDanhsachtintuc2();
        foreach ($ds1 as $value) {
        ?>
            <a href="tintucdetail.php?id=<?php echo $value[0];?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
  		</div>
  		<div class="panel-body">
  			<h4>Xây dựng</h4>
  			<?php
        $ds1=getDanhsachtintuc3();
        foreach ($ds1 as $value) {
        ?>
            <a href="tintucdetail.php?id=<?php echo $value[0];?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
  		</div>
  	</div>
  	<div class="col-md-4 pull-right" style="border: 1px solid #67edd2;margin-bottom: 50px;padding-bottom: 10px;">
  		<h2>Đăng kí học</h2>
  		<form action="home.php" method="post">
		    <div class="form-group">
		      <label for="name">Name</label>
		      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required="">
		    </div>
		    <div class="form-group">
		      <label for="phone">Số điện thoại</label>
		      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" required="">
		    </div>
		    <div class="form-group">
		      <label for="address">Địa chỉ</label>
		      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required="">
		    </div>
		    <div class="form-group">
		      <label for="monhoc">Môn học</label>
		      <select name="monhoc" id="monhoc" class="form-control">
            
            
            <?php

              $q="SELECT * from monhoc where chuyenmuc_id=23";
                      $statement=$db->prepare($q);
                      $statement->execute();
                      $monhocs=$statement->fetchAll();
            
              foreach ($monhocs as $value) {
            ?>
              <option value="<?php echo $value[1]?>"><?php echo $value[1]?></option>
            <?php
              }
            ?>

		      </select>
		    </div>
		    <div class="form-group">
		      <label for="suat">Suất</label>
		      <select name="suat" id="suat" class="form-control">
		      	<option value="2-4-6">2-4-6</option>
		    	<option value="3-5-7">3-5-7</option>
		    	<option value="7-CN">7-CN</option>
		      </select>
		    </div>
		     <div class="form-group">
		      <label for="thoigian">Thời gian</label>
		      <select name="thoigian" id="thoigian" class="form-control">
		      	<option value="7h-9h">7h-9h</option>
		    	<option value="9h-11h">9h-11h</option>
		    	<option value="13h-15h">13h-15h</option>
		    	<option value="17h-19h">17h-19h</option>
		    	<option value="19h-21h">19h-21h</option>
		      </select>
		    </div>
        <input type="hidden" name="action" value="dangki">
		    <input type="submit" value="Đăng kí"  class="btn btn-default"> 
		</form>
  	</div>
  </div>    
<?php
include 'footer.php';
?>