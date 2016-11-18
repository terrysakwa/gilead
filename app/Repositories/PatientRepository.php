<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/16/16
 * Time: 9:16 PM
 */

namespace App\Repositories;
use App\PatientRecord;
use App\User;
use Illuminate\Support\Facades\Auth;


class PatientRepository
{
    /**
     * The model used by ths repository
     * @var
     */
    protected $model;

    /**
     * PatientRepository constructor.
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Get a single patient from the database
     * @param $id
     * @return mixed
     */
    public function show($id){

        return $this->model->where('user_type', '=', 3)
                           ->where('id', '=', $id)
                            ->first();
    }


    /**
     * Save a new patient record to the database
     * @param $request
     */
    public function store($id, $request){

        $user = User::find($id);

        $user->patient_records()->create([
            'symptoms' => $request->symptoms,
            'tests'    => $request->tests,
            'test_results'     => $request->test_results,
            'diagnosis' => $request->diagnosis,
            'prescription' => $request->prescription
        ]);
    }

    /**
     * Update a patient record in the database
     * @param $record_id
     * @param $request
     */
    public function update($record_id, $request){

       $record = PatientRecord::findOrFail($record_id);

       $record->update([
           'symptoms' => $request->symptoms,
           'tests'    => $request->tests,
           'test_results'     => $request->test_results,
           'diagnosis' => $request->diagnosis,
           'prescription' => $request->prescription
       ]);

    }

    /**
     * Get patient records
     * @param $patient_id
     * @return mixed
     */

    public function records($patient_id){

        return PatientRecord::where('user_id', $patient_id)->latest()->get();
    }

    /**
     * Get a single patient records
     * @return mixed
     */
    public function patientRecords(){

        return Auth::user()->patient_records()->get();
    }

    /**
     * Deletes a patient record from the database
     * @param $record_id
     */
    public function deleteRecords($record_id){

        $record = PatientRecord::findOrFail($record_id);

        $record->delete();
    }

}