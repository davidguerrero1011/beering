<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountriesRequest;
use App\Http\Requests\UpdateCountriesRequest;
use App\Models\CashBoxes;
use App\Services\Configurations\ConfigurationServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConfigurationController extends Controller
{

    public function __construct(protected ConfigurationServices $configuration) {}

    /**
     * Display a listing of the resource.
     */
    public function index(int $type, Request $request)
    {
        $information = $this->configuration->index($type, $request);
        Log::info("information");
        Log::info($information->toArray());
        $block = $this->configuration->blockBoxCashCreate();
        $currenCash = CashBoxes::where([ ['status', 1], ['date_entry', date('Y-m-d')]])->orderBy('created_at', 'desc')->first();

        return view('Configuration.Configuration', compact('type', 'information', 'block', 'currenCash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $type)
    {
        $data = $this->configuration->create();

        $countries = $data["countries"];
        $cities = $data["cities"];
        $roles = $data["roles"];
        $products = $data["products"];
        $suppliers = $data["suppliers"];
        $users = $data["users"];
        $tables = $data["tables"];
        $categories = $data["categories"];

        return view('Configuration.Create-Configuration', compact('type', 'cities', 'countries', 'roles', 'products', 'suppliers', 'users', 'tables', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $type, Request $request)
    {
        return $this->configuration->store($type, $request);
    }

    /**
     * Display the specified resource.
     */
    public function updateStatus(Request $request)
    {
        return $this->configuration->updateStatus($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, int $type)
    {   
        $allData = $this->configuration->edit();
        $data = $allData->getData(true);

        $information = $this->configuration->show($id, $type);

        $countries = $data["countries"];
        $cities = $data["cities"];
        $roles = $data["roles"];
        $products = $data["products"];
        $suppliers = $data["suppliers"];
        $users = $data["users"];
        $categories = $data["categories"];

        return view('Configuration.Edit-Configuration', compact('cities', 'id', 'type', 'countries', 'roles', 'products', 'suppliers', 'users', 'information', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountriesRequest $request, int $id, int $type)
    {
        return $this->configuration->update($request->validated(), $id, $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, int $type)
    {
        return $this->configuration->destroy($id, $type);
    }
}
