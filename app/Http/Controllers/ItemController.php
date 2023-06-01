<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ItemLists;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function index(): View
    {
        //get requests list
        //paginate = batasin jumlah data yg di view
        $items = ItemLists::OrderBy('id', 'asc')->paginate(5);

        //render view with posts
        return view('items.index', compact('items'));
    }
    public function create(): View
    {
        return view('items.create');
    }
    public function store(Request $as): RedirectResponse
    {
        //validate form
        $this->validate($as, [
            'itemName',
        ]);
        ItemLists::create([
            'itemName'     => $as->namaItem,
        ]);
        
        return redirect()->route('items.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id): View
    {
        //get post by ID
        $items = ItemLists::findOrFail($id);

        //render view with post
        return view('items.show', compact('items'));
    }
    public function edit(string $id): View
    {
        //get post by ID
        $items = ItemLists::findOrFail($id);

        //render view with post
        return view('items.edit', compact('items'));
    }
    public function update(Request $as, $id): RedirectResponse
    {
        //validate form
        $this->validate($as, [
            'itemName',
        ]);

        //get post by ID
        $items = ItemLists::findOrFail($id);

        //update request
        $items->update([
            'itemName'     => $as->namaItem,
        ]);
            
        //redirect to index
        return redirect()->route('items.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $items = ItemLists::findOrFail($id);

        //delete post
        $items->delete();

        //redirect to index
        return redirect()->route('items.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
