<?php


namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

trait ModelSearchable
{
    public function getModelInstances(Request $request, Model $model, int $type)
    {
        $modelClass = get_class($model);
        switch ($type) {
            case 6:
                $query = $modelClass::with('product', 'supplier');
                break;

            case 7:
            case 8:
            case 9:
                $query = $modelClass::with('user');
                break;

            case 12:
                $query = $modelClass::with('clubTables');
                break;
            
            case 13:
                $query = $modelClass::with('category');
                break;
            
            default:
                $query = $modelClass::query();
                break;
        }

        if ($request->search !== null && trim($request->search) !== '') {
            $query->where('id', 'LIKE', '%' . trim($request->search) . '%');
        }

        return $query->paginate(10);
    }
}
