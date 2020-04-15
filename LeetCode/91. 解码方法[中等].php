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
        if ($index == strlen($s)) {
            return 1;
        }
        if ($s{$index} == 0) {
            return 0;
        }

        $res = $this->times($s, $index + 1);
        if ($index == strlen($s) - 1) {
            return $res;
        }
        if (10 * $s{$index} + $s{$index + 1} <= 26) {
            $res += $this->times($s, $index + 2);
        }
        return $res;
    }

    function numDecodings2($s)
    {
        $len = strlen($s);
        $dp[$len] = 1;
        if ($s{$len - 1} == 0) {
            $dp[$len - 1] = 0;
        } else {
            $dp[$len - 1] = 1;
        }
        for ($i = $len - 2; $i >= 0; $i--) {
            if ($s{$i} == 0) {
                $dp[$i] = 0;
            } else {
                $dp[$i] = $dp[$i + 1] + ((($s{$i} * 10 + $s{$i + 1}) < 27) ? $dp[$i + 2] : 0);
            }
        }
        return $dp[0];

    }
}

echo (new Solution())->numDecodings('1223104');
echo "\n";
echo (new Solution())->numDecodings2('1223104');