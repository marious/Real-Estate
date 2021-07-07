<?php

namespace Botble\RealEstate\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\RealEstate\Forms\Fields\FontawesomeSelectField;
use Botble\RealEstate\Http\Requests\InteractiveMapRequest;
use Botble\RealEstate\Models\InteractiveMap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Exception;
use Storage;

class InteractiveMapForm extends FormAbstract
{
    public function buildForm()
    {
        $pinIcons = [];
        try {
            $path = public_path('storage/pin-icons');
            $pinIcons = File::files($path);
        } catch (Exception $exception) {
        }
//        if ($pinIcons) {
//            echo '<select style="width: 400px;">';
//            foreach ($pinIcons as $icon) {
//                echo '<option style="background-image:url(/storage/pin-icons/'.$icon->getFilename().')"></option>';
//            }
//            echo '</select>';
//        }
//exit;

        $this
            ->setupModel(new InteractiveMap)
            ->setValidatorClass(InteractiveMapRequest::class)
            ->addCustomField('fontawesomeSelect', FontawesomeSelectField::class)
            ->withCustomFields()
            ->add('title', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'textarea', [
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'         => 4,
                    'placeholder'  => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 350,
                ],
            ])
            ->add('details_url', 'text', [
                'label'      => trans('plugins/real-estate::interactiveMap.form.details_url'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('plugins/real-estate::interactiveMap.form.details_url'),
                    'data-counter' => 120,
                ],
            ])
            ->add('rowOpen22', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('latitude', 'number', [
                'label'      => 'Latitude',
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-6',
                ],
                'attr'       => [
//                    'placeholder' => trans('plugins/real-estate::property.form.number_bedroom'),
                ],
                'help_block' => [
                    'text' => '<a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank" rel="nofollow">
Go here to get Latitude from address. </a>'
                ]
            ])
            ->add('longitude', 'number', [
                'label'      => 'Longitude',
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-6',
                ],
                'attr'       => [
//                    'placeholder' => trans('plugins/real-estate::property.form.number_bedroom'),
                ],
                'help_block' => [
                    'text' => '<a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank" rel="nofollow">
Go here to get Longitude from address. </a>'
                ]
            ])
            ->add('rowClose22', 'html', [
                'html' => '</div>',
            ])
            ->add('images[]', 'mediaImages', [
                'label'      => trans('plugins/real-estate::property.form.images'),
                'label_attr' => ['class' => 'control-label'],
                'values' => $this->getModel()->id ? $this->getModel()->images : [],
            ])
            ->addMetaBoxes([
                'Pin Icon' => [
                    'title' => 'Pin Icon',
                    'content' => view('plugins/real-estate::partials.pin-icons',
                        ['pinIcons' => $pinIcons, 'item' => $this->getModel()])->render(),
                    'priority' => 1,
                ]
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
