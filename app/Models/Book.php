<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Book",
 *     type="object",
 *     title="Book Model",
 *     description="Book Model",
 *     @OA\Xml(
 *         name="Book"
 *     )
 * )
 */
class Book extends Model
{
    use HasFactory;
    
    /**
     * @OA\Property(
     *    property="id",
     *    description="The unique identifier of a book",
     *    type="integer",
     *    format="int64",
     *    example="1"
     * )
     */
    private $id;

    /**
     * @OA\Property(
     *    property="title",
     *    description="The title of the book",
     *    type="string",
     *    example="The Great Gatsby"
     * )
     */
    public $title;

    /**
     * @OA\Property(
     *     title="Created at",
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
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    protected $fillable = ['title'];

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }
}
