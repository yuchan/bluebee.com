<script type="text/javascript">
    function UserController($scope, $http) {
        $http.get('<?php echo Yii::app()->createAbsoluteUrl('bbbackend/user/listUser') ?>').success(function(data) {
            $scope.users = data;
        });
    }
</script>

<h1><center>Quản lý người dùng</center></h1>
<div class="container-fluid" ng-controller="UserController">
    <div class="container">
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Facebook</th>
                    <th>Email</th>
                    <th>Tên hiển thị</th>
                    <th>Ảnh đại diện</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="user in users">
                    <td>{{user.user_id}}</td>
                    <td>{{user.user_id_fb}}</td>
                    <td>{{user.username}}</td>
                    <td>{{user.user_real_name}}</td>
                    <td>
                        <img ng-src="{{user.user_avatar}}" height="120" width="120" class="img-circle"/>
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#{{user.user_id}}">
                            <i class="glyphicon glyphicon-eye-open"></i>

                        </a>
                        <div class="modal fade" id="{{user.user_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Chi tiết người dùng {{user.user_real_name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet">

                                                    <div class="portlet-body form">
                                                        <form role="form" action="<?php echo Yii::app()->createUrl('backend/job/updatejob') ?>" method="POST">
                                                            <input type="hidden" id="job_id" name="job_id" value="" />
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Job Location</label>
                                                                    <input  type="text" class="form-control" id="job_location" placeholder="Job Location"  name="job_location">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Job Salary</label>
                                                                    <input  type="text" class="form-control" id="salary" placeholder="Salary"  name="salary">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Description</label>
                                                                    <input  type="text" class="form-control" id="description" placeholder="Description"  name="description">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Language</label>
                                                                    <select class="form-control" id="language" name="language">
                                                                        <option value = "1">Vietnamese</option>
                                                                        <option value = "2">English</option>
                                                                        <option value = "3">Chinese</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select class="form-control" id="is_active" name="is_active">
                                                                        <option value = "1">Active</option>
                                                                        <option value = "2">Deactive</option>
                                                                        <option value = "3">Pending</option>
                                                                    </select>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Canel</button>
                                                                    <button type="submit" class="btn blue" >Edit</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                        <a>Sửa</a>
                        <a>Xóa</a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->

