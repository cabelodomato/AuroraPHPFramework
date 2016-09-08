<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="refresh" content="15"/>
        <title>Iconfont | Welcome</title>
        <link rel="stylesheet" href="/static/css/foundation.css" />
        <script src="/static/js/vendor/modernizr.js"></script>
    </head>
    <body>
        <?php
        echo $this->get("module/welcome.php");
        echo $this->get("module/topmenu.php");
        echo $this->get("$path$page.$type");
        echo $this->get("module/bottom.php");
        echo $this->get("module/footer.php");
        ?>

        <script src="static/js/vendor/jquery.js"></script>
        <script src="static/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
