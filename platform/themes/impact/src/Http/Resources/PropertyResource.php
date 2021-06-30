<?php
namespace Theme\Impact\Http\Resources;

use Botble\RealEstate\Enums\PropertyTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use RvMedia;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $price = format_price($this->price, $this->currency, false);

        if ($this->type == PropertyTypeEnum::RENT) {
            $price .= ' / ' . Str::lower($this->period->label());
        }

        return [
            'id'              => 'maker-' . $this->id,
            'name'            => $this->name,
            'url'             => $this->url,
            'description'     => $this->description,
            'image'           => $this->image ? RvMedia::getImageUrl($this->image, 'small', false,
                RvMedia::getDefaultImage()) : null,
            'price'           => $price,
            'location'        => $this->city->name . ', ' . $this->city->state->name,
            'number_bedroom'  => $this->number_bedroom,
            'number_bathroom' => $this->number_bathroom,
            'square'          => $this->square,
            'type'            => $this->type,
            'period'          => $this->period,
            'status_html'     => $this->status->toHtml(),
            'latitude'  => $this->latitude,
            'longitude'  => $this->longitude,
        ];
    }
}
