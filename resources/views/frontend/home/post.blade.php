@extends('layouts.shop')

@section('content')
    <!-- Main charts -->
    <!-- Main Slider -->

    <section class="men-shopping">
        <div class="container">
            <div class="row">
                @if(count($product_list)>0)
                    <div class="col-md-12">
                        @include('layouts.flash_message')
                        <h4>Tổng số: {{count($product_list)}} bài viết</h4>
                    </div>
                    @foreach($product_list as $item)
                        <div class="col-md-4 col-sm-4">
                            <div class="blog-col">
                                <div class="blog-img">
                                    <img src="{{asset($item['avatar'])}}" alt="{{$item['name']}}">
                                    <div class="date">
                                        <p>{{date('d/m/Y H:i:s',strtotime($item['created_at']))}}</p>
                                    </div>
                                    <div class="overlay-top"></div>
                                    <div class="blog-info-box">
                                        <ul>
                                            <li><i class="fa fa-user" aria-hidden="true"></i> <a
                                                        href="#">{{$item['user_create']}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3><a href="{{route('post.view',$item['id'])}}">{{$item['name']}}</a></h3>
                                {!!$item['summary']  !!}
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>Không có bài viết cần tìm !</h4>
                @endif
            </div>
        </div>
        <!-- Pagination -->
        <div class="page-pagination">
            {{ $product_list->links() }}
        </div>
    </section>

    @include('layouts.separator')
@endsection
