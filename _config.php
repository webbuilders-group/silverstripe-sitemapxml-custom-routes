<?php

define('SITEMAP_XML_ROUTES_BASE', basename(dirname(__FILE__)));

if(class_exists('GoogleSitemap')){
    GoogleSitemap::register_dataobject('SitemapXMLCustomRoute', 'yearly');
}else {
    user_error('Sitemap XML Custom Routes requires the Google Sitemap module', E_USER_ERROR);
}
