<?php

class Solution
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */


    function ladderLength($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $wordList = array_flip($wordList);
        $s1[] = $beginWord;
        $s2[] = $endWord;
        $n = strlen($beginWord);
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
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->ladderLength("hit", "cog", ["hot", "dot", "dog", "lot", "log", "cog"]));
    var_dump((new Solution())->ladderLength("hit", "cog", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength("hit", "dot", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength("hit", "log", ["hot", "dot", "dog", "lot", "log"]));
    var_dump((new Solution())->ladderLength("hot", "dog", ["hot", "dog"]));


    echo "======= test case end =======\n";
}