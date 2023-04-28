<?php

namespace App\Http\Controllers;
use SimplePie\Item;

use Illuminate\Http\Request;

class RSSController extends Controller
{
    public function index(){
         // Tạo đối tượng SimplePie
    $feed = new \SimplePie();
    $feed->set_feed_url('https://tuoitre.vn/rss/cong-nghe.rss');
    $feed->init();
    $feed->handle_content_type();

    // Lấy danh sách các bài báo từ RSS feed
    $items = $feed->get_items();

    // Lặp qua danh sách các bài báo để lấy thông tin cần thiết
    $news = [];
    foreach ($items as $item) {
        $title = $item->get_title();
        $link = $item->get_permalink();
        $description = $item->get_description();
        $image = null;
        if ($enclosure = $item->get_enclosure()) {
            $image = $enclosure->get_link();
        }
        $pubDate = $item->get_date('Y-m-d H:i:s');

        // Thêm thông tin của bài báo vào mảng $news
        $news[] = [
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'image' => $image,
            'pubDate' => $pubDate,
        ];
    }
    dd($news);
    // Trả về mảng chứa thông tin của các bài báo
    return view('index', compact('news'));
    }
}
