// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import master from './routes/master';
import licence3 from './routes/licence3';

/** Populate Router instance with DOM routes */
const routes = new Router({
    //If you want to test and know what namespace you need to add js to specific page, check the class name of the <body> tag.
    // All pages
    common,
    //Home page is named blog because of settings in reglages>lecture, I choose "Page statique" for home and blog
    //BLOG IS HOME AND NEWS Page ....
    home,
    //Licence and Master pages
    master,
    licence3,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
