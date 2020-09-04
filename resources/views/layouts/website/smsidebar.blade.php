

<nav class="smsidebar-menu rightActive sidebar-wrapper">
        <div class="sidebar-menu pt-5">
            <ul class="pt-3">
                @foreach($getCategory as $category)
                <li class="sidebar-dropdown">
                    <a href="{{route('maincategory',$category->id)}}">{{$category->category_name}}<span><i class="fas fa-angle-right"></i></span></a>
                    <div class="sidebar-submenu">
                        <ul>
                            @foreach($category->children as $subCategory)
                            <li><a href="{{url('web/category/'.$subCategory->id)}}"><i class="fas fa-circle-notch"></i><span> {{$subCategory->category_name}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    <!-- sidebar-menu  -->

</nav>
