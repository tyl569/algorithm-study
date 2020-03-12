<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s)
    {
        $s = strval($s);
        return $this->times($s, 0);
    }

    function times($s, $index)
    {
        if (strlen($s) == $index) {
            return 1;
        }
        if ($s{$index} == 0) {
            return 0;
        }
        $res = $this->times($s, $index + 1);
        if ($index == strlen($s) - 1) {
            return $res;
        }
        if (($s{$index} * 10 + $s{$index + 1}) < 27) {
            $res += $this->times($s, $index + 2);
        }
        return $res;
    }

    function numDecodings2($s)
    {
        $s = strval($s);
        $dp[strlen($s)] = 1;
        $dp[strlen($s) - 1] = $s{strlen($s) - 1} == 0 ? 0 : 1;
        for ($i = strlen($s) - 2; $i >= 0; $i--) {
            if ($s{$i} == 0) {
                $dp[$i] = 0;
            } else {
                $dp[$i] = $dp[$i + 1] + ((($s{$i} * 10 + $s{$i + 1}) < 27) ? $dp[$i + 2] : 0);
            }
        }
        return $dp[0];
    }
}

echo (new Solution())->numDecodings('1223');
echo "\n";
echo (new Solution())->numDecodings2('1223');