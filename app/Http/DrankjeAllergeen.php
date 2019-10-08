<?php


namespace App\Http;
use Illuminate\Database\Eloquent\Model;


class DrankjeAllergeen extends Model
{
    protected $table = 'dranken_allergenen';
    protected $primaryKey = 'ID';
    protected $fillable =['DrankID','AllergeenID','created_at','updated_at'];
}
