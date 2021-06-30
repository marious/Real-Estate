<?php

namespace Botble\RealEstate\Enums;

use Botble\Base\Supports\Enum;
use Html;

/**
 * @method static PropertyTypeEnum SALE()
 * @method static PropertyTypeEnum RENT()
 */
class PropertyTypeEnum extends Enum
{
    public const SALE = 'sale';
    public const RENT = 'rent';
    public const RESALE = 'resale';

    /**
     * @var string
     */
    public static $langPath = 'plugins/real-estate::property.types';

    /**
     * @return string
     */
    public function toHtml()
    {
        switch ($this->value) {
            case self::SALE:
                return self::SALE()->label();
//                return Html::tag('li', self::SALE()->label(), ['class' => 'label-success status-label'])
//                    ->toHtml();
            case self::RENT:
                return self::RENT()->label();
//                return Html::tag('li', self::RENT()->label(), ['class' => 'label-info status-label'])
//                    ->toHtml();
            case self::RESALE:
                return self::RESALE()->label();
            default:
                return null;
        }
    }
}
