//  Mục đích file:  nhận dữ liệu qua form và gửi dữ liệu qua Ajax đến các file PHP để xử lý

//  đường dẫn 
$_DOMAIN = 'http://localhost/musicplayer/admin/';


// Đăng nhập
$('#formSignin button').on('click', function() {
    $this = $('#formSignin button');
    $this.html('Đang tải ...');

    // Gán các giá trị trong các biến
    $user_signin = $('#formSignin #user_signin').val();
    $pass_signin = $('#formSignin #pass_signin').val();

    // Nếu các giá trị rỗng
    if ($user_signin == '' || $pass_signin == '') {
        $('#formSignin .alert').removeClass('hidden');
        $('#formSignin .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Đăng nhập');
    }
    // Ngược lại
    else {
        $.ajax({
            url: $_DOMAIN + 'signin.php',
            type: 'POST',
            data: {
                user_signin: $user_signin,
                pass_signin: $pass_signin
            },
            success: function(data) {
                $('#formSignin .alert').removeClass('hidden');
                $('#formSignin .alert').html(data);
                $this.html('Đăng nhập');
            },
            error: function() {
                $('#formSignin .alert').removeClass('hidden');
                $('#formSignin .alert').html('Không thể đăng nhập vào lúc này, hãy thử lại sau.');
                $this.html('Đăng nhập');
            }
        });
    }
});


//  Tự động tạo slug
//  slug là viết lại đường dẫn url cho dễ nhìn, thân thiện và chuẩn SEO
function ChangeToSlug() {
    var title, slug;
    title = $('.title').val();
    slug = title.toLowerCase();

    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    $('slug').val(slug);
}

$('.slug').on('click', function() {
    ChangeToSlug();
});


//  CHỨC NĂNG UPLOAD ẢNH

