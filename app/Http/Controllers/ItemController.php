<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Items = Item::paginate(10);

        return view('items.index', ['Items' => $Items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('items.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       // dd($request['name']);
         // Validar los datos del formulario
         $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'tags' => 'nullable|string',
            'item_type' => 'required|in:text,image,archive',
          //  'text_content' => 'nullable|string|required_if:item_type,text',
           // 'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|required_if:item_type,image',
           // 'archive_upload' => 'nullable|file|max:10240|required_if:item_type,archive',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Crear el nuevo ítem
        $itemData = $request->except(['_token']);
        $itemData['created_by'] = auth()->id(); // Asumiendo que los usuarios están autenticados

     //  if ($request->hasFile('image_upload')) {
     //      $path = $request->file('image_upload')->store('images', 'public');
     //      $itemData['text_content'] = $path; // O podrías tener un campo 'image_path'
     //  }

     //  if ($request->hasFile('archive_upload')) {
     //      $path = $request->file('archive_upload')->store('archives', 'public');
     //      $itemData['text_content'] = $path; // O podrías tener un campo 'archive_path'
     //  }

        $itemData['tags'] = $request->input('tags') ? explode(',', $request->input('tags')) : [];

        

        $itemData['is_featured'] = $request->boolean('is_featured');
       //$itemData['is_active'] = $request->boolean('is_active');

        $item = Item::create($itemData);

        return redirect()->route('items.index')->with('success', 'Ítem creado exitosamente.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
