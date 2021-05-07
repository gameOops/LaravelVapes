<?php


namespace App\Services;
use App\product;

class CatalogService
{
    public function get($type) {
       return product::where('Type',$type)->paginate(16);
    }
    public function getSort($type,$sort) {
        return product::where('Type',$type)->orderBy($sort)->paginate(16);
    }
    public function getSortb($type,$sort) {
        return product::where('Type',$type)->orderByDesc($sort)->paginate(16);
    }
    public function search($req,$page) {
        return product::where('Name', 'LIKE', "%$req%")->where('Type',$page)->get();
    }
}
