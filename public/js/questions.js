var $questionsAnswered = 0;

$( document ).ready(function() {



    $('#questions input[type=radio]').on('click', function(e){

        axios.post('/submit-answer', {
            answer: $(e.currentTarget).val()
        })
        .then(function (response) {
            if(response.saved !== true){
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
    $('.multipleChoiceAnswers').each(function(index){
        if($(this).find(":radio").is(':checked')){
            $questionsAnswered++;
        }
        console.log($questionsAnswered);
        console.log($('.resultsButton'));
        if($questionsAnswered >= 4) {
            $('.resultsButton').prop('disabled', false);
        }

    });

}