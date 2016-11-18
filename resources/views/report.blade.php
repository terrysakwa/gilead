
<div style="background-color: darkgrey;">

    <p>Name: {{ $patient->name }}</p>
    <p>Email: {{ $patient->email }}</p>
    <p>Gender: @if($patient->gender == 1) Female @else Male @endif</p>
    <p>Phone Number: {{ $patient->phone_number }}</p>
    <p>Address: {{ $patient->address }}</p>

</div>

@if($records->count())
    <h3>Record Details</h3>
    @foreach($records->get() as $record)
        <div style="background-color: #1b6d85; margin-top: 5%;">

            <div class="col-md-6">
                <p>Record Creation Date: {{ $record->created_at->diffForHumans()  }}</p>
                <p>Record #: {{$record->id}}</p>
                <p>Symptoms: {{$record->symptoms}}</p>
                <p>Tets: {{ $record->tests }}</p>
                <p>Tests Results: {{$record->test_results}}</p>
                <p>Diagnosis: {{$record->diagnosis}}</p>
                <p>Prescription: {{$record->prescription}}</p>
            </div>
        </div>
    @endforeach
@endif


