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
                                {{ $plan->name }} --
                                <form class="form-horizontal" role="form" method="get" action="{{ url('/delete_plan/' . $plan->id) }}">
                                    <button type="submit" class="btn btn-small btn-warning ">
                                        <i class="fa fa-btn fa-money"></i> Delete
                                    </button>
                                </form>
                            </h2>
                            <ul>
                                <li>
                                    Amount Spent:
                                    ${{ $plan->amount_spent }}
                                </li>
                                <li>
                                    Range Type -
                                    {{ $plan->range_type }}
                                </li>
                                <li>
                                    Plan Created:
                                    {{  $plan->created_at }}
                                </li>
                            </ul>
                         @endforeach
                    </div>
                    <div class="panel-heading">New Spending Plan</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/submit_plan') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="amount_spent" class="col-md-4 control-label">Amount Spent</label>

                                <div class="col-md-6">
                                    <input id="amount_spent" type="text" class="form-control" name="amount_spent" value="{{ old('amount_spent') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="range_type" class="col-md-4 control-label">Range Type</label>

                                <div class="col-md-6">
                                    <input id="range_type" type="text" class="form-control" name="range_type" value="{{ old('range_type') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-money"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection