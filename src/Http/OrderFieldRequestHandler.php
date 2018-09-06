<?php

namespace Michielkempen\NovaOrderField\Http;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;

class OrderFieldRequestHandler extends Controller
{
    /**
     * @param  NovaRequest  $request
     */
    public function __invoke(NovaRequest $request)
    {
        $field = $request->newResource()
            ->availableFields($request)
            ->findFieldByAttribute($request->field, function () {
                abort(404);
            });

        $resourceId = $request->get('resourceId');
        $order = $request->get('order');

        $request->findModelOrFail($resourceId)->update([
            $field->attribute => $order
        ]);
    }
}