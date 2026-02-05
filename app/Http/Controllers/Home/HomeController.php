<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePasswordRequest;
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
    public function getProfile()
    {
        $title = "Perfil";
        $user = $this->home->getProfile();
        return view('Home.Profile', compact('title', 'user'));
    }

    /**
     * Display the specified resource.
     */
    public function validatePassword(Request $request)
    {
        return $this->home->validatePassword($request);
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function changePassword(ValidatePasswordRequest $request)
    {
        $changePassword = $this->home->changePassword($request);
        return response()->json($changePassword);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function getStatesTable(Request $request)
    {
        $state = $this->home->getStatesTable($request);
        return response()->json($state);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
