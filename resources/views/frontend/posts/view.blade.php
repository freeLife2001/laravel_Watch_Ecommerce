@extends('layouts.shop')

@section('content')
    <section class="blog-area blog-area-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="blog-col blog-single-col">
                        <div class="blog-img">
                            <img src="{{asset($data['avatar'])}}" alt="">
                            <div class="overlay-top"></div>
                            <div class="blog-info-box blog-info-box-two">
                                <ul>
                                    <li><i class="fa fa-user" aria-hidden="true"></i> <a
                                                href="#">{{$data['user_create']}}</a></li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> <a
                                                href="#">{{date('d/m/Y',strtotime($data['created_at']))}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <h3><a href="#">{{$data['name']}}</a></h3>
                        {!! $data['body'] !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="blog-col blog-sidebar-col">
                        <div class="sidebar-post">
                            <div class="sidebar-title">
                                <h3>Bài Viết Khác</h3>
                            </div>
                            <ul>
                                @if(!empty($post_list))
                                    @foreach($post_list as $item)
                                        <li>
                                            <img src="{{asset($item['avatar'])}}" alt="{{$data['name']}}">
                                            <h4><a href="{{route('post.view',$item['id'])}}">{{$item['name']}}</a></h4>
                                            <p>{{date('d/m/Y',strtotime($item['created_at']))}}</p>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
