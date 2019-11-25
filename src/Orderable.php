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
     * Build an "index" query for the given resource.
     *
     * @param  NovaRequest  $request
     * @param  Builder  $query
     * @return Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        $query->getQuery()->orders = [];

        if($pivot = static::orderedManyPivotModel($request)) {
            return static::orderedPivotIndexQuery($request, $query, $pivot);
        }

        return $query->orderBy(static::orderByFieldAttribute($request));
    }

    /**
     * Build an "index" query for the given related resource.
     *
     * @param  NovaRequest  $request
     * @param  Builder  $query
     * @param  \Illuminate\Database\Eloquent\Model  $pivot
     * @return Builder
     */
    public static function orderedPivotIndexQuery(NovaRequest $request, $query, $pivot)
    {
        $attribute = static::modelOrderByFieldAttribute($pivot);

        if(!$attribute) {
            return $query;
        }

        $query->orderBy($pivot->qualifyColumn($attribute));

        return $query;
    }

    /**
     * Get the requested resource relationship
     *
     * @param  NovaRequest  $request
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    protected static function orderedManyPivotModel(NovaRequest $request)
    {
        if(!$request->viaRelationship()) {
            return;
        }

        $resource = $request->viaResource();

        $relation = $resource::newModel()->{$request->viaRelationship}();

        if(!$relation || !$relation->getPivotClass()) {
            return;
        }

        $pivot = $relationship->getPivotClass();

        if(!($model = new $pivot) instanceof Sortable) {
            return;
        }

        return $model;
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