// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import actualites from './routes/actualites';
import master from './routes/master';
import licence3 from './routes/licence3';

/** Populate Router instance with DOM routes */
const routes = new Router({
    // All pages
    common,
    // Home page
    home,
    // News page
    actualites,
    //Licence and Master pages
    master,
    licence3,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
