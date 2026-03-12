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
            <div class="uk-grid uk-grid-large" data-uk-grid-margin>
                @if (isset($posts) && count($posts) > 0)
                    @foreach ($posts as $post)
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
                            $publishedAt = !empty($post->released_at)
                                ? \Carbon\Carbon::parse($post->released_at)
                                : \Carbon\Carbon::parse($post->created_at);
                        @endphp
                        <div class="uk-width-large-1-3 uk-width-medium-1-2">
                            <article class="blog-card uk-margin-bottom"
                                data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:{{ 300 + $loop->index * 100 }}}">
                                <div class="blog-img-wrap">
                                    <a href="{{ $postUrl }}">
                                        <img src="{{ $postImage }}" alt="{{ $post->name }}">
                                    </a>
                                </div>
                                <div class="blog-date">
                                    <i class="fa fa-calendar-o"></i> {{ $publishedAt->format('d/m/Y') }}
                                </div>
                                <h3 class="blog-title">
                                    <a href="{{ $postUrl }}">{{ Str::limit($post->name, 65) }}</a>
                                </h3>
                                <a href="{{ $postUrl }}" class="blog-link">
                                    Đọc thêm <span class="blog-link-icon"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </article>
                        </div>
                    @endforeach
                @else
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="uk-width-large-1-3 uk-width-medium-1-2">
                            <article class="blog-card"
                                data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:{{ 300 + $i * 100 }}}">
                                <div class="blog-img-wrap">
                                    <a href="#">
                                        <img src="{{ asset('frontend/resources/img/homely/gallery/' . $i . '.webp') }}"
                                            alt="Mock Blog">
                                    </a>
                                </div>
                                <div class="blog-date">
                                    <i class="fa fa-calendar-o"></i> {{ date('d M, Y') }}
                                </div>
                                <h3 class="blog-title">
                                    <a href="#">Bí quyết thiết kế căn hộ hiện đại tối ưu không gian</a>
                                </h3>
                                <a href="#" class="blog-link">
                                    Đọc thêm <span class="blog-link-icon"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </article>
                        </div>
                    @endfor
                @endif
            </div>
    </section>
@endsection
