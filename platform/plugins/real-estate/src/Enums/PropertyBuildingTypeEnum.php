<?php

namespace Botble\RealEstate\Enums;

use Botble\Base\Supports\Enum;
use Html;

class PropertyBuildingTypeEnum extends Enum
{
    public const FLAT = 'flat';
    public const VILLA = 'villa';
    public const OFFICES = 'offices';
    public const PENTHOUSE = 'penthouse';
    public const DUPLEX = 'duplex';
    public const CHAMBER = 'chamber';
    public const STUDIO = 'studio';
    public const CHALET = 'chalet';
    public const BUILDINGS = 'buildings';
    public const SHOPS = 'shops';
    public const FACTORIES = 'factories';
    public const LAND = 'land';

    public static $langPath = 'plugins/real-estate::property.buildings';

    public function toHtml()
    {
        switch ($this->value) {
            case self::FLAT:
                return self::FLAT()->label();
//                return Html::tag('span', self::NOT_AVAILABLE()->label(), ['class' => 'label-default status-label'])
//                    ->toHtml();
            case self::VILLA:
                return self::VILLA()->label();
//                return Html::tag('span', self::PRE_SALE()->label(), ['class' => 'label-success status-label'])
//                    ->toHtml();
            case self::OFFICES:
                return self::OFFICES()->label();
//                return Html::tag('span', self::SELLING()->label(), ['class' => 'label-success status-label'])
//                    ->toHtml();
            case self::PENTHOUSE:
                return self::PENTHOUSE()->label();
//                return Html::tag('span', self::SOLD()->label(), ['class' => 'label-danger status-label'])
//                    ->toHtml();
            case self::DUPLEX:
                return self::DUPLEX()->label();
//                return Html::tag('span', self::RENTING()->label(), ['class' => 'label-success status-label'])
//                    ->toHtml();
            case self::CHAMBER:
                return self::CHAMBER()->label();
//                return Html::tag('span', self::RENTED()->label(), ['class' => 'label-danger status-label'])
//                    ->toHtml();
            case self::STUDIO:
                return self::STUDIO()->label();
            case self::CHALET:
                return self::CHALET()->label();
            case self::BUILDINGS:
                return self::BUILDINGS()->label();
            case self::SHOPS:
                return self::SHOPS()->label();
            case self::FACTORIES:
                return self::FACTORIES()->label();
            case self::LAND:
                return self::LAND()->label();

            default:
                return null;
        }
    }

}
