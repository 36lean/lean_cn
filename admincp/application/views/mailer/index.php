<div class="container">
    <?php if( $status === Status::INSERT_SUCCESS) {?>
    <div class="alert alert-success"><i class="icon-info-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>创建成功</div>
    <?php } else if( $status === Status::INSERT_FAIL) {?>
    <div class="alert alert-error"><i class="icon-info-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>创建失败</div>
    <?php }?>
    <div class="page-header" data-original-title>
        <h4>
            <i class="icon-edit">
            </i>
            创建新的邮件模板
        </h4>
    </div>

    <div class="">

        <form class="form-horizontal" action="" method="post">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        模板代号
                    </label>
                    <div class="controls">
                        <input name="mail_title" type="text" class="span6" id="typeahead" data-items="4">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        邮件模板内容
                    </label>
                    <div class="kindeditor">
                        <textarea name="mail_template" class="span10 longtext" id="textarea2" rows="10"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        追踪客户邮件查看情况
                    </label>
                    <div class="controls">
                       <input name="mail_spy" type="checkbox" />
                        <p class="help-block">
                            会消耗服务器资源
                        </p>
                    </div>                    
                </div>
                <div class="form-actions">
                    <button name="add" type="submit" class="btn btn-primary">
                        创建
                    </button>
                    <button type="reset" class="btn">
                        Cancel
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
    
</div>
<!--/span-->


