<?php

namespace Michielkempen\NovaOrderField\Http;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\EloquentSortable\Sortable;

class OrderFieldRequestHandler extends Controller
{
    /**
     * @param  NovaRequest $request
     */
    public function __invoke(NovaRequest $request)
    {
        $resourceId = $request->get('resourceId');
        $model = $request->findModelOrFail($resourceId);

        if (!$model instanceof Sortable) {
            abort(500);
        }

        $direction = $request->get('direction');

        if($direction == 'up') {
            $model->moveOrderUp();
        } else {
            $model->moveOrderDown();
        }
    }
}