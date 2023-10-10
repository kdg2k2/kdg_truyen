<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class>
                    <a href="/logged" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Home</span>
                    </a>
                </li>
            </ul>
            <div class="pcoded-navigation-label">Quản lý truyện</div>
            <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="solid"
                subitem-border="false">
                <li class="">
                    <a href="/admin/tacgia-manager" class="waves-effect waves-dark @if(Request()->is('/admin/tacgia/*')) active @endif">
                        <span class="pcoded-micon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span class="pcoded-mtext">Tác Giả</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/theloai-manager" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-hashtag"></i>
                        </span>
                        <span class="pcoded-mtext">Thể Loại</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/truyen-manager" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-book"></i>
                        </span>
                        <span class="pcoded-mtext">Truyện tranh</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/tap-manager" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-tasks"></i>
                        </span>
                        <span class="pcoded-mtext">Chương</span>
                    </a>
                </li>
            </ul>

            <div class="pcoded-navigation-label">Quản lý người dùng</div>
            <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="solid"
                subitem-border="false">
                <li>
                    <a href="/admin/user-manager" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-group"></i>
                        </span>
                        <span class="pcoded-mtext">Tài khoản</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>