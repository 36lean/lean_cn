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
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        任务代号
                    </label>
                    <div class="controls">
                        <input name="task_title" type="text" class="span12" value="<?php echo date('Y年m月d日 h时i分 发送的邮件任务')?>">
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
                    <select class="span12" name="field">
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
                    <button name="add" type="submit" class="btn btn-primary">
                        创建客户发送任务
                    </button>
                    <button type="reset" class="btn">
                        Cancel
                    </button>
                </div>
            </fieldset>
        </form>
    </div>


    <div class="span6">
        <div classs="well">
        <form class="form-horizontal" action="" method="post">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        任务代号
                    </label>
                    <div class="controls">
                        <input name="task_title" type="text" class="span12" value="<?php echo date('Y年m月d日 h时i分 发送的邮件任务')?>">
                    </div>
                </div>
                <div class="control-group">
                <?php 
                    $per = 100;
                ?>
                <input type="hidden" name="offset" value="<?php echo $per;?>">
                    <label class="control-label" for="textarea2">
                        发送网站会员范围
                    </label>
                    <div class="controls">
                    <?php
                    $times = ceil( $sum_members / $per) + 1;
                    ?>
                    <select class="span12" name="field">
                    <?php
                    for ( $current = 1 ; $current < $times ; $current++) {
                    ?>
                        <option value="<?php echo $current;?>"><?php echo ($current-1)*$per;?> - <?php echo $current*$per;?></option>
                    <?php
                    }?>
                    </select>
                    
                    <p class="help-block">
                            当前客户总数 <?php echo $sum_members;?>
                    </p>

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
                    <button name="add_web_task" type="submit" class="btn btn-primary" value="1">
                        创建网站会员发送任务
                    </button>
                    <button type="reset" class="btn">
                        Cancel
                    </button>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
</div>
