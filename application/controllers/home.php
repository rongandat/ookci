<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['menu_config'] = $this->menu_config_1;
    }

    public function index() {
        // get newest rates	
        $url = 'http://docs.ookcash.com/api/get_tag_posts/';
        $fields = array(
            'slug' => $this->configs['API_POST_HOMEPAGE']
        );
        $tags = json_decode(curl_get($url, $fields));
        $posts = array();
        foreach ($tags->posts as $post) {
            $data = array(
                'href' => $post->url,
                'title' => $post->title,
                'content' => substr(strip_tags($post->content), 0, 175),
                'thumbnail' => $post->thumbnail,
            );
            $posts[] = $data;
        }

        $this->data['posts'] = $posts;

        $post_info_url = 'http://docs.ookcash.com/api/get_page/';
        $post_info_fields = array(
            'slug' => $this->configs['API_POST_BANNER']
        );
        $post_info_object = json_decode(curl_get($post_info_url, $post_info_fields));
        $post_info = array(
            'href' => $post_info_object->page->url,
            'title' => $post_info_object->page->title,
            'content' => $post_info_object->page->content,
        );

        $this->data['post_info'] = $post_info;

        $this->view('home');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('home'));
    }

    public function zones() {
        $this->load->model('countries_model', 'countries');
        $this->load->model('zone_model', 'zone');
        
        $zones = $this->zone->getZones($this->input->post('country_id'));
        $states_html = '<option>-- Select State/Region --</option>';
        foreach ($zones as $zone) {
            $states_html .='<option label"' . $zone['zone_id'] . '" value="' . $zone['zone_id'] . '">' . $zone['zone_name'] . '</option>';
        }
        echo $states_html;
       
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */