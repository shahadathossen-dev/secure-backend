<?php

namespace App\Filters;

use EloquentFilter\ModelFilter;

class PackageFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = ['category'];

    /**
     * Searchable columns of the table
     *
     * @var array
     */
    public $searchColumns = ['id', 'name', 'type'];
}
