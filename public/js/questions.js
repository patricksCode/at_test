

$( document ).ready(function() {



    $('#questions input[type=radio]').on('click', function(e){

        axios.post('/submit-answer', {
            answer: $(e.currentTarget).val()
        })
        .then(function (response) {
            if(response.data.saved !== true){
                console.log(response);
            }
            checkAnswers();
        })
        .catch(function (error) {
            console.log(error);
        });
    });



    checkAnswers();


});

function checkAnswers(){
    var $questionsAnswered = 0;
    $('.multipleChoiceAnswers').each(function(index){

        if($(this).find(":radio").is(':checked')){
            $questionsAnswered++;
        }

        if($questionsAnswered >= 4) {
            $('.resultsButton').removeClass('hidden').focus();
        }

    });

}