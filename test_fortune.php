<?php
$_fortune = GetFortuneInfo()["fortune"];
$_res = DrawFortune($_fortune);

$_one = 0;
$_two = 0;
$_three = 0;
$_four = 0;

for ($i = 0; $i < 100; $i++) {
    $_res = DrawFortune($_fortune);
    if ($_res == 0) {
        $_one++;
    }else if ($_res == 1) {
        $_two++;
    }else if ($_res == 2) {
        $_three++;
    }else if ($_res == 3) {
        $_four++;
    }
}

echo "大吉",$_one;
echo "中吉",$_two;
echo "小吉",$_three;
echo "凶",$_four;

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
    $rand = rand(1, $sum);

    for ($i = 0; $i < count($fortune); $i++) {
        if (($sum -= $fortune[$i]["weight"]) < $rand)
            return $i;
    }
}
?>