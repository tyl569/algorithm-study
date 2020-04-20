<?php

class Solution
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */

    // 普通BFS
    function ladderLength($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $wordList = array_flip($wordList);
        $s1[] = $beginWord; // 开始的单词
        $s2[] = $endWord; // 结束的单词
        $n = strlen($beginWord); // 单词长度
        $level = 0;
        while (!empty($s1)) {
            $level++;
            if (count($s1) > count($s2)) {
                $tmp = $s2;
                $s2 = $s1;
                $s1 = $tmp;
            }
            $s = [];
            foreach ($s1 as $word) {
                for ($i = 0; $i < $n; $i++) { // 挨个准备替换单词中的字母
                    $word1 = $word;
                    // 循环a-z的字母
                    for ($ch = ord('a'); $ch <= ord('z'); $ch++) {
                        $word1[$i] = chr($ch);
                        if (in_array($word1, $s2)) { // 如果替换后的单词在目标数组里面，个数+1
                            return ++$level;
                        }
                        if (!array_key_exists($word1, $wordList)) {
                            continue;
                        }
                        unset($wordList[$word1]);
                        $s[] = $word1;
                    }
                }
            }
            $s1 = $s;
        }
        return 0;
    }

    function ladderLength_2($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $queue = new SplQueue();
        $visited = [];
        $queue->push($beginWord);
        $count = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            $count++;
            for ($i = 0; $i < $size; $i++) {
                $str = $queue->dequeue();
                foreach ($wordList as $word) {
                    if (in_array($word, $visited)) {
                        continue;
                    }
                    if (!$this->canConvert($str, $word)) {
                        continue;
                    }
                    if ($word == $endWord) { // 如果找到了目标字符串
                        return $count + 1;
                    }
                    $visited[] = $word;
                    $queue->push($word);
                }
            }
        }
        return 0;
    }

    function ladderLength_3($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $queue = new SplQueue();
        $visited = [];
        $queue->push($beginWord);
        $count = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            $count++;
            for ($i = 0; $i < $size; $i++) {
                $str = $queue->dequeue();
                foreach ($wordList as $index => $word) {
                    if (isset($visited[$index]) && $visited[$index] == true) { // 相比做了一个小优化
                        continue;
                    }
                    if (!$this->canConvert($str, $word)) {
                        continue;
                    }
                    if ($word == $endWord) { // 如果找到了目标字符串
                        return $count + 1;
                    }
                    $visited[$index] = true;
                    $queue->push($word);
                }
            }
        }
        return 0;
    }

    function canConvert($str1, $str2)
    {
        if (strlen($str1) != strlen($str2)) {
            return false;
        }
        $count = 0;
        for ($i = 0; $i < strlen($str1); $i++) {
            if ($str1{$i} != $str2{$i}) {
                $count++;
                if ($count > 1) {
                    return false;
                }
            }
        }
        return $count == 1;
    }

}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->ladderLength("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]));
    var_dump((new Solution())->ladderLength("hit", "cog", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength("hit", "log", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength("hot", "dog", ["hot", "dog"]));
    var_dump((new Solution())->ladderLength("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]));
    var_dump((new Solution())->ladderLength("a", "c", ["a", "b", "c"]));


    var_dump((new Solution())->ladderLength_2("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]));
    var_dump((new Solution())->ladderLength_2("hit", "cog", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength_2("hit", "log", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength_2("hot", "dog", ["hot", "dog"]));
    var_dump((new Solution())->ladderLength_2("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]));
    var_dump((new Solution())->ladderLength_2("a", "c", ["a", "b", "c"]));

    var_dump((new Solution())->ladderLength_3("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]));
    var_dump((new Solution())->ladderLength_3("hit", "cog", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength_3("hit", "log", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength_3("hot", "dog", ["hot", "dog"]));
    var_dump((new Solution())->ladderLength_3("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]));
    echo "======= test case end =======\n";
}