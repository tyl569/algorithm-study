<?php

class Solution
{

    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    function findWords($board, $words)
    {
        $trie = new Trie();
        $result = [];
        foreach ($words as $word) {
            $trie->insert($word);
        }
        $this->find($board, $trie, $result);
        return $result;
    }

    function find(&$board, Trie $trie, &$result)
    {
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                $this->dfs($board, $i, $j, $trie->getRoot(), $result);
            }
        }
    }

    function dfs(&$board, $i, $j, TrieNode $trieNode, &$result)
    {
        if (!$this->inArea($i, $j, $board)) {
            return;
        }
        $char = $board[$i][$j];
        if (!isset($trieNode->children[$char]) || $char == "#") {
            return;
        }
        $trieNode = $trieNode->children[$char];
        if ($trieNode->word != null) {
            $result[] = $trieNode->word;
            $trieNode->setWord(null);

        }

        $temp = $char;
        $board[$i][$j] = '#';

        $this->dfs($board, $i, $j + 1, $trieNode, $result);
        $this->dfs($board, $i, $j - 1, $trieNode, $result);
        $this->dfs($board, $i + 1, $j, $trieNode, $result);
        $this->dfs($board, $i - 1, $j, $trieNode, $result);

        $board[$i][$j] = $temp;
    }


    function inArea($x, $y, $board)
    {
        return isset($board[$x][$y]);
    }

}

class Trie
{
    public $root = null;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    public function getRoot()
    {
        return $this->root;
    }


    public function insert($word)
    {
        $cur = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            if (empty($cur->children[$word[$i]])) {
                $cur->children[$word[$i]] = new TrieNode();
            }
            $cur = $cur->children[$word[$i]];
        }
        $cur->word = $word;
    }

}

class TrieNode
{
    public $children = [];
    public $word = null;

    public function setWord($word)
    {
        $this->word = $word;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $words = ["oath", "pea", "eat", "rain"];
    $board = [
        ['o', 'a', 'a', 'n'],
        ['e', 't', 'a', 'e'],
        ['i', 'h', 'k', 'r'],
        ['i', 'f', 'l', 'v']
    ];
    $ret = (new Solution())->findWords($board, $words);
    var_dump($ret);
    echo "======= test case end =======\n";
}