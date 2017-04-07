<?php

/**
 * Description of CustomRoutesAdmin
 *
 * @author Ryan
 */
class CustomSitemapRoutesAdmin extends ModelAdmin {

    private static $menu_icon = 'sitemapxml-custom-routes/images/sitemapxmlicon.png';

    private static $menu_title = 'Custom sitemap routes';

    private static $url_segment = 'custom-sitemap-routes';

    private static $managed_models = array(
        'SitemapXMLCustomRoute',
    );

}
