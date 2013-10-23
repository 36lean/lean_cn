    <div class="page-header" data-original-title>
        <h4>
            <i class="icon-edit">
            </i>
            创建邮件任务
        </h4>
    </div>


<div class="row-fluid">

    <div class="span6">
        <form class="form-horizontal" action="" method="post">
        <input type="hidden" name="type" value="" />
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        任务代号
                    </label>
                    <div class="controls">
                        <input name="task_title" type="text" class="span12" value="<?php echo date('Y-m-d h:i:s邮件任务')?>">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        发送对象类型
                    </label>
                    <div class="controls">
                        <select name="type">
                            <option selected="selected" value="contact">客户列表</option>
                            <option value="web">网站会员</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">

                    <label class="control-label">用户区域</label>
                    <div class="controls">
                        From <input class="span2" name="page" type="text" value="1" />
                        To <input class="span2" name="offset" type="text" value="100" />
                        
                        <span class="label label-info">参考: 客户总数量<?php echo $sum;?> | 会员总数 <?php echo $sum_members;?></span>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        选择邮件模板
                    </label>
                    <div class="controls">
                        <select class="span12" name="template_id">
                            <?php foreach ($templates as $tp) {
                            ?>
                            <option value=<?php echo $tp['id']?>><?php echo $tp['mail_title']?></option>
                            <?php
                            }?>
                            
                        </select>
                        <p class="help-block">
                            选择一个模板发送给客户
                        </p>
                    </div>                    
                </div>
                <div class="form-actions">
                    <button name="add" type="submit" class="btn btn-primary" value="1">
                        创建客户发送任务
                    </button>
                    <button type="reset" class="btn">
                        Cancel
                    </button>
                </div>
            </fieldset>
        </form>
    </div>

</div>
