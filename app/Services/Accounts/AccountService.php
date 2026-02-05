<?php

namespace App\Services\Accounts;

use App\Http\Requests\StoreAccountRequest;
use App\Repositories\Interfaces\Account\AccountInterface;
use Illuminate\Http\Request;

Class AccountService {

    public function __construct(protected AccountInterface $account){}

    public function storeAccountProducts(StoreAccountRequest $request)
    {
        return $this->account->storeAccountProducts($request);
    }

    public function showDetails(Request $request)
    {
        return $this->account->showDetails($request);
    }

    public function getTableInformation(String $tableId)
    {
        return $this->account->getTableInformation($tableId);
    }

}