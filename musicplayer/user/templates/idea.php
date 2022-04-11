<?php
    /*
        chủ đề: web nghe và tải nhạc

        đối tượng hướng tới: 
            tuổi: 15 - 30
            có thiết bị điện tử và có thể truy cập web

        mục đích:
            sở thích cá nhân
            chia sẻ sở thích với m.n

        chức năng sẽ có:
            User:
                nghe trực tiếp
                lời bài + cảm âm
                tải về
                tìm kiếm:
                    nhập: tên ca sĩ, tên bài hát, khu vực
                    tự chọn: tên ca sĩ, tên bài hát, khu vực
                gợi ý tự động theo bài đang nghe:
                    gợi ý theo cá sĩ (các bài của ca sĩ đó)
                    gợi ý theo các bài hát hot nhất cùng khu vực, thể loại nhạc
                    gợi ý 10 bài hát theo ngày (chọn ngẫu nhiên)
                đăng nhập, đăng kí, đăng xuất
                lưu bài hát, ca sĩ yêu thích (nếu đã đăng nhập)
                thông báo bài hát mới của ca sĩ yêu thích (nếu đã đăng kí)
                top:
                    bài hát đang được nghe trên web nhiều nhất
                    ca sĩ được tìm và nghe nhiều nhất
                trang cá nhân user tự quản lý (nếu đã đăng ký)
                    đổi mật khẩu, tên hiển thị, avatar
                    thêm/ xóa bài hát/ ca sĩ yêu thích
                    xóa tài khoản (nếu k dùng nữa)
            Admin:
                thêm/ xóa/ sửa bài hát, ca sĩ, khu vực, lời bài hát, cảm âm
                thống kê:
                    bài hát
                        tổng bài hát
                        tổng bài hát theo từng thể loại
                        tổng dung lượng
                    ca sĩ
                        tổng số ca sĩ
                        tổng ca sĩ nam, tổng ca sĩ nữ
                    thể loại
                        tổng thể loại
                    tài khoản
                        tổng tài khoản
                    dowloaded
                        tổng số bài hát được tải về
                        tên bài hát được tải về nhiều nhất
                        tổng dung lượng đã tải về
                    khu vực
                        tổng số khu vực
                mở/ đóng trang web (có cho hoạt động hay không)

        database: musicplayer
            accounts       -   dữ liệu người dùng
                id_acc      -   id tài khoản
                username    -   tên đăng nhập
                password    -   mật khẩu
                display_name    -   tên hiển thị
                position    -   cấp bậc: 0 - admin, 1 - người dùng
                status      -   trạng thái: 0 - mở, 1 - khóa
                url_avatar_acc  -   đường dẫn ảnh đại diện
            songs       -   dữ liệu bài hát
                id_song     -   id bài hát
                categories  -   thể laoji của bài hát
                name_song   -   tên bài hát
                name_singer -   tên ca sĩ
                lyrics      -   lời bài hát
                times       -   dộ dài thời gian bài hát
                date_release    -   ngày phát hành
                url_avatar_song -   đường dẫn ảnh nền bài hát
                datetime    -   ngày đăng bài hát
            categories  -   dữ liệu thể loại nhạc
                id_cate     -   id thể loại
                name_cate   -   tên thể loại
                date_update -   ngày cập nhật lần cuối theo bài hát được thêm
                url         -   đường dẫn thể loại
                url_avatar_cate  -   đường dẫn ảng nền thể loại
            singers     -   dữ liệu ca sĩ
                id_singer   -   id ca sĩ
                name_singer -   tên ca sĩ
                description -   giới thiệu đôi chút về ca sĩ
                interested  -   số người quan tâm đến (chỉ tính ng đã đăng kí)
                url_avatar_singer  -   ảnh avatar ca sĩ
            downloaded  -   dữ liệu bài hát đã tải
                id_down     -   id bài đã tải
                id_song     -   id bài hát đc tải
                id_singer   -   id ca sĩ có bài hát đc tải
    */

    /*
        Thông tin các file
        .htaccess
            -   hypertext access
            =   lcos ở các thư mục gốc của hosting
            -   do apache quản lý, cấp quyền
            -   có thể dùng để;
                -   điều khiển, cấu hình được nhiều các thông số
                -   thay đổi các giá trị được set mặc định của âpche
    */
?>