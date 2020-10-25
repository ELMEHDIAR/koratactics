<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Club;

class LigueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $country01  = Country::create(['name' => 'Premier League']);
        $club001  = Club::create(['name' => 'Liverpool FC' , 'country_id' =>  $country01->id ]);
        $club002  = Club::create(['name' => 'Manchester City' , 'country_id' =>  $country01->id ]);
        $club003  = Club::create(['name' => 'Chelsea FC' , 'country_id' =>  $country01->id ]);
        $club004  = Club::create(['name' => 'Manchester United' , 'country_id' =>  $country01->id ]);
        $club005  = Club::create(['name' => 'Arsenal FC' , 'country_id' =>  $country01->id ]);
        $club006  = Club::create(['name' => 'Everton FC' , 'country_id' =>  $country01->id ]); 
        $club007  = Club::create(['name' => 'Leicester City' , 'country_id' =>  $country01->id ]);
        $club008  = Club::create(['name' => 'Tottenham Hotspur' , 'country_id' =>  $country01->id ]);

        $country02  = Country::create(['name' => 'LaLiga']);
        $club011  = Club::create(['name' => 'Real Madrid' , 'country_id' =>  $country02->id ]);
        $club012  = Club::create(['name' => 'FC Barcelona' , 'country_id' =>  $country02->id ]);
        $club013  = Club::create(['name' => 'Atlético Madrid' , 'country_id' =>  $country02->id ]);
        $club014  = Club::create(['name' => 'Sevilla FC' , 'country_id' =>  $country02->id ]);
        $club015  = Club::create(['name' => 'Valencia CF' , 'country_id' =>  $country02->id ]);
        $club016  = Club::create(['name' => 'Villarreal CF' , 'country_id' =>  $country02->id ]);  
    

        $country03  = Country::create(['name' => 'Seria A']);
        $club111  = Club::create(['name' => 'Juventus FC' , 'country_id' =>  $country03->id ]);
        $club112  = Club::create(['name' => 'Inter Milan' , 'country_id' =>  $country03->id ]);
        $club113  = Club::create(['name' => 'SSC Napoli' , 'country_id' =>  $country03->id ]);
        $club114  = Club::create(['name' => 'AC Milan' , 'country_id' =>  $country03->id ]);
        $club115  = Club::create(['name' => 'Atalanta BC' , 'country_id' =>  $country03->id ]);
        $club116  = Club::create(['name' => 'SS Lazio' , 'country_id' =>  $country03->id ]); 
        $club117  = Club::create(['name' => 'AS Roma' , 'country_id' =>  $country03->id ]); 
        
        
        $country04  = Country::create(['name' => 'Ligue 1']);
        $club101  = Club::create(['name' => 'Paris Saint-Germain ' , 'country_id' =>  $country04->id ]);
        $club102  = Club::create(['name' => 'Olympique Lyon' , 'country_id' =>  $country04->id ]);
        $club103  = Club::create(['name' => 'AS Monaco' , 'country_id' =>  $country04->id ]); 

        $country05  = Country::create(['name' => 'BUNDESLIGA']);
        $club110  = Club::create(['name' => 'Bayern Munich' , 'country_id' =>  $country05->id ]);
        $club120  = Club::create(['name' => 'Borussia Dortmund' , 'country_id' =>  $country05->id ]);
        $club130  = Club::create(['name' => 'RB Leipzig' , 'country_id' =>  $country05->id ]);
        $club140  = Club::create(['name' => 'Borussia Mönchengladbach' , 'country_id' =>  $country05->id ]);
        $club150  = Club::create(['name' => 'TSG 1899 Hoffenheim' , 'country_id' =>  $country05->id ]);
        $club160  = Club::create(['name' => 'Eintracht Frankfurt' , 'country_id' =>  $country05->id ]);

    }


    
      
}
