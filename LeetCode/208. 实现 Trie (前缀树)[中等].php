<?php

require_once "../Struct/TrieNode.php";

class Trie
{
    private $root;
    private $size;

    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->root = new TrieNode();
        $this->size = 0;

    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word)
    {
        if (strlen($word) == 0) {
            return;
        }
        $arr = str_split($word);
        $cur = $this->root;
        foreach ($arr as $char) {
            if (!isset($cur->next[$char])) {
                $cur->next[$char] = new TrieNode();
            }

            $cur = $cur->next[$char];
        }
        if (!$cur->isWord) {
            $cur->isWord = true; // 最后一个字符，代表已经是单词的结尾
            $this->size++;
        }
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word)
    {
        $cur = $this->root;
        $arr = str_split($word);
        foreach ($arr as $char) {
            if (!isset($cur->next[$char])) {
                return false;
            }
            $cur = $cur->next[$char];
        }
        return $cur->isWord;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix)
    {
        $cur = $this->root;
        $arr = str_split($prefix);
        foreach ($arr as $char) {
            if (!isset($cur->next[$char])) {
                return false;
            }
            $cur = $cur->next[$char];
        }
        return true;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */

mock();

function mock()
{
    echo "======= test case start =======\n";
    $obj = new Trie();
    $obj->insert("HELLO");
    $ret = $obj->search("HELLO");
    var_dump($ret);
    $ret = $obj->search("HE");
    var_dump($ret);
    $ret = $obj->search("HELL");
    var_dump($ret);
    $ret = $obj->startsWith("HE");
    var_dump($ret);
    $ret = $obj->startsWith("HELL");
    var_dump($ret);

    echo "======= test case end =======\n";
}