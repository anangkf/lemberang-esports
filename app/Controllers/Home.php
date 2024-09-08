<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['isLoggedIn'] = auth()->loggedIn();

        $data['tournaments'] = [
          ["id" => 1, "name" => "League of Legends World Championship", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIe9oqSqALyMSr3kMBA4lJJlnOz4wJBpnKNw&s", "start_date" => "October 10, 2024"],
          ["id" => 2, "name" => "Dota 2 The International", "image" => "https://www.blibli.com/friends-backend/wp-content/uploads/2023/12/B1100936-Cover-Juara-The-International-DOTA-2-1536x806.jpg", "start_date" => "August 15, 2024"],
          ["id" => 3, "name" => "CS:GO Major Championship", "image" => "https://res.cloudinary.com/pley-gg/image/upload/c_fill,w_900/v1/teams/astralis/Copyright_-_Bart-Oerbekke_-_astralis4_rgezkp", "start_date" => "November 1, 2024"],
        ];

        $data['popular_news'] = [
          [
            "id" => 1, 
            "title" => "Mobile Legends Tournament 2024 Announced", 
            "image" => "https://www.adobomagazine.com/wp-content/uploads/2024/01/Bang-Bang-Esports-unveils-2024-Roadmap-HERO.jpg", 
            "description" => "The biggest Mobile Legends tournament is back with exciting new rules and huge prizes.", 
            "category" => "Mobile Legends", 
            "date_posted" => "September 1, 2024"
          ],[
            "id" => 2, 
            "title" => "PUBG Mobile Pro League: New Champions Crowned", 
            "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzSYtXl4pUceAIG_-R-9F_eJ0DaJkWbjXChw&s", 
            "description" => "The latest PUBG Mobile Pro League wrapped up with a thrilling finale as new champions emerge.", 
            "category" => "PUBG Mobile", 
            "date_posted" => "August 29, 2024"
          ],[
            "id" => 3, 
            "title" => "eFootball 2024 Season Kickoff Update", 
            "image" => "https://staticg.sportskeeda.com/editor/2024/04/da58a-17128455260023-1920.jpg?w=640", 
            "description" => "Konami has released a major update to kickstart the new eFootball 2024 season.", 
            "category" => "eFootball", 
            "date_posted" => "August 15, 2024"
          ],
        ];

        $data['latest_news'] = [
          [
            "id" => 1, 
            "title" => "Project NEXT MLBB 2024! Ada Revamp, Item & Hero Baru Zhuxin!", 
            "image" => "https://esports.id/img/article/505720240618214400.png", 
            // "description" => "The biggest Mobile Legends tournament is back with exciting new rules and huge prizes.", 
            // "category" => "Mobile Legends", 
            "date_posted" => "19 June 2024 04:30 WIB"
          ],[
            "id" => 2, 
            "title" => "Rosemary Jadi Carry Andalan Alter Ego, Week 1 2024 PMSL SEA Fall", 
            "image" => "https://esports.id/img/article/391520240821182621.jpg", 
            // "description" => "The latest PUBG Mobile Pro League wrapped up with a thrilling finale as new champions emerge.", 
            // "category" => "PUBG Mobile", 
            "date_posted" => "22 August 2024 16:25 WIB"
          ],[
            "id" => 3, 
            "title" => "Kolaborasi eFootball 2024 x Blue Lock: Hadiah dan update terbaru", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/03/efootball_bluelock_cover-1-1024x576.jpg", 
            // "description" => "Konami has released a major update to kickstart the new eFootball 2024 season.", 
            // "category" => "eFootball", 
            "date_posted" => "1 April 2024 15:26 WIB"
          ],
        ];

        $data['recent_news'] = [
          [
            "id" => 1, 
            "title" => "Jadwal MPL ID S14, format, hasil pertandingan, dan cara menonton", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/06/Fnatic-ONIC-MPL-ID-S13-1024x576.jpeg", 
            "description" => "Jadwal MPL ID S14 dinantikan banyak orang.", 
            "category" => "Mobile Legends", 
            "date_posted" => "1 Jam yang lalu"
          ],[
            "id" => 2, 
            "title" => "Jadwal PMSL SEA Fall 2024 Grand Final, format, hasil dan cara menonton", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/08/452743608_478653785028794_8714964040513232945_n-1024x576.jpg", 
            "description" => "Ikuti jadwal PMSL SEA Fall 2024 bersama ONE Esports.", 
            "category" => "PUBG Mobile", 
            "date_posted" => "1 Jam yang lalu"
          ],[
            "id" => 3, 
            "title" => "Liquid ID suka taunting, SDL: Saya bebaskan, tapi..", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/08/455960257_1228779658136924_2931094299952900434_n-3-1024x576.jpg", 
            "description" => "Liquid ID suka taunting adalah hal normal untuk staf.", 
            "category" => "Mobile Legends", 
            "date_posted" => "5 Jam yang lalu"
          ],[
            "id" => 4, 
            "title" => "Tampil ganas lawan DEWA, Skylar bantah gendong RRQ Hoshi", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/08/Mobile-Legends_SKYLAR-1024x576.jpg", 
            "description" => "Ada alasan teknis yang membuat Skylar seakan-akan telah menggendong RRQ Hoshi.", 
            "category" => "Mobile Legends", 
            "date_posted" => "5 Jam yang lalu"
          ],[
            "id" => 5, 
            "title" => "Istimewa! Statistik RRQ Hoshi lawan Dewa bikin Kingdom bangga", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/08/RRQ_FULLTEAM1-1024x576.jpg", 
            "description" => "Statistik RRQ Hoshi sangat menawan.", 
            "category" => "Mobile Legends", 
            "date_posted" => "7 Jam yang lalu"
          ],[
            "id" => 6, 
            "title" => "RRQ yakin lolos ke PMGC 2024, target besar sang Raja!", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/09/456252170_1165694424730646_1949708146741970758_n-2-1024x576.jpg", 
            "description" => "RRQ yakin lolos ke PMGC 2024, akankah sejarah baru terukir?", 
            "category" => "PUBG Mobile", 
            "date_posted" => "8 Jam yang lalu"
          ],[
            "id" => 7, 
            "title" => "Jadwal EVOS Glory di MPL ID S14", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/08/Mobile-Legends_EVOS-GLory_MPL-ID-S14.jpg", 
            "description" => "Jadwal EVOS Glory di MPL ID S14 ada di sini.", 
            "category" => "Mobile Legends", 
            "date_posted" => "18 Jam yang lalu"
          ],[
            "id" => 8, 
            "title" => "Masalah BOOM Esports di PMSL SEA Fall 2024", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/09/458116541_467449819613131_3462210547716700652_n-1-1024x576.jpg", 
            "description" => "Penjelasan pelatih BOOM Esports di PMSL SEA Fall 2024 terkait masalah dan kendala yang mereka hadapi.", 
            "category" => "PUBG Mobile", 
            "date_posted" => "Sehari yang lalu"
          ],[
            "id" => 9, 
            "title" => "EVOS Glory krisis, ini komentar CW dan Sanz", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/08/EVOS-Glory-MPL-ID-S14-1024x576.jpg", 
            "description" => "EVOS Glory krisis makin menjadi.", 
            "category" => "Mobile Legends", 
            "date_posted" => "Sehari yang lalu"
          ],[
            "id" => 10, 
            "title" => "Mirko: Blacklist aneh, mereka belum move-on", 
            "image" => "https://cdn.oneesports.id/cdn-data/sites/2/2024/09/Blacklist-Intenational-MPL-PH-S14-1-1024x576.jpg", 
            "description" => "Mirko prihatin dengan permasalahan pelik Blacklist International.", 
            "category" => "Mobile Legends", 
            "date_posted" => "2 Hari yang lalu"
          ],
        ];


        return view('pages/home', $data);
    }
}
