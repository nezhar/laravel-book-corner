<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Category
 * @package App\Models
 */
class Category extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'parent_id',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * @return BelongsToMany
	 */
	public function books(): BelongsToMany {
		return $this->belongsToMany( Book::class );
	}

    /**
     * @return BelongsToMany
     */
    public function books_available(): BelongsToMany {
        return $this->belongsToMany( Book::class )->doesntHave('users');
    }

    /**
     * @return BelongsToMany
     */
    public function books_borrowed(): BelongsToMany {
        return $this->belongsToMany( Book::class )->whereHas('users');
    }
}
