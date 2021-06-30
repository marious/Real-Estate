<section class="blog-section">
    <div class="container">
        <div class="sec-title">
            <h2>{{ __('Our News') }}</h2>
        </div>
        <news-component url="{{ route('public.ajax.posts') }}"></news-component>
    </div>
</section>
<!-- END SECTION BLOG -->
