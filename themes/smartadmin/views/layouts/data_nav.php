<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
/*navigation array config

ex:
"dashboard" => array(
    "title" => "Display Title",
    "url" => "http://yoururl.com",
    "icon" => "fa-home"
    "label_htm" => "<span>Add your custom label/badge html here</span>",
    "sub" => array() //contains array of sub items with the same format as the parent
)

*/
if( Yii::app()->user->isGuest) {
        $page_nav = array(
            "dashboard" => array(
                "title" => "Dashboard",
                "url" => "dashboard/",
                "icon" => "fa-home"
            ),    
                "menu1" => array(
                "title" => "A. Entri IKM",        
                "icon" => "fa-edit",
                "url" => "hasilsurvey/"
            ),
           /* "menu2" => array(
                "title" => "B. Laporan IKM",     
                "icon" => "fa-file-text-o",
                "url" => "ajax/laporan.php"
            ),
            "menu3" => array(
                "title" => "C. Laporan Responden",     
                "icon" => "fa-file-o",
                "url" => "ajax/responden.php"
            ),
            "menu4" => array(
                "title" => "D. Grafik",     
                "icon" => "fa-bar-chart-o",
                "url" => "ajax/grafik.php"
            )*/

        );
}

else {
    $page_nav = array(
            "dashboard" => array(
                "title" => "Dashboard",
                "url" => "ajax/dashboard.php",
                "icon" => "fa-home"
            ),    
                "menu1" => array(
                "title" => "A. Olah Data",        
                "icon" => "fa-file-text-o",
                "sub" => array(
                    "ref_saran" => array(
                        "title" => "A.1. Saran",
                        "icon" => "fa-comment",
                        "url" => "ajax/olahdata/saran.php"
                        ),
                    "ref_pertanyaan" => array(
                        "title" => "A.2. Setting Pertanyaan Jawab",
                        "icon" => "fa-book",
                        "url" => "ajax/olahdata/pertanyaan.php"
                        ),
                    )
                
            ),

            "menu2" => array(
                "title" => "B. Olah Data Responden",     
                "icon" => "fa-file-text-o",
                "url" => "ajax/responden.php"
              ),    
                "menu3" => array(
                "title" => "C. Setting Refrensi",        
                "icon" => "fa-file-text-o",
                "sub" => array(
                    "ref_saran" => array(
                        "title" => "C.1. Jenis Izin",
                        "icon" => "fa-comment",
                        "url" => "ajax/setting/jenis.php"
                        ),
                    "ref_pertanyaan" => array(
                        "title" => "C.2. Setting Loket",
                        "icon" => "fa-book",
                        "url" => "ajax/setting/loket.php"
                        ),
                    )
                
            ),

        );
}

if(!Yii::app()->user->isGuest) {
    $page_nav = $this->menu;
}
else {
    $page_nav = array();
}


?>

