<?php


namespace App\Http;
use Illuminate\Database\Eloquent\Model;


class Werknemer extends Model
{
    protected $table = "Werknemer";
    protected $primaryKey = "ID";
    protected $fillable =['Naam','Foto','Email','created_at','updated_at'];
}
