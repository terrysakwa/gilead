@extends('...layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel">
                <div class="panel-heading green-bg">Patients:</div>

                <div class="panel-body">
                    @if($patients->count())

                        <div class="row">
                            <div id="custom-search-input">
                                {{--search form--}}
                                <form class="form-horizontal" method="get" action="{{ route('search') }}">
                                <div class="input-group col-md-offset-3 col-md-6">
                                    <input type="text" class="search-query form-control" name="query" placeholder="Search a patient here" />
                                    <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                            <i class="fa fa-search"></i>
                                    </button>
                                    </span>
                                </div>
                                </form>
                            </div>
                        </div>

                            @foreach($patients as $patient)
                            <div class="patient-results">
                                <div class="col-sm-3">
                                    <div class="card">
                                        <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                                        <div class="avatar">
                                            <img src="" alt="" />
                                        </div>
                                        <div class="content">
                                            <p>
                                                {{$patient->name}}
                                                {{--{{$patient->email }}--}}
                                            </p>

                                            <p>
                                                @if($patient->gender == 1)
                                                    Female
                                                @else
                                                    Male
                                                @endif
                                            </p>

                                            <a href="{{ route('patientRecords', [$patient->id]) }}" type="button" class="btn btn-success">
                                                View {{ $patient->name }} records
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    @else
                        <h1>No patients have been found</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
