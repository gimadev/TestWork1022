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

            $needle = $weight - $box;

            if (empty($balance[$needle])) {
                if (empty($balance[$box])) {
                    $balance[$box] = 1;
                } else {
                    $balance[$box]++;
                }
            } else {
                $res++;
                $balance[$needle]--;
            }
        }

        return $res;
    }
}
