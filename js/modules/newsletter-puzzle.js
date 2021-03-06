if($('.newsletter-puzzle').length){
    var stageSize = {
        x : 500,
        y : 550,
        },
        puzzle = SVG('puzzle-stage').size(stageSize.x,stageSize.y).spof(),
        puzzleMonkey = {
            parent : $('.newsletter-puzzle'),
            time : 0,
            state : 1,
            started : false,
            timerStopped : false,
            timerPaused : false,
            result : puzzle.group().addClass('puzzle-result'),
            pieces : {
                piece_1 : puzzle.nested().addClass('puzzle-piece piece-01'),
                piece_2 : puzzle.nested().addClass('puzzle-piece piece-02'),
                piece_3 : puzzle.nested().addClass('puzzle-piece piece-03'),
                piece_4 : puzzle.nested().addClass('puzzle-piece piece-04'),
                piece_5 : puzzle.nested().addClass('puzzle-piece piece-05'),
                piece_6 : puzzle.nested().addClass('puzzle-piece piece-06'),   
            }
        };
    
    /*-------------------------------------------------------------------------------
    */// FUNCTIONS
    
    /*
    // Check for match */
    puzzleMonkey.checkMatch = function(){
        var count = 0;
        
        $.each(puzzleMonkey.pieces,function(index, value){
            if(this.hasClass('matched')){
                count ++;
            }
        });
        
        return count;
    }
    
    /*
    // timedStart function */
    puzzleMonkey.timedStart = function(){
        puzzleMonkey.started =  true;
            
        var $counter = $('.puzzle-counter');        
        
        // 3
        $counter.html('3').css('opacity',1).delay(500).animate({opacity: 0},300);
        
        // 2
        setTimeout(function(){
            $counter.html('2').css('opacity',1).delay(500).animate({opacity: 0},300);
            
        },1000);
        
        // 1
        setTimeout(function(){
            $counter.html('1').css('opacity',1).delay(500).animate({opacity: 0},300);
        },2000);
        
        
        // Start timer
        setTimeout(function(){puzzleMonkey.start()},3000);
        
    }
    
    /*
    // Start function */
    puzzleMonkey.start = function(){
        
        if(puzzleMonkey.getCookie() !== false && puzzleMonkey.getCookie().state === '3'){
            $('.puzzle-counter').html(puzzleMonkey.time);
            puzzleMonkey.end();
            return;
        }
        
        puzzleMonkey.started =  true;
        var $counter = $('.puzzle-counter');
        $counter.css('opacity',1);

        $.each(puzzleMonkey.pieces,function(index,value){
            var i = $(value.node).index();
            setTimeout(function(){
                puzzleMonkey.pieces[index].addClass('blink');

                setTimeout(function(){
                    puzzleMonkey.pieces[index].removeClass('blink');
                },100);

            },120*i);
        });


        puzzleMonkey.parent.addClass('counting');

        puzzleMonkey.timer = setInterval(function(){
            if(puzzleMonkey.timerStopped === false){

                if(puzzleMonkey.timerPaused === false){

                    puzzleMonkey.time = ( Math.round(puzzleMonkey.time * 100 ) + 2 ) / 100;

                    puzzleMonkey.time = puzzleMonkey.time.toFixed(2);
                    if(puzzleMonkey.time < 10){puzzleMonkey.time = '0' + puzzleMonkey.time;}
                    $counter.html(puzzleMonkey.time);

                    }
            }
            else{
                clearInterval(puzzleMonkey.timer);
            }
        },20);  
    };
    
    /*
    // End function */
    puzzleMonkey.end = function(){
        puzzleMonkey.parent.removeClass('counting');
        puzzleMonkey.timerStopped = true;
        
        $('.puzzle-form input[name=state]').val('3');
        $('.puzzle-form input[name=solve-time]').val(puzzleMonkey.time);
        
        setTimeout(function(){
            puzzleMonkey.parent.addClass('endscreen');
        },500);
        
        setTimeout(function(){
            puzzleMonkey.parent.addClass('show-form');
        },3000);
    }
    
    /*
    // Build function */
    puzzleMonkey.buildStage = function(){
        puzzleMonkey.result.path('M219.775,138.272c4.659-5.176,3.624-13.977,5.694-21.224c1.323-4.631,5.395-6.301,9.917-7.039 c-16.963-9.088-32.921-10.897-32.921-10.897s-7.928-14.422-23.332-14.422c-8.188,0-17.974,14.635-17.974,23.983 c0,2.502-0.507,2.704-0.906,3.292c-1.646,2.41-2.229,7.916-2.229,7.916c-0.69,0.675-1.426,1.592-1.905,2.075 c-0.469,0.476-1.684,13.1-1.684,15.4c0,2.311,3.158,1.868,3.158,1.868c-0.352,0.346-0.552,1.897-0.119,2.841 c0.442,0.96,4.281,0,4.281,0l0.797,0.368c5.732,1.681,11.777,1.491,16.284-2.759c4.496-4.26,10.336-5.565,10.336-5.565 s5.009,2.427,7.125,7.146C204.285,143.985,214.376,143.672,219.775,138.272z').addClass('result-01');
        puzzleMonkey.result.path('M237.893,250.604c6.212-3.106,13.458-0.518,20.189-2.071c20.082-3.429,26.255-23.078,23.791-40.97 c-2.809,0.14-5.782,0.183-5.297-0.3c0.891-0.869,7.398-19.415-5.689-57.229c-7.022-20.242-21.599-32.578-35.5-40.025 c-4.522,0.738-8.594,2.408-9.917,7.039c-2.07,7.247-1.035,16.048-5.694,21.224c-0.62,0.62-1.304,1.17-2.038,1.659 c21.658,12.937,24.955,43.077,10.32,63.565c-9.11,12.467-13.33,27.153-11.024,41.594c6.395,5.125,13.396,9.801,15.386,11.153 C233.962,253.826,235.614,251.744,237.893,250.604z').addClass('result-02');
        puzzleMonkey.result.path('M258.082,248.533c-6.73,1.554-13.977-1.035-20.189,2.071c-2.279,1.14-3.931,3.222-5.473,5.64 c0.259,0.176,0.437,0.299,0.514,0.355c1.094,0.813,5.489,5.922,5.489,9.651c0,3.723-7.302,17.052-14.691,26.749 c-9.603,12.599-5.699,15.57-5.699,15.57c7.053,6.97,30.009,9.582,30.009,9.582s14.008,1.421,30.861,0 c37.873-3.192,33.42-11.553,33.42-11.553c-3.75-8.629-15.521-39.738-14.906-43.419c0.616-3.682,15.055-13.426,23.236-23.911 c0.324-0.416,0.632-0.838,0.932-1.262c-13.962-2.571-27.857-5.068-41.527-8.44C276.758,239.024,269.785,246.535,258.082,248.533z').addClass('result-03');
        puzzleMonkey.result.path('M307.26,176.062c2.588-16.564,2.588-32.612,3.623-48.659c0.518-3.624-4.659-7.247-8.283-9.318 c-4.324-2.162-9.652-2.571-14.586-4.017c-15.322,20.921-1.562,83.772-1.562,83.772v9.424c0,0-2.231,0.184-4.579,0.3 c1.028,7.465,0.545,15.232-1.816,22.004c13.67,3.372,27.565,5.869,41.527,8.44c6.706-9.496,7.345-20.89,7.4-23.498 C316.399,205.04,304.354,193.496,307.26,176.062z').addClass('result-04');
        puzzleMonkey.result.path('M338.859,91.203c-2.186,0-16.024,0-16.024,0s0-7.574,0-8.888c0-1.604-2.103-3.1-5.815-3.1 c-3.725,0-6.02,1.684-6.02,3.506c0,1.821,0,8.552,0,8.552s-10.752,0-14.681,0c-3.946,0-7.46,3.601-7.46,7.549 c0,2.075,0,14.162,0,14.162c-0.292,0.346-0.572,0.71-0.846,1.083c4.934,1.445,10.262,1.854,14.586,4.017 c3.624,2.071,8.801,5.694,8.283,9.318c-1.035,16.047-1.035,32.095-3.623,48.659c-2.906,17.435,9.14,28.979,21.725,38.448 c0.009-0.356,0.006-0.554,0.006-0.554s0,0,8.225,0c8.21,0,8.658-8.657,8.658-8.657s0-101.088,0-106.351 C345.871,93.683,341.045,91.203,338.859,91.203z').addClass('result-05');
        puzzleMonkey.result.path('M217.737,139.932c-5.653,3.769-14.369,3.74-21.438,1.325c0.566,1.263,0.927,2.688,0.927,4.277 c0,5.311-0.091,13.277-2.499,16.861c-2.423,3.584-9.661,11.518-9.661,11.518c-13.796-0.054-18.469-0.637-21.692,3.999 c-8.874,12.775,4.712,21.924,4.712,21.924s1.349,6.385,4.145,16.015c2.807,9.639-0.178,25.831-0.178,25.831 c-2.85,0.658-10.163,3.038-14.21,5.116c-4.043,2.078-4.108,8.074-3.325,9.581c0.792,1.468,4.101,1.774,6.066,1.057 c1.96-0.711,0.766,4.4,0.766,4.4c-0.25,1.461,1.448,1.507,2.683,0.765c1.712-1.03,1.478-0.054,1.478-0.054 c-0.474,2.915,4.934,0.6,4.934,0.6c0.545,1.305,3.135,0.739,3.405,0.475c0.259-0.27,2.364-2.38,3.611-1.785 c1.252,0.598,1.166,2.529,2.98,0.598c3.3-3.514,7.836-3.211,11-3.211c3.158,0,4.016-4.161,4.016-4.161 c3.885-18.486,10.724-20.817,10.724-20.817c1.816,3.102,6.172,7.094,10.854,10.847c-2.306-14.44,1.914-29.127,11.024-41.594 C242.692,183.009,239.395,152.868,217.737,139.932z M224.243,187.73c0,0-13.309-8.856-13.79-7.907c0,0,8.118-11.566,8.118-11.978 C218.57,167.846,227.486,178.561,224.243,187.73z').addClass('result-06');    



        puzzleMonkey.pieces.piece_1.path('M65.339,53.582c4.659-5.176,3.624-13.977,5.694-21.224c1.323-4.631,5.395-6.301,9.917-7.039 c-16.963-9.088-32.921-10.897-32.921-10.897S40.102,0,24.698,0C16.51,0,6.724,14.635,6.724,23.983 c0,2.502-0.507,2.704-0.906,3.292c-1.646,2.41-2.229,7.916-2.229,7.916c-0.69,0.675-1.426,1.592-1.905,2.075 C1.214,37.742,0,50.366,0,52.667c0,2.311,3.158,1.868,3.158,1.868c-0.352,0.346-0.552,1.897-0.119,2.841 c0.442,0.96,4.281,0,4.281,0l0.797,0.368c5.732,1.681,11.777,1.491,16.284-2.759c4.496-4.26,10.336-5.565,10.336-5.565 s5.009,2.427,7.125,7.146C49.849,59.295,59.94,58.981,65.339,53.582z');

        puzzleMonkey.pieces.piece_2.path('M21.479,140.595c6.212-3.106,13.458-0.518,20.189-2.071c20.082-3.429,26.255-23.078,23.791-40.97 c-2.809,0.14-5.782,0.183-5.297-0.3c0.891-0.869,7.398-19.415-5.689-57.229C47.451,19.783,32.874,7.447,18.973,0 c-4.522,0.738-8.594,2.408-9.917,7.039c-2.07,7.247-1.035,16.048-5.694,21.224c-0.62,0.62-1.304,1.17-2.038,1.659 c21.658,12.937,24.955,43.077,10.32,63.565c-9.11,12.467-13.33,27.153-11.024,41.594c6.395,5.125,13.396,9.801,15.386,11.153 C17.549,143.816,19.2,141.734,21.479,140.595z');

        puzzleMonkey.pieces.piece_3.path('M40.834,18.966c-6.73,1.554-13.977-1.035-20.189,2.071c-2.279,1.14-3.931,3.222-5.473,5.64 c0.259,0.176,0.437,0.299,0.514,0.355c1.094,0.813,5.489,5.922,5.489,9.651c0,3.723-7.302,17.052-14.691,26.749 c-9.603,12.599-5.699,15.57-5.699,15.57c7.053,6.97,30.009,9.582,30.009,9.582s14.008,1.421,30.861,0 c37.873-3.192,33.42-11.553,33.42-11.553c-3.75-8.629-15.521-39.738-14.906-43.419c0.616-3.682,15.055-13.426,23.236-23.911 c0.324-0.416,0.632-0.838,0.932-1.262C90.374,5.869,76.479,3.372,62.809,0C59.51,9.457,52.537,16.968,40.834,18.966z');

        puzzleMonkey.pieces.piece_4.path('M27.203,62.067c2.588-16.564,2.588-32.612,3.623-48.659c0.518-3.624-4.659-7.247-8.283-9.318 c-4.324-2.162-9.652-2.571-14.586-4.017C-7.365,20.994,6.396,83.846,6.396,83.846v9.424c0,0-2.231,0.184-4.579,0.3 c1.028,7.465,0.545,15.232-1.816,22.004c13.67,3.372,27.565,5.869,41.527,8.44c6.706-9.496,7.345-20.89,7.4-23.498 C36.343,91.046,24.297,79.502,27.203,62.067z');

        puzzleMonkey.pieces.piece_5.path('M50.846,12.061c-2.186,0-16.024,0-16.024,0s0-7.574,0-8.888c0-1.604-2.103-3.1-5.815-3.1 c-3.725,0-6.02,1.684-6.02,3.506c0,1.821,0,8.552,0,8.552s-10.752,0-14.681,0c-3.946,0-7.46,3.601-7.46,7.549 c0,2.075,0,14.162,0,14.162C0.554,34.188,0.273,34.552,0,34.925c4.934,1.445,10.262,1.854,14.586,4.017 c3.624,2.071,8.801,5.694,8.283,9.318c-1.035,16.047-1.035,32.095-3.623,48.659c-2.906,17.435,9.14,28.979,21.725,38.448 c0.009-0.356,0.006-0.554,0.006-0.554s0,0,8.225,0c8.21,0,8.658-8.657,8.658-8.657s0-101.088,0-106.351 C57.857,14.54,53.031,12.061,50.846,12.061z');

        puzzleMonkey.pieces.piece_6.path('M63.611,0c-5.653,3.769-14.369,3.74-21.438,1.325C42.738,2.588,43.1,4.013,43.1,5.603 c0,5.311-0.091,13.277-2.499,16.861c-2.423,3.584-9.661,11.518-9.661,11.518c-13.796-0.054-18.469-0.637-21.692,3.999 C0.375,50.756,13.96,59.904,13.96,59.904s1.349,6.385,4.145,16.015c2.807,9.639-0.178,25.831-0.178,25.831 c-2.85,0.658-10.163,3.038-14.21,5.116c-4.043,2.078-4.108,8.074-3.325,9.581c0.792,1.468,4.101,1.774,6.066,1.057 c1.96-0.711,0.766,4.4,0.766,4.4c-0.25,1.461,1.448,1.507,2.683,0.765c1.712-1.03,1.478-0.054,1.478-0.054 c-0.474,2.915,4.934,0.6,4.934,0.6c0.545,1.305,3.135,0.739,3.405,0.475c0.259-0.27,2.364-2.38,3.611-1.785 c1.252,0.598,1.166,2.529,2.98,0.598c3.3-3.514,7.836-3.211,11-3.211c3.158,0,4.016-4.161,4.016-4.161 c3.885-18.486,10.724-20.817,10.724-20.817c1.816,3.102,6.172,7.094,10.854,10.847c-2.306-14.44,1.914-29.127,11.024-41.594 C88.566,43.077,85.269,12.937,63.611,0z M70.116,47.799c0,0-13.309-8.856-13.79-7.907c0,0,8.118-11.566,8.118-11.978 C64.444,27.914,73.36,38.629,70.116,47.799z');


        puzzleMonkey.pieces.piece_1.draggy({
            minX: 0,
            minY: 0,
            maxX: stageSize.x - 80,
            maxY: stageSize.y - 60,
        }).move(0,400).attr({
            'data-x' : 154,
            'data-y' : 85,  
        });

        puzzleMonkey.pieces.piece_2.draggy({
            minX: 0,
            minY: 0,
            maxX: stageSize.x - 67,
            maxY: stageSize.y - 148,
        }).move(80,346).attr({
            'data-x' : 217,
            'data-y' : 110,  
        });

        puzzleMonkey.pieces.piece_3.draggy({
            minX: 0,
            minY: 0,
            maxX: stageSize.x - 107,
            maxY: stageSize.y - 90,
        }).move(163,385).attr({
            'data-x' : 218,
            'data-y' : 230,  
        });

        puzzleMonkey.pieces.piece_4.draggy({
            minX: 0,
            minY: 0,
            maxX: stageSize.x - 56,
            maxY: stageSize.y - 124,
        }).move(417,368).attr({
            'data-x' : 281,
            'data-y' : 114,  
        });
        puzzleMonkey.pieces.piece_5.draggy({
            minX: 0,
            minY: 0,
            maxX: stageSize.x - 56,
            maxY: stageSize.y - 124,
        }).move(336,357).attr({
            'data-x' : 288,
            'data-y' : 79,  
        });
        puzzleMonkey.pieces.piece_6.draggy({
            minX: 0,
            minY: 0,
            maxX: stageSize.x - 89,
            maxY: stageSize.y - 125,
        }).move(250,372).attr({
            'data-x' : 154,
            'data-y' : 139,  
        });


        $.each(puzzleMonkey.pieces,function(index, value){puzzleMonkey.pieces[index].on('dragend',function(e){

            var limit = 30,
                t = $(e.target),
                x = parseInt(t.attr('x')),
                y = parseInt(t.attr('y')),
                mX = parseInt(t.attr('data-x')),
                mY = parseInt(t.attr('data-y')),
                piece = t.index() - 1,
                elem = puzzleMonkey.pieces['piece_'+piece];

            elem.addClass('moved');

            if(mX >= (x - limit) && mX <= ( x + limit ) && mY >= ( y - limit ) && mY <= ( y + limit) && puzzleMonkey.parent.hasClass('counting') ){
                elem.addClass('matched');
                elem.animate(200, '>').move(mX, mY);

                puzzleMonkey.result.select('.result-0'+piece).addClass('matched');

                setTimeout(function(){
                    elem.hide();

                },200);
            }

            if(puzzleMonkey.checkMatch() === 6){
                puzzleMonkey.end();
            }

        });});   
    }
    
    
    /*
    // Statefour*/
    puzzleMonkey.stateFour = function(){
        
        
    }
    
    /*----------------------------------------------------------------------------------*/
    // cookie
    puzzleMonkey.setCookie = function(state,name,email,time){
        var $cookieObj = {
            state : state,
            time : time,
            name : name,
            email : email,
        };

        $.cookie('pmonkey',JSON.stringify($cookieObj),{
            path : '/',
            expires : 1,
        });
    }
    
    puzzleMonkey.getCookie = function(){
        var cookie = $.cookie('pmonkey');
        if(typeof cookie === 'undefined'){return false;}
        else{
            return JSON.parse(cookie);
        }
    }
    
  
    
    
    /*----------------------------------------------------------------------------------*/
    // Initiate the puzzle
    
    if (puzzleMonkey.getCookie() !== false){
        
        puzzleMonkey.time = puzzleMonkey.getCookie().time;
        puzzleMonkey.parent.find('.puzzle-form input[name=name]').val(puzzleMonkey.getCookie().name);
        puzzleMonkey.parent.find('.puzzle-form input[name=email]').val(puzzleMonkey.getCookie().email);
        puzzleMonkey.parent.find('.puzzle-form input[name=state]').val(puzzleMonkey.getCookie().state);
        
    }
    
    
    if(puzzleMonkey.getCookie.state !== '4'){puzzleMonkey.buildStage();}
    
    
    if(puzzleMonkey.parent.find('.puzzle-trigger').is(':in-viewport') && puzzleMonkey.started === false){
        if (puzzleMonkey.getCookie() !== false){puzzleMonkey.start();}
        else{puzzleMonkey.timedStart();}
        
        
    }
    
    $(window).scroll(function(){
        if(puzzleMonkey.parent.find('.puzzle-trigger').is(':in-viewport') && puzzleMonkey.started === false){
            if (puzzleMonkey.getCookie() !== false){puzzleMonkey.start();}
            else{puzzleMonkey.timedStart();}
        }
        
        if(puzzleMonkey.parent.is(':in-viewport')){
            puzzleMonkey.timerPaused = false;
        }
        else{puzzleMonkey.timerPaused = true;}
    });
    
    /*----------------------------------------------------------------------------------*/
    // before unload
    
    window.onbeforeunload = function(){
        
        var name = puzzleMonkey.parent.find('.puzzle-form input[name=name]').val(),
            email = puzzleMonkey.parent.find('.puzzle-form input[name=email]').val(),
            state = puzzleMonkey.parent.find('.puzzle-form input[name=state]').val();
        
        puzzleMonkey.setCookie(state,name,email,puzzleMonkey.time);
        
    };
    
    
    /*----------------------------------------------------------------------------------*/
    // Form return
    
    $(document).on('formReturn',function(e){
        if(e.target.is('.puzzle-form form')){
            
            puzzleMonkey.state = 4;
            puzzleMonkey.parent.find('.puzzle-form input[name=state]').val('4');
            puzzleMonkey.stateFour;
            
        }
    });
}





