<?php

namespace MichielKempen\NovaOrderField\Http;

use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\EloquentSortable\Sortable;

class OrderFieldRequestHandler extends Controller
{
    /**
     * Handles incoming "change order" request
     *
     * @param  NovaRequest $request
     * @return void
     */
    public function __invoke(NovaRequest $request)
    {
        $resource = $request->resource();

        if($resource::canQueryPivotOrder() && $resource::orderedManyPivotModel($request)) {
            $relationship = $request->viaRelationship;
            
            $pivot = $request->findParentModelOrFail()
                ->$relationship()
                ->find($request->resourceId)
                ->pivot;

            return $this->move($request->get('direction'), $pivot);
        }

        $this->move(
            $request->get('direction'),
            $request->findModelOrFail()
        );
    }

    /**
     * Handles incoming "change order" request
     *
     * @param  string $direction
     * @param  Model $model
     * @return void
     */
    public function move($direction, Model $model)
    {
        if (!$model instanceof Sortable) {
            abort(500, get_class($model) . ' should implement the ' . Sortable::class . ' interface.');
        }

        if($direction == 'up') {
            return $model->moveOrderUp();
        } 

        $model->moveOrderDown();
    }    
}
