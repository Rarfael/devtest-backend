<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_name', 'product_type', 'product_description'];

    protected $dates = ['deleted_at'];

    public function createProduct(Request $product)
    {
        $mapedProducts = Product::limitingStrings(collect($product), 100);
        return Product::create($mapedProducts);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        if($product->delete()) {
            return $product;
        }
    }

    /**
     * @param  array $strings
     * @param int $numCaracter
     * @return array
     */
    public function limitingStrings($strings, $numCaracter)
    {
        $this->numCaracter = $numCaracter;

        $newString = $strings->map(function ($product)
        {
            return substr($product, 0, $this->numCaracter);
        });
        return $newString->all();
    }
}
