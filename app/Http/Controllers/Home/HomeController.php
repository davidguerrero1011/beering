<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\HomeServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(protected HomeServices $home)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = $this->home->getRoleByUser();
        $tables = $this->home->index();
        return view('Home.Home', compact('userRole', 'tables'));
    }

    /**
     * Show accounts information by table.
     */
    public function account(int $id, Request $request)
    {
        return $this->home->getAccountInfo($id, $request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getTypeUser(int $id)
    {
        return $this->home->getTypeUser($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
