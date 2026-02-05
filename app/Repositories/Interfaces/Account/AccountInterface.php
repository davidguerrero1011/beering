<?php


namespace App\Repositories\Interfaces\Account;

use Illuminate\Http\Request;

interface AccountInterface {
    public function storeAccountProducts(Request $request);
    public function showDetails(Request $request);
    public function getTableInformation(String $tableId);
}