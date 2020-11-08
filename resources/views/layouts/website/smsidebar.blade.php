

<nav class="smsidebar-menu rightActive sidebar-wrapper">
        <i class="fas fa-times text-danger close-menu" style="font-size: 20px; position: absolute; top: 20px; left: 220px"></i>
        <div class="sidebar-menu pt-5">
            <ul class="pt-3">
                @if(count($getCategory)>0)
                @foreach($getCategory as $category)
                <li class="sidebar-dropdown">
                    <a href="{{route('maincategory',[$category->id,$category->category_name])}}">{{$category->category_name}}<span><i class="fas fa-angle-right"></i></span></a>
                    <div class="sidebar-submenu">
                        <ul>
                            @foreach($category->children as $subCategory)
                            <li><a href="{{ route('category',[$subCategory->id,$subCategory->category_name])}}"><i class="fas fa-circle-notch"></i><span> {{$subCategory->category_name}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach
                    @endif
            </ul>
        </div>
    <!-- sidebar-menu  -->

</nav>
