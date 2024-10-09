<?php

/**
 * @apiGroup           Epresence
 * @apiName            UpdateEpresence
 *
 * @api                {PATCH} /v1/epresences/:id Update Epresence
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

Route::patch('epresences/{id}', [Controller::class,'updateEpresence'])
    ->middleware(['auth:api','role:'.config('appSection-authorization.admin_role')]);

