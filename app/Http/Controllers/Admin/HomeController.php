<?php

namespace App\Http\Controllers\Admin;

use App\Models\Child;
use App\Models\House;
use App\Models\NestedChild;

class HomeController
{
    public function index()
    {
        $total_house = House::count();
        $total_children = Child::count();
        $total_nested_children = NestedChild::count();
        return view('home',compact('total_house','total_children','total_nested_children'));
    }
}
