
@php
    function dequy($menu, $parent = 0) {
		foreach ($menu as $key => $value) {
          
			if($value->id_parent ==$parent) {
                echo '<li>'.'<a href="/loai-bai-viet/'.$value->id.'">'.$value->ten;
                echo '<ul class="submenu submenu1" style="left: 243px;top: -22px;padding: 2px;">';  
                    $id = $value->id;
                dequy($menu, $id);
                echo '</ul>';
                echo '</a></li>';
               
               
			}
		}
	}
@endphp

<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-md-block">
                <div class="container">
                     <div class="row d-flex align-items-center justify-content-end">
                            <div class="header-right-btn f-right d-none d-lg-block">
                        <i class="fas fa-search special-tag"></i>
                        <div class="search-box">
                        <form action="/tim-kiem" method="POST">
                        @csrf
                        <input name="keyword" type="text" placeholder="Tìm kiếm">

                       </form>
                        </div>
                       </div>
                       <a href="https://www.facebook.com/Li%C3%AAn-chi-%C4%90o%C3%A0n-Gi%C3%A1o-d%E1%BB%A5c-M%E1%BA%A7m-non-Tr%C6%B0%E1%BB%9Dng-%C4%90%E1%BA%A1i-h%E1%BB%8Dc-S%C6%B0-ph%E1%BA%A1m-%C4%90H%C4%90N-168400530464070/" target="_blank"><img src="/public/user/img/icons/1.png" alt="" class="icons-top ml-2"></a>
                         <a href="https://www.youtube.com/channel/UC5UQqeVCSAeVcOPAX-a0oYg " target="_blank"><img src="/public/user/img/icons/2.png" alt="" class="icons-top1"></a>
                     </div>
                </div>
             </div>
            <div class="header-mid d-md-block">
               <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo d-none  d-md-block">
                                <a href="/"><img src="/public/user/img/2.png" alt=""></a>
                            </div>
                            <div class="logo  d-md-none">
                                <a href="/"><img src="/public/user/img/21.png" alt=""></a>
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
                                                <li><a href="/dinh-huong-phat-trien">Định hướng phát triển</a></li>
                                                <li><a href="/muc-tieu">Mục tiêu đào tạo - chuẩn đầu ra</a></li>
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
                                                {{dequy($all_share_danh_muc_dao_tao,0)}}
                                                {{-- @foreach ($all_share_danh_muc_dao_tao as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach --}}
                                            </ul>
                                        </li>
                                        <li><a href="#">Nghiên cứu khoa học</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_ngkh as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                                
                                                <li><a href="http://ued.udn.vn/page/tap-chi-khoa-hoc.html" target="_blank">Tạp chí khoa học</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Học liệu</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_hoc_lieu as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}" >{{$item->ten}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Sinh viên</a>
                                            <ul class="submenu">
                                                @foreach ($all_share_danh_muc_sinh_vien as $item)
                                                <li><a href="/loai-bai-viet/{{$item->id}}">{{$item->ten}}</a></li>
                                                @endforeach
                                                <li><a href="/vanban/b1">Văn bản cho sinh viên</a></li>
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
                                        <li><a href="/thuvien">Thư viện hình ảnh</a>
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
