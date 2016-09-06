window.onkeyup = function(e){
    if (!location.origin) {
        location.origin = location.protocol + "//" + location.host;
    }
    
    var N=78, H=72, R=82, L=76, D=68, CTRL=e.ctrlKey
        URL = window.location.href, BASE=location.origin+'/finance/web';

        //alert(e.which);

    if(CTRL && N==e.which) {

        window.location = BASE+'/log/create';
    }
    else if(CTRL && H==e.which) {
        window.location = BASE+'/site/index';
    }
    else if(CTRL && R==e.which) {
        window.location = BASE+'/report/index';
    }
    else if(CTRL && L==e.which) {
        window.location = BASE+'/log/index';
    }
    else if(CTRL && D==e.which) {
        if( URL.indexOf('create') >= 0 || URL.indexOf('update') >= 0 ) {
            document.forms[0].sumbit();
        }
    }
};