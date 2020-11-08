<div class="vertical-index-sidebar mx-3">
    <div class="catg-slider">
        @if(count($getCategory)>0)
        @foreach($getCategory as $category)
        <div>
            <figure class="mx-auto">
                <img src="{{ $category->images[0]->name }}" class="img-fluid" alt="">
            </figure>
            <p class="text-center" style="margin-bottom: 0; font-size: 0.85rem">
                <a href="{{ route('maincategory',[$category->id,$category->category_name])}}" class="text-dark">{{$category->category_name}}</a>
            </p>
        </div>
        @endforeach
            @endif
    </div>
    <div class="row controls rounded-bottom-front" id="customize-controls" aria-label="Carousel Navigation"
         tabindex="0">
        <div class="col-12 prev text-center" data-controls="prev" aria-controls="customize" tabindex="-1">
            <i class="fas fa-angle-up fa-5x"></i>
        </div>
        <div class="col-12 next text-center" id="next_btn" data-controls="next" aria-controls="customize" tabindex="-1">
            <i class="fas fa-chevron-down" style="font-size: 5rem;"></i>
            {{--<img src="{{asset('images/Icons/chevron-down-icon.png')}}" class="img-fluid" style="width: 5rem; height: 5rem;" alt="">--}}
        </div>
    </div>
</div>
