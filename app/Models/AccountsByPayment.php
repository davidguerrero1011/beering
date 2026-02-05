<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountsByPayment extends Model
{
    use HasFactory;
    protected $fillable = [ 'club_table_id', 'user_id', 'payment_type_id', 'number_accounts', 'payment', 'pre_total', 'status' ];
    public $timestamps = true;

    public function clubTables()
    {
        return $this->belongsTo(ClubTables::class, 'club_table_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(ProductsbyTable::class, 'account_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paymentTypes()
    {
        return $this->belongsTo(PaymentTypes::class, 'payment_type_id', 'id');
    }
}
