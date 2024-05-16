$('#checkBirthdate').click(async function () {
    let data = $('#birthdate').val() ;
    data = data.substring(5 , data.length)
    let settings = {
        async: true,
        crossDomain: true,
        url: `https://online-movie-database.p.rapidapi.com/actors/v2/get-born-today?today=${data}&first=5`,
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '5e1db15c2fmsh07313a13c76b17dp10f307jsnbc9af13813a9',
            'X-RapidAPI-Host': 'online-movie-database.p.rapidapi.com'
        }
    };
    
    $.ajax(settings).done(function (response) {
        let actors = response['data']['bornToday']['edges'] ;
        let outData = []
        for (let i = 0 ; i < actors.length ; i++) {
            let settings = {
                async: true,
                crossDomain: true,
                url: 'https://online-movie-database.p.rapidapi.com/actors/v2/get-bio?nconst=' + actors[i]['node']['id'] ,
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '5e1db15c2fmsh07313a13c76b17dp10f307jsnbc9af13813a9',
                    'X-RapidAPI-Host': 'online-movie-database.p.rapidapi.com'
                }
            }
            $('#actors').text("" )
            $.ajax(settings).done(function (response) {
                outData.push(response['data']['name']['nameText']['text']) ;
                if (outData.length === actors.length) {
                    let toData = "" ;
                    for (let i = 0 ; i < outData.length ; i++) {
                        toData += outData[i]  ;   
                        if (i < outData.length - 1) {
                            toData += "\n" ;
                        }
                    }
                    alert(toData) ;
                }
                //$('#actors').text($('#actors').text() + response['data']['name']['nameText']['text'] + "__") ;
            });
            }
        });
    }
)

