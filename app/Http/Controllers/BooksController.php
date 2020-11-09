<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Authors;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\http\Request;

class BooksController extends Controller
{
    
    public function index()
    {
        return Book::all();
    }

    public function show($id){
        return book::find($id);
        return $book = Book::find($id);
    }

    
    public function getBookbyId($id){
        $book = DB::table('books')->where('id', $id)->first();
        if($book){
            return response()->json(['message'=>'Success', 'data'=>$book], 200);
        }else{
            return response()->json(['message'=>'Book not found'], 404);
        }

    }

   
}