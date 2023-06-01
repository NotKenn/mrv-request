<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserList;
use App\Models\RequestsPO;
use App\Models\ApprovingAssigning;
use App\Models\ItemLists;
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index(): View
    {
        //get users list
        //paginate = batasin jumlah data yg di view
        $users = UserList::OrderBy('id', 'asc')->paginate(5);
        $requests = RequestsPO::OrderBy('id', 'asc')->paginate(5);
        $approvers = ApprovingAssigning::OrderBy('id', 'asc')->paginate(5);
        $items = ItemLists::OrderBy('id','asc')->paginate(5);

        //render view with posts
        return view('dashboard.index', compact('users', 'requests', 'approvers', 'items'));
    }
}