// Xem ảnh trước
function preUpImg() {
    img_up = $('#img_up').val();
    count_img_up = $('#img_up').get(0).files.length;
    $('#formUpImg .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
    $('#formUpImg .box-pre-img').removeClass('hidden');

    // Nếu đã chọn ảnh
    if (img_up != '') {
        $('#formUpImg .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
        $('#formUpImg .box-pre-img').removeClass('hidden');
        for (i = 0; i <= count_img_up - 1; i++) {
            $('#formUpImg .box-pre-img').append('<img src="' + URL.createObjectURL(event.target.files[i]) + '" style="border: 1px solid #ddd; width: 50px; height: 50px; margin-right: 5px; margin-bottom: 5px;"/>');
        }
    }
    // Ngược lại chưa chọn ảnh
    else {
        $('#formUpImg .box-pre-img').html('');
        $('#formUpImg .box-pre-img').addClass('hidden');
    }
}

// Nút reset form  hình ảnh
$('#formUpImg button[type=reset]').on('click', function() {
    $('#formUpImg .box-pre-img').html('');
    $('#formUpImg .box-pre-img').addClass('hidden');
});

// Upload hình ảnh
$('#formUpImg').submit(function(e) {
    img_up = $('#img_up').val();
    count_img_up = $('#img_up').get(0).files.length;
    error_size_img = 0;
    error_type_img = 0;
    $('#formUpImg button[type=submit]').html('Đang tải ...');

    // Nếu có chọn ảnh
    if (img_up) {
        e.preventDefault();

        // Kiểm tra dung lượng ảnh
        for (i = 0; i <= count_img_up - 1; i++) {
            size_img_up = $('#img_up')[0].files[i].size;
            if (size_img_up > 5242880) { // 5242880 byte = 5MB 
                error_size_img += 1; // Lỗi
            } else {
                error_size_img += 0; // Không lỗi
            }
        }

        // Kiểm tra định dạng ảnh
        for (i = 0; i <= count_img_up - 1; i++) {
            type_img_up = $('#img_up')[0].files[i].type;
            if (type_img_up == 'image/jpeg' || type_img_up == 'image/png' || type_img_up == 'image/gif') {
                error_type_img += 0;
            } else {
                error_type_img += 1;
            }
        }

        // Nếu lỗi về size ảnh
        if (error_size_img >= 1) {
            $('#formUpImg button[type=submit]').html('Upload');
            $('#formUpImg .alert').removeClass('hidden');
            $('#formUpImg .alert').html('Một trong các tệp đã chọn có dung lượng lớn hơn mức cho phép.');
            // Nếu số lượng ảnh vượt quá 20 file
        } else if (count_img_up > 20) {
            $('#formUpImg button[type=submit]').html('Upload');
            $('#formUpImg .alert').removeClass('hidden');
            $('#formUpImg .alert').html('Số file upload cho mỗi lần vượt quá mức cho phép.');
        } else if (error_type_img >= 1) {
            $('#formUpImg button[type=submit]').html('Upload');
            $('#formUpImg .alert').removeClass('hidden');
            $('#formUpImg .alert').html('Một trong những file ảnh không đúng định dạng cho phép.');
        } else {
            $(this).ajaxSubmit({
                beforeSubmit: function() {
                    target: '#formUpImg .alert',
                    $("#formUpImg .box-progress-bar").removeClass('hidden');
                    $("#formUpImg .progress-bar").width('0%');
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $("#formUpImg .progress-bar").animate({ width: percentComplete + '%' });
                    $("#formUpImg .progress-bar").html(percentComplete + '%');
                },
                success: function(data) {
                    $('#formUpImg button[type=submit]').html('Upload');
                    $('#formUpImg .alert').attr('class', 'alert alert-success');
                    $('#formUpImg .alert').html(data);
                },
                error: function() {
                    $('#formUpImg button[type=submit]').html('Upload');
                    $('#formUpImg .alert').removeClass('hidden');
                    $('#formUpImg .alert').html('Không thể upload hình ảnh vào lúc này, hãy thử lại sau.');
                },
                resetForm: true
            });
            return false;
        }
        // Ngược lại không chọn ảnh
    } else {
        $('#formUpImg button[type=submit]').html('Upload');
        $('#formUpImg .alert').removeClass('hidden');
        $('#formUpImg .alert').html('Vui lòng chọn tệp hình ảnh.');
    }
});


//  CHỨC NĂNG CATEGORIES

// Thêm chuyên mục
$('#formAddCate button').click(function() {
    $this = $('#formAddCate button');
    $this.html('Đang tải ...');

    // Gán các giá trị trong các biến
    $label_add_cate = $('#formAddCate #label_add_cate').val();
    $url_add_cate = $('#formAddCate #url_add_cate').val();
    $url_img_add_cate = $('#formAddCate #url_img_add_cate').val();

    // Nếu các giá trị rỗng
    if ($label_add_cate == '' || $url_add_cate == '' || $url_img_add_cate == '') {
        $('#formAddCate .alert').removeClass('hidden');
        $('#formAddCate .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Tạo');
    }
    // Ngược lại
    else {
        $.ajax({
            url: $_DOMAIN + 'categories.php',
            type: 'POST',
            data: {
                label_add_cate: $label_add_cate,
                url_add_cate: $url_add_cate,
                url_img_add_cate: $url_img_add_cate,
                action: 'add'
            },
            success: function(data) {
                $('#formAddCate .alert').removeClass('hidden');
                $('#formAddCate .alert').html(data);
                $this.html('Tạo');
            },
            error: function() {
                $('#formAddCate .alert').removeClass('hidden');
                $('#formAddCate .alert').html('Không thể tạo chuyên mục vào lúc này, hãy thử lại sau.');
                $this.html('Tạo');
            }
        });
    }
});




//  CHỨC NĂNG SINGERaudio_add_song

$('#formAddSinger button').click(function() {
    $this = $('#formAddSinger button');
    $this.html('Đang tải ...');

    // Gán các giá trị trong các biến
    $label_add_singer = $('#formAddSinger #label_add_singer').val();
    $desc_add_singer = $('#formAddSinger #desc_add_singer').val();
    $url_add_singer = $('#formAddSinger #url_add_singer').val();
    $url_img_add_singer = $('#formAddSinger #url_img_add_singer').val();

    // Nếu các giá trị rỗng
    if ($label_add_singer == '') {
        $('#formAddSinger .alert').removeClass('hidden');
        $('#formAddSinger .alert').html('Vui lòng điền vào tên Ca sĩ.');
        $this.html('Tạo');
    } else if ($desc_add_singer == '') {
        $('#formAddSinger .alert').removeClass('hidden');
        $('#formAddSinger .alert').html('Vui lòng điền vào tên Thông tin ca sĩ.');
        $this.html('Tạo');
    } else if ($url_add_singer == '') {
        $('#formAddSinger .alert').removeClass('hidden');
        $('#formAddSinger .alert').html('Vui lòng điền vào URL.');
        $this.html('Tạo');
    } else if ($url_img_add_singer == '') {
        $('#formAddSinger .alert').removeClass('hidden');
        $('#formAddSinger .alert').html('Vui lòng điền vào URL hình ảnh.');
        $this.html('Tạo');
    }
    // Ngược lại
    else {
        $.ajax({
            url: $_DOMAIN + 'singer.php',
            type: 'POST',
            data: {
                label_add_singer: $label_add_singer,
                desc_add_singer: $desc_add_singer,
                url_add_singer: $url_add_singer,
                url_img_add_singer: $url_img_add_singer,
                action: 'add_singer'
            },
            success: function(data) {
                $('#formAddSinger .alert').removeClass('hidden');
                $('#formAddSinger .alert').html(data);
                $this.html('Tạo');
            },
            error: function() {
                $('#formAddSinger .alert').removeClass('hidden');
                $('#formAddSinger .alert').html('Không thể tạo chuyên mục vào lúc này, hãy thử lại sau.');
                $this.html('Tạo');
            }
        });
    }
});


//  CHỨC NĂNG BÀI HÁT

// Thêm bài hát
$('#formAddSong button').on('click', function() {
    $this = $('#formAddSong button');
    $this.html('Đang tải ...');

    $audio_add_song = $('#formAddSong #audio_add_song').val();
    $title_add_song = $('#formAddSong #title_add_song').val();
    $slug_add_song = $('#formAddSong #slug_add_song').val();
    $singer_add_song = $('#formAddSong #singer_add_song').val();
    $cate_add_song = $('#formAddSong #cate_add_song').val();
    $img_add_song = $('#formAddSong #img_add_song').val();


    if ($audio_add_song == '' || $title_add_song == '' || $slug_add_song == '' || $singer_add_song == '' || $cate_add_song == '' || $img_add_song == '') {
        $('#formAddSong .alert').removeClass('hidden');
        $('#formAddSong .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Tạo');
    } else {
        $.ajax({
            url: $_DOMAIN + 'songs.php',
            type: 'POST',
            data: {
                audio_add_song: $audio_add_song,
                title_add_song: $title_add_song,
                slug_add_song: $slug_add_song,
                singer_add_song: $singer_add_song,
                cate_add_song: $cate_add_song,
                img_add_song: $img_add_song,
                action: 'add_song'
            },
            success: function(data) {
                $('#formAddSong .alert').html(data);
            },
            error: function() {
                $('#formAddSong .alert').removeClass('hidden');
                $('#formAddSong .alert').html('Đã có lỗi xảy ra, hãy thử lại.');
            }
        });
    }
});


//  xem trước file âm thanh trước khi upload
function preUpAudio() {
    audio_up = $('#audio_up').val();
    count_audio_up = $('#audio_up').get(0).files.length;

    $('#formUpAudio .box-pre-audio').html('<p><strong>Audio xem trước</strong></p>');
    $('#formUpAudio .box-pre-audio').removeClass('hidden');

    //  nếu đã chọn file
    if (audio_up != '') {
        $('#formUpAudio .box-pre-audio').html('<p><strong>File âm thanh xem trước</strong></p>');
        $('#formUpAudio .box-pre-audio').removeClass('hidden');
        for (i = 0; i <= count_audio_up; i++) {
            $('#formUpAudio .box-pre-audio').append('<audio controls style="width: 30%; margin-right: 3%; margin-bottom: 5px;"><source src="' +
                URL.createObjectURL(event.target.files[i]) +
                '" /></audio>'
            );
        }
    } else {
        $('#formUpAudio .box-pre-audio').html('');
        $('#formUpAudio .box-pre-audio').addClass('hidden');
    }
}

// Nút reset form  audio
$('#formUpAudio button[type=reset]').click(function() {
    $('#formUpAudio .box-pre-audio').html('');
    $('#formUpAudio .box-pre-audio').addClass('hidden');
});

// Nút upload audio
$('#formUpAudio').submit(function(e) {
    audio_up = $('#audio_up').val();
    count_audio_up = $('#audio_up').get(0).files.length;

    error_size_audio = 0;
    error_type_audio = 0;

    $('#formUpAudio button[type=submit]').html('Đang tải ...');

    // Nếu có chọn ảnh
    if (audio_up) {
        e.preventDefault();

        // Kiểm tra dung lượng ảnh
        for (i = 0; i <= count_audio_up - 1; i++) {
            size_audio_up = $('#audio_up')[0].files[i].size;
            if (size_audio_up > 10485760) { // 10485760 byte = 10MB 
                error_size_audio += 1; // Lỗi
            } else {
                error_size_audio += 0; // Không lỗi
            }
        }

        // Kiểm tra định dạng ảnh
        for (i = 0; i <= count_audio_up - 1; i++) {
            type_audio_up = $('#audio_up')[0].files[i].type;
            if (type_audio_up == 'audio/mpeg') { //mp3 -> mpeg
                error_type_audio += 0; // không lỗi
            } else {
                error_type_audio += 1; // Lỗi
            }
        }

        // Nếu lỗi về size tệp âm thanh
        if (error_size_audio >= 1) {
            $('#formUpAudio button[type=submit]').html('Upload');
            $('#formUpAudio .alert').removeClass('hidden');
            $('#formUpAudio .alert').html('Một trong các tệp đã chọn có dung lượng lớn hơn mức cho phép.');
        }
        // Nếu số lượng tệp âm thanh vượt quá 20 file
        else if (count_audio_up > 10) {
            $('#formUpAudio button[type=submit]').html('Upload');
            $('#formUpAudio .alert').removeClass('hidden');
            $('#formUpAudio .alert').html('Số file upload cho mỗi lần vượt quá mức cho phép.');
        }
        //  nếu không đúng định dạng cho phép
        else if (error_type_audio >= 1) {
            $('#formUpAudio button[type=submit]').html('Upload');
            $('#formUpAudio .alert').removeClass('hidden');
            $('#formUpAudio .alert').html('Định dạng file âm thanh không đúng định dạng cho phép.');
        }
        //  ngược lại, không có lỗi nào về tệp hình ảnh
        else {
            $(this).ajaxSubmit({
                beforeSubmit: function() {
                    target: '#formUpAudio .alert',
                    $("#formUpAudio .box-progress-bar").removeClass('hidden');
                    $("#formUpAudio.progress-bar").width('0%');
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $("#formUpAudio .progress-bar").animate({ width: percentComplete + '%' });
                    $("#formUpAudio .progress-bar").html(percentComplete + '%');
                },
                success: function(data) {
                    $('#formUpAudio button[type=submit]').html('Upload');
                    $('#formUpAudio .alert').attr('class', 'alert alert-success');
                    $('#formUpAudio .alert').html(data);
                },
                error: function() {
                    $('#formUpAudio button[type=submit]').html('Upload');
                    $('#formUpAudio .alert').removeClass('hidden');
                    $('#formUpAudio .alert').html('Không thể upload vào lúc này, hãy thử lại sau.');
                },
                resetForm: true
            });
            return false;
        }
        // Ngược lại không chọn ảnh
    } else {
        $('#formUpAudio button[type=submit]').html('Upload');
        $('#formUpAudio .alert').removeClass('hidden');
        $('#formUpAudio .alert').html('Vui lòng chọn tệp âm thanh.');
    }
});

// Xoá nhiều tệp âm thanh cùng lúc
$('#del_audio_list').click(function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá các file âm thanh đã chọn không?');
    if ($confirm == true) {
        $id_audio = [];

        $('#list_audio input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_audio[i] = $(this).val();
        });

        if ($id_audio.length === 0) {
            alert('Vui lòng chọn ít nhất một file âm thanh.');
        } else {
            $.ajax({
                url: $_DOMAIN + 'audio.php',
                type: 'POST',
                data: {
                    id_audio: $id_audio,
                    action: 'delete_audio_list'
                },
                success: function(data) {
                    location.reload();
                },
                error: function() {
                    alert('Đã có lỗi xảy ra, hãy thử lại.');
                }
            });
        }
    } else {
        return false;
    }
});


