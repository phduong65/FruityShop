<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        // table user_profile
       
=======
        DB::table('products')->insert([
            'name' => 'Măng cụt chín Miền Nam',
            'description' => 'Măng cụt có nguồn gốc từ Mã Lai và Indonesia, được trồng từ hàng chục thế kỷ, cây đã được Thuyền Trưởng Cook mô tả khá chi tiết từ năm 1770, và được đưa đến Sri Lanka vào năm 1800, được trồng tại Anh trong các nhà kiếng (green house) từ 1855, sau đó đưa đến West Indies từ giữa thế kỷ 19. Đây là một loại cây đòi hỏi điều kiện thổ nhưỡng khắt khe cần khí hậu nóng và ẩm, cây tăng trưởng rất chậm, sau 2-3 năm cây chỉ cao đến đầu gối, chỉ bắt đầu cho quả sau 10-15 năm.. Cây đã được các nhà truyền giáo du nhập vào Nam Việt Nam từ lâu, trồng nhiều nhất tại Lái Thiêu, Thủ Dầu Một.',
            'price' => 80000,
            'photo' => 'Măng cụt chín Miền Nam1.png',
            'status'=> 'Còn Hàng',
            'quantity' => 10,
            'discount'=> 11,
        ]);
        DB::table('products')->insert([
            'name' => 'Lựu đỏ Nam Phi nhập khẩu',
            'description' => 'Hạt lựu chín có giá trị dinh dưỡng cao, có tác dụng chống vi khuẩn, chống oxy hóa và tác dụng tẩy giun hiệu quả. Tuy nhiên thực tế đã có trường hợp trẻ em nguy kịch vì tắc ruột do ăn nhiều hạt lựu. Vì vậy, khi ăn không nên nuốt hạt lựu, với người lớn thì cần nhai kỹ trước khi nuốt.',
            'price' => 40000,
            'photo' => 'Lựu đỏ Nam Phi nhập khẩu-1.jpg',
            'status'=> 'Còn Hàng',
            'quantity' => 10,
            'discount'=> 11,
        ]);
>>>>>>> a492555a2fae67a8f1b12d3983d5c2764ea391df
    }
}
