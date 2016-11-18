<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'change_requests';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'request'
    ];

    /**
     * ChangeRequest PatientRecord repository
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function record(){

        return $this->belongsTo(PatientRecord::class);
    }
}
