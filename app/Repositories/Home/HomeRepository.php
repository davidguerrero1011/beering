<?php

namespace App\Repositories\Home;

use App\Models\AccountsByPayment;
use App\Models\ClubTables;
use App\Models\Roles;
use App\Models\User;
use App\Repositories\Interfaces\Home\HomeInterface;
use Exception;
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

    public function getProfile()
    {
        return auth()->user();
    }

    public function validatePassword(Array $request)
    {
        $validatePassword =  User::find($request["userId"]);
        if (password_verify($request['oldPassword'], $validatePassword->password)) {
            return ['status' => 1];
        }

        return ['status' => 2];
    }

    public function changePassword(Request $request)
    {
        try {
            $passwordHash = password_hash($request->password, PASSWORD_BCRYPT);
            $user = User::find($request->userId);
            $user->update(['password' => $passwordHash]);

            return ['status' => 'success', 'message' => 'Contraseña actualizada correctamente'];
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ['status' => 'error', 'message' => 'Hubo algún error actualizando la contraseña, consulte al administrador.'];
        }
    }

    public function getStatesTable(Request $request)
    {
        if (empty($request->state) || empty($request->table)) {
            throw new Exception('No se ha enviado el estado o el identificador de la mesa');
        }

        $updateState = ClubTables::find($request->table);
        $updateState->update(['state' => $request->state]);

        return ['status' => $updateState];
    }
}
