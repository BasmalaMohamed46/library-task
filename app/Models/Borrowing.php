<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Borrowing",
 *     type="object",
 *     title="Borrowing Model",
 *     description="Borrowing Model",
 *     @OA\Xml(
 *         name="Borrowing"
 *     )
 * )
 */
class Borrowing extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     property="id",
     *     description="The unique identifier of a borrowing",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    private $id;

    /**
     * @OA\Property(
     *     property="student_id",
     *     description="The unique identifier of a student",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    public $student_id;

    /**
     * @OA\Property(
     *     property="copy_id",
     *     description="The unique identifier of a copy",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    public $copy_id;

    /**
     * @OA\Property(
     *     property="borrowed_at",
     *     description="The date and time the book was borrowed",
     *     type="string",
     *     format="date",
     *     example="2020-01-27"
     * )
     */
    public $borrowed_at;

    /**
     * @OA\Property(
     *     property="expected_return_at",
     *     description="The date and time the book is expected to be returned",
     *     type="string",
     *     format="date",
     *     example="2020-01-27"
     * )
     */
    public $expected_return_at;

    /**
     * @OA\Property(
     *     property="returned_at",
     *     description="The date and time the book was returned",
     *     type="string",
     *     format="datetime",
     *     example="2020-01-27"
     * )
     */
    public $returned_at;

    /**
     * @OA\Property(
     *     property="return_status_id",
     *     description="The unique identifier of the return status",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    public $return_status_id;

    /**
     * @OA\Property(
     *     property="created_at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     property="updated_at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    protected $fillable = [
        'student_id', 'copy_id', 'borrowed_at', 
        'expected_return_at', 'returned_at', 'return_status_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function copy()
    {
        return $this->belongsTo(Copy::class);
    }

    public function returnStatus()
    {
        return $this->belongsTo(Status::class, 'return_status_id');
    }
}
