<?php
namespace Tests\Oxid\Page;

class Startpage
{
    // include url of current page
    public static $URL = '/';

    public static $searchOpener = '#menu-item-search > a';
    public static $searchInput = '#s';
    public static $searchButton = '#searchsubmit';

    public static $searchResultPageHeadline = 'h4.extra-mini-title';
    public static $searchResultItemHeadlines = 'h2.post-title';
    public static $searchResultInput = '#searchform > div > input[type="text"]:nth-child(2)';
}
