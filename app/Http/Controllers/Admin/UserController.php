<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    protected $role;

    //đối tượng User này được gán cho thuộc tính $user của lớp UserController, để sử dụng trong các phương thức khác của lớp.
    // $this->user: thuộc tính của lớp UserController, 
    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     */

    //Hàm này là 1 phương thức của class
    public function index()
    {
        //Lấy ds người dùng và phân 1 trang 5 phần tử: $user là biến được lưu trữ, $this->user: object, đối tượng của model "User"
        // Sử dụng thuộc tính $user(được gán User) để truy cập vào danh sách người dùng
        $users = $this->user->latest('id')->paginate(5);
        // trả về một trang, admin.users.index: tên của view muốn hiển thị, compact('users'): mảng
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Khi tạo thì cần có quyền
        $roles = $this->role->all()->groupBy('group');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        //lấy tất cả dữ liệu gửi lên lưu vào biến $dataCreate
        $dataCreate = $request->all();
        //Ma hoa mat khau bằng hàm băm
        $dataCreate['password'] = Hash::make($request->password);
        //lưu hình ảnh và trả về 1 đường dẫn và gán vào $dataCreate['image']
        $dataCreate['image'] = $this->user->saveImage($request);

        $user = $this->user->create($dataCreate);
        $user->images()->create(['url' => $dataCreate['image']]);
        $user->roles()->attach($dataCreate['role_id']);
        return to_route('users.index')->with(['message' => 'Tạo thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->user->findOrFail($id)->load('roles');
        $roles = $this->role->all()->groupBy('group');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $dataUpdate = $request->except('password');
        $user = $this->user->findOrFail($id)->load('roles');
        if($request->password){
            $dataCreate['password'] = Hash::make($request->password);
        }
        $currentImage = $user->images ? $user->images->first()->url  : '';
        $dataUpdate['image'] = $this->user->updateImage($request, $currentImage);

        $user->update($dataUpdate);
        $user->images()->delete();
        $user->images()->create(['url' => $dataUpdate['image']]);
        $user->roles()->sync($dataUpdate['role_id'] ?? []);
        return to_route('users.index')->with(['message' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Tìm user
        $user = $this->user->findOrFail($id)->load('roles');
        $user->images()->delete();
        $imageName = $user->images->count() > 0 ? $user->images->first()->url  : '';
        $this->user->deleteImage($imageName);
        $user->delete();
        return to_route('users.index')->with(['message' => 'Xoá thành công']);
    }
}
