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

        if(empty($boxes)) {
            return 0;
        }

        $max = max($boxes);
        $pos = array_search($max, $boxes);
        unset($boxes[$pos]);

        if($max >= $weight) {
            return $this->getResult($boxes, $weight);
        }

        $needle = $weight - $max;
        $pos2 = array_search($needle, $boxes);

        if($pos2 === false) {
            return $this->getResult($boxes, $weight);
        }

        unset($boxes[$pos2]);

        return 1 + $this->getResult($boxes, $weight);


    }
}
