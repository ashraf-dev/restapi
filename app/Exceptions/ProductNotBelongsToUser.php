<?php

namespace App\Exceptions;

use Exception;


class ProductNotBelongsToUser extends Exception
{
    /**
     * @return mixed
     */
    public function render()
    {
        return ['errors'=>'Product Not Belongs To User'];
    }
}
