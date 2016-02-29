$(function() {

    /**
     * 加载数据
     * @param $listId
     */
    function loadListData($listId)
    {
        var $box = $('#J_appMenuList' + $listId);
        setButtonStatus($box, 'loading');
        setSpinner($box);
        $.ajax({
            url: '/system/app-menu/menu-list-data?app_id=' + $box.data('app_id') + '&column=' +
                $box.data('column') + '&parent_id=' + $box.data('parent_id'),
            type: 'get',
            dataType: 'json',
            success: function(data) {
                if (data.length>0) {
                    $box.html(parseDataToHtml(data));
                    $box.find('.sortable').sortable();
                    $box.find('li:first-child').trigger('click');
                } else {
                    setNoData($box);
                    triggerLoad($listId, $box.data('parent_id'));
                }
                setButtonStatus($box, 'loaded');
            }
        });
    }

    /**
     * 设置事件
     * @param $listId
     */
    function initListBox($listId) {
        var $box = $('#J_appMenuList' + $listId);
        $box.slimScroll({
            height: '500px',
            size: '5px',
            railVisible: false,
            alwaysVisible: true
        });
        $box.on('reload', function() {
            loadListData($listId);
        });
        $box.on('click', 'li', function() {
            $box.find('li').removeClass('active');
            $(this).addClass('active');

            triggerLoad($listId, $(this).data('id'));
        });
    }

    /**
     * 触发事件
     * @param $listId
     * @param $parentId
     */
    function triggerLoad($listId, $parentId) {
        $nextBox = $('#J_appMenuList' + ($listId +1));
        if ($nextBox.length > 0) {
            $nextBox.data('parent_id', $parentId);
            $nextBox.trigger('reload');
        }
    }

    initListBox(1);
    initListBox(2);
    initListBox(3);
    initListBox(4);

    loadListData(1);

    /**
     * 操作按钮添加事件
     */
    $('#J_appMenuForm').on('click', '.action-footer .btn', function() {
        var $box = $('#J_appMenuList' + $(this).data('cid'));
        var parentId = $box.data('parent_id');
        var menuId = $box.find('li.active').data('id');
        var column = $(this).data('column');
        if ($(this).is('.action-new')) {
            executeActionNew($(this), column, parentId);
        } else if ($(this).is('.action-sort')) {
            executeActionSort($(this), column, parentId);
        } else if ($(this).is('.action-edit')) {
            executeActionEdit($(this), column, menuId);
        } else if ($(this).is('.action-del')) {
            showDeleteConfirm($(this), column, menuId);
        } else if ($(this).is('.action-icon')) {
            executeActionIcon($(this), column, menuId);
        }
    });

    var appMenuModal = $('#J_appMenuModal');
    var appMenuIconModal = $('#J_appMenuIconModal');
    var appMenuModalForm = $('#J_appMenuModalForm');
    var appMenuConfirmModal = $('#J_appMenuConfirmModal');
    appMenuIconModal.on('show.bs.modal', function (e) {
        $(this).find('.modal-dialog').width($(window).width()-120).height($(window).height()-120);
        $(this).find('.modal-body').height($(window).height()-230);
        $(this).find('.panel-body').height($(window).height()-265);
    }).on('hide.bs.modal', function(e) {

    });
    appMenuIconModal.on('click', '.fa-item', function() {
        appMenuIconModal.find('.fa-item').removeClass('active');
        $(this).addClass('active');
    });
    appMenuIconModal.find('button[type=submit]').on('click', function() {
        var icon = appMenuIconModal.find('.fa-item.active');
        if (icon.length > 0) {
            icon = icon.data('class');
            $('#J_menuId' + appMenuIconModal.data('menu-id')).find('i').removeClass().addClass(icon);
            $.ajax({
                url: '/system/app-menu/icon',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    id: appMenuIconModal.data('menu-id'),
                    icon: icon
                },
                success: function(data) {
                    toastr['success']("图标设置成功！", "操作成功");
                }
            });
        }
        appMenuIconModal.modal('hide');
    });
    appMenuConfirmModal.find('button[type=submit]').on('click', function() {
        var menuId = appMenuConfirmModal.data('menu-id');
        if (menuId) {
            executeActionDel(menuId);
        }
    });

    appMenuModalForm.submit(function(e) {
        e.preventDefault();
        var yiiData = $(this).data('yiiActiveForm');
        if (!yiiData['validated']) return false;
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                if (data['data']['_csrf']) {
                    yii.setCsrfToken('_csrf', data['data']['_csrf']);
                    yii.refreshCsrfToken();
                }
                if (data.status == 0) {
                    toastr['success'](data['message'], "操作成功");
                    var targetMenuLi = $('#J_menuId' + $('#J_appMenuFormId').val());
                    var iClass = targetMenuLi.find('i').attr('class');
                    targetMenuLi.html('<i class="' + iClass + '"></i>' + $('#app-menu-form-name').val());
                    if (!appMenuModalForm.find('#J_appMenuFormId').val()) {
                        loadListData(appMenuModal.data('cid'));
                    }
                    appMenuModal.modal('hide');
                } else {
                    toastr['error'](data['message'], "操作失败");
                }
            },
            error: function() {
                toastr['error']('网络错误，请稍候再试！', "操作失败");
                appMenuModal.modal('hide');
            }
        });
    });

    /**
     * 新建菜单
     * @param btn
     * @param column
     * @param parentId
     */
    function executeActionNew(btn, column, parentId)
    {
        appMenuModal.find('form')[0].reset();
        appMenuModal.find('#J_appMenuFormId').val('');
        appMenuModal.find('.modal-title').text('新增菜单');
        appMenuModal.find('#J_appMenuFormColumn').val(column);
        appMenuModal.find('#J_appMenuFormParentId').val(parentId);
        appMenuModal.data('cid', btn.data('cid'));
        appMenuModal.modal('show');
    }

    /**
     * 保存排序
     * @param btn
     * @param column
     * @param parentId
     */
    function executeActionSort(btn, column, parentId) {
        var $box = $('#J_appMenuList' + $(btn).data('cid'));
        $ids = $box.find('li').map(function () {
            return $(this).data('id');
        }).get().join(',');
        $.ajax({
            url: '/system/app-menu/order?ids=' + $ids,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                toastr['success']("排序保存成功！", "操作成功");
            }
        });

    }

    /**
     * 编辑菜单
     * @param btn
     * @param column
     * @param menuId
     */
    function executeActionEdit(btn, column, menuId)
    {
        appMenuModal.find('form')[0].reset();
        appMenuModal.find('.modal-title').text('编辑菜单');
        appMenuModal.find('#J_appMenuFormColumn').val(column);
        appMenuModal.find('#J_appMenuFormId').val(menuId);
        $.ajax({
            url: '/system/app-menu/menu-detail-data?id=' + menuId,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                var form = appMenuModalForm;
                form.find('input[name="app-menu-form[name]"]').val(data['name']);
                form.find('input[name="app-menu-form[url]"]').val(data['url']);
                form.find('textarea[name="app-menu-form[description]"]').val(data['description']);
                form.find('textarea[name="app-menu-form[param]"]').val(data['param']);
                form.find('input[name="app-menu-form[module]"]').val(data['module']);
                form.find('input[name="app-menu-form[controller]"]').val(data['controller']);
                form.find('input[name="app-menu-form[action]"]').val(data['action']);
                form.find('input[name="app-menu-form[node]"]').val(data['node']);
                form.find('input[name="app-menu-form[method]"]').val(data['method']);
                form.find('select[name="app-menu-form[is_button]"]').val(data['is_button']);
                form.find('select[name="app-menu-form[is_show]"]').val(data['is_show']);
                form.find('select[name="app-menu-form[status]"]').val(data['status']);
                form.find('input[name="app-menu-form[id]"]').val(data['id']);
                form.find('input[name="app-menu-form[app_id]"]').val(data['app_id']);
                form.find('input[name="app-menu-form[parent_id]"]').val(data['parent_id']);
                form.find('input[name="app-menu-form[column]"]').val(data['column']);
            }
        });
        appMenuModal.modal('show');
    }

    /**
     * 图标选择
     * @param btn
     * @param column
     * @param menuId
     */
    function executeActionIcon(btn, column, menuId)
    {
        appMenuIconModal.data('menu-id', menuId);
        appMenuIconModal.modal('show');
    }

    /**
     * 显示删除确认对话框
     * @param btn
     * @param column
     * @param menuId
     * @returns {boolean}
     */
    function showDeleteConfirm(btn, column, menuId)
    {
        if (!menuId) {
            return false;
        }
        appMenuConfirmModal.data('menu-id', menuId);
        appMenuConfirmModal.data('cid', btn.data('cid'));
        appMenuConfirmModal.find('.modal-body').text('确认要删除菜单 “' + $.trim($('#J_menuId' + menuId).text()) + '” 吗？');
        appMenuConfirmModal.modal('show');
    }

    /**
     * 删除菜单
     * @param menuId
     */
    function executeActionDel(menuId)
    {
        $.ajax({
            url: '/system/app-menu/delete?id=' + menuId,
            type: 'POST',
            dataType: 'JSON',
            headers: {
                _csrf : $('meta[name=csrf-token]').attr('content')
            },
            success: function(data) {
                if (data['data']['_csrf']) {
                    yii.setCsrfToken('_csrf', data['data']['_csrf']);
                    yii.refreshCsrfToken();
                }
                if (data.status == 0) {
                    toastr['success'](data['message'], "操作成功");
                    loadListData(appMenuConfirmModal.data('cid'));
                } else {
                    toastr['error'](data['message'], "操作失败");
                }
                appMenuConfirmModal.modal('hide');
            },
            error: function() {
                toastr['error']('网络错误，请稍候再试！', "操作失败");
                appMenuConfirmModal.modal('hide');
            }
        });
    }

    /**************公用函数**************/

    /**
     * 解析数据为HTML
     * @param data
     * @returns {string}
     */
    function parseDataToHtml(data)
    {
        var $output = '<ul class="sortable">';
        $output += $(data).map(function(index) {
            var $this = this;
            var $tmp = '<li id="J_menuId' + $this['id'] + '" data-id="' + $this['id'] +
                '" data-parent-id="' + $this['parent_id'] +
                '" data-column="' + $this['column'] + '">';
            $tmp += '<i class="' + $this['icon'] + '"></i> ';
            $tmp += $this['name'];
            $tmp += '</li>';
            return $tmp;
        }).get().join('');
        $output += '</ul>';
        return $output;
    }

    /**
     * 调控按钮状态
     * @param obj
     * @param status
     */
    function setButtonStatus(obj, status) {
        var $box = $('#' + $(obj).attr('id') + 'Panel .panel-footer');
        if ('loading' == status) {
            $box.find('.btn.action-new').addClass('disabled');
            $box.find('.btn.action-sort').addClass('disabled');
            $box.find('.btn.action-edit').addClass('disabled');
            $box.find('.btn.action-del').addClass('disabled');
        } else if ('loaded' == status) {
            $box.find('.btn.action-new').removeClass('disabled');
            $box.find('.btn.action-sort').removeClass('disabled');
            $box.find('.btn.action-edit').removeClass('disabled');
            $box.find('.btn.action-del').removeClass('disabled');
        }
    }

    /**
     * 设置加载样式
     * @param obj
     */
    function setSpinner(obj) {
        $(obj).html('<div class="sk-spinner sk-spinner-three-bounce">' +
            '<div class="sk-bounce1"></div>' +
            '<div class="sk-bounce2"></div>' +
            '<div class="sk-bounce3"></div>' +
            '</div>');
    }

    /**
     * 设置无数据样式
     * @param obj
     */
    function setNoData(obj) {
        $(obj).html('<div class="no-data">暂无数据</div>');
    }
});