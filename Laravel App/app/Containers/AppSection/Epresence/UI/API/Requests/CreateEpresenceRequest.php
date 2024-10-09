<?php

namespace App\Containers\AppSection\Epresence\UI\API\Requests;

use App\Containers\AppSection\Epresence\Data\Enums\EpresenceTypeEnums;
use App\Containers\AppSection\Epresence\Rules\EPresenceDateRule;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class CreateEpresenceRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        // 'id',
    ];

    public function rules(): array
    {
        return [
            'type' => ['required',Rule::enum(EpresenceTypeEnums::class)],
            // 'waktu' => 'required|date_format:Y-m-d H:i:s|after_or_equal:today|before:tommorow'
            'waktu' => ['required', 'date_format:Y-m-d H:i:s', new EPresenceDateRule]
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
