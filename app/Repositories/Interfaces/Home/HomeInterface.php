<?php


namespace App\Repositories\Interfaces\Home;

use Illuminate\Http\Request;

interface HomeInterface {
    public function index();
    public function getRoleByUser();
    public function getAccountInfo(int $id, Request $request);
    public function getTypeUser(int $id);
}