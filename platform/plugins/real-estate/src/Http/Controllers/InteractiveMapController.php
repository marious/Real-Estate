<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\RealEstate\Forms\InteractiveMapForm;
use Botble\RealEstate\Repositories\Interfaces\InteractiveMapInterface;
use Botble\RealEstate\Tables\InteractiveMapTable;

class InteractiveMapController extends BaseController
{

    protected $interactiveMapRepository;

    public function __construct(InteractiveMapInterface $interactiveMapRepository)
    {
        $this->interactiveMapRepository = $interactiveMapRepository;
    }

    public function index(InteractiveMapTable $table)
    {
        page_title()->setTitle(trans('plugins/real-estate::interactiveMap.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/real-estate::interactiveMap.create'));
        return $formBuilder->create(InteractiveMapForm::class)->renderForm();
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }

    public function deletes()
    {

    }
}
