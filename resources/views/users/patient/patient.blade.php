@extends('...layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel">
                <div class="panel-heading green-bg">Dashboard for Patient</div>

                <div class="panel-body green-bg">
                    @if($records->count())
                        @foreach($records->get() as $record)
                            <div class="well col-md-12">
                                <div class="col-md-6">
                                    <p>Record Id: {{ $record->id }}</p>
                                    <p>Symptoms: {{ $record->symptoms }}</p>
                                    <p>Tests: {{ $record->tests }}</p>
                                    <p>Test Results: {{ $record->test_results }}</p>
                                    <p>Diagnosis: {{ $record->diagnosis }}</p>
                                    <p>Prescription: {{ $record->prescription }}</p>
                                </div>

                                <div class="col-md-6">
                                    <h4>Send a change request for this record</h4>
                                    <h5><b><i>Kindly describe your change request below</i></b></h5>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('sendChangeRequest', [$record->id]) }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('change_request') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <textarea class="form-control" rows="5" name="change_request" id="request">{{ old('change_request') }}</textarea>
                                                @if ($errors->has('change_request'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('change_request') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-user"></i> Send Request
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <div class="col-md-offset-4">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#changeRequestsModal-{{ $record->id}}">Click to view your change requests for this record</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="changeRequestsModal-{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="changeRequestModal">
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