// Xoá ảnh chỉ định
$('.del-audio').click(function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá tệp âm thanh này không?');
    if ($confirm == true) {
        $id_audio = $(this).attr('data-id');

        $.ajax({
            url: $_DOMAIN + 'audio.php',
            type: 'POST',
            data: {
                id_audio: $id_audio,
                action: 'delete_audio'
            },
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});


//  CHỨC NĂNG ACCOUNT
// Thêm tài khoản
$('#formAddAcc button').click(function() {
    $username_add_acc = $('#username_add_acc').val();
    $password_add_acc = $('#password_add_acc').val();
    $repassword_add_acc = $('#repassword_add_acc').val();

    if ($username_add_acc == '' || $password_add_acc == '' || $repassword_add_acc == '') {
        $('#formAddAcc .alert').removeClass('hidden');
        $('#formAddAcc .alert').html('Vui lòng điền đầy đủ thông tin.');
    } else {
        $.ajax({
            url: $_DOMAIN + 'accounts.php',
            type: 'POST',
            data: {
                username_add_acc: $username_add_acc,
                password_add_acc: $password_add_acc,
                repassword_add_acc: $repassword_add_acc,
                action: 'add_acc'
            },
            success: function(data) {
                $('#formAddAcc .alert').html(data);
            },
            error: function() {
                $('#formAddAcc .alert').removeClass('hidden');
                $('#formAddAcc .alert').html('Đã có lỗi xảy ra, hãy thử lại.');
            }
        });
    }
});


// Khoá nhiều tài khoản cùng lúc
$('#lock_acc_list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn khoá các tài khoản đã chọn không?');
    if ($confirm == true) {
        $id_acc = [];

        $('#list_acc input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_acc[i] = $(this).val();
        });

        if ($id_acc.length === 0) {
            alert('Vui lòng chọn ít nhất một tài khoản.');
        } else {
            $.ajax({
                url: $_DOMAIN + 'accounts.php',
                type: 'POST',
                data: {
                    id_acc: $id_acc,
                    action: 'lock_acc_list'
                },
                success: function(data) {
                    location.reload();
                },
                error: function() {
                    alert('Đã có lỗi xảy ra, hãy thử lại.');
                }
            });
        }
    } else {
        return false;
    }
});


