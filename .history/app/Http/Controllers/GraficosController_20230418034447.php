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

        $chart_optionss = [
            'chart_title' => 'Usuarios por mes',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Especialista',
            'group_by_field' => 'nombre',


            'chart_type' => 'pie'
        ];
        $chart_reserva = [
            'chart_title' => 'Transactions by user',
            'chart_type' => 'line',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\horas_disponibles',


            // represents function user() on Transaction model
            'group_by_field' => 'id_estado', // users.name

            // 'aggregate_function' => 'sum',
            // 'aggregate_field' => 'amount',

            // 'filter_field' => 'transaction_date',

        ];
        $chart = new LaravelChart($chart_reserva);


        // return view('pantallas/graficos');
        return view('pantallas/graficos', compact('chart'));


    }
}
