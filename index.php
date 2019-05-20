<?php
$_fortune = GetFortuneInfo()["fortune"];
$_res = DrawFortune($_fortune);

// jsonデータからおみくじの情報を取得
function GetFortuneInfo(){
    $json = file_get_contents("./fortune.json");
    $data = json_decode($json,true);
    return $data;
}

// 重みの合計を返す
function GetSumOfWeights($fortune){
    $sum = 0;
    for ($i = 0; $i < count($fortune); $i++) {
        $sum += $fortune[$i]["weight"];
    }
    return $sum;
}

// おみくじを引く
function DrawFortune($fortune){
    $sum = GetSumOfWeights($fortune);
    $rand = mt_rand(1, $sum);

    for ($i = 0; $i < count($fortune); $i++) {
        if (($sum -= $fortune[$i]["weight"]) < $rand)
            return $i;
    }
}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>WP41</title>
</head>
    <body>
        <h1><?php echo $_fortune[$_res]["luck"]?></h1>
        <img src=<?php echo $_fortune[$_res]["image"]?> alt="おみくじ結果">
    </body>
</html>
