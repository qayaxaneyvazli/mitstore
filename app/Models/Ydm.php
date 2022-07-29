<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ydm extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function getCamera()
    {
        return $this->hasMany(Camera::class);
    }
    public function getComputer()
    {
        return $this->hasMany(Computer::class);
    }

    public function getDataCard()
    {
        return $this->hasMany(Datacard::class);
    }

    public function getDispensor()
    {
        return $this->hasMany(Dispensor::class);
    }
    public function getIbm()
    {
        return $this->hasMany(Ibm::class);
    }
    public function getMetroshtok()
    {
        return $this->hasMany(Metroshtok::class);
    }
    public function getPhone()
    {
        return $this->hasMany(Phone::class);
    }
    public function getPrinter()
    {
        return $this->hasMany(Printer::class);
    }
    public function getRouter()
    {
        return $this->hasMany(Router::class);
    }
    public function getSampleCup()
    {
        return $this->hasMany(Samplecup::class);
    }
    public function getSwitchs()
    {
        return $this->hasMany(Switchs::class);
    }
    public function getTank()
    {
        return $this->hasMany(Tank::class);
    }






}
