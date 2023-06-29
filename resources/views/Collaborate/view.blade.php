@extends('layouts.master')
@section('title') Portfolio @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') ERGOSUMDEUS @endslot
        @slot('title') Collaborate @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class=" d-flex align-items-center mb-4">
                <h5 class="card-title pb-1 mb-0 flex-grow-1 text-decoration-underline">Portfolio Details</h5>
                <div class="flex-shrink-0">
                     <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                 </div>
                <div>
                    <a href="{{url('admin/edit_portfolio/'.$portfolio['id'])}}" class="btn btn-primary "><i class="ri-edit-box-line  align-bottom me-1"></i> Edit</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if(count($images) != 0){?>
                                <div class="swiper default-swiper rounded">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($images as $value){?>
                                        <div class="swiper-slide">
                                            <img src="{{ URL::asset('thumbnail/'.$value) }}" alt="" class="img-fluid" />
                                        </div>
                                            <?php } ?>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                    <h2 class="text-center mt-1">No Image Found !</h2>
                                    <hr>
                                <?php } ?>

                                @if(count($features) != 0)
                                <ul class="list-group mb-4 mt-4 ms-2">
                                <h5 class="text-center">Features</h5>
                                @foreach ($features as $value)
                                    <li class="list-group-item"><i class="mdi mdi-check-bold align-middle lh-1 me-2"></i>{{$value}}</li>
                                @endforeach
                                </ul>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">{{$portfolio['title']}}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-2">{!!$portfolio['content']!!}</p>                                    
                                    <p class="card-text"><small class="text-muted"><?php echo \Carbon\Carbon::parse($portfolio['created_at'])->format('d F,Y');?></small></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->
    </div><!-- end row -->

    @endsection
    @section('script')
        <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/card.init.js') }}"></script>
        <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
        <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/swiper.init.js') }}"></script>

        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
