<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\DoctorRepository;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchRequest;
use App\Repositories\SearchRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorRepository $doctorRepository, PatientRepository $patientRepository)
    {
        /**
         * Return the dashboards if the user is logged in
         */
        if(Auth::check()){
            if(Auth::user()->user_type == 1){
                $patients = $doctorRepository->getPatient();
                return view('users.doctor', compact('patients'));
            }elseif(Auth::user()->user_type == 2){
                return view('users.receptionist');
            }elseif(Auth::user()->user_type == 3){

                $records = $patientRepository->patientRecords();

                return view('users.patient.patient', compact('records'));
            }
        }
        /**
         * Return the welcome page if the user is not logged in
         */
        return view('welcome');
    }

    public function search(SearchRequest $searchRequest, SearchRepository $searchRepository, DoctorRepository $doctorRepository){

        $query = $searchRequest->get('query');


        if($query){

            $patients = $searchRepository->search($query);

            return view('users.doctor', compact('patients'));

        }else{
            $patients = $doctorRepository->getPatient();

            return view('users.doctor', compact('patients'));
        }

    }
}
