<?php
    class Parser extends \PHPUnit_Framework_TestCase
    {
        /**
         * Try to parse larget file from real life
         * @dataProvider realLifeExamplesGoogle
         * @covers RobotsTxtParser::addValueToDirective
         * @covers RobotsTxtParser::addRule
         */
        public function testParser($content)
        {
            $parser = new RobotsTxtParser($content);
            $rules = $parser->getRules();

            $this->assertNotEmpty($rules);
            $this->assertArrayHasKey('*', $rules);
            $this->assertArrayHasKey('allow', $rules['*']);
            $this->assertNotEmpty($rules['*']['allow']);
            $this->assertArrayHasKey('disallow', $rules['*']);
            $this->assertNotEmpty($rules['*']['disallow']);
            $this->assertArrayHasKey('sitemap', $rules['*']);
            $this->assertNotEmpty($rules['*']['sitemap']);
        }

        /**
         * Real life files
         * @return array
         */
        public function realLifeExamplesGoogle()
        {
            return array(
                array("
                    User-agent: *
                    Disallow: /search
                    Disallow: /sdch
                    Disallow: /groups
                    Disallow: /images
                    Disallow: /catalogs
                    Allow: /catalogs/about
                    Allow: /catalogs/p?
                    Disallow: /catalogues
                    Allow: /newsalerts
                    Disallow: /news
                    Allow: /news/directory
                    Disallow: /nwshp
                    Disallow: /setnewsprefs?
                    Disallow: /index.html?
                    Disallow: /?
                    Allow: /?hl=
                    Disallow: /?hl=*&
                    Allow: /?hl=*&gws_rd=ssl$
                    Disallow: /?hl=*&*&gws_rd=ssl
                    Allow: /?gws_rd=ssl$
                    Allow: /?pt1=true$
                    Disallow: /addurl/image?
                    Allow:    /mail/help/
                    Disallow: /mail/
                    Disallow: /pagead/
                    Disallow: /relpage/
                    Disallow: /relcontent
                    Disallow: /imgres
                    Disallow: /imglanding
                    Disallow: /sbd
                    Disallow: /keyword/
                    Disallow: /u/
                    Disallow: /univ/
                    Disallow: /cobrand
                    Disallow: /custom
                    Disallow: /advanced_group_search
                    Disallow: /googlesite
                    Disallow: /preferences
                    Disallow: /setprefs
                    Disallow: /swr
                    Disallow: /url
                    Disallow: /default
                    Disallow: /m?
                    Disallow: /m/
                    Allow:    /m/finance
                    Disallow: /wml?
                    Disallow: /wml/?
                    Disallow: /wml/search?
                    Disallow: /xhtml?
                    Disallow: /xhtml/?
                    Disallow: /xhtml/search?
                    Disallow: /xml?
                    Disallow: /imode?
                    Disallow: /imode/?
                    Disallow: /imode/search?
                    Disallow: /jsky?
                    Disallow: /jsky/?
                    Disallow: /jsky/search?
                    Disallow: /pda?
                    Disallow: /pda/?
                    Disallow: /pda/search?
                    Disallow: /sprint_xhtml
                    Disallow: /sprint_wml
                    Disallow: /pqa
                    Disallow: /palm
                    Disallow: /gwt/
                    Disallow: /purchases
                    Disallow: /hws
                    Disallow: /bsd?
                    Disallow: /linux?
                    Disallow: /mac?
                    Disallow: /microsoft?
                    Disallow: /unclesam?
                    Disallow: /answers/search?q=
                    Disallow: /local?
                    Disallow: /local_url
                    Disallow: /shihui?
                    Disallow: /shihui/
                    Disallow: /froogle?
                    Disallow: /products?
                    Disallow: /froogle_
                    Disallow: /product_
                    Disallow: /products_
                    Disallow: /products;
                    Disallow: /print
                    Disallow: /books/
                    Disallow: /bkshp?*q=*
                    Disallow: /books?*q=*
                    Disallow: /books?*output=*
                    Disallow: /books?*pg=*
                    Disallow: /books?*jtp=*
                    Disallow: /books?*jscmd=*
                    Disallow: /books?*buy=*
                    Disallow: /books?*zoom=*
                    Allow: /books?*q=related:*
                    Allow: /books?*q=editions:*
                    Allow: /books?*q=subject:*
                    Allow: /books/about
                    Allow: /booksrightsholders
                    Allow: /books?*zoom=1*
                    Allow: /books?*zoom=5*
                    Disallow: /ebooks/
                    Disallow: /ebooks?*q=*
                    Disallow: /ebooks?*output=*
                    Disallow: /ebooks?*pg=*
                    Disallow: /ebooks?*jscmd=*
                    Disallow: /ebooks?*buy=*
                    Disallow: /ebooks?*zoom=*
                    Allow: /ebooks?*q=related:*
                    Allow: /ebooks?*q=editions:*
                    Allow: /ebooks?*q=subject:*
                    Allow: /ebooks?*zoom=1*
                    Allow: /ebooks?*zoom=5*
                    Disallow: /patents?
                    Disallow: /patents/download/
                    Disallow: /patents/pdf/
                    Disallow: /patents/related/
                    Disallow: /scholar
                    Disallow: /citations?
                    Allow: /citations?user=
                    Disallow: /citations?*cstart=
                    Allow: /citations?view_op=new_profile
                    Allow: /citations?view_op=top_venues
                    Disallow: /complete
                    Disallow: /s?
                    Disallow: /sponsoredlinks
                    Disallow: /videosearch?
                    Disallow: /videopreview?
                    Disallow: /videoprograminfo?
                    Allow: /maps?*output=classic*
                    Allow: /maps/api/js?
                    Allow: /maps/d/
                    Disallow: /maps?
                    Disallow: /mapstt?
                    Disallow: /mapslt?
                    Disallow: /maps/stk/
                    Disallow: /maps/br?
                    Disallow: /mapabcpoi?
                    Disallow: /maphp?
                    Disallow: /mapprint?
                    Disallow: /maps/api/js/
                    Disallow: /maps/api/staticmap?
                    Disallow: /mld?
                    Disallow: /staticmap?
                    Disallow: /places/
                    Allow: /places/$
                    Disallow: /maps/preview
                    Disallow: /maps/place
                    Disallow: /help/maps/streetview/partners/welcome/
                    Disallow: /help/maps/indoormaps/partners/
                    Disallow: /lochp?
                    Disallow: /center
                    Disallow: /ie?
                    Disallow: /sms/demo?
                    Disallow: /katrina?
                    Disallow: /blogsearch?
                    Disallow: /blogsearch/
                    Disallow: /blogsearch_feeds
                    Disallow: /advanced_blog_search
                    Disallow: /uds/
                    Disallow: /chart?
                    Disallow: /transit?
                    Disallow: /mbd?
                    Disallow: /extern_js/
                    Disallow: /xjs/
                    Disallow: /calendar/feeds/
                    Disallow: /calendar/ical/
                    Disallow: /cl2/feeds/
                    Disallow: /cl2/ical/
                    Disallow: /coop/directory
                    Disallow: /coop/manage
                    Disallow: /trends?
                    Disallow: /trends/music?
                    Disallow: /trends/hottrends?
                    Disallow: /trends/viz?
                    Disallow: /trends/embed.js?
                    Disallow: /trends/fetchComponent?
                    Disallow: /notebook/search?
                    Disallow: /musica
                    Disallow: /musicad
                    Disallow: /musicas
                    Disallow: /musicl
                    Disallow: /musics
                    Disallow: /musicsearch
                    Disallow: /musicsp
                    Disallow: /musiclp
                    Disallow: /browsersync
                    Disallow: /call
                    Disallow: /archivesearch?
                    Disallow: /archivesearch/url
                    Disallow: /archivesearch/advanced_search
                    Disallow: /base/reportbadoffer
                    Disallow: /urchin_test/
                    Disallow: /movies?
                    Disallow: /codesearch?
                    Disallow: /codesearch/feeds/search?
                    Disallow: /wapsearch?
                    Disallow: /safebrowsing
                    Allow: /safebrowsing/diagnostic
                    Allow: /safebrowsing/report_badware/
                    Allow: /safebrowsing/report_error/
                    Allow: /safebrowsing/report_phish/
                    Disallow: /reviews/search?
                    Disallow: /orkut/albums
                    Allow: /jsapi
                    Disallow: /views?
                    Disallow: /c/
                    Disallow: /cbk
                    Allow: /cbk?output=tile&cb_client=maps_sv
                    Disallow: /recharge/dashboard/car
                    Disallow: /recharge/dashboard/static/
                    Disallow: /translate_a/
                    Disallow: /translate_c
                    Disallow: /translate_f
                    Disallow: /translate_static/
                    Disallow: /translate_suggestion
                    Disallow: /profiles/me
                    Allow: /profiles
                    Disallow: /s2/profiles/me
                    Allow: /s2/profiles
                    Allow: /s2/oz
                    Allow: /s2/photos
                    Allow: /s2/search/social
                    Allow: /s2/static
                    Disallow: /s2
                    Disallow: /transconsole/portal/
                    Disallow: /gcc/
                    Disallow: /aclk
                    Disallow: /cse?
                    Disallow: /cse/home
                    Disallow: /cse/panel
                    Disallow: /cse/manage
                    Disallow: /tbproxy/
                    Disallow: /imesync/
                    Disallow: /shenghuo/search?
                    Disallow: /support/forum/search?
                    Disallow: /reviews/polls/
                    Disallow: /hosted/images/
                    Disallow: /ppob/?
                    Disallow: /ppob?
                    Disallow: /adwordsresellers
                    Disallow: /accounts/ClientLogin
                    Disallow: /accounts/ClientAuth
                    Disallow: /accounts/o8
                    Allow: /accounts/o8/id
                    Disallow: /topicsearch?q=
                    Disallow: /xfx7/
                    Disallow: /squared/api
                    Disallow: /squared/search
                    Disallow: /squared/table
                    Disallow: /toolkit/
                    Allow: /toolkit/*.html
                    Disallow: /globalmarketfinder/
                    Allow: /globalmarketfinder/*.html
                    Disallow: /qnasearch?
                    Disallow: /app/updates
                    Disallow: /sidewiki/entry/
                    Disallow: /quality_form?
                    Disallow: /labs/popgadget/search
                    Disallow: /buzz/post
                    Disallow: /compressiontest/
                    Disallow: /analytics/reporting/
                    Disallow: /analytics/admin/
                    Disallow: /analytics/web/
                    Disallow: /analytics/feeds/
                    Disallow: /analytics/settings/
                    Allow: /alerts/manage
                    Allow: /alerts/remove
                    Disallow: /alerts/
                    Allow: /alerts/$
                    Disallow: /ads/search?
                    Disallow: /ads/plan/action_plan?
                    Disallow: /ads/plan/api/
                    Disallow: /phone/compare/?
                    Disallow: /travel/clk
                    Disallow: /hotelfinder/rpc
                    Disallow: /hotels/rpc
                    Disallow: /flights/rpc
                    Disallow: /commercesearch/services/
                    Disallow: /evaluation/
                    Disallow: /chrome/browser/mobile/tour
                    Disallow: /compare/*/apply*
                    Disallow: /forms/perks/
                    Disallow: /baraza/*/search
                    Disallow: /baraza/*/report
                    Disallow: /shopping/suppliers/search
                    Disallow: /ct/
                    Disallow: /edu/cs4hs/
                    Disallow: /trustedstores/s/
                    Disallow: /trustedstores/tm2
                    Disallow: /trustedstores/verify
                    Disallow: /adwords/proposal
                    Disallow: /shopping/product/
                    Disallow: /shopping/seller
                    Disallow: /shopping/reviewer
                    Disallow: /about/careers/apply/
                    Disallow: /about/careers/applications/
                    Disallow: /landing/signout.html
                    Allow: /gb/images
                    Allow: /gb/js
                    Sitemap: http://www.gstatic.com/culturalinstitute/sitemaps/www_google_com_culturalinstitute/sitemap-index.xml
                    Sitemap: https://www.google.com/edu/sitemap.xml
                    Sitemap: https://www.google.com/work/sitemap.xml
                    Sitemap: https://www.google.com/intx/sitemap.xml
                    Sitemap: http://www.google.com/hostednews/sitemap_index.xml
                    Sitemap: http://www.google.com/maps/views/sitemap.xml
                    Sitemap: http://www.google.com/sitemaps_webmasters.xml
                    Sitemap: http://www.google.com/ventures/sitemap_ventures.xml
                    Sitemap: http://www.gstatic.com/dictionary/static/sitemaps/sitemap_index.xml
                    Sitemap: http://www.gstatic.com/earth/gallery/sitemaps/sitemap.xml
                    Sitemap: http://www.gstatic.com/s2/sitemaps/profiles-sitemap.xml
                    Sitemap: http://www.gstatic.com/trends/websites/sitemaps/sitemapindex.xml
                    Sitemap: http://www.google.com/adwords/sitemap.xml
                    Sitemap: http://www.google.com/drive/sitemap.xml
                ")
            );
        }
    }