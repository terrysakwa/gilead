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

    /**
     * Mass assignable fields
     * @var array
     */
    protected $fillable = [
      'symptoms', 'tests', 'test_results', 'diagnosis', 'prescription'
    ];

    /**
     * PatientRecord ChangeRequest relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function change_request(){

        return $this->hasMany(ChangeRequest::class);
    }


}
