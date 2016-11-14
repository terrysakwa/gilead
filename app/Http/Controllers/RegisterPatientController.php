<?php

namespace App\Http\Controllers;

use App\Repositories\RegisterPatientRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterPatientRequest;
use Illuminate\Support\Facades\Session;

class RegisterPatientController extends Controller
{
    /**
     * Adds a new patient to the database
     * @param RegisterPatientRequest $registerPatientRequest
     * @param RegisterPatientRepository $registerPatientRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterPatientRequest $registerPatientRequest, RegisterPatientRepository $registerPatientRepository){
        $registerPatientRepository->store($registerPatientRequest);
        Session::flash('flash_message', 'Patient <b><i>'. $registerPatientRequest->name . '</i></b>  was saved successfully !');
        return redirect()->back();
    }
}
