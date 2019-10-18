<?php

namespace App\Exceptions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

trait  ExceptionTrait
{

    public  function  apiException($request,$e)
    {

        if($e instanceof ModelNotFoundException){
            return response()->json([
                'errors'=>'Product not found'
            ],Response::HTTP_NOT_FOUND);
        }

        if($e instanceof NotFoundHttpException){
            return response()->json([
                'errors'=>'Incorrect route'
            ],Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $e);
    }
}