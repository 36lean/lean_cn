<div class="box span10">
    <div class="box-header well" data-original-title>
        <h2>
            <i class="icon-edit">
            </i>
            编辑邮件模板
        </h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="" method="post">
        <input name="id" type="hidden" value="<?php echo $template['id'];?>">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        模板代号
                    </label>
                    <div class="controls">
                        <input name="mail_title" type="text" class="span6" value="<?php echo $template['mail_title'];?>">
                        <p class="help-block">
                            Start typing to activate auto complete!
                        </p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        邮件模板内容
                    </label>
                    <div class="controls">
                        <textarea name="mail_template" class="span10" id="textarea2" rows="10"><?php echo $template['mail_template'];?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        追踪客户邮件查看情况
                    </label>
                    <div class="controls">
                       <input name="mail_spy" type="checkbox" <?php if( $template['mail_spy'] == 1){?>checked<?php }?> />
                        <p class="help-block">
                            会消耗服务器资源
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
</div>
<!--/span-->


