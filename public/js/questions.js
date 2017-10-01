$( document ).ready(function() {



    $('#questions input[type=radio]').on('click', function(e){

        axios.post('/submit-answer', {
            answer: $(e.currentTarget).val()
        })
        .then(function (response) {
            if(response.saved !== true){
                console.log(response);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    });
});