<div class="vertical-sidebar-carousel mx-4">
    <div class="row">
        <div class="col-12 text-center">

            <ul class="sidebar-vertical-carousel">

                <li class="blocks-gallery-item">

                    @foreach($getCategory as $category)
                        <figure class="mx-auto">
                            <img src="{{ $category->images[0]->name }}" class="img-fluid" alt="">
                        </figure>
                        <h6 class="mb-3"><a href="{{ route('maincategory',$category->id)}}" class="text-dark">{{$category->category_name}}</a></h6>
                    @endforeach
                </li>

            </ul>
            <div class="row controls rounded-bottom-front" id="customize-controls" aria-label="Carousel Navigation"
                 tabindex="0">
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
