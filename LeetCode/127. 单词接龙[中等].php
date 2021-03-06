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
        $s2[] = $endWord; // 结束的单词 // 双向BFS
        $n = strlen($beginWord); // 单词长度
        $level = 0;
        while (!empty($s1)) {
            $level++;
            if (count($s1) > count($s2)) { //依次双向BFS实现,始终使用变量s1去运算。
                $tmp = $s2;
                $s2 = $s1;
                $s1 = $tmp;
            }
            $s = [];
            foreach ($s1 as $word) {
                for ($i = 0; $i < $n; $i++) {
                    $word1 = $word;
                    for ($ch = ord('a'); $ch <= ord('z'); $ch++) {
                        $word1[$i] = chr($ch);
                        if (in_array($word1, $s2)) {
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
        $visited = [$beginWord];
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

    function ladderLength_2_optimize($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $visited = [];
        $queue = new SplQueue();
        $queue->push($beginWord);
        $count = 0;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            $count++;
            for ($i = 0; $i < $size; $i++) {
                $str = $queue->dequeue();
                foreach ($wordList as $index => $word) {
                    if (isset($visited[$index]) && $visited[$index] == true) {
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


    function ladderLength_3($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $queueLeft = new SplQueue();
        $queueLeft->push($beginWord);
        $queueRight = new SplQueue();
        $queueRight->push($endWord);

        $visitedLeft = [$beginWord];
        $visitedRight = [$endWord];
        $countLeft = 0;
        $countRight = 0;
        while (!$queueLeft->isEmpty() && !$queueRight->isEmpty()) {
            $countLeft++;
            $sizeLeft = $queueLeft->count();
            for ($i = 0; $i < $sizeLeft; $i++) {
                $strLeft = $queueLeft->dequeue();
                for ($k = 0; $k < count($wordList); $k++) {
                    if (in_array($wordList[$k], $visitedLeft)) {
                        continue;
                    }
                    if (!$this->canConvert($strLeft, $wordList[$k])) {
                        continue;
                    }
                    if (in_array($wordList[$k], $visitedRight)) { // 如果找到了目标字符串
                        return $countLeft + $countRight + 1;
                    }
                    $visitedLeft[] = $wordList[$k];
                    $queueLeft->push($wordList[$k]);
                }
            }
            $countRight++;
            $sizeRight = $queueRight->count();
            for ($i = 0; $i < $sizeRight; $i++) {
                $strRight = $queueRight->dequeue();
                for ($k = count($wordList) - 1; $k >= 0; $k--) {
                    if (in_array($wordList[$k], $visitedRight)) {
                        continue;
                    }
                    if (!$this->canConvert($wordList[$k], $strRight)) {
                        continue;
                    }
                    if (in_array($wordList[$k], $visitedLeft)) {
                        return $countLeft + $countRight + 1;
                    }

                    $visitedRight[] = $wordList[$k];
                    $queueRight->push($wordList[$k]);
                }
            }
        }
        return 0;
    }

    function ladderLength_3_optimize($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $queueLeft = new SplQueue();
        $queueLeft->push($beginWord);
        $queueRight = new SplQueue();
        $queueRight->push($endWord);

        $visitedLeft[$beginWord] = true;
        $visitedRight[$endWord] = true;
        $countLeft = 0;
        $countRight = 0;
        while (!$queueLeft->isEmpty() && !$queueRight->isEmpty()) {
            $countLeft++;
            $sizeLeft = $queueLeft->count();
            for ($i = 0; $i < $sizeLeft; $i++) {
                $strLeft = $queueLeft->dequeue();
                for ($k = 0; $k < count($wordList); $k++) {
                    if (isset($visitedLeft[$wordList[$k]]) && $visitedLeft[$wordList[$k]] == true) {
                        continue;
                    }
                    if (!$this->canConvert($strLeft, $wordList[$k])) {
                        continue;
                    }
                    if (isset($visitedRight[$wordList[$k]]) && $visitedRight[$wordList[$k]] == true) { // 如果找到了目标字符串
                        return $countLeft + $countRight + 1;
                    }
                    $visitedLeft[$wordList[$k]] = true;
                    $queueLeft->push($wordList[$k]);
                }
            }
            $countRight++;
            $sizeRight = $queueRight->count();
            for ($i = 0; $i < $sizeRight; $i++) {
                $strRight = $queueRight->dequeue();
                for ($k = count($wordList) - 1; $k >= 0; $k--) {
                    if (isset($visitedRight[$wordList[$k]]) && $visitedRight[$wordList[$k]] == true) {
                        continue;
                    }
                    if (!$this->canConvert($wordList[$k], $strRight)) {
                        continue;
                    }
                    if (isset($visitedLeft[$wordList[$k]]) && $visitedLeft[$wordList[$k]] == true) {
                        return $countLeft + $countRight + 1;
                    }

                    $visitedRight[$wordList[$k]] = true;
                    $queueRight->push($wordList[$k]);
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
    echo (new Solution())->ladderLength("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]) . "\n";
    echo (new Solution())->ladderLength("hit", "cog", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength("hit", "log", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength("hot", "dog", ["hot", "dog"]) . "\n";
    echo (new Solution())->ladderLength("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]) . "\n";
    echo (new Solution())->ladderLength("a", "c", ["a", "b", "c"]) . "\n";
    echo "\n";

    echo (new Solution())->ladderLength_2("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]) . "\n";
    echo (new Solution())->ladderLength_2("hit", "cog", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_2("hit", "log", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_2("hot", "dog", ["hot", "dog"]) . "\n";
    echo (new Solution())->ladderLength_2("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]) . "\n";
    echo (new Solution())->ladderLength_2("a", "c", ["a", "b", "c"]) . "\n";
    echo "\n";
    echo (new Solution())->ladderLength_2_optimize("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]) . "\n";
    echo (new Solution())->ladderLength_2_optimize("hit", "cog", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_2_optimize("hit", "log", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_2_optimize("hot", "dog", ["hot", "dog"]) . "\n";
    echo (new Solution())->ladderLength_2_optimize("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]) . "\n";
    echo (new Solution())->ladderLength_2_optimize("a", "c", ["a", "b", "c"]) . "\n";
    echo "\n";
    echo (new Solution())->ladderLength_3("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]) . "\n";
    echo (new Solution())->ladderLength_3("hit", "cog", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_3("hit", "log", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_3("hot", "dog", ["hot", "dog"]) . "\n";
    echo (new Solution())->ladderLength_3("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]) . "\n";
    echo (new Solution())->ladderLength_3("a", "c", ["a", "b", "c"]) . "\n";
    echo "\n";
    echo (new Solution())->ladderLength_3_optimize("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]) . "\n";
    echo (new Solution())->ladderLength_3_optimize("hit", "cog", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_3_optimize("hit", "log", ["hot", "dot", "dog", "lot", "log"]) . "\n";
    echo (new Solution())->ladderLength_3_optimize("hot", "dog", ["hot", "dog"]) . "\n";
    echo (new Solution())->ladderLength_3_optimize("lost", "miss", ["most", "mist", "miss", "lost", "fist", "fish"]) . "\n";
    echo (new Solution())->ladderLength_3_optimize("a", "c", ["a", "b", "c"]) . "\n";
    echo "======= test case end =======\n";
}