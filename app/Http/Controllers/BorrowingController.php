<?php

namespace App\Http\Controllers;

use App\Services\BorrowingService;
use App\Http\Requests\BorrowBookRequest;
use App\Http\Requests\ReturnBookRequest;
/**
* @OA\Tag(
*     name="Borrow",
*     description="API Endpoints for Borrow"
* )
*/
class BorrowingController extends Controller
{
    protected $borrowingService;

    public function __construct(BorrowingService $borrowingService)
    {
        $this->borrowingService = $borrowingService;
    }

     /**
     * @OA\Post(
     *      path="/api/borrow",
     *      operationId="borrowBook",
     *      tags={"Borrow"},
     *      summary="Borrow a book",
     *      description="Borrow a book from a library",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BorrowBook")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Borrowing")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad request"
     *      )
     * )
     */
    public function borrowBook(BorrowBookRequest $request)
    {
        $borrowing = $this->borrowingService->borrowBook(
            $request->input('student_id'),
            $request->input('copy_id')
        );

        return response()->json($borrowing, 201);
    }

   /**
     * @OA\Post(
     *      path="/api/return/{id}",
     *      operationId="returnBook",
     *      tags={"Borrow"},
     *      summary="Return a book",
     *      description="Return a book to a library",
     *      @OA\Parameter(
     *          name="id",
     *          description="Borrowing ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ReturnBook")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Borrowing")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad request"
     *      )
     * )
     */
    public function returnBook(ReturnBookRequest $request, $id)
    {
        $borrowing = $this->borrowingService->returnBook(
            $id,
            $request->input('return_status')
        );

        return response()->json($borrowing, 200);
    }

     /**
     * @OA\Get(
     *      path="/api/report",
     *      operationId="generateReport",
     *      tags={"Borrow"},
     *      summary="Generate a report",
     *      description="Generate a report of all borrowings",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Borrowing")
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad request"
     *      )
     * )
     */
    public function generateReport()
    {
        $report = $this->borrowingService->generateReport();

        return response()->json($report, 200);
    }
}
