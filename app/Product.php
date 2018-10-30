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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $product
     * @return \Illuminate\Http\Response
     */

    public function createProduct(Request $product)
    {
        $mapedProducts = Product::limitingStrings(collect($product), 100);
        return Product::create($mapedProducts);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateProduct(Request $product, $id)
    {
        $mapedProducts = Product::limitingStrings(collect($product), 100);
        $productToUpdate = Product::findOrFail($id);
        
        $productToUpdate->product_name = $mapedProducts['product_name'];
        $productToUpdate->product_type = $mapedProducts['product_name'];
        $productToUpdate->product_description = $mapedProducts['product_description'];

        return $productToUpdate->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function deleteProduct($product)
    {
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
