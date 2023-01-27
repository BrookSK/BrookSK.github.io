<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Investimento | Teen Invest</title>
    <link rel="stylesheet" href="../css/quiz.css">
    <link rel="stylesheet" href="../css/quiz2.css">
  <style> 
body {width:700px!important;height:500px!important;} 
</style> 
</head>
<body>
    <div class="container">
        <div id="game" class="justify-center flex-column">
            <div id="hud">
                <div class="hud-item">
                    <p id="progressText" class="hud-prefix">
                        Question
                    </p>
                    <div id="progressBar">
                        <div id="progressBarFull"></div>
                    </div>
                </div>
            </div>
            <h1 id="question">Qual é a resposta para esta pergunta</h1>
            <div class="choice-container">
                <p class="choice-prefix">A</p>
                <p class="choice-text" data-number="1">Choice</p>
            </div>
            <div class="choice-container">
                <p class="choice-prefix">B</p>
                <p class="choice-text" data-number="2">Choice 2</p>
            </div>
            <div class="choice-container">
                <p class="choice-prefix">C</p>
                <p class="choice-text" data-number="3">Choice 3</p>
            </div>
            <div class="choice-container">
                <p class="choice-prefix">D</p>
                <p class="choice-text" data-number="4">Choice 4</p>
            </div>
        </div>
    </div>
    <script src="../js/perfilinvest.js"></script>
</body>
</html>