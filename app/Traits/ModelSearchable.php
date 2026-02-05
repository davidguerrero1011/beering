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
                $query = $modelClass::where('status', '1')->with('product', 'supplier');
                break;

            case 7:
                $query = $modelClass::with('user');
                break;

            case 8:
            case 9:
                $query = $modelClass::where('status', '1')->with('user');
                break;

            case 12:
                $query = $modelClass::where('status', '1')->with('clubTables');
                break;

            case 11:
                $query = $modelClass::where('status', '1')->with('products');
                break;
            
            case 13:
                $query = $modelClass::with('category');
                break;

            case 14:
                $query = $modelClass::where('status', '1');
                break;

            case 15:
                $query = $modelClass::where('status', '1');
                break;

            case 16:
                $query = $modelClass::where('status', '1')->with('user', 'city');
                break;
            
            default:
                $query = $modelClass::query();
                break;
        }

        if ($request->search !== null && trim($request->search) !== '') {
            $query->where('id', $request->search);
        }

        return $query->paginate(10);
    }
}
