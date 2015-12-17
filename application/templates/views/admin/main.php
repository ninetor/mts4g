<!DOCTYPE html>
<html lang="ru">
<head>

    <link rel="icon" href="../../img/content/favicon.ico" type="image/x-icon" />
    <title>МТС 4G Admin</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/admin.css" rel="stylesheet">
    <script src="../../js/jQuery-2.1.3.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/admin.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">MTC 4G</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?=$params['action']=="orders" ? "class='active'" : ""?>><a href="/admin/orders">Список заявок</a></li>
                    <li <?=$params['action']=="weeks" ? "class='active'" : ""?>><a href="/admin/weeks">Недели победителей</a></li>
                    <li <?=$params['action']=="phones" ? "class='active'" : ""?>><a href="/admin/phones">Телефоны</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
<?=$params['content']?>

</body>
</html>