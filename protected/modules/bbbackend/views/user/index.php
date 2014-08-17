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
                        <img ng-src="{{user.user_avatar}}" height="120" width="120"/>
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
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
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

