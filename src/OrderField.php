<?php

namespace MichielKempen\NovaOrderField;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class OrderField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'order-field';

    /**
     * @var bool
     */
    public $showOnDetail = false;

    /**
     * @var bool
     */
    public $showOnCreation = false;

    /**
     * @var bool
     */
    public $showOnUpdate = false;

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  mixed  $resource
     * @param  string  $attribute
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $request = resolve(NovaRequest::class);

        if(!is_a($resource, Resource::class)) {
            $resourceClass = $request->resource();
        } else {
            $resourceClass = get_class($resource);
        }

        if($pivot = $this->shouldResolveOnPivot($request, $resourceClass)) {
            return $this->resolvePivotAttribute($pivot, $resourceClass);
        }

        // TODO : first & last should not be computed here because
        // this will perform 2 queries for each line displayed
        // in the Index Table.

        $first = $resource->buildSortQuery()->ordered()->first();
        $last = $resource->buildSortQuery()->ordered('desc')->first();

        $this->withMeta([
            'first' => is_null($first) ? null : $first->id,
            'last' => is_null($last) ? null : $last->id,
        ]);

        return data_get($resource, $attribute);
    }

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  NovaRequest  $request
     * @param  string  $resource
     * @return bool|Resource
     */
    protected function shouldResolveOnPivot(NovaRequest $request, $resource)
    {
        if($resource::canQueryPivotOrder() && $pivot = $resource::orderedManyPivotModel($request)) {
            return $pivot;
        }

        return false;
    }

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  mixed  $pivot
     * @param  string  $resource
     * @return mixed
     */
    protected function resolvePivotAttribute($pivot, $resource)
    {
        // TODO : first & last should not be computed here because
        // this will perform 2 queries for each line displayed
        // in the Index Table.
        // Alos, they don't work correctly on pivots right now.

        $first = $pivot->buildSortQuery()->ordered()->first();
        $last = $pivot->buildSortQuery()->ordered('desc')->first();

        $this->withMeta([
            'first' => is_null($first) ? null : $first->id,
            'last' => is_null($last) ? null : $last->id,
        ]);

        return data_get($pivot, $resource::modelOrderByFieldAttribute($pivot));
    }
}
