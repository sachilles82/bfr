<?php

namespace Database\Seeders\Address;

use App\Models\Address\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $states = [
            ['id' => 1, 'name' => 'Aargau','user_id' => 1, 'code' => 'AG', 'country_id' => 1],
            ['id' => 2, 'name' => 'Appenzell Ausserrhoden','user_id' => 1, 'code' => 'AR', 'country_id' => 1],
            ['id' => 3, 'name' => 'Appenzell Innerrhoden','user_id' => 1, 'code' => 'AI', 'country_id' => 1],
            ['id' => 4, 'name' => 'Basel-Landschaft','user_id' => 1, 'code' => 'BL', 'country_id' => 1],
            ['id' => 5, 'name' => 'Basel-Stadt','user_id' => 1, 'code' => 'BS', 'country_id' => 1],
            ['id' => 6, 'name' => 'Bern','user_id' => 1, 'code' => 'BE', 'country_id' => 1],
            ['id' => 7, 'name' => 'Freiburg','user_id' => 1, 'code' => 'FR', 'country_id' => 1],
            ['id' => 8, 'name' => 'Genf','user_id' => 1, 'code' => 'GE', 'country_id' => 1],
            ['id' => 9, 'name' => 'Glarus','user_id' => 1, 'code' => 'GL', 'country_id' => 1],
            ['id' => 10, 'name' => 'Graubünden','user_id' => 1, 'code' => 'GR', 'country_id' => 1],
            ['id' => 11, 'name' => 'Jura','user_id' => 1, 'code' => 'JU', 'country_id' => 1],
            ['id' => 12, 'name' => 'Luzern','user_id' => 1, 'code' => 'LU', 'country_id' => 1],
            ['id' => 13, 'name' => 'Neuenburg','user_id' => 1, 'code' => 'NE', 'country_id' => 1],
            ['id' => 14, 'name' => 'Nidwalden','user_id' => 1, 'code' => 'NW', 'country_id' => 1],
            ['id' => 15, 'name' => 'Obwalden','user_id' => 1, 'code' => 'OW', 'country_id' => 1],
            ['id' => 16, 'name' => 'Schaffhausen','user_id' => 1, 'code' => 'SH', 'country_id' => 1],
            ['id' => 17, 'name' => 'Schwyz','user_id' => 1, 'code' => 'SZ', 'country_id' => 1],
            ['id' => 18, 'name' => 'Solothurn','user_id' => 1, 'code' => 'SO', 'country_id' => 1],
            ['id' => 19, 'name' => 'St. Gallen','user_id' => 1, 'code' => 'SG', 'country_id' => 1],
            ['id' => 20, 'name' => 'Thurgau','user_id' => 1, 'code' => 'TG', 'country_id' => 1],
            ['id' => 21, 'name' => 'Tessin','user_id' => 1, 'code' => 'TI', 'country_id' => 1],
            ['id' => 22, 'name' => 'Uri','user_id' => 1, 'code' => 'UR', 'country_id' => 1],
            ['id' => 23, 'name' => 'Wallis','user_id' => 1, 'code' => 'VS', 'country_id' => 1],
            ['id' => 24, 'name' => 'Waadt','user_id' => 1, 'code' => 'VD', 'country_id' => 1],
            ['id' => 25, 'name' => 'Zug','user_id' => 1, 'code' => 'ZG', 'country_id' => 1],
            ['id' => 26, 'name' => 'Zürich','user_id' => 1, 'code' => 'ZH', 'country_id' => 1],

            ['id' => 27, 'name' => 'Baden-Württemberg','user_id' => 1, 'code' => 'DE-BW', 'country_id' => 2],
            ['id' => 28, 'name' => 'Bayern','user_id' => 1, 'code' => 'DE-BY', 'country_id' => 2],
            ['id' => 29, 'name' => 'Berlin','user_id' => 1, 'code' => 'DE-BE', 'country_id' => 2],
            ['id' => 30, 'name' => 'Brandenburg','user_id' => 1, 'code' => 'DE-BB', 'country_id' => 2],
            ['id' => 31, 'name' => 'Bremen','user_id' => 1, 'code' => 'DE-HB', 'country_id' => 2],
            ['id' => 32, 'name' => 'Hamburg','user_id' => 1, 'code' => 'DE-HH', 'country_id' => 2],
            ['id' => 33, 'name' => 'Hessen','user_id' => 1, 'code' => 'DE-HE', 'country_id' => 2],
            ['id' => 34, 'name' => 'Mecklenburg-Vorpommern','user_id' => 1, 'code' => 'DE-MV', 'country_id' => 2],
            ['id' => 35, 'name' => 'Niedersachsen','user_id' => 1, 'code' => 'DE-NI', 'country_id' => 2],
            ['id' => 36, 'name' => 'Nordrhein-Westfalen','user_id' => 1, 'code' => 'DE-NW', 'country_id' => 2],
            ['id' => 37, 'name' => 'Rheinland-Pfalz','user_id' => 1, 'code' => 'DE-RP', 'country_id' => 2],
            ['id' => 38, 'name' => 'Saarland','user_id' => 1, 'code' => 'DE-SL', 'country_id' => 2],
            ['id' => 39, 'name' => 'Sachsen','user_id' => 1, 'code' => 'DE-SN', 'country_id' => 2],
            ['id' => 40, 'name' => 'Sachsen-Anhalt','user_id' => 1, 'code' => 'DE-ST', 'country_id' => 2],
            ['id' => 41, 'name' => 'Schleswig-Holstein','user_id' => 1, 'code' => 'DE-SH', 'country_id' => 2],
            ['id' => 42, 'name' => 'Thüringen','user_id' => 1, 'code' => 'DE-TH', 'country_id' => 2],

            // Austria (Country ID 3)
            ['id' => 43, 'name' => 'Burgenland','user_id' => 1, 'code' => 'ABG', 'country_id' => 3],
            ['id' => 44, 'name' => 'Kärnten','user_id' => 1, 'code' => 'AKA', 'country_id' => 3],
            ['id' => 45, 'name' => 'Niederösterreich','user_id' => 1, 'code' => 'ANO', 'country_id' => 3],
            ['id' => 46, 'name' => 'Oberösterreich','user_id' => 1, 'code' => 'AOO', 'country_id' => 3],
            ['id' => 47, 'name' => 'Salzburg','user_id' => 1, 'code' => 'ASA', 'country_id' => 3],
            ['id' => 48, 'name' => 'Steiermark','user_id' => 1, 'code' => 'AST', 'country_id' => 3],
            ['id' => 49, 'name' => 'Tirol','user_id' => 1, 'code' => 'ATI', 'country_id' => 3],
            ['id' => 50, 'name' => 'Vorarlberg','user_id' => 1, 'code' => 'AVO', 'country_id' => 3],
            ['id' => 51, 'name' => 'Wien','user_id' => 1, 'code' => 'AWI', 'country_id' => 3],

            //Liechtenstein
            ['id' => 52, 'name' => 'Ruggell','user_id' => 1, 'code' => 'RGL', 'country_id' => 4],
            ['id' => 53, 'name' => 'Schaan','user_id' => 1, 'code' => 'SCH', 'country_id' => 4],
            ['id' => 54, 'name' => 'Triesen','user_id' => 1, 'code' => 'TIN', 'country_id' => 4],
            ['id' => 55, 'name' => 'Vaduz','user_id' => 1, 'code' => 'VAD', 'country_id' => 4],
            ['id' => 56, 'name' => 'Schellenberg','user_id' => 1, 'code' => 'SEL', 'country_id' => 4],
            ['id' => 57, 'name' => 'Gamprin','user_id' => 1, 'code' => 'GAM', 'country_id' => 4],
            ['id' => 58, 'name' => 'Eschen','user_id' => 1, 'code' => 'ESC', 'country_id' => 4],
            ['id' => 59, 'name' => 'Mauren','user_id' => 1, 'code' => 'MAU', 'country_id' => 4],
            ['id' => 60, 'name' => 'Planken','user_id' => 1, 'code' => 'PLK', 'country_id' => 4],
            ['id' => 61, 'name' => 'Triesenberg','user_id' => 1, 'code' => 'TRB', 'country_id' => 4],
            ['id' => 62, 'name' => 'Balzers','user_id' => 1, 'code' => 'BAL', 'country_id' => 4],

            // Italy (Country ID 22)
            ['id' => 77, 'name' => 'Abruzzen (Abruzzo)','user_id' => 1, 'code' => 'ABR', 'country_id' => 5],
            ['id' => 78, 'name' => 'Aostatal (Valle d\'Aosta)','user_id' => 1, 'code' => 'VDA', 'country_id' => 5],
            ['id' => 79, 'name' => 'Apulien (Puglia)','user_id' => 1, 'code' => 'PUG', 'country_id' => 5],
            ['id' => 80, 'name' => 'Basilikata (Basilicata)','user_id' => 1, 'code' => 'BAS', 'country_id' => 5],
            ['id' => 81, 'name' => 'Emilia-Romagna','user_id' => 1, 'code' => 'EMR', 'country_id' => 5],
            ['id' => 82, 'name' => 'Friaul-Julisch Venetien (Friuli Venezia Giulia)','user_id' => 1, 'code' => 'FVG', 'country_id' => 5],
            ['id' => 83, 'name' => 'Kalabrien (Calabria)','user_id' => 1, 'code' => 'CAL', 'country_id' => 5],
            ['id' => 84, 'name' => 'Kampanien (Campania)','user_id' => 1, 'code' => 'CAM', 'country_id' => 5],
            ['id' => 85, 'name' => 'Latium (Lazio)','user_id' => 1, 'code' => 'LAZ', 'country_id' => 5],
            ['id' => 86, 'name' => 'Ligurien (Liguria)','user_id' => 1, 'code' => 'LIG', 'country_id' => 5],
            ['id' => 87, 'name' => 'Lombardei (Lombardia)','user_id' => 1, 'code' => 'LOM', 'country_id' => 5],
            ['id' => 88, 'name' => 'Marken (Marche)','user_id' => 1, 'code' => 'MAR', 'country_id' => 5],
            ['id' => 89, 'name' => 'Molise','user_id' => 1, 'code' => 'MOL', 'country_id' => 5],
            ['id' => 90, 'name' => 'Piemont (Piemonte)','user_id' => 1, 'code' => 'PIE', 'country_id' => 5],
            ['id' => 91, 'name' => 'Sardinien (Sardegna)','user_id' => 1, 'code' => 'SAR', 'country_id' => 5],
            ['id' => 92, 'name' => 'Sizilien (Sicilia)','user_id' => 1, 'code' => 'SIC', 'country_id' => 5],
            ['id' => 93, 'name' => 'Toskana (Toscana)','user_id' => 1, 'code' => 'TOS', 'country_id' => 5],
            ['id' => 94, 'name' => 'Trentino-Südtirol (Trentino-Alto Adige)','user_id' => 1, 'code' => 'TAA', 'country_id' => 5],
            ['id' => 95, 'name' => 'Umbrien (Umbria)','user_id' => 1, 'code' => 'UMB', 'country_id' => 5],
            ['id' => 96, 'name' => 'Venetien (Veneto)','user_id' => 1, 'code' => 'VEN', 'country_id' => 5],

            // France (Country ID 16)
            ['id' => 105, 'name' => 'Auvergne-Rhône-Alpes','user_id' => 1, 'code' => 'ARA', 'country_id' => 6],
            ['id' => 106, 'name' => 'Bourgogne-Franche-Comté','user_id' => 1, 'code' => 'BFC', 'country_id' => 6],
            ['id' => 107, 'name' => 'Bretagne','user_id' => 1, 'code' => 'BRE', 'country_id' => 6],
            ['id' => 108, 'name' => 'Centre-Val de Loire','user_id' => 1, 'code' => 'CVL', 'country_id' => 6],
            ['id' => 109, 'name' => 'Corse','user_id' => 1, 'code' => 'COR', 'country_id' => 6],
            ['id' => 110, 'name' => 'Grand Est','user_id' => 1, 'code' => 'GES', 'country_id' => 6],
            ['id' => 111, 'name' => 'Hauts-de-France','user_id' => 1, 'code' => 'HDF', 'country_id' => 6],
            ['id' => 112, 'name' => 'Île-de-France','user_id' => 1, 'code' => 'IDF', 'country_id' => 6],
            ['id' => 113, 'name' => 'Normandie','user_id' => 1, 'code' => 'NOR', 'country_id' => 6],
            ['id' => 114, 'name' => 'Nouvelle-Aquitaine','user_id' => 1, 'code' => 'NAQ', 'country_id' => 6],
            ['id' => 115, 'name' => 'Occitanie','user_id' => 1, 'code' => 'OCC', 'country_id' => 6],
            ['id' => 116, 'name' => 'Pays de la Loire','user_id' => 1, 'code' => 'PDL', 'country_id' => 6],
            ['id' => 117, 'name' => 'Provence-Alpes-Côte d’Azur','user_id' => 1, 'code' => 'PAC', 'country_id' => 6],


            // Spain (Country ID 42)
            ['id' => 97, 'name' => 'Andalusien','user_id' => 1, 'code' => 'EAN', 'country_id' => 7],
            ['id' => 98, 'name' => 'Aragonien','user_id' => 1, 'code' => 'EAR', 'country_id' => 7],
            ['id' => 99, 'name' => 'Baskenland','user_id' => 1, 'code' => 'EPV', 'country_id' => 7],
            ['id' => 100, 'name' => 'Galicien','user_id' => 1, 'code' => 'EGA', 'country_id' => 7],
            ['id' => 101, 'name' => 'Kanarische Inseln','user_id' => 1, 'code' => 'ECN', 'country_id' => 7],
            ['id' => 102, 'name' => 'Katalonien','user_id' => 1, 'code' => 'ECT', 'country_id' => 7],
            ['id' => 103, 'name' => 'Madrid','user_id' => 1, 'code' => 'EMD', 'country_id' => 7],
            ['id' => 104, 'name' => 'Valencianische Gemeinschaft','user_id' => 1, 'code' => 'EVC', 'country_id' => 7],





            // Belgium (Country ID 7)
//            ['id' => 64, 'name' => 'Antwerpen','user_id' => 1, 'code' => 'VAN', 'country_id' => 7],
//            ['id' => 65, 'name' => 'Flämische Region','user_id' => 1, 'code' => 'VLG', 'country_id' => 7],
//            ['id' => 66, 'name' => 'Limburg','user_id' => 1, 'code' => 'VLI', 'country_id' => 7],
//            ['id' => 67, 'name' => 'Oost-Vlaanderen','user_id' => 1, 'code' => 'VOV', 'country_id' => 7],
//            ['id' => 68, 'name' => 'Vlaams-Brabant','user_id' => 1, 'code' => 'VBR', 'country_id' => 7],
//            ['id' => 69, 'name' => 'West-Vlaanderen','user_id' => 1, 'code' => 'VWV', 'country_id' => 7],
//            ['id' => 70, 'name' => 'Hennegau (Hainaut)','user_id' => 1, 'code' => 'WHT', 'country_id' => 7],
//            ['id' => 71, 'name' => 'Lüttich (Liège)','user_id' => 1, 'code' => 'WLG', 'country_id' => 7],
//            ['id' => 72, 'name' => 'Luxemburg (Luxembourg)','user_id' => 1, 'code' => 'WLX', 'country_id' => 7],
//            ['id' => 73, 'name' => 'Namur','user_id' => 1, 'code' => 'WNA', 'country_id' => 7],
//            ['id' => 74, 'name' => 'Region Brüssel-Hauptstadt','user_id' => 1, 'code' => 'BRU', 'country_id' => 7],
//            ['id' => 75, 'name' => 'Wallonisch-Brabant (Brabant Wallon)','user_id' => 1, 'code' => 'WBR', 'country_id' => 7],
//            ['id' => 76, 'name' => 'Wallonische Region','user_id' => 1, 'code' => 'WAL', 'country_id' => 7],






//            ['id' => 105, 'name' => 'Auvergne-Rhône-Alpes','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 106, 'name' => 'Bourgogne-Franche-Comté','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 107, 'name' => 'Bretagne','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 108, 'name' => 'Centre-Val de Loire','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 109, 'name' => 'Corse','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 110, 'name' => 'Grand Est','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 111, 'name' => 'Hauts-de-France','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 112, 'name' => 'Île-de-France','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 113, 'name' => 'Normandie','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 114, 'name' => 'Nouvelle-Aquitaine','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 115, 'name' => 'Occitanie','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 116, 'name' => 'Pays de la Loire','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],
//            ['id' => 117, 'name' => 'Provence-Alpes-Côte d’Azur','user_id' => 1, 'code' => 'FRA', 'country_id' => 16],

            // Poland (Country ID 34)
//            ['id' => 118, 'name' => 'Dolnoslaskie','user_id' => 1, 'code' => 'DS', 'country_id' => 34],
//            ['id' => 119, 'name' => 'Kujawsko-Pomorskie','user_id' => 1, 'code' => 'KP', 'country_id' => 34],
//            ['id' => 120, 'name' => 'Lubelskie','user_id' => 1, 'code' => 'LU', 'country_id' => 34],
//            ['id' => 121, 'name' => 'Lubuskie','user_id' => 1, 'code' => 'LB', 'country_id' => 34],
//            ['id' => 122, 'name' => 'Lodzkie','user_id' => 1, 'code' => 'LD', 'country_id' => 34],
//            ['id' => 123, 'name' => 'Malopolskie','user_id' => 1, 'code' => 'MA', 'country_id' => 34],
//            ['id' => 124, 'name' => 'Mazowieckie','user_id' => 1, 'code' => 'MZ', 'country_id' => 34],
//            ['id' => 125, 'name' => 'Opolskie','user_id' => 1, 'code' => 'OP', 'country_id' => 34],
//            ['id' => 126, 'name' => 'Podkarpackie','user_id' => 1, 'code' => 'PK', 'country_id' => 34],
//            ['id' => 127, 'name' => 'Podlaskie','user_id' => 1, 'code' => 'PD', 'country_id' => 34],
//            ['id' => 128, 'name' => 'Pomorskie','user_id' => 1, 'code' => 'PM', 'country_id' => 34],
//            ['id' => 129, 'name' => 'Slaskie','user_id' => 1, 'code' => 'SL', 'country_id' => 34],
//            ['id' => 130, 'name' => 'Swietokrzyskie','user_id' => 1, 'code' => 'SK', 'country_id' => 34],
//            ['id' => 131, 'name' => 'Warminsko-Mazurskie','user_id' => 1, 'code' => 'WM', 'country_id' => 34],
//            ['id' => 132, 'name' => 'Wielkopolskie','user_id' => 1, 'code' => 'WP', 'country_id' => 34],
//            ['id' => 133, 'name' => 'Zachodniopomorskie','user_id' => 1, 'code' => 'ZP', 'country_id' => 34],
        ];

        State::insert($states);
    }
}
