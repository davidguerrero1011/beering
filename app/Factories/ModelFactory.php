<?php


namespace App\Factories;

use App\Models\CashBoxes;
use App\Models\CashInflows;
use App\Models\CashOutflows;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\ClubTables;
use App\Models\Countries;
use App\Models\Inventaries;
use App\Models\Music;
use App\Models\Preparations;
use App\Models\Products;
use App\Models\Promotions;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Log;

Class ModelFactory {

    /**
     * Retorna una instancia del modelo correspondiente al tipo dado.
     *
     * @param int $type
     * @return object|null
     */
    public static function getModelInstanceByType(int $type) : ?object
    {
        Log::info("type: ". $type);
        return match ($type) {
            1 => new Countries(),
            2 => new Cities(),
            3 => new Roles(),
            4 => new User(),
            5 => new ClubTables(),
            6 => new Inventaries(),
            7 => new CashBoxes(),
            8 => new CashInflows(),
            9 => new CashOutflows(),
            10 => new Promotions(),
            11 => new Preparations(),
            12 => new Music(),
            13 => new Products(),
            14 => new Categories(),
            default => null,
        };
    }
    
}