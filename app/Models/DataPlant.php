<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPlant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tank_a',
        'feed_flow_f1',
        'holding_t1',
        'heater_t2',
        'heated_feed_t4',
        'power_heater',
        'pump_n1',
        'pump_n2',
        'set_point_t1',
        'set_point_t2',
        'set_point_f1',
        'model_t1',
        'model_t2',
        'model_f1',
        'valve_tank_a',
        'user_id',
    ];
}
