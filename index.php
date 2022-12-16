<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
        span{
            display: inline-block;
            width:150px;

        }
        .my-4{
            margin-bottom:20px;
            margin-left  :20px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="container">
            <div class="jumbotron">
                <fieldset>
                    <legend><span class="lead">書籍情報</span></legend>
                    <label><span class="my-4">書籍名：</span><input type="text" name="book_name" size=64></label><br>
                    <label><span class="my-4">書籍URL：</span><input type="text" name="url" size=64></label><br>
                    <label><span class="my-4">書籍コメント：</span><input type="text" name="comment" size=64></label><br>
                    <input type="submit" value="送信">
                </fieldset>
            </div>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
