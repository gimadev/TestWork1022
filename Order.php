<?php

class Order extends Model
{
    public function manager()
    {
        return $this->hasOne('App\Manager');
    }

    public function getFullNameAttribute()
    {
        return $this->manager->firstName . ' ' . $this->manager->lastName;
    }
}

// Пример запроса:
// $orders = Order::with('manager')->limit(50)->get();
// Получение нужных данных из первого элемента
// $orders->first()->full_name ...