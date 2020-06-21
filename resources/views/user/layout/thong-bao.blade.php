<div class="trending-tittle w-100">
    <strong>Thông báo mới</strong>
    <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
    <div class="trending-animated">
        <ul id="js-news" class="js-hidden">
            @foreach ($thong_bao_noi_bat as $item)
            <li class="news-item p-2">
                @if ($item->created_at && (($now-strtotime($item->created_at))/(60 * 60 * 24)) <=3)
                <img src="/public/user/img/newpost.gif" alt="" class="mr-1 pb-2" width="40px" height="40px">
                @endif
                <a href="/bai-viet/a{{$item->id}}" class="pb-2" title="{{$item->tieu_de}}"
                @if ($item->created_at && (($now-strtotime($item->created_at))/(60 * 60 * 24)) <=3)
                    style="color:red"
                @endif>
                    {{$item->tieu_de}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

</div>
