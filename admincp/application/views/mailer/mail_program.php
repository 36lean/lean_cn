<div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>Condensed Table</h2>
                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <th>任务代号</th>
                                      <th>邮件模板</th>
                                      <th>执行状态</th>
                                      <th>创建日期</th>
                                      <th>动作</th>                                          
                                  </tr>
                              </thead>   
                              <tbody>
                                <?php 
                                foreach ($tasks as $task) {
                                ?>
                                <tr>
                                    <td><?php echo $task['task_title'];?></td>
                                    
                                    <th><?php echo $task['mail_title']?></th>
                                    <td class="center">Ready</td>
                                    <td class="center"><?php echo date('Y/m/d h:i:s' , $task['created_date']);?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url();?>index.php/mailer/send_information/<?php echo $task['id'];?>">详细</a>
                                        <a href="<?php echo base_url();?>index.php/mailer/run_task/<?php echo $task['id'];?>">发送</a>
                                    </td>                                       
                                </tr>                                  
                                <?php
                                }?>
                               
                              </tbody>
                         </table>     
                    </div>
                </div><!--/span-->