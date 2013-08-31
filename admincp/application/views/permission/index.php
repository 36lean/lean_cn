<div class="box-header well" data-original-title>
    <h2><i class="icon-user"></i> 当前后台登陆账户浏览</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
        <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
            <tr>
                <th>
                    UID
                </th>
                <th>
                    用户名
                </th>
                <th>
                    Email
                </th>
                <th>
                    权限
                </th>
                <th>
                    更新时间
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $u) {
            ?>
            <tr>
                <td>
                    <?php echo $u['user_id'];?>
                </td>
                <td>
                    <?php echo $u['username'];?>
                </td>
                <td class="center">
                    <?php echo $u['email'];?>
                </td>
                <td class="center">
                    <?php echo $u['role_name'] ? $u['role_name'] : '未分配';?>
                </td>
                <td class="center">
                    <span class="label label-success">
                        <?php echo date('Y/m/d h:i' , $u['updated_date']);?>
                    </span>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>