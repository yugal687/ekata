<div class="vertical-sidebar-carousel mx-4">
    <div class="row">
        <div class="col-12 text-center">

            <ul class="sidebar-vertical-carousel">

                <li class="blocks-gallery-item">

                        @foreach($getCategory as $category)
                        <figure class="mx-auto">
                        <img src="{{ asset('images/Homepage/Category_images/Layer 7 copy 2.png') }}" class="img-fluid" alt="">
                    </figure>
                    <h6>{{$category->category_name}}</h6>
                            @endforeach
                </li>

            </ul>
            <div class="row controls rounded-bottom-front" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
                <div class="col-12 prev" data-controls="prev" aria-controls="customize" tabindex="-1">
                    <i class="fas fa-angle-up fa-5x"></i>
                </div>
                <div class="col-12 next" data-controls="next" aria-controls="customize" tabindex="-1">
                    <i class="fas fa-angle-down fa-5x"></i>
                </div>
            </div>

        </div>
    </div>
</div>
