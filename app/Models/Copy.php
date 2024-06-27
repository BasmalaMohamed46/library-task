<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Copy",
 *     type="object",
 *     title="Copy Model",
 *     description="Copy Model",
 *     @OA\Xml(
 *         name="Copy"
 *     )
 * )
 */
class Copy extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     property="id",
     *     description="The unique identifier of a copy",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    private $id;

    /**
     * @OA\Property(
     *     property="book_id",
     *     description="The unique identifier of a book",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    public $book_id;

    /**
     * @OA\Property(
     *     property="status_id",
     *     description="The unique identifier of a status",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    public $status_id;

    /**
     * @OA\Property(
     *     property="created_at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
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
     */
    private $updated_at;

    protected $fillable = ['book_id', 'status_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
