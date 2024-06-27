<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Status",
 *     type="object",
 *     title="Status Model",
 *     description="Status Model",
 *     @OA\Xml(
 *         name="Status"
 *     )
 * )
 */
class Status extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     property="id",
     *     description="The unique identifier of a status",
     *     type="integer",
     *     format="int64",
     *     example="1"
     * )
     */
    private $id;

    /**
     * @OA\Property(
     *     property="name",
     *     description="The name of the status",
     *     type="string",
     *     example="Available"
     * )
     */
    public $name;

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

    protected $fillable = ['name'];

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class, 'return_status_id');
    }
}
