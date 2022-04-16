<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Author;
class ProductController extends Controller
{
    //

    public function index(Request $request) {
        $authors = Author::get();
        $search = $request->search;
        $date = $request->date;
        $author_id = $request->author;
        // echo $author_id;die;
        $products = Product::with(['authors'])
        ->when($search, function($query) use ($search) {
            if($search != "") {
                return $query->where('name', 'like', '%'.$search.'%');

            }
          })
          ->when($date, function($query) use ($date) {
            if($date != "") {
                return $query->whereDate('created_at', $date);
            }
          })
          ->whereHas('authors', function($query) use ($author_id) {
            if($author_id != "") {
                $query->where('id', $author_id);
            }
         })
        ->paginate(2);


        return view('product.index',['authors' => $authors,'products' => $products]);
    }
}
