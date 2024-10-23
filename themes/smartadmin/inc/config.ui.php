<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Home" => APP_URL
);

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
$page_nav = array(
	"dashboard" => array(
		"title" => "Dashboard",
		"url" => "ajax/dashboard.php",
		"icon" => "fa-home"
	),
	/*"inbox" => array(
		"title" => "Inbox",
		"url" => "ajax/inbox.php",
		"icon" => "fa-inbox",
		"label_htm" => '<span class="badge pull-right inbox-badge">14</span>'
	),*/
	
	/* "YPengaduan" => array(
        "title" => "A. Pengawasan Izin",
        "icon" => "fa-building",
        "sub" => array(
            "pengawasan_rencana_survey_input" => array(
                "title" => "1.1 Jadwal Rencana Survey",
                "url" => "ajax/yk_pengawasan_imb_input.php"
            ),
            "pengawasan_rencana_survey_cetak" => array(
                "title" => "1.2 Form Cetak Rencana Survey",
                "url" => "ajax/yk_pengawasan_imb_cetak.php"
            ),
            "in_berita_acara_survey" => array(
                "title" => "1.3 Form Input Berita Acara Survey",
                "url" => "ajax/yk_in_berita_acara.php"
            ),
            "ctk_berita_acara_survey" => array(
                "title" => "1.4 Form Cetak Berita Acara Survey",
                "url" => "ajax/yk_ctk_berita_acara.php"
            ),
            "frm_in_pemberitahuan" => array(
                "title" => "1.5 Form Pemberitahuan",
                "url" => "ajax/yk_in_pemberitahuan.php"
            ),
            "frm_ctk_pemberitahuan" => array(
                "title" => "1.6 Form Cetak Pemberitahuan",
                "url" => "ajax/yk_ctk_pemberitahuan.php"
            ),
            "frm_in_monitoring1" => array(
                "title" => "1.7.1 Form Input Monitoring Surat Peringatan1",
                "url" => "ajax/yk_in_monitoring1.php"
            ),
			 "frm_in_monitoring2" => array(
                "title" => "1.7.2 Form Input Monitoring Surat Peringatan2",
                "url" => "ajax/yk_in_monitoring2.php"
            ),
			 "frm_in_monitoring3" => array(
                "title" => "1.7.3 Form Input Monitoring Surat Peringatan3",
                "url" => "ajax/yk_in_monitoring3.php"
            ),
            "frm_ctk_monitoring" => array(
                "title" => "1.8 Form Cetak Monitoring Surat Peringatan",
                "url" => "ajax/yk_ctk_monitoring.php"
            ),
            "pengaduan" => array(
                "title" => "Form Pengaduan",
                "url" => "ajax/yk_form_pengaduan.php"
            ),
			
			"detil" => array(
                "title" => "Form Detil Pemeriksaan",
                "url" => "ajax/yk_form_detil_periksa.php"
            ),
			"pelaksanaan" => array(
                "title" => "Form Hasil Pelaksanaan",
                "url" => "ajax/yk_form_hasil_laksana.php"
            ),
			"permasalahan" => array(
                "title" => "Form Permasalahan",
                "url" => "ajax/yk_form_permasalahan.php"
            ),
			"ho" => array(
                "title" => "Form Izin HO atau IMB",
                "url" => "ajax/yk_form_izin_ho_imb.php"
            ),
            
        )
		
    ),*/

    "pengawasan" => array(
        "title" => "A. Pengawasan",
        "icon" => "fa fa-building",
        "sub" => array(
            "peng_perencanaan" => array(
                "title" => "A.1 Rencana Survey",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengawasan_rencana_survey_input" => array(
                    "title" => "A.1.1 Jadwal Survey",
                    "url" => "ajax/yk_pengawasan_imb_input.php"
                ),
                "pengawasan_rencana_survey_cetak" => array(
                    "title" => "A.1.2 Cetak Jadwal",
                    "url" => "ajax/yk_pengawasan_imb_cetak.php"
                )
                    
            )
        ),
            "peng_berita_acara" => array(
                "title" => "A.2 Hasil Survey",
                "icon" => "fa-desktop",
                "sub" => array(
                    "in_berita_acara_survey" => array(
                    "title" => "A.2.1 Survey",
                    "url" => "ajax/yk_in_berita_acara.php"
                ),
                "ctk_berita_acara_survey" => array(
                    "title" => "A.2.2 Cetak Survey",
                    "url" => "ajax/yk_ctk_berita_acara.php"
                )
                    
        ),

    ), //END ARRAY MENU SUB
                "peng_pemberitahuan" => array(
                "title" => "A.3 Pemberitahuan",
                "icon" => "fa-desktop",
                "sub" => array(
                    "frm_in_pemberitahuan" => array(
                    "title" => "A.3.1 Data Surat",
                    "url" => "ajax/yk_in_pemberitahuan.php"
                    ),
                    "frm_ctk_pemberitahuan" => array(
                        "title" => "A.3.2 Cetak Daftar",
                        "url" => "ajax/yk_ctk_pemberitahuan.php"
                    ),
                    
        ),

    ), //END ARRAY MENU SUB
                "peng_monitoring1" => array(
                "title" => "A.4 Monitoring SP1",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_monitoring1" => array(
                    "title" => "A.4.1 Data SP1",
                    "url" => "ajax/yk_in_monitoring1.php"
                ),
                 "frm_in_monitoringctk1" => array(
                    "title" => "A.4.2 Cetak Daftar ",
                    "url" => "ajax/yk_ctk_monitoring1.php"
                ),
                    
        ),

    ), //END ARRAY MENU SUB

                "peng_monitoring2" => array(
                "title" => "A.5 Monitoring SP2",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_monitoring2" => array(
                    "title" => "A.5.1 Data SP2",
                    "url" => "ajax/yk_in_monitoring2.php"
                ),
                 "frm_in_monitoringctk2" => array(
                    "title" => "A.5.2 Cetak Daftar",
                    "url" => "ajax/yk_ctk_monitoring2.php"
                ),
                    
        ),

    ), //END ARRAY MENU SUB
                 "peng_monitoring3" => array(
                "title" => "A.6 Monitoring SP3",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_monitoring3" => array(
                    "title" => "A.6.1 Data SP3",
                    "url" => "ajax/yk_in_monitoring3.php"
                ),
                 "frm_in_monitoringctk3" => array(
                    "title" => "A.6.2 Cetak Daftar",
                    "url" => "ajax/yk_ctk_monitoring3.php"
                ),
                    
        ),

    ), //END ARRAY MENU SUB

                "peng_pencabutan" => array(
                "title" => "A.7 Pencabutan",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_pencabutan" => array(
                    "title" => "A.7.1 Pendataan",
                    "url" => "ajax/yk_pencabutan_pendataan.php"
                ),
                 "frm_in_pencabutan_ctk" => array(
                    "title" => "A.7.2 Cetak Daftar",
                    "url" => "ajax/yk_pencabutan_cetak.php"
                ),
                    
        ),

    ), //END ARRAY MENU SUB
                "peng_stat" => array(
                "title" => "A.8 Statistik",
                "icon" => "fa-desktop",
                "sub" => array(
                   "frm_in_stat" => array(
                    "title" => "A.8.1 Grafik Rekapitulasi",
                    "url" => "ajax/yk_statistik_pengawasan_rekap.php"
                ),
                 "frm_in_stat_ktdk" => array(
                    "title" => "A.8.2 Grafik Ketidaksesuaian",
                    "url" => "ajax/yk_statistik_pengawasan_ketidak.php"
                ),

                 "frm_in_stat_jenis" => array(
                    "title" => "A.8.3 Grafik Jenis Ketidaksesuaian",
                    "url" => "ajax/yk_statistik_pengawasan_jenis.php"
                ),

                    
        ),

    ), //END ARRAY MENU SUB

 )
),
	
    "pengaduan" => array(
        "title" => "B. Pengaduan",
        "icon" => "fa fa-group",
        "sub" => array(
            "pengaduan_1" => array(
                "title" => "B.1 Daftar",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengaduan_input" => array(
                    "title" => "B.1.1 Input Pengaduan",
                    "url" => "ajax/yk_pengaduan_input.php"
                ),
	                "pengaduan_cetak" => array(
	                    "title" => "B.1.2 Cetak Pengaduan",
	                    "url" => "ajax/yk_pengaduan_cetak.php"
	                )
                    
            )
        ), //end of sub menu
           	"pengaduan_2" => array(
                "title" => "B.2 Tindak Lanjut",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengaduan_tindak_lanjut" => array(
                    "title" => "B.2.1 Pengaduan Tindak Lanjut",
                    "url" => "ajax/yk_pengaduan_tindak_lanjut.php"
                ),
					"pengaduan_tindak_lanjut_cetak" => array(
                    "title" => "B.2.2 Cetak Pengaduan Tindak Lanjut",
                    "url" => "ajax/yk_pengaduan_tindak_lanjut_ctk.php"
                ),
	                
	                
                    
            )
        ), //end of submenu

           		"pengaduan_3" => array(
                "title" => "B.3 Statistik",
                "icon" => "fa-desktop",
                "sub" => array(
                    "pengaduan_ber_jenis" => array(
                    "title" => "B.3.1 Berdasarkan Jenis Izin",
                    "url" => "ajax/yk_pengaduan_grafik_jenis.php"
                ),
	                "pengaduan_ber_media" => array(
	                    "title" => "B.3.2 Berdasarkan Media",
	                    "url" => "ajax/yk_pengaduan_grafik_media.php"
	                ),
	                "pengaduan_ber_per" => array(
	                    "title" => "B.3.3 Berdasarkan Permasalahan",
	                    "url" => "ajax/yk_pengaduan_grafik_permasalahan.php"
	                ),
	                
                    
            )
        ), //end of submenu

	)
   ),

