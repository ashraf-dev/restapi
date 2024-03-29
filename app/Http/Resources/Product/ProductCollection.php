<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=> $this->name,
            'totalPrice'=>round((1 - ($this->discount/100))* $this->price,2),
            'discount'=> $this->discount,
            'rating'=>$this->reviews->count('star')>0?round($this->reviews->sum('star')/$this->reviews->count('star'),2):'No rating yet',
            'href'=>[
                'link'=>route('products.show',$this->id)
            ]
        ];//parent::toArray($request);
    }
}
