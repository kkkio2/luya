<?php

namespace crawler;

/**
 * LUYA Crawler
 * 
 * The Crawler will create an index with all pages based on your defined `baseUrl`. You can run the crawler by using the command
 * 
 * ```sh
 * ./vendor/bin/luya crawler/crawl
 * ```
 * 
 * This will create an index where you can search inside (See helper methods in `crawleradmin\models\Index` to find by query methods).
 * You should run your crawler command by a cronjob to make sure your page will be crawled everynight and the users have a fresh index.
 * 
 * @link https://github.com/FriendsOfPHP/Goutte
 * @link http://api.symfony.com/2.7/Symfony/Component/DomCrawler.html
 * @author nadar
 */
class Module extends \luya\base\Module
{
    /**
     * @var boolean This module enables by default to lookup for view files in the apps/views folder.
     */
    public $useAppViewPath = true;
    
    /**
     * @var boolean Is a LUYA core module.
     */
    public $isCoreModule = true;

    /**
     * @var string The based Url where the crawler should start to lookup for pages, the crawler only allowes
     * links which matches the base url. It doenst matter if you have a trailing slash or not, the module is taking
     * care of this.
     * 
     * So on a localhost your base url could look like this:
     * 
     * ```php
     * 'baseUrl' => 'http://localhost/luya-kickstarter/public_html/',
     * ```
     * 
     * If you are on a production/preproduction server the url in your config could look like this:
     * 
     * ```php
     * 'baseUrl' => 'https://luya.io',
     * ```
     */
    public $baseUrl = null;
    
    /**
     * @var array An array with regular expression (including delimiters) which will be applied to found links so you can
     * filter several urls which should not be followed by the crawler.
     * 
     * Examples:
     * 
     * ```php
     * 'filterRegex' => [
     *     '/\.\//i',           // filter all links with a dot inside
     *     '/agenda\//i',       // filter all pages who contains "agenda/" 
     * ],
     * ```
     */
    public $filterRegex = [];
    
    /**
     * @var array|boolean Define an array of extension where the links should automatically not follow in order to save memory.
     * If you like to disable this feature (small pages) you can set `false`.
     */
    public $doNotFollowExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'tiff', 'bmp', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'csv', 'zip'];
    
    /**
     * @var array E-Mail-Adresses array with recipients for the statistic command
     */
    public $statisticRecipients = [];
}
