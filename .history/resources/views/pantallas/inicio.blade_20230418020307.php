@include('pantallas/head')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h1>{{ $chart->options['chart_title'] }}</h1>
                    {!! $chart->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@endsection






@include('pantallas/footer')

