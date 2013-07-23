<?php

class Paginator {

    //all variables are pivate.
    var $previous;
    var $current;
    var $next;
    var $page;
    var $total_pages;
    var $link_arr;
    var $range1;
    var $range2;
    var $num_rows;
    var $first;
    var $last;
    var $first_of;
    var $second_of;
    var $limit;
    var $prev_next;
    var $base_page_num;
    var $extra_page_num;
    var $total_items;
    var $pagename;
    var $javascriptpagename;
    var $page_param_name;  // 'pg' by default

    //Constructor for Paginator.  Takes the current page and the number of items
    //in the source data and sets the current page ($this->page) and the total
    //items in the source ($this->total_items).

    function Paginator($page, $num_rows, $pageParamName = 'pg') {
        $this->page_param_name = $pageParamName;

        if (!$page) {
            $this->page = 1;
        } else {
            $this->page = $page;
        }
        $this->num_rows = $num_rows;
        $this->total_items = $this->num_rows;
    }

    //Takes  $limit and sets $this->limit. Calls private mehods
    //setBasePage() and setExtraPage() which use $this->limit.
    function set_Limit($limit = 5) {
        $this->limit = $limit;
        $this->setBasePage();
        $this->setExtraPage();
    }

    //This method creates a number that setExtraPage() uses to if there are
    //and extra pages after limit has divided the total number of pages.
    function setBasePage() {
        $div = $this->num_rows / $this->limit;
        $this->base_page_num = floor($div);
    }

    function setExtraPage() {
        $this->extra_page_num = $this->num_rows - ($this->base_page_num * $this->limit);
    }

    //Used in making numbered links.  Sets the number of links behind and 
    //ahead of the current page.  For example if there were a possiblity of
    //20 numbered links and this was set to 5 and the current link was 10
    //the result would be this 5 6 7 8 9 10 11 12 13 14 15.

    function set_Links($prev_next = 5) {
        $this->prev_next = $prev_next;
    }

    //method to get the total items.
    function getTotalItems() {
        $this->total_items = $this->num_rows;
        return $this->total_items;
    }

    //method to get the base number to use in queries and such.
    function getRange1() {
        $this->range1 = ($this->limit * $this->page) - $this->limit;
        return ($this->range1 > 0) ? $this->range1 : 0;
    }

    //method to get the offset.
    function getRange2() {
        if ($this->page == $this->base_page_num + 1) {
            $this->range2 = $this->extra_page_num;
        } else {
            $this->range2 = $this->limit;
        }
        return $this->range2;
    }

    //method to get the first of number as in 5 of .
    function getFirstOf() {
        $this->first_of = $this->range1 + 1;
        return $this->first_of;
    }

    //method to get the second number in a series as in 5 of 8.
    function getSecondOf() {
        if ($this->page == $this->base_page_num + 1) {
            $this->second_of = $this->range1 + $this->extra_page_num;
        } else {
            $this->second_of = $this->range1 + $this->limit;
        }
        return $this->second_of;
    }

    //method to get the total number of pages.
    function getTotalPages() {
        if ($this->extra_page_num) {
            $this->total_pages = $this->base_page_num + 1;
        } else {
            $this->total_pages = $this->base_page_num;
        }
        return $this->total_pages;
    }

    //method to get the first link number.
    function getFirst() {
        $this->first = 1;
        return $this->first;
    }

    //method to get the last link number.
    function getLast() {
        if ($this->page == $this->total_pages) {
            $this->last = 0;
        } else {
            $this->last = $this->total_pages;
        }
        return $this->last;
    }

    function getPrevious() {
        if ($this->page > 1) {
            $this->previous = $this->page - 1;
        }
        return $this->previous;
    }

    //method to get the number of the link previous to the current link.
    function getCurrent() {
        $this->current = $this->page;
        return $this->current;
    }

    //method to get the current page name. Is mostly used in links to the next 
    //page.
    function getPageName() {
        return ($this->pagename != '') ? $this->pagename : $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] . '&';
    }

    // get javascript page name for page POST submit 
    function getJavascriptPageName() {
        return ($this->javascriptpagename != '') ? $this->javascriptpagename : 'changePage';
    }

    //method to get the number of the link after the current link.
    function getNext() {
        $this->getTotalPages();
        if ($this->total_pages != $this->page) {
            $this->next = $this->page + 1;
        }
        return $this->next;
    }

    //method that returns an array of the numbered links that should be 
    //displayed.   
    function getLinkArr() {
        //gets the top range   
        $top = $this->getTotalPages() - $this->getCurrent();
        if ($top <= $this->prev_next) {
            $top = $top;
            $top_range = $this->getCurrent() + $top;
        } else {
            $top = $this->prev_next;
            $top_range = $this->getCurrent() + $top;
        }

        //gets the bottom range
        $bottom = $this->getCurrent() - 1;
        if ($bottom <= $this->prev_next) {
            $bottom = $bottom;
            $bottom_range = $this->getCurrent() - $bottom;
        } else {
            $bottom = $this->prev_next;
            $bottom_range = $this->getCurrent() - $bottom;
        }

        $j = 0;
        foreach (range($bottom_range, $top_range) as $i) {
            $this->link_arr[$j] = $i;
            $j++;
        }
        return $this->link_arr;
    }

