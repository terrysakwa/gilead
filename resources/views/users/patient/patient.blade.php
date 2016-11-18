@extends('...layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard for Patient</div>

                <div class="panel-body">
                    @if($records->count())
                        @foreach($records as $record)
                            <div class="well">
                               <p>Record Id: {{ $record->id }}</p>
                               <p>Symptoms: {{ $record->symptoms }}</p>
                               <p>Tests: {{ $record->tests }}</p>
                               <p>Test Results: {{ $record->test_results }}</p>
                                <p>Diagnosis: {{ $record->diagnosis }}</p>
                               <p>Prescription: {{ $record->prescription }}</p>
                            </div>
                        @endforeach
                    @else
                        <h4>No records found</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
