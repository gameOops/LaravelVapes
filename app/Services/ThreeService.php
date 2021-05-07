<?php

namespace App\Services;

use App\product;

class ThreeService
{
    public function three() {
        return product::limit('3')->inRandomOrder()->get();
    }
    public function one($id) {
        return product::where('id',$id)->get();
    }
}
