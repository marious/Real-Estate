<?php
namespace Botble\RealEstate\Models;

use Botble\Base\Models\BaseModel;

class InteractiveMap extends BaseModel
{
    protected $table = 're_interactive_map';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'details_url',
        'pin_icon',
        'price',
        'size',
        'latitude',
        'longitude',
        'images',
    ];
}
