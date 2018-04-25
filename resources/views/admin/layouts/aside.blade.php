<div class="col-md-2">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        系统管理
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('list')}}">用户管理</a> </li>
                        <li class="list-group-item"><a href="{{route('rolelist')}}">角色管理</a> </li>
                        <li class="list-group-item"><a href="#">权限管理</a> </li>
                    </ul>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        文章管理
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

                <ul class="list-group">
                    <li class="list-group-item"><a href="#">创建文章</a> </li>
                    <li class="list-group-item"><a href="{{url("admin/posts")}}">管理文章</a> </li>
                </ul>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        栏目管理
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                <ul class="list-group">
                    <li class="list-group-item"><a href="#">增加栏目</a> </li>
                    <li class="list-group-item"><a href="#">管理栏目</a> </li>
                </ul>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        消息管理
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                <ul class="list-group">
                    <li class="list-group-item"><a href="#">增加消息</a> </li>
                    <li class="list-group-item"><a href="#">管理消息</a> </li>
                </ul>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                        广告管理
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                <ul class="list-group">
                    <li class="list-group-item"><a href="#">增加广告</a> </li>
                    <li class="list-group-item"><a href="#">管理广告</a> </li>
                </ul>

            </div>
        </div>
    </div>
</div>