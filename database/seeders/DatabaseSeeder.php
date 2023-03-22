<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
INSERT INTO `products` (`id`, `type`, `category_id`, `title`, `long_title`, `description`, `image`, `on_sale`, `rating`, `sold_count`, `review_count`, `price`, `created_at`, `updated_at`) VALUES
(91, 'normal', 13, 'Kingston/金士顿 HX424C15FB/8', '金士顿 骇客神条 ddr4 2400 8g 台式机 电脑 四代内存条 吃鸡内存', '<p><img src=\"https://img.alicdn.com/imgextra/i3/704392951/TB25akyqsuYBuNkSmRyXXcA3pXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i1/704392951/TB288x6y25TBuNjSspmXXaDRVXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i1/704392951/TB2ck46y7CWBuNjy0FaXXXUlXXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i2/704392951/TB2_OV3y1uSBuNjSsziXXbq8pXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i3/704392951/TB2F9KZiP7nBKNjSZLeXXbxCFXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i4/704392951/TB2XQ06y7CWBuNjy0FaXXXUlXXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i2/704392951/TB20Tl7y4SYBuNjSspjXXX73VXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i2/704392951/TB2QygAqDdYBeNkSmLyXXXfnVXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i3/704392951/TB2C6S5qyCYBuNkHFCcXXcHtVXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i2/704392951/TB2J_pByYGYBuNjy0FoXXciBFXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i2/704392951/TB2520Ny29TBuNjy1zbXXXpepXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i4/704392951/TB2ozkLyFmWBuNjSspdXXbugXXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i4/704392951/TB2S9IFiOAnBKNjSZFvXXaTKXXa_!!704392951.jpg\" /></p><p><img alt=\"\" src=\"https://gdp.alicdn.com/imgextra/i4/704392951/TB2KpHwfviSBuNkSnhJXXbDcpXa_!!704392951.jpg\" /></p>', 'https://img.alicdn.com/bao/uploaded/i2/TB1iqkaLVXXXXagXXXXObG1FpXX_091208.jpg_b.jpg', 1, 5.00, 0, 0, '399.00', '2020-03-23 16:57:28', '2020-03-23 16:57:28', '[\"电脑配件\", \"内存\"]', '-10-'),
(92, 'normal', 13, 'AData/威刚 8G DDR4 2400 (XPG 单条） ', 'ADATA/威刚 8G 16G 3200 3000 2666 2400游戏台式机内存条DDR4套条', '<p><img src=\"https://img.alicdn.com/imgextra/i4/2133729733/TB2LYbVxFOWBuNjy0FiXXXFxVXa_!!2133729733.jpg\" /><br /><a href = \"https://detail.tmall.com/item.htm?spm=a1z10.5-b-s.w4011-16853183550.96.20b86fd1MBVKRL&id=40645526570&rn=d717312a898e0fb53e74b1c2db2c2232&abbucket=12\" target = \"_self\" ><img src = \"https://img.alicdn.com/imgextra/i2/2133729733/TB2zEdobrZnBKNjSZFhXXc.oXXa_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i1/2133729733/TB2W3VPbWmWBuNjy1XaXXXCbXXa_!!2133729733.jpg\" /></a ><br /><img src = \"https://img.alicdn.com/imgextra/i1/2133729733/TB2NLaeaQyWBuNjy0FpXXassXXa_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i4/2133729733/TB2hvRtfamgSKJjSsphXXcy1VXa_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i2/2133729733/TB2DFptaXXXXXaOXXXXXXXXXXXX_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i4/2133729733/TB2mAUhkCFjpuFjSszhXXaBuVXa_!!2133729733.jpg_q90.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i1/2133729733/TB2aU8kaXXXXXbbXpXXXXXXXXXX_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i3/2133729733/TB2Nhf8cRfM8KJjSZFrXXXSdXXa_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i1/2133729733/TB2h0oEhSYH8KJjSspdXXcRgVXa_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i2/2133729733/TB202q8gP3z9KJjy0FmXXXiwXXa_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i3/2133729733/TB2kRllh0nJ8KJjSszdXXaxuFXa_!!2133729733.jpg\" /><img src = \"https://img.alicdn.com/imgextra/i3/2133729733/TB2BXY3cqzB9uJjSZFMXXXq4XXa_!!2133729733.jpg\" /></p >', 'https://img.alicdn.com/bao/uploaded/i4/TB1URYGHVXXXXXsaXXXtD198VXX_032444.jpg_b.jpg', 1, 5.00, 0, 0, '489.00', '2020-03-23 16:57:28', '2020-03-23 16:57:28', '[\"电脑配件\", \"内存\"]', '-10-'),
(93, 'normal', 13, 'Kingston/金士顿 金士顿DDR3 1600 8GB', 'Kingston/金士顿 DDR3 1600 8G 台式机电脑 三代 内存条 兼容1333', '<p><img src=\"https://img.alicdn.com/imgextra/i4/704392951/TB2Y5OKqOOYBuNjSsD4XXbSkFXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i1/704392951/TB2cQS8y29TBuNjy0FcXXbeiFXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i4/704392951/TB2GrWfqIyYBuNkSnfoXXcWgVXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i2/704392951/TB2.Onyy7yWBuNjy0FpXXassXXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i3/704392951/TB2yEnCy29TBuNjy1zbXXXpepXa_!!704392951.jpg\" /><img src=\"https://img.alicdn.com/imgextra/i2/704392951/TB2Urm1y7KWBuNjy1zjXXcOypXa_!!704392951.jpg\" /></p><p><img alt = \"\" src = \"https://gdp.alicdn.com/imgextra/i4/704392951/TB2KpHwfviSBuNkSnhJXXbDcpXa_!!704392951.jpg\" /></p >', 'https://img.alicdn.com/bao/uploaded/i5/TB1up8DGXXXXXaAaXXXszso_pXX_060025.jpg_b.jpg', 1, 5.00, 0, 0, '239.00', '2020-03-23 16:57:28', '2020-03-23 16:57:28', '[\"电脑配件\", \"内存\"]', '-10-')");
        DB::insert("INSERT INTO `product_skus` (`id`, `title`, `description`, `price`, `stock`, `product_id`, `created_at`, `updated_at`) VALUES
(271, '8GB 黑色', '8GB 2400 DDR4 黑色', '549.00', 999, 91, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(272, '8GB 绿色', '8GB 2400 DDR4 绿色', '529.00', 999, 91, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(273, '16GB', '2400 16GB', '1299.00', 999, 91, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(274, '4GB', '2400 4GB', '399.00', 999, 91, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(275, '8GB DDR4 2400', '8GB DDR4 2400 XPG单条', '489.00', 999, 92, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(276, '4GB 万紫千红 DDR4 2133', '4GB 万紫千红 DDR4 2133', '489.00', 999, 92, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(277, 'DDR3 1600 8G', 'DDR3 1600 8G', '439.00', 999, 93, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(278, 'DDR3 1600 4G', 'DDR3 1600 4G', '239.00', 999, 93, '2020-03-23 16:57:28', '2020-03-23 16:57:28'),
(279, 'DDR3 1333 4G', 'DDR3 1333 4G', '259.00', 999, 93, '2020-03-23 16:57:28', '2020-03-23 16:57:28')");
        DB::insert("INSERT INTO `product_properties` (`id`, `product_id`, `name`, `value`) VALUES
(1, 91, '品牌名称', '金士顿'),
(2, 91, '内存容量', '8GB'),
(3, 91, '传输类型', 'DDR4'),
(4, 91, '内存容量', '4GB'),
(5, 91, '内存容量', '16GB'),
(6, 92, '品牌名称', '威刚'),
(7, 92, '传输类型', 'DDR4'),
(8, 92, '内存容量', '4GB'),
(9, 92, '内存容量', '8GB'),
(10, 93, '品牌名称', '金士顿'),
(11, 93, '传输类型', 'DDR3'),
(12, 93, '内存容量', '4GB'),
(13, 93, '内存容量', '8GB');");
    }
}
