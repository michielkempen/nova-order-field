<?php

namespace Michielkempen\NovaOrderField;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Http\Requests\NovaRequest;

trait Orderable
{
    /**
     * Build an "index" query for the given resource.
     *
     * @param  NovaRequest  $request
     * @param  Builder  $query
     * @return Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        $query->getQuery()->orders = [];
        return $query->orderBy(static::$defaultOrderField);
    }
}