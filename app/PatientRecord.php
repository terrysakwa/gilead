<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'patient_records';

    protected $fillable = [
      'symptoms', 'tests', 'test_results', 'diagnosis', 'prescription'
    ];
}
