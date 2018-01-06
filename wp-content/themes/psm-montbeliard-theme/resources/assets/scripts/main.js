// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import actualites from './routes/actualites';
import master from './routes/master';
import licence from './routes/licence';

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
    licence,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
