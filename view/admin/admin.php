<?php
session_start();
$logout=filter_input(INPUT_GET, "logout");
if($logout==1)session_unset();
if(!isset($_SESSION['user'])) {
  $action=filter_input(INPUT_POST, 'action');
  $username=filter_input(INPUT_POST, 'username');
  $password=filter_input(INPUT_POST, 'password');
  if($action=="Login"){
      if(($username=="tranmoi123") && ($password=="tamtrivietco")) {
         $_SESSION["user"] = $username;
         header("Location:index.php");
          
      }
  }
  
?>

<!DOCTYPE html>
<html>
<head>
   <title>Admin site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
    <link rel="stylesheet" href="../../static/bootstrap/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../static/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../static/css/home.css">
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
</head>
<body>

</body>
</html>
<div class="container col-md-3" style="margin:10% 35%; border: 1px solid #123456;padding: 1em;border-radius: 5px">


<form action="admin.php" method="post">
        <div class="form-group">
          <label for="name">User</label>
          <input type="text" class="form-control" id="name" placeholder="Enter admin name" name="username" required="">
        </div>
        <div class="form-group">
          <label for="name">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required="">
        </div>
        <input type="submit" name="action" value="Login">
</form>
</div>
<?php
exit();
}

?>





<!DOCTYPE html>
<html>
<head>
	  <title>Admin site</title>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
    <link rel="stylesheet" href="../../static/bootstrap/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../static/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../static/css/home.css">
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
</head>
<body>
	<nav class="navbar navbar-default menu">
        <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav ul1">
                <li><a href="chuyenmuc.php">Chuyên mục</a></li>
                <li><a href="monhoc.php">Môn học</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Môn học chi tiết<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php
                      echo $_SESSION['user']."<br>";
                      include "../../model/data.php";
                      $q="SELECT * from monhoc";
                      $statement=$db->prepare($q);
                      $statement->execute();
                      $rows=$statement->fetchAll();
                      foreach ($rows as $value) {
                    ?>
                    <li><a href="monhocdetail.php?id=<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a></li>
                    <?php } ?>
                  </ul></li>
                  <li><a href="danhsachdangki.php">Danh sách đăng kí học</a></li>

                  <li><a href="tintuc.php">Tin tức</a></li>
                  <li><a href="diendan.php">Diễn đàn</a></li>
                  
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../home.php">View site</a></li>
                <li><a href="admin.php?logout=1">Logout</a></li>
              </ul>
            </div>
          </div>
    </nav>
