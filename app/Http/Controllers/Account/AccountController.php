<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Services\Accounts\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct(protected AccountService $service)
    {
    }

    public function storeAccountProducts(StoreAccountRequest $request)
    {
        return $this->service->storeAccountProducts($request);        
    }

    public function showDetails(Request $request)
    {
        return $this->service->showDetails($request);        
    }

    public function getTableInformation(string $tableId)
    {
        return $this->service->getTableInformation($tableId);
    }
}
