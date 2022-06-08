@extends('users.layouts.detail')

@section('content')
    <article class='blog-post hentry item-post'>
        <div class='post-header main-post-header'>
            <script type='application/ld+json'>
                {
                    "@context": "http://schema.org",
                    "@type": "BlogPosting",
                    "mainEntityOfPage": {
                        "@type": "WebPage",
                        "@id": "https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html"
                    },
                    "headline": "Lighted environment in contrast to dark furniture",
                    "description": "Lorem Ipsum is simply dummy text of the printing and typesetting  industry. Lorem Ipsum  has been the industry\u0026#39;s standard dummy text eve...",
                    "datePublished": "2018-06-27T15:01:00-07:00",
                    "dateModified": "2021-11-12T19:53:41-08:00",
                    "image": {
                        "@type": "ImageObject",
                        "url": "https://2.bp.blogspot.com/-fjWyqOlKt9U/WzQIBefy_DI/AAAAAAAACOA/CNJZSMjCbNIPxS9bE6Nbof5FTfwt4muEACK4BGAYYCw/w1200-h630-p-k-no-nu/pexels-photo-276583.jpeg",
                        "height": 630,
                        "width": 1200
                    },
                    "publisher": {
                        "@type": "Organization",
                        "name": "Blogger",
                        "logo": {
                            "@type": "ImageObject",
                            "url": "https://lh3.googleusercontent.com/ULB6iBuCeTVvSjjjU1A-O8e9ZpVba6uvyhtiWRti_rBAs9yMYOFBujxriJRZ-A=h60",
                            "width": 206,
                            "height": 60
                        }
                    },
                    "author": {
                        "@type": "Person",
                        "name": "Sora Blogging Tips"
                    }
                }
            </script>
            <script type='application/ld+json'>
                {
                    "@context": "http://schema.org",
                    "@type": "BreadcrumbList",
                    "itemListElement": [{
                        "@type": "ListItem",
                        "position": 1,
                        "item": {
                            "name": "Home",
                            "@id": "https://amalia-templateify.blogspot.com/"
                        }
                    }, {
                        "@type": "ListItem",
                        "position": 2,
                        "item": {
                            "name": "Contrast",
                            "@id": "https://amalia-templateify.blogspot.com/search/label/Contrast"
                        }
                    }, {
                        "@type": "ListItem",
                        "position": 3,
                        "item": {
                            "name": "Lighted environment in contrast to dark furniture",
                            "@id": "https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html"
                        }
                    }]
                }
            </script>

            <a href='/?category={{ $post->category->slug }}'>{{ $post->category->name }}</a>

            <h1 class='post-title'>
                {{ $post->title }}
            </h1>
            <div class='post-meta'>
                <div class='author-picture'>
                    <span class='author-avatar'
                        data-image='//2.bp.blogspot.com/-gpkPtHz0gBk/YXK0ULEF5AI/AAAAAAAAAAQ/cV2tPPMJXQsQcKqnO7-BYd1SIAKAWnGzwCK4BGAYYCw/w30/Sora%2BBlogging%2BTips.jpg'></span>
                </div>
                <span class='post-author'><em>by
                    </em><a href='/?authors={{ $post->author->username }}' target='_blank'
                        title='Sora Blogging Tips'>{{ $post->author->name }}</a></span>
                <time class='post-date published' datetime='2018-06-27T15:01:00-07:00'><em>-&#160;&#160;
                    </em>{{ $post->created_at->diffForHumans() }}</time><em>-&#160;&#160;</em>{{ $post->post_view }}

            </div>
        </div>
        <div id='ad-top'></div>
        <div class='post-body post-content'>
            <div style="text-align: center;"><br /></div>{!! $post->description !!}
        </div>
        <img style="width: 100%" src="{{ asset('storage/' . $post->image) }}" alt="">
        </div>
        <div id='ad-footer'></div>
        <div class='post-footer'>
            <div class='post-labels Label'>
                <span>Tags</span>
                <a class='label-link' href='https://amalia-templateify.blogspot.com/search/label/Contrast'
                    rel='tag'>Contrast</a>
                <a class='label-link' href='https://amalia-templateify.blogspot.com/search/label/Environment'
                    rel='tag'>Environment</a>
                <a class='label-link' href='https://amalia-templateify.blogspot.com/search/label/Furniture'
                    rel='tag'>Furniture</a>
                <a class='label-link' href='https://amalia-templateify.blogspot.com/search/label/Lighted'
                    rel='tag'>Lighted</a>
            </div>
            <div class='post-reactions'>
                <span class='reactions-label'>
                </span>
                <div class='reactions-inner'>
                    <iframe allowtransparency='true' class='reactions-iframe' frameborder='0' name='reactions'
                        scrolling='no' src=''></iframe>
                </div>
            </div>
            <div class='post-share'>
                <ul class='share-links social social-color social-text'>
                    <li class='facebook-f'><a class='facebook window-ify' data-height='650'
                            data-url='https://www.facebook.com/sharer.php?u=https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html'
                            data-width='550' rel='nofollow'></a></li>
                    <li class='twitter'><a class='twitter window-ify' data-height='460'
                            data-url='https://twitter.com/intent/tweet?url=https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html&text=Lighted environment in contrast to dark furniture'
                            data-width='550' rel='nofollow'></a></li>
                    <li class='pinterest-p'><a class='pinterest window-ify' data-height='750'
                            data-url='https://www.pinterest.com/pin/create/button/?url=https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html&media=https://2.bp.blogspot.com/-fjWyqOlKt9U/WzQIBefy_DI/AAAAAAAACOA/CNJZSMjCbNIPxS9bE6Nbof5FTfwt4muEACK4BGAYYCw/s680/pexels-photo-276583.jpeg&description=Lighted environment in contrast to dark furniture'
                            data-width='735' rel='nofollow'></a></li>
                    <li class='linkedin'><a class='linkedin window-ify' data-height='700'
                            data-url='https://www.linkedin.com/shareArticle?url=https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html'
                            data-width='1000' rel='nofollow'></a></li>
                    <li class='whatsapp whatsapp-desktop'><a class='whatsapp window-ify' data-height='550'
                            data-url='https://web.whatsapp.com/send?text=Lighted environment in contrast to dark furniture | https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html'
                            data-width='900' rel='nofollow'></a></li>
                    <li class='whatsapp whatsapp-mobile'><a class='whatsapp'
                            href='https://api.whatsapp.com/send?text=Lighted environment in contrast to dark furniture | https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html'
                            rel='nofollow'></a></li>
                    <li class='email'><a class='email window-ify' data-height='650'
                            data-url='mailto:?subject=Lighted environment in contrast to dark furniture&body=https://amalia-templateify.blogspot.com/2018/06/lighted-environment-in-contrast-to-dark.html'
                            data-width='650' rel='nofollow'></a></li>
                </ul>
            </div>
            <div class='about-author'>
                <div class='avatar-container'>
                    <span class='author-avatar' data-image='//2.bp.blogspot.com/-gpkPtHz0gBk/YXK0ULEF5AI/AAAAAAAAAAQ/cV2tPPMJXQsQcKqnO7-BYd1SIAK
             AWnGzwCK4BGAYYCw/s100-pf/Sora%2BBlogging%2BTips.jpg'></span>
                </div>
                <h3 class='author-name'>
                    <span>Posted by</span><a alt='Sora Blogging Tips'
                        href='https://www.blogger.com/profile/10687789128527805451' target='_blank'>
                        Sora Blogging Tips</a>
                </h3>
                <div class='author-description social'>
                    <span class='description-text'>SoraBloggingTips Is A Site Where You Find Unique And High-Quality
                        Professional Blogger Templates For Free.</span>
                </div>
            </div>

            <div class='post-nav'>
                <a class='blog-pager-newer-link'
                    href='https://amalia-templateify.blogspot.com/2018/06/how-to-choose-right-colors-for-your.html'
                    id='Blog1_blog-pager-newer-link'>
                    Previous Post
                </a>
            </div>
        </div>
    </article>
    <div class='comments'>
        <div class='title'>
            <h3>Post a Comment</h3>
        </div>

        <section class='comments embed no-comments' data-num-comments='0' id='comments'>

            {{-- <h4 name='comments'>Da co ({{count($post->comments)}}) binh luan</h4> --}}

            <div id='Blog1_comments-block-wrapper'>
            </div>
            <div class='footer'>
                <div class='comment-form'>
                    <form action="{{ route('comment', $post->id) }}">
                        @csrf
                        <header class="flex items-center">
                            <img src="https://i.pravatar.cc/60" alt="">
                            <h2 class="ml-4">Want to participate?</h2>
                        </header>

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" cols="" rows="" required></textarea>
                        </div>
                        @error('body')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                        @auth
                            <div style="float: right">
                                <button type="button" data-url="{{ route('comment', $post->id) }}"
                                    class="btn btn-success mt-3 save-comment">send</button>
                            </div>
                        @else
                            <a style="float: right" class="btn btn-success" href="/login">send</a>
                        @endauth
                    </form>
                    <div id="comment">
                        @include('users.home.comment')
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
