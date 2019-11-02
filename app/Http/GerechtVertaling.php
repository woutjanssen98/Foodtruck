<?php


namespace App\Http;


use Illuminate\Database\Eloquent\Model;

class GerechtVertaling extends Model
{
    protected $table = 'gerecht_vertaling';
    protected $primaryKey = 'ID';
    protected $fillable=['GerechtID','TaalID','Vertaling','created_at','updated_at'];
}
