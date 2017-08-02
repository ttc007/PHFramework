<?php
include 'layout.php';
include "../model/data.php";
include "../model/diendandata.php";
$id=filter_input(INPUT_GET, "id");
if($id=="")$id=filter_input(INPUT_POST,'id');
$chude=getChudechitiet($id);
$action=filter_input(INPUT_POST, "action");
if ($action=='gui'){
    $name=filter_input(INPUT_POST,'name');
    $content=filter_input(INPUT_POST,'content');
    addcomment($id,$name,$content);
}
?>
<div class="container" style="text-align: center;color: #123abc">
<h1><?php echo $chude[1]?></h1>
<h5><i>Tâm trí Việt Cồ - Nơi giao lưu học tập của các bạn trẻ!</i></h5>
</div>
<div class="container panel panel-info" style="min-height: 800px;overflow: scroll;">
	<?php echo $chude[2]?>
    <hr>
    <h1 style="color: #123abc">Danh sách bình luận</h1>
    <?php
        $binhluans=getbinhluan($id);
        foreach ($binhluans as $value) {
    ?>
    
    <div style="margin:1em;border:1px solid black;border-radius: 5px;padding-left: 1em;margin-top: 10px">
        <h3 style="background: #123456;color: white;margin-right: 1em;padding: .5em"><?php echo $value[1]?></h3>
        <div style="border:.5px solid #f1f1f1;padding: 1em;margin-right:1em"><?php echo $value[2]?></div>
        <h5 style="color: #678912">Ngày đăng:<?php echo $value[3]?></h5>
    </div>
    <?php
        }
    ?>
    <div style="margin:1em;border:1px solid black;border-radius: 5px;padding: 1em;margin-top: 30px">
        <h2>Bình luận</h2>
        <form action="chudedetail.php" method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required="">
            </div>
            <div class="form-group">
              <label for="content">Comment</label>
              <textarea name="content" required="" class="form-control" id="content" rows="7"></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="action" value="gui">
            <input type="submit" value="Comment"  class="btn btn-default"> 
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>