<?php

if (!session()->has('profileid')) {
    redirect()->back();
}
?>
<html lang="en">

<head>
    <title> Russia-Ukraine War Sentiments (Humor)</title>
    <link rel="icon" href="https://assets.iu.edu/favicon.ico">
    
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body onload="checkAnswers()">
    <div class="container">
       
        <hr>
        {{-- <div class="row col-12 mt-5 mb-5">
            <h6 class="col-12 mb-3"><strong>Attention Checks</strong></h6>
            <div class="col-5">
                <img src="Images/a.png" style="max-width: 7%; height: auto;" alt="bullet 1"> This is an attention check card which is used to make sure that you are paying attention when sorting the cards.<br>
                <img src="Images/b.png" style="max-width: 7%; height: auto;" alt="bullet 2"> When you see an attention check card please read the description to place it in the appropriate stack. Failing to do so will result in your submission being rejected. You will also not get paid.
            </div>
            <img src="Images/ac_comfort.png" class="img-fluid col-7 border-left" alt="Attention Check Card">
        </div> --}}
        <hr>
        <div class="mt-5 mb-3">
            <form name="IntroDone" method="post" action="sorting1" onclick="checkAnswers()">
                <h6 class="text-center"><strong>Please answer the following questions to continue with the study.</strong></h6>

                <div class="mt-3">
                    <label>1. What do you need to consider when sorting the cards?</label>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="consider" id="consider1" value="1">
                        <label class="form-check-label" for="consider1">We need to consider just the information collected by the device.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="consider" id="consider2" value="2">
                        <label class="form-check-label" for="consider2">We need to consider just the features supported by the data.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="consider" id="consider3" value="3">
                        <label class="form-check-label" for="consider3">We need to consider both the collected information and supported features when sorting the cards.</label>
                        <div class="valid-feedback">
                            Correct!
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="consider" id="consider4" value="4">
                        <label class="form-check-label" for="consider4">None of the above.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label>2. What do the four stacks (6,7,8,9) in the above card sorting interface represent?</label>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="represent" id="represent1" value="1">
                        <label class="form-check-label" for="represent1">How comfortable you are with the data collection given the features it supports.</label>
                        <div class="valid-feedback">
                            Correct!
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="represent" id="represent2" value="2">
                        <label class="form-check-label" for="represent2">How anxious you are about the data collection given the features it supports.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="represent" id="represent3" value="3">
                        <label class="form-check-label" for="represent3">How sad you are with the data collection give the features it supports.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="represent" id="represent4" value="4">
                        <label class="form-check-label" for="represent4">None of the above.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label>3. Is it possible to undo a card sort?</label>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="undo" id="undo1" value="1">
                        <label class="form-check-label" for="undo1">Yes, by clicking on the back button on the web browser.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="undo" id="undo2" value="2">
                        <label class="form-check-label" for="undo2">Yes, by clicking on the undo button.</label>
                        <div class="valid-feedback">
                            Correct!
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="undo" id="undo3" value="3">
                        <label class="form-check-label" for="undo3">No</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label>3. What do you do when you see an attention check card?</label>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="attentionSort" id="attentionSort1" value="1">
                        <label class="form-check-label" for="attentionSort1">Always sort it into the comfortable stack.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="attentionSort" id="attentionSort2" value="2">
                        <label class="form-check-label" for="attentionSort2">Always sort it into the not comfortable stack.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="attentionSort" id="attentionSort3" value="3">
                        <label class="form-check-label" for="attentionSort3">Read the description to identify the stack you need to place it in.</label>
                        <div class="valid-feedback">
                            Correct!
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label>4. What happens when you don't correctly sort the attention check card?</label>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="attentionCorrect" id="attentionCorrect1" value="1">
                        <label class="form-check-label" for="attentionCorrect1">Your submissions is disqualified and you don't get paid.</label>
                        <div class="valid-feedback">
                            Correct!
                        </div>
                    </div>
                    <div class="ml-4 form-check">
                        <input class="form-check-input" type="radio" name="attentionCorrect" id="attentionCorrect2" value="2">
                        <label class="form-check-label" for="attentionCorrect2">Your submission is still valid and you get paid.</label>
                        <div class="invalid-feedback">
                            Incorrect. Please read the instructions again.
                        </div>
                    </div>
                </div>
                
                <input id="Instructions" class="btn btn-primary mt-4 col-12" type="submit" value="Continue">
                <input type="text" name="StatusType" value="Instructions1" style="display: none;">
                <input type="text" id="status" name="Status" value="-1" style="display: none;">
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/instructions.js')}}"></script>
</body>

</html>