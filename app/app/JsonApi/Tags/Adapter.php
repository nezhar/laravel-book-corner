<?php

namespace App\JsonApi\Tags;

use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter {

	/**
	 * Mapping of JSON API attribute field names to model keys.
	 *
	 * @var array
	 */
	protected $attributes = [];

	/**
	 * Adapter constructor.
	 *
	 * @param StandardStrategy $paging
	 */
	public function __construct( StandardStrategy $paging ) {
		parent::__construct( new \App\Models\Tag(), $paging );
	}

	/**
	 * @param Builder $query
	 * @param Collection $filters
	 *
	 * @return void
	 */
	protected function filter( $query, Collection $filters ) {
		// TODO
	}

    protected function books() {
        return $this->hasMany();
    }

}
