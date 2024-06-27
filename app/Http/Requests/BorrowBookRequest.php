<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     schema="BorrowBook",
 *     type="object",
 *     title="BorrowBook",
 *     description="Request to borrow a book from a library",
 *     required={"student_id", "copy_id"},
 * )
 */
class BorrowBookRequest extends FormRequest
{
    /**
     * @OA\Property(
     *     title="Student ID",
     *     description="The unique identifier of a student",
     *     example="1",
     *     type="integer"
     * )
     *
     * @var int
     */
    public $student_id;

    /**
     * @OA\Property(
     *     title="Copy ID",
     *     description="The unique identifier of a copy",
     *     example="1",
     *     type="integer"
     * )
     *
     * @var int
     */
    public $copy_id;
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'copy_id' => 'required|exists:copies,id',
        ];
    }
}
