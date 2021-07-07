<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Media\Models\MediaFolder;
use Botble\RealEstate\Forms\InteractiveMapForm;
use Botble\RealEstate\Http\Requests\InteractiveMapRequest;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\InteractiveMap;
use Botble\RealEstate\Repositories\Interfaces\InteractiveMapInterface;
use Botble\RealEstate\Tables\InteractiveMapTable;
use Illuminate\Http\Request;
use Exception;

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
       $data = json_decode(file_get_contents(public_path('map.json')));
        $data = $data->data;
//        $folder = \Botble\Media\Models\MediaFolder::create([
//            'name' => 'Example',
//            'slug' => 'example',
//        ]);
       foreach ($data as $key => $item) {
            InteractiveMap::create([
                'pin_icon' => pathinfo($item->pin_icon)['basename'],
                'latitude' => $item->coordinates->lat,
                'longitude' => $item->coordinates->lng,
                'images' => '',
                'title' => $item->title,
                'description' => $item->description,
                'details_url' => 'contact',
            ]);
//                $interactiveMap = $this->interactiveMapRepository->getModel();
//                $interactiveMap->pin_icon = pathinfo($item->pin_icon)['basename'];
//                $interactiveMap->latitude = $item->coordinates->lat;
//                $interactiveMap->longitude = $item->coordinates->lng;
//                $interactiveMap->images = '';
//                $interactiveMap->title =$item->title;
//                $interactiveMap->description =$item->description;
//                $interactiveMap->details_url = 'contact';
//                $interactiveMap->save();
       }


        //   page_title()->setTitle(trans('plugins/real-estate::interactiveMap.create'));
       // return $formBuilder->create(InteractiveMapForm::class)->renderForm();
    }

    public function store(InteractiveMapRequest $request, BaseHttpResponse $response)
    {
        $images = $request->input('images');
        array_shift($images);

        $request->merge([
            'images'      => json_encode($images),
        ]);

        $interactiveMap = $this->interactiveMapRepository->getModel();
        $interactiveMap = $interactiveMap->fill($request->input());
        $interactiveMap->save();


        return $response
            ->setPreviousUrl(route('interactiveMap.index'))
            ->setNextUrl(route('interactiveMap.edit', $interactiveMap->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit($id, Request $request, FormBuilder $formBuilder)
    {
        $interactiveMap = $this->interactiveMapRepository->findOrFail($id);
        page_title()->setTitle(trans('plugins/real-estate::interactiveMap.edit') . ' " ' . $interactiveMap->name . '"');
        return $formBuilder->create(InteractiveMapForm::class, ['model' => $interactiveMap])->renderForm();
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $interactiveMap = $this->interactiveMapRepository->findOrFail($id);
        $interactiveMap->fill($request->input());
        $images = $request->input('images');
        array_shift($images);
        $interactiveMap->images = json_encode_prettify($images);
        $this->interactiveMapRepository->createOrUpdate($interactiveMap);

        return $response
                ->setPreviousUrl(route('interactiveMap.index'))
                ->setNextUrl(route('interactiveMap.edit', $interactiveMap->id))
                ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $interactiveMap = $this->interactiveMapRepository->findOrFail($id);
            $this->interactiveMapRepository->delete($interactiveMap);
            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                    ->setError()
                    ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $interactiveMap = $this->interactiveMapRepository->findOrFail($id);
            $this->interactiveMapRepository->delete($interactiveMap);
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