// get Page Navigator Links 
    function getPageLinks() {

        $strPageLinks = "";

        if ($this->getCurrent() == 1) {
            $first = "";
        } else {
            $first = ' <a href="' . $this->getPageName() . "&" . $this->page_param_name . "=" . $this->getFirst() . '" ><img src="' . getHtmlImageSource('icon_page_first.gif') . '" title="Navigate to the first page" border="0" /></a>';
        }

        if ($this->getPrevious()) {
            $prev = ' <a href="' . $this->getPageName() . "&" . $this->page_param_name . "=" . $this->getPrevious() . '" ><img src="' . getHtmlImageSource('icon_page_prev.gif') . '" border="0" /></a>';
        } else {
            $prev = '<img src="' . getHtmlImageSource('icon_page_prev.gif') . '" title="Navigate to the next page" border="0" />';
        }

        if ($this->getNext()) {
            $next = ' <a href="' . $this->getPageName() . "&" . $this->page_param_name . "=" . $this->getNext() . '" ><img src="' . getHtmlImageSource('icon_page_next.gif') . '" border="0" /></a> | ';
        } else {
            $next = '<img src="' . getHtmlImageSource('icon_page_next.gif') . '" title="Navigate to the previous page" />';
        }

        if ($this->getLast()) {
            $last = ' <a href="' . $this->getPageName() . "&" . $this->page_param_name . "=" . $this->getLast() . '"> <img src="' . getHtmlImageSource('icon_page_last.gif') . '"  border="0" /></a>';
        } else {
            $last = '<img src="' . getHtmlImageSource('icon_page_last.gif') . '" title="Navigate to the last page" />';
        }



        $strPageLinks .= $first . " ";

        $pagelinks = $this->getLinkArr();
        $current = $this->getCurrent();
        foreach ($pagelinks as $link) {

            if ($link == $current) {
                $strPageLinks .= ' <a class="pagerCurrentPage">&nbsp;' . $link . '&nbsp;</a> ';
            } else {
                $strPageLinks .= ' &nbsp;<a href="' . $this->getPageName() . '&' . $this->page_param_name . '=' . $link . '"  class="pagerPage" >&nbsp;' . $link . '&nbsp;</a>';
            }
        }  // end for links


        $strPageLinks .= $last;

        return $strPageLinks;
    }

// end of Page Navigator 
// get Javascript Page Navigator  
    function getJavascriptPage($jsparams = '') {

        $strPageLinks = "";

        if ($this->getCurrent() == 1) {
            $first = "";
        } else {
            $first = ' <a href="javascript:' . $this->getJavascriptPageName() . "(" . $this->getFirst() . $jsparams . ')" ><img src="' . getHtmlImageSource('icon_page_first.gif') . '" title="Navigate to the first page" border="0" /></a>';
        }

        if ($this->getPrevious()) {
            $prev = ' <a href="javascript:' . $this->getJavascriptPageName() . "(" . $this->getPrevious() . $jsparams . ')" ><img src="' . getHtmlImageSource('icon_page_prev.gif') . '" border="0" /></a>';
        } else {
            $prev = '<img src="' . getHtmlImageSource('icon_page_prev.gif') . '" title="Navigate to the next page" border="0" />';
        }

        if ($this->getNext()) {
            $next = ' <a href="javascript:' . $this->getJavascriptPageName() . "(" . $this->getNext() . $jsparams . ')" ><img src="' . getHtmlImageSource('icon_page_next.gif') . '" border="0" /></a> | ';
        } else {
            $next = '<img src="' . getHtmlImageSource('icon_page_next.gif') . '" title="Navigate to the previous page" />';
        }

        if ($this->getLast()) {
            $last = ' <a href="javascript:' . $this->getJavascriptPageName() . "(" . $this->getLast() . $jsparams . ')"> <img src="' . getHtmlImageSource('icon_page_last.gif') . '"  border="0" /></a>';
        } else {
            $last = '<img src="' . getHtmlImageSource('icon_page_last.gif') . '" title="Navigate to the last page" />';
        }



        $strPageLinks .= $first . " ";

        $pagelinks = $this->getLinkArr();
        $current = $this->getCurrent();
        foreach ($pagelinks as $link) {

            if ($link == $current) {
                $strPageLinks .= ' <a class="pagerCurrentPage">&nbsp;' . $link . '&nbsp;</a> ';
            } else {
                $strPageLinks .= ' &nbsp;<a href="javascript:' . $this->getJavascriptPageName() . '(' . $link . $jsparams . ')"  class="pagerPage" >&nbsp;' . $link . '&nbsp;</a>';
            }
        }  // end for links


        $strPageLinks .= $last;

        return $strPageLinks;
    }

// end of Javascript Page Navigator 
}

//ends Paginator class
?>