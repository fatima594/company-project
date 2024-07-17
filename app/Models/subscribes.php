<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribes extends Model
{
    use HasFactory;
    protected $fillable =[
        'email',
    ];

    /**
     * @return string[]
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

}
