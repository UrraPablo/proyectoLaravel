<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Definicion de metodos para la clase categoria
    public function getIndex(){
        return view('category.index');
    }// fin function 

    public function getShow($id){
        return view('category.show',['id'=>$id]);
    }// fin function

    public function getCreate(){
        return view('category.create');
    }// fin function 

    public function getEdit($id){
        return view('category.edit',['id'=>$id]); // 'key' =>valor  (key es con el nombre que lo va a leer en view edit.php)
    }

}// fin clase controller category
