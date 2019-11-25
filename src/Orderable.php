<?php

namespace MichielKempen\NovaOrderField;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\EloquentSortable\Sortable;

trait Orderable
{
    /**
     * The user-defined OrderFieldAttribute
     *
     * @var string
     */
    public static $defaultOrderField;

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

        if(static::canQueryPivotOrder() && $pivot = static::orderedManyPivotModel($request)) {
            return static::orderedPivotIndexQuery($request, $query, $pivot);
        }

        return $query->orderBy(static::orderByFieldAttribute($request));
    }

    /**
     * Find the orderByField for current request
     *
     * @param  NovaRequest  $request
     * @return string
     */
    public static function canQueryPivotOrder()
    {
        return method_exists(static::class, 'orderedManyPivotModel')
            && method_exists(static::class, 'orderedPivotIndexQuery');
    }

    /**
     * Find the orderByField for current request
     *
     * @param  NovaRequest  $request
     * @return string
     */
    public static function orderByFieldAttribute(NovaRequest $request)
    {
        return static::$defaultOrderField
            ?? static::modelOrderByFieldAttribute(static::newModel());
    }

    /**
     * Extract the order_column_name from a Sortable Model
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return null|string
     */
    protected static function modelOrderByFieldAttribute($model)
    {
        if (!$model instanceof Sortable) {
            abort(500, get_class($model) . ' should implement the ' . Sortable::class . ' interface.');
        }

        return $model->sortable['order_column_name'] ?? null;
    }
}