// Khoá tài khoản chỉ định trong bảng danh sách
$('.lock-acc-list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn khoá tài khoản này không?');
    if ($confirm == true) {
        $id_acc = $(this).attr('data-id');

        $.ajax({
            url: $_DOMAIN + 'accounts.php',
            type: 'POST',
            data: {
                id_acc: $id_acc,
                action: 'lock_acc'
            },
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});


// Mở khoá nhiều tài khoản cùng lúc
$('#unlock_acc_list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn mở khoá các tài khoản đã chọn không?');
    if ($confirm == true) {
        $id_acc = [];

        $('#list_acc input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_acc[i] = $(this).val();
        });

        if ($id_acc.length === 0) {
            alert('Vui lòng chọn ít nhất một tài khoản.');
        } else {
            $.ajax({
                url: $_DOMAIN + 'accounts.php',
                type: 'POST',
                data: {
                    id_acc: $id_acc,
                    action: 'unlock_acc_list'
                },
                success: function(data) {
                    location.reload();
                },
                error: function() {
                    alert('Đã có lỗi xảy ra, hãy thử lại.');
                }
            });
        }
    } else {
        return false;
    }
});


// Mở tài khoản chỉ định trong bảng danh sách
$('.unlock-acc-list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn mở khoá tài khoản này không?');
    if ($confirm == true) {
        $id_acc = $(this).attr('data-id');

        $.ajax({
            url: $_DOMAIN + 'accounts.php',
            type: 'POST',
            data: {
                id_acc: $id_acc,
                action: 'unlock_acc'
            },
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});


// Xoá nhiều tài khoản cùng lúc
$('#del_acc_list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá các tài khoản đã chọn không?');
    if ($confirm == true) {
        $id_acc = [];

        $('#list_acc input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_acc[i] = $(this).val();
        });

        if ($id_acc.length === 0) {
            alert('Vui lòng chọn ít nhất một tài khoản.');
        } else {
            $.ajax({
                url: $_DOMAIN + 'accounts.php',
                type: 'POST',
                data: {
                    id_acc: $id_acc,
                    action: 'del_acc_list'
                },
                success: function(data) {
                    location.reload();
                },
                error: function() {
                    alert('Đã có lỗi xảy ra, hãy thử lại.');
                }
            });
        }
    } else {
        return false;
    }
});


