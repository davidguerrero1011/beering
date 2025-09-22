<?php


namespace App\Repositories\Interfaces\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ConfigurationInterface {
    public function index(int $type, Request $request);
    public function create();
    public function store(array $data, Model $model, int $type);
    public function edit();
    public function show(int $id, int $type);
    public function update(array $data, int $id, int $type);
    public function destroy(int $id, int $type);
    public function updateStatus(Request $request);
    public function blockBoxCashCreate();
}