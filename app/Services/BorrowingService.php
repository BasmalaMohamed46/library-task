<?php

namespace App\Services;

use App\Repositories\BorrowingRepository;
use App\Repositories\CopyRepository;
use App\Repositories\StatusRepository;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class BorrowingService
{
    protected $borrowingRepository;
    protected $copyRepository;
    protected $statusRepository;

    public function __construct(
        BorrowingRepository $borrowingRepository,
        CopyRepository $copyRepository,
        StatusRepository $statusRepository
    ) {
        $this->borrowingRepository = $borrowingRepository;
        $this->copyRepository = $copyRepository;
        $this->statusRepository = $statusRepository;
    }

    public function borrowBook($studentId, $copyId)
    {
        $copy = $this->copyRepository->find($copyId);
       

        $borrowedAt = Carbon::now();
        $expectedReturnAt = Carbon::now()->addWeeks(2); 

        $borrowedStatus = $this->statusRepository->findByField('name', 'Borrowed');
        $this->copyRepository->update(['status_id' => $borrowedStatus->id], $copyId);

        return $this->borrowingRepository->create([
            'student_id' => $studentId,
            'copy_id' => $copyId,
            'borrowed_at' => $borrowedAt,
            'expected_return_at' => $expectedReturnAt,
            'return_status_id' => null
        ]);
    }

    public function returnBook($borrowingId, $returnStatusName)
    {
        $borrowing = $this->borrowingRepository->find($borrowingId);
        $copy = $borrowing->copy;
      

        $returnedAt = Carbon::now();
        $status = $this->statusRepository->findByField('name', $returnStatusName);
        $this->copyRepository->update(['status_id' => $status->id], $copy->id);

        return $this->borrowingRepository->update([
            'returned_at' => $returnedAt,
            'return_status_id' => $status->id
        ], $borrowingId);
    }

    public function generateReport()
    {
        $copies = $this->copyRepository->all();

        $report = $copies->map(function ($copy) {
            return [
                'book_name' => $copy->book->title,
                'copy_id' => $copy->id,
                'status' => $copy->status->name
            ];
        });

        return $report;
    }
}
