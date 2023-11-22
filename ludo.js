var i = 0, j, cases, position_1 = -1, position_2 = -1;

$(function (){
    generateTemplate();
    
    // disable button 2
    $('#bl').prop('disabled', true);
    $('#btnPlay2').removeClass('btn-danger').addClass('btn-default');

    let btn1 = $('#btnPlay1');
    let btn2 = $('#btnPlay2');
    
    btn1.click(function (){
        let value = play(position_1)
        position_1 = value.Position;
        
        if(position_1 === position_2)
            position_2 = -1;

        launch(position_1, value.Random, 1);

        // disable button 1
        btn1.prop('disabled', true);
        btn1.removeClass('btn-primary').addClass('btn-default');

        // enable button 2
        btn2.prop('disabled', false);
        btn2.removeClass('btn-default').addClass('btn-danger');
        
        stopGame();
    });
    
    btn2.click(function (){
        let value = play(position_2)
        position_2 = value.Position;

        if(position_2 === position_1)
            position_1 = -1;

        launch(position_2, value.Random, 2);

        // disable button 2
        btn2.prop('disabled', true);
        btn2.removeClass('btn-danger').addClass('btn-default');

        // enable button 1
        btn1.prop('disabled', false);
        btn1.removeClass('btn-default').addClass('btn-primary');

        stopGame();
    });

    //////////////////////////  functions  /////////////////////////
    function stopGame(){
        if(position_1 === 100 || position_2 == 100){
            // disable all buttons
            $('#btnPlay1').prop('disabled', true);
            $('#btnPlay1').removeClass('btn-primary').addClass('btn-default');
            $('#btnPlay2').prop('disabled', true);
            $('#btnPlay2').removeClass('btn-danger').addClass('btn-default');
        }
    }
    
    function launch(position,random, player_numb){
        // set ramdom value in field
        $('#randomValue' + player_numb).text(function (){
            return random;
        });

        if (position <= 100){
            setPlayerPosition(position_1, position_2);

            // show score
            if (position >= 0){
                $('#position' + player_numb).text(function (){
                    return position;
                });
            }
        }
        if (position === 100){
            let color = (player_numb === 1) ? 'text-primary' : 'text-danger';
            $('#randomValue' + player_numb).empty();
            $('#randomValue' + player_numb).append("<p style=\"font-weight: bold\"  class=\" " + color + "text-primary bold text-center\" > Felicitation Joueur " + player_numb + ", vous avez gagnez !!! </p>");
        }
    }
    
    function play(position){
        let random = (Math.floor(Math.random() * (6 - 1 + 1)) + 1);
        if (random === 6 && position === -1)
            position = -6;

        // check if player play '6' before beginning, and if random is lower than '100'
        if ((position >= 0 || position === -6) && (position + random) <= 100)
            position += random;
        
        return {
            Random: random,
            Position: position
        };
    }
    
    function setPlayerPosition(position1, position2){
        generateTemplate();

        let payer1 = $('#case' + position1);
        let payer2 = $('#case' + position2);

        payer1.empty();
        payer2.empty();
        payer1.append("<img src=\"player_1.png\" style=\"width: 80%;\" alt=\"\">");
        payer2.append("<img src=\"player_2.png\" style=\"width: 80%;\" alt=\"\">");
    }
    
    function generateTemplate(){
        $('#table').empty();
        cases = 0;

        for (i=0; i<10; i++){
            $('#table').append("<tr  id='tr" + i + "'   >  </tr>");
            let position = i + 1;
            if(position % 2 === 0){
                cases += 11;
            }
            for (j=0; j<10; j++){
                if(position % 2 !== 0)
                    cases++;
                else
                    cases--;

                let color = (cases % 2 !== 0) ? 'bg-warning' : '';
                $("#tr" + i).append("<td class=\" " + color + " text-muted text-center\" id='case" + cases + "' style=\"height: 70px; width: 4%; border: black solid .2em \">" + cases + "</td>")
            }
            if(position % 2 === 0){
                cases += 9;
            }
        }
    }

});