/*	"graphs" => array(
		"title" => "Graphs",
		"icon" => "fa-bar-chart-o",
		"sub" => array(
			"flot" => array(
				"title" => "Flot Chart",
				"url" => "ajax/flot.php"
			),
			"morris" => array(
				"title" => "Morris Charts",
				"url" => "ajax/morris.php"
			),
			"inline" => array(
				"title" => "Inline Charts",
				"url" => "ajax/inline-charts.php"
			)
		)
	),
	"tables" => array(
		"title" => "Tables",
		"icon" => "fa-table",
		"sub" => array(
			"normal" => array(
				"title" => "Normal Tables",
				"url" => "ajax/table.php"
			),
			"data" => array(
				"title" => "Data Tables",
				"url" => "ajax/datatables.php"
			)
		)
	),
	"forms" => array(
		"title" => "Forms",
		"icon" => "fa-pencil-square-o",
		"sub" => array(
			"smart_elements" => array(
				"title" => "Smart Form Elements",
				"url" => "ajax/form-elements.php"
			),
            "smart_layout" => array(
				"title" => "Smart Form Layouts",
				"url" => "ajax/form-templates.php"
			),
            "smart_validation" => array(
				"title" => "Smart Form Validation",
				"url" => "ajax/validation.php"
			),
            "bootstrap_forms" => array(
				"title" => "Bootstrap Form Elements",
				"url" => "ajax/bootstrap-forms.php"
			),
            "form_plugins" => array(
				"title" => "Form Plugins",
				"url" => "ajax/plugins.php"
			),
            "wizards" => array(
				"title" => "Wizards",
				"url" => "ajax/wizard.php"
			),
            "bootstrap_editors" => array(
				"title" => "Bootstrap Editors",
				"url" => "ajax/other-editors.php"
			),
            "dropzone" => array(
				"title" => "Dropzone",
				"url" => "ajax/dropzone.php",
                "label_htm" => '<span class="badge pull-right inbox-badge bg-color-yellow">new</span>'
			)
		)
	),
    "ui_elements" => array(
        "title" => "UI Elements",
        "icon" => "fa-desktop",
        "sub" => array(
            "general" => array(
                "title" => "General Elements",
                "url" => "ajax/general-elements.php"
            ),
            "buttons" => array(
                "title" => "Buttons",
                "url" => "ajax/buttons.php"
            ),
            "icons" => array(
                "title" => "Icons",
                "sub" => array(
                    "fa" => array(
                        "title" => "Font Awesome",
                        "icon" => "fa-plane",
                        "url" => "fa.php"
                    ),
                    "glyph" => array(
                        "title" => "Glyph Icons",
                        "icon" => "fa-plane",
                        "url" => "glyph.php"
                    )
                ) 
            ),
            "grid" => array(
                "title" => "Grid",
                "url" => "ajax/grid.php"
            ),
            "tree_view" => array(
                "title" => "Tree View",
                "url" => "ajax/treeview.php"
            ),
            "nestable_lists" => array(
                "title" => "Nestable Lists",
                "url" => "ajax/nestable-list.php"
            ),
            "jquery_ui" => array(
                "title" => "jQuery UI",
                "url" => "ajax/jqui.php"
            )
        )
    ),
	"nav6" => array(
		"title" => "6 Level Navigation",
		"icon" => "fa-folder-open",
		"sub" => array(
			"second_lvl" => array(
				"title" => "2nd Level",
				"icon" => "fa-folder-open",
				"sub" => array(
					"third_lvl" => array(
						"title" => "3rd Level",
						"icon" => "fa-folder-open",
						"sub" => array(
							"file" => array(
								"title" => "File",
								"icon" => "fa-file-text"
							),
							"fourth_lvl" => array(
								"title" => "4th Level",
								"icon" => "fa-folder-open",
								"sub" => array(
									"file" => array(
										"title" => "File",
										"icon" => "fa-file-text"
									),
									"fifth_lvl" => array(
										"title" => "5th Level",
										"icon" => "fa-folder-open",
										"sub" => array(
											"file" => array(
												"title" => "File",
												"icon" => "fa-file-text"
											),
											"file" => array(
												"title" => "File",
												"icon" => "fa-file-text"
											)
										)
									)
								)
							)
						)
					)
				)
			),
			"folder" => array(
				"title" => "Folder",
				"icon" => "fa-folder-open",
				"sub" => array(
					"third_lvl" => array(
						"title" => "3rd Level",
						"icon" => "fa-folder-open",
						"sub" => array(
							"file1" => array(
								"title" => "File",
								"icon" => "fa-file-text"
							),
							"file2" => array(
								"title" => "File",
								"icon" => "fa-file-text"
							)
						)
					)
				)
			)
		)
	),
    "cal" => array(
		"title" => "Calendar",
		"url" => "ajax/calendar.php",
		"icon" => "fa-calendar",
		"icon_badge" => "3"
	),
    "widgets" => array(
		"title" => "Widgets",
		"url" => "ajax/widgets.php",
		"icon" => "fa-list-alt"
	),
    "gallery" => array(
		"title" => "Gallery",
		"url" => "ajax/gallery.php",
		"icon" => "fa-picture-o"
	),
    "gmap_skins" => array(
		"title" => "Google Map Skins",
		"url" => "ajax/gmap-xml.php",
		"icon" => "fa-map-marker",
        "label_htm" => '<span class="badge bg-color-greenLight pull-right inbox-badge">9</span>'
	),
	"misc" => array(
		"title" => "Miscellaneous",
		"icon" => "fa-windows",
		"sub" => array(
            "typo" => array(
				"title" => "Typography",
				"url" => "ajax/typography.php"
			),
            "pricing_tables" => array(
				"title" => "Pricing Tables",
				"url" => "ajax/pricing-table.php"
			),
            "invoice" => array(
				"title" => "Invoice",
				"url" => "ajax/invoice.php"
			),
            "login" => array(
				"title" => "Login",
				"url" => APP_URL."/login.php",
				"ajax" => false
			),
            "register" => array(
				"title" => "Register",
				"url" => APP_URL."/register.php",
				"ajax" => false
			),
            "lock" => array(
				"title" => "Lock Screen",
				"url" => APP_URL."/lock.php",
				"ajax" => false
			),
            "err_404" => array(
				"title" => "Error 404",
				"url" => "ajax/error404.php"
			),
            "err_500" => array(
				"title" => "Error 500",
				"url" => "ajax/error500.php"
			),
			"blank" => array(
				"title" => "Blank Page",
				"icon" => "fa-file",
				"url" => "ajax/blank_.php"
			),
            "email_template" => array(
				"title" => "Email Template",
				"url" => "ajax/email-template.php"
			),
            "search" => array(
				"title" => "Search Page",
				"url" => "ajax/search.php"
			),
            "ck_editor" => array(
				"title" => "CK Editor",
				"url" => "ajax/ckeditor.php"
			),
		)
	),
        "MHarry" => array(
        "title" => "Harry Tables",
        "icon" => "fa-pencil-square-o",
        "sub" => array(
            "basic" => array(
                "title" => "Basic",
                "url" => "ajax/tbl_basic.php"
            ),
            "filter" => array(
                "title" => "Colomb Filter",
                "url" => "ajax/tbl_cf.php"
            ),
            "hideshow" => array(
                "title" => "Hide/Show Colomn",
                "url" => "ajax/tbl_hsc.php"
            ),
            "export_forms" => array(
                "title" => "Export",
                "url" => "ajax/export.php"
            ),
            "costum1" => array(
                "title" => "custom Combination",
                "url" => "ajax/cc.php"
            ),
            "costum2" => array(
                "title" => "Custom Combination2",
                "url" => "ajax/cc1.php"
            ),
            "ref1" => array(
                "title" => "Referesi Form",
                "url" => "ajax/form-edit-pegawai.php"
            ),
            "ref2" => array(
                "title" => "Referesi Icon",
                "url" => "ajax/icon.php"
            ),
            "ref3" => array(
                "title" => "Referesi Tombol",
                "url" => "ajax/tombol.php"
            ),
            "ref4" => array(
                "title" => "Referesi Tahap Entri",
                "url" => "ajax/form-langkah.php"
            ),
            "Alert" => array(
                "title" => "Dialog Alert",
                "url" => "ajax/pesan-alert.php"
            ), 
            "ref4" => array(
                "title" => "Referensi Edit Inline",
                "url" => "ajax/edit-inline.php",
                "label_htm" => '<span class="badge pull-right inbox-badge bg-color-yellow">new</span>'
            )
        )
    ),
            "RSuryo" => array(
        "title" => "Suryo Grafik",
        "icon" => "fa-desktop",
        "sub" => array(
            "Flotbar" => array(
                "title" => "Flot Bar",
                "url" => "ajax/ch_flot_bar.php"
            ),
            "autoupdate" => array(
                "title" => "Auto chart",
                "url" => "ajax/ch_auto_chart.php"
            ),
            "plot" => array(
                "title" => "Plot Chart",
                "url" => "ajax/ch_plot_chart.php"
            ),
            "pie" => array(
                "title" => "Pie Chart",
                "url" => "ajax/ch_pie_chart.php"
            ),
            "stat" => array(
                "title" => "Statistik Chart",
                "url" => "ajax/ch_stat_chart.php"
            ),
            "progress" => array(
                "title" => "Progres Bar",
                "url" => "ajax/el_progress.php"
            ),
            "tabs" => array(
                "title" => " Tab ",
                "url" => "ajax/el_tabs.php"
            ),
            "Modal" => array(
                "title" => "Dialog Notifikasi",
                "url" => "ajax/el_modals.php"
            ),
            "Custom" => array(
                "title" => "Custom Chart",
                "url" => "ajax/ch_costume_chart.php",
                "label_htm" => '<span class="badge pull-right inbox-badge bg-color-yellow">new</span>'
            )
        )
    ),
            "AFahrudin" => array(
        "title" => "Ahmad Slider",
        "icon" => "fa-pencil-square-o",
        "sub" => array(
            "ref1a" => array(
                "title" => "Slider",
                "url" => "ajax/slider.php"
            ),
            "ref2a" => array(
                "title" => "Pop Over",
                "url" => "ajax/popover.php"
            ),
            "ref3a" => array(
                "title" => "Tool Tip",
                "url" => "ajax/tooltip.php",
                "label_htm" => '<span class="badge pull-right inbox-badge bg-color-yellow">new</span>'
            )
        )
    ),
    "others" => array(
        "title" => "Other Pages",
        "icon" => "fa-file",
        "sub" => array(
            "forum" => array(
                "title" => "Forum Layout",
                "url" => "ajax/forum.php"
            ),
            "profile" => array(
                "title" => "Profile",
                "url" => "ajax/profile.php"
            ),
            "timeline" => array(
                "title" => "Timeline",
                "url" => "ajax/timeline.php"
            )
        )
    )*/

);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
?>