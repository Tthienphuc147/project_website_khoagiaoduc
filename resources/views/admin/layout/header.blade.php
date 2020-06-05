<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST" style="visibility:hidden">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm" />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    {{-- <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="quantity">1</span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>Có 1 thông báo mới</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>Nguyễn Lan đã gửi liên hệ</p>
                                        <span class="date">05/06/2020</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">Xem tất cả</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="/public/admin/images/icon/avt.png" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth::guard('web')->user()->ten_dang_nhap}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="/public/admin/images/icon/avt.png"  />
                                        </a>
                                    </div>

                                </div>
                                <div class="account-dropdown__body">
                                    <!--<div class="account-dropdown__item">-->
                                    <!--    <a href="#">-->
                                    <!--        <i class="zmdi zmdi-account"></i>Thông tin tài khoản</a>-->
                                    <!--</div>-->
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="quantri/dangxuat">
                                        <i class="zmdi zmdi-power"></i>Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
