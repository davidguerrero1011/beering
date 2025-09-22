<?php

namespace App\Services\Home;

use App\Repositories\Interfaces\Home\HomeInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
}