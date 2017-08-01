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
  <div class="container home-tintuc" style="margin-top: 30px">
  	<div class="panel panel-info col-md-7" style="padding: 0">
  		<div class="panel-heading">
  			<h3>Tin tức</h3>
  		</div>
  		<div class="panel-body">
  			<h4>Bồi dưỡng văn hóa- Luyện thi đại học</h4>
  			<a href="">Tin tuc 1</a>
  		</div>
  		<div class="panel-body">
  			<h4>Lớp nghiệp vụ xây dựng</h4>
  			<a href="">Tin tuc 1</a>
  		</div>
  		<div class="panel-body">
  			<h4>Xây dựng</h4>
  			<a href="">Tin tuc 1</a>
  		</div>
  	</div>
  	<div class="col-md-4 pull-right" style="border: 1px solid #67edd2;margin-bottom: 50px;padding-bottom: 10px;">
  		<h2>Đăng kí học</h2>
  		<form action="/action_page.php">
		    <div class="form-group">
		      <label for="name">Name</label>
		      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
		    </div>
		    <div class="form-group">
		      <label for="phone">Số điện thoại</label>
		      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
		    </div>
		    <div class="form-group">
		      <label for="address">Địa chỉ</label>
		      <input type="text" class="form-control" id="address" placeholder="Enter name" name="address">
		    </div>
		    <div class="form-group">
		      <label for="monhoc">Môn học</label>
		      <select name="monhoc" id="monhoc" class="form-control">
		      	<option>--Chọn--</option>
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
		    <button type="submit" class="btn btn-default">Đăng kí</button>
		</form>
  	</div>
  </div>    
<?php
include 'footer.php';
?>