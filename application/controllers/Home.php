<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    /**
     * Variables
     */
    public $viewFolder = "";
    public $viewData = "";
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "home_v";
        $this->viewData = new stdClass();
        (!empty(get_cookie("lang")) ? get_cookie("lang") : "tr");
        $this->viewData->lang = (!empty(get_cookie("lang")) ? get_cookie("lang") : "tr");
        if (empty(get_cookie("lang", true)) || !isset($_COOKIE["lang"])) :
            set_cookie("lang", "tr", strtotime("+1 Year"));
        endif;
        $this->viewData->languageJSON = json_decode(file_get_contents(base_url("panel/assets/language/{$this->viewData->lang}.json")), true);
        $this->viewData->settings = $this->general_model->get("settings", null, ["isActive" => 1, "lang" => $this->viewData->lang]);
        $allLanguages = $this->general_model->get_all("settings", null, "rank ASC", ["isActive" => 1]);
        $languages = [];
        foreach ($allLanguages as $key => $value) :
            array_push($languages, $value->lang);
        endforeach;
        $locales = $this->general_model->get("languages", where: ["code" => $this->viewData->lang]);
        setlocale(LC_ALL, $locales->name);
        $this->viewData->menus = $this->show_tree('HEADER', $this->viewData->lang);
        $this->viewData->mobileMenus = $this->show_tree('MOBILE', $this->viewData->lang);
        $this->viewData->rightMenus = $this->show_tree('HEADER_RIGHT', $this->viewData->lang);
        $this->viewData->footer_menus = $this->show_tree('FOOTER', $this->viewData->lang);
        $this->viewData->languages = $languages;
        $this->viewData->stories = $this->general_model->get_all("stories", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->story_items = $this->general_model->get_all("story_items", null, "rank ASC", ["isActive" => 1, "lang" => $this->viewData->lang]);
        /**
         * Footer Services
         */
        $this->viewData->footerServices = $this->general_model->get_all("services", null, "rank ASC", ["isActive" => 1], [], [], [7]);
        foreach ($this->viewData->footerServices as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->footerServices[$key]->$k = json_decode($v);
                else :
                    $this->viewData->footerServices[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;
    }
    /**
     * Render
     */
    public function render()
    {
        $this->load->view("includes/head", (array)$this->viewData);
        $this->load->view("includes/header");
        $this->load->view($this->viewFolder);
        $this->load->view("includes/footer");
    }
    /**
     * Error 
     */
    public function error()
    {
        $this->viewFolder = "404_v/index";
        $this->render();
    }
    /**
     * Index
     */
    public function index()
    {
        /**
         * JSON DECODING
         * =============
         */

        /**
         * News
         */
        $this->viewData->news = $this->general_model->get_all("news", null, "id DESC", ['isActive' => 1], [], [], [6]);
        foreach ($this->viewData->news as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->news[$key]->$k = json_decode($v);
                else :
                    $this->viewData->news[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;

        /**
         * Testimonials
         */
        $this->viewData->testimonials = $this->general_model->get_all("testimonials", null, "id DESC", ["isActive" => 1], [], [], [6]);
        foreach ($this->viewData->testimonials as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->testimonials[$key]->$k = json_decode($v);
                else :
                    $this->viewData->testimonials[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;

        /**
         * Slides
         */
        $this->viewData->slides = $this->general_model->get_all("slides", null, "rank ASC", ["isActive" => 1]);
        foreach ($this->viewData->slides as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->slides[$key]->$k = json_decode($v);
                else :
                    $this->viewData->slides[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;

        /**
         * Ads
         */
        $this->viewData->ads = $this->general_model->get_all("ads", null, "rank ASC", ["isActive" => 1]);
        foreach ($this->viewData->ads as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->ads[$key]->$k = json_decode($v);
                else :
                    $this->viewData->ads[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;

        /**
         * News Categories
         */
        $this->viewData->news_categories = $this->general_model->get_all("news_categories", null, "rank ASC", ["isActive" => 1]);
        foreach ($this->viewData->news_categories as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->news_categories[$key]->$k = json_decode($v);
                else :
                    $this->viewData->news_categories[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;

        /**
         * Services
         */
        $this->viewData->services = $this->general_model->get_all("services", null, "rank ASC", ["isActive" => 1], [], [], [6]);
        foreach ($this->viewData->services as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->services[$key]->$k = json_decode($v);
                else :
                    $this->viewData->services[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;

        /**
         * JSON DECODING END
         * =================
         */

        $this->viewData->homeGallery = $this->general_model->get("galleries", null, ["id" => 1, "isActive" => 1]);
        $this->viewData->homeGalleryItems = $this->general_model->get_all("images", null, "rank ASC", ["gallery_id" => 1, "isActive" => 1, "lang" => $this->viewData->lang]);
        $this->viewData->homeDepartmentsGallery = $this->general_model->get("galleries", null, ["id" => 2, "isActive" => 1]);
        $this->viewData->homeDepartmentsGalleryItems = $this->general_model->get_all("images", null, "rank ASC", ["gallery_id" => 2, "isActive" => 1, "lang" => $this->viewData->lang]);
        $this->viewData->simpleGallery = $this->general_model->get("galleries", null, ["id" => 8, "isActive" => 1]);
        $this->viewData->simpleGalleryItems = $this->general_model->get_all("images", null, "rank ASC", ["gallery_id" => 8, "isActive" => 1, "lang" => $this->viewData->lang]);


        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url());
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);
        $this->viewFolder = "home_v/index";
        $this->render();
    }
    /**
     * Show Tree
     */
    public function show_tree($position = 'HEADER', $lang = 'tr')
    {
        // create array to store all menus ids
        $store_all_id = array();
        // get all parent menus ids by using isactive
        $id_result = $this->general_model->get_all("menus", null, "rank ASC", ["position" => $position, "isActive" => 1]);
        // loop through all menus to save parent ids $store_all_id array
        foreach ($id_result as $menu_id) {
            array_push($store_all_id, $menu_id->top_id);
        }
        // return all hierarchical tree data from in_parent by sending
        //  initiate parameters 0 is the main parent,news id, all parent ids

        return  $this->in_parent(0, $position, $lang, $store_all_id);
    }
    /**
     * recursive function to loop
     * through all comments and retrieve it
     */
    public function in_parent($in_parent, $position, $lang, $store_all_id)
    {
        // this variable to save all concatenated html
        $html = "";
        // build hierarchy  html structure based on ul li (parent-child) nodes

        if (in_array($in_parent, $store_all_id)) :
            $result = $this->general_model->get_all("menus", null, "rank ASC", ["position" => $position, "top_id" => $in_parent, "isActive" => 1]);
            $html .=  '<ul class="' . ($position == "HEADER" ? ($in_parent == 0 ? null : "sub-menu") : ($position == "HEADER_RIGHT" ? "useful-link" : ($position == "MOBILE" ? ($in_parent == 0 ? "mobile-menu" : "dropdown") : "widget-list"))) . '">';
            foreach ($result as $key => $value) :
                $value->title = (!empty($value->title) ? json_decode($value->title, true)[$lang] : null);
                if (!empty($value->url)) :
                    $value->url = (!empty($value->url) ? json_decode($value->url, true)[$lang] : null);
                endif;
                $html .= '<li ' . ($position == "MOBILE" && $in_parent == $value->top_id ? "class='has-children'" : ($position == "HEADER" && $in_parent == 0 ? "class='has-children'" : null)) . '>';
                if (empty($value->url)) :
                    $page = $this->general_model->get("pages", null, ["isActive" => 1, "id" => $value->page_id]);
                    if ($value->page_id != 0) :
                        if (!empty($page)) :
                            $page->url = (!empty($page->url) ? json_decode($page->url, true)[$lang] : null);
                        endif;
                    endif;
                    if (!empty($page->url)) :
                        $html .= '<a href="' . base_url($this->viewData->languageJSON["routes"]["sayfa"] . "/" . (!empty($page->url) ? $page->url : null)) . '" target="' . $value->target . '" title="' . $value->title . '">' . $value->title . '</a>';
                    else :
                        $html .= '<a href="' . base_url(seo(strto("lower", $value->title))) . '" target="' . $value->target . '" title="' . $value->title . '">' . $value->title . '</a>';
                    endif;
                else :
                    $url = parse_url($value->url, PHP_URL_SCHEME);
                    if ($url == "http" || $url == "https") :
                        $html .= '<a href="' . $value->url . '" target="' . $value->target . '" title="' . $value->title . '">' . $value->title . '</a>';
                    else :
                        $html .= '<a href="' . base_url($value->url) . '" target="' . $value->target . '" title="' . $value->title . '">' . $value->title . '</a>';
                    endif;
                endif;
                $html .= $this->in_parent($value->id, $position, $lang, $store_all_id);
                $html .= "</li>";
            endforeach;
            $html .=  "</ul>";
        endif;

        return $html;
    }
    /**
     * Services
     */
    public function services()
    {
        $seo_url = $this->uri->segment(2);
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url($this->uri->segment(1) . "/{$seo_url}") : base_url($this->uri->segment(1)));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = $this->general_model->rowCount("services", ["isActive" => 1]);
        $config['per_page'] = 12;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->services = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("services", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("services", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]));
        foreach ($this->viewData->services as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->services[$key]->$k = json_decode($v);
                else :
                    $this->viewData->services[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;
        $this->viewData->links = $this->pagination->create_links();

        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["hizmetlerimiz"]));
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);
        if (empty($this->viewData->services)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "services_v/index";
        endif;
        $this->render();
    }
    /**
     * Service Detail
     */
    public function service_detail()
    {
        $seo_url = $this->uri->segment(2);
        $this->viewData->service = $this->general_model->get("services", null, ["isActive" => 1], [], ['url' => '"' . $seo_url . '"']);
        if (!empty($this->viewData->service)) :
            foreach ($this->viewData->service as $key => $data) :
                if (isJson($data)) :
                    $this->viewData->service->$key = json_decode($data);
                else :
                    $this->viewData->service->$key = $data;
                endif;
            endforeach;
        endif;
        $lang = $this->viewData->lang;
        $this->viewData->meta_title = $this->viewData->service->title->$lang;
        $this->viewData->meta_desc  = clean(str_replace("”", "\"", stripslashes($this->viewData->service->content->$lang)));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);
        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["hizmet"] . "/" . $seo_url));
        $this->viewData->og_image           = clean(get_picture("services_v", $this->viewData->service->img_url->$lang));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = $this->viewData->service->title->$lang;
        $this->viewData->og_description           = clean(str_replace("”", "\"", stripslashes($this->viewData->service->content->$lang)));
        if (empty($this->viewData->service)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "service_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * Sectors
     */
    public function sectors()
    {
        $seo_url = $this->uri->segment(2);
        $this->viewData->sectors = $this->general_model->get_all("sectors", null, null, ["isActive" => 1], [], [], []);

        foreach ($this->viewData->sectors as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->sectors[$key]->$k = json_decode($v);
                else :
                    $this->viewData->sectors[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;

        $lang = $this->viewData->lang;
        $this->viewData->links = $this->pagination->create_links();

        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["sektorler"]));
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);

        if (empty($this->viewData->sectors)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "sectors_v/index";
        endif;
        $this->render();
    }
    /**
     * Pages
     */
    public function page()
    {
        $seo_url = $this->uri->segment(2);
        $this->viewData->item = $this->general_model->get("pages", null, ["isActive" => 1], [], ['url' => '"' . $seo_url . '"']);
        $lang = $this->viewData->lang;
        $this->viewData->meta_title = json_decode($this->viewData->item->title)->$lang;
        $this->viewData->meta_desc  = clean(str_replace("”", "\"", stripslashes(json_decode($this->viewData->item->content)->$lang)));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);
        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["sayfa"] . "/" . $seo_url));
        $this->viewData->og_image           = clean(get_picture("pages_v", json_decode($this->viewData->item->img_url)->$lang));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = json_decode($this->viewData->item->title)->$lang;
        $this->viewData->og_description           = clean(str_replace("”", "\"", stripslashes(json_decode($this->viewData->item->content)->$lang)));
        if (empty($this->viewData->item)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "page_v/index";
        endif;
        $this->render();
    }
    /**
     * News
     */
    public function news()
    {
        $seo_url = $this->uri->segment(2);
        $category_id = null;
        $category = null;
        if (!empty($seo_url) && !is_numeric($seo_url)) :
            $category = $this->general_model->get("news_categories", null, ["isActive" => 1], [], ["seo_url" => $seo_url]);
            if (!empty($category)) :
                $category_id = $category->id;
                $category->seo_url = (!empty($category->seo_url) ? json_decode($category->seo_url, true)[$this->viewData->lang] : null);
                $category->title = (!empty($category->title) ? json_decode($category->title, true)[$this->viewData->lang] : null);
            endif;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url($this->uri->segment(1) . "/{$seo_url}") : base_url($this->uri->segment(1)));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("news", ["isActive" => 1, "category_id" => $category_id]) : $this->general_model->rowCount("news", ["isActive" => 1,]));
        $config['per_page'] = 12;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;
        $this->viewData->news_category = $category;
        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->news = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("news", null, null, ['category_id' => $category_id, "isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("news", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]));
        foreach ($this->viewData->news as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->news[$key]->$k = json_decode($v);
                else :
                    $this->viewData->news[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;
        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["haberler"]));
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);
        $this->viewData->links = $this->pagination->create_links();
        if (empty($this->viewData->news)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "news_v/index";
        endif;
        $this->render();
    }
    /**
     * News Detail
     */
    public function news_detail($seo_url)
    {
        $this->viewData->news = $this->general_model->get("news", null, ["isActive" => 1], [], ['seo_url' => '"' . $seo_url . '"']);
        if (!empty($this->viewData->news)) :
            foreach ($this->viewData->news as $key => $data) :
                if (isJson($data)) :
                    $this->viewData->news->$key = json_decode($data);
                else :
                    $this->viewData->news->$key = $data;
                endif;
            endforeach;
        endif;
        if (!empty($this->viewData->news->category_id)) :
            $this->viewData->category = $this->general_model->get("news_categories", null, ["id" => $this->viewData->news->category_id, "isActive" => 1]);
        endif;
        $lang = $this->viewData->lang;
        $this->viewData->meta_title = $this->viewData->news->title->$lang;
        $this->viewData->meta_desc  = clean(str_replace("”", "\"", stripslashes($this->viewData->news->content->$lang)));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);
        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["sayfa"] . "/" . $seo_url));
        $this->viewData->og_image           = clean(get_picture("news_v", $this->viewData->news->img_url->$lang));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = $this->viewData->news->title->$lang;
        $this->viewData->og_description           = clean(str_replace("”", "\"", stripslashes($this->viewData->news->content->$lang)));
        if (empty($this->viewData->news)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "news_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * Galleries
     */
    public function galleries()
    {
        $seo_url = $this->uri->segment(2);
        if (!empty($seo_url) && !is_numeric($seo_url)) :
            $gallery_id = $this->general_model->get("galleries", null, ["isActive" => 1, "isCover" => 0], [], ["url" => $seo_url])->id;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("galeriler/{$seo_url}") : base_url("galeriler"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("galleries", ["isActive" => 1, "isCover" => 0, "gallery_id" => $gallery_id]) : $this->general_model->rowCount("galleries", ["isActive" => 1,]));
        $config['per_page'] = 12;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->galleries = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("galleries", null, null, ['gallery_id' => $gallery_id, "isCover" => 0, "isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("galleries", null, null, ["isActive" => 1, "isCover" => 0], [], [], [$config["per_page"], $offset]));
        foreach ($this->viewData->galleries as $key => $data) :
            foreach ($data as $k => $v) :
                if (isJson($v)) :
                    $this->viewData->galleries[$key]->$k = json_decode($v);
                else :
                    $this->viewData->galleries[$key]->$k = $v;
                endif;
            endforeach;
        endforeach;
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["galeriler"]));
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);
        if (empty($this->viewData->galleries)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "galleries_v/index";
        endif;
        $this->render();
    }
    /**
     * Gallery Detail
     */
    public function gallery_detail($seo_url)
    {
        $this->viewData->gallery = $this->general_model->get("galleries", null, ["isActive" => 1], [], ['url' => '"' . $seo_url . '"']);
        if (!empty($this->viewData->gallery)) :
            foreach ($this->viewData->gallery as $key => $data) :
                if (isJson($data)) :
                    $this->viewData->gallery->$key = json_decode($data);
                else :
                    $this->viewData->gallery->$key = $data;
                endif;
            endforeach;
        endif;
        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["galeri"] . "/" . $seo_url));
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);
        $this->viewData->gallery_items = $this->general_model->get_all("{$this->viewData->gallery->gallery_type}", null, "rank ASC", ["gallery_id" => $this->viewData->gallery->id, "isActive" => 1, "lang" => $this->viewData->lang]);
        if (empty($this->viewData->gallery_items)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "gallery_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * Contact
     */
    public function contact()
    {
        $this->viewFolder = "contact_v/index";
        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["iletisim"]));
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);
        $this->render();
    }
    /**
     * Contact Form
     */
    public function contact_form()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => $this->viewData->languageJSON["contactForm"]["errorMessageTitleText"]["value"], "message" => $this->viewData->languageJSON["contactForm"]["emptyMessageText"]["value"] . " \"{$key}\" " . $this->viewData->languageJSON["contactForm"]["emptyMessageText2"]["value"]]);
            die();
        else :
            $email_message = "\"" . $data['full_name'] . "\" İsimli ziyaretçi yeni mesaj gönderdi. \n <b>Ad Soyad : </b> " . $data["full_name"] . "\n <b>Telefon : </b> " . $data["phone"] . "\n <b>E-mail : </b> " . $data["email"] . "\n <b>Konu : </b>" . $data["subject"] . "\n <b>Mesaj : </b>" . $data["comment"];
            if (send_emailv2(null, "Yeni Bir Mesajınız Var! | " . $this->viewData->settings->company_name, $email_message, [], $this->viewData->lang)) :
                echo json_encode(["success" => true, "title" => $this->viewData->languageJSON["contactForm"]["successMessageTitleText"]["value"], "message" => $this->viewData->languageJSON["contactForm"]["successMessageText"]["value"]]);
                die();
            else :
                echo json_encode(["success" => false, "title" => $this->viewData->languageJSON["contactForm"]["errorMessageTitleText"]["value"], "message" => $this->viewData->languageJSON["contactForm"]["errorEmailMessageText"]["value"]]);
                die();
            endif;
        endif;
    }
    /**
     * Reservation
     */
    public function reservation()
    {
        $this->viewFolder = "reservation_v/index";
        $this->viewData->meta_title = $this->viewData->settings->company_name;
        $this->viewData->meta_desc  = str_replace("”", "\"", stripslashes($this->viewData->settings->meta_description));
        $this->viewData->meta_keyw  = clean($this->viewData->settings->meta_keywords);

        $this->viewData->og_url                 = clean(base_url($this->viewData->languageJSON["routes"]["rezervasyon"]));
        $this->viewData->og_image           = clean(get_picture("settings_v", $this->viewData->settings->logo));
        $this->viewData->og_type          = "article";
        $this->viewData->og_title           = clean($this->viewData->settings->company_name);
        $this->viewData->og_description           = clean($this->viewData->settings->meta_description);
        $this->render();
    }
    /**
     * Make Reservation
     */
    public function make_reservation()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => $this->viewData->languageJSON["reservationForm"]["errorMessageTitleText"]["value"], "message" => $this->viewData->languageJSON["reservationForm"]["emptyMessageText"]["value"] . " \"{$key}\" " . $this->viewData->languageJSON["reservationForm"]["emptyMessageText2"]["value"]]);
            die();
        else :
            $email_message = "\"" . $data['full_name'] . "\" İsimli ziyaretçi yeni bir rezervasyon oluşturdu. \n <b>Ad Soyad : </b> " . $data["full_name"] . "\n <b>Telefon : </b> " . $data["phone"] . "\n <b>E-mail : </b> " . $data["email"] . "\n <b>Giriş Tarihi : </b> " . $data["checkin"] . "\n <b>Çıkış Tarihi : </b> " . $data["checkout"] . "\n <b> Kişi Sayısı : </b> " . $data["personcount"];
            if (send_emailv2(null, "Yeni Bir Rezervasyonunuz Var! | " . $this->viewData->settings->company_name, $email_message, [], $this->viewData->lang)) :
                if ($this->general_model->add("reservations", $data)) :
                    echo json_encode(["success" => true, "title" => $this->viewData->languageJSON["reservationForm"]["successMessageTitleText"]["value"], "message" => $this->viewData->languageJSON["reservationForm"]["successMessageText"]["value"]]);
                    die();
                else :
                    echo json_encode(["success" => false, "title" => $this->viewData->languageJSON["reservationForm"]["errorMessageTitleText"]["value"], "message" => $this->viewData->languageJSON["reservationForm"]["errorMessageText"]["value"]]);
                    die();
                endif;
            else :
                echo json_encode(["success" => false, "title" => $this->viewData->languageJSON["reservationForm"]["errorMessageTitleText"]["value"], "message" => $this->viewData->languageJSON["reservationForm"]["errorEmailMessageText"]["value"]]);
                die();
            endif;
        endif;
    }
    /**
     * Change Language
     */
    public function switchLanguage()
    {
        if (!empty($this->input->post("lang"))) :
            $lang = $this->input->post("lang");
        else :
            $lang = "tr";
        endif;
        set_cookie("lang", $lang, strtotime("+1 year"));
        redirect(base_url());
    }
}
