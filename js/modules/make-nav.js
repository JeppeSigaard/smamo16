function makeUrlFromString(str){
    var ret = encodeURIComponent(str)
            .replace(/%20/g,'-')
            .replace(/\./g,'')
            .replace( /æ/gi, 'a' )
            .replace( /ø/gi, 'o' )
            .replace( /å/gi, 'a' )
            .replace( /\,/g, '' );
    return ret;
}

function makeNavItems(from,to,rep){
    var from = $(from),
        to = $(to),
        heading = $('h1'),
        headingID = 'content-main';
        newMenu = $('<ul class="side-sub-menu"></ul>');
    
    if(!from.length || !to.length){return;}

    from.find('h2,h3,h4,h5,h6').each(function(){
        var elem = $(this),
            content = elem.html(),
            id = makeUrlFromString(content);
            
        if(elem.attr('data-title')){
            content = elem.attr('data-title');
        }
        
        var li = $('<li></li>'),
            a = $('<a href="#'+id+'">'+content+'</a>');
        
        elem.attr('id',id);
        a.appendTo(li);
        li.appendTo(newMenu);
    });
    
    newMenu.prepend('<li class="current-menu-item"><a class="menu-header" href="#'+headingID+'">'+heading.html()+'</a></li>');
    
    if (rep === true) {$(to).replaceWith(newMenu); console.log('replacing')}
    else{ newMenu.appendTo(to);console.log('not replacing')}
        
    newMenu.on('click',function(e){
        e.preventDefault();
        var t = $(e.target);
        if(t.is('a') && smamo_nav_fancy_manu_nav_animation_block === false){
            
            smamo_nav_fancy_manu_nav_animation_block = true;
            
            $('html,body').animate({scrollTop : $(t.attr('href')).offset().top - 75},300);
            newMenu.find('.current-menu-item').removeClass('current-menu-item');
            t.parent('li').addClass('current-menu-item');
            
            setTimeout(function(){
                smamo_nav_fancy_manu_nav_animation_block = false;
                
            },320);
           
            
        }
    });
}

if($('body').hasClass('single-case')){
    
    makeNavItems('.content-main .article-content','aside .aside-left', false);
    
}