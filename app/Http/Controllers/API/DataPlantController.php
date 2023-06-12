<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DataPlant;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DataPlantController extends Controller
{
    public function all(Request $request) {
        $user_id = $request->input('user_id');
        
        if($user_id) 
        {
            $data = DataPlant::where('user_id', $user_id);

            if($data){
                return ResponseFormatter::success(
                    $data->get(), 
                    'Get by user_id data successfully'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }
        }

        $data = DataPlant::all();

        return ResponseFormatter::success(
            $data,
            'Get all data plant successfully'
        );
    }

    public function getPaginate(Request $request) {
        $user_id = $request->input('user_id');
        $limit = $request->input('limit');

        
        if($user_id) 
        {
            $data = DataPlant::where('user_id', $user_id);

            if($data){
                return ResponseFormatter::success(
                    $data->paginate($limit), 
                    'Get by user_id data successfully'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }
        }

        $data = DataPlant::paginate($limit);

        return ResponseFormatter::success(
            $data,
            'Get data plant successfully'
        );
    }

    public function add(Request $request) {
        try {
            $request->validate([
                'tank_a' => 'numeric',
                'feed_flow_f1' => 'numeric',
                'holding_t1' => 'numeric',
                'heater_t2' => 'numeric',
                'heated_feed_t4' => 'numeric',
                'power_heater' => 'numeric',
                'pump_n1' => 'numeric',
                'pump_n2' => 'numeric',
                'set_point_t1' => 'numeric',
                'set_point_t2' => 'numeric',
                'set_point_f1' => 'numeric',
                'model_t1' => 'numeric',
                'model_t2' => 'numeric',
                'model_f1' => 'numeric',
                'valve_tank_a' => 'numeric',
                'user_id' => 'integer',
            ]);

            $data = DataPlant::create([
                'tank_a' => $request->tank_a,
                'feed_flow_f1' => $request->feed_flow_f1,
                'holding_t1' => $request->holding_t1,
                'heater_t2' => $request->heater_t2,
                'heated_feed_t4' => $request->heated_feed_t4,
                'power_heater' => $request->power_heater,
                'pump_n1' => $request->pump_n1,
                'pump_n2' => $request->pump_n2,
                'set_point_t1' => $request->set_point_t1,
                'set_point_t2' => $request->set_point_t2,
                'set_point_f1' => $request->set_point_f1,
                'model_t1' => $request->model_t1,
                'model_t2' => $request->model_t2,
                'model_f1' => $request->model_f1,
                'valve_tank_a' => $request->valve_tank_a,
                'user_id' => $request->user_id,
            ]);

            return ResponseFormatter::success(
                $data,
                'Add data plant successfully'
            );
        } catch (ValidationException $error) {
            return ResponseFormatter::error([
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],    
            ], 
                'Add data plant failed', 
                500,
            );
        }
    }
}
