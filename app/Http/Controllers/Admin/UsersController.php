<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//使用模型
use App\Models\userss;
//密码加密
use Hash;
//导入表单校验
use App\Http\Requests\UserinsertRequest;

//带入自定义类
use A;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索参数
        $k = $request->input('keyword');
        $ks = $request->input('keywords');

        $data = Userss::where('username','like','%'.$k.'%')->where('email','like','%'.$ks.'%')->paginate(5);
        return view('Admin.User.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->except(['repassword','_token']);
        $data['password'] = Hash::make($data['password']);
        $data['status']=1;
        $data['token']=str_random(50);

        if(Userss::create($data)){
            //设置session  success sesion名字
            return redirect("/adminusers")->with("success","添加成功");
        }else{
            return back()->with("error","添加失败");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //会员详情
    public function show($id)
    {
        //调用关联数据
        $info = Userss::find($id)->info;
        //加载模板
        return view("Admin.User.info",['info'=>$info]);
    }


    //会员收货地址
    public function address($id){
        $address=Userss::find($id)->address;
        return view('Admin.User.address',['address'=>$address]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo $id;
        $data = Userss::find($id);
        return view('Admin.User.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo '修改';
        $data = $request->except(['_token','_method']);
        if(Userss::where('id','=',$id)->update($data)){
            return redirect('/adminusers')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Userss::where('id','=',$id)->delete()){
            return redirect('/adminusers')->with('success','删除成功');
        }else{
            return redirect('/adminusers')->with('success','删除失败');
        }
    }


    //自定义函数a
    public function a(){
        pay();
    }

    //自定义类b
    public function b(){
        $a = new A();
        $a->sends();
    }


    //云之讯调用短息
    public function c(){
        //实例化类A
        
        sendphone(19920140051);
    }

    //支付宝
    public function d(){
        pays(time(),'商品支付','0.01','商品支付');
    }

    public function returnurl(){
        echo '支付OK';
    }
}
