<?php

namespace App\Services\Home;

use App\Http\Requests\ValidatePasswordRequest;
use App\Repositories\Interfaces\Home\HomeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

Class HomeServices {

    public function __construct(protected HomeInterface $home) 
    {
    }

    public function index()
    {
        return $this->home->index();
    }

    public function getRoleByUser()
    {
        return $this->home->getRoleByUser();
    }

    public function getAccountInfo(int $id, Request $request)
    {
        return $this->home->getAccountInfo($id, $request);
    }

    public function getTypeUser(int $id)
    {
        return $this->home->getTypeUser($id);
    }

    public function getProfile()
    {
        return $this->home->getProfile();
    }

    public function validatePassword(Request $request)
    {
        $validate = FacadesValidator::make($request->all(), ['oldPassword' => 'required', 'userId' => 'required'], [
            'oldPassword.required' => 'La antigua contraseña es obligatoria, por favor ingresela'
        ]);

        if ($validate->fails()) {
            response()->json(['status' => 3, 'success' => false, 'errors' => $validate->errors()], 422);
        }

        $response = $this->home->validatePassword($validate->validated());
        return $response;
    }

    public function changePassword(ValidatePasswordRequest $request)
    {
        return $this->home->changePassword($request);
    }

    public function getStatesTable(Request $request)
    {
        return $this->home->getStatesTable($request);
    }
}