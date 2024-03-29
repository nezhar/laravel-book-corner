<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BookUser
 * @package App\Models
 */
class BookUser extends BaseModel {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'book_user';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'book_id',
	];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * @return BelongsTo
	 */
	public function book(): BelongsTo {
		return $this->belongsTo( Book::class, 'book_id' );
	}

	/**
	 * @return BelongsTo
	 */
	public function user(): BelongsTo {
		return $this->belongsTo( User::class, 'user_id' );
	}

}
