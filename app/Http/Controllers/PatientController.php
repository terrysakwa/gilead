<?php

namespace App\Http\Controllers;

use App\Repositories\PatientRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SavePatientRecordRequest;
use Illuminate\Support\Facades\Session;

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
}
