<?php

namespace Botble\RealEstate\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class InteractiveMapRequest extends Request
{
    public function rules()
    {
        return [
            'title'             => 'required',
            'description'       => 'required|max:500',
            'price'             => 'numeric|min:0|nullable',
            'latitude'          => 'required',
            'longitude'         => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
