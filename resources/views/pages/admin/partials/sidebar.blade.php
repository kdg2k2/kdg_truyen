<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <ul class="pcoded-item pcoded-left-item">
                <li class>
                    <a href="/logged" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-bar-chart"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
            </ul>
            <div class="pcoded-navigation-label">Quản lý truyện</div>
            <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="solid"
                subitem-border="false">
                <li class="{{ Str::contains(Request::url(), '/admin/tintuc') ? 'active' : '' }}">
                    <a href="/admin/tacgia-manager" class="waves-effect waves-dark {{ Str::contains(Request::url(), '/admin/tacgia') ? 'active' : '' }}">
                        <span class="pcoded-micon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span class="pcoded-mtext">Tác Giả</span>
                    </a>
                </li>

                <li class="{{ Str::contains(Request::url(), '/admin/theloai') ? 'active' : '' }}">
                    <a href="/admin/theloai-manager" class="waves-effect waves-dark {{ Str::contains(Request::url(), '/admin/theloai') ? 'active' : '' }}">
                        <span class="pcoded-micon">
                            <i class="fa fa-hashtag"></i>
                        </span>
                        <span class="pcoded-mtext">Thể Loại</span>
                    </a>
                </li>

                <li class="{{ Str::contains(Request::url(), '/admin/truyen') ? 'active' : '' }}">
                    <a href="/admin/truyen-manager" class="waves-effect waves-dark {{ Str::contains(Request::url(), '/admin/truyen') ? 'active' : '' }}">
                        <span class="pcoded-micon">
                            <i class="fa fa-book"></i>
                        </span>
                        <span class="pcoded-mtext">Truyện tranh</span>
                    </a>
                </li>

                <li class="{{ Str::contains(Request::url(), '/admin/tap') ? 'active' : '' }}">
                    <a href="/admin/tap-manager" class="waves-effect waves-dark {{ Str::contains(Request::url(), '/admin/tap') ? 'active' : '' }}">
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
                <li class="{{ Str::contains(Request::url(), '/admin/user') ? 'active' : '' }}">
                    <a href="/admin/user-manager" class="waves-effect waves-dark {{ Str::contains(Request::url(), '/admin/user') ? 'active' : '' }}">
                        <span class="pcoded-micon">
                            <i class="fa fa-group"></i>
                        </span>
                        <span class="pcoded-mtext">Tài khoản</span>
                    </a>
                </li>

                <li class="{{ Str::contains(Request::url(), '/admin/report') ? 'active' : '' }}">
                    <a href="/admin/report-manager" class="waves-effect waves-dark {{ Str::contains(Request::url(), '/admin/report') ? 'active' : '' }}">
                        <span class="pcoded-micon">
                            <i class="fa fa-flag"></i>
                        </span>
                        <span class="pcoded-mtext">Báo cáo lỗi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>