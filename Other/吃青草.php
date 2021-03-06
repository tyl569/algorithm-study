<?php
/**
 * 博弈论问题
 *
 * 牛牛和羊羊都很喜欢青草。今天他们决定玩青草游戏。
 * 最初有一个装有n份青草的箱子,牛 牛和羊羊依次进行,牛牛先开始。
 * 在每个回合中,每个 玩家必须吃一些箱子中的青草,所吃的 青草份数必须是4的x次幂,比如1,4,16,64等等。
 * 不能在箱子中吃到有效份数青草的玩家落 败。
 *
 * 假定牛牛和羊羊都是按照最佳方法进行游戏，请输出胜利者的名字。
 */

function eatGlass($n)
{
    if ($n <= 4 && $n != 2) {
        return "牛牛";
    }
    if ($n == 2) {
        return "羊羊";
    }
    $base = 1;
    while ($base <= $n) {
        if (eatGlass($n - $base) == "牛牛") {
            return "羊羊";
        } else {
            return "牛牛";
        }

        $base = $base * 4;
    }
}

function mock()
{
    echo "========= test case start =========\n";
    echo eatGlass(7);
    echo "========= test case end =========\n";
}