// Xoá tài khoản chỉ định trong bảng danh sách
$('.del-acc-list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?');
    if ($confirm == true) {
        $id_acc = $(this).attr('data-id');

        $.ajax({
            url: $_DOMAIN + 'accounts.php',
            type: 'POST',
            data: {
                id_acc: $id_acc,
                action: 'del_acc'
            },
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});


//  CHỨC NĂNG PROFILE
// Xem ảnh avatar trước
function preUpAvt() {
    img_avt = $('#img_avt').val();
    $('#formUpAvt .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
    $('#formUpAvt .box-pre-img').removeClass('hidden');

    // Nếu đã chọn ảnh
    if (img_avt != '') {
        $('#formUpAvt .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
        $('#formUpAvt .box-pre-img').removeClass('hidden');
        $('#formUpAvt .box-pre-img').append('<img src="' + URL.createObjectURL(event.target.files[0]) + '" style="border: 1px solid #ddd; width: 50px; height: 50px; margin-right: 5px; margin-bottom: 5px;"/>');
    }
    // Ngược lại chưa chọn ảnh
    else {
        $('#formUpAvt .box-pre-img').html('');
        $('#formUpAvt .box-pre-img').addClass('hidden');
    }
}

// Xem ảnh avatar trước
function preUpAvt() {
    img_avt = $('#img_avt').val();
    $('#formUpAvt .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
    $('#formUpAvt .box-pre-img').removeClass('hidden');

    // Nếu đã chọn ảnh
    if (img_avt != '') {
        $('#formUpAvt .box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
        $('#formUpAvt .box-pre-img').removeClass('hidden');
        $('#formUpAvt .box-pre-img').append('<img src="' + URL.createObjectURL(event.target.files[0]) + '" style="border: 1px solid #ddd; width: 50px; height: 50px; margin-right: 5px; margin-bottom: 5px;"/>');
    }
    // Ngược lại chưa chọn ảnh
    else {
        $('#formUpAvt .box-pre-img').html('');
        $('#formUpAvt .box-pre-img').addClass('hidden');
    }
}

// Upload ảnh đại diện
$('#formUpAvt').submit(function(e) {
    img_avt = $('#img_avt').val();
    $('#formUpAvt button[type=submit]').html('Đang tải ...');

    // Nếu có chọn ảnh
    if (img_avt) {
        size_img_avt = $('#img_avt')[0].files[0].size;
        type_img_avt = $('#img_avt')[0].files[0].type;

        e.preventDefault();
        // Nếu lỗi về size ảnh
        if (size_img_avt > 5242880) { // 5242880 byte = 5MB 
            $('#formUpAvt button[type=submit]').html('Upload');
            $('#formUpAvt .alert-danger').removeClass('hidden');
            $('#formUpAvt .alert-danger').html('Tệp đã chọn có dung lượng lớn hơn mức cho phép.');
            // Nếu lỗi về định dạng ảnh
        } else if (type_img_avt != 'image/jpeg' && type_img_avt != 'image/png' && type_img_avt != 'image/gif') {
            $('#formUpAvt button[type=submit]').html('Upload');
            $('#formUpAvt .alert-danger').removeClass('hidden');
            $('#formUpAvt .alert-danger').html('File ảnh không đúng định dạng cho phép.');
        } else {
            $(this).ajaxSubmit({
                beforeSubmit: function() {
                    target: '#formUpAvt .alert-danger',
                    $("#formUpAvt .box-progress-bar").removeClass('hidden');
                    $("#formUpAvt .progress-bar").width('0%');
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $("#formUpAvt .progress-bar").animate({ width: percentComplete + '%' });
                    $("#formUpAvt .progress-bar").html(percentComplete + '%');
                },
                success: function(data) {
                    $('#formUpAvt button[type=submit]').html('Upload');
                    $('#formUpAvt .alert-danger').attr('class', 'alert alert-success');
                    $('#formUpAvt .alert-success').html(data);
                },
                error: function() {
                    $('#formUpAvt button[type=submit]').html('Upload');
                    $('#formUpAvt .alert-danger').removeClass('hidden');
                    $('#formUpAvt .alert-danger').html('Không thể upload hình ảnh vào lúc này, hãy thử lại sau.');
                },
                resetForm: true
            });
            return false;
        }
        // Ngược lại không chọn ảnh
    } else {
        $('#formUpAvt button[type=submit]').html('Upload');
        $('#formUpAvt .alert-danger').removeClass('hidden');
        $('#formUpAvt .alert-danger').html('Vui lòng chọn tệp hình ảnh.');
    }
});

// Xoá ảnh đại diện
$('#del_avt').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá ảnh đại diện này không?');
    if ($confirm == true) {
        $.ajax({
            url: $_DOMAIN + 'profile.php',
            type: 'POST',
            data: {
                action: 'delete_avt'
            },
            success: function() {
                location.reload();
            },
            error: function() {
                alert('Đã có lỗi xảy ra, vui lòng thử lại.');
            }
        });
    } else {
        return false;
    }
});



//CHỨC NĂNGSETTING

// Trạng thái website
$('#formStatusWeb button').on('click', function() {
    $stt_web = $('#formStatusWeb input[name="stt_web"]:radio:checked').val();

    $.ajax({
        url: $_DOMAIN + 'setting.php',
        type: 'POST',
        data: {
            stt_web: $stt_web,
            action: 'stt_web'
        },
        success: function() {
            $('#formStatusWeb .alert').attr('class', 'alert alert-success');
            $('#formStatusWeb .alert').html('Thay đổi thành công.');
            location.reload();
        },
        error: function() {
            $('#formStatusWeb .alert').removeClass('hidden');
            $('#formStatusWeb .alert').html('Đã có lỗi xảy ra, hãy thử lại.');
        }
    });
});

// Cập nhật thông tin khác trong profile
$('#formUpdateInfo button').on('click', function() {
    $('#formUpdateInfo button').html('Đang tải ...');
    $dn_update = $('#dn_update').val();
    $email_update = $('#email_update').val();
    $desc_update = $('#desc_update').val();

    if ($dn_update && $email_update) {
        $.ajax({
            url: $_DOMAIN + 'profile.php',
            type: 'POST',
            data: {
                dn_update: $dn_update,
                email_update: $email_update,
                desc_update: $desc_update,
                action: 'update_info'
            },
            success: function(data) {
                $('#formUpdateInfo .alert').removeClass('hidden');
                $('#formUpdateInfo .alert').html(data);
            },
            error: function() {
                $('#formUpdateInfo .alert').removeClass('hidden');
                $('#formUpdateInfo .alert').html('Đã có lỗi xảy ra, vui lòng thử lại.');
            }
        });
        $('#formUpdateInfo button').html('Lưu thay đổi');
    } else {
        $('#formUpdateInfo button').html('Lưu thay đổi');
        $('#formUpdateInfo .alert').removeClass('hidden');
        $('#formUpdateInfo .alert').html('Vui lòng điền đầy đủ thông tin.');
    }
});

//  dổi mật khẩu dăng nhập
$('#formChangePw button').on('click', function() {
    $('#formChangePw button').html('Đang tải ...');
    $old_pw_change = $('#old_pw_change').val();
    $new_pw_change = $('#new_pw_change').val();
    $re_new_pw_change = $('#re_new_pw_change').val();

    if ($old_pw_change && $new_pw_change && $re_new_pw_change) {
        $.ajax({
            url: $_DOMAIN + 'profile.php',
            type: 'POST',
            data: {
                old_pw_change: $old_pw_change,
                new_pw_change: $new_pw_change,
                re_new_pw_change: $re_new_pw_change,
                action: 'change_pw'
            },
            success: function(data) {
                $('#formChangePw .alert').removeClass('hidden');
                $('#formChangePw .alert').html(data);
            },
            error: function() {
                $('#formChangePw .alert').removeClass('hidden');
                $('#formChangePw .alert').html('Đã có lỗi xảy ra, vui lòng thủ lại.');
            }
        });
        $('#formChangePw button').html('Lưu thay đổi');
    } else {
        $('#formChangePw button').html('Lưu thay đổi');
        $('#formChangePw .alert').removeClass('hidden');
        $('#formChangePw .alert').html('Vui lòng điền đầy đủ thông tin.');
    }
});


// Chỉnh sửa thông tin website
$('#formInfoWeb button').on('click', function() {
    $title_web = $('#title_web').val();
    $descr_web = $('#descr_web').val();
    $keywords_web = $('#keywords_web').val();

    $.ajax({
        url: $_DOMAIN + 'setting.php',
        type: 'POST',
        data: {
            title_web: $title_web,
            descr_web: $descr_web,
            keywords_web: $keywords_web,
            action: 'info_web'
        },
        success: function() {
            $('#formInfoWeb .alert').attr('class', 'alert alert-success');
            $('#formInfoWeb .alert').html('Thay đổi thành công.');
            location.reload();
        },
        error: function() {
            $('#formInfoWeb .alert').removeClass('hidden');
            $('#formInfoWeb .alert').html('Đã có lỗi xảy ra, hãy thử lại.');
        }

    });
});