<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach( $getCategory as $category)
                <div class="item">
                <a href="{{ route('maincategory',[$category->id,$category->category_name])}}" class="text-dark">
                   <div class="d-flex justify-content-center">
                        <figure class="car-head-bg">
                            <img src="{{ $category->images[0]->name }}" class="head-carousel ml-auto mr-auto img-fluid"
                                alt="">
                        </figure>
                    </div>
                    <h6>
                    {{ $category -> category_name}}
                    
                    </h6>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>



<!-- <div id="owl-demo" class="owl-carousel owl-theme">
          
  <div class="item"><h1>1</h1></div>
  <div class="item"><h1>2</h1></div>
  <div class="item"><h1>3</h1></div>
  <div class="item"><h1>4</h1></div>
  <div class="item"><h1>5</h1></div>
  <div class="item"><h1>6</h1></div>
  <div class="item"><h1>7</h1></div>
  <div class="item"><h1>8</h1></div>
  <div class="item"><h1>9</h1></div>
  <div class="item"><h1>10</h1></div>
  <div class="item"><h1>11</h1></div>
  <div class="item"><h1>12</h1></div>

  <div class="owl-theme">
        <div class="owl-controls">
            <div class="custom-nav owl-nav"></div>
        </div>
  </div>

</div> -->
