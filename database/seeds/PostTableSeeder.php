<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'tip_id' => 1,
                'naziv' => 'Gumene ili tepih patosnice?',
                'slug' => 'gumene-ili-tepih-patosnice',
                'datum' => '2017-09-30',
                'redosled' => '1000',
                'aktivan' => 1,
                'ukratko' => 'Patosnice predstavljaju sastavni deo vašeg automobila i one čuvaju njegovu unutrašnjost olakšavajući čišćenje automobila i zimi i leti...  Stoga je pravilan izbor od velikog značaja.  ',
                'detaljno' => 'Patosnice predstavljaju sastavni deo vašeg automobila i one čuvaju njegovu unutrašnjost olakšavajući čišćenje automobila i zimi i leti...  Stoga je pravilan izbor od velikog značaja.  

                Patosnice smanjuju "habanost" vašeg automobila
                
                Ukoliko vozite bez patosnica, dolazi do dva negativna uticaja na tepih na podu:
                
                a) Dok „radite“ nožnim komandama dolazi do neminovnog habanja tepiha......',
            ],
            [
                'tip_id' => 2,
                'naziv' => 'O NAMA',
                'slug' => 'o-nama',
                'datum' => '0000-11-30',
                'redosled' => '1000',
                'aktivan' => 1,
                'ukratko' => '',
                'detaljno' => 'Firma „Auto Beli“ je osnovana 1978. godine u februaru mesecu, kada je sadašnji vlasnik, Milan Slavujević, odlučio da u vreme komunizma, kada je bilo veoma teško osamostaliti se, osnuje SZTR „Auto Beli“. Zanat je „ispekao“ u servisu „Škoda“. „Auto Beli“ se nalazi u Ulici Nikole Tesle broj 6 u Šidu. Firma je zadržala ime uz mnogobrojne promene, odnosno, veliko ulaganje a samim tim i veliki napredak. 
                Godine 2018. naša firma puni 40 godina uspešnog rada. U početku se u Ulici Nikole Tesle broj 6 nalazio samo automehaničarski servis. Posle 11 godina, odnosno 1989. godine, otvoren je maloprodajni objekat automobilskih delova. 1995. godine „Auto Beli“ je otvorio savremen autoservis sa mnogo noviteta. Asortiman automobilskih delova se konstantno povećavao a akcenat se stavljao na poštenom odnosu prema kupcima, što je slučaj i danas. Tri godine kasnije, tačnije 1998. samostalna automehaničarska trgovačka radnja „Auto Beli“ je osnovala bratsku firmu D.O.O. „Auto Beli“. Tada su građani Šida dobili mogućn',
            ],
        ]);
    }
}
