<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menu
        $menus = [
            ['menu_title' => 'ANASAYFA','menu_icon' => 'fa fa-home','parent_id' =>0,'sort_order' =>0,'slug' => '/'],
            ['menu_title' => 'FİNANS','menu_icon' => 'icon-wallet','parent_id' =>0,'sort_order' =>1,'slug' => '/finans'],
            ['menu_title' => 'STOK & HİZMET','menu_icon' => 'icon-bookmark-alt','parent_id' =>0,'sort_order' =>2,'slug' => '/stok'],
            ['menu_title' => 'CARİ','menu_icon' => 'icon-layers-alt','parent_id' =>0,'sort_order' =>3,'slug' => '/cari'],
            ['menu_title' => 'GİDERLER','menu_icon' => 'icon-shopping-cart-full','parent_id' =>0,'sort_order' =>4,'slug' => '/gider'],
            ['menu_title' => 'PERSONEL','menu_icon' => 'icon-user','parent_id' =>0,'sort_order' =>5,'slug' => '/personel'],
            ['menu_title' => 'RAPORLAR','menu_icon' => 'icon-bar-chart','parent_id' =>0,'sort_order' =>6,'slug' => '/rapor'],
            ['menu_title' => 'AYARLAR','menu_icon' => 'icon-settings','parent_id' =>0,'sort_order' =>7,'slug' => '/ayar'],
            ['menu_title' => 'Nakit Akışı','menu_icon' => 'fa fa-angle-right','parent_id' =>2,'sort_order' =>8,'slug' => '/nakit'],
            ['menu_title' => 'Kasa Hesapları','menu_icon' => 'fa fa-angle-right','parent_id' =>2,'sort_order' =>9,'slug' => '/kasa'],
            ['menu_title' => 'Banka Hesapları','menu_icon' => 'fa fa-angle-right','parent_id' =>2,'sort_order' =>10,'slug' => '/banka'],
            ['menu_title' => 'Çekler','menu_icon' => 'fa fa-angle-right','parent_id' =>2,'sort_order' =>11,'slug' => '/cek'],
            ['menu_title' => 'Hizmetler','menu_icon' => 'fa fa-angle-right','parent_id' =>3,'sort_order' =>12,'slug' => '/hizmet'],
            ['menu_title' => 'Ürünler','menu_icon' => 'fa fa-angle-right','parent_id' =>3,'sort_order' =>13,'slug' => '/urun'],
            ['menu_title' => 'Stok Hareketleri','menu_icon' => 'fa fa-angle-right','parent_id' =>3,'sort_order' =>14,'slug' => '/hareketler'],
            ['menu_title' => 'Cari','menu_icon' => 'fa fa-angle-right','parent_id' =>4,'sort_order' =>15,'slug' => '/cari'],
            ['menu_title' => 'Giderler','menu_icon' => 'fa fa-angle-right','parent_id' =>5,'sort_order' =>16,'slug' => '/gider'],
            ['menu_title' => 'Gelirler','menu_icon' => 'fa fa-angle-right','parent_id' =>5,'sort_order' =>17,'slug' => '/gelir'],
            ['menu_title' => 'Satış Özeti','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>18,'slug' => '/satisozeti'],
            ['menu_title' => 'Masraf Özeti','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>19,'slug' => '/masrafozeti'],
            ['menu_title' => 'Alış Özeti','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>20,'slug' => '/alisozeti'],
            ['menu_title' => 'KDV Raporu','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>21,'slug' => '/kdvraporu'],
            ['menu_title' => 'Sipariş Durum Özeti','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>22,'slug' => '/siparisdurum'],
            ['menu_title' => 'Personel Raporu','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>23,'slug' => '/personelraporu'],
            ['menu_title' => 'Finans Raporları','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>24,'slug' => '/finansraporu'],
            ['menu_title' => 'Stok Özeti','menu_icon' => 'fa fa-angle-right','parent_id' =>6,'sort_order' =>25,'slug' => '/stokozeti'],
            ['menu_title' => 'Firma Ayarlar','menu_icon' => 'fa fa-angle-right','parent_id' =>7,'sort_order' =>26,'slug' => '/firma'],
            ['menu_title' => 'Sabitler','menu_icon' => 'fa fa-angle-right','parent_id' =>7,'sort_order' =>27,'slug' => '/sabit'],
            ['menu_title' => 'Entegrasyonlar','menu_icon' => 'fa fa-angle-right','parent_id' =>7,'sort_order' =>28,'slug' => '/entegrasyon'],
            ['menu_title' => 'Genel Ayarlar','menu_icon' => 'fa fa-angle-right','parent_id' =>7,'sort_order' =>29,'slug' => '/genel']

        ];

        foreach ($menus as $menu){
            \App\Models\Menu::create($menu);
        }
    }
}
