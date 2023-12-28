<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $roles = [
            ['name' => 'admin', 'display_name' => 'Quản trị viên', 'group' => 'Hệ thống'],
            ['name' => 'employee', 'display_name' => 'Nhân viên', 'group' => 'Hệ thống'],
            ['name' => 'user', 'display_name' => 'Người dùng', 'group' => 'Hệ thống'],
        ];
        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }

        // $Admin = User::whereEmail('admin@gmail.com')->first();

        // if (!$Admin) {
        //     $Admin = User::factory()->create(['email' => 'admin@gmail.com']);
        // }
        // $Admin->assignRole('admin');



        // Tìm role 'admin'
        $adminRole = Role::where('name', 'admin')->first();

        // Tạo người dùng admin nếu chưa tồn tại
        $admin = User::where('email', 'admin@gmail.com')->first();

        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('namnhalam123'), // Mật khẩu là '1345678'
                'phone' => '0926499280',
            ]);
        }

        // Gán role 'admin' cho người dùng admin nếu role và user tồn tại
        if ($adminRole && $admin) {
            $admin->assignRole($adminRole);

            // Lấy tất cả permissions của role admin
            $adminPermissions = $adminRole->permissions()->pluck('id')->toArray();

            // Gán tất cả các permissions của role admin cho người dùng admin
            if (!empty($adminPermissions)) {
                $admin->syncPermissions($adminPermissions);
            }
        }


        $permissions = [
            ['name' => 'create-user', 'display_name' => 'Tạo người dùng', 'group' => 'Người dùng'],
            ['name' => 'update-user', 'display_name' => 'Cập nhật người dùng', 'group' => 'Người dùng'],
            ['name' => 'show-user', 'display_name' => 'Hiển thị người dùng', 'group' => 'Người dùng'],
            ['name' => 'delete-user', 'display_name' => 'Xóa người dùng', 'group' => 'Người dùng'],

            ['name' => 'create-role', 'display_name' => 'Tạo vai trò', 'group' => 'Vai trò'],
            ['name' => 'update-role', 'display_name' => 'Cập nhật vai trò', 'group' => 'Vai trò'],
            ['name' => 'show-role', 'display_name' => 'Hiển thị vai trò', 'group' => 'Vai trò'],
            ['name' => 'delete-role', 'display_name' => 'Xóa vai trò', 'group' => 'Vai trò'],

            ['name' => 'create-category', 'display_name' => 'Tạo danh mục', 'group' => 'Danh mục'],
            ['name' => 'update-category', 'display_name' => 'Cập nhật danh mục', 'group' => 'Danh mục'],
            ['name' => 'show-category', 'display_name' => 'Hiển thị danh mục', 'group' => 'Danh mục'],
            ['name' => 'delete-category', 'display_name' => 'Xóa danh mục', 'group' => 'Danh mục'],

            ['name' => 'create-product', 'display_name' => 'Tạo sản phẩm', 'group' => 'Sản phẩm'],
            ['name' => 'update-product', 'display_name' => 'Cập nhật sản phẩm', 'group' => 'Sản phẩm'],
            ['name' => 'show-product', 'display_name' => 'Hiển thị sản phẩm', 'group' => 'Sản phẩm'],
            ['name' => 'delete-product', 'display_name' => 'Xóa sản phẩm', 'group' => 'Sản phẩm'],

            ['name' => 'create-coupon', 'display_name' => 'Tạo khuyến mãi', 'group' => 'Khuyến mãi'],
            ['name' => 'update-coupon', 'display_name' => 'Cập nhật khuyến mãi', 'group' => 'Khuyến mãi'],
            ['name' => 'show-coupon', 'display_name' => 'Hiển thị khuyến mãi', 'group' => 'Khuyến mãi'],
            ['name' => 'delete-coupon', 'display_name' => 'Xóa khuyến mãi', 'group' => 'Khuyến mãi'],

            ['name' => 'list-order', 'display_name' => 'Hiển thị danh sách đơn hàng', 'group' => 'Đơn hàng'],
            ['name' => 'update-order-status', 'display_name' => 'Cập nhật trạng thái đơn hàng', 'group' => 'Đơn hàng'],

        ];

        foreach ($permissions as $item) {
            Permission::updateOrCreate($item);
        }
    }
}
