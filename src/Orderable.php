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

        if($relationship = static::orderedManyRelationship($request)) {
            return static::orderedPivotIndexQuery($request, $query, $relationship);
        }

        return $query->orderBy(static::orderByFieldAttribute($request));
    }

    /**
     * Build an "index" query for the given related resource.
     *
     * @param  NovaRequest  $request
     * @param  Builder  $query
     * @param  \Illuminate\Database\Eloquent\Relations\Relation  $relationship
     * @return Builder
     */
    public static function orderedPivotIndexQuery(NovaRequest $request, $query, $relationship)
    {
        $pivot = $relationship->getPivotClass();

        $pivot = new $pivot;

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
     * @return null|\Illuminate\Database\Eloquent\Relations\Relation
     */
    protected static function orderedManyRelationship(NovaRequest $request)
    {
        if(!$request->viaRelationship()) {
            return;
        }

        $resource = $request->viaResource();

        $relation = $resource::newModel()->{$request->viaRelationship}();

        if(!$relation || !$relation->getPivotClass()) {
            return;
        }

        return $relation;
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