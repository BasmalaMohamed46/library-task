<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Student",
 *     type="object",
 *     title="Student",
 *     description="Student Model",
 *     @OA\Xml(
 *         name="Student"
 *     )
 * )
 */
class Student extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     property="id",
     *     description="The unique identifier of a student",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    private $id;

    /**
     * @OA\Property(
     *     property="name",
     *     description="The name of the student",
     *     type="string",
     *     example="John Doe"
     * )
     */
    public $name;

    /**
     * @OA\Property(
     *     property="email",
     *     description="The email of the student",
     *     type="string",
     *     example="johnDoe@gmail.com",
     *     format="email"
     * )
     */
    public $email;

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

    protected $fillable = ['name', 'email', 'phone'];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
