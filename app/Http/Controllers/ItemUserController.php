<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\ItemController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class ItemUserController extends Controller
{
    

    public function __construct( protected ItemController $ItemCon) {
       

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      
        $perpagenum = $request['perpage'];

        if(isset( $perpagenum)){
            
            $perpagenum = (int) $request['perpage'];

        }else{
            $perpagenum = 0;
        }

        $UserAu = User::findOrFail(Auth::user()->id);

        $Items = $UserAu->items()->paginate($perpagenum);
       


        return view('user.items.index', ['items'=> $Items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $Categorys = Category::all();

        return view('user.items.create',['categories' => $Categorys]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        return $this->ItemCon->store($request);
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $ItemUser = Item::FindOrFail($id);

        return view('user.items.show', ['item' => $ItemUser]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
