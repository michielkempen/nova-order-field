<?php

namespace MichielKempen\NovaOrderField;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\EloquentSortable\Sortable;

trait HasOrderablePivot
{
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

        $query->select(static::newModel()->getTable() . '.*');

        return static::orderedIndexQuery(
            $query,
            $attribute ? $pivot->qualifyColumn($attribute) : null
        );
    }

    /**
     * Get the requested resource relationship
     *
     * @param  NovaRequest  $request
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public static function orderedManyPivotModel(NovaRequest $request)
    {
        if(!$request->viaRelationship()) {
            return;
        }

        $resource = $request->viaResource();

        $relationship = $resource::newModel()->{$request->viaRelationship}();

        if(!$relationship || !$relationship->getPivotClass()) {
            return;
        }

        $pivot = $relationship->getPivotClass();

        if(!($model = new $pivot) instanceof Sortable) {
            return;
        }

        return $model;
    }
}