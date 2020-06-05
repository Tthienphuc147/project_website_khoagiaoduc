<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
           QUẢN TRỊ WEBSITE
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @if (request()->session()->get('quyen_danh_muc_bai_viet') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Danh mục bài viết</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="quantri/danhmucbaiviet/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="quantri/danhmucbaiviet/themview">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_loai_bai_viet') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Loại bài viết</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="quantri/loaibaiviet/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="quantri/loaibaiviet/themview">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_loai_van_ban') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Loại văn bản</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="quantri/loaivanban/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="quantri/loaivanban/themview">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_loai_media') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Danh Mục Media</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/quantri/loaimedia/danhsach">Danh sách</a>
                            <a href="/quantri/loaimedia/themview">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_media') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Media</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/quantri/media/danhsach">Danh sách</a>
                            <a href="/quantri/media/themview">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_slide') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Slide</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="quantri/slides/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="quantri/slides/themview">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_goc_hoi_dap') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Góc hỏi đáp</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/quantri/gochoidap/hotro">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_tai_khoan') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Tài khoản</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/quantri/quantrivien/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="/quantri/quantrivien/them">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_lich_cong_tac') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Lịch công tác</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/quantri/lichcongtac/danhsach">Danh sách</a>
                        </li>
                        <li>
                            <a href="/quantri/lichcongtac/themview">Thêm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (request()->session()->get('quyen_cau_hinh_website') == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Cấu hình WEBSITE</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/quantri/cauhinh/chinhsua">Chỉnh sửa</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
