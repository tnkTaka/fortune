<?php
require __DIR__ . '/fortune.php';
$_fortune = GetFortuneInfo()["fortune"];
$_res = DrawFortune($_fortune);
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <title>WP41</title>
</head>
    <body>
        <div class="center">
            <h1><?php echo $_fortune[$_res]["luck"]?></h1>
            <p><?php echo $_fortune[$_res]["message"]?></p>
            <img src=<?php echo $_fortune[$_res]["image"]?> alt="おみくじ結果">
        </div>
    </body>
</html>
