<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
        'product_name'=>$row[0],
        'cat_id'=>$row[1],
        'sup_id'=>$row[2],
        'product_code'=>$row[3],
        'godaun'=>$row[4],
        'product_route'=>$row[5],
        'buy_day'=>$row[6],
        'expire_day'=>$row[7],
        'buy_price'=>$row[8],
        'selling_price'=>$row[9],
        'product_img'=>$row[10]
        ]);
    }
}
