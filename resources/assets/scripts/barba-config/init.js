import Barba from "barba.js/dist/barba.min"
import BarbaOnEveryPage from './onEveryPage'
import BarbaTransitionObj from './transition'

export default function (views) {
    Barba.Pjax.Dom.wrapperId = 'page-wrapper'
    Barba.Pjax.Dom.containerClass = 'page-container'

    // Blacklist all WordPress Links (e.g. for adminbar)
    function addBlacklistClass() {

        for (let i = 0; i < document.getElementsByTagName('a').length; i++) {
            const anchor = document.getElementsByTagName('a')[i];

            if ( anchor.href.indexOf('/wp-admin/') !== -1 ||
                anchor.href.indexOf('/wp-login.php') !== -1 ) {
                    anchor.classList.add('no-barba')
                    anchor.classList.add('wp-link')
            }
        }
    }


    // Set blacklist links
    addBlacklistClass();

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}// eslint-disable-line
    Barba.Dispatcher.on('initStateChange', function() {
        // modify to your needs
        var path = (window.location.href).replace(window.location.origin, '').toLowerCase();
        gtag('js', new Date());
        gtag('config', 'UA-107407087-1', {
        'page_title' : document.title,
        'page_path': path,
        });
    });

    Barba.Dispatcher.on('newPageReady', BarbaOnEveryPage)

    const transition = Barba.BaseTransition.extend(BarbaTransitionObj)

    Barba.Pjax.getTransition = () => {
        return transition
    }

    views.forEach( view => Barba.BaseView.extend(view).init())
    
    Barba.Pjax.cacheEnabled = false;    
    
    Barba.Pjax.start()
    Barba.Prefetch.init()
}