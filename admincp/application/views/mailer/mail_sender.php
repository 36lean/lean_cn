<div class="row-fluid">
    <div class="page-header" data-original-title>
        <h4>
            <i class="icon-edit">
            </i>
            创建邮件任务
        </h4>
    </div>

    <div class="">
        <form class="form-horizontal" action="" method="post">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        任务代号
                    </label>
                    <div class="controls">
                        <input name="task_title" type="text" class="span6" value="<?php echo date('Y年m月d日 h时i分 发送的邮件任务')?>">
                    </div>
                </div>
                <div class="control-group">
                <?php 
                    $per = 100;
                ?>
                <input type="hidden" name="offset" value="<?php echo $per;?>">
                    <label class="control-label" for="textarea2">
                        发送客户范围
                    </label>
                    <div class="controls">
                    <?php
                    $times = ceil( $sum / $per) + 1;
                    ?>
                    <select class="span6" name="field">
                    <?php
                    for ( $current = 1 ; $current < $times ; $current++) {
                    ?>
                        <option value="<?php echo $current;?>"><?php echo ($current-1)*$per;?> - <?php echo $current*$per;?></option>
                    <?php
                    }?>
                    </select>
                    
                    <p class="help-block">
                            当前客户总数 <?php echo $sum;?>
                    </p>

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="textarea2">
                        选择邮件模板
                    </label>
                    <div class="controls">
                        <select name="template_id">
                            <?php foreach ($template as $tp) {
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
                    <button name="add" type="submit" class="btn btn-primary">
                        创建模板
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
</div><!--/row-->