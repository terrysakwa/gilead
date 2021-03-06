@extends('...layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($errors->count())
                <div class="col-md-offset-4">
                    <a data-toggle="modal" data-target="#addRecordModal" class="text-danger"><b>An error occured, click here check your input and correct the errors</b></a>
                </div>
            @endif
            <div class="col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-heading green-bg">Patient:  <b><i>{{ $patient->name }}</i></b> details <button type="button" class="btn btn-primary col-md-offset-2" data-toggle="modal" data-target="#addRecordModal">Add new record for <b><i>{{ $patient->name }}</i></b></button>
                        @if($records->count())
                        <a href="{{ route('generateReport', [$patient->id]) }}" class="btn btn-primary col-md-offset-1">Generate Patient <b><i>{{ $patient->name }}</i></b> Medical Report</a>
                        @endif
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header green-bg">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Add a new record for <b><i>{{ $patient->name }}</i></b> </h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('savePatientRecord', [$patient->id]) }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('symptoms') ? ' has-error' : '' }}">
                                            <label for="symptoms" class="col-md-4 control-label">Symptoms</label>

                                            <div class="col-md-6">
                                                <textarea class="form-control" rows="5" name="symptoms" id="symptoms">{{ old('symptoms') }}</textarea>
                                                @if ($errors->has('symptoms'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('symptoms') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('tests') ? ' has-error' : '' }}">
                                            <label for="tests" class="col-md-4 control-label">Laboratory Tests</label>

                                            <div class="col-md-6">
                                                <input id="tests" type="text" class="form-control" name="tests" value="{{ old('tests') }}">

                                                @if ($errors->has('tests'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tests') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('test_results') ? ' has-error' : '' }}">
                                            <label for="test_results" class="col-md-4 control-label">Test Results</label>

                                            <div class="col-md-6">
                                                <input id="test_results" type="text" class="form-control" name="test_results" value="{{ old('test_results') }}">

                                                @if ($errors->has('test_results'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('test_results') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('diagnosis') ? ' has-error' : '' }}">
                                            <label for="diagnosis" class="col-md-4 control-label">Diagnosis</label>

                                            <div class="col-md-6">
                                                <input id="diagnosis" type="text" class="form-control" name="diagnosis" value="{{ old('diagnosis') }}">

                                                @if ($errors->has('diagnosis'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('diagnosis') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('prescription') ? ' has-error' : '' }}">
                                            <label for="prescription" class="col-md-4 control-label">Prescription</label>

                                            <div class="col-md-6">
                                                <textarea class="form-control" rows="5" name="prescription" id="prescription">{{ old('prescription') }}</textarea>
                                                @if ($errors->has('prescription'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('prescription') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Record for {{ $patient->name }}</button>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <p><b>Name: {{ $patient->name }}</b></p>
                            <p><b>Email: {{ $patient->email }}</b></p>
                            <p><b>Gender: @if($patient->gender == 1) Female @else Male @endif</b></p>
                            <p><b>Phone Number: {{ $patient->phone_number }}</b></p>
                            <p><b>Address: {{ $patient->address }}</b></p>
                        </div>


                        @if($records->count())
                        @foreach($records->get() as $record)

                            <div class="well green-bg col-md-12">

                                <div class="col-md-6">
                                    Record Creation Date: {{ $record->created_at->diffForHumans()  }}


                                    <h3>Record Details</h3>
                                    <p>Record Id: {{$record->id}}</p>
                                    <p>Symptoms: {{$record->symptoms}}</p>
                                    <p>Tets: {{ $record->tests }}</p>
                                    <p>Tests Results: {{$record->test_results}}</p>
                                    <p>Diagnosis: {{$record->diagnosis}}</p>
                                    <p>Prescription: {{$record->prescription}}</p>
                                </div>

                                <div class="col-md-6">
                                    <div class="dropdown col-md-offset-9">
                                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="" class="btn btn-primary" data-toggle="modal" data-target="#editRecord-{{ $record->id }}">Edit this record</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <form action="{{ route('deleteRecord', [$record->id]) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button type="button" class="btn btn-danger col-md-12 deleteRecord">
                                                        Delete this record
                                                    </button>
                                                </form>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#changeRequestsModal-{{$record->id}}">Change Requests</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="changeRequestsModal-{{$record->id}}" tabindex="-1" role="dialog" aria-labelledby="changeRequestModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header green-bg">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Change requests for record # <b><i>{{ $record->id }}</i></b> </h4>
                                            </div>
                                            <div class="modal-body">

                                                @foreach($records->with('change_request')->latest()->get() as $request)
                                                    @foreach($request->change_request()->where('patient_record_id', $record->id)->latest()->get() as $change_request)
                                                        <div class="well">

                                                            <p> Sent: {{ $change_request->created_at->diffForHumans() }}</p>

                                                            <p>Request description: {{ $change_request->request }}</p>

                                                        </div>
                                                    @endforeach
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                                <!-- Modal -->
                                <div class="modal fade" id="editRecord-{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="editRecord-{{ $record->id  }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header green-bg">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="editRecord-{{ $record->id }}">Edit a record for: <b><i>{{ $patient->name }}</i></b> </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="POST" action="{{ route('updatePatientRecord', [$record->id]) }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('symptoms') ? ' has-error' : '' }}">
                                                        <label for="symptoms" class="col-md-4 control-label">Symptoms</label>

                                                        <div class="col-md-6">
                                                            <textarea class="form-control" rows="5" name="symptoms" id="symptoms">{{ $record->symptoms }}</textarea>
                                                            @if ($errors->has('symptoms'))
                                                                <span class="help-block">
                                                        <strong>{{ $errors->first('symptoms') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('tests') ? ' has-error' : '' }}">
                                                        <label for="tests" class="col-md-4 control-label">Laboratory Tests</label>

                                                        <div class="col-md-6">
                                                            <input id="tests" type="text" class="form-control" name="tests" value="{{ $record->tests }}">

                                                            @if ($errors->has('tests'))
                                                                <span class="help-block">
                                                        <strong>{{ $errors->first('tests') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('test_results') ? ' has-error' : '' }}">
                                                        <label for="test_results" class="col-md-4 control-label">Test Results</label>

                                                        <div class="col-md-6">
                                                            <input id="test_results" type="text" class="form-control" name="test_results" value="{{ $record->test_results }}">

                                                            @if ($errors->has('test_results'))
                                                                <span class="help-block">
                                                        <strong>{{ $errors->first('test_results') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('diagnosis') ? ' has-error' : '' }}">
                                                        <label for="diagnosis" class="col-md-4 control-label">Diagnosis</label>

                                                        <div class="col-md-6">
                                                            <input id="diagnosis" type="text" class="form-control" name="diagnosis" value="{{ $record->diagnosis }}">

                                                            @if ($errors->has('diagnosis'))
                                                                <span class="help-block">
                                                        <strong>{{ $errors->first('diagnosis') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('prescription') ? ' has-error' : '' }}">
                                                        <label for="prescription" class="col-md-4 control-label">Prescription</label>

                                                        <div class="col-md-6">
                                                            <textarea class="form-control" rows="5" name="prescription" id="prescription">{{ $record->prescription }}</textarea>
                                                            @if ($errors->has('prescription'))
                                                                <span class="help-block">
                                                        <strong>{{ $errors->first('prescription') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update Record for {{ $patient->name }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                        @else
                            <p>Patient <b><i>{{ $patient->name }}</i></b>has no records!!</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection