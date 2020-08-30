<div id="accordion" class="px-3 pt-4 pb-2">
    <ul>
        @foreach($getCategory as $category)
            <li class="main-li">
                <h3>
                    <span class="icon-dashboard"></span>
                    <a href="{{route('maincategory',$category->id)}}">{{$category->category_name}}</a>
                    <i id="dropdown" class="fas fa-angle-down pl-3"></i>
                </h3>
                <ul>
                    @foreach($category->children as $subCategory)
                        <li class=""><a
                                href="{{url('web/category/'.$subCategory->id)}}">{{$subCategory->category_name}}</a>
                        </li>
                    @endforeach
                </ul>

            </li>
        @endforeach
    <!-- we will keep this LI open by default -->
    </ul>
</div>

<main id="special-filters">
    <div class="row">
        <div class="mx-auto">
            <p>
                <a href="#">Clearance Items</a>
            </p>
            <p>
                <a href="#">Special Items</a>
            </p>
            <p>
                <a href="#">Best Selling Items</a>
            </p>
            <p>
                <a href="#">New Arrival Items</a>
            </p>
        </div>
    </div>
</main>
