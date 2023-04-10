<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserList;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class ApprovingUsers extends Controller
{
    public function index(): View
    {
        //get users list
        //paginate = batasin jumlah data yg di view
        $users = UserList::OrderBy('id', 'asc')->paginate(5);

        //render view with posts
        return view('users.index', compact('users'));
    }
    public function create(): View
    {
        return view('users.create');
    }
    public function store(Request $as): RedirectResponse
    {
        //validate form
        $this->validate($as, [
            'username',
            'password',
            'authority'
        ]);
        UserList::create([
            'username'     => $as->username,
            'password'     => $as->password,
            'authority'    => $as->authority
        ]);
        
    
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id): View
    {
        //get post by ID
        $users = UserList::findOrFail($id);

        //render view with post
        return view('users.show', compact('users'));
    }
    public function edit(string $id): View
    {
        //get post by ID
        $users = UserList::findOrFail($id);

        //render view with post
        return view('users.edit', compact('users'));
    }
    public function update(Request $as, $id): RedirectResponse
    {
        //validate form
        $this->validate($as, [
            'username',
            'password',
            'authority',
        ]);

        //get post by ID
        $users = UserList::findOrFail($id);

        //update request
        $users->update([
            'username'     => $as->username,
            'authority'    => $as->authority,
        ]);
            
        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $users = UserList::findOrFail($id);

        //delete post
        $users->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
