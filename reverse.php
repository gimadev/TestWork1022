<?php

class test
{
    public $next;
}

$a = new test();
$b = new test();
$c = new test();

$a->next = $b;
$b->next = $c;
$c->next = null;

function reverse($a)
{

    static $main = null;
    static $i = 0;

    // Если ссылка на след объект отстутвует, достигли конца односвязного списка, 
    // возвращяем текущий объект, он и становится первым объектом списка
    if (is_null($a->next)) {
        $main = $a;
        return $a;
    }

    $i++;

    $obj = reverse($a->next);

    $i--;

    $obj->next = $a;

    if ($i == 0) {
        return $main;
    }

    return $obj->next;
}

$ob1 = reverse($a);
var_dump($ob1);
