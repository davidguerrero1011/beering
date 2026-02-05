<?php


namespace App\Repositories\Interfaces\Home;

use Illuminate\Http\Request;

interface HomeInterface {
    public function index();
    public function getRoleByUser();
    public function getAccountInfo(int $id, Request $request);
    public function getTypeUser(int $id);
    public function getProfile();
    public function validatePassword(Array $request);
    public function changePassword(Request $request);
    public function getStatesTable(Request $request);
}