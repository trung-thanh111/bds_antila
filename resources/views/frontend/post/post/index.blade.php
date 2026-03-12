@extends('frontend.homepage.layout')
@section('header-class', 'header-inner')
@section('content')

    @php
        $postLang = $post->languages->first()?->pivot;
        $postTitle = $postLang?->name ?? ($post->name ?? '');
        $postDesc = $postLang?->description ?? '';
        $postImage = $post->image ?? asset('images/placeholder-news.jpg');

        $postDate = $post->released_at
            ? \Carbon\Carbon::parse($post->released_at)
            : \Carbon\Carbon::parse($post->created_at);
        $dateFormatted = $postDate->format('d/m/Y');

        $catLang = $postCatalogue->languages->first()?->pivot ?? null;
        $catName = $catLang?->name ?? ($postCatalogue->name ?? 'Bài viết');
        $catUrl = $catLang?->canonical ?? ($postCatalogue->canonical ?? '#');
    @endphp

    <div id="scroll-progress"></div>

    <section class="antila-inner-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="antila-inner-header__content">
            <div class="uk-container uk-container-center">
                <div class="hero-badge hero-badge-light" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:200}">
                    <i class="fa fa-circle"></i> {{ $catName }}
                </div>
                <h1 class="display-title text-white uk-margin-small-top"
                    data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:400}">
                    Chi tiết Bài viết
                </h1>
                <div class="inner-breadcrumb" data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    <span class="separator">/</span>
                    <a href="{{ write_url($catUrl) }}">{{ $catName }}</a>
                    <span class="separator">/</span>
                    <span class="current">{{ \Str::limit($postTitle, 30) }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-section bg-white hp-section-padding">
        <div class="uk-container uk-container-center">
            <div class="hp-post-detail-wrap">
                <article class="hp-post-detail">
                    <div class="hp-post-detail__img" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
                        <img src="{{ asset($postImage) }}" alt="{{ $postTitle }}">
                    </div>

                    <div class="hp-post-detail__header" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:300}">
                        <div class="hp-post-detail__meta">
                            <span class="hp-meta-item"><i class="fa fa-calendar-o"></i> {{ $dateFormatted }}</span>
                            <span class="hp-meta-sep">•</span>
                            <span class="hp-meta-item"><i class="fa fa-folder-open-o"></i> {{ $catName }}</span>
                        </div>
                        <h2 class="hp-post-detail__title">{{ $postTitle }}</h2>
                    </div>

                    <div class="hp-post-detail__content hp-content-entry"
                        data-uk-scrollspy="{cls:'uk-animation-fade', delay:400}">
                        {!! $contentWithToc ?? $postLang?->content !!}
                    </div>
                </article>
            </div>

            <!-- Related Posts Section -->
            @php
                $relatedPosts = $postCatalogue->posts->where('id', '!=', $post->id)->take(3);
            @endphp
            @if ($relatedPosts->count() > 0)
                <div class="hp-related-section">
                    <div class="hp-related-header">
                        <div class="hero-badge hero-badge-dark uk-margin-small-bottom">
                            <i class="fa fa-circle"></i> Khám phá thêm
                        </div>
                        <h2 class="display-title">Bài viết Liên quan</h2>
                    </div>

                    <div class="uk-grid uk-grid-large hp-post-grid" data-uk-grid-margin>
                        @foreach ($relatedPosts as $index => $related)
                            @php
                                $rLang = $related->languages->first()?->pivot;
                                $rTitle = $rLang?->name ?? '';
                                $rUrl = write_url($rLang?->canonical ?? '#');
                                $rImg = !empty($related->image)
                                    ? asset($related->image)
                                    : asset('images/placeholder-news.jpg');
                                $rDate = $related->released_at
                                    ? \Carbon\Carbon::parse($related->released_at)
                                    : \Carbon\Carbon::parse($related->created_at);
                                $rDateFormatted = $rDate->format('d/m/Y');
                            @endphp
                            <div class="uk-width-large-1-3 uk-width-medium-1-2">
                                <article class="hp-post-card"
                                    data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:{{ 200 + $index * 100 }}}">
                                    <div class="hp-post-card__img">
                                        <a href="{{ $rUrl }}">
                                            <img src="{{ $rImg }}" alt="{{ $rTitle }}">
                                        </a>
                                        <div class="hp-post-card__btn">
                                            <a href="{{ $rUrl }}"><i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="hp-post-card__body">
                                        <div class="hp-post-card__meta">
                                            <i class="fa fa-calendar-o" style="margin-right: 5px;"></i>
                                            {{ $rDateFormatted }}
                                        </div>
                                        <h3 class="hp-post-card__title">
                                            <a href="{{ $rUrl }}">{{ Str::limit($rTitle, 60) }}</a>
                                        </h3>
                                        <a href="{{ $rUrl }}" class="btn-readmore">
                                            Đọc thêm <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
