<?php

namespace App\Exports;

use App\Models\Product;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name',
        'cat_id',
        'sup_id',
        'product_code',
        'godaun',
        'product_route',
        'buy_day',
        'expire_day',
        'buy_price',
        'selling_price',
        'product_img')->get();

    }
     public function export()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
