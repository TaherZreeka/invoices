<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AccountsSeeder extends Seeder
{
    public function run(): void
    {
        // 0️⃣ تنظيف جدول model_has_roles لتجنب تضارب PRIMARY KEY
        DB::table('model_has_roles')->truncate();

        // 1️⃣ إنشاء الأدوار
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        // 2️⃣ إنشاء الصلاحيات
        $permissions = [
            'عرض مستخدم', 'اضافة مستخدم', 'تعديل مستخدم', 'حذف مستخدم',
            'عرض صلاحية', 'اضافة صلاحية', 'تعديل صلاحية', 'حذف صلاحية'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 3️⃣ إعطاء كل الصلاحيات لدور الادمن
        $adminRole->syncPermissions(Permission::all());

        // 4️⃣ إنشاء المستخدمين
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
            ]
        );

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Normal User',
                'password' => Hash::make('password123'),
            ]
        );

        // 5️⃣ إسناد الأدوار مع team_id ثابت لتجنب خطأ NULL
        $admin->assignRole($adminRole, ['team_id' => 1]);
        $user->assignRole($userRole, ['team_id' => 1]);

        $this->command->info('✅ تم إنشاء الحسابات والأدوار بنجاح!');
    }
}