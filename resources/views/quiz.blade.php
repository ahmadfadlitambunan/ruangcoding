<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>RuangCoding | Kuis</title>

    <!-- Bar Icon -->
    <link rel="shortcut icon" href="/images/logo5.png" type="image/x-icon">

    <!-- FontAweome CDN Link for Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="/css/quiz.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        
        const questions = JSON.parse(JSON.stringify({!! $quizzes !!}));
        console.log(questions)
    </script>
</head>
<body>
    <!-- start Quiz button -->
    <div class="start_btn"><button>Tekan dan mulai kuis!</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Beberapa peraturan kuis.</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
            <button class="quit">Keluar Kuis</button>
            <button class="restart">Lanjut</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">Kuis</div>
            <div class="timer">
                <div class="time_left_txt">Waktu</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Lanjut</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">Kamu telah menyelesaikan kuis!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart">Ulangi Kuis</button>
            <button class="quit">Keluar Kuis</button>
        </div>
    </div>

    {{-- Fetch From Database User Ajax --}}
    {{-- <script>
        $(document).ready(function(){
            fetchQuestion();

            function fetchQuestion()
            {
                $.ajax({
                    type: "GET",
                    url: "{{ url('') }}/fetch-question",
                    data: "id=" +  ,
                    success: function(data){
                        let questions = data
                        questions = questions.replace(/&quot;/g, '\\"');
                        console.log(questions)
                    }

                });
            }
        });
    </script> --}}

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <script src="/js/questions.js"></script>

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="/js/script.js"></script>

</body>
</html>