@extends('Admin.AdminPublic.publics')

@section('main')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加用户</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 

    <form class="mws-form" method="post" action="/adminusers">

      @if(count($errors)>0)
        <div class="mws-form-message error">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif
     <div class="mws-form-inline">  
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="medium" name="username" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="medium" name="password" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">确认密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="medium" name="repassword" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱</label> 
       <div class="mws-form-item"> 
        <input type="text" class="medium" name="email" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">电话</label> 
       <div class="mws-form-item"> 
        <input type="text" class="medium" name="phone" /> 
       </div> 
      </div>     
      
     </div> 
     <div class="mws-button-row">
      {{csrf_field()}} 
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form>

   </div> 
  </div>
 </body>
</html>
@endsection

@section('title','用户添加')