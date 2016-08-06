@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Spending Plans</div>

                    <div class="panel-body">
                        @foreach($plans as $plan)
                            <h2>
                                {{$plan->name}}
                            </h2>
                            <ul>
                                <li>
                                    Amount Spent:
                                    {{$plan->amount_spent}}
                                </li>
                                <li>
                                    Range Type -
                                    {{$plan->range_type}}
                                </li>
                            </ul>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection