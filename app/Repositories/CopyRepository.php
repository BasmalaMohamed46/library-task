<?php

namespace App\Repositories;

use App\Models\Copy;

class CopyRepository extends EloquentRepository
{
    public function __construct(Copy $model)
    {
        parent::__construct($model);
    }
}
