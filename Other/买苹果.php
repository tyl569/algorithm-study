<?php
/**
 * 小虎去附近的商店买苹果，奸诈的商贩使用了捆绑交易，只提供6个每袋和8个每袋的包装包 装不可拆分。
 * 可是小虎现在只想购买恰好n个苹果，小虎想购买尽量少的袋数方便携带。
 * 如果 不能购买恰好n个苹果，小虎将不会购买。
 * 输入一个整数n，表示小虎想购买的个苹果，返回 最小使用多少袋子。
 * 如果无论如何都不能正好装下，返回-1。
 *
 * 最少使用多少个购物袋
 */


// 暴力解决
// 尽可能多的使用8个容量的购物袋
function minPackge($n)
{
    if ($n % 8 ==0) {
        return $n / 8;
    }
    $max = intval($n / 8);
    for ($i = $max; $i >=0; $i--) {
        if (($n - 8 * $i) % 6 == 0) {
            return $i + ($n - 8 * $i) / 6;
        }
    }
    return -1;
}

// 通过暴力解决，枚举找出规律
function minBag($n)
{
    if ($n >= 18) {
        if (($n - 18) / 8 % 8 == 0) {
            return ($n - 18) / 8 + 3;
        } else {
            return -1;
        }
    }
    if ($n == 6 || $n == 8 ) return 1;
    if ($n == 12 || $n == 14 || $n == 16) return 2;
    return -1;
}