<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     schema="ReturnBook",
 *     type="object",
 *     title="ReturnBook",
 *     description="Request to return a book to a library",
 *     required={"return_status"},
 *     @OA\Property(
 *     property="return_status",
 *     type="string",
 *     description="The status of the book being returned",
 *     example="Good",
 *     )
 * )
 */
class ReturnBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'return_status' => 'required|exists:statuses,name',
        ];
    }
}
