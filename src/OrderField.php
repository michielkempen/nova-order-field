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
        $request = app(NovaRequest::class);

        $resourceClass = $request->resource();

        $this->withMeta(
            $this->getResourcePosition($resource, $resourceClass)
        );

        if($pivot = $this->shouldResolveOnPivot($request, $resourceClass)) {
            $attribute = $resourceClass::modelOrderByFieldAttribute($pivot);

            $this->withMeta([
                'viaResource' => $request->viaResource,
                'viaResourceId' => $request->viaResourceId,
                'viaRelationship' => $request->viaRelationship,
            ]);

            return data_get($pivot, $attribute);
        }

        $attribute = $resourceClass::modelOrderByFieldAttribute($resource);

        return data_get($resource, $attribute);
    }

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  NovaRequest  $request
     * @param  mixed  $resource
     * @return bool|Resource
     */
    protected function shouldResolveOnPivot(NovaRequest $request, $resourceClass)
    {
        if($resourceClass::canQueryPivotOrder() && $pivot = $resourceClass::orderedManyPivotModel($request)) {
            return $pivot;
        }

        return false;
    }

    /**
     * Checks whether the resources is "first" and/or "last" in the IndexQuery
     *
     * @param mixed $resource
     * @param  string  $resourceClass
     * @return void
     */
    protected function getResourcePosition($resource, $resourceClass)
    {
        if(!is_array($resourceClass::$orderedExtrema ?? null)) {
            return ['first' => false, 'last' => false];
        }

        $first = $resourceClass::$orderedExtrema[0] ?? null;
        $last = $resourceClass::$orderedExtrema[1] ?? null;

        return [
            'first' => $first ? ($first->id === $resource->id) : false,
            'last' => $last ? ($last->id === $resource->id) : false,
        ];
    }
}
