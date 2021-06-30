@php
    Theme::set('page', $page)
@endphp
@if ($page->template == 'default')
    <div class="bgheadproject hidden-xs">
        <div class="description">
            <div class="container-fluid w90">
                <h1 class="text-center mt-5 mb-5">{{ $page->name }}</h1>
                {{-- {!! Theme::partial('breadcrumb') !!} --}}
            </div>
        </div>
    </div>
    <div class="container-fluid w90">
        <div class="row">
            <div class="col-sm-12">
                <div class="scontent">
                    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@else
    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, $page->content, $page) !!}
@endif

