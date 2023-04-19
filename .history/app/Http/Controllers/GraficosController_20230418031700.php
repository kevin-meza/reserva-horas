<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class GraficosController extends Controller
{
    //
    public function index(){
        // Documentacion charts
        // https://github.com/LaravelDaily/laravel-charts
        $chart_options = [
            'chart_title' => 'Usuarios por mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];

        $chart_options2 = [
            'chart_title' => 'Usuarios por mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Especialistas',
            'group_by_field' => 'id_especialista',

            'chart_type' => 'pie'
        ];
        $chart = new LaravelChart($chart_options2);


        // return view('pantallas/graficos');
        return view('pantallas/graficos', compact('chart'));


    }
}
