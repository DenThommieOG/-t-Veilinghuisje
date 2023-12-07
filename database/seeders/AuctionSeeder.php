<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Item;
use App\Models\User;
use App\Models\Auction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user01 = User::create([
            'name' => 'demo01',
            'email' => 'demo01@example.com',
            'password' => bcrypt('demo01')
        ]);
        $user02 = User::create([
            'name' => 'demo02',
            'email' => 'demo02@example.com',
            'password' => bcrypt('demo02')
        ]);
        $user03 = User::create([
            'name' => 'demo03',
            'email' => 'demo03@example.com',
            'password' => bcrypt('demo03')
        ]);
        $user04 = User::create([
            'name' => 'demo04',
            'email' => 'demo04@example.com',
            'password' => bcrypt('demo04')
        ]);
        $user05 = User::create([
            'name' => 'demo05',
            'email' => 'demo05@example.com',
            'password' => bcrypt('demo05')
        ]);
        $auction01 = Auction::create([
            'name' => 'Game consoles',
            'description' => 'Deze veiling bied verschillende, werkende game consoles aan, vooral van of gebasseerd op de Jaren 80 en 90.',
            'start_time' => '2023-12-06 14:00:00',
            'end_time' => '2023-12-13 14:00:00'
        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'Atari 2600+',
            'description' => 'De Atari 2600+ is ontworpen om eruit te zien en aan te voelen als de Atari 2600 met 4 schakelaars, die in 1980 op de markt kwam. Deze moderne versie speelt ook Atari 7800-games, heeft een breedbeeldmodus, kan gemakkelijk worden aangesloten op een moderne tv en bevat een 10-in-1 spelcassette met klassieke Atari-titels. De meegeleverde CX40+ joystickcontroller heeft hetzelfde formaat en dezelfde indeling als de originele 2600 joystickcontroller, zodat je de gameplay-ervaringen van het begin van videogaming voor thuisconsoles opnieuw kunt beleven.',
            'photo_path' => 'photos/Atari.jpg',
            'is_feature' => false

        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'Virtual Pinball Machine Star Wars',
            'description' => 'Maak je thuisspeelhal compleet met je eigen digitale Star Wars pinballmachine op 3/4 schaal. Tastemakers LLC werkt nauw samen met Disney en Zen Studios om ervoor te zorgen dat fans een product ontvangen dat er geweldig uitziet en speelt, met opwindende Star Wars-verhalen en een authentieke pinball-ervaring.',
            'photo_path' => 'photos/star-wars-pinball-machine-arcade.png',
            'is_feature' => true

        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'Capcom Super Pocket gaming handheld',
            'description' => 'Your Arcade in your pocket! Van de makers van Evercade komt het merk Hyper Mega Tech met de gloednieuwe Capcom Super Pocket. Een gaming handheld die je overal mee naartoe kunt nemen. Extreem speelbaar zonder in te leveren op de prestaties! De handheld komt inclusief , waaronder Street Fighte12 geweldige arcadespellen van de wereldberoemde uitgever Capcomr II: Hyper Fighting, Final Fight, 1943, Strider, Ghouls n Ghosts en meer. ',
            'photo_path' => 'photos/Capcom-Super-Pocket-gaming-handheld.png',
            'is_feature' => false

        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'Nintendo Classic Mini',
            'description' => 'De jaren tachtig komen weer tot leven met het Nintendo Classic Mini - Nintendo Entertainment System. De klassieke NES is terug in een nieuwe maar vertrouwde vorm als miniatuurversie van het oorspronkelijke Nintendo-systeem. Het Nintendo Classic Mini - Nintendo Entertainment System wordt geleverd met een HDMI-kabel waarmee je het systeem kunt aansluiten op een HD-tv. Daarnaast zijn er op het systeem 30 NES-games geïnstalleerd, waaronder de populaire klassiekers Super Mario Bros., The Legend of Zelda, Metroid, Donkey Kong, PAC-MAN en Kirby’s Adventure. ',
            'photo_path' => 'photos/nintendo-classic-mini-nintendo.png',
            'is_feature' => false

        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'Evercade EXP Handheld',
            'description' => 'Retro-gaming is levelled up met de nieuwe Evercade EXP handheld. Het brengt arcade-, console- en homecomputer games in je handen via het unieke Evercade cartridgesysteem, dat toegang geeft tot meer dan 380 games en 35 verschillende collecties... en er komt nog meer! De Evercade EXP bevat 18 ingebouwde Capcom* games en komt inclusief de IREM Arcade cartridge 1 met 6 games. De Evercade EXP heeft een IPS-scherm met hoge resolutie voor grotere kijkhoeken en betere kwaliteit, ingebouwde WiFi voor eenvoudige updates en de gloednieuwe TATE-modus, die naadloos en comfortabel verticaal gamen mogelijk maakt met speciale knoppen.',
            'photo_path' => 'photos/Evercade-EXP-Handheld.png',
            'is_feature' => false

        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'PlayStation Classic',
            'description' => 'In 1994 veranderde Sony het gamelandschap voorgoed met de komst van de PlayStation: de eerste console die (toentertijd) levensechte 3D-graphics kon vertonen. Met klassiekers als Final Fantasy VII en Tekken 3 werd het apparaat een groot succes en werd het zelfs de eerste console die de 100 miljoen verkochte exemplaren voorbijstreefde. Nu krijg je de kans om die gouden tijden te herbeleven met de PlayStation Classic: een miniatuurversie van de originele spelcomputer met twintig klassieke gamers voorgeïnstalleerd, waaronder Final Fantasy VII, Jumping Flash!, R4 Ridge Racer Type 4, Tekken 3 en Wild Arms. Je hoeft zelfs niet je oude beeldbuis van zolder te halen: de PlayStation Classic sluit je simpelweg via HDMI aan op je tv!            ',
            'photo_path' => 'photos/playstation-classic.png',
            'is_feature' => true

        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'Game & Watch - The Legend of Zelda',
            'description' => 'Game & Watch: The Legend of Zelda: Dit nieuwe Game & Watch-systeem in retrostijl bevat drie klassieke games uit de Legend of Zelda-serie – The Legend of Zelda, Zelda II: The Adventure of Link en The Legend of Zelda: Link’s Awakening – alsook een speciale versie van de Game & Watch-klassieker Vermin met Link als speelbaar personage. Een speelbare digitale klok gebaseerd op The Legend of Zelda en een speelbare timer met Zelda II: The Adventure of Link-thema zijn ook inbegrepen.',
            'photo_path' => 'photos/Game-Watch-The-Legend-of-Zelda.png',
            'is_feature' => true

        ]);
        Item::create([
            'auction_id' => $auction01->id,
            'name' => 'Evercade VS home console',
            'description' => 'Evercade VS is de nieuwe, retro home console van Evercade. De VS is ontworpen voor gamers en retroliefhebbers om eindeloos (samen) te gamen en het brengt de fysieke retro game-ervaring weer naar de televisie. Evercade VS gebruikt hetzelfde cartridgesysteem als de Evercade Handheld, wat betekent dat er gelijk een groot aanbod retro-gaming beschikbaar is van honderden games. Tevens kan de VS twee cartridges tegelijk hebben voor een grotere spelselectie en ondersteunt het save-states opgeslagen op de cartridges. De VS wordt geleverd met een nieuwe, ergonomisch ontworpen, retro-geïnspireerde controller die ook retro controls schema’s ondersteunt via het D-Pad, vierknops X/Y/A/B controls en de nieuwe uitgebreide bumper controls L1/L2/R1/R2.',
            'photo_path' => 'photos/EVERCADEVS_PREMIUMPACK.png',
            'is_feature' => true

        ]);
        $auction02 = Auction::create([
            'name' => 'Unieke veiling',
            'description' => 'Deze unieke veiling bied u een prachtige auto, lees meer op de info pagina zelf ',
            'start_time' => '2023-06-06 14:00:00',
            'end_time' => '2023-12-06 14:00:00'
        ]);
        $item01 = Item::create([
            'auction_id' => $auction02->id,
            'name' => '1956 Buick Centurion',
            'description' => 'De Buick Centurion uit 1956 was een auto die een blik in de toekomst bood. De rood-witte Centurion droomauto was een spectaculaire coupé voor vier passagiers met een carrosserie van glasvezel en een volledig glazen "panoramadak", en was met name uitgerust met een televisiecamera in de kofferbak. Een ontvanger op het instrumentenpaneel gaf de beelden van de camera weer, waardoor de achteruitkijkspiegel overbodig werd - het allereerste concept van de achteruitrijcamera, zogezegd. De camera was ook gemonteerd in een staartkegel die was geïnspireerd op een straaljager, een terugkerend thema in conceptauto\'s uit de jaren \'50. De Centurion werd geleverd met andere bekend klinkende standaardvoorzieningen, zoals een 325 pk V8-motor, automatische voorstoelen en stuurwielbedieningsknoppen; het soort voorzieningen dat je zou verwachten in auto\'s die vandaag de dag worden geproduceerd.',
            'photo_path' => 'photos/1956-Buick-Centurion.jpg',
            'is_feature' => true

        ]);
        Bid::create([
            'user_id' => $user01->id,
            'item_id' => $item01->id,
            'value' => 100000
        ]);
        Bid::create([
            'user_id' => $user02->id,
            'item_id' => $item01->id,
            'value' => 150000
        ]);
        Bid::create([
            'user_id' => $user03->id,
            'item_id' => $item01->id,
            'value' => 70000
        ]);
        Bid::create([
            'user_id' => $user04->id,
            'item_id' => $item01->id,
            'value' => 150000
        ]);
        Bid::create([
            'user_id' => $user05->id,
            'item_id' => $item01->id,
            'value' => 150000
        ]);
    }
}
