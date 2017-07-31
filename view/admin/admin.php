<!DOCTYPE html>
<html>
<head>
	  <title>Admin site</title>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
    <link rel="stylesheet" href="../../static/bootstrap/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../static/css/home.css">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script type='text/x-mathjax-config'>
    MathJax.Hub.Config({
      TeX: { equationNumbers: { autoNumber: &quot;AMS&quot; } }
    });
    </script>
     
    <script type='text/x-mathjax-config'> 
    MathJax.Hub.Config({tex2jax: {inlineMath: [[&#39;$&#39;,&#39;$&#39;], [&#39;\(&#39;,&#39;\)&#39;]]}}); </script> 
     
    <script src='http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_SVG' type='text/javascript'> 
    </script>
</head>
<body>
	<nav class="navbar navbar-default menu">
        <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Admin</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav ul1">
                <li><a href="chuyenmuc.php">Chuyên mục</a></li>
                <li><a href="monhoc.php">Môn học</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Môn học chi tiết<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php
                      include "../../model/data.php";
                      $q="SELECT * from monhoc";
                      $statement=$db->prepare($q);
                      $statement->execute();
                      $rows=$statement->fetchAll();
                      foreach ($rows as $value) {
                    ?>
                    <li><a href="monhocDetail.php?id=<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a></li>
                    <?php } ?>
                  </ul>
              </ul>
              <form class="navbar-form navbar-left">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Go</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../home.php">View site</a></li>
              </ul>
            </div>
          </div>
    </nav>
</body>
</html>