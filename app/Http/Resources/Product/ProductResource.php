<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return
       [
           'name'=> $this->name,
           'description'=> $this->detail,
           'price'=> $this->price,
           'stock'=> ($this->store ==0?'out of stock': $this->store),
           'discount'=> $this->discount,
           'totalPrice'=>round((1 - ($this->discount/100))* $this->price,2),
           'rating'=>$this->reviews->count('star')>0?round($this->reviews->sum('star')/$this->reviews->count('star'),2):'No rating yet',
           'href'=>[
               'reviews'=> route('reviews.index',$this->id)
           ]
       ];
    }
}
