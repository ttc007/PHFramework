<!DOCTYPE html>
<html>
<head>
    <title>Moi Tran website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../static/css/home.css">

    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- <script src="//cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script> -->
</head>
</head>
<body>
    <nav class="navbar navbar-default menu">
        <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav ul1">
                <li><a href="#">Tin tức-sự kiện</a></li>
                <li><a href="#">Thông báo chiêu sinh</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chương trình học <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Toán</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Toán 1</a></li>
                            <li><a href="#">Toán 2</a></li>
                            <li><a href="#">Toán 3</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Lý</a></li>
                    <li><a href="#">Hóa</a></li>
                  </ul>
                </li>
                </ul>
              <form class="navbar-form navbar-left">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Go</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Đăng kí học</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
    </nav>

    <div class="banner1">
        <img src="../static/images/baner1.jpg" >
    </div>
       <textarea name="editor1" id="editor1" rows="10" cols="80">
        </textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
          </script>
</body>
</html>