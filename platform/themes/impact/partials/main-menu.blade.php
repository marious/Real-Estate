<ul {!! $options !!}}>
    @foreach ($menu_nodes as $key => $row)
        <li>
            <a  href="{{ url($row->url) }}" target="{{ $row->target }}" title="{{ $row->title }}">
                {{ $row->title }}
                @if ($row->active) <span class="sr-only">(current)</span> @endif
            </a>
        </li>
    @endforeach
        <li class="d-none d-xl-none d-block d-lg-block"><a href="{{ route('public.account.login') }}" title="تسجيل الدخول">تسجيل الدخول</a></li>
        <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 border-bottom-0">
            <a href="{{ route('public.account.login') }}" title="إعلن مجانا" class="button border btn-lg btn-block text-center">إعلن مجانا<i class="fas fa-laptop-house ml-2"></i></a>
        </li>

</ul>
