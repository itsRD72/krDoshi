<!DOCTYPE html>
<html>

<head>

    <title>MCQ Paper</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 0;
        }

        .paper {
            width: 210mm;
            /* min-height:297mm; */
            margin: auto;
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .student-info {
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .question-block {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .options {
            margin-left: 20px;
            margin-top: 8px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        @media print {

            body {
                margin: 0;
            }

        }
    </style>

</head>

<body>

    <div class="paper">

        <!-- HEADER -->
        <div class="header">
            <h2>{{ $center->name ?? 'Head Office' }}</h2>
            <!-- <h4>MCQ Examination</h4> -->
        </div>

        <!-- STUDENT DETAILS -->
        <div class="student-info">
            <div class="row">
                <div>Course: {{ $course->name }}</div>
                <div>Date: ____________</div>
            </div>
            <div class="row">
                <div>Student Name: ____________________________</div>
                <!-- <div>Roll No: ____________________________</div> -->
            </div>
        </div>

        <!-- QUESTIONS -->
        @foreach($mcqs as $index => $question)

            <div class="question-block">

                <p>
                    <b>Q{{ $index + 1 }}.</b> {{ $question->question }}
                </p>

                <div class="options">
                    <div>☐ (A) {{ $question->option_a }}</div>
                    <div>☐ (B) {{ $question->option_b }}</div>
                    <div>☐ (C) {{ $question->option_c }}</div>
                    <div>☐ (D) {{ $question->option_d }}</div>
                </div>

            </div>

        @endforeach

        <div style="margin-top:40px; display:flex; justify-content:space-between;">
            <div>Examiner Signature: __________________</div>
            <div><b>Good Luck!</b></div>
        </div>

    </div>

</body>

</html>