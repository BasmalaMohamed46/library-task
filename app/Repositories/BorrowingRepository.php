<?php

namespace App\Repositories;

use App\Models\Borrowing;

class BorrowingRepository extends EloquentRepository
{
    public function __construct(Borrowing $model)
    {
        parent::__construct($model);
    }
}
