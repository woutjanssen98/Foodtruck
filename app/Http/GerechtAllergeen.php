<?php


namespace App\Http;
use Illuminate\Database\Eloquent\Model;


class GerechtAllergeen extends Model
{
    protected $table = 'gerechten_allergenen';
    protected $primaryKey = 'ID';
    protected $fillable =['GerechtID','allergeenID','created_at','updated_at'];
}
