<div class="sides-widget-header">
        <h4>أرسل طلبك</h4>
</div>

<div class="sides-widget-body simple-form">
    <form action="{{ route('public.send.consult') }}" method="post" id="consult-form" class="generic-form">
        @csrf
        <input type="hidden" value="{{ $type }}" name="type">
        <input type="hidden" value="{{ $data->id }}" name="data_id">
        <div class="form-group">
            <label>الاسم</label>
            <input type="email" class="form-control" placeholder="الاسم" name="name">
        </div>
        <div class="form-group">
            <label>رقم الهاتف</label>
            <input type="tel" class="form-control" placeholder="رقم الهاتف" name="phone">
        </div>
        <div class="form-group">
            <label>البريد الالكترونى</label>
            <input type="email" class="form-control" placeholder="البريد الالكترونى" name="email">
        </div>
        <div class="form-group">
            <label>الوصف</label>
            <textarea class="form-control" name="content">أنا مهتم بهذه الوحدة</textarea>
        </div>
        @if (setting('enable_captcha') && is_plugin_active('captcha'))
            <div class="form-group">
                {!! Captcha::display([], ['lang' => app()->getLocale()]) !!}
            </div>
        @endif
        <button class="btn btn-black btn-md rounded full-width btn-block" type="submit">إرسال</button>
        <div class="clearfix"></div>
        <br>
        <div class="alert alert-success text-success mt-5" style="display: none;">
            <span></span>
        </div>
        <div class="alert alert-danger text-danger" style="display: none;">
            <span></span>
        </div>
    </form>
</div>
