<?php

/**
 * @apiGroup           Epresence
 * @apiName            ListEpresences
 *
 * @api                {GET} /v1/epresences List Epresences
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Epresence\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('epresences', [Controller::class, 'listEpresences'])
    ->middleware(['auth:api']);

