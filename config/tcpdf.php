<?php
return [
    // parameters used by this package,
    // words in uppercase letters are defined constants set for TCPDF, but not used there if indicated
    'page_format'           => 'A4', // PDF_PAGE_FORMAT (not used), 'A4' by TCPDF-constructor
    'page_orientation'      => 'L', // Options: P = portrait, L = landscape, PDF_PAGE_ORIENTATION (not used), 'P' by TCPDF-constructor
    'page_units'            => 'mm', // PDF_UNIT (not used), 'mm' by TCPDF-constructor
    'unicode'               => true, // true by TCPDF-constructor
    'encoding'              => 'UTF-8', // 'UTF-8' by TCPDF-constructor
    'font_directory'        => public_path('fonts/vendor/tcpdf/'), // K_PATH_FONTS, default = vendor/tecnickcom/tcpdf/fonts/
    'image_directory'       => public_path('img/'), // K_PATH_IMAGES, default = vendor/tecnickcom/tcpdf/...
    'tcpdf_throw_exception' => true, // K_TCPDF_THROW_EXCEPTION_ERROR, default = false
    'use_class'             => 'App\Helper\MyPDF', // own extended class, default = TCPDFHelper
    'use_original_header'   => true,
    'use_original_footer'   => true,
    'pdfa'                  => false, // Options: false, 1, 3, default = false by TCPDF-constructor

    // MyPDF settings (not set here before)
    // 'page_break_auto'             => true, // default = true in TCPDF-constructor
    // 'font_name_main'      => 'helvetica', // PDF_FONT_NAME_MAIN, default 'helvetica' in TCPDF-constructor
    // 'font_size_main'      => 12, // PDF_FONT_SIZE_MAIN = 10 (not used, 12 in TCPDF-constructor)

    // 'header_on'           => true, // default true
    'header_font'         => 'helvetica', // default see PDF_FONT_NAME_MAIN
    'header_font_size'    => 10, // 12 in TCPDF-constructor
    'header_logo'         => 'wbl-logo-pdf.png', // PDF_HEADER_LOGO (not used)
    'header_logo_width'   => 11, // PDF_HEADER_LOGO_WIDTH = 30 (not used)
    'header_title'        => 'Speiseplan', // PDF_HEADER_TITLE (not used)
    'header_string'       => '', // PDF_HEADER_STRING (not used)
    'margin_header'       => 5, // PDF_MARGIN_HEADER = 5 (not used)

    'footer_on'           => true, // default false
    'footer_font'         => 'helvetica', // default see PDF_FONT_NAME_MAIN
    'footer_font_size'    => 8, // 12 in TCPDF-constructor
    'margin_footer'       => 10, // PDF_MARGIN_FOOTER = 10 (not used)

    'margin_top'          => 25, // PDF_MARGIN_TOP = 27 (not used)
    'margin_bottom'       => 10, // PDF_MARGIN_BOTTOM = 25 (not used)
    'margin_left'         => 20, // PDF_MARGIN_LEFT = 15 (not used)
    'margin_right'        => 20, // PDF_MARGIN_RIGHT = 15 (not used)

    'creator'             => 'wir bringen lecker - Bestellsystem', // PDF_CREATOR (not used)
    'author'              => 'wir bringen lecker', // PDF_AUTHOR (not used)

    // default see vendor/tecnickcom/tcpdf/tcpdf_autoconfig.php or
    // https://raw.githubusercontent.com/tecnickcom/TCPDF/master/config/tcpdf_config.php
    // See more info at the tcpdf_config.php file in TCPDF (if you do not set this here, TCPDF will use its default)
    // the following uppercase constants can be set for TCPDF, but are not used there if indicated

    //    'path_main'           => '', // K_PATH_MAIN = vendor/tecnickcom/tcpdf/
    //    'path_url'            => '', // K_PATH_URL
    //    'path_cache'          => '', // K_PATH_CACHE
    //    'blank_image'         => '', // K_BLANK_IMAGE = '_blank.png'
    //    'font_name_data'      => '', // PDF_FONT_NAME_DATA (not used)
    //    'font_size_data'      => '', // PDF_FONT_SIZE_DATA (not used)
    //    'foto_monospaced'     => '', // PDF_FONT_MONOSPACED = 'courier' (not used)
    //    'image_scale_ratio'   => 4, // PDF_IMAGE_SCALE_RATIO = 1.25 (not used)
    //    'head_magnification'  => 1.1, // HEAD_MAGNIFICATION = 1.1 (not used)
    //    'cell_height_ratio'   => '', // K_CELL_HEIGHT_RATIO = 1.25
    //    'title_magnification' => 1.3, // K_TITLE_MAGNIFICATION = 1.3 (not used)
    //    'small_ratio'         => '', // K_SMALL_RATIO = 2/3
    //    'thai_topchars'       => '', // K_THAI_TOPCHARS = true
    //    'tcpdf_calls_in_html' => '', // K_TCPDF_CALLS_IN_HTML = false
    //    'timezone'            => '', // K_TIMEZONE = 'UTC' @date_default_timezone_get() (not used)
    //    'allowed_tags'        => '', // K_ALLOWED_TCPDF_TAGS = ''


];
