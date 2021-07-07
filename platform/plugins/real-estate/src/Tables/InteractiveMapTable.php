<?php


namespace Botble\RealEstate\Tables;

use Botble\RealEstate\Models\Feature;
use Botble\RealEstate\Models\InteractiveMap;
use Botble\RealEstate\Repositories\Interfaces\InteractiveMapInterface;
use Botble\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;

class InteractiveMapTable extends TableAbstract
{
    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * TagTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param InteractiveMapInterface $featureRepository
     */
    public function __construct(
        DataTables $table,
        UrlGenerator $urlGenerator,
        InteractiveMapInterface $interactiveMap
    ) {
        $this->repository = $interactiveMap;
        $this->setOption('id', 'plugins-real-estate-interactiveMap');
        parent::__construct($table, $urlGenerator);
    }

    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                return Html::link(route('interactiveMap.edit', $item->id), $item->title);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('interactiveMap.edit', 'interactiveMap.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function query()
    {
        $model = $this->repository->getModel();
        $select = [
            're_interactive_map.id',
            're_interactive_map.title',
        ];

        $query = $model->select($select);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, $select));
    }

    public function columns()
    {
        return [
            'id'   => [
                'name'  => 're_interactive_map.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 're_interactive_map.title',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
        ];
    }

    public function buttons()
    {
        $buttons = $this->addCreateButton(route('interactiveMap.create'), 'interactiveMap.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, InteractiveMap::class);
    }


    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('interactiveMap.deletes'), 'interactiveMap.destroy',
            parent::bulkActions());
    }


    public function getBulkChanges(): array
    {
        return [
            're_interactive_map' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
        ];
    }
}
