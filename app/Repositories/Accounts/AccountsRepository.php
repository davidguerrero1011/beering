<?php

namespace App\Repositories\Accounts;

use App\Models\AccountsByPayment;
use App\Models\Inventaries;
use App\Models\PaymentTypes;
use App\Models\Products;
use App\Models\ProductsbyTable;
use App\Repositories\Interfaces\Account\AccountInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountsRepository implements AccountInterface
{
    public function __construct(protected ProductsbyTable $productsTable, protected PaymentTypes $paymentTypes, protected AccountsByPayment $accountByTable, protected Products $products, protected Inventaries $inventaries) {}

    public function storeAccountProducts(Request $request)
    {
        try {
            
            DB::transaction(function () use($request) {

                $payment = $this->paymentTypes::where('type', 'Efectivo')->first();
                $unitPrize = $this->products::where('id', $request['productsList'])->first();
                $oldAccount = $this->accountByTable::where([ ['user_id', Auth::user()->id], ['club_table_id', $request['clubTable']], ['status', 1]])->latest('id')->first();
                $account = $oldAccount->pre_total ?? 0;
                $inventaryByPRoduct = $this->inventaries::where('product_id', $request['productsList'])->first();
                
                $accountByTable = $this->accountByTable::create([
                    'club_table_id'   => $request['clubTable'],
                    'user_id'         => Auth::user()->id,
                    'payment_type_id' => $payment->id,
                    'number_accounts' => 1,
                    'payment'         => 1,
                    'pre_total'       => $account + ($unitPrize->prize_unit * $request["amount"]),
                    'status'          => 1
                ]);
                $this->productsTable::create([
                    'product_id' => $request['productsList'],
                    'account_id' => $accountByTable->id,
                    'amont' => $request["amount"],
                    'prize' => $unitPrize->prize_unit,
                    'status' => 1
                ]);
                $this->inventaries::where('product_id', $request['productsList'])->update(['amont' => $inventaryByPRoduct->amont - $request["amount"]]);
                
            });

            return response()->json(['success' => 'Producto agregado exitosamente'], 200);
        } catch (Exception $e) {
            Log::info("Error: ". $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function showDetails(Request $request)
    {
        if (empty($request->userId) || empty($request->tableId)) {
            return response()->json(['response' => 'No existe o no llego el ID de la mesa o del usuario'], 404);
        }

        $countDetails = $this->accountByTable::where([ ['user_id', $request->userId], ['club_table_id', $request->tableId], ['status', 1]])->count();
        return response()->json(['response' => $countDetails], 200);
    }

    public function getTableInformation(String $tableId)
    {
        if (empty($tableId)) {
            return response()->json(['response' => 'No llego el ID de la mesa'], 404);
        }

        Log::info($tableId);
        $tableInformation = $this->productsTable::where('status', 1)->with(['accounts.clubTables', 'accounts.users', 'accounts.paymentTypes', 'products'])->get();
        $totalTable = $this->accountByTable::where([ ['status', 1], ['club_table_id', $tableId] ])->latest()->first();

        return response()->json(['response' => $tableInformation, 'preTotal' => $totalTable], 200);
    }
}
