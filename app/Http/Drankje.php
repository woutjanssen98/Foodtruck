<?php


namespace App\Http;
use Illuminate\Database\Eloquent\Model;

class Drankje extends Model
{
    protected $table = 'dranken';
    protected $primaryKey = 'ID';
    protected $fillable= ['Prijs','Extensie','created_at','updated_at'];
}
