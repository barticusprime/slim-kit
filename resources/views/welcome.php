<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slim 2: Starter Kit</title>

    <link href='http://fonts.googleapis.com/css?family=Yantramanav:100' rel='stylesheet' type='text/css'>

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Yantramanav';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .image {
            width: 77px;
            height: 77px;
            margin-right: 2px;
        }

        .title {
            font-size: 64px;
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <img src="http://www.slimframework.com/assets/images/logo-256.png" class="image" alt="Slim Framework">
            <div class="title">{{ message }}</div>
        </div>
    </div>
</body>
</html>
