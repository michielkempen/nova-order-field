<?php

namespace Michielkempen\NovaOrderField;

use Laravel\Nova\Fields\Field;

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
        $orderField = $resource->sortable['order_column_name'];

        $first = $resource->newQuery()->orderBy($orderField, 'asc')->first();
        $last = $resource->newQuery()->orderBy($orderField, 'desc')->first();

        $this->withMeta([
            'first' => is_null($first) ? null : $first->id,
            'last' => is_null($last) ? null : $last->id,
        ]);

        return data_get($resource, $attribute);
    }
}
