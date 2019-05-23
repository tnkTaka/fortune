<?php
require __DIR__ . '/fortune.php';
$_fortune = GetFortuneInfo()["fortune"];

$_GreatFortune = 0;
$_GoodFortune = 0;
$_MiddleFortune = 0;
$_SmallFortune = 0;
$_BadFortune = 0;

for ($i = 0; $i < 100; $i++) {
    $_res = DrawFortune($_fortune);
    if ($_res == 0) {
        $_GreatFortune++;
    }else if ($_res == 1) {
        $_GoodFortune++;
    }else if ($_res == 2) {
        $_MiddleFortune++;
    }else if ($_res == 3) {
        $_SmallFortune++;
    }else if ($_res == 4) {
        $_BadFortune++;
    }
}

echo "大吉", $_GreatFortune;
echo "吉", $_GoodFortune;
echo "中吉", $_MiddleFortune;
echo "小吉", $_SmallFortune;
echo "凶", $_BadFortune;