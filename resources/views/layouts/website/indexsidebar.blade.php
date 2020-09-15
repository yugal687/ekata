<div class="vertical-index-sidebar mx-3">
    <div class="catg-slider">
        @foreach($getCategory as $category)
        <div>
            <figure class="mx-auto">
                <img src="{{ $category->images[0]->name }}" class="img-fluid" alt="">
            </figure>
            <p class="text-center" style="margin-bottom: 0;">
                <a href="{{ route('maincategory',$category->id)}}" class="text-dark">{{$category->category_name}}</a>
            </p>
        </div>
        @endforeach
    </div>
    <div class="row controls rounded-bottom-front" id="customize-controls" aria-label="Carousel Navigation"
         tabindex="0">
        <div class="col-12 prev text-center" data-controls="prev" aria-controls="customize" tabindex="-1">
            <i class="fas fa-angle-up fa-5x"></i>
        </div>
        <div class="col-12 next text-center" data-controls="next" aria-controls="customize" tabindex="-1">
            <i class="fas fa-angle-down fa-5x"></i>
        </div>
    </div>
</div>
