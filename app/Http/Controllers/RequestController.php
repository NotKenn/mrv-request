<?php

namespace App\Http\Controllers;

use App\Models\RequestsPO;

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

class RequestController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get requests list
        //paginate = batasin jumlah data yg di view
        $requests = RequestsPO::OrderBy('id', 'asc')->paginate(5);

        //render view with posts
        return view('requests.index', compact('requests'));
    }

    public function create(): View
    {
        return view('requests.create');
    }

    public function store(Request $req): RedirectResponse
    {
        //validate form
        $this->validate($req, [
            'customer',
            'item',
            'level',
            'status',
            'created_at',
            'updated_at',
        ]);
        RequestsPO::create([
            'customer' => $req->namaCust,
            'item'     => $req->namaItem,
            'level'    => $req->level,
            'status'    => $req->status,
            'created_at'=> $req->createDate,
            'updated_at'=> $req->updateDate,
        ]);
        
    
        return redirect()->route('requests.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id): View
    {
        //get post by ID
        $request = RequestsPO::findOrFail($id);

        //render view with post
        return view('requests.show', compact('request'));
    }
    public function edit(string $id): View
    {
        //get post by ID
        $request = RequestsPO::findOrFail($id);

        //render view with post
        return view('requests.edit', compact('request'));
    }
    
    /**
     * update
     *
     * @param  mixed $req
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $req, $id): RedirectResponse
    {
        //validate form
        $this->validate($req, [
            'customer',
            'item',
            'level',
            'status',
            'created_at',
            'updated_at',
        ]);

        //get post by ID
        $requests = RequestsPO::findOrFail($id);

        //update request
        $requests->update([
            'customer' => $req->namaCust,
            'item'     => $req->namaItem,
            'updated_at'=> $req->updateDate,
        ]);
            
        //redirect to index
        return redirect()->route('requests.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $requests = RequestsPO::findOrFail($id);

        //delete post
        $requests->delete();

        //redirect to index
        return redirect()->route('requests.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}