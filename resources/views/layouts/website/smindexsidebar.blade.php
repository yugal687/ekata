<div class="smindex-sidebar">
    <div class="row">
        <div class="col-12 text-center">
            <div class="smindex-sidebar-carousel text-center">
                @foreach( $getCategory as $category)
                    <div>
                        <div class="categories">
                            <figure class="mx-auto">
                                <img src="{{ asset('images/Homepage/Category_images/Layer 7 copy 2.png') }}"
                                     class="img-fluid" alt="">
                            </figure>
                            <h6>{{ $category -> category_name}}</h6>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
