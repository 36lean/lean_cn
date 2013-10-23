<div class="row-fluid">
  <div class="page-header">
    <h4>
      选择一个任务用于执行
    </h4>
  </div>
  <div class="">
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr>
          <th class="span1">
            ID
          </th>
          <th class="span3">
            任务代号
          </th>
          <th class="span1">
            类型
          </th>

          <th class="span2">
            邮件模板
          </th>

          <th class="span2">
            创建日期
          </th>
          <th class="span2">
            动作
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tasks as $task) { ?>
          <tr>
            <td>
              <?php echo $task[ 'id'];?>
            </td>
            <td>
              <?php echo $task[ 'task_title'];?>
            </td>
            <td>
              <span class="label label-success"><?php echo $task[ 'type'];?></span>
            </td>

            <td>
              <?php echo $task[ 'mail_title']?>
            </td>

            <td class="center">
              <?php echo date( 'Y/m/d h:i:s' , $task[ 'created_date']);?>
            </td>
            <td class="center">
              <a href="<?php echo base_url();?>index.php/mailer/send_information/<?php echo $task['id'];?>">
                详细
              </a>
              <a href="<?php echo base_url();?>index.php/mailer/run_task/<?php echo $task['id'];?>">
                发送
              </a>
              <a href="<?php echo site_url('mailer/del_task/'.$task['id']);?>">
                删除
              </a>
            </td>
          </tr>
          <?php }?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->module('webkit/pagination/show' , array( $offset , $sum) );?>
<!--/span-->