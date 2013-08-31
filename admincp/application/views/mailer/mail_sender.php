<div class="box span12">
    <div class="box-header well" data-original-title>
        <h2>
            <i class="icon-edit">
            </i>
            创建邮件任务
        </h2>
        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
        </div>
    </div>

    <div class="box-content">
        <form class="form-horizontal" action="" method="post">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">
                        任务代号
                    </label>
                    <div class="controls">
                        <input name="task_title" type="text" class="span6" id="typeahead" data-items="4">
                        <p class="help-block">
                            Start typing to activate auto complete!
                        </p>
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
                    <select name="field">
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
</div><!--/row-->