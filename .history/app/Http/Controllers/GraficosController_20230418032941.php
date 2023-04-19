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
        $chart_options2 = [
            'chart_title' => 'Transactions by user',
            'chart_type' => 'line',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Especialista',

            'relationship_name' => 'id_especialista', // represents function user() on Transaction model
            'group_by_field' => 'name', // users.name

            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',

            'filter_field' => 'transaction_date',
            'filter_days' => 30, // show only transactions for last 30 days
            'filter_period' => 'week', // show only transactions for this week
        ];
        $chart = new LaravelChart($chart_optionss);


        // return view('pantallas/graficos');
        return view('pantallas/graficos', compact('chart'));


    }
}
