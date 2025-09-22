<?php

namespace App\Repositories\Home;

use App\Models\AccountsByPayment;
use App\Models\ClubTables;
use App\Models\Roles;
use App\Repositories\Interfaces\Home\HomeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeRepository implements HomeInterface
{

    public function __construct() {}

    public function index()
    {
        return ClubTables::all();
    }

    public function getRoleByUser()
    {
        return auth()->user()->role_id;
    }

    public function getAccountInfo(int $id, Request $request)
    {
        $account = AccountsByPayment::where('club_table_id', $id)->first();
        if (!$account) {
            return response()->json(['error' => 'Hubo algún error actualizando la cuenta'], 404);
        }

        if ($account->payment == 0) {
            return response()->json(['error' => 'El total de la cuenta no puede estar en 0'], 404);
        }

        $total = $account->payment/$request->accounts;

        $account->number_accounts = $request->accounts; 
        $account->pre_total = $total;
        $account->save();
        
        return ClubTables::with('accounts.products')->where('id', $id)->get();
    }

    public function getTypeUser(int $id)
    {
        return Roles::select('id', 'name')->where('id', $id)->first();
    }
}
