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
    static $first = null;

    if (is_null($first)) {
        $first = $a;
    }

    // Если ссылка на след объект отстутвует, достигли конца односвязного списка, 
    // возвращяем текущий объект, он и становится первым объектом списка
    if (is_null($a->next)) {
        $main = $a;
        return $a;
    }

    $obj = reverse($a->next);

    $obj->next = $a;

    if ($first === $obj->next) {
        return $main;
    }

    return $obj->next;
}

$ob1 = reverse($a);
var_dump($ob1);
