<?php

namespace App\Containers\AppSection\Epresence\UI\API\Requests;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class CheckPresenceRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
        'id_user',
    ];

    protected array $urlParameters = [
        // 'id_user',
        // 'waktu'
    ];

    public function rules(): array
    {
        return [
            'id_user' => ['required', Rule::exists(User::class, 'id')]
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
