<?php


namespace App\Http;
use Illuminate\Database\Eloquent\Model;

class Gerecht extends Model
{
    protected $table = 'gerechten';
    protected $primaryKey = 'ID';
    protected $fillable = ['Prijs', 'extensie', 'created_at', 'updated_at'];
}
