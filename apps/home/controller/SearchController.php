<?php
/**
 * @copyright (C)2016-2099 Hnaoyun Inc.
 * @license This is not a freeware, use is subject to license terms
 * @author XingMeng
 * @email hnxsh@foxmail.com
 * @date 2018年3月7日
 *  
 */
namespace app\home\controller;

use core\basic\Controller;
use app\home\model\ParserModel;

class SearchController extends Controller
{

    protected $parser;

    protected $model;

    public function __construct()
    {
        $this->parser = new ParserController();
        $this->model = new ParserModel();
    }

    public function index()
    {
        $content = parent::parser('search.html'); // 框架标签解析
        $content = $this->parser->parserSpecialPageSortLabel($content, 0, '搜索结果', url('/home/Search/index')); // 解析分类标签
        $content = $this->parser->parserSearchLabel($content); // 搜索结果标签
        $content = $this->parser->parserCommom($content); // CMS公共标签解析
        $this->cache($content, true);
    }
}