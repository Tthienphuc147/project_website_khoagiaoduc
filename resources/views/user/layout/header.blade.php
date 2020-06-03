<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-md-block">
                <div class="container">
                     <div class="row d-flex align-items-center justify-content-end">
                            <div class="header-right-btn f-right d-none d-lg-block">
                        <i class="fas fa-search special-tag"></i>
                        <div class="search-box">
                        <form action="#">
                        <input type="text" placeholder="Tìm kiếm">

                       </form>
                        </div>
                       </div>
                         <img src="/public/user/img/icons/1.png" alt="" class="icons-top ml-2">
                         <img src="/public/user/img/icons/2.png" alt="" class="icons-top1">
                     </div>
                </div>
             </div>
            <div class="header-mid d-none d-md-block">
               <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="/public/user/img/2.png" alt=""></a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/"><i class="fas fa-home"></i></a></li>
                                        <li><a href="#">Giới thiệu</a>
                                            <ul class="submenu">
                                                <li><a href="/thong-diep">Thông điệp của khoa</a></li>
                                                <li><a href="/lich-su">Lịch sử hình thành & phát triển</a></li>
                                                <li><a href="/co-cau">Cơ cấu tổ chức</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Tin tức</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_tin_tuc as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Đào tạo</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_dao_tao as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Nghiên cứu khoa học</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_ngkh as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Học liệu</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_hoc_lieu as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Sinh viên</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_sinh_vien as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Hợp tác</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_hop_tac as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Tuyển sinh</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_tuyen_sinh as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Thư viện hình ảnh</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>
