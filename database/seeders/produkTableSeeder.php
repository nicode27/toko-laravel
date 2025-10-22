<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//cara-1
//use Illuminate\Support\Facades\DB
//Cara-2
use App\Models\Barang;

class produkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Cara-1
        //DB::table('produk')->insert()
        //Cara-2
        $brg = new Barang;
        $brg->insert (
            array (
                ['nama' => 'Gelas Kaca','id_kategori'=> '3', 'qty' => '15','harga_beli' => 
                '50000', 'harga_jual' => '540000'],
                ['nama' => 'Sendok','id_kategori'=> '1', 'qty' => '12','harga_beli' => 
                '40000', 'harga_jual' => '450000']
            )
            );
    }
}
