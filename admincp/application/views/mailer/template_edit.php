<div class="container">
    <div class="page-header" data-original-title>
        <h4>
            <i class="icon-edit">
            </i>
            编辑邮件模板
        </h4>

    </div>

    <div class="">
        <form class="form-horizontal" action="" method="post">
        <input name="id" type="hidden" value="<?php echo $templates['id'];?>">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        模板代号
                    </label>
                    <div class="controls">
                        <input name="mail_title" type="text" class="span6" value="<?php echo $templates['mail_title'];?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        邮件模板内容
                    </label>
                    <div class="controls">
                        <textarea class="kindeditor" name="mail_template" class="span10" id="textarea2" rows="10"><?php echo $templates['mail_template'];?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        追踪客户邮件查看情况
                    </label>
                    <div class="controls">
                       <input name="mail_spy" type="checkbox" <?php if( $templates['mail_spy'] == 1){?>checked<?php }?> />
                        <p class="help-block">
                            会消耗服务器资源
                        </p>
                    </div>                    
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        是否启用
                    </label>
                    <div class="controls">
                       <input name="using" type="checkbox" <?php if( $templates['using'] == 1){?>checked<?php }?> />
                        <p class="help-block">
                            启用这个模板 (不勾选则不会出现在发送的下拉栏)
                        </p>
                    </div>                    
                </div>
                <div class="form-actions">
                    <button name="update" type="submit" class="btn btn-primary">
                        更新
                    </button>
                    <button type="reset" class="btn">
                        Cancel
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
<!--/span-->


