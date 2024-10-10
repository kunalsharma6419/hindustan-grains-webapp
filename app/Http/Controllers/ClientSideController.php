<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientSideController extends Controller
{
    /**
     * @method
     * @param
     * @return
     */
    public function index()
    {
        $category = Category::all();
        return view('clientSideView.index')->with([
            'categories' => $category
        ]);
    }
}
