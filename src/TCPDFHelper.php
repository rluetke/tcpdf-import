<?php

namespace Rluetke\TCPDF;

use Illuminate\Support\Facades\Config;
use setasign\Fpdi\Tcpdf\Fpdi;

class TCPDFHelper extends Fpdi
{
    protected $headerCallback; // for alternative PDF header

    protected $footerCallback; // for alternative PDF footer

    protected $template_id = 0; // for imported PDF

    public function __construct()
    {
        parent::__construct(
            Config::get('tcpdf.page_orientation', 'P'),
            Config::get('tcpdf.page_units', 'mm'),
            Config::get('tcpdf.page_format', 'A4'),
            Config::get('tcpdf.unicode', true),
            Config::get('tcpdf.encoding', 'UTF-8'),
            false, // Diskcache is deprecated
            Config::get('tcpdf.pdfa', false)
        );

        // default margin settings
        $this->setMargins(
            Config::get('tcpdf.margin_left'),
            Config::get('tcpdf.margin_top'),
            Config::get('tcpdf.margin_right')
        );

        $this->setAutoPageBreak(
            Config::get('tcpdf.page_break_auto', true),
            Config::get('tcpdf.margin_footer')
        );

        // default page font
        $this->setFont(
            Config::get('tcpdf::font_name_main', 'helvetica'),
            '',
            Config::get('tcpdf::font_size_main', 12)
        );

        $this->setDocumentProperties();
        $this->headerSettings();
        $this->footerSettings();

        // $this->setImageScale(Config::get('tcpdf.image_scale_ratio'));
    }

    protected function setDocumentProperties()
    {
        $this->SetCreator(Config::get('tcpdf.creator'));
        $this->SetAuthor(Config::get('tcpdf.author'));
    }

    protected function headerSettings()
    {
        if (Config::get('tcpdf.header_on', false) == false ) {
            $this->setPrintHeader(false);
            return;
        }
        $this->setPrintHeader(true);

        $this->setHeaderFont(array(
            Config::get('tcpdf.header_font', PDF_FONT_NAME_MAIN),
            '',
            Config::get('tcpdf.header_font_size', 12)
        ));

        $this->setHeaderMargin(
            Config::get('tcpdf.margin_header')
        );

        $this->setHeaderData(
            Config::get('tcpdf.header_logo', ''),
            Config::get('tcpdf.header_logo_width', 0),
            Config::get('tcpdf.header_title', ''),
            Config::get('tcpdf.header_string', '')
        );
    }

    protected function footerSettings()
    {
        if (Config::get('tcpdf.footer_on', false) == false ) {
            $this->setPrintFooter(false);
            return;
        }
        $this->setPrintFooter(true);

        $this->setFooterFont(array(
            Config::get('tcpdf.footer_font', PDF_FONT_NAME_MAIN),
            '',
            Config::get('tcpdf.footer_font_size', PDF_FONT_SIZE_MAIN)
        ));

        $this->setFooterMargin(
            Config::get('tcpdf.margin_footer')
        );
    }


    public function setHeaderText($ht='', $hs='') {
        $this->header_title = $ht;
        $this->header_string = $hs;
    }

    public function Header()
    {
        if ($this->headerCallback != null && is_callable($this->headerCallback)) {
            $cb = $this->headerCallback;
            $cb($this);
        } else {
            if (Config::get('tcpdf.header_on', true)) {
                parent::Header();
            }
        }
    }

    public function Footer()
    {
        if ($this->footerCallback != null && is_callable($this->footerCallback)) {
            $cb = $this->footerCallback;
            $cb($this);
        } else {
            if (Config::get('tcpdf.footer_on', false)) {
                parent::Footer();
            }
        }
    }

    public function setHeaderCallback($callback)
    {
        $this->headerCallback = $callback;
    }

    public function setFooterCallback($callback)
    {
        $this->footerCallback = $callback;
    }

    /**
     * PDF-Import template
     * set fonts_directory in config/tcpdf.php
     *
     * @param string $file PDF file name
     *
     * @return false|int Index of imported page - to use with Fpdi()
     * @throws Exception
     */
    public function importPDF($file)
    {
        $fontfile = \TCPDF_FONTS::getFontFullPath($file); // public\packages\maxxscho\laravel-tcpdf\fonts
        if (empty($fontfile))
            $this->Error('Could not find import file: '.$file.'');

        // $import = new TCPDI(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // @link https://github.com/Setasign/FPDI
        $pagecount = $this->setSourceFile($fontfile);
        if ($pagecount != 1)
            $this->Error('import error: '.$pagecount.' pages found!');

        $this->template_id = $this->importPage(1);
        // $this->useTemplate($idx);

        return $this->template_id;
    }

    public function usePdfTemplate()
    {
        if ($this->template_id > 0) {
            $this->useTemplate($this->template_id);
        }
    }


    public function addTOC($page = '', $numbersfont = '', $filler = '.', $toc_name = 'TOC', $style = '', $color = array(0, 0, 0))
    {
        // sort bookmarks before generating the TOC
        parent::sortBookmarks();

        parent::addTOC($page, $numbersfont, $filler, $toc_name, $style, $color);
    }

    public function addHTMLTOC($page = '', $toc_name = 'TOC', $templates = array(), $correct_align = true, $style = '', $color = array(0, 0, 0))
    {
        // sort bookmarks before generating the TOC
        parent::sortBookmarks();

        parent::addHTMLTOC($page, $toc_name, $templates, $correct_align, $style, $color);
    }

    public function checkPageBreak($h = 0, $y = null, $addpage = true)
    {
        parent::checkPageBreak($h, $y, $addpage);
    }

    public function getPageBreakTrigger()
    {
        return $this->PageBreakTrigger;
    }

    public function disableTcpdfLink()
    {
        // disable tcpdf metalink *sigh*
        $this->tcpdflink = false;
    }
}
