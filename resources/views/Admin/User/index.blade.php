@extends("Admin.AdminPublic.publics")
@section("main")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>用户列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      
      <form action="/adminusers" method="get">
       <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>
          用户名关键字:<input type="text" aria-controls="DataTables_Table_1" name="keyword" value="{{$request['keyword'] or ''}}" />
          邮箱:<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}" />
        </label>
        <input type="submit" value="搜索" class="btn btn-success">
       </div>
      </form>
     
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 101px;">ID</th>
        <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 143px;">Name</th>
        <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 132px;">Email</th>
        <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 85px;">Status</th>
        <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">Phone</th>
        <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 60px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($data as $val)
       <tr class="odd"> 
        <td class=" ">{{$val->id}}</td> 
        <td class=" ">{{$val->username}}</td> 
        <td class=" ">{{$val->email}}</td> 
        <td class=" ">{{$val->status}}</td> 
        <td class=" ">{{$val->phone}}</td>
        <td class=" ">
          <a href="/adminusers/{{$val->id}}" class="btn btn-primary" style="padding-left:9px;padding-right:9px;"><i class="icon-business-card"></i></a>
          <a href="/adminaddress/{{$val->id}}" class="btn btn-primary" style="padding-left:10px;padding-right:10px;"><i class="icon-truck"></i></a>
          <a href="/adminusers/{{$val->id}}/edit" class="btn btn-primary" style="padding-left:11px;padding-right:11px;"><i class="icon-pencil-2"></i></a>
          <form action="/adminusers/{{$val->id}}" method="post">
            {{method_field("DELETE")}}
            {{csrf_field()}}
            <button class="btn btn-danger"><i class="icon-trash"></i></button>
          </form>

        </td> 
       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
        {{$data->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","用户列表")