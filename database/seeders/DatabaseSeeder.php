<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Stock;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Andre Butarbutar',
            'email' => 'andrebutar@email.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Fauzan Ali',
            'email' => 'fauzanali@email.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Fahmi Ardiansyah',
            'email' => 'fahmiardiansyah@email.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Khoirul Anam',
            'email' => 'khoirulanam@email.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Hafidz Amanullah',
            'email' => 'hafidzamanullah@email.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Yusuf Muhammad',
            'email' => 'yusuf@email.com',
            'password' => bcrypt('password')
        ]);

        Transaksi::create([
            'produk_id' => 1,
            'user_id' => 1,
            'jenis_transaksi' => 'Pembelian',
            'jumlah_transaksi' => '3',
            'total_harga' => 9000
        ]);
        
        Transaksi::create([
            'produk_id' => 2,
            'user_id' => 2,
            'jenis_transaksi' => 'Penjualan',
            'jumlah_transaksi' => '2',
            'total_harga' => 6000
        ]);

        Transaksi::create([
            'produk_id' => 1,
            'user_id' => 3,
            'jenis_transaksi' => 'Pembelian',
            'jumlah_transaksi' => '1',
            'total_harga' => 1000
        ]);

        Transaksi::create([
            'produk_id' => 2,
            'user_id' => 4,
            'jenis_transaksi' => 'Penjualan',
            'jumlah_transaksi' => '4',
            'total_harga' => 12000
        ]);

        Transaksi::create([
            'produk_id' => 1,
            'user_id' => 5,
            'jenis_transaksi' => 'Pembelian',
            'jumlah_transaksi' => '3',
            'total_harga' => 9000
        ]);

        Transaksi::create([
            'produk_id' => 2,
            'user_id' => 6,
            'jenis_transaksi' => 'Penjualan',
            'jumlah_transaksi' => '1',
            'total_harga' => 3000
        ]);

        Transaksi::create([
            'produk_id' => 1,
            'user_id' => 1,
            'jenis_transaksi' => 'Pembelian',
            'jumlah_transaksi' => '3',
            'total_harga' => 9000
        ]);
        
        Produk::create([
            'nama' => 'Tempe',
            'harga' => 5000,
            'harga_member' => 3000
        ]);
        
        Produk::create([
            'nama' => 'Tahu',
            'harga' => 5000,
            'harga_member' => 3000
        ]);

        Stock::create([
            'user_id' => 1,
            'produk_id' => 1,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 1,
            'produk_id' => 2,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 2,
            'produk_id' => 1,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 2,
            'produk_id' => 2,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 3,
            'produk_id' => 1,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 3,
            'produk_id' => 2,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 4,
            'produk_id' => 1,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 4,
            'produk_id' => 2,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 5,
            'produk_id' => 1,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 5,
            'produk_id' => 2,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 6,
            'produk_id' => 1,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
        Stock::create([
            'user_id' => 6,
            'produk_id' => 2,
            'jumlah_barang' => mt_rand(50, 150)
        ]);
        
    }
}
