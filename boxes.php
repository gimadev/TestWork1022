<?php

$worker = new Worker();

// первые входные данные
$boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
$weight = 6;

$res = $worker->getResult($boxes, $weight);
echo $res . "\n";

$boxes = [2, 4, 3, 6, 1];
$weight = 5;

$res = $worker->getResult($boxes, $weight);
echo $res . "\n";

class Worker
{
    // т.к. необходимо найти максимальное число комбинация, надо начинать с минимального количества слагаемых
    // поэтому в первую очередь ищем максимальное число в массиве
    public function getResult(array $boxes, int $weight): int
    {

        $balance = [];
        $res = 0;

        foreach ($boxes as $box) {
            if ($box >= $weight) {
                continue;
            }

            if (isset($balance[$box])) {
                $balance[$box]++;
            } else {
                $balance[$box] = 1;
            }
        }

        foreach ($balance as $k => $v) {
            if (empty($balance[$k])) {
                continue;
            }

            $needle = $weight - $k;

            if (!empty($balance[$needle])) {

                if ($needle == $k) {
                    if ($balance[$needle] == 1) {
                        continue;
                    }

                    $res += intdiv($balance[$needle], 2);
                } else {
                    $needle_length = $balance[$needle];
                    $length = $needle_length <= $v ? $needle_length : $v;
                    $res += $length;
                    $balance[$needle] = 0;
                }
            }
        }

        return $res;
    }
}
