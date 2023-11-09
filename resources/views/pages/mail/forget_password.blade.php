<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h2 style="color: #000">Xin chào {{ $user->username }}</h2>
        <p style="color: #000">Click vào link bên dưới để đặt lại mật khẩu của bạn!</p>
        <p style="color: red">Chú ý: Đường link xác nhận chỉ có hiệu lực 3 phút</p>
        <p>
            <a href="{{ url('/forget-mail/'. $user->id .'/'. $user->token ) }}" style="display: inline-block;
                background-color: rgb(49,98,72);
                color: #fff;
                padding: 7px 25px;
                font-weight: bold;
                text-decoration: none;
                border-radius: 10px;">Tới trang đổi mật khẩu</a>
        </p>
    </div>
</div>