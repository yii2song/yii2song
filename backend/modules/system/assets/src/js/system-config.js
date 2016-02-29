/**
 * Created by song on 2016/1/21.
 * 系统配置中心
 */
$(function() {
    var $form = $('#J_formSystemConfig');

    $form.submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 0) {
                    toastr['success'](data.message, "操作成功");
                } else {
                    toastr['error'](data.message, "操作失败");
                }
            },
            error: function() {
                toastr['error']('服务器请求出错！', "请求失败");
            }
        });
    });
});