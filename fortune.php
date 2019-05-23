<?php
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