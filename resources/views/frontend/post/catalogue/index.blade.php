@extends('frontend.homepage.layout')

@section('header-class', 'header-inner')
@section('content')
    <div id="scroll-progress"></div>

    <section class="antila-inner-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="antila-inner-header__content">
            <div class="uk-container uk-container-center">
                <div class="hero-badge hero-badge-light" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:200}">
                    <i class="fa fa-circle"></i> Tin tức & Sự kiện
                </div>
                <h1 class="display-title text-white" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:400}">
                    @if (isset($postCatalogue) && $postCatalogue && $postCatalogue->parent_id != 0)
                        {{ $postCatalogue->languages->first()->pivot->name ?? 'Bài viết' }}
                    @else
                        Bài Viết
                    @endif
                </h1>
                <div class="inner-breadcrumb" data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    <span class="separator">/</span>
                    <span class="current">
                        @if (isset($postCatalogue) && $postCatalogue && $postCatalogue->parent_id != 0)
                            {{ $postCatalogue->languages->first()->pivot->name ?? 'Tin tức' }}
                        @else
                            Tin tức
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-section bg-white hp-section-padding">
        <div class="uk-container uk-container-center">
            @if (!empty($posts) && $posts->count() > 0)
                <div class="hp-post-grid">
                    @foreach ($posts as $index => $post)
                        @php
                            $postImage = !empty($post->image)
                                ? asset($post->image)
                                : asset('images/placeholder-news.jpg');
                            $postUrl = !empty($post->canonical)
                                ? url(
                                    rtrim($post->canonical, '/') .
                                        (str_ends_with($post->canonical, '.html') ? '' : '.html'),
                                )
                                : '#';
                            $postName = $post->name ?? 'Untitled';
                            $publishedAt = !empty($post->released_at)
                                ? \Carbon\Carbon::parse($post->released_at)
                                : \Carbon\Carbon::parse($post->created_at);
                            $dateFormatted = $publishedAt->format('d/m/Y');

                            $categoryName = '';
                            if ($post->post_catalogues->count() > 0) {
                                $cat = $post->post_catalogues->first();
                                $categoryName = $cat->languages->first()->pivot->name ?? '';
                            }
                        @endphp
                        <article class="hp-post-card" data-reveal="up">
                            <div class="hp-post-card__img blog-img-wrap">
                                <a href="{{ $postUrl }}">
                                    <img src="{{ $postImage }}" alt="{{ $postName }}" loading="lazy">
                                </a>
                                <div class="hp-post-card__btn">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </div>
                            <div class="hp-post-card__body">
                                <div class="hp-post-card__meta">
                                    <i class="fa fa-calendar-check-o"></i> {{ $dateFormatted }}
                                </div>
                                <h3 class="hp-post-card__title">
                                    <a href="{{ $postUrl }}">{{ $postName }}</a>
                                </h3>

                                <div class="hp-post-card__footer">
                                    <a href="{{ $postUrl }}" class="btn-readmore">
                                        Đọc thêm
                                        <span class="btn-readmore__icon">
                                            <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($posts->hasPages())
                    <div class="uk-margin-large-top">
                        {{ $posts->links('frontend.component.pagination') }}
                    </div>
                @endif
            @else
                <div class="hp-empty-state uk-text-center">
                    <p>Không tìm thấy bài viết nào trong chuyên mục này.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
