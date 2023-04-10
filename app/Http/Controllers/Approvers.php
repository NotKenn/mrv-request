<?php
namespace App\Http\Controllers;

use App\Models\ApprovingAssigning;

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use App\Models\UserList;

use App\Models\RequestsPO;

class Approvers extends Controller
{

    public function index(): View
    {
        $approvers = ApprovingAssigning::OrderBy('id', 'asc')->paginate(5);

        return view('approvers.index',compact('approvers'));
    }
    public function create(): View
    {
        $approvers = UserList::all();
        $orders = RequestsPO::all();

        return view('approvers.create', compact('approvers', 'orders'));
    }

    public function store(Request $req): RedirectResponse
    {
        //validate form
        $this->validate($req, [
            'approved_date',
            'user_id',
            'order_id',
            'status',
            'level',
        ]);
        ApprovingAssigning::create([
            'approved_date' => $req->approved_date,
            'user_id'       => $req->user_id,
            'req_id'        => $req->req_id,
            'isApproved'    => $req->isApproved,
            'level'         => $req->level,
        ]);
        
    
        return redirect()->route('approvers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id): View
    {
        //get post by ID
        $approvers = ApprovingAssigning::findOrFail($id);

        //render view with post
        return view('approvers.show', compact('approvers'));
    }
    public function edit(string $id): View
    {
        //get post by ID
        $approvers = ApprovingAssigning::findOrFail($id);

        //render view with post
        return view('approvers.edit', compact('approvers'));
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
            'approved_date',
            'user_id',
            'order_id',
            'isApproved',
            'level',
        ]);

        //get post by ID
        $approvers = ApprovingAssigning::findOrFail($id);

        //update request
        $approvers->update([
            'approved_date' => $req->approved_date,
            'user_id'       => $req->user_id,
            'order_id'      => $req->order_id,
            'isApproved'    => $req->isApproved,
            'level'         => $req->level,
        ]);
            
        //redirect to index
        return redirect()->route('approvers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $approvers = ApprovingAssigning::findOrFail($id);

        //delete post
        $approvers->delete();

        //redirect to index
        return redirect()->route('approvers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
