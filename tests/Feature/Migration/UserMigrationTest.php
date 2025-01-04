<?php

namespace Tests\Feature\Migration;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;


class UserMigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Kiểm tra bảng `users` được tạo đúng cách.
     */
    public function test_users_table_is_created()
    {
        $this->assertTrue(Schema::hasTable('users'), 'The users table does not exist.');
    }

    /**
     * Test: Kiểm tra các cột trong bảng `users`.
     */
    public function test_users_table_has_expected_columns()
    {
        $columns = ['id', 'firstname', 'lastname', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

        foreach ($columns as $column) {
            $this->assertTrue(
                Schema::hasColumn('users', $column),
                "The column {$column} is missing in the users table."
            );
        }
    }

    /**
     * Test: Thêm một bản ghi vào bảng `users`.
     */
    public function test_can_insert_user_into_users_table()
    {
        $userId = DB::table('users')->insertGetId([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'email' => 'jane.doe@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $userId,
            'email' => 'jane.doe@example.com',
        ]);
    }

    /**
     * Test: Kiểm tra ràng buộc unique trên cột `email`.
     */
    public function test_email_column_is_unique()
    {
        // Tạo một user
        DB::table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thêm user thứ hai với email trùng lặp
        $this->expectException(\Illuminate\Database\QueryException::class);

        DB::table('users')->insert([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'email' => 'john.doe@example.com', // Email trùng
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
