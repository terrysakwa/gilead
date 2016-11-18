<?php

namespace App\Http\Controllers;

use App\Repositories\PatientRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SavePatientRecordRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ChangeRecordRequest;

class PatientController extends Controller
{
    public function show($patient_id, PatientRepository $patientRepository){

        $patient = $patientRepository->show($patient_id);

        $records = $patientRepository->records($patient_id);

        return view('users.patient.show', compact('patient', 'records'));
    }

    /**
     * Persist a new user to the database
     * @param SavePatientRecordRequest $patientRecordRequest
     * @param PatientRepository $patientRepository
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store($patient_id, SavePatientRecordRequest $patientRecordRequest, PatientRepository $patientRepository){

        $patientRepository->store($patient_id, $patientRecordRequest);

        Session::flash('flash_message', 'Patient record was added successfully');

        return redirect()->back();
    }

    /**
     * Update a particular patient record
     * @param $record_id
     * @param SavePatientRecordRequest $savePatientRecordRequest
     * @param PatientRepository $patientRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($record_id, SavePatientRecordRequest $savePatientRecordRequest, PatientRepository $patientRepository){

        $patientRepository->update($record_id, $savePatientRecordRequest);

        Session::flash('flash_message', 'Record # '. $record_id . ' was updated successfully');

        return redirect()->back();
    }

    /**
     * Delete a patient
     * @param $record_id
     * @param PatientRepository $patientRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRecord($record_id, PatientRepository $patientRepository){

        $patientRepository->deleteRecords($record_id);

        Session::flash('flash_message', 'Record #' . $record_id . ' was deleted successfully');

        return redirect()->back();
    }

    /**
     * Send a change request for a record
     * @param $record_id
     * @param PatientRepository $patientRepository
     * @param ChangeRecordRequest $changeRecordRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeRequest($record_id, PatientRepository $patientRepository, ChangeRecordRequest $changeRecordRequest){

            $patientRepository->changeRequest($record_id, $changeRecordRequest);

            Session::flash('flash_message', 'A change request was sent for record #' .$record_id);

            return redirect()->back();
    }
}
